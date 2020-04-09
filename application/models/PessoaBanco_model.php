<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PessoaBanco_model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->setTabela('pessoa_banco');
    }
    
    public function obterComNomeBanco($coluna, $ordem)
    {
        $this->db->select('pb.id, b.nome as banco, pb.agencia, pb.conta, pb.vl_total, pb.cpf');
        $this->db->from('pessoa_banco pb');
        $this->db->join('banco b', 'b.id = pb.banco', 'inner');
        $this->db->order_by($coluna, $ordem);
        return $this->db->get()->result();
    }
    
    public function getByCpf($id) {
        return $this->db->where('cpf', $id)->get($this->tabela)->row();
    }
    
    public function isByCpf($id) {
        return $this->getByCpf($id);
    }
}