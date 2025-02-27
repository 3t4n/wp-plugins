<div class="ei-flex ei-component-wrap">
	<div class="ei-flex-1 ei-from-address">
		<?php easy_invoice_get_from_address(); ?>
	</div>

	<?php
	easy_invoice_load_template('tables.details', array('details_data' => $details_data));
	?>
</div>
