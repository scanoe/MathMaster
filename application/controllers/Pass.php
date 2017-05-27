<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Pass extends CI_Controller{

        public function cargar_formulario_pass(){
            $data['title'] = 'Generador de contraseñas';
            $data['pass']  = null;
            $this->load->view('templates/header', $data);
            $this->load->view('generar_pass', $data);
            $this->load->view('templates/footer');
        }

        public function generar(){
            $passi = $this->input->post('password');
            $this->load->model('profesor_model');
            $profesor = new profesor_model('P1');
            $pass = new PasswordHash();
            if(!empty($pass)){
                $data['pass'] = $pass->HashPassword($passi);
                $this->load->view('templates/header', $data);
                $this->load->view('generar_pass', $data);
                $this->load->view('templates/footer');
            }
        }
    }
?>