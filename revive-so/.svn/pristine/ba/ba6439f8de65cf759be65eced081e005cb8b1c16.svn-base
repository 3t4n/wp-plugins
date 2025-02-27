<?php 
/**
 * Dashboard actions.
 *
 */

defined( 'ABSPATH' ) || exit;

/**
 * Dashboard class.
 */
class REVIVESO_Dashboard extends REVIVESO_BaseController
{
	use REVIVESO_Fields;
	use REVIVESO_Hooker;
	use REVIVESO_Admin_Settings;
	/**
	 * Settings.
	 */
	public $settings;

	/**
	 * Callbacks.
	 */
	public $callbacks;

	/**
	 * Callback Managers.
	 */
	public $callbacks_manager;

	/**
	 * Settings pages.
	 *
	 * @var array
	 */
	public $pages = array();

	/**
	 * Register functions.
	 */
	public function register() {
		$this->settings = new REVIVESO_SettingsApi();

		$this->action( 'admin_init', 'setSettings' );

		$this->setPages();

		$this->settings->addPages( $this->pages )->withSubPage( __( 'Dashboard', 'revive-so' ) )->register();

		add_filter( 'pre_update_option_reviveso_plugin_settings', array( $this, 'check_enable_rewrite' ) );
	}

	/**
	 * Register plugin pages.
	 */
	public function setPages() {
		$manage_options_cap = apply_filters( 'reviveso_manage_options_capability', 'manage_options' );
		$this->pages = array(
			array(
				'page_title' => 'Revive.so', 
				'menu_title' => __( 'Revive.so', 'revive-so' ),
				'capability' => $manage_options_cap,
				'menu_slug'  => 'reviveso', 
				'callback'   => array( $this, 'adminDashboard' ), 
				'icon_url'   => 'dashicons-update-alt', 
				'position'   => 100,
			),
		);
	}

	public function adminDashboard() {
		return require_once( REVIVESO_PATH. 'templates/admin.php' );
	}

	/**
	 * Adds 'disable' value to checkox setting.
	 *
	 * @return array
	 * @since 1.1.1
	 */
	public function check_enable_rewrite( $option ){
		// Unchecked( disabled ) checkboxes do not send $_POST data
		// so we need to set the value to disabled if post data is not send
		// else the checkbox will always be checked as we need to set it check by default.
		if( ! isset( $option['reviveso_enable_republish'] ) ){
			$option['reviveso_enable_republish'] = 'disable';
		}
		
		return $option;
	}
}