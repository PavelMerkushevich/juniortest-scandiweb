<?php

namespace components\web;

use components\httpErrorsHandler\ErrorHandler;

class View extends \components\base\View{

  public $layout;
  public $view;
  private $errCode;
  private $errText;

  public function __construct() {
  	$this->layout = $_SERVER['DOCUMENT_ROOT'] . "/site/views/layout/main.php";
  }

  public function render($view, $layout = null, $variables = []) {
    extract($variables);
  	if(isset($errCode)){
  		$this->errCode = $errCode;
  		if(isset($errText)){
  			$this->errText = $errText;
  		}else{
  			$errHandler = new ErrorHandler($this->errCode);
  			$this->errText = $errHandler->getErrorText(); 
  		}
  	}
    if(isset($layout)){
      $this->layout = $layout;
    }
  	$this->view = $view;
    require_once $this->layout;
  }

  public function renderView()
  {
    require_once $this->view;
  }

}