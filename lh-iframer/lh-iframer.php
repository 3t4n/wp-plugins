<?php
/*
Plugin Name: LH Iframer
Plugin URI: https://lhero.org/portfolio/lh-iframer/
Description: This plugin creates a feed which packages your content perfectly for embedding in an iframe
Version: 1.02
Author: Peter Shaw
Author URI: https://shawfactor.com
License:
Released under the GPL license
http://www.gnu.org/copyleft/gpl.html

Copyright 2017  Peter Shaw  (email : pete@localhero.biz)
*/

/*
*  LH Iframer
*
*  @description:
*/

if (!class_exists('LH_Iframer_plugin')) {

class LH_Iframer_plugin {

public function iframer_output_html() {



header('Content-Type: text/html; charset=' . get_option('blog_charset'), true);





if (is_singular()){

if (file_exists(get_stylesheet_directory().'/iframe-templates/single.php')){

include( get_stylesheet_directory().'/iframe-templates/single.php');

} else {

include( plugin_dir_path( __FILE__ ).'/iframe-templates/single.php');

}

} else {

if (file_exists(get_stylesheet_directory().'/iframe-templates/single.php')){

include( get_stylesheet_directory().'/iframe-templates/index.php');

} else {

include( plugin_dir_path( __FILE__ ).'/iframe-templates/index.php');

}


}


}

public function add_feeds() {

add_feed('lh-iframe', array($this,"iframer_output_html"));

}


public function on_activate($network_wide) {

    if ( is_multisite() && $network_wide ) { 

        global $wpdb;

        foreach ($wpdb->get_col("SELECT blog_id FROM $wpdb->blogs") as $blog_id) {
            switch_to_blog($blog_id);
wp_schedule_single_event(time(), 'lh_iframer_run_initial_processes');
            restore_current_blog();
        } 

    } else {


$this->run_initial_processes();

}

}


public function run_initial_processes(){

//flush the rewrite rules
flush_rewrite_rules();



wp_clear_scheduled_hook( 'lh_iframer_run_initial_processes' ); 

}

public function no_related_posts( $options ) {

global $post;

if (is_feed('lh-iframe')){


$options['enabled'] = false;


}

    return $options;
}

public function __construct() {

//Add the feed
add_action('init', array($this,"add_feeds"),11);

//Hook to attach initial processes to cron job
add_action('lh_iframer_run_initial_processes', array($this,"run_initial_processes"));

add_filter( 'jetpack_relatedposts_filter_options', array($this,"no_related_posts"), 10, 1);


}


}

$lh_iframer_instance = new LH_Iframer_plugin();
register_activation_hook(__FILE__, array($lh_iframer_instance, 'on_activate') , 10, 1);

}



?>