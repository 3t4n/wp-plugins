<?php
if (!defined('ABSPATH')) {
  exit;
}

class Dealfront
{

  public function init()
  {
    $this->init_dealfront_admin();
    $this->enqueue_script();
    $this->enqueue_admin_styles();
  }

  public function init_dealfront_admin()
  {
    register_setting('dealfront', 'leadfeeder_tracker_id');
    add_action('admin_menu', array($this, 'create_dealfront_nav_page'));
  }

  public function create_dealfront_nav_page()
  {
    require_once plugin_dir_path(__DIR__) . '/../admin/includes/logo.php';
    $menu_icon = (new Dealfront_Logo())->get_base64_logo();

    add_menu_page(
      DEALFRONT_PLUGIN_MENU_LABEL,
      DEALFRONT_PLUGIN_MENU_LABEL,
      'manage_options',
      'tracker_settings',
      array($this, 'admin_view'),
      $menu_icon
    );
  }

  public static function admin_view()
  {
    require_once plugin_dir_path(__FILE__) . 'settings.php';
  }

  public static function dealfront_script()
  {
    $leadfeeder_tracker_id = filter_var(get_option('leadfeeder_tracker_id'), FILTER_SANITIZE_STRING);
    $is_admin = is_admin();

    if (!$leadfeeder_tracker_id) {
      return;
    }

    if ($is_admin) {
      return;
    }

    if (strpos($leadfeeder_tracker_id, 'v1') === 0) {
      $leadfeeder_tracker_id = explode('_', $leadfeeder_tracker_id)[1];
    }

    require_once plugin_dir_path(__DIR__) . '/../admin/includes/script-generator.php';
  }

  private function enqueue_script()
  {
    add_action('wp_head', array($this, 'dealfront_script'));
  }

  private function enqueue_admin_styles()
  {
    add_action('admin_enqueue_scripts', array($this, 'dealfront_admin_styles'));
  }

  public static function dealfront_admin_styles()
  {
    wp_register_style(
      'dealfront_custom_admin_style',
      plugins_url('../static/dealfront-admin.css', __FILE__),
      array(),
      1717676114 // timestamp when the css was modified
    );
    wp_enqueue_style('dealfront_custom_admin_style');
  }
}
?>
