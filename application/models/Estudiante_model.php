<?php

defined('BASEPATH') OR exit('No direct script access allowed');


        public function __construct($value = null){
            parent::__construct();
            $this->load->database();
			$this->load->library('PasswordHash');
            if ($value != null)
                settype($value, 'object');
            if (is_object($value)) {
                $this->username = isset($value->username) ? $value->username : null;
                $this->nombres = isset($value->nombres) ? $value->nombres : null;
                $this->pass = isset($value->pass) ? $value->pass : null;
                $this->fecha_nacimiento = isset($value->fecha_nacimiento) ? $value->fecha_nacimiento : null;
                $this->sexo = isset($value->sexo) ? $value->sexo : 'F';
                $this->monedas = isset($value->monedas) ? $value->monedas : null;
                $this->puntos = isset($value->puntos) ? $value->puntos : null;
				$this->PasswordHash = new PasswordHash();
            }
        }
=======
class Estudiante_model extends CI_Model {

    private $username;
    private $nombres;
    private $pass;
    private $fecha_nacimiento;
    private $sexo;
    private $monedas;
    private $puntos;
    private $PasswordHash;

    public function __construct($value = null) {
        parent::__construct();
        $this->load->database();
        $this->load->library('PasswordHash');
        if ($value != null)
            settype($value, 'object');
        if (is_object($value)) {
            $this->username = isset($value->username) ? $value->username : null;
            $this->nombres = isset($value->nombres) ? $value->nombres : null;
            $this->pass = isset($value->pass) ? $value->pass : null;
            $this->fecha_nacimiento = isset($value->fecha_nacimiento) ? $value->fecha_nacimiento : null;
            $this->sexo = isset($value->sexo) ? $value->sexo : null;
            $this->monedas = isset($value->monedas) ? $value->monedas : null;
            $this->puntos = isset($value->puntos) ? $value->puntos : null;
            $this->PasswordHash = new PasswordHash();
        }
    }

    public function __get($key) {
        switch ($key) {
            case 'username' :
                $query = $this->db->get_where('estudiante', array('nombre_usuario' => $this->username));
                return $query->result()[0]->nombre_usuario;
            case 'nombres' :
                $query = $this->db->get_where('estudiante', array('nombre_usuario' => $this->username));
                return $query->result()[0]->nombre;
            case 'pass' :
                $query = $this->db->get_where('estudiante', array('nombre_usuario' => $this->username));
                return $query->result()[0]->contraseña;
            case 'fecha_nacimiento' :
                $query = $this->db->get_where('estudiante', array('nombre_usuario' => $this->username));
                return $query->result()[0]->fecha_nacimiento;
            case 'sexo' :
                $query = $this->db->get_where('estudiante', array('nombre_usuario' => $this->username));
                return $query->result()[0]->genero;
            case 'monedas' :
                $query = $this->db->get_where('estudiante', array('nombre_usuario' => $this->username));
                return $query->result()[0]->monedas;
            case 'puntos' :
                $query = $this->db->get_where('estudiante', array('nombre_usuario' => $this->username));
                return $query->result()[0]->puntos;
            default:
                return parent::__get($key);
        }
    }

    public function validar() {
        $errores = [];
        $query = $this->db->get_where('estudiante', array('nombre_usuario' => $this->username));
        $result = $query->result();
        if (!empty($result))
            $errores["user"] = 'Ya existe el usuario';
        elseif ($this->username == null)
            $errores["user"] = 'Escribe un nombre de usuario';
        if ($this->nombres == null)
            $errores["nombre"] = 'Escribe un nombre';
        if ($this->pass == null)
            $errores["pass"] = 'Escribe una contraseña';
        if ($this->fecha_nacimiento == null)
            $errores["fecha_nacimiento"] = 'Escribe una fecha de nacimiento';
        return $errores;
    }

    public function validar_login() {
        $errores = [];
        $query = $this->db->get_where('estudiante', array('nombre_usuario' => $this->username));
        $result = $query->result();
        if (empty($result)) {
            $errores["login"] = 'No existe el usuario';
        } elseif (!$this->PasswordHash->CheckPassword($this->pass, $result[0]->contraseña)) {
            $errores["login"] = 'Usuario o contraseña incorrectos';
        }
        return $errores;
    }

    public function registrar() {
        $data = array(
            'nombre_usuario' => $this->username,
            'nombre' => $this->nombres,
            'contraseña' => $this->PasswordHash->HashPassword($this->pass),
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'genero' => $this->sexo,
            'monedas' => 0,
            'puntos' => 0
        );
        if ($this->db->insert('estudiante', $data))
            return TRUE;
        else
            return FALSE;
    }

    public function actualizar_monedas($monedas) {
        $this->db->set('monedas', $monedas, FALSE);
        $this->db->where('nombre_usuario', $this->username);
        $this->db->update('Estudiante');
    }

    public function actualizar_experiencia($experiencia) {
        $this->db->set('puntos', $experiencia, FALSE);
        $this->db->where('nombre_usuario', $this->username);
        $this->db->update('Estudiante');
    }

    public function obtener_estudiantes_ordenados_por_puntos() {
        $query = $this->db->select('*')
                ->from('estudiante')
                ->order_by('puntos DESC')
                ->get();
        return $query->result();
    }

    public function agregar_insignia($insignia) {
        if (!$insignia->existe_insignia_por_estudiante($this->username)) {
            $data = array(
                'nombre_usuario' => $this->username,
                'id_insignia' => $insignia->obtener_id()
            );
            if ($this->db->insert('insiginiaxestudiante', $data))
                return TRUE;
            else
                return FALSE;
        }
        return FALSE;
    }

}

        public function agregar_insignia($insignia){
            if(!$insignia->existe_insignia_por_estudiante($this->username)){
                $data = array(
                    'nombre_usuario' => $this->username,
                    'id_insignia' => $insignia->obtener_id()
                );
                if ($this->db->insert('insiginiaxestudiante', $data))
                    return TRUE;
                else
                    return FALSE;
            }
            return FALSE;
        }

        public function agregar_curso_aprobado($curso){
            $data = array(
                'nombre_usuario' => $this->username,
                'curso' => $curso
            );
            $curso_ya_aprobado = !empty($this->db->get_where('lista_cursos_aprobados', $data));
            if(!$curso_ya_aprobado)
                if ($this->db->insert('lista_cursos_aprobados', $data))
                    return TRUE;
                else
                    return FALSE;
            return FALSE;
        }

        public function obtener_cursos_aprobados(){
            $this->db->select('*');
            $this->db->from('curso c');
            $this->db->join('lista_cursos_aprobados l', 'c.id=l.curso');
            $this->db->where('l.nombre_usuario',$this->username);
            $query = $this->db->get();
            return $query->result();
        }

        public function obtener_insignias_ganadas(){
            $this->db->select('*');
            $this->db->from('insignia i');
            $this->db->join('insiginiaxestudiante ixe', 'i.id=ixe.id_insignia');
            $this->db->where('ixe.nombre_usuario',$this->username);
            $query = $this->db->get();
            return $query->result();
        }
    }
?>