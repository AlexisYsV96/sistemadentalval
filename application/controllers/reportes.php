<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class reportes extends CI_Controller {

    public function __construct() {
        parent::__construct();
         $this->load->model(array('mod_cita', 'mod_medico', 'mod_paciente', 'mod_odontograma', 'mod_procedimiento', 'mod_clinica', 'mod_licence', 'mod_reporte'));
         $this->load->library('session');
    }
    public function index()
    {

         // if (!$this->logged()) {
   //          $this->login();
   //      } else {
   //          //$data['carousel'] = $this->load->view('home/carousel', null, true);
   //          $data['clinica'] = $this->mod_clinica->get_clinica();
   //          $data['container'] = $this->load->view('home/index', $data, true);
   //          $this->load->view('home/body', $data);
   //      }
        $data['clinica'] = $this->mod_clinica->get_clinica();
        $data['container'] = $this->load->view('Reportes/index', $data, true);
        $this->load->view('home/body', $data);

    }
     public function  GeneraReporte(){
         // $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
      
           $Reporte   = json_decode($this->input->post('MiReporte'));
          $FInicial  = explode("/",$Reporte->Finicial);
          $FFinal    = explode("/",$Reporte->FFinal);   
          $FInicial  = $FInicial[2]."-".$FInicial[1]."-".(int)$FInicial[0]." 00:00:00"; 
          $FFinal    = $FFinal[2]  ."-".$FFinal[1]  ."-".(int)$FFinal[0]  ." 23:59:59"; 

          echo json_encode($this->mod_reporte->reportesGenera($FInicial, $FFinal));
     }

       public function logged() {
        if ($this->mod_licence->validation()) {
            return $this->session->userdata('logged');
        }
    }

    public function admin() {
        if ($this->session->userdata('codi_rol') == '1') {
            return true;
        } else {
            return false;
        }
    }
    //    public function verificar_hora_cita() {
    //     $fecha = $this->input->post('fecha');
    //     $hora = $this->input->post('hora');
    //     $citas = $this->mod_cita->get_cita();

    //     $sw = false;
    //     foreach ($citas as $row) {
    //         $date = new DateTime($row->fech_cit);
    //         $fecha_cit = date('Y-m-d', $date->getTimestamp());
    //         $hora_cit = date('H:i', $date->getTimestamp());

    //         if ($fecha_cit == $fecha && $hora == $hora_cit) {
    //             $sw = true;
    //             break;
    //         }
    //     }
    //     if ($sw) {
    //         echo "error";
    //     }
    // }
    
    public function ExportarReporte($FechaInicial, $FechaFinal)
    {
        $this->load->library('fpdf');
        $clinica = $this->mod_clinica->get_clinica();
        $medico = $this->mod_medico->get_medico("codi_med = 1");
        $this->load->library('fpdf');
        $this->fpdf->AddPage();
        $this->fpdf->SetLeftMargin(35);
        
        $this->fpdf->Image(base_url() . 'resources/images/clinica/logo.png', 30, 10, 0, 40);
        $this->fpdf->SetFont('Times', 'B', 24);
        $this->fpdf->Cell(160, 25, utf8_decode($clinica['nomb_clin']), 0, 0, 'C');
        $this->fpdf->SetFont('Times', "", 10);
        $this->fpdf->Ln(8);
        $this->fpdf->Cell(160, 25, utf8_decode('Dirección: '.$clinica['direc_clin']), 0, 0, 'C');
        $this->fpdf->Ln(5);
        $this->fpdf->Cell(160, 25, utf8_decode('Teléfono: '.$clinica['telf_clin']), 0, 0, 'C');
        $this->fpdf->Ln(5);
        $this->fpdf->Cell(160, 25, utf8_decode('R.U.C.: '.$clinica['ruc_clin']), 0, 0, 'C');
        $this->fpdf->Ln(5);
        $this->fpdf->Cell(160, 25, utf8_decode('E-mail: '.$clinica['email_clin']), 0, 0, 'C');
        $this->fpdf->SetLeftMargin(10);
        $this->fpdf->Ln(20);

        $this->fpdf->SetFont('Times', "B", 12);
        
        $this->fpdf->Ln(12);
        $this->fpdf->SetFont('Times', 'B', 9);
        $this->fpdf->setFillColor(0,150,255);
        $this->fpdf->SetTextColor(255,255,255);
        $this->fpdf->Cell(15, 10, utf8_decode("Factura"), 1, 0, 'C', 1);
        $this->fpdf->Cell(20, 10, utf8_decode("D.N.I."), 1, 0, 'C', 1);
        $this->fpdf->Cell(50, 10, utf8_decode("Nombre"), 1, 0, 'C', 1);
       // $this->fpdf->Cell(25, 10, utf8_decode("Procedimiento"), 1, 0, 'C', 1);
        $this->fpdf->Cell(30, 10, utf8_decode("Fecha"), 1, 0, 'C', 1);
        $this->fpdf->Cell(20, 10, utf8_decode("Impuesto"), 1, 0, 'C', 1);
        $this->fpdf->Cell(25, 10, utf8_decode("Sub Total"), 1, 0, 'C', 1);
        $this->fpdf->Cell(30, 10, utf8_decode("Total"), 1, 0, 'C', 1);
        $this->fpdf->Ln(10);
        $this->fpdf->SetTextColor(0,0,0);
        $this->fpdf->SetFont('Times', '', 8);
        $lista = $this->mod_reporte->reportesGenera($FechaInicial, $FechaFinal . " 23:59");
        $Total = 0;
        //print_r($lista);
        foreach ($lista as $row) {
             $Total = $Total + $row->Total;
            //print_r($row);
            $this->fpdf->Cell(15, 10, utf8_decode($row->numero_factura), 1, 0, 'C');
            $this->fpdf->Cell(20, 10, utf8_decode($row->DNI), 1, 0, 'C');
            $this->fpdf->Cell(50, 10, utf8_decode($row->Nombre. ' ' . $row->Apellido), 1, 0, 'C');
         //   $this->fpdf->Cell(25, 10, utf8_decode($row->Procedimiento), 1, 0, 'C');
            $this->fpdf->Cell(30, 10, utf8_decode($row->Fecha), 1, 0, 'C');
            $this->fpdf->Cell(20, 10, utf8_decode(round($row->Total - ($row->Total / 1.18), 2)), 1, 0, 'C');
            $this->fpdf->Cell(25, 10, utf8_decode(round($row->Total / 1.18, 2)), 1, 0, 'C');
            $this->fpdf->Cell(30, 10, utf8_decode($row->Total), 1, 0, 'C');
            
            $this->fpdf->Ln(10);
        }


        $this->fpdf->SetFont('Times', 'B', 10);
                 $this->fpdf->Cell(160, 10, utf8_decode("Total : "), 1, 0, 'R');
        $this->fpdf->Cell(30, 10, utf8_decode('S/ ' . round($Total,2)), 1, 0, 'C');
            $this->fpdf->Ln(35);
        $this->fpdf->Cell(0, 0, utf8_decode('_____________________________________________'), 0, 0, 'C');
        $this->fpdf->Ln(4);
        $this->fpdf->Cell(0, 0, utf8_decode('Firma'), 0, 0, 'C');
        $this->fpdf->Output();
    }
    
    /*public function ExportarReporte($FechaInicial, $FechaFinal) {  
        $clinica = $this->mod_clinica->get_clinica();
        $medico = $this->mod_medico->get_medico("codi_med = 1");
        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('');
        
        $pdf->SetTitle('Reporte de Facturas');
        $pdf->SetSubject('');
        $pdf->SetKeywords('PDF, Reporte, Factura');
        $pdf->SetHeaderData(PDF_HEADER_LOGO, "30", $clinica['nomb_clin'], "Dirección :" .$clinica['direc_clin'] ."\nR.U.C.: " . $clinica['ruc_clin'] . "\nTeléfono: " . $clinica['telf_clin'], array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('freemono', '', 11, '', true);
        $pdf->AddPage();
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
        
        $tablainterna = '';
        $lista = $this->mod_reporte->reportesGenera($FechaInicial, $FechaFinal);
        foreach ($lista as $fila) 
        {
            $factura = $fila->numero_factura;
            $DNI = $fila->DNI;
            $nombre_completo = $fila->Nombre . ' ' . $fila->Apellido;
            $procedimiento=$fila->Procedimiento;
            $fecha = $fila->Fecha;
            $total = $fila->Total;
            $tablainterna .= '<tr><td class="style-td">' . $factura . '</td><td class="style-td">' . $DNI . '</td><td class="style-td">'. $nombre_completo . '</td><td class="style-td">'. $procedimiento .'</td><td class="style-td">'. $fecha.'</td>';
            $tablainterna .= '<td class="style-td">'.round($total - ($total / 1.18), 2).'</td><td class="style-td">'.round($total / 1.18, 2).'</td><td class="style-td">'.$total.'</td></tr>';
        }
        $html = '<style>.style-th{background-color: #2E64FE; color: white; font-weight: bold; font-size: 10px}';
        $html .= '.style-td{font-size: 8px}h2{text-align:center}</style><h2>Reporte de Facturas</h2><h4>Actualmente: '.count($lista).' encontradas.</h4>
        <table border="1" cellspacing="0" cellpadding="4" width="100%">
        <tr><th class="style-th" style="width: 55px">Factura</th><th class="style-th" style="width: 55px">DNI</th>';
        $html .='<th class="style-th" style="width: 150px">Nombre</th><th class="style-th" style="width: 90px">Procedimiento</th>';
        $html .='<th class="style-th" style="width: 100px">Fecha</th><th class="style-th" style="width: 60px">Impuesto</th>';
        $html .='<th class="style-th" style="width: 65px">Sub Total</th><th class="style-th" style="width: 40px">Total</th></tr>
        '.
        $tablainterna 
        .'
        </table>';
        $html .= '<br><br><br><br><br><br>';
        $html .= '<table style="width: 100%; text-align: center"><tr><td>______________________________________</td></tr>';
        $html .= '<tr><td style="text-size: 14px; text-weight: bold">'.$medico[0]->nomb_med . ' ' . $medico[0]->apel_med.'</td></tr>';
        //$html .= '<tr><td>Especialidad</td></tr>';
        //$html .= '<tr><td>Dato adicional</td></tr></table>';
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
        $nombre_archivo = utf8_decode("Reporte_Facturas"."INDICADOR".".pdf");
        $pdf->Output($nombre_archivo, 'I');
        return true;
    }*/
    
    }