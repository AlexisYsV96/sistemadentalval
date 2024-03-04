<div>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb" style="margin-top: 2%;">
                <li><a href="<?= base_url() ?>">Inicio</a>
                </li>
                <li class="active">Tratamiento</li>
            </ol>
        </div>
    </div>

    <div class="panel panel-info">
		<div class="panel-heading text-center">
			<h4> PLAN DE TRATAMIENTO</h4>
		</div>

		<div class="panel-body">


<form class="form" role="form" id="datos_factura">
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="nombre_paciente">Paciente :</label>
      <input type="text" class="form-control" id="nombre_paciente" placeholder="Selecciona un paciente" required>
										<input id="id_paciente" type='hidden' >	
    </div>
    <div class="col-md-4 mb-3">
      <label for="nombre_medico">Medico :</label>
      <input type="text" class="form-control" id="nombre_medico" placeholder="Ingrese nombre" >
      <input id="id_medico" type='hidden' >	
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationServer02">Adelanto :</label>
      <input type="text" class="form-control is-valid" id="validationServer02" placeholder="Adelanto" >
      
    </div>

    <div class="">

      </div>
  </div>
<div class="form-row">
    <div class="col-md-4 mb-3">
      	<label for="validationServer03">Fecha tratamiento :</label>

      	<div class="date form-group input-group" id="dp_fecha_cit" data-date="<?= $fecha_actual ?>" data-date-format="yyyy-mm-dd" style="width: 170px;">
					                        <?= form_input($fecha) ?>
					                        <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span>					                        
					                    </div>

    </div>
    <div class="col-md-4 mb-3">
      	<label for="validationServer04">Tipo Pago :</label>
      	<div class="radio">
      		<label><input type="radio" name="tipopago" value="1" checked="true" >Contado</label> 
      		<label><input type="radio" name="tipopago" value="2"  >Crédito</label>
    	</div>
    </div>
</div>
    
    
    <div class="col-md-12">
						<div class="pull-right">						
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalNuevoTratamiento">
							 <span class="glyphicon glyphicon-search"></span> Agregar tratamiento
							</button>
							<button type="submit" class="btn btn-info">
							  <span class="glyphicon glyphicon-print"></span> Imprimir
							</button>
						</div>	
				</div>

</form>





				<!-- <div class="col-md-7 mb-9">
									<label for="nombre_paciente" class="col-md-1 control-label">Paciente</label>
									<div class="col-md-3">
										<input type="text" class="form-control" id="nombre_paciente" placeholder="Selecciona un paciente" required>
										<input id="id_paciente" type='hidden' >	
									</div>
</div>
 -->
<!-- <div class="form-group">
	<label for="form-group" class="col-md-1 control-label">Medico</label>
									<div class="col-md-3">
										<input type="text" class="form-control" id="nombre_paciente" placeholder="Selecciona un paciente" >
										<input id="id_paciente" type='hidden' >	
									</div>
</div> -->

					

<!-- <div class="form-group">
	<label form="form-group" class="col-md-1 control-label">Fecha</label>
									<div class="col-md-3">
										<div class="date form-group input-group" id="dp_fecha_cit" data-date="<?= $fecha_actual ?>" data-date-format="yyyy-mm-dd" style="width: 170px;">
					                        <?= form_input($fecha) ?>
					                        <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span>					                        
					                    </div>
									</div>		
</div>
			 -->														

				

				<!-- <div class="col-md-12">
						<div class="pull-right">						
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalNuevoTratamiento">
							 <span class="glyphicon glyphicon-search"></span> Agregar tratamiento
							</button>
							<button type="submit" class="btn btn-info">
							  <span class="glyphicon glyphicon-print"></span> Imprimir
							</button>
						</div>	
				</div> -->
	
			<div id="resultados" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->	
		</div>

	</div>
</div>

<!-- MODAL AGREGAR TRATAMIENTO -->
<div class="modal fade" id="ModalNuevoTratamiento" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Buscar Procedimientos</h4>
				  </div>
				  <div class="modal-body">					
					<div id="loader" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
					<div class="outer_div" ></div><!-- Datos ajax Final -->
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>					
				  </div>
				</div>
			  </div>
	</div>
