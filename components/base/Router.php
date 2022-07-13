<?php

namespace components\base;

abstract class Router {

    abstract public function route();
    abstract public static function redirect($url);
    
    // abstract function getContentFromAction();
}
