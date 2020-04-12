<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    private $dados = array();
    const TEMPLATE = 'fragments/template';
    const TEMPLATE_ADMIN = 'fragments/templateAdmin';

    public function __construct()
    {
        parent::__construct();
    }

    public function ckeckUserLogged()
    {
        $logged = $this->session->userdata("logged");

        if (!isset($logged) || !$logged) {
            redirect('usuario');
        }
    }

    public function _view($pView = 'index', $pDados)
    {
        $this->template->load(self::TEMPLATE, $pView, $pDados);
    }

    public function _viewAdmin($pView = 'index', $pDados)
    {
        $this->template->load(self::TEMPLATE_ADMIN, $pView, $pDados);
    }
}
