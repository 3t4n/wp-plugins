<?php

/**
 * @package Datapocket
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

class Datapocket_Admin {

	/**
	 * Constructor
     *
     * @since 1.0.0
     *
     * @return void
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'includes' ) );
	}

    /**
	 * Include any classes we need within admin
     *
     * @since 1.0.0
     *
     * @return void
	 */
	public function includes() {

		include_once __DIR__ . '/class-datapocket-admin-page.php';
		include_once __DIR__ . '/class-datapocket-admin-menus.php';

		include_once __DIR__ . '/class-datapocket-admin-assets.php';
	}


}

new Datapocket_Admin();