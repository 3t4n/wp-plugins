<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Post types
 *
 * Creating metabox for slider type
 *
 * @class 		oshtml5MetaboxShortcode
 * @version		1.3
 * @category    Class
 * @author 		Offshorent Solutions Pvt Ltd. | Jinesh.P.V
 */
 
if ( ! class_exists( 'oshtml5MetaboxShortcode' ) ) :

    class oshtml5MetaboxShortcode { 

        /**
         * Constructor
         */

        public function __construct() { 

            add_action( 'add_meta_boxes_os-html5', array( &$this, 'oshtml5_shortcode_meta_box' ), 10, 1 );
        }		

        /**
         * callback function for ospt_auto_meta_boxe.
         */

        public function oshtml5_shortcode_meta_box() {
            add_meta_box( 	
                            'display_oshtml5_shortcode_meta_box',
                            'Shortcode',
                            array( &$this, 'display_oshtml5_shortcode_meta_box' ),
                            'os-html5',
                            'side', 
                            'high'
                        );
        }

        /**
         * display function for display_oshtml5_auto_meta_box.
         */

        public function display_oshtml5_shortcode_meta_box() {

            $post_id = get_the_ID();					

            wp_nonce_field( 'os-html5', OSHTML5_TEXT_DOMAIN );
            include_once( 'views/oshtml5.shortcode.php' );
        }
    }
endif;

/**
 * Returns the main instance of oshtml5MetaboxShortcode to prevent the need to use globals.
 *
 * @since  2.3
 * @return oshtml5MetaboxShortcode
 */
 
return new oshtml5MetaboxShortcode();
?>