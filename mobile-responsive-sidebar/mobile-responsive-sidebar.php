<?php
/**
 * Plugin Name:       Mobile Responsive Sidebar
 * Plugin URI:        https://3xweb.site/
 * Description:       Convert any sidebar into a responsive, icon-activated sidebar for mobile users, works with any sidebar, works with woocommerce filters on sidebar.
 * Version:           1.0.2
 * Author:            3X Web
 * Author URI:        https://3xweb.site/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mobile-responsive-sidebar
 *
 * @link              http://3xweb.site/
 * @package           mobile-responsive-sidebar
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}
// Load plugins scripts
function mrs_3xweb_scriptLoader(){
    // Register each script
    wp_register_script(
        'sidebar-revolver-js', 
        plugins_url('/js/sidebarRevolver.js', __FILE__ ), 
        array( 'jquery' ),
        false,
        true
    );
    wp_register_style('sidebar-style-css', plugins_url('/css/responsive-sidebar-style.css',__FILE__ ));
    
    wp_enqueue_script('sidebar-revolver-js');
    wp_enqueue_style('sidebar-style-css');
}
add_action( 'wp_enqueue_scripts', 'mrs_3xweb_scriptLoader' );

//Loads dashicons on frontend
function mrs_3xweb_dashicons(){
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'mrs_3xweb_dashicons');
// show sidebar action button
function mrs_3xweb_iconLoader() {
    // loads only on frontend
    if ( !is_admin() ) { 
        ?>
        <i id="revolver-icon" class="dashicons dashicons-menu sidebar-rev alignleft"></i>
        <?php
    }
    
}
// insert after wp is fully loaded, makes it compatible with elementor
add_action('wp_loaded', 'mrs_3xweb_iconLoader');