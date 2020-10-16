<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    function existeUsuario($pUsuario, $pSenha) {
        $this->db->from('usuario');
        $this->db->where('usuario', $pUsuario);
        $this->db->where('senha', md5($pSenha));
        return $this->db->count_all_results() > 0;
    }
}