<?php
/*
Plugin Name: Responsive Progress Bar
Plugin URI: http://wordpress.org/plugins/responsive-progress-bar/
Description: Shortcode for displaying a responsive configurable progress bar.
Author: Rene Puchinger
Version: 1.0
Author URI: https://profiles.wordpress.org/rene-puchinger/
License: GPL3

    Copyright (C) 2013  Rene Puchinger

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

@package Responsive_Progressbar
@since 1.0

*/

if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !class_exists( 'Responsive_Progressbar' ) ) {

	class Responsive_Progressbar {

		public function __construct() {
			add_action( 'wp_head', array( &$this, 'action_enqueue_dependencies' ) );
			add_shortcode( 'rprogress', array( &$this, 'rprogress_shortcode' ) );
		}

		/**
		 * Enqueue frontend dependencies.
		 */
		public function action_enqueue_dependencies() {
			wp_enqueue_script( 'jquery' );
			wp_enqueue_style( 'responsive-progressbar-style', plugins_url( 'assets/css/style.css', __FILE__ ) );
			wp_enqueue_script( 'responsive-progressbar-script', plugins_url( 'assets/js/responsive-progressbar.js', __FILE__ ), 'jquery' );
		}

		function rprogress_shortcode( $atts ) {
			extract( shortcode_atts( array(
				'value' => '100',
				'color' => '#4af',
				'bgcolor' => '#ccc',
				'delay' => '1000',
				'border_radius' => '3px',
				'text' => '',
				'text_color' => '#333'
			), $atts ) );

			return
				"<div class='rprogress-container'>
				<div class='rprogress-wrap rprogress' data-progress-percent='{$value}' data-speed='{$delay}' style='background: ${color}; border-radius: ${border_radius}; -moz-border-radius: ${border_radius}; -webkit-border-radius: ${border_radius}; -o-border-radius: ${border_radius};'>
					<div class='rprogress-bar rprogress' style='background: ${bgcolor}'></div><div class='rprogress-text' style='color: ${text_color}'>${text}</div>
				</div>
				</div>
				";
		}

	}

	new Responsive_Progressbar();
}

?>