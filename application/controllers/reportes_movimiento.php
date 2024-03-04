<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class reportes_movimiento extends CI_Controller {

    public function __construct() {
        parent::__construct();
         $this->load->model(array('mod_cita', 'mod_medico', 'mod_paciente', 'mod_odontograma', 'mod_procedimiento', 'mod_clinica', 'mod_licence','mod_inventario','mod_tipo_inventario','mod_pago',));
         $this->load->library('session');
    }
    public function index()
	{

		 if (!$this->logged()) {
            $this->login();
        } else {
           $data['clinica'] = $this->mod_clinica->get_clinica();
        $data['container'] = $this->load->view('Reportes/movimientos', $data, true);
        $this->load->view('home/body', $data);
        }
		

	}
	 public function  GeneraReportePagos(){
         // $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
      
          $Reporte   = json_decode($this->input->post('MiReporte'));
          $FInicial  = explode("/",$Reporte->Finicial);
          $FFinal    = explode("/",$Reporte->FFinal);   
          $FInicial  = $FInicial[2]."-".$FInicial[1]."-".(int)$FInicial[0]." 00:00:00"; 
          $FFinal    = $FFinal[2]  ."-".$FFinal[1]  ."-".(int)$FFinal[0]  ." 23:59:59"; 
          $Documento = $Reporte->Documento ;
          echo json_encode($this->mod_pago->getPagobyDate($FInicial, $FFinal,$Documento));
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
	
	public function ExportarReportes($Finicial, $FFinal,$Documento)
	{
		$this->load->library('fpdf');
		$clinica = $this->mod_clinica->get_clinica();
		$medico = $this->mod_medico->get_medico("codi_med = 1");
        $this->load->library('fpdf');
        $this->fpdf->AddPage();
        $this->fpdf->SetLeftMargin(35);
		
        $this->fpdf->Image(base_url() . 'resources/images/clinica/logo.png', 35, 10, 0, 40);
        $this->fpdf->SetFont('Times', 'B', 24);
		$this->fpdf->Cell(160, 25, utf8_decode($clinica['nomb_clin']), 0, 0, 'C');
        $this->fpdf->SetFont('Times', "", 10);
        $this->fpdf->Ln(8);
        $this->fpdf->Cell(160, 25, utf8_decode(' '.$clinica['direc_clin']), 0, 0, 'C');
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
        $this->fpdf->Cell(15, 10, utf8_decode("Secuencia"), 1, 0, 'C', 1);
        $this->fpdf->Cell(60, 10, utf8_decode("Concepto"), 1, 0, 'C', 1);
        $this->fpdf->Cell(40, 10, utf8_decode("Fecha Pago"), 1, 0, 'C', 1);
        $this->fpdf->Cell(40, 10, utf8_decode("Movimiento"), 1, 0, 'C', 1);
		$this->fpdf->Cell(30, 10, utf8_decode("Importe"), 1, 0, 'C', 1);

		$this->fpdf->Ln(10);
		$this->fpdf->SetTextColor(0,0,0);
        $this->fpdf->SetFont('Times', '', 8);
		$lista = $this->mod_pago->getPagobyDate($Finicial, $FFinal,$Documento);
        $Total = 0;
		foreach ($lista as $row) {
            $Total = $Total + $row->monto_pago;
            $this->fpdf->Cell(15, 10, utf8_decode($row->cod_pago), 1, 0, 'C');
            $this->fpdf->Cell(60, 10, utf8_decode($row->concepto_pago), 1, 0, 'C');
            $this->fpdf->Cell(40, 10, utf8_decode($row->fecha_pago), 1, 0, 'C');
            $this->fpdf->Cell(40, 10, utf8_decode($row->Movimiento), 1, 0, 'C');
			$this->fpdf->Cell(30, 10, utf8_decode($row->monto_pago), 1, 0, 'C');
			// $this->fpdf->Cell(15, 10, utf8_decode(round($row->Total - ($row->Total / 1.18), 2)), 1, 0, 'C');
			// $this->fpdf->Cell(15, 10, utf8_decode(round($row->Total / 1.18, 2)), 1, 0, 'C');
			//$this->fpdf->Cell(15, 10, utf8_decode($row->total), 1, 0, 'C');
            $this->fpdf->Ln(10);
        }
        //$this->fpdf->Ln(10);
        $this->fpdf->SetFont('Times', 'B', 10);
         $this->fpdf->Cell(155, 10, utf8_decode("Total "), 1, 0, 'R');
        $this->fpdf->Cell(30, 10, utf8_decode('S/ ' . round($Total,2)), 1, 0, 'C');
		$this->fpdf->Ln(35);
		$this->fpdf->SetFont('Times', 'B', 10);
        $this->fpdf->Cell(0, 0, utf8_decode('_____________________________________________'), 0, 0, 'C');
		$this->fpdf->Ln(4);
		$this->fpdf->Cell(0, 0, utf8_decode( "FIRMA DEL ENCARGADO"), 0, 0, 'C');
		$this->fpdf->Output();
	}
	

	}