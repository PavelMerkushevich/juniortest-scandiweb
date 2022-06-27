<?php

namespace components\base;

use Components\HttpErrorsHandler\ErrorHandler;

class View {

  public $layout;
  public $view;
  private $errCode;
  private $errText;

  public function __construct() {
  	$this->layout = $_SERVER['DOCUMENT_ROOT'] . "/site/views/layout/main.php";
  }

  public function render($view, $layout = null, $errCode = null, $errText = null) {
  	if(isset($errCode)){
  		$this->errCode = $errCode;
  		if(isset($errText)){
  			$this->errText = $errText;
  		}else{
  			$errHandler = new ErrorHandler($this->errCode);
  			$this->errText = $errHandler->getErrorText(); 
  		}
  	}
  	$this->layout = isset($layout) ? $layout : $this->layout;
  	$this->view = $view;
    require_once $this->layout;
  }

  public function renderView()
  {
    require_once $this->view;
  }

}