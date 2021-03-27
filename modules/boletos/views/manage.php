<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
	<div class="content">
		<div class="row">
			<?php
			$this->load->view('list_template');
			?>
		</div>
	</div>
</div>

<?php init_tail(); ?>
<script>
	$(function(){
		initDataTable('.table-boletos',admin_url+'boletos/table', undefined, undefined,undefined,[0,'desc']);
	});
</script>
</body>
</html>
