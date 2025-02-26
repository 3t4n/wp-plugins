<?php if (!defined('ABSPATH')) {
  die;
} // Cannot access directly.

/**
 * Admin Menu
 */

if (!class_exists('FlexiType_Lite_Admin_Page')) {

  class FlexiType_Lite_Admin_Page
  {
    private static $instance = null;

    public static function init()
    {
      if (is_null(self::$instance)) {
        self::$instance = new self();
      }
      return self::$instance;
    }

    public function __construct()
    {
      add_action('admin_menu', array($this, 'flexitype_page_menu'), 1);
      add_action('admin_enqueue_scripts', array($this, 'flexitype_page_assets'));

    }

    public function flexitype_page_menu()
    {

      add_menu_page(
        esc_html__('FlexiType', 'flexitype-lite'),
        esc_html__('FlexiType', 'flexitype-lite'),
        'manage_options',
        'flexitype',
        array(
          $this,
          'flexitype_page_welcome'
        ),
        FLEXITYPE_LITE_ASSETS . 'admin/assets/img/icon.svg',
        80
      );

      add_submenu_page(
        'flexitype',
        esc_html__('Help & Updates', 'flexitype-lite'),
        esc_html__('Help & Updates', 'flexitype-lite'),
        'manage_options',
        'flexitype',
        array($this, 'flexitype_page_welcome'),
      );

        add_submenu_page(
          'flexitype',
          esc_html__('Custom Templates', 'flexitype-lite'),
          esc_html__('Custom Templates', 'flexitype-lite'),
          'manage_options',
          'edit.php?post_type=flexitype_builder',
        );

    }
    public function flexitype_page_welcome()
    {
        include FLEXITYPE_LITE_PATH . 'admin/dashboard.php';
    }
    /**
 * Register and enqueue a custom stylesheet in the WordPress admin.
 */
    public function flexitype_page_assets()
    {
      wp_register_style('flexitype-admin-css', FLEXITYPE_LITE_ASSETS . 'admin/assets/css/admin.css', array(), 1, 'all');
      wp_register_style('flexitype-admin-fonts', '//fonts.googleapis.com/css?family=Inter:400,500,600',  array(), FLEXITYPE_LITE_VERSION, null);

      wp_enqueue_style('flexitype-admin-css');
      wp_enqueue_style('flexitype-admin-fonts');
    }


  }

  FlexiType_Lite_Admin_Page::init();
}