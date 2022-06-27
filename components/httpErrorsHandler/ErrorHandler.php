<?php

namespace components\httpErrorsHandler;

use components\base\View;

class ErrorHandler {

	private $errCode;
	private $errText;
	public static $DEFAULT_ERROR = 404;

	public function __construct($errCode, $errText = null){
		$this->errCode = $errCode;
		$this->errText = isset($errText) ? $errText : "This page not available. Error: ".$errCode;		
	}

	public function getErrorText(){
		return $this->errText;
	}

	public function renderError(){
		$errorPage = new View;
		$errorLayout = $_SERVER['DOCUMENT_ROOT'] . '/components/httpErrorsHandler/ErrorPage.php';
		$errorPage->render($errorLayout, null, $this->errCode);
		die();
	}
}