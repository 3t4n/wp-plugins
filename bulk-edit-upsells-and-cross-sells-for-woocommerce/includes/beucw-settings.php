<?php

add_action( 'admin_menu', 'beucw_submenu_page' );

/**
 * Add menu function callback.
 */
function beucw_submenu_page() {
	add_submenu_page(
		'edit.php?post_type=product',
		__( 'Upsells & Cross-sells', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ),
		__( 'Upsells & Cross-sells', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ),
		'edit_products',
		'bulk-edit-upsells-crosssells',
		'beucw_bulk_edit_upsells_submenu_page_callback',
		5
	);

	add_submenu_page(
		'edit.php?post_type=product',
		'Chat GPT (API) Key Settings',
		__( 'Chat GPT (API) Key Settings', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ),
		'manage_options',
		'beucw_api_setting_page',
		'beucw_api_integration_settings_section'
	);
}

/**
 * Api key section.
 */
function beucw_api_integration_settings_section() {
	?>
	<div class="pluginHeadingwrap">

		<section class="pluginHeader">
			<div class="headerRight"></div>
		</section>

		<main>
			<div class="notificationGrup"></div>

			<!-- Form saving api key -->
			<form method="post" action="options.php">
				<?php
				settings_fields( 'beucw-api-field-setting' );
				do_settings_sections( 'beucw-ai-key-settings-options' );
				?>
				<input type="submit" name="beucw_save_key" class="button button-primary" value="<?php echo esc_html__( 'Save API Key', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>">
			</form><br><br />
		</main>
	</div>
	<?php
}

/**
 * Add menu function callback.
 */
