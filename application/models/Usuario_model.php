<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    function existeUsuario($pUsuario, $pSenha) {
        $this->db->where('usuario', $pUsuario);
        $this->db->where('senha', md5($pSenha));
        $query = $this->db->get('usuario');
        return $query->num_rows() > 0;
    }
}