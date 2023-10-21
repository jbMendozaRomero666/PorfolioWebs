<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;


class PaginasControllers
{

    public static function index(Router $router)
    {
        $propiedades = propiedad::get(3);
        $inicio = true;
        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }
    public static function nosotros(Router $router)
    {
        $router->render('paginas/nosotros');
    }
    public static function propiedades(Router $router)
    {
        $propiedades = propiedad::all();
        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }
    public static function propiedad(Router $router)
    {
        $id = validarORedireccionar('/propiedades');

        // Obtener los datos de la propiedad
        $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }
    public static function blog(Router $router)
    {
        $router->render('paginas/blog');
    }
    public static function entrada(Router $router)
    {
        $router->render('paginas/entrada');
    }
    public static function contacto(Router $router)
    {
        $mensaje = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
            $respuesta = $_POST['contacto'];
            //crear una nueva instancia de PHPMailer
            $mail = new PHPMailer();

            //configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '274b8ecac05d71';
            $mail->Password = 'ab580ea68391f6';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            //configurar el contenido del email
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaicesPerronas.com');
            $mail->Subject = 'Perro llego el mensaje de correo';

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //DEFINIR EL CONTENIDO
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje perron</p>';
            $contenido .= '<p>Nombre: ' . $respuesta['nombre'] . '</p>';

            if ($respuesta['contacto'] === 'telefono') {
                $contenido .= '<p>Eligio ser contactado por telefono</p>';
                $contenido .= '<p>Telefono: ' . $respuesta['telefono'] . '</p>';
                $contenido .= '<p>Fecha contacto: ' . $respuesta['fecha'] . '</p>';
                $contenido .= '<p>Hora: ' . $respuesta['hora'] . '</p>';
            } else {
                $contenido .= '<p>Eligio ser contactado por Email</p>';
                $contenido .= '<p>Email: ' . $respuesta['email'] . '</p>';
            }
            $contenido .= '<p>Mensaje: ' . $respuesta['mensaje'] . '</p>';
            $contenido .= '<p>Vende o Compra: ' . $respuesta['tipo'] . '</p>';
            $contenido .= '<p>Precio o Presupuesto: $' . $respuesta['precio'] . '</p>';
            $contenido .= '<p>Prefiere ser contactado por : ' . $respuesta['contacto'] . '</p>';
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'esto es u texto alternativo sin html';

            if ($mail->send()) {
                $mensaje = "Mensaje enviado correctamente";
            } else {
                $mensaje = "el mensaje no se pudo enviar ....";
            }
        }
        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}
