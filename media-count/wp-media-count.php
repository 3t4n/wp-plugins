<?php
/**
 * Plugin Name: Media Count
 * Plugin URI: https://wordpress.org/plugins/wp-media-count
 * Description: Media Count will display information about the overall number of media library files, including PDFS, Videos, Documents and more total file counts.	
 * Version: 1.0
 * Author: Webbita
 * Author URI: https://webbita.com
 * License:           GPLv2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.html
 * @link              https://webbita.com
 * @since             1.0.0
 * @package           Media Count
 * @author            Webbita
  *@copyright         2022 Webbita
  *@license           GPLv2 or later
 
 */

namespace WPMediaCounts;

include( plugin_dir_path( __FILE__ ) . 'count.php');

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}	

/**
created Class Name
 */
class WPmediacount {
	public function wp_media_count_add_hooks() {
		register_activation_hook(__FILE__, 'wp_media_count_run');
		add_action( 'admin_menu', array( $this, 'wp_media_count_admin_menus' ));
		add_action('admin_init', array( $this, 'wp_media_count_redirect' ));
	}
/**
created plugin menu
 */	
	public function wp_media_count_admin_menus() {
		add_menu_page(
		__( 'WP Media Count', 'WP Media Count' ),
		__( 'WP Media Count', 'WP Media Count' ),
		'manage_options',
		'wp_media_count',
		'wp_media_count_table',
		'dashicons-chart-pie',
		10
		);
		}
		
        public function wp_media_count_redirect() {
		  if (get_option('wp_media_count_activation', false)) {
		  delete_option('wp_media_count_activation');
		  wp_redirect("admin.php?page=wp_media_count");
		  exit; 
		  }
		}
	}
/**
created Objects for Class
 */
	( new WPmediacount() )->wp_media_count_add_hooks();
	
?>




