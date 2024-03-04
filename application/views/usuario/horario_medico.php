<div>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb" style="margin-top: 2%;">
                <li><a href="<?= base_url() ?>">Inicio</a>
                </li>
                <li class="active">Registro de Horario de Médicos</li>
            </ol>
        </div>
    </div>
</div>

<div class="row" style="margin-top: 2%">
    <div class="col-md-5 col-md-offset-4">
        <div id="panel-horario-medico" class="login-panel panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Registro de Horario de Médicos</h3>
            </div>
            <div class="panel-body">
                <?= form_open(base_url() . 'horario_medico', $form) ?>
                <fieldset>
                    <?php if ($this->session->userdata('error_horario_medico_1') && $this->session->userdata('error_horario_medico_1') != "") { ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?= $this->session->userdata('error_horario_medico_1') ?>
                        </div>
                        <?php
                        $this->session->unset_userdata('error_horario_medico_1');
                    }
                    ?>
                    <?= form_hidden('codigo', '') ?>
                    <div class="form-group">
                        <label>Fecha: *</label>
                        <?= form_input($fecha) ?>
                    </div>
                    <div class="form-group">
                        <label>Hora: *</label>
                        <?= form_input($hora) ?>
                    </div>
                    <div class="form-group">
                        <label>Médico: *</label>
                        <?= form_dropdown('medico', $medicos, array(), 'class="form-control" required') ?>                        
                    </div>
                    <p class="text-muted" style="font-style: italic;">(*) Los campos con asterisco son obligatorios.</p>
                    <hr>
                    <?= form_submit($registrar_horario_medico) ?>
                    <?= form_submit($editar_horario_medico) ?>
                    <?= form_button($cancelar_horario_medico) ?>
                    <?= form_button($buscar_horario_medico) ?>
                    <?= form_reset($limpiar_horario_medico) ?>
                </fieldset>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalHorarioMedico" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Buscar Horario de Médico</h4>
            </div>
            <div class="modal-body">
                <div id="ResultadoHorarioMedico">
                </div>
            </div>
            <div class="modal-footer">
                <div style="float: right;">
                    <button id="btnCancelarModalHorarioMedico" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button id="btnEditarModalHorarioMedico" type="button" class="btn btn-primary" disabled>Editar</button>
                    <button id="btnDeshabilitarHorarioMedico" type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalDeshabilitar" disabled>Deshabilitar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalDeshabilitar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; top: 25%;">
    <div class="modal-dialog" style="width: 350px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel" style="text-align: center;">¿Estás seguro de que desea deshabilitar?</h4>
            </div>
            <div class="modal-footer" style="margin: 0px; border: 0px; padding: 0px;">
                <div style="text-align: center">
                    <button type="button" class="btn btn-default" data-dismiss="modal" 
                            style="padding-top: 20px; padding-bottom: 20px; width: 49%; float: left; margin:0px; border: none; border-radius: 0px;">No</button>
                    <button id="deshabilitarHorarioMedico" type="button" class="btn btn-danger" style="padding-top: 20px; padding-bottom: 20px; width: 49%; float: right; margin:0px; border: none; border-radius: 0px;">Si</button>
                </div>
            </div>
        </div>
    </div>
</div>