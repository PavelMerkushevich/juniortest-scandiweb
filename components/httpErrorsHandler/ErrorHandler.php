<?php

namespace components\httpErrorsHandler;

use components\web\AppConfig;
use components\web\View;

class ErrorHandler {

    protected $config;
    private $errCode;
    private $errText;
    public static $DEFAULT_ERROR = 404;

    public function __construct($errCode, $errText = null) {
        $this->config = (new AppConfig())->getConfig();
        $this->errCode = $errCode;
        $this->errText = isset($errText) ? $errText : "This page not available. Error: " . $errCode;
    }

    public function getErrorText() {
        return $this->errText;
    }

    public function renderError() {
        $path = $this->config['components']['httpErrorsHandler']['defaultAction'];
        $pathInArray = explode("/", $path, 2);
        $controllerFullName = "app\controllers\\" . ucfirst($pathInArray[0]) . "Controller";
        $action = "action" . ucfirst($pathInArray[1]);
        $controller = new $controllerFullName();
        $controller->$action($this->errCode, $this->errText);
        // $errorPage = new View;
        // $errorView = $_SERVER['DOCUMENT_ROOT'] . '/components/httpErrorsHandler/ErrorPage.php';
        // $errorPage->render($errorView, null, $this->errCode, $this->errText);
        // die();
    }

}
