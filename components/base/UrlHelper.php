<?php

namespace components\base;

abstract class UrlHelper {

    abstract public static function getLink($url);

    abstract public static function getThisPageUrl();

    abstract public static function getFullUrl($url);
}
