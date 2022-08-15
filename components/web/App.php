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


    public static function getPost(): ?array
    {
        if (isset($_POST) and $_SERVER["REQUEST_METHOD"] == "POST") {
            return $_POST;
        } else {
            return null;
        }
    }

}
