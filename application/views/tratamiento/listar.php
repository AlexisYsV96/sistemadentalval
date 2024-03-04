<body>
    <div class="content-wrapper">
      <section class="content-header">
               
   </section>
        <div class="col-lg-14">
       <ol class="breadcrumb" style="margin-top: 2%;">
                <li><a href="<?= base_url() ?>">Inicio</a>
                </li>
                <li class="active">Tratamiento</li>
            </ol>
        </div>

        <section class="content">
            <div class="box-body">
                <div class="col-md-14">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-0">
                          <div class="panel panel-info">
                           <div class="panel-heading text-center" > 
                              <h3>LISTADO DE TRATAMIENTOS</h3> 
                          </div>

                <div class="panel-body">
                  <div class="row">
                       <div class="col-md-12">
                
               

                            <table id="example1" class="table table-bordered">
                                        <thead>
                                            <tr>
                                               
                                                    <th style="width: 5%;text-align:center" class='midnight-blue'>N°</th>
                                              
                                                <th style="width: 25%;text-align:center" class='midnight-blue'>Paciente</th>
                                                <th style="width: 12%;text-align:center" class='midnight-blue'>F. Tratamiento</th>
                                                 <th style="width: 10%;text-align:center" class='midnight-blue'>Adelanto</th>
                                                <th style="width: 10%;text-align:center" class='midnight-blue'>Total</th>
                                                <th style="width: 10%;text-align:center" class='midnight-blue'>Estado</th>
                                                <th style="width: 10%;text-align: center">Opciones</th>
                                            
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($tratamiento)):?>
                                            <?php foreach ($tratamiento as $tratamiento):?>
                                                <tr>
                                                    <td><?php echo $tratamiento->id_presupuesto;?></td>
                                                 
                                                    <td><?php echo $tratamiento->nombre . ', ' .$tratamiento->apellido;?></td>
                                                    <td><?php echo $tratamiento->fecha;?></td>
                                                    <td><?php echo $tratamiento->adelanto;?></td>
                                                    <td><?php echo $tratamiento->total;?></td>
                                                    <td style="text-align: center;"><?php if($tratamiento->estado_tratamiento == 1){$text_estado="Contado";$label_class='label-success';} else if($tratamiento->estado_tratamiento == 2) {$text_estado="Credito";$label_class='label-danger';}?>
                                                    <span class="label <?php echo $label_class;?>"><?php echo $text_estado; ?></span></td>
                                                    <td>
                                                      <div class="btn-footer text-center">

                                                        <button type="button" class="btn btn-info btn-view-venta" value="<?php echo $tratamiento->id_presupuesto;?>" data-toggle="modal" data-target="#modal-default">
                                                            <span class="fa fa-search">
                                                                
                                                            </span>
                                                        </button>
                                                             <button class="btn btn-warning btn-edit" onclick="edit_pagos(<?php echo $tratamiento->id_presupuesto;?>)">
                                                           <i class="glyphicon glyphicon-pencil"></i>
                                                            </button>
                                                          </div>
                                                    </td>
                                                 
                                                </tr>
                                            <?php endforeach;?>
                                              
                                <?php endif ?>
                                        </tbody>
                                    </table>
                                     </div>
                                   </div>
                                       </div>
                        </div>
                      </div>
                    </div>
                </div>
                
            </div>
            
        </section>
    </div>

<script type="text/javascript">


     function reload_table()
    {
      table.ajax.reload(null,false); //reload datatable ajax 
    }

     function save()
    {
      var url;
      if(save_method == 'update')
      {
           url = "<?php echo site_url('listartratamientos/pago_update')?>";
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
              //  $('#modal_form').modal('hide');
              // location.reload();// for reload a page
               $('#modal_form').modal('hide');
              

               swal(
                'Good job!',
                'Data has been save!',
                'success',

                )
                location.reload();
               // location.reload();

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

     function edit_pagos(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('listartratamientos/pago_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id_presupuesto"]').val(data.id_presupuesto);
            $('[name="adelanto"]').val(data.adelanto);
            $('[name="estado_tratamiento"]').val(data.estado_tratamiento);
            $('[name="fecha"]').val(data.fecha);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('PAGO TRATAMIENTOS'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }


   
</script>



</div>

 <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Información del Tratamiento</h4>
              </div>
              <div class="modal-body">
             
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                 <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print"> Imprimir</span></button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


 <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">AREA DE TRABAJO</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal" method="post">
          <input type="hidden" value="" name="id_presupuesto"/>
          <div class="form-body">

            <div class="form-group">
              <label class="control-label col-md-3">Pago :</label>
              <div class="col-md-6">
                <input name="adelanto" placeholder="pago" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Estado solucion :</label>
                <div class="col-md-6">
                   <select name="estado_tratamiento" class="form-control">
                     <option value="1">Contado</option>
                      <option value="2">Credito</option>
                     
                   </select>
               </div>
            </div>

             <div class="form-group">
              <label class="control-label col-md-3">F. pago:</label>
              <div class="col-md-6">
         
               <input  name="fecha" type="date" class="form-control">
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

</body>