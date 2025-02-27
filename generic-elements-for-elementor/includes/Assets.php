<?php

namespace Generic\Elements;

class Assets
{

    public function run()
    {
        add_action('elementor/frontend/after_register_scripts', [$this, 'register_js']);
        add_action('elementor/frontend/after_register_styles', [$this, 'register_css']);
        add_action('elementor/editor/after_enqueue_scripts', [$this, 'editor_register_css']);
    }

    public function register_js()
    {
        //bootstrap front-end framework
        if( get_option('generic_bootstrap_option') == 'active' || get_option('generic_bootstrap_option') == '') {
            wp_register_script('bootstrap', GENERIC_ELEMENTS_ASSETS . '/lib/js/bootstrap.bundle.min.js', [], GENERIC_ELEMENTS_VERSION, true);
        }
        //magnific popup images
        if(get_option('generic_magnific_popup_option') == 'active' || get_option('generic_magnific_popup_option') == '') {
            wp_register_script('magnific-popup', GENERIC_ELEMENTS_ASSETS . '/lib/js/jquery.magnific-popup.min.js', [], GENERIC_ELEMENTS_VERSION, true);
        }
        //odometer counter
        if(get_option('generic_odometer_option') == 'active' || get_option('generic_bootstrap_option') == '') {
            wp_register_script('odometer-js', GENERIC_ELEMENTS_ASSETS . '/lib/js/jquery.odometer.min.js', [], GENERIC_ELEMENTS_VERSION, true);
        }
        //appear
        if(get_option('generic_appear_option') == 'active' || get_option('generic_appear_option') == '') {
            wp_register_script('appear-js', GENERIC_ELEMENTS_ASSETS . '/lib/js/jquery.appear.js', [], GENERIC_ELEMENTS_VERSION, true);
        }
        //waypoints animation
        if(get_option('generic_waypoints_option') == 'active' || get_option('generic_waypoints_option') == '') {
            wp_register_script('waypoints-js', GENERIC_ELEMENTS_ASSETS . '/lib/js/waypoints.min.js', [], GENERIC_ELEMENTS_VERSION, true);
        }
        //wow animation
        if(get_option('generic_wow_option') == 'active' || get_option('generic_wow_option') == '') {
            wp_register_script('wow-js', GENERIC_ELEMENTS_ASSETS . '/lib/js/wow.min.js', [], GENERIC_ELEMENTS_VERSION, true); 
        }
        //swipper for slider
        if(get_option('generic_swiper_option') == 'active' || get_option('generic_swiper_option') == '') {
            wp_register_script('swiper', GENERIC_ELEMENTS_ASSETS . '/lib/js/swiper-bundle.js', [], GENERIC_ELEMENTS_VERSION, true);
        }
        //meanmenu for mobile navigation
        if(get_option('generic_meanmenu_option') == 'active' || get_option('generic_meanmenu_option') == '') {
            wp_register_script('meanmenu', GENERIC_ELEMENTS_ASSETS . '/lib/js/jquery.meanmenu.min.js', [], GENERIC_ELEMENTS_VERSION, true);
        }
        //script of generic elements
        wp_register_script('generic-element-js', GENERIC_ELEMENTS_ASSETS . '/js/generic-elements.js', [], GENERIC_ELEMENTS_VERSION, true);
    }

    public function register_css()
    {
        //bootstrap front-end framework
        if(get_option('generic_bootstrap_option') == 'active' || get_option('generic_bootstrap_option') == '') {
            wp_register_style('bootstrap', GENERIC_ELEMENTS_ASSETS . '/lib/css/bootstrap.min.css', [], GENERIC_ELEMENTS_VERSION, false);
        }
        //Font Awesome Pro 5.14.0 icons
        if(get_option('generic_fontawesome_option') == 'active' || get_option('generic_fontawesome_option') == '') {
            wp_register_style('fontawesome', GENERIC_ELEMENTS_ASSETS . '/css/fontawesome.min.css', [], GENERIC_ELEMENTS_VERSION, false);
        }
        //magnific popup images
        if(get_option('generic_magnific_popup_option') == 'active' || get_option('generic_magnific_popup_option') == '') {
            wp_register_style('magnific-popup', GENERIC_ELEMENTS_ASSETS . '/lib/css/magnific-popup.css', [], GENERIC_ELEMENTS_VERSION, false);
        }
        //odometer counter
        if(get_option('generic_odometer_option') == 'active' || get_option('generic_odometer_option') == '') {
            wp_register_style('odometer-css', GENERIC_ELEMENTS_ASSETS . '/lib/css/odometer.css', [], GENERIC_ELEMENTS_VERSION, false);
        }
        //animate animation
        if(get_option('generic_animate_option') == 'active' || get_option('generic_animate_option') == '') {
            wp_register_style('animate-css', GENERIC_ELEMENTS_ASSETS . '/lib/css/animate.min.css', [], GENERIC_ELEMENTS_VERSION, false);
        }
        //waypoints animation
        wp_register_style('gen-flaticon', GENERIC_ELEMENTS_ASSETS . '/css/gen-flaticon.css', [], GENERIC_ELEMENTS_VERSION, false); 
        //swiper lib for slider
        if(get_option('generic_swiper_option') == 'active' || get_option('generic_swiper_option') == '') {
            wp_register_style('swiper', GENERIC_ELEMENTS_ASSETS . '/lib/css/swiper-bundle.css', [], GENERIC_ELEMENTS_VERSION, false);
        }
        //meanmenu for mobile navigation
        if(get_option('generic_meanmenu_option') == 'active' || get_option('generic_meanmenu_option') == '') {
            wp_register_style('meanmenu', GENERIC_ELEMENTS_ASSETS . '/lib/css/meanmenu.css', [], GENERIC_ELEMENTS_VERSION, false);
        }
        //style of generic elements
        wp_register_style('generic-element-css', GENERIC_ELEMENTS_ASSETS . '/css/generic-elements.css', [], GENERIC_ELEMENTS_VERSION, false);
    }


    public function editor_register_css()
    {
        wp_enqueue_style('gen-editor', GENERIC_ELEMENTS_ASSETS . '/css/gen-editor.css', [], GENERIC_ELEMENTS_VERSION, false);
    }
}
