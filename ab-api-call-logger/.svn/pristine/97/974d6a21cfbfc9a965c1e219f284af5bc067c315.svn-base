<?php
/*
Plugin Name: API Request Collector
Author: Aaron Brazell
Author URI: http://technosailor.com
Description: A simple plugin to log API requests performed for the purpose of debugging
Version: 0.1
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

class AB_API_Logger {
	
	public $api_calls;

	public function __construct() {
		$urls = array();
		$this->api_calls = apply_filters( 'ab_api_logger', $urls );
		$this->hooks();
	}

	public function hooks() {

		// Admin Bar Integration
		add_action( 'admin_bar_menu', array( $this, 'add_adminbar_item' ), 100 );
		add_action( 'admin_bar_menu', array( $this, 'add_adminbar_api_calls' ), 1000 );
	}

	public function log_api_call( $urls, $url = false ) {
		if( !$url )
			return $urls;
		$urls[] = esc_url( $url );
		$this->api_calls = $urls;
		return $urls; 
	}

	public function add_adminbar_item( $admin_bar ) {
		if( is_multisite() && !is_super_admin() )
			return false;

		if( !current_user_can( 'administrator' ) )
			return false;

		$admin_bar->add_menu( array(
			'id'		=> 'api-logger',
			'title'		=> 'API Log',
			'href'		=> '#',
			'meta'		=> array(
				'title' => 'API Log'
				)
			)
		);
	}

	public function add_adminbar_api_calls( $admin_bar ) {
		if( count( $this->api_calls) < 1 ) {
			$admin_bar->add_menu( array(
				'id'		=> 'no-api-calls',
				'title'		=> 'No API Calls',
				'href'		=> '#',
				'parent'	=> 'api-logger',
				'meta'		=> array(
					'title' => 'No API Calls'
					)
				)
			);
		}
		else
		{
			$count = 0;
			if( $this->api_calls ) {
				var_dump( $this->api_calls);
				foreach( $this->api_calls as $apicall ) {
					$count++;
					$admin_bar->add_menu( array(
					'id'		=> 'api-call-' . $count,
					'title'		=> esc_url( $apicall ),
					'href'		=> esc_url( $apicall ),
					'parent'	=> 'api-logger',
					'meta'		=> array(
						'title' => esc_url( $apicall )
						)
					)
				);
				}
			}
		}
	}
}

$ab_api_logger = new AB_API_Logger;