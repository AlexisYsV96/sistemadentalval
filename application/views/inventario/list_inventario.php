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
            <div class="col-md-12">
              <div class="row">
                 <div class="col-md-12 col-md-push-0">
                     <div class="panel panel-primary">
                         <div class="panel-heading text-center" > 
                              <h3>LISTADO DE ALMACENES</h3> 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <div class="col-md-12 col-md-push-0">
                                 <button  class="btn btn-success" onclick="add_inventario()"><span class="glyphicon glyphicon-plus"></span>  Agregar </button>
                            </div>
                        </div>

                         <!-- tablas -->
                         <hr>
                         <div class="row" >
                             <div class="col-md-12 col-md-push-0">
                                <table id="example1" class="table table-bordered btn-hover">
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
                                              <th>Opciones</th>
                                            <!-- <th style="width: 10%;text-align: center">Codigo</th>
                                            <th style="width: 25%;text-align: center">Nombre</th>
                                            <th style="width: 25%;text-align: center">Descripcion</th>
                                            <th style="width: 25%;text-align: center">Opciones</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                             <?php if(!empty($inventario)):?>
                                            <?php foreach ($inventario as $inventario):?> 
                                        <tr id="delete_<?php echo $inventario->cod_inventario;?>">
                                             <td><?php echo $inventario->cod_inventario;?></td>
                                            <td><?php echo $inventario->nombre_almacen;?></td>
                                            <td><?php echo $inventario->nombre_producto;?></td>
                                             <td><?php echo $inventario->nombre_inventario;?></td>
                                              <td><?php echo $inventario->precio_entrada;?></td>
                                               <td><?php echo $inventario->precio_salida;?></td>
                                                <td><?php echo $inventario->unidad;?></td>
                                                <td><?php echo $inventario->stock_inventario?></td>
                                                <td><?php echo $inventario->fecha_registro?></td>
                                            <td>
                                                <div class="btn-footer text-center">
                                          
                                                    
                                                  <button class="btn btn-warning btn-remove" onclick="edit_inventario(<?php echo $inventario->cod_inventario;?>)">
                                                            <i class="glyphicon glyphicon-pencil"></i> </button>
                                                     <button class="btn btn-danger btn-remove" onclick="delete_inventario(<?php echo $inventario->cod_inventario;?>)">
                                                         <i class="glyphicon glyphicon-trash"></i> </button>
                                                </div>
                                              </td>
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

   <script type="text/javascript">
  
    function add_inventario()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

     function save()
    {
      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('inventario/inventario_add')?>";
      }
      else
      {
        url = "<?php echo site_url('inventario/inventario_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

     function edit_inventario(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('inventario/inventario_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="cod_inventario"]').val(data.cod_inventario);
            $('[name="nombre_almacen"]').val(data.nombre_almacen);
            $('[name="nombre_producto"]').val(data.nombre_producto);
            $('[name="cod_tipo_inventario"]').val(data.cod_tipo_inventario);
            $('[name="precio_entrada"]').val(data.precio_entrada);
            $('[name="precio_salida"]').val(data.precio_salida);
            $('[name="unidad"]').val(data.unidad);
            $('[name="stock_inventario"]').val(data.stock_inventario);
            $('[name="fecha_registro"]').val(data.fecha_registro);

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Book'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function delete_inventario(id)
    {
    swal({
        title: 'Desea anular?',
        text: "Esta seguro..!!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, anular!',
        closeOnConfirm: false
      }).then(function(isConfirm) {
        if (isConfirm) {

     // ajax delete data to database
     $.ajax({
      url : "<?php echo base_url('inventario/delete')?>/"+id,
      type: "post",

      data: {id:id},
 
      success: function()
      {
               //if success reload ajax table
               
               swal(
                'Deleted!','Your file has been deleted.',  'success'  );
                $("#delete_"+id).fadeTo("show",0.7, function(){
                  $(this).remove();
                })
              
              
             },
             error: function ()
             {
              swal('Error adding / update data');
            }
          });

     
   }
 })
    }
</script>
<div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">REGISTRO ALMACEN</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="cod_inventario"/>
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Almacen :</label>
              <div class="col-md-9">
                <input name="nombre_almacen" placeholder="nombre" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Producto :</label>
              <div class="col-md-9">
                <input name="nombre_producto" placeholder="descripcion" class="form-control" type="text">
              </div>
            </div>

            <div class="form-group">
             <label class="control-label col-md-3" for="inventario" >Tipo movimiento</label>
            <div class="col-md-9">
              <select name="cod_tipo_inventario" id="cod_tipo_inventario" class="form-control">
                <?php foreach ($tipo_inventario as $tipo_inventarios):?> 
                  <option value="<?php echo $tipo_inventarios->cod_tipo_inventario?>">
                    <?php echo $tipo_inventarios->nombre;?>
                    
                  </option>
                <?php endforeach;?>
                
              </select>
            </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Precio entrada :</label>
              <div class="col-md-9">
                <input name="precio_entrada" placeholder="descripcion" class="form-control" type="text">
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-md-3">Precio salida :</label>
              <div class="col-md-9">
                <input name="precio_salida" placeholder="descripcion" class="form-control" type="text">
              </div>
            </div>

              <div class="form-group">
              <label class="control-label col-md-3">Unid. de medida :</label>
              <div class="col-md-9">
                <input name="unidad" placeholder="descripcion" class="form-control" type="text">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Stock inventario :</label>
              <div class="col-md-9">
                <input name="stock_inventario" placeholder="descripcion" class="form-control" type="text">
              </div>
            </div>

             <div class="form-group">
              <label class="control-label col-md-3">Fecha registro:</label>
              <div class="col-md-9">
                <!-- <div class='input-group date' id='datetimepicker1'>
                    <input  type="text" class="form-control"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span> 
                     </span>
                </div> -->
              <input  name="fecha_registro" type="date" class="form-control">
              </div>
            </div>
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
        <!-- /.content-wrapper -->

</body>