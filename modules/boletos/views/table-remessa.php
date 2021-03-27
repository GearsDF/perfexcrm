<?php
defined('BASEPATH') or exit('No direct script access allowed');

$aColumns = [
    'number',
    'date',
	'clientnote',
     get_sql_select_client_company(),
    'duedate',
    'total',
     db_prefix() . 'invoices.status',
    ];

$sIndexColumn = 'id';
$sTable = db_prefix() . 'invoices';

$join = [
    'LEFT JOIN ' . db_prefix() . 'clients ON ' . db_prefix() . 'invoices.clientid = ' . db_prefix() . 'clients.userid',
    'LEFT JOIN ' . db_prefix() . 'currencies ON ' . db_prefix() . 'currencies.id = ' . db_prefix() . 'invoices.currency',
];

$where  = [];


$aColumns = hooks()->apply_filters('invoices_table_sql_columns', $aColumns);

$result = data_tables_init($aColumns, $sIndexColumn, $sTable, $join, $where, [
    db_prefix() . 'invoices.id',
    db_prefix() . 'invoices.clientid',
	db_prefix() . 'invoices.clientnote',
    'number',
    'duedate',
    db_prefix(). 'currencies.name as currency_name',
    ]);

$output  = $result['output'];
$rResult = $result['rResult'];

$statuses  = $this->ci->remessas_model->get_statuses();
$statusIds = [];

foreach ($statuses as $status) {
    if ($this->ci->input->post('invoices_' . $status)) {
        array_push($statusIds, $status);
    }
}

foreach ($rResult as $aRow) {
    $row = [];
	
	$row[] = '<div class="checkbox"><input type="checkbox" value="' . $aRow['id'] . '"><label></label></div>';

    $numberOutput = '';
	
    $numberOutput = format_invoice_number($aRow['id']);

    $row[] = $numberOutput;

    $row[] = '<a href="' . admin_url('clients/client/' . $aRow['clientid']) . '">' . $aRow['company'] . '</a>';

    $row[] = $aRow['clientnote'];
	
    $row[] = $aRow['id'];
	
	$row[] = _d($aRow['date']);
		
	$row[] = _d($aRow['duedate']);

    $row[] = app_format_money($aRow['total'], $aRow['currency_name']);

    $row[] = format_invoice_status($aRow[db_prefix() . 'invoices.status']);

    $row['DT_RowClass'] = 'has-row-options';

    $row = hooks()->apply_filters('boletos_table_row_data', $row, $aRow);

    $output['aaData'][] = $row;

}
