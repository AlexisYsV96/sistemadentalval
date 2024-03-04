<?php

class mod_medico extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_medico($where = "") {
        if ($where == "") {
            $this->db->where('esta_med', 'A');
        } else {
            $this->db->where($where);
        }
        $consulta = $this->db->get("medico");
        return $consulta->result();
    }

     function get_medicos($where = array()) {
        $this->db->where($where);
        $consulta = $this->db->get("medico");
        return $consulta->result();
    }

    function insert_med($data) {
        $this->db->insert('medico', $data);
    }

    function update_med($id, $data) {
        $this->db->where('codi_med', $id);
        $this->db->update('medico', $data);
    }

     function get_medico_row($where = "") {
        $this->db->where($where);
        $this->db->where('esta_med', 'A');
        $consulta = $this->db->get('medico');
        return $consulta->row();
    }

     function get_medico_xnombre($q) {     
        $this->db->like('nomb_med', $q);   
        $this->db->or_like('apel_med', $q);
        $this->db->order_by('nomb_med', 'asc');
        
        $query = $this->db->get("medico");
        //return $query->result();
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $new_row['label']=htmlentities(stripslashes($row['nomb_med'].' '.$row['apel_med']));
            $new_row['value']=htmlentities(stripslashes($row['codi_med']));
            $row_set[] = $new_row; //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }  


}
