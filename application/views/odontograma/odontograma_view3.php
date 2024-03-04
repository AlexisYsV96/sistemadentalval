<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb" style="margin-top: 2%;">
            <li><a href="<?= base_url() ?>">Inicio</a></li>
         
                        <li><a href="<?= base_url('odontograma2') ?>">Paciente</a></li>
            <li class="active"> Odontograma </li>
        </ol>
    </div>
</div>

<div id="panel-paciente" class="login-panel panel panel-primary">

    <div class="row">
        <div class="col-lg-12">

            <div class="form-group">

                <div align="right">

               
                </div>
                <div class="row" >
                    <div class="col-lg-12">
                         <ol class="breadcrumb" style="margin-top: 2%;">
                          <li>
                         <div class="form-inline" > 

                        <div style="float:right;">
                            <form id="frmCargarHistoria" action="<?= base_url() ?>odontograma2/odontograma_view" method="post">
                              <!--   <label>Historial de citas </label> -->
                                <select class="form-control form-control" id="codi_cit" name="codi_cit" style="width:240px">       

                                    <?php foreach ($citas as $row) { ?> <option value="<?= $row->codi_cit ?>"> <?= $row->codi_cit . ' - ' . $row->fech_cit ?> </option> <?php } ?> 

                                </select>
                                  <input type="hidden" name="codi_pac" value="<?= $paciente->codi_pac ?>">
                                <button id="btnHistoriaPaciente" type="submit" class="btn btn-primary"> Cargar Historia</button>
                                
                            </form>
                        </div>                   

            </div>  
            </li>         
                           </ol> 

               
                 </div>          
                    

              <div class="form-horizontal">
                    <div class="form-group">
                     <label class="col-sm-2 control-label"> Fecha de esta cita:</label>

                     <div class="col-sm-3">
                        <input type="text" class="form-control" style="background-color: transparent;" value="<?= $cita->fech_cit ?>" disabled="disabled" >
                     </div>

                      <label class="col-sm-3 control-label"> Fecha de nacimiento:</label>

                     <div class="col-sm-2">
                        <input type="text" class="form-control" style="background-color: transparent;" value="<?= $paciente->fena_pac ?>" disabled="disabled" >
                     </div>
                </div>

                <div class="form-group">
                     <label class="col-sm-2 control-label"> Paciente:</label>

                     <div class="col-sm-3">
                        <input type="text" class="form-control"  style="background-color: transparent;" value="<?= $paciente->apel_pac . ', ' . $paciente->nomb_pac ?>" disabled="disabled" >
                     </div>

                      <label class="col-sm-3 control-label"> Lugar de Nacimiento:</label>

                     <div class="col-sm-2">
                        <input type="text" class="form-control" style="background-color: transparent;" value="<?= $paciente->lugar_nacimiento ?>" disabled="disabled" >
                     </div>
                </div>

                <div class="form-group">
                     <label class="col-sm-2 control-label"> Dirección:</label>

                     <div class="col-sm-3">
                        <input type="text" class="form-control" style="background-color: transparent;"  value="<?= $paciente->dire_pac ?>" disabled="disabled" >
                     </div>

                      <label class="col-sm-3 control-label"> Edad:</label>

                     <div class="col-sm-2">
                        <input type="text" class="form-control" style="background-color: transparent;" value="<?= $paciente->edad_pac ?>" disabled="disabled" >
                     </div>
                </div>

                <div class="form-group">
                     <label class="col-sm-2 control-label"> Telefono:</label>

                     <div class="col-sm-3">
                        <input type="text" class="form-control"  style="background-color: transparent;" value="<?= $paciente->telf_pac ?>" disabled="disabled" >
                     </div>

                      <label class="col-sm-3 control-label"> Sexo:</label>

                     <div class="col-sm-2">
                        <input type="text" class="form-control" style="background-color: transparent;" value="<?= $paciente->sexo_pac ?>" disabled="disabled" >
                     </div>
                </div>

                <div class="form-group">
                     <label class="col-sm-2 control-label"> Estado Civil:</label>

                     <div class="col-sm-3">
                        <input type="text" class="form-control" style="background-color: transparent;"  value="<?= $paciente->civi_pac ?>" disabled="disabled" >
                     </div>

                      <label class="col-sm-3 control-label"> Como se entero de la clinica :</label>

                     <div class="col-sm-3">
                        <input type="text" class="form-control" style="background-color: transparent;" value="<?= $paciente->informacion_clinica ?>" disabled="disabled" >
                     </div>
                </div>

                <div class="form-group">
                     <label class="col-sm-2 control-label"> Ocupación:</label>

                     <div class="col-sm-3">
                        <input type="text" class="form-control"  style="background-color: transparent;" value="<?= $paciente->ocupacion ?>" disabled="disabled" >
                     </div>

                      <label class="col-sm-3 control-label"> Motivo de la consulta:</label>

                     <div class="col-sm-3">
                        <input type="text" class="form-control" style="background-color: transparent;" value="<?= $cita->motivo_consult ?>" disabled="disabled" >
                     </div>
                </div>

                 <div class="form-group">
                     <label class="col-sm-2 control-label"> Correo electronico:</label>

                     <div class="col-sm-3">
                        <input type="text" class="form-control"  style="background-color: transparent;" value="<?= $paciente->emai_pac ?>" disabled="disabled" >
                     </div>

                       <label class="col-sm-3 control-label"> Dni:</label>

                     <div class="col-sm-3">
                        <input type="text" class="form-control"  style="background-color: transparent;" value="<?= $paciente->dni_pac ?>" disabled="disabled" >
                     </div>

                </div>

                
            </div>

          
