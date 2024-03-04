<?php

class odontograma2 extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('mod_odontograma', 'mod_paciente', 'mod_cita', 'mod_procedimiento', 'mod_clinica', 'mod_licence'));
        $this->load->library('session');
    }

    public function index() {
        if (!$this->logged()) {
            header('location: ' . base_url('login'));
        } else {
            $odo['pacientes'] = $this->mod_paciente->get_paciente_historial();
            $data['container'] = $this->load->view('odontograma/odontograma_search_view2', $odo, true);
            $data['clinica'] = $this->mod_clinica->get_clinica();
            $this->load->view('home/body', $data);
        }
    }

    public function odontograma_view($paciente = "", $cita = "") {
        if (!$this->logged()) {
            header('location: ' . base_url('login'));
        } else {

            if ($this->input->post('codi_cit') && $this->input->post('codi_pac')) {
                $paciente = $this->input->post('codi_pac');
                $cita = $this->input->post('codi_cit');
            }

            $this->session->set_userdata('codi_cit', $cita);
            $data['citas'] = $this->mod_cita->get_cita_paciente($paciente);
            $data['cita'] = $this->mod_cita->get_cita_detalle($cita);
//        $data['odontograma'] = $this->mod_odontograma->get_odontograma($cita, $view);
            $data['odontograma'] = $this->mod_odontograma->get_historial_cita($cita);
            $data['estado_diente'] = $this->mod_odontograma->get_estado();
            $data['enfermedad'] = $this->mod_odontograma->get_enfermedad();
            $data['dientes'] = array('18', '17', '16', '15', '14', '13', '12', '11', '21', '22', '23', '24', '25', '26', '27', '28', '55', '54', '53', '52', '51', '61', '62', '63', '64', '65', '85', '84', '83', '82', '81', '71', '72', '73', '74', '75', '48', '47', '46', '45', '44', '43', '42', '41', '31', '32', '33', '34', '35', '36', '37', '38');
            $data['paciente'] = $this->mod_paciente->get_paciente_row(array('codi_pac' => $paciente));
            $data['codi_cit'] = $cita;

            $odontograma = $this->mod_odontograma->get_odontograma_r(array('codi_cit' => $cita));
            $estados = array();
            foreach ($odontograma as $row) {
                $part_die = $row->part_die;
                $zona_die = '';

                $pos = strpos($part_die, '0');

                if ($pos === false) {
                    $zona_die = 'Pieza completa';
                } else {
                    for ($i = 0; $i < 5; $i++) {
                        $zona = substr($part_die, $i, 1);
                        if ($zona == 'M') {
                            $zona_die .= 'M ';
                        } else if ($zona == 'D') {
                            $zona_die .= 'D ';
                        } else if ($zona == 'V') {
                            $zona_die .= 'V ';
                        } else if ($zona == 'P') {
                            $zona_die .= 'P ';
                        } else if ($zona == 'L') {
                            $zona_die .= 'L ';
                        } else if ($zona == 'O') {
                            $zona_die .= 'O ';
                        } else if ($zona == 'I') {
                            $zona_die .= 'I ';
                        }
                    }
                }

                $fila['num_die'] =  $row->num_die;
                $fila['nomb_edi'] = $row->nomb_edi;
                $fila['part_die'] = $zona_die;
                $fila['enf_die'] = $row->desc_enf;
                $estados[] = $fila;
            }

            $data['estados'] = $estados;
            $data['proc_detalle'] = $this->mod_procedimiento->get_historial_proc($cita);
            $data['container'] = $this->load->view('odontograma/odontograma_view3', $data, true);
            $data['clinica'] = $this->mod_clinica->get_clinica();
            $this->load->view('home/body', $data);
        }
    }

    public function show_pdf($codi_cit) {
//        $codi_cit = $this->session->userdata('codi_cit');
//        $this->session->unset_userdata('codi_cit');
//        $codi_cit = 53;
        
        $cita_medica = $this->mod_cita->get_cita("", array('codi_cit' => $codi_cit));
        $dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
        $meses = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
        $timestamp = strtotime($cita_medica[0]->fech_cit);
        $fecha = $dias[date('w', $timestamp)] . ', ' . date('j', $timestamp) . ' de ' . $meses[date('n', $timestamp) - 1] . ' del ' . date('Y', $timestamp) . ' - ' . date('h:i A', $timestamp);

        $clinica = $this->mod_clinica->get_clinica();
        $paciente = $this->mod_paciente->get_paciente_historial();
        $pacientes_h = $this->mod_paciente->get_paciente();
        $this->load->library('fpdf');
        $this->fpdf->AddPage();
        $this->fpdf->SetLeftMargin(35);

        $this->fpdf->Image(base_url() . 'resources/images/clinica/logo.png', 35, 10, 0, 40);
        $this->fpdf->SetFont('Times', 'B', 24);
        $this->fpdf->Cell(160, 25, utf8_decode($clinica['nomb_clin']), 0, 0, 'C');
        $this->fpdf->SetFont('Times', "", 10);
        $this->fpdf->Ln(8);
        $this->fpdf->Cell(160,25,utf8_decode('CLINICA DENTAL'),0,0,'C');
        $this->fpdf->SetFont('Times', "", 10);
         $this->fpdf->Ln(5);
        $this->fpdf->Cell(160, 25, utf8_decode(''.$clinica['direc_clin']), 0, 0, 'C');
        $this->fpdf->Ln(5);
        $this->fpdf->Cell(160, 25, utf8_decode('Teléfono: '.$clinica['telf_clin']), 0, 0, 'C');
        $this->fpdf->Ln(5);
        $this->fpdf->Cell(160, 25, utf8_decode('R.U.C.: '.$clinica['ruc_clin']), 0, 0, 'C');
        $this->fpdf->Ln(5);
        $this->fpdf->Cell(160, 25, utf8_decode('E-mail: '.$clinica['email_clin']), 0, 0, 'C');
        $this->fpdf->SetLeftMargin(10);
        $this->fpdf->Ln(24);
                 $this->fpdf->Cell(320, 15, utf8_decode('N° HC: ' . $paciente[0]->codi_pac), 0, 0, 'C');
        $this->fpdf->Ln(8);
        $this->fpdf->SetFont('Times', 'B', 15);
        $this->fpdf->Cell(180, 20, utf8_decode('HISTORIA CLINICA'), 0, 0, 'C');

        $this->fpdf->SetFont('Times', 'B', 10);


        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(180, 20, utf8_decode('___________________'), 0, 0, 'C');
        $this->fpdf->SetFont('Times', "", 12);
        $this->fpdf->Ln(8);
        // $this->fpdf->Cell(0, 25, utf8_decode($fecha), 0, 0, 'L');
        // $this->fpdf->Ln(8);

        $this->fpdf->Cell(0, 25, utf8_decode('Nombres y Apellidos: ' . $cita_medica[0]->nomb_pac . ' ' . $cita_medica[0]->apel_pac), 0, 0, 'L');
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(207, 23, utf8_decode('______________________________________________'), 0, 0, 'C');
        $this->fpdf->SetFont('Times', "", 12);
        $this->fpdf->Ln(8);

        $this->fpdf->Cell(0, 25, utf8_decode('N° de DNI :  '.$paciente[0]->dni_pac), 0, 0, 'L');
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(68, 23, utf8_decode('________'), 0, 0, 'C');
        $this->fpdf->Ln(8);
        $this->fpdf->SetFont('Times', "", 12);
        $this->fpdf->Cell(215, 9, utf8_decode('Fecha y hora de atención:  '.$fecha), 0, 0, 'C');
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(261, 7, utf8_decode('___________________________'), 0, 0, 'C');
        $this->fpdf->Ln(8);
        $this->fpdf->SetFont('Times', "", 12);
        $this->fpdf->Cell(215, 9, utf8_decode('Sexo:  '. $paciente[0]->sexo_pac), 0, 0, 'L');
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(30, 7, utf8_decode('___'), 0, 0, 'C');
        $this->fpdf->Ln(4);
        $this->fpdf->SetFont('Times', "", 12);
        $this->fpdf->Cell(70, 1, utf8_decode('Edad:  '. $paciente[0]->edad_pac. '  años'), 0, 0, 'C');
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(84, -1, utf8_decode('______'), 0, 0, 'C');
        $this->fpdf->Ln(0.5);
        $this->fpdf->SetFont('Times', "", 12);
        $this->fpdf->Cell(200, 0, utf8_decode('Lugar y Fecha de nacimiento:  '. $paciente[0]->lugar_nacimiento. '   '. $paciente[0]->fena_pac), 0, 0, 'C');
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(273, -2, utf8_decode('_______________________'), 0, 0, 'C');
        $this->fpdf->Ln(8);
        $this->fpdf->SetFont('Times', "", 12);
        $this->fpdf->Cell(70, 1, utf8_decode('Domicilio:  '. $paciente[0]->dire_pac), 0, 0, 'L');
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(108, -1, utf8_decode('________________________'), 0, 0, 'C');
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', "", 12);
        $this->fpdf->Cell(230, 0, utf8_decode('Ocupación:  '. $paciente[0]->ocupacion), 0, 0, 'C');
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(281, -2, utf8_decode('____________________'), 0, 0, 'C');
        $this->fpdf->Ln(8);
        $this->fpdf->SetFont('Times', "", 12);
        $this->fpdf->Cell(70, 1, utf8_decode('Telefono:  '. $paciente[0]->telf_pac), 0, 0, 'L');
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(81, -1, utf8_decode('_______________'), 0, 0, 'C');
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', "", 12);
        $this->fpdf->Cell(200, 0.5, utf8_decode('Correo:  '. $paciente[0]->emai_pac), 0, 0, 'C');
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(252, -1, utf8_decode('______________________________'), 0, 0, 'C');
        $this->fpdf->Ln(15);
        $this->fpdf->SetFont('Times', "B", 12);
        $this->fpdf->Cell(0, 0, utf8_decode('ENFERMEDAD ACTUAL :'), 0, 0, 'L');
        // $this->fpdf->Ln(50);
        // $this->fpdf->SetFont('Times', "B", 12);
        // $this->fpdf->Cell(0, 60, utf8_decode('Médico cita: ' . $cita_medica[0]->nomb_med . ' ' . $cita_medica[0]->apel_med), 0, 0, 'L');
        
        $this->fpdf->Ln(5);
        $this->fpdf->SetFont('Times', "", 12);
        $this->fpdf->Cell(0,10,utf8_decode('Motivo consulta:  ' .$cita_medica[0]->motivo_consult),0,0,'L');
         $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(199, 8, utf8_decode('__________________________________________________'), 0, 0, 'C');
        $this->fpdf->Ln(8);
        $this->fpdf->SetFont('Times', "", 12);
        $this->fpdf->Cell(0,10,utf8_decode('Tiempo enfermedad:  ' .$paciente[0]->enfe_pac),0,0,'L');
         $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(207, 8, utf8_decode('_______________________________________________'), 0, 0, 'C');

        $this->fpdf->Ln(8);
        $this->fpdf->SetFont('Times', "", 12);
        $this->fpdf->Cell(0,10,utf8_decode('Signos principales:  ' .$cita_medica[0]->motivo_consult),0,0,'L');
         $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(203, 8, utf8_decode('________________________________________________'), 0, 0, 'C');
        $this->fpdf->Ln(8);
        $this->fpdf->SetFont('Times', "", 12);
        $this->fpdf->Cell(0,10,utf8_decode('Sintomas principales:  ' .$paciente[0]->enfe_pac),0,0,'L');
         $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(209, 8, utf8_decode('______________________________________________'), 0, 0, 'C');
         $this->fpdf->Ln(8);
        $this->fpdf->SetFont('Times', "", 12);
        $this->fpdf->Cell(0,10,utf8_decode('Relato cronologico:  '),0,0,'L');
         $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(205, 8, utf8_decode('_______________________________________________'), 0, 0, 'C');
        $this->fpdf->Ln(8);
        $this->fpdf->SetFont('Times', "", 12);
        $this->fpdf->Cell(0,10,utf8_decode('Funciones biologicas:  ' ),0,0,'L');
         $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(209, 8, utf8_decode('______________________________________________'), 0, 0, 'C');
        $this->fpdf->Ln(18);
         $this->fpdf->SetFont('Times', "B", 12);
        $this->fpdf->Cell(0, 0, utf8_decode('ANTECEDENTES '), 0, 0, 'L');
        $this->fpdf->Ln(8);
         $this->fpdf->SetFont('Times', "B", 12);
        $this->fpdf->Cell(0, 0, utf8_decode('Antecedentes Familiares '), 0, 0, 'L');
        $this->fpdf->Ln(4);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(0, 8, utf8_decode('____________________________________________________________'), 0, 0, 'L');
           $this->fpdf->Ln(8);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(0, 8, utf8_decode('____________________________________________________________'), 0, 0, 'L');
        $this->fpdf->Ln(8);
         $this->fpdf->SetFont('Times', "B", 12);
        $this->fpdf->Cell(0, 20, utf8_decode('Antecedentes Personales '), 0, 0, 'L');
        $this->fpdf->Ln(12);
        $this->fpdf->SetFont('Times', "", 12);
        $this->fpdf->Cell(0,13,utf8_decode($paciente[0]->antec_pac),0,0,'L');
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(0, 12, utf8_decode('____________________________________________________________'), 0, 0, 'L');
           $this->fpdf->Ln(12);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(0, 8, utf8_decode('____________________________________________________________'), 0, 0, 'L');
        $this->fpdf->Ln(8);
        $this->fpdf->Ln(18);
         $this->fpdf->SetFont('Times', "B", 12);
        $this->fpdf->Cell(0, 0, utf8_decode('EXPLORACIÓN FISICA '), 0, 0, 'L');
         $this->fpdf->Ln(8);
         $this->fpdf->SetFont('Times', "B", 12);
        $this->fpdf->Cell(0, 5, utf8_decode('Signos Vitales: '), 0, 0, 'L');
         $this->fpdf->Ln(8);
        $this->fpdf->SetFont('Times', "", 12);
        $this->fpdf->Cell(20, 12, utf8_decode('P.A.  '. $paciente[0]->presion_pac), 0, 0, 'L');
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(33, 10, utf8_decode('_____'), 0, 0, 'C');
        $this->fpdf->Ln(4);
        $this->fpdf->SetFont('Times', "", 12);
        $this->fpdf->Cell(78, 4, utf8_decode('Pulso:  '. $paciente[0]->pulso_pac), 0, 0, 'C');
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(102, 3, utf8_decode('______'), 0, 0, 'C');
         $this->fpdf->Ln(2);
        $this->fpdf->SetFont('Times', "", 12);
        $this->fpdf->Cell(150, 0, utf8_decode('Temp.     '. $paciente[0]->temp_pac), 0, 0, 'C');
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(173, -2, utf8_decode('_____'), 0, 0, 'C');
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', "", 12);
        $this->fpdf->Cell(210, 0, utf8_decode('F.C.  '. $paciente[0]->fc_pac), 0, 0, 'C');
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(235, -1, utf8_decode('______'), 0, 0, 'C');
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', "", 12);
        $this->fpdf->Cell(300, 1, utf8_decode('Frec. Resp.  '. $paciente[0]->frec_resp), 0, 0, 'C');
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(324, 0, utf8_decode('______'), 0, 0, 'C');
        $this->fpdf->Ln(8);
        $this->fpdf->SetFont('Times', "B", 12);
        $this->fpdf->Cell(0, 20, utf8_decode('Examen Clinico General: '), 0, 0, 'L');
        $this->fpdf->Ln(12);
        $this->fpdf->SetFont('Times', "", 12);
        $this->fpdf->Cell(0,13,utf8_decode($paciente[0]->exam_clinico),0,0,'L');
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(0, 12, utf8_decode('____________________________________________________________'), 0, 0, 'L');
           $this->fpdf->Ln(12);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(0, 8, utf8_decode('____________________________________________________________'), 0, 0, 'L');
        $this->fpdf->Ln(8);
        $this->fpdf->SetFont('Times', "B", 12);
        $this->fpdf->Cell(0, 20, utf8_decode('Examen complementario: '), 0, 0, 'L');
        $this->fpdf->Ln(12);
        $this->fpdf->SetFont('Times', "", 12);
        $this->fpdf->Cell(0,13,utf8_decode($paciente[0]->exam_complementario),0,0,'L');
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(0, 12, utf8_decode('____________________________________________________________'), 0, 0, 'L');
           $this->fpdf->Ln(12);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(0, 8, utf8_decode('____________________________________________________________'), 0, 0, 'L');
        $this->fpdf->Ln(8);
        $this->fpdf->SetFont('Times', "B", 12);
        $this->fpdf->Cell(0, 20, utf8_decode('Odontoestomatologico: '), 0, 0, 'L');
        $this->fpdf->Ln(12);
        $this->fpdf->SetFont('Times', "", 12);
        $this->fpdf->Cell(0,13,utf8_decode($paciente[0]->odonestomalogico),0,0,'L');
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(0, 12, utf8_decode('____________________________________________________________'), 0, 0, 'L');
           $this->fpdf->Ln(12);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(0, 8, utf8_decode('____________________________________________________________'), 0, 0, 'L');
        $this->fpdf->Ln(8);
        $this->fpdf->SetFont('Times', "B", 12);
        $this->fpdf->Cell(0, 20, utf8_decode('DIAGNOSTICO (CIE10) '), 0, 0, 'L');
        $this->fpdf->Ln(12);
        $this->fpdf->SetFont('Times', "", 12);
        $this->fpdf->Cell(0,13,utf8_decode('E.S.G.  '.$paciente[0]->diagn_pac),0,0,'L');
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(182, 12, utf8_decode('________________________________________________________'), 0, 0, 'C');
           $this->fpdf->Ln(12);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(0, 8, utf8_decode('____________________________________________________________'), 0, 0, 'L');
        $this->fpdf->Ln(12);
        $this->fpdf->SetFont('Times', "", 12);
        $this->fpdf->Cell(0,13,utf8_decode('E.S.E.  '),0,0,'L');
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(182, 12, utf8_decode('________________________________________________________'), 0, 0, 'C');
           $this->fpdf->Ln(12);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(0, 8, utf8_decode('____________________________________________________________'), 0, 0, 'L');
        $this->fpdf->Ln(8);
             $this->fpdf->SetFont('Times', "B", 12);
        $this->fpdf->Cell(0, 20, utf8_decode('PRONOSTICO : '), 0, 0, 'L');
        $this->fpdf->Ln(12);
       
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(182, 12, utf8_decode('____________________________________________________________'), 0, 0, 'L');
          $this->fpdf->Ln(10);
             $this->fpdf->SetFont('Times', "B", 12);
        $this->fpdf->Cell(0, 28, utf8_decode('TRATAMIENTO / RECOMENDACIONES : '), 0, 0, 'L');
        $this->fpdf->Ln(12);
       
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(182, 22, utf8_decode('____________________________________________________________'), 0, 0, 'L');
         $this->fpdf->Ln(10);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(182, 20, utf8_decode('____________________________________________________________'), 0, 0, 'L');
         $this->fpdf->Ln(14);
             $this->fpdf->SetFont('Times', "B", 12);
        $this->fpdf->Cell(0, 28, utf8_decode('ALTA DEL PACIENTE : '), 0, 0, 'L');
        $this->fpdf->Ln(12);
       
        $this->fpdf->Ln(0);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(182, 22, utf8_decode('____________________________________________________________'), 0, 0, 'L');
         $this->fpdf->Ln(10);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(182, 20, utf8_decode('____________________________________________________________'), 0, 0, 'L');
           $this->fpdf->Ln(10);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(182, 20, utf8_decode('____________________________________________________________'), 0, 0, 'L');
        $this->fpdf->Ln(140);
           $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(80, -2, utf8_decode('___________'), 0, 0, 'C');
         $this->fpdf->SetFont('Times', "", 12);
                 $this->fpdf->Ln(8);
        $this->fpdf->Cell(80, 0, utf8_decode('Sello y Firma'), 0, 0, 'C');
        $this->fpdf->Ln(-9);
          $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(300, 0, utf8_decode('_____________'), 0, 0, 'C');
         $this->fpdf->SetFont('Times', "", 12);
                 $this->fpdf->Ln(8);
        $this->fpdf->Cell(300, 0, utf8_decode('Firma del paciente'), 0, 0, 'C');
        $this->fpdf->Ln(6);
        $this->fpdf->Cell(300, 0, utf8_decode('DNI: '.$paciente[0]->dni_pac), 0, 0, 'C');
        $this->fpdf->Ln(0);
       
         $this->fpdf->Ln(220);
        $this->fpdf->Cell(0, 20, utf8_decode('ODONTOGRAMA'), 0, 0, 'C');
        $this->fpdf->Ln(40);
        
        $historial = $this->mod_odontograma->get_historial_cita($codi_cit);
        $num_die_1 = array('18', '17', '16', '15', '14', '13', '12', '11', '21', '22', '23', '24', '25', '26', '27', '28');
        $y = 25;
      
        for ($j = 0; $j < count($num_die_1); $j++) {
            $sw = true;
            for ($i = 0; $i < count($historial); $i++) {
                if ($historial[$i]->num_die == $num_die_1[$j]) {
                    $diente = $historial[$i]->num_die;
                    $codi_edi = $historial[$i]->codi_edi;
                    if (getimagesize(base_url() . 'resources/images/odontograma/' . $diente . '/' . $diente . '_' . $codi_edi . '.jpg')) {
                        $this->fpdf->Image(base_url() . 'resources/images/odontograma/' . $diente . '/' . $diente . '_' . $codi_edi . '.jpg', $y, 31, 0, 17);
                    } else {
                        $this->fpdf->Image(base_url() . 'resources/images/odontograma/' . $historial[$i]->num_die . '/' . $historial[$i]->num_die . '.jpg', $y, 31, 0, 17);
                    }
                    $sw = false;
                }
            }
            if ($sw) {
                $this->fpdf->Image(base_url() . 'resources/images/odontograma/' . $num_die_1[$j] . '/' . $num_die_1[$j] . '.jpg', $y, 31, 0, 17);
            }
            $y += 10;
        }
        $this->fpdf->Ln(2);

        $this->fpdf->SetFont('Times', '', 11);
        $this->fpdf->SetLeftMargin(25);
        $this->fpdf->Cell(5, 0, '18', 0, 1, 'C');
        $this->fpdf->Cell(25, 0, '17', 0, 1, 'C');
        $this->fpdf->Cell(45, 0, '16', 0, 1, 'C');
        $this->fpdf->Cell(65, 0, '15', 0, 1, 'C');
        $this->fpdf->Cell(85, 0, '14', 0, 1, 'C');
        $this->fpdf->Cell(105, 0, '13', 0, 1, 'C');
        $this->fpdf->Cell(125, 0, '12', 0, 1, 'C');
        $this->fpdf->Cell(145, 0, '11', 0, 1, 'C');
        $this->fpdf->Cell(165, 0, '21', 0, 1, 'C');
        $this->fpdf->Cell(185, 0, '22', 0, 1, 'C');
        $this->fpdf->Cell(205, 0, '23', 0, 1, 'C');
        $this->fpdf->Cell(225, 0, '24', 0, 1, 'C');
        $this->fpdf->Cell(245, 0, '25', 0, 1, 'C');
        $this->fpdf->Cell(265, 0, '26', 0, 1, 'C');
        $this->fpdf->Cell(285, 0, '27', 0, 1, 'C');
        $this->fpdf->Cell(305, 0, '28', 0, 1, 'C');
        $this->fpdf->Ln(29);

        $this->fpdf->Cell(65, 0, '55', 0, 1, 'C');
        $this->fpdf->Cell(85, 0, '54', 0, 1, 'C');
        $this->fpdf->Cell(105, 0, '53', 0, 1, 'C');
        $this->fpdf->Cell(125, 0, '52', 0, 1, 'C');
        $this->fpdf->Cell(145, 0, '51', 0, 1, 'C');
        $this->fpdf->Cell(165, 0, '61', 0, 1, 'C');
        $this->fpdf->Cell(185, 0, '62', 0, 1, 'C');
        $this->fpdf->Cell(205, 0, '63', 0, 1, 'C');
        $this->fpdf->Cell(225, 0, '64', 0, 1, 'C');
        $this->fpdf->Cell(245, 0, '65', 0, 1, 'C');

 $this->fpdf->Ln(10);

         $this->fpdf->Cell(65, 0, '85', 0, 1, 'C');
        $this->fpdf->Cell(85, 0, '84', 0, 1, 'C');
        $this->fpdf->Cell(105, 0, '83', 0, 1, 'C');
        $this->fpdf->Cell(125, 0, '82', 0, 1, 'C');
        $this->fpdf->Cell(145, 0, '81', 0, 1, 'C');
        $this->fpdf->Cell(165, 0, '71', 0, 1, 'C');
        $this->fpdf->Cell(185, 0, '72', 0, 1, 'C');
        $this->fpdf->Cell(205, 0, '73', 0, 1, 'C');
        $this->fpdf->Cell(225, 0, '74', 0, 1, 'C');
        $this->fpdf->Cell(245, 0, '75', 0, 1, 'C');



        $this->fpdf->Ln(25);
        $this->fpdf->Cell(5, 0, '48', 0, 1, 'C');
        $this->fpdf->Cell(25, 0, '47', 0, 1, 'C');
        $this->fpdf->Cell(45, 0, '46', 0, 1, 'C');
        $this->fpdf->Cell(65, 0, '45', 0, 1, 'C');
        $this->fpdf->Cell(85, 0, '44', 0, 1, 'C');
        $this->fpdf->Cell(105, 0, '43', 0, 1, 'C');
        $this->fpdf->Cell(125, 0, '42', 0, 1, 'C');
        $this->fpdf->Cell(145, 0, '41', 0, 1, 'C');
        $this->fpdf->Cell(165, 0, '31', 0, 1, 'C');
        $this->fpdf->Cell(185, 0, '32', 0, 1, 'C');
        $this->fpdf->Cell(205, 0, '33', 0, 1, 'C');
        $this->fpdf->Cell(225, 0, '34', 0, 1, 'C');
        $this->fpdf->Cell(245, 0, '35', 0, 1, 'C');
        $this->fpdf->Cell(265, 0, '36', 0, 1, 'C');
        $this->fpdf->Cell(285, 0, '37', 0, 1, 'C');
        $this->fpdf->Cell(305, 0, '38', 0, 1, 'C');
        $this->fpdf->SetLeftMargin(10);
        $this->fpdf->Ln(0);


         // $historial = $this->mod_odontograma->get_historial_cita($codi_cit);
        $num_die_3 = array('55', '54', '53', '52', '51', '61', '62', '63', '64', '65');
        $y = 55;
      
        for ($j = 0; $j < count($num_die_3); $j++) {
            $sw = true;
            for ($i = 0; $i < count($historial); $i++) {
                if ($historial[$i]->num_die == $num_die_3[$j]) {
                    $diente = $historial[$i]->num_die;
                    $codi_edi = $historial[$i]->codi_edi;
                    if (getimagesize(base_url() . 'resources/images/odontograma/' . $diente . '/' . $diente . '_' . $codi_edi . '.jpg')) {
                        $this->fpdf->Image(base_url() . 'resources/images/odontograma/' . $diente . '/' . $diente . '_' . $codi_edi . '.jpg', $y, 60, 0, 17);
                    } else {
                        $this->fpdf->Image(base_url() . 'resources/images/odontograma/' . $historial[$i]->num_die . '/' . $historial[$i]->num_die . '.jpg', $y, 60, 0, 17);
                    }
                    $sw = false;
                }
            }
            if ($sw) {
                $this->fpdf->Image(base_url() . 'resources/images/odontograma/' . $num_die_3[$j] . '/' . $num_die_3[$j] . '.jpg', $y, 60, 0, 17);
            }
            $y += 10;
        }
        $this->fpdf->Ln(2);

         $num_die_4 = array('85', '84', '83', '82', '81', '71', '72', '73', '74', '75');
        $y = 55;
      
        for ($j = 0; $j < count($num_die_4); $j++) {
            $sw = true;
            for ($i = 0; $i < count($historial); $i++) {
                if ($historial[$i]->num_die == $num_die_4[$j]) {
                    $diente = $historial[$i]->num_die;
                    $codi_edi = $historial[$i]->codi_edi;
                    if (getimagesize(base_url() . 'resources/images/odontograma/' . $diente . '/' . $diente . '_' . $codi_edi . '.jpg')) {
                        $this->fpdf->Image(base_url() . 'resources/images/odontograma/' . $diente . '/' . $diente . '_' . $codi_edi . '.jpg', $y, 93, 0, 17);
                    } else {
                        $this->fpdf->Image(base_url() . 'resources/images/odontograma/' . $historial[$i]->num_die . '/' . $historial[$i]->num_die . '.jpg', $y, 93, 0, 17);
                    }
                    $sw = false;
                }
            }
            if ($sw) {
                $this->fpdf->Image(base_url() . 'resources/images/odontograma/' . $num_die_4[$j] . '/' . $num_die_4[$j] . '.jpg', $y, 93, 0, 17);
            }
            $y += 10;
        }
        $this->fpdf->Ln(0);


        
        $num_die_2 = array('48', '47', '46', '45', '44', '43', '42', '41', '31', '32', '33', '34', '35', '36', '37', '38');
        $y2 = 25;

        for ($j = 0; $j < count($num_die_2); $j++) {
            $sw = true;
            for ($i = 0; $i < count($historial); $i++) {
                if ($historial[$i]->num_die == $num_die_2[$j]) {
                    $diente = $historial[$i]->num_die;
                    $codi_edi = $historial[$i]->codi_edi;
                    if (getimagesize(base_url() . 'resources/images/odontograma/' . $diente . '/' . $diente . '_' . $codi_edi . '.jpg')) {
                        $this->fpdf->Image(base_url() . 'resources/images/odontograma/' . $diente . '/' . $diente . '_' . $codi_edi . '.jpg', $y2, 122, 0, 17);
                    } else {
                        $this->fpdf->Image(base_url() . 'resources/images/odontograma/' . $historial[$i]->num_die . '/' . $historial[$i]->num_die . '.jpg', $y2, 122, 0, 17);
                    }
                    $sw = false;
                }
            }
            if ($sw) {
                $this->fpdf->Image(base_url() . 'resources/images/odontograma/' . $num_die_2[$j] . '/' . $num_die_2[$j] . '.jpg', $y2, 122, 0, 17);
            }
            $y2 += 10;
        }
        
        $this->fpdf->SetDrawColor(190);
        $this->fpdf->Rect(23, 28, 10, 28);
        $this->fpdf->Rect(33, 28, 10, 28);
        $this->fpdf->Rect(43, 28, 10, 28);
        $this->fpdf->Rect(53, 28, 10, 28);
        $this->fpdf->Rect(63, 28, 10, 28);
        $this->fpdf->Rect(73, 28, 10, 28);
        $this->fpdf->Rect(83, 28, 10, 28);
        $this->fpdf->Rect(93, 28, 10, 28);
        $this->fpdf->Rect(103, 28, 10, 28);
        $this->fpdf->Rect(113, 28, 10, 28);
        $this->fpdf->Rect(123, 28, 10, 28);
        $this->fpdf->Rect(133, 28, 10, 28);
        $this->fpdf->Rect(143, 28, 10, 28);
        $this->fpdf->Rect(153, 28, 10, 28);
        $this->fpdf->Rect(163, 28, 10, 28);
        $this->fpdf->Rect(173, 28, 10, 28);

        $this->fpdf->Rect(53, 56, 10, 28);
        $this->fpdf->Rect(63, 56, 10, 28);
        $this->fpdf->Rect(73, 56, 10, 28);
        $this->fpdf->Rect(83, 56, 10, 28);
        $this->fpdf->Rect(93, 56, 10, 28);
        $this->fpdf->Rect(103, 56, 10, 28);
        $this->fpdf->Rect(113, 56, 10, 28);
        $this->fpdf->Rect(123, 56, 10, 28);
        $this->fpdf->Rect(133, 56, 10, 28);
        $this->fpdf->Rect(143, 56, 10, 28);


         $this->fpdf->Rect(53, 84, 10, 28);
        $this->fpdf->Rect(63, 84, 10, 28);
        $this->fpdf->Rect(73, 84, 10, 28);
        $this->fpdf->Rect(83, 84, 10, 28);
        $this->fpdf->Rect(93, 84, 10, 28);
        $this->fpdf->Rect(103, 84, 10, 28);
        $this->fpdf->Rect(113, 84, 10, 28);
        $this->fpdf->Rect(123, 84, 10, 28);
        $this->fpdf->Rect(133, 84, 10, 28);
        $this->fpdf->Rect(143, 84, 10, 28);

        $this->fpdf->Rect(23, 112, 10, 29);
        $this->fpdf->Rect(33, 112, 10, 29);
        $this->fpdf->Rect(43, 112, 10, 29);
        $this->fpdf->Rect(53, 112, 10, 29);
        $this->fpdf->Rect(63, 112, 10, 29);
        $this->fpdf->Rect(73, 112, 10, 29);
        $this->fpdf->Rect(83, 112, 10, 29);
        $this->fpdf->Rect(93, 112, 10, 29);
        $this->fpdf->Rect(103, 112, 10, 29);
        $this->fpdf->Rect(113, 112, 10, 29);
        $this->fpdf->Rect(123, 112, 10, 29);
        $this->fpdf->Rect(133, 112, 10, 29);
        $this->fpdf->Rect(143, 112, 10, 29);
        $this->fpdf->Rect(153, 112, 10, 29);
        $this->fpdf->Rect(163, 112, 10, 29);
        $this->fpdf->Rect(173, 112, 10, 29);
        $this->fpdf->SetDrawColor(0);
        
        $this->fpdf->SetLeftMargin(10);
        $this->fpdf->Ln(30);
        $this->fpdf->SetFont('Times', 'B', 12);
        $this->fpdf->Cell(0, 15, utf8_decode('ENFERMEDAD'), 0, 0, 'L');
        $this->fpdf->Ln(10);
       // $this->fpdf->Cell(95, 0, utf8_decode('Paciente: ' . $cita_medica[0]->nomb_pac . ' ' . $cita_medica[0]->apel_pac), 0, 0, 'L');
       // $this->fpdf->Ln(6);
        

        $this->fpdf->SetFont('Times', 'B', 11);
        $this->fpdf->Cell(12, 10, utf8_decode("N°"), 1, 0, 'C');
        $this->fpdf->Cell(80, 10, utf8_decode("Estado"), 1, 0, 'C');
        $this->fpdf->Cell(97, 10, utf8_decode("Zonas"), 1, 0, 'C');


        $this->fpdf->Ln(10);
        $this->fpdf->SetFont('Times', '', 11);

        $odontograma = $this->mod_odontograma->get_odontograma_r(array('codi_cit' => $codi_cit));

        foreach ($odontograma as $row) {

            $part_die = $row->part_die;
            $zona_die = '';

            $pos = strpos($part_die, '0');

            if ($pos === false) {
                $zona_die = 'Pieza completa';
            } else {
                for ($i = 0; $i < 5; $i++) {
                    $zona = substr($part_die, $i, 1);
                    if ($zona == 'M') {
                        $zona_die .= 'M ';
                    } else if ($zona == 'D') {
                        $zona_die .= 'D ';
                    } else if ($zona == 'V') {
                        $zona_die .= 'V ';
                    } else if ($zona == 'P') {
                        $zona_die .= 'P ';
                    } else if ($zona == 'L') {
                        $zona_die .= 'L ';
                    } else if ($zona == 'O') {
                        $zona_die .= 'O ';
                    } else if ($zona == 'I') {
                        $zona_die .= 'I ';
                    }
                }
            }

            $this->fpdf->Cell(12, 10, utf8_decode($row->num_die), 1, 0, 'C');
            $this->fpdf->Cell(80, 10, utf8_decode($row->nomb_edi), 1, 0, 'C');
            $this->fpdf->Cell(97, 10, utf8_decode($zona_die), 1, 0, 'C');
      
            $this->fpdf->Ln(10);



       

        }

         $this->fpdf->Ln(10);

         $this->fpdf->SetFont('Times', 'B', 11);
         $this->fpdf->Cell(12, 10, utf8_decode("N°"), 1, 0, 'C');
           $this->fpdf->Cell(20, 10, utf8_decode("CIE10"), 1, 0, 'C');
         $this->fpdf->Cell(157, 10, utf8_decode("Descripción de la Enfermedad"), 1, 0, 'C');
         $this->fpdf->Ln(10);
         $this->fpdf->SetFont('Times', '', 11);

        $odontograma = $this->mod_odontograma->get_odontograma_r(array('codi_cit' => $codi_cit));

        foreach ($odontograma as $row) {

            $part_die = $row->part_die;
            $zona_die = '';

            $pos = strpos($part_die, '0');

            if ($pos === false) {
                $zona_die = 'Pieza completa';
            } else {
                for ($i = 0; $i < 5; $i++) {
                    $zona = substr($part_die, $i, 1);
                    if ($zona == 'M') {
                        $zona_die .= 'M ';
                    } else if ($zona == 'D') {
                        $zona_die .= 'D ';
                    } else if ($zona == 'V') {
                        $zona_die .= 'V ';
                    } else if ($zona == 'P') {
                        $zona_die .= 'P ';
                    } else if ($zona == 'L') {
                        $zona_die .= 'L ';
                    } else if ($zona == 'O') {
                        $zona_die .= 'O ';
                    } else if ($zona == 'I') {
                        $zona_die .= 'I ';
                    }
                }
            }

            $this->fpdf->Cell(12, 10, utf8_decode($row->num_die), 1, 0, 'C');
            $this->fpdf->Cell(20, 10, utf8_decode($row->codi_enf), 1, 0, 'C');
            $this->fpdf->Cell(157, 10, utf8_decode($row->desc_enf), 1, 0, 'L');
            $this->fpdf->Ln(10);



       

        }


         

                $this->fpdf->SetLeftMargin(10);
                  $this->fpdf->Ln(10);

        $this->fpdf->SetFont('Times', 'B', 12);
        $this->fpdf->Cell(0, 20, utf8_decode('PROCEDIMIENTOS APLICADOS'), 'B', 0, 'L');
        $this->fpdf->Ln(20);

        $this->fpdf->SetFont('Times', 'B', 11);
        $this->fpdf->Cell(20, 10, utf8_decode("N°"), 1, 0, 'C');
        $this->fpdf->Cell(60, 10, utf8_decode("Procedimiento"), 1, 0, 'C');
        $this->fpdf->Cell(50, 10, utf8_decode("Categoría"), 1, 0, 'C');
        $this->fpdf->Cell(30, 10, utf8_decode("Costo"), 1, 0, 'C');
        $this->fpdf->Cell(30, 10, utf8_decode("Aseg."), 1, 0, 'C');

        $this->fpdf->Ln(10);
        $this->fpdf->SetFont('Times', '', 11);

        $procedimientos = $this->mod_procedimiento->get_historial_proc($codi_cit);

        foreach ($procedimientos as $row) {
            $this->fpdf->Cell(20, 10, utf8_decode($row->num_die), 1, 0, 'C');
            $this->fpdf->Cell(60, 10, utf8_decode($row->desc_pro), 1, 0, 'C');
            $this->fpdf->Cell(50, 10, utf8_decode($row->nomb_cat), 1, 0, 'C');
            $this->fpdf->Cell(30, 10, utf8_decode($row->cost_tar), 1, 0, 'C');
            $this->fpdf->Cell(30, 10, utf8_decode($row->aseg_dpr), 1, 0, 'C');
            $this->fpdf->Ln(10);
        }

        $this->fpdf->SetLeftMargin(10);
      



        $this->fpdf->Ln(14);

         

        $this->fpdf->Output();
    }

    public function validarImgEstado() {
        $diente = $this->input->post('diente');
        $estado = $this->input->post('estado');

        $estados = $this->mod_cita->get_edi(array('nomb_edi' => $estado));
        if (getimagesize(base_url() . 'resources/images/odontograma/' . $diente . '/' . $diente . '_' . $estados->codi_edi . '.jpg')) {
            echo base_url() . 'resources/images/odontograma/' . $diente . '/' . $diente . '_' . $estados->codi_edi . '.jpg';
        }
    }

    public function logged() {
        if ($this->mod_licence->validation()) {
            return $this->session->userdata('logged');
        }
    }

}
