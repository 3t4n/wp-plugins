<?php

namespace CodeConfig\IntegrateDropbox;

defined('ABSPATH') or exit('Hey, what are you doing here? You silly human!');

/**
 * The Plugin Admin Class
 * @since 1.0.0
 */
class Admin
{
    /**
     * The single instance of the class.
     * @since 1.0.0
     * @static
     * @var
     */
    private static $instance = null;

    /**
     * The Admin Pages
     * @since 1.0.0
     * @static
     * @var
     */
    public static $admin_pages = [];

    /**
     * The class construct function
     * @return void
     * @since 1.0.0
     */
    public function __construct()
    {
        add_action('admin_menu', [$this, 'add_admin_menu']);
        add_action('admin_init', [$this, 'admin_init']);
    }

    public function admin_init()
    {
        if (!current_user_can('manage_indbox_files') && current_user_can('manage_options')) {
            $role = get_role('administrator');
            if ($role && !$role->has_cap('manage_indbox_files')) {
                $role->add_cap('manage_indbox_files');
            }
        }
    }

    public function add_dropbox_submenu($page_name, $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $callback = '', $position = null)
    {
        return self::$admin_pages[$page_name] = add_submenu_page(
            $parent_slug,
            $page_title,
            $menu_title,
            $capability,
            $menu_slug,
            $callback,
            $position
        );
    }

    /**1115,1145,
     * Add admin menu
     * @return void
     * @since 1.0.0
     */
    public function add_admin_menu(): void
    {

        $capability = current_user_can('manage_indbox_files') ? 'manage_indbox_files' : 'manage_options';

        add_menu_page(
            'Integrate Dropbox',
            'Dropbox',
            $capability,
            'integrate-dropbox',
            [
                $this,
                'file_browser',
            ],
            INDBOX_ASSETS . '/admin/images/dropbox_logo_small.png',
            30
        );

        $this->add_dropbox_submenu(
            'file-browser',
            'integrate-dropbox',
            __("File Browser - Integrate Dropbox", "integrate-dropbox"),
            __("File Browser", "integrate-dropbox"),
            $capability,
            'integrate-dropbox',
            [$this, 'file_browser']
        );

        $is_setup = User::instance()->is_setup_access_folder();

        if (!$is_setup) {
            $this->add_dropbox_submenu(
                'settings',
                'integrate-dropbox',
                __('Settings - Integrate Dropbox', 'integrate-dropbox'),
                __('Settings', 'integrate-dropbox'),
                'manage_options',
                'integrate-dropbox-settings',
                [
                    $this,
                    'settings',
                ]
            );
        }

        $this->add_dropbox_submenu(
            'shortcode-builder',
            'integrate-dropbox',
            __('Shortcode Builder - Integrate Dropbox', 'integrate-dropbox'),
            __('Shortcode Builder', 'integrate-dropbox'),
            $capability,
            'integrate-dropbox-shortcode-builder',
            [
                $this,
                'shortcode_builder',
            ]
        );

        $this->add_dropbox_submenu(
            'getting-started',
            'integrate-dropbox',
            __('Getting Started - Integrate Dropbox', 'integrate-dropbox'),
            __('Getting Started', 'integrate-dropbox'),
            $capability,
            'integrate-dropbox-getting-started',
            [
                $this,
                'getting_started',
            ]
        );

        do_action('indbox_add_submenu_page', $this);
    }

    public function getting_started()
    {
        echo '<div class="indbox-toplavel-wrapper" id="integrate-dropbox-getting-started"></div>';

        wp_enqueue_script('integrate-dropbox-getting-started');
    }

    public function file_browser()
    {
        echo '<div class="indbox-toplavel-wrapper" id="integrate-dropbox-file-browser"></div>';

        wp_enqueue_script('integrate-dropbox-file-browser');
    }

    /**
     * The Dropbox admin menu page.
     * @return void
     * @since 1.0.0
     */
    public function settings(): void
    {
        printf('<div class="indbox-toplavel-wrapper" id="integrate-dropbox-settings"></div>');
        wp_enqueue_script('integrate-dropbox-settings');
    }

    /**
     * The Dropbox admin menu page.
     * @return void
     * @since 1.0.0
     */
    public function shortcode_builder(): void
    {
        printf('<div class="indbox-toplavel-wrapper" id="integrate-dropbox-shortcode-builder"></div>');
        wp_enqueue_script('integrate-dropbox-shortcode-builder');
        wp_enqueue_editor();
    }

    /**
     * Get admin menu pages.
     * @return array
     * @since 1.0.0
     * @static
     */
    public static function get_admin_pages(): array
    {
        return self::$admin_pages;
    }

    /**
     * The instantiate singleton class.
     * @return Admin
     * @since 1.0.0
     * @static
     */
    public static function instance(): Admin
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
