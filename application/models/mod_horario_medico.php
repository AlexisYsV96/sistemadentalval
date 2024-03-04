<?php

class mod_horario_medico extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_horario_medico($where = "") {
        $this->db->select ("hm.*, m.nomb_med, m.apel_med");
        $this->db->from("horario_medico hm");
        $this->db->join("medico m","hm.codi_med=m.codi_med");
        if ($where != "") {
            $this->db->where($where);
        }
        $this->db->where('esta_homed', 'A');  
        $resultados=$this->db->get();
        if($resultados->num_rows() > 0){
            return $resultados->result();
        }else
        {
            return array();
        }
        
    }

    function insert_horario_medico($data) {
        $this->db->insert('horario_medico', $data);
    }

    function update_horario_medico($id, $data) {
        $this->db->where('codi_homed', $id);
        $this->db->update('horario_medico', $data);
    }

}
