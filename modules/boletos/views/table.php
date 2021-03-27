<?php defined('BASEPATH') or exit('No direct script access allowed');

$aColumns = [
    'number',
    'date',
     get_sql_select_client_company(),
    'duedate',
    'total',
     db_prefix() . 'invoices.status',
    ];

$sIndexColumn = 'id';
$sTable = db_prefix() . 'invoices';

$join = [
    'LEFT JOIN ' . db_prefix() . 'clients ON ' . db_prefix() . 'clients.userid = ' . db_prefix() . 'invoices.clientid',
    'LEFT JOIN ' . db_prefix() . 'currencies ON ' . db_prefix() . 'currencies.id = ' . db_prefix() . 'invoices.currency',
];

$where  = [];
$filter = [];

if ($clientid != '') {
    array_push($where, 'AND ' . db_prefix() . 'invoices.clientid=' . $clientid);
}

$aColumns = hooks()->apply_filters('invoices_table_sql_columns', $aColumns);

$result = data_tables_init($aColumns, $sIndexColumn, $sTable, $join, $where, [
    db_prefix() . 'invoices.id',
    db_prefix() . 'invoices.clientid',
    'number',
    'duedate',
    db_prefix(). 'currencies.name as currency_name',
    ]);

$output  = $result['output'];
$rResult = $result['rResult'];

foreach ($rResult as $aRow) {
    $row = [];

    $numberOutput = '';

    $numberOutput = '<a href="' . admin_url('boletos/boleto/' . $aRow['id']) . '" target="_blank">' . format_invoice_number($aRow['id']) . '</a>';
    
    $numberOutput .= '<div class="row-options">';

    $numberOutput .= '<a href="' . admin_url('boletos/boleto/' . $aRow['id']) . '" target="_blank">' . _l('print') . '</a>';

    if (has_permission('invoices', '', 'edit')) {
        $numberOutput .= ' | <a href="' . admin_url('invoices/invoice/' . $aRow['id']) . '">' . _l('edit') . '</a>';
    }
    $numberOutput .= '</div>';

    $row[] = $numberOutput;

    $row[] = _d($aRow['date']);

    if (empty($aRow['deleted_customer_name'])) {
        $row[] = '<a href="' . admin_url('clients/client/' . $aRow['clientid']) . '">' . $aRow['company'] . '</a>';
    } else {
        $row[] = $aRow['deleted_customer_name'];
    }

    $row[] = $aRow['id'];

    $row[] = _d($aRow['duedate']);

    $row[] = app_format_money($aRow['total'], $aRow['currency_name']);

    $row[] = format_invoice_status($aRow[db_prefix() . 'invoices.status']);

    $row['DT_RowClass'] = 'has-row-options';

    $row = hooks()->apply_filters('boletos_table_row_data', $row, $aRow);

    $output['aaData'][] = $row;

}
