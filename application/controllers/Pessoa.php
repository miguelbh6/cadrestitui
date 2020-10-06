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
        $this->dados['pessoas'] = $this->pessoa_model->obterComDadosBancarios();
        $this->load->library('curl');
    }

    public function index()
    {
        $this->ckeckUserLogged();
        $this->_viewAdmin(self::BASE_URL . '/listar', $this->dados);
    }

    public function remover($id = null)
    {
        $pessoa = $this->pessoa_model->getById($id);

        
        $this->pessoabanco_model->removerPorCpf($pessoa->cpf);
        $this->pessoa_model->delete($id);
       // if (!$this->pessoabanco_model->existeCpf($pessoa->cpf)) {
            
        //} 
        //else {
          //  $this->session->set_flashdata('msg-error', 'Nao e permitido excluir esta pessoa, pois possui dados bancarios');
        //}
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
        $dados['cpf'] = !is_null($this->session->userdata('cpf')) ? $this->session->userdata('cpf') : $this->input->post('cpf');
        $dados['cpf'] = preg_replace('/[^0-9]/is', '', $dados['cpf']);

        $this->pessoa_model->save($dados['id'], $dados);

        if ($dados['id'] == null) {
            redirect('site/passo3');
        } else {
            redirect(self::BASE_URL);
        }
    }

    public function pesquisar() {
        $cpf_pesquisa = preg_replace('/[^0-9]/is', '', $this->input->post('cpf_pesquisa'));
        $ind_pago_pesquisa = $this->input->post('ind_pago_pesquisa') != null ? 1 : 0;
        $dt_pago_pesquisa = $this->input->post('dt_pago_pesquisa');
        $dt_pago_pesquisa= !empty($dt_pago_pesquisa) ? date('Y-d-m H:i:s',strtotime($dt_pago_pesquisa)) : null;

        if (!empty($cpf_pesquisa) || !empty($ind_pago_pesquisa) || !empty($dt_pago_pesquisa)) {
            $this->dados['pessoas'] = $this->pessoa_model->obterPorFiltros($cpf_pesquisa, $ind_pago_pesquisa, $dt_pago_pesquisa);
            
        } else{
            $this->dados['pessoas'] = $this->pessoa_model->obterComDadosBancarios();
        }

        $this->_viewAdmin(self::BASE_URL . '/listar', $this->dados);
    }
}
