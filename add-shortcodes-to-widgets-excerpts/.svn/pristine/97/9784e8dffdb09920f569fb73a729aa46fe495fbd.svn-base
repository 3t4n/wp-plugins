<?php
/**
 *
 * @link              http://www.webcurries.com/plugin/add-shortcodes-to-widgets-and-excerpts/
 * @since             1.0
 * @package           add-shortcodes-to-widgets-and-excerpts
 *
 * @wordpress-plugin
 * Plugin Name:       Add Shortcodes To Widgets And Excerpts
 * Plugin URI:        http://www.webcurries.com/plugin/add-shortcodes-to-widgets/
 * Description:       Add Shortcodes To Widgets And Excerpts allows you to add shortcodes to Wordpress Widget areas and Excerpts 
 * Version:           2.0
 * Author:            Nitin Prakash
 * Author URI:        https://github.com/nitinprakash/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || die( 'Wordpress Error! Opening plugin file directly' );

// Add filter to allow widget to support shortcodes

add_filter('widget_text', 'do_shortcode');

// Add filter to allow excerpts to support shortcodes

add_filter( 'the_excerpt', 'do_shortcode');
 







