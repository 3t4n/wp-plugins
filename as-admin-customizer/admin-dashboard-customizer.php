<?php
    /**
     * as-admin-customizer
     *
     * This plugin allows you to customize the login appearance, branding and the WordPress admin interface.
     *
     */

    /**
     * Plugin Name: AS Admin Customizer
     * Plugin URI:  https://wordpress.org/plugins/
     * Author:      Andolasoft
     * Author URI:  https://www.andolasoft.com/
     * License:     GPLv2 or later
     * License URI: https://www.gnu.org/licenses/gpl-2.0.html
     * Description: This plugin allows you to customize the login appearance, branding and the WordPress admin interface.
     * Version:     1.0
     * Text Domain: as-admin-customizer
     */

    if ( ! defined( 'ABSPATH' ) ) die( 'Error!' );

//Enqueue the style
    add_action( 'admin_init','andola_jscript');

    function andola_jscript()
    {
        wp_register_script('andola_script-style', plugins_url('assets/js/andola_admin.js',__FILE__ ));
        wp_enqueue_script('andola_script-style');
    }



    add_action( 'login_head', 'andola_logo_file' );

// CSS for custom logo on the login screen
    function andola_logo_file() {
        if ( get_option( 'andola_logo_file' ) != '' ) {
            echo '<style>.login h1 a { background-image: url("' . esc_url ( get_option( 'andola_logo_file' ) ) . '"); background-size: contain; width: 320px; }</style>';
        } else {
            echo '<style>.login h1 a { background-image: url("' . plugins_url( 'assets/wordpress.svg' , __FILE__ ) . '"); background-size: contain; width: 320px; }</style>';
        }
    }

    add_action( 'login_head', 'andola_image_height' );

// CSS for custom logo height on the login screen
    function andola_image_height() {
        if ( get_option( 'andola_image_height' ) != '' ) {
            echo '<style>body.login #login h1 a{ height:' . esc_html ( get_option( 'andola_image_height' ) ) . 'px !important; width:auto;}</style>';
        }
         else if ( get_option( 'andola_image_height' ) == '' ) 
        {
             echo '<style>body.login #login h1 a{ height:auto ;}</style>';
        }
    }

    add_action( 'login_head', 'andola_image_width' );

// CSS for custom logo width on the login screen
    function andola_image_width() {
        if ( get_option( 'andola_image_width' ) != '' ) {
            echo '<style>body.login #login h1 a{ width:' . esc_html ( get_option( 'andola_image_width' ) ) . 'px !important; height:auto ;}</style>';
        }
        else if ( get_option( 'andola_image_width' ) == '' ) 
        {
             echo '<style>body.login #login h1 a{ width:auto;}</style>';
        }
    }

    add_filter( 'login_headerurl', 'andola_logo_url' );

// URL for the logo URL on the login screen
    function andola_logo_url($url) {
        if ( get_option( 'andola_logo_url' ) != '' ) {
            return esc_url( get_option( 'andola_logo_url' ) );
        } else {
            return esc_url( get_bloginfo( 'url' ) );
        }
    }

    add_filter( 'login_headertitle', 'andola_logo_title');

// URL for the logo title on the login screen
    function andola_logo_title() {
        if ( get_option( 'andola_logo_title' ) != '' ) {
            return esc_html( get_option( 'andola_logo_title' ) );
        } else {
            return esc_html( 'Powered by Andolasoft');
        }
    }

    add_action( 'login_head', 'andola_background_file' );

// CSS for custom logo on the login screen
    function andola_background_file() {
        if ( get_option( 'andola_background_file' ) != '' ) {
            echo '<style>body { background: url("' . esc_url ( get_option( 'andola_background_file' ) ) . '");background-repeat: no-repeat !important;
    background-size: cover !important; }</style>';
        }
    }

    add_action( 'login_head', 'andola_login_background_color' );
// CSS for custom background color
    function andola_login_background_color() {
        if ( get_option( 'andola_login_background_color' ) != '' ) {
            echo '<style>body { background-color: ' . esc_html ( get_option( 'andola_login_background_color' ) ) . '!important;  }</style>';
        }
    }


    if ( get_option( 'andola_lost_password' ) != '' ) {
        add_action( 'gettext','andola_lost_password' );
    }
//Replace Lost your password text
    function andola_lost_password( $text ) {
        if ( 'Lost your password?' === $text ) {
            $text = esc_html ( get_option( 'andola_lost_password' ) );
        }

        // Important to return the text stream.
        return $text;
    }


//hook into the administrative header output
    add_action('wp_before_admin_bar_render', 'andola_dashboard_logo_file');
