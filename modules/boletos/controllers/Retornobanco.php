<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Retornobanco extends AdminController
{
    public function __construct()
    {
        parent::__construct();
	$this->load->model('boletos_model');
     
    }

    public function index($id = '')
    {
        $this->list_retorno($id);
    }

    public function list_retorno($id = '')
    {
	$data['title'] = _l('Retorno');
        $this->load->view('retorno', $data);
    }
	
    public function processar ()
    {
	$cnabFactory = new Cnab\Factory();
	$fileName = $_FILES['arquivo']['tmp_name'];
        $arquivo = $cnabFactory->createRetorno($fileName);
	$detalhes = $arquivo->listDetalhes();
	$data = array();
		
        foreach($detalhes as $detalhe)
        {
            if($detalhe->getValorRecebido() > 0)
            {

                $nossoNumero     = $detalhe->getNossoNumero();
                $NumeroDocumento = $detalhe->getNumeroDocumento();
                $valorRecebido   = $detalhe->getValorRecebido();
		$valortitulo     = $detalhe->getValorTitulo();
                $dataPagamento   = $detalhe->getDataOcorrencia();
                $carteira        = $detalhe->getCarteira();
                $ocorrencia      = $detalhe->getCodigo();
                $descricao       = $detalhe->getDescricaoLiquidacao();
		$date =		date('Y-m-d');
		$daterecorded = date('Y-m-d H:i:s');

                if($ocorrencia == '06')
			{	
				$this->boletos_model->update_invoice($nossoNumero);
				$this->load->model('invoices_model');
				$invoice = $this->invoices_model->get($nossoNumero);
				if( $invoice ){
				$dbResult = $this->db->query("INSERT INTO tblinvoicepaymentrecords (invoiceid, amount, paymentmode, date, daterecorded, note) VALUES ('$nossoNumero', '$valortitulo', 2, '$date', '$daterecorded', '$descricao')" );	

				}else{
					$result = 'NOSSO NUMERO NAO ENCONTRADO';
				}
					
			} else {
				$result = 'BOLETO NÃO BAIXADO PELO MOTIVO';
				}

				$data['dados'][$nossoNumero]['resultado'] = $result;
				$data['dados'][$nossoNumero]['detalhe'] =  $detalhe;
		    }
			
        }

        $this->load->view('relatorio', $data);

    }
}
