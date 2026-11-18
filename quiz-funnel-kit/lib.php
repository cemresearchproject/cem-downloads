<?php
// Shared by every page: reads settings.php and the question set, and draws the page frame.

const KIT_COLOURS = ['violet', 'teal', 'green', 'amber', 'red', 'slate'];
const KIT_SETS = ['health', 'service', 'software', 'store', 'general'];

function kit_settings(): array
{
    $s = require __DIR__ . '/settings.php';
    $s['brand_name']   = trim((string) ($s['brand_name'] ?? '')) ?: 'Your Brand';
    $s['brand_colour'] = in_array($s['brand_colour'] ?? '', KIT_COLOURS, true) ? $s['brand_colour'] : 'violet';
    $s['question_set'] = in_array($s['question_set'] ?? '', KIT_SETS, true) ? $s['question_set'] : 'general';
    $s['after']        = in_array($s['after'] ?? '', ['one', 'few', 'thanks'], true) ? $s['after'] : 'thanks';
    $s['leads']        = array_merge(['to' => 'later', 'email' => '', 'webhook' => ''], (array) ($s['leads'] ?? []));
    $s['offers']       = array_values(array_filter((array) ($s['offers'] ?? []), fn ($o) => !empty($o['name']) && !empty($o['url'])));
    return $s;
}

function kit_set(array $s): array
{
    $set = require __DIR__ . '/sets/' . $s['question_set'] . '.php';
    // {brand} in any wording becomes the brand's name.
    array_walk_recursive($set, function (&$v) use ($s) {
        if (is_string($v)) $v = str_replace('{brand}', $s['brand_name'], $v);
    });
    return $set;
}

function h($v): string
{
    return htmlspecialchars((string) $v, ENT_QUOTES, 'UTF-8');
}

function kit_head(array $s, string $title): void
{
    ?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= h($title) ?> · <?= h($s['brand_name']) ?></title>
<link rel="stylesheet" href="assets/tokens.css">
<link rel="stylesheet" href="assets/style.css">
</head>
<body class="colour-<?= h($s['brand_colour']) ?>">
<header class="top"><a class="top__brand" href="index.php"><?= h($s['brand_name']) ?></a></header>
<main class="page">
<?php
}

function kit_foot(array $s): void
{
    ?></main>
<footer class="foot">
  <span>© <?= date('Y') ?> <?= h($s['brand_name']) ?></span>
  <a href="privacy.php">Privacy</a>
  <a href="terms.php">Terms</a>
</footer>
</body>
</html>
<?php
}
