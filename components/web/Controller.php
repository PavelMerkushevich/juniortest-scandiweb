<?php

namespace components\web;

class Controller extends \components\base\Controller
{
    abstract protected function actionIndex();
    abstract protected function render();
    abstract protected function redirect();
}