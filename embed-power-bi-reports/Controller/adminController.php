<?php
/**
 * Holds the Admin Controller Config class instance.
 *
 * @package Admin_Controller
 */

namespace MoEmbedPowerBI\Controller;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class to handle admin controller functionalities.
 */
class adminController {

	/**
	 * Holds the Admin Controller class instance.
	 *
	 * @var Admin_Controller
	 */
	private static $instance;

	/**
	 * Object instance(Admin Controller) getter method.
	 *
	 * @return Admin_Controller
	 */
	public static function get_controller() {
		if ( ! isset( self::$instance ) ) {
			$class          = __CLASS__;
			self::$instance = new $class();
		}
		return self::$instance;
	}

	/**
	 * Function for tab wise controller call.
	 *
	 * @return void
	 */
	public function mo_epbr_admin_controller() {

		if ( ! current_user_can( 'manage_options' ) || ! isset( $_POST['mo_epbr_tab'] ) || ! isset( $_POST['option'] ) || ! check_admin_referer( sanitize_text_field( wp_unslash( $_POST['option'] ) ) ) ) {
			return;
		}

		$tab_switch = sanitize_text_field( wp_unslash( $_POST['mo_epbr_tab'] ) );
		$handler    = self::get_controller();
		$option     = sanitize_text_field( wp_unslash( $_POST['option'] ) );
		switch ( $tab_switch ) {
			case 'app_config':
				$handler = appConfig::get_controller();
				break;

			case 'pb_app_config':
				$handler = powerBIConfig::get_controller();
				break;

			case 'settings_tab':
				$handler = powerBIsettingsConfig::get_controller();
				break;

			case 'demorequest_tab':
				$handler = demorequestConfig::get_controller();
				break;

			case 'account_setup_tab':
				$handler = accountSetupConfig::get_controller();
				break;

		}
		$handler->mo_epbr_save_settings( $option );
	}
}
