<?php
/*
* Plugin Name: Avoid Duplicate Titles
* Plugin URI: https://buddyuser.com/plugin-avoid-duplicate-titles
* Description: This plugin prevents the creation of posts with duplicate titles. It supports custom post types and can either avoid duplication across all post types or within individual post types.
* Author: Venutius
* Version: 2.2.0
* Author URI: https://www.buddyuser.com
* @package    AvoidDuplicateTitles
* @copyright  Copyright (c) 2024, George Chaplin, however the license allows you to copy and modify at will. If you are able to make money with solutions that include this plugin a few beers would be appreciated ;)
* @link       https://buddyuser.com
* @license    https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
* textdomain: avoid-duplicate-titles
License:

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.
 
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

if(!defined('ABSPATH')) {
	exit;
}

require_once ( plugin_dir_path(__FILE__) . '/inc/adt-editor-actions.php' );
require_once ( plugin_dir_path(__FILE__) . '/inc/adt-admin-options.php' );
//jQuery to send AJAX request 
function wpadt_duplicate_titles_enqueue_scripts( $hook ) {
 
	if( !in_array( $hook, array( 'post.php', 'post-new.php' , 'edit.php'))) return;
	wp_enqueue_script('duptitles',
	wp_enqueue_script('duptitles',plugins_url('js/avoid-duplicate-titles.js', __FILE__ ) ,array( 'jquery' )), array( 'jquery' )  );
}
	
add_action( 'admin_enqueue_scripts', 'wpadt_duplicate_titles_enqueue_scripts', 2000 );

function wpadt_duplicate_title_action_init()
{
// Localization
load_plugin_textdomain('avoid-duplicate-titles',false,dirname(plugin_basename(__FILE__)).'/langs/');
}
 
// Add actions
add_action('init', 'wpadt_duplicate_title_action_init');

// Add Settings link to plugin page entry
function wpadt_add_action_links( $links ) {
	$review_link = '<a target="_blank" href="https://wordpress.org/support/view/plugin-reviews/avoid-duplicate-titles?filter=5#pages" title="' . sanitize_text_field(esc_attr__('If you like it, please review the plugin', 'avoid-duplicate-titles')) . '">' . sanitize_text_field(esc_attr__('Review the plugin', 'avoid-duplicate-titles')) . '</a>';
	$url = get_admin_url(null, 'settings-general.php?page=AvoidDuplicates');
 
	$links[] = '<a href="'. esc_url($url) .'">Settings</a>';
	$links[] = $review_link;
	return $links;
}
 
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'wpadt_add_action_links' );