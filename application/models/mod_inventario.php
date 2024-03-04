<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class mod_inventario extends CI_Model{

	public function __construct() {
        parent::__construct();
        $this->load->database();
}

	public function getInventario(){
		$this->db->select("i.*,t.nombre as nombre_inventario");
		$this->db->from("inventario i");
		$this->db->join("tipo_inventario t","i.cod_tipo_inventario = t.cod_tipo_inventario");
		$this->db->where("i.estado","1");
		$resultados = $this->db->get();
		if($resultados->num_rows() > 0){
			return $resultados->result();
		}
		else
		{
			return false;

		}
		
		}

	public function getInventariobyDate($fechainicio,$fechafin){

		$sql="select i.cod_inventario,i.nombre_almacen,
					i.nombre_producto,
					t.nombre as nombre_inventario,
					i.precio_entrada,
					i.precio_salida,
					i.unidad,
					i.stock_inventario,
					i.fecha_registro from inventario i
					 inner join tipo_inventario t
					 on i.cod_tipo_inventario = t.cod_tipo_inventario
					where
					  date_format(i.fecha_registro,'%Y%m%d') between date_format('$fechainicio','%Y%m%d') and date_format('$fechafin','%Y%m%d')";
				
					

	$query=$this->db->query($sql);
		return $query->result();



		 }

	public function add($data)
		{
			$this->db->insert("inventario",$data);
			return $this->db->insert_id();
		}


	public function getInventario_Id($id)
	{
		$this->db->from("inventario");
		$this->db->where('cod_inventario',$id);
		$query = $this->db->get();

		return $query->row();
	}


	public function inventario_update($where,$data){
		$this->db->update("inventario",$data,$where);
		return $this->db->affected_rows();
		
	}

	public function update_inventario($id,$data)
	{
		$this->db->where("cod_inventario",$id);
		return $this->db->update("inventario",$data);
	}
}