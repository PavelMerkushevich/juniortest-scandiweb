<?php

namespace components\base;

abstract class AppConfig
{
    abstract public function getConfig();

    abstract public function getParams();

    abstract public function getDbConnConfig();

    abstract public function getConfigFilePath();

    abstract public function getConfigPackage();
}
