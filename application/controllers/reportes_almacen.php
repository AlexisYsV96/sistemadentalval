<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class reportes_almacen extends CI_Controller{

	 public function __construct() 
	 {
        parent::__construct();
         $this->load->model(array('mod_usuario', 'mod_clinica', 'mod_licence','mod_inventario','mod_tipo_inventario'));
         $this->load->library('session');
    }

    public function index()
	{
		if (!$this->logged()) {
            header('location: ' . base_url('login'));
        } else {
            if (!$this->admin()) {
                header('location: ' . base_url('login'));
            } else {    

                session_start();
                $session_id= session_id();
                $fechainicio = $this->input->post("fechainicio");
                 $fechafin = $this->input->post("fechafin");
                if ($this->input->post("buscar")) {
                	$inventario=$this->mod_inventario->getInventariobyDate($fechainicio,$fechafin);
                	# code...
                }
                else{
                	$inventario=$this->mod_inventario->getInventario();
                }
               
                $data  = array(
                    'inventario' => $inventario,
                    'fechainicio' => $fechainicio,
                    'fechafin' => $fechafin
                    // 'tipo_inventario'=>$this->mod_tipo_inventario->getlistarTipoInventario(),
                    
                     // 'tipo_inventario'=>$this->mod_tipo_inventario->getlistarTipoInventario()
                );
                $data['container'] = $this->load->view('Reportes/almacen',$data);
                $data['clinica'] = $this->mod_clinica->get_clinica();
                $this->load->view('home/body', $data);
            }
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
}