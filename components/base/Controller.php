<?php

namespace components\base;

abstract class Controller
{
    abstract protected function actionIndex();
    abstract protected function render();
    abstract protected function redirect();
}