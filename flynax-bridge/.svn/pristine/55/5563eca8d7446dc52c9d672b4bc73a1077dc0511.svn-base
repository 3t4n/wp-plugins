<?php

namespace Flynax\Plugins\FlynaxBridge;

/**
 * Plugins hooks related class
 *
 * @since 2.0.0
 *
 * @package Flynax\Plugins\FlynaxBridge
 */
class Hooks
{
    /**
     * Plugins hook registering
     */
    public function register()
    {
        $wpPosts = new Posts();
        $wpCache = new Cache();
        $wpUser  = new User();
        $bridge  = new FlynaxBridge();

        add_action('admin_enqueue_scripts', array($this, 'apHeaderScripts'));
        add_action('login_enqueue_scripts', array($this, 'apLoginPageHeader'));
        add_action('widgets_init', array($bridge, 'registerWidgets'));

        add_action('draft_to_publish', array($wpPosts, 'afterPosted'));
        add_action('pending_to_publish', array($wpPosts, 'afterPosted'));
        add_action('edit_post', array($wpPosts, 'afterPostEdit'));
        add_action('delete_post', array($wpPosts, 'afterPostRemoved'));
        add_action('publish_to_draft', array($wpPosts, 'postStatusChanged'));
        add_action('publish_to_pending', array($wpPosts, 'postStatusChanged'));
        add_action('trashed_post', array($wpPosts, 'movedToTrash'));
        add_action('untrashed_post', array($wpPosts, 'untrashedPost'));
        add_action('flb_update_cache', array($wpPosts, 'updateCache'));
        add_action('updated_option', array($wpCache, 'updateFlListings'));
        add_action('user_register', array($wpUser, 'registerUser'));
        add_action('profile_update', array($wpUser, 'updateUser'));
        add_action('password_reset', array($wpUser, 'updatePassword'));
        add_action('deleted_user', array($wpUser, 'deleteUser'));
        add_filter('registration_errors', array($wpUser, 'validateUser'));

        register_uninstall_hook(__FILE__, [FlynaxBridge::class, 'uninstall']);
    }

    /**
     * Including JS lib file of the plugin to the Admin Panel area
     *
     * @param $page - Active page
     */
    public function apHeaderScripts($page)
    {
        if ($page != 'widgets.php') {
            return;
        }

        wp_enqueue_script(FlynaxBridge::PLUGIN_KEY, FLYNAX_BRIDGE_PLUGIN_URL . 'assets/js/lib.js');
        wp_enqueue_style(FlynaxBridge::PLUGIN_KEY, FLYNAX_BRIDGE_PLUGIN_URL . 'assets/css/style.css');
    }

    /**
     * Add styles and js-filed to the Admin Panel login page
     */
    public function apLoginPageHeader()
    {
        wp_enqueue_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
        wp_enqueue_script(FlynaxBridge::PLUGIN_KEY, FLYNAX_BRIDGE_PLUGIN_URL . "assets/js/lib.js");
        wp_enqueue_style(FlynaxBridge::PLUGIN_KEY, FLYNAX_BRIDGE_PLUGIN_URL . "assets/css/style.css");
    }
}
