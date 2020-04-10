<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    function existeUsuario($pUsuario, $pSenha) {
        $this->db->where('usuario', $pUsuario);
        $this->db->where('senha', md5($pSenha));
        return count($this->db->get('usuario')) > 0;
    }
}