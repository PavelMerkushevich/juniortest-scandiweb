<?php

namespace components\web;

use components\routing\Router;

class App{

	public $configFile;
	public $config;
	public $params;

	public function __construct($configFile = null) {
		$this->configFile = isset($configFile) ? $configFile : $_SERVER['DOCUMENT_ROOT'] . '/site/config/config.php';
		require $this->configFile;
		$this->config = $config;
		$this->params = $params;
	}

	public function run(){
		$router = new Router($this->config);
		$router->route();
	}

	public static function getConfig($configFile = null){
		if(isset($configFile)){
			$app = new self($configFile);
		} else {
			$app = new self;
		}
		
		return $app->config;
	}

	public static function getParams($configFile = null){
		if(isset($configFile)){
			$app = new self($configFile);
		} else {
			$app = new self;
		}
		return $app->params;
	}
}
