<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

require_once( easyling()->get_setting('path') . 'inc/integration/widgets/language-selector.php' );

if ( ! class_exists( 'easyling_widgets' ) ) :

final class easyling_widgets {

  /**
   * Plugin instance
   *
   * @var object $instance
   */
  protected static $instance;
  
  
  /**
   *  Initialize easyling_widgets
   */
  private function __construct() {
		add_action( 'widgets_init', array( $this, 'init_widgets' ) );
  }


  /**
   *  Create or retrieve instance. Singleton pattern
   *
   *  @static
   *
   *  @return object easyling_widgets instance
   */
  public static function instance() {
    return self::$instance ? self::$instance : self::$instance = new self();
  }


	/**
	 *  Register widgets
	 */
	public function init_widgets() {
	  register_widget( 'easyling_language_selector' );
	}

}


/**
 *  The main function responsible for returning easyling_widgets plugin
 *
 *  @return (object) easyling_widgets instance
 */
function easyling_widgets() {
  return easyling_widgets::instance();
}


// initialize
easyling_widgets();

endif; // class_exists check

?>
