<?php

namespace AIPT\Core;

use AIPT\Api\RestEndpoints;
use AIPT\Admin\SetupWizardPage;
use AIPT\Api\BulkGenerator\BulkGeneratorController;
use AIPT\Api\CtrlController;
use AIPT\Core\FsManager;

class Init {
    private static $instance = null;
    private $setup_wizard;
    private $bulk_generator_controller;
    private $ctrl_controller;
    private $fsManager;

    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {

        $this->setup_wizard = new SetupWizardPage();
        $this->bulk_generator_controller = new BulkGeneratorController();
        $this->ctrl_controller = new CtrlController();
        $this->fsManager = FsManager::getInstance();
        
        $this->init_hooks();
        $this->add_capabilities();
    }

    private function init_hooks() {
        add_action('rest_api_init', [$this, 'register_rest_routes']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_assets']);
        add_action('add_meta_boxes_product', [$this, 'add_product_metabox']);
        add_action('admin_menu', [$this, 'add_admin_menu']);
        add_action('admin_head', [$this, 'add_editor_styles']);
    }

    private function add_capabilities() {
        $role = get_role('administrator');
        if ($role) {
            $role->add_cap('manage_aipt_settings');
        }
    }

    public function register_rest_routes() {
        $endpoints = new RestEndpoints();
        $endpoints->register_routes();
        $this->bulk_generator_controller->register_routes();
        $this->ctrl_controller->register_routes();
    }

    private function convert_locale_format($wp_locale) {
        return str_replace('_', '-', $wp_locale);
    }

    public function enqueue_admin_assets($hook) {
        

        if ('toplevel_page_ai-product-tools' === $hook) {
            if (function_exists('wp_enqueue_editor')) {
                wp_enqueue_editor();
                wp_enqueue_media();
            }
        }

        wp_enqueue_script(
            'aipt-notification-manager',
            AIPT_PLUGIN_URL . 'dist/js/notification-manager.js',
            ['wp-element'],
            AIPT_VERSION,
            true
        );

        wp_enqueue_style(
            'aipt-notification-manager',
            AIPT_PLUGIN_URL . 'dist/css/notification-manager.css',
            [],
            AIPT_VERSION
        );

        wp_enqueue_style(
            'font-awesome',
            AIPT_PLUGIN_URL . 'dist/css/all.min.css',
            [],
            '6.4.2'
        );

        if ('post.php' === $hook || 'post-new.php' === $hook) {
            $screen = get_current_screen();
            if ($screen && $screen->post_type === 'product') {
                wp_enqueue_style(
                    'aipt-metabox',
                    AIPT_PLUGIN_URL . 'dist/css/metabox.css',
                    ['aipt-notification-manager'],
                    AIPT_VERSION
                );

                wp_enqueue_script(
                    'aipt-metabox',
                    AIPT_PLUGIN_URL . 'dist/js/metabox.js',
                    ['wp-element', 'wp-components', 'wp-api-fetch', 'aipt-notification-manager'],
                    AIPT_VERSION,
                    true
                );

                wp_localize_script('aipt-metabox', 'aiptData', [
                    'productId' => get_the_ID(),
                    'nonce' => wp_create_nonce('wp_rest'),
                    'ajaxurl' => admin_url('admin-ajax.php'),
                    'system_prompt' => get_option('aipt_system_prompt', 'You are a professional product description writer. Return only the clean product description. Do not use any markdown, formatting, introductory phrases, meta-comments or additional text. Provide content that is directly suitable for WordPress editor. Your response MUST NOT exceed {max_length} characters in length.'),
                    'user_prompt' => get_option('aipt_user_prompt', 'Write a product description in {language}. Use the following writing style: {style}. The product title is: {title}')
                ]);

                wp_add_inline_script('aipt-metabox', 'window.aipt = {
                    system_prompt: "' . esc_js(get_option('aipt_system_prompt', '')) . '",
                    user_prompt: "' . esc_js(get_option('aipt_user_prompt', '')) . '"
                };', 'before');
            }
        }

        if ('toplevel_page_ai-product-tools' === $hook || 'ai-product-tools_page_aipt-settings' === $hook) {

            wp_enqueue_style(
                'aipt-settings',
                AIPT_PLUGIN_URL . 'dist/css/settings.css',
                ['aipt-notification-manager'],
                AIPT_VERSION
            );

            wp_enqueue_script(
                'aipt-settings',
                AIPT_PLUGIN_URL . 'dist/js/settings.js',
                ['wp-element', 'wp-components', 'wp-api-fetch', 'aipt-notification-manager'],
                AIPT_VERSION,
                true
            );

            wp_localize_script('aipt-settings', 'aiptData', [
                'nonce' => wp_create_nonce('wp_rest'),
                'ajaxurl' => admin_url('admin-ajax.php'),
                'settings' => [
                    'openai_api_key' => get_option('aipt_openai_api_key', ''),
                    'gemini_api_key' => get_option('aipt_gemini_api_key', ''),
                    'api_provider' => get_option('aipt_api_provider', Activator::get_default_value('api_provider')),
                    'system_prompt' => get_option('aipt_system_prompt', Activator::get_default_value('system_prompt')),
                    'user_prompt' => get_option('aipt_user_prompt', Activator::get_default_value('user_prompt')),
                    'language' => get_option('aipt_language', Activator::get_default_value('language')),
                    'writing_style' => get_option('aipt_writing_style', Activator::get_default_value('writing_style')),
                    'max_length' => get_option('aipt_max_length', Activator::get_default_value('max_length')),
                    'max_short_length' => get_option('aipt_max_short_length', Activator::get_default_value('max_short_length')),
                    'model' => get_option('aipt_model', Activator::get_default_value('model')),
                    'enable_product_attributes' => get_option('aipt_enable_product_attributes', Activator::get_default_value('enable_product_attributes')),
                    'enable_product_categories' => get_option('aipt_enable_product_categories', Activator::get_default_value('enable_product_categories')),
                    'enable_product_tags' => get_option('aipt_enable_product_tags', Activator::get_default_value('enable_product_tags')),
                    'enable_product_price' => get_option('aipt_enable_product_price', Activator::get_default_value('enable_product_price')),
                    'enable_product_sku' => get_option('aipt_enable_product_sku', Activator::get_default_value('enable_product_sku'))
                ]
            ]);
        }

        if ('admin_page_ai-product-tools-setup' === $hook) {
            
            wp_enqueue_style(
                'aipt-setup-wizard',
                AIPT_PLUGIN_URL . 'dist/css/setup-wizard.css',
                ['aipt-notification-manager'],
                AIPT_VERSION
            );

            wp_enqueue_script(
                'aipt-setup-wizard',
                AIPT_PLUGIN_URL . 'dist/js/setup-wizard.js',
                ['wp-element', 'wp-components', 'wp-api-fetch', 'aipt-notification-manager'],
                AIPT_VERSION,
                true
            );

            wp_localize_script('aipt-setup-wizard', 'aiptData', [
                'nonce' => wp_create_nonce('wp_rest'),
                'ajaxurl' => admin_url('admin-ajax.php'),
                'adminUrl' => admin_url(),
            ]);
        }

        if ('toplevel_page_ai-product-tools' === $hook) {

            wp_enqueue_style(
                'aipt-description-generator',
                AIPT_PLUGIN_URL . 'dist/css/description-generator.css',
                ['aipt-notification-manager'],
                AIPT_VERSION
            );

            wp_enqueue_script(
                'aipt-description-generator',
                AIPT_PLUGIN_URL . 'dist/js/description-generator.js',
                ['wp-element', 'wp-components', 'wp-api-fetch', 'aipt-notification-manager'],
                AIPT_VERSION,
                true
            );

            wp_localize_script('aipt-description-generator', 'aiptData', array(
                'nonce' => wp_create_nonce('wp_rest'),
                'ajaxurl' => admin_url('admin-ajax.php'),
                'settings' => array(
                    'openai_api_key' => get_option('aipt_openai_api_key', ''),
                    'gemini_api_key' => get_option('aipt_gemini_api_key', ''),
                    'api_provider' => get_option('aipt_api_provider', Activator::get_default_value('api_provider')),
                    'system_prompt' => get_option('aipt_system_prompt', Activator::get_default_value('system_prompt')),
                    'user_prompt' => get_option('aipt_user_prompt', Activator::get_default_value('user_prompt')),
                    'language' => get_option('aipt_language', Activator::get_default_value('language')),
                    'writing_style' => get_option('aipt_writing_style', Activator::get_default_value('writing_style')),
                    'max_length' => get_option('aipt_max_length', Activator::get_default_value('max_length')),
                    'max_short_length' => get_option('aipt_max_short_length', Activator::get_default_value('max_short_length')),
                    'model' => get_option('aipt_model', Activator::get_default_value('model')),
                    'enable_product_attributes' => get_option('aipt_enable_product_attributes', Activator::get_default_value('enable_product_attributes')),
                    'enable_product_categories' => get_option('aipt_enable_product_categories', Activator::get_default_value('enable_product_categories')),
                    'enable_product_tags' => get_option('aipt_enable_product_tags', Activator::get_default_value('enable_product_tags')),
                    'enable_product_price' => get_option('aipt_enable_product_price', Activator::get_default_value('enable_product_price')),
                    'enable_product_sku' => get_option('aipt_enable_product_sku', Activator::get_default_value('enable_product_sku'))
                ),
                'locale' => $this->convert_locale_format(get_locale()),
                'currency' => get_woocommerce_currency(),
                'fs' => array(
                    'is_registered' => aipt_fs()->is_registered(),
                    'upgradeUrl' => aipt_fs()->get_upgrade_url(),
                    'plan' => aipt_fs()->is_registered() ? $this->fsManager->getPlanType() : 'free'
                )
            ));
        }
    }

    public function add_product_metabox() {
        add_meta_box(
            'aipt_product_metabox',
            __('AI Product Tools', 'ai-product-tools'),
            [$this, 'render_product_metabox'],
            'product',
            'side',
            'high'
        );
    }

    public function render_product_metabox($post) {
        echo '<div id="aipt-metabox-root"></div>';
    }

    public function add_admin_menu() {

        require_once(ABSPATH . 'wp-admin/includes/file.php');
        WP_Filesystem();
        global $wp_filesystem;
        
        $icon_svg = '';
        if ($wp_filesystem) {
            $icon_svg = $wp_filesystem->get_contents(AIPT_PLUGIN_DIR . 'dist/img/aipt-icon.svg');
        }
        

        $icon_base64 = $icon_svg ? 'data:image/svg+xml;base64,' . base64_encode($icon_svg) : 'dashicons-admin-generic';

        add_menu_page(
            __('AI Product Tools', 'ai-product-tools'),
            __('AI Product Tools', 'ai-product-tools'),
            'manage_options',
            'ai-product-tools',
            [$this, 'render_bulk_generator_page'],
            $icon_base64,
            56
        );

        add_submenu_page(
            'ai-product-tools',
            __('Bulk Description Generator', 'ai-product-tools'),
            __('Bulk Description Generator', 'ai-product-tools'),
            'manage_options',
            'ai-product-tools',
            [$this, 'render_bulk_generator_page']
        );

        add_submenu_page(
            'ai-product-tools',
            __('Settings', 'ai-product-tools'),
            __('Settings', 'ai-product-tools'),
            'manage_options',
            'aipt-settings',
            [$this, 'render_settings_page']
        );
    }

    public function render_settings_page() {
        echo '<div class="wrap">';
        echo '<div id="aipt-settings-root"></div>';
        echo '</div>';
    }

    public function render_bulk_generator_page() {
        echo '<div class="wrap">';
        echo '<div id="aipt-body-container"></div>';
        echo '</div>';
    }

    public function add_editor_styles() {
        if (!function_exists('get_current_screen')) {
            return;
        }

        $screen = get_current_screen();
        if (!$screen || 'toplevel_page_ai-product-tools' !== $screen->id) {
            return;
        }
    }
} 