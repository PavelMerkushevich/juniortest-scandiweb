<?php

namespace components\web;

use components\web\AppConfig;
use components\web\View;

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
        $page = new View();
        $page->render($viewFile, $layoutFile, $variables);
    }

    private function getViewFile($view) {
        $controllerFullName = substr(strrchr(get_class($this), "\\"), 1);
        $controllerName = strstr($controllerFullName, "Controller", true);
        $controllerNameLetters = str_split(lcfirst($controllerName));
        $viewFolderName = "";
        foreach ($controllerNameLetters as $letter) {
            if (!ctype_upper($letter)) {
                $viewFolderName .= $letter;
            } else {
                $viewFolderName .= "-" . lcfirst($letter);
            }
        }
        return $_SERVER['DOCUMENT_ROOT'] . "/site/views/{$viewFolderName}/{$view}.php";
    }

    protected function redirect() {
        
    }

}
