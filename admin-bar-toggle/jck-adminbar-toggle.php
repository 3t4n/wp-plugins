<?php /*
Plugin Name: Admin Bar Toggle
Plugin URI: http://www.jckemp.com
Description: Hides the admin bar on the front-end by default, and adds a toggle to activate it.
Version: 1.4.1
Author: James Kemp
Author URI: http://www.jckemp.com
License: GPL2

Copyright 2014, James Kemp

*/

class JCK_Toggle_Adminbar
{

/**	=============================
    *
    * Construct
    *
    ============================= */
    
    public function __construct() {
        
        if( !is_admin() ) {
        
    		add_action( 'wp_before_admin_bar_render', array( $this, 'add_toggle' ), 0);
    		add_action( 'wp_enqueue_scripts',         array( $this, 'scripts_and_styles' ) );
    		add_action( 'get_header',                 array( $this, 'head_filter' ) );
    		add_theme_support( 'admin-bar',           array( 'callback' => '__return_false' ) );
		
		}
		
	}
	
/**	=============================
    *
    * Add Scripts & Styles
    *
    ============================= */
    
    public function scripts_and_styles() {
    
        if (!is_admin_bar_showing() || is_admin())
            return;
    
        // Scripts
        wp_enqueue_script('jquery');
        wp_enqueue_script('jck_toggle_adminbar_scripts', plugins_url('assets/js/scripts.js', __FILE__), 'jquery');
    
        // Styles
        $css = plugins_url('assets/css/style.css', __FILE__);
        wp_register_style('jck_toggle_adminbar_styles', $css);
        wp_enqueue_style('jck_toggle_adminbar_styles');
        
    }
  
/**	=============================
    *
    * Add Button to Admin Bar
    *
    ============================= */
    
    public function add_toggle() {
    
        global $wp_admin_bar;
    
        if (!is_admin_bar_showing() || is_admin())
            return;
    
        $wp_admin_bar->add_menu(array(
            'id' => 'toggle',
            'title' => __(''),
            'href' => __('/'),
            'parent' => 'top-secondary'
        ));
   
    }
  
/**	=============================
    *
    * Filter head to remove Admin Bar bump padding
    *
    ============================= */	
  
    public function head_filter() {
        
        remove_action('wp_head', '_admin_bar_bump_cb');
        
    }
  
} // End jck_kvt Class

$jck_toggle_adminbar = new JCK_Toggle_Adminbar; // Start an instance of the plugin class