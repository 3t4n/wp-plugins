<?php


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


/*
Plugin Name: OXSN Forced Login
Plugin URI: https://wordpress.org/plugins/oxsn-forced-login/
Description: This plugin adds helpful forced login functions!
Author: oxsn
Author URI: https://oxsn.com/
Version: 0.0.4
*/


define( 'oxsn_forced_login_plugin_basename', plugin_basename( __FILE__ ) );
define( 'oxsn_forced_login_plugin_dir_path', plugin_dir_path( __FILE__ ) );
define( 'oxsn_forced_login_plugin_dir_url', plugin_dir_url( __FILE__ ) );

if ( ! function_exists ( 'oxsn_forced_login_settings_link' ) ) {

	add_filter( 'plugin_action_links', 'oxsn_forced_login_settings_link', 10, 2 );
	function oxsn_forced_login_settings_link( $links, $file ) {

		if ( $file != oxsn_forced_login_plugin_basename )
		return $links;
		$settings_page = '<a href="' . menu_page_url( 'oxsn-forced-login', false ) . '">' . esc_html( __( 'Settings', 'oxsn-forced-login' ) ) . '</a>';
		array_unshift( $links, $settings_page );
		return $links;

	}

}


?><?php


/* OXSN Dashboard Tab */

if ( !function_exists('oxsn_dashboard_tab_nav_item') ) {

	add_action('admin_menu', 'oxsn_dashboard_tab_nav_item');
	function oxsn_dashboard_tab_nav_item() {

		add_menu_page('OXSN', 'OXSN', 'manage_options', 'oxsn-dashboard', 'oxsn_dashboard_tab' );

	}

}

if ( !function_exists('oxsn_dashboard_tab') ) {

	function oxsn_dashboard_tab() {

		if (!current_user_can('manage_options')) {

			wp_die( __('You do not have sufficient permissions to access this page.') );

		}

	?>

		<?php if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y') : ?>

			<div id="message" class="updated">

				<p><strong><?php _e('Settings saved.') ?></strong></p>

			</div>

		<?php endif; ?>
		
		<div class="wrap">
		
			<h2>OXSN / Digital Agency</h2>

			<div id="poststuff">

				<div id="post-body" class="metabox-holder columns-2">

					<div id="post-body-content" style="position: relative;">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Information</h3>

							<div class="inside">

								<p></p>

							</div>
							
						</div>

					</div>

					<div id="postbox-container-1" class="postbox-container">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Coming Soon</h3>

							<div class="inside">

								<p></p>

							</div>
							
						</div>

					</div>

				</div>

			</div>

		</div>

	<?php 

	}

}


?><?php


/* OXSN Plugin Tab */

if ( ! function_exists ( 'oxsn_forced_login_plugin_tab_nav_item' ) ) {

	add_action('admin_menu', 'oxsn_forced_login_plugin_tab_nav_item', 99);
	function oxsn_forced_login_plugin_tab_nav_item() {

		add_submenu_page('oxsn-dashboard', 'OXSN Forced Login', 'Forced Login', 'manage_options', 'oxsn-forced-login', 'oxsn_forced_login_plugin_tab');

	}

}

if ( !function_exists('oxsn_forced_login_plugin_tab') ) {

	function oxsn_forced_login_plugin_tab() {

		if (!current_user_can('manage_options')) {

			wp_die( __('You do not have sufficient permissions to access this page.') );

		}

	?>

		<?php if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y') : ?>

			<div id="message" class="updated">

				<p><strong><?php _e('Settings saved.') ?></strong></p>

			</div>

		<?php endif; ?>
		
		<div class="wrap oxsn_settings_page">
		
			<h2>OXSN / Forced Login Plugin</h2>

			<div id="poststuff">

				<div id="post-body" class="metabox-holder columns-2">

					<div id="post-body-content" style="position: relative;">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Information</h3>

							<div class="inside">

								<p>Coming soon.</p>

							</div>
							
						</div>

					</div>

					<div id="postbox-container-1" class="postbox-container">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Custom Project</h3>

							<div class="inside">

								<p>Want us to build you a custom project?</p>

								<p><a href="mailto:brief@oxsn.com?Subject=Custom%20Project%20Request%21&Body=Please%20answer%20the%20following%20questions%20to%20help%20us%20better%20understand%20your%20needs..%0A%0A1.%20What%20is%20the%20name%20of%20your%20company%3F%0A%0A2.%20What%20are%20the%20concepts%20and%20goals%20of%20your%20project%3F%0A%0A3.%20What%20is%20the%20proposed%20budget%20of%20this%20project%3F" class="button button-primary button-large">Email Us</a></p>

							</div>
							
						</div>

						<div class="postbox">

							<h3 class="hndle cursor_initial">Support</h3>

							<div class="inside">

								<p>Need help with this plugin? Visit the Wordpress plugin page for support..</p>

								<p><a href="https://wordpress.org/support/plugin/oxsn-forced-login" target="_blank" class="button button-primary button-large">Support</a></p>

							</div>
							
						</div>

					</div>

				</div>

			</div>

		</div>

	<?php 

	}

}


