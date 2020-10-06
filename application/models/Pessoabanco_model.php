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
        $this->db->select('pb.id, b.nome as banco, pb.agencia, pb.conta, pb.vl_total, pb.cpf, pb.tpconta, p.nome, p.dt_inclusao, pb.ind_pago, pb.dt_pago, pb.dv');
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

    public function removerPorCpf($cpf) {
        return $this->db->where('cpf', $cpf)->delete($this->tabela);
    }

    public function obterPorFiltros($cpf, $ind_pago, $dt_pago)
    {
        $this->db->select('pb.id, b.nome as banco, pb.agencia, pb.conta, pb.vl_total, pb.cpf, pb.tpconta, p.nome, p.dt_inclusao, pb.ind_pago, pb.dt_pago, pb.dv');
        $this->db->from('pessoabanco pb');
        $this->db->join('banco b', 'b.id = pb.banco', 'inner');
        $this->db->join('pessoa p', 'p.cpf = pb.cpf', 'inner');
        
        if (!empty($cpf)) {
            $this->db->like('p.cpf', $cpf);
        }

        if (!empty($ind_pago) && $ind_pago != '0') {
            $this->db->where('pb.ind_pago', $ind_pago);
        }

        if (!empty($dt_pago)) {
            $this->db->where('pb.dt_pago >=', $dt_pago);
        }

        $this->db->order_by('p.dt_inclusao', 'asc');

        return $this->db->get()->result();
    }
}