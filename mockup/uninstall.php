<?php

if( defined( 'WP_UNINSTALL_PLUGIN' ) ) {


	function mockup_delete_all_options() {

		delete_option( 'mockup_related_popup_btn' ); // last use: 1.1
		delete_option( 'mockup_sidebar' ); // last use: 1.4.1
		delete_option( 'mockup_uninstall' ); // last use: 1.6.2


		delete_option( 'mockup_default_background_color' );
		delete_option( 'mockup_sidebar' );
		delete_option( 'mockup_single_title' );
		delete_option( 'mockup_intro' );
		delete_option( 'mockup_email' );
		delete_option( 'mockup_email_settings' );
		delete_option( 'mockup_menu_position' );
		delete_option( 'mockup_related_btn' );
		delete_option( 'mockup_description_btn' );
		delete_option( 'mockup_comment_btn' );
		delete_option( 'mockup_send_btn' );
		delete_option( 'mockup_approve_btn' );
		delete_option( 'mockup_intro_title' );
		delete_option( 'mockup_intro_text' );
		delete_option( 'mockup_intro_link' );
		delete_option( 'mockup_related_title' );
		delete_option( 'mockup_related_text' );
		delete_option( 'mockup_description_title' );
		delete_option( 'mockup_comment_title' );
		delete_option( 'mockup_approve_title' );
		delete_option( 'mockup_approve_text' );
		delete_option( 'mockup_comment_name_label' );
		delete_option( 'mockup_comment_message_label' );
		delete_option( 'mockup_comment_no_comments' );
		delete_option( 'mockup_approved_text' );
		delete_option( 'mockup_locked_title' );
		delete_option( 'mockup_color_active' );
		delete_option( 'mockup_importfont' );
		delete_option( 'mockup_fontfamily' );
		delete_option( 'mockup_style_general' );
		delete_option( 'mockup_password_settings' );
		delete_option( 'mockup_overlay_settings' );
		delete_option( 'mockup_overflow_settings' );
		delete_option( 'mockup_animation_time' );
	}


	if( ! is_multisite() ) {

		mockup_delete_all_options();

	} else {

		global $wpdb;
		$blog_ids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
		$original_blog_id = get_current_blog_id();

		foreach($blog_ids as $blog_id) {

			switch_to_blog($blog_id);

			mockup_delete_all_options();

		}

		switch_to_blog($original_blog_id);
	}
}