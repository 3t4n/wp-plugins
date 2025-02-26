<?php
/**
 * Easy Export Single Post and Page
 *
 * Plugin Name: Easy Export Single Post and Page
 * Plugin URI:  
 * Description: Easily export individual posts or pages in various formats for seamless sharing and backup.
 * Version:     1.0.0
 * Author:      blogvii
 * Author URI:  
 * Text Domain: easy-export-single-post-page
 * Domain Path: 
 * License: GPLv2 or later
 * Requires at least: 5.9
 * Requires PHP: 7.2
 * Tested up to: 6.6.2
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}



// Add custom row actions for posts and pages, prefix unique is blogvii_ees
add_filter('post_row_actions', 'blogvii_ees_easy_add_single_export_row_actions', 10, 2);
add_filter('page_row_actions', 'blogvii_ees_easy_add_single_export_row_actions', 10, 2);

function blogvii_ees_easy_add_single_export_row_actions($actions, $post) {
    // Add nonce for security
    $nonce = wp_create_nonce('blogvii_ees_single_post_nonce');

    // Add export actions with proper formatting, prefix unique is blogvii_ees
    $actions['export'] = '<a href="' . admin_url('admin-ajax.php?action=blogvii_ees_single_export_post&post_id=' . $post->ID . '&file_type=txt&blogvii_ees_nonce=' . $nonce) . '">Export as TXT</a> | ';
    $actions['export'] .= '<a href="' . admin_url('admin-ajax.php?action=blogvii_ees_single_export_post&post_id=' . $post->ID . '&file_type=xml&blogvii_ees_nonce=' . $nonce) . '">Export as XML</a>';
    
    return $actions;
}

// Handle the export functionality
add_action('wp_ajax_blogvii_ees_single_export_post', 'blogvii_ees_single_export_post_ajax');

function blogvii_ees_single_export_post_ajax() {


    // Check if user is an admin
    if (!current_user_can('manage_options')) {
        wp_die('You do not have permission to perform this action.');
    }


    // Unsplash and sanitize the nonce input
    $nonce = isset($_GET['blogvii_ees_nonce']) ? sanitize_text_field(wp_unslash($_GET['blogvii_ees_nonce'])) : '';


    // Verify nonce
    if (empty($nonce) || !wp_verify_nonce($nonce, 'blogvii_ees_single_post_nonce')) {
        wp_die('Nonce verification failed');
    }

    


    if (!isset($_GET['post_id']) || !isset($_GET['file_type'])) {
        wp_die('Invalid request');
    }

    $post_id = intval($_GET['post_id']);
    $file_type = sanitize_text_field(wp_unslash($_GET['file_type']));
    $post = get_post($post_id); // Use get_post instead of direct query

    if (!$post) {
        wp_die('Post not found');
    }

    // Prepare export data
    $data = [
        'ID' => $post->ID,
        'Title' => $post->post_title,
        'Author' => get_the_author_meta('display_name', $post->post_author),
        'Status' => $post->post_status,
        'Date' => $post->post_date,
        'Content' => $post->post_content,
    ];

    // Only include categories and tags if post type is 'post'
    if ($post->post_type === 'post') {
        $categories = wp_get_post_categories($post_id);
        $category_names = wp_list_pluck(get_terms(['taxonomy' => 'category', 'include' => $categories]), 'name');
        $data['Categories'] = implode(', ', $category_names);

        $tags = wp_get_post_tags($post_id);
        $tag_names = wp_list_pluck($tags, 'name');
        $data['Tags'] = implode(', ', $tag_names);
    } else {
        $data['Categories'] = 'N/A';
        $data['Tags'] = 'N/A';
    }

    // Generate a random number for filename
    $random_number = wp_rand(1000, 9999);
    $filename = sanitize_title($post->post_title) . '_' . $post->ID . '_export_' . $random_number;

    // Set headers and output data based on file type
    switch ($file_type) {

        case 'txt':
            header('Content-Type: text/plain');
            header('Content-Disposition: attachment; filename="' . $filename . '.txt"');
        foreach ($data as $key => $value) {

            // Use wp_kses_post for 'Content', esc_html for others
            if ($key === 'Content') {
            echo esc_html($key) . ': ' . wp_kses_post($value) . "\n";
            } else {
            echo esc_html($key) . ': ' . esc_html($value) . "\n";    
            }
         }   
            exit;

          case 'xml':
           header('Content-Type: text/xml');
           header('Content-Disposition: attachment; filename="' . $filename . '.xml"');
           echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
           echo '<post>' . "\n";
           foreach ($data as $key => $value) {
                    // Escape all but 'Content'
                    // Use wp_kses_post for 'Content', esc_xml for others
                    if ($key === 'Content') {
                    echo '<' . esc_xml($key) . '>' . wp_kses_post($value) . '</' . esc_xml($key) . '>' . "\n";
                    } else {
                    echo '<' . esc_xml($key) . '>' . esc_xml($value) . '</' . esc_xml($key) . '>' . "\n";
                    }
                    
           }
           echo '</post>' . "\n"; // Closing tag with newline
           exit;


        default:
            wp_die('Invalid file type');
    }
}
