<?php

if (!defined('ABSPATH')) {
    exit; // Prevent direct access
}

class Ajax_SearchWP {
    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'ajax_searchwp_enqueue_scripts'));
        add_action('wp_ajax_ajax_searchwp_handle_search', array($this, 'ajax_searchwp_handle_search'));
        add_action('wp_ajax_nopriv_ajax_searchwp_handle_search', array($this, 'ajax_searchwp_handle_search'));
        add_shortcode('super_ajax_search', array($this, 'ajax_searchwp_search_form_shortcode'));
    }

    public function ajax_searchwp_enqueue_scripts() {
        if (!is_admin()) {
            wp_enqueue_style(
                'ajax_searchwp_css',
                SUPER_AJAX_SEARCH_URL . 'assets/css/style.css',
                array(),
                '1.2.0'
            );
            wp_enqueue_script(
                'ajax_searchwp_js',
                SUPER_AJAX_SEARCH_URL . 'assets/js/script.js',
                array('jquery'),
                '1.2.0',
                true
            );
            wp_localize_script('ajax_searchwp_js', 'ajax_searchwp_object', array(
                'ajax_url' => esc_url(admin_url('admin-ajax.php')),
                'no_results_text' => esc_html(get_option('ajax_searchwp_no_results_text', __('No results found', 'super-ajax-search'))),
                'ajax_nonce' => wp_create_nonce('ajax_searchwp_nonce'),
            ));
        }
    }

    public function ajax_searchwp_handle_search() {
        // Verify nonce
        if (
            !isset($_POST['nonce']) ||
            !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'ajax_searchwp_nonce')
        ) {
            wp_send_json_error(array('message' => __('Nonce verification failed', 'super-ajax-search')), 403);
            wp_die();
        }

        // Sanitize and validate inputs
        $query = isset($_POST['query']) ? sanitize_text_field(wp_unslash($_POST['query'])) : '';
        $post_types = get_option('ajax_searchwp_post_types', array('post'));
        $limit = absint(get_option('ajax_searchwp_limit', 5));

        $args = array(
            's' => $query,
            'post_type' => array_map('sanitize_key', $post_types),
            'posts_per_page' => $limit,
        );

        $search_query = new WP_Query($args);
        $results = array();

        if ($search_query->have_posts()) {
            while ($search_query->have_posts()) {
                $search_query->the_post();
                $results[] = array(
                    'title' => get_the_title(),
                    'url' => get_permalink(),
                );
            }
        }

        // Reset post data to avoid conflicts
        wp_reset_postdata();

        // Send JSON response
        wp_send_json_success($results);
        wp_die();
    }

    public function ajax_searchwp_search_form_shortcode() {
        ob_start();
        $search_placeholder = get_option('ajax_searchwp_search_placeholder', __('Search here...', 'super-ajax-search'));
        ?>
        <div class="searchwp-form">
            <form id="searchwpform">
                <input
                    type="text"
                    id="s"
                    name="s"
                    placeholder="<?php echo esc_attr($search_placeholder); ?>"
                    autocomplete="off"
                />
                <input
                    type="hidden"
                    name="ajax_searchwp_nonce"
                    value="<?php echo esc_attr(wp_create_nonce('ajax_searchwp_nonce')); ?>"
                />
                <button type="submit" id="searchsubmit">
                    <?php esc_html_e('Search', 'super-ajax-search'); ?>
                </button>
            </form>
        </div>
        <div id="ajax_searchwp_results"></div>
        <?php
        return ob_get_clean();
    }
}
?>
