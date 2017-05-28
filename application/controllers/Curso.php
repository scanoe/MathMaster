<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Curso extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->library('session');
        }

        public function cargar_lista_cursos(){
            if(!empty($this->session->userdata('username')) && $this->session->userdata('tipo_usuario') == 'estudiante'){
                $this->load->model('Curso_model');
                $this->load->model('Estudiante_model');
                $curso = new Curso_model();
                $cursos = $curso->obtener_cursos_con_reguntas();
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
                $data['title'] = '404 Página no encontrada';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/error_page');
                $this->load->view('templates/footer');
            }
        }

        public function cargar_formulario_crear_curso(){
            if(!empty($this->session->userdata('username')) && $this->session->userdata('tipo_usuario') == 'profesor'){
                $data['title'] = 'Creación de un curso';
                $data['nombre'] = $this->session->userdata('username');
                $data['errores'] = null;
                $data['back'] = null;
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navProfesor', $data);
                $this->load->view('formulario_crear_curso', $data);
                $this->load->view('templates/footer');
            }else{
                $data['title'] = '404 Página no encontrada';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/error_page');
                $this->load->view('templates/footer');
            }
        }

        public function cargar_explicacion($curso_id){           
            if(!empty($this->session->userdata('username')) && $this->session->userdata('tipo_usuario') == 'estudiante'){          
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
                $data['title'] = '404 Página no encontrada';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/error_page');
                $this->load->view('templates/footer');
            }
        }
        
        public function administrar_cursos(){
            if(!empty($this->session->userdata('username')) && $this->session->userdata('tipo_usuario') == 'profesor'){
                $this->load->model('Curso_model');
                $this->load->model('pregunta_model');
                $curso = new Curso_model();
                $cursos = $curso->obtener_todos();
                $data['cursos'] = $cursos;
                $data['title'] = 'Hola '.$this->session->userdata('username');
                $data['nombre'] = $this->session->userdata('username');
                $data['tipo_de_respuesta'] = 'a';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navProfesor', $data);
                $this->load->view('administrar_cursos', $data);
                $this->load->view('templates/footer');
            }else{
                $data['title'] = '404 Página no encontrada';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/error_page');
                $this->load->view('templates/footer');
            }
        }

        public function actualizar_explicacion($id_curso){
            if(!empty($this->session->userdata('username')) && $this->session->userdata('tipo_usuario') == 'profesor'){
                $this->load->model('Curso_model');
                $curso = new Curso_model();
                $data['explicacion'] = $curso->obtener_explicacion($id_curso);
                $data['id'] = $id_curso;
                $data['title'] = 'Actualizar Explicación';
                $data['nombre'] = $this->session->userdata('username');
                $data['error'] = null;
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navProfesor', $data);
                $this->load->view('actualizar_explicacion', $data);
                $this->load->view('templates/footer');
            }else{
                $data['title'] = '404 Página no encontrada';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/error_page');
                $this->load->view('templates/footer');
            }
        }

        public function cambiar_explicacion(){
            if(!empty($this->session->userdata('username')) && $this->session->userdata('tipo_usuario') == 'profesor'){
                $data = array('id' => $this->input->post('id'), 'explicacion' => $this->input->post('explicacion'));
                $this->load->model('Curso_model');
                if(!empty($data['explicacion'])){
                    $curso = new Curso_model($data);
                    $result = $curso->cambiar_explicacion($data['id'], $data['explicacion']);
                    if ($result == 1) {
                        $data['title'] = 'Explicación actualizada';
                        $data['nombre'] = $this->session->userdata('username');
                        $data['mensaje'] = 'La explicación se editó correctamente';
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/navProfesor', $data);                
                        $this->load->view('pregunta_agregada', $data);
                        $this->load->view('templates/footer', $data);   
                    }else{
                        echo "<h3>ingreso incorrecto</h3>";
                    }
                }else{
                    $this->load->model('Curso_model');
                    $curso = new Curso_model();
                    $data['explicacion'] = $curso->obtener_explicacion($data['id']);
                    $data['id'] = $data['id'];
                    $data['title'] = 'Actualizar Explicación';
                    $data['nombre'] = $this->session->userdata('username');
                    $data['error'] = 'No puedes dejar la explicación vacía';
                    $this->load->view('templates/header', $data);
                    $this->load->view('templates/navProfesor', $data);
                    $this->load->view('actualizar_explicacion', $data);
                    $this->load->view('templates/footer');
                }            
            }else{
                $data['title'] = '404 Página no encontrada';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/error_page');
                $this->load->view('templates/footer');
            }
        }

        public function crear(){
            if(!empty($this->session->userdata('username')) && $this->session->userdata('tipo_usuario') == 'profesor'){
                $curso_data = array(
                    'nombre' => $this->input->post('nombre'),
                    'descripcion' => $this->input->post('descripcion'),
                    'explicacion' => $this->input->post('explicacion'),
                    'dificultad' => $this->input->post('dificultad')                  
                );
                $this->load->model('Curso_model');               
                $curso = new Curso_model($curso_data);
                $errores = $curso->validar();
                if(empty($errores)){
                    $curso->registrar();
                    $this->administrar_cursos();
                }else{
                    $data['title'] = 'Creación de un curso';
                    $data['nombre'] = $this->session->userdata('username');
                    if(!array_key_exists('nombre', $errores))
				        $errores["nombre"] = null;
                    if(!array_key_exists('descripcion', $errores))
				        $errores["descripcion"] = null;
                    if(!array_key_exists('explicacion', $errores))
				        $errores["explicacion"] = null;
                    if(!array_key_exists('dificultad', $errores))
				        $errores["dificultad"] = null;
                    $data['errores'] = $errores;
                    $data['back'] = $curso_data;
                    $this->load->view('templates/header', $data);
                    $this->load->view('templates/navProfesor', $data);
                    $this->load->view('formulario_crear_curso', $data);
                    $this->load->view('templates/footer');
                }
            }else{
                $data['title'] = '404 Página no encontrada';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/error_page');
                $this->load->view('templates/footer');
            }
        }
    }
?>