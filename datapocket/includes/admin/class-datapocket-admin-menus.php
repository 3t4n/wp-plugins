<?php

/**
 * @package Datapocket
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

class Datapocket_Admin_Menus {

    /**
     * Hook into actions and filters.
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function __construct() {
        // Add menus.
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
    }

    /**
     * Add admin menu page.
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function admin_menu()
    {
        add_menu_page( __( 'Datapocket', 'datapocket' ), __( 'Datapocket', 'datapocket' ), 'manage_options', 'datapocket', array( $this, 'admin_page' ), datapocket()->plugin_url() . '/assets/img/menu-icon.svg' );
    }

    /**
     * Init the admin page.
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function admin_page() {
        Datapocket_Admin_Page::output();
    }

}

new Datapocket_Admin_Menus();