<?php
/**
 * Holds the documentObserver class instance.
 *
 * @package embed-sharepoint-onedrive-documents\Observer
 */

namespace MoSharePointObjectSync\View;

/**
 * Class to handle FeedbackForm functionalities.
 */
class FeedbackForm {
	/**
	 * Holds the singleton instance of the documentObserver.
	 *
	 * @var FeedbackForm
	 */
	private static $instance;
	/**
	 * Returns the singleton instance of the FeedbackForm.
	 * If the instance does not exist, it creates a new one.
	 *
	 * @return FeedbackForm The singleton instance of the FeedbackForm.
	 */
	public static function get_view() {
		if ( ! isset( self::$instance ) ) {
			$class          = __CLASS__;
			self::$instance = new $class();
		}
		return self::$instance;
	}
	/**
	 * Function to display feedback form.
	 *
	 * @return void
	 */
	public function mo_sps_display_feedback_form() {

		if ( 'plugins.php' !== basename( isset( $_SERVER['PHP_SELF'] ) ? wp_sanitize_redirect( wp_unslash( $_SERVER['PHP_SELF'] ) ) : '' ) ) {
			return;
		}
		wp_enqueue_style( 'mo_sps_css_plugin', plugins_url( '../includes/css/mo_sps_settings.css', __FILE__ ), array(), MO_SPS_PLUGIN_VERSION );

		?>

		<div id="sps_feedback_modal" class="mo_modal" style="width:90%;margin-left:12%; margin-top:5%; text-align:center;">
			<div class="mo_modal-content" style="width:40%;padding:5px;">
				<h3 style="margin: 2%; text-align:center;"><b>Your feedback</b><span class="mo_close" style="cursor: pointer">&times;</span>
				</h3>
				<hr style="width:75%;">
				<form name="f" method="post" action="" id="mo_feedback">
					<?php wp_nonce_field( 'mo_sps_feedback' ); ?>
					<input type="hidden" name="option" value="mo_sps_feedback"/>
					<div>
						<p style="margin:2%">
						<h4 style="margin: 2%; text-align:center;">Please help us to improve our plugin by giving your opinion.<br></h4>

						<div id="smi_rate" style="text-align:center">
							<div style="text-align: left;padding:2% 20%;">
								<input type="checkbox" name="sps_reason[]" value="Missing Features" id="sps_feature"/>
								<label for="sps_feature" class="mo_sps_feedback_option" >Does not have the features I'm looking for</label>
								<br>

								<input type="checkbox" name="sps_reason[]" value="Costly" id="sps_costly" class="mo_sps_feedback_radio" />
								<label for="sps_costly" class="mo_sps_feedback_option">Do not want to upgrade - Too costly</label>
								<br>

								<input type="checkbox" name="sps_reason[]" value="Confusing" id="sps_confusing" class="mo_sps_feedback_radio"/>
								<label for="sps_confusing" class="mo_sps_feedback_option">Confusing Interface</label>
								<br>

								<input type="checkbox" name="sps_reason[]" value="Bugs" id="sps_bugs" class="mo_sps_feedback_radio"/>
								<label for="sps_bugs" class="mo_sps_feedback_option">Bugs in the plugin</label>
								<br>

								<input type="checkbox" name="sps_reason[]" value="other" id="sps_other" class="mo_sps_feedback_radio"/>
								<label for="sps_other" class="mo_sps_feedback_option">Other Reasons</label>
							</div>
						</div>

						<hr style="width:75%;">
						<?php
						$email = get_option( 'mo_saml_admin_email' );
						if ( empty( $email ) ) {
							$user  = wp_get_current_user();
							$email = $user->user_email;
						}
						?>
						<div style="display:inline-block; width:60%;">
							<input type="email" id="query_mail" name="query_mail" style="text-align:center; border:0px solid black; border-style:solid; background:#f0f3f7; width:20vw;border-radius: 6px;"
								placeholder="Please enter your email address" required value="<?php echo esc_attr( $email ); ?>" readonly="readonly"/>

							<input type="radio" name="edit" id="edit" onclick="editName()" value=""/>
							<label for="edit"><img class="editable" src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '../images/61456.png' ); ?>" />
							</label>

							</div>

						<div style="text-align:center;">    
							<input type="checkbox" name="get_reply" value="reply" checked>Allow MiniOrange Team to connect via email for speedy issue resolution and usage statistics.</input>
						</div>
						<br>

						<div style="text-align:center;">

							<textarea id="query_feedback" name="query_feedback" rows="4" style="width: 60%"
								placeholder="Tell us what happened!"></textarea>
							<br><br>
						</div>
						<div class="mo-modal-footer" style="text-align: center;margin-bottom: 2%">
							<input type="submit" name="miniorange_feedback_submit"
								class="button button-primary button-large" value="Send"/>
							<span width="30%">&nbsp;&nbsp;</span>
							<input type="submit" name="miniorange_skip_feedback"
								class="button button-primary button-large" value="Skip" onclick="document.getElementById('mo_feedback').submit();"/>
						</div>
					</div>
				</form>


			</div>

		</div>

		<script>
			jQuery('a[aria-label="Deactivate Embed SharePoint OneDrive Documents"]').click(function () {

				var mo_modal = document.getElementById('sps_feedback_modal');

				var span = document.getElementsByClassName("mo_close")[0];

				mo_modal.style.display = "block";
				document.querySelector("#query_feedback").focus();
				span.onclick = function () {
					mo_modal.style.display = "none";
					jQuery('#mo_feedback_form_close').submit();
				};

				window.onclick = function (event) {
					if (event.target === mo_modal) {
						mo_modal.style.display = "none";
					}
				};
				return false;

			});

			function editName(){

				document.querySelector('#query_mail').removeAttribute('readonly');
				document.querySelector('#query_mail').focus();
				return false;

			}

		</script>
		<?php

	}
}
