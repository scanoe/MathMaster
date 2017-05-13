<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profesor extends CI_Controller {

    public function cargar_login() {
        $data['title'] = 'MathMaster';
        $data['funcion'] = 'Profesor/iniciar_sesion';

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
                'tipo_usuario' => 'profesor',
                'progreso' => 0,
                'pregunta' => null
            );
            $this->session->set_userdata($usuario_data);
            redirect('Curso/administrar_cursos');
        }else{
            redirect('Profesor/cargar_login');
        }
    }
}
