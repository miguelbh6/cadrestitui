<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Estado_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->setTabela('estado');
    }
}
