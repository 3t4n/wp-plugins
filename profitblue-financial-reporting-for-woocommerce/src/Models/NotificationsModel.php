<?php

namespace ProfitBlue\Models;

class NotificationsModel {

	private $wpdb;

	public function __construct() {

		global $wpdb;
		$this->wpdb = $wpdb;

	}

	public function save_data( $data ) {

        $old_data = maybe_unserialize( 'notifications-settings' );

        if( !empty( $old_data ) ) {
            
            if ( !empty( $data['daily'] )) {
                $old_data['daily'] = $data['daily'];
            }
            if ( !empty( $data['weekly'] )) {
                $old_data['weekly'] = $data['weekly'];
            }
            if ( !empty( $data['monthly'] )) {
                $old_data['monthly'] = $data['monthly'];
            }
            if ( !empty( $data['yearly'] )) {
                $old_data['yearly'] = $data['yearly'];
            }
            if ( !empty( $data['email'] )) {
                $old_data['email'] = $data['email'];
            }
            
            update_option( 'profitblue-notifications-settings', $old_data );

        } else {

            update_option( 'profitblue-notifications-settings', $data );

        }
		
	}
	
	public function get_data() {

		$data = maybe_unserialize( get_option( 'profitblue-notifications-settings' ) );
		if ( empty( $data ) ) {
			return false;
		} else {
			return $data;
		}

	}

	
}
