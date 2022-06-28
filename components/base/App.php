<?php

namespace components\base;

abstract class App
{
    abstract protected function run();
    abstract protected static function getConfigPackage($configFile = null);
    abstract protected static function getConfigFile();
}