//Adds Custom dashboard logo
    function andola_dashboard_logo_file() {
        if ( get_option( 'andola_dashboard_logo_file' ) != '' ) {
            echo '
		<style type="text/css">
		#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
		background-image: url("' . esc_url ( get_option( 'andola_dashboard_logo_file' ) ) . '");
		background-position: 3px 3px;
		color:rgba(0, 0, 0, 0);
		background-repeat: no-repeat;
        background-size: cover !important; 
		}
		#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
		background-position: 0 0;
		}
		</style>
		';
        }
    }

    add_filter( 'admin_bar_menu', 'andola_dashboard_howdy_text', 10, 3);
//Replace Howdy admin  text
    function andola_dashboard_howdy_text( $wp_admin_bar ) {
        if ( get_option( 'andola_dashboard_howdy_text' ) != '' ) {
            $my_account = $wp_admin_bar->get_node('my-account');
            $newtext = str_replace( 'Howdy,', esc_html ( get_option( 'andola_dashboard_howdy_text' )).',', $my_account->title );
            $wp_admin_bar->add_node( array(
                'id' => 'my-account',
                'title' => $newtext,
            ) );
        }
    }


    add_action( 'wp_dashboard_setup', 'andola_remove_dashboard_quick_draft' );

// Remove Quick Draft widget from dashboard
    function andola_remove_dashboard_quick_draft() {
        if ( get_option( 'andola_remove_dashboard_quick_draft' ) != '' ) {
            remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        }
    }

    add_action( 'wp_dashboard_setup', 'andola_remove_dashboard_activity' );

// Remove Activity widget from dashboard
    function andola_remove_dashboard_activity() {
        if ( get_option( 'andola_remove_dashboard_activity' ) != '' ) {
            remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
        }
    }

    add_action( 'wp_dashboard_setup', 'andola_remove_dashboard_news' );

// Remove News widget from dashboard
    function andola_remove_dashboard_news() {
        if ( get_option( 'andola_remove_dashboard_news' ) != '' ) {
            remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
            remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
        }
    }

    add_action( 'login_head', 'andola_custom_css_field' );

// Adds custom CSS
    function andola_custom_css_field() {
        if ( get_option( 'andola_custom_css_field' ) != '' ) {
            echo '<style>'. strip_tags( get_option( 'andola_custom_css_field' ) ) . '</style>';
        }
    }

    add_action( 'wp_before_admin_bar_render', 'andola_login_top_color' );
// CSS for custom Top background color
    function andola_login_top_color() {
        if ( get_option( 'andola_login_top_color' ) != '' ) {
            echo '<style>#wpwrap #wpadminbar { background: ' . esc_html ( get_option( 'andola_login_top_color' ) ) . '!important; } </style>';
        }
    }

    add_action( 'wp_before_admin_bar_render', 'andola_login_side_color' );
// CSS for custom sidebar background color
    function andola_login_side_color() {
        if ( get_option( 'andola_login_side_color' ) != '' ) {
            echo '<style>#wpwrap #adminmenuwrap #adminmenu { background: ' . esc_html ( get_option( 'andola_login_side_color' ) ) . '!important;} #wpwrap #adminmenuwrap{ background: ' . esc_html ( get_option( 'andola_login_side_color' ) ) . '!important;} #wpwrap #adminmenuback{ background: ' . esc_html ( get_option( 'andola_login_side_color' ) ) . '!important;}
		 .andola_content_wrap #andola_image_button, .andola_content_wrap #andola_image_button_bck, .andola_content_wrap #andola_dash_image_button, .button-primary{ background: ' . esc_html ( get_option( 'andola_login_side_color' ) ) . '!important;} </style>';
        }
    }

    add_action( 'wp_before_admin_bar_render', 'andola_login_side_sub_menu_color' );

// CSS for custom submenu background color
    function andola_login_side_sub_menu_color() {
        if ( get_option( 'andola_login_side_sub_menu_color' ) != '' ) {
            echo '<style>#wpwrap #adminmenuwrap #adminmenu .wp-submenu.wp-submenu-wrap { background: ' . esc_html ( get_option( 'andola_login_side_sub_menu_color' ) ) . '!important; } </style>';
        }
    }

    add_action( 'wp_before_admin_bar_render', 'andola_custom_js_field' );

// Adds custom jS
    function andola_custom_js_field() {
        if ( get_option( 'andola_custom_js_field' ) != '' ) {
            echo '<script>  '.strip_tags( get_option( 'andola_custom_js_field' ) ).' </script>';

        }
    }

// Load the required files needed for the plugin to run in the proper order and add needed functions to the required hooks.
    function customize_admin_plugin_init()
    {
        load_plugin_textdomain( 'as-admin-customizer', false, 'customize-admin/languages' );
    }
    add_action( 'plugins_loaded', 'customize_admin_plugin_init' );


    require_once( 'admin-dashboard-option.php' );
?>