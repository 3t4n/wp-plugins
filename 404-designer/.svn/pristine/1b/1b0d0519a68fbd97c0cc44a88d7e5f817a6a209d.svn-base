<?php

if (!defined('ABSPATH')) exit;

class c404Designer {
    function __construct() {
        add_action('wp_ajax_c404_search_pages', [$this, 'ajax_search_pages']);
        add_action('wp_ajax_nopriv_c404_search_pages', [$this, 'ajax_search_pages']);

        add_action('admin_menu', [$this, 'add_settings_page']);
        add_action('admin_init', [$this, 'register_settings']);

        add_action('template_redirect', [$this, 'custom_404_page']);

        add_action('admin_enqueue_scripts', [$this, 'register_script']);

    }

    function register_script($hook_suffix) {
        if ($hook_suffix == 'settings_page_404-designer') {
            wp_enqueue_script(
                'c404Designer-admin-js',
                c404Designer_URL . 'admin/admin.js',
                array('jquery'),
                c404Designer_VERSION,
            );

            $json = wp_json_encode(array(
                'ajax_url' => admin_url('admin-ajax.php'),
                'nonce'    => wp_create_nonce('c404_search_nonce')
            ));
            wp_add_inline_script( 'c404Designer-admin-js', "let c404_ajax_obj = $json;" );
        }
    }

    function add_settings_page() {
        add_options_page(
            '404 Designer',
            '404 Designer',
            'manage_options',
            '404-designer',
            [$this, 'settings_page_callback']
        );
    }

    function register_settings() {
        register_setting('c404Designer_settings_group', 'c404Designer_selected_404_page', ['sanitize_callback' => 'sanitize_text_field']);
    }

    function settings_page_callback() {
        require_once c404Designer_PATH . '/admin/settings-page.php';
    }

    function custom_404_page() {
        if (is_404()) {
            $selected_page = get_option('c404Designer_selected_404_page');
            if ($selected_page) {
                $post = get_post($selected_page);
                if ($post) {
                    global $wp_query;
                    $wp_query->post = $post;
                    $wp_query->posts = array($post);
                    $wp_query->post_count = 1;
                    $wp_query->is_page = true;
                    $wp_query->is_404 = false;
                    $wp_query->is_single = false;
                    $wp_query->is_singular = true;
                    $wp_query->is_home = false;
                    $wp_query->is_archive = false;
                    $wp_query->is_category = false;
    
                    setup_postdata($post);
                    include(get_page_template()); // Use the selected page's template
                    exit;
                }
            }
        }
    }

    function ajax_search_pages() {
        if (empty(sanitize_text_field(wp_unslash($_GET['_ajax_nonce']))) || 
        !wp_verify_nonce(sanitize_text_field(wp_unslash($_GET['_ajax_nonce'])), 'c404_search_nonce')) {
            wp_send_json_error(array('message' => 'Invalid nonce'));
            wp_die();
        }

        // Check for the search query
        if ( !empty(sanitize_text_field(wp_unslash($_GET['q']))) ) {
            $search_query = sanitize_text_field(wp_unslash($_GET['q']));
            
            // Query for pages or custom post types based on the search term
            $args = array(
                's' => $search_query,
                'post_type' => get_post_types(array('public' => true)),
                'post_status' => 'publish',
                'posts_per_page' => 10,
            );
            
            $pages = get_posts($args);

            if ($pages) {
                $results = array();
                foreach ($pages as $page) {
                    $results[] = array(
                        'id' => $page->ID,
                        'text' => esc_html($page->post_title),
                    );
                }
                // Return JSON response
                wp_send_json_success($results);
            } else {
                wp_send_json_error(array('message' => 'No results found'));
            }
        }
        wp_die();
    }
}
new c404Designer();