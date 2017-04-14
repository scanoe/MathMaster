<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiante extends CI_Model {

	private $nombre_usuario;
	private $contraseña;
	private $nombre;
	private $genero;
	private $fecha_nacimiento;
	private $monedas;
	private $puntos;
	private $email;

	

	public function __construct($value = null) {
		parent::__construct();
		$this->load->database();

		if ($value != null) {
			if (is_array($value))
				settype($value, 'object');

			if (is_object($value)) {
				$this->nombre_usuario = isset($value->nombre_usuario)? $value->nombre_usuario : null;
				$this->contraseña = isset($value->contraseña)? $value->contraseña : null;
				$this->nombre = isset($value->nombre)? $value->nombre : null;
				$this->genero = isset($value->genero)? strtoupper($value->genero) : null;
				$this->fecha_nacimiento = isset($value->fecha_nacimiento)? $value->fecha_nacimiento : null;
				$this->monedas = isset($value->monedas)? $value->monedas : null;
				$this->puntos = isset($value->puntos)? $value->puntos : null;
				$this->email = isset($value->email) ? $value->email : null;
			}
		}
	}

	public function __get($key) {
		switch ($key) {
			case 'nombre_usuario':
			case 'contraseña':
			case 'nombre':
			case 'genero':
			case 'fecha_nacimiento':
			case 'monedas':
			case 'email':
			case 'puntos':
				return $this->$key;
			default:
				return parent::__get($key);
		}
	}

	public function validar() {
		$errores = [];
		if ($this->nombre_usuario == null) {
			$errores[] = 'El nombre de usuario no puede ser vacío';
		}

		if ($this->contraseña == null) {
			$errores[] = 'la contraseña no puede ser vacía';
		}

		if ($this->nombre == null) {
			$errores[] = 'El nombre no puede ser vacío';
		}

		if ($this->genero == null) {
			$errores[] = 'El genero no puede ser vacío';
		} else if ($this->genero != 'M' && $this->genero != 'F') {
			$errores[] = 'El genero debe ser M ó F';
		}

		if ($this->fecha_nacimiento == null) {
			$errores[] = 'La fecha de nacimiento no puede ser vacía';
		}
		// Acá habría que validar también que sea una fecha correcta
		// y que sea menor a la fecha actual.

		if ($this->monedas == null) {
			$errores[] = 'Las monedas no pueden ser vacías';
		}

		if ($this->puntos == null) {
			$errores[] = 'Los puntos no pueden ser vacíos';
		}

		if ($this->email == null) {
			$errores[] = 'El email no puede ser vacío';
		} else if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
			$errores[] = 'El email ingresado no es válido';
		}

		

		if (empty($errores)) {
			return TRUE;
		} else {
			return $errores;
		}
	}

	public function registrar() {
		$data = [
			'nombre_usuario' => $this->nombre_usuario,
			'contraseña' => $this->contraseña,
			'nombre' => $this->nombre,
			'genero' => $this->genero,
			'fecha_nacimiento' => $this->fecha_nacimiento,
			'monedas' => $this->monedas,
			'puntos' => $this->puntos,
			'email' => $this->email
		];

		return $this->db->insert('estudiante', $data);
	}

	public function obtener_todas() {
		$query = $this->db->get('estudiante');

		$result = [];

		foreach ($query->result() as $key=>$estudiante) {
			$result[$key] = new estudiante($estudiante);
		}

		return $result;
	}	
}