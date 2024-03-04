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
                              <h3>LISTADO DE PAGO</h3> 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <div class="col-md-12 col-md-push-0">
                                 <button  class="btn btn-success" onclick="add_pago()"><span class="glyphicon glyphicon-plus"></span>  Agregar </button>
                            </div>
                        </div>

                         <!-- tablas -->
                         <hr>
                         <div class="row" >
                             <div class="col-md-12 col-md-push-0">
                                <table id="example1" class="table table-bordered btn-hover">
                                    <thead>
                                        <tr>
                                           <th>Codigo</th>
                                            <th>Concepto</th>
                                           <!--  <th>Fecha registro</th> -->
                                            <th>Fecha pago</th>
                                              <th>Monto</th>
                                            <th>Movimiento</th>
                                            <th>Tipo pago</th>
                                            <th>Observacion</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php if(!empty($pago)):?>
                                            <?php foreach ($pago as $pagos):?> 
                                        <tr id="delete_<?php echo $pagos->cod_pago;?>">
                                             <td><?php echo $pagos->cod_pago;?></td>
                                            <td><?php echo $pagos->concepto_pago;?></td>
                                           <!--  <td><?php echo $pagos->fecha_registro;?></td> -->
                                             <td><?php echo $pagos->fecha_pago;?></td>
                                              <td><?php echo $pagos->monto_pago;?></td>
                                              <td><?php echo $pagos->movimiento_pago;?></td>
                                              <td><?php echo $pagos->tipo_pago;?></td>
                                               <td><?php echo $pagos->observacion;?></td>
                                            <td>
                                                <div class="btn-footer text-center">
                                          
                                                    
                                                   <button class="btn btn-warning" onclick="edit_pago(<?php echo $pagos->cod_pago;?>)">
                                                            <i class="glyphicon glyphicon-pencil"></i> </button>
                                                     <button class="btn btn-danger" onclick="delete_pago(<?php echo $pagos->cod_pago;?>)">
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
  
    function add_pago()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

    function reload_table()
    {
      table.ajax.reload(null,false); //reload datatable ajax 
    }

     function saves()
    {
      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('pago/pago_add')?>";
      }
      else
      {
        url = "<?php echo site_url('pago/pago_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            // beforeSend: function(){
            //   console.log($('#form').serialize());
            
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

     function edit_pago(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('pago/pago_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="cod_pago"]').val(data.cod_pago);
            $('[name="concepto_pago"]').val(data.concepto_pago);
            $('[name="fecha_registro"]').val(data.fecha_registro);
             $('[name="fecha_pago"]').val(data.fecha_pago);
              $('[name="monto_pago"]').val(data.monto_pago);
               $('[name="movimiento_pago"]').val(data.movimiento_pago);
               $('[name="tipo_pago"]').val(data.tipo_pago);
               $('[name="monto_pago"]').val(data.monto_pago);
               $('[name="observacion"]').val(data.observacion);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Book'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function delete_pago(id)
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
      url : "<?php echo base_url('pago/delete')?>/"+id,
      type: "post",

      data: {id:id},
 
      success: function(data)
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
        <h3 class="modal-title">Pago</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="cod_pago"/>
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Concepto:</label>
              <div class="col-md-9">
                <input name="concepto_pago" placeholder="concepto" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">F. registro:</label>
              <div class="col-md-9" >
           <input  name="fecha_registro" type="date" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">F. pago:</label>
              <div class="col-md-9">
         
               <input  name="fecha_pago" type="date" class="form-control">
              </div>
            </div>

             <div class="form-group">
              <label class="control-label col-md-3">Monto:</label>
              <div class="col-md-9">
                <input name="monto_pago" placeholder="descripcion" class="form-control" type="text">
              </div>
            </div>

               <div class="form-group">
              <label class="control-label col-md-3">Movimiento:</label>
              <div class="col-md-9">
              <select name="movimiento_pago" class="form-control">
                 <option value="I">Ingreso</option>
                    <option value="E">Egreso</option>
              </select>

              </div>
            </div>

              <div class="form-group">
              <label class="control-label col-md-3">Tipo pago:</label>
              <div class="col-md-9">
                <select name="tipo_pago" class="form-control">
                 <option value="P">Contado</option>
                    <option value="C">Credito</option>
                    <option value="T">Transferencia</option>
              </select>

              </div>
            </div>

                <div class="form-group">
              <label class="control-label col-md-3">Observacion:</label>
              <div class="col-md-9">
                <input name="observacion" placeholder="observacion" class="form-control" type="text">
              </div>
            </div>

          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="saves()" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
        <!-- /.content-wrapper -->








</body>