</div>
<!-- END MODAL AGREGAR TRATAMIENTO -->


<script src="<?php echo base_url()?>/resources/js/nuevo_procedimiento.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />


<script type="text/javascript">
		$(document).ready(function($) {
	        $("#nombre_paciente").autocomplete({
			    //source: "tratamiento/get_paciente_autocomplete_xnombre", // path to the get_birds method,	
			    source: 'tratamiento/get_paciente_xnombre', // path to the get_birds method,			    
			    select: function(event, ui) {
								event.preventDefault();
								$('#id_paciente').val(ui.item.value);
								$('#nombre_paciente').val(ui.item.label);
				}
			});
			load(1);
	    });


</script>


<script type="text/javascript">
		$(document).ready(function($) {
	        $("#nombre_medico").autocomplete({
			    //source: "tratamiento/get_paciente_autocomplete_xnombre", // path to the get_birds method,	
			    source: 'tratamiento/get_medico_xnombre', // path to the get_birds method,			    
			    select: function(event, ui) {
								event.preventDefault();
								$('#id_medico').val(ui.item.value);
								$('#nombre_medico').val(ui.item.label);
				}
			});
			load(1);
	    });

	    
</script>

<script type="text/javascript">
	function load(page){
				var q= $("#q").val();
				$("#loader").fadeIn('slow');
				$.ajax({
						url : "<?php echo base_url('tratamiento/get_detalle_proc') ?>",
		                data: {'action': 'ajax' , 'page' : page , 'q' : 'L' },
                		type: 'post',
                		success: function(resultado) {
							$("#q").val(nomb_med);
							$(".outer_div").html(resultado).fadeIn('slow');
							$('#loader').html('');
                    	}				
				})
	}

	$("#datos_factura").submit(function(){
		load(1);

		
		var id_paciente = $("#id_paciente").val();
		var id_medico = $("#id_medico").val();
		var fecha = $("#fecha_trat").val();	
		var pago = $("#validationServer02").val();	 
		var tipopago= $("input[name='tipopago']:checked").val();


		if (id_paciente==""){
			  	alert("Debes seleccionar un paciente");
			  	$("#nombre_paciente").focus();
			  	return false;
		}

		

		VentanaCentrada("<?php echo base_url() ?>tratamiento/registrar_factura?id_paciente="+id_paciente+"&id_medico="+id_medico+"&pago="+pago+"&tipopago="+tipopago+"&fecha="+fecha,'Factura','','1024','768','true');
        location.reload();	
/*
		  	$.ajax({
						url : "<?php echo base_url('tratamiento/exportar_pdf') ?>",
		                data: {'id_paciente': id_paciente , 'fecha': fecha},
                		type: 'post',
                		beforeSend: function() {
                			
			            },
                		success: function(datos) {
                			alert(fecha)   ;
                			//VentanaCentrada("",'Factura','','1024','768','true');
                			//ExportarPdf.document.write("<p>I replaced the current window.</p>");
                			//var myWindow = window.open("", "MsgWindow", "width=1204,height=768");
    						//myWindow.document.write(datos);
    						VentanaCentrada("<?php echo base_url() ?>tratamiento/repotaje",'Factura','','1024','768','true');

                			location.reload();

                			//alert("Se agregaron correctamente los datos.");
                			//location.reload();
                    	}				
			})*/
		 //VentanaCentrada("<?php echo base_url() ?>"+'resources/pdf/documentos/factura_pdf2.php?id_paciente='+id_paciente,'Factura','','1024','768','true');
		 //VentanaCentrada("<?php echo base_url() ?>tratamiento/exportar_pdf?id_paciente=1",'Factura','','1024','768','true')

	 });


	function VentanaCentrada(theURL,winName,features, myWidth, myHeight, isCenter) { //v3.0
	  if(window.screen)if(isCenter)if(isCenter=="true"){
	    var myLeft = (screen.width-myWidth)/2;
	    var myTop = (screen.height-myHeight)/2;
	    features+=(features!='')?',':'';
	    features+=',left='+myLeft+',top='+myTop;
	  }
	  window.open(theURL,winName,features+((features!='')?',':'')+'width='+myWidth+',height='+myHeight);	  

	}
</script>
