<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class pregunta_model extends CI_Model {

		private $id;
		private $enunciado;
		private $tipo_de_respuesta;
		private $respuesta;
		private $respuesta_incorrecta1;
		private $respuesta_incorrecta2;
		private $respuesta_incorrecta3;

		public function __construct($value = null) {
			parent::__construct();
			$this->load->database();
			if ($value != null) {
				if (is_array($value))
					settype($value, 'object');
				if (is_object($value)) {
					$this->id = isset($value->id) ? $value->id : null;
					$this->enunciado = isset($value->enunciado) ? $value->enunciado : null;
					$this->tipo_de_respuesta = isset($value->tipo_de_respuesta) ? $value->tipo_de_respuesta : null;
					$this->respuesta = isset($value->respuesta) ? $value->respuesta : null;
					$this->respuesta_incorrecta1 = isset($value->respuesta_incorrecta1) ? $value->respuesta_incorrecta1 : null;
					$this->respuesta_incorrecta2 = isset($value->respuesta_incorrecta2) ? $value->respuesta_incorrecta2 : null;
					$this->respuesta_incorrecta3 = isset($value->respuesta_incorrecta3) ? $value->respuesta_incorrecta3 : null;
				}
			}
		}

		public function __get($key) {
			switch ($key) {
				case 'id':
				case 'enunciado':
				case 'tipo_de_respuesta':
				case 'respuesta':
				case 'respuesta_incorrecta1':
				case 'respuesta_incorrecta2':
				case 'respuesta_incorrecta3':
				return $this->$key;
				default:
				return parent::__get($key);
			}
		}

		public function obtener_pregunta_aleatoria($curso){
			$this->db->select('*');
			$this->db->from('pregunta');
			$this->db->where('curso',$curso);
			$this->db->order_by('rand()');
			$this->db->limit(1);
			$query = $this->db->get();
			return $query->result()[0];

		}
		
		public function obtener_pregunta_por_id($id){
			$query=$this->db->get_where('pregunta', array('id' => $id));
			foreach ($query->result() as $key=>$pregunta) {
				$result[$key] = new pregunta_model($pregunta);
			}
			return $result[0];
		}

		public function agregar_pregunta($curso_id){
					$data = [
				'enunciado' => $this->enunciado,
				'tipo_de_respuesta' => $this->tipo_de_respuesta,
				'respuesta' => $this->respuesta,
				'respuesta_incorrecta1' => $this->respuesta_incorrecta1,
				'respuesta_incorrecta2' => $this->respuesta_incorrecta2,
				'respuesta_incorrecta3' => $this->respuesta_incorrecta3,
				'curso'=> $curso_id


			];

			return $this->db->insert('pregunta', $data);


		}
	}
?>