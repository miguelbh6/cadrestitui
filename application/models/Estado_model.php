<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Estado_model extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->setTabela('estado');
    }
}
