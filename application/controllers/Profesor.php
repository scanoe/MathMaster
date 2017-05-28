<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profesor extends CI_Controller {

    public function index(){
        if($this->session->userdata('tipo_usuario')=='profesor'){
            redirect('Curso/administrar_cursos');
        }else{
            $this->cargar_login();
        }
    }
    
    public function cargar_login() {
        $data['title'] = 'MathMaster';
        $data['funcion'] = 'Profesor/iniciar_sesion';
        $data['errores'] = null;
        $this->load->view('templates/header', $data);
        $this->load->view('login', $data);
        $this->load->view('templates/footer');
    }

    public function iniciar_sesion(){
        $this->load->library('session');
        $this->load->model('profesor_model');
        $datos_login = array('username'=>$this->input->post('Lusername'), 'pass'=>$this->input->post('Lpassword'));
        $profesor = new Profesor_model($datos_login);
        $errores = $profesor->validar_login();
        if(empty($errores)){
            $usuario_data = array(
                'username' => $datos_login['username'],
                'tipo_usuario' => 'profesor'
            );
            $this->session->set_userdata($usuario_data);
            redirect('Curso/administrar_cursos');
        }else{
            $data['errores'] = $errores;
            $data['title'] = 'MathMaster';
            $data['funcion'] = 'Profesor/iniciar_sesion';
            $this->load->view('templates/header', $data);
            $this->load->view('login', $data);
            $this->load->view('templates/footer');
        }
    }

    public function cerrar_sesion(){
        $this->session->sess_destroy();
        $this->cargar_login();
    }
}