<br>

                 
                    </div>                    
                   
                       
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <?php
            $limit = 52;
            for ($i = 0; $i < $limit; $i++) {
                $diente = $dientes[$i];
                $estado = 1;
                
                $background_1 = "none";
                $background_2 = "none";
                $background_3 = "none";
                $background_4 = "none";
                $background_5 = "none";
                $background_6 = "none";
                
                $sw_diente = false;
                $codi_edi = -1;
                foreach ($odontograma as $d) {
                    if ($d->num_die == $dientes[$i]) {
                        
                        $sw_diente = true;
                        
                        $diente = $d->num_die;
                        $estado = $d->codi_edi;
                        $partes = $d->part_die;
                        $codi_edi = $d->codi_edi;
                        
                        $parte1 = $partes[0];
                        $parte2 = $partes[1];
                        $parte3 = $partes[2];
                        $parte4 = $partes[3];
                        $parte5 = $partes[4];
                        
                        if ($parte1 == "M") {
                            $background_2 = "blue";
                        } else {
                            $background_2 = "none";
                        }
                        if ($parte2 == "D") {
                            $background_1 = "blue";
                        } else {
                            $background_1 = "none";
                        }
                        if ($parte3== "V") {
                            $background_3 = "red";
                        } else {
                            $background_3 = "none";
                        }
                        if ($parte4 == "P" || $parte4 == "L") {
                            $background_4 = "red";
                        } else {
                            $background_4 = "none";
                        }
                        if ($parte5 == "O" || $parte5 == "I") {
                            $background_5 = "red";
                        } else {
                            $background_5 = "none";
                        }
                    }
                }
                ?>

                <div class="btn-group" style="margin:1%">

                    <?php if ($i + 1 <= 16) { ?>

                        <div>
                            <a class="btn" style="padding:0%">    
                                <div>
                                    <?php               
                                        if ($sw_diente && getimagesize(base_url().'resources/images/odontograma/' . $diente . '/' . $diente . '_'.$codi_edi.'.jpg')) { ?>
                                            <img class="img-responsive" src="<?= base_url().'resources/images/odontograma/' . $diente . '/' . $diente . '_'.$codi_edi.'.jpg' ?>" alt="<?= $diente ?>">
                                      <?php  } else { ?>
                                            <img class="img-responsive" src="<?= base_url().'resources/images/odontograma/' . $diente . '/' . $diente .'.jpg' ?>" alt="<?= $diente ?>">
                                     <?php    }
                                    ?>
                                </div>
                            </a>           
                        </div><br>

                        <div>
                            <div style="width:36px">
                                <div style="float:left;width:12px;height:12px;border: 1px solid #ffffff"></div>
                                <div style="float:left;width:12px;height:12px;border: 1px solid #cccccc;  background: <?= $background_3 ?>;"></div>
                                <div style="float:left;width:12px;height:12px;border: 1px solid #ffffff"></div>
                            </div>
                            <div style="width:36px">
                                <div style="float:left;width:12px;height:12px;border: 1px solid #cccccc; background: <?= $background_1 ?>;"></div>
                                <div style="float:left;width:12px;height:12px;border: 1px solid #cccccc;  background: <?= $background_5 ?>;"></div>
                                <div style="float:left;width:12px;height:12px;border: 1px solid #cccccc;  background: <?= $background_2 ?>;"></div>
                            </div>
                            <div style="width:36px">
                                <div style="float:left;width:12px;height:12px;border: 1px solid #ffffff"></div>
                                <div style="float:left;width:12px;height:12px;border: 1px solid #cccccc;  background: <?= $background_4 ?>;"></div>
                                <div style="float:left;width:12px;height:12px;border: 1px solid #ffffff"></div>
                            </div>
                            <div style="width:36px;text-align:center">
                                <span> <?= $diente ?> </span>
                            </div>
                        </div>

                    <?php } else if ($i + 1 <= 26){ ?>

                    <div>
                            <a class="btn" style="padding:0%">    
                                <div>
                                    <?php               
                                        if ($sw_diente && getimagesize(base_url().'resources/images/odontograma/' . $diente . '/' . $diente . '_'.$codi_edi.'.jpg')) { ?>
                                            <img class="img-responsive" src="<?= base_url().'resources/images/odontograma/' . $diente . '/' . $diente . '_'.$codi_edi.'.jpg' ?>" alt="<?= $diente ?>">
                                      <?php  } else { ?>
                                            <img class="img-responsive" src="<?= base_url().'resources/images/odontograma/' . $diente . '/' . $diente .'.jpg' ?>" alt="<?= $diente ?>">
                                     <?php    }
                                    ?>
                                </div>
                            </a>           
                        </div><br>

                        <div>
                            <div style="width:36px;text-align:center">
                                <span> <?= $diente ?> </span>
                            </div>
                            <div style="width:36px">
                                <div style="float:left;width:12px;height:12px;border: 1px solid #ffffff"></div>
                                <div style="float:left;width:12px;height:12px;border: 1px solid #cccccc;  background: <?= $background_3 ?>;"></div>
                                <div style="float:left;width:12px;height:12px;border: 1px solid #ffffff"></div>
                            </div>
                            <div style="width:36px">
                                <div style="float:left;width:12px;height:12px;border: 1px solid #cccccc; background: <?= $background_1 ?>;"></div>
                                <div style="float:left;width:12px;height:12px;border: 1px solid #cccccc;  background: <?= $background_5 ?>;"></div>
                                <div style="float:left;width:12px;height:12px;border: 1px solid #cccccc;  background: <?= $background_2 ?>;"></div>
                            </div>
                            <div style="width:36px">
                                <div style="float:left;width:12px;height:12px;border: 1px solid #ffffff"></div>
                                <div style="float:left;width:12px;height:12px;border: 1px solid #cccccc;  background: <?= $background_4 ?>;"></div>
                                <div style="float:left;width:12px;height:12px;border: 1px solid #ffffff"></div>
                            </div>                            
                        </div><br><br><br>
                        <?php } else if ($i + 1 <= 36){ ?>
                        <div>
                            <div style="width:36px;text-align:center">
                                <span> <?= $diente ?> </span>
                            </div>
                            <div style="width:36px">
                                <div style="float:left;width:12px;height:12px;border: 1px solid #ffffff"></div>
                                <div style="float:left;width:12px;height:12px;border: 1px solid #cccccc;  background: <?= $background_3 ?>;"></div>
                                <div style="float:left;width:12px;height:12px;border: 1px solid #ffffff"></div>
                            </div>
                            <div style="width:36px">
                                <div style="float:left;width:12px;height:12px;border: 1px solid #cccccc; background: <?= $background_1 ?>;"></div>
                                <div style="float:left;width:12px;height:12px;border: 1px solid #cccccc;  background: <?= $background_5 ?>;"></div>
                                <div style="float:left;width:12px;height:12px;border: 1px solid #cccccc;  background: <?= $background_2 ?>;"></div>
                            </div>
                            <div style="width:36px">
                                <div style="float:left;width:12px;height:12px;border: 1px solid #ffffff"></div>
                                <div style="float:left;width:12px;height:12px;border: 1px solid #cccccc;  background: <?= $background_4 ?>;"></div>
                                <div style="float:left;width:12px;height:12px;border: 1px solid #ffffff"></div>
                            </div>                            
                        </div><br><br><br>
                        <div>
                            <a class="btn" style="padding:0%">    
                                <div>
                                    <?php               
                                        if ($sw_diente && getimagesize(base_url().'resources/images/odontograma/' . $diente . '/' . $diente . '_'.$codi_edi.'.jpg')) { ?>
                                            <img class="img-responsive" src="<?= base_url().'resources/images/odontograma/' . $diente . '/' . $diente . '_'.$codi_edi.'.jpg' ?>" alt="<?= $diente ?>">
                                      <?php  } else { ?>
                                            <img class="img-responsive" src="<?= base_url().'resources/images/odontograma/' . $diente . '/' . $diente .'.jpg' ?>" alt="<?= $diente ?>">
                                     <?php    }
                                    ?>
                                </div>
                            </a>           
                        </div><br>
                        <?php } else { ?>

                        <div>
                            <div style="width:36px;text-align:center">
                                <span> <?= $diente ?> </span>
                            </div>
                            <div style="width:36px">
                                <div style="float:left;width:12px;height:12px;border: 1px solid #ffffff"></div>
                                <div style="float:left;width:12px;height:12px;border: 1px solid #cccccc;  background: <?= $background_3 ?>;"></div>
                                <div style="float:left;width:12px;height:12px;border: 1px solid #ffffff"></div>
                            </div>
                            <div style="width:36px">
                                <div style="float:left;width:12px;height:12px;border: 1px solid #cccccc; background: <?= $background_1 ?>;"></div>
                                <div style="float:left;width:12px;height:12px;border: 1px solid #cccccc;  background: <?= $background_5 ?>;"></div>
                                <div style="float:left;width:12px;height:12px;border: 1px solid #cccccc;  background: <?= $background_2 ?>;"></div>
                            </div>
                            <div style="width:36px">
                                <div style="float:left;width:12px;height:12px;border: 1px solid #ffffff"></div>
                                <div style="float:left;width:12px;height:12px;border: 1px solid #cccccc;  background: <?= $background_4 ?>;"></div>
                                <div style="float:left;width:12px;height:12px;border: 1px solid #ffffff"></div>
                            </div>                            
                        </div><br><br><br>
                        <div>
                            <a class="btn" style="padding:0%">    
                                <div>
                                    <?php               
                                        if ($sw_diente && getimagesize(base_url().'resources/images/odontograma/' . $diente . '/' . $diente . '_'.$codi_edi.'.jpg')) { ?>
                                            <img class="img-responsive" src="<?= base_url('resources/images/odontograma/' . $diente . '/' . $diente . '_'.$codi_edi.'.jpg') ?>" alt="<?= $diente ?>">
                                      <?php  } else { ?>
                                            <img class="img-responsive" src="<?= base_url('resources/images/odontograma/' . $diente . '/' . $diente .'.jpg') ?>" alt="<?= $diente ?>">
                                     <?php    }
                                    ?>
                                </div>
                            </a>
                        </div>

                    <?php } ?>

                </div>

                <?php if ($i + 1 == 16 || $i + 1 == 26 || $i + 1 == 36) { ?>

                </div>

                <div class="col-lg-12" style="text-align:center">

                    <?php
                }
            }
            ?>

        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <ol class="text-primary" style="margin-top: 2%;">
                <li class="active"> DIAGNOSTICO </li>
            </ol>
        </div>
    </div>

    <div class="panel-body">
        <table id="table-historial_enfermedad" class="table table-bordered">
            <thead>
                <tr>
                    <th># Diente</th>
                    <th>Estado</th>
                    <th>Zonas</th>
                    <th>Enfermedad</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($estados as $row) { ?>

                    <tr>
                        <td style="text-align: center"><?= $row['num_die'] ?></td>
                        <td><?= $row['nomb_edi'] ?> </td>
                        <td><?= $row['part_die'] ?> </td>
                        <td><?= $row['enf_die'] ?> </td>
                    </tr>

                <?php } ?>

            </tbody>
        </table>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <ol class="text-primary" style="margin-top: 2%;">
                <li class="active"> PROCEDIMIENTOS </li>
            </ol>
        </div>
    </div>
    
    <div class="panel-body">
        <table id="table-historial_procedimiento" class="table table-bordered">
            <thead>
                <tr>
                    <th># Diente</th>
                    <th>Procedimiento</th>
                    <th>Categoria</th>
                    <th>Costo</th>
                    <th>Aseg.</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($proc_detalle as $row) { ?>

                    <tr>
                        <td style="text-align: center"><?= $row->num_die ?></td>
                        <td><?= $row->desc_pro ?> </td>
                        <td><?= $row->nomb_cat ?> </td>
                        <td><?= $row->cost_tar ?> </td>
                        <td><?= $row->aseg_dpr ?> </td>
                    </tr>

                <?php } ?>

            </tbody>
        </table>
    </div>
    
    <div class="row" >
        <div class="col-lg-12">
            <ol class="text-primary" style="margin-top: 2%;">
                <li class="active"> ENFERMEDAD ACTUAL  </li>
            </ol>
        </div>
                    
    </div>
    <div class="form-horizontal">
                    <div class="form-group">
                     <label class="col-sm-2 control-label"> Motivo consulta:</label>

                     <div class="col-sm-3">
                        <input type="text" class="form-control" style="background-color: transparent;" value="<?= $paciente->motivo_consulta ?>" disabled="disabled" >
                     </div>

                      <label class="col-sm-2 control-label"> Tiempo de enfermedad:</label>

                     <div class="col-sm-4">
                        <input type="text" class="form-control" style="background-color: transparent;" value="<?= $paciente->enfe_pac ?>" disabled="disabled" >
                     </div>
                </div>

                <div class="form-group">
                     <label class="col-sm-2 control-label"> Signos:</label>

                     <div class="col-sm-3">
                        <input type="text" class="form-control"  style="background-color: transparent;" value="<?= $paciente->signos ?>" disabled="disabled" >
                     </div>

                      <label class="col-sm-2 control-label"> Sintomas :</label>

                     <div class="col-sm-4">
                        <input type="text" class="form-control"  style="background-color: transparent;" value="<?= $cita->sintomas ?>" disabled="disabled" >
                     </div>
                </div>

                </div>

              
