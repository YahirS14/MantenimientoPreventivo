<?php

namespace Model;

class Usuario extends ActiveRecord{
    //Base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'email', 'password',
     'confirmado', 'token'];

    //Atributos bd
    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $confirmado;
    public $token;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->confirmado = $args['confirmado'] ?? 0;
        $this->token = $args['token'] ?? '';
    }

    //Mesajes de validacion para crear una cuenta
    public function validarNuevaCuenta(){
        if(!$this->nombre){
            self::$alertas['error'][] = 'El nombre es obligratorio';
        }
        if(!$this->apellido){
            self::$alertas['error'][] = 'El apellido es obligratorio';
        }
        if(!$this->email){
            self::$alertas['error'][] = 'El email es obligratorio';
        }
        if(!$this->password){
            self::$alertas['error'][] = 'El password es obligratorio';
        }
        if(strlen($this->password) < 8){
            self::$alertas['error'][] = 'El password debe contener al menos 8 caracteres';
        }
        return self::$alertas;
    }

    //Revisa si el ususario ya existe
    public function existeUsuario(){
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1"; 

        $resultado = self::$db->query($query);
       
        if($resultado->num_rows){
            self::$alertas['error'][] = 'El usuario ya esta registrado';    
        }
        return $resultado;
    }
    public function hashPassword(){
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }   
    public function crearToken(){
        $this->token = uniqid();
    }
}