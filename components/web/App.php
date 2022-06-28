<?php

namespace components\web;

use components\routing\Router;

class App extends \components\base\App {

	public $configFile;
	public $configPackage;

	public function __construct($configFile = null) {
		$this->configFile = isset($configFile) ? $configFile : $_SERVER['DOCUMENT_ROOT'] . '/site/config/config.php';
		require $this->configFile;
		$this->configPackage = compact('config', 'params', 'db');
	}

	public function run(){
		$router = new Router($this->configPackage);
		$router->route();
	}

	public static function getConfigPackage($configFile = null){
		if(isset($configFile)){
			$app = new self($configFile);
		} else {
			$app = new self;
		}
		
		return $app->configPackage;
	}

	public static function getConfigFile(){
		$app = new self;
		return $app->configFile;
	}

}
