<?php

namespace components\web;

class Asset extends \components\base\Asset
{
    protected array $css;
    protected array $js;
    protected string $cssBlock = "";
    protected string $jsBlock = "";

    public function __construct(string $pathToThisView)
    {
        foreach ($this->css as $pathToFileView => $files) {
            if ($pathToFileView === "global" || $pathToFileView === $pathToThisView) {
                foreach ($files as $file) {
                    $path = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . "/web/$file";
                    $this->cssBlock .= "<link rel='stylesheet' href='$path'>";
                }
            }
        }
        foreach ($this->js as $pathToFileView => $files) {
            if ($pathToFileView === "global" || $pathToFileView === $pathToThisView) {
                foreach ($files as $file) {
                    $path = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . "/web/$file";
                    $this->jsBlock .= "<script src='$path'></script>";
                }
            }
        }
    }

    public function getHead(string $title): string
    {
        if ($title !== "") {
            $head = $this->cssBlock . "<title>$title</title>";
        } else {
            $head = $this->cssBlock;
        }
        return $head;
    }

    public function getEndBody(): string
    {
        $endBody = $this->jsBlock;
        return $endBody;
    }
}
