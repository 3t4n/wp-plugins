<?php

class GiveawayAdmin {
    function __construct() {
        register_activation_hook('giveaway/plugin.php', array($this, 'hook_activate'));
        register_deactivation_hook('giveaway/plugin.php', array($this, 'hook_deactivate'));
        add_action('init', array($this, 'hook_init'));
    }

    function hook_init() {
        add_action('admin_menu', array(&$this, 'hook_admin_menu'));
        add_action('admin_head', array(&$this, 'hook_admin_head'));
    }

    function hook_admin_menu() {
        add_options_page('Giveaway', 'Giveaway', 'manage_options', basename(dirname(__FILE__)) . '/options.php');
    }

    function hook_admin_head() {
        if (isset($_GET['page']) && strpos($_GET['page'], basename(dirname(__FILE__)) . '/') === 0) {
            echo '<link type="text/css" rel="stylesheet" href="' . plugins_url('admin.css', __FILE__) . '">';
        }
    }

    function hook_activate() {
        update_option('giveaway', array_merge(Giveaway::$instance->get_default_options(), get_option('giveaway', array())));
        wp_mkdir_p(WP_CONTENT_DIR . '/logs');
    }

    function hook_deactivate() {

    }
}

new GiveawayAdmin();
