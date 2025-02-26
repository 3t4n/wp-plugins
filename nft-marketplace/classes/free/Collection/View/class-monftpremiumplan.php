<?php
/**
 * Core
 *
 * Create MoNft Method view Handler.
 *
 * @category   Common, Core
 * @package    MoNft\view\SettingsView
 * @author     miniOrange <info@xecurify.com>
 * @license    MIT/Expat
 * @link       https://miniorange.com
 */

namespace MoNft\view;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'MoNft\view\MoNftPremiumPlan' ) ) {

	/**
	 * Class to Create MoNft Premium Plan Tab View.
	 *
	 * @category Common, Core
	 * @package  MoNft\view
	 * @author   miniOrange <info@xecurify.com>
	 * @license    MIT/Expat
	 * @link     https://miniorange.com
	 */
	class MoNftPremiumPlan {

		/**
		 * Instance of utils class
		 *
		 * @var $util
		 */
		public $util;
		/**
		 * Constructor
		 */
		public function __construct() {

			$this->util = new \MoNft\Utils();
			global $mo_nft_util;
			if ( true === $mo_nft_util->is_developer_mode ) {
				wp_enqueue_style( 'monft_licensing_ui_styles', MONFT_URL . 'classes/resources/css/dev/licensing.css', array(), $ver = \MoNft\Constants::MONFT_VER_CURR, $in_footer = false );
			} else {
				wp_enqueue_style( 'monft_licensing_ui_styles', MONFT_URL . 'classes/resources/css/prod/licensing.min.css', array(), $ver = \MoNft\Constants::MONFT_VER_CURR, $in_footer = false );
			}
		}
		/**
		 * Licensing tab view
		 */
		public function render_licensing_ui() {
			?>
				<div >
				<div class="row "  style="max-width:99.9%;min-height:115px;align-content:center;border-radius:5px;margin-right:0px;background-color:white;padding-left: 0;">
			<?php
			$this->show_licensing_page();
			?>

			</div>
			</div>
			<?php
		}

		/**
		 * Pricing of different plans
		 */
		public static function license_plans_pricing() {
			return 'pricingPremium:' . \MoNft\Constants::PREMIUM_PRICING . ';pricingEnterprise:' . \MoNft\Constants::ENTERPRISE_PRICING;

		}
				/**
				 * Array of details of pricing plans
				 */
		public function license_plans() {
			return array(
				'pricingPremium'    => array(
					'plan'      => 'PREMIUM',
					'plan_name' => 'wp_nft_marketplace_premium_plugin',
					'features'  => array(
						'Support of ERC-721 token standards' => true,
						'Lazy Minting'                    => true,
						'Mint WooCoomerce Product as NFT' => true,
						'NFT Royalties'                   => true,
						'My NFT Portfolio shortcode'      => true,
						'Bulk upload NFTs'                => true,
						'Support for Polygon, Ethereum, and EVM blockchains' => true,
						'Configure multiple NFT collections' => true,
						'Lazy Listing'                    => true,
						'Trading NFTs'                    => true,
						'Buy, Sell NFTs'                  => true,
						'NFT Marketplace shortcode'       => true,
						'NFT as a reward'                 => true,
						'Digital Art as NFT'              => false,
						'Music and Audio as NFT'          => false,
						'Custom ERC20 token for buying and selling NFTs' => false,
						'ERC-1155 and ERC-20 token standards' => false,
						'Multiple Blockchain Support'     => false,
						'Claim Tokens on Purchase'        => false,
						'End-user NFT mint'               => false,
						'Any Custom Requirement'          => false,
					),
				),
				'pricingEnterprise' => array(
					'plan'      => 'ENTERPRISE',
					'plan_name' => 'wp_nft_marketplace_enterprise_plugin',
					'features'  => array(
						'Support of ERC-721, ERC-1155 and ERC-20 token standards' => true,
						'Lazy Minting'                    => true,
						'Mint WooCoomerce Product as NFT' => true,
						'NFT Royalties'                   => true,
						'My NFT Portfolio shortcode'      => true,
						'Bulk upload NFTs'                => true,
						'Support for Polygon, Ethereum, and EVM blockchains' => true,
						'Configure multiple NFT collections' => true,
						'Lazy Listing'                    => true,
						'Trading NFTs'                    => true,
						'Buy, Sell NFTs'                  => true,
						'NFT Marketplace shortcode'       => true,
						'NFT as a reward'                 => true,
						'Digital Art as NFT'              => true,
						'Music and Audio as NFT'          => true,
						'Custom ERC20 token for buying and selling NFTs' => true,
						'Multiple Blockchain Support'     => true,
						'Claim Tokens on Purchase'        => true,
						'End-user NFT mint'               => true,
						'Any Custom Requirement'          => true,
					),
				),
			);
		}

