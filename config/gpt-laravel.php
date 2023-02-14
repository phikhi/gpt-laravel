<?php

return [

    /**
     * Open-AI related informations
     */
    'api_key' => env('OPENAI_API_KEY'),
    'organization' => env('OPENAI_ORGANIZATION'),

    /**
     * GPT-3 related informations
     */
    'completion' => [
        'default' => [
            'model' => 'text-davinci-003',
            'temperature' => 0.7,
            'max_tokens' => 100,
            'top_p' => 1,
            'frequency_penalty' => 0,
            'presence_penalty' => 0,
            'suffix' => null,
        ],
    ],
];
