<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Curso extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->library('session');
        }

        public function cargar_lista_cursos(){
            $this->load->model('Curso_model');
            $curso = new Curso_model();
            $cursos = $curso->obtener_todos();
            $data['cursos'] = $cursos;
            $data['title'] = 'Hola '.$this->session->userdata('username');
            $data['nombre'] = $this->session->userdata('username');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/nav', $data);
            $this->load->view('lista_cursos', $data);
            $this->load->view('templates/footer');
        }
    }
?>