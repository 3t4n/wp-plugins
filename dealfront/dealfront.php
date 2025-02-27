<?php
/**
 * Plugin Name: Leadfeeder by Dealfront
 * Description: Turn page views into pipeline
 * Author: Dealfront
 * Author URI: https://www.dealfront.com/?utm_source=wordpress&utm_medium=plugin
 * Version: 1.1.0
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
 * Text Domain: dealfront
 *
 */

if (!defined('ABSPATH')) {
  exit;
}

define(
  'DEALFRONT_PLUGIN_MENU_LABEL',
  'Leadfeeder by Dealfront'
);

define(
  'DEALFRONT_PLUGIN_BASENAME',
  plugin_basename(__FILE__)
);

add_action('plugins_loaded', 'dealfront_plugin_init');

function dealfront_plugin_init()
{

  if (class_exists('LeadfeederByDealfront')) {
    return LeadfeederByDealfront::get_instance();
  }

  class LeadfeederByDealfront
  {
    /**
     * @var Const Plugin Version Number
     */
    const VERSION = '1.1.0';

    /**
     * @var Singleton The reference the *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     *
     * @return Singleton The *Singleton* instance.
     */
    public static function get_instance()
    {
      if (null === self::$instance) {
        self::$instance = new self();
      }
      return self::$instance;
    }

    /**
     * Protected constructor to prevent creating a new instance of the
     * *Singleton* via the `new` operator from outside of this class.
     */
    private function __construct()
    {
      add_action('admin_init', array($this, 'install'));
      add_action('admin_enqueue_scripts', array($this, 'enqueue_validator_script'));
      add_filter('plugin_action_links', array($this, 'add_settings_link'), 10, 2);
      $this->init();
    }

    /**
     * Init the plugin after plugins_loaded so environment variables are set.
     *
     * @since 1.1.0
     */
    public function init()
    {
      require_once(dirname(__FILE__) . '/admin/views/admin.php');
      $dealfront = new Dealfront();
      $dealfront->init();
    }

    public function enqueue_validator_script()
    {
      wp_enqueue_script(
        'dealfront',
        plugins_url('admin/static/validator.js', __FILE__),
        array('jquery'),
        1714557814, // timestamp when the js was modified, remember to update this when you modify the js code
        array('in_footer' => true)
      );
    }

    /**
     * Updates the plugin version in db
     *
     * @since 1.1.0
     */
    public function update_plugin_version()
    {
      delete_option('dealfront_version');
      update_option('dealfront_version', self::VERSION);
    }

    /**
     * Handles upgrade routines.
     *
     * @since 1.1.0
     */
    public function install()
    {
      if (!is_plugin_active(plugin_basename(__FILE__))) {
        return;
      }

      if ((self::VERSION !== get_option('dealfront_version'))) {

        $this->update_plugin_version();
      }
    }

    /**
     * Adds plugin action links.
     *
     * @since 1.1.0
     */
    public function add_settings_link($links, $file)
    {
      if ( $file != DEALFRONT_PLUGIN_BASENAME ) {
        return $links;
      }

      $plugin_links = array(
        sprintf(
          '<a href="%s">Settings</a>',
          esc_url(admin_url("admin.php?page=tracker_settings"))
        )
      );
      return array_merge($plugin_links, $links);
    }
  }

  LeadfeederByDealfront::get_instance();
}
