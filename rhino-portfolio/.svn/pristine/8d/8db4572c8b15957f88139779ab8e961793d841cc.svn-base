<?php
/*
* Plugin Name: WP Page Builder Portfolio Addon
* Plugin URI: http://www.fahimm.com/plugins/rhino-portfolio
* Author: Fahim Murshed
* Author URI: http://www.fahimm.com/
* License: GNU/GPL V2 or Later
* Description: Simple Portfolio for WP Page Builder
* Version: 1.0.8
*/
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }

// Add CSS for Rhino Portfolio
    add_action( 'wp_enqueue_scripts', 'rhino_core_style' );
    if(!function_exists('rhino_core_style')):
        function rhino_core_style(){
        // CSS
            wp_enqueue_style('rhino-portfolio-css',plugins_url('assets/css/rhino-portfolio.css',__FILE__));
            wp_enqueue_style('rhino-bootstrap',plugins_url('assets/css/bootstrap.min.css',__FILE__));

        // JS
            wp_enqueue_script('rhino-admin',plugins_url('assets/js/admin.js',__FILE__), array('jquery'));
            wp_enqueue_script('rhino-custom',plugins_url('assets/js/custom.js',__FILE__), array('jquery'));
            wp_enqueue_script('rhino-portfolio-jquery',plugins_url('assets/js/jquery.isotope.min.js',__FILE__), array('jquery'));
            wp_enqueue_script('rhino-portfolio-jquery-popup',plugins_url('assets/js/jquery.magnific-popup.min.js',__FILE__), array('jquery'));
        }
    endif;

// Define Dir URL
    define('RHINO_DIR_URL', plugin_dir_url(__FILE__));

// portfoio register
    require_once('post-type/portfolio.php');

// Addon List Item
    require 'wppb-addon/rhino-portfolio.php';

// Post Category List.
    if ( ! function_exists( 'rhino_cat_list' ) ) {
        # List of Group
        function rhino_cat_list( $category ){
            global $wpdb;
            $sql = "SELECT * FROM `".$wpdb->prefix."term_taxonomy` INNER JOIN `".$wpdb->prefix."terms` ON `".$wpdb->prefix."term_taxonomy`.`term_taxonomy_id`=`".$wpdb->prefix."terms`.`term_id` AND `".$wpdb->prefix."term_taxonomy`.`taxonomy`='".$category."'";
            $results = $wpdb->get_results( $sql );

            $cat_list = array();
            $cat_list['All'] = 'All';  
            if(is_array($results)){
                foreach ($results as $value) {
                    $cat_list[$value->name] = $value->slug;
                }
            }
            return $cat_list;
        }
    }

// WPPB Hook
    add_filter( 'wppb_available_addons', 'prefix_custom_addon_include' );
    if ( ! function_exists('prefix_custom_addon_include')){
        function prefix_custom_addon_include($addons){
            $addons[] = 'rhino_portfolio';
            // Add Other Custom Addon class name in here, at a time.
            return $addons;
        }
    }

/**
 * Rhino Single Template
 *
 * @return string
 */
    function rhino_core_portfolio_template($single_template) {
        global $post;
        if ($post->post_type == 'portfolio') {
            $single_template = dirname( __FILE__ ) . '/templates/single-portfolio.php';
        }
        return $single_template;
    }
    add_filter( "single_template", "rhino_core_portfolio_template" );