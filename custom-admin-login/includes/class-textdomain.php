<?php

namespace CustomAdminLogin;

// If this file is called directly, abort.
defined( 'ABSPATH' ) || exit;

/**
 * Textdomain class
 *
 * @package        AdminLoginCustomizer
 * @subpackage     Init
 * @since          1.0.0
 * @author         Javier Prieto
 */
class Textdomain {

  /**
   * Single instance of this class
   *
   * @since     1.0.0
   * @var       Theme_Customizer
   */
  protected static $instance;

  /**
   * Main instance
   * Ensures only one instance of this class is loaded or can be loaded.
   *
   * @since   1.0.0
   * @static
   * @return  static
   */
  public static function &init() {
    if ( empty( self::$instance ) ) {
      self::$instance = new static();
    }

    return self::$instance;
  }

  /**
   * Class constructor
   * Declared as protected to prevent creating a new instance outside of the class via the new operator.
   *
   * @since   1.0.0
   */
  protected function __construct() {
    // This hook load the plugin textdomain
    add_action( 'plugins_loaded', [ $this, 'load_plugin_textdomain' ] );

    // This hook adds tanslation to plugin description
    add_action( 'all_plugins', [ $this, 'modify_plugin_description' ] );
  }

  /**
   * Load plugin textdomain
   *
   * @since     1.1.0
   */
  public static function load_plugin_textdomain() {
    load_plugin_textdomain( 'custom-admin-login', FALSE, basename( dirname( BASENAME ) ) . '/languages/' );
  }

  /**
   * Adds tanslation to plugin description
   *
   * @since     1.0.0
   * @param     array $all_plugins
   * @return    array
   */
  public static function modify_plugin_description( $all_plugins = [] ) {
    if ( key_exists( BASENAME, $all_plugins ) ) {
      $all_plugins[BASENAME]['Description'] = __( 'Allows you to customize the background, logo, url and caption on the WordPress login page.', 'custom-admin-login' );
    }
    return $all_plugins;
  }

  /**
   * Declared as private to prevent cloning of an instance of the class via the clone operator.
   *
   * @since   1.0.0
   */
  private function __clone() {
    
  }

  /**
   * Declared as private to prevent unserializing of an instance of the class via the global function unserialize().
   *
   * @since   1.0.0
   */
  private function __wakeup() {
    
  }

  /**
   * Declared as protected to prevent serializg of an instance of the class via the global function serialize().
   *
   * @since   1.0.0
   */
  protected function __sleep() {
    
  }

}
