<?php

namespace components\routing;

use components\httpErrorsHandler\ErrorHandler;
use components\web\App;

class Router {
	public $configPackage;
	private $pages = [];
	public $url;
	public $defaultController;	
	public $server;

	public function __construct($configPackage = null){		
		if(!isset($configPackage)){
			$configPackage = App::getConfigPackage();
		}
		extract($configPackage);
		$this->configPackage = $configPackage;
		$this->pages = $config['components']['router']['rules'];
		$this->url = self::getUrl();
		$this->defaultController = $config['components']['router']['defaultController'];
		$this->server = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/";
	}

	public function addRoute($url, $pathToAction) {
		$this->pages[$url] = $pathToAction;
	}

	public function route($url = null) {
		if(!isset($url)){
			$url = $this->url;
		}
		$this->checkUrlUpperCase($url);
		$this->checkPreetyUrl($url);
		if(isset($this->pages[$url])){
			$path = $this->pages[$url];
		}else{
			if($url === "/"){
				$path = $url;			
			} else {
				$path = ltrim($url, "/");
			}
		}
		$this->checkIndex($path);
		$pathInArray = explode("/", $path, 2);
		if(isset($pathInArray[1])) {
			$controllerName = $this->getUpperName($pathInArray[0]);
			$action = $this->getUpperName($pathInArray[1], true);	
			$controllerFullName = "app\controllers\\".$controllerName."Controller";
		} else {						
			$controllerNameDirty = $path;
			$controllerName = $this->getUpperName($controllerNameDirty);
			$action = "actionIndex";
			$controllerFullName = "app\controllers\\".$controllerName."Controller";
		}
		$this->checkExistsAndRun($controllerFullName, $action);
	}

	public function redirect($url){
		if($preetyUrl = array_search($url, $this->pages)){
			$url = $preetyUrl;
		} 
		$fullUrl = $this->server . $url; 	
		header("Location: " . $fullUrl);
		die();
	}

	public static function getUrl() {
		$urlDirty = $_SERVER['REQUEST_URI'];
		if($urlDirty !== "/"){
			$url = rtrim($urlDirty, "/");
			// if($url === 'index'){
			// 	$url = '/';
			// }
		}else{
			$url = $urlDirty;
		}	
		return $url;
	}
	private function checkUrlUpperCase($url){		
		$url = mb_substr($url, 1);
		$urlLetters = str_split($url);
		foreach($urlLetters as $letter){
			if(ctype_upper($letter)){
				$newUrl = $this->server . strtolower($url); 
				header("Location: " . $newUrl);
				die();
			}
		}
	}

	private function checkPreetyUrl($url){
		if(in_array(ltrim($url, "/"), $this->pages)){
			(new ErrorHandler(ErrorHandler::$DEFAULT_ERROR, null, $this->configPackage))->renderError();
		}
	}

	private function checkIndex($path){
		if($path === "/" || $path === "index") {
			$action = "actionIndex";
			$controllerName = ucfirst(strtolower($this->defaultController));
			$controllerFullName = "app\controllers\\".$controllerName."Controller";	
			$this->checkExistsAndRun($controllerFullName, $action);

		}
	}

	private function getUpperName($notUpperName, $action = false){
		if(str_contains($notUpperName, "-")){
			$upperName = "";
			$nameParts = explode("-", $notUpperName);
			foreach($nameParts as $part){
				$upperName .= ucfirst($part);
			}
			if($action){
				$upperName = "action" . $upperName;
			}
		}else{
			if($action){
				$upperName = "action" . ucfirst($notUpperName);
			}else{
				$upperName = ucfirst($notUpperName);
			}			
		}
		return $upperName;
	}

	private function checkExistsAndRun($controllerFullName, $action){
		if (class_exists($controllerFullName)) {
    		$controller = new $controllerFullName;
    		if(method_exists($controller, $action)){
    			$controller->$action();
    			die();
    		}else{
    			(new ErrorHandler(ErrorHandler::$DEFAULT_ERROR, null, $this->configPackage))->renderError();
    		}  		
		}else{
			(new ErrorHandler(ErrorHandler::$DEFAULT_ERROR, null, $this->configPackage))->renderError();
		}
	}

	
}
// ['index' => 'main/index']
