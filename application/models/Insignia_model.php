<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Insignia_model extends CI_Model{
        private $nombre;
        private $imagen;
        private $descripcion;

        public function __construct($value = null){
            parent::__construct();
            $this->load->database();
            if($value != null)
                settype($value, 'object');
            if(is_object($value)){
                $this->nombre = isset($value->nombre) ? $value->nombre : null;
                $this->imagen = isset($value->imagen) ? $value->imagen : null;
                $this->descripcion = isset($value->descripcion) ? $value->descripcion : null;
            }
        }

        public function __get($key){
            switch($key){
                case 'nombre' :
                case 'imagen' :
                case 'descripcion' :
                    return $this->$key;
                default:
                    return parent::__get($key);
            }
        }

        public function obtener_id(){
            $query = $this->db->get_where('insignia', array('nombre'=>$this->nombre));
            return $query->result()[0]->id;
        }

        public function obtener_insignia_por_curso($id_curso){
            $query = $this->db->get_where('insignia', array('curso'=>$id_curso));
            return new Insignia_model($query->result()[0]);
        }

        public function existe_insignia_por_estudiante($username){
            $query = $this->db->get_where('insiginiaxestudiante', array('id_insignia'=>$this->obtener_id(), 'nombre_usuario'=>$username));
            return !empty($query->result());
        }
    }
?>