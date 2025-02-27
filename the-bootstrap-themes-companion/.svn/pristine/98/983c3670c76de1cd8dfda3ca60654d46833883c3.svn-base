<?php
/**
 * Class Menu - admin menues
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'TBTC_Admin_Menu' ) ) :
class TBTC_Admin_Menu {
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'register_main_menus'),	10 );
        add_action( 'admin_menu', array( $this, 'register_client_logo_submenu' ),	10 );
        add_action( 'admin_menu', array( $this, 'register_teams_submenu' ),	10 );
        add_action( 'admin_menu', array( $this, 'register_testimonial_submenu' ),	10 );
        add_action( 'admin_menu', array( $this, 'register_price_submenu' ),	10 );
    }

    public function register_main_menus() {

        add_menu_page( 'bootstrap-toolkit', 'Bootstrap Toolkit', 'manage_options', 'bootstrap-toolkit', array( $this, 'tbtc_toolkit_info'), '','7' );
       
    }
    public function tbtc_toolkit_info(){
        echo  'Bootstarp Toolkit Info Page';
    }

    public function register_client_logo_submenu(){
        add_submenu_page(
            'bootstrap-toolkit',
            'Client Logo',
            'Client Logo',
            'manage_options',
            'cleint-logo',
            'tbtc_client_logo'
        );

        add_submenu_page('edit.php?post_type=project','View Source of Fund','View Source of Fund','manage_options','view-sof','viewSofDetail');
    }

    public function register_testimonial_submenu() {

        add_submenu_page(
            'bootstrap-toolkit',
            'Testimonial',
            'Testimonials',
            'manage_options',
            'edit.php?post_type=tbtc_testimonials'
        );

    }

    public function register_teams_submenu() {

        add_submenu_page(
            'bootstrap-toolkit',
            'Team',
            'Teams',
            'manage_options',
            'edit.php?post_type=tbtc_teams'
        );

    }
   
    public function register_price_submenu() {

        add_submenu_page(
            'bootstrap-toolkit',
            'Price',
            'Price Table',
            'manage_options',
            'edit.php?post_type=tbtc_price'
        );

    }


}

$TBTC_wp_menu = new TBTC_Admin_Menu;

endif;