<div class="row" >
        <div class="col-lg-12">
            <ol class="text-primary" style="margin-top: 2%;">
                <li class="active"> ANTECEDENTES  </li>
            </ol>
        </div>
                    
    </div>
    <div class="form-horizontal">
                    <div class="form-group">
                     <label class="col-sm-2 control-label"> Antecedentes Personales:</label>

                     <div class="col-sm-3">
                        <input type="text" class="form-control" style="background-color: transparent;" value="<?= $paciente->antec_pac ?>" disabled="disabled" >
                     </div>

                     
                </div>
           
    </div>
               

<div class="row" >
        <div class="col-lg-12">
            <ol class="text-primary" style="margin-top: 2%;">
                <li class="active"> EXPLORACIÓN FISICA  </li>
            </ol>
            <ol class="text-primary" style="margin-top: 2%;">
                <a> Signos vitales:  </a>
            </ol>
        </div>
                    
    </div>
    <div class="form-horizontal">
                    <div class="form-group">
                     


                     <label class="col-sm-1 control-label"> P.A.</label>

                     <div class="col-sm-1">
                        <input type="text" class="form-control" style="background-color: transparent;" value="<?= $paciente->presion_pac ?>" disabled="disabled" >
                     </div>

                      <label class="col-sm-1 control-label"> Pulso:</label>

                     <div class="col-sm-1">
                        <input type="text" class="form-control" style="background-color: transparent;" value="<?= $paciente->pulso_pac ?>" disabled="disabled" >
                     </div>

                      <label class="col-sm-1 control-label"> Temperatura:</label>

                     <div class="col-sm-1">
                        <input type="text" class="form-control" style="background-color: transparent;" value="<?= $paciente->temp_pac ?>" disabled="disabled" >
                     </div>

                     <label class="col-sm-1 control-label"> F.C.</label>

                     <div class="col-sm-1">
                        <input type="text" class="form-control" style="background-color: transparent;" value="<?= $paciente->fc_pac ?>" disabled="disabled" >
                     </div>

                      <label class="col-sm-1 control-label">  Frec.Resp.</label>

                     <div class="col-sm-1">
                        <input type="text" class="form-control" style="background-color: transparent;" value="<?= $paciente->frec_resp ?>" disabled="disabled" >
                     </div>
                </div>
           
    </div>
               
     <div class="row" >
         <div class="col-lg-19">
            
            <ol class="text-primary" style="margin-top: 2%;">
                <div class="col-sm-10">
                <a> Examen Clinico General:  </a>

                       <input type="text" class="form-control" style="height: 65px;background-color: transparent;" value="<?= $paciente->exam_clinico ?>" disabled="disabled" >
                     </div>
                 
             </ol>
         </div>
                    
    </div> 

     <div class="row" >
         <div class="col-lg-19">
            
            <ol class="text-primary" style="margin-top: 2%;">
                <div class="col-sm-10">
                <a> Examen Complementario:  </a>

                       <input type="text" class="form-control" style="height: 65px;background-color: transparent;" value="<?= $paciente->exam_complementario ?>" disabled="disabled" >
                     </div>
                 
             </ol>
         </div>
                    
    </div> 

     <div class="row" >
         <div class="col-lg-19">
            
            <ol class="text-primary" style="margin-top: 2%;">
                <div class="col-sm-10">
                <a> Odontoestomalogico:  </a>

                       <input type="text" class="form-control" style="height: 65px;background-color: transparent;" value="<?= $paciente->odonestomalogico ?>" disabled="disabled" >
                     </div>
                 
             </ol>
         </div>
                    
    </div> 


    <div class="row" >
         <div class="col-lg-19">
            
            <ol class="text-primary" style="margin-top: 2%;">
                <div class="col-sm-10">
                <a> Diagnostico (CIE10) E.S.G: </a>
                <a>   </a>
                       <input type="text" class="form-control" style="height: 65px;background-color: transparent;" value="<?= $paciente->diagn_pac ?>" disabled="disabled" >
                     </div>
                 
             </ol>
         </div>
                    
    </div> 
        <form class="form-horizontal">
                    <div class="form-group">
                     


                    

                      
                </div>
           
    </form>       
                
    </div>
            <br>
            <br>
    <a href="<?= base_url() ?>odontograma2/show_pdf/<?= $cita->codi_cit ?>" target="_blank"><button class="btn btn-primary btn-lg btn-block"><!--data-toggle="modal" data-target="#ModalReporteCita"-->Generar reporte</button></a>
</div>

<!--<div class="portfolio-modal modal fade" id="ModalReporteCita" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-content" style="height: 100%">
        <div class="container" style="height: 100%">
            <div class="row" style="height: 100%">
                <div class="col-lg-8 col-lg-offset-2" style="height: 100%; text-align: center;">
                    <div class="modal-body" style="height: 90%">
                        <h2>Reporte de cita médica</h2>
                        <hr class="star-primary">
                        <div id="iframe_comprobante" style="height: 85%">
                            <iframe src="<?= base_url() ?>odontograma2/show_pdf" style="display:block; width:100%; height: 100%; border:none;" frameborder="0" scrolling="no"></iframe>                           
                        </div>
                    </div>
                    <button id="cerrarComprobante" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>-->
