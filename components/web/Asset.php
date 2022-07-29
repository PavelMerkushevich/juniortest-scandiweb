<?php

namespace components\web;

class Asset extends \components\base\Asset
{
    protected array $css = [];
    protected array $js = [];
    protected string $cssBlock = "";
    protected string $jsBlock = "";

    public function __construct(string $pathToThisView)
    {
        foreach ($this->css as $pathToFileView => $files) {
            if ($pathToFileView === "global" || $pathToFileView === $pathToThisView) {
                foreach ($files as $file => $attrs) {
                    $path = $this->getPathToFile($file);
                    $attrsBlock = is_array($attrs) ? $this->getAttrsBlock($attrs) : null;
                    $this->cssBlock .= "<link rel='stylesheet' href='$path' $attrsBlock>";
                }
            }
        }
        foreach ($this->js as $pathToFileView => $files) {
            if ($pathToFileView === "global" || $pathToFileView === $pathToThisView) {
                foreach ($files as $file => $attrs) {
                    $path = $this->getPathToFile($file);
                    $attrsBlock = is_array($attrs) ? $this->getAttrsBlock($attrs) : null;
                    $this->jsBlock .= "<script src='$path' $attrsBlock></script>";
                }
            }
        }
    }

    private function getPathToFile(string $file): string
    {
        if (stripos($file, "https") === 0 || stripos($file, "http") === 0) {
            $path = $file;
        } else {
            $path = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . "/web/$file";
        }
        return $path;
    }

    private function getAttrsBlock(array $attrs): string
    {
        $atrrsBlock = "";
        foreach ($attrs as $attrName => $attrValue) {
            if(is_int($attrName)){
                $atrrsBlock .= "$attrValue ";
            }else{
                $atrrsBlock .= "$attrName='$attrValue' ";
            }
        }
        return $atrrsBlock;
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
