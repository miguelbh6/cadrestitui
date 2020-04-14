<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Banco_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->setTabela('banco');
    }
}
