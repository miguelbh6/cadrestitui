<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pessoa extends MY_Controller
{
    const BASE_URL = 'pessoa';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pessoa_model');
        $this->load->model('pessoabanco_model');
        $this->dados['pessoas'] = $this->pessoa_model->getAll('2', 'asc');
        $this->load->library('curl');
    }

    public function index()
    {
        $this->_viewAdmin(self::BASE_URL . '/listar', $this->dados);
    }

    public function remover($id = null)
    {
        $pessoa = $this->pessoa_model->getById($id);

        if (!$this->pessoabanco_model->existeCpf($pessoa->cpf)) {
            $this->pessoa_model->delete($id);
        } else {
            $this->session->set_flashdata('msg-error', 'Não é permitido excluir esta pessoa, possui cadastro bancário');
        }
        redirect(self::BASE_URL);
    }

    public function editar($id = null)
    {
        if ($id != null) {
            $this->dados['pessoa'] = $this->pessoa_model->getById($id);
            $this->_viewAdmin(self::BASE_URL . '/editar', $this->dados);
        }
    }

    public function consulta()
    {
        $cep = $this->input->post('cep');
        $dados = $this->curl->consulta($cep);
        echo $dados;
    }

    public function cadastrar()
    {
        $dados = $this->input->post();
        $dados['cpf'] = $this->session->userdata('cpf');

        $this->pessoa_model->save($dados['id'], $dados);

        if ($dados['id'] == null) {
            redirect('site/passo3');
        } else {
            redirect(self::BASE_URL);
        }
    }
}
