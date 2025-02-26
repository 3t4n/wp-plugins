<?php
/**
 * Exit if accessed directly.
 *
 * @package brainspace
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Allow_WP_Admin_Access_Setup_Action class
 *
 * This class provides functionality to restrict wp-admin access based on specified IP addresses.
 *
 * @since 1.0.2
 * @package Allow_WP_Admin_Access_Setup_Action
 */
class Allow_WP_Admin_Access_Setup_Action {

	/**
	 * Constructor method
	 *
	 * Initializes the plugin by setting up necessary hooks and actions.
	 *
	 * @since 1.0.2
	 */
	public function __construct() {

		add_action( 'admin_menu', array( $this, 'awa_admin_filed_init' ) );
		add_action( 'admin_init', array( $this, 'awa_plugin_settings' ) );
		add_action( 'init', array( $this, 'awa_ip' ) );
		add_filter( 'wp_authenticate_user', array( $this, 'check_ip') );
	}

	/**
	 * Initializes the admin field settings
	 *
	 * This method sets up the admin fields for the plugin settings page.
	 *
	 * @since 1.0.2
	 */
	public function awa_admin_filed_init() {

		add_menu_page( 'Allow wp-admin access Settings', 'Allow wp-admin access Settings', 'administrator', AWA_ADMINPAGE_URL, array( $this, 'awa_plugin_settings_page' ) );
	}

	/**
	 * Registers plugin settings
	 *
	 * This method registers the settings for the plugin, allowing them to be managed through the WordPress admin interface.
	 *
	 * @since 1.0.2
	 */
	public function awa_plugin_settings() {
		// register our settings.
		register_setting( 'awa-plugin-settings-group', 'awa-ip-field' );
	}

	 /**
	  * Creates an IP address field for the plugin settings
	  *
	  * This method generates an input field for IP addresses in the plugin settings page.
	  *
	  * @param string $value The IP address value to be used in the field.
	  * @since 1.0.2
	  *
	  * @return void
	  */
	public function awa_create_ip_field( $value ) {

		$resip = esc_attr( get_option( 'awa-ip-field' ) );

		echo '<tr valign="top">';
		echo '<th scope="row">' . esc_html( $value['lable'] ) . '</th>';
		echo '<td><textarea rows="4" cols="50" id="' . esc_attr( $value['id'] ) . '" name="' . esc_attr( $value['name'] ) . '">' . esc_textarea( $resip ) . '</textarea></td>';
		echo '</tr>';
	}

	 /**
	  * Generates a form field for the plugin settings page
	  *
	  * This method creates a form field, such as a text input or textarea, for use in the plugin's settings page.
	  *
	  * @since 1.0.2
	  */
	public function awa_form_field() {

		$options = array(
			array(
				'name' => 'awa-ip-field',
				'desc' => 'Enter Allow ip',
				'id' => 'allowip',
				'type' => 'textarea',
				'lable' => 'Enter Allow Ip',
			),
		);

		foreach ( $options as $value ) {

			switch ( $value['name'] ) {

				case 'awa-ip-field':
					$this->awa_create_ip_field( $value );
					break;
			}
		}
	}

	/**
	 * Displays the plugin settings page.
	 *
	 * This method outputs the HTML for the plugin's settings page, allowing users to configure plugin options.
	 *
	 * @since 1.0.2
	 */
	public function awa_plugin_settings_page() {

		echo '<div class="wrap">';
		echo '<h2>Wp-admin Access Allow Setting</h2>';

		echo '<form method="post" action="options.php">';
		settings_fields( 'awa-plugin-settings-group' );
		do_settings_sections( 'awa-plugin-settings-group' );

		echo ' <table class="form-table">';

		$this->awa_form_field();

		echo '</table>';
		echo '<span style="margin: 0px 0px 0px 220px;" class="note"><b>Note:</b> You have enter comma separated ip for this format.<br><span style="margin: 0px 0px 0px 219px;"><b>Multiple Ip:</b> 195.167.10.17,182.128.10.159,505.256.63</span>'
		. '   <br><span style="margin: 0px 0px 0px 219px;"><b>Single Ip:</b> 195.167.10.17</span></span>';
		submit_button();

		echo '</form>';
		echo '</div>';
	}

	/**
	 * Blocks access to admin users unless from certain IPs. Regular users may be from anywhere.
	 *
	 * @param string $user The username.
	 * @param string $name The name of the user.
	 * @param string $pass The password of the user.
	 */
	public function awa_ip() {
		
		if (is_admin() || (!empty($_SERVER['REQUEST_URI']) && strpos(sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'])), 'wp-login.php') !== false)) {

			$disableip = get_option( 'awa-ip-field' );

			// Ensure $_SERVER data is unslashed and sanitized before use.
			$remote_addr = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '';

			$allow_ips = explode( ',', $disableip );
			if ( '' != $disableip ) {
				if ( ! in_array( $remote_addr, $allow_ips ) ) {

					if (is_admin() ){						
						echo esc_html__( 'Access Forbidden' , 'allow-wp-admin-access') . ': ' . esc_html( __( '<strong>ERROR</strong>: Access Forbidden.' , 'allow-wp-admin-access') );
						die;
					}
				}
			}
		}
	}

	public function check_ip( WP_User $user ) {

		$disableip = get_option( 'awa-ip-field' );		

	   // Ensure $_SERVER data is unslashed and sanitized before use.
		$remote_addr = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '';

		$allow_ips = explode( ',', $disableip );
		if ( '' != $disableip ) {
			if ( ! in_array( $remote_addr, $allow_ips ) ) {

				$message = esc_html__( 'The request is came from unknown source.', 'allow-wp-admin-access');
				return new WP_Error( 'unknown_source', $message );
			}
		}
	
		return $user;
	}	
}

$restrict_settings_page = new Allow_WP_Admin_Access_Setup_Action();
