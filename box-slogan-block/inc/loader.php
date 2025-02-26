<?php 
/**
 * Plugin Main Loader File
 * 
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists( 'Wtrb_BoxSlogan_Blocks_Loader' ) ) {
	class Wtrb_BoxSlogan_Blocks_Loader {
			/**
			 * Constructor
			 * @return void
			 */
			public function __construct() {
					$this->includes();
			}

			/**
			 * Include all the required files
			 * @return void
			 */
			public function includes() {
				require_once WTRB_BOXSLOGAN_PATH . 'inc/classes/blocks-category.php';
				require_once WTRB_BOXSLOGAN_PATH . 'inc/classes/blocks-register.php';
				require_once WTRB_BOXSLOGAN_PATH . 'inc/classes/blocks-style.php';
			}

	}
}

new Wtrb_BoxSlogan_Blocks_Loader(); // Initialize the class instance