<?php

namespace Controllers;

use Model\Cita;
use Model\citaServicio;
use Model\Servicio;
use MVC\Router;


class ApiController
{

    public static function index()
    {
        $servicios = Servicio::all();
        echo json_encode($servicios);
    }

    public static function guardar()
    {
        $cita = new Cita($_POST);
        $resultado = $cita->guardar();

        $id = $resultado['id'];
        //almacena los servicios con el id de la cita
        $idServicios = explode(",", $_POST['servicios']);
        foreach ($idServicios as $idservicio) {

            $args = [
                'citaId' => $id,
                'serviciosId' => $idservicio
            ];
            $citaServicio = new citaServicio($args);
            $citaServicio->guardar();
        }
        //retornamos una respuesta
        echo json_encode(['resultado' => $resultado]);
    }

    public static function eliminar()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //debuguear($_SERVER);
            $id = $_POST['id'];
            $cita = Cita::find($id);
            $cita->eliminar();
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
    }
}
