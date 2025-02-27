<?php

namespace Codemanas\CmBlocks\Enhancement;

class MaintenanceMode {
	private static ?MaintenanceMode $_instance = null;
	private string $option_name = 'cmblocks-site-settings';


	public static function get_instance(): ?MaintenanceMode {
		return ( self::$_instance == null ) ? self::$_instance = new self() : self::$_instance;
	}

	private function __construct() {
		add_action( 'template_redirect', [ $this, 'maybe_redirect_visitor' ] );
	}

	private function redirect( string $url): void {
		wp_safe_redirect( $url, 307 );
		exit;
	}

	function maybe_redirect_visitor() {
		// Check if the user is an admin or logged in, if so, do not redirect.
		if ( is_user_logged_in() && current_user_can( 'manage_options' ) ) {
			return;
		}

		$site_settings = get_option( $this->option_name, [ 'enable_coming_soon' => false, 'enable_maintenance_mode' => false ] );
		$is_coming_soon      = $site_settings['enable_coming_soon'] ?? false;  // Set to true if site is in "coming soon" mode.
		$is_maintenance_mode = $site_settings['enable_maintenance_mode'] ?? false;  // Set to true if site is in "maintenance mode".

		if ( $is_coming_soon ) {
			// 200 OK status code for "Coming Soon" mode.
			$page_id = absint( $site_settings['coming_soon_page'] );
			$redirect_url    = get_permalink( $page_id );
			$current_page_id = get_the_ID();
			if ( $current_page_id == $page_id ) {
				nocache_headers();
				status_header( 200 );
				return;
			}
			$this->redirect( $redirect_url );
		} elseif ( $is_maintenance_mode ) {
			$page_id = absint( $site_settings['maintenance_mode_page'] );
			$redirect_url    = get_permalink( $page_id );
			$current_page_id = get_the_ID();
			if ( $current_page_id == $page_id ) {
				nocache_headers();
				status_header( 503 );
				return;
			}
			// 503 Service Unavailable status code for "Maintenance Mode".
			$this->redirect( $redirect_url );
			exit;
		}
	}
}