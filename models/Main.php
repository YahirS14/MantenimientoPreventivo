<?php 

namespace Model;

class Main extends ActiveRecord{
    protected static $tabla = 'maquinas';
    protected static $columnasDB = ['id', 'nombre', 'usuario', 'fechaCreacion',
    'fechaProgramada', 'frecuencia', 'tipo', 'observaciones'];

    public $id;
    public $nombre;
    public $usuario;
    public $fechaCreacion;
    public $fechaProgramada;
    public $frecuencia;
    public $tipo;
    public $observaciones;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->usuario = $args['usuario'] ?? '';
        $this->fechaCreacion = $args['fechaCreacion'] ?? '';
        $this->fechaProgramada = $args['fechaProgramada'] ?? '';
        $this->frecuencia = $args['frecuencia'] ?? '';
        $this->tipo = $args['tipo'] ?? '';
        $this->observaciones = $args['observaciones'] ?? '';
    }

    
    //Mesajes de validacion para crear una cuenta
    public function validarRegistro(){
        if(!$this->nombre){
            self::$alertas['error'][] = 'El nombre es obligratorio';
        }
        if(!$this->usuario){
            self::$alertas['error'][] = 'El usuario es obligratorio';
        }
        if(!$this->fechaCreacion){
            self::$alertas['error'][] = 'La fecha de creacion es obligratorio';
        }
        if(!$this->fechaProgramada){
            self::$alertas['error'][] = 'La fecha programada es obligratorio';
        }
        if(!$this->tipo){
            self::$alertas['error'][] = 'El tipo es obligatorio';
        }
        if(!$this->observaciones){
            self::$alertas['error'][] = 'Las observaciones son obligatorias';
        }
        return self::$alertas;
    }

    public function validarBusqueda(){
        if(!$this->fechaProgramada){
            self::$alertas['error'][] = 'La fecha programada es obligratorio';
        }
        return self::$alertas;
    }
}