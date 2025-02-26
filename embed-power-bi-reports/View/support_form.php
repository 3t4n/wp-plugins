<?php
/**
 * Handles powerBI supportForm View
 *
 * @package embed-power-bi-reports\View
 */

namespace MoEmbedPowerBI\View;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class to handle the power bi tab functionalities.
 */
class support_form {
	/**
	 * Holds the instance of SupportForm class.
	 *
	 * @var SupportForm
	 */
	private static $instance;

	/**
	 * Object instance(SupportForm) getter method.
	 *
	 * @return SupportForm
	 */
	public static function get_view() {
		if ( ! isset( self::$instance ) ) {
			$class          = __CLASS__;
			self::$instance = new $class();
		}
		return self::$instance;
	}

	/**
	 * Function to display support form.
	 *
	 * @return void
	 */
	public function mo_epbr_display_support_form() {
		$support_header_image_url = esc_url( plugin_dir_url( __FILE__ ) . '../images/support-header2.jpg' );
		?>
			<div>
				<form method="post" action="">
					<input type="hidden" name="option" value="mo_epbr_contact_us_query_option" />
					<div class="support_container" id="contact-us">
						<div class="support_header" style="background-image: url('<?php echo esc_attr( $support_header_image_url ); ?>'); ">
						</div>
						<?php wp_nonce_field( 'mo_epbr_contact_us_query_option' ); ?>
						<div style="display:flex;justify-content:flex-start;align-items:center;width:90%;margin-top:8px;font-size:14px;font-weight:500;">Email:</div>
						<input style="width:91%;border:none;margin-top:4px;background-color:#fff" type="email" required name="mo_epbr_contact_us_email" value="<?php echo ( get_option( 'mo_epbr_admin_email' ) === '' ) ? esc_attr( get_option( 'admin_email' ) ) : esc_attr( get_option( 'mo_epbr_admin_email' ) ); ?>" placeholder="Email">
						<div style="display:flex;justify-content:flex-start;align-items:center;width:90%;margin-top:8px;font-size:14px;font-weight:500;">Contact No.:</div>
						<input id="contact_us_phone" class="support__telphone" type="tel" style="border:none;margin:5px 22px;background-color:#fff;"  pattern="[\+]?[0-9]{1,4}[\s]?([0-9]{4,12})*" name="mo_epbr_contact_us_phone" value="<?php echo esc_attr( get_option( 'mo_epbr_admin_phone' ) ); ?>" placeholder="Enter your phone">
						<div style="display:flex;justify-content:flex-start;align-items:center;width:90%;margin-top:5px;font-size:14px;font-weight:500;">How can we help you?</div>
						<textarea id="textarea-contact-us" style="padding:10px 10px;width:91%;border:none;margin-top:5px;background-color:#fff" onkeypress="mo_epbr_valid_query(this)" onkeyup="mo_epbr_valid_query(this)" onblur="mo_epbr_valid_query(this)" required name="mo_epbr_contact_us_query" rows="3" style="resize: vertical;" placeholder="You will get reply via email"></textarea>
						<div style="text-align:center;">
							<input type="submit" name="submit" style=" width:120px;margin:8px;" class="button button-primary button-large"/>
						</div>
					</div>
				</form>
			</div>
		<?php
	}
}
