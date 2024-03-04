<div>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb" style="margin-top: 2%;">
                <li><a href="<?= base_url() ?>">Inicio</a></li>
                <li><a href="<?= base_url('odontograma2') ?>">Paciente</a></li>
                <li class="active"> Odontograma </li>
            </ol>
        </div>
    </div>
</div>

<div id="odontograma_search" class="col-md-10 col-md-offset-1">
    <div id="panel-paciente" class="login-panel panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Buscar paciente</h3>
        </div>
        <div class="panel-body">
            <table id="example1" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Paciente</th>
                        <th>Odontograma</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($pacientes as $row) { ?>

                        <tr>
                            <td style="text-align: center"><?= $row->codi_pac ?></td>
                            <td><?= $row->apel_pac . ', ' . $row->nomb_pac ?> </td>
                            <?php 
                            $cita = $this->mod_cita->get_ultima_cita_terminada($row->codi_pac);
                            if (count($cita) == 1) {
                                $codi_cita = $cita[0]->codi_cit;?>
                                <td style="text-align: center;"><a href="<?= base_url('odontograma2/odontograma_view/' . $row->codi_pac . '/'.$codi_cita) ?>"><button id="btn_ov_<?= $row->codi_pac ?>" type="button" class="btn btn-info" >Ver Odontograma</button></a></td>
                            <?php
                            }else{?>
                                <td style="text-align: center;"></td>
                            <?php
                            } 
                            ?>
                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row" style="margin-top: 2%">
    <div id="odontograma_view">

    </div>
</div>