<?php
defined( 'ABSPATH' ) || exit;

class EDD_Mollie_Install {

	protected static $_instance = null;

	/**
	 * Main class instance
	 *
	 * Ensures only one instance of class is loaded or can be loaded.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Constructor
	 */
	public function __construct() {
		// run lifecycle methods
		if ( is_admin() && ! defined( 'DOING_AJAX' ) ) {
			add_action( 'wp_loaded', array( $this, 'do_install' ) );
		}
	}

	/** Lifecycle methods *******************************************************
	 * Because register_activation_hook only runs when the plugin is manually
	 * activated by the user, we're checking the current version against the
	 * version stored in the database
	****************************************************************************/

	/**
	 * Handles version checking
	 */
	public function do_install() {
		// only install when EDD is active
		if( ! function_exists( 'EDD' ) ) {
			return;
		}

		$version_setting = 'edd_mollie_version';
		$installed_version = get_option( $version_setting );

		// installed version lower than plugin version?
		if ( version_compare( $installed_version, EDD_MOLLIE_VERSION, '<' ) ) {

			if ( ! $installed_version ) {
				$this->install();
			} else {
				$this->upgrade( $installed_version );
			}

			// new version number
			update_option( $version_setting, EDD_MOLLIE_VERSION );
		} elseif ( $installed_version && version_compare( $installed_version, EDD_MOLLIE_VERSION, '>' ) ) {
			$this->downgrade( $installed_version );
			// downgrade version number
			update_option( $version_setting, EDD_MOLLIE_VERSION );
		}
	}


	/**
	 * Plugin install method. Perform any installation tasks here
	 */
	protected function install() {
		$legacy_settings = get_option('edd_mollie_settings');
		if (!empty($legacy_settings)) {
			// upgrading from v2.x or older, get legacy settings
			$live_key = isset($legacy_settings['edd_mollie_live_api_field']) ? $legacy_settings['edd_mollie_live_api_field'] : '';
			$test_key = isset($legacy_settings['edd_mollie_test_api_field']) ? $legacy_settings['edd_mollie_test_api_field'] : '';
			$test_mode = isset($legacy_settings['edd_mollie_test_modus']) ? $legacy_settings['edd_mollie_test_modus'] : '';

			// set API keys
			EDD_Mollie()->settings()->update_option( 'test_api_key', $test_key );
			EDD_Mollie()->settings()->update_option( 'live_api_key', $live_key );

			// convert enabled gateways
			$edd_settings = get_option('edd_settings');
			foreach ( EDD_Mollie()->gateways() as $gateway) {
				if (isset($edd_settings['gateways'][$gateway->getMollieMethodId()])) {
					unset($edd_settings['gateways'][$gateway->getMollieMethodId()]);
					$gateway->update_option( 'enabled', 'yes' );
					$edd_settings['gateways'][$gateway->id] = '1';
				}
			}

			// convert enabled icons
			if (!empty($edd_settings['accepted_cards']) && is_array($edd_settings['accepted_cards'])) {
				foreach ($edd_settings['accepted_cards'] as $key => $value) {
					if ( strpos($key, 'mollie.com') !== false ) {
						unset($edd_settings['accepted_cards'][$key]);
						// extract gateway from URL
						$path = wp_parse_url($key, PHP_URL_PATH);
						$file = basename($path);
						$gateway_slug = pathinfo($file, PATHINFO_FILENAME);
						if ( $gateway = EDD_Mollie()->get_gateway($gateway_slug) ) {
							$edd_settings['accepted_cards'][$gateway->id] = $gateway->get_method_title();
						}
					}
				}
			}

			// store migrated settings
			update_option('edd_settings', $edd_settings);
		}
	}

	/**
	 * Plugin upgrade method.  Perform any required upgrades here
	 *
	 * @param string $installed_version the currently installed ('old') version
	 */
	protected function upgrade( $installed_version ) {

	}

	/**
	 * Plugin downgrade method.  Perform any required downgrades here
	 * 
	 *
	 * @param string $installed_version the currently installed ('old') version (actually higher since this is a downgrade)
	 */
	protected function downgrade( $installed_version ) {

	}
}
