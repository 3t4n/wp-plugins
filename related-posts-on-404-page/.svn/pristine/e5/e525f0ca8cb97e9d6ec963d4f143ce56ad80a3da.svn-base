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
class Rpp_AdminNotice {

  public function __construct() {

    add_action('admin_notices', array($this, 'adminNotice'));

  }

  /**
   * Handler method for admin_menu action
   *
   * @return void
   */
  public function adminNotice() {

    if ($this->_displayNoticeValidate()) {

      $this->_displayNotice();

    }

  }

  private function _displayNotice() {

    Rpp_inc('admin/partials/notice-info.php');

  }

  private function _displayNoticeValidate() {

    $display_notice = false;

    if (get_option('rpp_activation_time') === false) {

      $current_time = current_time('mysql');

      update_option('rpp_hide_admin_notice', 'no');
      update_option('rpp_activation_time', $current_time);
      update_option('rpp_display_notice_time', $current_time);

    }

    $rpp_hide_admin_notice = get_option('rpp_hide_admin_notice');
    $rpp_display_notice_time = get_option('rpp_display_notice_time');
    $current_time = current_time('mysql');

    $time1 = strtotime($current_time);
    $time2 = strtotime($rpp_display_notice_time);

    $difference_days = $time1 - $time2;
    $difference_days = round($difference_days / (60 * 60 * 24));

    // Display notice after x days

    if (current_user_can('administrator') && 
        $rpp_hide_admin_notice == 'no' && 
        $difference_days >= RPP_DISPLAY_NOTICE_DAYS) {

      $display_notice = true;

    }

    return $display_notice;

  }

}

