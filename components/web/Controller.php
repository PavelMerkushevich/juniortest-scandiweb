<?php

namespace components\web;

use components\routing\Router;

class Controller extends \components\base\Controller
{

    private array $config;
    protected string $defaultLayout;

    public function __construct()
    {
        $this->config = (new AppConfig())->getConfig();
        $this->defaultLayout = $this->config['components']['controller']['defaultLayout'];
    }

    public function actionIndex()
    {
        $defaultIndexView = $this->config['components']['controller']['defaultIndexView'];
        $this->render($defaultIndexView);
    }

    public final function actionError(string $errCode, string $errText): void
    {
        $errorView = $this->config['components']['controller']['errorView'];
        $this->render($errorView, compact('errCode', 'errText'));
    }

    protected function render(string $view, array $variables = []): void
    {
        $layout = $this->layout ?? $this->defaultLayout;
        $pathToLayoutFile = $_SERVER['DOCUMENT_ROOT'] . "/site/views/layout/$layout.php";
        $pathToViewFile = $this->getViewFile($view);
        $pathToView = $this->getControllerNameInLC() . "/$view";
        $page = new View();
        $page->render($pathToViewFile, $pathToLayoutFile, $variables, $pathToView);
        die();
    }

    protected function redirect(string $url): void
    {
        Router::redirect($url);
    }

    private function getViewFile(string $view): string
    {
        $viewFolderName = $this->getControllerNameInLC();
        return $_SERVER['DOCUMENT_ROOT'] . "/site/views/$viewFolderName/$view.php";
    }

    private function getControllerNameInLC(): string
    {
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
