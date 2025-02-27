<?php
/**
 * Admin Class
 *
 * Handles the Admin side functionality of plugin
 *
 * @package Popup Anything on click
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} ?>

<div id="wp_faq_welcome_tabs" class="wp-faq-vtab-cnt wp_faq_welcome_tabs wp-faq-clearfix">
	
	<!-- <div class="wp-faq-deal-offer-wrap">
		<h3 style="font-weight: bold; font-size: 30px; color:#ffef00; text-align:center; margin: 15px 0 5px 0;">Why Invest Time On Free Version?</h3>

		<h3 style="font-size: 18px; text-align:center; margin:0; color:#fff;">Explore FAQ Pro with Essential Bundle Free for 5 Days.</h3>			

		<div class="wp-faq-deal-free-offer">
			<a href="<?php // echo esc_url( WP_FAQ_PLUGIN_BUNDLE_LINK ); ?>" target="_blank" class="wp-faq-sf-free-btn"><span class="dashicons dashicons-cart"></span> Try Pro For 5 Days Free</a>
		</div>
	</div> -->

	<div class="wp-faq-black-friday-banner-wrp" style="background:#e1ecc8;padding: 20px 20px 40px; border-radius:5px; text-align:center;margin-bottom: 40px;">
		<h2 style="font-size:30px; margin-bottom:10px;"><span style="color:#0055fb;">WP FAQ</span> is included in <span style="color:#0055fb;">Essential Plugin Bundle</span> </h2> 
		<h4 style="font-size: 18px;margin-top: 0px;color: #ff5d52;margin-bottom: 24px;">Now get Designs, Optimization, Security, Backup, Migration Solutions @ one stop. </h4>

		<div class="wp-faq-black-friday-feature">

			<div class="wp-faq-inner-deal-class" style="width:40%;">
				<div class="wp-faq-inner-Bonus-class">Bonus</div>
				<div class="wp-faq-image-logo" style="font-weight: bold;font-size: 26px;color: #222;"><img style="width: 34px; height:34px;vertical-align: middle;margin-right: 5px;" class="wp-faq-img-logo" src="<?php echo esc_url( WP_FAQ_URL ); ?>assets/images/essential-logo-small.png" alt="essential-logo" /><span class="wp-faq-esstial-name" style="color:#0055fb;">Essential </span>Plugin</div>
				<div class="wp-faq-sub-heading" style="font-size: 16px;text-align: left;font-weight: bold;color: #222;margin-bottom: 10px;">Includes All premium plugins at no extra cost.</div>
				<a class="wp-faq-sf-btn" href="<?php echo esc_url( WP_FAQ_PLUGIN_BUNDLE_LINK ); ?>" target="_blank">Grab The Deal</a>
			</div>

			<div class="wp-faq-main-list-class" style="width:60%;">
				<div class="wp-faq-inner-list-class">
					<div class="wp-faq-list-img-class"><img src="<?php echo esc_url( WP_FAQ_URL ); ?>assets/images/logo-image/img-slider.png" alt="essential-logo" /> Image Slider</li></div>

					<div class="wp-faq-list-img-class"><img src="<?php echo esc_url( WP_FAQ_URL ); ?>assets/images/logo-image/advertising.png" alt="essential-logo" /> Publication</li></div>

					<div class="wp-faq-list-img-class"><img src="<?php echo esc_url( WP_FAQ_URL ); ?>assets/images/logo-image/marketing.png" alt="essential-logo" /> Marketing</li></div>

					<div class="wp-faq-list-img-class"><img src="<?php echo esc_url( WP_FAQ_URL ); ?>assets/images/logo-image/photo-album.png" alt="essential-logo" /> Photo album</li></div>

					<div class="wp-faq-list-img-class"><img src="<?php echo esc_url( WP_FAQ_URL ); ?>assets/images/logo-image/showcase.png" alt="essential-logo" /> Showcase</li></div>

					<div class="wp-faq-list-img-class"><img src="<?php echo esc_url( WP_FAQ_URL ); ?>assets/images/logo-image/shopping-bag.png" alt="essential-logo" /> WooCommerce</li></div>

					<div class="wp-faq-list-img-class"><img src="<?php echo esc_url( WP_FAQ_URL ); ?>assets/images/logo-image/performance.png" alt="essential-logo" /> Performance</li></div>

					<div class="wp-faq-list-img-class"><img src="<?php echo esc_url( WP_FAQ_URL ); ?>assets/images/logo-image/security.png" alt="essential-logo" /> Security</li></div>

					<div class="wp-faq-list-img-class"><img src="<?php echo esc_url( WP_FAQ_URL ); ?>assets/images/logo-image/forms.png" alt="essential-logo" /> Pro Forms</li></div>

					<div class="wp-faq-list-img-class"><img src="<?php echo esc_url( WP_FAQ_URL ); ?>assets/images/logo-image/seo.png" alt="essential-logo" /> SEO</li></div>

					<div class="wp-faq-list-img-class"><img src="<?php echo esc_url( WP_FAQ_URL ); ?>assets/images/logo-image/backup.png" alt="essential-logo" /> Backups</li></div>

					<div class="wp-faq-list-img-class"><img src="<?php echo esc_url( WP_FAQ_URL ); ?>assets/images/logo-image/White-labeling.png" alt="essential-logo" /> Migration</li></div>
				</div>
			</div>
		</div>
		<div class="wp-faq-main-feature-item">
			<div class="wp-faq-inner-feature-item">
				<div class="wp-faq-list-feature-item">
					<img src="<?php echo esc_url( WP_FAQ_URL ); ?>assets/images/logo-image/layers.png" alt="layer" />
					<h5>Site management</h5>
					<p>Manage, update, secure & optimize unlimited sites.</p>
				</div>
				<div class="wp-faq-list-feature-item">
					<img src="<?php echo esc_url( WP_FAQ_URL ); ?>assets/images/logo-image/risk.png" alt="backup" />
					<h5>Backup storage</h5>
					<p>Secure sites with auto backups and easy restore.</p>
				</div>
				<div class="wp-faq-list-feature-item">
					<img src="<?php echo esc_url( WP_FAQ_URL ); ?>assets/images/logo-image/support.png" alt="support" />
					<h5>Support</h5>
					<p>Get answers on everything WordPress at anytime.</p>
				</div>
			</div>
		</div>
		<a class="wp-faq-sf-btn" href="<?php echo esc_url( WP_FAQ_PLUGIN_BUNDLE_LINK ); ?>" target="_blank">Grab The Deal</a>
	</div>

	<div style="border: 1px solid #ddd; background: #fff;box-shadow: 0 3px 2px rgb(0 0 0 / 5%);padding: 50px; margin-bottom: 1rem;">
		<div style="text-align:center;">
			<h1 style="font-size: 24px;">Showcase your <span class="sp-faq-sf-blue">FAQ’s,</span> associated with your business with multiple designs in an aesthetically appealing and professional way.</h1>
			<div style="margin-top: 30px; text-transform: uppercase; text-align:center;">
				<a href="<?php echo esc_url( $wp_faq_add_link ); ?>" class="sp-faq-sf-btn" style="padding: 10px 50px;">Launch FAQ</a>
			</div>
		</div>
	</div>
</div>