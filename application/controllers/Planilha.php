<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Planilha extends MY_Controller
{

    const BASE_URL = 'planilha';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('planilha_model');
        $this->dados['planilhas'] = $this->planilha_model->getAllWithLimit();
    }

    public function index()
    {
        $this->ckeckUserLogged();
        $this->_viewAdmin(self::BASE_URL . '/listar', $this->dados);
    }

    public function remover($cpf = null)
    {
        $this->planilha_model->deleteBy('cpf', $cpf);
        redirect(self::BASE_URL);
    }

    public function pesquisar()
    {
        $cpf_pesquisa = preg_replace('/[^0-9]/is', '', $this->input->post('cpf_pesquisa'));

        if (!empty($cpf_pesquisa) || !empty($ind_pago_pesquisa) || !empty($dt_pago_pesquisa)) {
            $this->dados['planilhas'] = $this->planilha_model->getByCpf($cpf_pesquisa);
        } else {
            $this->dados['planilhas'] = $this->planilha_model->getAllWithLimit();
        }

        $this->_viewAdmin(self::BASE_URL . '/listar', $this->dados);
    }

    public function editar($cpf = null)
    {
        if ($cpf != null) {
            $this->dados['planilha'] = $this->planilha_model->obterPorCpf($cpf);
            $this->_viewAdmin(self::BASE_URL . '/editar', $this->dados);
        } else {
            $this->_viewAdmin(self::BASE_URL . '/editar',  $this->dados);
        }
    }

    public function cadastrar()
    {
        $dados = $this->input->post();

        if ($this->planilha_model->existeCpf($dados['cpf'])) {
            $this->planilha_model->atualizarPorCpf($dados['cpf'], $dados);
        } else {
            $this->planilha_model->inserir($dados);
        }

       redirect(self::BASE_URL);
    }
}
