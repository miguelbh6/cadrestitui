<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pessoabanco extends MY_Controller
{
    
    const BASE_URL = 'pessoabanco';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pessoabanco_model');
        $this->dados['pessoas'] = $this->pessoabanco_model->obterComNomeBanco('9', 'asc');
    }

    public function index()
    {
        $this->ckeckUserLogged();
        $this->_viewAdmin(self::BASE_URL . '/listar', $this->dados);
    }

    public function remover($id = null)
    {
        $this->pessoabanco_model->delete($id);
        redirect(self::BASE_URL);
    }

    public function pagar($id)
    {
$dados['ind_pago'] = 1;
date_default_timezone_set('America/Sao_Paulo');
$dados['dt_pago'] = date('Y-m-d H:i:s');
        $this->pessoabanco_model->save($id, $dados);
        print_r($this->db->last_query());
        redirect(self::BASE_URL);
    }

    public function desfazerpagamento($id)
    {
$dados['ind_pago'] = 0;
$dados['dt_pago'] = null;
        $this->pessoabanco_model->save($id, $dados);
        print_r($this->db->last_query());
        redirect(self::BASE_URL);
    }
}
