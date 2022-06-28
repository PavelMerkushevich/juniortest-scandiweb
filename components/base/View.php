<?php

namespace components\base;

abstract class View
{
    abstract protected function render($view, $layout = null, $variables = []);
    abstract protected function renderView();
}