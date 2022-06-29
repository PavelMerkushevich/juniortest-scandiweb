<?php

namespace components\base;

abstract class View
{
    private $layoutFile;
    private $viewFile;
    
    abstract protected function render($viewFile, $layoutFile, $variables = []);
    abstract protected function renderView();
}