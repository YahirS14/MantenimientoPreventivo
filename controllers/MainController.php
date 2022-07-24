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

        $busqueda = Main::sql('fechaProgramada', $fecha);
        // debuguear($busqueda);
        isAuth();
        
        $router->render('main/busqueda', [
            'busqueda' => $busqueda
        ]);
    }

    public static function actualizarRegistro(Router $router){

        $id = is_numeric($_GET["id"]);
        if(!$id) return;
        $registro = Main::find($_GET["id"]);
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $registro->sincronizar($_POST);

            $alertas = $registro->validarRegistro();

            if(empty($alertas)){
                $registro->guardar();
                header('Location: /lista');
            }
        }


        isAuth();
        $router->render('main/actualizar-regitro', [
            'registro' => $registro,
            'alertas' => $alertas
        ]);
    }
    public static function eliminarRegistro(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $registro = Main::find($_POST['id']);
            $registro->eliminar();
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
    }
}