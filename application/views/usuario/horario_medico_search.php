<div class="table-responsive">
    <table id="table-search-horario-medico" class="table table-bordered">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Médico</th>
                <th>Libre</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultado as $row) { ?>
                <tr style="background-color: none;">
                    <td><?= $row->codi_homed ?></td>
                    <td><?= $row->fech_homed ?></td>
                    <td><?= $row->hora_homed ?></td>
                    <td><?= $row->apel_med . ', ' . $row->nomb_med ?></td>
                    <td><?= $row->libre ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
$(document).ready(function() {

    $("#table-search-horario-medico").DataTable(
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
            },
        }
    });

    var codi_homed = -1;

    $("#table-search-horario-medico_paginate").on('click', function() {
        $('#table-search-horario-medico tbody tr').css('background-color', '#FFF');
        $('#table-search-horario-medico tbody tr').css('color', '#000');
        if (codi_homed != -1) {
            var sw = false;
            $('#table-search-horario-medico tbody tr').each(function() {
                if ($(this).find('td').eq(0).html() == codi_med) {
                    sw = true;
                    $(this).css('background-color', '#bce8f1');
                    $(this).css('color', '#31708f');
                }
            });
            if (!sw) {
                $('#btnEditarModalHorarioMedico').prop("disabled", true);
                $('#btnDeshabilitarHorarioMedico').prop("disabled", true);
            } else {
                $('#btnEditarModalHorarioMedico').prop("disabled", false);
                $('#btnDeshabilitarHorarioMedico').prop("disabled", false);
            }
        } else {
            $('#btnEditarModalHorarioMedico').prop("disabled", true);
            $('#btnDeshabilitarHorarioMedico').prop("disabled", true);
        }
    });

    $("#table-search-horario-medico_filter input").blur(function() {
        $('#table-search-horario-medico tbody tr').css('background-color', '#FFF');
        $('#table-search-horario-medico tbody tr').css('color', '#000');
        if (codi_homed != -1) {
            var sw = false;
            $('#table-search-horario-medico tbody tr').each(function() {
                if ($(this).find('td').eq(0).html() == codi_med) {
                    sw = true;
                    $(this).css('background-color', '#bce8f1');
                    $(this).css('color', '#31708f');
                }
            });
            if (!sw) {
                $('#btnEditarModalHorarioMedico').prop("disabled", true);
                $('#btnDeshabilitarHorarioMedico').prop("disabled", true);
            } else {
                $('#btnEditarModalHorarioMedico').prop("disabled", false);
                $('#btnDeshabilitarHorarioMedico').prop("disabled", false);
            }
        } else {
            $('#btnEditarModalHorarioMedico').prop("disabled", true);
            $('#btnDeshabilitarHorarioMedico').prop("disabled", true);
        }
    });

    $('#table-search-horario-medico').on('click', 'tbody tr', function() {

        var tr_select = $(this);

        if ((tr_select.css("background-color") == "rgb(255, 255, 255)") || (tr_select.css("background-color") == "rgba(0, 0, 0, 0)")) {

            $('#table-search-horario-medico tbody tr').css('background-color', '#FFF');
            $('#table-search-horario-medico tbody tr').css('color', '#000');
            tr_select.css('background-color', '#bce8f1');
            tr_select.css('color', '#31708f');
            codi_homed = tr_select.find("td").eq(0).html();

            $('#btnEditarModalHorarioMedico').prop("disabled", false);
            $('#btnDeshabilitarHorarioMedico').prop("disabled", false);

        } else if (tr_select.css("background-color") == 'rgb(188, 232, 241)') {

            $('#table-search-horario-medico tbody tr').css('background-color', '#FFF');
            $('#table-search-horario-medico tbody tr').css('color', '#000');
            codi_homed = -1;

            $('#btnEditarModalHorarioMedico').prop("disabled", true);
            $('#btnDeshabilitarHorarioMedico').prop("disabled", true);
        }

    });
    $('#btnEditarModalHorarioMedico').click(function() {
        $.ajax({
            data: {'codi_homed': codi_homed},
            url: base_url + 'usuario/get_horario_medico',
            type: 'post',
            success: function(resultado) {
                var horario_medico = $.parseJSON(resultado);

                fech_homed = horario_medico[0]['fech_homed'];
                hora_homed = horario_medico[0]['hora_homed'];
                codi_med = horario_medico[0]['codi_med'];

                $('input[name="codigo"]').val(codi_homed);                
                $("#fecha_horario_med").val(fech_homed);
                $("#hora_horario_med").val(hora_homed);
                $('select[name="medico"]').val(codi_med);

                $("#panel-horario-medico").removeClass("panel-success");
                $("#panel-horario-medico").addClass("panel-primary");
                $("#panel-horario-medico").find(".panel-heading h3").html("Editar Horario de Médico");


                $('input[name="registrar_horario_medico"]').css("display", "none");
                $('button[name="buscar_horario_medico"]').css("display", "none");
                $('input[name="limpiar_horario_medico"]').css("display", "none");
                $('input[name="editar_horario_medico"]').css("display", "inherit");
                $('button[name="cancelar_horario_medico"]').css("display", "inherit");

                $("#btnCancelarModalHorarioMedico").click();
            }
        });
    });

    $("#deshabilitarHorarioMedico").click(function() {
        $.ajax({
            data: {'codi_homed': codi_homed},
            url: base_url + 'usuario/deshabilitar_horario_medico',
            type: 'post',
            success: function(e) {
                $(location).attr('href', base_url + "horario_medico");
            }
        });
    });
});
</script>
