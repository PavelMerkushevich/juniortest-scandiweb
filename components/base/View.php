<?php

namespace components\base;

abstract class View
{
    abstract public function render(string $pathToViewFile, string $pathToLayoutFile, array $variables, string $path);
}
