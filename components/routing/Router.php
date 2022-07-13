<?php

namespace components\routing;

use components\httpErrorsHandler\ErrorHandler;
use components\routing\UrlHelper;
use components\web\AppConfig;

class Router extends \components\base\Router {

    private $customUrl = [];
    public $url;
    public $defaultController;
    public $site;

    public function __construct() {
        $config = (new AppConfig())->getConfig();
        $this->customUrl = $config['components']['router']['rules'];
        $this->url = UrlHelper::getThisPageUrl();
        $this->defaultController = $config['components']['router']['defaultController'];
        $this->site = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . "/";
    }

    public function addRoute($url, $pathToAction) {
        $this->customUrl[$url] = $pathToAction;
    }

    public function route() {
        $url = $this->url;
        $this->checkUrlUpperCase($url);
        $this->checkCustomUrl($url);
        $path = $this->getPath($url);
        $this->checkIndex($path);
        $pathInArray = explode("/", $path, 2);
        if (isset($pathInArray[1])) {
            $controllerName = $this->getUpperName($pathInArray[0]);
            $action = $this->getUpperName($pathInArray[1], true);
            $controllerFullName = "app\controllers\\" . $controllerName . "Controller";
        } else {
            $controllerNameDirty = $path;
            $controllerName = $this->getUpperName($controllerNameDirty);
            $action = "actionIndex";
            $controllerFullName = "app\controllers\\" . $controllerName . "Controller";
        }
        $this->checkExistsAndRun($controllerFullName, $action);
    }

    public static function redirect($url) {
        $fullUrl = UrlHelper::getFullUrl($url);
        header("Location: " . $fullUrl);
        die();
    }

    private function checkUrlUpperCase($url) {
        $trimmedUrl = mb_substr($url, 1);
        $urlLetters = str_split($trimmedUrl);
        foreach ($urlLetters as $letter) {
            if (ctype_upper($letter)) {
                $newUrl = $this->site . strtolower($url);
                header("Location: " . $newUrl);
                die();
            }
        }
    }

    private function checkCustomUrl($url) {
        if (in_array(mb_substr($url, 1), $this->customUrl)) {
            (new ErrorHandler(ErrorHandler::$DEFAULT_ERROR))->renderError();
        }
    }
    
    private function getPath($url) {
        if (isset($this->customUrl[$url])) {
            $path = $this->customUrl[$url];
        } else {
            if ($url === "/") {
                $path = $url;
            } else {  
                $path = mb_substr($url, 1);
            }
        }
        return $path;
    }

    private function checkIndex($path) {
        if ($path === "/" || $path === "index") {
            $action = "actionIndex";
            $controllerName = ucfirst($this->defaultController);
            $controllerFullName = "app\controllers\\" . $controllerName . "Controller";
            $this->checkExistsAndRun($controllerFullName, $action);
        }
    }

    private function getUpperName($notUpperName, $action = false) {
        if (str_contains($notUpperName, "-")) {
            $nameParts = explode("-", $notUpperName);
            $upperName = "";
            foreach ($nameParts as $part) {
                $upperName .= ucfirst($part);
            }
            if ($action) {
                $upperName = "action" . $upperName;
            }
        } else {
            if ($action) {
                $upperName = "action" . ucfirst($notUpperName);
            } else {
                $upperName = ucfirst($notUpperName);
            }
        }
        return $upperName;
    }

    private function checkExistsAndRun($controllerFullName, $action) {
        if (class_exists($controllerFullName)) {
            $controller = new $controllerFullName();
            if (method_exists($controller, $action)) {
                $controller->$action();
                die();
            } else {
                (new ErrorHandler(ErrorHandler::$DEFAULT_ERROR))->renderError();
            }
        } else {
            (new ErrorHandler(ErrorHandler::$DEFAULT_ERROR))->renderError();
        }
    }

}
