<?php

namespace components\base;

abstract class Asset {

    abstract public function getHead($title);

    abstract public function getEndBody();
}
