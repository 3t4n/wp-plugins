<?php
/**
 * Core
 *
 * Create MoNft Demo Trial View.
 *
 * @category   Common, Core
 * @package    MoNft\view;
 * @author     miniOrange <info@xecurify.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @link       https://miniorange.com
 */

namespace MoNft\view;

if ( ! class_exists( 'MoNft\view\DemoTrial' ) ) {
	/**
	 *  Demo Trial view
	 */
	class DemoTrial {
		/**
		 * Instance Util
		 *
		 * @var $util
		 * */
		public $util;
		/**
		 * Instance of MoNftView class
		 *
		 * @var $button_view
		 */
		public $button_view;

		/**
		 * Constructor
		 */
		public function __construct() {

			$this->util = new \MoNft\Utils();
		}

		/**
		 * View of Demo Trial tab
		 */
		public function render_demo_trial_ui() {
			global $mo_nft_util;
			global $wp_version;
			$wp_version_trim = substr( $wp_version, 0, 3 );
			?>
		<div>
			<div class="mo_support_layout container prem-info monft-demo-trial-container"  id="mo_nft_demo_trial_form">
				<div class="container">
				<form method="post" action="">
					<input type="hidden" name="option" value="mo_auto_create_demosite" />
					<?php wp_nonce_field( 'mo_nft_demo_request_form', 'mo_nft_demo_request_form_nonce' ); ?>
					<div class="row jumbotron box8">
						<div class="col-sm-12" >
							<h3 class="mt-2 mb-2" style="">Demo Trial Request</h3>
						</div>

						<p style="color:gray;margin-top:15px;">Want to try out the paid features before purchasing the license? Just let us know which plan you're interested in and we will setup a demo for you.</p>

						<div class="col-sm-6 form-group mb-1">
							<label for="email" class="monft-demo-label">Email<span class="monft-text-red"> *</span></label>
							<input type="email" class="form-control" id="email" name="mo_nft_demo_email" required>
						</div>

						<div class="col-sm-6 form-group mb-1">
							<label for="CompanyName" class="monft-demo-label">Select the Plan you are interested in (Optional)</label>
							<select required name="mo_nft_demo_plan" id="mo_nft_demo_plan_id" class="form-control" >
								<option value="miniorange-nft-marketplace-premium@21.0.0" selected>WP NFT MARKETPLACE PREMIUM PLAN</option>
							</select>
						</div>

						<div class="col-sm-6 form-group mb-1">
							<label for="Blockchain" class="monft-demo-label">Blockchain<span class="monft-text-red"> *</span></label>
							<input type="text" class="form-control" name="mo_nft_demo_blockchain" required>
						</div>

						<div class="col-sm-6 form-group mb-1">
							<label for="Crypto Wallet" class="monft-demo-label">Crypto Wallet<span class="monft-text-red"> *</span></label>
							<input type="text" class="form-control" name="mo_nft_demo_cryptowallet" required>
						</div>						
					</div>

					<div class="col-sm form-group mb-1">
							<label for="Sample NFT URL" class="monft-demo-label">Sample NFT Collection URL</label>
							<input type="text" class="form-control" name="mo_nft_demo_nft_collection_url">
					</div>

					<div class="col-sm form-group mb-3">
						<label for="Use Case" class="monft-demo-label">Use Case<span class="monft-text-red"> *</span></label>
						<textarea type="text" class="form-control" minlength="15" name="mo_nft_demo_usecase" rows="4" placeholder="Write us about your usecase" required value=""></textarea>
					</div>


					<div class="col-sm-12 form-group mb-3">
						<button id="mo_nft_sandbox_btn" name="mo_nft_sandbox_btn" class="btn btn-primary" style="background-color: #476d89 !important; color: #fff !important;">Submit Demo Request</button>
					</div>
				</form>
				</div>
			</div>
			<script>
				document.addEventListener("DOMContentLoaded", () => {
					const mo_nft_sandbox_btn = document.getElementById('mo_nft_sandbox_btn');
					mo_nft_sandbox_btn.addEventListener('click', (e) => {
						e.preventDefault();
						// Do the validation for required fields.

						const mo_nft_sandbox_email = document.querySelector('input[name="mo_nft_demo_email"]').value;
						const mo_nft_sandbox_usecase = document.querySelector('textarea[name="mo_nft_demo_usecase"]').value;
						const blockchain =  document.querySelector('input[name="mo_nft_demo_blockchain"]').value;
						const crypto_wallet =  document.querySelector('input[name="mo_nft_demo_cryptowallet"]').value;
						const sample_nft_collection_url =  document.querySelector('input[name="mo_nft_demo_nft_collection_url"]').value;

						// Append the addons list to the usecase.
						const mo_nft_sandbox_usecase_with_addons = 'Usecase: \n'
							+ mo_nft_sandbox_usecase
							+ '\n'
							+ 'Blockchain: \n'
							+ blockchain 
							+ '\n'
							+ 'CrytoWallet: \n'
							+ crypto_wallet
							+ '\n'
							+ 'Sample Collection Url: \n'
							+ sample_nft_collection_url;

						// Href to the sandbox demo website.
						const mo_nft_sandbox_href = '<?php echo esc_attr( \MoNft\Constants::SANDBOX_REDIRECT_URL ); ?>' + mo_nft_sandbox_email 
							+ '&mo_plugin=mo_nft&wordpress_version=<?php echo esc_attr( $wp_version_trim ); ?>&usecase=' 
							+ encodeURIComponent(mo_nft_sandbox_usecase_with_addons)
							+ '&referer=<?php echo esc_url( get_site_url() ); ?>';

						// Open the sandbox demo website in a new tab.
						window.open(mo_nft_sandbox_href, '_blank');

					});

				});
			</script>	

			<?php

		}

	}
}

?>
