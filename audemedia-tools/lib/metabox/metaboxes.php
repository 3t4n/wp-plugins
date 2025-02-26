<?php

// METABOXES FOR VIDEO PAGE TEMPLATE
function check_audemedia_videopage_metaboxes_support() {
	if(current_theme_supports('audemedia_videopage_metaboxes')) {
		include_once( 'page_post_type_video_page_template.php');
	}
}
add_action('init', 'check_audemedia_videopage_metaboxes_support');

// METABOXES FOR SERVICES
function check_audemedia_services_metaboxes_support() {
	if(current_theme_supports('audemedia_services_cpt')) {
		include_once( 'services_post_type.php');
	}
}
add_action('init', 'check_audemedia_services_metaboxes_support');

// METABOXES FOR TEAM
function check_audemedia_team_metaboxes_support() {
	if(current_theme_supports('audemedia_team_cpt')) {
		include_once( 'team_post_type.php');
	}
}
add_action('init', 'check_audemedia_team_metaboxes_support');


// METABOXES FOR POSTS
function check_audemedia_post_metaboxes_support() {
	if(current_theme_supports('audemedia_post_metaboxes')) {
		include_once( 'post_post_type.php');
	}
}
add_action('init', 'check_audemedia_post_metaboxes_support');

// METABOXES FOR PAGES
function check_audemedia_page_metaboxes_support() {
	if(current_theme_supports('audemedia_page_metaboxes')) {
		include_once( 'page_post_type.php');
	}
}
add_action('init', 'check_audemedia_page_metaboxes_support');

// METABOXES FOR PORTFOLIO
function check_audemedia_portfolio_metaboxes_support() {
	if(current_theme_supports('audemedia_portfolio_cpt')) {
		include_once( 'portfolio_post_type.php');
	}
}
add_action('init', 'check_audemedia_portfolio_metaboxes_support');

function aude_portfolio_admin_load_scripts($hook) {
    if( $hook != 'post.php' && $hook != 'post-new.php' )
        return;
	wp_enqueue_script( 'portfolio-admin-js', plugin_dir_url( __FILE__ ) . 'js/portfolio_admin.js' );
}
add_action('admin_enqueue_scripts', 'aude_portfolio_admin_load_scripts');

// INITIALIZE METABOX CLASS
add_action( 'init', 'aude_initialize_cmb_meta_boxes', 9999 );
function aude_initialize_cmb_meta_boxes() {
    if ( !class_exists( 'cmb_Meta_Box' ) ) {
        require_once( 'init.php' );
    }
}