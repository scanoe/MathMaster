<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiante extends CI_Controller {

	public function registrar(){
        $username = $this->input->post('username');
        $nombre = $this->input->post('nombre');
        $pass = $this->input->post('password');
        $fecha_nacimiento = $this->input->post('nacimiento');
        $sexo = $this->input->post('genero');
        $data_estudiante = array(
            'username'=>$username, 
            'nombres'=>$nombre, 
            'pass'=>$pass, 
            'fecha_nacimiento'=>$fecha_nacimiento, 
            'sexo'=>$sexo
        );
        $this->load->model('Estudiante_model');
        $estudiante = new Estudiante_model($data_estudiante);
        $errores = $estudiante->validar();
        if(empty($errores)){
            if($estudiante->registrar()){
                $datos_login = array('username'=>$username, 'pass'=>$pass);
                $estudiante = new Estudiante_model($datos_login);
                $usuario_data = array(
                    'username' => $username,
                    'progreso' => $contador,
                    'pregunta' => NULL
                );
                $this->session->set_userdata($usuario_data);
                redirect('Curso/cargar_lista_cursos');
            }
        }else{
            $data['title'] = 'MathMaster';
            if(!array_key_exists('user', $errores))
				$errores["user"] = null;
			if(!array_key_exists('nombre', $errores))
				$errores["nombre"] = null;
			if(!array_key_exists('pass', $errores))
				$errores["pass"] = null;
			if(!array_key_exists('fecha_nacimiento', $errores))
				$errores["fecha_nacimiento"] = null;
			$data['errores'] = $errores;
            $data['back'] = $data_estudiante;
            $this->load->view('templates/header', $data);
		    $this->load->view('inicio', $data);
		    $this->load->view('templates/footer');
        }
	}

    public function login(){
        $this->load->library('session');
        $username = $this->input->post('Lusername');
        $pass = $this->input->post('Lpassword');
        $this->load->model('Estudiante_model');
        $datos_login = array('username'=>$username, 'pass'=>$pass);
        $estudiante = new Estudiante_model($datos_login);
        $errores = $estudiante->validar_login();
        if(empty($errores)){
            $usuario_data = array(
                'username' => $username,
                'progreso' => 0,
                'pregunta' => null
            );
            $this->session->set_userdata($usuario_data);
            redirect('Curso/cargar_lista_cursos');
        }else{
            redirect('Inicio/cargar_inicio');
        }
    }

    public function cerrar_sesion(){
        $this->session->sess_destroy();
        redirect('Inicio/cargar_inicio');
    }
}