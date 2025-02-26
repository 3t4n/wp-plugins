<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://pluginic.com/
 * @since      1.0.0
 *
 * @package    WPAS_Editorial_Rating
 * @subpackage WPAS_Editorial_Rating/admin/partials
 */

wp_enqueue_style( 'wpas-admin-main-page', esc_url( WPASER_DIR_URL_FILE . 'admin/css/wpas-main-page.css' ), array(), WPAS_Editorial_Rating_VERSION );
?>
<div class="wpas-option-body">
	<div class="wpas-setting-header">
		<img src="<?php echo esc_url( WPASER_DIR_URL_FILE . 'admin/img/admin-head-bg-pattern.png' ); ?>" alt="Editorial Rating Header Background">
		<div class="wpas-setting-header-info">
			<img src="<?php echo esc_url( WPASER_DIR_URL_FILE . 'admin/img/icon-128x128.gif' ); ?>" alt="Editorial Rating Logo">
			<div class="wpas-plugin-about">
				<h1>Editorial Rating<sup id="wpas-plugin-version"><?php echo esc_html( WPAS_Editorial_Rating_VERSION ); ?></sup></h1>
				<p>Thank you for installing.</p>
				<p>Most Powerful &amp; Advanced Plugin!</p>
			</div>
		</div>
	</div>

	<div class="wpas-container-wrap">
		<div class="wpas-container-overview">
			<div class="wpas-container-hero">
				<div class="wpas-hero-video">
					<iframe width="100%" height="400" src="https://www.youtube.com/embed/9x05j2nvemE" title="Editorial Rating" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					<div class="wpas-hero-buttons">
						<a href="<?php echo esc_url( get_admin_url() . 'post-new.php?post_type=wpas_review' ); ?>" target="_blank">Add New Review</a>
						<a href="https://pluginic.com/docs/editorial-product-rating-overview/?ref=100" target="_blank">Documentation</a>
						<a href="https://demo.pluginic.com/editorial-rating/?ref=100" target="_blank">Live Demo</a>
					</div>
				</div>
				<div class="wpas-container-ad">
					<a href="https://pluginic.com/services/?ref=100" target="_blank">
						<picture>
							<source media="(max-width:960px)" srcset="<?php echo esc_url( WPASER_DIR_URL_FILE . 'admin/img/banner-960x340.jpg' ); ?>">
							<img src="<?php echo esc_url( WPASER_DIR_URL_FILE . 'admin/img/banner-329x468.jpg' ); ?>">
						</picture>
					</a>
				</div>
			</div>
		</div>
		<div class="wpas-spacer" style="height: 20px;"></div>
		<div class="wpas-hero-upgrade">
			<h2><span class="dashicons dashicons-superhero-alt"></span>Pro Feature List :</h2>
			<div class="wpas-upgrade-feature-list">
				<ul>
					<li>Editorial Rating on Any Post Type.</li>
					<li>Category-wise Editorial Rating System.</li>
					<li>Total Score Based on Rating Category.</li>
					<li>Editorial Rating On The Sidebar.</li>
					<li>Display/Hide Specific Components.</li>
					<li>Pros and Cons.</li>
					<li>Product links as a button.</li>
					<li>Animated Rating Bar.</li>
					<li>Review SCHEMA SUPPORT !!</li>
					<li>Product Ratings on Google Search Page.</li>
					<li>Image Function with internal and external links.</li>
					<li>Full control over the functionalities.</li>
				</ul>
				<ul>
					<li>Editorial Cross Ratings.</li>
					<li>Product link as an eye-catching button.</li>
					<li>Shopping Knowledge Panel.</li>
					<li>Google Recommended Template.</li>
					<li>Comprehensive Product Details.</li>
					<li>WooCommerce Support.</li>
					<li>Enhanced User Experience.</li>
					<li>Overall Assessment.</li>
					<li>Editor’s Overview.</li>
					<li>User Ratings upon the Editorial Rating.</li>
					<li>User Comment upon the Editorial Rating.</li>
					<li>Related Gutenberg blocks.</li>
				</ul>
			</div>
			<a class="wpas-hero-btn-pro" href="https://pluginic.com/plugins/editorial-rating/?ref=100" target="_blank">Upgrade to Pro <span>→</span></a>
		</div>
		<div class="wpas-spacer" style="height: 20px;"></div>
		<div class="wpas-testimonial">
			<div class="wpas-testimonial-columns">
				<div class="wpas-testimonial-column">
					<span class="wpas-testimonial-stars"></span>
					<p style="font-size:18px;line-height:1.3;margin-bottom:15px">“The plugin is not the most stylish or feature-packed, but it’s powerful, flexible, and quite simple.</p>
					<div class="wpas-testimonial-client">
						<img width="50" height="50" src="<?php echo esc_url( WPASER_DIR_URL_FILE . 'admin/img/client-1.jpg' ); ?>">
						<div class="wpas-testimonial-client-ghost">
							<h4>Chelsea Head</h4>
							<p>Serial Entrepreneur</p>
						</div>
					</div>
				</div>
				<div class="wpas-testimonial-column">
					<span class="wpas-testimonial-stars"></span>
					<p style="font-size:18px;line-height:1.3;margin-bottom:15px">“Suitable for all types of websites, large or small. Easy to set up and lots of documentation to help you.</p>
					<div class="wpas-testimonial-client">
						<img width="50" height="50" src="<?php echo esc_url( WPASER_DIR_URL_FILE . 'admin/img/client-2.jpg' ); ?>">
						<div class="wpas-testimonial-client-ghost">
							<h4>Bert Mora</h4>
							<p>UI Developer</p>
						</div>
					</div>
				</div>
				<div class="wpas-testimonial-column">
					<span class="wpas-testimonial-stars"></span>
					<p style="font-size:18px;line-height:1.3;margin-bottom:15px">“There’s no doubt it is a great plugin. I am using the free plan and am extremely happy with the results.</p>
					<div class="wpas-testimonial-client">
						<img width="50" height="50" src="<?php echo esc_url( WPASER_DIR_URL_FILE . 'admin/img/client-3.jpg' ); ?>">
						<div class="wpas-testimonial-client-ghost">
							<h4>Carol Stokes</h4>
							<p>IT Specialist</p>
						</div>
					</div>
				</div>
				<div class="wpas-testimonial-column">
					<span class="wpas-testimonial-stars"></span>
					<p style="font-size:18px;line-height:1.3;margin-bottom:15px">“The plugin met all my expectations! It’s easy to use and everything works as it should. I recommend it!</p>
					<div class="wpas-testimonial-client">
						<img width="50" height="50" src="<?php echo esc_url( WPASER_DIR_URL_FILE . 'admin/img/client-4.jpg' ); ?>">
						<div class="wpas-testimonial-client-ghost">
							<h4>Roman Rybakov</h4>
							<p>Frontend Engineer</p>
						</div>
					</div>
				</div>
				<a href="https://wordpress.org/support/plugin/editorial-rating/reviews/?filter=5" target="_blank" style="margin: 0 auto;">See reviews from free users →</a>
			</div>
		</div>
	</div>
</div>
