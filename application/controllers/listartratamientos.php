<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class listartratamientos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('mod_paciente', 'mod_usuario', 'mod_clinica', 'mod_licence','mod_tratamiento'));
        $this->load->library('session');
    }

    public function index(){
    	if (!$this->logged()) {
            header('location: ' . base_url('login'));
        } else {
            if (!$this->admin()) {
                header('location: ' . base_url('login'));
            } else {    

                session_start();
                $session_id= session_id();
                // $this->mod_tratamiento->delete_tmp($session_id);    

                // $tratamiento['pacientes'] = $this->mod_paciente->get_paciente_historial();
                // $tratamiento['enfermedades'] =  $this->mod_tratamiento->get_tratamiento();   
                // $tratamiento['fecha_actual'] = date('Y-m-d');  
                // $tratamiento['fecha'] = array('id' => 'fecha_trat', 'name' => 'fecha', 'class' => "form-control span2", "size" => "16", "value" => $tratamiento['fecha_actual'], "style" => "background: white;", "readonly" => "true");




                $data  = array(
                    'tratamiento' => $this->mod_tratamiento->Get_lista_tratamientos(),);
                $data['container'] = $this->load->view('tratamiento/listar',$data);
                $data['clinica'] = $this->mod_clinica->get_clinica();
                $this->load->view('home/body', $data);
            }
        }
    }

    public function pago_edit($id)
    {
        $data = $this->mod_tratamiento->GetPagos_Id($id);

        echo json_encode($data);
    }

    public function pago_update()
    {
        $pago  = $this->mod_tratamiento->GetPagos_Id($this->input->post('id_presupuesto'));

        $data = array(
            
             'adelanto'=> $pago->adelanto + $this->input->post('adelanto'),
            'estado_tratamiento'=>$this->input->post('estado_tratamiento'),
            'fecha'=>$this->input->post('fecha'),
            
        );
        $this->mod_tratamiento-> pagos_update(array('id_presupuesto' => $this->input->post('id_presupuesto')),$data);
        echo json_encode(array("status" => TRUE));

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

}