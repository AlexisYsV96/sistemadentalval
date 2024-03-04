<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class tratamiento extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('mod_paciente', 'mod_usuario', 'mod_clinica', 'mod_licence','mod_tratamiento','mod_procedimiento','mod_medico'));
        $this->load->library('session');
    }

    public function index() {
        if (!$this->logged()) {
            header('location: ' . base_url('login'));
        } else {
            if (!$this->admin()) {
                header('location: ' . base_url('login'));
            } else {    

                session_start();
                $session_id= session_id();
                $this->mod_tratamiento->delete_tmp($session_id);    

                $tratamiento['pacientes'] = $this->mod_paciente->get_paciente_historial();
                $tratamiento['enfermedades'] =  $this->mod_tratamiento->get_tratamiento();   
                $tratamiento['fecha_actual'] = date('Y-m-d');  
                $tratamiento['fecha'] = array('id' => 'fecha_trat', 'name' => 'fecha', 'class' => "form-control span2", "size" => "16", "value" => $tratamiento['fecha_actual'], "style" => "background: white;", "readonly" => "true");




            
                $data['container'] = $this->load->view('tratamiento/index', $tratamiento, true);
                $data['clinica'] = $this->mod_clinica->get_clinica();
                $this->load->view('home/body', $data);
            }
        }
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

    public function get_paciente_xnombre() {        
        //$this->load->model('mod_paciente');
        if (isset($_GET['term'])){
          $q = strtolower($_GET['term']);
          $this->mod_paciente->get_paciente_xnombre($q);        
        }
    }

      public function get_medico_xnombre() {        
        //$this->load->model('mod_paciente');
        if (isset($_GET['term'])){
          $q = strtolower($_GET['term']);
          $this->mod_medico->get_medico_xnombre($q);        
        }
    }

   

    public function get_detalle_proc(){  

        //$this->load->model('mod_procedimiento');       
        $query = $this->mod_procedimiento->get_procedimientos_xdescripcion();
        $tratamiento['tbl_tratamientos'] = $query;
        $this->load->view('tratamiento/index_busqueda', $tratamiento);        
    }

    public function get_detalle_agregar(){        
        //$this->load->model('mod_tratamiento');          
        if (isset($_POST['id'])){ $id=$_POST['id'];}
        if (isset($_POST['cantidad'])){ $cantidad=$_POST['cantidad'];}
        if (isset($_POST['precio_venta'])){ $precio_venta=$_POST['precio_venta'];}
        if (isset($_POST['session'])){ $session=$_POST['session'];}      
        
        if (!empty($id) and !empty($cantidad) and !empty($precio_venta) and !empty($session) )
        {
            $data = array(
                'cantidad_tmp' => $cantidad,
                'codi_pro_tmp' => $id,
                'precio_tmp' => $precio_venta,
                 'session_id' => $session
            );
            $this->mod_tratamiento->insert_tmp($data);                    
        }
        
        if (isset($_GET['id']))//codigo elimina un elemento del array
        {
            $id_tmp=intval($_GET['id']);            
            $this->mod_tratamiento->delete_tmp_xid($id_tmp);    
            //$delete=mysqli_query($con, "DELETE FROM tmp WHERE id_tmp='".$id_tmp."'");
        }        

        $query= $this->mod_tratamiento->get_tratamiento_tarifa(array("session_id" => $session));    
        $tratamiento['tbl_tratamientos']= $query;
        $this->load->view('tratamiento/index_agregar_detalle', $tratamiento);
    }  

    public function eliminar_tmp()
    {
        session_start();
        $session_id= session_id();

        if (isset($_GET['id']))//codigo elimina un elemento del array
        {
            $id_tmp=intval($_GET['id']);            
            $this->mod_tratamiento->delete_tmp_xid($id_tmp);    
            //$delete=mysqli_query($con, "DELETE FROM tmp WHERE id_tmp='".$id_tmp."'");
        }

        $query= $this->mod_tratamiento->get_tratamiento_tarifa(array("session_id" => $session_id));    
        $tratamiento['tbl_tratamientos']= $query;
        $this->load->view('tratamiento/index_agregar_detalle', $tratamiento);

    }


    public function registrar_factura()
    {

        session_start();
        $session_id= session_id();
        $query= $this->mod_tratamiento->get_tratamiento_tarifa(array("session_id" => $session_id)); 
        

        $id_paciente = $_REQUEST['id_paciente'];
        $id_medicod = $_REQUEST['id_medico'];
        $pago = $_REQUEST['pago'];
        $tipopago = $_REQUEST['tipopago'];
        $fecha = $_REQUEST['fecha'];
        $sumador_total=0;
        $id_presupuesto = $this->mod_tratamiento->get_nuevo_codigo_presupuesto();

        foreach ($query as $row) {
                    $id_tmp=$row->id_tmp;
                    $id_producto=$row->codi_pro;
                    $nombre_producto=$row->desc_pro;
                    $cantidad=$row->cantidad_tmp;
                    $precio_venta=$row->precio_tmp;                   
                    $precio_venta_f=number_format($precio_venta,2);
                    $precio_venta_r=str_replace(",","",$precio_venta_f);
                    $precio_total=$precio_venta_r*$cantidad;
                    $precio_total_f=number_format($precio_total,2);//Precio total formateado
                    $precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
                    $sumador_total+=$precio_total_r;//Sumador

            $data = array(
                'id_presupuesto' => $id_presupuesto,
                'codi_pro' => $id_producto,
                'cantidad' => $cantidad,
                'precio_procedimiento' => $precio_venta_r,
             

            );                    
            $this->mod_tratamiento->insert_presupuesto_detalle($data);              
        }


        $subtotal=number_format($sumador_total,2,'.','');
        $total_factura=$subtotal;

        //$date=date("Y-m-d H:i:s");       


        $data_cliente = array(
                'id_presupuesto'=> $id_presupuesto,
                'codi_pac' => $id_paciente,
                'adelanto' => $pago,
                'codi_med' => $id_medicod,
                'fecha'=> $fecha,
                'total'=> $total_factura,
                'estado_tratamiento'=> $tipopago
        );  


        $this->mod_tratamiento->insert_presupuesto($data_cliente); 

        $this->mod_tratamiento->delete_tmp($session_id);  

        /*$tratamiento['codi_pac'] = $id_paciente;
        $tratamiento['sumador_total'] = $sumador_total;
        $tratamiento['numero_presupuesto'] = $numero_presupuesto;
        $tratamiento['fecha'] = $date;
        $tratamiento['total_factura'] = $total_factura;*/

        
        


        $tratamiento['tbl_tratamientos'] = $query;
        $tratamiento['tbl_tratamiento'] = $this->mod_tratamiento->getPresupuestos($id_presupuesto);

        $tratamiento['id_presupuesto'] = $id_presupuesto;        
        $tratamiento['tbl_paciente'] = $this->mod_paciente->get_paciente_row(array('codi_pac'=> $id_paciente));
        $tratamiento['tbl_medico'] = $this->mod_medico->get_medico_row(array('codi_med'=> $id_medicod));

        //print_r($query);
       // print_r($tratamiento);

        
        $this->load->view('tratamiento/index_reporte', $tratamiento);


        $this->createFolder();
        $this->load->library('html2pdf');
        $this->html2pdf->folder('./assets/pdfs/');
        $this->html2pdf->filename('test.pdf');
        $this->html2pdf->paper('a4', 'portrait');

        $data = array(
            'title' => 'PDF Created',
            'message' => 'Hello World!'
        );


        //echo $tratamiento;
        //print_r($tratamiento);
        //var_dump($tratamiento);
        
        $this->html2pdf->html($this->load->view('tratamiento/index_reporte', $tratamiento, true));
        
        
        if($this->html2pdf->create('save')) {
            $this->show();
        }

        

    }

    public function view_presupuesto(){
        $id_presupuesto = $this->input->post("id_presupuesto");
        $data = array(
            "presupuesto" =>$this->mod_tratamiento->getPresupuestos($id_presupuesto),
            "presupuesto_detalles"=>$this->mod_tratamiento->getDetallePresupuetos($id_presupuesto));
        $this->load->view("tratamiento/view",$data);
    }

    private function createFolder()
    {
        if(!is_dir("./assets"))
        {
            mkdir("./assets", 0777);
            mkdir("./assets/pdfs", 0777);
        }
    }

    //esta función muestra el pdf en el navegador siempre que existan
    //tanto la carpeta como el archivo pdf
    public function show()
    {
        if(is_dir("./assets/pdfs"))
        {
            $filename = "test.pdf";
            $route = base_url("assets/pdfs/test.pdf");
            if(file_exists("./assets/pdfs/".$filename))
            {
                header('Content-type: application/pdf');
                readfile($route);
            }
        }
    }



    public function repotaje()
    {
        
        session_start();
        $session_id= session_id();
        $query= $this->mod_tratamiento->get_tratamiento_tarifa(array("session_id" => $session_id)); 
        

        $this->createFolder();
        //Load the library
        $this->load->library('html2pdf');
        
        //Set folder to save PDF to
        $this->html2pdf->folder('./assets/pdfs/');
        
        //Set the filename to save/download as
        $this->html2pdf->filename('test.pdf');
        
        //Set the paper defaults
        $this->html2pdf->paper('a4', 'portrait');
        
        $data = array(
            'title' => 'PDF Created',
            'message' => 'Hello World!'
        );
        
        //Load html view
        $this->html2pdf->html($this->load->view('tratamiento/index_rosada', $query, true));
        
        
        if($this->html2pdf->create('save')) {
            //PDF was successfully saved or downloaded
            $this->show();

            //echo 'PDF saved';
        }



        
    } 

    public function exportar_pdf(){

    session_start();
    $session_id= session_id();
    $query= $this->mod_tratamiento->get_tratamiento_tarifa(array("session_id" => $session_id)); 
    $tratamiento['tbl_tratamientos'] = $query;


    $html= $this->load->view('tratamiento/index_reporte', $tratamiento,true);


        // Se carga el modelo alumno
    $this->load->model('mod_tratamiento');
    // Se carga la libreria fpdf
    $this->load->library('new_pdf');
 
    // Se obtienen los alumnos de la base de datos
    $alumnos = $this->mod_tratamiento->get_tratamiento();
 
    // Creacion del PDF
 
    /*
     * Se crea un objeto de la clase Pdf, recuerda que la clase Pdf
     * heredó todos las variables y métodos de fpdf
     */
    ob_start();
    $this->pdf = new New_pdf();
    // Agregamos una página
    $this->pdf->AddPage();
    // Define el alias para el número de página que se imprimirá en el pie
    $this->pdf->AliasNbPages();
 
    /* Se define el titulo, márgenes izquierdo, derecho y
     * el color de relleno predeterminado
     */
    $this->pdf->SetTitle("Lista de alumnos");
    $this->pdf->SetLeftMargin(15);
    $this->pdf->SetRightMargin(15);
    $this->pdf->SetFillColor(200,200,200);
 
    // Se define el formato de fuente: Arial, negritas, tamaño 9
    $this->pdf->SetFont('Arial', 'B', 9);
    /*
     * TITULOS DE COLUMNAS
     *
     * $this->pdf->Cell(Ancho, Alto,texto,borde,posición,alineación,relleno);
     */
    $this->pdf->writeHTML($html);
    $this->pdf->Cell(15,7,'NUM','TBL',0,'C','1');
    $this->pdf->Cell(25,7,'PATERNO','TB',0,'L','1');
    $this->pdf->Cell(25,7,'MATERNO','TB',0,'L','1');
    $this->pdf->Cell(25,7,'NOMBRE','TB',0,'L','1');
    $this->pdf->Cell(40,7,'FECHA DE NACIMIENTO','TB',0,'C','1');
    /*$this->pdf->Cell(25,7,'GRADO','TB',0,'L','1');
    $this->pdf->Cell(25,7,'GRUPO','TBR',0,'C','1');*/
    $this->pdf->Ln(7);
    // La variable $x se utiliza para mostrar un número consecutivo
    $x = 1;
    
    foreach ($query as $detalle) {
        $precio_venta=$detalle->precio_tmp;                   
        $precio_venta_f=number_format($precio_venta,2);
        $precio_venta_r=str_replace(",","",$precio_venta_f);
      // se imprime el numero actual y despues se incrementa el valor de $x en uno
      $this->pdf->Cell(15,5,$x++,'BL',0,'C',0);
      // Se imprimen los datos de cada alumno
      $this->pdf->Cell(25,5,$detalle->codi_pro,'B',0,'L',0);
      $this->pdf->Cell(25,5,$detalle->cantidad_tmp,'B',0,'L',0);
      $this->pdf->Cell(25,5,$detalle->desc_pro,'B',0,'L',0);
      $this->pdf->Cell(40,5,$precio_venta_r,'BR',0,'C',0);
      //Se agrega un salto de linea
      $this->pdf->Ln(5);
    }

   
    $this->pdf->Output("Lista de alumnos.pdf", 'I');
    }

}
