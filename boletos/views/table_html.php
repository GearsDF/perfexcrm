<?php defined('BASEPATH') or exit('No direct script access allowed');
  
   $table_data = [];
	$table_data = array_merge($table_data, array(
	_l('invoice_dt_table_heading_number'),
	_l('datecreated'),
	_l('client'),
	_l('our_number'),
	_l('invoice_dt_table_heading_duedate'),
	_l('invoice_dt_table_heading_amount'),
	_l('invoice_dt_table_heading_status')
     ));
    
   render_datatable($table_data, 'boletos');
?>
