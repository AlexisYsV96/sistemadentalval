<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class recetas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('mod_cita', 'mod_medico', 'mod_paciente', 'mod_odontograma', 'mod_procedimiento', 'mod_clinica', 'mod_licence','mod_receta'));
        $this->load->library('session');
    }


    public function index() {
        if (!$this->logged()) {
            header('location: ' . base_url('login'));
        } else {
            date_default_timezone_set('America/Lima');

            $recetas['fecha_actual'] = date("Y-m-d");
            $recetas["nueva_receta"] = array('name' => 'nueva_receta', 'id' => 'nueva_receta_btn' ,'class' => "btn btn-lg btn-success", 'value' => "true", "content" => "Nueva receta", "data-toggle" => "modal", "data-target" => "#ModalNuevaReceta", "style" => "position: relative; top: 20px; float: right;");

            $recetas["fecha"] = array('id' => 'fecha_receta', 'name' => 'fecha', 'class' => "form-control span2", "size" => "16", "value" => $recetas['fecha_actual'], "style" => "background: white;", "readonly" => "true");

            $medicos = $this->mod_medico->get_medico();
            $pacientes = $this->mod_paciente->get_paciente();
            $_recetas  = $this->mod_receta->get_recetas($recetas['fecha_actual'],['estado' => 'v']);

            if (count($medicos) > 0) {
                if (count($pacientes) > 0) {
                    foreach ($medicos as $value) {
                        $options[$value->codi_med] = $value->nomb_med . ' ' . $value->apel_med;
                    }
                    $recetas["medicos"] = $options;
                    $recetas["recetas"] = $_recetas;

                    $recetas['admin'] = $this->admin();
                    $data['container'] = $this->load->view('recetas/index', $recetas, true);
                } else {
                    $data['p'] = true;
                    $data['container'] = $this->load->view('citas/message', $recetas, true);
                }
            } else {
                $data['m'] = true;
                $data['container'] = $this->load->view('citas/message', $recetas, true);
            }


            $data['clinica'] = $this->mod_clinica->get_clinica();
            $this->load->view('home/body', $data);
        }
    }

    public function logged() {
        if ($this->mod_licence->validation()) {
            return $this->session->userdata('logged');
        }
    }

    public function admin() {
        if ($this->session->userdata('codi_rol') == '1') {
            return true;
        } else {
            return false;
        }
    }

    public function paciente_by_name(){
        $name = $this->input->post('name');
        $paciente = $this->mod_paciente->get_paciente_by_name($name);

        if(count($paciente)>0)
            echo json_encode($paciente[0]);
        else
            echo json_encode([]);
    }

    public function grabar(){
        $fecha = $this->input->post('fecha');
        $codi_med = $this->input->post('medico');
        $med = $this->mod_medico->get_medico(['codi_med'=>$codi_med])[0];
        $txt_med = $med->apel_med . ' '. $med->nomb_med;
        $pac = $this->mod_paciente->get_paciente_by_name($this->input->post('paciente'))[0];
        $codi_pac = $pac->codi_pac;
        $txt_pac = $pac->apel_pac . ' '. $pac->nomb_pac;
        $edad_pac = $pac->edad_pac;
        $receta = json_encode($this->input->post('receta'));
        $prescripcion = json_encode($this->input->post('prescripcion'));
        $fecha_sc = $this->input->post('fecha_sgt_cita') . ' ' . $this->input->post('hora_sgt_cita') . ':00';

        $data = [
            'fecha' => $fecha,
            'codi_med' => $codi_med,
            'txt_med' => $txt_med,
            'codi_pac' => $codi_pac,
            'txt_pac' => $txt_pac,
            'edad_pac'=> $edad_pac,
            'receta' => $receta,
            'prescripcion' => $prescripcion,
            'fecha_sc' => $fecha_sc,
            'estado' => 'v'
        ];

        $this->mod_receta->grabar($data);
    }


    public function receta_byId(){
       $idreceta = $this->input->post('idreceta');

       $receta  = $this->mod_receta->get_recetas("",['id' => $idreceta]);
    
       echo json_encode($receta[0]);
    }
}
