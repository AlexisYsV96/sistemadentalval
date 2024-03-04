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

</head>

<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
    
    <table cellspacing="0" style="width: 100%;">
        <tr>

            <td style="width: 25%; color: #444444;">
				<img style="float:left;margin:5px 10px 0px 0px;width:60px" src="./resources/images/clinica/logo.png" alt="Logo"/><br>

                
            </td>
			<td style="width: 50%; color: #34495e;font-size:12px;text-align:center">
                <span style="color: #34495e;font-size:14px;font-weight:bold"><?php echo "VITAL DENT";?></span>
				<br><?php echo "CLINICA DENTAL";?><br> 
				Teléfono: <?php echo "TELEFONO_EMPRESA";?><br>
				Email: <?php echo "EMAIL_EMPRESA";?>
                
            </td>

            <td style="width: 25%;text-align:right">
			TRATAMIENTO Nº <?php echo $id_presupuesto?>
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
				<?php 
				echo "<br> N° H.C : ";
				echo $tbl_paciente->codi_pac;
				echo "&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "Medico: ";
				echo "&nbsp;&nbsp;  ";
				echo $tbl_medico->nomb_med;
				echo ", ";
				echo $tbl_medico->apel_med;

				echo "<br> Paciente: ";
				echo $tbl_paciente->apel_pac;
				echo " ";
				echo $tbl_paciente->nomb_pac;
				echo "&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ";		
				 echo "Fecha Tratamiento: ";
				 echo "&nbsp;&nbsp;  ";
				  echo $tbl_tratamiento->fecha;
	
				echo "<br> Dirección: ";
				echo $tbl_paciente->dire_pac;
				echo "&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ";		
				 echo "Adelanto: ";
				 echo "&nbsp;&nbsp;&nbsp;  ";
				  echo $tbl_tratamiento->adelanto;
				echo "<br> Teléfono: ";
				echo $tbl_paciente->telf_pac;
				echo "&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ";
				echo "&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ";
			?>		
				<?php		
				 echo "Tipo pago: ";
				 echo "&nbsp;";
				 ?>
				<?php if($tbl_tratamiento->estado_tratamiento == 1){$text_estado="Contado";$label_class='label-danger';} else if($tbl_tratamiento->estado_tratamiento == 2) {$text_estado="Credito";$label_class='label-warning';}?>
                                                    <span class="label <?php echo $label_class;?>"><?php echo $text_estado; ?></span>
                                                 
				
				<?php
				echo "<br> Email: ";
				echo $tbl_paciente->emai_pac;
				?>
		   	</td>

        </tr>
    </table>


    <br>

  
<br>

    <br>

    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <th style="width: 10%;text-align:center" class='midnight-blue'>CANT.</th>
            <th style="width: 60%" class='midnight-blue'>DESCRIPCION</th>
            <th style="width: 15%;text-align: right" class='midnight-blue'>PRECIO UNIT.</th>
            <th style="width: 15%;text-align: right" class='midnight-blue'>PRECIO TOTAL</th>
            
        </tr>

        <?php 
		$nums=1;
		$sumador_total=0;	
					foreach ($tbl_tratamientos as $row) { 
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

					if ($nums%2==0){
						$clase="clouds";
					} else {
						$clase="silver";
					}

		?>
					<tr>
			            <td class='<?php echo $clase;?>' style="width: 10%; text-align: center"><?php echo $cantidad; ?></td>
			            <td class='<?php echo $clase;?>' style="width: 60%; text-align: left"><?php echo $nombre_producto;?></td>
			            <td class='<?php echo $clase;?>' style="width: 15%; text-align: right"><?php echo $precio_venta_f;?></td>
			            <td class='<?php echo $clase;?>' style="width: 15%; text-align: right"><?php echo $precio_total_f;?></td>
			            
			        </tr>

		<?php
					$nums++;
		} 
		$subtotal=number_format($sumador_total,2,'.','');
		$total_factura=$subtotal;
		?>

		<tr>
            <td colspan="3" style="widtd: 85%; text-align: right;">SUBTOTAL &#36; </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($subtotal,2);?></td>
        </tr>
        </tr><tr>
            <td colspan="3" style="widtd: 85%; text-align: right;">TOTAL &#36; </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($total_factura,2);?></td>
        </tr>
    </table>


</page>
