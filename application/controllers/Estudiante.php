<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('Inicio.php');

class Estudiante extends CI_Controller {

	public function registrar(){
        $username = $this->input->post('username');
        $nombre = $this->input->post('nombre');
        $apellido = $this->input->post('apellidos');
        $pass = $this->input->post('password');
        $fecha_nacimiento = $this->input->post('nacimiento');
        $sexo = $this->input->post('genero');
        $data_estudiante = array(
            'username'=>$username, 
            'nombres'=>$nombre, 
            'apellidos'=>$apellido, 
            'pass'=>$pass, 
            'fecha_nacimiento'=>$fecha_nacimiento, 
            'sexo'=>$sexo
        );
        $this->load->model('Estudiante_model');
        $estudiante = new Estudiante_model($data_estudiante);
        $errores = $estudiante->validar();
        if(empty($errores)){
            $estudiante->registrar();
        }else{
            $inicio = new Inicio();
            $inicio->cargar_inicio($data_estudiante, $errores);
        }
	}

    public function login(){
        $this->load->driver('session');
        $username = $this->input->post('Lusername');
        $pass = $this->input->post('Lpassword');
        $this->load->model('Estudiante_model');
        $datos_login = array('username'=>$username, 'pass'=>$pass);
        $estudiante = new Estudiante_model($datos_login);
        $errores = $estudiante->validar_login();
        if(empty($errores)){
            $usuario_data = array(
                'username' => $username,
                'logueado' => TRUE
            );
            $this->session->set_userdata($usuario_data);
            $data['title'] = 'Hola '.$username;
            $data['nombre'] = $this->session->userdata('username');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/nav', $data);
            $this->load->view('templates/footer');
        }else{
            echo 'asdasd';
        }
    }
}