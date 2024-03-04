<div>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb" style="margin-top: 2%;">
                <li><a href="<?= base_url() ?>">Inicio</a>
                </li>
                <li class="active">Tipo Inventario</li>
            </ol>
        </div>
    </div>
    
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                Categoria
                <small>Nuevo</small>
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">


                                <a href="<?php echo base_url();?>tipo_inventario/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span>
                                Agregar Categorias</a>
                            </div>
                        </div>

                         <!-- tablas -->
                         <hr>
                         <div class="row">
                             <div class="col-md-12">
                                <?php if($this->session->flashdata("error")):?>
                                <div class="alert alert-danger alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error");?></p>  
                                </div>
                            <?php endif;?>
                                <form action="<?php echo base_url();?>tipo_inventario/update" method="POST">
                                  <input type="hidden" value="<?php echo $tipo_inventario->cod_tipo_inventario;?>" name="cod_tipo_inventario">
                                     <DIV class="form-group">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $tipo_inventario->nombre?>">
                                    </DIV>
                                     <DIV class="form-group">
                                        <label for="descripcion">Descripcion:</label>
                                        <input type="text" class="form-control" id="nombre" name="descripcion" value="<?php echo $tipo_inventario->descripcion?>">
                                    </DIV>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                        
                                    </div>
                                
                                 </form>
                             </div>
                         </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
