<?php defined('BASEPATH') or exit('No direct script access allowed');

use OpenBoleto\Banco\Itau;
use OpenBoleto\Agente;

class Boletos extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('boletos_model');
       
    }
    /* Get all invoices in case user go on index page */
    public function index($id = '')
    {
        $this->list_boletos($id);
    }
    /* List all invoice paments */

    public function list_boletos($id = '')
    {
        if (!has_permission('payments', '', 'view') && !has_permission('invoices', '', 'view_own') && get_option('allow_staff_view_invoices_assigned') == '0') {
            access_denied('payments');
        }

        if (!has_permission('invoices', '', 'view')
            && !has_permission('invoices', '', 'view_own')
            && get_option('allow_staff_view_invoices_assigned') == '0') {
            access_denied('invoices');
        }

        close_setup_menu();
        $this->load->model('payment_modes_model');
        $data['payment_modes']        = $this->payment_modes_model->get('', [], true);
        $data['invoiceid']            = $id;

        $data['title'] = _l('boletos');
        $this->load->view('manage', $data);
    }

    public function table($clientid = '')
    {
        if (!has_permission('payments', '', 'view')
		&& !has_permission('invoices', '', 'view_own')
		&& get_option('allow_staff_view_invoices_assigned') == '0') {
            ajax_access_denied();
        }
       
       $this->app->get_table_data(module_views_path('boletos', 'table'),[
            'clientid' => $clientid,
        ]);	

    }
    
    public function boleto($id)
	{
        
         if (!has_permission('payments', '', 'view') && !has_permission('invoices', '', 'view_own') && get_option('allow_staff_view_invoices_assigned') == '0') {
            access_denied('boletos');
        }
        if (!$id) {
            redirect(admin_url('boletos'));
        }
	    $this->load->model('invoices_model');
		$invoice = $this->invoices_model->get($id);
		if (!$invoice || !user_can_view_invoice($id) ) {
                blank_page(_l('Boleto não encontrado'));
           }
	
	else if($invoice->status == 2)
	   {
		blank_page(_l('Boleto ja liquidado'));
           }

        $query = $this->db->query(" SELECT * FROM tblinvoices INNER JOIN tblclients ON tblclients.userid = tblinvoices.clientid WHERE id='$id' AND status !='2' ");
		foreach ($query->result_array() as $row);
	
		$sacado = new Agente($row['company'], $row['vat'], $row['address'], $row['zip'], $row['city'], $row['state']);
		$cedente = new Agente(get_option('invoice_company_name'), get_option('company_vat'), get_option('invoice_company_address'), get_option('invoice_company_postal_code'), get_option('invoice_company_city'), get_option('company_state'));
       
        $boleto = new Itau(array(
	    // Parâmetros obrigatórios
	    'dataVencimento' => new DateTime($row['duedate']),
	    'valor' => $row['total'],
	    'sequencial' => $row['id'], //$dados['number'], // Para gerar o nosso número
	    'sacado' => $sacado,
	    'cedente' => $cedente,
	    'agencia' => get_option('agencia'), // Até 4 dígitos
	    'carteira' => get_option('carteira'),
	    'conta' => get_option('conta'),
        'contadv'=>get_option('digito_co'), // Até 8 dígitos
	    'codigoCliente' => $row['userid'], // 5 dígitos
        'numeroDocumento' => $row['number'], // 7 dígitos
        'descricaoDemonstrativo' => array( // Até 5
                $row['clientnote'],),
            'instrucoes' => array( // Até 8
                get_option('demo1'),
                get_option('demo2'),
                get_option('demo3'),
                get_option('demo4'),
                ),
            )
        );
        
	 
	echo $boleto->getOutput();
        $dados = $boleto->getOutput();
        $this->load->view('boleto', $dados);
	}

}
