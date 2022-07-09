<?php

$db = []; //Вынеси $db в другой файл

$params = require __DIR__ . '/params.php';

$config = [
    'id' => 'juniortest-scandiweb',
    'components' => [
        'router' => [
            'defaultController' => 'site',
            'rules' => [
                '/about' => 'site/about',
            // '/about-new' => 'site-new/about-new',
            ]
        ],
        'httpErrorsHandler' => [
            'defaultAction' => 'site/error'
        ],
        'controller' => [
            'defaultLayout' => 'main',
            'defaultIndexView' => 'index',
            'errorView' => 'error'
        ]
    ]
];
