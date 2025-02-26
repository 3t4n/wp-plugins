<?php
echo "<h2>Custom Tag For All Products</h2>";

global $wpdb;
$table_name = $wpdb->prefix . 'wctag_products';
$setting = $wpdb->get_row("SELECT * FROM $table_name");

?>
<div class="note"><h4>Note:</h4><p>Default Tag text "default tag" you can change it....</p>
<p>By default your tag will appear only one day on all new products you can change it....</p>
</div>
<div class="mainForm" style="text-align: center;">
	<form method="POST" action="<?php echo admin_url( 'admin.php' ); ?>">
	<input type="hidden" name="action" value="wpse10500" />
		<div class="filedgroup">
		<label>Tag custom text:</label>

		<input type="text" name="tag_txt" <?php if(empty($setting->tag_txt)) { echo 'value="default tag"'; } else {echo 'value="'.$setting->tag_txt.'"'; } ?> />
	</div>

	<div class="filedgroup">
		<label>How many days tag will appear on new products:</label>
		<input type="text" name="number_of_days" <?php if(isset($setting->number_of_days)) { echo 'value="'.$setting->number_of_days.'"'; } ?> />
	</div>

	<div class="submitbtn"><input type="submit" name="submit" value="Submit"></div>
	</form>
	

</div>