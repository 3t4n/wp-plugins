<div class="profilepro profilepro-profile-container" data-form_id = "<?php echo $form_type;?>" data-mode="register" >
<div class="profilepro-profile-head-reg">
 	<div class="profilepro-profile-left">
 		<?php _e('Register',PROFILEPRO_PLUGIN_SLUG);?>
 	</div>
 	<div class="profilepro-profile-right">
 	</div>
 	<div class="profilepro-clear"></div>
</div>	
<div class="profilepro-profile-content">
	<div class="profilepro-form">
	
		<form method="post" action="">
<?php
global $profilepro;
$profilepro_field_order = get_post_meta( $atts['id'], 'profilepro_field_order',true );
$form_fields = get_post_meta( $atts['id'], 'fields',true );;
if( $profilepro_field_order ){
	$fields_count = count( $profilepro_field_order );
	 for( $i=0;$i<$fields_count;$i++ ){
	 	$key = $profilepro_field_order[$i];
	 	$array = $form_fields[$key];
	 	echo $profilepro->field_functions->edit_fields( $key, $array );
	 }
}

		$form_role = get_post_meta( $atts['id'], 'profilepro_form_role', true );
		$form_role = $form_role?$form_role:'subscriber';
		
		$form_autologin = get_post_meta( $atts['id'], 'profilepro_form_autologin', true );
		$form_autologin = $form_autologin?$form_autologin:1;
		
?>
		<input type="hidden" name="register_redirect" value="<?php echo isset($atts['login_redirect'])?$atts['login_redirect']:'';?>">
		<input type="hidden" name="role" value="<?php echo $form_role; ?>">
		<input type="hidden" name="profilepro-form-autologin" value="<?php echo $form_autologin; ?>">
		<br>
		<button type="submit" value="" class="profilepro-button"><?php _e('Register',PROFILEPRO_PLUGIN_SLUG);?></button>
		<button class="profilepro_secondary_button profilepro-button" type="button" value="" class="profilepro-button" data-href="<?php echo $profilepro->api->permalink(0,'login');?>"><?php _e('Login',PROFILEPRO_PLUGIN_SLUG);?></button>
               
                <?php do_action("profilepro_sociallogin")?>
		<div id="profilepro-loader"><img src="<?php echo PROFILEPRO_URL.'assets/images/loader.gif';?>"></div>
		<div id="profilepro-ajax-msg"></div>

		</form>
	
	</div>
	</div>
</div>
