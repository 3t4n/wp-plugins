<?php

/**
 * Class AJAX Loading
 * The file that defines the core plugin class
 *
 * @author Mahesh Thorat
 * @link https://maheshthorat.web.app
 * @version 1.1
 * @package WP_Ajax_loading
 */
class WP_Ajax_loading_Core
{
   /**
    * The unique identifier of this plugin
    */
   protected $plugin_name;

   /**
    * The current version of the plugin
    */
   protected $version;

   /**
    * Define the core functionality of the plugin
    */
   public function __construct()
   {
      $this->plugin_name = WPAJXL_PLUGIN_IDENTIFIER;
      $this->version = WPAJXL_PLUGIN_VERSION;
   }
   public function run()
   {
      /**
       * The admin of plugin class 
       * admin related content and options
       */
      require WPAJXL_PLUGIN_ABS_PATH . 'admin/class-ajax-loading-admin.php';

      $plugin_admin = new WP_ajax_loading_Admin($this->get_plugin_name(), $this->get_version());
      if (is_admin()) {
         add_action('admin_enqueue_scripts', array($plugin_admin, 'enqueue_backend_standalone'));
         add_action('admin_menu', array($plugin_admin, 'return_admin_menu'));
         add_action('init', array($plugin_admin, 'return_update_options'));
         add_filter('plugin_action_links_ajax-loading/ajax-loading.php', array($plugin_admin, 'wpajxl_settings_link'));
      }

      $opts = get_option('_wp_ajax_loading');
      if (!is_admin()) {
         if (@$opts['enable_plugin'] == 'on') {
            add_action('wp_head', array($plugin_admin, 'call_action_enable_plugin'));
            remove_action('wp_head', 'print_emoji_detection_script', 7);
            remove_action('wp_print_styles', 'print_emoji_styles');

            remove_action('admin_print_scripts', 'print_emoji_detection_script');
            remove_action('admin_print_styles', 'print_emoji_styles');
         }
      }
      if (is_admin()) {
         $version = get_option($this->get_plugin_name());
         if ($version == '') {
            update_option($this->get_plugin_name(), $this->get_version());
            $opts = array('enable_plugin' => 'on');
            $data = update_option('_wp_ajax_loading', $opts);
         }
      }
   }

   public function get_plugin_name()
   {
      return $this->plugin_name;
   }
   public function get_version()
   {
      return $this->version;
   }
}
