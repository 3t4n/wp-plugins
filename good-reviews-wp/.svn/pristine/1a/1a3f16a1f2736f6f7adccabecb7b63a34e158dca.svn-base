<?php
if ( !defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'grfwpHelper' ) ) {
/**
 * Class to to provide helper functions
 *
 * @since 2.1.8
 */
class grfwpHelper {

  // Hold the class instance.
  private static $instance = null;

  /**
   * The constructor is private
   * to prevent initiation with outer code.
   * 
   **/
  private function __construct() {}

  /**
   * The object is created from within the class itself
   * only if the class has no instance.
   */
  public static function getInstance() {

    if ( self::$instance == null ) {

      self::$instance = new grfwpHelper();
    }
 
    return self::$instance;
  }

  /**
   * Handle ajax requests from the admin bookings area from logged out users
   * @since 2.1.8
   */
  public static function admin_nopriv_ajax() {

    wp_send_json_error(
      array(
        'error' => 'loggedout',
        'msg' => sprintf( __( 'You have been logged out. Please %slogin again%s.', 'good-reviews-wp' ), '<a href="' . wp_login_url( admin_url( 'admin.php?page=grfwp-dashboard' ) ) . '">', '</a>' ),
      )
    );
  }

  /**
   * Handle ajax requests where an invalid nonce is passed with the request
   * @since 2.1.8
   */
  public static function bad_nonce_ajax() {

    wp_send_json_error(
      array(
        'error' => 'badnonce',
        'msg' => __( 'The request has been rejected because it does not appear to have come from this site.', 'good-reviews-wp' ),
      )
    );
  }

  /**
   * Escapes PHP data being passed to JS, recursively
   * @since 3.1.0
   */
  public static function escape_js_recursive( $values ) {

    $return_values = array();

    foreach ( (array) $values as $key => $value ) {

      if ( is_array( $value ) ) {

        $value = grfwpHelper::escape_js_recursive( $value );
      }
      elseif ( ! is_scalar( $value ) ) { 

        continue;
      }
      else {

        $value = html_entity_decode( (string) $value, ENT_QUOTES, 'UTF-8' );
      }
      
      $return_values[ $key ] = $value;
    }

    return $return_values;
  }
}

}