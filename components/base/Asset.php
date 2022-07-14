<?php

namespace components\base;

abstract class Asset
{
    abstract public function getHead(string $title);

    abstract public function getEndBody();
}
