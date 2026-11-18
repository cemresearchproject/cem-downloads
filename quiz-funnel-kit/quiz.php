<?php
// The question flow: one question per step, a progress bar, auto-advance on each answer,
// answers remembered in the visitor's browser, then the contact step.
require __DIR__ . '/lib.php';
$s = kit_settings();
$set = kit_set($s);
$steps = $set['questions'];
$total = count($steps) + 1;
kit_head($s, $set['title']);
?>
<div class="quiz" data-total="<?= $total ?>" data-key="quiz-<?= h($s['question_set']) ?>">
  <div class="progress">
    <div class="progress__track"><div class="progress__fill" id="progress-fill"></div></div>
    <ol class="progress__steps">
      <?php foreach ($steps as $i => $q): ?>
        <li data-step="<?= $i ?>"><?= h($q['short']) ?></li>
      <?php endforeach; ?>
      <li data-step="<?= $total - 1 ?>"><?= h($set['contact']['short']) ?></li>
    </ol>
  </div>

  <form method="post" action="submit.php" id="quiz-form" novalidate>
    <?php foreach ($steps as $i => $q): ?>
      <fieldset class="step" data-step="<?= $i ?>"<?= $i ? ' hidden' : '' ?>>
        <legend class="step__question"><?= h($q['label']) ?></legend>
        <div class="choices">
          <?php foreach ($q['options'] as $j => $opt): ?>
            <input type="radio" class="choice__input" id="<?= h($q['id'] . '-' . $j) ?>" name="<?= h($q['id']) ?>" value="<?= h($opt) ?>">
            <label class="choice" for="<?= h($q['id'] . '-' . $j) ?>"><?= h($opt) ?></label>
          <?php endforeach; ?>
        </div>
      </fieldset>
    <?php endforeach; ?>

    <fieldset class="step" data-step="<?= $total - 1 ?>" hidden>
      <legend class="step__question"><?= h($set['contact']['heading']) ?></legend>
      <p class="step__sub"><?= h($set['contact']['sub']) ?></p>
      <label class="field">Name<input type="text" name="name" autocomplete="name" required></label>
      <label class="field">Email<input type="email" name="email" autocomplete="email" required></label>
      <?php if (!empty($set['contact']['phone'])): ?>
        <label class="field">Phone <span class="field__optional">(optional)</span><input type="tel" name="phone" autocomplete="tel"></label>
      <?php endif; ?>
      <input type="text" name="website" class="trap" tabindex="-1" autocomplete="off" aria-hidden="true">
      <p class="error" id="form-error" hidden>Please add your name and a working email.</p>
      <button type="submit" class="button"><?= h($set['contact']['button']) ?></button>
      <p class="consent">By pressing “<?= h($set['contact']['button']) ?>” you agree to the <a href="privacy.php">privacy policy</a> and to <?= h($s['brand_name']) ?> contacting you by email<?= !empty($set['contact']['phone']) ? ' or phone' : '' ?> about your answers. You can opt out at any time.</p>
    </fieldset>

    <div class="nav">
      <button type="button" class="nav__back" id="back" hidden>Back</button>
    </div>
  </form>
</div>
<script src="assets/quiz.js"></script>
<?php kit_foot($s);
