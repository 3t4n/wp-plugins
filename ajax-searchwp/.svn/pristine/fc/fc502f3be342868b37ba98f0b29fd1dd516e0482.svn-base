<?php

if (!defined('ABSPATH')) {
    exit; // Prevent direct access
}

class Ajax_SearchWP {
    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'ajax_searchwp_enqueue_scripts'));
        add_action('wp_ajax_ajax_searchwp_handle_search', array($this, 'ajax_searchwp_handle_search'));
        add_action('wp_ajax_nopriv_ajax_searchwp_handle_search', array($this, 'ajax_searchwp_handle_search'));
        add_shortcode('ajax_searchwp', array($this, 'ajax_searchwp_search_form_shortcode'));
    }

    public function ajax_searchwp_enqueue_scripts() {
        if (!is_admin()) {
            wp_enqueue_style('ajax_searchwp_css', AJAX_SEARCHWP_URL . 'assets/css/ajax-searchwp.css', array(), '1.2.0');
            wp_enqueue_script('ajax_searchwp_js', AJAX_SEARCHWP_URL . 'assets/js/ajax-searchwp.js', array('jquery'), '1.2.0', true);
            wp_localize_script('ajax_searchwp_js', 'ajax_searchwp_object', array(
                'ajax_url' => admin_url('admin-ajax.php'),
                'no_results_text' => esc_js(get_option('ajax_searchwp_no_results_text', __('No results found', 'ajax-searchwp'))),
                'ajax_nonce' => wp_create_nonce('ajax_searchwp_nonce')
            ));
        }
    }

    public function ajax_searchwp_handle_search() {
        if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'ajax_searchwp_nonce')) {
            wp_send_json_error(array('message' => __('Nonce verification failed', 'ajax-searchwp')), 403);
            wp_die();
        }

        $query = isset($_POST['query']) ? sanitize_text_field(wp_unslash($_POST['query'])) : '';
        $post_types = get_option('ajax_searchwp_post_types', array('post'));
        $limit = absint(get_option('ajax_searchwp_limit', 5));

        if (!is_array($post_types)) {
            $post_types = array('post');
        }

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
                    'title' => esc_html(get_the_title()),
                    'url' => esc_url(get_permalink()),
                );
            }
        }

        wp_send_json_success($results);
        wp_die();
    }

    public function ajax_searchwp_search_form_shortcode() {
        ob_start();
        $search_placeholder = get_option('ajax_searchwp_search_placeholder', __('Search here...', 'ajax-searchwp'));
        ?>
        <div class="searchwp-form">
            <form id="searchwpform" method="post" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="text" id="s" name="s" placeholder="<?php echo esc_attr($search_placeholder); ?>" autocomplete="off" />
                <input type="hidden" name="ajax_searchwp_nonce" value="<?php echo esc_attr(wp_create_nonce('ajax_searchwp_nonce')); ?>" />
                <button type="submit" id="searchsubmit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 512 512">
                        <path d="M460.355,421.59L353.844,315.078c20.041-27.553,31.885-61.437,31.885-98.037..."></path>
                    </svg>
                </button>
            </form>
        </div>
        <div id="ajax_searchwp_results"></div>
        <?php
        return ob_get_clean();
    }
}
