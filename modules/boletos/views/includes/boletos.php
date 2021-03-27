<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="horizontal-scrollable-tabs">
   <div class="scroller arrow-left"><i class="fa fa-angle-left"></i></div>
   <div class="scroller arrow-right"><i class="fa fa-angle-right"></i></div>
   <div class="horizontal-tabs">
      <ul class="nav nav-tabs nav-tabs-horizontal" role="tablist">
         <li role="presentation" class="active">
		    <a href="#nosso_numero" aria-controls="nosso_numero" role="tab" data-toggle="tab"><?php echo _l('settings_boleto_nosso_numero'); ?></a>
         </li>
         <li role="presentation">
            <a href="#bancos" aria-controls="bancos" role="tab" data-toggle="tab"><?php echo _l('settings_boleto_config_bancos'); ?></a>
         </li>
         <li role="presentation">
            <a href="#boletos" aria-controls="boletos" role="tab" data-toggle="tab"><?php echo _l('settings_boleto_config_boletos'); ?></a>
         </li>
      </ul>
   </div>
</div>
<div class="tab-content">        
   <div role="tabpanel" class="tab-pane active" id="nosso_numero">
      <div class="form-group"> 

	      <i class="fa fa-question-circle pull-left" data-toggle="tooltip" data-title="<?php echo _l('settings_sales_next_boleto_tooltip'); ?>"></i>
	  <?php echo render_input('settings[increment]','settings_sales_init_boleto', get_option('increment')); ?>

      </div>
    </div>
   <div role="tabpanel" class="tab-pane" id="bancos">     
	 <div class="form-group">  
	 <?php echo render_input('settings[carteira]','Carteira', get_option('carteira')); ?>
	 <?php echo render_input('settings[agencia]','Agencia', get_option('agencia')); ?>
	 <?php echo render_input('settings[conta]','Conta-Corrente', get_option('conta')); ?>
	 <?php echo render_input('settings[digito_co]','Digito', get_option('digito_co')); ?>

	  <hr />
	  
		 
	  </div>
	 <div class="col-md-4>
            <label for="default_proposals_pipeline_sort" class="control-label"><?php echo _l('Aceite'); ?></label>
            <select name="settings[default_proposals_pipeline_sort]" id="default_proposals_pipeline_sort" class="selectpicker" data-width="10%" data-none-selected-text="<?php echo _l('dropdown_non_selected_tex'); ?>">
               <option value="datecreated" <?php if(get_option('aceite') == 'S'){echo 'selected'; }?>><?php echo _l('sim'); ?></option>
               <option value="date" <?php if(get_option('aceite') == 'N'){echo 'selected'; }?>><?php echo _l('não'); ?></option>
              
            </select>
       
	   <hr />
	  <h4><?php echo _l('ESPECIE DE DOCUMENTO - (Se informe no banco qual usar)'); ?></h4>
      <hr />

