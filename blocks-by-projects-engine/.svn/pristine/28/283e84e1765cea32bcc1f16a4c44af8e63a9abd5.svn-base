<?php

namespace goodblocks;

class Activation {

    /**
	 * Activation constructor.
	 *
	 * @since 1.0.1
     * 
	 * @access public
	 */
	public function __construct() {
        /**
         * Path to the main file for using these hooks.
         */
        $dir =  plugin_dir_path(__DIR__) . 'goodblocks.php';

        /**
         * When the plugin is activated.
         */
        register_activation_hook( $dir, array( $this, 'activation_hook' ) );

		/**
         * When the plugin is deactivated.
         */
		register_deactivation_hook( $dir, array( $this, 'deactivation_hook' ) );
	}

    /**
     * Plugin is activated.
     *
     * @return void
     */
    public function activation_hook() {
        /**
         * Add the option when the plugin is activated.
         *
         * @since 1.0.1
         */
        update_option( '_gbpe_plugin_activated', true );
    }

    /**
     * Deactivate MegaEvents Organizer.
     *
     * @since 1.0.1
     *
     * @return void
     */
    public function deactivation_hook() {
        /**
         * Delete the option when the plugin is deactivated.
         *
         * @since 1.0.1
         */
        delete_option( '_gbpe_plugin_activated' );
        delete_option( '_gbpe_plugin_loaded' );
    }
}

new Activation;