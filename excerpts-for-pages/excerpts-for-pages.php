<?php
/**
 * Link twitter users
 *
 * Add excerpts for Pages
 *
 * @package   Excerpts for Pages
 * @author    Joan Boluda Name <joan@boluda.com>
 * @license   GPL-2.0+
 * @link      http://boluda.com
 * @copyright 2013 boluda.com
 *
 * @wordpress-plugin
 * Plugin Name: Excerpts for Pages
 * Plugin URI:  http://boluda.com/
 * Description: Add excerpts for Pages
 * Version:     1.6
 * Author:      Joan Boluda
 * Author URI:  http://boluda.com
 * Text Domain: boluda-efp
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /lang
 */

//Excerpts for Pages

function bld_efp() {
  add_post_type_support('page', array('excerpt'));
}
add_action('init', 'bld_efp');