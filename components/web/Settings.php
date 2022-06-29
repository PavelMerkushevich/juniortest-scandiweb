<?php

namespace components\web;

class Settings 
{

	public $config;
	public $params; 
	public $db;
	
	public function __construct($configFile)
	{
		require $configFile;

		$this->config = $config;
		$this->params = $params;
		$this->db = $db;
	}

	public static function config(){
		$configFile = $_SERVER['DOCUMENT_ROOT']."/site/config/config.php";
		new self($configFile);
	}
}