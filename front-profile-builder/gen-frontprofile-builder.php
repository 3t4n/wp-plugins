<?php
/*
Plugin Name: Front Profile Builder
Plugin URI: http://upscalethought.com
Description: WP Front Profile Builder System, Custom login, registration, edit profile, lost password, reset password etc...
Version: 1.0
Author: UpScaleThought
Author URI: http://upscalethought.com
Text Domain: frontprofile-builder
Domain Path: /i18n/languages/  
*/
define('GEN_USTS_FRONTPROFILE_PLUGIN_URL', plugins_url('',__FILE__));
define("GEN_USTS_BASE_URL", WP_PLUGIN_URL.'/'.plugin_basename(dirname(__FILE__)));
define( 'GEN_USTS_FRONTPROFILE_DIR', plugin_dir_path(__FILE__) );

$login_page = get_page_by_path('login-form');
$registration_page = get_page_by_path('registration-form');
$edit_profile_page = get_page_by_path('editprofile-form');
$password_lostform_page = get_page_by_path('passwordlost-form');
$password_resetform_page = get_page_by_path('passwordreset-form');

$login_page_id = 0;
$registration_page_id = 0;

$edit_profile_page_id = 0;
$password_lostform_page_id = 0;
$password_resetform_page_id = 0;

if(isset($login_page)){
  $login_page_id = $login_page->ID;
}
if(isset($registration_page)){
  $registration_page_id = $registration_page->ID;
}

if(isset($edit_profile_page)){
  $edit_profile_page_id = $edit_profile_page->ID;
}
if(isset($password_lostform_page)){
  $password_lostform_page_id = $password_lostform_page->ID;
}
if(isset($password_resetform_page)){
  $password_resetform_page_id = $password_resetform_page->ID;
}

define('LOGIN_PAGEID', $login_page_id);
define('REGISTRATION_PAGEID', $registration_page_id);

define('EDITPROFILE_PAGEID', $edit_profile_page_id);
define('PASSWORDLOST_PAGEID', $password_lostform_page_id);
define('PASSWORDRESET_PAGEID', $password_resetform_page_id);

include_once('includes/create_page.php');
include_once('includes/front-end-registration-login.php');
include_once('operations/ustsfrontprofile_builder_init.php');


//--------i18n--------
function gen_frontpb_load_plugin_textdomain() {
  load_plugin_textdomain( 'frontprofile-builder', FALSE, basename( dirname( __FILE__ ) ) . '/i18n/languages/' );
}
add_action( 'plugins_loaded', 'gen_frontpb_load_plugin_textdomain' );
//---------------------------

add_action('admin_menu', 'gen_frontpb_plugin_admin_menu');
function gen_frontpb_plugin_admin_menu(){
	add_object_page('Front Profile Builder', __('Front Profile Builder','frontprofile-builder'), 'publish_posts', 'custom_profilebuilder', 'gen_frontpb_settings_menu');
}
function gen_profilebuilder_pro_add_menu(){
    add_submenu_page( 'custom_profilebuilder', 'Profile Builder Pro', 'Profile Builder Pro', 'manage_options', 'profile-builder-pro-menu', 'gen_frontpb_profilebuilder_pro_settings' );
}
add_action('admin_menu','gen_profilebuilder_pro_add_menu');
function gen_frontpb_profilebuilder_pro_settings(){
	include_once('includes/frontprofile_builder_pro.php');
}
function gen_frontpb_settings_menu(){
?>
	<div> <h2><?php _e("Front Profile Builder","frontprofile-builder"); ?></h2></div>
 <?php
}

function gen_frontpb_profilebuilder_uninstall(){
  gen_frontpb_programmatically_delete_page(LOGIN_PAGEID);
  gen_frontpb_programmatically_delete_page(REGISTRATION_PAGEID);
  
  gen_frontpb_programmatically_delete_page(EDITPROFILE_PAGEID);
  gen_frontpb_programmatically_delete_page(PASSWORDLOST_PAGEID);
  gen_frontpb_programmatically_delete_page(PASSWORDRESET_PAGEID);
}

register_activation_hook( __FILE__, 'gen_frontpb_profilebuilder_install' );
register_deactivation_hook( __FILE__, 'gen_frontpb_profilebuilder_uninstall');

/*add_action( 'login_form_lostpassword', 'redirect_to_custom_lostpassword');
function redirect_to_custom_lostpassword(){
	if ( 'GET' == $_SERVER['REQUEST_METHOD'] ) {
        if ( is_user_logged_in() ){
            $this->redirect_logged_in_user();
            exit;
        }
 
        wp_redirect( home_url( 'passwordlost_form' ) );
        exit;
    }
}*/
add_action( 'login_form_lostpassword', 'gen_frontpb_do_password_lost' );
/**
 * Initiates password reset.
 */
