var nomb_pac = "";
var apel_pac = "";
var edad_pac ="";
var ocupacion ="";
var lugar_nacimiento="";
var informacion_clinica="";
var dire_pac="";
var telf_pac="";
var dni_pac="";
var fena_pac="";
var sexo_pac="";
var civi_pac="";
var esta_pac="";
var afil_pac="";
var aler_pac="";
var emai_pac="";
var titu_pac="";
var enfe_pac="";
var motivo_consulta = "";
var signos = "";
var antec_pac = "";
var presion_pac = "";
var pulso_pac = "";
var temp_pac = "";
var fc_pac = "";
var frec_resp = "";
var exam_clinico = "";
var exam_complementario = "";
var odonestomalogico = "";
var diagn_pac = "";


$(document).ready(function() {

    $('button[name="cancelar_paciente"]').click(function() {

        nomb_pac = "";
 apel_pac = "";
 edad_pac ="";
 ocupacion ="";
 lugar_nacimiento="";
 informacion_clinica="";
 dire_pac="";
 telf_pac="";
dni_pac="";
 fena_pac="";
 sexo_pac="";
 civi_pac="";
 esta_pac="";
 afil_pac="";
 aler_pac="";
 emai_pac="";
 titu_pac="";
 enfe_pac="";
 motivo_consulta = "";
 signos = "";
 antec_pac = "";
 presion_pac = "";
 pulso_pac = "";
 temp_pac = "";
 fc_pac = "";
 frec_resp = "";
 exam_clinico = "";
 exam_complementario = "";
 odonestomalogico = "";
 diagn_pac = "";

        $('input[name="codigo"]').val("");

        $("#panel-paciente").removeClass("panel-primary");
        $("#panel-paciente").addClass("panel-success");
        $("#panel-paciente").find(".panel-heading h3").html("Registro de paciente");

        $('input[name="registrar_paciente"]').css("display", "inherit");
        $('button[name="buscar_paciente"]').css("display", "inherit");
        $('input[name="limpiar_paciente"]').css("display", "inherit");
        $('input[name="agregar_placa"]').css("display", "none");
        $('input[name="editar_paciente"]').css("display", "none");
        $('button[name="cancelar_paciente"]').css("display", "none");

        $('#error_nomb_apel_1_pac').css("display", "none");
        $('#error_dni_paciente').css("display", "none");
        $('#error_dni_pac_1').css("display", "none");
        $('#error_telf_paciente').css("display", "none");
        $('#error_email_pac_1').css("display", "none");
        $('#error_email_pac_2').css("display", "none");

        $("#dni_pac").parent().removeClass("has-error");
        $("#dni_pac").parent().removeClass("has-success");
        $("#email_pac").parent().removeClass("has-error");
        $("#email_pac").parent().removeClass("has-success");

        $('input[name="limpiar_paciente"]').click();
    });

    var emai_pac_reg_1 = true;
    var emai_pac_reg_2 = true;
    var dni_pac_reg = true;

    $("#btnCancelarModalPaciente").click(function() {
        $("#ValorPaciente").val("");
    });

    $('#bPlaca').click(function() {

        $.ajax({
            url: base_url + 'usuario/BuscarPlaca/'+$("input[name='codigo']").val(),
            type: 'get',
            success: function(resultado) {
                $("#ResultadoPacientePlaca").empty();
                $("#ResultadoPacientePlaca").html(resultado);
            }
        });
    });

    $('button[name="buscar_paciente"]').click(function() {

        $.ajax({
            url: base_url + 'usuario/search_paciente',
            type: 'post',
            success: function(resultado) {
                $("#ResultadoPaciente").html(resultado);
            }
        });
    });

    function verificar_input_nombre_apellido_pac() {

        var nombre = $("#nombre_pac").val();
        var apellido = $("#apellido_pac").val();

        $.ajax({
            data: {'nombre': nombre, 'apellido': apellido},
            url: base_url + 'usuario/validar_input_nombre_apellido_pac',
            type: 'post',
            success: function(mensaje) {
                if (mensaje == "error") {
                    $("#error_nomb_apel_1_pac").css("display", "inherit");
                } else {
                    $("#error_nomb_apel_1_pac").css("display", "none");
                }
            }
        });
    }

    $("#nombre_pac").blur(function() {
        verificar_input_nombre_apellido_pac();
    });
    $("#apellido_pac").blur(function() {
        verificar_input_nombre_apellido_pac();
    });

    $("#dni_pac").blur(function() {
        if ((dni_pac != "" && dni_pac != $("#dni_pac").val()) || dni_pac == "") {
            validar_dni_pac_reg();
        } else {
            $("#dni_pac").parent().removeClass("has-error");
            $("#dni_pac").parent().removeClass("has-success");
            $("#error_dni_pac_1").css("display", "none");
            dni_pac_reg = true;
        }
    });

    function validar_dni_pac_reg() {
        $.ajax({
            data: {'dni': $("#dni_pac").val()},
            url: base_url + 'usuario/validar_exists_dni_pac',
            type: 'post',
            success: function(mensaje) {
                if (mensaje == "error") {
                    $("#dni_pac").parent().addClass("has-error");
                    $("#error_dni_pac_1").css("display", "inherit");
                    dni_pac_reg = false;
                } else {
                    dni_pac_reg = true;
                }
            }
        });
    }

    $("#form_pac").submit(function() {
        if ($("#dni_pac").val().length != 8) {
            alert("El D.N.I. debe contener 8 números");
            $("#dni_pac").focus();
            return false;
        }
        if (dni_pac != "" && dni_pac != $("#dni_pac").val()) {
            if (!dni_pac_reg) {
                alert("El D.N.I. ingresado ya se encuentra asociado con otro paciente");
                $("#dni_pac").focus();
                return false;
            }
            else{
                  $("#dni_pac").parent().removeClass("has-error");
            $("#dni_pac").parent().removeClass("has-success");
            $("#error_dni_pac_1").css("display", "none");
      
            }
        }
        if (!emai_pac_reg_1) {
            alert("Formato de email no válido");
            $("#email_pac").focus();
            return false;
        }
        if (emai_pac != "" && emai_pac != $("#dni_pac").val()) {
            if (!emai_pac_reg_2) {
                alert("El email ingresado ya se encuentra asociado con otro paciente");
                $("#email_pac").focus();
                return false;
            }
        } else {
            $("#email_pac").parent().removeClass("has-error");
            $("#email_pac").parent().removeClass("has-success");
            $("#error_email_pac_2").css("display", "none");
        }
    });
    // Datepicker: Fecha de nacimiento - Paciente
    $("#dp_fecha_pac").datepicker();
    // Validar entrada DNI - Paciente 
    $("#dni_pac").keydown(function(e) {
//        alert(e.which);
        $('#error_dni_paciente').css("display", "none");
        var claves_numericas = ["48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "8", "37", "39",
            "96", "97", "98", "99", "100", "101", "102", "103", "104", "105", "9"];
        for (x = 0; x < claves_numericas.length; x++) {

            if (e.which == claves_numericas[x]) {
                return true;
            }
        }
        $('#error_dni_paciente').css("display", "inline");
        setTimeout(function() {
            $('#error_dni_paciente').slideUp(1000);
        }, 2000);
        return false;
    });
    $("#dni_pac").blur(function(e) {

        var dni = $("#dni_pac").val();
        var claves_numericas = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
        var caracter_no_valido = [];
        for (var i = 0; i < dni.length; i++) {
            var caracter = dni.charAt(i);
            var caracter_valido = false;
            for (x = 0; x < claves_numericas.length; x++) {

                if (caracter == claves_numericas[x]) {
                    caracter_valido = true;
                }
            }

            if (!caracter_valido) {

                var find_caracter_no_valido = false;
                for (x = 0; x < caracter_no_valido.length; x++) {

                    if (caracter == caracter_no_valido[x]) {
                        find_caracter_no_valido = true;
                    }
                }
                if (!find_caracter_no_valido) {
                    caracter_no_valido.push(caracter);
                }
            }
        }
        var dni_mod = dni;
        for (var i = 0; i < dni.length; i++) {
            var char = dni.charAt(i);
            for (x = 0; x < caracter_no_valido.length; x++) {
                if (char == caracter_no_valido[x]) {
                    dni_mod = dni_mod.replace(caracter_no_valido[x], '');
                    break;
                }
            }
        }
        $("#dni_pac").val(dni_mod);
        if (dni_mod.length > 0) {

            if ($('input[name="registrar_paciente"]').is(':visible')) {
                validar_dni_pac_reg();
            } else {
                $("#dni_pac").parent().removeClass("has-error");
                $("#dni_pac").parent().removeClass("has-success");
                $("#error_dni_pac_1").css("display", "none");
                dni_pac_reg = true;
            }

        } else {
            $("#dni_pac").parent().removeClass("has-error");
            $("#dni_pac").parent().removeClass("has-success");
            $("#error_dni_pac_1").css("display", "none");
        }
    });
    $("#telefono_pac").keydown(function(e) {
//        alert(e.which);
        $('#error_telf_paciente').css("display", "none");
        var claves_numericas = ["48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "8", "37", "39",
            "96", "97", "98", "99", "100", "101", "102", "103", "104", "105", "9", "32", "189", "16"];
        for (x = 0; x < claves_numericas.length; x++) {

            if (e.which == claves_numericas[x]) {
                return true;
            }
        }
        $('#error_telf_paciente').css("display", "inline");
        setTimeout(function() {
            $('#error_telf_paciente').slideUp(1000);
        }, 2000);
        return false;
    });
    $("#telefono_pac").blur(function(e) {

        var telefono = $("#telefono_pac").val();
        var claves_numericas = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "(", ")", " ", "-"];
        var caracter_no_valido = [];
        for (var i = 0; i < telefono.length; i++) {
            var caracter = telefono.charAt(i);
            var caracter_valido = false;
            for (x = 0; x < claves_numericas.length; x++) {

                if (caracter == claves_numericas[x]) {
                    caracter_valido = true;
                }
            }

            if (!caracter_valido) {

                var find_caracter_no_valido = false;
                for (x = 0; x < caracter_no_valido.length; x++) {

                    if (caracter == caracter_no_valido[x]) {
                        find_caracter_no_valido = true;
                    }
                }
                if (!find_caracter_no_valido) {
                    caracter_no_valido.push(caracter);
                }

            }
        }
        var telefono_mod = telefono

        for (var i = 0; i < telefono.length; i++) {
            var char = telefono.charAt(i);
            for (x = 0; x < caracter_no_valido.length; x++) {
                if (char == caracter_no_valido[x]) {
                    telefono_mod = telefono_mod.replace(caracter_no_valido[x], '');
                    break;
                }
            }
        }
        $("#telefono_pac").val(telefono_mod);
    });
    $("#email_pac").blur(function(e) {
        $("#error_email_pac_1").css("display", "none");
        $("#error_email_pac_2").css("display", "none");
        
        var email_pac = $("#email_pac").val();
        if (email_pac.length > 0) {
            if (emai_pac != "" && emai_pac != email_pac) {
                $.ajax({
                    data: {'email': email_pac},
                    url: base_url + 'usuario/validar_input_email',
                    type: 'post',
                    success: function(mensaje) {
                        if (mensaje == "error") {
                            $("#email_pac").parent().addClass("has-error");
                            $("#error_email_pac_1").css("display", "inherit");
                            emai_pac_reg_1 = false;
                        } else {
                            emai_pac_reg_1 = true;
                            $("#email_pac").parent().removeClass("has-error");
                            $("#error_email_pac_1").css("display", "none");
                            $.ajax({
                                data: {'email_2': email_pac},
                                url: base_url + 'usuario/validar_exists_email_pac',
                                type: 'post',
                                success: function(mensaje) {
                                    if (mensaje == "error") {
                                        $("#email_pac").parent().addClass("has-error");
                                        $("#error_email_pac_2").css("display", "inherit");
                                        emai_pac_reg_2 = false;
                                    } else {
                                        $("#email_pac").parent().removeClass("has-error");
                                        $("#email_pac").parent().addClass("has-success");
                                        $("#error_email_pac_2").css("display", "none");
                                        emai_pac_reg_2 = true;
                                    }
                                }
                            });
                        }
                    }
                });
            } else if (emai_pac == "") {
                $.ajax({
                    data: {'email': email_pac},
                    url: base_url + 'usuario/validar_input_email',
                    type: 'post',
                    success: function(mensaje) {
                        if (mensaje == "error") {
                            $("#email_pac").parent().addClass("has-error");
                            $("#error_email_pac_1").css("display", "inherit");
                            emai_pac_reg_1 = false;
                        } else {
                            emai_pac_reg_1 = true;
                            $("#email_pac").parent().removeClass("has-error");
                            $("#error_email_pac_1").css("display", "none");
                            $.ajax({
                                data: {'email_2': email_pac},
                                url: base_url + 'usuario/validar_exists_email_pac',
                                type: 'post',
                                success: function(mensaje) {
                                    if (mensaje == "error") {
                                        $("#email_pac").parent().addClass("has-error");
                                        $("#error_email_pac_2").css("display", "inherit");
                                        emai_pac_reg_2 = false;
                                    } else {
                                        $("#email_pac").parent().removeClass("has-error");
                                        $("#email_pac").parent().addClass("has-success");
                                        $("#error_email_pac_2").css("display", "none");
                                        emai_pac_reg_2 = true;
                                    }
                                }
                            });
                        }
                    }
                });
            }
        } else {
            $("#email_pac").parent().removeClass("has-error");
            $("#email_pac").parent().removeClass("has-success");
            $("#error_email_pac_1").css("display", "none");
            $("#error_email_pac_2").css("display", "none");
        }

    });

function showMessage(message){
    $(".messages").html("").show();
    $(".messages").html(message);
}
 
//comprobamos si el archivo a subir es una imagen
//para visualizarla una vez haya subido
function isImage(extension)
{
    switch(extension.toLowerCase()) 
    {
        case 'jpg': case 'gif': case 'png': case 'jpeg':
            return true;
        break;
        default:
            return false;
        break;
    }
}

$('#bAgregarPlaca').bind("click",function() 
    { 
        var imgVal = $('#imagen').val(); 
        if(imgVal=='') 
        { 
            swal({
                title:"VITAL DENT",
                text: "Seleccione una imagen primero...",
                type: "info"
            }); 

        }
        else
        {
            AgregarImagen();
        }
        return false; 

    }); 

$("#iCargarImagen").click(function(){
    $("#imagen").click()
});


$(':file').change(function()
    {
        //función que observa los cambios del campo file y obtiene información
        //obtenemos un array con los datos del archivo
        var file = $("#imagen")[0].files[0];
        //obtenemos el nombre del archivo
        var fileName = file.name;
        //obtenemos la extensión del archivo
        fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
        //obtenemos el tamaño del archivo
        var fileSize = file.size;
        //obtenemos el tipo de archivo image/png ejemplo
        var fileType = file.type;
        //mensaje con la información del archivo
    showMessage("<span class='info'>Archivo para subir: "+fileName+", peso total: "+fileSize+" bytes.</span>");
});

function AgregarImagen(){
    $(".messages").hide();
    //queremos que esta variable sea global
    var fileExtension = "";
        var file = $("#imagen")[0].files[0];
        var formData = new FormData();
        formData.append('archivo', file);
        var message = ""; 
        //hacemos la petición ajax  
        $.ajax({
            url: 'usuario/GrabarImagen/'+$("input[name='codigo']").val(),  
            type: 'POST',
            // Form data
            //datos del formulario
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
                message = $("<span class='before'>Subiendo la imagen, por favor espere...</span>");
                showMessage(message)        
            },
            //una vez finalizado correctamente
            success: function(data){
                message = $("<span class='success'>La imagen ha subido correctamente.</span>");
                RecargarListaPlaca();
                showMessage(message);
                $("#imagen").val("");
                if(isImage(fileExtension))
                {
                    $(".showImage").html("<img src='files/"+$("input[name='codigo']").val()+"/"+data+"' />");
                }
            },
            //si ha ocurrido un error
            error: function(){
                message = $("<span class='error'>Ha ocurrido un error.</span>");
                showMessage(message);
            }
        });
    }

    $("#bVerPlaca").click(function(){
        var table = $("#table-search-paciente-placa").DataTable();
        var Datos = table.row('.selected').data();
       
        if (Datos != null) {
            $("#iPlaca").attr("src", "files/"+$("input[name='codigo']").val()+"/"+Datos[1]);
            $("#dModalVerPlaca").modal("show");
        }else{
            swal({
                title: "VITA DENT",
                text: "Seleccione un registro de la tabla...",
                type: "info"
            });
        }
    });

    $("#bCerrarPlaca").click(function(){
        $("#dModalVerPlaca").modal("hide");
    });

    function RecargarListaPlaca(){
        $.ajax({
            url: base_url + 'usuario/BuscarPlaca/'+$("input[name='codigo']").val(),
            type: 'get',
            success: function(resultado) {
                $("#ResultadoPacientePlaca").empty();
                $("#ResultadoPacientePlaca").html(resultado);
            }
        });
    }


    
    $("#bInactivarPlacaPaciente").click(function(){
var table = $("#table-search-paciente-placa").DataTable();
        var Datos = table.row('.selected').data();
        if (Datos != null) {
           swal({
  title: "Deshabilitar la placa?",
  text: "Tu no podrás visualizar este archivo de imagen!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: "Si, Deshabilitar!",
}).then((result) => {
  if (result) {
    $.ajax({
            url: "usuario/InactivarPlaca/" + Datos[0],  
            type: 'POST',
            // Form data
            //datos del formulario
            datatype: "JSON",
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
                //Agregar swal de loading      
            },
            //una vez finalizado correctamente
            success: function(data){
                swal({
    title: 'VITAL DENT!',
    text: 'La placa ha sido inactivada.',
    type: 'success'
  });
            },
            //si ha ocurrido un error
            error: function(){
                //Agregar swal de error
            }
        });
RecargarListaPlaca();
        }else{
            swal({
                title: "VITA DENT",
                text: "Seleccione un registro de la tabla...",
                type: "info"
            });
        }



})
        }
    });
});