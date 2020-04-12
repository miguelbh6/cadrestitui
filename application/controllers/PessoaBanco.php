<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pessoabanco extends MY_Controller
{
    const BASE_URL = 'pessoabanco';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pessoabanco_model');
        $this->dados['pessoas'] = $this->pessoabanco_model->obterComNomeBanco('1', 'asc');
    }

    public function index()
    {
        $this->checkUserLogin();
        $this->_viewAdmin(self::BASE_URL . '/listar', $this->dados);
    }

    public function remover($id = null)
    {
        $this->pessoabanco_model->delete($id);
        redirect(self::BASE_URL);
    }
}
