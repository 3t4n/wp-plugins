<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
 * Plugin name: SportsTeam Widget
 * Plugin URI: https://wordpress.org/plugins/sportsteam-widget/
 * Description: A widget that shows the next match of a team and shortcodes for football livescores.
 * Version: 2.4.3
 * Author: Sportsteam livescores
 * Author URI: https://777score.com/
 * License: GPLv2
 * Text Domain: sportsteam-widget
 * Domain Path: /lang/
 * License: GPLv2 or later


Copyright 2014 - 2023  Sportsteam livescores (https://777score.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


// Plugin Version
define('SPORTSTEAM_VER', '2.4.2');


function sportsteam_register_post_type() {
	$labels = array(
		'name'                => esc_html__('Teams', 'sportsteam-widget'),
		'singular_name'       => esc_html__('Team', 'sportsteam-widget'),
		'add_new'             => esc_html__('New Team', 'sportsteam-widget'),
		'add_new_item'        => esc_html__('New Team', 'sportsteam-widget'),
		'edit_item'           => esc_html__('Edit Team', 'sportsteam-widget'),
		'new_item'            => esc_html__('New Team', 'sportsteam-widget'),
		'view_item'           => esc_html__('View Team', 'sportsteam-widget'),
		'search_items'        => esc_html__('Search Team', 'sportsteam-widget'),
		'not_found'           => esc_html__('No Team found', 'sportsteam-widget'),
		'not_found_in_trash'  => esc_html__('No Team found in the Thrash', 'sportsteam-widget'),
		'parent_item_colon'   => '',
		'menu_name'           => esc_html__('SportsTeams', 'sportsteam-widget'),
	);
	register_post_type('sportsteams', array(
		'public'              => true,
		'show_in_menu'        => true,
		'show_ui'             => true,
		'labels'              => $labels,
		'hierarchical'        => false,
		'supports'            => array(
			'title',
			'editor',
			'page-attributes',
			'excerpt',
			'thumbnail',
			'custom-fields',
			),
		'capability_type'     => 'post',
		'taxonomies'          => array( 'st_classes' ),
		'exclude_from_search' => false,
		'rewrite'             => array(
			'slug' => 'sportsteams',
			'with_front' => true,
			),
		)
	);

	$labels = array(
		'name'                          => esc_html__('Classes', 'sportsteam-widget'),
		'singular_name'                 => esc_html__('Class', 'sportsteam-widget'),
		'search_items'                  => esc_html__('Search Class', 'sportsteam-widget'),
		'popular_items'                 => esc_html__('Popular Classes', 'sportsteam-widget'),
		'all_items'                     => esc_html__('All Classes', 'sportsteam-widget'),
		'parent_item'                   => esc_html__('Parent Class', 'sportsteam-widget'),
		'edit_item'                     => esc_html__('Edit Class', 'sportsteam-widget'),
		'update_item'                   => esc_html__('Update Class', 'sportsteam-widget'),
		'add_new_item'                  => esc_html__('Add New Class', 'sportsteam-widget'),
		'new_item_name'                 => esc_html__('New Class', 'sportsteam-widget'),
		'separate_items_with_commas'    => esc_html__('Separate Classes with commas', 'sportsteam-widget'),
		'add_or_remove_items'           => esc_html__('Add or remove Classes', 'sportsteam-widget'),
		'choose_from_most_used'         => esc_html__('Choose from most used Classes', 'sportsteam-widget'),
		'not_found'                     => esc_html__('No Classes found', 'sportsteam-widget'),
		);
	$args = array(
		'label'                         => esc_html__('Classes', 'sportsteam-widget'),
		'labels'                        => $labels,
		'public'                        => true,
		'hierarchical'                  => true,
		'show_ui'                       => true,
		'show_in_nav_menus'             => true,
		'args'                          => array( 'orderby' => 'term_order' ),
		'rewrite'                       => array(
											'slug' => 'class',
											'with_front' => true,
										),
		'query_var'                     => true,
	);
	register_taxonomy( 'st_classes', 'sportsteams', $args );
}
add_action( 'init', 'sportsteam_register_post_type' );

require_once('src/Sprttm_ShortCodeConfig.php');

Sprttm_ShortCodeConfig::getInstance();

add_shortcode( 'livescore', 'sprttm_renderLivescoreService' );

function sportsteam_lang() {
	load_plugin_textdomain('sportsteam-widget', false, plugin_basename(dirname(__FILE__)) . '/lang/');
}
add_action('plugins_loaded', 'sportsteam_lang');

function sportsteam_enqueue_style() {
	wp_enqueue_style('sportsteam_widget', plugins_url( '/css/sportsteam-widget.css', __FILE__ ), 'screen', SPORTSTEAM_VER);
}
add_action( 'wp_enqueue_scripts', 'sportsteam_enqueue_style' );

function sportsteam_about() {
	?>
	<div class='wrap'>
		<h1><?php esc_html_e('About the Sportsteam Widget', 'sportsteam-widget'); ?></h1>
		<div id="poststuff" class="metabox-holder">
			<div class="widget">
				<p><?php esc_html_e('This plugin is being maintained by Sportsteam livescores from', 'sportsteam-widget'); ?>
					<a href="https://777score.com/" target="_blank" title="777score.com">777score.com</a>.
				</p>

				<h2 class="widget-top"><?php esc_html_e('Review this plugin.', 'sportsteam-widget'); ?></h2>
				<p><?php esc_html_e('If this plugin has any value to you, then please leave a review at', 'sportsteam-widget'); ?>
					<a href="https://wordpress.org/support/view/plugin-reviews/sportsteam-widget?rate=5#postform" target="_blank" title="<?php esc_attr_e('The plugin page at wordpress.org.', 'sportsteam-widget'); ?>">
						<?php esc_html_e('the plugin page at wordpress.org', 'sportsteam-widget'); ?></a>.
				</p>
			</div>
		</div>
	</div>
	<?php
}

function sportsteam_menu() {
	add_submenu_page('edit.php?post_type=sportsteams', esc_html__('About', 'sportsteam-widget'), esc_html__('About', 'sportsteam-widget'), 'manage_categories', 'sportsteam_about', 'sportsteam_about');
}
add_action('admin_menu', 'sportsteam_menu');


require_once( 'widget.php' );
