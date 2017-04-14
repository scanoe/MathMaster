<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pregunta extends CI_Controller {

    public function preguntaA($curso_id){
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model("pregunta_model");
        $data["pregunta"]= $this->pregunta_model->ObternerPreguntaRand($curso_id);
        $data["contador"]=0;
        if ($data["pregunta"]->tipo_de_respuesta=="a") {
            $this->load->view("pregunta",$data);
        }else{
            $this->load->view("preguntaC",$data);
        }
    }

    public function responder_pregunta($id,$contador){
        $this->load->helper('form');
        $this->load->model("pregunta_model");
        ## cargar aca al modelo estudiante para incrementar las monedas
        $pregunta= $this->pregunta_model->ObtenerPreguntaId($id);
        $respuesta=$this->input->post('respuesta');
        if ($pregunta->respuesta==$respuesta) {
            ## en este punto se puede llamar la funcion que permita subir las monedas del usaurio por responder correctamente.
            $contador=$contador+1;
            if ($contador<10) {
                $data["pregunta"]= $this->pregunta_model->ObternerPreguntaRand("curso de prueba");
                $data["contador"]=$contador;
                if ($data["pregunta"]->tipo_de_respuesta=="a") {
                    $this->load->view("pregunta",$data);
                }else{
                    $this->load->view("preguntaC",$data);
                }
            }else{
                ##cambiar esto por una vista mejor
                echo"<h1> Felicidades!!!!</h1>
                <h2> usted ha aprovado el curso</h2>";
            }
        }else{
            echo"<p>respuesta incorecta porfavor trate de nuevo</p>";
            $data["pregunta"]= $pregunta;
            $data["contador"]=$contador;
            if ($data["pregunta"]->tipo_de_respuesta=="a") {
                $this->load->view("pregunta",$data);
            }else{
                $this->load->view("preguntaC",$data);
            }
        }
    }
}