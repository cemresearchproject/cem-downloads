<?php
// A starter privacy policy. Read it, change what does not match how you work, and add your contact address.
// It is a template, not legal advice.
require __DIR__ . '/lib.php';
$s = kit_settings();
$b = h($s['brand_name']);
kit_head($s, 'Privacy policy');
?>
<article class="legal">
  <h1>Privacy policy</h1>
  <p>This page explains what <?= $b ?> collects through this quiz and what we do with it.</p>

  <h2>What we collect</h2>
  <ul>
    <li>Your answers to the quiz questions.</li>
    <li>The name, email address and, if you give it, phone number you enter on the last step.</li>
  </ul>
  <p>While you take the quiz, your answers are kept in your own browser so you can pick up where you left off. They are cleared when you send the quiz.</p>

  <h2>What we use it for</h2>
  <ul>
    <li>To show you the options that fit your answers.</li>
    <li>To contact you about your answers, by the means you gave us.</li>
  </ul>
  <p>We do not sell your details.</p>

  <h2>Who else sees it</h2>
  <p>Your details may pass through the services we use to receive and store them (for example our email or form provider). They see them only to deliver them to us.</p>

  <h2>How long we keep it</h2>
  <p>We keep your details while we are in touch about your answers, and delete them when you ask or when they are no longer needed.</p>

  <h2>Your choices</h2>
  <p>You can ask to see, correct or delete your details, or stop us contacting you, at any time. Write to us at [your contact email].</p>
</article>
<?php kit_foot($s);