function beucw_bulk_edit_upsells_submenu_page_callback() {

	// Get closed status.
	$hide_message = get_option( 'beucw_latest_popup_sale_notice' );

	// If sale has ended.
	$sale_end = get_option( 'beucw_last_notice', 0 );
	?>
	<div class="bucw-headingwrap">

		<!-- Plugin Heading -->
		<section class="bucw-header">
			<div>
				<h1><?php echo esc_attr__( 'Bulk Edit UpSells and Cross-sells for WooCommerce', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?> </h1>
			</div>
			<button id="beucw-popup-button" class="button button-secondary">
				<svg fill="#FFFFFF" height="24px" width="24px" version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M12,17c0.8-4.2,1.9-5.3,6.1-6.1c0.5-0.1,0.8-0.5,0.8-1s-0.3-0.9-0.8-1C13.9,8.1,12.8,7,12,2.8C11.9,2.3,11.5,2,11,2 c-0.5,0-0.9,0.3-1,0.8C9.2,7,8.1,8.1,3.9,8.9C3.5,9,3.1,9.4,3.1,9.9s0.3,0.9,0.8,1c4.2,0.8,5.3,1.9,6.1,6.1c0.1,0.5,0.5,0.8,1,0.8 S11.9,17.4,12,17z"></path> <path d="M22,24c-2.8-0.6-3.4-1.2-4-4c-0.1-0.5-0.5-0.8-1-0.8s-0.9,0.3-1,0.8c-0.6,2.8-1.2,3.4-4,4c-0.5,0.1-0.8,0.5-0.8,1 s0.3,0.9,0.8,1c2.8,0.6,3.4,1.2,4,4c0.1,0.5,0.5,0.8,1,0.8s0.9-0.3,1-0.8c0.6-2.8,1.2-3.4,4-4c0.5-0.1,0.8-0.5,0.8-1 S22.4,24.1,22,24z"></path> <path d="M29.2,14c-2.2-0.4-2.7-0.9-3.1-3.1c-0.1-0.5-0.5-0.8-1-0.8c-0.5,0-0.9,0.3-1,0.8c-0.4,2.2-0.9,2.7-3.1,3.1 c-0.5,0.1-0.8,0.5-0.8,1s0.3,0.9,0.8,1c2.2,0.4,2.7,0.9,3.1,3.1c0.1,0.5,0.5,0.8,1,0.8c0.5,0,0.9-0.3,1-0.8 c0.4-2.2,0.9-2.7,3.1-3.1c0.5-0.1,0.8-0.5,0.8-1S29.7,14.1,29.2,14z"></path> <path d="M5.7,22.3C5.4,22,5,21.9,4.6,22.1c-0.1,0-0.2,0.1-0.3,0.2c-0.1,0.1-0.2,0.2-0.2,0.3C4,22.7,4,22.9,4,23s0,0.3,0.1,0.4 c0.1,0.1,0.1,0.2,0.2,0.3c0.1,0.1,0.2,0.2,0.3,0.2C4.7,24,4.9,24,5,24c0.1,0,0.3,0,0.4-0.1s0.2-0.1,0.3-0.2 c0.1-0.1,0.2-0.2,0.2-0.3C6,23.3,6,23.1,6,23s0-0.3-0.1-0.4C5.9,22.5,5.8,22.4,5.7,22.3z"></path> <path d="M28,7c0.3,0,0.5-0.1,0.7-0.3C28.9,6.5,29,6.3,29,6s-0.1-0.5-0.3-0.7c-0.1-0.1-0.2-0.2-0.3-0.2c-0.2-0.1-0.5-0.1-0.8,0 c-0.1,0-0.2,0.1-0.3,0.2C27.1,5.5,27,5.7,27,6c0,0.3,0.1,0.5,0.3,0.7C27.5,6.9,27.7,7,28,7z"></path> </g> </g></svg>
				<div><?php echo esc_html__( 'Setup With AI !', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
				<div class="beucw-popup-btn-tooltip-container" data-tooltip="Configuring Upsell, and Cross-Sell Products with AI.">
					<svg width="18px" height="18px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" transform="translate(5.88,5.88), scale(0.51)"><rect x="0" y="0" width="24.00" height="24.00" rx="12" fill="#000000" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.048"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM12 17.75C12.4142 17.75 12.75 17.4142 12.75 17V11C12.75 10.5858 12.4142 10.25 12 10.25C11.5858 10.25 11.25 10.5858 11.25 11V17C11.25 17.4142 11.5858 17.75 12 17.75ZM12 7C12.5523 7 13 7.44772 13 8C13 8.55228 12.5523 9 12 9C11.4477 9 11 8.55228 11 8C11 7.44772 11.4477 7 12 7Z" fill="#ffffff"></path> </g></svg>
					<div class="beucw-ai-popup-btn-tooltip"><?php echo esc_html__( 'Configure Upsell, and Cross-Sell Products with AI.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
				</div>
			</button>
			<div class="bucw-collapse-bulk-screen"></div>
		</section>

		<!-- Show all the settings -->
		<main>
			<form method="get" id="bucw-upsells-crosssell" action="options.php">
				<?php
					settings_fields( 'bucw-section' );
					do_settings_sections( 'bulk-edit-upsells-crosssells' );
				?>
				<div class="footerSavebutton">
					<button type="button" class="bucw-save" id="bucw-save-bottom" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 416c-35.3 0-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64z"/></svg> <?php esc_html_e( 'Save', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></button>
				</div>
			</form>
		</main>

		<!-- New Footer Banner -->
		<div class="sft-beucw-upgrade-to-pro-banner">
			<div class="sft-uppro-inner-container">
				<div class="sft-uppro-main-logo">
					<a href="<?php echo esc_url( plugins_url( '../assets/img/saffiretech_logo.png', __FILE__ ) ); ?>">
						<img src="<?php echo esc_url( plugins_url( '../assets/img/saffiretech_logo.png', __FILE__ ) ); ?>">
					</a>
				</div>
			</div>

			<div class="sft-uppro-hidden-desktop">
				<h2><?php esc_html_e( 'Unlock Advanced Features For Related Products', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></h2>
			</div>

			<div class="sft-uppro-details-container">
				<div class="sft-uppro-money-back-guarantee">
					<div>
						<a href="<?php echo esc_url( plugins_url( '../assets/img/moneyback-badge.png', __FILE__ ) ); ?>">
							<img src="<?php echo esc_url( plugins_url( '../assets/img/moneyback-badge.png', __FILE__ ) ); ?>">
						</a>
					</div>
					<div>
						<h2><?php esc_html_e( 'Unlock Advanced Features For Related Products', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></h2> 
						<h3><?php esc_html_e( '100% Risk-Free Money Back Guarantee!', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></h3>
						<p><?php esc_html_e( 'We guarantee you a complete refund for new purchases or renewals if a request is made within 15 Days of purchase.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></p>
						<div class="beucw-upgrade-pro-btn">
							<a href="https://www.saffiretech.com/woocommerce-related-products-pro/?utm_source=wp_plugin&utm_medium=profield&utm_campaign=free2pro&utm_id=c1&utm_term=upgrade_now&utm_content=beucw" target="_blank">
								<button class="beucw-upgrade-to-pro-btn"  onclick="window.open('https://www.saffiretech.com/woocommerce-related-products-pro/?utm_source=wp_plugin&utm_medium=profield&utm_campaign=free2pro&utm_id=c1&utm_term=upgrade_now&utm_content=beucw', '_blank')">
									<?php esc_html_e( 'Upgrade To Pro!', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>
								</button>
							</a>
						</div>
					</div>
				</div>

				<div class="sft-uppro-features-container">
					<h3> <?php echo esc_html__( 'Pro Features', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></h3>
					<ul>
						<li><img width="15px" height="13px" src="<?php echo esc_url( plugins_url( '../assets/img/footer-green-tick.svg', __FILE__ ) ); ?>"> <strong><?php echo esc_html__( 'Advanced Bulk Management:', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></strong> <?php echo esc_html__( 'Now set Upsells, Cross-sells and Related products in go from one single screen in a swift action.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></li>
						<li><img width="15px" height="13px" src="<?php echo esc_url( plugins_url( '../assets/img/footer-green-tick.svg', __FILE__ ) ); ?>"> <strong><?php echo esc_html__( 'Increased Product Limit:', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></strong> <?php echo esc_html__( 'Boost your efficiency with the capability to manage 50 products at once, a ten fold increase from the free version.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></li>
						<li><img width="15px" height="13px" src="<?php echo esc_url( plugins_url( '../assets/img/footer-green-tick.svg', __FILE__ ) ); ?>"> <strong><?php echo esc_html__( 'Customizable AJAX Slider:', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></strong> <?php echo esc_html__( 'Elevate your Upsells Section with fast-loading, unlimited product displays for smoother customer engagement.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></li>
						<li><img width="15px" height="13px" src="<?php echo esc_url( plugins_url( '../assets/img/footer-green-tick.svg', __FILE__ ) ); ?>"> <strong><?php echo esc_html__( 'Custom Control:', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></strong> <?php echo esc_html__( 'Handpick each item in the "Related Products" section for tailored product recommendations.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></li>
						<li><img width="15px" height="13px" src="<?php echo esc_url( plugins_url( '../assets/img/footer-green-tick.svg', __FILE__ ) ); ?>"> <strong><?php echo esc_html__( 'Sales Boost:', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></strong> <?php echo esc_html__( 'Increase average order value and revenue by displaying more relevant products to customers.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></li>
						<li><img width="15px" height="13px" src="<?php echo esc_url( plugins_url( '../assets/img/footer-green-tick.svg', __FILE__ ) ); ?>"> <strong><?php echo esc_html__( 'AI Powered Product Suggestions:', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></strong> <?php echo esc_html__( 'Empower your business with AI! Our ChatGPT-driven feature seamlessly suggests Related Products, Upsells, and Cross-sells.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></li>
					</ul>
				</div>

			</div>

		</div>

		<!-- Extra Quick Link View -->
		<div>
			<!-- Quick Links - SaffireTech -->
			<div class="sft-quick-links-section">

				<!-- SaffireTech Logo -->
				<button class="sft-quick-links-menu-icon">
					<img src='<?php echo esc_attr( plugins_url( '../assets/img/saffiretech-quick-links-logo.png', __FILE__ ) ); ?>' width="60px" height="60px">
				</button>

				<!-- Addional links -->
				<div class="sft-quick-links-menu-items">

					<!-- Additional Links can Be Added Here Inside -->
					<div class="sft-quick-links-flex-container">
						<?php
						// If last sale not ended.
						if ( $sale_end < 0 ) {
							?>
							<!-- Sale Link -->
							<a href="https://www.saffiretech.com/products/?utm_source=wp_plugin&utm_medium=floating_widget&utm_campaign=bfcm2024&utm_id=19" target="_blank">
								<div class="sft-quick-links-tooltip-wrapper">
									<button>
										<!-- Replace with Image Tags -->
										<svg width="30px" height="30px" viewBox="0 0 14 14" role="img" focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#d32f2f" d="M11.66666662 12.99999994H2.33333338c-.36666666 0-.66666666-.3-.66666666-.66666666v-6.6666666h10.66666656v6.6666666c0 .36666666-.3.66666666-.66666666.66666666z"></path><path fill="#f44336" d="M12.99999994 5.66666668H1.00000006V3.6666667c0-.36666666.3-.66666666.66666666-.66666666h10.66666656c.36666666 0 .66666666.3.66666666.66666666v1.99999998z"></path><path fill="#ff8f00" d="M6.33333334 5.66666668h1.33333332v7.33333326H6.33333334zm1.99999998-4.66666662L6.33333334 3.00000004h1.33333332l1.99999998-1.99999998z"></path><path fill="#ffc107" d="M6.33333334 5.66666668h1.33333332V3.00000004L5.66666668 1.00000006H4.33333336l1.99999998 1.99999998z"></path></g></svg>
									</button>
									<span class="sft-quick-links-tooltip-text"><?php echo esc_html__( 'BFCM 40% OFF SALE!', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></span>
								</div>
							</a>
						<?php } ?>

						<!-- Replace Links with Documentation Link -->
						<a href="https://www.saffiretech.com/docs/sft-woocommerce-related-products/" target="_blank">
							<div class="sft-quick-links-tooltip-wrapper">
								<button>
									<!-- Replace with Image Tags -->
									<svg width="30px" height="30px" viewBox="-1.28 -1.28 34.56 34.56" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><defs><style>.cls-1{fill:url(#linear-gradient);}.cls-2{fill:url(#linear-gradient-2);}.cls-3{fill:#f8edeb;}</style><linearGradient gradientUnits="userSpaceOnUse" id="linear-gradient" x1="6.65" x2="27.27" y1="6.65" y2="27.27"><stop offset="0" stop-color="#3a7fa1"></stop><stop offset="1" stop-color="#149fd7"></stop></linearGradient><linearGradient id="linear-gradient-2" x1="6" x2="12" xlink:href="#linear-gradient" y1="5" y2="5"></linearGradient></defs><path class="cls-1" d="M23.5,2h-12a.47.47,0,0,0-.35.15l-5,5A.47.47,0,0,0,6,7.5v20A2.5,2.5,0,0,0,8.5,30h15A2.5,2.5,0,0,0,26,27.5V4.5A2.5,2.5,0,0,0,23.5,2Z"></path><path class="cls-2" d="M11.69,2a.47.47,0,0,0-.54.11l-5,5A.47.47,0,0,0,6,7.69.5.5,0,0,0,6.5,8h3A2.5,2.5,0,0,0,12,5.5v-3A.5.5,0,0,0,11.69,2Z"></path><path class="cls-3" d="M16,21a2,2,0,0,1-2-2V13a2,2,0,0,1,4,0v6A2,2,0,0,1,16,21Zm0-9a1,1,0,0,0-1,1v6a1,1,0,0,0,2,0V13A1,1,0,0,0,16,12Z"></path><path class="cls-3" d="M9.5,21a.5.5,0,0,1-.5-.5v-9a.5.5,0,0,1,.5-.5A3.5,3.5,0,0,1,13,14.5v3A3.5,3.5,0,0,1,9.5,21Zm.5-8.95V20a2.5,2.5,0,0,0,2-2.45v-3A2.5,2.5,0,0,0,10,12.05Z"></path><path class="cls-3" d="M21,21a2,2,0,0,1-2-2V13a2,2,0,0,1,4,0,.5.5,0,0,1-1,0,1,1,0,0,0-2,0v6a1,1,0,0,0,2,0,.5.5,0,0,1,1,0A2,2,0,0,1,21,21Z"></path></g></svg>
								</button>
								<span class="sft-quick-links-tooltip-text"><?php echo esc_html__( 'Explore Documentation', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></span>
							</div>
						</a>

						<!-- Upgrade to Pro Link - Support Link for Pro Versions -->
						<a href="https://www.saffiretech.com/woocommerce-related-products-pro/" target="_blank">
							<div class="sft-quick-links-tooltip-wrapper">
								<button>
									<!-- Replace with Image Tags -->
									<svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="30px" viewBox="-66.56 -66.56 645.12 645.12" xml:space="preserve" fill="#000000" stroke="#000000" stroke-width="6.144"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css">  .st0{fill:#FFD700;}  </style> <g> <path class="st0" d="M512,152.469c0-21.469-17.422-38.875-38.891-38.875c-21.484,0-38.906,17.406-38.906,38.875 c0,10.5,4.172,20.016,10.938,27c-26.453,54.781-77.016,73.906-116.203,56.594c-34.906-15.438-47.781-59.563-52.141-93.75 c14.234-7.484,23.938-22.391,23.938-39.594C300.734,78.016,280.719,58,256,58c-24.703,0-44.734,20.016-44.734,44.719 c0,17.203,9.703,32.109,23.938,39.594c-4.359,34.188-17.234,78.313-52.141,93.75c-39.188,17.313-89.75-1.813-116.203-56.594 c6.766-6.984,10.938-16.5,10.938-27c0-21.469-17.422-38.875-38.891-38.875C17.422,113.594,0,131,0,152.469 c0,19.781,14.781,36.078,33.875,38.547l44.828,164.078h354.594l44.828-164.078C497.234,188.547,512,172.25,512,152.469z"></path> <path class="st0" d="M455.016,425.063c0,15.984-12.953,28.938-28.953,28.938H85.938C69.953,454,57,441.047,57,425.063v-2.406 c0-16,12.953-28.953,28.938-28.953h340.125c16,0,28.953,12.953,28.953,28.953V425.063z"></path> </g> </g></svg>
								</button>
								<span class="sft-quick-links-tooltip-text"><?php echo esc_html__( 'Explore Pro Version', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></span>
							</div>
						</a>
					</div>
				</div>

				<?php
				if ( ! $hide_message ) {
					?>
					<div id="sft-sale-notice-popup" class="sft-quick-links-popup">
						<div class="sft-sale-notice-popup-inner beucw-quick-links-popup">
							<div class="sft-ql-popup-close-container"><button class="sft-quick-links-close-popup">x</button></div>

								<div class="sft-ql-popup-content">

									<!-- Black friday sale notice image -->
									<img style="width: 100%; max-width: 180px;" src="<?php echo esc_attr( plugins_url( '../assets/img/bfcm-sale-notice-img.png', __FILE__ ) ); ?>"/>

									<?php
									// Sale one.
									if ( get_option( 'sale_bf1_start' ) ) {
										?>
										<h3 class="sft-sale-popup-heading"><?php echo esc_html__( 'BFCM EARLYBIRD SALE!', 'bulk-edit-upsells-and-cross-sells-for-woocommerce'); ?></h3>

										<!-- Coundown Container -->
										<div id="sft-popup-sale-countdown-timer-container">
											<div class="sft-sale-popup-number-container">
												<div class="days time"><span class="sft-countdown-days-one">00</span></div>
												<div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'DAYS', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
											</div>

											<div class="sft-sale-popup-countdown-colon">:</div>
											<div class="sft-sale-popup-number-container">
												<div class="hours time"><span class="sft-countdown-hours-one">00</span></div>
												<div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'HRS', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
											</div>

											<div class="sft-sale-popup-countdown-colon">:</div>
											<div class="sft-sale-popup-number-container">
												<div class="minutes time"><span class="sft-countdown-minutes-one">00</span></div>
												<div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'MINS', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
											</div>

											<div class="sft-sale-popup-countdown-colon">:</div>
											<div class="sft-sale-popup-number-container">
												<div class="seconds time"><span class="sft-countdown-seconds-one">00</span></div>
												<div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'SECS', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
											</div>
										</div>
										<?php
									}

									// Sale two.
									if ( get_option( 'sale_bf2_start' ) ) {
										?>
										<h3 class="sft-sale-popup-heading"><?php echo esc_html__( 'BFCM MEGA SALE IS LIVE!', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></h3>

										<!-- Coundown Container -->
										<div id="sft-popup-sale-countdown-timer-container">
											<div class="sft-sale-popup-number-container">
												<div class="days time"><span class="sft-countdown-days-two">00</span></div>
												<div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'DAYS', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
											</div>

											<div class="sft-sale-popup-countdown-colon">:</div>
											<div class="sft-sale-popup-number-container">
												<div class="hours time"><span class="sft-countdown-hours-two">00</span></div>
												<div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'HRS', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
											</div>

											<div class="sft-sale-popup-countdown-colon">:</div>
											<div class="sft-sale-popup-number-container">
												<div class="minutes time"><span class="sft-countdown-minutes-two">00</span></div>
												<div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'MINS', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
											</div>

											<div class="sft-sale-popup-countdown-colon">:</div>
											<div class="sft-sale-popup-number-container">
												<div class="seconds time"><span class="sft-countdown-seconds-two">00</span></div>
												<div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'SECS', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
											</div>
										</div>
										<?php
									}

									// Sale three.
									if ( get_option( 'sale_bf3_start' ) ) {
										?>
										<h3 class="sft-sale-popup-heading"><?php echo esc_html__( 'BFCM Sale Alert!', 'bulk-edit-upsells-and-cross-sells-for-woocommerce'); ?></h3>

										<!-- Coundown Container -->
										<div id="sft-popup-sale-countdown-timer-container">
											<div class="sft-sale-popup-number-container">
												<div class="days time"><span class="sft-countdown-days-three">00</span></div>
												<div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'DAYS', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
											</div>

											<div class="sft-sale-popup-countdown-colon">:</div>
											<div class="sft-sale-popup-number-container">
												<div class="hours time"><span class="sft-countdown-hours-three">00</span></div>
												<div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'HRS', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
											</div>

											<div class="sft-sale-popup-countdown-colon">:</div>
											<div class="sft-sale-popup-number-container">
												<div class="minutes time"><span class="sft-countdown-minutes-three">00</span></div>
												<div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'MINS', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
											</div>

											<div class="sft-sale-popup-countdown-colon">:</div>
											<div class="sft-sale-popup-number-container">
												<div class="seconds time"><span class="sft-countdown-seconds-three">00</span></div>
												<div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'SECS', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
											</div>
										</div>
										<?php
									}

									// Sale four.
									if ( get_option( 'sale_bf4_start' ) ) {
										?>
										<h3 class="sft-sale-popup-heading"><?php echo esc_html__( 'Extended BFCM MEGA SALE!', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></h3>

										<!-- Coundown Container -->
										<div id="sft-popup-sale-countdown-timer-container">
											<div class="sft-sale-popup-number-container">
												<div class="days time"><span class="sft-countdown-days-four">00</span></div>
												<div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'DAYS', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
											</div>

											<div class="sft-sale-popup-countdown-colon">:</div>
											<div class="sft-sale-popup-number-container">
												<div class="hours time"><span class="sft-countdown-hours-four">00</span></div>
												<div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'HRS', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
											</div>

											<div class="sft-sale-popup-countdown-colon">:</div>
											<div class="sft-sale-popup-number-container">
												<div class="minutes time"><span class="sft-countdown-minutes-four">00</span></div>
												<div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'MINS', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
											</div>

											<div class="sft-sale-popup-countdown-colon">:</div>
											<div class="sft-sale-popup-number-container">
												<div class="seconds time"><span class="sft-countdown-seconds-four">00</span></div>
												<div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'SECS', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
											</div>
										</div>
										<?php
									}
									?>
								</div>

								<div class="sft-ql-popup-btn-container"><a class="sft-ql-popup-sale-btn-link" style="text-decoration: none;" target="_blank" href="https://www.saffiretech.com/products/?utm_source=wp_plugin&utm_medium=sale_popup&utm_campaign=bfcm2024&utm_id=19">
								<button class="sft-ql-popup-deal-btn"><?php echo esc_html__( 'GRAB MY DISCOUNT', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></button></a></div>
								&nbsp;
							</div>
						</div>
					</div>
				<?php } ?>

				<script>

					// Show the popup with a fade-in effect after 2 seconds.
					setTimeout( function() {
						jQuery('.sft-quick-links-popup').fadeIn(400);
					}, 2000);

					// Handel close popup script.
					setTimeout( () => {

						// AJAX to show popup notice.
						jQuery('button.sft-quick-links-close-popup').on('click', function(e){
							e.preventDefault();
							jQuery.ajax({
								type: "POST",
								url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
								data: {
									action: 'beucw_update_new_sale_notice_read',
								},
								success: (res) => {
								}
							});
						})
					}, 2002);

					jQuery(document).ready(function() {

						jQuery( '#wpfooter').css('position', 'relative' );

						// Check if hidden.
						let isHide = <?php echo esc_html( $hide_message ); ?>

						if ( isHide ) {
							jQuery( '.beucw-quick-links-popup').hide();
						} else {
							jQuery( '.beucw-quick-links-popup').fadeIn(400);;
						}

						// Disable the menu toggle until the popup is closed.
						if ( jQuery('.sft-quick-links-popup').length ) {
							var isPopupClosed = false;
						} else {
							var isPopupClosed = true;
						}

						// Close the popup when the "x" button is clicked.
						jQuery('.sft-quick-links-close-popup').click(function() {

							// Close the popup with fade-out effect.
							jQuery('.sft-quick-links-popup').fadeOut(400);

							// Enable the menu toggle.
							isPopupClosed = true;
						});

						// Toggle the menu items on click of the logo button.
						jQuery('.sft-quick-links-menu-icon').click(function() {
							if (isPopupClosed) {

								// Toggle with slide effect.
								jQuery('.sft-quick-links-menu-items').slideToggle(400);
							}
						});
					});
				</script>
			</div>
		</div>
	</div>
	<?php
}

// ----------------------------------------------- Dismmiss Sale plugin popup notice ---------------------------------------.

add_action( 'wp_ajax_beucw_update_new_sale_notice_read', 'beucw_update_new_sale_notice_read' );

/**
 * AJAX handler to hide the sale popup.
 */
function beucw_update_new_sale_notice_read() {
	update_option( 'beucw_latest_popup_sale_notice', 1 );
	wp_die();
}


add_action( 'admin_init', 'beucw_bulk_edit_settings_function' );

/**
 * Function to add setting field .
 */
function beucw_bulk_edit_settings_function() {
	add_settings_section( 'bucw-section', '', null, 'bulk-edit-upsells-crosssells' );
	add_settings_field( 'bucw-product-categories', '', 'beucw_products_table', 'bulk-edit-upsells-crosssells', 'bucw-section', array( 'class' => 'bucw-settings-field' ) );

	// ========================api settings======================
	add_settings_section( 'beucw-account-settings-group', '', null, 'beucw-ai-key-settings-options' );

	// Setting api key enter.
	register_setting( 'beucw-api-field-setting', 'beucw_openai_api_key' );
	add_settings_field( 'beucw_openai_api_key', esc_attr__( 'Enter Open AI API Key', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ), 'beucw_get_ai_api_key_field', 'beucw-ai-key-settings-options', 'beucw-account-settings-group' );

	// Setting api model select.
	register_setting( 'beucw-api-field-setting', 'beucw_openai_api_model' );
	add_settings_field( 'beucw_openai_api_model', esc_attr__( 'Select OpenAi Model', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ), 'beucw_get_ai_api_model_field', 'beucw-ai-key-settings-options', 'beucw-account-settings-group' );
}

// --------------------------------------- Bulk edit all section main table ---------------------------.

/**
 * Setting field callback function for filter dropdown and select field.
 */
function beucw_products_table() {

	// All allowed html tags.
	$allowed_html = array(
		'select' => array(
			'id'       => array(),
			'name'     => array(),
			'class'    => array(),
			'value'    => array(),
			'multiple' => array(),
		),
		'option' => array(
			'id'       => array(),
			'value'    => array(),
			'selected' => array(),
		),
	);

	// Key valid status.
	$validation_key_status = get_option( 'beucw_api_valid_key_status' ) ? get_option( 'beucw_api_valid_key_status' ) : '';

	// Response status.
	$key_response_status = get_option( 'beucw_api_request_created_status' ) ? get_option( 'beucw_api_request_created_status' ) : '';

	// Api created status.
	$api_request_status = get_option( 'beucw_api_request_created_status' ) ? get_option( 'beucw_api_request_created_status' ) : '';

	// All product categories.
	$product_categories = get_terms( 'product_cat', array( 'hide_empty' => false ) );

	// All product id with variation.
	$all_products = beucw_get_all_products();

	$data_type_selection = get_option( 'beucw_all_products' );

	$selected_products = get_option( 'beucw_product_list' );

	$selected_categories = get_option( 'beucw_prompt_cat_selection' );

	// Api settings page url.
	$api_settings_page = admin_url( 'admin.php?page=beucw_api_setting_page' );

	$display_prompt = get_option( 'beucw_default_ai_prompt' );

	$tokens_used = get_option( 'beucw_tokens_used' ) ? get_option( 'beucw_tokens_used' ) : '2000';
	?>

	<!-- Filter DropDown Divs -->
	<div class="bucw-filter-dropdown">

		<!-- Filters header select box -->
		<div id="bucw-filter-header">
			<div>
				<!-- Filter type -->
				<select name="filter-type" id="beucw-filter-type">
					<option value="filter-by"><?php esc_html_e( 'Select Filter', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></option>
					<option id="bucw-category" value="bucw-category"><?php esc_html_e( 'Category', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></option>
					<option id="bucw-tags" value="bucw-tags"><?php esc_html_e( 'Tags', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></option>
					<option id="bucw-sku" value="bucw-sku"><?php esc_html_e( 'SKU', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></option>
					<option id="bucw-product" value="bucw-product"><?php esc_html_e( 'Product Name', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></option>
				</select>
			</div>

			<!-- Filter dropdown -->
			<div id="bucw-filter-container"> 

				<!-- Categoty select box -->
				<div id="bucw-select-categories">
					<select class="bucw-filter-box" id="bucw-multiple-categories" name="bucw-multiple-categories[]" data-placeholder="<?php echo esc_attr__( 'Search for categories…', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>" multiple="multiple">
						<?php echo wp_kses( beucw_select2_get_all_categories(), $allowed_html ); ?>
					</select>
				</div>

				<!-- Tag select box -->
				<div id="bucw-select-tags">
					<select class="bucw-filter-box" id="bucw-multiple-tags" name="bucw-multiple-tags[]" data-placeholder="<?php echo esc_attr__( 'Search for tags…', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>" multiple="multiple">
						<?php echo wp_kses( beucw_select2_get_all_tags(), $allowed_html ); ?>
					</select>
				</div>

				<!-- SKU select box -->
				<div id="bucw-select-sku">
					<select class="bucw-filter-box" id="bucw-multiple-sku" name="bucw-multiple-sku[]" data-placeholder="<?php echo esc_attr__( 'Search for SKU…', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>" multiple="multiple">
						<?php echo wp_kses( beucw_select2_get_all_product_sku(), $allowed_html ); ?>
					</select>
				</div>

				<!-- Single product select box -->
				<div id="bucw-select-product">
					<select class="bucw-product-filter-box" id="bucw-single-product" name="bucw-single-product[]" data-placeholder="<?php echo esc_attr__( 'Type any product name...', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>" multiple="multiple">
					<option value=""></option >
						<?php
						$all_products = beucw_get_all_products();

						foreach ( $all_products as $beuc_product ) {
							echo '<option value="' . esc_attr( $beuc_product['product_id'] ) . '">' . esc_attr( $beuc_product['label'] ) . '</option >';
						}
						?>
					</select>
				</div>
			</div>

			<!-- Search div -->
			<div class="bucw-search">
				<button type="button" class="button" id="bucw-search-product" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352c79.5 0 144-64.5 144-144s-64.5-144-144-144S64 128.5 64 208s64.5 144 144 144z"/></svg><?php esc_html_e( 'Search', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></button>
				<button type="button" class="bucw-save" id="bucw-save-top" > <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 416c-35.3 0-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64z"/></svg><?php esc_html_e( 'Save', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?> 
			</div>
		</div>
	</div><br/>

	<!-- Pagignation section upper -->
	<div class="bucw-left-way">

		<!-- product number -->
		<div class="bucw-number-filter">
			<label for="bucw-number">Product Count</label>
			<select name="bucw-number" id="bucw-number">
				<option value="5">5</option>
				<option value="">10 (Pro Version)</option>
				<option value="">15 (Pro Version)</option>
				<option value="">25 (Pro Version)</option>
			</select>
			&nbsp;&nbsp;
			<span><svg class="bucw_pro_notice" onclick="beucw_call_notice()" xmlns="http://www.w3.org/2000/svg" height="20" width="22" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#f8c844" d="M528 448H112c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h416c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm64-320c-26.5 0-48 21.5-48 48 0 7.1 1.6 13.7 4.4 19.8L476 239.2c-15.4 9.2-35.3 4-44.2-11.6L350.3 85C361 76.2 368 63 368 48c0-26.5-21.5-48-48-48s-48 21.5-48 48c0 15 7 28.2 17.7 37l-81.5 142.6c-8.9 15.6-28.9 20.8-44.2 11.6l-72.3-43.4c2.7-6 4.4-12.7 4.4-19.8 0-26.5-21.5-48-48-48S0 149.5 0 176s21.5 48 48 48c2.6 0 5.2-.4 7.7-.8L128 416h384l72.3-192.8c2.5 .4 5.1 .8 7.7 .8 26.5 0 48-21.5 48-48s-21.5-48-48-48z"/></svg> Now, manage 50 products in one go with our <a href="https://www.saffiretech.com/woocommerce-related-products-pro/?utm_source=wp_plugin&utm_medium=profield&utm_campaign=free2pro&utm_id=c1&utm_term=related-product-pro-for-woocommerce&utm_content=beucw">PRO plugin!</a></span>
		</div>

		<!-- pagignation div -->
		<div class="bucw-pagig-div">
			<span class="bucw_product_count"></span>

			<button type="button" class="bucw_product_first width_but" onclick="bucw_first_get_data()">&laquo;</button>
			<button type="button" class="bucw_product_prev width_but" onclick="bucw_prev_get_data( this )">&lsaquo;</button>

			<span class="bucw_product_num">
				<input type="number" class="bucw_numtext upf" min="1" value="1" onkeypress="bucw_get_text_data( this, event )">
			</span> of <span class="bucw_pages_total"></span>

			<button type="button" class="bucw_product_next width_but" onclick="bucw_next_get_data()">&rsaquo;</button>
			<button type="button" class="bucw_product_last width_but" onclick="bucw_last_get_data()">&raquo;</button>
		</div>
	</div>
	<br/><br/>

	<!-- Loader Image-->
	<div id="bucw_loader">
		<img id="beucw-loading-image" src="<?php echo esc_url( plugins_url() . '/bulk-edit-upsells-and-cross-sells-for-woocommerce/assets/img/loader.gif' ); ?>" style="display:none;"/>
	</div>

	<!-- Product div to show upsells, cross-sells and related products -->
	<div id="beucw-products-table" class="beucw-products-table"></div>

	<!-- Pagignation section lower -->
	<div class="bucw-left-way bucw_bottom">

		<!-- pagignation div -->
		<div class="bucw-pagig-div">
			<span class="bucw_product_count"></span>

			<button type="button" class="bucw_product_first width_but" onclick="bucw_first_get_data()">&laquo;</button>
			<button type="button" class="bucw_product_prev width_but" onclick="bucw_prev_get_data( this )">&lsaquo;</button>

			<span class="bucw_product_num">
				<input type="number" class="bucw_numtext dpf" min="1" value="1" onkeypress="bucw_get_text_data( this, event )">
			</span> of <span class="bucw_pages_total"></span>

			<button type="button" class="bucw_product_next width_but" onclick="bucw_next_get_data()">&rsaquo;</button>
			<button type="button" class="bucw_product_last width_but" onclick="bucw_last_get_data()">&raquo;</button>
		</div>
	</div>
	<br/><br/>

	<script>

		// On first button click.
		function bucw_first_get_data() {

			var filterType = jQuery("#beucw-filter-type").val();

			var taxonomyID;

			if ("bucw-category" == filterType) {
				var taxonomyID = jQuery("#bucw-multiple-categories").val();
			} else if ("bucw-tags" == filterType) {
				var taxonomyID = jQuery("#bucw-multiple-tags").val();
			} else if ("bucw-product" == filterType) {
				var taxonomyID = jQuery("#bucw-single-product").val();
			} else if ("bucw-sku" == filterType) {
				var taxonomyID = jQuery("#bucw-multiple-sku").val();
			} else {
				Swal.fire('', __('Please select a filter ( product category, tags, product name or SKU) to search your products.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce'), 'warning');
				return;
			}

			if (!(taxonomyID === "")) {
				jQuery.ajax({
					url: upsellajaxapi.url,
					type: "POST",
					data: {
						action: "beucw_taxonomyID_action",
						nonce: upsellajaxapi.nonce,
						filterType: filterType,
						taxonomyID: taxonomyID,
						limitdata : 5,
						offsetdata: 0,
					},
					beforeSend: function () {
						jQuery("#beucw-loading-image").show();
					},
					success: function (data) {
						if (!data) {
							Swal.fire('', __('No products found on current on selected search criteria. Please change filter or search for other products.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce'), 'warning');
							jQuery("#beucw-products-table").hide();
							jQuery("#beucw-loading-image").hide();
							jQuery(".bucw-left-way").hide();
						} else {
							jQuery("#beucw-products-table").show();
							jQuery("#beucw-products-table").html(data);
							jQuery('.beucw-select2').select2({ width: '100%', minimumInputLength: 2 });
							jQuery(".bucw-save").show();

							jQuery("#beucw-loading-image").hide();
							jQuery(".bucw-left-way").css('display','flex');

							// Total Product Count.
							let productTotalCount = parseInt( jQuery(".beucw_total").val() );

							let total_page_numbers  = Math.ceil( parseFloat( parseInt( productTotalCount ) / parseInt( 5 ) ) );

							// Total Product count.
							jQuery(".bucw_product_count").html( productTotalCount + " Items  " );

							// Total Page count after of number.
							jQuery(".bucw_pages_total").html( Math.ceil( productTotalCount / 5 ) );

							// Default value one.
							jQuery(".bucw_numtext").val(1);

							jQuery( '.bucw_product_prev' ).prop('disabled', true);
							jQuery( '.bucw_product_first' ).prop('disabled', true);

							jQuery( '.bucw_product_next' ).prop('disabled', false);
							jQuery( '.bucw_product_last' ).prop('disabled', false);
						}
					},
				});
			} else {
				Swal.fire('', __('Please input  keywords/ terms for the chosen filter for the products you wish to update', 'bulk-edit-upsells-and-cross-sells-for-woocommerce'), 'warning');
			}
		}

		// On previous button click.
		function bucw_prev_get_data( predata ) {
			var taxonomyID;

			var filterType    = jQuery("#beucw-filter-type").val();
			let selected_data = jQuery('#bucw-number').val();

			if ("bucw-category" == filterType) {
				var taxonomyID = jQuery("#bucw-multiple-categories").val();
			} else if ("bucw-tags" == filterType) {
				var taxonomyID = jQuery("#bucw-multiple-tags").val();
			} else if ("bucw-product" == filterType) {
				var taxonomyID = jQuery("#bucw-single-product").val();
			} else if ("bucw-sku" == filterType) {
				var taxonomyID = jQuery("#bucw-multiple-sku").val();
			} else {
				Swal.fire('', __('Please select a filter ( product category, tags, product name or SKU) to search your products.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce'), 'warning');
				return;
			}

			if (!(taxonomyID === "")) {

				// Current textbox value.
				let currentbox = jQuery( predata ).siblings('.bucw_product_num').children('.bucw_numtext').val();

				// Current page number.
				let current_page_number = parseInt( currentbox );

				// Set dynamic page number to textbox.
				jQuery('.bucw_numtext.upf').val( Math.ceil( ( current_page_number !== 1 ) ? current_page_number - 1 : 1 ) );
				jQuery('.bucw_numtext.dpf').val( Math.ceil( ( current_page_number !== 1 ) ? current_page_number - 1 : 1 ) );

				// get the value.
				let new_page = jQuery(predata).siblings('.bucw_product_num').children('.bucw_numtext').val( Math.ceil( ( current_page_number !== 1 ) ? current_page_number - 1 : 1 ) );

				// Get the current data.
				let page_data = new_page.val();

				jQuery.ajax({
					url: upsellajaxapi.url,
					type: "POST",
					data: {
						action: "beucw_taxonomyID_action",
						nonce: upsellajaxapi.nonce,
						filterType: filterType,
						taxonomyID: taxonomyID,
						limitdata : 5,
						offsetdata: ( page_data != 1 ) ? ( page_data ) * parseInt( 5 ) - parseInt( 5 ) : 0,
					},
					beforeSend: function () {
						jQuery("#beucw-loading-image").show();
					},
					success: function (data) {
						if (!data) {
							Swal.fire('', __('No products found on current on selected search criteria. Please change filter or search for other products.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce'), 'warning');
							jQuery("#beucw-products-table").hide();
							jQuery("#beucw-loading-image").hide();
							jQuery(".bucw-left-way").hide();
						} else {
							jQuery("#beucw-products-table").show();
							jQuery("#beucw-products-table").html(data);
							jQuery('.beucw-select2').select2({ width: '100%', minimumInputLength: 2 });
							jQuery(".bucw-save").show();

							jQuery("#beucw-loading-image").hide();
							jQuery(".bucw-left-way").css('display','flex');

							// Total Product Count.
							let productTotalCount  = parseInt( jQuery(".beucw_total").val() );
							let total_page_numbers = Math.ceil( parseFloat( parseInt( productTotalCount ) / parseInt( 5 ) ) );

							// Total Product count.
							jQuery(".bucw_product_count").html( productTotalCount + " Items  " );

							// Total Page count after of number.
							jQuery(".bucw_pages_total").html( Math.ceil( productTotalCount / 5 ) );

							// Current textbox value.
							let currentPageVal = parseInt( new_page.val() );

							if ( currentPageVal == 1 ) {
								jQuery( '.bucw_product_prev' ).prop('disabled', true);
								jQuery( '.bucw_product_first' ).prop('disabled', true);

								jQuery( '.bucw_product_next' ).prop('disabled', false);
								jQuery( '.bucw_product_last' ).prop('disabled', false);
							} else {
								jQuery( '.bucw_product_prev' ).prop('disabled', false);
								jQuery( '.bucw_product_first' ).prop('disabled', false);

								jQuery( '.bucw_product_next' ).prop('disabled', false);
								jQuery( '.bucw_product_last' ).prop('disabled', false);
							}
						}
					},
				});
			} else {
				Swal.fire('', __('Please input  keywords/ terms for the chosen filter for the products you wish to update', 'bulk-edit-upsells-and-cross-sells-for-woocommerce'), 'warning');
			}
		}

		// On input enter change.
		function bucw_get_text_data( curdata, event ) {

			var key = event.keyCode || event.which;

			// On enter key press.
			if ( key == 13 ) {
				var taxonomyID;

				var filterType    = jQuery("#beucw-filter-type").val();
				let selected_data = jQuery('#bucw-number').val();

				// Filter types.
				if ("bucw-category" == filterType) {
					var taxonomyID = jQuery("#bucw-multiple-categories").val();
				} else if ("bucw-tags" == filterType) {
					var taxonomyID = jQuery("#bucw-multiple-tags").val();
				} else if ("bucw-product" == filterType) {
					var taxonomyID = jQuery("#bucw-single-product").val();
				} else if ("bucw-sku" == filterType) {
					var taxonomyID = jQuery("#bucw-multiple-sku").val();
				} else {
					Swal.fire('', __('Please select a filter ( product category, tags, product name or SKU) to search your products.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce'), 'warning');
					return;
				}

				// If filter is selected.
				if (!(taxonomyID === "")) {

					// Get page maximum value. 
					let pageMax = parseInt( jQuery(curdata).attr( 'max' ) );

					// Get current page no.
					var current_page_number = parseInt( jQuery(curdata).val() );

					// Set default page number.
					if ( current_page_number > 0 && current_page_number < pageMax ) {
						current_page_number = Math.ceil( current_page_number );

						jQuery(curdata).val( current_page_number );
						jQuery(".bucw_numtext.upf").val( current_page_number );
						jQuery(".bucw_numtext.dpf").val( current_page_number );
					} else if ( current_page_number <  0 || current_page_number === 0 ) {
						current_page_number = 1;

						jQuery(curdata).val( current_page_number );
						jQuery(".bucw_numtext.upf").val( current_page_number );
						jQuery(".bucw_numtext.dpf").val( current_page_number );
					} else if ( current_page_number > pageMax || current_page_number == pageMax ) {
						current_page_number = pageMax;

						jQuery(curdata).val( current_page_number );
						jQuery(".bucw_numtext.upf").val( current_page_number );
						jQuery(".bucw_numtext.dpf").val( current_page_number );
					}

					jQuery.ajax({
						url: upsellajaxapi.url,
						type: "POST",
						data: {
							action: "beucw_taxonomyID_action",
							nonce: upsellajaxapi.nonce,
							filterType: filterType,
							taxonomyID: taxonomyID,
							limitdata : 5,
							offsetdata: ( current_page_number != 1 ) ? ( current_page_number ) * parseInt( 5 ) - parseInt( 5 ) : 0,
						},
						beforeSend: function () {
							jQuery("#beucw-loading-image").show();
						},
						success: function (data) {
							if (!data) {
								Swal.fire('', __('No products found on current on selected search criteria. Please change filter or search for other products.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce'), 'warning');
								jQuery("#beucw-products-table").hide();
							} else {
								jQuery("#beucw-products-table").show();
								jQuery("#beucw-products-table").html(data);
								jQuery('.beucw-select2').select2({ width: '100%', minimumInputLength: 2 });
								jQuery(".bucw-save").show();

								jQuery("#beucw-loading-image").hide();
								jQuery(".bucw-left-way").css('display','flex');

								// Total Product Count.
								let productTotalCount  = parseInt( jQuery(".beucw_total").val() );
								let total_page_numbers = Math.ceil( parseFloat( parseInt( productTotalCount ) / 5 ) );

								// Total Product count on span.
								jQuery(".bucw_product_count").html( productTotalCount + " Items  " );

								// Total Page count after of number.
								jQuery(".bucw_pages_total").html( Math.ceil( productTotalCount / 5 ) );

								// Set default page number.
								if ( current_page_number > 0 && current_page_number < total_page_numbers ) {
									jQuery(curdata).val( Math.ceil( current_page_number ) );
									jQuery(".bucw_numtext.upf").val( Math.ceil( current_page_number ) );
									jQuery(".bucw_numtext.dpf").val( Math.ceil( current_page_number ) );
								} else if ( current_page_number <  0 ) {
									jQuery(curdata).val( 1 );
									jQuery(".bucw_numtext.upf").val( 1 );
									jQuery(".bucw_numtext.dpf").val( 1 );
								} else if ( current_page_number > total_page_numbers ) {
									jQuery(curdata).val( total_page_numbers );
									jQuery(".bucw_numtext.upf").val( total_page_numbers );
									jQuery(".bucw_numtext.dpf").val( total_page_numbers );
								}

								// Current page no.
								let currentPageNo = parseInt( jQuery(curdata).val() );

								// If only one page
								if ( currentPageNo === 1 && total_page_numbers > 1 ) {
									jQuery( '.bucw_product_first' ).prop('disabled', true);
									jQuery( '.bucw_product_prev' ).prop('disabled', true);

									jQuery( '.bucw_product_next' ).prop('disabled', false);
									jQuery( '.bucw_product_last' ).prop('disabled', false);
								}

								// If page no are same.
								if ( currentPageNo == total_page_numbers ) {
									jQuery( '.bucw_product_next' ).prop('disabled', true);
									jQuery( '.bucw_product_last' ).prop('disabled', true);

									jQuery( '.bucw_product_prev' ).prop('disabled', false);
									jQuery( '.bucw_product_first' ).prop('disabled', false);

								} else if ( currentPageNo > 1 && total_page_numbers > 1 ) {
									jQuery( '.bucw_product_next' ).prop('disabled', false);
									jQuery( '.bucw_product_last' ).prop('disabled', false);

									jQuery( '.bucw_product_prev' ).prop('disabled', false);
									jQuery( '.bucw_product_first' ).prop('disabled', false);
								}
							}
						},
					});
				} else {
					Swal.fire('', __('Please input  keywords/ terms for the chosen filter for the products you wish to update', 'bulk-edit-upsells-and-cross-sells-for-woocommerce'), 'warning');
				}
			}
		}

		// On next button click.
		function bucw_next_get_data() {
			var taxonomyID;

			var filterType = jQuery("#beucw-filter-type").val();

			if ("bucw-category" == filterType) {
				var taxonomyID = jQuery("#bucw-multiple-categories").val();
			} else if ("bucw-tags" == filterType) {
				var taxonomyID = jQuery("#bucw-multiple-tags").val();
			} else if ("bucw-product" == filterType) {
				var taxonomyID = jQuery("#bucw-single-product").val();
			} else if ("bucw-sku" == filterType) {
				var taxonomyID = jQuery("#bucw-multiple-sku").val();
			} else {
				Swal.fire('', __('Please select a filter ( product category, tags, product name or SKU) to search your products.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce'), 'warning');
				return;
			}

			if (!(taxonomyID === "")) {

				// Get maximum page value.
				let pageMax = parseInt( jQuery(".bucw_numtext").attr( 'max' ) );

				// Get current page number.
				let current_page_number = parseInt( jQuery(".bucw_numtext").val() );

				jQuery.ajax({
					url: upsellajaxapi.url,
					type: "POST",
					data: {
						action: "beucw_taxonomyID_action",
						nonce: upsellajaxapi.nonce,
						filterType: filterType,
						taxonomyID: taxonomyID,
						limitdata : 5,
						offsetdata: current_page_number * parseInt( 5 ),
					},
					beforeSend: function () {
						jQuery("#beucw-loading-image").show();
					},
					success: function (data) {
						if (!data) {
							Swal.fire('', __('No products found on current on selected search criteria. Please change filter or search for other products.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce'), 'warning');
							jQuery("#beucw-products-table").hide();
							jQuery('#beucw-loading-image').hide();
							jQuery('.bucw-left-way').hide();
						} else {
							jQuery("#beucw-products-table").show();
							jQuery("#beucw-products-table").html(data);
							jQuery('.beucw-select2').select2({ width: '100%', minimumInputLength: 2 });
							jQuery(".bucw-save").show();

							// Hide loading image and show pagignation.
							jQuery('#beucw-loading-image').hide();
							jQuery('.bucw-left-way').css('display','flex');

							// Total Product count.
							let productTotalCount = parseInt( jQuery(".beucw_total").val() );

							let total_page_numbers  = Math.ceil( parseFloat( parseInt( productTotalCount ) / parseInt( 5 ) ) );

							// Total Product count on span.
							jQuery(".bucw_product_count").html( productTotalCount + " Items  " );

							// Total Page count after of number.
							jQuery(".bucw_pages_total").html( Math.ceil( productTotalCount / 5 ) );

							// Dynamic text box value.
							jQuery(".bucw_numtext").val( Math.ceil( ( current_page_number !== total_page_numbers ) ? current_page_number + 1 : total_page_numbers ) );

							let currentPageVal = parseInt( jQuery(".bucw_numtext").val() );

							if ( currentPageVal == total_page_numbers ) {
								jQuery( '.bucw_product_next' ).prop('disabled', true);
								jQuery( '.bucw_product_last' ).prop('disabled', true);

								jQuery( '.bucw_product_first' ).prop('disabled', false);
								jQuery( '.bucw_product_prev' ).prop('disabled', false);
							} else {
								jQuery( '.bucw_product_next' ).prop('disabled', false);
								jQuery( '.bucw_product_last' ).prop('disabled', false);

								jQuery( '.bucw_product_first' ).prop('disabled', false);
								jQuery( '.bucw_product_prev' ).prop('disabled', false);
							}
						}
					},
				});
			} else {
				Swal.fire('', __('Please input  keywords/ terms for the chosen filter for the products you wish to update', 'bulk-edit-upsells-and-cross-sells-for-woocommerce'), 'warning');
			}
		}

		// On last button click.
		function bucw_last_get_data() {
			var taxonomyID;

			let pageTotal = Math.ceil( jQuery(".beucw_total_pages").val() );
			let pageMax   = parseInt( jQuery(".bucw_numtext").attr( 'max' ) );

			var filterType = jQuery("#beucw-filter-type").val();

			if ("bucw-category" == filterType) {
				var taxonomyID = jQuery("#bucw-multiple-categories").val();
			} else if ("bucw-tags" == filterType) {
				var taxonomyID = jQuery("#bucw-multiple-tags").val();
			} else if ("bucw-product" == filterType) {
				var taxonomyID = jQuery("#bucw-single-product").val();
			} else if ("bucw-sku" == filterType) {
				var taxonomyID = jQuery("#bucw-multiple-sku").val();
			} else {
				Swal.fire('', __('Please select a filter ( product category, tags, product name or SKU) to search your products.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce'), 'warning');
				return;
			}

			if (!(taxonomyID === "")) {

				// Total pages count.
				let productTotalCount = parseInt( jQuery(".beucw_total").val() );

				let total_page_numbers  = Math.ceil( parseFloat( parseInt( productTotalCount ) / parseInt( 5 ) ) );

				jQuery.ajax({
					url: upsellajaxapi.url,
					type: "POST",
					data: {
						action: "beucw_taxonomyID_action",
						nonce: upsellajaxapi.nonce,
						filterType: filterType,
						taxonomyID: taxonomyID,
						limitdata : 5,
						offsetdata: ( total_page_numbers - 1 ) * parseInt( 5 ),
					},
					beforeSend: function () {
						jQuery("#beucw-loading-image").show();
					},
					success: function (data) {
						if (!data) {
							Swal.fire('', __('No products found on current on selected search criteria. Please change filter or search for other products.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce'), 'warning');
							jQuery("#beucw-products-table").hide();
							jQuery("#beucw-loading-image").hide();
							jQuery(".bucw-left-way").hide();
						} else {
							jQuery("#beucw-products-table").show();
							jQuery("#beucw-products-table").html(data);
							jQuery('.beucw-select2').select2({ width: '100%', minimumInputLength: 2 });
							jQuery(".bucw-save").show();

							jQuery("#beucw-loading-image").hide();
							jQuery(".bucw-left-way").css('display','flex');

							// Total Product count.
							let productTotalCount = parseInt( jQuery(".beucw_total").val() );

							let total_page_numbers  = Math.ceil( parseFloat( parseInt( productTotalCount ) / parseInt( 5 ) ) );

							// Total Product count.
							jQuery(".bucw_product_count").html( productTotalCount + " Items  " );

							// Total Page count after of number.
							jQuery(".bucw_pages_total").html( Math.ceil( productTotalCount / 5 ) );

							// Total page count set to textbox.
							jQuery(".bucw_numtext").val( Math.ceil( total_page_numbers ) );

							jQuery( '.bucw_product_next' ).prop('disabled', true);
							jQuery( '.bucw_product_last' ).prop('disabled', true);

							jQuery( '.bucw_product_first' ).prop('disabled', false);
							jQuery( '.bucw_product_prev' ).prop('disabled', false);
						}
					},
				});
			} else {
				Swal.fire('', __('Please input  keywords/ terms for the chosen filter for the products you wish to update', 'bulk-edit-upsells-and-cross-sells-for-woocommerce'), 'warning');
			}
		}

		// SVG notice PoPup.
		function beucw_call_notice() {

			var bucwUpgradeNow = '<?php esc_html_e( 'Upgrade Now', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>';

			Swal.fire({
				title: '<div class="pro-alert-header">' + '<?php esc_html_e( 'Pro Field Alert!', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>' + '</div>',
				showCloseButton: true,
				html: '<div class="pro-crown"><svg xmlns="http://www.w3.org/2000/svg" height="100" width="100" viewBox="0 0 640 512"><path fill="#f8c844" d="M528 448H112c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h416c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm64-320c-26.5 0-48 21.5-48 48 0 7.1 1.6 13.7 4.4 19.8L476 239.2c-15.4 9.2-35.3 4-44.2-11.6L350.3 85C361 76.2 368 63 368 48c0-26.5-21.5-48-48-48s-48 21.5-48 48c0 15 7 28.2 17.7 37l-81.5 142.6c-8.9 15.6-28.9 20.8-44.2 11.6l-72.3-43.4c2.7-6 4.4-12.7 4.4-19.8 0-26.5-21.5-48-48-48S0 149.5 0 176s21.5 48 48 48c2.6 0 5.2-.4 7.7-.8L128 416h384l72.3-192.8c2.5 .4 5.1 .8 7.7 .8 26.5 0 48-21.5 48-48s-21.5-48-48-48z"/></svg></div><div class="popup-text1"><?php esc_html_e( 'Looking for this cool feature? Go Pro!', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div><div class="popup-text2"><?php esc_html_e( 'Go with our premium version to unlock the following features:', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>' + '</div> <ul><li><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff3d3d" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>' + '<?php esc_html_e( 'bulk-edit-upsells-and-cross-sells-for-woocommerceBulk Update  Related Products, Upsells, and Cross-Sells from a single screen.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?> ' + '</li><li><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff3d3d" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg><?php esc_html_e( 'Custom Related Products  Shortcode with AJAX Slider.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></li><li><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512"><path fill="#ff3d3d" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>' + '<?php esc_html_e( 'More Control for Related Products : Show Ratings, Sale Price, Widget Location & more.', '' ); ?>' + '</li><li><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff3d3d" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg><?php esc_html_e( 'Sales Boost: Increase average order value and revenue.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></li></ul><button class="bucw-upgrade-now" style="border: none"><a href="https://www.saffiretech.com/woocommerce-related-products-pro?utm_source=wp_plugin&utm_medium=profield&utm_campaign=free2pro&utm_id=c1&utm_term=upgrade_now&utm_content=beucw" target="_blank" class="purchase-pro-link">'+bucwUpgradeNow+'</a></button>',
				customClass: "bucw-popup",
				showConfirmButton: false,
			});

			jQuery( '.bucw-popup' ).css('width', '800px');
			jQuery( '.bucw-popup > .swal2-header').css('background', '#061727' );
			jQuery( '.bucw-popup > .swal2-header').css('margin', '-20px' );
			jQuery( '.pro-alert-header' ).css('padding-top', '25px' );
			jQuery( '.pro-alert-header' ).css('padding-bottom', '20px' );
			jQuery( '.pro-alert-header' ).css( 'color', 'white' );
			jQuery( '.pro-crown' ).css( 'margin-top', '20px' );
			jQuery( '.popup-text1').css( 'font-size', '30px' );
			jQuery( '.popup-text1' ).css( 'font-weight', '600' );
			jQuery( '.popup-text1' ).css( 'padding-bottom', '10px' );
			jQuery( '.bucw-popup > .swal2-content > .swal2-html-container > ul ' ).css( 'text-align', 'justify' );
			jQuery( '.bucw-popup > .swal2-content > .swal2-html-container > ul ' ).css( 'padding-left', '25px' );
			jQuery( '.bucw-popup > .swal2-content > .swal2-html-container > ul ' ).css( 'padding-right', '25px' );
			jQuery( '.bucw-popup > .swal2-content > .swal2-html-container > ul ' ).css( 'line-height', '2em' );
			jQuery( '.popup-text2' ).css( 'padding', '10px' );
			jQuery( '.popup-text2' ).css( 'font-weignt', '500');
			jQuery( '.bucw-popup > .swal2-content > .swal2-html-container > ul, .popup-text1, .popup-text2').css('color', '#061727' );
		}

		// ---------------------------------------- AI popup send ---------------------------------------.

		jQuery(document).ready(function() {

			// AI Button Click.
			jQuery('#beucw-popup-button').click(function(e) {

				jQuery('.beucw_product_list').select2({ width: '400px' });

				e.preventDefault();

				let validation_status = '<?php echo esc_js( $validation_key_status ); ?>';

				// Response status.
				let response_status = '<?php echo esc_js( $key_response_status ); ?>';

				// Api request status.
				let request_status = '<?php echo esc_js( $api_request_status ); ?>';

				if ( validation_status != 1 ) {

					// For invalid Api key.
					Swal.fire({
						text: '<?php echo esc_html__( 'Please Enter Your Valid API Key First !', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>',
						icon: "warning",
						showCancelButton: true,
						confirmButtonColor: "#3085d6",
						cancelButtonColor: "#d33",
						confirmButtonText: '<?php echo esc_html__( 'Configure API Key', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>'
						}).then((result) => {
						if (result.isConfirmed) {
							// Move to Api key settings page.
							window.location.assign( '<?php echo esc_url( $api_settings_page ); ?>' );
						}
					}); 
				} else {

					// If response is insufficient quota.
					if ( response_status != 'insufficient_quota' ) {

						// Api response status
						if ((response_status != 'created') && (response_status != 'pending')) {

							// Make api request.
							Swal.fire({
								title: '<div class="beucw-ai-popup-heading"><?php echo esc_html__( 'AI PRODUCT SUGGESTIONS', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>',
								showCloseButton: true,
								html: `<div class="beucw-ai-popup">

										<div class="beucw-ai-outer-container">
											<div>
												<?php echo esc_html__( 'Select Products or Categories for AI Product Suggestions:', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?><span class="beucw-required">*</span>
												<div class="beucw-popup-btn-tooltip-container">
													<img src="<?php echo esc_attr( plugin_dir_url( dirname( __FILE__, 1 ) ) . 'assets/img/information-icon.svg' ); ?>" width="15px" height="15px" class="beucw-popup-tooltip-icon">
													<div class="beucw-ai-popup-btn-tooltip"><?php echo esc_html__( 'Choose specific products or categories for AI to suggest Related Products, Upsells, and Cross-Sells.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
												</div>
											</div>

											<div class="beucw-ai-radio-container">

												<div>
													<div>
														<input type="radio" id="beucw_all_products" value="all_products" disabled/>
														<span>
															<label for="beucw_all_products" style="display:flex;">
																<?php echo esc_html__( 'Select All Products', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>
																<div class="beucw-pro-lock-tooltip-container">
																	<img src="<?php echo esc_attr( plugin_dir_url( dirname( __FILE__, 1 ) ) . 'assets/img/pro-crown-logo.svg' ); ?>" width="15px" height="15px" title="Available in Pro Version" class="beucw-pro-version-lock alt">
																	<div class="beucw-pro-lock-btn-tooltip">
																		<?php echo esc_html__( 'Feature Available in ', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>
																		<a href="https://www.saffiretech.com/woocommerce-related-products-pro/">
																			<?php echo esc_html__( 'Pro Version', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?> 
																		</a>
																	</div>
																</div>
															</label>
														</span>
													</div>
												</div>

												<div>
													<div>
														<input type="radio" id="beucw_multiple_categories" value="categories"  disabled/>
														<span>
															<label for="beucw_multiple_categories" style="display:flex;">
																<?php echo esc_html__( 'Select Categories', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>
																<div class="beucw-pro-lock-tooltip-container">
																	<img src="<?php echo esc_attr( plugin_dir_url( dirname( __FILE__, 1 ) ) . 'assets/img/pro-crown-logo.svg' ); ?>" width="15px" height="15px" title="Available in Pro Version" class="beucw-pro-version-lock alt">
																	<div class="beucw-pro-lock-btn-tooltip">
																		<?php echo esc_html__( 'Feature Available in ', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>
																		<a href="https://www.saffiretech.com/woocommerce-related-products-pro/">
																			<?php echo esc_html__( 'Pro Version', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?> 
																		</a>
																	</div>
																</div>
															</label>
														</span>
													</div>
												</div>

												<div>
													<div>
													<input type="radio" id="beucw_multiple_products" name="beucw_all_products" value="products" checked="checked" />
													<span><label for="beucw_multiple_products">Select Individual Products</label></span>
													</div>
													<div class="beucw-select-field-container">
													<div class="beucw_max_select_warning">Note: You can select only <b>5 Products.</b></div>
														<select class="beucw_product_list" name="beucw_product_list" id="beucw_product_list" multiple>
															<?php
															foreach ( $all_products as $product ) {

																if ( ! empty( $selected_products ) && in_array( $product['product_id'], $selected_products ) ) {
																	?>
																	<option selected="selected" value='<?php echo esc_attr( $product['product_id'] ); ?>'><?php echo esc_html( $product['label'] ); ?></option>
																	<?php
																} else {
																	?>
																	<option value='<?php echo esc_attr( $product['product_id'] ); ?>'><?php echo esc_html( $product['label'] ); ?></option>
																	<?php
																}
															}
															?>
														</select>
														<div><?php echo esc_html( 'Use placeholder {selected_products} in prompt', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?><button class="clipboard beucw-selected-products-clipboard">&#128203;</button><span class="beucw-text-copied"></span></div>
													</div>
												</div>
											</div>

										</div>

										<div class="beucw-ai-outer-container">

											<div>
												<?php echo esc_html__( 'Select Product Details for AI Prompt:', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?> <span class="beucw-required">*</span>
												<div class="beucw-popup-btn-tooltip-container">
													<img src="<?php echo esc_attr( plugin_dir_url( dirname( __FILE__, 1 ) ) . 'assets/img/information-icon.svg' ); ?>" width="15px" height="15px" class="beucw-popup-tooltip-icon">
													<div class="beucw-ai-popup-btn-tooltip"><?php echo esc_html__( 'Customize the AI prompt by selecting product details to include, such as name, description, URL, or price. Providing comprehensive details can enhance the accuracy of product recommendations.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
												</div>
											</div>

											<div class="beucw-ai-checkbox-container">
												<div>
													<input type="checkbox" class="beucw_ai_checkbox" id="beucw_products_name" name="beucw_products_name" checked onclick="return false"/>
													<label for="beucw_products_name"><?php echo esc_html__( 'Product Name', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></label>
												</div>
												<div>
													<input type="checkbox" class="beucw_ai_checkbox" id="beucw_products_desc" name="beucw_products_desc" checked onclick="return false"/>
													<label for="beucw_products_desc"><?php echo esc_html__( 'Product Description (Short)', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></label>
												</div>
												<div>
													<input type="checkbox" class="beucw_ai_checkbox" id="beucw_products_url" disabled/>
													<label for="beucw_products_url" style="display:flex;">
														<?php echo esc_html__( 'Product URL', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>
														<div class="beucw-pro-lock-tooltip-container">
															<img src="<?php echo esc_attr( plugin_dir_url( dirname( __FILE__, 1 ) ) . 'assets/img/pro-crown-logo.svg' ); ?>" width="15px" height="15px" title="Available in Pro Version" class="beucw-pro-version-lock alt">
															<div class="beucw-pro-lock-btn-tooltip">
																<?php echo esc_html__( 'Feature Available in ', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>
																<a href="https://www.saffiretech.com/woocommerce-related-products-pro/">
																	<?php echo esc_html__( 'Pro Version', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?> 
																</a>
															</div>
														</div>
													</label>
												</div>
												<div>
													<input type="checkbox" class="beucw_ai_checkbox" id="beucw_products_price" disabled/>
													<label for="beucw_products_price" style="display:flex;">
														<?php echo esc_html__( 'Product Price', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>
														<div class="beucw-pro-lock-tooltip-container">
															<img src="<?php echo esc_attr( plugin_dir_url( dirname( __FILE__, 1 ) ) . 'assets/img/pro-crown-logo.svg' ); ?>" width="15px" height="15px" title="Available in Pro Version" class="beucw-pro-version-lock alt">
															<div class="beucw-pro-lock-btn-tooltip">
																<?php echo esc_html__( 'Feature Available in ', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>
																<a href="https://www.saffiretech.com/woocommerce-related-products-pro/">
																	<?php echo esc_html__( 'Pro Version', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?> 
																</a>
															</div>
														</div>
													</label>
												</div>
											</div>

										</div>

										<div class="beucw-ai-outer-container">

											<div>
												<?php echo esc_html__( 'Choose the Type of Product Suggestions:', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?> <span class="beucw-required">*</span>
												<div class="beucw-popup-btn-tooltip-container">
													<img src="<?php echo esc_attr( plugin_dir_url( dirname( __FILE__, 1 ) ) . 'assets/img/information-icon.svg' ); ?>" width="15px" height="15px" class="beucw-popup-tooltip-icon">
													<div class="beucw-ai-popup-btn-tooltip"><?php echo esc_html__( 'Select the type of product suggestions you want AI to generate. You can pick from options like Related Products, Upsells, or Cross-Sells to maximize your recommendation strategy.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
												</div>

												<div class="beucw-pro-lock-tooltip-container">
													<img src="<?php echo esc_attr( plugin_dir_url( dirname( __FILE__, 1 ) ) . 'assets/img/pro-crown-logo.svg' ); ?>" width="15px" height="15px" title="Available in Pro Version" class="beucw-pro-version-lock alt">
													<div class="beucw-pro-lock-btn-tooltip">
														<?php echo esc_html__( 'Feature Available in ', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>
														<a href="https://www.saffiretech.com/woocommerce-related-products-pro/">
															<?php echo esc_html__( 'Pro Version', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?> 
														</a>
													</div>
												</div>
											</div>

											<div class="beucw-ai-checkbox-container">
												<div>
													<input type="checkbox" class="beucw_ai_checkbox" id="beucw_ai_update_upsells" name="beucw_ai_update_upsells" checked="checked">
													<label for="beucw_ai_update_upsells"><?php echo esc_html__( 'Upsells', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></label>
												</div>
												<div>
													<input type="checkbox" class="beucw_ai_checkbox" id="beucw_ai_update_crosssells" name="beucw_ai_update_crosssells" checked="checked"/>
													<label for="beucw_ai_update_crosssells"><?php echo esc_html__( 'Cross-Sells', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></label>
												</div>
												<div>
													<input type="checkbox" class="beucw_ai_checkbox" id="beucw_ai_update_related" name="beucw_ai_update_related" disabled/>
													<label for="beucw_ai_update_related"><?php echo esc_html__( 'Related', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></label>
												</div>
											</div>
		
										</div>

										<div class="beucw-ai-outer-container">

											<div>
												<?php echo esc_html__( 'Set Number of Product Suggestions per Product:', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?> <span class="beucw-required">*</span>
												<div class="beucw-popup-btn-tooltip-container">
													<img src="<?php echo esc_attr( plugin_dir_url( dirname( __FILE__, 1 ) ) . 'assets/img/information-icon.svg' ); ?>" width="15px" height="15px" class="beucw-popup-tooltip-icon">
													<div class="beucw-ai-popup-btn-tooltip"><?php echo esc_html__( 'Specify how many suggestions you want for each product. Suggestions for Related Products, Upsells and Cross-sells are counted separately.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
												</div>

												<div class="beucw-pro-lock-tooltip-container">
													<img src="<?php echo esc_attr( plugin_dir_url( dirname( __FILE__, 1 ) ) . 'assets/img/pro-crown-logo.svg' ); ?>" width="15px" height="15px" title="Available in Pro Version" class="beucw-pro-version-lock alt">
													<div class="beucw-pro-lock-btn-tooltip">
														<?php echo esc_html__( 'Feature Available in ', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>
														<a href="https://www.saffiretech.com/woocommerce-related-products-pro/">
															<?php echo esc_html__( 'Pro Version', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?> 
														</a>
													</div>
												</div>
											</div>

											<div class="beucw-ai-checkbox-container">
												<div>
												<input type="number" id="beucw_ai_recommendations_limit" name="beucw_ai_recommendations_limit" min="1" max="10" value="5" disabled>
												</div>
												<p id="beucw-limit-message" style="color: red; display: none;"><?php echo esc_html__( 'Please enter a number between 1 and 10.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></p>
											</div>
										</div>

										<div class="beucw-ai-sub-section beucw-ai-outer-container">

											<div>
												<?php echo esc_html__( 'Describe Your Store:', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?><span class="beucw-required">*</span>
												<div class="beucw-popup-btn-tooltip-container">
													<img src="<?php echo esc_attr( plugin_dir_url( dirname( __FILE__, 1 ) ) . 'assets/img/information-icon.svg' ); ?>" width="15px" height="15px" class="beucw-popup-tooltip-icon">
													<div class="beucw-ai-popup-btn-tooltip"><?php echo esc_html__( 'Provide a brief description of your store to help AI understand your business better. This will enable more personalized and relevant product suggestions', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
												</div>
											</div>

											<div class="beucw-ai-checkbox-container">
												<textarea id="beucw_about_store" name="beucw_about_store" rows="3"><?php echo esc_html( get_option( 'beucw_about_store' ) ); ?></textarea>
											</div>
										</div>

										<div class="send_prompt beucw-ai-outer-container">

											<div>
												<?php echo esc_html__( 'AI Prompt:', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?><span class="beucw-required">*</span>
												<div class="beucw-popup-btn-tooltip-container">
													<img src="<?php echo esc_attr( plugin_dir_url( dirname( __FILE__, 1 ) ) . 'assets/img/information-icon.svg' ); ?>" width="15px" height="15px" class="beucw-popup-tooltip-icon">
													<div class="beucw-ai-popup-btn-tooltip"><?php echo esc_html__( 'The default AI prompt is optimized to work seamlessly with your products, but you can edit it to suit your needs. Personalize the prompt for more targeted and specific results.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
												</div>
											</div>

											<div class="beucw-prompt-default-edit-radio">
												<div>
													<input type="radio" class="beucw_ai_prompt_default" id="beucw_ai_prompt_default" name="beucw_ai_prompt_type" value="default" checked="checked" />
													<label for="beucw_ai_prompt_default"><?php echo esc_html__( 'Use Default Prompt', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></label>
												</div>
												<div>
													<input type="radio" class="beucw_ai_prompt_edit" id="beucw_ai_prompt_edit" name="beucw_ai_prompt_type" value="edit" />
													<label for="beucw_ai_prompt_edit" style="display:flex;">
														<?php echo esc_html__( 'Customize Default Prompt', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>
														<div class="beucw-pro-lock-tooltip-container">
															<img src="<?php echo esc_attr( plugin_dir_url( dirname( __FILE__, 1 ) ) . 'assets/img/pro-crown-logo.svg' ); ?>" width="15px" height="15px" title="Available in Pro Version" class="beucw-pro-version-lock alt">
															<div class="beucw-pro-lock-btn-tooltip">
																<?php echo esc_html__( 'Feature Available in ', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>
																<a href="https://www.saffiretech.com/woocommerce-related-products-pro/">
																	<?php echo esc_html__( 'Pro Version', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?> 
																</a>
															</div>
														</div>
													</label>
												</div>
											</div>

											<div class="beucw-ai-prompt-container" id="beucw_textarea_container">
												<textarea id="beucw_ai_request_prompt" name="beucw_ai_request_prompt" rows="4"><?php echo esc_html( $display_prompt ); ?></textarea>
											</div>
											<div class="beucw-tokens-request-container">
												<span class="beucw-token-status"></span>
												<div class="beucw-ai-request-warning"></div>
												<button id="beucw-send-prompt-btn" class="beucw-btn"><?php echo esc_html__( 'Create Request', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></button><span class="beucw-request-loader"></span><div class="display-response"></div>
											</div>
										</div>
									</div>`,
								customClass: "beucw-popup",
								showConfirmButton: false,
							});

							// Get all category ids.
							let productIds = new Set();
							// let detailsIds = new Set();

							// Make multiselect field.
							jQuery('select.beucw_product_list').multiSelect();
							jQuery('#beucw_ai_update_upsells, #beucw_ai_update_crosssells, #beucw_ai_update_related, #beucw_products_name, #beucw_products_desc').closest('div').css('pointer-events', 'none');

							//Disable all remaining products after limit is reached
							jQuery('select.beucw_product_list').change( function() {
								if (jQuery('select.beucw_product_list option:selected').length >= 5){

									var nonSelectedProducts = jQuery('.beucw_product_list option').not(':selected');

									nonSelectedProducts.each(function() {
										var productOption = jQuery('input[value="' + jQuery(this).val() + '"]');
										productOption.prop('disabled', true);
									});

								}else{

									jQuery('.beucw_product_list option').each(function() {
										var productOption = jQuery('input[value="' + jQuery(this).val() + '"]');
										productOption.prop('disabled', false);
									});
								}
							});

							// let promptField = jQuery( '.beucw-token-status' )
							let tokensUsed = <?php echo $tokens_used; ?>;
							jQuery( '.beucw-token-status' ).empty().append( tokensUsed + ' <?php echo esc_html__( 'tokens will be used out of 4096', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>' );

							// ----------------------------------- Change event ---------------------------------------.

							// On change of multiple product.
							jQuery(document).on('change', '#beucw_multiple_products', function() {
								if (jQuery('#beucw_multiple_products').is(':checked')) {
									jQuery('.beucw-all-cat-selection').hide();
									jQuery('.beucw-all-products-list').slideDown(100);
								} else {
									jQuery('.beucw-all-products-list').slideUp(100);
								}
							});

							// --------------------------- Z-index of Select2 Popup ------........-------------------.

							jQuery(".swal2-container.swal2-center.swal2-backdrop-show").css("z-index", "100000");

							// ----------------------------------- ClipBoard ----------------------------------------.

							// copy the clipboard text when button is clicked.
							jQuery("button.beucw-selected-products-clipboard").click(function(e) {
								e.preventDefault();
								let shotcodetext = "{selected_products}";
								// Copy the text to the clipboard
								navigator.clipboard.writeText(shotcodetext).then(() => {
									// Render the "Text Copied!" message
									jQuery('.beucw-text-copied').empty().text("<?php _e( 'Text Copied!', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>");

									// Set a timeout to clear the text after a few seconds (e.g., 2 seconds)
									setTimeout(function() {
										jQuery('.beucw-text-copied').empty(); // Clear the text after the interval
									}, 2000); // 2000 milliseconds = 2 seconds
								}).catch(err => {
									console.error('Failed to copy text: ', err);
								});
							});

							//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

							jQuery(document).on('change', 'input[name=beucw_ai_prompt_type]', function(){
								if( jQuery( 'input[name=beucw_ai_prompt_type]:checked' ).val() == 'default' ){
									jQuery( 'textarea#beucw_ai_request_prompt' ).val('')
									jQuery( 'textarea#beucw_ai_request_prompt' ).val('<?php echo get_option( 'beucw_default_ai_prompt' ); ?>').attr('disabled','disabled');
									// jQuery( 'textarea#beucw_ai_request_prompt' ).hide();
									jQuery( '#beucw_textarea_container.beucw-ai-prompt-container' ).slideUp();
								} else if( jQuery( 'input[name=beucw_ai_prompt_type]:checked' ).val() == 'edit' ) {
									// jQuery( 'textarea#beucw_ai_request_prompt' ).show();
									jQuery( '#beucw_textarea_container.beucw-ai-prompt-container' ).slideDown();
									// jQuery( 'textarea#beucw_ai_request_prompt' ).removeAttr('disabled');
								}
							})

							//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

							if( jQuery( 'input[name=beucw_ai_prompt_type]:checked' ).val() == 'default' ){
								jQuery( 'textarea#beucw_ai_request_prompt' ).val('')
								jQuery( 'textarea#beucw_ai_request_prompt' ).val('<?php echo get_option( 'beucw_default_ai_prompt' ); ?>').attr('disabled','disabled');
								jQuery( '#beucw_textarea_container.beucw-ai-prompt-container' ).hide();
							} else if( jQuery( 'input[name=beucw_ai_prompt_type]:checked' ).val() == 'edit' ) {
								jQuery( '#beucw_textarea_container.beucw-ai-prompt-container' ).show();
								// jQuery( '#beucw_textarea_container.beucw-ai-prompt-container' ).slideDown();
								// jQuery( 'textarea#beucw_ai_request_prompt' ).slideDown();
								// jQuery( 'textarea#beucw_ai_request_prompt' ).removeAttr('disabled');
								jQuery( 'textarea#beucw_ai_request_prompt' ).val('')
								jQuery( 'textarea#beucw_ai_request_prompt' ).val('<?php echo get_option( 'beucw_ai_request_prompt' ); ?>')
							}

							jQuery( 'input[name=beucw_about_store]' ).change( function(){
								jQuery.ajax({
									url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
									type: 'POST',
									data: {
										action: 'beucw_ai_send_prompt',
										about_store: jQuery('input[name=beucw_about_store]').val(),
									},
									success: function(response) {
									},
								});
							})

							//-------------------------------------- Send Prompt----------------------------------------.

							// Send prompt button.
							jQuery('#beucw-send-prompt-btn').click(function() {	
								<?php
								if ( (string) get_option( 'beucw_openai_api_key' ) == '' ) {
									?>
									Swal.fire('', 'Please enter valid api key before sending request!', 'error');
									<?php
								} else {
									?>
									let selectedOptions = ['products_name', 'products_desc'];

									productIds.clear();

									// Get all the selected ids.
									jQuery.each(jQuery('select.beucw_product_list option:selected'), function() {
										productIds.add(jQuery(this).val());
									});

									let productIdsArray = Array.from(productIds);
									let selectedProductType = 'products';
									let sendRequest = 1;

									if (productIdsArray.length > 5){
										productIdsArray = productIdsArray.slice(0, 5);
									}

									if (productIdsArray.length === 0) {
										sendRequest = 0;
									}

									if( jQuery('#beucw_ai_request_prompt').val() == '' ){
										sendRequest = 0;
									}

									if( jQuery('#beucw_about_store').val() == '' ){
										sendRequest = 0;
									}

									// console.log( sendRequest );
									if( sendRequest == 1 ){
										jQuery('#beucw-send-prompt-btn').empty().text('Requesting....');

										jQuery.ajax({
											url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
											type: 'POST',
											data: {
												action: 'beucw_ai_send_prompt',
												prompt: '<?php echo esc_html( $display_prompt ); ?>',
												selected_options: selectedOptions,
												selected_product_type: selectedProductType,
												selected_products: productIdsArray,
												prompt_type: 'default',
												about_store: jQuery('#beucw_about_store').val(),
											},
											success: function(response) {
												jQuery('#beucw-send-prompt-btn').empty().text( '<?php _e( 'Request Created', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>');

												Swal.fire({
													title: "",
													text: "<?php _e( 'Your request was initiated successfully!', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>",
													icon: "success",
													customClass: "beucw-request-sent",
												}).then(() => {
													location.reload(); // This will refresh the page after the Swal modal is closed
												});

											},
										});
									}else {
										jQuery('#beucw-send-prompt-btn').empty().text( '<?php _e( 'Create Request', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>');

										jQuery( '.beucw-ai-request-warning' ).empty().text( '<?php _e( 'Please ensure products are selected from field above before submitting your request.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>' );
									}
									
									<?php
								}
								?>
							});

							jQuery('.beucw-popup').css('width', '800px');
							jQuery('.beucw-popup').css('text-align', 'left');
							jQuery('.beucw-popup > .swal2-header').css('background', '#0a2845');
							jQuery('.beucw-popup > .swal2-header').css('margin', '-20px');
							jQuery('.pro-alert-header').css('padding-top', '25px');
							jQuery('.pro-alert-header').css('padding-bottom', '20px');
							jQuery('.pro-alert-header').css('color', 'white');
						} else {
							Swal.fire('', 'Your Last request is Processing..!', 'warning');
						}
					} else {

						// For expired tokens status.
						Swal.fire({
							text: '<?php echo esc_html__( 'Your API token credit limit has expired !', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>',
							icon: "warning",
							showDenyButton: true,
							showCloseButton: true,
							confirmButtonText: '<?php echo esc_html__( 'Renew Credits', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>',
							denyButtonText: '<?php echo esc_html__( 'Configure API Key', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>',
							denyButtonColor: "#32CD32",
							confirmButtonColor: "#6CB4EE",
							}).then((result) => {
							if (result.isConfirmed) {

								// Move to billing page.
								window.location.assign('https://platform.openai.com/settings/organization/billing/');
							} else if (result.isDenied) {

								// Move to settings page.
								window.location.assign( '<?php echo esc_url( $api_settings_page ); ?>' );
							}
						});
					}
				}
			});
		});
	</script>
	<?php
}

// ---------------------------------------- Review rating notice --------------------------------------.

add_action( 'wp_ajax_beucw_update', 'beucw_ajax_update_notice' );
add_action( 'wp_ajax_nopriv_beucw_update', 'beucw_ajax_update_notice' );

/**
 * Update rating Notice.
 */
function beucw_ajax_update_notice() {
	global $current_user;

	if ( isset( $_POST['nonce'] ) && ! empty( $_POST['nonce'] ) ) {
		if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ) ) {
			wp_die( esc_html__( 'Permission Denied.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ) );
		}

		update_user_meta( $current_user->ID, 'beucw_rate_notices', 'rated' );
		echo esc_url( network_admin_url() );
	}

	wp_die();
}

add_action( 'admin_notices', 'beucw_plugin_notice' );

/**
 * Rating notice widget.
 * Save the date to display notice after 10 days.
 */
function beucw_plugin_notice() {
	global $current_user;

	$user_id = $current_user->ID;

	wp_enqueue_script( 'jquery' );

	// if plugin is activated and date is not set then set the next 10 days.
	$today_date = strtotime( 'now' );

	if ( ! get_user_meta( $user_id, 'beucw_notices_time' ) ) {
		$after_10_day = strtotime( '+10 day', $today_date );
		update_user_meta( $user_id, 'beucw_notices_time', $after_10_day );
	}

	// gets the option of user rating status and week status.
	$rate_status = get_user_meta( $user_id, 'beucw_rate_notices', true );
	$next_w_date = get_user_meta( $user_id, 'beucw_notices_time', true );

	// show if user has not rated the plugin and it has been 1 week.
	if ( 'rated' !== $rate_status && $today_date > $next_w_date ) {
		?>

		<div class="notice notice-warning is-dismissible">
			<p><span><?php esc_html_e( "Awesome, you've been using", 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></span><span><?php echo '<strong> Bulk Edit Upsells and Cross-Sells for WooCommerce </strong>'; ?><span><?php esc_html_e( 'for more than 1 week', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></span></p>
			<p><?php esc_html_e( 'If you like our plugin would you like to rate our plugin at WordPress.org ?', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></p>
			<span><a href="https://wordpress.org/plugins/bulk-edit-upsells-and-cross-sells-for-woocommerce/#reviews" target="_blank"><?php esc_html_e( "Yes, I'd like to rate it!", 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></a></span>&nbsp; - &nbsp;<span><a class="beucw_hide_rate" href="#"><?php esc_html_e( 'I already did!', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></a></span>
			<br/><br/>
		</div>

		<script>
			let beucwAjaxURL = "<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>";
			let beucwNonce = "<?php echo esc_attr( wp_create_nonce( 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ) ); ?>";

			// Redirect to same page after rated.
			jQuery(".beucw_hide_rate").click(function (event) {
				event.preventDefault();

				jQuery.ajax({
					method: 'POST',
					url: beucwAjaxURL,
					data: {
						action: 'beucw_update',
						nonce: beucwNonce,
					},
					success: (res) => {
						window.location.href = window.location.href
					}
				});
			});
		</script>
		<?php
	}
}

// ------------------------------------------------- END ----------------------------------------------.


// ----------------------------------- On change of the filter type of bulk edit ----------------------.

add_action( 'wp_ajax_beucw_taxonomyID_action', 'beucw_taxonomy_id_callback' );
add_action( 'wp_ajax_nopriv_beucw_taxonomyID_action', 'beucw_taxonomy_id_callback' );

/**
 * To display all products in tabular format for upsell and cross-sell .
 */
function beucw_taxonomy_id_callback() {

	if ( isset( $_POST['nonce'] ) && isset( $_POST['filterType'] ) && ! empty( $_POST['filterType'] ) && isset( $_POST['taxonomyID'] ) && ! empty( $_POST['taxonomyID'] ) ) {

		if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ) ) {
			wp_die( esc_html__( 'Permission Denied.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ) );
		}

		$filter_type = sanitize_text_field( wp_unslash( $_POST['filterType'] ) );
		$taxonomy_id = array_map( 'intval', wp_unslash( $_POST['taxonomyID'] ) );

		switch ( $filter_type ) {
			case 'bucw-category':
				$products_ids = beucw_get_category_products_ids( $taxonomy_id );
				break;
			case 'bucw-tags':
				$products_ids = beucw_get_tags_products_ids( $taxonomy_id );
				break;
			case 'bucw-product':
				$products_ids = beucw_get_products_ids_products( $taxonomy_id );
				break;
			case 'bucw-sku':
				$products_ids = beucw_get_products_ids_products( $taxonomy_id );
				break;
			default:
				break;
		}

		if ( ! empty( $products_ids ) && ! ( null === $products_ids ) ) {
			?>

			<!-- Table Row Heading Title -->
			<div>
				<span><?php esc_html_e( 'Product Name', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></span>  
				<span>
					<?php esc_html_e( 'UpSells', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>
					<span class="beucw-setting-help-tip">
						<div class="beucw-tooltipdata"> <?php esc_html_e( 'Please search for your products and set upsells for it in the corressponding box of this column', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?> </div>
					</span>
				</span>

				<span>
					<?php esc_html_e( 'Cross-Sells', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>
					<span class="beucw-setting-help-tip">
						<div class="beucw-tooltipdata"> <?php esc_html_e( 'Please search for your products and set cross-sells for it in the corressponding box of this column', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?> </div>
					</span>
				</span>

				<span>
					<?php esc_html_e( 'Related Products', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>
					<svg class="bucw_pro_notice" onclick="beucw_call_notice()" xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#f8c844" d="M528 448H112c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h416c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm64-320c-26.5 0-48 21.5-48 48 0 7.1 1.6 13.7 4.4 19.8L476 239.2c-15.4 9.2-35.3 4-44.2-11.6L350.3 85C361 76.2 368 63 368 48c0-26.5-21.5-48-48-48s-48 21.5-48 48c0 15 7 28.2 17.7 37l-81.5 142.6c-8.9 15.6-28.9 20.8-44.2 11.6l-72.3-43.4c2.7-6 4.4-12.7 4.4-19.8 0-26.5-21.5-48-48-48S0 149.5 0 176s21.5 48 48 48c2.6 0 5.2-.4 7.7-.8L128 416h384l72.3-192.8c2.5 .4 5.1 .8 7.7 .8 26.5 0 48-21.5 48-48s-21.5-48-48-48z"/></svg>
				</span> 
			</div>

			<?php
			$all_products = beucw_get_all_products_with_variations();

			// Iterate through all the products.
			foreach ( $products_ids['data'] as $product_id ) {
				$product              = wc_get_product( $product_id );
				$product_title        = $product->get_title();
				$upsells_ids          = $product->get_upsell_ids();
				$cross_sell_ids       = $product->get_cross_sell_ids();
				$related_products_ids = beucw_get_related_products( $product_id );
				$product_sku          = $product->get_sku() ? ' (' . $product->get_sku() . ')' : false;
				$thumbnail            = $product->get_image( 'woocommerce_thumbnail' );
				?>

				<!-- All Product row and products -->
				<div class="beucw-product-row" >

					<!-- Product Discription -->
					<div class ="beucw-product-name">
						<div class="bucw-product-thumbnail">
							<a href="<?php echo esc_url( $product->get_permalink() ); ?>" target="_blank">
								<?php
								if ( $product->get_image_id() > 0 ) {
									echo wp_kses_post( $thumbnail );
								} else {
									$source = wc_placeholder_img_src( 'woocommerce_thumbnail' );
									echo '<img src="' . esc_url( $source ) . '">';
								}
								?>
							</a>
						</div>
						<div>
							<span class="bucw-product-name"><?php esc_html_e( 'Product Name', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></span>
							<span class="bucw-product-title"><a id="<?php echo esc_attr( $product_id ); ?>" href="<?php echo esc_url( $product->get_permalink() ); ?>" target="_blank"><?php echo 'ID:' . esc_attr( $product_id ) . ' ' . esc_attr( $product_title ) . ' ' . esc_attr( $product_sku ); ?></a></span>
						</div>
					</div>

					<!-- UpSells product -->
					<div class="beuc-upsells-products">
						<span class="bucw-upsells"><?php esc_html_e( 'Upsells', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></span>
						<select class="beucw-select2 upsells-token" id="<?php echo 'upsell-' . esc_attr( $product_id ); ?>" name="<?php echo 'upsell-' . esc_attr( $product_id ) . '[]'; ?>" data-placeholder="<?php echo esc_attr__( 'Search for a product…', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>" multiple="multiple">
							<?php
							foreach ( $all_products as $beuc_product ) {
								if ( in_array( $beuc_product['product_id'], $upsells_ids, true ) ) {
									echo '<option selected="selected" value="' . esc_attr( $beuc_product['product_id'] ) . '">' . esc_attr( $beuc_product['label'] ) . '</option >';
								} else {
									echo '<option value="' . esc_attr( $beuc_product['product_id'] ) . '">' . esc_attr( $beuc_product['label'] ) . '</option >';
								}
							}
							?>
						</select>
					</div>

					<!-- Cross-Sells Product -->
					<div class="beuc-crosssell-products">
						<span class="bucw-crosssells"><?php esc_html_e( 'Cross-sells', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></span>
						<select class="beucw-select2 crosssells-token" id="<?php echo 'cross-sell-' . esc_attr( $product_id ); ?>" name="<?php echo 'cross-sell-' . esc_attr( $product_id ) . '[]'; ?>" data-placeholder="<?php echo esc_attr__( 'Search for a product…', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>" multiple="multiple">
							<?php
							foreach ( $all_products as $beuc_product ) {
								if ( in_array( $beuc_product['product_id'], $cross_sell_ids, true ) ) {
									echo '<option selected="selected" value="' . esc_attr( $beuc_product['product_id'] ) . '">' . esc_attr( $beuc_product['label'] ) . '</option >';
								} else {
									echo '<option value="' . esc_attr( $beuc_product['product_id'] ) . '">' . esc_attr( $beuc_product['label'] ) . '</option >';
								}
							}
							?>
						</select>
					</div>

					<!-- Related Products -->
					<div class="beuc-related-products" style="position:relative">
						<div style="filter: blur(2.3px); position:relative">
							<span class="bucw-related"></span>
							<select class="beucw-select2 related-pro-notice related-token" id="<?php echo 'related-' . esc_attr( $product_id ); ?>" data-placeholder="<?php echo esc_attr__( 'Search for a product…', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>" multiple="multiple">
								<option selected="selected" value="38" data-select2-id="214">ID:38 Beanie with Logo (Woo-beanie-logo)</option>
								<option selected="selected" value="39">ID:39 Logo Collection (logo-collection)</option>
								<option selected="selected" value="28">ID:28 Polo (woo-polo)</option>
								<option selected="selected" value="29" data-select2-id="215">ID:29 Album (woo-album)</option>
							</select>
						</div>
						<div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 100;">
							<button class="bucw-pro-button" onclick="beucw_call_notice(event)">
								<i class="fa fa-lock" style="font-size: 14px; color: #F8C844; padding-right: 10px;"></i>Upgrade Now
							</button>
						</div>
					</div>
				</div>
				<?php
			}

			// Gets the product & page count.
			$product_total_count = intval( $products_ids['count'] );
			$total_page_numbers  = floatval( $product_total_count / 5 );

			if ( ! $total_page_numbers % 5 ) {
				++$product_total_count;
			}
			?>

			<!-- Page No showing -->
			<div class="pager">
				<div id="pageNumbers">
					<input type="hidden" value="<?php echo esc_html( $product_total_count ); ?>" class="beucw_total"/>
					<input type="hidden" value="<?php echo esc_html( $total_page_numbers ); ?>" class="beucw_total_pages"/>
				</div>
			</div>
			<?php
		}
	}
	?>

	<!-- PoPup showing content -->
	<script>
		var { __ } = wp.i18n;

		jQuery( '.bucw-pro-button' ).click( function(e){
			e.preventDefault();
		})

		var myTimeout = setTimeout(() => {
			jQuery( '.beuc-related-products span.select2-selection--multiple  ul.select2-selection__rendered li.select2-selection__choice span.select2-selection__choice__remove' ).text('');

			jQuery( 'div.beuc-related-products .select2-container .select2-selection--multiple .select2-selection__rendered li.select2-search > input.select2-search__field' ).on( 'keypress', function (e) {
				e.preventDefault();

				var bucwAlertMessage = '<?php esc_html_e( 'This field is available in related products pro plugin', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>';
				var bucwUpgradeNow = '<?php esc_html_e( 'Upgrade Now', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>';

				Swal.fire({
					title: '<div class="pro-alert-header">'+ '<?php esc_html_e( 'Pro Field Alert!', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>' + '</div>',
					showCloseButton: true,
					html: '<div class="pro-crown"><svg xmlns="http://www.w3.org/2000/svg" height="100" width="100" viewBox="0 0 640 512"><path fill="#f8c844" d="M528 448H112c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h416c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm64-320c-26.5 0-48 21.5-48 48 0 7.1 1.6 13.7 4.4 19.8L476 239.2c-15.4 9.2-35.3 4-44.2-11.6L350.3 85C361 76.2 368 63 368 48c0-26.5-21.5-48-48-48s-48 21.5-48 48c0 15 7 28.2 17.7 37l-81.5 142.6c-8.9 15.6-28.9 20.8-44.2 11.6l-72.3-43.4c2.7-6 4.4-12.7 4.4-19.8 0-26.5-21.5-48-48-48S0 149.5 0 176s21.5 48 48 48c2.6 0 5.2-.4 7.7-.8L128 416h384l72.3-192.8c2.5 .4 5.1 .8 7.7 .8 26.5 0 48-21.5 48-48s-21.5-48-48-48z"/></svg></div><div class="popup-text1"><?php esc_html_e( 'Looking for this cool feature? Go Pro!', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div><div class="popup-text2"><?php esc_html_e( 'Go with our premium version to unlock the following features:', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>' + '</div> <ul><li><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff3d3d" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>' + '<?php esc_html_e( 'bulk-edit-upsells-and-cross-sells-for-woocommerceBulk Update  Related Products, Upsells, and Cross-Sells from a single screen.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?> ' + '</li><li><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff3d3d" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg><?php esc_html_e( 'Custom Related Products  Shortcode with AJAX Slider.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></li><li><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512"><path fill="#ff3d3d" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>' + '<?php esc_html_e( 'More Control for Related Products : Show Ratings, Sale Price, Widget Location & more.', '' ); ?>' + '</li><li><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff3d3d" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg><?php esc_html_e( 'Sales Boost: Increase average order value and revenue.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></li></ul><button class="bucw-upgrade-now" style="border: none"><a href="https://www.saffiretech.com/woocommerce-related-products-pro?utm_source=wp_plugin&utm_medium=profield&utm_campaign=free2pro&utm_id=c1&utm_term=upgrade_now&utm_content=beucw" target="_blank" class="purchase-pro-link">'+bucwUpgradeNow+'</a></button>',
					customClass: "bucw-popup",
					showConfirmButton: false,
				});

				jQuery( '.bucw-popup' ).css('width', '800px');
				jQuery( '.bucw-popup > .swal2-header').css('background', '#061727' );
				jQuery( '.bucw-popup > .swal2-header').css('margin', '-20px' );
				jQuery( '.pro-alert-header' ).css('padding-top', '25px' );
				jQuery( '.pro-alert-header' ).css('padding-bottom', '20px' );
				jQuery( '.pro-alert-header' ).css( 'color', 'white' );
				jQuery( '.pro-crown' ).css( 'margin-top', '20px' );
				jQuery( '.popup-text1').css( 'font-size', '30px' );
				jQuery( '.popup-text1' ).css( 'font-weight', '600' );
				jQuery( '.popup-text1' ).css( 'padding-bottom', '10px' );
				jQuery( '.bucw-popup > .swal2-content > .swal2-html-container > ul ' ).css( 'text-align', 'justify' );
				jQuery( '.bucw-popup > .swal2-content > .swal2-html-container > ul ' ).css( 'padding-left', '25px' );
				jQuery( '.bucw-popup > .swal2-content > .swal2-html-container > ul ' ).css( 'padding-right', '25px' );
				jQuery( '.bucw-popup > .swal2-content > .swal2-html-container > ul ' ).css( 'line-height', '2em' );
				jQuery( '.popup-text2' ).css( 'padding', '10px' );
				jQuery( '.popup-text2' ).css( 'font-weignt', '500');
				jQuery( '.bucw-popup > .swal2-content > .swal2-html-container > ul, .popup-text1, .popup-text2').css('color', '#061727' );
			});
		}, 200 );
	</script>
	<?php
	die();
}

// ------------------------------------- AI ajax part --------------------------------------------------.

add_action( 'wp_ajax_beucw_ai_send_prompt', 'beucw_ai_send_prompt' );
add_action( 'wp_ajax_nopriv_beucw_ai_send_prompt', 'beucw_ai_send_prompt' );

/**
 * Check token function.
 *
 * This function handles the form submission for sending prompts and calculating token usage for OpenAI API requests.
 * It processes the selected product details, builds the prompt, and updates various options for storing the data.
 */
function beucw_ai_send_prompt() {

	// Check if the form is submitted with a 'prompt'.
	if ( isset( $_POST['prompt'] ) ) {

		// Save the current AI request timestamp.
		update_option( 'beucw_current_ai_request', date( 'Y-m-d H:i:s' ) );

		// Save the selected product details (e.g., name, description).
		$selected_product_detail = $_POST['selected_options'];
		update_option( 'beucw_product_selected_options', $selected_product_detail );

		$prompt_product_data = array();  // Array to store product data for the prompt.
		$products            = $_POST['selected_products'];  // Get the selected product IDs.

		// Save the product type (e.g., all products, selected products).
		update_option( 'beucw_all_products', $_POST['selected_product_type'] );

		// Save the list of selected products.
		update_option( 'beucw_product_list', $_POST['selected_products'] );

		// Save the about store information.
		update_option( 'beucw_about_store', $_POST['about_store'] );

		// Check if the product name should be included in the prompt and save the option accordingly.
		if ( in_array( 'products_name', $selected_product_detail ) ) {
			update_option( 'beucw_products_name', 'on' );
		} else {
			update_option( 'beucw_products_name', '' );
		}

		// Check if the product description should be included in the prompt and save the option accordingly.
		if ( in_array( 'products_desc', $selected_product_detail ) ) {
			update_option( 'beucw_products_desc', 'on' );
		} else {
			update_option( 'beucw_products_desc', '' );
		}

		// Loop through the selected products and gather product details (name and description if selected).
		foreach ( $products as $product_id ) {
			$product            = wc_get_product( $product_id );  // Get WooCommerce product by ID.
			$temp               = array();
			$temp['product_id'] = $product_id;  // Store the product ID.

			// Include product name if selected.
			if ( in_array( 'products_name', $selected_product_detail ) ) {
				$temp['products_name'] = get_the_title( $product_id );
			}

			// Include product description if selected.
			if ( in_array( 'products_desc', $selected_product_detail ) ) {
				$temp['beucw_products_desc'] = strip_tags( $product->get_short_description() );
			}

			// Add product data to the prompt product data array.
			$prompt_product_data[] = $temp;
		}

		// Save the prompt type (e.g., default or custom).
		update_option( 'beucw_ai_prompt_type', $_POST['prompt_type'] );

		// Get the default AI prompt from options.
		$prompt_text = get_option( 'beucw_default_ai_prompt' );

		// Set the API request status to 'created' and indicate that the button has been clicked.
		update_option( 'beucw_api_request_created_status', 'created' );
		update_option( 'beucw_prompt_request_button_hit', 1 );

		// Enable the AI request notice to display in the admin area.
		update_option( 'beucw_display_ai_request_notice', 'yes' );
	}

	// Check if the form is submitted with 'prompt_token' for calculating the token count.
	if ( isset( $_POST['prompt_token'] ) ) {

		// Get the prompt text and other form fields.
		$prompt_text           = $_POST['prompt_token'];
		$selected_options      = $_POST['selected_options'];
		$selected_product_type = $_POST['selected_product_type'];
		$selected_products     = $_POST['selected_products'];
		$about_store_text      = $_POST['about_store'];

		// Build the AI prompt with the provided data.
		$build_prompt = beucw_update_tokens( $prompt_text, $about_store_text, $selected_options, $selected_product_type, $selected_products );

		// Return the token count in JSON format.
		echo json_encode( $build_prompt['prompt_token'] );
	}

	// Check if the form is submitted with 'about_store' field to update the store details.
	if ( isset( $_POST['about_store'] ) ) {
		update_option( 'beucw_about_store', $_POST['about_store'] );
	}

	// Terminate the script (required in AJAX requests).
	wp_die();
}

add_action( 'wp_ajax_beucw_api_key_validation', 'beucw_api_key_validation' );
add_action( 'wp_ajax_nopriv_beucw_api_key_validation', 'beucw_api_key_validation' );

/**
 * Send the api response to check usage.
 */
function beucw_api_key_validation() {

	// Nonce verification.
	$secure_nonce      = wp_create_nonce( 'bulk-edit-upsells-and-cross-sells-for-woocommerce' );
	$is_nonce_verified = wp_verify_nonce( $secure_nonce, 'bulk-edit-upsells-and-cross-sells-for-woocommerce' );

	if ( ! $is_nonce_verified ) {
		wp_die( esc_html__( 'Nonce Not verified', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ) );
	}

	// Delete trasient on validation is clicked.
	delete_transient( 'beucw_set_model_names' );

	// Get entered key data.
	$api_key_data = isset( $_POST['key_data'] ) ? sanitize_text_field( $_POST['key_data'] ) : 0;

	// Call the request and save data.
	$response_data = beucw_api_server_callback_validation( $api_key_data );

	// Get the api status value.
	$api_status = $response_data['status'];

	// If Status is on.
	if ( $api_status ) {

		// Send status data.
		echo wp_json_encode(
			array(
				'usage'  => get_option( 'beucw_api_usage_status' ),
				'status' => $api_status,
			)
		);
	} else {

		// Send status data.
		echo wp_json_encode(
			array(
				'usage'  => get_option( 'beucw_api_usage_status' ),
				'status' => 0,
			)
		);
	}

	wp_die();
}

/**
 * Account key info Validation.
 *
 * @param mixed $request .
 * @return mixed
 */
function beucw_api_server_callback_validation( $request ) {

	// Get Api key data.
	$api_key_data = isset( $request ) ? $request : 0;

	// Api request url.
	$model_api_url = 'https://api.openai.com/v1/models';

	// Set up the arguments for the request, including the headers.
	$request_args = array(
		'method'  => 'GET',
		'headers' => array(
			'Authorization' => 'Bearer ' . $api_key_data,
		),
		'timeout' => 50,
	);

	// Make the GET request to the OpenAI.
	$response = wp_remote_get( $model_api_url, $request_args );

	// Status code 200.
	if ( is_wp_error( $response ) || wp_remote_retrieve_response_code( $response ) === 200 ) {

		// Decode the response from JSON.
		$response_data = json_decode( wp_remote_retrieve_body( $response ), true );

		// Access the token usage information.
		$total_tokens_used = isset( $response_data['data']['total_tokens'] ) ? $response_data['data']['total_tokens'] : '';

		// Prepare the final response with the OpenAI API response.
		$status_response = array(
			'status'           => 1,
			'used_token'       => $total_tokens_used,
			'data'             => $response_data,
			'openai_sresponse' => $response,
		);

		// Update the model name and usage data.
		update_option( 'beucw_api_model_name', 'gpt-4o' );
		update_option( 'beucw_api_valid_key_status', 1 );
		update_option( 'beucw_api_usage_status', 'Your API Key is Valid !' );

		return $status_response;
	}

	// Check for errors in the response.
	if ( is_wp_error( $response ) || wp_remote_retrieve_response_code( $response ) === 500 ) {
		update_option( 'beucw_api_usage_status', 'Request to OpenAI API failed.' );
		return new WP_Error( 'request_failed', 'Request to OpenAI API failed.' );
	}

	// Check for errors in the response bad request.
	if ( is_wp_error( $response ) || wp_remote_retrieve_response_code( $response ) === 400 ) {

		// Prepare the final response with the OpenAI API response.
		$final_response = array(
			'status'          => 0,
			'openai_response' => 'Your Key Bad Request!',
		);

		update_option( 'beucw_api_valid_key_status', 0 );
		update_option( 'beucw_api_usage_status', 'Your Key Bad Request !' );

		return $final_response;
	}

	// Check for errors in the response on quota exceed.
	if ( is_wp_error( $response ) || wp_remote_retrieve_response_code( $response ) === 429 ) {

		// Prepare the final response with the OpenAI API response.
		$final_response = array(
			'status'          => 0,
			'openai_response' => 'Insufficient Quota',
		);

		update_option( 'beucw_api_valid_key_status', 0 );
		update_option( 'beucw_api_usage_status', 'Insufficient Quota' );

		return $final_response;
	}

	// Check for errors in the response on incorrect API Key.
	if ( is_wp_error( $response ) || wp_remote_retrieve_response_code( $response ) === 401 ) {

		// Prepare the final response with the OpenAI API response.
		$final_response = array(
			'status'           => 0,
			'openai_response'  => 'The requesting API key is not correct.',
			'openai_sresponse' => $response,
		);

		update_option( 'beucw_api_valid_key_status', 0 );
		update_option( 'beucw_api_usage_status', 'The requesting API key is not correct.' );

		return $final_response;
	}

	// Check for errors in the response un-supported country.
	if ( is_wp_error( $response ) || wp_remote_retrieve_response_code( $response ) === 403 ) {

		// Prepare the final response with the OpenAI API response.
		$final_response = array(
			'status'          => 0,
			'openai_response' => 'You are accessing the API from an unsupported country, region, or territory.',
		);

		update_option( 'beucw_api_valid_key_status', 0 );
		update_option( 'beucw_api_usage_status', 'You are accessing the API from an unsupported country, region, or territory.' );

		return $final_response;
	}

	// Check for errors if the system is overloaded.
	if ( is_wp_error( $response ) || wp_remote_retrieve_response_code( $response ) === 503 ) {

		// Prepare the final response with the OpenAI API response.
		$final_response = array(
			'status'          => 0,
			'openai_response' => 'System Overloaded',
		);

		update_option( 'beucw_api_valid_key_status', 0 );
		update_option( 'beucw_api_usage_status', 'System Overloaded' );

		return $final_response;
	}
}

/**
 * Fetch valid model names.
 *
 * @param mixed $model_names .
 * @param mixed $api_key_data .
 * @return mixed
 */
function beucw_get_valid_model_names( $model_names, $api_key_data ) {

	$valid_model = array();

	// Iterate all the model names.
	foreach ( $model_names as $model ) {

		// Get the model name.
		$model_name = $model['id'];

		// The API endpoint for the OpenAI completions API.
		$request_model_url = 'https://api.openai.com/v1/chat/completions';

		// Request body array.
		$request_body = array(
			'model'             => $model_name,
			'messages'          => array(
				array(
					'role'    => 'user',
					'content' => 'how are you ?',
				),
			),
			'max_tokens'        => 4096,
			'temperature'       => 0.7,
			'top_p'             => 1,
			'frequency_penalty' => 0,
			'presence_penalty'  => 0,
		);

		// Set up the arguments for the request, including the headers and body.
		$args = array(
			'method'  => 'POST',
			'headers' => array(
				'Content-Type'  => 'application/json',
				'Authorization' => 'Bearer ' . $api_key_data,
			),
			'body'    => wp_json_encode( $request_body ),
			'timeout' => 100,
		);

		// Make the POST request to the OpenAI.
		$response_data = wp_remote_post( $request_model_url, $args );

		// Check the response code.
		if ( ! in_array( $response_data['response']['code'], array( '404', '403', '400', '429', '401', '403', '503' ) ) ) {
			array_push( $valid_model, $model['id'] );
		}
	}

	return $valid_model;
}

/**
 * Save date and time and value on option update.
 *
 * @param mixed $date .
 * @param mixed $time .
 * @param mixed $count .
 * @param mixed $value .
 */
function beucw_save_data_with_date_and_time( $date, $time, $count = 0, $value ) {

	$option_name = 'beucw_ai_request_logs';

	$existing_data = get_option( $option_name );

	// Check if the date key exists.
	if ( ! isset( $existing_data[ $date ] ) ) {
		$existing_data[ $date ] = array();
	}

	// Update the data for the specified date and time.
	$existing_data[ $date ][ $time ] = $value;

	// Save the updated data back to the option.
	update_option( $option_name, $existing_data );
}

/**
 * To display To get API Key.
 */
function beucw_get_ai_api_key_field() {
	$display_key_status = '';
	?>
	<div class="beucw-add-api-key-container">
		<input type="text" class="beucw-token-invalid" name="beucw_openai_api_key" id="beucw_api_key" value="<?php echo esc_attr( get_option( 'beucw_openai_api_key' ) ); ?>" />
		<input type="button" name="beucw_ajax_button" class="beucw_ajax_button" id="beucw_ajax_button" value="<?php echo esc_html_e( 'Validate API Key', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>" />
		<span style="margin-top: 12px;"><a href="https://www.saffiretech.com/docs/sft-woocommerce-related-products/" target='_blank'><?php echo esc_html__( 'learn more', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></a></span>
	</div>
	<div class="beucw-add-api-key-message-container">

		<?php
		if ( get_option( 'beucw_api_valid_key_status' ) == 1 ) {
			$display_key_status = '<i class="fas fa-check-circle" style="color: green;"></i> ' . __( 'Your API key is valid!', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' );
		} else {
			$display_key_status = '<i class="fas fa-times-circle" style="color: red;"></i> ' . __( 'Please Enter Valid API key!', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' );
		}
		?>
		<span id="beucw-key-valid-message"><?php echo wp_kses_post( $display_key_status ); ?></span>
	</div>
	<?php
}

/**
 * To display all chat model name available with this api key.
 */
function beucw_get_ai_api_model_field() {

	// Call the request and save data.
	$api_key_data = get_option( 'beucw_openai_api_key' );

	if ( $api_key_data == '' ) {
		echo esc_html__( 'API Key is required to fetch models', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' );
		?>

		<!-- Loader status -->
		<p class="beucw-ai-message-data"></p>
		<?php
	} else {

		// Check existing models if not found refresh the models again.
		if ( ( false === get_transient( 'beucw_set_model_names' ) ) || ( empty( get_transient( 'beucw_set_model_names' ) ) ) ) {

			// Get the api response data for model names.
			$response_data = beucw_api_server_callback_validation( $api_key_data );
			$model_names   = $response_data['data']['data'];

			// Get the valid model names.
			$model_data = beucw_get_valid_model_names( $model_names, $api_key_data );

			// If valid models found.
			if ( $model_data ) {

				// Get the selected model name first value.
				update_option( 'beucw_openai_api_model', $model_data[0] );

				// Refresh models after one month.
				set_transient( 'beucw_set_model_names', $model_data, 2628000 );

				// Get the selected model name.
				$selected_model = get_option( 'beucw_openai_api_model' );

				// Update insufficient quota to empty.
				update_option( 'beucw_api_request_created_status', '' );
				?>

				<!-- Load all the valid model names -->
				<select name="beucw_openai_api_model" class="beucw_openai_api_model">
					<?php
					foreach ( $model_data as $model ) {
						if ( $selected_model == $model ) {
							?>
							<option value="<?php echo esc_html( $model ); ?>" selected><?php echo esc_html( $model ); ?></option>
							<?php
						} else {
							?>
							<option value="<?php echo esc_html( $model ); ?>"><?php echo esc_html( $model ); ?></option>
							<?php
						}
					}
					?>
				</select>

				<!-- Loader status -->
				<p class="beucw-ai-message-data"></p>
				<?php
			} else {

				// Update insufficient quota.
				update_option( 'beucw_api_request_created_status', 'insufficient_quota' );
				?>

				<!-- Loader status -->
				<p class="beucw-ai-message-data"><?php echo esc_html__( 'It looks like you don\'t have access to the ChatGPT model with your current API key.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?><br/> 
				<?php echo esc_html__( 'To resolve this please check your subscription by visiting the', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?> <a href="https://platform.openai.com/settings/organization/billing/"><?php echo esc_html__( 'billing', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></a> <?php echo esc_html__( 'page.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></p>
				<?php
			}
		} else {

			// All the stored model data.
			$model_data = get_transient( 'beucw_set_model_names' );

			// Get the selected model name.
			$selected_model = get_option( 'beucw_openai_api_model' );
			?>

			<!-- Load all the valid model names -->
			<select name="beucw_openai_api_model" class="beucw_openai_api_model">
				<?php
				// If model data exist.
				if ( ! empty( $model_data ) ) {
					foreach ( $model_data as $model ) {
						if ( $model == $selected_model ) {
							?>
							<option value="<?php echo esc_html( $model ); ?>" selected><?php echo esc_html( $model ); ?></option>
							<?php
						} else {
							?>
							<option value="<?php echo esc_html( $model ); ?>"><?php echo esc_html( $model ); ?></option>
							<?php
						}
					}
				} else {
					?>
					<option value="0"><?php echo esc_html( 'No Models Found !', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></option>
					<?php
				}
				?>
			</select>

			<!-- Loader status -->
			<p class="beucw-ai-message-data"></p>
			<?php
		}
	}
}

/**
 * Request Logs status.
 */
function beucw_get_log_request_status() {

	global $wpdb;

	// Option name.
	$option_name  = 'beucw_ai_request_logs';
	$all_products = beucw_get_all_products_with_variations();
	$iterator     = 1;

	// Get the existing data from the option.
	$data = get_option( $option_name );

	// Get API Request Status.
	$api_key_status = ( get_option( 'beucw_api_request_created_status' ) ) ? get_option( 'beucw_api_request_created_status' ) : '';

	// Fetch the data from the table.
	$results = $wpdb->get_results(
		"SELECT id, request_time, prompt, product_selection_type,product_details, about_store, response, status, tokens_used 
	FROM {$wpdb->prefix}beucw_api_request_log ORDER BY request_time DESC"
	);

	// Get the number of rows.
	$num_rows = count( $results ) + 2
	?>

	<div class="beucw-log-main-container">
		<?php
		// IF empty data.
		if ( empty( $data ) ) {
			echo '<p>' . __( 'No data available.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ) . '</p>';
			return;
		} else {

			if ( 'fulfilled' !== $api_key_status ) {
				$current_request_date_time         = get_option( 'beucw_current_ai_request' );
				$currrent_datetime_string          = $current_request_date_time;
				list($current_date, $current_time) = explode( ' ', $currrent_datetime_string );
				?>
				<div class="beucw-single-log-container beucw-log-current-status">
					<?php
					if ( 'created' === $api_key_status || 'pending' === $api_key_status ) {
						?>
							<div class="beucw-log-inner beucw-log-header">
							<div><?php echo esc_html__( 'Your request is being processed. Please reload the page to check the status update..!', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
								<div class="beucw-log-header-details">
									<div class="beucw-log-ref-id"><?php echo '#' . $num_rows; ?></div>
									<div><b><?php echo esc_html__( 'Date:', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></b> <?php echo esc_attr( $current_date ); ?></div>
									<div><b><?php echo esc_html__( 'Time:', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></b> <?php echo esc_attr( $current_time ); ?></div>
									<div><span class="beucw-log-progress-msg">&#x2941; <?php echo esc_html__( 'Processing', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?><span></div>
								</div>
							</div>
							<div class="beucw-log-extra-details"> <!-- Initially hide the details -->
								<div class="beucw-log-additional-details-container">
									<div class="beucw-log-inner">
										<?php
										if ( get_option( 'beucw_all_products' ) == 'all_products' ) {
											?>
												<h2><?php echo esc_html__( 'All products Selection', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></h2>
												<div><span class="beucw-log-green-tick">&check;</span> <?php echo esc_html__( 'Selected Products', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?> (<?php echo esc_attr( count( $all_products ) ); ?>)</div>
												<?php
										} elseif ( get_option( 'beucw_all_products' ) == 'categories' ) {

											$category_ids = get_option( 'beucw_prompt_cat_selection', true );
											?>
												<h2><?php echo esc_html__( 'Categories Selection', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></h2>
												<div><span class="beucw-log-green-tick">&check;</span> <?php echo esc_html__( 'Selected Categories', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?> (<?php echo esc_attr( count( $category_ids ) ); ?>)</div>
												<table class="beucw-log-product-table">
													<thead>
														<tr>
															<th><?php echo esc_html__( 'Category Id', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></th>
															<th><?php echo esc_html__( 'Category Name', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></th>
														</tr>
													</thead>
													<tbody>
													<?php
													foreach ( $category_ids as $category_id ) {
														$category = get_term( $category_id, 'product_cat' );

														?>
															<tr>
																<td><?php echo esc_attr( intval( $category_id ) ); ?></td>
																<td><?php echo esc_attr( $category->name ); ?></td>
															</tr>
															<?php
													}
													?>
													</tbody>
												</table>
												<?php

										} elseif ( get_option( 'beucw_all_products' ) == 'products' ) {
											$selected_products = get_option( 'beucw_product_list' );
											?>
												<h2><?php echo esc_html__( 'Products Selection', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></h2>
												<div>
													<span class="beucw-log-green-tick">&check;</span> <?php echo esc_html__( 'Selected Products', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?> (<?php echo esc_attr( count( $selected_products ) ); ?>)
												</div>
												<table class="beucw-log-product-table">
													<thead>
														<tr>
															<th><?php echo esc_html__( 'Product Id', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></th>
															<th><?php echo esc_html__( 'Product Name', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></th>
														</tr>
													</thead>
													<tbody>
													<?php
													foreach ( $selected_products as $product_id ) {
														$product_name = get_the_title( $product_id );
														?>
															<tr>
																<td><?php echo esc_attr( intval( $product_id ) ); ?></td>
																<td><?php echo esc_attr( $product_name ); ?></td>
															</tr>
															<?php
													}
													?>
													</tbody>
												</table>
												<?php
										}
										?>
									</div>

									<div class="beucw-log-inner">
										<h2><?php echo esc_html__( 'Product Details Included', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></h2>
										<div class="beucw-log-pr-details-container">
										<?php
										$product_details = get_option( 'beucw_product_selected_options' );
										if ( in_array( 'products_name', $product_details ) ) {
											?>
												<span><span class="beucw-log-green-tick">&check;</span> <?php echo esc_html__( 'Product Name', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></span>
											<?php
										}

										if ( in_array( 'product_url', $product_details ) ) {
											?>
												<span><span class="beucw-log-green-tick">&check;</span> <?php echo esc_html__( 'Product URL', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></span>
											<?php
										}

										if ( in_array( 'products_desc', $product_details ) ) {
											?>
												<span><span class="beucw-log-green-tick">&check;</span> <?php echo esc_html__( 'Product Description', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></span>
											<?php
										}

										if ( in_array( 'products_price', $product_details ) ) {
											?>
												<span><span class="beucw-log-green-tick">&check;</span> <?php echo esc_html__( 'Product Price', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></span>
											<?php
										}
										?>
										</div>
									</div>

									<div class="beucw-log-inner">
										<h2><?php echo esc_html__( 'Store Description', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></h2>
										<div>
										<?php
										echo esc_attr( get_option( 'beucw_about_store' ) );
										?>
										</div>
									</div>

									<div class="beucw-log-inner">
										<h2><?php echo esc_html__( 'Selected Prompt', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></h2>
										<div>
										<?php
										$prompt_text = '';
										if ( get_option( 'beucw_ai_prompt_type' ) == 'default' ) {
											$prompt_text = get_option( 'beucw_default_ai_prompt' );
										} elseif ( get_option( 'beucw_ai_prompt_type' ) == 'edit' ) {
											$prompt_text = get_option( 'beucw_ai_request_prompt' );
										}
										echo esc_html( $prompt_text );
										?>
										</div>
									</div>

									<div class="beucw-log-inner-last">
										<div><b><?php echo esc_html__( 'Tokens Used: ', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></b><?php echo esc_attr( get_option( 'beucw_tokens_used' ) ); ?></div>
									</div>
								</div>
							</div>
							<?php
					} elseif ( 'insufficient_quota' === $api_key_status ) {
						?>
							<div><?php echo esc_html__( 'We\'re sorry, but your current request could not be processed due to insufficient quota remaining on your API key.' ); ?></div>
							<div><?php echo esc_html__( 'It appears that you have used up most of your allocated quota. Please check your API usage or consider upgrading your plan.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
							<?php
					} elseif ( 'system_overloaded' === $api_key_status ) {
						?>
							<div><?php echo esc_html__( 'Unfortunately, we were unable to fulfill your request at this time because the API system is currently experiencing heavy load.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
							<div><?php echo esc_html__( 'Our servers are working at full capacity. Please try again in a few moments when the system has stabilized.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
						<?php
					} else {
						?>
						<div><?php echo esc_html__( 'There is no data available to display at the moment.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
						<div><?php echo esc_html__( 'Please check your request parameters or try again later for more information.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
						<?php
					}
					?>
				</div>
				<?php
			}

			if ( $results ) {

				// Display the data.
				foreach ( $results as $row ) {
					$datetime_string   = $row->request_time;
					list($date, $time) = explode( ' ', $datetime_string );
					$status            = intval( $row->status ) ? 'success' : 'failed';
					$product_details   = explode( ',', $row->product_details );
					?>

					<div class="beucw-single-log-container">

						<div class="beucw-log-inner beucw-log-header">
							<div class="beucw-log-header-details">
								<div class="beucw-log-ref-id"><?php echo '#' . $row->id; ?></div>
								<div><b><?php echo esc_html__( 'Date: ', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></b> <?php echo esc_attr( $date ); ?></div>
								<div><b><?php echo esc_html__( 'Time: ', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></b> <?php echo esc_attr( $time ); ?></div>
								<div><span class="beucw-log-<?php echo esc_attr( $status ); ?>-msg"><?php echo esc_attr( $status ) == 'success' ? '&check; ' . esc_html__( 'Success', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ) : '&#x2715; ' . esc_html__( 'Failed', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></span></div>
							</div>
							<button class="beucw-log-toggle-details-btn"><?php echo esc_html__( 'Show Details', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></button>
						</div>


						<div class="beucw-log-extra-details" style="display: none;"> <!-- Initially hide the details -->
							<div class="beucw-log-additional-details-container">
								<div class="beucw-log-inner">

									<?php
									if ( $row->product_selection_type == 'all_products' ) {
										?>
										<h2><?php echo esc_html__( 'All products Selection', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></h2>
										<div><span class="beucw-log-green-tick">&check;</span> <?php echo esc_html__( 'Selected Products', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?> (<?php echo esc_attr( count( $all_products ) ); ?>)</div>
										<?php
									} elseif ( $row->product_selection_type == 'categories' ) {

										$category_ids = get_option( 'beucw_prompt_cat_selection', true );
										?>
										<h2><?php echo esc_html__( 'Categories Selection', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></h2>
										<div><span class="beucw-log-green-tick">&check;</span> <?php echo esc_html__( 'Selected Categories', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?> (<?php echo esc_attr( count( $category_ids ) ); ?>)</div>
										<table class="beucw-log-product-table">
											<thead>
												<tr>
													<th><?php echo esc_html__( 'Category Id', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></th>
													<th><?php echo esc_html__( 'Category Name', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach ( $category_ids as $category_id ) {
													$category = get_term( $category_id, 'product_cat' );

													?>
													<tr>
														<td><?php echo esc_attr( intval( $category_id ) ); ?></td>
														<td><?php echo esc_attr( $category->name ); ?></td>
													</tr>
													<?php
												}
												?>
											</tbody>
										</table>
										<?php

									} elseif ( $row->product_selection_type == 'products' ) {
										$selected_products = get_option( 'beucw_product_list' );
										?>
										<h2><?php echo esc_html__( 'Products Selection', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></h2>
										<div><span class="beucw-log-green-tick">&check;</span> <?php echo esc_html__( 'Selected Products', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?> (<?php echo count( $selected_products ); ?>)</div>
										<table class="beucw-log-product-table">
											<thead>
												<tr>
													<th><?php echo esc_html__( 'Product Id', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></th>
													<th><?php echo esc_html__( 'Product Name', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach ( $selected_products as $product_id ) {
													$product_name = get_the_title( $product_id );
													?>
													<tr>
														<td><?php echo esc_attr( intval( $product_id ) ); ?></td>
														<td><?php echo esc_attr( $product_name ); ?></td>
													</tr>
													<?php
												}
												?>
											</tbody>
										</table>
										<?php
									}
									if ( $iterator == 1 ) {
										?>
										<div class="beucw-check-ai-products"><?php echo esc_html__( 'Check Products Set by AI', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
										<?php
									}
									?>
								</div>

								<div class="beucw-log-inner">
									<h2><?php echo esc_html__( 'Product Details Included', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></h2>
									<div class="beucw-log-pr-details-container">
										<?php

										if ( in_array( 'products_name', $product_details ) ) {
											?>
											<span><span class="beucw-log-green-tick">&check;</span> <?php echo esc_html__( 'Product Name', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></span>
											<?php
										}

										if ( in_array( 'product_url', $product_details ) ) {
											?>
											<span><span class="beucw-log-green-tick">&check;</span> <?php echo esc_html__( 'Product URL', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></span>
											<?php
										}

										if ( in_array( 'products_desc', $product_details ) ) {
											?>
											<span><span class="beucw-log-green-tick">&check;</span> <?php echo esc_html__( 'Product Description', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></span>
											<?php
										}

										if ( in_array( 'products_price', $product_details ) ) {
											?>
											<span><span class="beucw-log-green-tick">&check;</span> <?php echo esc_html__( 'Product Price', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></span>
											<?php
										}
										?>
									</div>
								</div>

								<div class="beucw-log-inner">
									<h2><?php echo esc_html__( 'Store Description', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></h2>
									<div>
										<?php echo $row->about_store; ?>
									</div>
								</div>

								<div class="beucw-log-inner">
									<h2><?php echo esc_html__( 'Selected Prompt', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></h2>
									<div>
									<?php echo $row->prompt; ?>
									</div>
								</div>

								<div class="beucw-log-inner">
									<h2><?php echo esc_html__( 'Received Response', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></h2>
									<div><?php echo $status == 'success' ? esc_html__( 'Successfully set Cross sells, Related and Upsell products for the selected products.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ) : esc_html__( 'Request Failed', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></div>
								</div>

								<div class="beucw-log-inner-last">
									<div><b><?php echo esc_html__( 'Total Tokens Used: ', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></b><?php echo $row->tokens_used; ?></div>
								</div>
							</div>
						</div>
					</div>
					<?php
					$iterator += 1;
				}
			}
		}
		?>
	</div>

	<div class="beucw-log-load-more-btn-container">
		<button id="beucw-log-load-more-button"><?php echo esc_html__( 'Load More', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></button>
	</div>
	<?php
}
