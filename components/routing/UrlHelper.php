<?php

namespace components\routing;

use components\web\AppConfig;

class UrlHelper extends \components\base\UrlHelper {

    public static function getLink($url) {
        $fullUrl = self::getFullUrl($url);
        echo $fullUrl;
    }

    public static function getThisPageUrl() {
        $urlDirty = $_SERVER['REQUEST_URI'];
        $lastCharacter = mb_substr($urlDirty, -1);
        if ($urlDirty !== "/" && $lastCharacter === "/") {
            $url = mb_substr($urlDirty, 0, -1);
        } else {
            $url = $urlDirty;
        }
        return $url;
    }

    public static function getFullUrl($url) {
        $config = (new AppConfig())->getConfig();
        $customPages = $config['components']['router']['rules'];
        if (in_array($url, $customPages)) {
            $url = array_search($url, $customPages);
            $site = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . "";
        } else {
            $site = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . "/";
        }
        $fullUrl = $site . $url;
        return $fullUrl;
    }
    
    // HtmlHelper class: public function a($url, $content, $attributes) 

}
