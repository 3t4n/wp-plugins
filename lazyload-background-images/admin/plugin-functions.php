<?php

/**
 * @since 1.0.0
 * @author Proloy Bhaduri<support@proloybhaduri.com>
 */
function pblzbg_plugin_actions($actions)
{
  $links = array(
    'settings' => '<a href="' . esc_url(admin_url('options-general.php?page=lazyload-bg')) . '">Settings</a>',
    'support' => '<a style="color:orange;" href="' . esc_url('https://buymeacoffee.com/proloybhaduri') . '" target="_blank">Buy Developer A Coffee</a>',
    'hire_me' => '<a style="color:green;font-weight:700;" href="' . esc_url('mailto:proloybhaduri@gmail.com') . '" target="_blank">Hire For Speed Optimization</a>'
  );
  $actions = array_merge($actions, $links);
  return $actions;
}

if (
  !is_admin() && !pblzbg_is_builder_page()
) {
  ob_start(function ($buffer) {
    $buffer = apply_filters('pblzbg_buffer', $buffer);
    return $buffer;
  });
}
function pblzbg_is_builder_page()
{
  // bailout if doing ajax 
  if (defined('DOING_AJAX') && DOING_AJAX) {
    return true;
  }


  // bailout if doing cron 
  if (defined('DOING_CRON') && DOING_CRON) {
    return true;
  }

  // bailout if beaver builder is active 
  if (class_exists('FLBuilderModel')) {
    if (FLBuilderModel::is_builder_active()) {
      return true;
    }
  }

  // bailout if elementor preview mode is active
  if (class_exists('Elementor\Plugin')) {
    if (Elementor\Plugin::$instance->preview->is_preview_mode()) {
      return true;
    }
  }

  // bailout if WP Bakery Page Builder is active
  if (class_exists('Vc_Manager')) {
    if (Vc_Manager::getInstance()->editor()->inited()) {
      return true;
    }
  }

  // bailout if avada builder is active
  if (class_exists('FusionBuilder')) {
    if (FusionBuilder::is_builder_frame()) {
      return true;
    }
  }

  // bailout for ajax response 
  if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    return true;
  }

  // bailout if rest api 
  if (defined('REST_REQUEST') && REST_REQUEST) {
    return true;
  }
  // bailout if wordpress rest apis 
  if (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], '/wp-json/') !== false) {
    return true;
  }
  // bailout if  block editor 
  if (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], '/wp-admin/post.php') !== false) {
    return true;
  }

  // bailout if  block request 
  if (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], '/wp-admin/admin-ajax.php') !== false) {
    return true;
  }

  $builders = apply_filters('pblzbg_builders', array(
    'ct_builder' => true,
    'et_fb' => 1,
    'bricks' => 'run',
    'breakdance' => 'builder'
  ));

  foreach ($builders as $builder => $value) {
    if (isset($_GET[$builder]) && sanitize_text_field($_GET[$builder]) == $value) {
      return true;
    }
  }
  return false;
}

function pblzbg_activator()
{
  add_option('pb_lazybg_settings', []);
}
register_activation_hook(PBLZBG_PLUGIN_FILE, 'pblzbg_activator');

function pblzbg_deactivator()
{
  flush_rewrite_rules(true);
}

register_deactivation_hook(PBLZBG_PLUGIN_FILE, 'pblzbg_deactivator');
// Enqueue Scripts 
add_action('admin_enqueue_scripts', 'pblzbg_load_admin_scripts');

function pblzbg_load_admin_scripts()
{
  if (isset($_GET['page']) && strpos($_GET['page'], 'lazyload-bg') !== false) {

    #Styles

    wp_register_style(
      'pblzbg-admin-main',
      plugins_url('admin/assets/css/pblzbg-admin-main.css', PBLZBG_PLUGIN_FILE),
      false,
      PBLZBG_PLUGIN_VERSION
    );
    wp_enqueue_style('pblzbg-admin-main');


    #Scripts 

    wp_register_script(
      'pblzbg-admin-main',
      plugins_url('admin/assets/js/pblzbg-admin-main.js', PBLZBG_PLUGIN_FILE),
      array('jquery'),
      PBLZBG_PLUGIN_VERSION,
      true
    );

    wp_enqueue_script('pblzbg-admin-main');
  }
}

/*Ajax handler */
if (!function_exists('pblzbg_save_settings_process')) {

  add_action('wp_ajax_pblzbg_save_settings', 'pblzbg_save_settings_process');
  function pblzbg_save_settings_process()
  {

    if (isset($_POST['pblzbg_settings_data'])) {
      $settings_data =  sanitize_text_field($_POST['pblzbg_settings_data']);
      $settings_array = json_decode(trim(stripslashes($settings_data)), true);

      if (update_option('pb_lazybg_settings', $settings_array)) {
        $resarr = array(
          'msg' => 'Settings Saved',
          'success' => 1,
          'resp' => $settings_array,
          'notice_html' =>  __('<div class="notice inline pblzbg-notice notice-success  flex w-100 is-dismissible"><p>Settings Saved Successfully </p></div>', 'lazyload-bg'),
        );
        echo json_encode($resarr);
      } else {
        $resarr = array(
          'msg' => 'Failed',
          'success' => 0,
          'notice_html' =>  __('<div class="notice inline pblzbg-notice notice-error is-dismissible"><p>Failed to save settings </p></div>', 'lazyload-bg'),
        );
        echo json_encode($resarr);
      }
    }
    wp_die();
  }
}
/**
 *  Settings Page 
 */
class PBLZBG_Settings_Page
{


  function __construct()
  {
    add_action('admin_menu', array($this, 'admin_menu'));
  }

  function admin_menu()
  {
    add_options_page(
      __('Lazy Backgrounds', 'lazyload-bg'),
      __('Lazy Backgrounds', 'lazyload-bg'),
      'manage_options',
      'lazyload-bg',
      array(
        $this,
        'settings_page'
      )
    );
  }


  function settings_page()
  {
    define('IWPFF_ALLOWED_TEMPLATE', 'ALLOWED');
    include_once PBLZBG_PLUGIN_DIR . 'admin/initialize.php';
  }
}

new PBLZBG_Settings_Page;
