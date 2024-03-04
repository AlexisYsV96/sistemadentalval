<style type="text/css">
    .messages{
        float: left;
        font-family: sans-serif;
        display: none;
        width: 100%;
        padding: 5px;
    }
    .info{
        padding: 10px;
        border-radius: 10px;
        background: orange;
        color: #fff;
        font-size: 14px;
        text-align: center;
    }
    .before{
        padding: 10px;
        border-radius: 10px;
        background: blue;
        color: #fff;
        font-size: 18px;
        text-align: center;
    }
    .success{
        padding: 10px;
        border-radius: 10px;
        background: green;
        color: #fff;
        font-size: 18px;
        text-align: center;
    }
    .error{
        padding: 10px;
        border-radius: 10px;
        background: red;
        color: #fff;
        font-size: 18px;
        text-align: center;
    }
    .showImage img{
        width: 500px;
    }
</style>
<div class="table-responsive" >
    <table id="table-search-paciente-placa" class="table table-bordered">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre de archivo</th>
            </tr>
        </thead>
        <tbody>
        <?php if (isset($resultado)){?>
            <?php foreach ($resultado as $row) { ?>
                <tr style="background-color: none;">
                    <td><?= $row->ID ?></td>
                    <td><?= $row->NombreArchivo ?></td>
                </tr>
            <?php }} ?>
        </tbody>
    </table>
</div>
<div class="col-md-12" style="text-align:center; overflow: hidden">
            <div id="dMensaje" class="messages"></div>
            </div>
            <!--div para visualizar en el caso de imagen-->
            <div class="col-md-12" style="text-align:center; overflow: hidden">
    <div class="showImage" style="display:none"></div>
    </div>
<script>

    $(document).ready(function() {

        $("#table-search-paciente-placa").DataTable(
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

        var codi_pac = -1;

        $("#table-search-paciente-placa_paginate").on('click', function() {
            $('#table-search-paciente-placa tbody tr').css('background-color', '#FFF');
            $('#table-search-paciente-placa tbody tr').css('color', '#000');
            if (codi_pac != -1) {
                var sw = false;
                $('#table-search-paciente-placa tbody tr').each(function() {
                    if ($(this).find('td').eq(0).html() == codi_pac) {
                        sw = true;
                        $(this).css('background-color', '#bce8f1');
                        $(this).css('color', '#31708f');
                    }
                });
                if (!sw) {
                    $('#btnEditarModalPaciente').prop("disabled", true);
                    $('#btnDeshabilitarPaciente').prop("disabled", true);
                } else {
                    $('#btnEditarModalPaciente').prop("disabled", false);
                    $('#btnDeshabilitarPaciente').prop("disabled", false);
                }
            } else {
                $('#btnEditarModalPaciente').prop("disabled", true);
                $('#btnDeshabilitarPaciente').prop("disabled", true);
            }
        });

        $("#table-search-paciente-placa_filter input").blur(function() {
            $('#table-search-paciente-placa tbody tr').css('background-color', '#FFF');
            $('#table-search-paciente-placa tbody tr').css('color', '#000');
            if (codi_pac != -1) {
                var sw = false;
                $('#table-search-paciente-placa tbody tr').each(function() {
                    if ($(this).find('td').eq(0).html() == codi_pac) {
                        sw = true;
                        $(this).css('background-color', '#bce8f1');
                        $(this).css('color', '#31708f');
                    }
                });
                if (!sw) {
                    $('#btnEditarModalPaciente').prop("disabled", true);
                    $('#btnDeshabilitarPaciente').prop("disabled", true);
                } else {
                    $('#btnEditarModalPaciente').prop("disabled", false);
                    $('#btnDeshabilitarPaciente').prop("disabled", false);
                }
            } else {
                $('#btnEditarModalPaciente').prop("disabled", true);
                $('#btnDeshabilitarPaciente').prop("disabled", true);
            }
        });

        $('#table-search-paciente-placa').on('click', 'tbody tr', function() {

            var tr_select = $(this);

            if ((tr_select.css("background-color") == "rgb(255, 255, 255)") || (tr_select.css("background-color") == "rgba(0, 0, 0, 0)")) {
                $('#table-search-paciente-placa').dataTable().$('tr.selected').removeClass('selected');
$(this).addClass('selected');
                $('#table-search-paciente-placa tbody tr').css('background-color', '#FFF');
                $('#table-search-paciente-placa tbody tr').css('color', '#000');
                tr_select.css('background-color', '#bce8f1');
                tr_select.css('color', '#31708f');
                codi_pac = tr_select.find("td").eq(0).html();

                $('#btnEditarModalPaciente').prop("disabled", false);
                $('#btnDeshabilitarPaciente').prop("disabled", false);

            } else if (tr_select.css("background-color") == 'rgb(188, 232, 241)') {
$(this).removeClass('selected');
                $('#table-search-paciente-placa tbody tr').css('background-color', '#FFF');
                $('#table-search-paciente-placa tbody tr').css('color', '#000');
                codi_pac = -1;

                $('#btnEditarModalPaciente').prop("disabled", true);
                $('#btnDeshabilitarPaciente').prop("disabled", true);
            }

        });
    });
</script>
<script>

    
</script>