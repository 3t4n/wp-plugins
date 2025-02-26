<?php
 /**
 * Plugin Name: Boost Yoast Analysis CFS
 * Version: 1.0
 * Plugin URI: http://nilaypatel.info/?plugins=boost-yoast-analysis-cfs
 * Description: This plugin will include your CFS created fields in yoast seo calculation.
 * Author: Nilay Patel
 * Author URI: http://nilaypatel.info
 * Text Domain: boost-yoast-analysis-cfs
 * License: GPL v3
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


/**
 * The code that runs during plugin activation.
 */
register_activation_hook( __FILE__, 'activate_np_bycfs' );

function activate_np_bycfs() {
		update_option('bycfs_activated_on',@date('d-m-Y h:i:s'));
}

/**
 * The code that runs during plugin deactivation.
 */
register_deactivation_hook( __FILE__, 'deactivate_np_bycfs' );

function deactivate_np_bycfs() {
	update_option('bycfs_deactivated_on',@date('d-m-Y h:i:s'));
}

$plgprefix = 'bycfs_';

/* Include JS */
function bycfs_js() {
	
	global $post;
   if($post->post_type == 'page'){  // include only on pages
	    wp_enqueue_script('yoastseoscript', plugins_url('boost-yoast-analysis-cfs.js',__FILE__ ), array('yoast-seo-admin-script'));
   }
}
//add_action( 'admin_init','bycfs_js');
add_action('admin_enqueue_scripts', 'bycfs_js');