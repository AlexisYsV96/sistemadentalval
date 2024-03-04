<?php

class mod_receta extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_recetas($fecha,$where = []) {
        if (count($where) > 0) {
            $this->db->where($where);
        }
        if ($fecha != "") {
            $this->db->where('fecha', $fecha);
            $this->db->order_by('id', 'desc');
        }
        $consulta = $this->db->get("recetas");
        return $consulta->result();
    }

    function grabar($data) {
        $this->db->insert('recetas', $data);
    }

}
