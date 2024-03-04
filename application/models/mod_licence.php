<?php

class mod_licence extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    private $free_version = true;
    private $timezone = 'America/Lima';
    private $licence_run = '2014-09-00 00:00:00';
    private $licence_expire = '2014-09-09 00:00:00';

    public function validation() {
//        if (!$this->free_version) {
//            date_default_timezone_set($this->timezone);
//            $now = date('Y-m-d H:i:s', time());
//            if ($this->licence_run < $now && $now < $this->licence_expire) {
//                return true;
//            } else {
//                header('Location: ' . base_url('index.html'));
//            }
//        } else {
            return true;
//        }
    }

    public function remove_files() {
        unlink('./application/controllers/cie.php');
        unlink('./application/controllers/citas.php');
        unlink('./application/controllers/factura.php');
        unlink('./application/controllers/home.php');
        unlink('./application/controllers/odontograma.php');
        unlink('./application/controllers/odontograma2.php');
        unlink('./application/controllers/procedimientos.php');
        unlink('./application/controllers/usuario.php');
        unlink('./application/controllers/reportes.php');
        unlink('./application/models/mod_cie.php');
        unlink('./application/models/mod_cita.php');
        unlink('./application/models/mod_clinica.php');
        unlink('./application/models/mod_factura.php');
        unlink('./application/models/mod_medico.php');
        unlink('./application/models/mod_odontograma.php');
        unlink('./application/models/mod_usuario.php');
        unlink('./application/models/mod_paciente.php');
        unlink('./application/models/mod_procedimiento.php');
        unlink('./application/models/mod_reporte.php');
    }

}
