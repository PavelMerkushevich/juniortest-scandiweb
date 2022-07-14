<?php

namespace components\base;

abstract class Router
{
    abstract public function route();

    abstract public static function redirect(string $url);

    // abstract function getContentFromAction(); достать контент из action и встроить его в action, который был вызван пользователем
}
