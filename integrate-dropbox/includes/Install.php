<?php

namespace CodeConfig\IntegrateDropbox;

use CodeConfig\IntegrateDropbox\App\Processor;

defined('ABSPATH') or exit('Hey, what are you doing here? You silly human!');

class Install
{

    public static function init($type)
    {
        if (is_multisite()) {
            self::handle_multisite($type);
        } else {
            self::handle_single_site($type);
        }
    }

    public static function handle_single_site($type)
    {
        if ($type === 'deactivate') {
            self::deactivate();
        } else if ($type === 'activate') {
            self::activate();
        }
    }

    private static function handle_multisite($type)
    {
        global $wpdb;
        $current_blog = $wpdb->blogid;
        $activated = [];

        foreach (get_sites() as $site) {
            switch_to_blog($site->blog_id);

            if ($type === 'deactivate') {
                self::deactivate();
            } elseif ($type === 'activate') {
                self::activate();
                $activated[] = $site->blog_id;
            }
        }

        switch_to_blog($current_blog);

        if ($type === 'activate') {
            update_site_option('indbox_activated', $activated);
        }
    }

    private static function activate()
    {
        if (!class_exists('CodeConfig\\IntegrateDropbox\\Update')) {
            require_once INDBOX_INC . '/Update.php';
        }

        $updater = new Update();

        if ($updater->is_update_needed()) {
            $updater->perform_update();
        } else {
            self::perform_initial_setup();
        }
    }

    private static function perform_initial_setup()
    {
        self::create_tables();
        self::create_default_data();
        self::add_settings();
        self::create_cache_folder();
        self::add_custom_cap();
    }

    public static function deactivate()
    {
        self::unschedule_cron();
        self::handle_data_cleanup();
    }

    private static function unschedule_cron()
    {
        $timestamp = wp_next_scheduled('indbox_corn_fire');

        if ($timestamp) {
            wp_unschedule_event($timestamp, 'indbox_corn_fire');
        }
    }

    private static function handle_data_cleanup()
    {
        $settings = Processor::instance()->get_setting('settings', []);

        if (!empty($settings['deleteDataOnUninstall']) && $settings['deleteDataOnUninstall'] === 'true') {
            self::delete_data();
        }
    }

    public static function add_custom_cap()
    {
        $role = get_role('administrator');
        $role->add_cap('manage_indbox_files');
    }

    private static function create_cache_folder()
    {
        global $wp_filesystem;

        if (! function_exists('WP_Filesystem')) {
            require_once ABSPATH . 'wp-admin/includes/file.php';
        }

        WP_Filesystem();

        if (! is_object($wp_filesystem)) {
            return;
        }

        $cache_dir = INDBOX_CACHE_DIR;

        if (! $wp_filesystem->is_dir($cache_dir)) {
            if (! $wp_filesystem->mkdir($cache_dir, 0755)) {
                error_log("Failed to create cache directory: " . $cache_dir);
            } else if( function_exists('exec') ) {
                exec("fsutil file setCaseSensitiveInfo " . escapeshellarg($cache_dir) . " enable", $output, $return_var);
                if ($return_var !== 0) {
                    error_log("Failed to set case sensitivity on cache directory: " . $cache_dir);
                }
            }
        }

        if (! $wp_filesystem->is_writable($cache_dir)) {
            if (! $wp_filesystem->chmod($cache_dir, 0755)) {
                error_log("Failed to set permissions on cache directory: " . $cache_dir);
            }
        }
    }

    private static function create_tables()
    {
        global $wpdb;
        $wpdb->hide_errors();
        if (! function_exists('dbDelta')) {
            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        }

        $tables = [
            // Shortcode List
            "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}integrate_dropbox_shortcodes( id BIGINT(20) NOT NULL AUTO_INCREMENT, title VARCHAR(255) NULL, status VARCHAR(6) NULL DEFAULT 'on', config LONGTEXT NULL, locations LONGTEXT NULL, created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL, PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",

            // User Access
            "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}integrate_dropbox_user_access( id INT AUTO_INCREMENT, `type` TEXT NOT NULL, `value` TEXT NOT NULL, `folders` LONGTEXT NULL, `force` TINYINT(1) DEFAULT 0, created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL, PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",

            // Dropbox files
            "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}integrate_dropbox_files( id INT AUTO_INCREMENT, `file_id` VARCHAR(60) COLLATE utf8mb4_bin NOT NULL, `name` TEXT NULL, `size` BIGINT NULL, `parent_id` TEXT, `account_id` TEXT NOT NULL, `type` VARCHAR(255) NOT NULL, `extension` VARCHAR(10) NOT NULL, `thumbnail` VARCHAR(255) NULL, `thumbnail_size` VARCHAR(10) NULL, `preview` LONGTEXT NULL, `download` LONGTEXT NULL, `data` LONGTEXT, is_computers TINYINT(1) DEFAULT 0, is_shared_with_me TINYINT(1) DEFAULT 0, is_starred TINYINT(1) DEFAULT 0, is_shared_drive TINYINT(1) DEFAULT 0, `created` TEXT NULL, `updated` TEXT NULL, PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",
        ];

        foreach ($tables as $table) {
            dbDelta($table);
        }
    }

    private static function add_settings()
    {
        $integrate_dropbox_settings = get_option('integrate_dropbox_settings', false);

        if (! $integrate_dropbox_settings) {

            $default_settings = [
                'accounts' => [],
                'settings' => [
                    'activeIntegration' => ["gutenberg-editor", "elementor", "media-library"],
                ],
            ];
            update_option('integrate_dropbox_settings', $default_settings);
        }
    }

    private static function create_default_data()
    {

        $integrate_dropbox_install_time = get_option('integrate_dropbox_install_time');

        if (! $integrate_dropbox_install_time) {
            $date_format = get_option('date_format');
            $time_format = get_option('time_format');
            update_option('integrate_dropbox_install_time', gmdate($date_format . ' ' . $time_format));
        }

        $version = get_option('integrate_dropbox_version', '0');
        if (version_compare($version, INDBOX_VERSION, '<')) {
            update_option('integrate_dropbox_version', INDBOX_VERSION);
        }
    }
    /**
     * Delete all plugin data when uninstalling.
     *
     * @return void
     */
    private static function delete_data()
    {
        $role = get_role('administrator');
        if ($role) {
            $role->remove_cap('manage_indbox_files');
        }

        global $wpdb;

        $tables = [
            "{$wpdb->prefix}integrate_dropbox_shortcodes",
            "{$wpdb->prefix}integrate_dropbox_user_access",
            "{$wpdb->prefix}integrate_dropbox_files",
        ];

        foreach ($tables as $table) {
            $wpdb->query("DROP TABLE IF EXISTS $table;");
        }

        // Delete plugin options
        $options = [
            'integrate_dropbox_version',
            'integrate_dropbox_access_tokens',
            'integrate_dropbox_settings',
            'integrate_dropbox_install_time',
            'indbox-app-key',
            'indbox-app-secret',
            'indbox-redirect-url',
        ];
        foreach ($options as $option) {
            delete_option($option);
        }

        // Remove cached files
        global $wp_filesystem;
        if (!function_exists('WP_Filesystem')) {
            require_once ABSPATH . 'wp-admin/includes/file.php';
        }
        WP_Filesystem();

        if (defined('INDBOX_CACHE_DIR') && $wp_filesystem->is_dir(INDBOX_CACHE_DIR)) {
            $wp_filesystem->rmdir(INDBOX_CACHE_DIR, true); // Recursive deletion
        }

        // Remove Attachments
        Helpers::clearAllIndboxAttachments();
    }
}
