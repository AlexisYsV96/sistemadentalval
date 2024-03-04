<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title> .:: <?= $clinica['nomb_clin'] ?> ::. </title>

        <link rel="shortcut icon" href="<?= base_url('resources/images/ico.ico') ?>">
        <link href="<?= base_url() ?>resources/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>resources/css/modern-business.css" rel="stylesheet">
        <link href="<?= base_url() ?>resources/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="<?php echo base_url();?>resources/datatables.net-bs/css/dataTables.bootstrap.min.css">
        
          <link href="<?php echo base_url('resources/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
        <link href="<?= base_url() ?>resources/css/jquery-ui.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url() ?>resources/css/datepicker.less" rel="stylesheet" type="text/css">
        <link href="<?= base_url() ?>resources/css/datepicker.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url() ?>resources/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url() ?>resources/css/odontologia.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url() ?>resources/css/sweetalert.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/1.3.3/sweetalert2.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/0.4.5/sweetalert2.css">
       <link rel="stylesheet" href="<?php echo base_url();?>resources/datatables-export/css/buttons.dataTables.min.css">

    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="height:65px">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="container">
                <div><img src="<?= base_url('resources/images/clinica/logo.png') ?>" style="float:left;margin:5px 10px 0px 0px;width:60px"></div>
                <div class="navbar-header">
                    <a class="navbar-brand" style="margin-bottom:0px" href="<?= base_url('home') ?>"> <?= $clinica['nomb_clin'] . '<br>' ?> 
                        <label style="font-size:0.6em"> CENTRO ODONTOLÓGICO </label></a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right" style="margin-top:7px">
                        <?php
                        if ($this->session->userdata('estado_sesion') && $this->session->userdata('estado_sesion') == "A") {
                            echo show_menu($this->session->userdata('codi_rol'));
                        } else {
                            echo show_menu();
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>

        <?php
        if (isset($carousel) && $carousel != "") {
            echo $carousel;
        }
        ?>
        <div id="contenido" class="container">

            <?= $container ?>
            <hr>
            <!--<footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; <a href="http://sysdora.info" target="_blank">SYSDORA</a> 2018</p>
                    </div>
                </div>
            </footer>-->
        </div>

        <script src="<?= base_url() ?>resources/js/config.js"></script>
        <script src="<?= base_url() ?>resources/js/jquery-1.11.0.js"></script>
        <script src="<?= base_url() ?>resources/js/bootstrap.min.js"></script>
        <!--<script src="<?= base_url() ?>resources/js/is-loading.js"></script>-->
        <script src="<?= base_url() ?>resources/js/bootstrap-datepicker.js"></script>
        <script src="<?= base_url() ?>resources/js/jquery.dataTables.js"></script>
        <script src="<?= base_url() ?>resources/js/dataTables.bootstrap.js"></script>
        <script src="<?= base_url() ?>resources/js/jquery-ui.js"></script>
        <script src="<?= base_url() ?>resources/js/paciente.js"></script>
        <script src="<?= base_url() ?>resources/js/procedimientos.js"></script>
        <script src="<?= base_url() ?>resources/js/medico.js"></script>
        <script src="<?= base_url() ?>resources/js/horario_medico.js"></script>
        <script src="<?= base_url() ?>resources/js/cita_medica.js"></script>
        <script src="<?= base_url() ?>resources/js/odontograma.js"></script>
        <script src="<?= base_url() ?>resources/js/cie.js"></script>
        <script src="<?= base_url() ?>resources/js/usuario.js"></script>
        <script src="<?= base_url() ?>resources/js/jsreportes.js"></script>
        <!-- <script src="<?= base_url() ?>resources/js/home.js"></script> -->
        <script src="<?= base_url() ?>resources/jquery-print/jquery.print.js"></script>
        <script src="<?= base_url() ?>resources/jquery-print/jquery.print.js"></script>

        <script src="<?php echo base_url();?>resources/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>resources/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

        <!-- <script src="<?= base_url()?>resources/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script> -->
        <script src="<?= base_url() ?>resources/js/sweetalert.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/sweetalert2/1.3.3/sweetalert2.min.js"></script>
        <script src="<?php echo base_url();?>resources/dataTables-export/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url();?>resources/dataTables-export/js/buttons.flash.min.js"></script>
        <script src="<?php echo base_url();?>resources/datatables-export/js/jszip.min.js"></script>
        <script src="<?php echo base_url();?>resources/datatables-export/js/pdfmake.min.js"></script>
        <script src="<?php echo base_url();?>resources/datatables-export/js/vfs_fonts.js"></script>
        <script src="<?php echo base_url();?>resources/datatables-export/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url();?>resources/datatables-export/js/buttons.print.min.js"></script>

        <script src="<?= base_url() ?>resources/chart.js/Chart.min.js"></script>


        <script>
    //         var base_url="<?php echo base_url();?>"; 
    //   $('.datepicker').datepicker({
    //     autoclose: true,
    //     format: "yyyy-mm-dd",
    //     todayHighlight: true,
    //     orientation: "top auto",

    //     todayBtn: true,
    //     todayHighlight: true,  
    // });


        $(document).ready(function () {
            var base_url="<?php echo base_url();?>";
            $(".btn-edit").on("click", function(e){
                e.preventDefault();
                var ruta = $(this).attr("href");
                // alert(ruta);
                $.ajax({
                    url: ruta,
                    type:"POST",
                    success:function(resp){
                    window.location.href = base_url + resp;
                    }
                });            
            });                
            $('#example').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excelHtml5',
                            title: "Listado de Almacen",
                            exportOptions: {
                                columns: [ 0, 1,2, 3, 4, 5,6,7,8 ]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            title: "Listado de Almacen",
                            exportOptions: {
                                columns: [ 0, 1,2, 3, 4, 5, 6, 7, 8 ]
                            }
                            
                        }
                    ],

                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por pagina",
                    "zeroRecords": "No se encontraron resultados en su busqueda",
                    "searchPlaceholder": "Buscar registros",
                    "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
                    "infoEmpty": "No existen registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                }
            });

            

            $('#example1').DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por pagina",
                    "zeroRecords": "No se encontraron resultados en su busqueda",
                    "searchPlaceholder": "Buscar registros",
                    "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
                    "infoEmpty": "No existen registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                }
            });
            const elemtBarchart = document.getElementById('bar-chart');
            
            if(elemtBarchart){
                $.ajax({
                    url: base_url + "citas/get_cant_citas_mes",
                    type:"GET",
                    success:function(data){
                        console.log(JSON.parse(data))
                        const meses = [
                            'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                        ];
                        //const datos = [10, 20, 15, 30, 25, 35, 45, 40, 35, 30, 20, 15];
                        let datosTemp = [0,0,0,0,0,0,0,0,0,0,0,0];

                        const datosRegistradas = datosTemp.map((element,index)=>{
                            let objmes = JSON.parse(data).cant_cita_med.find((obj)=> parseInt(obj.mes) - 1 == index );
                            return objmes ? objmes.cantidad : element
                        });

                        const datosAtendidas = datosTemp.map((element,index)=>{
                            let objmes = JSON.parse(data).cant_cita_med_ter.find((obj)=> parseInt(obj.mes) - 1 == index );
                            return objmes ? objmes.cantidad : element
                        });
                        
                        const ctx = document.getElementById('bar-chart').getContext('2d');
                        var lineChart = new Chart(ctx, {
                            type: 'line', // Tipo de gráfico de líneas
                            data: {
                                labels: meses,
                                datasets: [
                                    {
                                        label: 'Citas Registradas por Mes',
                                        data: datosRegistradas,
                                        fill: false, // Sin relleno debajo de la línea
                                        borderColor: 'rgba(0, 153, 204, 1)', // Color de la línea
                                        borderWidth: 3 // Ancho de la línea
                                    },
                                    {
                                        label: 'Citas Atendidas por Mes',
                                        data: datosAtendidas,
                                        fill: false,
                                        borderColor: 'rgba(51, 204, 51, 1)', // Naranja
                                        borderWidth: 3
                                    }
                                ]
                            },
                            options: {
                                responsive: true, // Hace que el gráfico sea responsive
                                maintainAspectRatio: false, // Permite ajustar el tamaño del gráfico
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true // Comienza en 0 en el eje Y
                                        }
                                    }]
                                }
                            }
                        });
                    }
                });
            }
            $('#meses').on('change', function() {
                var seleccion = $(this).val();
                console.log('Has seleccionado el mes con valor: ' + seleccion);
                const elemtDonutchart = document.getElementById('donut-chart');
                if (window.donaChart) {
                    window.donaChart.destroy();
                }
                if(elemtDonutchart){
                    const mesesDonut = [
                        'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                        'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                    ];
                    //var mes = "<?php date_default_timezone_set('America/Lima'); echo date('n')?>";
                    $.ajax({
                        url: base_url + "citas/get_cant_citas_estado_mes/"+seleccion,
                        type:"GET",
                        success:function(data){
                            console.log(JSON.parse(data))
                            const dataD = JSON.parse(data);
                            const dataDonut = {
                                labels: ['Atendidas', 'En Espera', 'Reprogramadas'],
                                datasets: [
                                    {
                                        data: [
                                            //dataD.cant_cita_med,
                                            dataD.cant_cita_med_ter,
                                            dataD.cant_cita_med_act,
                                            dataD.cant_cita_med_repro,
                                        ],
                                        backgroundColor: [
                                            //'#BBE4F1',
                                            '#D1ECC4',
                                            '#F7F3D4',
                                            '#ECC4C4', 
                                        ],
                                    },
                                ],
                            };

                            // Configura las opciones del gráfico
                            const options = {
                                responsive: true,
                                maintainAspectRatio: false,
                                legend: {
                                    display: true,
                                    position: 'right',
                                },
                                title: {
                                    display: true, // Muestra el título
                                    text: 'Cantidad de citas por categoria en el mes '+ mesesDonut[seleccion-1], // Texto del título
                                    fontSize: 16, // Tamaño de fuente del título
                                    fontColor: '#333', // Color del texto del título
                                },
                            };

                            // Crea el gráfico de dona
                            window.donaChart = new Chart(elemtDonutchart, {
                                type: 'doughnut',
                                data: dataDonut,
                                options: options,
                            });
                        }
                    });
                }
            });
        });

        $(document).on("click",".btn-view-venta",function(){
            valor_id = $(this).val();
            $.ajax({
                url: base_url + "tratamiento/view_presupuesto",
                type:"POST",
                dataType:"html",
                data:{id_presupuesto:valor_id},
                success:function(data){
                    $("#modal-default .modal-body").html(data);
                }
            });
        });

        $(document).on("click",".btn-print",function(){
            $("#modal-default .modal-body").print();
                // title:"Comprobante de Tratamiento"
        });

        $('.carousel').carousel({
            interval: 5000
        });
        </script>

    </body>

</html>
