<?php

class AACWP_Comments_Shortcode
{

    private static $instance;

    /**
     * Main Instance
     *
     * @staticvar   array   $instance
     * @return AACWP_Comments_Shortcode one true instance
     */
    public static function instance() {
        
        if ( ! isset( self::$instance ) ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * Start up
     */
    public function __construct() {

        add_shortcode('getComments', [$this, 'functionGetComments']);
        add_shortcode('getNumberOfComments', [$this, 'functionGetNumberOfComments']);

    }
     


    function functionGetComments($atts){ 
        include (plugin_dir_path(__DIR__) . "/scripts/comments.php"); 
    }
   
    
    function functionGetNumberOfComments(){
        include (plugin_dir_path(__DIR__) . "/scripts/numberOfComments.php");
    }

}
