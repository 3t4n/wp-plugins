<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * The enqueues class.
 *
 * @since 1.0.0
 */
class Api_Widgets_Enqueues {


	/**
     * Main constructor
     *
     * @since 1.0.0
     *
     */
    public function __construct() {
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts_styles' ) );
    }

	/**
	 * Enqueue scripts and styles in the admin.
	 * 
	 */
	public function admin_scripts_styles( $hook_suffix ) {

		$v = API_WIDGETSVERSION;

		if( isset( $hook_suffix ) && strpos( $hook_suffix, 'api-widgets' ) !== false )  {
		    wp_enqueue_style( 'api-widgets-admin', API_WIDGETSURL .'assets/css/api-widgets-admin.css', false, $v );
		}

	}

}

return new Api_Widgets_Enqueues();