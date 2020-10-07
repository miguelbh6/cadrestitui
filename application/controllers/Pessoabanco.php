<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pessoabanco extends MY_Controller
{

    const BASE_URL = 'pessoabanco';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pessoabanco_model');
        $this->load->model('banco_model');
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
        $dados['dt_pago'] = date('d/m/Y');
        $this->pessoabanco_model->save($id, $dados);
        redirect(self::BASE_URL);
    }

    public function desfazerpagamento($id)
    {
        $dados['ind_pago'] = 0;
        $dados['dt_pago'] = null;
        $this->pessoabanco_model->save($id, $dados);
        redirect(self::BASE_URL);
    }

    public function pesquisar()
    {
        $cpf_pesquisa = preg_replace('/[^0-9]/is', '', $this->input->post('cpf_pesquisa'));
        $ind_pago_pesquisa = $this->input->post('ind_pago_pesquisa');
        $dt_pago_pesquisa = $this->input->post('dt_pago_pesquisa');
        $dt_pago_pesquisa = !empty($dt_pago_pesquisa) ? date('Y-d-m H:i:s', strtotime($dt_pago_pesquisa)) : null;

        if (!empty($cpf_pesquisa) || !empty($ind_pago_pesquisa) || !empty($dt_pago_pesquisa)) {
            $this->dados['pessoas'] = $this->pessoabanco_model->obterPorFiltros($cpf_pesquisa, $ind_pago_pesquisa, $dt_pago_pesquisa);
        } else {
            $this->dados['pessoas'] = $this->pessoabanco_model->obterComNomeBanco('9', 'asc');
        }

        $this->_viewAdmin(self::BASE_URL . '/listar', $this->dados);
    }

    public function editar($id = null)
    {
        if ($id != null) {
            $this->dados['pessoabanco'] = $this->pessoabanco_model->getById($id);
            $this->dados['bancos'] = $this->banco_model->getAll('id', 'asc');
            $this->_viewAdmin(self::BASE_URL . '/editar', $this->dados);
        }
    }

    public function cadastrar()
    {
        $dados = $this->input->post();
        $this->pessoabanco_model->save($dados['id'], $dados);
        redirect(self::BASE_URL);
    }
}
