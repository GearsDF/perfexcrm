<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Boletos_model extends App_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_financeiro() 
    {
	$this->db->select('*');
	$this->db->from(db_prefix() . 'financeiro');
	$query = $this->db->get();

    }
}

