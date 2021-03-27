<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="_filters _hidden_inputs">
    <?php
    foreach($boletos_statuses as $_status){
        $val = '';
        if($_status == $this->input->get('status')){
            $val = $_status;
        }
        echo form_hidden('boletos_'.$_status,$val);
    }
    foreach($invoices_years as $year){
        echo form_hidden('year_'.$year['year'],$year['year']);
    }
    ?>
</div>
