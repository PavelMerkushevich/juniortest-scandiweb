<?php

namespace components\web;

class AppConfig extends \components\base\AppConfig
{

    private array $config;
    private array $params;
    private array $dbConnConfig;
    private string $configFilePath;

    public function __construct(string $configFileName = null)
    {
        if (isset($configFileName)) {
            $configFilePath = $_SERVER['DOCUMENT_ROOT'] . "/site/config/$configFileName.php";
        } else {
            $configFilePath = $_SERVER['DOCUMENT_ROOT'] . "/site/config/config.php";
        }
        require $configFilePath;
        $this->config = $config;
        $this->params = $params;
        $this->dbConnConfig = $db;
        $this->configFilePath = $configFilePath;
    }

    public function getConfig(): array
    {
        return $this->config;
    }

    public function getParams(): array
    {
        return $this->params;
    }

    public function getDbConnConfig(): array
    {
        return $this->dbConnConfig;
    }

    public function getConfigFilePath(): string
    {
        return $this->configFilePath;
    }

    public function getConfigPackage(): array
    {
        $configPackage = ["config" => $this->config, "params" => $this->params, "dbConnConfig" => $this->dbConnConfig];
        return $configPackage;
    }

}
