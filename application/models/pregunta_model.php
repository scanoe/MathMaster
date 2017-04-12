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

	public function ObternerPreguntaRand($curso){
		$query=$this->db->query("SELECT * FROM pregunta WHERE curso=".'"'.$curso.'"'." ORDER BY rand() LIMIT 1 ");
		$result=$query->result();
		foreach ($query->result() as $key=>$pregunta_model) {
		$result[$key] = new pregunta_model($pregunta_model);
		}
		return $result[0];



	}
	public function ObtenerPreguntaId($id){
		$query=$this->db->get_where('pregunta', ['id' => $id]);
				$result=$query->result();
		foreach ($query->result() as $key=>$pregunta_model) {
		$result[$key] = new pregunta_model($pregunta_model);
		}
		return $result[0];
	}




}
