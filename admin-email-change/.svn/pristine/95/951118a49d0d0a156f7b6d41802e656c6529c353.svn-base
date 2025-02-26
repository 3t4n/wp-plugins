<?php
/**
 * Provide a admin area view for the plugin
 *
 * Change email settings
 *
 * @link       https://profiles.wordpress.org/wpteamindianic/#content-plugins
 * @since      1.0.0
 *
 * @package    change-admin-email
 * @subpackage change-admin-email/admin
 */


/**
 * Admin change email settings hook
 * @since 1.0
 * */
add_action('wp_after_admin_bar_render', 'cae_setting_callback');
function cae_setting_callback() {
	if (function_exists('get_current_screen')) {
	    $screen = get_current_screen();
	    if($screen->base == "options-general"){
	    	$nonce = wp_create_nonce('change-admin-email-nonce');
	        wp_enqueue_script( 'cae_adminjs',CAE_URL . '/admin/js/admin.js', array('jquery'));
	        wp_localize_script( 'cae_adminjs', 'cae_adminjs_object',
		        array( 
		            'ajaxurl' => admin_url( 'admin-ajax.php' ),
		            'change_admin_email_nonce' => $nonce,
		            'change_admin_email_button_text' => __('Change Email'),
		        )
		    );
	    }
    }
}

/**
 * Update admin email ajax
 * @since 1.0
 * */
add_action('wp_ajax_cea_update_admin_email', 'cea_update_admin_email');
add_action('wp_ajax_nopriv_cea_update_admin_email', 'cea_update_admin_email');
function cea_update_admin_email(){
	if (!wp_verify_nonce(sanitize_text_field($_POST['change_admin_email_nonce']), 'change-admin-email-nonce')) {
        echo json_encode(array('status'=>0,'message'=>__("Something is wrong here.")));
    }else{
    	update_option( 'admin_email', sanitize_email($_POST['new_admin_email']) );
    	update_option( 'new_admin_email', sanitize_email($_POST['new_admin_email']) );
    	echo json_encode(array('status'=>1,'message'=>__("Admin email has been updated.")));
    }
	exit;
}