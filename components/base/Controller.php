<?php

namespace components\base;

abstract class Controller
{
    abstract public function actionIndex();

    abstract public function actionError(string $errCode, string $errText);

    abstract protected function render(string $view, array $variables = []);

    abstract protected function redirect(string $url);
}
