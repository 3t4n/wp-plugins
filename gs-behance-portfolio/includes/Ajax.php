<?php

namespace GSBEH;

// if direct access than exit the file.
defined('ABSPATH') || exit;

/**
 * Handle plugin ajax endpoints.
 * 
 * @since 2.0.12
 */
class Ajax {

    /**
     * Constructor of the class.
     * 
     * @since 2.0.12
     */
    public function __construct() {
        add_action( 'wp_ajax_gs_resync_behance_data', array( $this, 'resyncData' ) );
    }

    /**
     * Resync data on request.
     * 
     * @since  2.0.12
     * @return void
     */
    public function resyncData() {
        // gsbeh()->data->deleteSavedUserIds();
        gsbeh()->resyncDataTask();
        wp_send_json_success( __( 'Successfully synced data', 'gs-behance' ) );
    }
}