<?php

/**
 * Manages registration, UI and validation of settings
 * @package GoogleAuthenticatorEncourageUserActivation
 */
class GAEUASettings {
	protected $settings;
	
	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'init',       array( $this, 'init' ) );
		add_action( 'admin_init', array( $this, 'register_settings' ) );
		add_action( 'admin_print_styles-options-general.php', array( $this, 'print_admin_styles' ) );

		add_filter(
			'plugin_action_links_' . plugin_basename( dirname( dirname( __FILE__ ) ) ) . '/bootstrap.php',
			array( $this, 'add_plugin_action_links' )
		);
	}

	/**
	 * Magic getter to allow read-access to whitelisted settings
	 * 
	 * @param $variable
	 * @return mixed
	 */
	public function __get( $variable ) {
		if ( isset( $this->$variable ) && in_array( $variable, array( 'settings' ) ) ) {
			return $this->$variable;
		} else {
			return null;
		}
	}

	/**
	 * Initialize variables
	 */
	public function init() {
		$default_settings = array(
			'mode' => apply_filters( 'gaeua_default_mode', 'nag' )
		);
		
		$this->settings = shortcode_atts(
			$default_settings,
			get_option( 'gaeua_settings' )
		);
	}

	/**
	 * Adds links to the plugin's action link section on the Plugins page
	 *
	 * @param array $links The links currently mapped to the plugin
	 * @return array
	 */
	public function add_plugin_action_links( $links ) {
		array_unshift( $links, '<a href="http://wordpress.org/plugins/google-authenticator-encourage-user-activation/faq/">FAQ</a>' );
		array_unshift( $links, sprintf( '<a href="%s">Settings</a>', esc_url( admin_url( 'options-general.php' ) ) ) );

		return $links;
	}

	/**
	 * Registers settings sections, fields and settings
	 * @mvc Controller
	 */
	public function register_settings() {
		register_setting( 'general', 'gaeua_settings', array( $this, 'validate_settings' ) );
		add_settings_section( 'gaeua-section', 'Encourage User Activation for Google Authenticator', '__return_empty_string', 'general' );
		add_settings_field( 'gaeua_mode', 'Mode', array( $this, 'markup_settings' ), 'general', 'gaeua-section' );
	}

	/**
	 * Add our custom CSS to the Settings screen
	 */
	public function print_admin_styles() {

		?>

		<!-- BEGIN Encourage User Activation for Google Authenticator -->
		<style>
			.form-table td fieldset#gaeua-settings label {
				margin-bottom: 15px !important;
			}

			#gaeua-settings .description {
				display: block;
				padding-top: 3px;
				padding-left: 34px;
			}

			@media screen and ( min-width: 782px ) {

			#gaeua-settings .description {
				padding-left: 25px;
			}
			}
		</style>
		<!-- END Encourage User Activation for Google Authenticator -->

		<?php
	}

	/**
	 * Creates the markup for the Settings section and fields
	 * 
	 * @param array $context Either the section details or the field details
	 */
	public function markup_settings( $context ) {
		require( dirname( __DIR__ ) . '/views/settings-fields.php' );
	}

	/**
	 * Validates submitted setting values before they get saved to the database. Invalid data will be overwritten with defaults.
	 *
	 * @param array $new_settings
	 * @return array
	 */
	public function validate_settings( $new_settings ) {
		$new_settings = shortcode_atts( $this->settings, $new_settings );
		
		if ( ! in_array( $new_settings['mode'], array( 'nag', 'nag-persistent', 'force' ) ) ) {
			$new_settings['mode'] = 'nag';
		}
		
		$this->settings = $new_settings;
		return $new_settings;
	}
} // end GAEUASettings
