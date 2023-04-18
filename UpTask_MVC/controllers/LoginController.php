<?php

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class LoginController
{

    public static function login(ROUTER $router)
    {
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario($_POST);
            $alertas = $usuario->validarLogin();

            if (empty($alertas)) {
                $usuario = Usuario::where('email', $usuario->email);
                //debuguear($usuario);
                if (!$usuario || !$usuario->confirmado) {
                    $alertas = Usuario::setAlerta('error', 'El usuario no existe o no esta verificado');
                } else {
                    //verificar que el usuario existe
                    if (password_verify($_POST['password'], $usuario->password)) {
                        //Iniciar la session
                        session_start();
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['login'] = true;
                        //debuguear($_SESSION);
                        header('Location: /dashboard');

                    } else {
                        $alertas = Usuario::setAlerta('error', 'password incorrecto');
                    }
                }
            }
        }
        $alertas = Usuario::getAlertas();
        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesión',
            'alertas' => $alertas
        ]);
    }

    public static function logout()
    {
        session_start();
        $_SESSION = [];
        header('Location: /');
    }


    public static function crear(Router $router)
    {
        $alertas = [];
        $usuario = new Usuario;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();
            // debuguear($alertas);
            if (empty($alertas)) {
                $existeUsuario = Usuario::where('email', $usuario->email);

                if ($existeUsuario) {
                    Usuario::setAlerta('error', 'El usuario ya esta registrado');
                    $alertas = Usuario::getAlertas();
                } else {
                    //Hashear el password
                    $usuario->hashPassword();

                    //elimina password2
                    unset($usuario->password2);

                    //Generar el token
                    $usuario->crearToken();

                    //crear Nuevo usuario
                    $resultado = $usuario->guardar();

                    //Enviar email
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarConfirmacion();


                    if ($resultado) {
                        header('Location: /mensaje');
                    }
                    //debuguear($usuario);
                }
            }
        }


        $router->render('auth/crear', [
            'titulo' => 'Crea tu cuenta en UpTask',
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function olvide(Router $router)
    {
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario = new Usuario($_POST);
            $alertas = $usuario->validarEmail();

            if (empty($alertas)) {
                //buscar el usuario
                $usuario = Usuario::where('email', $usuario->email);

                if ($usuario && $usuario->confirmado === '1') {
                    //Generar un Token 
                    $usuario->crearToken();
                    // $usuario->confimardo = 0;
                    unset($usuario->password2);

                    //actualizar el usuario
                    $usuario->guardar();
                    //Enviar el email
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarInstucciones();
                    //Imprimir la alerta
                    Usuario::setAlerta('exito', 'hemos enviado instrcciones a tu email');
                    //debuguear($usuario);
                } else {
                    Usuario::setAlerta('error', 'El usuario no existe o no esta confirmado');
                }
            }
        }
        $alertas = Usuario::getAlertas();
        $router->render('auth/olvide', [
            'titulo' => 'olvide mi Password',
            'alertas' => $alertas
        ]);
    }


    public static function reestablecer(Router $router)
    {

        $token = s($_GET['token']);
        $mostrar = true;
        if (!$token) header('Location: /');

        $usuario = Usuario::where('token', $token);

        if (empty($usuario)) {
            Usuario::setAlerta('error', 'Token no valido');
            $mostrar = false;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //añadir el nuevo password
            $usuario->sincronizar($_POST);
            //validar el password
            $alertas = $usuario->validarPassword();


            if (empty($alertas)) {
                //hashear el nuevo password
                $usuario->hashPassword();
                //eliminar el token
                $usuario->token = null;
                unset($usuario->password2);
                //guardar el usuario
                $resultado = $usuario->guardar();
                //redireccionar
                if ($resultado) {
                    header('Location: /');
                }
                debuguear($usuario);
            }
        }

        $alertas = Usuario::getAlertas();
        $router->render('auth/reestablecer', [
            'titulo' => 'Reestablecer Password',
            'alertas' => $alertas,
            'mostrar' => $mostrar
        ]);
    }

    public static function mensaje(Router $router)
    {

        $router->render('auth/mensaje', [
            'titulo' => 'Cuenta creada Exitosamente',
        ]);
    }

    public static function confirmar(Router $router)
    {
        $token = s($_GET['token']);
        if (!$token) header('Location: /');
        //Encontrar al usuario con este token
        $usuario = Usuario::where('token', $token);
        if (empty($usuario)) {
            //Usuario no encontrado
            Usuario::setAlerta('error', 'Token no Válido');
        } else {
            //Confirmar el usuario
            $usuario->confirmado = 1;
            $usuario->token = null;
            unset($usuario->password2);

            $usuario->guardar();

            Usuario::setAlerta('exito', 'Cuenta comprobada correctamente');
        }
        $alertas = Usuario::getAlertas();
        $router->render('auth/confirmar', [
            'titulo' => 'Confirma tu cuenta UpTask',
            'alertas' => $alertas
        ]);
    }
}
