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
        $this->db->select('p.id as id, p.nome, p.cpf, b.nome as banco, pb.agencia, pb.conta, pb.vl_total, pb.tpconta');
        $this->db->from('pessoa p');
        $this->db->join('pessoabanco pb', 'p.cpf = pb.cpf', 'left');
        $this->db->join('banco b', 'b.id = pb.banco', 'left');
        $this->db->order_by('p.nome', 'asc');
        return $this->db->get()->result();
    }
}
