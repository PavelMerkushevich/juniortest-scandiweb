<?php

namespace components\web;

class Asset extends \components\base\Asset {

    protected $css;
    protected $js;
    protected $cssBlock;
    protected $jsBlock;

    public function __construct($pathToThisView) {
        foreach ($this->css as $pathToFileView => $files) {
            if ($pathToFileView === "global" || $pathToFileView === $pathToThisView) {
                foreach ($files as $file) {
                    $path = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . "/web/{$file}";
                    $this->cssBlock .= "<link rel='stylesheet' href='{$path}'>";
                }
            }
        }
        foreach ($this->js as $pathToFileView => $files) {
            if ($pathToFileView === "global" || $pathToFileView === $pathToThisView) {
                foreach ($files as $file) {
                    $path = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . "/web/{$file}";
                    $this->jsBlock .= "<script src='{$path}'></script>";
                }
            }
        }
    }

    public function getHead($title) {
        $head = $this->cssBlock . "<title>{$title}</title>";
        return $head;
    }

    public function getEndBody() {
        $endBody = $this->jsBlock;
        return $endBody;
    }

}
