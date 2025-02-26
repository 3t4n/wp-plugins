<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/**
 * Plugin Name: Faq With Accordion
 * Description: Plugin to display FAQ in the form of Accordions.
 * Author:  Evince Development
 * Version: 1.2.1
 * Author URL: https://evincedev.com/
 */

class Evdpl_FAQ {

    public function __construct() {
        $this->version = '1.0.1';
        $this->inc = trailingslashit( plugin_dir_path( __FILE__ ) . '/includes' );
        $this->load_dependencies();
        $this->load_admin();
    }

    private function load_dependencies() {
        require_once( $this->inc . 'class-evdpl-faq-admin.php' );
        require_once( $this->inc . 'class-evdpl-faq-display.php' );
    }

    private function load_admin() {
        new Evdpl_FAQ_Admin( $this->get_version() );
    }
    
    public function get_version() {
        return $this->version;
    }
}

add_action( 'plugins_loaded', 'evdpl_faq_run' );

function evdpl_faq_run() {
    load_plugin_textdomain( 'evdpl-faq' );
    new Evdpl_FAQ();
}


add_action('admin_footer', 'evdpl_faq_logo_icon_css');

function evdpl_faq_logo_icon_css() {
  echo '<style>
    #menu-posts-faq .wp-menu-image img{height: 20px !important; padding-top: 7px;}
  </style>';
}