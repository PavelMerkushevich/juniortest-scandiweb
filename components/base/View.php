<?php

namespace components\base;

abstract class View {

    abstract protected function render($viewFile, $layoutFile, $variables = []);

    abstract protected function renderView();
}
