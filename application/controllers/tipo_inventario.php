<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
* 
*/
class tipo_inventario extends CI_Controller
{
	
	public function __construct()
	{
		 parent::__construct();
        $this->load->model(array('mod_usuario', 'mod_clinica', 'mod_licence','mod_tipo_inventario'));
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

                $data  = array(
                    'tipo_inventario' => $this->mod_tipo_inventario->getlistarTipoInventario(),);
                $data['container'] = $this->load->view('tipo_inventario/list',$data);
                $data['clinica'] = $this->mod_clinica->get_clinica();
                $this->load->view('home/body', $data);
            }
        }
    }

    public function tipo_inventario_add()
    {
         
        

        $data = array(
            'nombre' => $this->input->post('nombre'),
            'descripcion' =>$this->input->post('descripcion'),
            'estado' => 1,
        );
         $insert = $this->mod_tipo_inventario->add($data);
        echo json_encode(array("status"=>true));

          
      
    }

    public function tipo_inventario_edit($id)
    {
        $data = $this->mod_tipo_inventario->getTipoInventario_Id($id);

        echo json_encode($data);
    }

    public function tipo_inventario_update()
    {
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'descripcion' =>$this->input->post('descripcion'),
        );
        $this->mod_tipo_inventario->tipo_inventario_update(array('cod_tipo_inventario' => $this->input->post('cod_tipo_inventario')),$data);
        echo json_encode(array("status" => TRUE));

        

    }
    // public function view(){
    //     $id = $this->input->post("cod_tipo_inventario");
    //     $data = array(
    //         "tipo_inventario" =>$this->mod_tipo_inventario->getTipoInventario($id),);
           
    //     $this->load->view("tipo_inventario/view",$data);
    // }

    public function edit($id){
       if (!$this->logged()) {
            header('location: ' . base_url('login'));
        } else {
            if (!$this->admin()) {
                header('location: ' . base_url('login'));
            } else {    

                session_start();
                $session_id= session_id();

                $data  = array(
                    'tipo_inventario' => $this->mod_tipo_inventario->getTipoInventario($id),);
                $data['container'] = $this->load->view('tipo_inventario/edit',$data);
                $data['clinica'] = $this->mod_clinica->get_clinica();
                $this->load->view('home/body', $data);
            }
        }
    }

    public function delete($id)
    {
        $data = array(
            'estado'=> "0",);
        $this->mod_tipo_inventario->update_tipo_inventario($id,$data);
        redirect('tipo_inventario');
        
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