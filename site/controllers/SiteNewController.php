<?php

namespace app\controllers;

class SiteNewController
{
    public function actionIndex()
    {
        echo 'Index! New';
        //(new \components\routing\Router)->redirect("site/about");
    }

    public function actionAboutNew()
    {
    	echo "About New";
    }

    public function actionTest(){
        echo "Test";
    }
    //TODO: сделай actionX и абстрактный класс контроллер с методом render()
}
