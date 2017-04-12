<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index(){
		$this->cargar_inicio();
	}

	public function cargar_inicio($back = null, $errores = null){
		$data['title'] = 'MathMaster';
		if($back == null)
			$data['back'] = array('username'=>null, 'nombres'=>null, 'apellidos'=>null, 'pass'=>null, 'fecha_nacimiento'=>null, 'sexo'=>'');
		else
			$data['back'] = $back;
		if($errores == null){
			$errores["user"] = null;
			$errores["nombre"] = null;
			$errores["apellido"] = null;
			$errores["pass"] = '';
            $errores["fecha_nacimiento"] = '';
			$data['errores'] = $errores;
		}else{
			if(!array_key_exists('user', $errores))
				$errores["user"] = null;
			if(!array_key_exists('nombre', $errores))
				$errores["nombre"] = null;
			if(!array_key_exists('apellido', $errores))
				$errores["apellido"] = null;
			if(!array_key_exists('pass', $errores))
				$errores["pass"] = null;
			if(!array_key_exists('fecha_nacimiento', $errores))
				$errores["fecha_nacimiento"] = null;
			$data['errores'] = $errores;
		}
		$this->load->view('templates/header', $data);
		$this->load->view('inicio', $data);
		$this->load->view('templates/footer');
	}

	public function cargar_login($back = null, $errores = null){
		$data['title'] = 'MathMaster';
		$data['back'] = $back;
		$data['error'] = $errores;
		$this->load->view('templates/header', $data);
		$this->load->view('inicio', $data);
		$this->load->view('templates/footer');
	}
}