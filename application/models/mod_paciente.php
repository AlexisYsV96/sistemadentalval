<?php

class mod_paciente extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_paciente($where = "") {
        if ($where == "") {
            $this->db->where('esta_pac', 'A');
        } else {
            $this->db->where($where);
        }
        $consulta = $this->db->get("paciente");
        return $consulta->result();
    }

    function get_pacienteplaca($Paciente) {
        if ($Paciente != null) {
            $this->db->where('Estado', true);
            $this->db->where("ID_Paciente", $Paciente);
            $this->db->order_by('ID', "DESC");
            $consulta = $this->db->get("placa");
            return $consulta->result();
        }
    }

    function InactivarPlaca($ID){
        if($ID != null){
            $data = array('Estado' => false);
            $this->db->where("ID", $ID);
            $this->db->update('placa', $data);
            return true;
        }
        return false;
    }

    function get_paciente_historial($where = array()) {
        $this->db->where($where);
        $consulta = $this->db->get("vpacientes_historial");
        return $consulta->result();
    }

    function get_pacientes() {
        $consulta = $this->db->get("paciente");
        return $consulta->result();
    }

    function get_paciente_row($where = "") {
        $this->db->where($where);
        $this->db->where('esta_pac', 'A');
        $consulta = $this->db->get('paciente');
        return $consulta->row();
    }

    function insert_pac($data) {
        $this->db->insert('paciente', $data);
    }

    function update_pac($id, $data) {
        print_r($data);
        $this->db->where('codi_pac', $id);
        $this->db->update('paciente', $data);
    }

    function get_paciente_xnombre($q) {
        $this->db->like('nomb_pac', $q);
        $this->db->or_like('apel_pac', $q);
        $this->db->order_by('nomb_pac', 'asc');

        $query = $this->db->get("paciente");
        //return $query->result();
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $new_row['label']=htmlentities(stripslashes($row['nomb_pac'].' '.$row['apel_pac']));
            $new_row['value']=htmlentities(stripslashes($row['codi_pac']));
            $row_set[] = $new_row; //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }

    function get_bird($q){
        $this->db->select('*');
        $this->db->like('nomb_pac', $q);
        $query = $this->db->get('paciente');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $new_row['label']=htmlentities(stripslashes($row['nomb_pac']));
            $new_row['value']=htmlentities(stripslashes($row['codi_pac']));
            $row_set[] = $new_row; //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }

    function GrabarImagen($Paciente = null, $file = null){
        if($Paciente != null && $file != null){
            $data = array(
                        'ID_Paciente' => $Paciente,
                        'NombreArchivo' => $file,
                        'Estado' => true
                    );
            $this->db->insert("placa", $data);
        }
    }

    function get_paciente_by_name($name){
        $this->db->select('codi_pac,nomb_pac,apel_pac,edad_pac');
        $this->db->where("concat(nomb_pac,' ',apel_pac)=",trim($name));
        $consulta = $this->db->get("paciente");

        return $consulta->result();
    }


}
