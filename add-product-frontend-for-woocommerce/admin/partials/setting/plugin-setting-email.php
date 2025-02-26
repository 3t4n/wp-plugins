<?php 
	/* id and name of form element should be same as the setting name */
	$frontend_product_save_update_email = get_option('frontend_product_save_update_email'); ?>
    <input type="radio" id="html" name="frontend_product_save_update_email" value="1" <?php echo ($frontend_product_save_update_email == 1) ? 'checked' : ''; ?>>
  	<label for="frontend_product_save_update_email">ON</label>
  	<input type="radio" id="css" name="frontend_product_save_update_email" value="0" <?php echo ($frontend_product_save_update_email == 0) ? 'checked' : ''; ?>>
  	<label for="frontend_product_save_update_email">OFF</label><br>