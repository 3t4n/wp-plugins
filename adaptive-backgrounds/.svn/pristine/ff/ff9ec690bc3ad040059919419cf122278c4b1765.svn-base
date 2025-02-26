<?php
/**
 * Plugin Name: Adaptive Backgrounds
 * Plugin URI: http://upshotweb.com/
 * Description: A plugin for extracting dominant colors from images and applying it to its parent.
 * Version: 1.0.0
 * Author: Ashvin Solanki
 * Author URI: https://upshotweb.com/author/ashvin/
 * Requires at least: 4.4
 * Tested up to: 6.1.1
 * License: GPL2 or later
 * Text Domain: Adaptive Backgrounds
 *
 * @package Adaptive Backgrounds
 * @category Core
 * @author ashvins
 */
/*This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Adaptive_Backgrounds{

  // Constructor
    function __construct() {
    	add_action('wp_enqueue_scripts',array( $this, 'ab_scripts' ) );
		add_shortcode( 'adaptive_backgrounds', array($this, 'ab_display' ) );
	}


	/**
	 * Shortcode for add content and display content.
	 *
	 */

	function ab_display( $atts,$content = null ) {
		$param = shortcode_atts( array(
	        'img_url'  => '',
	        'media_id'  => '',
	    ), $atts );
	    if (!empty($param['img_url'])) {
			return '<div class="img-wrap"><img src="'.$param['img_url'].'" data-adaptive-background></div>';
	    }else {
	    	$image_url = wp_get_attachment_image_url($param['media_id'], '');
	    	return '<div class="img-wrap ab_image_outer"><img src="'.$image_url.'" class="ab_image" data-adaptive-background></div>';
	    }
	}
	

	


	/**
	 * Insert all js for adaptive backgrounds
	 */
	function ab_scripts() {
	    wp_enqueue_style( 'ab-style',plugins_url( 'assets/css/style.css', __FILE__ ), array());
	    wp_enqueue_script('ab-jquery-js', plugins_url( 'assets/js/jquery.js', __FILE__ ), array( 'jquery' ),'',true);
	    wp_enqueue_script('ab-adaptive-js', plugins_url( 'assets/js/jquery.adaptive-backgrounds.js', __FILE__ ), array( 'jquery' ),'',true);
	    wp_enqueue_script('ab-main-js', plugins_url( 'assets/js/ab_main.js', __FILE__ ), array( 'jquery' ),'',true);
	}
	


}

new Adaptive_Backgrounds();
?>