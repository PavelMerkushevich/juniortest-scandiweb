<?php

namespace components\httpErrorsHandler;

use components\web\AppConfig;

class ErrorHandler extends \components\base\ErrorHandler
{

    protected array $config;
    private string $errCode;
    private string $errText;
    public static int $DEFAULT_ERROR = 404;

    public function __construct(string $errCode, string $errText = null)
    {
        $this->config = (new AppConfig())->getConfig();
        $this->errCode = $errCode;
        $this->errText = $errText ?? "This page not available. Error: " . $errCode;
    }

    public function getErrorText(): string
    {
        return $this->errText;
    }

    public function renderError(): void
    {
        $path = $this->config['components']['httpErrorsHandler']['defaultAction'];
        $pathInArray = explode("/", $path, 2);
        $controllerFullName = "app\controllers\\" . ucfirst($pathInArray[0]) . "Controller";
        $action = "action" . ucfirst($pathInArray[1]);
        $controller = new $controllerFullName();
        $controller->$action($this->errCode, $this->errText);
    }

}
