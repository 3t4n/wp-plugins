<?php 
	/* id and name of form element should be same as the setting name */
	$frontend_product_save_update_email_admin = get_option('frontend_product_save_update_email_admin'); ?>
    <input type="radio" id="html" name="frontend_product_save_update_email_admin" value="1" <?php echo ($frontend_product_save_update_email_admin == 1) ? 'checked' : ''; ?>>
  	<label for="frontend_product_save_update_email_admin">ON</label>
  	<input type="radio" id="css" name="frontend_product_save_update_email_admin" value="0" <?php echo ($frontend_product_save_update_email_admin == 0) ? 'checked' : ''; ?>>
  	<label for="frontend_product_save_update_email_admin">OFF</label><br>