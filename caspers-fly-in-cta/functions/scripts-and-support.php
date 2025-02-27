<?php

/* Admin Scripts and Styles */
function register_casper_cta_admin_scripts(){
	if(is_admin()){
		wp_enqueue_script('casper_cta_admin_script', plugin_dir_url( __FILE__ ).'../js/admin.js', '', '', true);
		wp_enqueue_style('casper_cta_admin_style', plugin_dir_url( __FILE__ ).'../css/admin.css' );
	}
}
add_action('admin_init', 'register_casper_cta_admin_scripts');

/* Enqueue Appropriate Scripts for Frontend */
function register_casper_cta_frontend_scripts() {
	if( get_option('cpcta-slider-type') === 'vertical' ) {
		wp_enqueue_script('casper_cta_bottom_script', plugin_dir_url( __FILE__ ).'../js/bottom-flyin.js', '', '', true);
	}
	if( get_option('cpcta-slider-type') === 'horizontal' ) {
		wp_enqueue_script('casper_cta_bottom_script', plugin_dir_url( __FILE__ ).'../js/side-flyin.js', '', '', true);
	}
}
add_action('wp_enqueue_scripts', 'register_casper_cta_frontend_scripts');

/* Make sure Theme has jQuery! */
// function register_jquery_in_cpcta(){
//     wp_enqueue_script('jquery');
// }
// add_action( 'wp_enqueue_scripts', 'register_jquery_in_cpcta' );

/* Support for Gravity Forms Add Form Button */
function display_form_button_on_cpcta_page( $is_post_edit_page ) {
    if ( isset( $_GET['page'] ) && $_GET['page'] == 'caspers-flyin-cta' ) {
        return true;
    }

    return $is_post_edit_page;
}
add_filter( 'gform_display_add_form_button', 'display_form_button_on_cpcta_page' );

/* Add Settings and Donate Links on Plugin Page; Remove Edit Link */
add_filter( 'plugin_action_links', 'cpcta_add_action_links', 10, 2 );
function cpcta_add_action_links ( $links, $file ) {
	if($file == 'caspers-fly-in-cta/caspers-flyin-cta.php'){
		$links['donate'] = '<a href="https://www.paypal.me/xace90" target="_blank">Donate</a>';
		$links['setting'] = '<a href="' . admin_url( 'themes.php?page=caspers-flyin-cta' ) . '">Settings</a>';
		unset($links['edit']);
	}
return $links;
}