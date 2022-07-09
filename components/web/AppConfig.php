<?php

namespace components\web;

class AppConfig extends \components\base\AppConfig {

    private $config;
    private $params;
    private $dbConnConfig;
    private $configFile;

    public function __construct($configFileName = null) {
        if (isset($configFileName)) {
            $configFile = $_SERVER['DOCUMENT_ROOT'] . "/site/config/{$configFileName}.php";
        } else {
            $configFile = $_SERVER['DOCUMENT_ROOT'] . "/site/config/config.php";
        }
        require $configFile;
        $this->config = $config;
        $this->params = $params;
        $this->dbConnConfig = $db;
        $this->configFile = $configFile;
    }

    public function getConfig() {
        return $this->config;
    }

    public function getParams() {
        return $this->params;
    }

    public function getDbConnConfig() {
        return $this->dbConnConfig;
    }

    public function getConfigFile() {
        return $this->configFile;
    }

    public function getConfigPackage() {
        $configPackage = ["config" => $this->config, "params" => $this->params, "dbConnConfig" => $this->dbConnConfig] ;
        return $configPackage;
    }

}
