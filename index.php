<?php

require_once __DIR__ . '/vendor/autoload.php';
$configFile = __DIR__ . 'config/config.php';

(new components\web\App())->run();


