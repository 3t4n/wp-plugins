<?php
/**
 * This is the plugin deactivator class
 * 
 * @category   WordPress_Plugin
 * @package    Related_Posts_404
 * @subpackage Related_Posts_404/includes
 * @author     Ahmad Karim <ahmu83@gmail.com>
 * @license    https://opensource.org/licenses/GPL-2.0 GPL-2.0+
 * @link       https://ahmadkarim.com/
 */
class Rpp_Deactivator {

  public static function deactivate() {

    // self::_deleteAll();

  }

  private static function _deleteAll() {

    delete_option('rpp_post_types');
    delete_option('rpp_activation_time');
    delete_option('rpp_hide_admin_notice');
    delete_option('rpp_display_notice_time');

  }

}

