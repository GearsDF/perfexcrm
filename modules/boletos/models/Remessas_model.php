<?php defined('BASEPATH') or exit('No direct script access allowed');

class Remessas_model extends App_Model
{
    const STATUS_UNPAID = 1;

    const STATUS_PAID = 2;

    const STATUS_PARTIALLY = 3;

    const STATUS_OVERDUE = 4;

    const STATUS_CANCELLED = 5;

    const STATUS_DRAFT = 6;

    const STATUS_DRAFT_NUMBER = 1000000000;

    private $statuses = [
        self::STATUS_UNPAID,
        self::STATUS_PAID,
        self::STATUS_PARTIALLY,
        self::STATUS_OVERDUE,
        self::STATUS_CANCELLED,
        self::STATUS_DRAFT,
    ];
	
    public function __construct()
    {
        parent::__construct();
    }

    public function get_statuses()
    {
        return $this->statuses;
    }
    /**
     * Get invoice by id
     * @param  mixed $id
     * @return array
	*/

    public function get($id = '', $where = [])
    {
	$this->db->select('*');
	$this->db->from(db_prefix() . 'invoices');
        $this->db->join(db_prefix() . 'clients', '' . db_prefix() . 'invoices.clientid = ' . db_prefix() . 'clients.userid', 'left');
        $this->db->where($where);
	$this->db->where('status !=', self::STATUS_CANCELLED);
	$this->db->where('status !=', self::STATUS_DRAFT);
	$this->db->where('status !=', self::STATUS_PARTIALLY);
	$this->db->where('status !=', self::STATUS_PAID);	
	$this->db->order_by('number,YEAR(date)', 'desc');
        	return $this->db->get()->result_array();
    	
	}
  
}


