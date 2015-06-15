<?php
return [
    'routes' => [
        'home' => [
            'url' => '/',
            'action' => 'App\Action\HomepageFactory::factory'
        ],
        'page' => [
            'url' => '/page',
            'action' => 'App\Action\PageFactory::factory'
        ]
    ]
];
