<?php
/**
* Plugin Name: SIP Calculator
* Description: This plugin allows you to Create SIP Calculator in wordpress.
* Version: 1.1
* Copyright: 2023
* License: GPLv3 or later
* Text Domain: sip-calculator
*/




include_once('backend/backend.php');
include_once('frontend/frontend.php');

add_action( 'wp_enqueue_scripts', 'SIP_calculator_loadScriptStyle' );

function SIP_calculator_loadScriptStyle() {
    // Get file modification times for versioning (cache busting)
    $sip_calc_js_version = filemtime( plugin_dir_path( __FILE__ ) . 'assets/js/sip_calc.js' );
    $sip_calc_front_js_version = filemtime( plugin_dir_path( __FILE__ ) . 'assets/js/sip_calc_front.js' );
    $chart_js_version = filemtime( plugin_dir_path( __FILE__ ) . 'assets/js/chart.js' );
    $popper_js_version = filemtime( plugin_dir_path( __FILE__ ) . 'assets/js/popper.min.js' );
    $rangeslider_js_version = filemtime( plugin_dir_path( __FILE__ ) . 'assets/js/rangeSlider.min.js' );
    $style_css_version = filemtime( plugin_dir_path( __FILE__ ) . 'assets/css/style.css' );
    $rangeslider_css_version = filemtime( plugin_dir_path( __FILE__ ) . 'assets/css/rangeslider.min.css' );

    // Enqueue scripts and styles with versioning (cache busting)
    wp_enqueue_style( 'style-css', plugins_url( 'assets/css/style.css', __FILE__ ), false, $style_css_version );
    wp_enqueue_style( 'rangeslider-css', plugins_url( 'assets/css/rangeslider.min.css', __FILE__ ), false, $rangeslider_css_version );
    
    wp_enqueue_script( 'sip_calc_js', plugins_url( 'assets/js/sip_calc.js', __FILE__ ), array('jquery'), $sip_calc_js_version, true );
    wp_enqueue_script( 'sip_calc_front_js', plugins_url( 'assets/js/sip_calc_front.js', __FILE__ ), array('jquery'), $sip_calc_front_js_version, true );
    wp_enqueue_script( 'chart-js', plugins_url( 'assets/js/chart.js', __FILE__ ), array('jquery'), $chart_js_version, true );
    wp_enqueue_script( 'popper-min-js', plugins_url( 'assets/js/popper.min.js', __FILE__ ), false, $popper_js_version, true );
    wp_enqueue_script( 'rangeslider-min-js', plugins_url( 'assets/js/rangeSlider.min.js', __FILE__ ), array('jquery'), $rangeslider_js_version, true );

    // Localized variables to be used in the JavaScript
    $sip_color_var = array( 
        'investd_amount_color' => get_option('sip_investamount_color','rgba(188, 220, 255, 0.8)'),
        'profit_amount_color' => get_option('sip_profitamount_color','rgba(21, 58, 91, 0.44)'),
        'result_with_chart' => get_option('sip_enable_chart','true'),
        'result_with_table' => get_option('sip_enable_table','true'),
        'calc_chart_type' => get_option('sip_chart_type','doughnut_chart'),
        'calc_chart_invested_amount_text' => get_option('chart_invested_amount_text','Invested Amount'),
        'calc_chart_profit_earned_text' => get_option('chart_profit_earned_text','Profit Earned'),
        'sip_min_invested_amount' => get_option('min_invested_amount','100'),
        'sip_max_invested_amount' => get_option('max_invested_amount','100000'),
        'sip_min_investment_period' => get_option('min_investment_period','1'),
        'sip_max_investment_period' => get_option('max_investment_period','30'),
        'sip_min_expected_annual' => get_option('min_expected_annual','1'),
        'sip_max_expected_annual' => get_option('max_expected_annual','30'),
    );

    wp_localize_script( 'sip_calc_front_js', 'sip_calc_style', $sip_color_var );
}

