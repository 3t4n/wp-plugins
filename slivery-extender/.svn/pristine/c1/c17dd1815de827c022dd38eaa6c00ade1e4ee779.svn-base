<?php
if (!defined('ABSPATH'))
  exit;

function slider_theme_section($atts){
    ob_start();

    $valid_sections = array(
        'goldy_mex_featuredimage_slider',
        'goldy_mex_featured_section',
        'goldy_mex_our_portfolio_section',
        'goldy_mex_about_section',
        'goldy_mex_appointment_section',
        'goldy_mex_our_team_section',
        'goldy_mex_our_testimonial_section',
        'goldy_mex_cafe_pricing_plan_section',
        'goldy_mex_our_sponsors_section',
        'goldy_mex_services_section'
    );

    if(isset($atts['section']) && in_array($atts['section'], $valid_sections)){
        if (function_exists($atts['section'])){
            call_user_func($atts['section']);
        }
    }

    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}

add_shortcode('themesection','slider_theme_section');

