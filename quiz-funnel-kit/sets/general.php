<?php
// Starter questions for any business. Edit the wording freely; keep each 'id' short, lowercase, no spaces.
// {brand} is replaced with the brand name from settings.php.
return [
    'title' => 'Find what fits you best',
    'intro' => 'Answer a few quick questions and {brand} will point you to the right option.',
    'start' => 'Start the quiz',
    'questions' => [
        ['id' => 'goal', 'short' => 'Goal', 'label' => 'What are you hoping to get done?',
         'options' => ['Save time', 'Save money', 'Get better results', 'Something else']],
        ['id' => 'stage', 'short' => 'Stage', 'label' => 'Where are you in your search?',
         'options' => ['Just looking', 'Comparing options', 'Ready to decide']],
        ['id' => 'when', 'short' => 'Timing', 'label' => 'When do you want to start?',
         'options' => ['Right away', 'In the next month', 'In a few months', 'Not sure yet']],
    ],
    'contact' => [
        'short' => 'You', 'heading' => 'Last step: where should we send your results?',
        'sub' => 'Your answers are ready. Add your details to see them.',
        'button' => 'See my results', 'phone' => true,
    ],
    'matched' => 'Based on your answers, these are the best places to start.',
    'thanks' => 'We have your answers and will be in touch shortly.',
];
