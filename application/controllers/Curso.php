<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Curso extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->library('session');
        }

        public function cargar_lista_cursos(){
            if(!empty($this->session->userdata('username'))){
                $this->load->model('Curso_model');
                $this->load->model('Estudiante_model');
                $curso = new Curso_model();
                $cursos = $curso->obtener_todos();
                $data['cursos'] = $cursos;
                $data['title'] = 'Hola '.$this->session->userdata('username');
                $estudiante = new Estudiante_model(array('username'=>$this->session->userdata('username')));       
                $data['monedas'] = $estudiante->get_monedas()[0]->monedas;
                $data['nombre'] = $this->session->userdata('username');
                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav', $data);
                $this->load->view('lista_cursos', $data);
                $this->load->view('templates/footer');
            }else{
                $this->load->view('templates/header', $data);
                $this->load->view('templates/error_page');
                $this->load->view('footer');
            }
        }

        public function cargar_explicacion($curso_id){
            if(!empty($this->session->userdata('username'))){
                $this->load->model('Curso_model');
                $this->load->model('Estudiante_model');
                $curso = new Curso_model();
                $explicacion = $curso->obtener_explicacion($curso_id);
                $nombre = $curso->obtener_nombre($curso_id);
                $data['explicacion'] = $explicacion[0]->explicacion;
                if(!empty($nombre))
                    $data['title'] = $nombre[0]->nombre;
                $estudiante = new Estudiante_model(array('username'=>$this->session->userdata('username')));       
                $data['monedas'] = $estudiante->get_monedas()[0]->monedas;
                $data['nombre'] = $this->session->userdata('username');
                $data['id'] = $curso_id;
                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav', $data);
                $this->load->view('explicacion', $data);
                $this->load->view('templates/footer');
            }else{
                $this->load->view('templates/header', $data);
                $this->load->view('templates/error_page');
                $this->load->view('footer');
            }
        }
    }
?>