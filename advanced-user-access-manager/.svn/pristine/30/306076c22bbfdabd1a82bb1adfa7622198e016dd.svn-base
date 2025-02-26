<?php
/**
 * Settings Page
 *
 * @since       1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $wpdb;

if ( isset( $_POST['auam_save_settings_field'] ) && wp_verify_nonce($_POST['auam_settings_nonce_field'], 'auam_settings_nonce') ) {

	$input_settings = array();

	/**
	 * Check if the input settings does exist
	 *
	 * @since 1.0.0
	 */
	if ( isset( $_POST['auam_setting_field_'] ) && is_array( $_POST['auam_setting_field_'] ) ) {
		$input_settings = map_deep( $_POST['auam_setting_field_'], 'sanitize_text_field' );
	}

	$setting_login_page = isset( $input_settings['login_page'] ) ? $input_settings['login_page'] : '';
	$setting_login_page = filter_var( $setting_login_page, FILTER_VALIDATE_INT );

	$all_page_restrict = isset( $input_settings['all_page_restrict'] ) ? $input_settings['all_page_restrict'] : '';
	$all_page_restrict = filter_var( $all_page_restrict, FILTER_VALIDATE_INT );

	$setting_advance_login_form = isset( $input_settings['advance_login_form'] ) ? $input_settings['advance_login_form'] : '';
	$setting_advance_login_form = filter_var( $setting_advance_login_form, FILTER_VALIDATE_INT );
	
	$message = __( 'Settings have been successfully updated.', 'advanced-user-access-manager' );

	/**
	 * Build the sanitized settings
	 *
	 * @since 1.0.2
	 */
	$sanitized_settings = array(
		'login_user_page'			=> $input_settings['login_user_page'],
		'login_page'    			=> $setting_login_page,
		'show_login_form'			=> $input_settings['show_login_form'],
		'redirect_type' 			=> $input_settings['redirect_type'],
		'redirect_url'  			=> $input_settings['redirect_url'],
		'enable_restriction'  		=> $input_settings['enable_restriction'],
		'advance_rd_lform'  		=> $input_settings['advance_rd_lform'],
		'enable_bg_image'  			=> $input_settings['enable_bg_image'],
		'all_page_restrict'   		=> $all_page_restrict,
		'advance_login_form'  		=> $setting_advance_login_form,
		'login_redirect_type' 		=> $input_settings['login_redirect_type'],
		'after_login_redirect'  	=> $input_settings['after_login_redirect'],
		'after_logout_redirect' 	=> $input_settings['after_logout_redirect'],
		'after_login_redirect_url'  => $input_settings['after_login_redirect_url'],
		'after_logout_redirect_url' => $input_settings['after_logout_redirect_url'],
		
	);

	update_option( 'auam_update_settings', $sanitized_settings, false );
	auam_show_message( $message );

	update_option( 'auam_login_form_logo', absint( $_POST['login_form_logo'] ) );
	update_option( 'auam_login_bg_image', absint( $_POST['login_bg_image'] ) );

	// login form title
	$login_form_title = array(
		'login_form_title'  => sanitize_text_field( $_POST['login_form_title'] ),
	);
	update_option( 'auam_login_form_title', $login_form_title );

	// login body background
	$login_bg_color = array(
		'login_bg_color'  => sanitize_hex_color( $_POST['login_bg_color'] )
	);
	update_option( 'auam_login_bg_color', $login_bg_color );
	
	// form bg color
	$login_form_bg_color = array(
		'login_form_bg_color'  => sanitize_hex_color( $_POST['login_form_bg_color'] )
	);
	update_option( 'auam_login_form_bg_color', $login_form_bg_color );

	// form text color
	$login_form_text_color = array(
		'login_form_text_color'  => sanitize_hex_color( $_POST['login_form_text_color'] )
	);
	update_option( 'auam_login_form_text_color', $login_form_text_color );

	// form button bg color
	$login_form_btn_bg_color = array(
		'login_form_btn_bg_color'  => sanitize_hex_color( $_POST['login_form_btn_bg_color'] )
	);
	update_option( 'auam_login_form_btn_bg_color', $login_form_btn_bg_color );
	
	// form button text color
	$login_form_btn_text_color = array(
		'login_form_btn_text_color'  => sanitize_hex_color( $_POST['login_form_btn_text_color'] )
	);
	update_option( 'auam_login_form_btn_text_color', $login_form_btn_text_color );
						
}

$settings = auam_user_access_get_settings();
$pages    = $wpdb->get_results( "SELECT ID, post_title FROM {$wpdb->posts} WHERE post_type='page' AND post_status='publish'" );

?>
<div id="rap_settings_page">
	<h1><?php esc_html_e( 'Advanced User Access Manager', 'advanced-user-access-manager' ); ?></h1>
	<form method="post" action="">
		<div id="rpa_tab_settings_wrapper">
			<div class="tabs">
				<ul id="tabs-nav">
					<li>
						<button class="tabs-btn is-active" data-panel-id="#settings_tabs" type="button">
							<?php esc_html_e( 'General', 'advanced-user-access-manager' ); ?>
						</button>
					</li>
					<li>
						<button class="tabs-btn" data-panel-id="#pages_tabs" type="button">
							<?php esc_html_e( 'Pages', 'advanced-user-access-manager' ); ?>
						</button>
					</li>
					<li>
						<button class="tabs-btn" data-panel-id="#login_page_tabs" type="button">
							<?php esc_html_e( 'WP Login Page', 'advanced-user-access-manager' ); ?>
						</button>
					</li>
				</ul> <!-- END tabs-nav -->
				<div class="tabs-content">
					<div id="settings_tabs" class="tab-content is-active">
						<?php 
							require_once( AUAM_DIR . 'includes/settings/general-tab.php' ); 
						?>
					</div>
					<div id="pages_tabs" class="tab-content">
						<?php 
							require_once( AUAM_DIR . 'includes/settings/pages-tab.php' ); 
						?>
					</div>
					<div id="login_page_tabs" class="tab-content">
						<?php 
							require_once( AUAM_DIR . 'includes/settings/wp-login-tab.php' ); 
						?>
					</div>
				</div> <!-- END tabs-content -->
			</div> <!-- END tabs -->
			<div class="submit-btn">
				<?php wp_nonce_field( 'auam_settings_nonce', 'auam_settings_nonce_field' ); ?>
				<input type="submit" name="auam_save_settings_field" id="submit" class="button button-primary" value="Save Changes">
			</div>
			
		</div>                
		
	</form>

</div>