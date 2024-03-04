<?php

class mod_usuario extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_usuario() {
        $consulta = $this->db->get("vusuario");
        return $consulta->result();
    }
    function get_rol() {
        $consulta = $this->db->get("rol");
        return $consulta->result();
    }
    function get_tbl_usuario() {
        $consulta = $this->db->get("vusuario_rol");
        return $consulta->result();
    }
    
    function insert_usu($data) {
        $this->db->insert('usuario', $data);
    }

    function update_usu($id, $data) {
        $this->db->where('codi_usu', $id);
        $this->db->update('usuario', $data);
    }

    function correlativo()
    {
       $this->db->select_max('codi_pac');
       $query = $this->db->get('paciente');
       $result = $query->result();
       $result[0]->codi_pac+=1; //recordar que php es feo :(
       return $result;
    }
    
}
