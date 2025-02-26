<?php
/*
Plugin Name: Convify
Plugin URI: https://www.convify.com
Description: Increase your revenue with exit popups from Convify
Version: 1.0.0
Author: ConvifyDev
Author URI: https://www.convify.com
License: GPLv2
*/

/*
add_filter( 'plugin_action_links', 'convifySettings',10,2);
function convifySettings( $actions, $plugin_file ){
	if( false === strpos( $plugin_file, basename(__FILE__) ) )
		return $actions;

	$settings_link = '<a href="themes.php?page=convify_menu">Settings</a>'; 
	array_unshift( $actions, $settings_link ); 
	return $actions; 
}
*/

if ( !function_exists( 'add_action' ) ) {
	exit;
}

define('CONVIFY_SIGNUP', 'https://my.convify.com/auth/sign_up');
define('CONVIFY_LOGIN', 'https://my.convify.com/auth/login');
define('CONVIFY_SCRIPT', 'http://static.convify.com/js/pixel.min.js');

add_action('admin_menu', 'convifyAdminPage');
add_action('wp_enqueue_scripts', 'convifyScripts');
register_activation_hook( __FILE__, 'convifyActivate');
add_action('admin_init', 'settingRedirect');

function convifyActivate(){
	add_option('convify_do_activation_redirect', true);
}

function settingRedirect(){	
	 if (get_option('convify_do_activation_redirect', false)) {
        delete_option('convify_do_activation_redirect');
		 
        if ( ! isset($_GET['activate-multi']) )
       		{
            	wp_redirect(admin_url('themes.php?page=convify_menu'));
        	}
    }

}

function convifyAdminPage(){
	 add_submenu_page(
            'themes.php',
            'Convify',
            'Convify',
            'edit_theme_options',
            'convify_menu',
		 	'convifyAdminFrame'
	 );
}


function convifyAdminFrame(){
	if ( is_admin() ){
?>
			<br><br>
			<img src="<?php echo plugins_url('screenshot-1.png', __FILE__) ?>" />
			<br><br>
			<a class="button button-primary" href="<?php echo CONVIFY_LOGIN ?>" target="_blank">Sign In</a>
			<br><br>
			<a class="button button-primary" href="<?php echo CONVIFY_SIGNUP ?>" target="_blank">Sign Up</a>
			
<?php

	}
}

function convifyScripts(){
	if ( ! is_admin() ) {
			
		wp_register_script('convifyJs', CONVIFY_SCRIPT,false,false,true);
		wp_enqueue_script('convifyJs');
		
		//wp_register_style('convifyCss', plugins_url('/css/convify-styles.css', __FILE__));
		//wp_enqueue_style('convifyCss');
			
	}
}

?>