<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="col-md-12">
   <div class="panel_s mbot10">
      <div class="panel-body _buttons">
         <?php if(has_permission('invoices','','create')){ ?>
            <a href="<?php echo admin_url('boletos/remessa'); ?>" class="btn btn-info pull-left new new-invoice-list mright5"><?php echo 
_l('generate_shipping'); ?></a>
         <?php } ?>
         <a href="<?php echo admin_url('boletos/retornobanco'); ?>" class="btn btn-info pull-left"><?php echo _l('import_return'); ?></a>
	  </div>
   </div>
   <div class="row">
      <div class="col-md-12" id="small-table">
         <div class="panel_s">
            <div class="panel-body">
               <!-- if invoiceid found in url -->
		 <?php $this->load->view('remessa_html'); ?>
            </div>
         </div>
      </div>
      <div class="col-md-7 small-table-right-col">
         <div id="invoice" class="hide">
         </div>
      </div>
   </div>
</div>
