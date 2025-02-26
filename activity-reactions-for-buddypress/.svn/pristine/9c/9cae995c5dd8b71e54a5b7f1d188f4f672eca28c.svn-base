<?php
/*
Plugin name:Activity Reactions For Buddypress
Plugin URI:www.areteit.com
Description:A plugin for providing registered users option to show their reactions on activity updates.
Author: Paramveer Singh for Arete IT Private Limited
Author URI: https://www.areteit.com/
Version:1.0.22
License:GPL/MIT
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
include("core.php");
/*****activation and deactivation hooks******/
register_activation_hook( __FILE__, array( 'arete_buddypress_smileys_setting', 'arete_create_table' ));
register_activation_hook( __FILE__, 'arete_plugin_smileys');
register_deactivation_hook( __FILE__, 'arete_plugin_smileys_truncate');
/*****************
function making menus 
in admin panel
********************/
function arete_settings_menu_smiley()
{
   add_menu_page('Bp Fb Reactions', 'Activity Reactions For BP', 'main_option', __FILE__, 'ai_bp_get_manage_smileys', plugins_url('activity-reactions-for-buddypress/img/icon.png', dirname(__FILE__) ));
    add_submenu_page(__FILE__, 'Reactions', 'Reactions', 'manage_options',__FILE__.'/settings', 'ai_bp_get_manage_smileys');
    add_submenu_page(__FILE__, 'Settings', 'Settings', 'manage_options',__FILE__.'/ai_bp_settings', 'ai_bp_reaction_setting');
}
add_action('admin_menu','arete_settings_menu_smiley');

add_action('wp_footer', 'custom_ajax_request_loader_smiley');
function custom_ajax_request_loader_smiley()
{
	$html="";
	$html .='<div class="ai_bp_reactions_lightbox">
				<div class="ai_bp_reactions_loader_lb"><i class="ai-lb-smiley-ajax-loading-icon ai-lb-icon"></i></div>
			</div>';
	echo $html;
}
/****function for showing smileys in admin-panel*****/
function ai_bp_get_manage_smileys()
{
	echo ai_bp_get_all_smileys(); 
}

/****function for settings of buddypress through admin-panel*****/
function ai_bp_reaction_setting()
{
	echo ai_bp_reaction_setting_admin(); 
}

if(isset($_REQUEST['ai_submit_favorite']))
{
	GLOBAL $wpdb;
	$settings    = $wpdb->base_prefix . 'arete_buddypress_smiley_settings';
	if(isset($_REQUEST['ai_show_favorite']))
	{
		$wpdb->update( $settings,array('value' => '1' ), array( 'type' => 'favorite'), array( '%s'), array( '%d' ) );
	}
	else
	{
		$wpdb->update( $settings,array('value' => '0' ), array( 'type' => 'favorite'), array( '%s'), array( '%d' ) );
	}
}

$smof_data=ai_bp_main_animation_css();
?>