function gen_frontpb_do_password_lost() {
	//die('called....');
    if ( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
        $errors = retrieve_password();
        if ( is_wp_error( $errors ) ) {
            // Errors found
            $redirect_url = home_url( 'passwordlost-form' );
            $redirect_url = add_query_arg( 'errors', join( ',', $errors->get_error_codes() ), $redirect_url );
        } else {
            // Email sent
            $redirect_url = home_url( 'login-form' );
            $redirect_url = add_query_arg( 'checkemail', 'confirm', $redirect_url );
        }
 
        wp_redirect( $redirect_url );
        exit;
    }
}
function gen_frontpb_render_password_lost_form(){
    /*$lost_password_sent = '';
	if(isset( $_REQUEST['checkemail'] ) && $_REQUEST['checkemail'] == 'confirm'){
		$lost_password_sent = 'confirm'; 
	}
	die($lost_password_sent);*/
	include_once('includes/password_lost.php');
}
add_shortcode( 'frontpb_password_lost', 'gen_frontpb_render_password_lost_form' );
function gen_frontpb_replace_retrieve_password_message( $message, $key, $user_login, $user_data ) {
    // Create new message
    $msg  = __( 'Hello!', 'personalize-login' ) . "\r\n\r\n";
    $msg .= sprintf( __( 'You asked us to reset your password for your account using the email address %s.', 'personalize-login' ), $user_login ) . "\r\n\r\n";
    $msg .= __( "If this was a mistake, or you didn't ask for a password reset, just ignore this email and nothing will happen.", 'personalize-login' ) . "\r\n\r\n";
    $msg .= __( 'To reset your password, visit the following address:', 'personalize-login' ) . "\r\n\r\n";
    $msg .= site_url( "wp-login.php?action=rp&key=$key&login=" . rawurlencode( $user_login ), 'login' ) . "\r\n\r\n";
    $msg .= __( 'Thanks!', 'personalize-login' ) . "\r\n";
 
    return $msg;
}
add_filter( 'retrieve_password_message','gen_frontpb_replace_retrieve_password_message', 10, 4 );

/**
 * Redirects to the custom password reset page, or the login page
 * if there are errors.
 */
function gen_frontpb_redirect_to_custom_password_reset() {
    if ( 'GET' == $_SERVER['REQUEST_METHOD'] ) {
        // Verify key / login combo
        $user = check_password_reset_key( $_REQUEST['key'], $_REQUEST['login'] );
        if ( ! $user || is_wp_error( $user ) ) {
            if ( $user && $user->get_error_code() === 'expired_key' ) {
                wp_redirect( home_url( 'wp-login?login=expiredkey' ) );
            } else {
                wp_redirect( home_url( 'wp-login?login=invalidkey' ) );
            }
            exit;
        }
 
        $redirect_url = home_url( 'passwordreset-form' );
        $redirect_url = add_query_arg( 'login', esc_attr( $_REQUEST['login'] ), $redirect_url );
        $redirect_url = add_query_arg( 'key', esc_attr( $_REQUEST['key'] ), $redirect_url );
 
        wp_redirect( $redirect_url );
        exit;
    }
}

add_action( 'login_form_rp', 'gen_frontpb_redirect_to_custom_password_reset' );
add_action( 'login_form_resetpass', 'gen_frontpb_redirect_to_custom_password_reset');
/**
 * A shortcode for rendering the form used to reset a user's password.
 *
 * @param  array   $attributes  Shortcode attributes.
 * @param  string  $content     The text content for shortcode. Not used.
 *
 * @return string  The shortcode output
 */
function gen_frontpb_render_password_reset_form( ) {
    // Parse shortcode attributes
	include_once('includes/password_reset.php');
}
add_shortcode( 'frontpb_password_reset', 'gen_frontpb_render_password_reset_form');
/**
 * Resets the user's password if the password reset form was submitted.
 */
function gen_frontpb_do_password_reset() {
    if ( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
        $rp_key = $_REQUEST['rp_key'];
        $rp_login = $_REQUEST['rp_login'];
 
        $user = check_password_reset_key( $rp_key, $rp_login );
 
        if ( ! $user || is_wp_error( $user ) ) {
            if ( $user && $user->get_error_code() === 'expired_key' ) {
                wp_redirect( home_url( 'wp-login?login=expiredkey' ) );
            } else {
                wp_redirect( home_url( 'wp-login?login=invalidkey' ) );
            }
            exit;
        }
 
        if ( isset( $_POST['pass1'] ) ) {
            if ( $_POST['pass1'] != $_POST['pass2'] ) {
                // Passwords don't match
                $redirect_url = home_url( 'passwordreset-form' );
 
                $redirect_url = add_query_arg( 'key', $rp_key, $redirect_url );
                $redirect_url = add_query_arg( 'login', $rp_login, $redirect_url );
                $redirect_url = add_query_arg( 'error', 'password_reset_mismatch', $redirect_url );
 
                wp_redirect( $redirect_url );
                exit;
            }
 
            if ( empty( $_POST['pass1'] ) ) {
                // Password is empty
                $redirect_url = home_url( 'passwordreset-form' );
 
                $redirect_url = add_query_arg( 'key', $rp_key, $redirect_url );
                $redirect_url = add_query_arg( 'login', $rp_login, $redirect_url );
                $redirect_url = add_query_arg( 'error', 'password_reset_empty', $redirect_url );
 
                wp_redirect( $redirect_url );
                exit;
            }
 
            // Parameter checks OK, reset password
            reset_password( $user, $_POST['pass1'] );
            wp_redirect( home_url( 'login-form?password=changed' ) );
        } else {
            echo "Invalid request.";
        }
 
        exit;
    }
}
add_action( 'login_form_rp', 'gen_frontpb_do_password_reset' );
add_action( 'login_form_resetpass', 'gen_frontpb_do_password_reset');