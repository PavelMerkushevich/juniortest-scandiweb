<?php

namespace app\controllers;

class SiteController
{
    public function index()
    {
        echo 'Index!';
        (new \components\routing\Router)->redirect("site/about");
    }

    public function about()
    {
    	echo "About";
    }
    //TODO: сделай actionX и абстрактный класс контроллер с методом render()
}