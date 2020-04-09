<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoa_model extends MY_Model {

	function __construct() {
		parent::__construct();
		$this->setTabela('pessoa');
	}

	public function getByNome()
	{
		return $this->db->order_by('nome', 'ASC')->get($this->tabela)->result();	
	}

	public function getByCpf($id) {
        return $this->db->where('cpf', $id)->get($this->tabela)->row();
    }
}