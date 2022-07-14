<?php

namespace components\base;

abstract class View {

    abstract public function render($viewFile, $layoutFile, $variables, $path);

    abstract public function head();

    abstract public function endBody();
}
