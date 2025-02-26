<?php
/**
 * This is the plugin activator class
 * 
 * @category   WordPress_Plugin
 * @package    Related_Posts_404
 * @subpackage Related_Posts_404/includes
 * @author     Ahmad Karim <ahmu83@gmail.com>
 * @license    https://opensource.org/licenses/GPL-2.0 GPL-2.0+
 * @link       https://ahmadkarim.com/
 */
class Rpp_Activator {

  public static function activate() {

    $rpp_activation_time = get_option('rpp_activation_time');
    $rpp_post_types = get_option('rpp_post_types');

    // First run
    if ($rpp_activation_time === false || $rpp_post_types === false) {

      self::_firstRun();

    }

  }

  private static function _firstRun() {

    $current_time = current_time('mysql');

    update_option('rpp_hide_admin_notice', 'no');
    update_option('rpp_activation_time', $current_time);
    update_option('rpp_display_notice_time', $current_time);

    self::_savePostTypes();

  }

  private static function _savePostTypes($builtin_only = false) {

    $types = Rpp_getPostTypes($builtin_only);

    unset($types['attachment']);

    $types = array_keys($types);

    update_option('rpp_post_types', $types);

  }

}


