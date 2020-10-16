<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Usuario extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuario_model');
    }

    public function index()
    {
        $this->load->view('usuario/index');
    }

    public function login()
    {
        if ($this->usuario_model->existeUsuario($this->input->post('user'), $this->input->post('password'))) {
            $data = array(
                'username' => $this->input->post('user'),
                'logged' => true
            );
            $this->session->set_userdata($data);
            redirect('pessoa');
        } else {
            $this->session->set_flashdata('msg-error', 'Usuario ou senha incorretos');
            redirect('/usuario');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata("logged");
        $this->session->unset_userdata("username");
        redirect(base_url('usuario'));
    }
}
