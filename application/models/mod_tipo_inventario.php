<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class mod_tipo_inventario extends CI_Model{

	public function __construct() {
        parent::__construct();
        $this->load->database();
}
	public function getlistarTipoInventario(){
		$this->db->where("estado","1");
		$resultados = $this->db->get("tipo_inventario");
		return $resultados->result();
	}

	// public function save($data){
	// 	return $this->db->insert("tipo_inventario",$data);
	// }


	public function getTipoInventario_Id($id){
		$this->db->from("tipo_inventario");
		$this->db->where('cod_tipo_inventario',$id);
		$query = $this->db->get();
		return $query->row();

	}

	public function tipo_inventario_update($where,$data){
		$this->db->update("tipo_inventario",$data,$where);
		return $this->db->affected_rows();
		
	}

	public function update_tipo_inventario($id,$data)
	{
		$this->db->where("cod_tipo_inventario",$id);
		return $this->db->update("tipo_inventario",$data);
	}

	public function add($data)
	{
		$this->db->insert("tipo_inventario",$data);
		return $this->db->insert_id();
	}


}