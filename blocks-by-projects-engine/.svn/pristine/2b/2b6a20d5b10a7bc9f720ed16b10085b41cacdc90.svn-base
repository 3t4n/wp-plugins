<?php

namespace goodblocks;

class Hooks {

    /**
	 * App constructor.
	 *
	 * @since 1.0.1
     * 
	 * @access public
	 */
	public function __construct() {
        /**
         * When the plugin is loaded.
         */
        add_action('gbpe_loaded', array( $this, 'loaded' ));
	}

    /**
     * Plugin is activated.
     *
     * @return void
     */
    public function loaded() {
        // Update this option.
        update_option( '_gbpe_plugin_loaded', true );
    }
}

new Hooks;