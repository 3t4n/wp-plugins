<?php
/**
 * Class Menu - admin menues
 * 
 * @package Alley_Business_Toolkit
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'ABT_Admin_Menu' ) ) :
    class ABT_Admin_Menu {
        public function __construct() {
            add_action( 'admin_menu', array( $this, 'register_main_menus'),	10 );

            if ( abt_fs()->can_use_premium_code() ) {
                add_action( 'admin_menu', array( $this, 'register_promotion_submenu'),	10 );
                add_action( 'admin_menu', array( $this, 'register_testimonial_submenu' 		),	10 );
                add_action( 'admin_menu', array( $this, 'register_team_submenu' 		),	10 );
            }
        }
    
        public function register_main_menus() {
    
            add_menu_page( 'Alley Toolkit', 'Alley Toolkit', 'manage_options', 'alley-toolkit', array( $this, 'abt_info' ), '','7' );
    
            add_submenu_page('alley-toolkit',
                'Alley Toolkit Information',
                __( 'Alley Toolkit Information', 'alley-business-toolkit' ),
                'manage_options',
                'alley-toolkit');
    
     }
    
        public function register_promotion_submenu() {
    
            add_submenu_page(
                'alley-toolkit',
                'promotions',
                'Promotions',
                'manage_options',
                'edit.php?post_type=abt_promotion'
            );
    
        }
    
        public function register_testimonial_submenu() {
    
            add_submenu_page(
                'alley-toolkit',
                'testimonials',
                'Testimonials',
                'manage_options',
                'edit.php?post_type=abt_testimonials'
            );
    
        }
    
        public function register_team_submenu() {
    
            add_submenu_page(
                'alley-toolkit',
                'teams',
                'Teams',
                'manage_options',
                'edit.php?post_type=abt_team'
            );
    
        }

        public function abt_info() {
            include_once('partials/dashboard.php');
        }
        
    
       
    
    }
    
    $ABT_custom_Menu = new ABT_Admin_Menu;
    
    endif;
