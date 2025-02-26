<?php
/**
 * Menus of the plugin
 */
 
$seokwrpluginurl = plugin_dir_path( __FILE__ );
add_action('admin_menu', 'wp_1seokwr_control_menu');

function wp_1seokwr_control_menu() {
	 
	add_menu_page( '1SEO KWR', '1SEO KWR', 'administrator', 'wp_1seokwr_research', 'wp_1seokwr_research', ' ' . plugins_url( '/14449.png' , __FILE__ ) . '', 500 );
	$researchSlug = add_submenu_page( 'wp_1seokwr', 'Keyword Research', 'Research', 'administrator', 'wp_1seokwr_research', 'wp_1seokwr_research' );
	
	add_action('admin_head-'.$dashboardSlug, 'wp_1seokwr_admin_head_dashboard');
	add_action('admin_head-'.$researchSlug , 'wp_1seokwr_admin_head_research');

}

function wp_1seokwr_admin_head_research(){

	//ui dialog
	wp_enqueue_style ( 'wp-jquery-ui-dialog' );
	wp_enqueue_script ( 'jquery-ui-dialog' );
	
	
	wp_enqueue_script('wp_1seokwr-gcomplete',plugins_url( '/js/jquery.gcomplete.0.1.2.js' , __FILE__ ));
	wp_enqueue_script('wp_1seokwr-main',plugins_url( '/js/main.js' , __FILE__ ));

}

