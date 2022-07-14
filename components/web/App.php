<?php

namespace components\web;

use components\routing\Router;

class App extends \components\base\App
{

    public function run(): void
    {
        $router = new Router();
        $router->route();
    }

}
