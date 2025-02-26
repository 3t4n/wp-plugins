<?php

/**
 * Plugin Name: Wordpress Paybox Payment plugin
 * Description: Paybox gateway payment plugins for Paybox
 * Version: 1.0.0.0
 * Author: Paybox Verifone
 * Author URI: http://www.paybox.com
 * 
 * @package WordPress
 */
// Ensure not called directly
if (!defined('ABSPATH')) {
	exit;
}

include_once( ABSPATH . 'wp-admin/includes/class-wp-upgrader.php' );

class Paybox_Plugin_Installer extends Plugin_Upgrader {

	public static $plugins_repo = 'http://plugins.svn.wordpress.org';

	public function install( $plugin, $args = array() ) {

		$versions = Paybox_Plugin_Installer::get_svn_versions_data(Paybox_Plugin_Installer::get_svn_tags($plugin['wordpress_org_name']));
		$plugin_version = (isset($plugin['version'])) ? $plugin['version'] : $versions[0];
		
		$defaults    = array(
			'clear_update_cache' => true,
			);
		$parsed_args = wp_parse_args( $args, $defaults );

		$this->init();
		$this->upgrade_strings();

		// TODO: Add final check to make sure plugin exists
		if ( 0 ) {
			$this->skin->before();
			$this->skin->set_result( false );
			$this->skin->error( 'up_to_date' );
			$this->skin->after();

			return false;
		}

		$plugin_slug = $plugin['wordpress_org_name'];

		$download_endpoint = 'https://downloads.wordpress.org/plugin/';

		$url = $download_endpoint . $plugin_slug . '.' . $plugin_version . '.zip';

		add_filter( 'upgrader_pre_install', array( $this, 'deactivate_plugin_before_upgrade' ), 10, 2 );
		add_filter( 'upgrader_clear_destination', array( $this, 'delete_old_plugin' ), 10, 4 );

		$this->run( array(
			'package'           => $url,
			'destination'       => WP_PLUGIN_DIR,
			'clear_destination' => true,
			'clear_working'     => true,
			'hook_extra'        => array(
				'plugin' => $plugin_slug,
				'type'   => 'plugin',
				'action' => 'update',
				),
			) );

		// Cleanup our hooks, in case something else does a upgrade on this connection.
		remove_filter( 'upgrader_pre_install', array( $this, 'deactivate_plugin_before_upgrade' ) );
		remove_filter( 'upgrader_clear_destination', array( $this, 'delete_old_plugin' ) );

		if ( ! $this->result || is_wp_error( $this->result ) ) {
			return $this->result;
		}

		// Force refresh of plugin update information
		wp_clean_plugins_cache( $parsed_args['clear_update_cache'] );

		return true;
	}

	public static function get_svn_tags( $slug ) {

		$url = Paybox_Plugin_Installer::$plugins_repo . '/' . $slug . '/tags/';

		$response = wp_remote_get( $url );

            //Do we have an error?
		if ( wp_remote_retrieve_response_code( $response ) !== 200 ) {
			return null;
		}

            //Nope: Return that bad boy
		return wp_remote_retrieve_body( $response );

	}

	public static function get_svn_versions_data( $html , $version = false) {

		if ( ! $html ) {
			return false;
		}

		$DOM = new DOMDocument;
		$DOM->loadHTML( $html );

		$versions = array();

		$items = $DOM->getElementsByTagName( 'a' );

		foreach ( $items as $item ) {
				$href = str_replace( '/', '', $item->getAttribute( 'href' ) ); //Remove trailing slash

				if ( strpos( $href, 'http' ) === false && $href !== '..' ) {
					if($version !== false){
						if($href > $version){
							$versions[] = $href;
						}
					}else{
						$versions[] = $href;
					}
				}
			}

			return array_reverse( $versions );

		}

	}