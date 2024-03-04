<!-- <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script> -->
<script src="<?= base_url() ?>resources/js/jquery-1.9.1.min.js"></script>
<script src="<?php echo base_url()?>/resources/js/moment.js"></script>
<script src="https://momentjs.com/downloads/moment.min.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
   <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/flick/jquery-ui.min.css">
<input id="error_nueva_cita" type="hidden" value="<?= $this->session->userdata('error_nueva_cita') ?>">
<input id="error_editar_cita" type="hidden" value="<?= $this->session->userdata('error_editar_cita') ?>">
<input id="error_editar_cita_codigo" type="hidden" value="<?= $this->session->userdata('error_editar_cita_codigo') ?>">
<?php $this->session->unset_userdata('error_nueva_cita'); ?>
<?php $this->session->unset_userdata('error_editar_cita'); ?>
<?php $this->session->unset_userdata('error_editar_cita_codigo'); ?>
<div>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb" style="margin-top: 2%;">
                <li><a href="<?= base_url() ?>">Inicio</a>
                </li>
                <li class="active">Recetas</li>
            </ol>
        </div>
    </div>
</div>

<div class="row" style="margin-top: 2%">
    <div class="col-md-10 col-md-offset-1">
        <div id="panel-paciente" class="login-panel panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Recetas</h3>
            </div>
            <div class="panel-body">
                <?php if ($this->session->userdata('mensaje_cita') && $this->session->userdata('mensaje_cita') != "") { ?>
                    <div id="mensaje_cit" class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?= $this->session->userdata('mensaje_cita') ?>
                    </div>
                    <?php
                    $this->session->unset_userdata('mensaje_cita');
                }
                ?>
                 <div style="float: left;">
                    <label>Fecha de receta: </label>
                    <div class="date form-group input-group" id="dp_fecha_cit" data-date="<?= $fecha_actual ?>" data-date-format="yyyy-mm-dd" style="width: 170px;">

                        <?= form_input($fecha) ?>
                        <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
                <!-- <div style="float: left;">
                    <label>Fecha de citas médicas: </label>
                   <div class="input-group date">
                       <input type="text" class="mi_calendario" id="mi_calendario" data-date="<?= $fecha_actual ?>" data-date="1970-01-01" data-date-format="yyyy-mm-dd"  style="width: 170px;" <?= form_input($fecha) ?> <i></i> 
                   </div>
                    
                      
       
                </div> -->
                <?= form_button($nueva_receta) ?>
                <br><br><br>
                <hr>
                <div id="resultado_citas_medicas" class="table-responsive">
                    <table id="table-recetas-medicas" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Médico</th>
                                <th>Paciente</th>
                                <th>Edad</th>
                                <th>Fecha Siguiente Cita</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($recetas as $row) {
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?= $row->id ?></td>
                                    <td><?= $row->txt_med ?></td>
                                     <td><?=  $row->txt_pac ?></td>
                                    <td><?= $row->edad_pac ?></td>
                                    <td style="text-align: center;"><?php
                                        date_default_timezone_set('America/Lima');
                                        $date = new DateTime($row->fecha_sc);
                                        echo date('d/m/Y h:i A', $date->getTimestamp());
                                        ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="ModalNuevaReceta" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width: 40%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Nueva Receta</h4>
            </div>
            <div class="modal-body">
                
                <div class="panel">
                    <div class="panel-body">
                         <div class="form-group">
                            <label>Fecha:</label>
                            <input type="date" name="fecha2" value="" id="fecha_receta_form" class="form-control" size="16" style="width: 170px;" disabled required>
                        </div>
                        <div class="form-group">
                            <label>Médico: </label>
                            <?= form_dropdown('medico', $medicos, array(), 'class="form-control" id="selected_medico_receta"') ?>
                        </div>
                        <div class="form-group">
                            <label>Paciente: </label>
                            <input type="text" name="paciente" value="" id="paciente_receta_form" class="form-control" maxlength="50" required="true" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Edad: </label>
                            <input type="number" name="edad" value="" id="edad_receta_form" class="form-control" maxlength="50" required="true" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Receta: </label>
                            <textarea name="receta" cols="50" rows="2" id="receta_receta_form" class="form-control" autocomplete="off" style="max-width: 500px; height:250px;"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Prescripcion: </label>
                            <textarea name="prescripcion" cols="50" rows="2" id="prescripcion_receta_form" class="form-control" autocomplete="off" style="max-width: 500px; height: 250px;"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Fecha Siguiente Cita:</label>
                            <input type="date" name="fecha_sc" value="" id="fecha_sgt_cita_form" class="form-control" size="16" style="width: 170px;" required>
                            <label>Hora: </label>
                            <input type="time" name="hora_sc" value="" id="hora_sgt_cita_form" class="form-control" maxlength="50" required="true" >
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div style="float: right;">
                    <button class="btn btn-lg btn-primary" value="true" onclick="grabar_receta();">Guardar</button>
                    <!--<button class="btn btn-lg btn-primary" value="true" onclick="imprimir_receta();">Imprimir</button>-->
                    <button class="btn btn-lg btn-default" value="true" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalVerReceta" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width: 40%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="verRecetaTitle">Receta</h4>
            </div>
            <div class="modal-body">
                
                <div class="panel">
                    <div class="panel-body">
                         <div class="form-group">
                            <label>Fecha:</label>
                            <span id="fecha_receta_ver"></span>
                        </div>
                        <div class="form-group">
                            <label>Médico: </label>
                            <span id="medico_receta_ver"></span>
                        </div>
                        <div class="form-group">
                            <label>Paciente: </label>
                            <span id="paciente_receta_ver"></span>
                        </div>
                        <div class="form-group">
                            <label>Edad: </label>
                            <span id="edad_receta_ver"></span>
                        </div>
                        <div class="form-group">
                            <label>Receta: </label>
                            <ul id="receta_receta_ver"></ul>
                        </div>
                        <div class="form-group">
                            <label>Prescripcion: </label>
                            <ul id="prescipcion_receta_ver"></ul>
                        </div>
                        <div class="form-group">
                            <label>Fecha Siguiente Cita:</label>
                            <span id="fecha_sc"></span>
                            <label>Hora: </label>
                            <span id="hora_sc"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div style="float: right;">
                    <!-- <button class="btn btn-lg btn-primary" value="true" onclick="imprimir_receta_ver();">Imprimir</button> -->
                    <button class="btn btn-lg btn-default" value="true" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
      var dtr=$("#table-recetas-medicas").DataTable(
             {
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "No se encontraron resultados en su busqueda",
                "searchPlaceholder": "Buscar registros",
                "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
                "infoEmpty": "No existen registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "order": [[ 0, "desc" ]]
        });
        
    });
