<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\adminController;
use Controllers\ApiController;
use Controllers\citaController;
use Controllers\LoginController;
use Controllers\servicioController;
use MVC\Router;

$router = new Router();


//Iniciar Sesión
$router->get('/',[LoginController::class,'login']);
$router->post('/',[LoginController::class,'login']);
$router->get('/logout',[LoginController::class,'logout']);

//Recuperar Password

$router->get('/olvide',[LoginController::class,'olvide']);
$router->post('/olvide',[LoginController::class,'olvide']);
$router->get('/recuperar',[LoginController::class,'recuperar']);
$router->post('/recuperar',[LoginController::class,'recuperar']);

//crear cuenta

$router->get('/crear-cuenta',[LoginController::class,'crear']);
$router->post('/crear-cuenta',[LoginController::class,'crear']);

//Confirmar cuenta
$router->get('/confirmar-cuenta',[LoginController::class,'confirmar']);

$router->get('/mensaje',[LoginController::class,'mensaje']);

//zona privada
$router->get('/cita',[CitaController::class,'index']);
$router->get('/admin',[adminController::class,'index']);
//Api de citas
$router->get('/api/servicios',[ApiController::class,'index']);
$router->post('/api/citas',[ApiController::class,'guardar']);
$router->post('/api/eliminar',[ApiController::class,'eliminar']);

//CRUD de Servicios
$router->get('/servicios',[servicioController::class,'index']);
$router->get('/servicios/crear',[servicioController::class,'crear']);
$router->post('/servicios/crear',[servicioController::class,'crear']);
$router->get('/servicios/actualizar',[servicioController::class,'actualizar']);
$router->post('/servicios/actualizar',[servicioController::class,'actualizar']);
$router->post('/servicios/eliminar',[servicioController::class,'eliminar']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();