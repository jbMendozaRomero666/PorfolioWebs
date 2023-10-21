<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadControllers
{
   //Router $router se llama asi para tener las funciones ya creadas
   public static function index(Router $router)
   {

      $propiedades = Propiedad::all();
      $vendedores = vendedor::all();
      $resultado = $_GET['resultado'] ?? null;

      $router->render('propiedades/admin', [
         'propiedades' => $propiedades,
         'vendedores'=>$vendedores,
         'resultado' => $resultado
      ]);
   }
   public static function crear(Router $router)
   {
      $propiedad = new Propiedad;
      $vendedores = vendedor::all();
      //arreglo con mensaje de errores
      $errores = Propiedad::getErrores();

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         //asignar los atributos
         $args = $_POST['propiedad'];

         $propiedad->sincronizar($args);

         //validar
         $errores = $propiedad->validar();
         //subir archivos
         //generar nombre unico a las imagenes
         //md5 no se recomienda para seguridad hasea el nombre
         //uniq codigo o has unico random y se le añade la estencion jpg
         $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

         //subir imagenes
         //Realizar un resize a la imagen
         if ($_FILES['propiedad']['tmp_name']['imagen']) {
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
            $propiedad->setImagen($nombreImagen);
         }
         if (empty($errores)) {
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
               //ALMACENAR IMAGENES

               //guardar la imagen en el servidor funciones de compouser
               $image->save(CARPETA_IMAGENES . $nombreImagen);
               //move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
               //guarda en la base de datos
            }
            $propiedad->guardar();
         }
      }
      $router->render('propiedades/crear', [
         'propiedad' => $propiedad,
         'vendedores' => $vendedores,
         'errores' => $errores
      ]);
   }

   public static function actualizar(Router $router)
   {
      $id = validarORedireccionar('/admin');

      $propiedad = Propiedad::find($id);
      $vendedores = vendedor::all();
      $errores = Propiedad::getErrores();

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         //asignar los atributos
         $args = $_POST['propiedad'];

         $propiedad->sincronizar($args);

         //validar
         $errores = $propiedad->validar();
         //subir archivos
         //generar nombre unico a las imagenes
         //md5 no se recomienda para seguridad hasea el nombre
         //uniq codigo o has unico random y se le añade la estencion jpg
         $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

         //subir imagenes
         //Realizar un resize a la imagen
         if ($_FILES['propiedad']['tmp_name']['imagen']) {
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
            $propiedad->setImagen($nombreImagen);
         }
         if (empty($errores)) {
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
               //ALMACENAR IMAGENES

               //guardar la imagen en el servidor funciones de compouser
               $image->save(CARPETA_IMAGENES . $nombreImagen);
               //move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
               //guarda en la base de datos
            }
            $propiedad->guardar();
         }
      }
      $router->render('/propiedades/actualizar', [
         'propiedad' => $propiedad,
         'errores' => $errores,
         'vendedores' => $vendedores
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
               $propiedad = Propiedad::find($id);
               $propiedad->eliminar();
            }
         }
      }
   }
}
