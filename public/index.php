<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use Controllers\MainController;
use MVC\Router;

$router = new Router();

//Iniciar sesion
$router -> get('/', [LoginController::class, 'login']);
$router -> post('/', [LoginController::class, 'login']);

$router -> get('/logout', [LoginController::class, 'logout']);

//Recuperar password
$router -> get('/olvide', [LoginController::class, 'olvide']);
$router -> post('/olvide', [LoginController::class, 'olvide']);


$router -> get('/recuperar', [LoginController::class, 'recuperar']);
$router -> post('/recuperar', [LoginController::class, 'recuperar']);

//Crear cuenta
$router -> get('/registro', [LoginController::class, 'registro']);
$router -> post('/registro', [LoginController::class, 'registro']);

//Confirmar tu cuenta 
$router->get('/confirmar-cuenta', [LoginController::class, 'confirmar']);

$router->get('/mensaje', [LoginController::class, 'mensaje']);

//Sesion iniciada
$router->get('/main', [MainController::class, 'index']);

//Registros
$router->get('/nuevo-registro', [MainController::class, 'nuevoRegistro']);    
$router->post('/nuevo-registro', [MainController::class, 'nuevoRegistro']); 

//Lista de registros
$router->get('/lista', [MainController::class, 'listaRegistro']); 
$router->post('/lista', [MainController::class, 'listaRegistro']);

//Busqueda registros 
$router->get('/busqueda', [MainController::class, 'busquedaRegistro']); 
$router->post('/busqueda', [MainController::class, 'busquedaRegistro']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();