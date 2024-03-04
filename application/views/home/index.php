<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Bienvenido a <?= $clinica['nomb_clin'] ?>
        </h1>
    </div>
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4><i class="fa fa-calendar"></i> Citas Registradas</h4>
            </div>
            <div class="panel-body">
                <h2><?= $cant_cita_med ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4><i class="fa fa-clock-o"></i> Citas En Espera</h4>
            </div>
            <div class="panel-body">
                <h2><?= $cant_cita_med_act ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4><i class="fa fa-check-circle"></i> Citas Atendidas</h4>
            </div>
            <div class="panel-body">
                <h2><?= $cant_cita_med_ter ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h4><i class="fa fa-info-circle" aria-hidden="true"></i> Citas Reprogramadas</h4>
            </div>
            <div class="panel-body">                
                <h2><?= $cant_cita_med_repro ?></h2>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12">
        <div class="chart-container"  style="height: 400px;">
            <canvas id="bar-chart"></canvas>
        </div>
    </div>
</div>
<hr>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-4 text-center"></div>
        <div class="col-md-4 text-center">
            <div class="form-group">
                <label for="meses">Meses:</label>
                <select class="form-control" id="meses">
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
            </div>
        </div>
        <div class="col-md-4 text-center"></div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="chart-container"  style="height: 400px;">
            <canvas id="donut-chart"></canvas>
        </div>
    </div>
</div>
<hr>
<div class="well">
    <div class="row">
        <div class="col-md-8">
            <p>Sistema de gestión y control odontológico online.</p>
        </div>
        <div class="col-md-4">
            <!-- <a class="btn btn-lg btn-default btn-block" href="<?= base_url('login') ?>">Iniciar Sesión</a> -->
        </div>
    </div>
</div>