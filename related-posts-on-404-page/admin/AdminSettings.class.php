<?php
/**
 * This file contains the 
 * admin page class definition
 * 
 * PHP Version 7.4.9
 * 
 * @category   WordPress_Plugin
 * @package    Related_Posts_404
 * @subpackage Related_Posts_404/admin
 * @author     Ahmad Karim <ahmu83@gmail.com>
 * @license    https://opensource.org/licenses/GPL-2.0 GPL-2.0+
 * @link       https://ahmadkarim.com/
 * @since      1.0.0
 */

/**
 * This is the class for admin settings page
 * 
 * PHP Version 7.4.8
 * 
 * @category   WordPress_Plugin
 * @package    Related_Posts_404
 * @subpackage Related_Posts_404/admin
 * @author     Ahmad Karim <ahmu83@gmail.com>
 * @license    https://opensource.org/licenses/GPL-2.0 GPL-2.0+
 * @link       https://ahmadkarim.com/
 * @since      1.0.0
 */
class Rpp_AdminSettings {

  public function __construct() {

    add_action('admin_menu', array(&$this, 'adminMenu'));

  }

  /**
   * Handler method for admin_menu action
   *
   * @return void
   */
  public function adminMenu() {

    add_submenu_page(
      'options-general.php',
      'Related Posts On 404 Page • Settings',
      '404 Related Posts',
      'administrator',
      'rpp_settings',
      array($this, 'settingsPage')
    );

  }

  /**
   * Display the admin form
   * 
   * @return [void]
   */
  public function settingsPage() {

    $update = self::_updateSettings();

    $action = admin_url('options-general.php?page=rpp_settings');
    $nonce = wp_create_nonce('rpp_settings_form');
    $errors = $update['errors'] ?? array();
    $success = $update['success'] ?? array();

    Rpp_validate_post_types();

    $post_types = Rpp_getPostTypes();
    $rpp_post_types = get_option('rpp_post_types');
    $rpp_post_types = $rpp_post_types ? $rpp_post_types : array();

    include_once Rpp_dir('admin/partials/settings.php');

  }

  /**
   * Update the settings form in admin
   * 
   * @return array
   */
  private static function _updateSettings() {

    $response = array();

    if (!isset($_POST['submit'])) {

      return $response;

    }

    $nonce = $_POST['nonce'] ?? false;
    $nonce = sanitize_text_field($nonce);

    $nonce_verify = wp_verify_nonce($nonce, 'rpp_settings_form');

    $errors = array();
    $success = array();

    if ($nonce_verify !== false) {

      $post_types = $_POST['post_types'] ?? array();
      $post_types = array_map('sanitize_text_field', $post_types);
      $post_types = array_map('sanitize_title', $post_types);

      update_option('rpp_post_types', $post_types);

      $success[] = "Updated successfully!";

    } else {

      $errors[] = "Permission denied! Try again later.";

    }

    $response['errors'] = $errors;
    $response['success'] = $success;

    return $response;

  }

  private function _test() {

    print_are($rpp_post_types, '$rpp_post_types');

    $t = '2020-09-6 22:16:32';

    update_option('rpp_display_notice_time', $t);

  }

}

