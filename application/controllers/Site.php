<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Site extends MY_Controller
{
    const BASE_URL = 'site';

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
        $this->_view(self::BASE_URL . '/passo1', $this->dados);
    }

    public function verificarCPF()
    {
        try {
            $cpf = preg_replace('/[^0-9]/is', '', $this->input->post('cpf'));

            if (!$this->validaCpf($cpf)) {
                $this->session->set_flashdata('msg-error', 'CPF inválido');
                redirect($this->index());
            } else if (!$this->planilha_model->existeCpf($cpf)) {
                $this->session->set_flashdata('msg-error', 'CPF informado não encontrado para restituir');
                redirect($this->index());
            } elseif ($this->pessoabanco_model->existeCpf($cpf)) {
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
        $this->_view(self::BASE_URL . '/passo2', $this->dados);
    }

    public function passo3()
    {
        $cpf = $this->session->userdata('cpf');
        $this->dados['pessoa'] = $this->pessoa_model->getByCpf($cpf);
        $this->dados['planilhas'] = $this->planilha_model->getByCpf($cpf);
        $retorno = $this->planilha_model->obterValorTotalRestituirPorCpf($cpf);
        $this->dados['valrest'] = $retorno->total;
        $this->session->set_userdata('vl_total', $retorno->total);
        $this->_view(self::BASE_URL . '/passo3', $this->dados);
    }

    public function passo4()
    {
        $this->dados['bancos'] = $this->banco_model->getAll('id', 'asc');
        $this->_view(self::BASE_URL . '/passo4', $this->dados);
    }

    public function passofinal()
    {
        //$this->enviarEmail();
        $this->template->load(self::TEMPLATE, self::BASE_URL . '/passofinal', $this->dados);
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

        if ($dados['id'] == null) {
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

    public function enviarEmail()
    {
        $this->email->initialize($this->dados['configEmail']);
        $this->email->from('miguelbh6@gmail.com', 'Administrador');
        $this->email->subject("CNDN - Bem vindo");
        $this->email->reply_to('miguelbh6@gmail.com');
        $this->email->to('miguelbh6@gmail.com');
        $conteudo_msg = $this->load->view('templates_email/bemvindo', '', true);
        $this->email->message($conteudo_msg);
        if (!$this->email->send()) {
            print_r($this->email->print_debugger());
        }
    }

    public function validaCpf($cpf = false)
    {
        // Exemplo de CPF: 025.462.884-23

        /**
         * Multiplica dígitos vezes posições
         *
         * @param string $digitos Os digitos desejados
         * @param int $posicoes A posição que vai iniciar a regressão
         * @param int $soma_digitos A soma das multiplicações entre posições e digitos
         * @return int Os digitos enviados concatenados com o último dígito
         *
         */
        if (!function_exists('calc_digitos_posicoes')) {
            function calc_digitos_posicoes($digitos, $posicoes = 10, $soma_digitos = 0)
            {
                // Faz a soma dos digitos com a posição
                // Ex. para 10 posições:
                //   0    2    5    4    6    2    8    8   4
                // x10   x9   x8   x7   x6   x5   x4   x3  x2
                //      0 + 18 + 40 + 28 + 36 + 10 + 32 + 24 + 8 = 196
                for ($i = 0; $i < strlen($digitos); $i++) {
                    $soma_digitos = $soma_digitos + ($digitos[$i] * $posicoes);
                    $posicoes--;
                }

                // Captura o resto da divisão entre $soma_digitos dividido por 11
                // Ex.: 196 % 11 = 9
                $soma_digitos = $soma_digitos % 11;

                // Verifica se $soma_digitos é menor que 2
                if ($soma_digitos < 2) {
                    // $soma_digitos agora será zero
                    $soma_digitos = 0;
                } else {
                    // Se for maior que 2, o resultado é 11 menos $soma_digitos
                    // Ex.: 11 - 9 = 2
                    // Nosso dígito procurado é 2
                    $soma_digitos = 11 - $soma_digitos;
                }

                // Concatena mais um digito aos primeiro nove digitos
                // Ex.: 025462884 + 2 = 0254628842
                $cpf = $digitos . $soma_digitos;

                // Retorna
                return $cpf;
            }
        }

        // Verifica se o CPF foi enviado
        if (!$cpf) {
            return false;
        }

        // Remove tudo que não é número do CPF
        // Ex.: 025.462.884-23 = 02546288423
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        // Verifica se o CPF tem 11 caracteres
        // Ex.: 02546288423 = 11 números
        if (strlen($cpf) != 11) {
            return false;
        }

        // Captura os 9 primeiros dígitos do CPF
        // Ex.: 02546288423 = 025462884
        $digitos = substr($cpf, 0, 9);

        // Faz o cálculo dos 9 primeiros dígitos do CPF para obter o primeiro dígito
        $novo_cpf = calc_digitos_posicoes($digitos);

        // Faz o cálculo dos 10 digitos do CPF para obter o último dígito
        $novo_cpf = calc_digitos_posicoes($novo_cpf, 11);

        // Verifica se o novo CPF gerado é identico ao CPF enviado
        if ($novo_cpf === $cpf) {
            // CPF válido
            return true;
        } else {
            // CPF inválido
            return false;
        }
    }
}
