<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class AIEntries_Settings {

    public static function add_menu_page() {
        add_menu_page(
            'AIEntries Settings',
            'AIEntries',
            'manage_options',
            'AIEntries-settings',
            [self::class, 'settings_page'],
            'dashicons-visibility'
        );
        return true;
    }

    public static function settings_page() {
        if (isset($_POST['submit'])) {
            // Verificar el nonce
            if (isset($_POST['aic_entries_nonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['aic_entries_nonce'])), 'aic_entries_settings_nonce')) {
                // Procesar los datos del formulario
                update_option('AIEntries_question', sanitize_text_field($_POST['question']));
                update_option('AIEntries_num_calls', intval($_POST['num_calls']));
                update_option('AIEntries_news_api_key', sanitize_text_field($_POST['news_api_key']));
                update_option('AIEntries_api_key', sanitize_text_field($_POST['api_key']));
                update_option('AIEntries_category', sanitize_text_field($_POST['category']));
                update_option('AIEntries_api_key_stable_diffusion', sanitize_text_field($_POST['api_key_stable_diffusion']));

                $responses = [];
                $errors = [];

                $question = sanitize_text_field($_POST['question']);
                $api_key = sanitize_text_field($_POST['api_key']);
                $category = sanitize_text_field($_POST['category']);

                $response = AIEntries_API::call($question, $api_key, $category);

                if (!is_wp_error($response)) {
                    $responses[] = $response;
                } else {
                    $errors[] = esc_html($response->get_error_message());
                }

            } else {
                // Si el nonce no es válido, muestra un mensaje de error o realiza alguna acción
                echo 'Nonce verification failed. Please try again.';
            }
        } else {
            $responses = [];
            $errors = [];
        }

        $question = esc_attr(get_option('AIEntries_question', ''));
        $num_calls = intval(get_option('AIEntries_num_calls', 1));
        $api_key = esc_attr(get_option('AIEntries_api_key', ''));
        $news_api_key = esc_attr(get_option('AIEntries_news_api_key', ''));
        $category = esc_attr(get_option('AIEntries_category', ''));
        $api_key_stable_diffusion = esc_attr(get_option('AIEntries_api_key_stable_diffusion', ''));

        include plugin_dir_path(__FILE__) . 'settings-page.php';
    }
}
