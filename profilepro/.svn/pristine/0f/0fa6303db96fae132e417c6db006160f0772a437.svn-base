<?php
	$form_autologin = get_post_meta( $object->ID, 'profilepro_form_autologin', true );
	$form_autologin = $form_autologin?$form_autologin:"1";
?>
<div class="profilepro-form-autologin">
<select id="profilepro_form_autologin" name="profilepro_form_autologin">
   <option value = "1" <?php echo selected( 1, $form_autologin );?> ><?php _e( 'Yes', PROFILEPRO_PLUGIN_SLUG );?></option>
   <option value = "0" <?php echo selected( 0, $form_autologin );?> ><?php _e( 'No', PROFILEPRO_PLUGIN_SLUG );?></option>
</select>
</div>
