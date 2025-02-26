<?php
/**
 * Fired during plugin deactivation
 *
 * @link       https://made4wp.com
 * @since      1.0.0
 * @package    M4WP Portfolio
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    M4WP Portfolio

 */
class M4wp_Portfolio_Deactivator {

  public static function deactivate() {
    flush_rewrite_rules();
  }

}
