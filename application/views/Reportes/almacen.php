<!DOCTYPE html>
<html>

<head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



  <title></title>

</head>

<body>
  <div class="content-wrapper">

    
     <div class="col-lg-12 ">
       <ol class="breadcrumb" style="margin-top: 4%;">
               
                
            </ol>
        </div>

        <section class="content">
          <div class="box-body">
            <div class="col-md-12  ">
              <div class="row">
                 <div class="col-md-12 col-md-push-0">
                     <div class="panel panel-primary">
                         <div class="panel-heading text-center" > 
                              <h3>MOVIMIENTOS DE ALMACENES</h3> 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                               <form action="<?php echo current_url();?>" method="POST" class="form-horizontal">
                        <div class="form-group">
                            <label for="" class="col-md-1 control-label">Desde:</label>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="fechainicio" value="<?php echo !empty($fechainicio) ? $fechainicio:'';?>">
                            </div>
                            <label for="" class="col-md-1 control-label">Hasta:</label>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="fechafin" value="<?php  echo !empty($fechafin) ? $fechafin:'';?>">
                            </div>
                            <div class="col-md-4">
                                <input type="submit" name="buscar" value="Buscar" class="btn btn-primary">
                                <a href="<?php echo base_url(); ?>reportes_almacen/index" class="btn btn-danger">Restablecer</a>
                            </div>
                        </div>
                    </form>
                           <!--  <div class="col-md-12 col-md-push-0">
                                 <button  class="btn btn-success" onclick="add_tipo()"><span class="glyphicon glyphicon-plus"></span>  Agregar </button>
                            </div> -->
                        </div>

                         <!-- tablas -->
                         <hr>
                         <div class="row" >
                             <div class="col-md-12 col-md-push-0">
                                <table id="example" class="table table-bordered btn-hover">
                                    <thead>
                                        <tr>
                                             <th>#</th>
                                            <th>Nombre</th>
                                            <th>Producto</th>
                                            <th>Tipo movimiento</th>
                                            <th>P.entrada</th>
                                            <th>P.salida</th>
                                             <th>Unidad</th>
                                              <th>Stock</th>
                                              <th>Fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php if(!empty($inventario)):?>
                                            <?php foreach ($inventario as $inventario):?> 
                                        <tr>
                                              <td><?php echo $inventario->cod_inventario;?></td>
                                            <td><?php echo $inventario->nombre_almacen;?></td>
                                            <td><?php echo $inventario->nombre_producto;?></td>
                                             <td><?php echo $inventario->nombre_inventario;?></td>
                                              <td><?php echo $inventario->precio_entrada;?></td>
                                               <td><?php echo $inventario->precio_salida;?></td>
                                                <td><?php echo $inventario->unidad;?></td>
                                                <td><?php echo $inventario->stock_inventario?></td>
                                                <td><?php echo $inventario->fecha_registro?></td>
                                           
                                        </tr> 
                                        <?php endforeach;?>      
                                     <?php endif;?>
                                    </tbody>

                                </table>
                        </div>

                     </div>
                  </div>
              </div>
              
            </div>
          </div>
        </section>
  </div>








</body>