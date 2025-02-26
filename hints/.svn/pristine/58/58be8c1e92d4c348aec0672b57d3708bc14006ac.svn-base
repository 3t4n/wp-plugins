<?php

class Hints {
    


    private static $initiated = false;
    
    
    public static function init() {
        if ( ! self::$initiated ) {
            self::init_hooks();
        }
    }

    /**
     * Initializes WordPress hooks
     */
    private static function init_hooks() {
        self::$initiated = true;
        add_action( 'wp_loaded', array('Hints','hints_load_js'));
        add_action( 'wp_loaded', array('Hints','hints_load_css' ));
        add_shortcode( 'hints',  array('Hints','hints_func'));
        
    }

   

    public static function hints_func($atts, $content=""){
        $atts = shortcode_atts( array("custom_text"=>"", "unique_id"=>""), $atts, 'hints' );
        
        $div_id = $atts['unique_id'];
        if($atts['unique_id']=="") $div_id = md5($content.rand());
        $custom_text = $atts['custom_text'];
        if($custom_text=="") $custom_text = '<img src="'.HINTS__PLUGIN_URL . '/_inc/plus.svg" valign="middle" class="wphints-plus-button"/>';
        $return_content = '<span class="wphints-container" style="display:inline;">
            
       <a href="javascript:void(0);" data-box-id="'.$div_id.'" class="better-links">'.$custom_text.'</a> <span class="wphints-data-box" id="'.$div_id.'" ><span class="wphints-triangle"></span><span class="wphints-main-content">'.$content.'</span></span></span> ';
        return $return_content;
    }
    
    public static function hints_load_js() {
        wp_register_script( 'hints-footer-js', HINTS__PLUGIN_URL . '_inc/hints.js', array('jquery'), HINTS_VERSION, true );
        wp_enqueue_script( 'hints-footer-js',false, array('jquery'), HINTS_VERSION, true );
        
        
    }

    public static function hints_load_css(){
        wp_register_style( 'hints-css', HINTS__PLUGIN_URL . '_inc/hints.css', array(), HINTS_VERSION, 'screen' );
        wp_enqueue_style( 'hints-css',false,array(), HINTS_VERSION,'screen' );
    }
    

    public static function plugin_activation() {
        //nothing here for now...
    }

    public static function plugin_deactivation( ) {
        //tidy up
    }
    
    
}