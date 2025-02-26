<?php
/**
 *
 * This is the root file of the ASD RockAndRoll PowerSlider plugin
 *
 * @package        WordPress
 * @subpackage     ASD_RockAndRoll_PowerSlider
 * Plugin Name:    ASD RockAndRoll PowerSlider
 * Plugin URI:     https://artisansitedesigns.com/plugins/asd-rockandroll-powerslider/
 * Description:    Create Power Sliders and Slides, rapidly deploy multiple sliders from the Dashboard without ever editing HTML or jQuery. Easily use any content type in a slider - slides, posts, media, custom post types, anything, even mixed types!
 * Author:         Michael H Fahey
 * Author URI:     https://artisansitedesigns.com/staff/michael-h-fahey/
 * Text Domain:    asd_rockandroll_powerslider
 * License:        GPL3
 * Version:        2.201902051
 *
 * ASD RockAndRoll PowerSlider is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * ASD RockAndRoll PowerSlider is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with ASD RockAndRoll PowerSlider. If not, see
 * https://www.gnu.org/licenses/gpl.html
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '' );
}

$asd_rockandroll_powerslider_file_data    = get_file_data( __FILE__, array( 'Version' => 'Version' ) );
$this_asd_rockandroll_powerslider_version = $asd_rockandroll_powerslider_file_data['Version'];

if ( ! defined( 'ASD_ROCKANDROLL_POWERSLIDER_DIR' ) ) {
	define( 'ASD_ROCKANDROLL_POWERSLIDER_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'ASD_ROCKANDROLL_POWERSLIDER_URL' ) ) {
	define( 'ASD_ROCKANDROLL_POWERSLIDER_URL', plugin_dir_url( __FILE__ ) );
}


require_once 'includes/asd-admin-menu/asd-admin-menu.php';
require_once 'includes/class-asd-addcustomposts/class-asd-addcustomposts.php';
require_once 'includes/class-asd-custom-post/class-asd-custom-post.php';
require_once 'includes/class-powerslide.php';
require_once 'includes/class-powerslider.php';
require_once 'includes/class-powerslider-shortcode.php';
require_once 'includes/class-powerslides-shortcode.php';
require_once 'includes/class-add-powerslider.php';
require_once 'includes/class-add-powerslides.php';

/* if cuztom library hasn't already been defined, load it */
if ( ! class_exists( 'Gizburdt\Cuztom\Cuztom' ) ) {
	include 'components/cuztom/cuztom.php';
}


/** ----------------------------------------------------------------------------
 *   Adds two submenu pages to the admin menu with the asd_settings slug.
 *   This admin top menu is loaded in includes/asd-admin-menu.php .
 *  --------------------------------------------------------------------------*/
function asd_rockandroll_powerslider_admin_submenu() {
	global $asd_cpt_dashboard_display_options;

	if ( get_option( 'asd_rockandroll_powerslide_display' ) !== $asd_cpt_dashboard_display_options[1] ) {
		add_submenu_page(
			'asd_settings',
			'PowerSlides',
			'PowerSlides',
			'manage_options',
			'edit.php?post_type=powerslide',
			''
		);
	}

	if ( get_option( 'asd_rockandroll_powerslider_display' ) !== $asd_cpt_dashboard_display_options[1] ) {
		add_submenu_page(
			'asd_settings',
			'PowerSliders',
			'PowerSliders',
			'manage_options',
			'edit.php?post_type=powerslider',
			''
		);
	}
	if ( 'false' !== get_option( 'asd_rockandroll_powerslidegroups_display' ) ) {
		add_submenu_page(
			'asd_settings',
			'PowerSlide Groups',
			'PowerSlide Groups',
			'manage_options',
			'edit-tags.php?taxonomy=powerslidegroups',
			''
		);
	}
}
if ( is_admin() ) {
		add_action( 'admin_menu', 'asd_rockandroll_powerslider_admin_submenu', 12 );
}

/** ----------------------------------------------------------------------------
 *   function instantiate_powerslider_class_objects()
 *   instantiates class objects
 *  --------------------------------------------------------------------------*/
function instantiate_powerslider_class_objects() {
	$rockandroll_powerslide_type_handle  = new PowerSlide();
	$rockandroll_powerslider_type_handle = new PowerSlider();
}
add_action( 'init', 'instantiate_powerslider_class_objects' );


/** ----------------------------------------------------------------------------
 *   function instantiate_powerslider_shortcode_objects()
 *   instantiates shortcode objects
 *  --------------------------------------------------------------------------*/
function instantiate_powerslider_shortcode_objects() {
	$rockandroll_powerslider_shortcode_type_handle = new PowerSlider_Shortcode();
	$rockandroll_powerslider_shortcode_type_handle = new PowerSlides_Shortcode();
}
add_action( 'plugins_loaded', 'instantiate_powerslider_shortcode_objects' );

/** ----------------------------------------------------------------------------
 *   function asdpowerslider_rewrite_flush()
 *   This rewrites the permalinks but ONLY when the plugin is activated
 *  --------------------------------------------------------------------------*/
function asdpowerslider_rewrite_flush() {
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'asdpowerslider_rewrite_flush' );



/** ----------------------------------------------------------------------------
 *   Enqueue jQuery and Slick.JS CSS and JS files
 *  --------------------------------------------------------------------------*/
