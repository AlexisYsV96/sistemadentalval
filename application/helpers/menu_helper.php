<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('show_menu')) {

    function show_menu($codi_rol = "0") {
        if ($codi_rol == "1") {
            // Menu para Administrador
            return
                    '<li class="dropdown">'.
                    '<a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="#F5B041"> Paciente </font> <b class="caret"></b></a>' .
                    '<ul class="dropdown-menu">' .
                    "<li>"
                    . '<a href="' . base_url() . 'paciente"><font color="#F5B041">Registrar</font></a>'
                    . "</li>" .
                    "<li>"
                    . '<a href="' . base_url() . 'recetas"><font color="#F5B041">Receta</font></a>'
                    . "</li>" .
                    '</ul>'.
                    "</li>".
                    "<li>"
                    . '<a href="' . base_url() . 'odontograma2">Historia clinica</a>'
                    . "</li>" .
                    '<li class="dropdown">'.
                    '<a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="#F5B041"> Tratamiento </font> <b class="caret"></b></a>' .
                    '<ul class="dropdown-menu">' .
                    "<li>"
                    . '<a href="' . base_url() . 'tratamiento"><font color="#F5B041">Registrar</font></a>'
                    . "</li>" .
                    "<li>"
                    . '<a href="' . base_url() . 'listartratamientos"><font color="#F5B041">Buscar</font></a>'
                    . "</li>" .
                    '</ul>'.
                    "</li>".
                    "<li>"
                    . '<a href="' . base_url() . 'citas"><font color="#7D3C98">Citas medicas</font></a>'
                    . "</li>" .
                    '<li class="dropdown">'.
                    '<a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="#F5B041"> Médico </font> <b class="caret"></b></a>' .
                    '<ul class="dropdown-menu">' .
                    "<li>"
                    . '<a href="' . base_url() . 'medico"><font color="#F5B041">Registrar</font></a>'
                    . "</li>" .
                    "<li>"
                    . '<a href="' . base_url() . 'horario_medico"><font color="#F5B041">Horario de Atención de Médicos</font></a>'
                    . "</li>" .
                    '</ul>'.
                    "</li>".
                    // "<li>"
                    // . '<a href="' . base_url() . 'medico"><font color="#E74C3C">Médicos</font></a>'
                    // . "</li>" .
                    //  "<li>"
                    // . '<a href="' . base_url() . 'reportes">Reportes</a>'
                    // . "</li>" .
                    '<li class="dropdown">' .
                    '<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Movimientos <b class="caret"></b></a>' .
                    '<ul class="dropdown-menu">' .

                    // "<li>"
                    // . '<a href="' . base_url() . 'tipo_inventario">Registro tipo inventario</a>'
                    // . "</li>" .
                    // "<li>".
                    //  '<a href="' . base_url() . 'inventario">Registro de almacen</a>'
                    // . "</li>" .
                    // "<li>".
                    //  '<a href="' . base_url() . 'pago">Registro pagos</a>'
                    // . "</li>" .
                    //  "<li>".
                    //  '<a href="' . base_url() . 'reportes_movimiento">Reporte movimientos</a>'
                    // . "</li>" .
                    //  "<li>".
                    //  '<a href="' . base_url() . 'reportes_almacen">Reporte almacen</a>'
                    // . "</li>" .
                     "<li>".
                     '<a href="' . base_url() . 'reportes">Reporte citas</a>'
                    . "</li>" .
                    "<li>".
                    '</ul>' .
                    "</li>" .

                    '<li class="dropdown">' .
                    '<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Ajustes <b class="caret"></b></a>' .
                    '<ul class="dropdown-menu">' .

                    // "<li>"
                    // . '<a href="' . base_url() . 'procedimiento">Tarifas</a>'
                    // . "</li>" .
                    // "<li>".
                    //  '<a href="' . base_url() . 'cie">CIE</a>'
                    // . "</li>" .
                    "<li>"
                    . '<a href="' . base_url() . 'usuario">Usuarios</a>'
                    . "</li>" .
                    "<li>".
                    "<li>"
                    . '<a href="' . base_url() . 'clinica">Clinica</a>'
                    . "</li>" .

                    '</ul>' .
                    "</li>" .

                    "<li>"
                    . '<a href="' . base_url() . 'close">Cerrar sesión</a>'
                    . "</li>";
        } else if ($codi_rol == "2") {
            // Menu para Asistente
            return
//                    "<li>"
//                    . '<a href="' . base_url() . 'about">Acerca de nosotros</a>'
//                    . "</li>" .
//                    "<li>"
//                    . '<a href="' . base_url() . 'services">Servicios</a>'
//                    . "</li>" .
//                    "<li>"
//                    . '<a href="' . base_url() . 'contact">Contacto</a>'
//                    . "</li>" .
//                    '<li class="dropdown">' .
//                    '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Test <b class="caret"></b></a>' .
//                    '<ul class="dropdown-menu">' .
//                    "<li>" .
//                    '<a href="' . base_url() . 'test/ancho_completo">Ancho completo</a>' .
//                    "</li>" .
//                    "<li>" .
//                    '<a href="' . base_url() . 'test/sidebar">Página con barra</a>' .
//                    "</li>" .
//                    '</ul>' .
//                    "</li>" .
                    "<li>"
                    . '<a href="' . base_url() . 'horario_medico">Horarios de Atención de Médicos</a>'
                    . "</li>" .
                    "<li>".
                    "<li>"
                    . '<a href="' . base_url() . 'citas">Citas médicas</a>'
                    . "</li>" .
                    "<li>"
                    . '<a href="' . base_url() . 'paciente">Pacientes</a>'
                    . "</li>" .
                    "<li>".
                    "<li>"
                    . '<a href="' . base_url() . 'close">Cerrar sesión</a>'
                    . "</li>";
        } else if ($codi_rol == "3") {
            // Menu para Medico
            return
                    "<li>"
                    . '<a href="' . base_url() . 'citas">Citas médicas</a>'
                    . "</li>" .
                    "<li>"
                    . '<a href="' . base_url() . 'odontograma2">Historia clinica</a>'
                    . "</li>" .
                    "<li>"
                    . '<a href="' . base_url() . 'recetas">Receta</a>'
                    . "</li>" .
                    "<li>"
                    . '<a href="' . base_url() . 'close">Cerrar sesión</a>'
                    . "</li>";
        }  else {
        return
//                    "<li>"
//                    . '<a href="' . base_url() . 'about">Acerca de nosotros</a>'
//                    . "</li>" .
//                    "<li>"
//                    . '<a href="' . base_url() . 'services">Servicios</a>'
//                    . "</li>" .
//                    "<li>"
//                    . '<a href="' . base_url() . 'contact">Contacto</a>'
//                    . "</li>" .
//                    '<li class="dropdown">' .
//                    '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Test <b class="caret"></b></a>' .
//                    '<ul class="dropdown-menu">' .
//                    "<li>" .
//                    '<a href="' . base_url() . 'test/ancho_completo">Ancho completo</a>' .
//                    "</li>" .
//                    "<li>" .
//                    '<a href="' . base_url() . 'test/sidebar">Página con barra</a>' .
//                    "</li>" .
//                    '</ul>' .
//                    "</li>" .
                    "<li>"
                    . '<a href="' . base_url() . 'login">Inicio de sesión</a>'
                    . "</li>";
        }
    }

}
