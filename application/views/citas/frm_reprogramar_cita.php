<?= form_open(base_url() . 'citas/reprogramar', $form) ?>
<fieldset>
    <div class="modal-body">
        <div class="row" style="margin-top: 2%">
            <div style="margin: 20px;">
                <div id="panel-reprogramar-cita" class="login-panel panel panel-primary">
                    <div class="panel-body">
                        <input type="hidden" name="cita" value="<?=$cita->codi_cit ?>">
                        <input type="hidden" name="horario_antiguo" value="<?=$cita->codi_homed?>">
                        <div class="form-group">
                            <label>Médico: </label>
                            <?= form_dropdown('medico', $medicos, array(), 'class="form-control"') ?>
                        </div>
                        <div class="form-group">
                            <label>Horarios Disponibles: </label>
                            <?= form_dropdown('horario_nuevo', array(), array(), 'class="form-control" required') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <div style="float: right;">
            <?= form_button($cancelar_reprogramar_cita) ?>
            <?= form_submit($registrar_reprogramar_cita) ?>
        </div>
    </div>
</fieldset>
<?= form_close() ?>
<script>
    $(document).ready(function() {
        $("select[name='medico']").change(function (e) { 
            e.preventDefault();
            $.ajax({
                url: base_url + 'usuario/get_horario_medico',
                data: {'codi_med': $(this).val(), 'libre': 'S'},
                type: 'post',
                success: function(resultado) {
                    var horarios = $.parseJSON(resultado);
                    $("select[name='horario_nuevo']").append($('<option>').val("").text("Seleccione una opción"));
                    $("select[name='horario_nuevo']").find('option:not(:first)').remove();
                    for (const i in horarios) {
                        $("select[name='horario_nuevo']").append($('<option>').val(horarios[i].codi_homed).text(horarios[i].fech_homed + " " + horarios[i].hora_homed))
                    }
                }
            });
        });
    });
</script>