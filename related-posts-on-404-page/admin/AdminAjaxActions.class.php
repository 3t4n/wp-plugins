<?php
/**
 * Contains all the admin AJAX actions
 * 
 * @category   WordPress_Plugin
 * @package    Related_Posts_404
 * @subpackage Related_Posts_404/includes
 * @author     Ahmad Karim <ahmu83@gmail.com>
 * @license    https://opensource.org/licenses/GPL-2.0 GPL-2.0+
 * @link       https://ahmadkarim.com/
 */
class Rpp_AdminAjaxActions {

  public function __construct() {

    add_action("wp_ajax_rpp_hide_notice", array($this, '_hideNotice'));
    add_action("wp_ajax_nopriv_rpp_hide_notice", array($this, '_hideNotice'));

    add_action("wp_ajax_rpp_remind_notice_later", array($this, '_remindNoticeLater'));
    add_action("wp_ajax_nopriv_rpp_remind_notice_later", array($this, '_remindNoticeLater'));

  }

  public function _hideNotice() {

    $nonce = $_GET['nonce'] ?? '';
    $nonce = sanitize_text_field($nonce);

    if (wp_verify_nonce($nonce, 'rpp_nonce') && current_user_can('administrator')) {

      update_option('rpp_hide_admin_notice', 'yes');

      wp_die('Done...!');

    }

  }

  public function _remindNoticeLater() {

    $nonce = $_GET['nonce'] ?? '';
    $nonce = sanitize_text_field($nonce);

    if (wp_verify_nonce($nonce, 'rpp_nonce') && current_user_can('administrator')) {

      update_option('rpp_hide_admin_notice', 'no');
      update_option('rpp_display_notice_time', current_time('mysql'));

      wp_die('Done...!');

    }

  }

}


