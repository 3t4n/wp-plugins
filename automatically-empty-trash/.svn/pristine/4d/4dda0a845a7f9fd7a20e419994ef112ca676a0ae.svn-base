<?php

class Automatically_Empty_Trash
{

    static $instance;

    //Constructor of the Class
    public function __construct()
    {

        self::$instance = $this;

        add_action('admin_menu', array($this, 'wpEmptyTrashMenu'));
        add_action('admin_init', array($this, 'wpTrashSettings'));

        if (!empty(esc_attr(get_option('empty_trash_days')))) {
            define('EMPTY_TRASH_DAYS', esc_attr(get_option('empty_trash_days')));
        }
    }

    /**
     * Moving menu in "Settings Page".
     * Author : Yogesh Pawar
     * Date: 4th Febuary 2019
     */
    public function wpEmptyTrashMenu()
    {
        add_submenu_page('options-general.php', 'Empty Trash Settings', 'Empty Trash Settings', 'manage_options', 'empty-trash-settings', array($this, 'loadTrashSettingsPage'), '', 88);
    }

    /**
     * Function to load the settings page if user has permissions
     * Author: Yogesh Pawar
     * Date : 4th Febuary 2019
     */
    public function loadTrashSettingsPage()
    {

        if (current_user_can('manage_options')) {
            if (file_exists(plugin_dir_path(__DIR__) . '/views/empty-trash-settings.php')) {
                require plugin_dir_path(__DIR__) . '/views/empty-trash-settings.php';
            } else {
                die('<br /><h3>Plugin Installation is Incomplete. Please install the plugin again or make sure you have copied all the plugin files.</h3>');
            }
        } else {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }
    }

    public function wpTrashSettings()
    {

        register_setting('empty-trash-group', 'empty_trash_days');
    }
}

?>