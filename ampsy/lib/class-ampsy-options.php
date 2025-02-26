<?php

class Ampsy_Options {
	public function site_url() {
		return get_option( 'siteurl' );
	}

	public function key() {
		return get_option( 'ampsy-instance-key' );
	}

	public function set_key( $key ) {
		update_option( 'ampsy-instance-key', $key );
	}

	public function redirect_to_settings() {
		$option = get_option( 'ampsy-redirect-to-settings' );
		delete_option( 'ampsy-redirect-to-settings' );
		return $option;
	}

	public function set_redirect_to_settings() {
		update_option( 'ampsy-redirect-to-settings', true );
	}

	public function flash() {
		$option = get_option( 'ampsy-flash' );
		if ( !$option ) {
			$options = [];
		}
		update_option( 'ampsy-flash', [] );
		return $option;
	}

	public function set_flash( $text, $type ) {
		$option = $this->flash();
		$option[] = [ 'type' => $type, 'text' => $text ];
		update_option( 'ampsy-flash', $option );
	}
}

?>
