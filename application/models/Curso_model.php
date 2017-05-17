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
            $query = $this->db->get_where('curso', array('id'=>$id));
            return $query->result()[0]->explicacion;
        }

        public function obtener_nombre($id){
            $query = $this->db->get_where('curso', array('id'=>$id));
            return $query->result()[0]->nombre;
        }

        public function obtener_id_curso($id_pregunta){
            $query = $this->db->get_where('pregunta', array('id'=>$id_pregunta));
            return $query->result()[0]->curso;
        }

        public function obtener_nombre_curso($id_pregunta){
            $this->db->select('*');
            $this->db->from('pregunta p');
            $this->db->join('curso c', 'c.id=p.curso');
            $this->db->where('p.id',$id_pregunta);
            $query = $this->db->get();
            return $query->result()[0];
        }
        public function cambiar_explicacion($id_curso,$explicacion){
          $result = $this->db->update('curso', ['explicacion'=>$explicacion], ['id'=>$id_curso]);

          return $result;


        }
    }
?>