<?php

namespace Model;

class ActiveRecord
{
    //Base de Datos
    protected static $db;
    protected static $table = '';
    protected static $columnasDB = [];
    //errores
    protected static $errores = [];

    //Definir la conecion a la base de datos
    public static function setDB($database)
    {
        self::$db = $database;
    }

  
    public function guardar()
    {
        if (!is_null($this->id)) {
            //actualizar
            $this->actualizar();
        } else {
            $this->crear();
        }
    }
    public function crear()
    {
        //sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        //insertar en la base de dato

        $query = "INSERT INTO " . static::$table . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query($query);
        if ($resultado) {
            //redirecciona al usuario para no tener datos duplicados
            //header solo funciona si no tiene previo html inyectado
            header('Location: /admin?resultado=1');
        }
        // debuguear($resultado);
    }
    public function actualizar()
    {
        //sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        $valores = [];

        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }
        $query = "UPDATE " . static::$table . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);

        if ($resultado) {
            //redirecciona al usuario para no tener datos duplicados
            //header solo funciona si no tiene previo html inyectado
            header('Location: /admin?resultado=2');
        }
        return $resultado;
    }


    public function eliminar()
    {
        //eliminar el registro  
        $query = "DELETE FROM " . static::$table . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);

        if ($resultado) {
            $this->borrarImagen();
            header('Location: /admin?resultado=3');
        }
    }
    //Identificar y unir los atributos de la BD
    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }
    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanizado = [];

        foreach ($atributos as $key => $value) {
            $sanizado[$key] = self::$db->escape_string($value);
        }
        return $sanizado;
    }
    //validacion

    //subida de imagen
    public function setImagen($imagen)
    { //elimina la imagen
        if (!is_null($this->id)) {
            $this->borrarImagen();
        }

        //asignar al atributo de imagen el nombre de la imgen
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    //eliminar imagen

    public function borrarImagen()
    {
        //compara la imagen y si esta lo borra con unlink
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }

    public static function getErrores()
    {
        return static::$errores;
    }

    public function validar()
    {
       static::$errores = [];
        return static::$errores;
    }

    //Lista todas las propiedades 
    public static function all()
    {
        $query = "SELECT * FROM " . static::$table; //static busca donde esta heredado paara hacer la consulta

        $resultado = self::consultarSQL($query);
        return $resultado;
    }
     //ontiene determinado numero de registros  
     public static function get($cantidad)
     {
         $query = "SELECT * FROM " . static::$table. ' LIMIT ' . $cantidad; //static busca donde esta heredado paara hacer la consulta
 
         $resultado = self::consultarSQL($query);
         return $resultado;
     }
    

    //buscar un registro por su id
    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$table . " WHERE id = ${id}";

        $resultado = self::consultarSQL($query);
        //obtener la primer pocicion del arreglo
        return array_shift($resultado);
    }

    public static function consultarSQL($query)
    {
        //consultar la base de datos
        $resultado = self::$db->query($query);
        //iterar los resultados
        $array = [];

        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
            //debuguear($array);
        }
        //liberar memoria 
        $resultado->free();

        //retornar los resultado
        return $array;
    }

    protected static function crearObjeto($registro)
    {

        $objeto = new static; //un nuevo objeto de la clase principal

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
