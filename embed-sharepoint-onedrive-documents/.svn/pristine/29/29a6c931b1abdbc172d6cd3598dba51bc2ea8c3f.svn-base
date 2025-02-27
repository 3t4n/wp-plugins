<?php
/**
 * Holds the Admin Controller Config class instance.
 *
 * @package embed-sharepoint-onedrive-documents\Controller
 */

namespace MoSharePointObjectSync\Controller;

/**
 * Class to handle admin controller functionalities.
 */
class AdminController {

	/**
	 * Holds the Admin Controller class instance.
	 *
	 * @var AdminController
	 */
	private static $instance;

	/**
	 * Object instance(Admin Controller) getter method.
	 *
	 * @return Admin_Controller
	 */
	public static function get_controller() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	/**
	 * Function for tab wise controller call.
	 *
	 * @return void
	 */
	public function mo_sps_admin_controller() {
		if ( ! current_user_can( 'manage_options' ) || ! isset( $_POST['mo_sps_tab'] ) || ! isset( $_POST['option'] ) || ! check_admin_referer( sanitize_text_field( wp_unslash( $_POST['option'] ) ) ) ) {
			return;
		}

		$post = array();

		foreach ( $_POST as $key => $value ) {
			$post[ $key ] = sanitize_text_field( wp_unslash( $value ) );
		}

		$tabswitch = ( $post['mo_sps_tab'] );
		$handler   = self::get_controller();
		switch ( $tabswitch ) {
			case 'app_config':
				$handler = AppConfig::get_controller();
				break;

			case 'account_setup':
				$handler = AccountSetupHandler::get_controller();
				break;
		}
		$handler->mo_sps_save_settings( $post );
	}
}
