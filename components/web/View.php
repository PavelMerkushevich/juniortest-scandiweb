<?php

namespace components\web;

use components\httpErrorsHandler\ErrorHandler;

class View extends \components\base\View{

  private $layoutFile;
  private $viewFile;

  public function __construct() {
  	// $this->layout = $_SERVER['DOCUMENT_ROOT'] . "/site/views/layout/main.php";
  }

  public function render($viewFile, $layoutFile, $variables = []) {
    foreach ($variables as $varName => $varValue) {
      $this->$varName = $varValue;
    }
  	$this->viewFile = $viewFile;
    $this->layoutFile = $layoutFile;
    require_once $this->layoutFile;
  }

  public function renderView()
  {
    require_once $this->viewFile;
  }

}