<?php
// Your quiz, in one file. Change these values; nothing else needs editing to go live.
return [
    // Your brand's name, shown in the header, the questions and the consent line.
    'brand_name' => 'Your Brand',

    // One of: violet, teal, green, amber, red, slate.
    'brand_colour' => 'violet',

    // Where each lead goes.
    //   'email'   : sent to the address in 'email'
    //   'webhook' : posted as JSON to the address in 'webhook' (Zapier, Make, your CRM)
    //   'later'   : saved in leads/leads.jsonl on your server, to collect later
    // A lead that cannot be sent is always saved in leads/leads.jsonl, so none is lost.
    'leads' => [
        'to'      => 'later',
        'email'   => '',
        'webhook' => '',
    ],

    // What the visitor sees after the quiz.
    //   'one'    : one offer, the first in 'offers'
    //   'few'    : every offer in 'offers', as a list to choose from
    //   'thanks' : a thank-you page, no offer
    'after' => 'few',

    // Which starter questions to use: health, service, software, store or general.
    // Each is a file in sets/; edit its wording there.
    'question_set' => 'general',

    // The offers shown after the quiz. Each has a name, the address it links to, and one line about it.
    'offers' => [
        ['name' => 'First offer',  'url' => 'https://example.com/first',  'line' => 'One line on what this offer gives the visitor.'],
        ['name' => 'Second offer', 'url' => 'https://example.com/second', 'line' => 'One line on what this offer gives the visitor.'],
    ],
];
