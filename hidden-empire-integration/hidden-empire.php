<?php /**/ ?><?php
/*
Plugin Name: Hidden Empire
Version: 0.1
Plugin URI: http://wordpress.org
Description: Allows users of the Hidden Empire toolset and easy integration into Wordpress based websites.
Author: Adam Tal
Author URI: http://hiddenempire.co.il
*/

	// Adding menu to the admin....
	
	// ** Start Adding Menu Item To Admin ** //
	add_action('admin_menu', 'mt_add_pages');


	function mt_add_pages() {
	
		// Add a new top-level menu 
//		add_menu_page('האימפריה', 'האימפריה', 'administrator', 'hidden-empire', 'mt_toplevel_page');
//		add_menu_page(HE_PLUGINOPTIONS_NICK.' Plugin Options', HE_PLUGINOPTIONS_NICK, 'manage_options', HE_PLUGINOPTIONS_ID.'_options', array('HiddenEmpirePluginOptions', 'options_page'));
		add_menu_page(HE_PLUGINOPTIONS_NICK.' Plugin Options', HE_PLUGINOPTIONS_NICK, 'administrator', HE_PLUGINOPTIONS_ID.'_options', array('HiddenEmpirePluginOptions', 'options_page'));
	
	}

	// Create an options page for out plugin...
	function mt_toplevel_page() {
	
	    // echo 'whatever';
	 	include 'options.php';
		
	}

	//This is the class that takes care of defining the options
	
	if(!class_exists('HiddenEmpirePluginOptions')) :
	// DEFINE PLUGIN ID
	define('HE_PLUGINOPTIONS_ID', 'hidden-empire-plugin-options');
	// DEFINE PLUGIN NICK
	define('HE_PLUGINOPTIONS_NICK', 'Hidden Empire Plugin Options');
		class HiddenEmpirePluginOptions
		{
			/** function/method
			* Usage: return absolute file path
			* Arg(1): string
			* Return: string
			*/
			public static function file_path($file)
			{
				return ABSPATH.'wp-content/plugins/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)).$file;
			}
			/** function/method
			* Usage: hooking the plugin options/settings
			* Arg(0): null
			* Return: void
			*/
			public static function register()
			{
				
				//IMPORTANT
				//Register all of the options that will be used
			
//				register_setting(HE_PLUGINOPTIONS_ID.'_options', 'he_po_quote');

				register_setting(HE_PLUGINOPTIONS_ID.'_options', 'he_userid');
				register_setting(HE_PLUGINOPTIONS_ID.'_options', 'he_popup_option');
				register_setting(HE_PLUGINOPTIONS_ID.'_options', 'he_copypaste_option');
				register_setting(HE_PLUGINOPTIONS_ID.'_options', 'he_freecode');
				
				
			}
			/** function/method
			* Usage: hooking (registering) the plugin menu
			* Arg(0): null
			* Return: void
			*/
			public static function menu()
			{
				// Create menu tab
				add_options_page(HE_PLUGINOPTIONS_NICK.' Plugin Options', HE_PLUGINOPTIONS_NICK, 'manage_options', HE_PLUGINOPTIONS_ID.'_options', array('HiddenEmpirePluginOptions', 'options_page'));
			}
			/** function/method
			* Usage: show options/settings form page
			* Arg(0): null
			* Return: void
			*/
			public static function options_page()
			{
				if (!current_user_can('manage_options'))
				{
					wp_die( __('You do not have sufficient permissions to access this page.') );
				}
	
				$plugin_id = HE_PLUGINOPTIONS_ID;
				// display options page
				include(self::file_path('options.php'));
			}
			/** function/method
			* Usage: filtering the content
			* Arg(1): string
			* Return: string
			*/
			public static function content_with_quote($content)
			{
			
				//IMPORTANT
				//This method should contain all of the options defined
				//Works similar to "toString"
			
//				$quote = '<p><blockquote>' . get_option('he_po_quote') . '</blockquote></p>';

				$test1 = get_option('he_popup_option'); 
				$test2 = get_option('he_copypaste_option'); 
				
				//echo $test1.':::'.$test2;
				
				//$id = '<p><blockquote>' . get_option('he_userid') . '</blockquote></p>';
				if(get_option('he_popup_option')) {
					$popup = '<script type="text/javascript" src="http://hiddenempire.co.il/i/popup/users/popcorn.js.php?u='.get_option('he_userid').'" async="true"></script><div id="example-widget-container"></div>';
				} else { $popup = ''; }
				
				if(get_option('he_copypaste_option')) {
				$copypaste = '<script type="text/javascript" src="http://hiddenempire.co.il/i/copy-paste-tool/copypaste.js.php?u='.get_option('he_userid').'" async="true"></script>'; } else { $copypaste = ''; }
				
				$other = get_option('he_freecode');

				//return $content . $id . $popup . $copypaste . $other;
				return $content . $popup . $copypaste . $other; // Adam's version
				
			}
		}
		if ( is_admin() )
		{
			add_action('admin_init', array('HiddenEmpirePluginOptions', 'register'));
			add_action('admin_menu', array('HiddenEmpirePluginOptions', 'menu'));
		}
		add_filter('the_content', array('HiddenEmpirePluginOptions', 'content_with_quote'));
	
	endif;


?>