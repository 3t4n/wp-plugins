<?php
	$form_role = get_post_meta( $object->ID, 'profilepro_form_role', true );
	$form_role = $form_role?$form_role:'subscriber';
?>
<div class="profilepro-form-role">
<select id="profilepro_form_role" name="profilepro_form_role">
   <?php wp_dropdown_roles( $form_role ); ?>
</select>
</div>
