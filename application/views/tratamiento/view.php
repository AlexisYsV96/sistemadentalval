
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.midnight-blue{
	background:#2c3e50;
	padding: 4px 4px 4px;
	color:white;
	font-weight:bold;
	font-size:12px;
}
.silver{
	background:white;
	padding: 3px 4px 3px;
}
.clouds{
	background:#ecf0f1;
	padding: 3px 4px 3px;
}
.border-top{
	border-top: solid 1px #bdc3c7;
	
}
.border-left{
	border-left: solid 1px #bdc3c7;
}
.border-right{
	border-right: solid 1px #bdc3c7;
}
.border-bottom{
	border-bottom: solid 1px #bdc3c7;
}
table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
}
-->
</style>

<table cellspacing="0" style="width: 100%;">
	 <tr>

            <td style="width: 20%; color: #444444;">
				<img style="float:left;margin:5px 10px 0px 0px;width:60px" src="./resources/images/clinica/logo.png" alt="Logo"/><br>

                
            </td>
			<td style="width: 40%; color: #34495e;font-size:12px;text-align:center;">
                <span style="color: #34495e;font-size:14px;font-weight:bold"><?php echo "VITAL DENT";?></span>
				<br><?php echo "CLINICA DENTAL";?><br> 
				Teléfono: <?php echo "TELEFONO_EMPRESA";?><br>
				Email: <?php echo "EMAIL_EMPRESA";?>
                
            </td>

            <td style="width: 25%;text-align:right">
			<b>	Tratamiento. N° </b> <?php echo $presupuesto->id_presupuesto;?>
			</td>
			
        </tr>
</table>

 <br>

 <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:50%;" class='midnight-blue'>TRATAMIENTO A</td>
        </tr>
		<tr>
           	<td style="width:50%;" >
           		<span></span>
				
		   	</td>
        </tr>
    </table>
    <br>

<div class="row">
	<div class="col-xs-6" >	
		
		<b>N° H.C :</b> <?php echo $presupuesto->codi_pac;?> <br>
		<b>Nombre:</b> <?php echo $presupuesto->nombre;?> <br>
		<b>Nro Documento:</b> <?php echo $presupuesto->dni_pac;?><br>
		<b>Telefono:</b> <?php echo $presupuesto->telf_pac;?> <br>
		<b>Direccion:</b> <?php echo $presupuesto->dire_pac;?><br>
		
	</div>	
	<div class="col-xs-6">	
		
		
	<!-- 	<b>N° Tratamiento:</b> <?php echo $presupuesto->id_presupuesto;?><br> -->
		<b>Fecha Tratamiento:</b>  <?php echo $presupuesto->fecha;?><br>
		<b>Medico:</b>  <?php echo $presupuesto->medico . ','.$presupuesto->medico_apellido;?><br>
		<b>Adelanto:</b>  <?php echo $presupuesto->adelanto;?><br>
		<b>Tipo de pago:</b><?php if($presupuesto->estado_tratamiento == 1){$text_estado="Contado";$label_class='label-success';} else if($presupuesto->estado_tratamiento == 2) {$text_estado="Credito";$label_class='label-danger';}?> <span class="label <?php echo $label_class;?>"><?php echo $text_estado; ?></span><br>
		<!-- <b>Fecha</b> 17/12/1990 -->
	</div>	
</div>
<br>
<div class="row">
	<div class="col-xs-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th style="width: 5%;text-align:center" class='midnight-blue'>Cantidad</th>
					<th style="width: 20%;text-align:center" class='midnight-blue'>Descripción</th>
					<th style="width: 2%;text-align:center" class='midnight-blue'>Precio.Unitario</th>
					<th style="width: 10%;text-align:center" class='midnight-blue'>Precio Total</th>
					
				</tr>
			</thead>
			<tbody>
				<?php foreach ($presupuesto_detalles as $detalle) :?>

				<tr>
					<td style="width: 2%; text-align: center"><?php echo $detalle->cantidad;?></td>
					<td style="width: 10%; text-align: center"><?php echo $detalle->desc_pro;?></td>
					<td><?php echo $detalle->precio_procedimiento;?></td>
					<td><?php echo $presupuesto->total;?></td>
				
					
				</tr>
				<?php endforeach;?>

				
			</tbody>
			<tfoot>
				<tr>
					<td colspan="3" class="text-right"><strong>Subtotal:</strong></td>
					<td ><?php echo $presupuesto->total;?></td>
				</tr>
				<tr>
					<td colspan="3" class="text-right"><strong>Total:</strong></td>
					<td><?php echo $presupuesto->total;?></td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>