<?php

namespace Model;

class Usuario extends ActiveRecord
{
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'email', 'password', 'token', 'confirmado'];

    public $id;
    public $nombre;
    public $email;
    public $password;
    public $token;
    public $confirmado;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->password_actual = $args['password_actual'] ?? '';
        $this->password_nuevo = $args['password_nuevo'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->confirmado = $args['confirmado'] ?? 0;
    }

    //validar el login de usuarios
    public function validarLogin()
    {
        if (!$this->email) {
            self::$alertas['error'][] = 'El email es requerido';
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'email no valido';
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'el password es requerido para iniciar session';
        }
        return self::$alertas;
    }
    //validacion para cuentas nuevas

    public function validarNuevaCuenta()
    {
        if (!$this->nombre) {
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }
        if (!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'El password no puede ir vacio';
        }
        if (strlen($this->password) < 6) {
            self::$alertas['error'][] = 'El password debe contener al menos 6 caracteres';
        }
        if ($this->password !== $this->password2) {
            self::$alertas['error'][] = 'Los password son diferentes';
        }
        return self::$alertas;
    }

    public function validarEmail()
    {

        if (!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'email no valido';
        }

        return self::$alertas;
    }

    public function validarPassword()
    {
        if (!$this->password) {
            self::$alertas['error'][] = 'El password no puede ir vacio';
        }
        if (strlen($this->password) < 6) {
            self::$alertas['error'][] = 'El password debe contener al menos 6 caracteres';
        }
    }

    public function validar_perfil()
    {
        if (!$this->nombre) {
            self::$alertas['error'][] = 'Debe ingresar el nombre';
        }

        if (!$this->email) {
            self::$alertas['error'][] = 'Debe ingresar el correo';
        }
        return self::$alertas;
    }

    public function nuevo_password():array
    {
        if (!$this->password_actual) {
            self::$alertas['error'][] = 'El Password actual no puede ir vacio';
        }
        if (!$this->password_nuevo) {
            self::$alertas['error'][] = 'El password nuevo no puede ir vacio';
        }
        if(strlen($this->password_nuevo) < 6){
          self::$alertas['error'][] = 'E l password debe ser mayor a 6 caracteres';
        }
        return self::$alertas;
    }

    public function comprobar_password():bool{
      return password_verify($this->password_actual,$this->password);
    }
    public function hashPassword():void
    {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function crearToken():void
    {
        $this->token = uniqid();
    }
}
