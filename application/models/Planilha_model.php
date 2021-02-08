<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Planilha_model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->setTabela('planilha');
    }

    public function existeCpf($value)
    {
        return count($this->getByCpf($value)) > 0;
    }

    public function getByCpf($id)
    {
        return $this->db->where('cpf', $id)
            ->get($this->tabela)
            ->result();
    }

    public function obterPorCpf($id)
    {
        return $this->db->where('cpf', $id)->get($this->tabela)->row();
    }

    public function obterValorTotalRestituirPorCpf($id)
    {
        $this->db->select('p.cpf, sum(cast(p.percentual_restituir as decimal(9,2))) + sum(cast(p.pagto as decimal(9,2))) as total');
        $this->db->from('planilha p');
        $this->db->where('p.cpf', $id);
        $query = $this->db->get()->row();
        return $query;
    }


    public function atualizarPorCpf($cpf, $dados)
    {

        if ($cpf) {
            $this->db->where('cpf', $cpf);
            $this->db->update($this->tabela, $dados);
        } else {
            $this->db->insert($this->tabela, $dados);
        }
    }

    public function inserir($dados)
    {
         $this->db->insert($this->tabela, $dados);


         
    }
}
