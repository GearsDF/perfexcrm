<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Boletos_model extends App_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get invoice by id
     * @param  mixed $id
     * @return array
     */
    public function get($id = '', $where = [])
    {
        $this->db->select('*, ' . db_prefix() . 'boletos.id as id, ');
        $this->db->from(db_prefix() . 'boletos');
        $this->db->where($where);
	if (is_numeric($id)) {
            $this->db->where(db_prefix() . 'boletos' . '.id', $id);
            $invoice = $this->db->get()->row();
            if ($invoice) {
                $invoice->total_left_to_pay = get_invoice_total_left_to_pay($invoice->id, $invoice->total);


                $client          = $this->clients_model->get($invoice->clientid);
                $invoice->client = $client;
                if (!$invoice->client) {
                    $invoice->client          = new stdClass();
                    $invoice->client->company = $invoice->deleted_customer_name;
                }

                $this->load->model('payments_model');
                $invoice->payments = $this->payments_model->get_invoice_payments($id);
            }

            return $invoice;
        }
 
        return $this->db->get()->result_array();
    }


	public function update_invoice($nossoNumero)
	{
		$this->db->query("UPDATE tblinvoices SET status = '2' WHERE id='$nossoNumero' AND status != '2'");
    } 	

}

