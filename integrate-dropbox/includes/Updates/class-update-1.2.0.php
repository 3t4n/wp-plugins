<?php

namespace CodeConfig\IntegrateDropbox;

defined('ABSPATH') or exit('Hey, what are you doing here? You silly human!');

class Update_1_2_0
{
    private static $instance = null;

    public function __construct()
    {
        $this->add_custom_cap();
        $this->create_table();
    }

    private function add_custom_cap()
    {
        $role = get_role('administrator');
        if ($role && !$role->has_cap('manage_indbox_files')) {
            $role->add_cap('manage_indbox_files');
        }
    }

    public function create_table()
    {
        global $wpdb;

        $wpdb->hide_errors();

        if (! function_exists('dbDelta')) {
            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        }

        dbDelta("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}integrate_dropbox_user_access( id INT AUTO_INCREMENT, `type` TEXT NOT NULL, `value` TEXT NOT NULL, `folders` LONGTEXT NULL, `force` TINYINT(1) DEFAULT 0, created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL, PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
    }

    public static function instance()
    {
        if (is_null(self::$instance)) {
            return self::$instance = new self();
        }

        return self::$instance;
    }
}

Update_1_2_0::instance();
