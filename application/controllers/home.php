<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('mod_usuario', 'mod_clinica', 'mod_licence','mod_cita'));
        $this->load->library('session');
    }

    public function index() {
        if (!$this->logged()) {
            $this->login();
        } else {
            date_default_timezone_set('America/Lima');
            //$anio = date('Y');
            $anio = '2023';
            $data['clinica'] = $this->mod_clinica->get_clinica();
            $data['cant_cita_med'] = $this->mod_cita->get_cant_citas(array('A','T','R'),$anio);
            $data['cant_cita_med_act'] = $this->mod_cita->get_cant_citas(array('esta_cit' => 'A'),$anio);
            $data['cant_cita_med_ter'] = $this->mod_cita->get_cant_citas(array('esta_cit' => 'T'),$anio);
            $data['cant_cita_med_repro'] = $this->mod_cita->get_cant_citas(array('esta_cit' => 'R'),$anio);
            $data['container'] = $this->load->view('home/index', $data, true);
            $this->load->view('home/body', $data);
        }
    }

    public function login() {
        if ($this->logged()) {
            header('Location: ' . base_url('home'));
        } else {
            $this->form_validation->set_rules('usuario', 'Username', 'required');
            $this->form_validation->set_rules('clave', 'Clave', 'required');

            if ($this->form_validation->run() == FALSE) {
                $login["form"] = array('role' => 'form');
                $login["usuario"] = array('id' => 'usuario_log', 'name' => 'usuario', 'class' => "form-control", 'placeholder' => "Usuario", 'required' => 'true');
                $login["contraseña"] = array('id' => 'clave_log', 'name' => 'clave', 'class' => "form-control", 'placeholder' => "Contraseña", 'required' => 'true');
                $login["inicio_sesion"] = array('name' => 'inicio_sesion', 'class' => "btn btn-lg btn-success btn-block", 'value' => "Inicio de sesión");
                $data['container'] = $this->load->view('home/login', $login, true);
                $data['clinica'] = $this->mod_clinica->get_clinica();
                $this->load->view('home/body', $data);
            } else {
                $usuario = $this->input->post('usuario');
                $clave = md5($this->input->post('clave'));
                $usuarios = $this->mod_usuario->get_usuario();

                $acceso = false;
                foreach ($usuarios as $row) {
                    if ($row->logi_usu == $usuario && $row->pass_usu == $clave && $row->esta_usu == 'A') {
                        $acceso = true;
                        $rol = $row->codi_rol;
                        break;
                    }
                }

                if ($acceso) {
                    $sesion_activa = array(
                        'estado_sesion' => 'A',
                        'logi_usu' => $usuario,
                        'codi_rol' => $rol,
                        'logged' => true
                    );
                    $this->session->set_userdata($sesion_activa);
                    header('Location: ' . base_url() . 'home');
                } else {
                    $this->session->set_userdata('error_login_1', 'El usuario y/o contraseña son incorrectas');
                    header('Location: ' . base_url('login'));
                }
            }
        }
    }

    public function close() {
        $this->session->unset_userdata('estado_sesion');
        $this->session->unset_userdata('logi_usu');
        $this->session->unset_userdata('codi_rol');
        $this->session->unset_userdata('logged');
        header('Location: ' . base_url('login'));
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
