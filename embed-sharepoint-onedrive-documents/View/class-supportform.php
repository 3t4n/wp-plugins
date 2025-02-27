<?php
/**
 * Displays miniorange's plugin support form
 *
 * @package embed-sharepoint-onedrive-documents\View
 */

namespace MoSharePointObjectSync\View;

/**
 * Class to handle the view of support form
 */
class SupportForm {

	/**
	 * Holds the instance of SupportForm.
	 *
	 * @var SupportForm|null Singleton instance of SupportForm.
	 */
	private static $instance;

	/**
	 * Returns the singleton instance of SupportForm.
	 *
	 * @return SupportForm The singleton instance of SupportForm.
	 */
	public static function get_view() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Handles the style and functionalities of the support form.
	 */
	public function mo_sps_display_support_form() {
		?>
		<style>

			.support_container{ 
				display:right;
				justify-content:flex-start;
				align-items:center;
				flex-direction:column;
				margin:55px 10px;
				background-color:#a6dee0;
				box-shadow: rgb(207,213,222) 1px 2px 4px;
				border: 1px solid rgb(216,216,216);
			}

			.support__telphone{
				width:27em;
			}

			.support_header{
				width: 100%;
				height: 246px;
				background-color: #fff;
				background-size: cover;
			}

			@media only screen and (max-width: 1400px) {
				.support__telphone{
				width:24em;
				}
			}

			@media only screen and (max-width: 1229px) {
				.support__telphone{
				width:19.5em;
				}
			}

		</style>


		<div style="width:40%;position:sticky;top: 0">
			<form method="post" action="">
				<input type="hidden" name="option" value="mo_sps_contact_us_query_option" >
				<div class="support_container">
					<div class="support_header" style="text-align:center;">
						<img style="width:inherit;max-width:fit-content;" src="<?php echo esc_url( MO_SPS_PLUGIN_URL . '/images/support-header2.jpg' ); ?>"/>
					</div>
					<?php wp_nonce_field( 'mo_sps_contact_us_query_option' ); ?>
					<div style="display:flex;justify-content:flex-start;align-items:center;width:90%;margin-top:8px;margin-left:12px;font-size:14px;font-weight:500;">Email:</div>
					<input style="block-size:7px;padding:10px 10px;width:91%;border:none;margin-top:4px;margin-left:12px;background-color:#fff;" type="email" required name="mo_sps_contact_us_email" value="<?php echo esc_attr( ( '' === get_option( 'mo_sps_admin_email' ) ) ? get_option( 'admin_email' ) : get_option( 'mo_sps_admin_email' ) ); ?>" placeholder="Email"/>
					<div style="display:flex;justify-content:flex-start;align-items:center;width:90%;margin-top:8px;font-size:14px;margin-left:12px;font-weight:500;">Contact No.:</div>
					<input id="contact_us_phone" class="support__telphone" type="tel" style="block-size:7px;padding:10px 42px;width:91%;border:none;margin-top:4px;margin-left:12px;background-color:#fff;"  pattern="[\+]?[0-9]{1,4}[\s]?([0-9]{4,12})*" name="mo_sps_contact_us_phone" value="<?php echo esc_attr( get_option( 'mo_sps_admin_phone' ) ); ?>" placeholder="Enter your phone"/>
					<div style="display:flex;justify-content:flex-start;align-items:center;width:90%;margin-top:5px;font-size:14px;margin-left:12px;font-weight:500;">How can we help you?</div>
					<textarea style="padding:10px 10px;width:91%;border:none;margin-top:5px;margin-left:12px;background-color:#fff;" onkeypress="mo_sps_valid_query(this)" onkeyup="mo_sps_valid_query(this)" onblur="mo_sps_valid_query(this)" required name="mo_sps_contact_us_query" rows="3" style="resize: vertical;" placeholder="You will get reply via email"></textarea>
					<div style="text-align:center;">
						<input type="submit" name="submit" style=" width:120px;margin:8px;background-color:#1B9BA1;border:none;color:white;font:bold;" class="button button-large"/>
					</div>
				</div>
			</form>
		</div>
		<script>
			function mo_sps_valid_query(f) {
			!(/^[a-zA-Z?,.\(\)\/@ 0-9]*$/).test(f.value) ? f.value = f.value.replace(
				/[^a-zA-Z?,.\(\)\/@ 0-9]/, '') : null;
			}

			jQuery("#contact_us_phone").intlTelInput();
		</script>   
		<?php
	}
}
