<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
	<div class="content">
		<div class="row">
			<?php
			$this->load->view('list_remessa');
			?>
		</div>
	</div>
</div>

<?php init_tail(); ?>
<script>
  $(function(){
     var notSortableAndSearchableItemColumns = [];    
      notSortableAndSearchableItemColumns.push(0);
    	
    initDataTable('.table-boletos', admin_url+'boletos/remessa/table', notSortableAndSearchableItemColumns, notSortableAndSearchableItemColumns,'undefined',[4,'desc']);
	
   });
 </script>
</body>
</html>