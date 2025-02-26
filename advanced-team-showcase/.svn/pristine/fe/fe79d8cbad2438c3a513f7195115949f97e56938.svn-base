<?php

	if( !defined( 'ABSPATH' ) ){
		exit;
	}

	function atmswc_register_meta_boxes() {

		$a = array( 'atmswc' );
		add_meta_box( 
			'custom_meta_box_id',                                   # Metabox
			__( 'Details', 'atmswc' ),           					# Title
			'atmswc_display_all_inputs',                             # Call Back func
			$a,                                         			# post type
			'normal'                                                # Text Content
		);

		add_meta_box( 
		'custom_meta_box_set',                                  	# Metabox
		__( 'Social Profiles', 'atmswc' ),           				# Title
		'atmswc_display_social_profiles',                            # Call Back func
		$a,                                         				# post type
		'normal'                                                  	# Text Content
		);  

		$b = array( 'atmswc_options');
		add_meta_box( 
		'atmswc_all_options',                                  		# Metabox
		__( 'Options', 'atmswc' ),           						# Title
		'atmswc_all_options',                              			# Call Back func
		$b,                                         				# post type
		'normal'                                                  	# Text Content
		);

		add_meta_box( 
		'sorting',                                  				# Metabox
		__( 'Sorting', 'atmswc' ),           						# Title
		'atmswc_sorting',                              				# Call Back func
		$b,                                         				# post type
		'normal'                                                  	# Text Content
		);

		add_meta_box( 
		'social_sorting',                                  		    # Metabox
		__( 'Social Sorting', 'atmswc' ),           					# Title
		'atmswc_social_sorting',                              		# Call Back func
		$b,                                         				# post type
		'normal'                                                  	# Text Content
		);	

	}
	add_action( 'add_meta_boxes', 'atmswc_register_meta_boxes' );

	# Call Back Function...
	function atmswc_display_all_inputs( $post, $args ){

		$atmswc_designation         	= get_post_meta( $post->ID, 'atmswc_designation', true );
		$atmswc_email 			  		= get_post_meta( $post->ID, 'atmswc_email', true );
		$atmswc_web 			  		= get_post_meta( $post->ID, 'atmswc_web', true );
		$atmswc_biography				= get_post_meta( $post->ID, 'atmswc_biography', true );
		$atmswc_telephone 		  		= get_post_meta( $post->ID, 'atmswc_telephone', true );
		$atmswc_address         		= get_post_meta( $post->ID, 'atmswc_address', true );

		// All Show/Hide  Details Section
		$designation_sh         		= get_post_meta( $post->ID, 'designation_sh', true );
		$email_sh         				= get_post_meta( $post->ID, 'email_sh', true );
		$web_sh         				= get_post_meta( $post->ID, 'web_sh', true );
		$biography_sh         			= get_post_meta( $post->ID, 'biography_sh', true );
		$telephone_sh         			= get_post_meta( $post->ID, 'telephone_sh', true );
?>

<div class="wrap">
	<table class="form-table">
	   <tbody>
		<tr valign="top">
			<th scope="row">
				<label for="atmswc_designation"><?php esc_html_e('Designation', 'atmswc'); ?></label>
			</th>
			<td style="vertical-align: middle;"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
				<input type="text" name="atmswc_designation" id="atmswc_designation" maxlength="30" class="widefat widefat_custom" value="<?php echo esc_attr($atmswc_designation); ?>" placeholder="Designation" required> &nbsp;
				<input type="checkbox" name="designation_sh" id="designation_sh" class="timezone_string" value="0" <?php  checked( $designation_sh, 0, true );	?>><?php esc_html_e("Hide", "atmswc"); ?>
			</td>
		</tr>	
		<tr valign="top" class="ui-state-default">
			<th scope="row">
				<label for="atmswc_telephone"><?php esc_html_e('Telephone', 'atmswc'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" name="atmswc_telephone" id="atmswc_telephone" maxlength="30" class="widefat widefat_custom" value="<?php echo esc_attr($atmswc_telephone); ?>" placeholder="+00 00 00"> &nbsp;
				<input type="checkbox" name="telephone_sh" id="telephone_sh" class="timezone_string" value="0" <?php  checked( $telephone_sh, 0, true ); ?>><?php esc_html_e("Hide", "atmswc"); ?>	
			</td>
		</tr>
		<tr valign="top" class="ui-state-default">
			<th scope="row">
				<label for="atmswc_email"><?php esc_html_e('Email', 'atmswc'); ?></label>
			</th>
			<td style="vertical-align: middle;"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
				<input type="text" name="atmswc_email" id="atmswc_email" maxlength="30" class="widefat widefat_custom" value="<?php echo sanitize_email($atmswc_email); ?>" placeholder="Email" required> &nbsp;
				<input type="checkbox" name="email_sh" id="email_sh" class="timezone_string" value="0" <?php  checked( $email_sh, 0, true );	?>><?php esc_html_e("Hide", "atmswc"); ?>			
				<div id="emailerror" style="color:red;font-size:11px;font-weight: bold;margin-top:2px;"></div>	
			</td>
		</tr>
		<tr valign="top" class="ui-state-default">
			<th scope="row">
				<label for="atmswc_web"><?php esc_html_e('Web', 'atmswc'); ?></label>
			</th>
			<td style="vertical-align: middle;"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
				<input type="text" name="atmswc_web" id="atmswc_web" maxlength="1500" class="widefat widefat_custom" value="<?php echo esc_url($atmswc_web); ?>" placeholder="Web" > &nbsp;
				<input type="checkbox" name="web_sh" id="web_sh" class="timezone_string" value="0" <?php  checked( $web_sh, 0, true ); ?>><?php esc_html_e("Hide", "atmswc"); ?>
				<div id="errormsg" style="color:red;font-size:11px;font-weight: bold;margin-top:2px;"></div>		
			</td>
		</tr>
		<tr valign="top" class="ui-state-default">
			<th scope="row">
				<label for="atmswc_biography"><?php esc_html_e('Short Biography', 'atmswc'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<div>
					<?php esc_html_e("Max Character Length 147. You have now:", "atmswc"); ?> <span id="char_count"></span>
				</div>
				<div>
					<textarea maxlength="147" name="atmswc_biography" id="atmswc_biography" class="widefat widefat_custom" cols="25" rows="3" required><?php echo esc_attr($atmswc_biography); ?></textarea> &nbsp;
					<input type="checkbox" name="biography_sh" id="biography_sh" class="timezone_string" value="0" <?php checked( $biography_sh, 0, true ); ?>><?php esc_html_e("Hide", "atmswc"); ?>			
				</div>
			</td>
		</tr>
	   </tbody>
	</table>
</div>
<?php
}

	# Include Social Profile Meta
	require_once('social-profile-meta.php');

	# Include All Options
	require_once('all-options-meta.php');

	# Include Sort Meta
	require_once('sort-meta.php');

	# Data save in custom metabox field
	function save_meta_value( $post_id ){	

		# Doing autosave then return.
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
			return;
			
		if( isset( $_POST['atmswc_cat_name'] ) ) {
			update_post_meta( $post_id, 'atmswc_cat_name', array_map( 'sanitize_text_field', $_POST['atmswc_cat_name'] ) );
		}			
		
		if( isset( $_POST['sort_post'] ) ) {
			update_post_meta( $post_id, 'sort_post', array_map( 'sanitize_text_field', $_POST['sort_post'] ) );
		}

		if( isset( $_POST['sort_social'] ) ) {
			update_post_meta( $post_id, 'sort_social', array_map( 'sanitize_text_field', $_POST['sort_social'] ) );
		}

		if( isset( $_POST['sort_array'] ) ) {
			update_post_meta( $post_id, 'sort_array', array_map( 'sanitize_text_field', $_POST['sort_array'] ) );
		}		

		#Value check and saves if needed	
		if( isset($_POST['hide_box_shadow'] ) ){
			update_post_meta( $post_id, 'hide_box_shadow', 1 );
		}
		else{
			update_post_meta( $post_id, 'hide_box_shadow', 0 );
		}

		#Value check and saves if needed
		if( isset( $_POST['first_param'] ) ) {
			if(!empty($_POST['first_param']) && is_numeric($_POST['first_param'])){
				update_post_meta( $post_id, 'first_param', sanitize_text_field($_POST['first_param']) );
			} else{
				update_post_meta( $post_id, 'first_param', 3 );
			}
		}

		#Value check and saves if needed
		if( isset( $_POST['second_param'] ) ) {
			if(!empty($_POST['second_param']) && is_numeric($_POST['firstsecond_param_param'])){
				update_post_meta( $post_id, 'second_param', sanitize_text_field($_POST['second_param']) );
			} else{
				update_post_meta( $post_id, 'second_param', 5 );
			}		
		}

		#Value check and saves if needed
		if( isset( $_POST['third_param'] ) ) {
			update_post_meta( $post_id, 'third_param', sanitize_text_field($_POST['third_param']) );
		}

		#Value check and saves if needed
		if( isset( $_POST['fourth_param'] ) ) {
			update_post_meta( $post_id, 'fourth_param', sanitize_text_field($_POST['fourth_param']) );
		}				

		#Value check and saves if needed
		if( isset( $_POST['img_size'] ) ) {
			update_post_meta( $post_id, 'img_size', sanitize_text_field($_POST['img_size']) );
		}
		#Value check and saves if needed
		if( isset( $_POST['img_height'] ) ) {
			if(!empty($_POST['img_height']) && is_numeric($_POST['img_height'])){

				update_post_meta( $post_id, 'img_height', sanitize_text_field($_POST['img_height']) );
			}
			else
			{
				update_post_meta( $post_id, 'img_height', 269 );
			}
		
		}

		#Value check and saves if needed
		if( isset( $_POST['txt_align'] ) ) {

			update_post_meta( $post_id, 'txt_align', sanitize_text_field($_POST['txt_align']) );
		
		}

		#Value check and saves if needed
		if( isset( $_POST['bg_color'] ) ) {

			update_post_meta( $post_id, 'bg_color', sanitize_text_field($_POST['bg_color']) );
		
		}

		#Value check and saves if needed
		if( isset( $_POST['title_color'] ) ) {

			update_post_meta( $post_id, 'title_color', sanitize_text_field($_POST['title_color']) );
		
		}

		#Value check and saves if needed
		if( isset( $_POST['title_fontsize'] ) ) {

			update_post_meta( $post_id, 'title_fontsize', sanitize_text_field($_POST['title_fontsize']) );
		
		}	

		#Value check and saves if needed
		if( isset( $_POST['content_color'] ) ) {

			update_post_meta( $post_id, 'content_color', sanitize_text_field($_POST['content_color']) );
		
		}

		#Value check and saves if needed
		if( isset( $_POST['content_fontsize'] ) ) {

			update_post_meta( $post_id, 'content_fontsize', sanitize_text_field($_POST['content_fontsize']) );
		
		}

		
		#Value check and saves if needed
		if( isset( $_POST['atmswc_order_by'] ) ) {

			update_post_meta( $post_id, 'atmswc_order_by', sanitize_text_field($_POST['atmswc_order_by']) );
		
		}

		#Value check and saves if needed
		if( isset( $_POST['atmswc_order_type'] ) ) {

			update_post_meta( $post_id, 'atmswc_order_type', sanitize_text_field($_POST['atmswc_order_type']) );
		
		}	

		#Value check and saves if needed
		if( isset( $_POST['atmswc_designation'] ) ) {

			update_post_meta( $post_id, 'atmswc_designation', sanitize_text_field($_POST['atmswc_designation']) );

		}

		#Value check and saves if needed
		if( isset( $_POST['atmswc_email'] ) ) {

			if( is_email( $_POST['atmswc_email'] ) ){
				update_post_meta( $post_id, 'atmswc_email', sanitize_text_field( $_POST['atmswc_email'] ) );
			}
		}

		#Value check and saves if needed
		if( isset( $_POST['atmswc_web'] ) && strlen($_POST['atmswc_web']) > 2  && strlen($_POST['atmswc_web']) < 250) {

			update_post_meta( $post_id, 'atmswc_web', sanitize_text_field($_POST['atmswc_web']) );
		}	

		#Value check and saves if needed
		if( isset( $_POST['atmswc_biography'] ) && strlen($_POST['atmswc_biography']) > 2  && strlen($_POST['atmswc_biography']) < 1500) {

			update_post_meta( $post_id, 'atmswc_biography', sanitize_text_field($_POST['atmswc_biography']) );

		}

		#Value check and saves if needed
		if( isset( $_POST['atmswc_telephone'] ) && strlen($_POST['atmswc_telephone']) > 2  && strlen($_POST['atmswc_telephone']) < 16) {

			update_post_meta( $post_id, 'atmswc_telephone', sanitize_text_field($_POST['atmswc_telephone']) );
		}
		
		#Value check and saves
		if( isset( $_POST['designation_sh'] ) ) {
			update_post_meta( $post_id, 'designation_sh', '0' );
		} else {
			update_post_meta( $post_id, 'designation_sh', '1' );
		}

		#Value check and saves
		if( isset( $_POST['email_sh'] ) ) {
			update_post_meta( $post_id, 'email_sh', '0' );
		} else {
			update_post_meta( $post_id, 'email_sh', '1' );
		}

		#Value check and saves
		if( isset( $_POST['web_sh'] ) ) {
			update_post_meta( $post_id, 'web_sh', '0' );
		} else {
			update_post_meta( $post_id, 'web_sh', '1' );
		}

		#Value check and saves
		if( isset( $_POST['biography_sh'] ) ) {
			update_post_meta( $post_id, 'biography_sh', '0' );
		} else {
			update_post_meta( $post_id, 'biography_sh', '1' );
		}			

		#Value check and saves
		if( isset( $_POST['telephone_sh'] ) ) {
			update_post_meta( $post_id, 'telephone_sh', '0' );
		} else {
			update_post_meta( $post_id, 'telephone_sh', '1' );
		}

		// Settings metaboxes value save

		#Value check and saves
		if( isset( $_POST['atmswc_fb'] ) ) {
			update_post_meta( $post_id, 'atmswc_fb',  esc_url($_POST['atmswc_fb'])  );
		}

		#Value check and saves
		if( isset( $_POST['atmswc_twitter'] ) ) {
			update_post_meta( $post_id, 'atmswc_twitter',  esc_url($_POST['atmswc_twitter'])  );
		}

		#Value check and saves
		if( isset( $_POST['atmswc_gplus'] ) ) {
			update_post_meta( $post_id, 'atmswc_gplus',  esc_url($_POST['atmswc_gplus'])  );
		}

		#Value check and saves
		if( isset( $_POST['atmswc_linkedin'] ) ) {
			update_post_meta( $post_id, 'atmswc_linkedin',  esc_url($_POST['atmswc_linkedin'])  );
		}

		#Value check and saves
		if( isset( $_POST['atmswc_github'] ) ) {
			update_post_meta( $post_id, 'atmswc_github',  esc_url($_POST['atmswc_github'])  );
		}

		#Value check and saves
		if( isset( $_POST['atmswc_behance'] ) ) {
			update_post_meta( $post_id, 'atmswc_behance',  esc_url($_POST['atmswc_behance'])  );
		}	

		#Value check and saves
		if( isset( $_POST['atmswc_dribble'] ) ) {
			update_post_meta( $post_id, 'atmswc_dribble',  esc_url($_POST['atmswc_dribble'])  );
		}	

		#Value check and saves
		if( isset( $_POST['atmswc_youtube'] ) ) {
			update_post_meta( $post_id, 'atmswc_youtube',  esc_url($_POST['atmswc_youtube'])  );
		}				
		
		// Options value save
		if( isset( $_POST['theme_id'] ) ) {
			update_post_meta( $post_id, 'theme_id', sanitize_text_field($_POST['theme_id'])  );
		}

		if( isset( $_POST['opacity_color'] ) ){
			update_post_meta( $post_id, 'opacity_color', sanitize_text_field($_POST['opacity_color'])  );
		} 

		if( isset( $_POST['opacity'] ) ){
			update_post_meta( $post_id, 'opacity', sanitize_text_field($_POST['opacity'])  );
		} 

		if( isset( $_POST['bio_text_color'] ) ){
			update_post_meta( $post_id, 'bio_text_color', sanitize_text_field($_POST['bio_text_color'])  );
		} 

		if( isset( $_POST['bio_fontsize'] ) ){
			update_post_meta( $post_id, 'bio_fontsize', sanitize_text_field($_POST['bio_fontsize'])  );
		} 

		if( isset( $_POST['designation_color'] ) ){
			update_post_meta( $post_id, 'designation_color', sanitize_text_field($_POST['designation_color'])  );
		} 

		if( isset( $_POST['designation_fontsize'] ) ){
			update_post_meta( $post_id, 'designation_fontsize', sanitize_text_field($_POST['designation_fontsize'])  );
		} 

		if( isset( $_POST['telephone_color'] ) ){
			update_post_meta( $post_id, 'telephone_color', sanitize_text_field($_POST['telephone_color'])  );
		} 	

		if( isset( $_POST['telephone_fontsize'] ) ){
			update_post_meta( $post_id, 'telephone_fontsize', sanitize_text_field($_POST['telephone_fontsize'])  );
		} 						

		if( isset( $_POST['email_color'] ) ){
			update_post_meta( $post_id, 'email_color', sanitize_text_field($_POST['email_color'])  );
		} 

		if( isset( $_POST['email_fontsize'] ) ){
			update_post_meta( $post_id, 'email_fontsize', sanitize_text_field($_POST['email_fontsize'])  );
		} 	

		if( isset( $_POST['web_color'] ) ){
			update_post_meta( $post_id, 'web_color', sanitize_text_field($_POST['web_color'])  );
		} 

		if( isset( $_POST['web_fontsize'] ) ){
			update_post_meta( $post_id, 'web_fontsize', sanitize_text_field($_POST['web_fontsize'])  );
		} 

		if( isset( $_POST['bio_social_icon'] ) ){
			update_post_meta( $post_id, 'bio_social_icon', sanitize_text_field($_POST['bio_social_icon'])  );
		} 

		if( isset( $_POST['bio_social_textcolor'] ) ){
			update_post_meta( $post_id, 'bio_social_textcolor', sanitize_text_field($_POST['bio_social_textcolor'])  );
		}

		if( isset( $_POST['bio_social_hcolor'] ) ){
			update_post_meta( $post_id, 'bio_social_hcolor', sanitize_text_field($_POST['bio_social_hcolor'])  );
		} 

		if( isset( $_POST['bio_social_backcolor'] ) ){
			update_post_meta( $post_id, 'bio_social_backcolor', sanitize_text_field($_POST['bio_social_backcolor'])  );
		} 	

		if( isset( $_POST['bio_social_backhcolor'] ) ){
			update_post_meta( $post_id, 'bio_social_backhcolor', sanitize_text_field($_POST['bio_social_backhcolor'])  );
		}		 	

	}

	add_action( 'save_post', 'save_meta_value' );
	# Custom metabox field end