function asd_rockandroll_powerslider_enqueues() {

	global $this_asd_rockandroll_powerslider_version;
	/** Load JQuery  */
	wp_enqueue_script( 'jquery' );

	/**    Load Slick.js slider CSS and JS */
	if ( ! defined( 'ASD_SLICK.JS_ENQUEUED' ) ) {
		wp_enqueue_style( 'asd_rockandroll_powerslider-css', ASD_ROCKANDROLL_POWERSLIDER_URL . '/css/asd-rockandroll-powerslider.css', array(), $this_asd_rockandroll_powerslider_version );
		wp_enqueue_style( 'asd_rockandroll_powerslider-slick-css', ASD_ROCKANDROLL_POWERSLIDER_URL . '/components/slick.js/slick.css', array(), $this_asd_rockandroll_powerslider_version );
		wp_enqueue_style( 'asd_rockandroll_powerslider-slick-themes-css', ASD_ROCKANDROLL_POWERSLIDER_URL . '/components/slick.js/slick-theme.css', array(), $this_asd_rockandroll_powerslider_version );
		wp_enqueue_script( 'asd_rockandroll_powerslider-slick-js', ASD_ROCKANDROLL_POWERSLIDER_URL . '/components/slick.js/slick.min.js', array(), $this_asd_rockandroll_powerslider_version, 'true' );

		wp_enqueue_script( 'asd-functions', ASD_ROCKANDROLL_POWERSLIDER_URL . 'js/asd-functions.js', array(), $this_asd_rockandroll_powerslider_version, 'true' );

		define( 'ASD_SLICK.JS_ENQUEUED', 1 );
	}
}
add_action( 'wp_enqueue_scripts', 'asd_rockandroll_powerslider_enqueues' );





/** ----------------------------------------------------------------------------
 *   function asd_register_settings_asd_rockandroll_powerslider()
 *  --------------------------------------------------------------------------*/
function asd_register_settings_asd_rockandroll_powerslider() {

	register_setting( 'asd_dashboard_option_group', 'asd_rockandroll_powerslider_display' );
	register_setting( 'asd_dashboard_option_group', 'asd_rockandroll_powerslide_display' );
	register_setting( 'asd_dashboard_option_group2', 'asd_rockandroll_powerslidegroups_display' );

	/** ----------------------------------------------------------------------------
	 *   add the names of the post types and taxonomies being added
	 *  --------------------------------------------------------------------------*/
	global $asd_cpt_list;
	global $asd_tax_list;
	array_push(
		$asd_cpt_list,
		array(
			'name' => 'PowerSliders',
			'slug' => 'powerslider',
			'desc' => 'Easy/flexible slider, lots of options',
			'link' => 'https://wordpress.org/plugins/asd-rockandroll-powerslider',
		),
		array(
			'name' => 'PowerSlides',
			'slug' => 'powerslide',
			'desc' => 'Slides that are for use in PowerSliders',
			'link' => 'https://wordpress.org/plugins/asd-rockandroll-powerslider',
		)
	);
	array_push( $asd_tax_list, 'powerslidegroups' );
}
if ( is_admin() ) {
	add_action( 'admin_init', 'asd_register_settings_asd_rockandroll_powerslider' );
}

/** ----------------------------------------------------------------------------
 *   function asd_add_settings_asd_rockandroll_powerslidegroups()
 *  --------------------------------------------------------------------------*/
function asd_add_settings_asd_rockandroll_powerslidegroups() {
	add_settings_field(
		'asd_rockandroll_powerslidegroups_display_fld',
		'show Powerslidegroups in submenu:',
		'asd_truefalse_select_insert',
		'asd_dashboard_option_group2',
		'asd_dashboard_option_section2_id',
		'asd_rockandroll_powerslidegroups_display'
	);
}
if ( is_admin() ) {
	add_action( 'asd_dashboard_option_section2', 'asd_add_settings_asd_rockandroll_powerslidegroups' );
}




/** ----------------------------------------------------------------------------
 *   function asd_add_settings_asd_rockandroll_powerslider()
 *  --------------------------------------------------------------------------*/
function asd_add_settings_asd_rockandroll_powerslider() {
	global $asd_cpt_dashboard_display_options;

	add_settings_field(
		'asd_rockandroll_powerslider_display_fld',
		'show PowerSliders in:',
		'asd_select_option_insert',
		'asd_dashboard_option_group',
		'asd_dashboard_option_section_id',
		array(
			'settingname'   => 'asd_rockandroll_powerslider_display',
			'selectoptions' => $asd_cpt_dashboard_display_options,
		)
	);

	add_settings_field(
		'asd_rockandroll_powerslide_display_fld',
		'show PowerSlides in:',
		'asd_select_option_insert',
		'asd_dashboard_option_group',
		'asd_dashboard_option_section_id',
		array(
			'settingname'   => 'asd_rockandroll_powerslide_display',
			'selectoptions' => $asd_cpt_dashboard_display_options,
		)
	);
}
if ( is_admin() ) {
	add_action( 'asd_dashboard_option_section', 'asd_add_settings_asd_rockandroll_powerslider' );
}



/** ----------------------------------------------------------------------------
 *   Function asd_rockandroll_powerslider_plugin_action_links()
 *   Adds links to the Dashboard Plugin page for this plugin.
 *  ----------------------------------------------------------------------------
 *
 *   @param Array $actions -  Returned as an array of html links.
 */
function asd_rockandroll_powerslider_plugin_action_links( $actions ) {
	if ( is_plugin_active( plugin_basename( __FILE__ ) ) ) {
		$actions[0] = '<a target="_blank" href="https://artisansitedesigns.com/plugins/asd-rockandroll_powerslider#support/">Help</a>';
		/* $actions[1] = '<a href="' . admin_url()   . '">' .  'Settings'  . '</a>';  */
	}
		return apply_filters( 'rockandroll_powersliders_actions', $actions );
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'asd_rockandroll_powerslider_plugin_action_links' );

