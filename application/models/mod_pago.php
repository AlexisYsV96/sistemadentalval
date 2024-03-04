<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class mod_pago extends CI_Model{

	public function __construct() {
        parent::__construct();
        $this->load->database();
}

	public function getPago(){

		$this->db->where("estado","1");
		$resultados = $this->db->get("pago");
		return $resultados->result();
		}


	public function add($data)
		{
			$this->db->insert("pago",$data);
			return $this->db->insert_id();
		}


	public function getPago_Id($id)
	{
		$this->db->from("pago");
		$this->db->where('cod_pago',$id);
		$query = $this->db->get();

		return $query->row();
	}


	public function pago_update($where,$data){
		$this->db->update("pago",$data,$where);
		return $this->db->affected_rows();
		
	}

	public function update_pago($id,$data)
	{
		$this->db->where("cod_pago",$id);
		return $this->db->update("pago",$data);
	}

	public function getPagobyDate($FInicial,$FFinal,$Documento){

		$sql="select 
p.cod_pago,
p.concepto_pago,
p.fecha_pago,
p.monto_pago,
CASE p.movimiento_pago
WHEN 'I' THEN 'INGRESO'
ELSE 'EGRESO' END AS 'Movimiento',
CASE p.tipo_pago
WHEN 'P' THEN 'CONTADO' 
WHEN 'C' THEN 'CREDITO' 

ELSE 'TRANSFERENCIA' END AS 'Pago'

from pago p

where 

date_format(p.fecha_pago,'%Y-%m-%d') between date_format('$FInicial','%Y-%m-%d') and date_format('$FFinal','%Y-%m-%d') and
 p.estado=1	and
p.movimiento_pago='$Documento'";
				
					
//echo $sql;
	$query=$this->db->query($sql);
		return $query->result();



		 }
}