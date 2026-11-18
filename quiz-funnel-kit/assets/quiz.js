// The quiz: shows one step at a time, moves on as soon as an answer is picked,
// fills the progress bar, and remembers answers in the browser so a visitor who
// leaves and comes back starts where they were.
(function () {
  var quiz = document.querySelector('.quiz');
  if (!quiz) return;
  var form = document.getElementById('quiz-form');
  var steps = Array.prototype.slice.call(form.querySelectorAll('.step'));
  var marks = Array.prototype.slice.call(quiz.querySelectorAll('.progress__steps li'));
  var fill = document.getElementById('progress-fill');
  var back = document.getElementById('back');
  var key = quiz.getAttribute('data-key');
  var current = 0;

  function load() {
    try { return JSON.parse(localStorage.getItem(key) || '{}'); } catch (e) { return {}; }
  }
  function save(answers) {
    try { localStorage.setItem(key, JSON.stringify(answers)); } catch (e) { /* private window: carry on */ }
  }

  function show(i) {
    current = Math.max(0, Math.min(i, steps.length - 1));
    steps.forEach(function (s, n) { s.hidden = n !== current; });
    marks.forEach(function (m, n) {
      m.classList.toggle('is-done', n < current);
      m.classList.toggle('is-current', n === current);
    });
    fill.style.width = Math.round(((current + 1) / steps.length) * 100) + '%';
    back.hidden = current === 0;
    var first = steps[current].querySelector('input:checked, input:not(.trap)');
    if (first && current === steps.length - 1) first.focus();
  }

  // Put back what the visitor answered before, and start at the first step left to answer.
  var answers = load();
  var start = 0;
  steps.forEach(function (s, n) {
    var radios = s.querySelectorAll('input[type=radio]');
    if (!radios.length) {
      s.querySelectorAll('input[name]').forEach(function (f) { if (answers[f.name] && f.name !== 'website') f.value = answers[f.name]; });
      return;
    }
    var picked = false;
    radios.forEach(function (r) { if (answers[r.name] === r.value) { r.checked = true; picked = true; } });
    if (picked && start === n) start = n + 1;
  });

  form.addEventListener('change', function (e) {
    var t = e.target;
    if (!t.name || t.name === 'website') return;
    var a = load(); a[t.name] = t.value; save(a);
    if (t.type === 'radio') setTimeout(function () { show(current + 1); }, 300);
  });
  form.addEventListener('input', function (e) {
    var t = e.target;
    if (t.type === 'radio' || !t.name || t.name === 'website') return;
    var a = load(); a[t.name] = t.value; save(a);
  });
  back.addEventListener('click', function () { show(current - 1); });

  form.addEventListener('submit', function (e) {
    var name = form.elements.name.value.trim();
    var email = form.elements.email.value.trim();
    if (!name || !/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email)) {
      e.preventDefault();
      document.getElementById('form-error').hidden = false;
      return;
    }
    try { localStorage.removeItem(key); } catch (err) { /* nothing to clear */ }
  });

  show(start);
})();
