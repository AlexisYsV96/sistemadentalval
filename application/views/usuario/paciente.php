<div>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb" style="margin-top: 2%;">
                <li><a href="<?= base_url() ?>">Inicio</a>
                </li>
                <li class="active">Registro de paciente</li>
            </ol>
        </div>
    </div>
</div>

<div class="row" style="margin-top: 2%">
    <div class="col-md-12">
        <div id="panel-paciente" class="login-panel panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Registro de paciente</h3>
            </div>
            <div class="panel-body">
                <?= form_open(base_url() . 'paciente', $form) ?>
                <div class="col-md-6">
                    <fieldset>
                        <?php if ($this->session->userdata('error_paciente_1') && $this->session->userdata('error_paciente_1') != "") { ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?= $this->session->userdata('error_paciente_1') ?>
                        </div>
                        <?php
                            $this->session->unset_userdata('error_paciente_1');
                        }
                        ?>
                        <div id="error_nomb_apel_1_pac" class="alert alert-warning alert-dismissable" style="display: none;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Alerta: </strong>El nombre y apellido ingresados ya se encuentra registrado
                        </div>
                        <div class="form-group">
                            <label>Nº.H.C: </label>
                            <?php if (!empty($codigo_paciente)) : ?>
                                <?php foreach ($codigo_paciente as $codigo_pacientes) : ?>
                                    <?php echo $codigo_pacientes->codi_pac; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <br>
                        </div>
                        <?= form_hidden('codigo', '') ?>
                        <label>
                            <H3> I. Datos Filiación</H3>
                        </label>
                        <div class="form-group">
                            <label>Nombres: *</label>
                            <?= form_input($nombres) ?>
                        </div>
                        <div class="form-group">
                            <label>Apellidos: *</label>
                            <?= form_input($apellidos) ?>
                        </div>
                        <div class="form-group">
                            <label>Edad (años): *</label>
                            <?= form_input($edad) ?>
                        </div>

                        <div class="form-group">
                            <label>Documento nacional de identidad (D.N.I.): *</label>
                            <?= form_input($dni) ?>
                            <label class="text-danger" id="error_dni_paciente" style="display: none;">&nbsp;Carácter no válido</label>
                            <label class="text-danger" id="error_dni_pac_1" style="display: none;">&nbsp;Ya se encuentra asociado a otro paciente</label>
                        </div>
                        <div class="form-group">
                            <label>Número de teléfono: *</label>
                            <?= form_input($telefono) ?>
                            <label class="text-danger" id="error_telf_paciente" style="display: none;">&nbsp;Carácter no válido</label>
                        </div>
                        <div class="form-group">
                            <label>Dirección:</label>
                            <?= form_input($direccion) ?>
                        </div>
                        <label>Fecha de nacimiento: *</label>
                        <div class="date form-group input-group" id="dp_fecha_pac" data-date="1970-01-01" data-date-format="yyyy-mm-dd" style="width: 170px;">

                            <?= form_input($fecha) ?>
                            <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span>
                        </div>
                        <div class="form-group">
                            <label>Lugar de nacimiento:</label><br>
                            <?= form_input($lugarnacimiento) ?>
                        </div>
                        <!--<div class="form-group">
                            <label>Ocupación:</label><br>
                            <?= form_input($ocupacion) ?>
                        </div>-->
                        <div class="form-group">
                            <label>Sexo: *</label><br>
                            <label class="radio-inline">
                                <?= form_radio($masculino) ?> Masculino
                            </label>
                            <label class="radio-inline">
                                <?= form_radio($femenino) ?> Femenino
                            </label>
                        </div>
                        <!--<div class="form-group">
                            <label>Estado civil: *</label><br>
                            <label class="radio-inline">
                                <?= form_radio($soltero) ?> Soltero
                            </label>
                            <label class="radio-inline">
                                <?= form_radio($casado) ?> Casado
                            </label>
                            <label class="radio-inline">
                                <?= form_radio($divorciado) ?> Divorciado
                            </label>
                        </div>-->
                        <div class="form-group">
                            <label>E-mail:</label>
                            <?= form_input($email) ?>
                            <label class="text-danger" id="error_email_pac_1" style="display: none;">&nbsp;Formato de email no válido</label>
                            <label class="text-danger" id="error_email_pac_2" style="display: none;">&nbsp;Ya se encuentra asociado a otro paciente</label>
                        </div>
                        <!--<div class="form-group">
                            <label>Cómo se enteró de la clínica</label><br>
                            <?= form_input($informacion_clinica) ?>
                        </div>
                        <div class="form-group">
                            <label>Afiliación de seguro: *</label><br>
                            <label class="radio-inline">
                                <?= form_radio($afiliacion_eps) ?> EPS
                            </label>
                            <label class="radio-inline">
                                <?= form_radio($afiliacion_particular) ?> Particular
                            </label>
                        </div>-->
                        <!--<div class="form-group">
                            <label>Afiliación de seguro:</label>
                        </div>-->
                        <p class="text-muted" style="font-style: italic;">(*) Los campos con asterisco son obligatorios.</p>
                        <hr>
                        <?= form_submit($registrar_paciente) ?>
                        <?= form_submit($editar_paciente) ?>
                        <input type="button" id="bPlaca" name="agregar_placa" style="display:none" class="btn btn-lg btn-success btn-block" data-toggle="modal" data-target="#ModalPacientePlaca" value="Historial de placas">
                        <?= form_button($cancelar_paciente) ?>
                        <?= form_button($buscar_paciente) ?>
                        <?= form_reset($limpiar_paciente) ?>
                    </fieldset>
                </div>
                <div class="col-md-6">
                    <label>
                        <H3> II. Enfermedad Actual</H3>
                    </label>
                    <div class="form-group">
                        <label>Motivo consulta</label><br>
                        <?= form_input($motivoconsulta) ?>
                    </div>
                    <div class="form-group">

                        <label>Tiempo de Enfermedad:</label>
                        <?= form_input($enfermedad) ?>
                    </div>

                    <div class="form-group">
                        <label>Signos - sintomas principales</label><br>
                        <?= form_input($signos) ?>
                    </div>

                    <label>
                        <H3> III. Antecedentes</H3>
                    </label>

                    <div class="form-group">
                        <label>Alergia:</label>
                        <textarea class="form-control" rows="2" placeholder="Escriba su alergia" required="Ingresar contenido" <?= form_input($alergia) ?> </textarea> 
                    </div> 
                    <div class="form-group">
                        <label>Antecedentes personales</label><br>
                        <textarea  class="form-control" rows="2" placeholder=" Escriba.."  required="Ingresar contenido" <?= form_input($antec_pac) ?>   </textarea>
                    </div>
                    <div class="form-group">
                        <label>Titular del paciente:</label>
                        <?= form_input($titular) ?>
                    </div>

                    <label>
                        <H3> IV. Exploración Fisica</H3>
                    </label>

                    <div class="form-group">
                        <label>P.A</label><br>
                        <?= form_input($presion_pac) ?>
                    </div>
                    <div class="form-group">
                        <label>Pulso</label><br>
                        <?= form_input($pulso) ?>
                    </div>
                    <div class="form-group">
                        <label>Temp</label><br>
                        <?= form_input($temperatura) ?>
                    </div>
                    <div class="form-group">
                        <label>F.C</label><br>
                        <?= form_input($frecuencia) ?>
                    </div>
                    <div class="form-group">
                        <label>Frec. resp</label><br>
                        <?= form_input($frecuenciarespiratoria) ?>
                    </div>
                    <div class="form-group">
                        <label>Examen clinico general :</label><br>
                        <textarea class="form-control" rows="4" placeholder="Escriba su alergia" required="Ingresar contenido" <?= form_input($examenclinico) ?> </textarea> </div> <div class="form-group">
                        <label>Examen complementario :</label><br>
                        <textarea  class="form-control" rows="4" placeholder="Escriba su alergia"  required="Ingresar contenido"  <?= form_input($examencomplementario) ?>   </textarea>

                    </div>
                    <div class="form-group">
                        <label>Odontoestomatológico :</label><br>
                        <textarea class="form-control" rows="4" placeholder="Escriba su alergia" required="Ingresar contenido" <?= form_input($odontoestomalogico) ?> </textarea> </div> <div class="form-group">
                        <label>Diagnostico :</label><br>
                         <textarea  class="form-control" rows="7" placeholder="Escriba su mensaje"  required="Ingresar contenido"   <?= form_input($diagnostico) ?> </textarea>

                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalPaciente" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Buscar paciente</h4>
            </div>
            <div class="modal-body">
                <div id="ResultadoPaciente">
                </div>
            </div>
            <div class="modal-footer">
                <div style="float: right;">
                    <button id="btnCancelarModalPaciente" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button id="btnEditarModalPaciente" type="button" class="btn btn-primary" disabled>Editar</button>
                    <button id="btnDeshabilitarPaciente" type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalDeshabilitar" disabled>Deshabilitar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalPacientePlaca" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Historial de placas</h4>
            </div>
            <div class="modal-body" style="overflow: auto;">
                <div id="ResultadoPacientePlaca">
                </div>

            </div>
            <div class="modal-footer">

                <div class="col-md-12">
                    <input name="archivo" type="file" id="imagen" style="display: none" />
                    <img id="iCargarImagen" src="resources/images/upload.png" width="50px" />
                    <button id="bAgregarPlaca" type="button" class="btn btn-primary">Agregar</button>
                    <button id="bVerPlaca" type="button" class="btn btn-success">Ver placa</button>
                    <button id="bInactivarPlacaPaciente" type="button" class="btn btn-danger">Deshabilitar</button>
                    <button id="bCancelar" data-dismiss="modal" type="button" class="btn btn-default">Cancelar</button>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="padding-top: 20px; padding-bottom: 20px; width: 49%; float: left; margin:0px; border: none; border-radius: 0px;">No</button>
                    <button id="deshabilitarPaciente" type="button" class="btn btn-danger" style="padding-top: 20px; padding-bottom: 20px; width: 49%; float: right; margin:0px; border: none; border-radius: 0px;">Si</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="dModalVerPlaca" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <button id="bCerrarPlaca" class="btn btn-danger">Cerrar placa</button>
            </div>
            <div class="modal-body">
                <img id="iPlaca" src="" style="width:100%" />
            </div>
            <div class="modal-footer" style="margin: 0px; border: 0px; padding: 0px;">
                <div style="text-align: center">
                    Estás visualizando la placa del paciente
                </div>
            </div>
        </div>
    </div>
</div>