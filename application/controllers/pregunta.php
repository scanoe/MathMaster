<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class pregunta extends CI_Controller {

    public function iniciar_test($curso_id){
        if(!empty($this->session->userdata('username'))){
            $this->load->helper('form');
            $this->load->model("pregunta_model");
            $this->load->model("Estudiante_model");
            $this->load->model("Curso_model")
            $estudiante = new Estudiante_model(array('username'=>$this->session->userdata('username')));
            $nombre_curso = $curso->obtener_nombre_curso($id)[0]->nombre;
            $data["nombre"] = $estudiante->obtener_nombre()[0]->nombre;
            $data['monedas'] = $estudiante->get_monedas()[0]->monedas;
            $data["pregunta"]= $this->pregunta_model->ObtenerPreguntaRand($curso_id)[0];
            $data["contador"] = 0;
            $data['title'] = 'Test de '.$nombre_curso;
            $data['progress'] = 0;
            $this->load->view('templates/header', $data);
            $this->load->view("templates/nav",$data);
            if ($data["pregunta"]->tipo_de_respuesta=="a") {
                $this->load->view("pregunta_abierta",$data);
            }else{
                $this->load->view("pregunta_op_multiple",$data);
            }
            $this->load->view('templates/footer');
        }
    }

    public function responder_pregunta($id,$contador){
        $this->load->helper('form');
        $this->load->model("pregunta_model");
        $this->load->model("Estudiante_model");
        $this->load->model("Curso_model");
        $estudiante = new Estudiante_model(array('username'=>$this->session->userdata('username')));
        $curso = new Curso_model();
        $pregunta= $this->pregunta_model->ObtenerPreguntaId($id);
        $respuesta=$this->input->post('grupo-preguntas');
        if ($pregunta->respuesta==$respuesta) {
            $monedas = $estudiante->get_monedas()[0]->monedas;
            $monedas++;
            $estudiante->actualizar_monedas($monedas);
            $contador++;
            $data['nombre'] = $estudiante->obtener_nombre()[0]->nombre;                                                                        
            $data['monedas'] = $monedas;
            if ($contador < 10) {
            $curso_id = $curso->obtener_id_curso($id)[0]->curso;
            $nombre_curso = $curso->obtener_nombre_curso($id)[0]->nombre;
            $data["pregunta"] = $this->pregunta_model->ObtenerPreguntaRand($curso_id)[0];
            $data["contador"] = $contador;
            $data['title'] = 'Test de '.$nombre_curso;
            $data['progress'] = $contador * 10;
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
            }
            $this->load->view('templates/footer');
        }else{
            $data["pregunta"]= $pregunta;
            $data["contador"]=$contador;
            $data['title'] = 'Test de curso de prueba';
            $data['monedas'] = $estudiante->get_monedas()[0]->monedas;
            $data['nombre'] = 'daniel'; //Esto también se debe cambiar por el usuario que esté en la session para el otro entregable                                                                        
            $data['progress'] = $contador * 10;
            $this->load->view('templates/header', $data);
            $this->load->view("templates/nav",$data);
            if ($data["pregunta"]->tipo_de_respuesta=="a") {
                $this->load->view("pregunta_abierta",$data);
            }else{
                $this->load->view("pregunta_op_multiple",$data);
            }
            $data['mensaje'] = 'Respuesta incorecta porfavor intente de nuevo';
            $this->load->view("mensaje",$data);
            $this->load->view('templates/footer');
        }
    }
}