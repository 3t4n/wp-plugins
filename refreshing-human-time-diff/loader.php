<?php

/**
 * The Refreshing Human Time Diff Plugin Loader
 *
 * @since 3
 *
 **/
 
// If this file is called directly, abort
if ( ! defined( 'WPINC' ) ) {
	die;
}


/**
 * Load files
 */
require_once( plugin_dir_path( __FILE__ ) . '/inc/class-refreshing-human-time-diff.php' );

/**
 * Main Function
 */
function pp_refreshing_human_time_diff() {

  return PP_Refreshing_Human_Time_Diff::getInstance( array(
    'file'    => dirname( __FILE__ ) . '/refreshing-human-time-diff.php',
    'slug'    => basename( pathinfo( __FILE__, PATHINFO_DIRNAME ) ),
    'name'    => 'Refreshing Human Time Diff',
    'version' => '3.1'
  ) );
    
}


/**
 * Run the plugin
 */
pp_refreshing_human_time_diff();


?>