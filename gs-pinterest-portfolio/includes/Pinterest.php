<?php

namespace GSPIN;

// if direct access than exit the file.
defined( 'ABSPATH' ) || exit;

class Pinterest {

    /**
     * Returns the fetched user pins.
     * 
     * @param  array $fields The specific fields names that need to map.
     * 
     * @since  2.0.9
     * @return array         The plucked pins based on the fields name.
     */

    public function __construct() {

        add_action( 'gs_pinterest_pin_sync_event', [ $this, 'sync_pins' ], 10, 2 );

    }

    public function sync_pins( $username, $board = '' ) {
            
        $response = $this->get_pinterest_response( $username, $board );

        if ( is_array( $response ) && ! is_wp_error( $response ) ) {
            
            $body = json_decode( wp_remote_retrieve_body( $response ), true );

            if ( ! empty( $body['data'] ) ) {
                update_option( $this->get_option_key( $username, $board ), $body['data'] );
            }

        }

    }

    public function get_pinterest_response( $username, $board = '' ) {
        if ( empty($board) ) {
            $url = sprintf( 'https://api.pinterest.com/v3/pidgets/users/%s/pins/', $username );
        } else {
            $url = sprintf( 'https://api.pinterest.com/v3/pidgets/boards/%s/%s/pins/', $username, $board );
        }
        return wp_remote_get( esc_url_raw( $url ) );
    }

    public function get_option_key( $username, $board = '' ) {
        return "gspin_{$username}_{$board}_pins";
    }

    public function get_data( $username, $board = '' ) {

        if ( empty($username) ) return [];
        
        $option_key = $this->get_option_key( $username, $board );
        $savedData    = get_option( $option_key );

        $args = array_filter( array( $username, $board ) );
        if ( ! wp_next_scheduled ( 'gs_pinterest_pin_sync_event', $args ) ) {
            wp_schedule_event( time(), 'daily', 'gs_pinterest_pin_sync_event', $args );
        }

        if ( false === $savedData ) {
            
            $response = $this->get_pinterest_response( $username, $board );

            if ( is_array( $response ) && ! is_wp_error( $response ) ) {
                $body = json_decode( wp_remote_retrieve_body( $response ), true );
                if ( ! empty( $body['data'] ) ) {
                    $savedData = $body['data'];
                    update_option( $option_key, $savedData );
                } else {
                    $savedData = [];
                }
            }
        }

        return $savedData;
    }

    public function getBoardPinsByUser( $username, $board, $count, $fields = [] ) {
        $savedData = $this->get_data( $username, $board );
        if ( empty( $savedData ) || empty( $savedData['pins'] ) ) return [];
        return gspin()->helpers->pluck( $savedData['pins'], $count, $fields );
    }

    public function getUserProfile( $username, $count = 50, $fields = [] ) {
        $savedData = $this->get_data( $username );
        if ( empty( $savedData ) || empty( $savedData['pins'] ) ) return [];
        $savedData['pins'] = gspin()->helpers->pluck( $savedData['pins'], $count, $fields );
        return $savedData;
    }

}