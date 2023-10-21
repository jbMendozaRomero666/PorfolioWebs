<?php
//al ser una clase se nombra como mayuscula


namespace MVC;

class Router
{

    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn)
    {
        $this->rutasGET[$url] = $fn;
    }
    public function post($url, $fn)
    {
        $this->rutasPOST[$url] = $fn;
    }
    public function comprobarRutas()
    {
        session_start();

        $auth =$_SESSION['login'] ?? null;

        //areglo de rutas protegidas
        $rutas_protegidas = ['/admin','/propiedades/crear','/propiedades/actualizar','/propiedades/eliminar','/vendedores/crear','/vendedores/actualizar','/vendedores/eliminar'];

        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if ($metodo === 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null;
        }else{
            //debuguear($_POST);
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        //proteger las rutas

        if(in_array($urlActual,$rutas_protegidas) && !$auth){
           header('Location: /');
        }

        if ($fn) {
            call_user_func($fn, $this); //cuando no se sabe que funcion se necesita llamar
        } else {
            echo "pagina no encontrada";
        }
    }
    public function render($view, $datos = [])
    {

        foreach ($datos as $key => $value) {
            $$key = $value;
        }
        ob_start(); //iniciamos el almacenamiento en memoria
        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean(); //limpiamos lo almacenado en memoria

        include_once __DIR__ . "/views/layout.php";
    }
}
