<?php
/*
Plugin Name: Advanced Logo Showcase for wp
Plugin URI: http://ithemelandco.com/Plugins/itls_logo_showcase/
Description: This Plugin Ideal For Show Logos, Partners, Sponsers And Clients.
Version: 1.0
Author: iThemelandco
Author URI: http://ithemelandco.com/
Text Domain: itls_logo_showcase_textdomain
Domain Path: /languages/
*/
if ( ! defined( 'ABSPATH' ) ) exit;
if(!class_exists('itls_logo_showcase_class')) {

    define('ITLS_Custom_Post', 'itls_cp_logo');
    define('ITLS_Custom_Post_Taxonomy', 'itls_logo_category');

    define('ITLS_LOGO_SHOWCASE_ROOT_DIR', dirname(__FILE__)); //use for include

    //USE IN ENQUEUE AND IMAGE
    define('ITLS_LOGO_SHOWCASE_CSS_URL', plugins_url('assets/css/', __FILE__));
    define('ITLS_LOGO_SHOWCASE_JS_URL', plugins_url('assets/js/', __FILE__));
    define('ITLS_LOGO_SHOWCASE_JS_PLUGIN_URL', plugins_url('assets/plugins/', __FILE__));
    define ('ITLS_LOGO_SHOWCASE_URL', plugins_url('', __FILE__));

    //PERFIX
    define ('ITLS_LOGO_SHOWCASE_FIELDS_PERFIX', 'itls_logo_field_');

    //TEXT DOMAIN FOR MULTI LANGUAGE
    define ('ITLS_LOGO_SHOWCASE_TEXTDOMAIN', 'itls_logo_showcase_textdomain');

    // add custom post
    include('class/custompost.php');

    // add custom field for metabox
    include('class/customefields.php');

    // declare plugin class

    class itls_logo_showcase_class
    {

        function __construct()
        {
            // ajax action
            include('includes/actions.php');

            // shortcode Gen Page
            add_action('admin_menu', array($this, 'itls_logo_showcase_shortcode_page_add'));

            // Enquqe Script and css files
            add_action('admin_enqueue_scripts', array($this, 'itls_logo_showcase_backend_enqueue'));
            add_action('wp_head', array($this, 'itls_logo_showcase_frontend_enqueue'));

            //add_action('wp_head', array($this, 'itls_frontend_enqueue'));

            // Shortcode Builder
            add_shortcode('itls_logo_showcase', array($this, 'itls_logo_showcase_shortcode'));

        }


        function itls_logo_showcase_shortcode_page_add()
        {
            $menu_slug = 'edit.php?post_type=' . ITLS_Custom_Post;
            $submenu_page_title = 'Shortcode Generator';
            $submenu_title = 'Shortcode Generator';
            $capability = 'manage_options';
            $submenu_slug = 'logo_showcase_shortcode';
            $submenu_function = array($this, 'logo_showcase_shortcode_page');
            add_submenu_page($menu_slug, $submenu_page_title, $submenu_title, $capability, $submenu_slug, $submenu_function);
        }

        function logo_showcase_shortcode_page()
        {
            include('backend/admin-page.php');
        }

        function itls_logo_showcase_backend_enqueue()
        {
            include("includes/admin-embed.php");
        }

        function itls_logo_showcase_frontend_enqueue()
        {
            include("includes/frontend-embed.php");
        }

        function itls_logo_showcase_shortcode($atts, $content = null)
        {
            return itls_preview_shortcode($atts, $content = null);
        }

    }//end class

    // show preview shortcode
    if(!function_exists('itls_preview_shortcode')) {
        function itls_preview_shortcode($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'category' => 'all',
                'count' => -1,
                'orderby' => 'menu_order',
                'order' => 'DESC',
                'layout' => 'grid',
                'col_desktop' => 4,
                'col_tablet' => 3,
                'col_mobile' => 2,
                // style
                'margin_top' => 0,
                'margin_right' => 0,
                'margin_bottom' => 0,
                'margin_left' => 0,
                'padding_top' => 0,
                'padding_right' => 0,
                'padding_bottom' => 0,
                'padding_left' => 0,
                'background_color' => 'transparent',
                // shadow setting
                'shadow' => 'none',
                'shadow_v' => 0,
                'shadow_h' => 0,
                'shadow_blur' => 0,
                'shadow_spread' => 0,
                'shadow_color' => '',
                // border setting
                'border_style' => 'none',
                'border_width_top' => 0,
                'border_width_right' => 0,
                'border_width_bottom' => 0,
                'border_width_left' => 0,
                'border_radius_top_right' => 0,
                'border_radius_top_left' => 0,
                'border_radius_bottom_right' => 0,
                'border_radius_bottom_left' => 0,
                'border_color' => '#eee',
                
                //
                'custom_class' => '',
                // hover effect
                'effect' => 'none',
                // quick view setting
                'tooltip' => 'false',
                'quick_view_type' => 'none',
                
                
            ), $atts));
            $style = array(
                // padding & margin
                'padding-top' => $padding_top,
                'padding-right' => $padding_right,
                'padding-bottom' => $padding_bottom,
                'padding-left' => $padding_left,
                'margin-top' => $margin_top,
                'margin-right' => $margin_right,
                'margin-bottom' => $margin_bottom,
                'margin-left' => $margin_left,
                'background-color' => $background_color,
                //shadow
                'shadow' => $shadow,
                'shadow-v' => $shadow_v,
                'shadow-h' => $shadow_h,
                'shadow-blur' => $shadow_blur,
                'shadow-spread' => $shadow_spread,
                'shadow-color' => $shadow_color,
                //border
                'border-width-top' => $border_width_top,
                'border-width-right' => $border_width_right,
                'border-width-bottom' => $border_width_bottom,
                'border-width-left' => $border_width_left,
                'border-style' => $border_style,
                'border-radius-top-right' => $border_radius_top_right,
                'border-radius-top-left' => $border_radius_top_left,
                'border-radius-bottom-right' => $border_radius_bottom_right,
                'border-radius-bottom-left' => $border_radius_bottom_left,
                'border-color' => $border_color,
            );
            $rand_id = rand(1000, 9999);
            include("includes/custom_style.php");
            include("includes/shortcode_view.php");
            add_action('admin_print_scripts', 'ajax_scripts');
            if(!function_exists('ajax_scripts')) {
                function ajax_scripts()
                {
                    global $script_outputs;
                    echo $script_outputs;
                }
            }
            itls_logo_showcase_custom_css($style, $rand_id);
			return $html . $script_outputs;
            
        }
    }

    //
    new itls_logo_showcase_class;
}
?>
