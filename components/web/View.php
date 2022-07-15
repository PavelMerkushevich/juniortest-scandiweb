<?php

namespace components\web;

class View extends \components\base\View
{

    private string $pathToLayoutFile;
    private string $pathToViewFile;
    private string $path;
    private Asset $asset;
    private string $title;

    public function render(string $pathToViewFile, string $pathToLayoutFile, array $variables, string $path): void
    {
        foreach ($variables as $varName => $varValue) {
            $this->$varName = $varValue;
        }
        $this->pathToViewFile = $pathToViewFile;
        $this->pathToLayoutFile = $pathToLayoutFile;
        $this->path = $path;
        $this->renderLayout();
    }

    private function renderLayout(): void
    {
        $content = $this->getView();
        require $this->pathToLayoutFile;
    }

    private function getView(): string
    {
        ob_start();
        require $this->pathToViewFile;
        return ob_get_clean();
    }

    private function head(): string
    {
        $title = $this->title ?? "";
        return $this->asset->getHead($title);
    }

    private function endBody(): string
    {
        return $this->asset->getEndBody();
    }

}
