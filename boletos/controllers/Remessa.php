<?php defined('BASEPATH') or exit('No direct script access allowed');

use OpenBoleto\Banco\Itau;
use OpenBoleto\Agente;

class Remessa extends AdminController
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('remessas_model');
     
    }
    /* Get all invoices in case user go on index page */
    public function index($id = '')
    {
        $this->list_remessa($id);
    }
    /* List all invoice paments */
	
    public function list_remessa($id = '')
    {
        if (!has_permission('invoices', '', 'view')
            && !has_permission('invoices', '', 'view_own')
            && get_option('allow_staff_view_invoices_assigned') == '0') {
            access_denied('invoices');
        }

        close_setup_menu();
		
		$data['title'] 				  = _l('Remessa');
		$data['invoiceid']            = $id;
        $data['remessas_statuses']    = $this->remessas_model->get_statuses();
        $this->load->view('remessa', $data);

    }    
	
	public function table($clientid = '')
    {
        if (!has_permission('invoices', '', 'view')
            && !has_permission('invoices', '', 'view_own')
            && get_option('allow_staff_view_invoices_assigned') == '0') {
            ajax_access_denied();
        } 
		
		$this->app->get_table_data(module_views_path('boletos', 'table-remessa'));
    }
}
