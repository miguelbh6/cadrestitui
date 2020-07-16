<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pessoabanco_model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->setTabela('pessoabanco');
    }
    
    public function obterComNomeBanco($coluna, $ordem)
    {
        $this->db->select('pb.id, b.nome as banco, pb.agencia, pb.conta, pb.vl_total, pb.cpf, pb.tpconta, p.nome, p.dt_inclusao');
        $this->db->from('pessoabanco pb');
        $this->db->join('banco b', 'b.id = pb.banco', 'inner');
        $this->db->join('pessoa p', 'p.cpf = pb.cpf', 'inner');
        $this->db->order_by($coluna, $ordem);
        return $this->db->get()->result();
    }
    
    public function getByCpf($id) {
        return $this->db->where('cpf', $id)->get($this->tabela)->row();
    }
    
    public function existeCpf($id) {
        return count($this->getByCpf($id)) > 0;
    }
}