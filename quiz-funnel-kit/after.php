<?php
// What the visitor sees once the quiz is sent: one offer, a few to choose from, or a thank-you.
require __DIR__ . '/lib.php';
$s = kit_settings();
$set = kit_set($s);
$first = mb_substr(trim((string) ($_GET['n'] ?? '')), 0, 40);
$offers = $s['offers'];
$after = $s['after'];
if ($after !== 'thanks' && !$offers) $after = 'thanks';
if ($after === 'one') $offers = array_slice($offers, 0, 1);

kit_head($s, $after === 'thanks' ? 'Thank you' : 'Your matches');
?>
<section class="after">
  <?php if ($after === 'thanks'): ?>
    <h1>Thank you<?= $first !== '' ? ', ' . h($first) : '' ?>.</h1>
    <p class="after__line"><?= h($set['thanks']) ?></p>
  <?php else: ?>
    <h1><?= $first !== '' ? h($first) . ', here' : 'Here' ?> <?= $after === 'one' ? 'is your match' : 'are your matches' ?>.</h1>
    <p class="after__line"><?= h($set['matched']) ?></p>
    <ul class="offers offers--<?= h($after) ?>">
      <?php foreach ($offers as $o): ?>
        <li class="offer">
          <h2 class="offer__name"><?= h($o['name']) ?></h2>
          <?php if (!empty($o['line'])): ?><p class="offer__line"><?= h($o['line']) ?></p><?php endif; ?>
          <a class="button" href="<?= h($o['url']) ?>" rel="noopener">See <?= h($o['name']) ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</section>
<?php kit_foot($s);
