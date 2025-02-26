<?php
/**
 * Handles Login Buttons flow
 *
 * @package embed-power-bi-reports\LoginFlow
 */

namespace MoEmbedPowerBI\LoginFlow;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class to handle the login button functionalities.
 */
class LoginButton {

	/**
	 * Holds the instance of class.
	 *
	 * @var LoginButton
	 */
	private static $instance;

	/**
	 * Object instance(LoginButton) getter method.
	 *
	 * @return LoginButton
	 */
	public static function get_controller() {
		if ( ! isset( self::$instance ) ) {
			$class          = __CLASS__;
			self::$instance = new $class();
		}
		return self::$instance;
	}

	/**
	 * Function to display the login button on the default login page of WordPress.
	 *
	 * @return void
	 */
	public function mo_epbr_login_button() {
		if ( ! get_option( 'mo_epbr_add_sso_button_wp' ) ) {
			return;}
		wp_enqueue_style( 'mo_epbr_css_login_button', plugins_url( '../includes/css/mo_epbr_login_button.css', __FILE__ ), array(), MO_EPBR_PLUGIN_VERSION, 'all' );
		?>
		<div class=pbibutton>
			<button type="button" id="ssobutton" onclick="window.location.href='?option=oauthlogin'" class="ssobutton"><span class="ssobutton_logo"><img src="<?php echo esc_url( plugin_dir_url( __DIR__ ) . 'includes/images/microsoft.png' ); ?>"></span><span class="ssobutton_text">Login with Azure AD</span></button>
			<p style="text-align: center;">OR</p>
		</div>
		<?php
	}
}
