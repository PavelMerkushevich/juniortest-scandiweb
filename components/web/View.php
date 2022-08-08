<?php

namespace components\web;

class View extends \components\base\View
{

    private string $content;
    private string $path;
    private Asset $asset;
    private string $title;

    public function render(string $pathToViewFile, string $pathToLayoutFile, array $variables, string $path): void
    {
        foreach ($variables as $varName => $varValue) {
            $this->$varName = $varValue;
        }
        $this->content = $this->getView($pathToViewFile);
        $this->path = $path;
        $this->renderLayout($pathToLayoutFile);
    }

    private function renderLayout(string $pathToLayoutFile): void
    {
        require $pathToLayoutFile;
    }

    private function getView(string $pathToLayoutFile): string
    {
        ob_start();
        require $pathToLayoutFile;
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
