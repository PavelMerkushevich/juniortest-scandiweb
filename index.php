<?php

require_once __DIR__ . '/vendor/autoload.php';
//$configFile = $_SERVER['DOCUMENT_ROOT'] . '/site/config/config.php';

(new components\web\App())->run();


