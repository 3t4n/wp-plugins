<?php
namespace DynamicHeartbeat;

defined('ABSPATH') or die();

class dfehcUncloggerCli extends dfehcUnclogger {

    function __construct() {

        if (!class_exists('WP_CLI')) {
            return;
        }

        $this->db = new dfehcUncloggerDb();
        $this->tweaks = new dfehcUncloggerTweaks();

        load_plugin_textdomain('dynamic-front-end-heartbeat-control', false, dirname(plugin_basename(__FILE__)) . '/languages');

        WP_CLI::add_command('dfehc-unclogger', array($this, 'dfehc_unclogger_command'));
    }

    function dfehc_unclogger_command($args, $assoc_args) {

        if (empty($args)) {
            WP_CLI::line(__('commands:', 'dynamic-front-end-heartbeat-control'));
            WP_CLI::line(__('  - wp dfehc-unclogger db <command>', 'dynamic-front-end-heartbeat-control'));
            return;
        }

        if (!isset($args[1]) || $args[0] !== 'db') {
            WP_CLI::line(__('Invalid command.', 'dynamic-front-end-heartbeat-control'));
            return;
        }

        if ($args[0] === 'db') {

			if (!isset($args[1])) {
                WP_CLI::line(__('commands:', 'dynamic-front-end-heartbeat-control'));
                WP_CLI::line(__('  - wp dfehc-unclogger db optimize_all', 'dynamic-front-end-heartbeat-control'));
                return;
            }

            if ($args[1] === 'optimize_all') {
                $before = $this->db->get_database_size();
                $this->db->optimize_all();
                $after = $this->db->get_database_size();

                WP_CLI::success(__('Before: ', 'dynamic-front-end-heartbeat-control') . $before . ', ' . __('after: ', 'dynamic-front-end-heartbeat-control') . $after);
                return;
            }
        }
    }
}

function dfehc_register_rest_routes() {
	
    register_rest_route('dfehc-unclogger/v1', '/woocommerce-transients/count/', array(
        'methods' => 'GET',
        'permission_callback' => array($this, 'permission_check'),
        'callback' => array($this, 'count_woocommerce_transients'),
    ));

    register_rest_route('dfehc-unclogger/v1', '/woocommerce-transients/delete/', array(
        'methods' => 'POST',
        'permission_callback' => array($this, 'permission_check'),
        'callback' => array($this, 'delete_woocommerce_transients'),
    ));

    register_rest_route('dfehc-unclogger/v1', '/woocommerce-cache/clear/', array(
        'methods' => 'POST',
        'permission_callback' => array($this, 'permission_check'),
        'callback' => array($this, 'clear_woocommerce_cache'),
    ));
}
