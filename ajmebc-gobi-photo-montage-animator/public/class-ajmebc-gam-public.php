<?php
/**
 * Licence:
 * AJ & MBEC Ltd Gobi Photo Montage Animator Wordpress Plugin
 * Copyright (C) 2016  AJ & MEBC Ltd
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 *
 * Gnomovision version 69, Copyright (C) 2016 AJ & MEBC Ltd
 * Gnomovision comes with ABSOLUTELY NO WARRANTY;
 * This is free software, and you are welcome to redistribute it
 * under certain conditions;
 */
/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.ajmebc.co.uk/wordpress/gobi.html
 * @since      1.0.0
 *
 * @package    ajmebc_gam
 * @subpackage ajmebc_gam/public
 * @author     Andrew James <andrew.james@ajmebc.co.uk>
 */
class ajmebc_gam_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $ajmebc_gam    The ID of this plugin.
	 */
	private $ajmebc_gam;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $ajmebc_gam       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $ajmebc_gam, $version ) {

		$this->ajmebc_gam = $ajmebc_gam;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style($this->ajmebc_gam . '-ShiftingTiles-style', plugin_dir_url(__FILE__) . 'ajmebc/dist/style/css/ShiftingTiles-style.min.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script($this->ajmebc_gam . '-require', plugin_dir_url(__FILE__) . 'ajmebc/node_modules/requirejs/require.js', array(), $this->version, false );
		wp_enqueue_script($this->ajmebc_gam . '-main', plugin_dir_url(__FILE__) . 'ajmebc/dist/js/ShiftingTiles.min.js', array(), $this->version, true);

	}
	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      array    $atts       array of attributes for the Shortcode.
	 * @usage		[ajmebc_gobi_pma_scode]
	 *
	 */
	public function ajmebc_gam_shortcode( $atts ){
		ob_start();

		$params = shortcode_atts( array( 'height' => '600px' ), $atts );

		include_once( 'partials/ajmebc-gam-public-display.php' );

		return ob_get_clean();
	}
}
