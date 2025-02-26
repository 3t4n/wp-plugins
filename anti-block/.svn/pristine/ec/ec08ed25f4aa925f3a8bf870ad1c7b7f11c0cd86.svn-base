<?php
class anti_block_setup {

    protected static $instance;

    public static function init() {
        is_null(self::$instance) AND self::$instance = new self;
        return self::$instance;
    }

    public static function on_activation() {
        if (!current_user_can('activate_plugins'))
            return;
        $plugin = isset($_REQUEST['plugin']) ? $_REQUEST['plugin'] : '';
        check_admin_referer("activate-plugin_{$plugin}");
        $notices = get_option('anti_block_deferred_admin_notices', array());
        $notices[] = sprintf("Anti-block is activated, please go and change the <a href='%s'>settings</a>", SETTINGS);
        update_option('anti_block_deferred_admin_notices', $notices);
    }

    public static function on_deactivation() {
        if (!current_user_can('activate_plugins'))
            return;
        $plugin = isset($_REQUEST['plugin']) ? $_REQUEST['plugin'] : '';
        check_admin_referer("deactivate-plugin_{$plugin}");

        delete_option('anti_block_deferred_admin_notices');

       
    }

    public static function on_uninstall() {
        if (!current_user_can('activate_plugins'))
            return;
        check_admin_referer('bulk-plugins');

        // Important: Check if the file is the one
        // that was registered during the uninstall hook.
        if (__FILE__ != WP_UNINSTALL_PLUGIN)
            return;

         delete_option('anti_block_settings');
    }

    public function __construct() {
        // nothing yet
    }

}
