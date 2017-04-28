<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pregunta extends CI_Controller {

    public function iniciar_test($curso_id){
        if(!empty($this->session->userdata('username'))){
            $this->load->model("pregunta_model");
            $this->load->model("Estudiante_model");
            $this->load->model("Curso_model");
            $curso = new Curso_model();
            $estudiante = new Estudiante_model(array('username'=>$this->session->userdata('username')));
            $nombre_curso = $curso->obtener_nombre_curso($curso_id)[0]->nombre;
            $data["nombre"] = $estudiante->obtener_nombre()[0]->nombre;
            $data['monedas'] = $estudiante->get_monedas()[0]->monedas;
            $data["pregunta"]= $this->pregunta_model->obtener_pregunta_aleatoria($curso_id)[0];
            $data["contador"] = 0;
            $data['title'] = 'Test de '.$nombre_curso;
            $data['progress'] = 0;
            $this->load->view('templates/header', $data);
            $this->load->view("templates/nav",$data);
            $usuario_data = array(
                'username' => $this->session->userdata('username'),
                'progreso' => 0,
                'pregunta' => $data["pregunta"]
            );
            $this->session->set_userdata($usuario_data);
            if ($data["pregunta"]->tipo_de_respuesta=="a") {
                $this->load->view("pregunta_abierta",$data);
            }else{
                $this->load->view("pregunta_op_multiple",$data);
            }
            $this->load->view("templates/footer",$data);
        }else{
            $data['title'] = '404 Página no encontrada';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/error_page');
            $this->load->view('templates/footer');
        }
    }

    public function responder_pregunta(){
        if(!empty($this->session->userdata('username'))){
            $this->load->model("pregunta_model");
            $this->load->model("Estudiante_model");
            $this->load->model("Curso_model");
            $estudiante = new Estudiante_model(array('username'=>$this->session->userdata('username')));
            $curso = new Curso_model();
            $nombre_curso = $curso->obtener_nombre_curso($this->session->userdata('pregunta')->id)[0]->nombre;
            $pregunta= $this->session->userdata('pregunta');
            $respuesta=$this->input->post('grupo-preguntas');
            $contador = $this->session->userdata('progreso');
            if ($pregunta->respuesta==$respuesta) {
                $monedas = $estudiante->get_monedas()[0]->monedas;
                $monedas++;
                $estudiante->actualizar_monedas($monedas);
                $contador++;
                $data['nombre'] = $estudiante->obtener_nombre()[0]->nombre;                                                                        
                $data['monedas'] = $monedas;
                if ($contador < 10) {
                    $curso_id = $this->session->userdata('pregunta')->curso;
                    $data["pregunta"] = $this->pregunta_model->obtener_pregunta_aleatoria($curso_id)[0];
                    $data["contador"] = $contador;
                    $data['title'] = 'Test de '.$nombre_curso;
                    $data['progress'] = $contador * 10;
                    $usuario_data = array(
                        'username' => $this->session->userdata('username'),
                        'progreso' => $contador,
                        'pregunta' => $data["pregunta"]
                    );
                    $this->session->set_userdata($usuario_data);
                    $this->load->view('templates/header', $data);
                    $this->load->view("templates/nav",$data);
                    if ($data["pregunta"]->tipo_de_respuesta=="a") {
                        $this->load->view("pregunta_abierta",$data);
                    }else{
                        $this->load->view("pregunta_op_multiple",$data);
                    }
                }else{
                    $data['title'] = 'Curso aprobado';
                    $this->load->view('templates/header', $data);
                    $this->load->view("templates/nav",$data);
                    $data['curso'] = 'curso_prueba';
                    $this->load->view('curso_aprobado', $data);
                    $usuario_data = array(
                        'username' => $this->session->userdata('username'),
                        'progreso' => 0,
                        'pregunta' => null
                    );
                    $this->session->set_userdata($usuario_data);
                }
                $this->load->view('templates/footer');
            }else{
                $data["pregunta"] = $this->session->userdata('pregunta');
                $data["contador"]=$contador;
                $data['title'] = 'Test de '.$nombre_curso;
                $data['monedas'] = $estudiante->get_monedas()[0]->monedas;
                $data['nombre'] = $estudiante->obtener_nombre()[0]->nombre;                                                                        
                $data['progress'] = $contador * 10;
                $this->load->view('templates/header', $data);
                $this->load->view("templates/nav",$data);
                if ($data["pregunta"]->tipo_de_respuesta=="a") {
                    $this->load->view("pregunta_abierta",$data);
                }else{
                    $this->load->view("pregunta_op_multiple",$data);
                }
                $data['mensaje'] = 'Respuesta incorrecta por favor intente de nuevo';
                $this->load->view("mensaje",$data);
                $this->load->view('templates/footer');
            }
        }else{
            $data['title'] = '404: Pagina no encontrada';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/error_page');
            $this->load->view('templates/footer');
        }
    }

    public function cambiar_pregunta(){
        if(!empty($this->session->userdata('username'))){
            $this->load->model("pregunta_model");
            $this->load->model("Estudiante_model"); 
            $estudiante = new Estudiante_model(array('username'=>$this->session->userdata('username')));
            $this->load->model("Curso_model");
            $curso = new Curso_model();
            $nombre_curso = $curso->obtener_nombre_curso($this->session->userdata('pregunta')->id)[0]->nombre;
            $monedas = $estudiante->get_monedas()[0]->monedas;
            $id = $this->session->userdata('pregunta')->id;
            if($monedas >= 2){
                $monedas -= 2;
                $estudiante->actualizar_monedas($monedas);
                $curso_id = $curso->obtener_id_curso($id)[0]->curso;
                $data["pregunta"]= $this->pregunta_model->obtener_pregunta_aleatoria($curso_id)[0];
                $usuario_data = array(
                    'username' => $this->session->userdata('username'),
                    'progreso' => $this->session->userdata('progreso'),
                    'pregunta' => $data["pregunta"]
                );
                $this->session->set_userdata($usuario_data);
                $data['nombre'] = $estudiante->obtener_nombre()[0]->nombre;  
                $data['monedas'] = $monedas;
                $data["contador"] = $this->session->userdata('progreso');
                $data['title'] = 'Test de '.$nombre_curso;
                $data['progress'] = $this->session->userdata('progreso') * 10;
                $this->load->view('templates/header', $data);
                $this->load->view("templates/nav",$data);
                if ($data["pregunta"]->tipo_de_respuesta=="a") {
                    $this->load->view("pregunta_abierta",$data);
                }else{
                    $this->load->view("pregunta_op_multiple",$data);
                }
                $this->load->view('templates/footer');
            }else{
                $data["pregunta"]= $this->pregunta_model->obtener_pregunta_por_id($id);
                $data['nombre'] = $estudiante->obtener_nombre()[0]->nombre;  
                $data['monedas'] = $monedas;
                $data["contador"] = $this->session->userdata('progreso');
                $data['title'] = 'Test de '.$nombre_curso;
                $data['progress'] = $this->session->userdata('contador') * 10;
                $this->load->view('templates/header', $data);
                $this->load->view("templates/nav",$data);
                if ($data["pregunta"]->tipo_de_respuesta=="a") {
                    $this->load->view("pregunta_abierta",$data);
                }else{
                    $this->load->view("pregunta_op_multiple",$data);
                }
                $msg['mensaje'] = "No tienes suficientes monedas, aprueba cursos para recolectar más";
                $this->load->view("mensaje",$msg);
                $this->load->view('templates/footer');
            }
        }else{
            $data['title'] = '404: Pagina no encontrada';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/error_page');
            $this->load->view('templates/footer');
        }
	}

    public function ver_respuesta(){
        if(!empty($this->session->userdata('username'))){
            $this->load->model("pregunta_model");
            $this->load->model("Estudiante_model");
            $this->load->model("Curso_model");
            $estudiante = new Estudiante_model(array('username'=>$this->session->userdata('username')));
            $curso = new Curso_model();
            $nombre_curso = $curso->obtener_nombre_curso($this->session->userdata('pregunta')->id)[0]->nombre;
            $pregunta= $this->pregunta_model->obtener_pregunta_por_id($this->session->userdata('pregunta')->id);
            $monedas = $estudiante->get_monedas()[0]->monedas;
            $contador = $this->session->userdata('progreso');
            if($monedas >= 10) {
                $monedas=$monedas-10;
                $estudiante->actualizar_monedas($monedas);
                $data['nombre'] = $this->session->userdata('username');
                $data['monedas'] = $monedas;
                $data["pregunta"] = $pregunta;
                $data["contador"] = $contador;
                $data['title'] = 'Test de '.$nombre_curso;
                $data['progress'] = $contador * 10;
                $this->load->view('templates/header', $data);
                $this->load->view("templates/nav", $data);
                if ($data["pregunta"]->tipo_de_respuesta == "a") {
                    $this->load->view("pregunta_abierta", $data);
                } else {
                    $this->load->view("pregunta_op_multiple", $data);
                }
                $data['mensaje'] = 'Respuesta correcta: ' . $pregunta->respuesta;
                $this->load->view("mensaje", $data);
                $this->load->view('templates/footer');
            }else{
                $data["pregunta"]= $pregunta;
                $data["contador"]=$contador;
                $data['title'] = 'Test de '.$nombre_curso;
                $data['monedas'] = $estudiante->get_monedas()[0]->monedas;
                $data['nombre'] = $this->session->userdata('username');
                $data['progress'] = $contador * 10;
                $this->load->view('templates/header', $data);
                $this->load->view("templates/nav",$data);
                if ($data["pregunta"]->tipo_de_respuesta=="a") {
                    $this->load->view("pregunta_abierta",$data);
                }else{
                    $this->load->view("pregunta_op_multiple",$data);
                }
                $data['mensaje'] = 'Saldo insuficiente: No tienes suficientes monedas, aprueba cursos para recolectar más';
                $this->load->view("mensaje",$data);
                $this->load->view('templates/footer');
            }
        }else{
            $data['title'] = '404: Pagina no encontrada';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/error_page');
            $this->load->view('templates/footer');
        }
    }
}