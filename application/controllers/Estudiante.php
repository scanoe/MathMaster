<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('Inicio.php');
require_once('Curso.php');

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
                'logueado' => TRUE
                );
                $this->session->set_userdata($usuario_data);
                redirect('Curso/cargar_lista_cursos');
            }
        }else{
            $inicio = new Inicio();
            $inicio->cargar_inicio($data_estudiante, $errores);
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
            echo 'asdasd';
        }
    }

    public function cerrar_sesion(){
        $this->session->sess_destroy();
        redirect('Inicio/cargar_inicio');
    }
}