<div class="form-group">
		<div class="radio radio-primary radio-inline">
            <input type="radio" name="settings[especie]" value="01" id="boleto_dm" <?php if(get_option('especie') == '01'){echo 'checked';} ?>>
            <label for="boleto_dm"><?php echo _l('DUPLICATA MERCANTIL'); ?></label>
         </div>
         <div class="radio radio-primary radio-inline">
            <input type="radio" name="settings[especie]" value="02" id="boleto_np" <?php if(get_option('especie') == '02'){echo 'checked';} ?>>
            <label for="boleto_np"><?php echo _l('NOTA PROMISSÓRIA'); ?></label>
         </div>
         <div class="radio radio-primary radio-inline">
            <input type="radio" name="settings[especie]" value="03" id="boleto_ns" <?php if(get_option('especie') == '03'){echo 'checked';} ?>>
            <label for="boleto_ns"><?php echo _l('NOTA DE SEGURO'); ?></label>
         </div>
         <div class="radio radio-primary radio-inline">
            <input type="radio" name="settings[especie]" value="04" id="boleto_me" <?php if(get_option('especie') == '04'){echo 'checked';} ?>>
            <label for="boleto_me"><?php echo _l('MENSALIDADE ESCOLAR'); ?></label>
         </div>
		          <div class="radio radio-primary radio-inline">
            <input type="radio" name="settings[especie]" value="05" id="boleto_recibo" <?php if(get_option('especie') == '05'){echo 'checked';} ?>>
            <label for="boleto_recibo"><?php echo _l('RECIBO'); ?></label>
         </div>
		<div class="radio radio-primary radio-inline">
            <input type="radio" name="settings[especie]" value="06" id="boleto_crt" <?php if(get_option('especie') == '06'){echo 'checked';} ?>>
            <label for="boleto_crt"><?php echo _l('CONTRATO'); ?></label>
         </div>
		 <hr />
		 		<div class="radio radio-primary radio-inline">
            <input type="radio" name="settings[especie]" value="07" id="boleto_dm" <?php if(get_option('especie') == '07'){echo 'checked';} ?>>
            <label for="boleto_dm"><?php echo _l('DUPLICATA MERCANTIL'); ?></label>
         </div>
         <div class="radio radio-primary radio-inline">
            <input type="radio" name="settings[especie]" value="08" id="boleto_np" <?php if(get_option('especie') == '08'){echo 'checked';} ?>>
            <label for="boleto_css"><?php echo _l('COSSEGUROS'); ?></label>
         </div>
         <div class="radio radio-primary radio-inline">
            <input type="radio" name="settings[especie]" value="09" id="boleto_ns" <?php if(get_option('especie') == '09'){echo 'checked';} ?>>
            <label for="boleto_ns"><?php echo _l('DUPLICATA DE SERVIÇO'); ?></label>
         </div>
         <div class="radio radio-primary radio-inline">
            <input type="radio" name="settings[especie]" value="10" id="boleto_me" <?php if(get_option('especie') == '10'){echo 'checked';} ?>>
            <label for="boleto_me"><?php echo _l('LETRA DE CÂMBIO'); ?></label>
         </div>
		          <div class="radio radio-primary radio-inline">
            <input type="radio" name="settings[especie]" value="11" id="boleto_recibo" <?php if(get_option('especie') == '11'){echo 'checked';} ?>>
            <label for="boleto_recibo"><?php echo _l('NOTA DE DÉBITOS'); ?></label>
         </div>
		<div class="radio radio-primary radio-inline">
            <input type="radio" name="settings[especie]" value="12" id="boleto_crt" <?php if(get_option('especie') == '12'){echo 'checked';} ?>>
            <label for="boleto_crt"><?php echo _l('DIVERSOS'); ?></label>
         </div>
      </div>
	  
	
	</div>
	</div>
   <div role="tabpanel" class="tab-pane" id="boletos">
     <div class="form-group"> 

	 <?php echo render_input('settings[multa_atrazo]','Multa por atrazo:', get_option('multa_atrazo')); ?>
	 <?php echo render_input('settings[juro]','Juros/mora ao dia(%):', get_option('juro')); ?>
<hr />
<label for="default_proposals_pipeline_sort" class="control-label"><?php echo _l('Protestar caso não pague?'); ?></label>
            <select name="settings[default_proposals_pipeline_sort]" id="default_proposals_pipeline_sort" class="selectpicker" data-width="10%" data-none-selected-text="<?php echo _l('dropdown_non_selected_tex'); ?>">
               <option value="datecreated" <?php if(get_option('protesto') == '1'){echo 'selected'; }?>><?php echo _l('sim'); ?></option>
               <option value="date" <?php if(get_option('protesto') == '2'){echo 'selected'; }?>><?php echo _l('não'); ?></option>
              
            </select>
<hr />			
	 <?php echo render_input('settings[demo1]','Instruções 1:', get_option('demo1')); ?>
	 <?php echo render_input('settings[demo2]','Instruções 2:', get_option('demo2')); ?>
	 <?php echo render_input('settings[demo3]','Instruções 3:', get_option('demo3')); ?>
	 <?php echo render_input('settings[demo4]','Instruções 4:', get_option('demo4')); ?>
 </div>
</div>

