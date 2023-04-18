<?php

namespace Controllers;

use Model\proyecto;
use Model\Usuario;
use MVC\Router;

class DashboardController
{

  public static function index(Router $router)
  {

    session_start();
    isAuth();
    $id = $_SESSION['id'];

    $proyectos = proyecto::belongsto('propietarioId', $id);
    $router->render('dashboard/index', [
      'titulo' => 'Proyectos',
      'proyectos' => $proyectos
    ]);
  }

  public static function crear_proyecto(Router $router)
  {
    session_start();
    isAuth();
    $alertas = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $proyecto = new proyecto($_POST);
      $alertas = $proyecto->validarProyecto();

      if (empty($alertas)) {
        //Generar una unica url
        $hash = md5(uniqid());
        $proyecto->url = $hash;

        //almacenar al creador del proyecto
        $proyecto->propietarioId = $_SESSION['id'];
        //debuguear($proyecto);
        //guardar el proyecto
        $proyecto->guardar();

        //redireccionar
        header('Location: /proyecto?id=' . $proyecto->url);
      }
    }

    $router->render('dashboard/crear-proyecto', [
      'alertas' => $alertas,
      'titulo' => 'Crear Proyecto'
    ]);
  }

  public static function proyecto(Router $router)
  {

    session_start();
    isAuth();
    $token = $_GET['id'];
    if (!$token) header('Location: /dashboard');
    //revisar que la presona que visita el proyecto, es quien la creo
    $proyecto = proyecto::where('url', $token);
    if ($proyecto->propietarioId !== $_SESSION['id']) {
      header('Location: /dashboard');
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    }
    $router->render('dashboard/proyecto', [
      'titulo' => $proyecto->proyecto,
    ]);
  }

  public static function perfil(Router $router)
  {
    session_start();
    isAuth();
    $alertas = [];

    $usuario = Usuario::find($_SESSION['id']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $usuario->sincronizar($_POST);
      $alertas = $usuario->validar_perfil();

      if (empty($alertas)) {

        $existeUsuario = Usuario::where('email', $usuario->email);

        if ($existeUsuario && $existeUsuario->id !== $usuario->id) {
          Usuario::setAlerta('error', 'Email no valido, ya pertenece a otra cuenta ');
          $alertas = $usuario->getAlertas();
        } else {
          //guardar el usuario
          $usuario->guardar();
          Usuario::setAlerta('exito', 'guardado correctamente');
          $alertas = $usuario->getAlertas();
          //Asignar el nombre nuevo a la barra 
          $_SESSION['nombre'] = $usuario->nombre;
        }
      }
    }
    $router->render('dashboard/perfil', [
      'titulo' => 'Perfil',
      'usuario' => $usuario,
      'alertas' => $alertas
    ]);
  }

  public static function cambiar_pasword(Router $router)
  {
    session_start();
    isAuth();
    $alertas = [];


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $usuario = Usuario::find($_SESSION['id']);

      //sincornizar con los datos del usuarios
      $usuario->sincronizar($_POST);

      $alertas = $usuario->nuevo_password();

      if (empty($alertas)) {
        $resultado = $usuario->comprobar_password();

        if ($resultado) {
          $usuario->password = $usuario->password_nuevo;

          //eliminar propiedades No necesarias

          unset($usuario->password_actual);
          unset($usuario->password_nuevo);
          unset($usuario->password2);
          //Hasear el password
          $usuario->hashPassword();
          //actualizar
          $resultado = $usuario->guardar();

          if ($resultado) {
            Usuario::setAlerta('exito', 'actualizado Correctamente');
            $alertas = $usuario->getAlertas();
          }
        } else {
          Usuario::setAlerta('error', 'Password Incorrecto');
          $alertas = $usuario->getAlertas();
        }

        //debuguear($usuario);
      }
    }
    $router->render('dashboard/cambiar-password', [
      'alertas' => $alertas,
      'titulo' => 'Cambiar el password'
    ]);
  }
}
