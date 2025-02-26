<?php

namespace goodblocks;

/**
 * This is the main class.
 *
 * @class GoodBlocks
 */
class GoodBlocks {
    /**
	 * GoodBlocks constructor.
	 *
	 * @since 1.0.1
     * 
	 * @access public
	 */
	public function __construct() {
		/**
         * Activation and deactivation hooks.
         */
		require_once  'activation.php';

		/**
         * Initialize the plugin.
         */
		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}

    /**
	 * Validates that LearnDash LMS is already loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all checks have passed include the plugin classes.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.1
	 * @access public
	 */
	public function init() {

        /**
         * Let's create some custom hooks.
         */
        require_once 'hooks.php';

		/**
		 * Let's load everything.
		 */
        require_once 'app.php';

        /**
         * We have passed all validation checks and now our plugin is safely loaded.
         */
        do_action( 'gbpe_loaded' );
	}
}