<?php

/**
 * @package Datapocket
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

class Datapocket_Admin_Assets {

    /**
     * Constructor
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function __construct() {
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_styles' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
    }

    /**
     * Enqueue styles
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function admin_styles() {

        $screen    = get_current_screen();
		$screen_id = $screen ? $screen->id : '';

        wp_register_style( 'datapocket_bootstrap', datapocket()->plugin_url() . '/assets/css/bootstrap.min.css' );
        wp_register_style( 'datapocket_admin_styles', datapocket()->plugin_url() . '/assets/css/admin.css', array( 'datapocket_bootstrap' ), DATAPOCKET_VERSION );

        // Admin styles for datapocket pages only.
        if ( in_array( $screen_id, array( 'toplevel_page_datapocket' ) ) ) {
            wp_enqueue_style( 'datapocket_admin_styles' );
        }

    }

    /**
     * Enqueue scripts
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function admin_scripts() {
        $screen    = get_current_screen();
		$screen_id = $screen ? $screen->id : '';

        // Admin styles for datapocket pages only.
        if ( in_array( $screen_id, array( 'toplevel_page_datapocket' ) ) ) {
            wp_enqueue_script( 'jquery' );
        }
    }

}

new Datapocket_Admin_Assets();