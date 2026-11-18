<?php
// Starter questions for a shop, online or on the high street. Edit the wording freely.
// {brand} is replaced with the brand name from settings.php.
return [
    'title' => 'Find your perfect pick',
    'intro' => 'Answer three quick questions and {brand} will show you what suits you.',
    'start' => 'Start the quiz',
    'questions' => [
        ['id' => 'for', 'short' => 'For', 'label' => 'Who is it for?',
         'options' => ['Me', 'A gift', 'My home', 'My work']],
        ['id' => 'matters', 'short' => 'Matters', 'label' => 'What matters most to you?',
         'options' => ['Quality', 'Price', 'Style', 'Fast delivery']],
        ['id' => 'budget', 'short' => 'Budget', 'label' => 'What would you like to spend?',
         'options' => ['Under 25', '25 to 75', '75 to 150', 'Over 150']],
    ],
    'contact' => [
        'short' => 'You', 'heading' => 'Last step: where should we send your picks?',
        'sub' => 'Your picks are ready. Add your details to see them.',
        'button' => 'See my picks', 'phone' => false,
    ],
    'matched' => 'Based on your answers, these are our picks for you.',
    'thanks' => 'We have your answers and will send your picks shortly.',
];
