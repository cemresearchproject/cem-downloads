<?php
// Takes the finished quiz, sends the lead where settings.php says, then shows what comes after.
require __DIR__ . '/lib.php';
$s = kit_settings();
$set = kit_set($s);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: quiz.php'); exit; }
// A filled hidden field means a bot: thank it and keep nothing.
if (!empty($_POST['website'])) { header('Location: after.php'); exit; }

$name  = trim((string) ($_POST['name'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) { header('Location: quiz.php'); exit; }

$answers = [];
foreach ($set['questions'] as $q) {
    $v = (string) ($_POST[$q['id']] ?? '');
    $answers[$q['label']] = in_array($v, $q['options'], true) ? $v : '';
}

$lead = [
    'received' => date('c'),
    'name'     => mb_substr($name, 0, 120),
    'email'    => $email,
    'phone'    => mb_substr(preg_replace('/[^0-9+()\- ]/', '', (string) ($_POST['phone'] ?? '')), 0, 30),
    'quiz'     => $s['question_set'],
    'answers'  => $answers,
];

function kit_keep(array $lead, string $why = ''): void
{
    if ($why !== '') $lead['not_sent'] = $why;
    @file_put_contents(__DIR__ . '/leads/leads.jsonl', json_encode($lead, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "\n", FILE_APPEND | LOCK_EX);
}

function kit_email(array $s, array $lead): bool
{
    $to = $s['leads']['email'];
    if (!filter_var($to, FILTER_VALIDATE_EMAIL)) return false;
    $body = "New lead from your quiz\n\nName: {$lead['name']}\nEmail: {$lead['email']}\nPhone: {$lead['phone']}\n\n";
    foreach ($lead['answers'] as $q => $a) $body .= "$q\n  $a\n";
    $headers = "Content-Type: text/plain; charset=utf-8\r\nReply-To: {$lead['email']}";
    return @mail($to, 'New quiz lead: ' . $lead['name'], $body, $headers);
}

function kit_webhook(array $s, array $lead): bool
{
    $url = $s['leads']['webhook'];
    if (!preg_match('#^https?://#i', $url)) return false;
    $json = json_encode($lead, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    if (function_exists('curl_init')) {
        $c = curl_init($url);
        curl_setopt_array($c, [CURLOPT_POST => true, CURLOPT_POSTFIELDS => $json, CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 10, CURLOPT_HTTPHEADER => ['Content-Type: application/json']]);
        curl_exec($c);
        $code = (int) curl_getinfo($c, CURLINFO_HTTP_CODE);
        curl_close($c);
        return $code >= 200 && $code < 300;
    }
    $ctx = stream_context_create(['http' => ['method' => 'POST', 'header' => "Content-Type: application/json\r\n", 'content' => $json, 'timeout' => 10, 'ignore_errors' => true]]);
    $r = @file_get_contents($url, false, $ctx);
    return $r !== false && isset($http_response_header[0]) && preg_match('# 2\d\d #', $http_response_header[0]);
}

switch ($s['leads']['to']) {
    case 'email':   if (!kit_email($s, $lead)) kit_keep($lead, 'email failed'); break;
    case 'webhook': if (!kit_webhook($s, $lead)) kit_keep($lead, 'webhook failed'); break;
    default:        kit_keep($lead);
}

header('Location: after.php?n=' . rawurlencode(strtok($name, ' ')));
exit;