?><?php


/* OXSN Customizer */

if ( ! function_exists ( 'oxsn_forced_login_customizer' ) ) {

	add_action( 'customize_register', 'oxsn_forced_login_customizer' );
	function oxsn_forced_login_customizer( $wp_customize ) {
	   
		$wp_customize->add_panel( 'oxsn_plugin_panel', array(
			'priority'       => '',
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => 'OXSN Plugins',
			'description'    => '',
		) );

		$wp_customize->add_section( 'oxsn_forced_login_section' , array(
			'priority'       => '',
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => 'Forced Login',
			'description'    => '',
			'panel'  => 'oxsn_plugin_panel',
		) );

		$wp_customize->add_setting( 'oxsn_forced_login_login_url_control', array(
			'type' => 'option',
		) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'oxsn_forced_login_login_url_control', array(
			'type'     => '',
			'priority' => '',
			'section'  => 'oxsn_forced_login_section',
			'label'    => 'Login URL',
		) ) );

		$wp_customize->add_setting( 'oxsn_forced_login_register_url_control', array(
			'type' => 'option',
		) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'oxsn_forced_login_register_url_control', array(
			'type'     => '',
			'priority' => '',
			'section'  => 'oxsn_forced_login_section',
			'label'    => 'Register URL',
		) ) );

		$wp_customize->add_setting( 'oxsn_forced_login_lost_password_url_control', array(
			'type' => 'option',
		) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'oxsn_forced_login_lost_password_url_control', array(
			'type'     => '',
			'priority' => '',
			'section'  => 'oxsn_forced_login_section',
			'label'    => 'Lost Password URL',
		) ) );

	}

}


?><?php


/* OXSN Include */

if ( ! function_exists ( 'oxsn_redirect_lostpassword_url' ) ) {

	add_filter( 'lostpassword_url',  'oxsn_redirect_lostpassword_url', 10, 0 );
	function oxsn_redirect_lostpassword_url() {

		$wpurl = get_bloginfo('wpurl');

		$lost_password_url_control = get_option( 'oxsn_forced_login_lost_password_url_control' );

		if($lost_password_url_control != '') {

			$lost_password_url = get_option( 'oxsn_forced_login_lost_password_url_control' );

			if (!preg_match("/.*\/$/", $lost_password_url)) {

				$lost_password_url = "$lost_password_url" . "/";

			}

		} else {

			$lost_password_url = $wpurl . '/wp-login.php?action=lostpassword';

		}

		return $lost_password_url;

	}

}

if ( ! function_exists ( 'oxsn_redirect_register_url' ) ) {

	add_filter( 'register_url',  'oxsn_redirect_register_url', 10, 0 );
	function oxsn_redirect_register_url() {

		$wpurl = get_bloginfo('wpurl');

		$register_url_control = get_option( 'oxsn_forced_login_register_url_control' );

		if($register_url_control != '') {

			$register_url = get_option( 'oxsn_forced_login_register_url_control' );

			if (!preg_match("/.*\/$/", $register_url)) {

				$register_url = "$register_url" . "/";

			}

		} else {

			$register_url = $wpurl . '/wp-login.php?action=register';

		}

		return $register_url;

	}

}

if ( ! function_exists ( 'oxsn_forced_login' ) ) {

	add_action('init', 'oxsn_forced_login');
	function oxsn_forced_login() {

		$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

		$wpurl = get_bloginfo('wpurl');

		$login_url_control = get_option( 'oxsn_forced_login_login_url_control' );

		if($login_url_control != '') {

			$login_url = get_option( 'oxsn_forced_login_login_url_control' );

			if (!preg_match("/.*\/$/", $login_url)) {

				$login_url = "$login_url" . "/";

			}

		} else {

			$login_url = $wpurl . '/wp-login.php';
	
		}

		$register_url_control = get_option( 'oxsn_forced_login_register_url_control' );

		if($register_url_control != '') {

			$register_url = get_option( 'oxsn_forced_login_register_url_control' );

			if (!preg_match("/.*\/$/", $register_url)) {

				$register_url = "$register_url" . "/";

			}

		} else {

			$register_url = $wpurl . '/wp-login.php?action=register';

		}

		$lost_password_url_control = get_option( 'oxsn_forced_login_lost_password_url_control' );

		if($lost_password_url_control != '') {
	
			$lost_password_url = get_option( 'oxsn_forced_login_lost_password_url_control' );
	
			if (!preg_match("/.*\/$/", $lost_password_url)) {
	
				$lost_password_url = "$lost_password_url" . "/";
	
			}
	
		} else {
	
			$lost_password_url = $wpurl . '/wp-login.php?action=lostpassword';
	
		}

		$whitelist = array($login_url, $register_url, $lost_password_url);

		if( !is_user_logged_in() ) {

			if(!in_array($url, $whitelist)) {

				wp_safe_redirect( $login_url, 302 ); 
				exit();

			}

		}

	}

}


?>