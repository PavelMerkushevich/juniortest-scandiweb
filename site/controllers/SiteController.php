<?php

namespace app\controllers;

use components\web\App;
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

    public function actionAddProductHandler()
    {
        $post = App::getPost();
        if (isset($post)) {
            foreach ($post as $key => $item) {
                echo $key. "=>". $item . " ";
            }
        }
    }


    public function actionAbout()
    {
        echo "About";
    }

}
