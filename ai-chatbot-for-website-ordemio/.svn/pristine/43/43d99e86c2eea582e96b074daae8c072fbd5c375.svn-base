<?php
/*
Plugin Name: AI Chatbot for Your Website – Ordemio
Description: Ordemio AI ChatBot is an AI-powered plugin for WordPress that turns your website content into interactive conversations. It utilizes your posts and pages as a knowledge base, facilitating dynamic user engagement. Easily manage the chatbot from your WordPress dashboard, integrate custom data, and enjoy a seamless experience.
Version: 1.0
Author: Ordemio.com
Author URI: https://ordemio.com
License: GPLv2 or later
*/

defined('ABSPATH') or die('No script kiddies please!');
include dirname( __FILE__ ) . '/api/ordemio-api.php';
class OrdemioIntegration {

    public const OPTION_ACCOUNT = 'ordemio_account_id';
    public const OPTION_ASSISTANT = 'ordemio_assistant_id';
    public const OPTION_ASSISTANT_NAME = 'ordemio_assistant_name';
    public const OPTION_SOURCE = 'ordemio_source_id';
    public const OPTION_TOKEN = 'ordemio_token';
    public const OPTION_REFRESH_TOKEN = 'ordemio_refresh_token';
    public const OPTION_NEED_REDIRECT = 'ordemio_activation_redirect';
    public const OPTION_ERROR = 'ordemio_error';
    public const OPTION_INSTALL_COMPLETE = 'ordemio_install_complete';
    public const OPTION_EXIST_ACCOUNT = 'ordemio_exist_account';

    public const OPTION_SHOW_FRONT = 'ordemio_show_front';

    public ?OrdemioApi $api = null;
    public function __construct() {
        add_action('admin_menu', [$this, 'create_admin_menu']);

        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_scripts']);
        add_action('wp_enqueue_scripts', [$this, 'display_assistant_code']);
        add_action('admin_init', [$this, 'ordemio_check_activation']);
        add_action('admin_notices', [$this, 'display_error_notice']);
        add_filter('script_loader_tag',[$this, 'add_id_to_script'], 10, 3);
        $this->api = new OrdemioApi();
    }

    function ordemio_check_activation() {
        if (get_option('ordemio_activation_redirect')) {
            delete_option('ordemio_activation_redirect');
            wp_redirect(admin_url('admin.php?page=ordemio-settings&state=installation_account'));
        }
    }

    public function hello_world()
    {
        echo 'hello';
    }
    public function create_admin_menu() {
        add_menu_page(
                'Ordemio Settings',
                'Ordemio',
                'manage_options',
                'ordemio-settings',
                [$this, 'settings_page'],
            'dashicons-format-chat'
        );
    }

    public function settings_page() {
        include plugin_dir_path(__FILE__) . 'admin/admin-page.php';
    }

    public function enqueue_admin_scripts() {
        wp_enqueue_style('flowbite', plugins_url('/assets/css/flowbite.min.css', __FILE__));
        wp_enqueue_script('flowbite', plugins_url('/assets/js/om_admin.js', __FILE__));
    }
    public function check_status_script()
    {
        echo "<script type='application/javascript'>";
        echo "window.omIsFetching = true;\n";
        echo "const token = '" . esc_attr(get_option(OrdemioIntegration::OPTION_TOKEN)) . "';\n";
        echo "const status_url = '"
                . esc_url(
                    "https://app.ordemio.com/api/v1/onboarding/"
                    . get_option(OrdemioIntegration::OPTION_ASSISTANT)
                    . "/" . get_option(OrdemioIntegration::OPTION_SOURCE)
                ) . "/status'\n";
        echo "setInterval(checkStatus, 5000, status_url, token);\n";
        echo "checkStatus(status_url, token);\n";
        echo "</script>";
    }
    public function display_assistant_code() {
        $assistant_id = get_option(self::OPTION_ASSISTANT);
        $show = get_option(self::OPTION_SHOW_FRONT);
        if ($assistant_id && $show == 'Y' && !is_admin()) {
            wp_register_script(
                'ordemio-assistant',
                'https://chat.ordemio.com/lib/w.js',
                [],
                null,
                true
            );
            wp_enqueue_script('ordemio-assistant');
        }
    }
    public function add_id_to_script( $tag, $handle, $src )
    {
        if ($handle == 'ordemio-assistant')
            $tag = '<script type="text/javascript"'
                . ' src="' . esc_url( $src ) . '"'
                . ' id="ordemio-assistant"'
                . ' assistant-id="'. esc_attr(get_option(self::OPTION_ASSISTANT)).'">'
                . '</script>';
        return $tag;
    }

    public function display_error_notice() {
        if (get_option(self::OPTION_ERROR)) {
            echo '<div class="notice notice-error is-dismissible">';
            echo '<p>' . esc_html(get_option(self::OPTION_ERROR)) . '</p>';
            echo '</div>';

            delete_option(self::OPTION_ERROR);
        }
    }
}

new OrdemioIntegration();

register_activation_hook(__FILE__, 'ordemio_plugin_activation');
register_deactivation_hook( __FILE__, 'ordemio_plugin_deactivate' );
function ordemio_plugin_activation() {
    add_option(OrdemioIntegration::OPTION_ACCOUNT, '');
    add_option(OrdemioIntegration::OPTION_ASSISTANT, '');
    add_option(OrdemioIntegration::OPTION_ASSISTANT_NAME, '');
    add_option(OrdemioIntegration::OPTION_SOURCE, '');
    add_option(OrdemioIntegration::OPTION_TOKEN, '');
    add_option(OrdemioIntegration::OPTION_REFRESH_TOKEN, '');
    add_option(OrdemioIntegration::OPTION_NEED_REDIRECT, true);
    add_option(OrdemioIntegration::OPTION_INSTALL_COMPLETE, '');
    add_option(OrdemioIntegration::OPTION_EXIST_ACCOUNT, '');
    add_option(OrdemioIntegration::OPTION_SHOW_FRONT, '');
}

function ordemio_plugin_deactivate() {
    delete_option(OrdemioIntegration::OPTION_REFRESH_TOKEN);
    delete_option(OrdemioIntegration::OPTION_TOKEN);
    delete_option(OrdemioIntegration::OPTION_ERROR);
    delete_option(OrdemioIntegration::OPTION_ASSISTANT);
    delete_option(OrdemioIntegration::OPTION_ACCOUNT);
    delete_option(OrdemioIntegration::OPTION_ASSISTANT_NAME);
    delete_option(OrdemioIntegration::OPTION_SOURCE);
    delete_option(OrdemioIntegration::OPTION_NEED_REDIRECT);
    delete_option(OrdemioIntegration::OPTION_INSTALL_COMPLETE);
    delete_option(OrdemioIntegration::OPTION_EXIST_ACCOUNT);
    delete_option(OrdemioIntegration::OPTION_SHOW_FRONT);
}
