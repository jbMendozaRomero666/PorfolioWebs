<?php

namespace Model;

class vendedor extends ActiveRecord
{
    protected static $table = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    public function validar()
    {
        //validacion

        if (!$this->nombre) {
            self::$errores[] = "El nombre es necesario";
        }
        if (!$this->apellido) {
            self::$errores[] = "El apellido es necesario";
        }
        if (!$this->telefono) {
            self::$errores[] = "El telefono es necesario";
        }

        if(!preg_match('/[0-9]{10}/',$this->telefono)){
            self::$errores[] = "El formato no es valido";

        }

        return self::$errores;
    }
}
