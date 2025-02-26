<?php
if (!defined('ABSPATH')) {
  exit();
}

class Autorepl_Admin
{
  private $version;

  public function __construct($version)
  {
    $this->version = $version;
  }

  public function enqueue_styles($hook)
  {
    if ($hook === 'toplevel_page_autorepl/settings') {
      wp_enqueue_style(
        'bulma',
        plugin_dir_url(__FILE__) . 'css/bulma.min.css',
        [],
        $this->version,
        'all'
      );
    }
  }

  public function my_admin_menu()
  {
    add_menu_page(
      'AutoRepl Settings',
      'AutoRepl',
      'manage_options',
      'autorepl/settings.php',
      [$this, 'autorepl_settings_callback'],
      'dashicons-format-chat',
      250
    );
  }

  public function autorepl_settings_callback()
  {
    require_once 'partials/autorepl-admin-display.php';
  }

  public function register_autorepl_settings()
  {
    register_setting('autorepl', 'url', [
      'sanitize_callback' => 'sanitize_text_field',
    ]);
    register_setting('autorepl', 'embed_type', [
      'sanitize_callback' => 'sanitize_text_field',
    ]);
    register_setting('autorepl', 'popup_delay', [
      'sanitize_callback' => 'sanitize_text_field',
    ]);
    register_setting('autorepl', 'bubble_delay', [
      'sanitize_callback' => 'sanitize_text_field',
    ]);
    register_setting('autorepl', 'chat_delay', [
      'sanitize_callback' => 'sanitize_text_field',
    ]);
    register_setting('autorepl', 'avatar', [
      'sanitize_callback' => 'sanitize_text_field',
    ]);
    register_setting('autorepl', 'text_content', [
      'sanitize_callback' => 'sanitize_text_field',
    ]);
    register_setting('autorepl', 'button_color', [
      'sanitize_callback' => 'sanitize_text_field',
    ]);
    register_setting('autorepl', 'chat_included_pages', [
      'sanitize_callback' => 'sanitize_text_field',
    ]);
    register_setting('autorepl', 'popup_included_pages', [
      'sanitize_callback' => 'sanitize_text_field',
    ]);
    register_setting('autorepl', 'chat_icon', [
      'sanitize_callback' => 'sanitize_text_field',
    ]);
    register_setting('autorepl', 'custom_code', [
      'sanitize_callback' => 'sanitize_text_field',
    ]);
    register_setting('autorepl', 'config_type', [
      'sanitize_callback' => 'sanitize_text_field',
    ]);
    register_setting('autorepl', 'dont_show_callout_twice', [
      'sanitize_callback' => 'sanitize_text_field',
    ]);
  }
}
