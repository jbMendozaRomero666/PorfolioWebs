<?php


namespace Controllers;

use MVC\Router;
use Model\vendedor;

class VendedorControllers
{

    /* public static function index(Router $router)
    {

        $Vendedores = vendedor::all();
        $resultado = $_GET['resultado'] ?? null;

        $router->render('vendedores/admin', [
            'vendedores' => $Vendedores,
            'resultado' => $resultado
        ]);
    }*/

    public static function crear(Router $router)
    {


        $errores = vendedor::getErrores();
        $vendedor = new vendedor;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $vendedor = new Vendedor($_POST['vendedor']);

            //validar que no haya campos vacios

            $errores = $vendedor->validar();

            if (empty($errores)) {
                $vendedor->guardar();
            }
        }
        $router->render('vendedores/crear', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router)
    {
        $id = validarORedireccionar('/admin');
        //obtener datos del vendedor a actualizar
        $vendedor = Vendedor::find($id);
        $errores = Vendedor::getErrores();



        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //asignar los valores
            $args = $_POST['vendedor'];
            //sincornizar objeto en memoria con lo que el usuario escribio
            $vendedor->sincronizar($args);

            //validar
            $errores = $vendedor->validar();

            if (empty($errores)) {
                $vendedor->guardar();
            }
        }
        $router->render('vendedores/actualizar', [
            'errores' => $errores,
            'vendedor' => $vendedor

        ]);
    }

    public static function eliminar()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //VALIDAR ID
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                $tipo = $_POST['tipo'];
                if (validarTipoContenido($tipo)) {
                    $vendedor = vendedor::find($id);
                    $vendedor->eliminar();
                }
            }
        }
    }
}
