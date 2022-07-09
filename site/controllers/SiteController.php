<?php

namespace app\controllers;

use components\web\Controller;

class SiteController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

}
