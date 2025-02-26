<?php
	$form_head = get_post_meta( $object->ID, 'profilepro_form_type', true );
	$form_head = $form_head?$form_head:'register';
?>
<div class="profilepro-form-type ">
<div class="form_head"><input type = "radio" name ="profilepro_form_type" value = "register" <?php checked( 'register', $form_head );?>> <?php _e( 'Registration', 'profilepro' )?></div>
<div class="form_head"><input type = "radio" name ="profilepro_form_type" value = "login" <?php checked( 'login', $form_head );?>> <?php _e( 'Login', 'profilepro' )?></div>
<div class="form_head"><input type = "radio" name ="profilepro_form_type" value = "profile" <?php checked( 'profile', $form_head );?>> <?php _e( 'Profile', 'profilepro' )?></div>
</div>
