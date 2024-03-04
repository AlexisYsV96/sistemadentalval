<?php

class mod_tratamiento extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_tratamiento($where = array()) {
        $this->db->where($where);
        $consulta = $this->db->get("presupuesto");
        return $consulta->result();
    }

    function insert_tratamiento($data) {
        $this->db->insert('tratamiento', $data);
    }

    function update_tratamiento($id, $data) {
        $this->db->where('codi_enf', $id);
        $this->db->update('enfermedad', $data);
    }

    function get_tratamiento_tarifa($where = array()) {
        $this->db->where($where);
        $consulta = $this->db->get("vtarifa_tmp");
        return $consulta->result();

    }

    function get_nuevo_codigo_presupuesto() {        
        $this->db->select_max('id_presupuesto');
        $query = $this->db->get('presupuesto');
        $cnt = $query->row_array();
        return $cnt['id_presupuesto'] + 1;


    }

    function delete_tmp($session_id) {
        
        $this->db->delete('tmp', array('session_id' => $session_id));
    }

    function delete_tmp_xid($id) {
        
        $this->db->delete('tmp', array('id_tmp' => $id));
    }


    function insert_tmp($data) {
        $this->db->insert('tmp', $data);
    }


    function insert_presupuesto_detalle($data) {
        $this->db->insert('presupuesto_detalle', $data);
    }

    function insert_presupuesto($data) {
        $this->db->insert('presupuesto', $data);
    }


    function Get_lista_tratamientos(){

        $this->db->select ("t.*, p.apel_pac  as nombre, p.nomb_pac as apellido");
        $this->db->from("presupuesto t");
        $this->db->join("paciente p","t.codi_pac=p.codi_pac");
        $resultados=$this->db->get();
        if($resultados->num_rows() > 0){
            return $resultados->result();
        }else
        {
            return false;
        }
    }

    public function getPresupuestos($id_presupuesto){
         $this->db->select("t.*,t.id_presupuesto,t.fecha,p.apel_pac as nombre,m.nomb_med as medico,m.apel_med as medico_apellido,p.dni_pac,p.dire_pac,p.telf_pac,emai_pac");
        $this->db->from("presupuesto t");
        $this->db->join("paciente p","t.codi_pac=p.codi_pac");
        $this->db->join("medico m","t.codi_med=m.codi_med");
        $this->db->where("t.id_presupuesto",$id_presupuesto);
        $resultado = $this->db->get();
        return $resultado->row();
    }
    
    public function getDetallePresupuetos($id_presupuesto){
         $this->db->select("dt.*,pr.desc_pro");
        $this->db->from("presupuesto_detalle dt");
        $this->db->join("procedimiento pr","dt.codi_pro=pr.codi_pro");
        $this->db->where("dt.id_presupuesto",$id_presupuesto);
        $resultados = $this->db->get();
        return $resultados->result();
    }

    public function GetPagos_Id($id){
        $this->db->from("presupuesto");
        $this->db->where('id_presupuesto',$id);
        $query = $this->db->get();

        return $query->row();

    }


    public function pagos_update($where,$data)
    {
        $this->db->update("presupuesto",$data,$where);
        return $this->db->affected_rows();
    }
    
    public function update_pagos($id,$data)
    {
        $this->db->where("id_presupuesto",$id);
        return $this->db->update("presupuesto",$data);
    }

}

?>