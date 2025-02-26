<?php
if(get_option('afpw_enable_authors_fb_page')){ 
	//---------------------------------------------------------------------------------- Add Custom field in User Profile----------------------------------------------------------------
	add_action( 'show_user_profile', 'afpw_show_extra_profile_fields' );
	add_action( 'edit_user_profile', 'afpw_show_extra_profile_fields' );
	function afpw_show_extra_profile_fields( $user ) { ?>
	<h3>Facebook Page Feed Widget</h3>
	<table class="form-table">
	<tr>
	<th><label for="fb_page_url">Facebook Page URL:</label></th>
	<td>
	<input type="text" name="fb_page_url" id="fb_page_url" value="<?php echo esc_attr( get_the_author_meta( 'fb_page_url', $user->ID ) ); ?>" class="regular-text" /><br />
	<span class="description">To show facebook page widget on your posts.</span>
	</td>
	</tr>
	</table>
	<?php }
	//------------------------------------------------------------------------------------------saving fields----------------------------------------------------
	add_action( 'personal_options_update', 'afpw_save_extra_profile_fields' );
	add_action( 'edit_user_profile_update', 'afpw_save_extra_profile_fields' );
	function afpw_save_extra_profile_fields( $user_id ) {
	if ( !current_user_can( 'edit_user', $user_id ) )
	return false;
	/* Copy and paste this line for additional fields. Make sure to change 'fb_page_url' to the field ID. */
	update_usermeta( $user_id, 'fb_page_url', $_POST['fb_page_url'] );
	}
	//-----------------------------------------------------------------------------------------usage-----------------------------------------------------------------
	//the_author_meta( $meta_key, $user_id );
}
?>