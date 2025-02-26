<?php
/*
Plugin Name: Adding Content to the Footer

Description: By using this smart plugin, allows you to add Custom HTML to bottom and top section of footer in your wordpress Website. no need to edit theme!

Author: Geek Code Lab

Version: 1.1

Author URI: https://geekcodelab.com/
 
*/	

if(!defined('ABSPATH')) exit;

if(!defined("ACTTF_PLUGIN_URL"))
	
	define("ACTTF_PLUGIN_URL",plugins_url()."/adding-content-to-the-footer");

if(!defined("ACTTF_PLUGIN_DIR_PATH"))
	
	define("ACTTF_PLUGIN_DIR_PATH", plugin_dir_path(__FILE__) );
	

require_once( ACTTF_PLUGIN_DIR_PATH . 'functions.php');

add_action( 'admin_menu', 'acttf_admin_menu' );

add_action("admin_enqueue_scripts","acttf_enqueue_styles");

add_action('admin_init', 'acttf_registerSettings');

add_action('wp_footer', 'acttf_frontend_footer_script');

//------------------------------------------------

function acttf_registerSettings() {
		$plugin_data = get_plugin_data( __FILE__ );
		$plugin_name = $plugin_data['Name'];
		register_setting( $plugin_name, 'acttf_content_top', 'trim' );
		register_setting( $plugin_name, 'acttf_content_bottom', 'trim' );
}

function acttf_admin_menu(){
	
	add_options_page('Adding Content to the Footer', 'Adding Content to the Footer', 'manage_options', 'acttf-adding-content-to-the-footer-option', 'acttf_option_menu');
}

function acttf_option_menu(){
	
	if(!current_user_can('manage_options'))
	{
		wp_die(__('You donot have sufficient permission to access this page'));
		
	}
	
	include( ACTTF_PLUGIN_DIR_PATH. 'options.php');
}

function acttf_enqueue_styles(){
	
	//STYLES
		wp_enqueue_style("style.css",ACTTF_PLUGIN_URL."/assets/css/style.css",''); 

		//SCRIPTS
		wp_enqueue_script('jquery');
		
	
}

function acttf_frontend_footer_script()
{
	$acttf_top_content=wp_unslash( get_option( 'acttf_content_top' ) );
	
	$acttf_bottom_content=wp_unslash( get_option( 'acttf_content_bottom' ) );
	  
		if(isset($acttf_top_content) && !empty($acttf_top_content))
		{
			?><script>
			jQuery( "footer" ).prepend("<div class='acttf_footer_top_custom_content'><?php echo str_replace('"', "'", trim(preg_replace('/\s+/', ' ', html_entity_decode($acttf_top_content) )));?></div>");
			</script>
		<?php }
		if( isset($acttf_bottom_content) && !empty($acttf_bottom_content))
		{?><script>
			jQuery( "<div class='acttf_footer_top_custom_content'><?php echo str_replace('"', "'", trim(preg_replace('/\s+/', ' ', html_entity_decode($acttf_bottom_content ))));?></div>" ).appendTo("footer");
			</script>
		<?php }
} 

?>