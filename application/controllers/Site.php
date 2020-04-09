<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Site extends CI_Controller
{
    private $dados = array();
    const BASE_URL = 'site';
    const TEMPLATE = 'fragments/template';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pessoa_model');
        $this->load->model('pessoabanco_model');
        $this->load->model('planilha_model');
        $this->load->model('banco_model');
        $this->load->library('curl');
        $this->load->helper('email');
        $this->load->library('AppEmail');
        $this->dados['configEmail'] = $this->appemail->get();
    }

    public function index()
    {
        $this->template->load(self::TEMPLATE, self::BASE_URL . '/passo1', $this->dados);
    }

    public function verificarCPF()
    {
        try {
            $cpf = $this->input->post('cpf');
            $cpf = str_replace('.', '', $cpf);
            $cpf = str_replace('-', '', $cpf);
            if (!$this->planilha_model->existeCpf($cpf)) {
                 $this->session->set_flashdata('msg-error', 'CPF informado não encontrado para restituir');
                redirect($this->index());
             } elseif ($this->pessoabanco_model->isByCpf($cpf)) {
                 $this->session->set_flashdata('msg-error', 'CPF informado já consta para restituição');
                 redirect($this->index());
             } else {
                 $this->dados['cpf'] = $cpf;
                 $this->session->set_userdata('cpf', $cpf);
                 redirect(self::BASE_URL . '/passo2');
             }
        } catch (Exception $e) {
            echo 'Exceção capturada: ', $e->getMessage(), "\n";
        }
    }

    public function passo1()
    {
        redirect(self::BASE_URL);
    }

    public function passo2()
    {
        $this->dados['cpf'] = $this->session->userdata('cpf');
        $this->template->load(self::TEMPLATE, self::BASE_URL . '/passo2', $this->dados);
    }

    public function passo3()
    {
        $cpf = $this->session->userdata('cpf');
        $this->dados['pessoa']  = $this->pessoa_model->getByCpf($cpf);
        $this->dados['planilhas'] = $this->planilha_model->getByCpf($cpf);
        $retorno = $this->planilha_model->obterValorTotalRestituirPorCpf($cpf);
        $this->dados['valrest'] = $retorno->total;
        $this->session->set_userdata('vl_total', $retorno->total);
        $this->template->load(self::TEMPLATE, self::BASE_URL . '/passo3', $this->dados);
    }

    public function passo4()
    {
        $this->dados['bancos'] = $this->banco_model->getAll('id','asc');
        $this->template->load(self::TEMPLATE, self::BASE_URL . '/passo4', $this->dados);
    }

    public function passofinal()
    {
        //$this->enviarEmail();
        $this->template->load(self::TEMPLATE, self::BASE_URL . '/passofinal');
    }

    public function consulta()
    {

        $cep = $this->input->post('cep');
        echo $this->curl->consulta($cep);
    }

    public function cadastrarPessoa()
    {
        if (!valid_email($this->input->post('email'))) {
            $this->session->set_flashdata('msg-error', 'E-mail inválido');
            redirect(self::BASE_URL . '/passo2');
        }


        $dados = $this->input->post();
        $dados['cpf'] = $this->session->userdata('cpf');

        $this->pessoa_model->save($dados['id'], $dados);

        if ($dados['id'] == NULL) {
            redirect('site/passo3');
        } else {
            redirect(self::BASE_URL);
        }
    }

    public function cadastrarDadosBancarios()
    {
        $dados = $this->input->post();
        $dados['cpf'] = $this->session->userdata('cpf');
        $dados['vl_total'] = $this->session->userdata('vl_total');
        $this->pessoabanco_model->save(null, $dados);
        redirect('site/passofinal');
    }

    function enviarEmail()
    {
        $this->email->initialize($this->dados['configEmail']);
        $this->email->from('miguelbh6@gmail.com', 'Administrador');
        $this->email->subject("CNDN - Bem vindo");
        $this->email->reply_to('miguelbh6@gmail.com');
        $this->email->to('miguelbh6@gmail.com');
        $conteudo_msg = $this->load->view('templates_email/bemvindo', '', TRUE);
        $this->email->message($conteudo_msg);
        if (!$this->email->send()) {
            print_r($this->email->print_debugger());
        }
    }
}