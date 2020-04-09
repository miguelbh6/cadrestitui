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
        if (is_null($this->getByCpf($value))) {
            return false;
        } else {
            return true;
        }
    }

    public function getByCpf($id)
    {
        return $this->db->where('cpf_cnpj', $id)
            ->get($this->tabela)
            ->result();
    }

    public function obterValorTotalRestituirPorCpf($id)
    {
        $this->db->select('p.cpf_cnpj, sum(cast(p.percentual_restituir as decimal(9,2))) + sum(cast(p.pagto as decimal(9,2))) as total');
        $this->db->from('planilha p');
        $this->db->where('p.cpf_cnpj', $id);
        $query = $this->db->get()->row();
        return $query;
    }
}