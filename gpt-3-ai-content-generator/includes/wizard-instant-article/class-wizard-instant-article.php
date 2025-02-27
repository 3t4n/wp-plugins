<?php
/**
 * Wizard Core Class
 *
 * @class    WPOAI_Wizard_Instant_article
 * @package  includes
 * @version  0.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'WPOAI_Wizard_Instant_article', false ) ) :

/**
 * Wizard class.
 */
class WPOAI_Wizard_Instant_article {

	/**
	 * filter hook
	 *
	 * @var string
	 */
	private $_hook_prefix = 'WPOAI_Wizard_Instant_article/';

	/**
	 * Constructor.
	 */
	public function __construct() {
		// include all related files
		add_action( 'init', array( $this, 'includes' ), 0 );
	}

	/**
	 * includes all api files
	 */
	public function includes() {
		// classes
		include_once __DIR__ . '/class-wizard-instant-article-data.php';

	}
	
} // end - WPOAI_Wizard_Instant_article

return new WPOAI_Wizard_Instant_article();

endif; // end - class_exists