		/**
		 * Pricing Plan view
		 *
		 * @param string $plan plan name.
		 * @param array  $plan_details details of the plan.
		 */
		public function render_pricing_plan_ui( $plan, $plan_details ) {
			?>
			<div class="col-3 mo-nft-align-center individual-container">
				<div class="mo-nft-licensing-plan card-body" style="height: 77em;">
					<div class="mo-nft-licensing-plan-header" style="min-height: 200px;"> <!-- Adjust height as needed -->
						<div class="mo-nft-licensing-plan-price"><strong><?php echo esc_attr( $plan_details['plan'] ); ?></strong></div>
						<hr>
						<script>
							createSelectOptions('<?php echo esc_js( $plan ); ?>');
						</script>
					</div>
					<?php
					if ( 'PREMIUM' === $plan_details['plan'] ) {
						?>
						<button class="btn-block mo-nft-btn-block text-uppercase mo-nft-lp-buy-btn" onclick="upgradeform('<?php echo esc_js( $plan_details['plan_name'] ); ?>')">
							<?php esc_html_e( 'Upgrade Now', 'nft-marketplace' ); ?></button>
						<?php
					} else {
						?>
						<button class="btn-block mo-nft-btn-block text-uppercase mo-nft-lp-buy-btn" id="monft-contact-form">
						<?php esc_html_e( 'Contact us', 'nft-marketplace' ); ?></button>
						<?php
					}
					?>
					<div class="mo-nft-licensing-plan-feature-list" style="height: 515px;"> <!-- Adjust height as needed -->
						<ul>
							<?php
							$feature_list = $plan_details['features'];
							foreach ( $feature_list as $key => $value ) {
								echo '<li>';
								echo '<div style="display:flex;">';
								if ( $value ) {
									echo '&#9989;&emsp;' . esc_attr( $key ) . '';
								} else {
									echo '&#10060;&emsp;' . esc_attr( $key ) . '';
								}
								echo '</div>';
								echo '</li>';
							}
							?>
						</ul>
					</div>
				</div>
				<br>
			</div>
			<?php
		}

