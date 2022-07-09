<?php

namespace Controllers;

use MVC\Router;

class MainController{
    public static function index(Router $router){

        // session_start();

        $router->render('main/index',[
            'nombre' => $_SESSION['nombre']
        ]);
    }
}