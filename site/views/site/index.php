<?php

use components\web\AppConfig;

$params = (new AppConfig())->getParams();
var_dump($params);
?>