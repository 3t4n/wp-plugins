<?php

global $options;


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}



/**
 * Load Admin CSS
 * 
 * @since 2.0.0
 */
if ( !function_exists( 'ah_prism_load_wp_admin_style' ) ) {
    
function ah_prism_load_wp_admin_style() {

        wp_register_style('prism_admin_css', plugins_url('/admin.css',__FILE__ ));   
        wp_enqueue_style( 'prism_admin_css' );
    
        }
}
add_action( 'admin_enqueue_scripts', 'ah_prism_load_wp_admin_style' );




/**
 * Load the CSS File and echo the choosed Theme
 * 
 * @TODO: Find better solution
 * 
 * @since 2.0.0
 */   
function ah_prism_load_css() {
  
$options = get_option( 'prism-settings-group' );  

 ?>  
<link rel="stylesheet" id="code-highlighter-css"  href="<?php echo plugins_url( '/css/',__FILE__ );?><?php echo esc_attr( get_option( 'custom_prism_css' ) ); ?>.css" type="text/css" media="all" />

<?php }
add_action( 'wp_head', 'ah_prism_load_css' );