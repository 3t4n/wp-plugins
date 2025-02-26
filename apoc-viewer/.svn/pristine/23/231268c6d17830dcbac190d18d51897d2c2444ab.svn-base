<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class Apoc_Run
 *
 * Thats where we bring the plugin to life
 *
 * @package		APOC
 * @subpackage	Classes/Apoc_Run
 * @author		FAMPPY INC
 * @since		1.0.0
 */
class Apoc_Run{

	/**
	 * Our Apoc_Run constructor
	 * to run the plugin logic.
	 *
	 * @since 1.0.0
	 */
	function __construct(){
		$this->add_hooks();
	}

	/**
	 * ######################
	 * ###
	 * #### WORDPRESS HOOKS
	 * ###
	 * ######################
	 */

	/**
	 * Registers all WordPress and plugin related hooks
	 *
	 * @access	private
	 * @since	1.0.0
	 * @return	void
	 */
	private function add_hooks(){
		add_filter( 'edd_settings_sections_extensions', array( $this, 'apoc_add_edd_settings_section' ), 20 );
		add_filter( 'edd_settings_extensions', array( $this, 'apoc_add_edd_settings_section_content' ), 20 );
		add_action( 'plugins_loaded', array( $this, 'apoc_add_wp_webhooks_integrations' ), 9 );
	}

	/**
	 * ######################
	 * ###
	 * #### WORDPRESS HOOK CALLBACKS
	 * ###
	 * ######################
	 */

	/**
	 * Add the custom settings section under
	 * Downloads -> Settings -> Extensions
	 *
	 * @access	public
	 * @since	1.0.0
	 *
	 * @param	array	$sections	The currently registered EDD settings sections
	 *
	 * @return	void
	 */
	public function apoc_add_edd_settings_section( $sections ) {

		$sections['apoc'] = __( APOC()->settings->get_plugin_name(), 'apoc' );

		return $sections;
	}

	/**
	 * Add the custom settings section content
	 *
	 * @access	public
	 * @since	1.0.0
	 *
	 * @param	array	$settings	The currently registered EDD settings for all registered extensions
	 *
	 * @return	array	The extended settings
	 */
	public function apoc_add_edd_settings_section_content( $settings ) {

		// Your settings reamain registered as they were in EDD Pre-2.5
		$custom_settings = array(
			array(
				'id'   => 'my_header',
				'name' => '<strong>' . __( APOC()->settings->get_plugin_name() . 'Settings', 'apoc' ) . '</strong>',
				'desc' => '',
				'type' => 'header',
				'size' => 'regular'
			),
			array(
				'id'    => 'my_example_setting',
				'name'  => __( 'Example checkbox', 'apoc' ),
				'desc'  => __( 'Check this to turn on a setting', 'apoc' ),
				'type'  => 'checkbox'
			),
			array(
				'id'    => 'my_example_text',
				'name'  => __( 'Example text', 'apoc' ),
				'desc'  => __( 'A Text setting', 'apoc' ),
				'type'  => 'text',
				'std'   => __( 'Example default text', 'apoc' )
			),
		);

		// If EDD is at version 2.5 or later...
		if ( version_compare( EDD_VERSION, 2.5, '>=' ) ) {
			$custom_settings = array( 'apoc' => $custom_settings );
		}

		return array_merge( $settings, $custom_settings );
	}

	/**
	 * ####################
	 * ### WP Webhooks
	 * ####################
	 */

	/*
	 * Register dynamically all integrations
	 * The integrations are available within core/includes/integrations.
	 * A new folder is considered a new integration.
	 *
	 * @access	public
	 * @since	1.0.0
	 *
	 * @return	void
	 */
	public function apoc_add_wp_webhooks_integrations(){

		// Abort if WP Webhooks is not active
		if( ! function_exists('WPWHPRO') ){
			return;
		}

		$custom_integrations = array();
		$folder = APOC_PLUGIN_DIR . 'core' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'integrations';

		try {
			$custom_integrations = WPWHPRO()->helpers->get_folders( $folder );
		} catch ( Exception $e ) {
			WPWHPRO()->helpers->log_issue( $e->getTraceAsString() );
		}

		if( ! empty( $custom_integrations ) ){
			foreach( $custom_integrations as $integration ){
				$file_path = $folder . DIRECTORY_SEPARATOR . $integration . DIRECTORY_SEPARATOR . $integration . '.php';
				WPWHPRO()->integrations->register_integration( array(
					'slug' => $integration,
					'path' => $file_path,
				) );
			}
		}
	}

}
