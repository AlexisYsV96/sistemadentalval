<script type="text/javascript">
  var baseurl = "<?php echo base_url(); ?>";
</script>
   <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/flick/jquery-ui.min.css">
<script src="<?php echo base_url()?>/resources/js/jquery-1.11.0.js"></script>
<script src="<?php echo base_url()?>/resources/js/jquery-ui.js"></script>
<script src="<?php echo base_url()?>/resources/js/jsreportes_movimientos.js"></script>
<script src="<?php echo base_url()?>/resources/js/moment.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<h1 class="page-header"><span class="glyphicon glyphicon-list"></span> Reportes movimientos</h1>
<div id="mensaje"></div>
<hr/><br/> 
<table>
<tr>
<!-- <label for="mi_calendario" class="control-label">Fecha de inicio</label>
             <div class="controls">
                <div class="input-group date">
                   <input id="mi_calendario" type="text" class="mi_calendario form-control" />
                   <label for="mi_calendario" class="input-group-addon generic_btn"><i class="fa fa-calendar" aria-hidden="true"></i></label>
                </div>
             </div> -->
<td>Fecha Inicial: </td>
<td><input type="text" name="finicial" id="finicial" class="mi_calendario form-control"  size="20" /></td>
<td> &nbsp; &nbsp; &nbsp;Fecha Final: </td>
<td><input type="text" name="ffinal" id="ffinal" class="mi_calendario2 form-control" size="20" /></td>
<td>&nbsp; &nbsp; &nbsp; Movimiento: </td>
<td>
<select name="documento" id="documento" class="form-control input-sm">
    <option value="I">Ingreso</option>
    <option value="E">Egreso</option>
 </select>
</td>
<td>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit"   id="GeneraReportePagos" class="btn btn-primary"><i class="fa fa-align-left"></i> Generar Reporte</button>
      <button type="submit"   id="ExportarReportes" class="btn btn-primary"><i class="fa fa-align-left"></i> Exportar Reporte</button>
    </td>
</tr>
</table>
<hr/>
<br/>
<table class="table table-bordered table-striped"    id="reportes_movimiento">
  <thead>
    <th>Secuencia</th>
    <th>Concepto</th>
    <th>Fecha pago</th>
      <th>Movimiento</th>
    <th>Tipo pago</th> 
    <th>Monto</th>  

  <thead>
  
   <tbody>
        <tr>
            <td colspan=7><center>No Hay Información</center></td>
        </tr>
        
   </tbody>
   <tfoot> 
   <tr>
    <td colspan="5" align="right"> </td>

    <td><label id="lbltotal" name="lbltotal">S/ 0</label></td>
  </tr>
   
</tfoot> 
  </table>
      
       <script>
            $( ".mi_calendario" ).datepicker({
              // Formato de la fecha
              dateFormat: "dd/mm/yy",
              // Primer dia de la semana - lunes
              firstDay: 1,
              // Días largo traducido
              dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
              // Dias cortos traducido
              dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
              // Nombres largos de los meses traducido
              monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
              // Nombres cortos de los meses traducido 
              monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dec" ],
              // Al selecconar fecha, se escribe en el campo de texto
              onSelect: function(dateText) { 
                $('#finicial').val(dateText);
                  
              }
            });
          </script>

          <script>
            $( ".mi_calendario2" ).datepicker({
              // Formato de la fecha
              dateFormat: "dd/mm/yy",
              // Primer dia de la semana - lunes
              firstDay: 1,
              // Días largo traducido
              dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
              // Dias cortos traducido
              dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
              // Nombres largos de los meses traducido
              monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
              // Nombres cortos de los meses traducido 
              monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dec" ],
              // Al selecconar fecha, se escribe en el campo de texto
              onSelect: function(dateText) { 
                 $('#ffinal').val(dateText);
              }
            });
          </script>
               
       <!--  <script type="text/javascript">
           $(function() {
                $( "#finicial" ).datepicker();
                $( "#ffinal" ).datepicker();
             });
        </script>  -->