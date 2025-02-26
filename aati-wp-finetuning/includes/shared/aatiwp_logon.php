<?php
// Check if the ABSPATH constant is defined
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
// check if logo exsits
if (file_exists(  AATIWPF_UPLOAD_DIR['basedir'].'/loginlogo.png') ) {
// change link to homepage link instead of wordpress
	function aatiwpf_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'aatiwpf_login_logo_url' );
//change text for image instead of powered by wordpress , takes title  of site
function aatiwpf_login_logo_url_title() {
    return get_bloginfo( 'name' );
}
add_filter( 'login_headertext', 'aatiwpf_login_logo_url_title' );
/**
 * load the stylesheet from this plugin in to the header
 */
add_action( 'login_enqueue_scripts', 'aatiwpf_add_logon_stylesheet' );
function aatiwpf_add_logon_stylesheet () {
	wp_enqueue_style('aatiwpf-login',AATIWPF_PLUGIN_URL . '/assets/css/aatiwpf-login.css',null,AATIWPF_VERSION,);
}
// if login background exists then use it  but only if there is also a logo
if (file_exists( AATIWPF_UPLOAD_DIR['basedir'] .'/loginbackground.webp') ) {
// if login background exists then use it 
	add_action( 'login_enqueue_scripts', 'aatiwpf_add_logon_bg_stylesheet' );
	function aatiwpf_add_logon_bg_stylesheet () {
	wp_enqueue_style('aatiwpf-login-bg',AATIWPF_PLUGIN_URL . '/assets/css/aatiwpf-login-bg.css',null,AATIWPF_VERSION,);
	}
	// end background check
}
// redirect logout to home page instead of login page
add_action( 'wp_logout','aatiwpf_redirect_after_logout' );
function aatiwpf_redirect_after_logout() {
    wp_safe_redirect( home_url() );
    exit();
}
// got the idea from this page
// https://www.appsloveworld.com/wordpress/100/160/save-additional-css-in-separate-file-dynamically-wordpress
//
add_action('customize_register','aatiwpf_add_custom_login_css');	
function aatiwpf_add_custom_login_css($wp_customize){
     // Create style file path
     $aatiwpf_style_file_path = sprintf( '%1$s/assets/css',AATIWPF_PLUGIN_DIR );
     // Create directories if they dont exist
     if( ! file_exists( $aatiwpf_style_file_path ) ) {
     wp_mkdir_p( $aatiwpf_style_file_path );
      }
     // Sanitize contents ( probably needs to be sanitized better, maybe with a CSS specific library )
     // Note that esc_html() cannot be used because `div &gt; span` is not interpreted properly.
	// strip_tags( $styles ); is used by wp https://developer.wordpress.org/reference/functions/wp_custom_css_cb/
    // original line is with escaping html
	// $aatiwpf_contents =  wp_filter_nohtml_kses( wp_strip_all_tags( wp_get_custom_css() ) );
     $aatiwpf_contents =   wp_strip_all_tags( wp_get_custom_css() ) ;
	// miminfy a bit
	 $aatiwpf_contents = str_replace(array("\r", "\n"), ' ', $aatiwpf_contents);
     // Replace the contents of the file with the new saved contents.
     $aatiwpf_style_file = $aatiwpf_style_file_path . '/aatiwpf-custom-login.css';
     file_put_contents( $aatiwpf_style_file, $aatiwpf_contents );
      }
// include the css file only in the login page , let the theme handle the front
add_action( 'login_enqueue_scripts', 'aatiwpf_add_custom_login_style_css' );	
function aatiwpf_add_custom_login_style_css() {
      wp_register_style( 'aatiwpf-custom-login', sprintf( '%1$s/assets/css', AATIWPF_PLUGIN_URL )  .'/aatiwpf-custom-login.css' );
      wp_enqueue_style( 'aatiwpf-custom-login' );
}
	// end logo check
}