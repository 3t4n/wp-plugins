<?php
/**
 * Plugin Name: Admin Pro
 * Plugin URI: https://www.ideaquotient.in/adminpro
 * Description: Admin Pro is probably the most advance admin UI available for WordPress.  
 * Version: 1.0.0
 * Author: IQL
 * Author URI: https://www.iqltech.com
 * License: GPL2
 */


//This function adds Pace to Amin Area which will show loading progress bars when any admin page is being loaded
//It also adds CSS styles for a nicer admin look 



function admin_pro_pace_script( $hook ) {


    wp_register_style( 'admin_pro_admin_css',  plugin_dir_url( __FILE__ )  . 'css/admin-pro.css', false, '1.0.0' );
    
    wp_enqueue_style( 'admin_pro_admin_css' );

    wp_register_style( 'admin_pro_pace_theme',  plugin_dir_url( __FILE__ )  . 'css/pace-theme-flash.css', false, '1.0.0' );
    
    wp_enqueue_style( 'admin_pro_pace_theme' );    

    wp_enqueue_script( 'admin_pro_pace_js', plugin_dir_url( __FILE__ ) . 'js/pace.js', array(), '1.0' );
    
    wp_enqueue_script( 'admin-pro', plugin_dir_url( __FILE__ ) . 'js/admin-pro.js', array(), '1.0' );

}



function admin_pro_footer_admin () 
{
    echo '<span id="footer-thankyou">Powered by <a href="https://www.ideaquotient.in" target="_blank">Admin Pro</a>. Built on & <a href="https://wordpress.org/">WordPress</a></span>';
}
 


//Hooks & Filters
add_filter('admin_footer_text', 'admin_pro_footer_admin');

add_action( 'admin_enqueue_scripts', 'admin_pro_pace_script' );