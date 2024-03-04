<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
* 
*/
class pago extends CI_Controller
{
	
	public function __construct()
	{
		 parent::__construct();
        $this->load->model(array('mod_usuario', 'mod_clinica', 'mod_licence','mod_pago'));
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
                 date_default_timezone_set("America/Lima"); 
                $data  = array(
                    'pago' => $this->mod_pago->getPago(),
                   // 'tipo_inventario'=>$this->mod_tipo_inventario->getlistarTipoInventario(),
                     // 'tipo_inventario'=>$this->mod_tipo_inventario->getlistarTipoInventario()
                );
                $data['container'] = $this->load->view('pago/list_pago',$data);
                $data['clinica'] = $this->mod_clinica->get_clinica();
                $this->load->view('home/body', $data);
            }
        }
    }

    public function pago_add()
    {
        date_default_timezone_set("America/Lima"); 
        $createDate= date("Y-m-d H:i:s");
        $data = array(
            'concepto_pago' => $this->input->post('concepto_pago'),
            'fecha_registro' =>$createDate,
            'fecha_pago' =>$createDate,
            'monto_pago' =>$this->input->post('monto_pago'),
            'movimiento_pago' =>$this->input->post('movimiento_pago'),
            'tipo_pago' =>$this->input->post('tipo_pago'),
            'observacion' =>$this->input->post('observacion'),
            'estado' => 1,
        );
         $insert = $this->mod_pago->add($data);
        echo json_encode(array("status"=>true));

          
      
    }

   
    public function pago_edit($id)
    {
        $data = $this->mod_pago->getPago_Id($id);

        echo json_encode($data);
    }

    public function pago_update()
    {
        date_default_timezone_set("America/Lima"); 
         $createDate= date("Y-m-d H:i:s");
        $data = array(
         'concepto_pago' => $this->input->post('concepto_pago'),
            'fecha_registro' =>$createDate,
            'fecha_pago' =>$createDate,
            'monto_pago' =>$this->input->post('monto_pago'),
            'movimiento_pago' =>$this->input->post('movimiento_pago'),
            'tipo_pago' =>$this->input->post('tipo_pago'),
            'observacion' =>$this->input->post('observacion'),
            'estado' => 1,
        );
        $this->mod_pago->pago_update(array('cod_pago' => $this->input->post('cod_pago')),$data);
        echo json_encode(array("status" => TRUE));

        

    }
    // public function view(){
    //     $id = $this->input->post("cod_tipo_inventario");
    //     $data = array(
    //         "tipo_inventario" =>$this->mod_tipo_inventario->getTipoInventario($id),);
           
    //     $this->load->view("tipo_inventario/view",$data);
    // }

    // public function edit($id){
    //    if (!$this->logged()) {
    //         header('location: ' . base_url('login'));
    //     } else {
    //         if (!$this->admin()) {
    //             header('location: ' . base_url('login'));
    //         } else {    

    //             session_start();
    //             $session_id= session_id();

    //             $data  = array(
    //                 'tipo_inventario' => $this->mod_tipo_inventario->getTipoInventario($id),);
    //             $data['container'] = $this->load->view('tipo_inventario/edit',$data);
    //             $data['clinica'] = $this->mod_clinica->get_clinica();
    //             $this->load->view('home/body', $data);
    //         }
    //     }
    // }

    public function delete($id)
    {
        $data = array(
            'estado'=> "0",);
        $this->mod_pago->update_pago($id,$data);
        redirect('pago') ;
        
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