</script>

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
                $('#dp_fecha_cit').val(dateText);
                  
              }
            });
          </script>

<!--Controla selects y cambios de especialidad - medico -->
<script>
    var configImpresionReceta = {
        orientacion : 'landscape',
        font : 'helvetica',
        fontSize : 10,
        color : 0,
        primeraCara : {
            paciente : {
                x : 50,
                y : 25
            },
            edad : {
                x : 45,
                y : 30
            },
            fecha : {
                x : 100,
                y : 30,
                separacion : 7 //separacion horizontal
            },
            receta : {
                x : 40,
                y : 65,
                separacion : 5 //separacion vertical por ser una lista
            },
            proximacitafecha : {
                x : 80,
                y : 180,
                separacion : 5 //separacion horizontal
            },
            proximacitahora : {
                x : 110,
                y : 180,
                separacion : 5 //separacion horizontal
            }
        },
        segundaCara : {
            paciente : {
                x : 200,
                y : 25
            },
            edad : {
                x : 195,
                y : 30
            },
            fecha : {
                x : 250,
                y : 30,
                separacion : 7 //separacion horizontal
            },
            prescripcion : {
                x : 190,
                y : 75,
                separacion : 5 //separacion vertical por ser una lista
            }
        }
    }

    var recetaSelected = {};

    $('#nueva_receta_btn').on('click', '', function() {
        clearFormReceta();
        fillFormReceta();
    });
    function fillFormReceta(){
        var fecha  = $('#fecha_receta').val();
        $("#fecha_receta_form").val(fecha);
        get_pacientes_autocomplete();;
    }
    function clearFormReceta(){
        $("#paciente_receta_form").val('');
        $("#edad_receta_form").val('');
        $("#receta_receta_form").val('');
        $("#prescripcion_receta_form").val('');
        $("#fecha_receta_form").val('');
        $("#fecha_sgt_cita_form").val('');
    }
    function imprimir_receta(){
        var fecha = $("#fecha_receta_form").val();
        var auxF = fecha.split('-');
        var fecha_proxima_cita = $("#fecha_sgt_cita_form").val();
        var auxFPC = fecha.split('-')
        var datos = {
            'fecha' : auxF[2]+'/'+auxF[1]+'/'+auxF[0],
            'medico' : $( "select[name=medico] option:selected" ).text(),
            'paciente' : $("#paciente_receta_form").val(),
            'edad' : $("#edad_receta_form").val(),
            'receta' : $("#receta_receta_form").val().split("\n"),
            'prescripcion' : $("#prescripcion_receta_form").val().split("\n"),
            'fecha_sgt_cita' : auxFPC[2]+'/'+auxFPC[1]+'/'+auxFPC[0],
            'hora_sgt_cita' : $("#hora_sgt_cita_form").val()
        }
        imprimir_pdf(datos);
    }
    function imprimir_pdf(datos){
        //var doc = new jsPDF()
        var doc = new jsPDF({
          orientation: configImpresionReceta.orientacion
        })
        doc.setTextColor(configImpresionReceta.color);
        doc.setFontSize(configImpresionReceta.fontSize);
        doc.setFont(configImpresionReceta.font);
        //primera cara
        doc.text(datos.paciente.toUpperCase(),configImpresionReceta.primeraCara.paciente.x,configImpresionReceta.primeraCara.paciente.y); //paciente
        doc.text(datos.edad,configImpresionReceta.primeraCara.edad.x,configImpresionReceta.primeraCara.edad.y);//edad
        datos.fecha.split('/').forEach(function(campo,i){ //fecha
            doc.text(campo,configImpresionReceta.primeraCara.fecha.x + (i*configImpresionReceta.primeraCara.fecha.separacion),configImpresionReceta.primeraCara.fecha.y)
        })
        datos.receta.forEach(function(row,i){ //receta items
            doc.text(row.toUpperCase(),configImpresionReceta.primeraCara.receta.x,configImpresionReceta.primeraCara.receta.y + (i*configImpresionReceta.primeraCara.receta.separacion));
        });
        datos.fecha_sgt_cita.split('/').forEach(function(campo,i){ //fecha proxima cita
            doc.text(campo,configImpresionReceta.primeraCara.proximacitafecha.x + (i*configImpresionReceta.primeraCara.proximacitafecha.separacion),configImpresionReceta.primeraCara.proximacitafecha.y);
        });
        datos.hora_sgt_cita.split(':').forEach(function(campo,i){ //hora proxima cita
            doc.text(campo,configImpresionReceta.primeraCara.proximacitahora.x +(i*configImpresionReceta.primeraCara.proximacitahora.separacion),configImpresionReceta.primeraCara.proximacitahora.y);
        });
        //segunda cara
        doc.text(datos.paciente.toUpperCase(),configImpresionReceta.segundaCara.paciente.x,configImpresionReceta.segundaCara.paciente.y); //paciente
        doc.text(datos.edad,configImpresionReceta.segundaCara.edad.x,configImpresionReceta.segundaCara.edad.y);//edad
        datos.fecha.split('/').forEach(function(campo,i){ //fecha
            doc.text(campo,configImpresionReceta.segundaCara.fecha.x + (i*configImpresionReceta.segundaCara.fecha.separacion),configImpresionReceta.segundaCara.fecha.y)
        })
        datos.prescripcion.forEach(function(row,i){ //receta items
            doc.text(row.toUpperCase(),configImpresionReceta.segundaCara.prescripcion.x,configImpresionReceta.segundaCara.prescripcion.y + (i*configImpresionReceta.segundaCara.prescripcion.separacion));
        });
        
        imprimir(doc);
    }
    function imprimir(doc){
        var blob = doc.output('blob');
        const blobUrl = URL.createObjectURL(blob);
        const iframe = document.createElement('iframe');
        iframe.style.display = 'none';
        iframe.src = blobUrl;
        document.body.appendChild(iframe);
        iframe.contentWindow.print();
    }

    function get_pacientes_autocomplete(){
        $.ajax({
            url: base_url + 'usuario/get_paciente_autocomplete',
            type: 'post',
            success: function(resultado) {
                var pacientes = $.parseJSON(resultado);
                $("#paciente_receta_form").autocomplete({
                    source: pacientes,
                    select : function(event,ui){
                        get_paciente_byname(ui.item.value);
                    }
                });
            }
        });
    }
    function get_paciente_byname(name){
        $.ajax({
            url: base_url + 'recetas/paciente_by_name',
            type: 'post',
            data : {
                name : name
            },
            success: function(resultado) {
                var paciente = $.parseJSON(resultado);
                $("#edad_receta_form").val(parseInt(paciente['edad_pac']));
            }
        });
    }

    function grabar_receta(){
        var datos = {
            'fecha' : $("#fecha_receta_form").val(),
            'medico' : $( "select[name=medico] option:selected" ).val(),
            'paciente' : $("#paciente_receta_form").val(),
            'edad' : $("#edad_receta_form").val(),
            'receta' : $("#receta_receta_form").val().split("\n"),
            'prescripcion' : $("#prescripcion_receta_form").val().split("\n"),
            'fecha_sgt_cita' : $("#fecha_sgt_cita_form").val(),
            'hora_sgt_cita' : $("#hora_sgt_cita_form").val()
        };

        if(!form_validacion(datos))
            return;

        $.ajax({
            url: base_url + 'recetas/grabar',
            type: 'post',
            data : datos,
            success: function(resultado) {
                location.reload();
            }
        });
    }

    function form_validacion(datos){

        return true;
    }

    function clearVerReceta(){
        $("#verRecetaTitle").text("");
        $("#fecha_receta_ver").text("");
        $("#medico_receta_ver").text("");
        $("#paciente_receta_ver").text("");
        $("#edad_receta_ver").text("");
        $("#fechas_receta_ver").text("");
        $("#fecha_sc").text("");
        $("#hora_sc").text("");
        $("#receta_receta_ver").html("");
        $("#prescipcion_receta_ver").html("");
    }

    function fillVerReceta(){
        $("#verRecetaTitle").text("Receta : "+recetaSelected["id"]);
        $("#fecha_receta_ver").text(moment(recetaSelected["fecha"]).format('DD/MM/YYYY'));
        $("#medico_receta_ver").text(recetaSelected["txt_med"]);
        $("#paciente_receta_ver").text(recetaSelected["txt_pac"]);
        $("#edad_receta_ver").text(recetaSelected["edad_pac"]);
        $("#fecha_sc").text(moment(recetaSelected["fecha_sc"]).format('DD/MM/YYYY'));
        $("#hora_sc").text(moment(recetaSelected["fecha_sc"]).format('HH:mm A'));
    
        var rct = JSON.parse(recetaSelected.receta);
        var pcn = JSON.parse(recetaSelected.prescripcion);
    
        var rcthtml = '';
        rct.forEach(function(item){
            rcthtml += '<li>'+item+'</li>';
        });
        $("#receta_receta_ver").html(rcthtml);

        var pcnhtml='';
        pcn.forEach(function(item){
            pcnhtml += '<li>'+item+'</li>';
        });
        $("#prescipcion_receta_ver").html(pcnhtml);

    }


    function get_receta_byId(idreceta){
        $.ajax({
           url: base_url + 'recetas/receta_byId',
            type: 'post',
            data : {
                idreceta : idreceta
            },
            success: function(resultado) {
                var receta = $.parseJSON(resultado);
                recetaSelected = receta;
                clearVerReceta();
                fillVerReceta();
                $("#ModalVerReceta").modal("show");
            } 
        })
    }

    $('#table-recetas-medicas').on('click', 'tbody tr', function() {
        var idreceta = $(this).find("td").eq(0).html();
        get_receta_byId(idreceta);
    });


    function imprimir_receta_ver(){
        var datos = {
            'fecha' : moment(recetaSelected["fecha"]).format('DD/MM/YYYY'),
            'medico' : recetaSelected["txt_med"],
            'paciente' : recetaSelected["txt_pac"],
            'edad' : recetaSelected["edad_pac"],
            'receta' : JSON.parse(recetaSelected.receta),
            'prescripcion' : JSON.parse(recetaSelected.prescripcion),
            'fecha_sgt_cita' : moment(recetaSelected["fecha_sc"]).format('DD/MM/YYYY'),
            'hora_sgt_cita' : moment(recetaSelected["fecha_sc"]).format('HH:mm')
        }
        imprimir_pdf(datos);
    }


</script>

<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>