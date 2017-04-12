<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Estudiante_model extends CI_Model{
        private $username;
        private $nombres;
        private $apellidos;
        private $pass;
        private $fecha_nacimiento;
        private $sexo;
        private $monedas;
        private $puntos;

        public function __construct($value = null){
            parent::__construct();
            $this->load->database();
            if($value != null)
                settype($value, 'object');
            if(is_object($value)){
                $this->username = isset($value->username) ? $value->username : null;
                $this->nombres = isset($value->nombres) ? $value->nombres : null;
                $this->apellidos = isset($value->apellidos) ? $value->apellidos : null;
                $this->pass = isset($value->pass) ? $value->pass : null;
                $this->fecha_nacimiento = isset($value->fecha_nacimiento) ? $value->fecha_nacimiento : null;
                $this->sexo = isset($value->sexo) ? $value->sexo : null;
                $this->monedas = isset($value->monedas) ? $value->monedas : null;
                $this->puntos = isset($value->puntos) ? $value->puntos : null;
            }
        }

        public function __get($key){
            switch($key){
                case 'username' :
                case 'nombres' :
                case 'apellidos' :
                case 'pass' :
                case 'fecha_nacimiento' :
                case 'sexo' :
                case 'monedas' :
                case 'puntos' :
                     return $this->$key;
                default:
                    return parent::__get($key);
            }
        }

        public function validar(){
            $errores = [];
            $sql = 'SELECT * FROM `estudiante` WHERE `nombre_usuario` = ?';
            $query = $this->db->query($sql, $this->username);
            if(!empty($query->result()))
                $errores["user"] = 'Ya existe el usuario';
            elseif($this->username == null)
                $errores["user"] = 'Escribe un nombre de usuario';
            if($this->nombres == null)
                $errores["nombre"] = 'Escribe un nombre';
            if($this->apellidos == null)
                $errores["apellido"] = 'Escribe tus apellidos por favor';
            if($this->pass == null)
                $errores["pass"] = 'Escribe una contraseña';
            if($this->fecha_nacimiento == null)
                $errores["fecha_nacimiento"] = 'Escribe una fecha de nacimiento';
            return $errores;
        }

        public function validar_login(){
            $errores = [];
            $sql = 'SELECT * FROM `estudiante` WHERE `nombre_usuario` = ? AND `contraseña` = ?';
            $query = $this->db->query($sql, array($this->username, $this->pass));
            if(empty($query->result()))
                $errores["login"] = 'No existe el usuario';
            return $errores;
        }

        public function registrar(){
            $data = array(
                'nombre_usuario'=>$this->username, 
                'nombre'=>$this->nombres, 
                'apellido'=>$this->apellidos, 
                'pass'=>$this->pass, 
                'fecha_nacimiento'=>$this->fecha_nacimiento, 
                'sexo'=>$this->sexo,
                'monedas'=>0,
                'puntos'=>0
            );
            if($this->db->insert('estudiante', $data))
                return TRUE;
            else
                return FALSE;
        }
    }
?>