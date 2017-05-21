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
                $data['monedas'] = $estudiante->__get("monedas");
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
                $nombre = $curso->obtener_nombre($curso_id);
                $data['explicacion'] = $curso->obtener_explicacion($curso_id);
                if(!empty($nombre))
                    $data['title'] = $nombre;
                $estudiante = new Estudiante_model(array('username'=>$this->session->userdata('username')));       
                $data['monedas'] = $estudiante->__get("monedas");
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
        
        public function administrar_cursos(){
            if(!empty($this->session->userdata('username'))){
                $this->load->model('Curso_model');
                $this->load->model('profesor_model');
                $curso = new Curso_model();
                $cursos = $curso->obtener_todos();
                $data['cursos'] = $cursos;
                $data['title'] = 'Hola '.$this->session->userdata('username');
                $data['nombre'] = $this->session->userdata('username');
                $this->load->view('templates/header', $data);
                $this->load->view('administrar_cursos', $data);
                $this->load->view('templates/footer');
            }else{
                $this->load->view('templates/header', $data);
                $this->load->view('templates/error_page');
                $this->load->view('footer');
            }
        }

        public function actualizar_explicacion($id_curso=1){// el igual 1 se debe quitar para que reciba otro id_curso
            $this->load->model('Curso_model');
            $curso=new Curso_model();
            $data['explicacion']=$curso->obtener_explicacion($id_curso);
            $data['id']=$id_curso;
            $this->load->view('actualizar_explicacion',$data);


        }
        public function cambiar_explicacion(){
            $this->load->model('Curso_model');
            $id_curso=$this->input->post('id');
            $explicacion=$this->input->post('explicacion');
            $curso=new Curso_model();
            $result=$curso->cambiar_explicacion($id_curso,$explicacion);
            if ($result == 1) {
                echo "<h3>ingreso correcto</h3>";
            }else{echo "<h3>ingreso incorrecto</h3>";}


        }


    }