<?php

namespace components\base;

abstract class Controller {

    abstract public function actionIndex();

    abstract public function actionError($errCode, $errText);

    abstract protected function render($view, $variables = []);

    abstract protected function redirect();
}
