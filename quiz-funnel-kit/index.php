<?php
// The landing page: what the quiz is for, and the button that starts it.
require __DIR__ . '/lib.php';
$s = kit_settings();
$set = kit_set($s);
kit_head($s, $set['title']);
?>
<section class="landing">
  <h1><?= h($set['title']) ?></h1>
  <p class="landing__line"><?= h($set['intro']) ?></p>
  <a class="button" href="quiz.php"><?= h($set['start']) ?></a>
  <p class="landing__note"><?= count($set['questions']) + 1 ?> quick steps · under a minute</p>
</section>
<?php kit_foot($s);