		/**
		 * Licensing tab view
		 */
		public function show_licensing_page() {
			?>
			<div id="navbar" style="padding-left: 7%;padding-top: 1%;margin-bottom: 1%; z-index:unset;" >
				<b><a href="#licensing_plans" id="plans-section" class="navbar-links">Plans</a></b>
				<b><a href="#upgrade-steps" id="upgrade-section" class="navbar-links">Upgrade Steps</a></b>
				<b><a href="#payment-method" id="payment-section" class="navbar-links">Payment Methods</a></b>
			</div>
			<script>    

				window.onscroll = function() {moNftStickyNavbar()};
				var navbar = document.getElementById("navbar");
				var sticky = navbar.offsetTop;

				function moNftStickyNavbar() {
					if (window.pageYOffset >= sticky) {
						navbar.classList.add("sticky")
					} else {
						navbar.classList.remove("sticky");
					}
				}
				var selectArray = [];
				var pricing = '<?php echo esc_js( self::license_plans_pricing() ); ?>';
				pricing = pricing.split(';');
				for (let i = 0; i < pricing.length; i++) {
					price = pricing[i].split(':');
					selectArray.push(price[0]);
					selectArray[price[0]]= {1 : price[1]};
				}

				function createSelectOptions(elemId) {
						var selectPricingArray = selectArray[elemId];
						var selectElem = '';
						if (elemId === 'pricingEnterprise') {
						// Include the "STARTING FROM" div if the condition is met
						selectElem += '<div class="mo-nft-flex-label">STARTING FROM</div>';
						}
						selectElem += '<div class="cd-price" id="flex-container"><div class="mo-nft-flex-value" style="color: #0E1D35;"><span class="cd-currency">$</span><span class="cd-value" id="standardID">' + selectArray[elemId]["1"] + '</span></div><div class="mo-nft-flex-policy" style="font-size:3rem;"><sup><a href="#licensing_policy" style="text-decoration: none;color:#7C8594;">*</a></sup></div></div>' + '</header></a>';
						return document.write(selectElem);
					}

					function createSelectWithSubsitesOptions(elemId) {
						var selectPricingArray = selectArray[elemId];
						var selectSubsitePricingArray = selectArray['subsiteIntances'];
						var selectElem = ' <div class="cd-price" id="flex-container"><div class="mo-nft-flex-value" style="color: #0E1D35;"><span class="cd-currency">$</span><span class="cd-value" id="standardID">' + selectArray[elemId]["1"] + '</span></div><div class="mo-nft-flex-policy" style="font-size:3rem;"><sup><a href="#licensing_policy" style="text-decoration: none;color:#7C8594;">*</a></sup></div></div>' + '</header> <!-- .cd-pricing-header --></a>' + '<footer class="cd-pricing-footer"><div style="display: inline-block;float: left;"><h4 class="instanceClass" style="margin-bottom:2px;">No. of instances:';
						var selectElem = selectElem + ' <select class="selectInstancesClass" required="true" onchange="changePricing(this)" id="' + elemId + '">';
						jQuery.each(selectPricingArray, function (instances, price) {
							selectElem = selectElem + '<option value="' + instances + '" data-value="' + instances + '">' + instances + ' </option>';
						})
						selectElem = selectElem + "</select></h3>";
						selectElem = selectElem + '<h3 class="instanceClass" stlye="padding-top:2px;" >No. of subsites:&nbsp&nbsp';
						selectElem = selectElem + '<select class="selectInstancesClass" required="true" onchange="changePricing(this)" id="' + elemId + '" name="' + elemId + '-subsite">';
						jQuery.each(selectSubsitePricingArray, function (instances, price) {
							selectElem = selectElem + '<option value="' + instances + '" data-value="' + instances + '">' + instances + ' </option>';
						})
						selectElem = selectElem + "</select></h3></div>";
						return document.write(selectElem);
					}

					function changePricing($this) {
						var discountedPrice = [1,.95,.90,.85,.80];
						var selectId = jQuery($this).attr("id");
						var e = document.getElementById(selectId);
						var strUser = e.options[e.selectedIndex].value;
						var strUserInstances = strUser != "UNLIMITED" ? strUser : 500;
						selectArrayElement = [];
						if (selectId == "pricingPremium") selectArrayElement = Math.round(selectArray.pricingPremium[1]*strUser*discountedPrice[strUser-1]);
						if (selectId == "pricingEnterprise") selectArrayElement = Math.round(selectArray.pricingEnterprise[1]*strUser*discountedPrice[strUser-1]);
						jQuery("#" + selectId).parents("div.individual-container").find(".cd-value").text(selectArrayElement);
					}

			</script>
			<!-- Licensing Table -->
			<br>

			<div style="text-align: center;" id="licensing_plans" onmouseenter="onMouseEnter('plans-section', '3px solid #093553')" onmouseleave="onMouseEnter('plans-section', 'none')">
				<h1 style="display:block;">Choose From The Below Plans To Upgrade</h1>
			</div>	
			<div class="mo-nft-licensing-container" style="height: 80em;margin-bottom: 5%" onmouseenter="onMouseEnter('plans-section','3px solid #093553')" onmouseleave="onMouseEnter('plans-section', 'none')">
				<div class="container-fluid">
					<div class="row">
						<div class="col-6 mo-nft-align-right">
							&nbsp;
						</div>
						<div class="col-6 mo-nft-align-right">
							&nbsp;
						</div>
					</div>
					<div id="single-site-section">
						<div class="row justify-content-center mx-15">
						<?php
							$plans = $this->license_plans();
						foreach ( $plans as $plan => $plan_details ) {
							$this->render_pricing_plan_ui( $plan, $plan_details );
						}
						?>
						</div>
						<br>
					</div>
				</div>
			</div>
			<div class="licensing-notice" style="height: 400px; padding-top: 10px;" id="upgrade-steps">
				<div class="PricingCard-toggle nft-plan-title mul-dir-heading "  onmouseenter="onMouseEnter('upgrade-section', '3px solid #093553')" onmouseleave="onMouseEnter('upgrade-section', 'none')" style="padding-top: 1px;">
							<h2 class="mo-nft-h2">HOW TO UPGRADE TO PREMIUM</h2>
							<!-- <hr style="background-color:#17a2b8; width: 20%;height: 3px;border-width: 3px;"> -->
						</div> 
				<section class="section-steps"  id="section-steps" onmouseenter="onMouseEnter('upgrade-section', '3px solid #093553')" onmouseleave="onMouseEnter('upgrade-section', 'none')">
						<div class="row">
								<div class="col span-1-of-2 steps-box">
									<div class="works-step">
										<div><b>1</b></div>
										<p>
											Click on <b><i>Upgrade Now</i></b> button for required premium plan and you will be redirected to miniOrange login console.
										</p>
									</div>
									<div class="works-step">
										<div><b>2</b></div>
										<p>
											Enter your miniOrange account credentials. You can create one for free <i><b><a href="admin.php?page=mo_nft_settings&tab=account">here</a></b></i> if you don't have. Once you have successfuly logged in, you will be redirected towards the payment page. 
										</p>
									</div>
									<div class="works-step">
										<div><b>3</b></div>
										<p>
											Enter your card details and proceed for payment. On successful payment completion, the premium plugin will be available to download. 
										</p>
									</div>
									</div>
									<div class="col span-1-of-2 steps-box">
									<div class="works-step">
										<div><b>4</b></div>
										<p>
											You can download the premium plugin from the <b><i>Releases and Downloads</i></b> section on the miniOrange console.
										</p>
									</div>						
									<div class="works-step">
										<div><b>5</b></div>
										<p>
											From the WordPress admin dashboard, deactivate the free plugin currently installed.
										</p>
									</div>
									<div class="works-step">
										<br>
										<div><b>6</b></div>
										<p style="padding-top:10px;">
											Now install the downloaded premium plugin and activate it.
											After activating the premium plugin, login using the account which you have used for the purchase of premium license.<br> <br>
										</p>
									</div>
								</div>
							</div> 
							</section>
							</div> 

							<div class="licensing-notice" style="height: 10%px; padding-top: 10px;" >

								<div class="PricingCard-toggle ">
					<h2 class="mo-nft-h2"> INSTANCE - SUBSITES DEFINITION</h2>
				</div>
				<!-- <hr style="background-color:#17a2b8; width: 20%;height: 3px;border-width: 3px;"> -->
							<br>
							<div class="instance-subsites">
					<div class="row">
						<div class="col span-1-of-2 instance-box">
							<h3 class="myH3">What is an instance?</h3><br>
							<br><p style="font-size: 1em;">A WordPress instance refers to a single installation of a WordPress site. It refers to each individual website where the plugin is active. In the case of a single site WordPress, each website will be counted as a single instance.
							<br>
							<br> For example, You have 3 sites hosted like one each for development, staging, and production. This will be counted as 3 instances.</p>
						</div>
						<div class="col span-1-of-2 subsite-box">
							<h3 class="myH4">What is a multisite network?</h3><br>
							<br><p style="font-size: 1em;">A multisite network means managing multiple sites within the same WordPress installation and has the same database.
							<br>
							<br>For example, You have 1 WordPress instance/site with 3 subsites in it then it will be counted as 1 instance with 3 subsites.
							<br> You have 1 WordPress instance/site with 3 subsites and another WordPress instance/site with 2 subsites then it will be counted as 2 instances with 3 subsites.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="licensing-notice" id="payment-method" style="height: 10%;padding-top: 10px;min-height: 400px;" onmouseenter="onMouseEnter('payment-section', '3px solid #093553')" onmouseleave="onMouseEnter('payment-section', 'none')">
				<h2 class="mo-nft-h2">ACCEPTED PAYMENT METHODS</h2>
				<section class="payment-methods" style="height: 400px;" >
				<br>
				<div class="row">
					<div class="col span-1-of-3">
						<div class="plan-box">
							<div>
								<span style="font-size: 20px;font-weight:500;">&nbsp;&nbsp;Credit / Debit Card</span>
							</div>
							<div>
								If the payment is made through Credit Card/International Debit Card, the license will be created automatically once the payment is completed.
							</div>
						</div>
					</div>
					<div class="col span-1-of-3">
						<div class="plan-box">
							<div><span style="font-size: 20px;font-weight:500;">&nbsp;&nbsp;Bank Transfer</span>							  
							</div>
							<div>
								If you want to use bank transfer for the payment then contact us at <b><i><span>info@xecurify.com</span></i></b>  so that we can provide you the bank details.
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<p style="margin-top:20px;font-size:16px;">
						<span style="font-weight:500;"> Note :</span> Once you have paid through PayPal/Net Banking, please inform us so that we can confirm and update your license.
					</p>
				</div>
				</section>
			</div>
						<!-- Licensing Plans End -->
						<div class="licensing-notice" style="min-height:450px;">
							<h2 id="licensing_policy" class="mo-nft-h2">LICENSING POLICY</h2>
							<br>
							<p style="font-size: 1em;"><span style="color: red;">*</span>Cost applicable for one instance only. The WordPress NFT Marketplace plugin license are subscription-based, and each license includes 12 months of maintenance, which covers version updates.<br></p>

							<p style="font-size: 1em;"><span style="color: red;">*</span>We provide deep discounts on bulk license purchases and pre-production environment licenses. As the no. of licenses increases, the discount percentage also increases. Contact us at <i><a href="">web3@xecurify.com</a></i> for more information.</p>

							<p style="font-size: 1em;"><span style="color: red;">*</span><strong>MultiSite Network Support : </strong>
								There is an additional cost for the number of subsites in Multisite Network. The Multisite licenses are based on the <b>total number of subsites</b> in your WordPress Network.
								<br>
								<br>
								<strong>Note</strong> : We do not provide the developer license for our paid plugins and the source code is protected. It is strictly prohibited to make any changes in the code without having written permission from miniOrange. There are hooks provided in the plugin which can be used by the developers to extend the plugin's functionality.
								<br>
								<br>
							At miniOrange, we want to ensure you are 100% happy with your purchase. For more details on our plugin licensing terms and refund policy, you can check out our<i><a href="https://plugins.miniorange.com/end-user-license-agreement" target="_blank"> End User License Agreement.</a></i> Please email us at <i><a href="mailto:info@xecurify.com" target="_blank">info@xecurify.com</a></i> for any queries regarding the return policy.</p>
						</div>

			<!-- End Licensing Table -->
			<a  id="mobacktoaccountsetup" style="display:none;" href="<?php echo esc_url( add_query_arg( array( 'tab' => 'account' ), ! empty( $_SERVER['REQUEST_URI'] ) ? esc_url_raw( sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) ) : '' ) ); ?>">Back</a>
			<!-- JSForms Controllers -->
			<script>  

				function upgradeform(planType) {
					if(planType === "") {
						location.href = '<?php echo esc_attr( \MoNft\Constants::WORDPRESS_PLUGIN_URL ); ?>';
						return;
					} else {
						const url = '<?php echo esc_attr( \MoNft\Constants::PORTAL_PAYMENT_URL ); ?>' + planType;
						window.open(url, "_blank");
					}
				}
				$('#monft-contact-form').click(function(){
						var isHidden = $(".monft-help-container").is(":hidden");
						if(isHidden){
							$(".monft-help-container").show();
						}else{
							$(".monft-help-container").hide();
						}
						$('.mo-nft-support-div').toggleClass('mo-nft-support-closed');
						$('#mo-slide-support').toggleClass('dashicons-arrow-right-alt2');
						$('#mo-slide-support').toggleClass('mo-nft-support-icon');
						$('#mo-nft-support-section').toggleClass('mo-nft-support-section');
					});
			</script>
			<script>

			function onMouseEnter(divid, css){
				document.getElementById(divid).style.borderBottom = css;		
			}
		</script>
			<!-- End JSForms Controllers -->
			<?php
		}
	}
}
?>
