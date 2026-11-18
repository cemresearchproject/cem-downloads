<?php
// Starter questions for a software or app business. Edit the wording freely.
// {brand} is replaced with the brand name from settings.php.
return [
    'title' => 'Find the right setup for your team',
    'intro' => 'A few questions so {brand} can point you to the plan that fits.',
    'start' => 'Start the quiz',
    'questions' => [
        ['id' => 'team', 'short' => 'Team', 'label' => 'How many people will use it?',
         'options' => ['Just me', '2 to 10', '11 to 50', 'More than 50']],
        ['id' => 'job', 'short' => 'Job', 'label' => 'What do you most want it to do?',
         'options' => ['Save time on routine work', 'Keep everything in one place', 'See how things are going', 'Something else']],
        ['id' => 'today', 'short' => 'Today', 'label' => 'What do you use today?',
         'options' => ['Spreadsheets', 'Another tool', 'Nothing yet']],
        ['id' => 'when', 'short' => 'Timing', 'label' => 'When do you want to be up and running?',
         'options' => ['This week', 'This month', 'Just exploring']],
    ],
    'contact' => [
        'short' => 'You', 'heading' => 'Last step: where should we send your recommendation?',
        'sub' => 'Your recommendation is ready. Add your details to see it.',
        'button' => 'See my recommendation', 'phone' => false,
    ],
    'matched' => 'Based on your answers, these fit your team best.',
    'thanks' => 'We have your answers and will send your recommendation shortly.',
];
