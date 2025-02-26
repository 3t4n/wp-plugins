<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://themesawesome.com/
 * @since             1.0.0
 * @package           Awetube
 *
 * @wordpress-plugin
 * Plugin Name:       Awesome Tube
 * Plugin URI:        https://awesometube.themesawesome.com/
 * Description:       Video Stream and Blog WordPress Plugin.
 * Version:           1.0.2
 * Author:            Themes Awesome
 * Author URI:        https://themesawesome.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       awetube
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'AWETUBE_VERSION', '1.0.2' );
define( 'AWETUBE_PLUGIN', __FILE__ );
define( 'AWETUBE_PLUGIN_BASENAME', plugin_basename( AWETUBE_PLUGIN ) );
define( 'AWETUBE_PLUGIN_NAME', trim( dirname( AWETUBE_PLUGIN_BASENAME ), '/' ) );
define( 'AWETUBE_PLUGIN_DIR', untrailingslashit( dirname( AWETUBE_PLUGIN ) ) );
define( 'AWETUBE_PLUGIN_PATH', plugin_dir_path( AWETUBE_PLUGIN ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-awetube-activator.php
 */
function activate_awetube() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-awetube-activator.php';
	Awetube_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-awetube-deactivator.php
 */
function deactivate_awetube() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-awetube-deactivator.php';
	Awetube_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_awetube' );
register_deactivation_hook( __FILE__, 'deactivate_awetube' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-awetube.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/poi_resizer.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_awetube() {

	$plugin = new Awetube();
	$plugin->run();

}
run_awetube(); 

/** Register page template */
add_filter( 'page_template', 'awetube_custom_user_page_template' );
function awetube_custom_user_page_template( $page_template ){

	if ( get_page_template_slug() == 'login-template.php' ) {
		$page_template = dirname( __FILE__ ) . '/modules/templates/login-template.php';
	}
	if ( get_page_template_slug() == 'register-template.php' ) {
		$page_template = dirname( __FILE__ ) . '/modules/templates/register-template.php';
	}
	return $page_template;
}

add_filter( 'theme_page_templates', 'awetube_custom_user_add_template_to_select', 10, 4 );
function awetube_custom_user_add_template_to_select( $post_templates, $wp_theme, $post, $post_type ) {

	// Add custom template named template-custom.php to select dropdown 
	$post_templates['login-template.php']  = esc_html__( 'Login', 'awetube' );
	$post_templates['register-template.php']  = esc_html__( 'Register', 'awetube' );

	return $post_templates;
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'modules/awetube-post-type.php';
require plugin_dir_path( __FILE__ ) . 'modules/awetube-users.php';
//require plugin_dir_path( __FILE__ ) . 'modules/extensions/awetube-db-connect.php';


add_action( 'plugins_loaded', 'awetube_crb_load' );
function awetube_crb_load() {
	require_once( 'vendor/autoload.php' );
	\Carbon_Fields\Carbon_Fields::boot();
}
require plugin_dir_path( __FILE__ ) . 'modules/awetube-video-fields.php';
require plugin_dir_path( __FILE__ ) . 'modules/awetube-category-fields.php';
require plugin_dir_path( __FILE__ ) . 'modules/extensions/awetube-customs.php';
require plugin_dir_path( __FILE__ ) . 'awetube-themeoption.php';

function awetube_errors() {
	static $wp_error; // Will hold global variable safely
	return isset($wp_error) ? $wp_error : ($wp_error = new WP_Error(null, null, null));
}

function awetube_show_error_messages() {
	if ( $codes = awetube_errors()->get_error_codes() ) {
		echo '<div class="awetube_errors">';
		// Loop error codes and display errors
		foreach ( $codes as $code ) {
			$message = awetube_errors()->get_error_message( $code );
			echo '<span class="error"><strong>' . esc_html__( 'Error', 'awetube' ) . '</strong>: ' . esc_html( $message ) . '</span><br/>';
		}
		echo '</div>';
	}
}

/**
 * Awetube custom widgets list.
 */
function awetube_new_elements() {
	require_once AWETUBE_PLUGIN_DIR . '/elementor-widgets/video-block/video-control.php';
}
add_action( 'elementor/widgets/widgets_registered', 'awetube_new_elements' );

/* customizer scripts */
function awetube_customizer_live_preview() {
	wp_enqueue_script( 'awetube-color-customizer', plugin_dir_url( __FILE__ ) . 'public/js/color-customizer.js', array( 'jquery', 'customize-preview' ), false, true );
}
add_action( 'customize_preview_init', 'awetube_customizer_live_preview' );


// Awetube Customizer
require plugin_dir_path( __FILE__ ) . 'includes/customizer.php';
require plugin_dir_path( __FILE__ ) . 'includes/inline-styles.php';

// awesome tube login
function awetube_login_member() {
 
	if(isset($_POST['awetube_user_login']) && wp_verify_nonce($_POST['awetube_login_nonce'], 'awetube-login-nonce')) {
 
		// this returns the user ID and other info from the user name
		
		$user = get_user_by( is_email( sanitize_email( $_POST['awetube_user_login'] ) ) ? 'email' : 'login', sanitize_text_field( $_POST['awetube_user_login'] ) );
 
		if(!$user) {
			// if the user name doesn't exist
			awetube_errors()->add('empty_username', esc_html__('Invalid username', 'awetube'));
		}
 
		if(!isset($_POST['awetube_user_pass']) || $_POST['awetube_user_pass'] == '') {
			// if no password was entered
			awetube_errors()->add('empty_password', esc_html__('Please enter a password', 'awetube'));
		}
 
		// check the user's login with their password
		if(!wp_check_password($_POST['awetube_user_pass'], $user->user_pass, $user->ID)) {
			// if the password is incorrect for the specified user
			awetube_errors()->add('empty_password', esc_html__('Incorrect password', 'awetube'));
		}
 
		// retrieve all error messages
		$errors = awetube_errors()->get_error_messages();
 
		// only log the user in if there are no errors
		if(empty($errors)) {
			wp_set_auth_cookie($user->ID, sanitize_text_field( isset( $_POST['rememberme'] ) ));
			wp_set_current_user($user->ID, sanitize_text_field( $_POST['awetube_user_login'] ) );
			do_action('wp_login', sanitize_text_field( $_POST['awetube_user_login'] ), $user);
	
			if ( ! current_user_can( 'manage_options' ) && !defined('DOING_AJAX') && !current_user_can('administrator') ) {
				wp_safe_redirect(home_url('my-tube')); exit;
			}
			else {
				wp_safe_redirect(admin_url()); exit;
			}
		}
	}
}
add_action('init', 'awetube_login_member');

// register a new user
function awetube_add_new_member() {
	if (isset( $_POST["awetube_user_login"] ) && wp_verify_nonce($_POST['awetube_register_nonce'], 'awetube-register-nonce')) {
		$user_login   = sanitize_text_field( $_POST["awetube_user_login"] );
		$user_email   = sanitize_email( $_POST["awetube_user_email"] );
		$user_first   = sanitize_text_field( $_POST["awetube_user_first"] );
		$user_last    = sanitize_text_field( $_POST["awetube_user_last"] );
		$user_pass    = sanitize_text_field( $_POST["awetube_user_pass"] );
		$pass_confirm = sanitize_text_field( $_POST["awetube_user_pass_confirm"] );
		$user_roles   = sanitize_text_field( 'creator' );

		// this is required for username checks
		require_once( ABSPATH . WPINC . '/registration.php' );

		if(username_exists($user_login)) {
			// Username already registered
			awetube_errors()->add('username_unavailable', esc_html__('Username already taken', 'awetube'));
		}
		if(!validate_username($user_login)) {
			// invalid username
			awetube_errors()->add('username_invalid', esc_html__('Invalid username', 'awetube'));
		}
		if($user_login == '') {
			// empty username
			awetube_errors()->add('username_empty', esc_html__('Please enter a username', 'awetube'));
		}
		if(!is_email($user_email)) {
			//invalid email
			awetube_errors()->add('email_invalid', esc_html__('Invalid email', 'awetube'));
		}
		if(email_exists($user_email)) {
			//Email address already registered
			awetube_errors()->add('email_used', esc_html__('Email already registered', 'awetube'));
		}
		if($user_pass == '') {
			// passwords do not match
			awetube_errors()->add('password_empty', esc_html__('Please enter a password', 'awetube'));
		}
		if($user_pass != $pass_confirm) {
			// passwords do not match
			awetube_errors()->add('password_mismatch', esc_html__('Passwords do not match', 'awetube'));
		}

		if($user_roles == '') {
			// passwords do not match
			awetube_errors()->add('roles_empty', esc_html__('Must select a role', 'awetube'));
		}

		$errors = awetube_errors()->get_error_messages();

		// only create the user in if there are no errors
		if(empty($errors)) {

			$new_user_id = wp_insert_user(
				array(
					'user_login'		=> $user_login,
					'user_pass'	 		=> $user_pass,
					'user_email'		=> $user_email,
					'first_name'		=> $user_first,
					'last_name'			=> $user_last,
					'user_registered'	=> date('Y-m-d H:i:s'),
					'role'				=> $user_roles
				)
			);

			update_user_meta( $new_user_id, 'user_active', 0 );

			if($new_user_id) {
				// send an email to the admin alerting them of the registration
				wp_new_user_notification($new_user_id);

				// log the new user in
				wp_setcookie($user_login, $user_pass, true);
				wp_set_current_user($new_user_id, $user_login);	
				do_action('wp_login', $user_login);

				// send the newly created user to the home page after logging them in
				wp_redirect(home_url()); exit;
			}
		}
	}
}
add_action('init', 'awetube_add_new_member');

function awetube_single_options() {
	if( class_exists('Awetube_Pro') ) {
		$data_post_data = array(
			'style1' => esc_html__('Style 1', 'awetube'),
			'style2' => esc_html__('Style 2', 'awetube'),
			'style3' => esc_html__('Style 3', 'awetube'),
		);
	} else {
		$data_post_data = array(
			'style1' => esc_html__('Style 1', 'awetube'),
		);
	}
	return $data_post_data;
}

function awetube_video_block_options() {
	if( class_exists('Awetube_Pro') ) {
		$data_post_data = array(
			'style-1' => esc_html__('Style 1', 'awetube'),
			'style-2' => esc_html__('Style 2', 'awetube'),
			'style-3' => esc_html__('Style 3', 'awetube'),
		);
	} else {
		$data_post_data = array(
			'style-1' => esc_html__('Style 1', 'awetube'),
		);
	}
	return $data_post_data;
}

function awetube_check_is_template( $template_path ){

    //Get template name
    $template = basename($template_path);
    if( 1 == preg_match('/^taxonomy-video-category((-(\S*))?).php/',$template) ) {
   		return true;
	}
	if( 1 == preg_match('/^author((-(\S*))?).php/',$template) ) {
		return true;
	}

    return false;
}

function awetube_get_category_video() {

global $post;
$output_categories2 = array();
$category_terms = get_terms('video-category');

	foreach($category_terms as $category) {
		$output_categories2[$category->term_id] = $category->name;
	}
	return $output_categories2;
}
