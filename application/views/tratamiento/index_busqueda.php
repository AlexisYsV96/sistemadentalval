
<?php
	session_start();
	$session_id= session_id();

?>
<div class="table-responsive">
	<table id="table-usuario" class="table table-bordered">
		<thead>
			<tr  class="warning">
				<th style="text-align: center;">Código</th>
				<th style="text-align: center;">Tratamiento</th>
				<th class='text-center' style="width: 36px;">Cant.</th>
				<th class='text-center' style="width: 36px;">Precio</th>
				<th class='text-center' style="width: 36px;">Agregar</th>
			</tr>
		</thead>
		<tbody>
				<?php 
					
					foreach ($tbl_tratamientos as $row) { 
					$id_producto=$row->codi_pro;
					$codigo_producto=$row->codi_pro;
					$nombre_producto=$row->desc_pro;
					$precio_venta=$row->cost_tar;					
					$precio_venta=number_format($precio_venta,2);

				?>
					<tr>
						<td class='text-center'><?php echo $codigo_producto; ?></td>
						<td class='text-center'><?php echo $nombre_producto; ?></td>
						<td class='col-xs-1'>
						<div class="pull-right">
						<input type="text" class="form-control" style="text-align:right; width:100px;" id="cantidad_<?php echo $id_producto; ?>"  value="1" >
						</div></td>
						<td class='col-xs-2'><div class="pull-right">
						<input type="text" class="form-control" style="text-align:right; width:100px;" id="precio_venta_<?php echo $id_producto; ?>"  value="<?php echo $precio_venta;?>" >
						</div></td>

						<td class='text-center'><a class='btn btn-info'href="#" onclick="agregar('<?php echo $id_producto ?>','<?php echo $session_id ?>')"><i class="glyphicon glyphicon-plus"></i></a></td>

						
					</tr>

				<?php
				} ?>
		</tbody>
	</table>
</div>
<script src="<?= base_url() ?>resources/js/usuario.js"></script>
<script type="text/javascript">

	function agregar (id,sessionid)
	{
			var precio_venta=document.getElementById('precio_venta_'+id).value.replace(',','');
			var cantidad=document.getElementById('cantidad_'+id).value.replace(',','');
			var session='AS';
			//Inicia validacion
			if (isNaN(cantidad))
			{
				alert('Esto no es un número');
				document.getElementById('cantidad_'+id).focus();
				return false;
			}
			if (isNaN(precio_venta))
			{
				alert('Esto no es un número');
				document.getElementById('precio_venta_'+id).focus();
				return false;
			}
			
			//Fin validacion
			
			$.ajax({
		        type: "post",
		        url: "<?php echo base_url('tratamiento/get_detalle_agregar') ?>", 
		        data: "id="+id+"&precio_venta="+precio_venta+"&cantidad="+cantidad+"&session="+sessionid,
				beforeSend: function(objeto){
					$("#resultados").html("Mensaje: Cargando...");
				},
		        success: function(datos){
					$("#resultados").html(datos);
				}
			});
	}

	function eliminar (id)
	{				
			$.ajax({
	        	type: "GET",
	        	url:  "<?php echo base_url('tratamiento/eliminar_tmp') ?>",
	        	data: "id="+id,
			 	beforeSend: function(objeto){
					$("#resultados").html("Mensaje: Cargando...");
			  	},
	        	success: function(datos){
					$("#resultados").html(datos);
				}
			});

	}

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