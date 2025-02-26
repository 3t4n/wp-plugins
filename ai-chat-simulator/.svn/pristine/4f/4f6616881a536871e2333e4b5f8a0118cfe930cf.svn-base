<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class BOAI_Chat_Simulator
{
    public function __construct()
    {
        $this->load_dependencies();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    private function load_dependencies()
    {
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/admin.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/api.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'public/public.php';
    }

    private function define_admin_hooks()
    {
        $plugin_admin = new BOAI_Chat_Simulator_Admin();
        add_action('admin_enqueue_scripts', array($plugin_admin, 'enqueue_styles'));
        add_action('admin_menu', array($plugin_admin, 'add_plugin_admin_menu'));
        add_action('admin_init', array($plugin_admin, 'register_and_build_fields'));
        add_action('wp_ajax_message_handler', array($plugin_admin, 'message_handler'));
        add_action('wp_ajax_nopriv_message_handler', array($plugin_admin, 'message_handler'));
        add_action('wp_ajax_get_chat_history', array($plugin_admin, 'get_chat_history'));
        add_action('wp_ajax_nopriv_get_chat_history', array($plugin_admin, 'get_chat_history'));
    }

    private function define_public_hooks()
    {
        $plugin_public = new BOAI_Chat_Simulator_Public();
        add_action('wp_enqueue_scripts', array($plugin_public, 'enqueue_styles'));
        add_action('wp_enqueue_scripts', array($plugin_public, 'enqueue_scripts'));
        add_shortcode('boai_chatgpt_simulator', array($plugin_public, 'display_chat_interface'));
    }

    public function run()
    {
        add_action('plugins_loaded', array($this, 'load_plugin_textdomain'));
    }

    public function load_plugin_textdomain()
    {
        load_plugin_textdomain('chatgpt-simulator', false, plugin_basename(dirname(__FILE__)) . '/languages');
    }
}
