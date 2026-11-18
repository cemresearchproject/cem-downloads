<?php
// Starter questions for a health, wellness or fitness business. Edit the wording freely.
// {brand} is replaced with the brand name from settings.php.
return [
    'title' => 'Find the right plan for you',
    'intro' => 'A few quick questions so {brand} can suggest where to start.',
    'start' => 'Start the quiz',
    'questions' => [
        ['id' => 'focus', 'short' => 'Focus', 'label' => 'What would you most like to improve?',
         'options' => ['Energy', 'Sleep', 'Fitness', 'Eating well']],
        ['id' => 'routine', 'short' => 'Routine', 'label' => 'How would you describe your routine today?',
         'options' => ['Just getting started', 'Somewhat steady', 'Very steady']],
        ['id' => 'time', 'short' => 'Time', 'label' => 'How much time can you give it each week?',
         'options' => ['Under an hour', '1 to 3 hours', 'More than 3 hours']],
        ['id' => 'help', 'short' => 'Support', 'label' => 'What kind of help suits you?',
         'options' => ['On my own', 'A guide to follow', 'One-to-one support']],
    ],
    'contact' => [
        'short' => 'You', 'heading' => 'Last step: where should we send your plan?',
        'sub' => 'Your suggestions are ready. Add your details to see them.',
        'button' => 'See my plan', 'phone' => false,
    ],
    'matched' => 'Based on your answers, these are good places to start.',
    'thanks' => 'We have your answers and will send your suggestions shortly.',
];
