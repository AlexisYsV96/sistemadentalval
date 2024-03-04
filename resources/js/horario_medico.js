$(document).ready(function() {

    $('button[name="cancelar_horario_medico"]').click(function() {

        fech_homed = "";
        hora_homed = "";
        codi_med = "";
        $('input[name="codigo"]').val("");

        $("#panel-horario-medico").removeClass("panel-primary");
        $("#panel-horario-medico").addClass("panel-success");
        $("#panel-horario-medico").find(".panel-heading h3").html("Registro de Horiario de Médico");

        $('input[name="registrar_horario_medico"]').css("display", "inherit");
        $('button[name="buscar_horario_medico"]').css("display", "inherit");
        $('input[name="limpiar_horario_medico"]').css("display", "inherit");
        $('input[name="editar_horario_medico"]').css("display", "none");
        $('button[name="cancelar_horario_medico"]').css("display", "none");

        $('input[name="limpiar_horario_medico"]').click();
    });

    $("#form_hor_med").submit(function() {
        /*if ($("#dni_med").val().length != 8) {
            alert("El D.N.I. debe contener 8 números");
            $("#dni_med").focus();
            return false;
        }
        if (dni_med != "" && dni_med != $("#dni_med").val()) {
            if (!dni_med_reg) {
                alert("El D.N.I. ingresado ya se encuentra asociado con otro médico");
                $("#dni_med").focus();
                return false;
            }
        }
        if (ruc_med != "" && ruc_med != $("#ruc_med").val()) {
            if (!ruc_med_reg) {
                alert("El R.U.C. ingresado ya se encuentra asociado con otro médico");
                $("#ruc_med").focus();
                return false;
            }
        }
        if (coleg_med != "" && coleg_med != $("#coleg_med").val()) {
            if (!coleg_med_reg) {
                alert("La colegiatura ingresada ya se encuentra asociada con otro médico");
                $("#coleg_med").focus();
                return false;
            }
        }
        if (!emai_med_reg_1) {
            alert("Formato de email no válido");
            $("#email_med").focus();
            return false;
        }
        if (emai_med != "" && emai_med != $("#dni_med").val()) {
            if (!emai_med_reg_2) {
                alert("El email ingresado ya se encuentra asociado con otro médico");
                $("#email_med").focus();
                return false;
            }
        } else {
            $("#email_med").parent().removeClass("has-error");
            $("#email_med").parent().removeClass("has-success");
            $("#error_email_med_2").css("display", "none");
        }*/
    });

    $('button[name="buscar_horario_medico"]').click(function() {
        $.ajax({
            url: base_url + 'usuario/search_horario_medico',
            type: 'post',
            success: function(resultado) {
                $("#ResultadoHorarioMedico").html(resultado);
            }
        });
    });
});