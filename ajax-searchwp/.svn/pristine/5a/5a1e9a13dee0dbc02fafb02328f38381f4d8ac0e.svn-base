<?php

if (!defined('ABSPATH')) {
    exit; // Prevent direct access
}

class Ajax_SearchWP_Admin {
    public function __construct() {
        add_action('admin_menu', array($this, 'ajax_searchwp_add_admin_menu'));
        add_action('admin_init', array($this, 'register_settings'));
    }

    public function ajax_searchwp_add_admin_menu() {
        add_menu_page(
            __('Ajax SearchWP Settings', 'super-ajax-search'),
            __('Super Ajax Search', 'super-ajax-search'),
            'manage_options',
            'ajax_searchwp',
            array($this, 'ajax_searchwp_settings_page'),
            'dashicons-search',
            100
        );
    }

    public function register_settings() {
        register_setting('ajax_searchwp_settings', 'ajax_searchwp_post_types', array(
            'type' => 'array',
            'sanitize_callback' => array($this, 'sanitize_post_types'),
            'default' => array(),
        ));

        register_setting('ajax_searchwp_settings', 'ajax_searchwp_search_placeholder', array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => __('Search here...', 'super-ajax-search'),
        ));

        register_setting('ajax_searchwp_settings', 'ajax_searchwp_limit', array(
            'type' => 'integer',
            'sanitize_callback' => 'absint',
            'default' => 5,
        ));

        register_setting('ajax_searchwp_settings', 'ajax_searchwp_no_results_text', array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => __('No results found', 'super-ajax-search'),
        ));

        add_settings_section(
            'ajax_searchwp_main_section',
            __('Main Settings', 'super-ajax-search'),
            null,
            'ajax_searchwp_settings'
        );

        add_settings_field(
            'ajax_searchwp_post_types',
            __('Select Post Types to Include in Search', 'super-ajax-search'),
            array($this, 'ajax_searchwp_post_types_render'),
            'ajax_searchwp_settings',
            'ajax_searchwp_main_section'
        );

        add_settings_field(
            'ajax_searchwp_search_placeholder',
            __('Search Input Placeholder', 'super-ajax-search'),
            array($this, 'ajax_searchwp_search_placeholder_render'),
            'ajax_searchwp_settings',
            'ajax_searchwp_main_section'
        );

        add_settings_field(
            'ajax_searchwp_limit',
            __('Limit', 'super-ajax-search'),
            array($this, 'ajax_searchwp_limit_render'),
            'ajax_searchwp_settings',
            'ajax_searchwp_main_section'
        );

        add_settings_field(
            'ajax_searchwp_no_results_text',
            __('No Results Text', 'super-ajax-search'),
            array($this, 'ajax_searchwp_no_results_text_render'),
            'ajax_searchwp_settings',
            'ajax_searchwp_main_section'
        );
    }

    public function sanitize_post_types($input) {
        if (!is_array($input)) {
            $input = array();
        }
        return array_map('sanitize_text_field', $input);
    }

    public function ajax_searchwp_post_types_render() {
        $selected_post_types = get_option('ajax_searchwp_post_types', array());
        $post_types = get_post_types(array('public' => true), 'objects');

        echo '<fieldset>';
        foreach ($post_types as $post_type) {
            $checked = in_array($post_type->name, $selected_post_types) ? 'checked="checked"' : '';
            printf(
                '<label><input type="checkbox" name="ajax_searchwp_post_types[]" value="%s" %s /> %s</label><br>',
                esc_attr($post_type->name),
                $checked,
                esc_html($post_type->label)
            );
        }
        echo '</fieldset>';
    }

    public function ajax_searchwp_search_placeholder_render() {
        $search_placeholder = get_option('ajax_searchwp_search_placeholder', __('Search here...', 'super-ajax-search'));
        printf(
            '<input type="text" name="ajax_searchwp_search_placeholder" value="%s" />',
            esc_attr($search_placeholder)
        );
    }

    public function ajax_searchwp_limit_render() {
        $limit = get_option('ajax_searchwp_limit', 5);
        printf(
            '<input type="number" name="ajax_searchwp_limit" value="%s" />',
            esc_attr($limit)
        );
    }

    public function ajax_searchwp_no_results_text_render() {
        $no_results_text = get_option('ajax_searchwp_no_results_text', __('No results found', 'super-ajax-search'));
        printf(
            '<input type="text" name="ajax_searchwp_no_results_text" value="%s" />',
            esc_attr($no_results_text)
        );
    }

    public function ajax_searchwp_settings_page() {
        ?>
        <div class="wrap">
            <h1><?php esc_html_e('Super Ajax Search Settings', 'super-ajax-search'); ?></h1>
            <p><?php esc_html_e('Use the shortcode [super_ajax_search] to add the search form to any page.', 'super-ajax-search'); ?></p>
            <form action="options.php" method="post">
                <?php
                settings_fields('ajax_searchwp_settings');
                do_settings_sections('ajax_searchwp_settings');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }
}
?>
