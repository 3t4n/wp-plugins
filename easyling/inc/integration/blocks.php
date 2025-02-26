<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'easyling_blocks' ) ) :

final class easyling_blocks {

  /**
   * Plugin instance
   *
   * @var object $instance
   */
  protected static $instance;
  
  
  /**
   *  Initialize easyling_blocks
   */
  private function __construct() {
		add_action( 'enqueue_block_editor_assets', array( $this, 'block_editor_assets' ) );
  }


  /**
   *  Create or retrieve instance. Singleton pattern
   *
   *  @static
   *
   *  @return object easyling_blocks instance
   */
  public static function instance() {
    return self::$instance ? self::$instance : self::$instance = new self();
  }


	/**
	 *  Enqueues block assets
	 */
	public function block_editor_assets() {
		require_once( easyling()->get_setting('path') . 'inc/integration/blocks/language-selector/block-editor-assets.php' );
	}

}


/**
 *  The main function responsible for returning easyling_blocks plugin
 *
 *  @return (object) easyling_blocks instance
 */
function easyling_blocks() {
  return easyling_blocks::instance();
}


// initialize
easyling_blocks();

endif; // class_exists check

?>
