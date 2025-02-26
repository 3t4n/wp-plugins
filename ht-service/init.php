<?php

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit();

if ( !class_exists( 'Htservice_Addons_Init' ) ) {
    class Htservice_Addons_Init{
        
        public function __construct(){
            
            if ( htservice_is_elementor_version( '>=', '3.5.0' ) ) {
                add_action( 'elementor/widgets/register', array( $this, 'htservice_includes_widgets' ) );
            }else{
                add_action( 'elementor/widgets/widgets_registered', array( $this, 'htservice_includes_widgets' ) );
            }

        }
        
        // Include Widgets File
        public function htservice_includes_widgets(){
            
            if ( file_exists( HTSERVICE_ADDONS_PL_PATH.'includes/widgets/htservice_addons.php' ) ) {
                require_once HTSERVICE_ADDONS_PL_PATH.'includes/widgets/htservice_addons.php';
            }
        }
}
    new Htservice_Addons_Init();
}

// enqueue scripts
add_action( 'wp_enqueue_scripts','htservice_enqueue_scripts');
function  htservice_enqueue_scripts(){
    // enqueue styles
    wp_enqueue_style( 'bootstrap', HTSERVICE_ADDONS_PL_URL . 'assets/css/bootstrap.min.css');
    wp_enqueue_style( 'font-awesome', HTSERVICE_ADDONS_PL_URL . 'assets/css/font-awesome.min.css');
    wp_enqueue_style( 'htservice-vendors', HTSERVICE_ADDONS_PL_URL.'assets/css/htservice-vendors.css');
    wp_enqueue_style( 'htservice-widgets', HTSERVICE_ADDONS_PL_URL.'assets/css/htservice-widgets.css');
    // enqueue js
     wp_enqueue_script( 'popper', HTSERVICE_ADDONS_PL_URL . 'assets/js/popper.min.js', array('jquery'), '1.0.0', true);    
     wp_enqueue_script( 'bootstrap', HTSERVICE_ADDONS_PL_URL . 'assets/js/bootstrap.min.js', array('jquery'), '4.0.0', true);
     wp_enqueue_script( 'htservice-vendors', HTSERVICE_ADDONS_PL_URL.'assets/js/htservice-vendors.js', array('jquery'), '', false);
     wp_enqueue_script( 'htservice-active', HTSERVICE_ADDONS_PL_URL.'assets/js/htservice-jquery-widgets-active.js', array('jquery'), '', true);
}

add_action('init','htservice_size');
function htservice_size(){
    add_image_size('htservice_img1170x600',1170,600,true);
    add_image_size('htservice_img550x348',550,348,true);
    add_image_size('htservice_img370x410',370,410,true);
    add_image_size('htservice_img162x100',162,100,true);
    add_image_size('htservice_img370x380',370,380,true);
}
// Text Domain load
add_action( 'init', 'htservice_load_textdomain' );
function htservice_load_textdomain() {
  load_plugin_textdomain( 'htservice', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}