<?php

namespace Controllers;

use Model\Main;
use MVC\Router;

class MainController{

    public static function index(Router $router){
        // session_start();
      
        isAuth();

        $router->render('main/main',[
            'nombre' => $_SESSION['nombre']
        ]);
    }

    public static function nuevoRegistro(Router $router){

        $registro = new Main;
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $registro->sincronizar($_POST);
            //Validacion
            $alertas = $registro->validarRegistro();
             
            if(empty($alertas)){
                //guardar el registro
                $registro->guardar();

                
                //Redireccionar
                header('Location: /lista');
            }
        }

        isAuth();

        $router->render('main/nuevo-registro',[
            'registro' => $registro,
            'alertas' => $alertas
        ]);
    }

    public static function listaRegistro(Router $router){

        $registro = Main::todo();

        isAuth();

        $router->render('main/lista',[
            'registro' => $registro
        ]);
    }

    public static function busquedaRegistro(Router $router){


        $fecha = $_GET['fechaProgramada'] ?? date('Y-m-d');
        
        $fechas = explode('-', $fecha); 
        
        if(!checkdate($fechas[1], $fechas[2], $fechas[0])){
            header('Location: /404');
        }

        $busqueda = Main::where('fechaProgramada', $fecha);
        // debuguear($busqueda);
        isAuth();
        
        $router->render('main/busqueda', [
            'busqueda' => $busqueda
        ]);
    }
}