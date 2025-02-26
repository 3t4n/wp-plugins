<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'easyling_shortcodes' ) ) :

final class easyling_shortcodes {

  /**
   * Plugin instance
   *
   * @var object $instance
   */
  protected static $instance;


  /**
   *  Initialize easyling_shortcodes
   */
  private function __construct() {
		add_shortcode( 'easyling_language_selector', array( $this, 'language_selector' ) );
  }


  /**
   *  Create or retrieve instance. Singleton pattern
   *
   *  @static
   *
   *  @return object easyling_shortcodes instance
   */
  public static function instance() {
    return self::$instance ? self::$instance : self::$instance = new self();
  }


	/**
	 *  Renders language selector shortcode
	 */
	public function language_selector( $atts, $content = null ) {
    $atts = shortcode_atts( array(), $atts, 'easyling_language_selector' );

    ob_start();
		include( easyling()->get_setting('path') . 'inc/integration/shortcodes/language-selector.php' );
		$html = ob_get_clean();

	  // Allow 3rd parties to adjust
		$html = apply_filters( 'easyling_language_selector_shortcode_html', $html, compact( 'atts', 'content' ) );

		return $html;
	}

}


/**
 *  The main function responsible for returning easyling_shortcodes plugin
 *
 *  @return (object) easyling_shortcodes instance
 */
function easyling_shortcodes() {
  return easyling_shortcodes::instance();
}


// initialize
easyling_shortcodes();

endif; // class_exists check

?>
