<div class="profilepro-profile-container" data-form_id="<?php echo $atts['id'];?>"  data-mode="view">

<?php 
	global $profilepro;
	$background_image = get_user_meta( $user_id, 'profile_background_pic', true );
	if( empty($background_image) ){
	//$background_image = PROFILEPRO_URL."assets/images/cover.jpg";
	}
	if(profilepro_get_option('user_gravatar')=="y")
        $profile_pic = get_avatar( $user_id); 
        	
	if( empty( get_user_meta( $user_id, 'profile_pic', true )) ){

             $default= PROFILEPRO_URL."assets/images/profiledefault.png";
		$profile_pic =  '<img src="'. $default.'"  />';
	}
	else 
     	{
  		$profile_pic = get_user_meta( $user_id, 'profile_pic', true );
                $profile_pic = '<img src="'.$profile_pic.'"  />';

        }	

?>

<div class="profilepro-profile-head">
<div class="button-left">
<a  href="<?php echo wp_logout_url();?>"><?php _e('Logout','profilepro')?></a></div>
 	<div class="profilepro-profile-left">
 		<div class="profilepro-profile-pic">
 			 <?php echo $profile_pic;?>
 		</div>
 		<div class="profilepro-profile-name">
 			<div class="profilepro-profile-display-name">
 				<?php echo ucfirst(profilepro_profile_details('display_name',$user_id));?>
 			</div>
 			<div class="profilepro-profile-button ">
 				<a class="profilepro-profile-button-alt profilepro-profile-editor profilepro-profile-editor-view profilepro_profile_edit"><?php _e('Edit Profile','profilepro');?></a>
 				
 			</div>
 		</div>
 	</div>
 	<div class="profilepro-profile-right">
 	</div>
 	<div class="profilepro-clear"></div>
</div>	
<div class="profilepro-profile-content">
	<?php
		$profilepro_field_order = get_post_meta( $atts['id'], 'profilepro_field_order',true );
		$form_fields = get_post_meta( $atts['id'], 'fields',true );
		if( $profilepro_field_order ){
			$fields_count = count( $profilepro_field_order );
	 		for( $i=0;$i<$fields_count;$i++ ){
	 			$key = $profilepro_field_order[$i];
	 			$array = $form_fields[$key];
	 			echo $profilepro->field_functions->view_fields( $key, $array, $form_type , $user_id );
	 	}
	} 
	?>
</div></div>
