<?php

namespace components\web;

use components\web\AppConfig;
use components\web\View;
use components\routing\Router;

class Controller extends \components\base\Controller {

    private $config;
    protected $defaultLayout;

    public function __construct() {
        $this->config = (new AppConfig())->getConfig();
        $this->defaultLayout = $this->config['components']['controller']['defaultLayout'];
    }

    public function actionIndex() {
        $defaultIndexView = $this->config['components']['controller']['defaultIndexView'];
        $this->render($defaultIndexView);
    }

    public final function actionError($errCode, $errText) {
        $errorView = $this->config['components']['controller']['errorView'];
        $this->render($errorView, compact('errCode', 'errText'));
    }

    protected function render($view, $variables = []) {
        $layout = isset($this->layout) ? $this->layout : $this->defaultLayout;
        $layoutFile = $_SERVER['DOCUMENT_ROOT'] . "/site/views/layout/{$layout}.php";
        $viewFile = $this->getViewFile($view);
        $path = $this->getControllerNameInLC() . "/{$view}";
        $page = new View();
        $page->render($viewFile, $layoutFile, $variables, $path);
    }

    protected function redirect($url) {
        Router::redirect($url);
    }

    private function getViewFile($view) {
        $viewFolderName = $this->getControllerNameInLC();
        return $_SERVER['DOCUMENT_ROOT'] . "/site/views/{$viewFolderName}/{$view}.php";
    }

    private function getControllerNameInLC() {
        $controllerFullName = substr(strrchr(get_class($this), "\\"), 1);
        $controllerName = strstr($controllerFullName, "Controller", true);
        $controllerNameLetters = str_split(lcfirst($controllerName));
        $controllerNameInLC = "";
        foreach ($controllerNameLetters as $letter) {
            if (!ctype_upper($letter)) {
                $controllerNameInLC .= $letter;
            } else {
                $controllerNameInLC .= "-" . lcfirst($letter);
            }
        }
        return $controllerNameInLC;
    }

}
