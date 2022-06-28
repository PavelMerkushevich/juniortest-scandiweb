<?php

$db = []; //Вынеси $db в другой файл

$params = require __DIR__ . '/params.php';

$config=[
	'id' => 'test-app',
	'components' => [
		'router' => [
			'defaultController' => 'site',
			'rules' => [
				'/about' => 'site/about',
				// '/about-new' => 'site-new/about-new',
			]
		]
		'httpErrorsHandler' => [
			'defaultAction' => 'site/error'
		]
	]
];
