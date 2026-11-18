<?php
// Starter questions for a service business (consulting, an agency, a trade, a local service). Edit freely.
// {brand} is replaced with the brand name from settings.php.
return [
    'title' => 'See how we can help',
    'intro' => 'Tell {brand} a little about the job and we will suggest the right next step.',
    'start' => 'Start the quiz',
    'questions' => [
        ['id' => 'need', 'short' => 'Need', 'label' => 'What do you need help with?',
         'options' => ['A one-off project', 'Ongoing help', 'Advice first', 'Not sure yet']],
        ['id' => 'size', 'short' => 'Size', 'label' => 'How big is the job?',
         'options' => ['Small', 'Medium', 'Large']],
        ['id' => 'when', 'short' => 'Timing', 'label' => 'When do you need it done?',
         'options' => ['As soon as possible', 'Within a month', 'Later this year']],
    ],
    'contact' => [
        'short' => 'You', 'heading' => 'Last step: how can we reach you?',
        'sub' => 'Add your details and we will come back with the right next step.',
        'button' => 'Get my next step', 'phone' => true,
    ],
    'matched' => 'Based on your answers, here is where to start.',
    'thanks' => 'We have your answers and will be in touch within one working day.',
];
