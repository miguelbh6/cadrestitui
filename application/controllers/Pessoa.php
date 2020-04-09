<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pessoa extends MY_Controller
{
    private $dados = array();
    const BASE_URL = 'pessoa';
    const TEMPLATE = 'fragments/templateAdmin';

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
        $this->template->load(self::TEMPLATE, self::BASE_URL . '/listar', $this->dados);
    }

    public function remover($id = null)
    {
        $pessoa = $this->pessoa_model->getById($id);

        if (!$this->pessoabanco_model->isByCpf($pessoa->cpf)) {
            $this->pessoa_model->delete($id);
        } else {
            $this->session->set_flashdata('msg-error', 'Nao e permitido excluir esta pessoa, pois possui dados bancarios');
        }
        redirect(self::BASE_URL);
    }

    public function editar($id = NULL)
    {
        if ($id != NULL) {
            $this->dados['pessoa'] = $this->pessoa_model->getById($id);
            $this->template->load(self::TEMPLATE, self::BASE_URL . '/editar', $this->dados);
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

        if ($dados['id'] == NULL) {
            redirect('site/passo3');
        } else {
            redirect(self::BASE_URL);
        }
    }
}
