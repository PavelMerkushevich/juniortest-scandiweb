<?php

namespace components\web;

class View extends \components\base\View {

    private $layoutFile;
    private $viewFile;
    private $path;
    private $view;
    private $asset;
    private $title;

    public function render($viewFile, $layoutFile, $variables, $path) {
        foreach ($variables as $varName => $varValue) {
            $this->$varName = $varValue;
        }
        $this->viewFile = $viewFile;
        $this->layoutFile = $layoutFile;
        $this->path = $path;      
        $this->view = $this->getView();
        $this->renderLayout();
    }

    private function renderView() {
        echo $this->view;
    }

    private function renderLayout() {
        require $this->layoutFile;
    }

    private function getView() {
        ob_start();
        require $this->viewFile;
        $this->title = TITLE;
        return ob_get_clean();
    }

    public function head() {
        echo $this->asset->getHead($this->title);
    }

    public function endBody() {
        echo $this->asset->getEndBody();
    }

}
