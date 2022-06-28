<?php

namespace app\controllers;

class AaaController
{
    public function actionIndex()
    {
        echo 'Index! aaa';
        //(new \components\routing\Router)->redirect("site/about");
    }

    public function actionAbout()
    {
    	echo "About";
    }

    public function actionTest(){
        echo "Test";
    }
    //TODO: сделай actionX и абстрактный класс контроллер с методом render()
}