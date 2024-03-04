<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
* 
*/
class inventario extends CI_Controller
{
	
	public function __construct()
	{
		 parent::__construct();
        $this->load->model(array('mod_usuario', 'mod_clinica', 'mod_licence','mod_inventario','mod_tipo_inventario'));
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
                    'inventario' => $this->mod_inventario->getInventario(),
                    'tipo_inventario'=>$this->mod_tipo_inventario->getlistarTipoInventario(),
                     // 'tipo_inventario'=>$this->mod_tipo_inventario->getlistarTipoInventario()
                );
                $data['container'] = $this->load->view('inventario/list_inventario',$data);

                $data['clinica'] = $this->mod_clinica->get_clinica();
                $this->load->view('home/body', $data);
            }
        }
    }

    public function inventario_add()
    {
              date_default_timezone_set("America/Lima"); 
        $createDate= date("Y-m-d H:i:s");
        $data = array(
            'nombre_almacen' => $this->input->post('nombre_almacen'),
            'nombre_producto' =>$this->input->post('nombre_producto'),
            'cod_tipo_inventario' =>$this->input->post('cod_tipo_inventario'),
            'precio_entrada' =>$this->input->post('precio_entrada'),
            'precio_salida' =>$this->input->post('precio_salida'),
            'unidad' =>$this->input->post('unidad'),
            'stock_inventario' =>$this->input->post('stock_inventario'),
            'fecha_registro' =>$createDate,
            'estado' => 1,
        );
         $insert = $this->mod_inventario->add($data);
        echo json_encode(array("status"=>true));

          
      
    }

   
    public function inventario_edit($id)
    {
        $data = $this->mod_inventario->getInventario_Id($id);

        echo json_encode($data);
    }

    public function inventario_update()
    {
         $createDate= date("Y-m-d H:i:s");
        $data = array(
            'nombre_almacen' => $this->input->post('nombre_almacen'),
            'nombre_producto' =>$this->input->post('nombre_producto'),
            'cod_tipo_inventario' =>$this->input->post('cod_tipo_inventario'),
            'precio_entrada' =>$this->input->post('precio_entrada'),
            'precio_salida' =>$this->input->post('precio_salida'),
            'unidad' =>$this->input->post('unidad'),
            'stock_inventario' =>$this->input->post('stock_inventario'),
            'fecha_registro' =>$createDate,
            'estado' => 1,
        );
        $this->mod_inventario->inventario_update(array('cod_inventario' => $this->input->post('cod_inventario')),$data);
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
        $this->mod_inventario->update_inventario($id,$data);
        redirect('inventario');
        
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