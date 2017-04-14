<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class pregunta extends CI_Controller {

    public function preguntaA(){
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model("pregunta_model");
        $this->load->model("Estudiante_model"); 
        $estudiante = new Estudiante_model(array('username'=>'daniel'));//Esto es temporal para este entregable, 
                                                                                //al final el usuario se obtiene de la sessión
                                                                                //de usuario que haya abierta
        $data['nombre'] = 'daniel'; //Esto también se debe cambiar por el usuario que esté en la session para el otro entregable                                                                        
        $data['monedas'] = $estudiante->get_monedas()[0]->monedas;
        $data["pregunta"]= $this->pregunta_model->ObternerPreguntaRand("curso de prueba");//El curso de deberá obtener a partir de la vista explicación
        $data["contador"]=0;
        $data['title'] = 'Test de curso de prueba';
        $data['progress'] = 0;
        $this->load->view('templates/header', $data);
        $this->load->view("templates/nav",$data);
        if ($data["pregunta"]->tipo_de_respuesta=="a") {
            $this->load->view("pregunta",$data);
        }else{
            $this->load->view("preguntaC",$data);
        }
        $this->load->view('templates/footer');
    }

    public function responder_pregunta($id,$contador){
        $this->load->helper('form');
        $this->load->model("pregunta_model");
        $this->load->model("Estudiante_model"); 
        $estudiante = new Estudiante_model(array('username'=>'daniel'));//Esto es temporal para este entregable, 
                                                                                //al final el usuario se obtiene de la sessión
                                                                                //de usuario que haya abierta
        $pregunta= $this->pregunta_model->ObtenerPreguntaId($id);
        $respuesta=$this->input->post('grupo-preguntas');

        if ($pregunta->respuesta==$respuesta) {
            $monedas = $estudiante->get_monedas()[0]->monedas;
            $monedas++;
            $estudiante->actualizar_monedas($monedas);
            $contador=$contador+1;
            $data['nombre'] = 'daniel'; //Esto también se debe cambiar por el usuario que esté en la session para el otro entregable                                                                        
            $data['monedas'] = $monedas;
            if ($contador<10) {
            $data["pregunta"]= $this->pregunta_model->ObternerPreguntaRand("curso de prueba");
            $data["contador"]=$contador;
            $data['title'] = 'Test de curso de prueba';
            $data['progress'] = $contador * 10;
            $this->load->view('templates/header', $data);
            $this->load->view("templates/nav",$data);
                if ($data["pregunta"]->tipo_de_respuesta=="a") {
                    $this->load->view("pregunta",$data);
                }else{
                    $this->load->view("preguntaC",$data);
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
                $this->load->view("pregunta",$data);
            }else{
                $this->load->view("preguntaC",$data);
            }
            $data['mensaje'] = 'Respuesta incorecta porfavor intente de nuevo';
            $this->load->view("mensaje",$data);
            $this->load->view('templates/footer');
        }
    }
}