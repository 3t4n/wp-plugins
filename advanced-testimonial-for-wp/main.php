<?php
/*
Plugin Name: iThemeland Testimonial For WP
Plugin URI: http://ithemeland.com/Plugins/Testimonial/
Description: Create your Testimonials Fast And Easy For WP
Version: 1.0
Author: iThemelandCo
Author URI: http://iThemelandco.com/Plugins
Text Domain: itt_testimonial_textdomain
Domain Path: /languages/
*/
if ( ! defined( 'ABSPATH' ) ) exit;
if(!class_exists('itt_testimonial_class')) {

    define('ITT_Testimonial_Post', 'itt_testimonial_cp');
    define('ITT_Testimonial_Post_Taxonomy', 'itt_testimonial_category');

    define('ITT_TESTIMONIAL_ROOT_DIR', dirname(__FILE__)); //use for include

    //USE IN ENQUEUE AND IMAGE
    define('ITT_TESTIMONIAL_CSS_URL', plugins_url('assets/css/', __FILE__));
    define('ITT_TESTIMONIAL_JS_URL', plugins_url('assets/js/', __FILE__));
    define('ITT_TESTIMONIAL_JS_PLUGIN_URL', plugins_url('assets/plugins/', __FILE__));
    define ('ITT_TESTIMONIAL_URL', plugins_url('', __FILE__));

    //PERFIX
    define ('ITT_TESTIMONIAL_FIELDS_PERFIX', 'itt_testimonial_field_');

    //TEXT DOMAIN FOR MULTI LANGUAGE
    define ('ITT_TESTIMONIAL_TEXTDOMAIN', 'itt_testimonial_textdomain');

    // add localize script & style functions file
    //include('includes/localize_inline_func.php');

    // add custom post
    include('class/custompost.php');

    // add custom field for metabox
    include('class/customefields.php');

    // declare plugin class

    class itt_testimonial_class
    {

        function __construct()
        {
            // ajax action
            include('includes/actions.php');

            // shortcode Gen Page
            add_action('admin_menu', array($this, 'itt_testimonial_shortcode_page_add'));

            // Enquqe Script and css files
            add_action('admin_enqueue_scripts', array($this, 'itt_testimonial_backend_enqueue'));
            add_action('wp_head', array($this, 'itt_testimonial_frontend_enqueue'));

            //add_action('wp_head', array($this, 'itt_frontend_enqueue'));

            // Shortcode Builder
            add_shortcode('itt_testimonial', array($this, 'itt_testimonial_shortcode'));

            include('class/SettingPage.php');
        }


        function itt_testimonial_shortcode_page_add()
        {
            $menu_slug = 'edit.php?post_type=' . ITT_Testimonial_Post;
            $submenu_page_title = 'Shortcode Generator';
            $submenu_title = 'Shortcode Generator';
            $capability = 'manage_options';
            $submenu_slug = 'testimonial_shortcode';
            $submenu_function = array($this, 'testimonial_shortcode_page');
            $p = add_submenu_page($menu_slug, $submenu_page_title, $submenu_title, $capability, $submenu_slug, $submenu_function);
            //add_action($p ,  array($this,'itt_testimonial_enqueue_admin_js'));
        }
        function itt_testimonial_enqueue_admin_js()
        {
            wp_deregister_script(ITT_TESTIMONIAL_FIELDS_PERFIX . 'isotope');
            wp_register_script(ITT_TESTIMONIAL_FIELDS_PERFIX . 'isotope', ITT_TESTIMONIAL_JS_PLUGIN_URL . 'isotope/isotope.pkgd.min.js');
            wp_enqueue_script(ITT_TESTIMONIAL_FIELDS_PERFIX . 'isotope');
        }
        function testimonial_shortcode_page()
        {
            include('backend/admin-page.php');
        }

        function itt_testimonial_backend_enqueue()
        {
            include("includes/admin-embed.php");
        }

        function itt_testimonial_frontend_enqueue()
        {
            include("includes/frontend-embed.php");
        }

        function itt_testimonial_shortcode($atts, $content = null)
        {
            return itt_testimonial_preview_shortcode($atts, $content = null);
        }


       

    }//end class
    // show preview shortcode
    if(!function_exists('itt_testimonial_preview_shortcode')) {
        function itt_testimonial_preview_shortcode($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'category' => 'all',
                'count' => -1,
                'orderby' => 'menu_order',
                'order' => 'DESC',
                'layout' => 'grid',
                'style' => 'style1',
                'col_desktop' => 3,
                'col_tablet' => 3,
                'col_mobile' => 2,
                
                //
				'name'=>'true',
				'position'=>'true',
				'description'=>'true',
				'rate'=>'true',
                // balloon style
                'balloon_color_1' => '#eee',
                'balloon_padding' => 10,
                'balloon_border_style' => 'none',
                'balloon_border_width' => 0,
                'balloon_border_color' => 'transparent',
                'balloon_border_radius' => 0,
                // text box setting
                'text_box_color_1' => 'transparent',                
				'text_box_border_style' => 'none',
                'text_box_border_width' => 0,
                'text_box_border_color' => 'transparent',
                'text_box_border_radius' => 0,
                'text_box_padding' => 0,
                // image setting
                'image' => true,
                'image_size' => 'md',
                'image_radius' => 'lg',
                'star_size' => 'sm',
                'effect' => 'none',
                
                'image_box_color_1' => 'transparent',
				'image_box_border_style' => 'none',
                'image_box_border_width' => 0,
                'image_box_border_color' => 'transparent',
                'image_box_border_radius' => 0,
                'image_box_padding' => 10,
                //
                'custom_class' => '',
                'gutter' => 0,
				'item_effect' => 'it-no-animation',
            ), $atts));
            if(isset($atts['text_box_color_mode'])&& isset($atts['image_box_color_mode'])) {
                switch ( $atts[ 'text_box_color_mode' ] ) {
                    case 'single_color' :
                        $text_box_color_2 = '';
                        break;
                    case 'image' :
                        $text_box_color_1 = '';
                        $text_box_color_2 = '';
                        break;
                }
                switch ( $atts[ 'image_box_color_mode' ] ) {
                    case 'single_color' :
                        $image_box_color_2 = '';
                        break;
                    case 'image' :
                        $image_box_color_1 = '';
                        $image_box_color_2 = '';
                        break;
                }
            }
            $layoutStyle = $style;
           
            $style = array(
                'balloon_color_1' => $balloon_color_1,
                'balloon_border_style' => $balloon_border_style,
                'balloon_border_width' => $balloon_border_width,
                'balloon_border_color' => $balloon_border_color,
                'balloon_border_radius' => $balloon_border_radius,
                'balloon_padding' => $balloon_padding,
                
                'image_box_color_1' => $image_box_color_1,
                'image_box_border_style' => $image_box_border_style,
                'image_box_border_width' => $image_box_border_width,
                'image_box_border_color' => $image_box_border_color,
                'image_box_border_radius' => $image_box_border_radius,
                'image_box_padding' => $image_box_padding,
                
                'text_box_color_1' => $text_box_color_1,
                'text_box_border_style' => $text_box_border_style,
                'text_box_border_width' => $text_box_border_width,
                'text_box_border_color' => $text_box_border_color,
                'text_box_border_radius' => $text_box_border_radius,
                'text_box_padding' => $text_box_padding,
                'effect' => $effect,
                'gutter' => $gutter,
                'style' => $layoutStyle
            );
            $rand_id = rand(1000, 9999);
            include("includes/custom_style.php");
            itt_testimonial_custom_css($style, $rand_id);
            include("includes/shortcode_view.php");
            add_action('admin_print_scripts', 'ajax_scripts');
            if(!function_exists('ajax_scripts')) {
                function ajax_scripts()
                {
                    global $script_outputs;
                    echo $script_outputs;
                }
            }
            return $html . $script_outputs;
        }
    }

    // widget class
	//Available On Pro Version
	
	
    //
    new itt_testimonial_class;
}
?>
