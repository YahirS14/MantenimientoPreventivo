<?php

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;
use Svg\Tag\UseTag;

class LoginController{
    public static function login(Router $router){

        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Usuario($_POST);

            $alertas = $auth->validarLogin();

            if(empty($alertas)){
                //Comprobar que exista el usuario
                $usuario = Usuario::where('email', $auth->email);

                if($usuario){
                    //Verificar usuario
                    if($usuario->comprobarPasswordAndVerificado($auth->password)){
                        session_start();

                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre . " " . $usuario->apellido;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['login'] = true;

                        if($usuario->confirmado === "1"){
                            header('Location: /main');
                        }


                        debuguear($_SESSION);
                    }
                }else{
                    Usuario::setAlerta('error', 'Este usuario no existe');
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/login', [
            'alertas' => $alertas
        ]);
    } 

    public static function logout(){
        session_start();
        $_SESSION = [];

        header('Location: /');
    }

    public static function olvide(Router $router){

        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Usuario($_POST);
            $alertas = $auth->validarEmail();

            if(empty($alertas)){
                $usuario = Usuario::where('email', $auth->email);

                if($usuario && $usuario->confirmado === "1"){
                    //Generar token
                    $usuario->crearToken();
                    $usuario->guardar();

                    //Enviar Email
                    $email = new Email($usuario->nombre, $usuario->email, $usuario->token);
                    $email->enviarInstruciones();

                    //Alerta de exito
                    Usuario::setAlerta('exito', 'Revisa tu correo');
                    
                }else{
                    Usuario::setAlerta('error', 'EL Usuario no existe o no esta confirmado');
                }
            }
        }

        $alertas = Usuario::getAlertas();



        $router->render('auth/olvide',[
            'alertas' => $alertas
        ]);
    }

    public static function recuperar(Router $router){

        $alertas = [];
        $error = false;
        $token = s($_GET['token']);

        //Buscar usuario por su token
        $usuario = Usuario::where('token', $token);

        if(empty($usuario)){
            Usuario::setAlerta('error', 'token no valido');
            $error = true;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //Leer el nuevo password y guardarlo
            $password  = new Usuario($_POST);

            $alertas = $password->validarPassword();

            if(empty($alertas)){
                $usuario->password = null;

                $usuario->password = $password->password;
                $usuario->hashPassword();
                $usuario->token = null;

                $resultado = $usuario->guardar();
                if($resultado){
                    header('Location: /');
                }

            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/recuperar',[
            'alertas' => $alertas,
            'error' => $error
        ]);
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

    public static function confirmar (Router $router){

        $alertas = [];

        $token = s($_GET['token']);

        // debuguear($token);  

        $usuario = Usuario::where('token', $token);

        if(empty($usuario)){
            //Mostrar mensaje de error
            Usuario::setAlerta('error', 'Token no valido');
        }else{
            //Modificar a usuario confirmado
            $usuario->confirmado = "1";
            $usuario->token = null;
            $usuario->guardar();
            Usuario::setAlerta('exito', 'Cuenta Confirmada Correctamente');
        }

        $alertas = Usuario::getAlertas();

        //Renderizar la vista
        $router->render('auth/confirmar-cuenta', [
            'alertas' => $alertas
        ]);
    }
}
   