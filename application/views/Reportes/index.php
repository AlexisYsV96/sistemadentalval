<script type="text/javascript">
  var baseurl = "<?php echo base_url(); ?>";
</script>
<script src="<?php echo base_url()?>/resources/js/jquery-1.11.0.js"></script>
<script src="<?php echo base_url()?>/resources/js/jquery-ui.js"></script>
<script src="<?php echo base_url()?>/resources/js/JsReportes.js"></script>
<script src="<?php echo base_url()?>/resources/js/moment.js"></script>
<h1 class="page-header"><span class="glyphicon glyphicon-list"></span> Reportes</h1>
<div id="mensaje"></div>
<hr/><br/> 
<table>
<tr>
<td>Fecha Inicial: </td>
<td><input type="text" name="finicial" id="finicial" class="form-control input-sm" data-date-format="dd/mm/yyyy" size="20" /></td>
<td> &nbsp; &nbsp; &nbsp;Fecha Final: </td>
<td><input type="text" name="ffinal" id="ffinal" class="form-control input-sm" data-date-format="dd/mm/yyyy" size="20" /></td>

</td>
<td>
      &nbsp;<button type="submit"   id="GeneraReporte" class="btn btn-primary"><i class="fa fa-align-left"></i> Generar Reporte</button>
      <button type="submit"   id="ExportarReporte" class="btn btn-primary"><i class="fa fa-align-left"></i> Exportar Reporte</button>
    </td>
</tr>
</table>
<hr/>
<br/>
<table class="table table-bordered table-striped"    id="reportes">
  <thead>
    <th>Factura</th>
    <th>DNI</th>
    <th>Nombre Completo</th> 
    <!-- <th>Procedimiento</th>   -->
  <th>Fecha</th>
    <th>Impuesto</th>
    <th>Sub-Total</th>
    <th>Total</th>
  <thead>
  
   <tbody>
        <tr>
            <td colspan=7><center>No Hay Información</center></td>
        </tr>
        
   </tbody>
   <tfoot> 
   <tr>
    <td colspan="6" align="right"> </td>

    <td><label id="lbltotal" name="lbltotal">S/ 0</label></td>
  </tr>
   
</tfoot> 
  </table>
      
                      
        <script type="text/javascript">
           $(function() {
                $( "#finicial" ).datepicker();
                $( "#ffinal" ).datepicker();
             });
        </script> 