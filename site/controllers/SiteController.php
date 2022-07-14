<?php

namespace app\controllers;

use components\web\Controller;

class SiteController extends Controller
{

    public function actionIndex()
    {
        //$this->redirect('site/index');
        $this->render('index');
    }

    public function actionAddProduct()
    {
        $this->render('add-product');
    }


    public function actionAbout()
    {
        echo "About";
    }

}
