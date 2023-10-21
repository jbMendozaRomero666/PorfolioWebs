<?php

namespace Model;

class Propiedad extends ActiveRecord
{
    protected static $table = 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '';
    }
    public function validar()
    {
        //validacion

        if (!$this->titulo) {
            self::$errores[] = "Debes añadir el titulo";
        }

        if (!$this->precio) {
            $errores[] = "El precio es obligatorio";
        }

        if (strlen(!$this->descripcion) > 50) {
            self::$errores[]  = "ingresa un descripcion de la propiedad";
        }

        if (!$this->habitaciones) {
            self::$errores[]  = "incluye las habitaciones";
        }

        if (!$this->wc) {
            self::$errores[]  = "incluye los baños";
        }

        if (!$this->estacionamiento) {
            self::$errores[]  = "incluye los estacionamientos";
        }
        if (!$this->vendedorId) {
            self::$errores[]  = "eligue un vendedor";
        }
        if (!$this->imagen) {
            self::$errores[]  = "La imagen de la propiedad es obligatoria";
        }


        return self::$errores;
    }
}
