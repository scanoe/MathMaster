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

        public function validar(){
            $errores = [];
            $query = $this->db->get_where('curso', array('nombre' => $this->nombre));
            $result = $query->result();
            if (!empty($result))
                $errores["nombre"] = 'Ya existe un curso con este nombre';
            elseif ($this->nombre == null)
                $errores["nombre"] = 'Escribe un nombre para el curso';
            if ($this->dificultad == null)
                $errores["dificultad"] = 'Selecciona una dificultad';
            if ($this->explicacion == null)
                $errores["explicacion"] = 'Escribe una explicación';
            if ($this->descripcion == null)
                $errores["descripcion"] = 'Escribe una pequeña descripción del contenido del curso';
            return $errores;
        }

        public function obtener_todos(){
            $query = $this->db->get('curso');
            return $query->result();
        }

        public function obtener_cursos_con_reguntas(){
            $sql = "SELECT * FROM (SELECT curso, COUNT(*) a FROM `pregunta` GROUP BY `curso`) as b JOIN curso ON b.curso = curso.id WHERE b.a > 10";
            $query = $this->db->query($sql);
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

        public function cambiar_explicacion($id_curso){
          $result = $this->db->update('curso', ['explicacion' => $this->explicacion], ['id' => $id_curso]);
          return $result;
        }

        public function registrar(){
            $data = array(
                'nombre' => $this->nombre,
                'dificultad' => (int)$this->dificultad,
                'explicacion' => $this->explicacion,
                'descripcion' => $this->descripcion
            );
            if ($this->db->insert('curso', $data))
                return TRUE;
            else
                return FALSE;
        }
    }
?>