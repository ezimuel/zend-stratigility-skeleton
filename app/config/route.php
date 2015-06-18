<?php
return [
    'routes' => [
        'home' => [
            'url' => '/',
            'action' => 'App\Action\HomepageFactory::factory'
        ],
        'page' => [
            'url' => '/foo',
            'action' => 'App\Action\PageFactory::factory'
        ]
    ]
];
