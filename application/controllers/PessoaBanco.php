<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pessoabanco extends MY_Controller
{
    private $dados = array();
    const BASE_URL = 'pessoabanco';
    const TEMPLATE = 'fragments/templateAdmin';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pessoabanco_model');
        $this->dados['pessoas'] = $this->pessoabanco_model->obterComNomeBanco('1', 'asc');
    }

    public function index()
    {
        $this->template->load(self::TEMPLATE, self::BASE_URL . '/listar', $this->dados);
    }

    public function remover($id = null)
    {
        $this->pessoabanco_model->delete($id);
        redirect(self::BASE_URL);
    }
}