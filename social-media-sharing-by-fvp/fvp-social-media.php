<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/*
Plugin Name: Social Media Sharing by FVP
Plugin URI:
Description: The simplest way to display social sharing buttons in your posts and pages. With options to completely customize the appearance.
Version: 1.0.1
Author: Francisco Vicente Parra
Author URI: https://wordpress.org/support/profile/franvipa
License: GPLv2 or later

Social Media by FVP is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Social Media by FVP is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Social Media by FVP. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

require_once ( plugin_dir_path( __FILE__ ) . 'inc/core.php' );
require_once ( plugin_dir_path( __FILE__ ) . 'inc/panels.php' );


function fvp_social_media_script_enqueue() {
	wp_enqueue_style( 'font-awesome', plugin_dir_url( __FILE__ ).'css/font-awesome.min.css', array(), '4.6.3', 'all' );
	wp_enqueue_style( 'fvp_social_media_style', plugin_dir_url( __FILE__ ).'css/fvp-social-media.css', array(), '1.0.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'fvp_social_media_script_enqueue' );

function fvp_social_media_admin_script_enqueue( $hook ) {
	global $fvp_sm_subpage_settings;
	global $fvp_sm_subpage_customize;
	if ( ( $hook != $fvp_sm_subpage_settings ) && ( $hook != $fvp_sm_subpage_customize ) )
		return;

	wp_enqueue_script( 'fvp-sm-panel', plugin_dir_url( __FILE__ ).'js/panel.js', array('jquery', 'jquery-ui-sortable'), '1.0.0', true );
	wp_enqueue_style( 'font-awesome', plugin_dir_url( __FILE__ ).'css/font-awesome.min.css', array(), '4.6.3', 'all' );
	wp_enqueue_style( 'fvp_social_media_style', plugin_dir_url( __FILE__ ).'css/fvp-social-media.css', array(), '1.0.0', 'all' );
}
add_action( 'admin_enqueue_scripts', 'fvp_social_media_admin_script_enqueue' );
