<?php
// Starter terms of use. Read them, change what does not match how you work, and add your contact address.
// They are a template, not legal advice.
require __DIR__ . '/lib.php';
$s = kit_settings();
$b = h($s['brand_name']);
kit_head($s, 'Terms of use');
?>
<article class="legal">
  <h1>Terms of use</h1>
  <p>By using this quiz you agree to these terms.</p>

  <h2>What the quiz is</h2>
  <p>The quiz suggests options based on your answers. Its suggestions are general and are not professional advice for your situation.</p>

  <h2>Links to others</h2>
  <p>Some suggestions may link to products or services run by others. Their own terms apply there, and <?= $b ?> may be paid when you use them.</p>

  <h2>Your information</h2>
  <p>How we handle what you enter is set out in the <a href="privacy.php">privacy policy</a>.</p>

  <h2>Changes</h2>
  <p>We may update these terms. The version on this page is the one that applies.</p>

  <h2>Contact</h2>
  <p>Questions about these terms: [your contact email].</p>
</article>
<?php kit_foot($s);
