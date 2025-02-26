<?php

// Ensure this file is not accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Include the necessary WordPress file to use is_plugin_active()
if (!function_exists('is_plugin_active')) {
    require_once(ABSPATH . 'wp-admin/includes/plugin.php');
}

function altm_is_yoast_active() {
    // Consider removing or conditionally using altm_log in production
    //altm_log('is_yoast_active: '. is_plugin_active('wordpress-seo/wp-seo.php'));
    //altm_log('is_yoast_premium_active: '. is_plugin_active('wordpress-seo-premium/wp-seo-premium.php'));
    return is_plugin_active('wordpress-seo/wp-seo.php') || is_plugin_active('wordpress-seo-premium/wp-seo-premium.php');
}

function altm_get_yoast_seo_keywords($media_id) {
    // Exit if Yoast SEO is not active
    if (!altm_is_yoast_active()) {
        return array();
    }
    
    global $wpdb;
    $content_id = NULL;

    $fetch_post_sql = "SELECT post_parent FROM {$wpdb->posts} WHERE ID = %d";
    $post_results = $wpdb->get_results($wpdb->prepare($fetch_post_sql, $media_id));

    if ( count( $post_results ) > 0 ) {
        $content_id = $post_results[0]->post_parent;
    }
    
    if(!$content_id){
        // Find the content ID using the media_id
        $link_query = "SELECT post_id FROM {$wpdb->prefix}yoast_seo_links WHERE target_post_id = %d";
        $link_results = $wpdb->get_results($wpdb->prepare($link_query, $media_id)); 

        if (count($link_results) > 0) {
            $content_id = $link_results[0]->post_id;
        }
    }
   
    // Exit if no content ID is found
    if (!$content_id) {
        // Consider removing or conditionally using altm_log in production
        //altm_log('No content ID found for media ID: ' . $media_id);
        return array();
    }

    // Consider removing or conditionally using altm_log in production
    //altm_log('Content ID found: ' . $content_id);
    // Fetch main keyword
    $main_keyword_query = "SELECT meta_value AS main_keyword FROM {$wpdb->postmeta} WHERE meta_key = '_yoast_wpseo_focuskw' AND post_id = %d";
    $main_keyword_result = $wpdb->get_results($wpdb->prepare($main_keyword_query, $content_id));
    //altm_log('Main keyword result: ' . print_r($main_keyword_result, true));

    if (count($main_keyword_result) == 0 || strlen($main_keyword_result[0]->main_keyword) == 0) {
        return array();
    }

    $all_keywords = explode(',', $main_keyword_result[0]->main_keyword);

    // Fetch related keywords
    $related_keywords_query = "SELECT meta_value AS related_keywords FROM {$wpdb->postmeta} WHERE meta_key = '_yoast_wpseo_focuskeywords' AND post_id = %d";
    $related_keywords_result = $wpdb->get_results($wpdb->prepare($related_keywords_query, $content_id));

    //altm_log('Related keywords result: ' . print_r($related_keywords_result, true));

    if (count($related_keywords_result) > 0) {
        $parsed_related_keywords = json_decode($related_keywords_result[0]->related_keywords);
        foreach ($parsed_related_keywords as $keyword_object) {
            $all_keywords[] = $keyword_object->keyword;
        }
    }

    //altm_log('All keywords: ' . print_r($all_keywords, true));
    $comma_separated_keywords = implode(', ', array_filter(array_map('trim', $all_keywords)));
    //altm_log('Comma separated keywords: ' . $comma_separated_keywords);
    return $comma_separated_keywords;
}