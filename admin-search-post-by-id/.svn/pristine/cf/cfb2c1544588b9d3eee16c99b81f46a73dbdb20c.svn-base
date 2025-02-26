<?php
/**
 * The WordPress Plugin Boilerplate.
 *
 * A foundation off of which to build well-documented WordPress plugins that also follow
 * WordPress coding standards and PHP best practices.
 *
 * @package   Admin_Search_Post_By_ID
 * @author    Fernando Mendoza <f.mendoza@outlook.com>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2013 Fernando Mendoza
 *
 * @wordpress-plugin
 * Plugin Name: Admin Search Post by ID
 * Plugin URI:  
 * Description: Add a new field in the search and filter your posts by ID in the admin section
 * Version:     1.0.0
 * Author:      Fernando Mendoza
 * Author URI:  
 * Text Domain: admin-search-post-by-id-locale
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once( plugin_dir_path( __FILE__ ) . 'class-admin-search-post-by-id.php' );

add_action( 'plugins_loaded', array( 'Admin_Search_Post_By_ID', 'get_instance' ) );
