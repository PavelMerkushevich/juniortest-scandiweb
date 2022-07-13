<?php

namespace components\web;

class Asset extends \components\base\Asset {
    
    public $css;
    public $js;
    public $cssBlock;
    public $jsBlock;

    public function register() {
        foreach ($this->css as $file) {
            $path = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . "/site/assets/files/{$file}";
            $this->cssBlock .= "<link rel='stylesheet' href='{$path}'>";
        }
        
        foreach ($this->js as $file) {
            $path = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . "/site/assets/files/{$file}";
            $this->jsBlock .= "<script src='{$path}'></script>";
        }
    }
}


//TODO: создай папку web в корне проекта и положи туда index.php и файлы из assets/files