<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Curso_model extends CI_Model{
        private $nombre;
        private $dificultad;
        private $explicacion;
        private $descripcion;

        public function __construct($value = null){
            parent::__construct();
            $this->load->database();
            if($value != null)
                settype($value, 'object');
            if(is_object($value)){
                $this->nombre = isset($value->nombre) ? $value->nombre : null;
                $this->dificultad = isset($value->dificultad) ? $value->dificultad : null;
                $this->explicacion = isset($value->explicacion) ? $value->explicacion : null;
                $this->descripcion = isset($value->descripcion) ? $value->descripcion : null;
            }
        }

        public function __get($key){
            switch($key){
                case 'nombre' :
                case 'dificultad' :
                case 'explicacion' :
                case 'descripcion' :
                     return $this->$key;
                default:
                    return parent::__get($key);
            }
        }

        public function obtener_todos(){
            $query = $this->db->get('curso');
            return $query->result();
        }

        public function obtener_explicacion($id){
            $sql = 'SELECT `explicacion` FROM `curso` WHERE `id` = ?';
            $query = $this->db->query($sql, array($id));
            return $query->result();
        }

        public function obtener_nombre($id){
            $sql = 'SELECT `nombre` FROM `curso` WHERE `id` = ?';
            $query = $this->db->query($sql, array($id));
            return $query->result();
        }

        public function obtener_id_curso($id_pregunta){
            $sql = "SELECT `curso` FROM pregunta WHERE `id` = ?";
            $query = $this->db->query($sql, array($id_pregunta));
            return $query->result();
        }

        public function obtener_nombre_curso($id_pregunta){
            $sql = "SELECT `nombre` FROM ((SELECT `curso` FROM pregunta WHERE `id` = ?) AS a JOIN curso ON a.curso = curso.id)";
            $query = $this->db->query($sql, array($id_pregunta));
            return $query->result();
        }
    }
?>