<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Insignia extends CI_Controller{
        public function cargar_formulario_insignia($id_curso){
            if(!empty($this->session->userdata('username')) && $this->session->userdata('tipo_usuario') == 'profesor'){
                $data['title'] = 'Agregar insignia';
                $data['nombre'] = $this->session->userdata('username');
                $data['id'] = $id_curso;
                $data['errores'] = null;
                $data['back'] = null;
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navProfesor', $data);
                $this->load->view('agregar_insignia', $data);
                $this->load->view('templates/footer');
            }else{
                $data['title'] = '404 Página no encontrada';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/error_page');
                $this->load->view('templates/footer');
            }
        }

        public function insertar($id_curso){
            if(!empty($this->session->userdata('username')) && $this->session->userdata('tipo_usuario') == 'profesor'){
                $nombre = $this->input->post('nombre');
                $descripcion = $this->input->post('descripcion');
                $imagen = $this->input->post('imagen');
                $this->load->model('Insignia_model');
                $data_insignia = array('nombre' => $nombre, 'imagen' => $imagen, 'descripcion' => $descripcion);
                $insignia = new Insignia_model($data_insignia);
                $errores = $insignia->validar();
                if(empty($errores)){
                    $insignia->agregar($id_curso);
                    $data['title'] = 'Insignia agregada';
                    $data['nombre'] = $this->session->userdata('username');
                    $data['mensaje'] = 'La insignia se agregó correctamente';
                    $this->load->view('templates/header', $data);
                    $this->load->view('templates/navProfesor', $data);                
                    $this->load->view('insignia_agregada', $data);
                    $this->load->view('templates/footer', $data);   
                }else{
                    $data['title'] = 'Agregar insignia';
                    $data['nombre'] = $this->session->userdata('username');
                    $data['id'] = $id_curso;
                    $data['errores'] = $errores;
                    $data['back'] = $data_insignia;
                    $this->load->view('templates/header', $data);
                    $this->load->view('templates/navProfesor', $data);
                    $this->load->view('agregar_insignia', $data);
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