<?php
/**
* Plugin Name: EMI Calculator
* Description: This plugin allows you to Create EMI Calculator.
* Version: 1.1
* Copyright: 2023
* Text Domain: emi-calculator
* License: GPLv3 or later
*/

// Include function files
include_once('backend/backend.php');
include_once('frontend/frontend.php');

add_action( 'wp_enqueue_scripts', 'EMI_calculator_loadScriptStyle' );

function EMI_calculator_loadScriptStyle() {
    // Get file modification times for versioning (cache busting)
    $emi_calc_js_version = filemtime( plugin_dir_path( __FILE__ ) . 'frontend/assets/js/emi_calc.js' );
    $rangeslider_js_version = filemtime( plugin_dir_path( __FILE__ ) . 'frontend/assets/js/rangeSlider.min.js' );
    $chart_js_version = filemtime( plugin_dir_path( __FILE__ ) . 'frontend/assets/js/chart.js' );
    $emi_calc_css_version = filemtime( plugin_dir_path( __FILE__ ) . 'frontend/assets/css/emi_calc.css' );
    $rangeslider_css_version = filemtime( plugin_dir_path( __FILE__ ) . 'frontend/assets/css/rangeslider.min.css' );

    // Enqueue scripts and styles with versioning
    wp_enqueue_script( 'jquery-emi-calculator', plugins_url( 'frontend/assets/js/emi_calc.js', __FILE__ ), array('jquery'), $emi_calc_js_version, true );
    wp_enqueue_style( 'emi_calc_css', plugins_url( 'frontend/assets/css/emi_calc.css', __FILE__ ), false, $emi_calc_css_version );
    wp_enqueue_script( 'rangeslider-min-js', plugins_url( 'frontend/assets/js/rangeSlider.min.js', __FILE__ ), array('jquery'), $rangeslider_js_version, true );
    wp_enqueue_style( 'rangeslider-css', plugins_url( 'frontend/assets/css/rangeslider.min.css', __FILE__ ), false, $rangeslider_css_version );
    wp_enqueue_script( 'jquery-calculator-chart', plugins_url( 'frontend/assets/js/chart.js', __FILE__ ), array('jquery'), $chart_js_version, true );

    // Localized variables to be used in the JavaScript
    $emi_color_var = array(
        'emi_principal_chart_color' => get_option('emi_principal_amount_color','#98a4ff'),
        'emi_intereset_chart_color' => get_option('emi_intereset_amount_color','#5367ff'),
        'emi_calc_chart_type' => get_option('emi_chart_type','doughnut_chart'),
        'emi_calc_with_chart' => get_option('emi_enable_chart','true'),
        'emi_principal_chart_text' => get_option('principal_amou_text','Principal Amount'),
        'emi_interest_chart_text' => get_option('interest_amou_text','Interest Amount'),
        'emi_min_loan_amount' => get_option('min_loan_amount','1'),
        'emi_max_loan_amount' => get_option('max_loan_amount','100000000'),
        'emi_min_interest_rate' => get_option('min_interest_rate','1'),
        'emi_max_interest_rate' => get_option('max_interest_rate','30'),
        'yearly_min_loan_term' => get_option('min_year_loan_term','1'),
        'yearly_max_loan_term' => get_option('max_year_loan_term','30'),
        'monthly_min_loan_term' => get_option('min_month_loan_term','1'),
        'monthly_max_loan_term' => get_option('max_month_loan_term','300'),
    );

    wp_localize_script( 'jquery-emi-calculator', 'emi_calc_style', $emi_color_var );
}
