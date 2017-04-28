<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index(){
		$this->cargar_inicio();
	}

	public function cargar_inicio(){
		$data['title'] = 'MathMaster';
		$data['back'] = array('username'=>null, 'nombres'=>null, 'pass'=>null, 'fecha_nacimiento'=>null, 'sexo'=>'');
		$data['errores'] = null;
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