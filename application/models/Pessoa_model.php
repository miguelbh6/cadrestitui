<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pessoa_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->setTabela('pessoa');
    }

    public function getByNome()
    {
        return $this->db->order_by('nome', 'ASC')->get($this->tabela)->result();
    }

    public function getByCpf($id)
    {
        return $this->db->where('cpf', $id)->get($this->tabela)->row();
    }

    public function existeCpf($id)
    {
        return count($this->getByCpf($id)) > 0;
    }

    public function obterComDadosBancarios()
    {
        $this->db->select('p.id as id, p.nome, p.cpf, p.aceite, p.dt_inclusao, b.nome as banco, pb.agencia, pb.conta, pb.vl_total, pb.tpconta, pb.dt_pago');
        $this->db->from('pessoa p');
        $this->db->join('pessoabanco pb', 'p.cpf = pb.cpf', 'left');
        $this->db->join('banco b', 'b.id = pb.banco', 'left');
        $this->db->order_by('p.dt_inclusao', 'asc');
        return $this->db->get()->result();
    }

    public function updateAceiteByCpf($cpf, $aceite){
        $this->db->set('aceite', $aceite);
        $this->db->where('cpf', $cpf);
        $this->db->update($this->tabela); // gives UPDATE `mytable` SET `field` = 'field+1' WHERE `id` = 2
    }

    public function obterPorFiltros($cpf, $ind_pago, $dt_pago)
    {
        $this->db->select('p.id as id, p.nome, p.cpf, p.aceite, p.dt_inclusao, b.nome as banco, pb.agencia, pb.conta, pb.vl_total, pb.tpconta, pb.dt_pago');
        $this->db->from('pessoa p');
        $this->db->join('pessoabanco pb', 'p.cpf = pb.cpf', 'left');
        $this->db->join('banco b', 'b.id = pb.banco', 'left');

        if (!empty($cpf)) {
            $this->db->like('p.cpf', $cpf);
        }

        if (!empty($ind_pago)) {
            $ind_pago = $ind_pago == 'S' ? '1' : '0';
            $this->db->where('pb.ind_pago', $ind_pago);
        }

        if (!empty($dt_pago)) {
            $this->db->where('pb.dt_pago >=', $dt_pago);
        }

        $this->db->order_by('p.dt_inclusao', 'asc');
        return $this->db->get()->result();
    }
}
