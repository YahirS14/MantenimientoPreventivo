<?php

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class LoginController{
    public static function login(Router $router){
        $router->render('auth/login');
    } 

    public static function logout(){
        echo 'desde logout';
    }

    public static function olvide(Router $router){
        $router->render('auth/olvide');
    }

    public static function recuperar(){
        echo 'desde recuperar';
    }

    public static function registro(Router $router){
        $usuario = new Usuario;

        //Alertas vacias
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            if(empty($alertas)){
                //Verificar que el usuario no este registrado
                $resultado = $usuario->existeUsuario();

                if($resultado->num_rows){
                    $alertas = Usuario::getAlertas();
                }else{ 
                    //Hashear el password
                    $usuario->hashPassword();

                    //Gerenar token unico
                    $usuario->crearToken();

                    //Enviar el email
                    $email = new Email( $usuario->email, $usuario->nombre,
                    $usuario->token);

                    $email->enviarConfirmacion();
                    
                    //Crar el usuario
                    $resultado = $usuario->guardar();

                    if($resultado){
                        header('Location: /mensaje');
                    }
                    // debuguear($usuario);
                }
            }
        }

        $router->render('auth/registro', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function mensaje (Router $router){
        $router->render('auth/mensaje');
    }

}
   