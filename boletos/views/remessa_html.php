<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
			  
    <?php
    $table_data = [];

    if(has_permission('boletos','','delete')) {
      $table_data[] = '<span class="hide"> - </span>
	  <div class="checkbox mass_select_all_wrap">
	  <input type="checkbox" id="mass_select_all" data-to-table="boletos"><label>
	  </label></div>';
    }
	$table_data = array_merge($table_data, array(
	_l('invoice_dt_table_heading_number'),
	_l('client'),
	_l('Descrição'),
	_l('our_number'),
	_l('datecreated'),
	_l('invoice_dt_table_heading_duedate'),
	_l('invoice_dt_table_heading_amount'),
	_l('invoice_dt_table_heading_status')));
    render_datatable($table_data,'boletos');
	
?>

