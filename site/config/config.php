<?php

$db = []; //Вынеси $db в другой файл

$params = require __DIR__ . '/params.php';

$config = [
    'id' => 'juniortest-scandiweb',
    'components' => [
        'router' => [
            'defaultController' => 'site',
            'rules' => [
                '/' => 'site/index',
                '/about' => 'site/about',
                '/add-product' => 'site/add-product',
                '/add-product-handler' => 'site/add-product-handler'
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
