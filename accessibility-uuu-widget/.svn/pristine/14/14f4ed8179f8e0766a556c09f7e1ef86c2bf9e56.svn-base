<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class Accessibility_Uuu_Widget_Run
 *
 * Thats where we bring the plugin to life
 *
 * @package		ACCESSIBIL
 * @subpackage	Classes/Accessibility_Uuu_Widget_Run
 * @author		Toitx
 * @since		1.0.0
 */
class Accessibility_Uuu_Widget_Run{

	/**
	 * Our Accessibility_Uuu_Widget_Run constructor 
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
	
		add_action( 'plugin_action_links_' . ACCESSIBIL_PLUGIN_BASE, array( $this, 'add_plugin_action_link' ), 20 );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_backend_scripts_and_styles' ), 20 );
	
	}

	/**
	 * ######################
	 * ###
	 * #### WORDPRESS HOOK CALLBACKS
	 * ###
	 * ######################
	 */

	/**
	* Adds action links to the plugin list table
	*
	* @access	public
	* @since	1.0.0
	*
	* @param	array	$links An array of plugin action links.
	*
	* @return	array	An array of plugin action links.
	*/
	public function add_plugin_action_link( $links ) {

		// $links['our_shop'] = sprintf( '<a href="%s" title="Custom Link" style="font-weight:700;">%s</a>', 'https://test.test', __( 'Custom Link', 'accessibility-uuu-widget' ) );

		return $links;
	}

	/**
	 * Enqueue the backend related scripts and styles for this plugin.
	 * All of the added scripts andstyles will be available on every page within the backend.
	 *
	 * @access	public
	 * @since	1.0.0
	 *
	 * @return	void
	 */
	public function enqueue_backend_scripts_and_styles() {
		wp_enqueue_style( 'accessibil-backend-styles', ACCESSIBIL_PLUGIN_URL . 'core/includes/assets/css/backend-styles.css', array(), ACCESSIBIL_VERSION, 'all' );
		wp_enqueue_script( 'accessibil-backend-scripts', ACCESSIBIL_PLUGIN_URL . 'core/includes/assets/js/backend-scripts.js', array(), ACCESSIBIL_VERSION, false );
		wp_localize_script( 'accessibil-backend-scripts', 'accessibil', array(
			'plugin_name'   => esc_html__( "UUU", 'accessibility-uuu-widget' ),
		));
	}

}
