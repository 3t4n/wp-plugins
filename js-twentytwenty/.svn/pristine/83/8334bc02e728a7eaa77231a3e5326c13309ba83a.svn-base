<?php if ( ! defined( 'ABSPATH' ) ) exit;

   /*
   Plugin Name: jQuery TwentyTwenty 
   Plugin URI: https://demo.oneplussolution.com/wordpress/jquerytwentytwenty
   Description: Need to highlight the differences between two images? TwentyTwenty, a visual diff tool, makes it easy to spot them!
   Version: 1.0
   Author: One Plus Solution
   Author URI: https://oneplussolution.com/
   License: GPLv2 or later
   */

if( !class_exists('twentytwenty') ):

require_once 'default.php';

class twentytwenty extends opsclass {
    
    function __construct() {

        add_shortcode('t20baic', array($this, 'twentytwenty_shortcode_function'));

        add_action( 'wp_enqueue_scripts', array($this, 'twentytwenty_scripts_load'), 100 );
    }
    
    function twentytwenty_scripts_load() {
        wp_enqueue_style( 'twentytwenty', OPS_URL . 'assets/twentytwenty.css' );
        if(!wp_enqueue_script('jquery' )) {
            wp_enqueue_script('jquery');
        }
        wp_enqueue_script('jquery-event-move', OPS_URL . 'assets/jquery.event.move.js', array(), '1.0.0', true);
        wp_enqueue_script('jquery-twentytwenty', OPS_URL . 'assets/jquery.twentytwenty.js', array(), '1.0.0', true);
    }
    
    function twentytwenty_shortcode_function($atts) {
        $options = shortcode_atts( array(
            'id' => '',
            'before' => '',
            'after' => '',
        ), $atts );
        
        $id = $options['id'];
        $before = $options['before'];
        $after = $options['after'];
        
        return '<script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery("#'.$id.'").twentytwenty();
            });
        </script><div id="'.$id.'"><img src="'.$before.'"><img src="'.$after.'"></div>';
    }
    
}

new twentytwenty();

endif; // class_exists check
?>