<?php

$params = require __DIR__ . '/params.php';

$config=[
	'id' => 'test-app',
	'components' => [
		'router' => [
			'rules' => [
				'about' => 'site/about',

			]
		]
	]
];
