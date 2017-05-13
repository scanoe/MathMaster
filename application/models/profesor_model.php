<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profesor_model extends CI_Model {

    private $username;
    private $nombres;
    private $pass;
    private $fecha_nacimiento;
    private $sexo;
    private $correo;
    private $area_trabajo;
    private $PasswordHash;

    public function __construct($value = null) {
        parent::__construct();
        $this->load->database();
        $this->load->library('PasswordHash');
        if ($value != null) {
            settype($value, 'object');
        }
        if (is_object($value)) {
            $this->username = isset($value->username) ? $value->username : null;
            $this->nombres = isset($value->nombres) ? $value->nombres : null;
            $this->pass = isset($value->pass) ? $value->pass : null;
            $this->fecha_nacimiento = isset($value->fecha_nacimiento) ? $value->fecha_nacimiento : null;
            $this->sexo = isset($value->sexo) ? $value->sexo : null;
            $this->correo = isset($value->correo) ? $value->correo : null;
            $this->area_trabajo = isset($value->area_trabajo) ? $value->area_trabajo : null;
            $this->PasswordHash = new PasswordHash();
        }
    }

    public function __get($key) {
        switch ($key) {
            case 'username' :
                $query = $this->db->get_where('profesor', array('nombre_usuario' => $this->username));
                return $query->result()[0]->nombre_usuario;
            case 'nombres' :
                $query = $this->db->get_where('profesor', array('nombre_usuario' => $this->username));
                return $query->result()[0]->nombre;
            case 'pass' :
                $query = $this->db->get_where('profesor', array('nombre_usuario' => $this->username));
                return $query->result()[0]->contraseña;
            case 'fecha_nacimiento' :
                $query = $this->db->get_where('profesor', array('nombre_usuario' => $this->username));
                return $query->result()[0]->fecha_nacimiento;
            case 'sexo' :
                $query = $this->db->get_where('profesor', array('nombre_usuario' => $this->username));
                return $query->result()[0]->genero;
            case 'correo' :
                $query = $this->db->get_where('profesor', array('nombre_usuario' => $this->username));
                return $query->result()[0]->correo;
            case 'area_trabajo' :
                $query = $this->db->get_where('profesor', array('nombre_usuario' => $this->username));
                return $query->result()[0]->area_trabajo;
            default:
                return parent::__get($key);
        }
    }

    public function validar_login() {
        $errores = [];
        $query = $this->db->get_where('profesor', array('nombre_usuario' => $this->username));
        $result = $query->result();
        if (empty($result)) {
            $errores["login"] = 'No existe el usuario';
        }
        elseif (!$this->PasswordHash->CheckPassword($this->pass, $result[0]->contraseña)) {
            $errores["login"] = 'Usuario o contraseña incorrectos';
        }
        return $errores;
    }

}
