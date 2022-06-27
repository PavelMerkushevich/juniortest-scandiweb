<?php

namespace components\routing;

use components\httpErrorsHandler\ErrorHandler;
use components\web\App;

class Router {
	private $pages = [];
	public $url;
	public $defaultController = "site";

	public function __construct($config = null){
		
		$config = isset($config) ? $config : App::getConfig();
		$this->pages = $config['components']['router']['rules'];
		$this->url = self::getUrl();
	}

	public function addRoute($url, $pathToAction) {
		$this->pages[$url] = $pathToAction;
	}

	public function route($url = null) {
		$url = isset($url) ? $url : $this->url;
		$this->checkPreetyUrl($url);
		$path = isset($this->pages[$url]) ? $this->pages[$url] : $url;
		$pathInArray = explode("/", $path, 2);
		//TODO: можешь реализовать вложенность контроллеров в папках ->  
		// убери 2 и сделай проверку массива на количество значений ->
		// подставь их в путь к контроллеру
		if(isset($pathInArray[1])) {
			$this->checkUrlUpperCase($pathInArray[1], $pathInArray[0]);
			$controllerName = ucfirst(strtolower($pathInArray[0]));
			$action = strtolower($pathInArray[1]);
			$controllerFullName = "app\controllers\\".$controllerName."Controller";
		} else {
			$this->checkUrlUpperCase($path);						
			if($path === "index") {
				$action = strtolower($path);
				$controllerName = ucfirst(strtolower($this->defaultController));
				$controllerFullName = "app\controllers\\".$controllerName."Controller";		
			}else{
                (new ErrorHandler(ErrorHandler::$DEFAULT_ERROR))->renderError();
			}

		}
		if (class_exists($controllerFullName)) {
    		$controller = new $controllerFullName;
    		if(method_exists($controller, $action)){
    			$controller->$action();
    		}else{
    			(new ErrorHandler(ErrorHandler::$DEFAULT_ERROR))->renderError();
    		}  		
		}else{
			(new ErrorHandler(ErrorHandler::$DEFAULT_ERROR))->renderError();
		}

	}

	public function redirect($url){
		if($newUrl = array_search($url, $this->pages)){
			$url = $newUrl;
		} 
		$server = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/";
		$new_url = $server . $url; 
		
		header("Location: " . $new_url);
		die();
	}

	public static function getUrl() {
		$urlDirty = $_SERVER['REQUEST_URI'];
		if($urlDirty === '/'){
			$url = "index";
		}else{
			$url = rtrim(ltrim($urlDirty, '/'),'/');
		}		
		return $url;
	}

	private function checkPreetyUrl($url){
		if(in_array($url, $this->pages)){
			(new ErrorHandler(ErrorHandler::$DEFAULT_ERROR))->renderError();
		}
	}

	private function checkUrlUpperCase($actionName, $controllerName = null){
		if(isset($controllerName)){
			$controllerNameLetters = str_split($controllerName);
			foreach($controllerNameLetters as $letter){
				if(ctype_upper($letter)){
					$server = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/";
					$new_url = $server . strtolower($controllerName) . "/" . strtolower($actionName); 
					header("Location: " . $new_url);
					die();
				}
			}
		}	

		$actionNameLetters = str_split($actionName);
		foreach($actionNameLetters as $letter){
			if(ctype_upper($letter)){
				$server = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/";
				$new_url = isset($controllerName)? $server . $controllerName . "/" . strtolower($actionName) : $server . strtolower($actionName); 
				header("Location: " . $new_url);
				die();
			}
		}
	}
}
// ['index' => 'main/index']
