<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('mod_medico', 'mod_paciente', 'mod_usuario', 'mod_clinica', 'mod_licence','mod_horario_medico'));
        $this->load->library('session');
    }

    public function index() {
        if (!$this->logged()) {
            header('location: ' . base_url('login'));
        } else {
            if (!$this->admin()) {
                header('location: ' . base_url('login'));
            } else {
                $usuario["form"] = array('role' => 'form', "id" => "form_usu");
                $usuario["form_editar"] = array('role' => 'form', "id" => "form_usu_edit");
                $usuario["form_a"] = array('role' => 'form', "style" => "display: inline-block;");
                $usuario["login"] = array('id' => 'logi_usu', 'name' => 'login', 'class' => "form-control", 'placeholder' => "Nombre de usuario", "maxlength" => "16", 'required' => 'true', 'autocomplete' => 'off');
                $usuario["pass"] = array('id' => 'pass_usu', 'name' => 'pass', 'class' => "form-control", 'placeholder' => "Contraseña", "maxlength" => "16", 'required' => 'true', 'autocomplete' => 'off');
                $usuario["con_pass"] = array('id' => 'con_pass_usu', 'name' => 'con_pass', 'class' => "form-control", 'placeholder' => "Vuelva a ingresar contraseña", "maxlength" => "16", 'required' => 'true', 'autocomplete' => 'off');
                $usuario["codigo_e"] = array('id' => 'codi_usu_e', 'name' => 'codigo', 'class' => "form-control", 'required' => 'true', 'readonly' => 'true');
                $usuario["login_e"] = array('id' => 'logi_usu_e', 'name' => 'login', 'class' => "form-control", 'placeholder' => "Nombre de usuario", "maxlength" => "16", 'required' => 'true', 'autocomplete' => 'off');
                $usuario["pass_e"] = array('id' => 'pass_usu_e', 'name' => 'pass', 'class' => "form-control", 'placeholder' => "Contraseña", "maxlength" => "16", 'autocomplete' => 'off');
                $usuario["con_pass_e"] = array('id' => 'con_pass_usu_e', 'name' => 'con_pass', 'class' => "form-control", 'placeholder' => "Vuelva a ingresar contraseña", "maxlength" => "16", 'autocomplete' => 'off');
                $usuario["registrar"] = array('name' => 'registrar', 'class' => "btn btn-primary", 'value' => "Registrar");
                $usuario["editar"] = array('name' => 'editar', 'class' => "btn btn-primary", 'value' => "Editar");

                $rol = $this->mod_usuario->get_rol();
                foreach ($rol as $row) {
                    $roles[$row->codi_rol] = $row->nomb_rol;
                }
                $usuario["roles"] = $roles;
                if ($this->input->post('registrar')) {
                    $logi_usu = $this->input->post('login');
                    $pass_usu = md5($this->input->post('pass'));
                    $codi_rol = $this->input->post('rol');

                    $data = array(
                        'logi_usu' => $logi_usu,
                        'pass_usu' => $pass_usu,
                        'codi_rol' => $codi_rol,
                        'esta_usu' => 'A'
                    );
                    $this->mod_usuario->insert_usu($data);
                    $this->session->set_userdata('mensaje_usu', 'El usuario ' . $logi_usu . ' ha sido registrado existosamente');
                } else if ($this->input->post('editar')) {
                    $codi_usu = $this->input->post('codigo');
                    $logi_usu = $this->input->post('login');
                    $pass_usu = md5($this->input->post('pass'));
                    $codi_rol = $this->input->post('rol_e');

                    $data = array(
                        'logi_usu' => $logi_usu,
                        'codi_rol' => $codi_rol
                    );

                    if ($pass_usu != "") {
                        $data['pass_usu'] = $pass_usu;
                    }

                    $this->mod_usuario->update_usu($codi_usu, $data);
                    $this->session->set_userdata('mensaje_usu', 'El usuario ' . $logi_usu . ' ha sido actualizado existosamente');
                } else if ($this->input->post('activar')) {
                    $codi_usu = $this->input->post('codigo');
                    $logi_usu = $this->input->post('usuario');
                    $this->mod_usuario->update_usu($codi_usu, array("esta_usu" => "A"));
                    $this->session->set_userdata('mensaje_usu', 'El usuario ' . $logi_usu . ' ha sido habilitado existosamente');
                } else if ($this->input->post('desactivar')) {
                    $codi_usu = $this->input->post('codigo');
                    $logi_usu = $this->input->post('usuario');
                    $this->mod_usuario->update_usu($codi_usu, array("esta_usu" => "D"));
                    $this->session->set_userdata('mensaje_usu', 'El usuario ' . $logi_usu . ' ha sido deshabilitado existosamente');
                }
                $usuario['usuarios'] = $this->mod_usuario->get_tbl_usuario();
              
                $data['container'] = $this->load->view('usuario/index', $usuario, true);
                $data['clinica'] = $this->mod_clinica->get_clinica();
                $this->load->view('home/body', $data);
            }
        }
    }

    public function medico() {
        if (!$this->logged()) {
            header('location: ' . base_url('login'));
        } else {
            if (!$this->admin()) {
                header('location: ' . base_url('login'));
            } else {
                $this->form_validation->set_rules('nombre', 'Nombre', 'required');
                $this->form_validation->set_rules('apellido', 'Apellido', 'required');
                $this->form_validation->set_rules('dni', 'DNI', 'required');
                $this->form_validation->set_rules('telefono', 'Telefono', 'required');
                $this->form_validation->set_rules('fecha', 'Fecha', 'required');
                $this->form_validation->set_rules('sexo', 'Sexo', 'required');

                if ($this->form_validation->run() == FALSE) {
                    $medico["form"] = array('role' => 'form', "id" => "form_med");
                    $medico["nombres"] = array('id' => 'nombre_med', 'name' => 'nombre', 'class' => "form-control", 'placeholder' => "Nombre", "maxlength" => "20", 'required' => 'true', "autocomplete" => "off");
                    $medico["apellidos"] = array('id' => 'apellido_med', 'name' => 'apellido', 'class' => "form-control", 'placeholder' => "Apellido", "maxlength" => "20", 'required' => 'true', "autocomplete" => "off");
                    $medico["dni"] = array('id' => 'dni_med', 'name' => 'dni', 'class' => "form-control", 'placeholder' => "D.N.I.", "maxlength" => "8", 'required' => 'true', "autocomplete" => "off");
                    $medico["ruc"] = array('id' => 'ruc_med', 'name' => 'ruc', 'class' => "form-control", 'placeholder' => "R.U.C.", "maxlength" => "11", 'required' => 'true', "autocomplete" => "off");
                    $medico["coleg"] = array('id' => 'coleg_med', 'name' => 'coleg', 'class' => "form-control", 'placeholder' => "Colegiatura", "maxlength" => "15", 'required' => 'true', "autocomplete" => "off");
                    $medico["telefono"] = array('id' => 'telefono_med', 'name' => 'telefono', 'class' => "form-control", 'placeholder' => "Teléfono", "maxlength" => "10", 'required' => 'true', "autocomplete" => "off");
                    $medico["direccion"] = array('id' => 'direccion_med', 'name' => 'direccion', 'class' => "form-control", 'placeholder' => "Dirección", "maxlength" => "100");
                    $medico["email"] = array('id' => 'email_med', 'name' => 'email', 'class' => "form-control", 'placeholder' => "E-mail", "maxlength" => "100", "autocomplete" => "off");
                    $medico["fecha"] = array('id' => 'fecha_med', 'name' => 'fecha', 'class' => "form-control span2", "size" => "16", "value" => "1970-01-01", "style" => "background: white;", "readonly" => "true");
                    $medico["masculino"] = array('id' => 'masculino_med', 'name' => 'sexo', "value" => "M", 'required' => "true");
                    $medico["femenino"] = array('id' => 'femenino_med', 'name' => 'sexo', "value" => "F", 'required' => "true");

                    $medico["registrar_medico"] = array('name' => 'registar_medico', 'class' => "btn btn-lg btn-success btn-block", 'value' => "Registrar");
                    $medico["editar_medico"] = array('name' => 'editar_medico', 'class' => "btn btn-lg btn-primary btn-block", 'value' => "Editar", "style" => "display: none;");
                    $medico["cancelar_medico"] = array('name' => 'cancelar_medico', 'class' => "btn btn-lg btn-default btn-block", 'value' => "true", "style" => "display: none;", "content" => "Cancelar");
                    $medico["buscar_medico"] = array('name' => 'buscar_medico', 'class' => "btn btn-lg btn-default btn-block", 'value' => "true", "content" => "Buscar", "data-toggle" => "modal", "data-target" => "#ModalMedico");
                    $medico["limpiar_medico"] = array('name' => 'limpiar_medico', 'class' => "btn btn-lg btn-default btn-block", 'value' => "Limpiar");

                    $data['container'] = $this->load->view('usuario/medico', $medico, true);
                    $data['clinica'] = $this->mod_clinica->get_clinica();
                    $this->load->view('home/body', $data);
                } else {
                    $nombres = $this->input->post('nombre');
                    $apellidos = $this->input->post('apellido');
                    $dni = $this->input->post('dni');
                    $ruc = $this->input->post('ruc');
                    $coleg = $this->input->post('coleg');
                    $telefono = $this->input->post('telefono');
                    $direccion = $this->input->post('direccion');
                    $email = $this->input->post('email');
                    $fecha = $this->input->post('fecha');
                    $sexo = $this->input->post('sexo');
                    $registar_medico = $this->input->post('registar_medico');
                    $editar_medico = $this->input->post('editar_medico');

                    $data = array(
                        'nomb_med' => $nombres,
                        'apel_med' => $apellidos,
                        'dni_med' => $dni,
                        'ruc_med' => $ruc,
                        'coleg_med' => $coleg,
                        'telf_med' => $telefono,
                        'fena_med' => $fecha,
                        'sexo_med' => $sexo,
                        'esta_med' => 'A'
                    );

                    if ($direccion) {
                        $data["dire_med"] = $direccion;
                    }
                    if ($email) {
                        $data["emai_med"] = $email;
                    }

                    if ($registar_medico) {
                        $this->mod_medico->insert_med($data);
                        $this->session->set_userdata('error_medico_1', 'El médico ' . $nombres . ' ' . $apellidos . ' ha sido registrado existosamente');
                    } else if ($editar_medico) {
                        $this->mod_medico->update_med($this->input->post('codigo'), $data);
                        $this->session->set_userdata('error_medico_1', 'El médico ' . $nombres . ' ' . $apellidos . ' ha sido actualizado existosamente');
                    }
                    header('Location: ' . base_url() . 'medico');
                }
            }
        }
    }

    public function paciente() {
        if (!$this->logged()) {
            header('location: ' . base_url('login'));
        } else {

            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('apellidos', 'Apellido', 'required');
            $this->form_validation->set_rules('dni', 'DNI', 'required');
            $this->form_validation->set_rules('telefono', 'Telefono', 'required');
            $this->form_validation->set_rules('fecha', 'Fecha', 'required');
            $this->form_validation->set_rules('sexo', 'Sexo', 'required');

            if ($this->form_validation->run() == FALSE) {
                $paciente["form"] = array('role' => 'form', "id" => "form_pac");
                $paciente["nombres"] = array('id' => 'nombre_pac', 'name' => 'nombre', 'class' => "form-control", 'placeholder' => "Nombre", "maxlength" => "20", 'required' => 'true', "autocomplete" => "off");
                $paciente["apellidos"] = array('id' => 'apel_pac', 'name' => 'apellidos', 'class' => "form-control", 'placeholder' => "Apellido", "maxlength" => "20", 'required' => 'true', "autocomplete" => "off");
                $paciente["edad"] = array('id' => 'edad_pac','name'=>'edad','class'=> "form-control","placeholder" => "Edad","maxlength" =>"20",'required'=>'true',"autocomplete" =>"off" );
                $paciente["dni"] = array('id' => 'dni_pac', 'name' => 'dni', 'class' => "form-control", 'placeholder' => "D.N.I.", "maxlength" => "8", 'required' => 'true', "autocomplete" => "off");
                $paciente["telefono"] = array('id' => 'telefono_pac', 'name' => 'telefono', 'class' => "form-control", 'placeholder' => "Teléfono", "maxlength" => "20", 'required' => 'true', "autocomplete" => "off");
                $paciente["direccion"] = array('id' => 'direccion_pac', 'name' => 'direccion', 'class' => "form-control", 'placeholder' => "Dirección", "maxlength" => "100");
                $paciente["email"] = array('id' => 'email_pac', 'name' => 'email', 'class' => "form-control", 'placeholder' => "E-mail", "maxlength" => "100", "autocomplete" => "off");
                $paciente["enfermedad"] = array('id' => 'enfermedad_pac', 'name' => 'enfermedad', 'class' => "form-control", 'placeholder' => "Enfermedad", "maxlength" => "120", "autocomplete" => "off");
                $paciente["alergia"] = array('id' => 'alergia_pac', 'name' => 'alergia', 'class' => "form-control", 'placeholder' => "Alergia", "maxlength" => "120", "autocomplete" => "off");
                //$paciente["ocupacion"] = array('id' => 'ocupacion', 'name' => 'ocupacion', 'class' => "form-control", 'placeholder' => "Ocupación", "maxlength" => "30", "autocomplete" => "off");
                $paciente["lugarnacimiento"] = array('id' => 'lugar_nacimiento', 'name' => 'lugarnacimiento', 'class' => "form-control", 'placeholder' => "Lugar de nacimiento", "maxlength" => "30", "autocomplete" => "off");
                //$paciente["informacion_clinica"] = array('id' => 'informacion_clinica', 'name' => 'informacion_clinica', 'class' => "form-control", 'placeholder' => "Cómo...", "maxlength" => "30", "autocomplete" => "off");
                //$paciente["sintomas"] = array('id' => 'sintomas_pac', 'name' => 'sintomas', 'class' => "form-control", 'placeholder' => "Afiliacion", "maxlength" => "30", "autocomplete" => "off");

                //$paciente["afiliacion_eps"] = array('id' => 'afiliacion_eps', 'name' => 'afiliacion', "value" => "EPS", 'required' => "true");
                //$paciente["afiliacion_particular"] = array('id' => 'afiliacion_particular', 'name' => 'afiliacion', "value" => "Particular", 'required' => "true");

                $paciente["titular"] = array('id' => 'titular_pac', 'name' => 'titular', 'class' => "form-control", 'placeholder' => "Titular", "maxlength" => "75", "autocomplete" => "off");
                $paciente["fecha"] = array('id' => 'fecha_pac', 'name' => 'fecha', 'class' => "form-control span2", "size" => "16", "value" => "1970-01-01", "style" => "background: white;", "readonly" => "true");
                $paciente["masculino"] = array('id' => 'masculino_pac', 'name' => 'sexo', "value" => "M", 'required' => "true");
                $paciente["femenino"] = array('id' => 'femenino_pac', 'name' => 'sexo', "value" => "F", 'required' => "true");
                //$paciente["soltero"] = array('id' => 'soltero_pac', 'name' => 'civil', "value" => "S", 'required' => "true");
                //$paciente["casado"] = array('id' => 'casado_pac', 'name' => 'civil', "value" => "C", 'required' => "true");
                //$paciente["divorciado"] = array('id' => 'divorciado_pac', 'name' => 'civil', "value" => "D", 'required' => "true");

                $paciente["motivoconsulta"] = array('id' => 'motivo_consulta', 'name' => 'motivoconsulta', 'class' => "form-control", 'placeholder' => "Motivo", "maxlength" => "30", "autocomplete" => "off");
                $paciente["signos"] = array('id' => 'signos', 'name' => 'signos', 'class' => "form-control", 'placeholder' => "Signos", "maxlength" => "30", "autocomplete" => "off");
                $paciente["antec_pac"] = array('id' => 'antec_pac', 'name' => 'antec_pac', 'class' => "form-control", 'placeholder' => "Antecedentespersonales", "maxlength" => "200", "autocomplete" => "off");
                $paciente["presion_pac"] = array('id' => 'presion_pac', 'name' => 'presion_pac', 'class' => "form-control", 'placeholder' => "Presion", "maxlength" => "8", "autocomplete" => "off");
                $paciente["pulso"] = array('id' => 'pulso_pac', 'name' => 'pulso', 'class' => "form-control", 'placeholder' => "Pulso", "maxlength" => "30", "autocomplete" => "off");
                $paciente["temperatura"] = array('id' => 'temp_pac', 'name' => 'temperatura', 'class' => "form-control", 'placeholder' => "Temperatura", "maxlength" => "30", "autocomplete" => "off");
                $paciente["frecuencia"] = array('id' => 'fc_pac', 'name' => 'frecuencia', 'class' => "form-control", 'placeholder' => "Frecuencia", "maxlength" => "30", "autocomplete" => "off");
                $paciente["frecuenciarespiratoria"] = array('id' => 'frec_resp', 'name' => 'frecuenciarespiratoria', 'class' => "form-control", 'placeholder' => "Frecuencia", "maxlength" => "30", "autocomplete" => "off");
                $paciente["examenclinico"] = array('id' => 'exam_clinico', 'name' => 'examenclinico', 'class' => "form-control", 'placeholder' => "Clinico", "maxlength" => "200", "autocomplete" => "off");
                $paciente["examencomplementario"] = array('id' => 'exam_complementario', 'name' => 'examencomplementario', 'class' => "form-control", 'placeholder' => "Complementario", "maxlength" => "200", "autocomplete" => "off");
                $paciente["odontoestomalogico"] = array('id' => 'odonestomalogico', 'name' => 'odontoestomalogico', 'class' => "form-control", 'placeholder' => " ", "maxlength" => "200", "autocomplete" => "off");
                $paciente["diagnostico"] = array('id' => 'diagn_pac', 'name' => 'diagnostico', 'class' => "form-control", 'placeholder' => "Diagnostico..", "maxlength" => "300", "autocomplete" => "off");
                $paciente["registrar_paciente"] = array('name' => 'registrar_paciente', 'class' => "btn btn-lg btn-success btn-block", 'value' => "Registrar");
                $paciente["editar_paciente"] = array('name' => 'editar_paciente', 'class' => "btn btn-lg btn-primary btn-block", 'value' => "Editar", "style" => "display: none;");
                $paciente["cancelar_paciente"] = array('name' => 'cancelar_paciente', 'class' => "btn btn-lg btn-default btn-block", 'value' => "true", "style" => "display: none;", "content" => "Cancelar");
                $paciente["buscar_paciente"] = array('name' => 'buscar_paciente', 'class' => "btn btn-lg btn-default btn-block", 'value' => "true", "content" => "Buscar", "data-toggle" => "modal", "data-target" => "#ModalPaciente");
                $paciente["limpiar_paciente"] = array('name' => 'limpiar_paciente', 'class' => "btn btn-lg btn-default btn-block", 'value' => "Limpiar");
                $paciente["codigo_paciente"]=$this->mod_usuario->correlativo();
        
                $data['container'] = $this->load->view('usuario/paciente', $paciente, true);
                $data['clinica'] = $this->mod_clinica->get_clinica();
                $this->load->view('home/body', $data);
            } else {
                $nombres = $this->input->post('nombre');
                $apellidos = $this->input->post('apellidos');
                $edad=$this->input->post('edad');
                $dni = $this->input->post('dni');
                $telefono = $this->input->post('telefono');
                $direccion = $this->input->post('direccion');
                $email = $this->input->post('email');
                $enfermedad = $this->input->post('enfermedad');
                $alergia = $this->input->post('alergia');
                //$ocupacion = $this->input->post('ocupacion');
                $lugarnacimiento = $this->input->post('lugarnacimiento');
                //$informacion_clinica = $this->input->post('informacion_clinica');
                //$afiliacion = $this->input->post('afiliacion');
                $titular = $this->input->post('titular');
                $fecha = $this->input->post('fecha');
                $sexo = $this->input->post('sexo');
                //$civil = $this->input->post('civil');
                // $sintomas = $this->input->post('sintomas');
                $motivoconsulta = $this->input->post('motivoconsulta');
                $signos = $this->input->post('signos');
                $antec_pac = $this->input->post('antec_pac');
                $presion_pac = $this->input->post('presion_pac');
                $pulso = $this->input->post('pulso');
                $temperatura = $this->input->post('temperatura');
                $frecuencia = $this->input->post('frecuencia');
                $frecuenciarespiratoria = $this->input->post('frecuenciarespiratoria');
                $examenclinico = $this->input->post('examenclinico');
                $examencomplementario = $this->input->post('examencomplementario');
                $odontoestomalogico = $this->input->post('odontoestomalogico');
                $diagnostico = $this->input->post('diagnostico');
                $registar_paciente = $this->input->post('registrar_paciente');
                $agregar_placa = $this->input->post('agregar_placa');
                $editar_paciente = $this->input->post('editar_paciente');

                $data = array(
                    'nomb_pac' => $nombres,
                    'apel_pac' => $apellidos,
                    'edad_pac'=>$edad,
                    'dni_pac' => $dni,
                    'telf_pac' => $telefono,
                    'fena_pac' => $fecha,
                    'sexo_pac' => $sexo,
                    //'civi_pac' => $civil,
                    'motivo_consulta' => $motivoconsulta,
                    'signos' => $signos,
                    'antec_pac' => $antec_pac,
                    'presion_pac' => $presion_pac,
                    'pulso_pac' => $pulso,
                    'temp_pac' => $temperatura,
                    'fc_pac' => $frecuencia,
                    'frec_resp' => $frecuenciarespiratoria,
                    'exam_clinico' => $examenclinico,
                    'exam_complementario' => $examencomplementario,
                    'odonestomalogico' => $odontoestomalogico,
                    'diagn_pac' => $diagnostico,
                    'esta_pac' => 'A',
                    //'observación' => ''
                );

                if ($direccion) {
                    $data["dire_pac"] = $direccion;
                }
                if ($email) {
                    $data["emai_pac"] = $email;
                }
                if ($enfermedad) {
                    $data["enfe_pac"] = $enfermedad;
                }
                if ($alergia) {
                    $data["aler_pac"] = $alergia;
                }
                // if ($ocupacion) {
                //     $data["ocupacion"] = $ocupacion;
                // }
                if ($lugarnacimiento) {
                    $data["lugar_nacimiento"] = $lugarnacimiento;
                }
                // if ($informacion_clinica) {
                //     $data["informacion_clinica"] = $informacion_clinica;
                // }
                // if ($afiliacion) {
                //     $data["afil_pac"] = $afiliacion;
                // }
                if ($titular) {
                    $data["titu_pac"] = $titular;
                }

                if ($registar_paciente) {
                    $data['observacion'] = '';
                    $this->mod_paciente->insert_pac($data);
                    $this->session->set_userdata('error_paciente_1', 'El paciente ' . $nombres . ' ' . $apellidos . ' ha sido registrado existosamente');
                } else if ($editar_paciente) {
                    $this->mod_paciente->update_pac($this->input->post('codigo'), $data);
                    $this->session->set_userdata('error_paciente_1', 'El paciente ' . $nombres . ' ' . $apellidos . ' ha sido actualizado existosamente');
                }
                header('Location: ' . base_url() . 'paciente');
            }
        }
    }

    public function horario_medico() {
        if (!$this->logged()) {
            header('location: ' . base_url('login'));
        } else {
            date_default_timezone_set('America/Lima');
            $this->form_validation->set_rules('medico', 'Medico', 'required');
            $this->form_validation->set_rules('fecha', 'Fecha', 'required');
            $this->form_validation->set_rules('hora', 'Hora', 'required');

            $medicos = $this->mod_medico->get_medico();
            foreach ($medicos as $value) {
                $options[$value->codi_med] = $value->nomb_med . ' ' . $value->apel_med;
            }

            if ($this->form_validation->run() == FALSE) {
                $fecha_actual = date("Y-m-d");
                $hora_actual = date("H:i");
                $medico_horario["form"] = array('role' => 'form', "id" => "form_hor_med");
                $medico_horario["fecha"] = array('id' => 'fecha_horario_med', 'name' => 'fecha','type'=> 'date', 'class' => "form-control", "size" => "16" , "style" => "width: 170px;");
                $medico_horario["hora"] = array('id' => 'hora_horario_med', 'name' => 'hora', 'type'=> 'time', 'class' => "form-control", "style" => "width: 100px;");
                $medico_horario["medicos"] = $options;

                $medico_horario["registrar_horario_medico"] = array('name' => 'registrar_horario_medico', 'class' => "btn btn-lg btn-success btn-block", 'value' => "Registrar");
                $medico_horario["editar_horario_medico"] = array('name' => 'editar_horario_medico', 'class' => "btn btn-lg btn-primary btn-block", 'value' => "Editar", "style" => "display: none;");
                $medico_horario["buscar_horario_medico"] = array('name' => 'buscar_horario_medico', 'class' => "btn btn-lg btn-default btn-block", 'value' => "true", "content" => "Buscar", "data-toggle" => "modal", "data-target" => "#ModalHorarioMedico");
                $medico_horario["limpiar_horario_medico"] = array('name' => 'limpiar_horario_medico', 'class' => "btn btn-lg btn-default btn-block", 'value' => "Limpiar");
                $medico_horario["cancelar_horario_medico"] = array('name' => 'cancelar_horario_medico', 'class' => "btn btn-lg btn-default btn-block", 'value' => "true", "style" => "display: none;", "content" => "Cancelar");

                $data['container'] = $this->load->view('usuario/horario_medico', $medico_horario, true);
                $data['clinica'] = $this->mod_clinica->get_clinica();
                $this->load->view('home/body', $data);
            } else {

                $fecha = $this->input->post('fecha');
                $hora = $this->input->post('hora');
                $medico = $this->input->post('medico');
                $registrar_horario_medico = $this->input->post('registrar_horario_medico');
                $editar_horario_medico = $this->input->post('editar_horario_medico');
                
                $data = array(
                    'fech_homed' => $fecha,
                    'hora_homed' => $hora,
                    'codi_med' => $medico,
                );
                if ($registrar_horario_medico) {
                    $this->mod_horario_medico->insert_horario_medico($data);
                    $this->session->set_userdata('error_horario_medico_1', 'El horario del médico ha sido registrado existosamente');
                } else if ($editar_horario_medico) {
                    $this->mod_horario_medico->update_horario_medico($this->input->post('codigo'), $data);
                    $this->session->set_userdata('error_horario_medico_1', 'El horario del médico ha sido actualizado existosamente');
                }
                header('Location: ' . base_url() . 'horario_medico');
            }
        }
    }    

    public function validar_input_email() {
        $email = $this->input->post('email');
        if (!preg_match("/^\S+@\S+\.\S+$/", $email)) {
            echo "error";
        }
    }

    public function validar_exists_email_med() {
        $email = $this->input->post('email_2');
        $medicos = $this->mod_medico->get_medico();
        foreach ($medicos as $row) {
            if ($row->emai_med == $email) {
                echo "error";
                break;
            }
        }
    }

    public function validar_exists_dni_med() {
        $dni = $this->input->post('dni');
        $medicos = $this->mod_medico->get_medico();
        foreach ($medicos as $row) {
            if ($row->dni_med == $dni) {
                echo "error";
                break;
            }
        }
    }

    public function validar_exists_ruc_med() {
        $ruc = $this->input->post('ruc');
        $medicos = $this->mod_medico->get_medico();
        foreach ($medicos as $row) {
            if ($row->ruc_med == $ruc) {
                echo "error";
                break;
            }
        }
    }

    public function validar_exists_coleg_med() {
        $coleg = $this->input->post('coleg');
        $medicos = $this->mod_medico->get_medico();
        foreach ($medicos as $row) {
            if ($row->coleg_med == $coleg) {
                echo "error";
                break;
            }
        }
    }

    public function validar_input_nombre_apellido_med() {
        $nombre = $this->input->post('nombre');
        $apellido = $this->input->post('apellido');
        $medicos = $this->mod_medico->get_medico();
        foreach ($medicos as $row) {
            if ($row->nomb_med == $nombre && $row->apel_med == $apellido) {
                echo "error";
                break;
            }
        }
    }

    public function search_medico() {
        $data["resultado"] = $this->mod_medico->get_medico();
        $this->load->view('usuario/medico_search', $data);
    }

    public function search_horario_medico() {
        $data["resultado"] = $this->mod_horario_medico->get_horario_medico();
        $this->load->view('usuario/horario_medico_search', $data);
    }

    public function get_medico() {
        $codigo = $this->input->post('codi_med');
        echo json_encode($this->mod_medico->get_medico(array('esta_med' => 'A', 'codi_med' => $codigo)));
    }

    public function get_horario_medico() {
        date_default_timezone_set('America/Lima');
        $codigo = $this->input->post('codi_homed');
        $medico = $this->input->post('codi_med');
        $libre = $this->input->post('libre');
        $where = $codigo ? array('codi_homed' => $codigo) : array('hm.codi_med' => $medico, 'libre' => $libre);
        if($libre == 'S'){
            // $where['fech_homed >='] = date('Y-m-d').' 00:00:00'; 
            // $where['YEAR(fech_homed)'] = date('Y'); 
            // $where['MONTH(fech_homed)'] = date('m');
        }
        echo json_encode($this->mod_horario_medico->get_horario_medico( $where));
    }

    public function deshabilitar_medico() {
        $this->mod_medico->update_med($this->input->post('codi_med'), array("esta_med" => "D"));
        $this->session->set_userdata('error_medico_1', 'El médico con código ' . $this->input->post('codi_med') . ' ha sido deshabilitado existosamente');
    }

    public function validar_exists_email_pac() {
        $email = $this->input->post('email_2');
        $pacientes = $this->mod_paciente->get_paciente();
        foreach ($pacientes as $row) {
            if ($row->emai_pac == $email) {
                echo "error";
                break;
            }
        }
    }

    public function validar_exists_dni_pac() {
        $dni = $this->input->post('dni');
        $pacientes = $this->mod_paciente->get_paciente();
        foreach ($pacientes as $row) {
            if ($row->dni_pac == $dni) {
                echo "error";
                break;
            }
        }
    }

    public function validar_input_nombre_apellido_pac() {
        $nombre = $this->input->post('nombre');
        $apellido = $this->input->post('apellido');
        $pacientes = $this->mod_paciente->get_paciente();
        foreach ($pacientes as $row) {
            if ($row->nomb_pac == $nombre && $row->apel_pac == $apellido) {
                echo "error";
                break;
            }
        }
    }

    public function search_paciente() {
        $data["resultado"] = $this->mod_paciente->get_paciente();
        $this->load->view('usuario/paciente_search', $data);
    }

    public function BuscarPlaca($Paciente = null) {
        $data["resultado"] = $this->mod_paciente->get_pacienteplaca($Paciente);
        $this->load->view('usuario/paciente_placa', $data);
    }

    public function GrabarImagen($Paciente)
    {
        if($Paciente != null){
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{
 
    //obtenemos el archivo a subir
    $file = $_FILES['archivo']['name'];
 
    //comprobamos si existe un directorio para subir el archivo
    //si no es así, lo creamos
    if(!is_dir("files/".$Paciente)) 
        mkdir("files/".$Paciente, 0777);
     
    //comprobamos si el archivo ha subido
    if ($file && move_uploaded_file($_FILES['archivo']['tmp_name'],"files/".$Paciente.'/'.$file))
    {
        $this->mod_paciente->GrabarImagen($Paciente, $file);
       sleep(1);//retrasamos la petición 3 segundos
       echo $file;//devolvemos el nombre del archivo para pintar la imagen
    }
}else{
    throw new Exception("Error Processing Request", 1);   
}
}
else
{
    throw new Exception("No se ha seleccionado un paciente.", 1);
}
    }

    public function InactivarPlaca($ID = null)
    {
        if($ID != null){
            if($this->mod_paciente->InactivarPlaca($ID)){
                echo json_encode(true);
            }
        }
    }

    public function get_paciente() {
        $codigo = $this->input->post('codi_pac');
        echo json_encode($this->mod_paciente->get_paciente(array('esta_pac' => 'A', 'codi_pac' => $codigo)));
    }

    public function deshabilitar_paciente() {
        $this->mod_paciente->update_pac($this->input->post('codi_pac'), array("esta_pac" => "D"));
        $this->session->set_userdata('error_paciente_1', 'El paciente con código ' . $this->input->post('codi_pac') . ' ha sido deshabilitado existosamente');
    }

    public function deshabilitar_horario_medico() {
        $this->mod_horario_medico->update_horario_medico($this->input->post('codi_homed'), array("esta_homed" => "D"));
        $this->session->set_userdata('error_horario_medico_1', 'El horario con código ' . $this->input->post('codi_homed') . ' ha sido deshabilitado existosamente');
    }

    public function get_paciente_autocomplete() {
        $pacientes = $this->mod_paciente->get_paciente();
        $i = 0;
        foreach ($pacientes as $row) {
            $autocomplete[$i] = $row->nomb_pac . ' ' . $row->apel_pac;
            $i++;
        }
        echo json_encode($autocomplete);
    }

    public function verificar_paciente_cita() {
        $nombre = $this->input->post('nombre');
        $pacientes = $this->mod_paciente->get_paciente();
        $sw = false;
        foreach ($pacientes as $row) {
            if ($nombre == ($row->nomb_pac . ' ' . $row->apel_pac)) {
                $sw = true;
                break;
            }
        }
        if (!$sw) {
            echo "error";
        }
    }

    public function logged() {
        if ($this->mod_licence->validation()) {
            return $this->session->userdata('logged');
        }
    }

    public function admin() {
        if ($this->session->userdata('codi_rol') == '1') {
            return true;
        } else {
            return false;
        }
    }

}
