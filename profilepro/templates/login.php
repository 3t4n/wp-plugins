<div class="profilepro profilepro-profile-container" data-form_id="<?php echo $atts['id'];?>"  data-mode="login">
<div class="profilepro-profile-head-reg">
 	<div class="profilepro-profile-left">
 		<?php _e('Login',PROFILEPRO_PLUGIN_SLUG);?>
 	</div>
 	<div class="profilepro-profile-right">
 	</div>
 	<div class="profilepro-clear"></div>
</div>	
<div class="profilepro-profile-content">
	<div class="profilepro-form">
	<?php if( isset( $atts['msg_type'] ) && $atts['msg_type'] == 'admin_approve' ){?>
	<div class="profilepro-message"><?php _e('Your account is awaiting admin approval',PROFILEPRO_PLUGIN_SLUG);?></div>
	<?php }else if( isset( $atts['msg_type'] ) &&  $atts['msg_type'] == 'email_approve' ){?>
	<div class="profilepro-message"><?php _e('Your account is awaiting email verification',PROFILEPRO_PLUGIN_SLUG);?></div>
	<?php }?>
	
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
	 	echo $profilepro->field_functions->edit_fields( $key, $array, $form_type );
	 }
} 
?>
		<input type="hidden" name="login_redirect" value="<?php echo $atts['login_redirect'];?>">
		<br>
		<button type="submit" value="" class="profilepro-button"><?php _e('Login',PROFILEPRO_PLUGIN_SLUG);?></button>
		<button class="profilepro_secondary_button profilepro-button" type="button" value="" class="profilepro-button" data-href="<?php echo $profilepro->api->permalink(0,'register');?>"><?php _e('Register',PROFILEPRO_PLUGIN_SLUG);?></button>
		<div id="profilepro-loader"><img src="<?php echo PROFILEPRO_URL.'assets/images/loader.gif';?>"></div>
		<div id="profilepro-ajax-msg"></div>
		<div class="profilepro-forgot-link"><a href="?forgot=true"><?php _e( 'Forgot Password ?', PROFILEPRO_PLUGIN_SLUG );?></a></div>
		</form>
</div>		
	
	</div>
	
</div>
