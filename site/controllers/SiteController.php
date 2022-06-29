<?php

namespace app\controllers;

use components\web\Controller;

class SiteController extends Controller
{

    // public $layout = "s";

    public function actionIndex()
    {
        //echo 'Index!';
        //var_dump($this->config);
        
        $this->render('index');
        //(new \components\routing\Router)->redirect("site/about");
    }

    public function actionAbout()
    {
    	echo "About";
    }

    public function actionTest(){
        echo "Test";
    }
    //TODO: сделай абстрактный класс контроллер с методом render()
}