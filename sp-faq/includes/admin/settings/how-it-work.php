<?php
/**
 * Pro Designs and Plugins Feed
 *
 * @package WP FAQ
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} ?>

<div class="wrap wp-faq-wrap">
	<h2>
		<?php esc_html_e( 'How It Works', 'sp-faq' ); ?>
	</h2>
	<style type="text/css">
		.textcenter{text-align: center;}
		.wpos-box{box-shadow: 0 5px 30px 0 rgba(214,215,216,.57);background: #fff; padding-bottom:10px; position:relative;}
		.wpos-box ul{padding: 15px;}
		.wpos-box h5{background:#555; color:#fff; padding:15px; text-align:center;}
		.wpos-box h4{ padding:0 15px; margin:5px 0; font-size:18px;}
		.wpos-box .button{margin:0px 15px 15px 15px; text-align:center; padding:7px 15px; font-size:15px;display:inline-block;}
		.wpos-box .wpos-list{list-style:square; margin:10px 0 0 20px;}
		.wpos-clearfix:before, .wpos-clearfix:after{content: "";display: table;}
		.wpos-clearfix::after{clear: both;}
		.wpos-clearfix{clear: both;}
		.wpos-col{width: 47%; float: left; margin-right:10px; margin-bottom:10px;}
		.wpos-pro-box .hndle{background-color:#0073AA; color:#fff;}
		.wpos-pro-box.postbox{background:#dbf0fa none repeat scroll 0 0; border:1px solid #0073aa; color:#191e23;}
		.postbox-container .wpos-list li:before{font-family: dashicons; content: "\f139"; font-size:20px; color: #0073aa; vertical-align: middle;}
		.wp-faq-wrap .wpos-button-full{display:block; text-align:center; box-shadow:none; border-radius:0;}
		.wp-faq-shortcode-preview{background-color: #e7e7e7; font-weight: bold; padding: 2px 5px; display: inline-block; margin:0 0 2px 0;}
		.upgrade-to-pro{font-size:18px; text-align:center; margin-bottom:15px;}
		.wpos-copy-clipboard{-webkit-touch-callout: all; -webkit-user-select: all; -khtml-user-select: all; -moz-user-select: all; -ms-user-select: all; user-select: all;}
		.wpos-new-feature{ font-size: 10px; margin-left:3px; color: #fff; font-weight: bold; background-color: #03aa29; padding:1px 4px; font-style: normal; }
		.button-orange{background: #ff5d52 !important;border-color: #ff5d52 !important; font-weight: 600;}
		.button-blue{background: #0055fb !important;border-color: #0055fb !important; font-weight: 600;}
	</style>

	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-2">

			<!--How it workd HTML -->
			<div id="post-body-content">
				<div class="meta-box-sortables">

					<div class="postbox">
						<div class="postbox-header"> 
							<h2 class="hndle">
								<span><?php esc_html_e( 'How It Works - Display and shortcode', 'sp-faq' ); ?></span>
							</h2>
						</div>
						<div class="inside">
							<table class="form-table">
								<tbody>
									<tr>
										<th>
											<label><?php esc_html_e('Getting Started with FAQ', 'sp-faq'); ?>:</label>
										</th>
										<td>
											<ul>
												<li><?php esc_html_e('Step-1. Go to "FAQ --> Add New".', 'sp-faq'); ?></li>
												<li><?php esc_html_e('Step-2. Add Title, Description and featured image', 'sp-faq'); ?></li>
												<li><?php esc_html_e('Step-3. Display multiple FAQs, create categories under "FAQ --> category" and create categories.', 'sp-faq'); ?></li>
												<li><?php esc_html_e('Step-4. Assign FAQ post to respective categories and use the category shortcode under "FAQ --> category"', 'sp-faq'); ?></li>
											</ul>
										</td>
									</tr>

									<tr>
										<th>
											<label><?php esc_html_e('How Shortcode Works', 'sp-faq'); ?>:</label>
										</th>
										<td>
											<ul>
												<li><?php esc_html_e('Step-1. Create a page like FAQ OR add the shortcode in any page.', 'sp-faq'); ?></li>
												<li><?php esc_html_e('Step-2. Put below shortcode as per your need.', 'sp-faq'); ?></li>
											</ul>
										</td>
									</tr>

									<tr>
										<th>
											<label><?php esc_html_e('All Shortcodes', 'sp-faq'); ?>:</label>
										</th>
										<td>
											<span class="wpos-copy-clipboard wp-faq-shortcode-preview">[sp_faq]</span> – <?php esc_html_e('FAQ Shortcode', 'sp-faq'); ?>
										</td>
									</tr>
									<tr>
										<th>
											<label><?php esc_html_e('Documentation', 'sp-faq'); ?>:</label>
										</th>
										<td>
											<a class="button button-primary" href="https://docs.essentialplugin.com/wp-responsive-faq-with-category-plugin/" target="_blank"><?php esc_html_e('Check Documentation', 'sp-faq'); ?></a>
										</td>
									</tr>
									<tr>
										<th>
											<label><?php esc_html_e('Demo', 'sp-faq'); ?>:</label>
										</th>
										<td>
											<a class="button button-primary" href="https://demo.essentialplugin.com/sp-faq/" target="_blank"><?php esc_html_e('Check Free Demo', 'sp-faq'); ?></a>
										</td>
									</tr>
								</tbody>
							</table>
						</div><!-- .inside -->
					</div><!-- #general -->

					<div class="postbox">
						<div class="postbox-header">
							<h2 class="hndle">
								<span><?php esc_html_e( 'Gutenberg Support', 'sp-faq' ); ?></span>
							</h2>
						</div>
						<div class="inside">
							<table class="form-table">
								<tbody>
									<tr>
										<th>
											<label><?php esc_html_e('How it Work', 'sp-faq'); ?>:</label>
										</th>
										<td>
											<ul>
												<li><?php esc_html_e('Step-1. Go to the Gutenberg editor of your page.', 'sp-faq'); ?></li>
												<li><?php esc_html_e('Step-2. Search "FAQ" keyword in the Gutenberg block list.', 'sp-faq'); ?></li>
												<li><?php esc_html_e('Step-3. Add any block of FAQ and you will find its relative options on the right end side.', 'sp-faq'); ?></li>
											</ul>
										</td>
									</tr>
								</tbody>
							</table>
						</div><!-- .inside -->
					</div><!-- #general -->

					<!-- Help to improve this plugin! -->
					<div class="postbox">
						<div class="postbox-header">
							<h2 class="hndle">
								<span><?php esc_html_e( 'Help to improve this plugin!', 'sp-faq' ); ?></span>
							</h2>
						</div>
						<div class="inside">
							<p><?php esc_html_e('Enjoyed this plugin? You can help by rate this plugin', 'sp-faq'); ?> <a href="https://wordpress.org/support/plugin/sp-faq/reviews/" target="_blank"><?php esc_html_e('5 stars!', 'sp-faq'); ?></a></p>
						</div><!-- .inside -->
					</div><!-- #general -->
				</div><!-- .meta-box-sortables -->
			</div><!-- #post-body-content -->

			<!--Upgrad to Pro HTML -->
			<div id="postbox-container-1" class="postbox-container">
				<div class="meta-box-sortables">
					<div class="postbox wpos-pro-box">
						<div class="postbox-header">
							<h3 class="hndle">
								<span><?php esc_html_e( 'WP FAQ Premium Features', 'sp-faq' ); ?></span>
							</h3>
						</div>
						<div class="inside">
							<ul class="wpos-list">
								<li><?php esc_html_e('15+ predefined design and Custom Colors option as in shortcode parameter.', 'sp-faq'); ?></li>
								<li><?php esc_html_e('FAQ with accordion', 'sp-faq'); ?></li>
								<li><?php esc_html_e('FAQ with categories grid', 'sp-faq'); ?></li>
								<li><?php esc_html_e('WP Templating Features.', 'sp-faq'); ?></li>
								<li><?php esc_html_e('WPBakery Page Builder Supports', 'sp-faq'); ?></li>
								<li><?php esc_html_e('Gutenberg, Elementor, Beaver and SiteOrigin Page Builder Support.', 'sp-faq'); ?> <span class="wpos-new-feature">New</span></li>
								<li><?php esc_html_e('Divi Page Builder Native Support.', 'sp-faq'); ?> <span class="wpos-new-feature">New</span></li>
								<li><?php esc_html_e('Fusion Page Builder (Avada) native support.', 'sp-faq'); ?> <span class="wpos-new-feature">New</span></li>
								<li><?php esc_html_e('Custom ordering with drag and drop', 'sp-faq'); ?></li>
								<li><?php esc_html_e('WooCommerce FAQ support. Now you can add Product FAQ to WooCommerce Product page easily.', 'sp-faq'); ?></li>
								<li><?php esc_html_e('Various shortcode parameter for FAQ like Order, Order By, Limit, Color, Background Color, Border Color, Active FAQ color, Display specific FAQ, Exclude some FAQ and many more.', 'sp-faq'); ?></li>
								<li><?php esc_html_e('Remain open FAQ on page load', 'sp-faq'); ?></li>
								<li><?php esc_html_e('Custom CSS option', 'sp-faq'); ?></li>
								<li><?php esc_html_e('Fully responsive', 'sp-faq'); ?></li>
								<li><?php esc_html_e('100% Multi language', 'sp-faq'); ?></li>
							</ul>
							<div class="upgrade-to-pro"><?php esc_html_e('Gain access to', 'sp-faq'); ?> <strong><?php esc_html_e('WP FAQ', 'sp-faq'); ?></strong></div>
							<a class="button button-primary wpos-button-full button-orange" href="<?php echo esc_url( WP_FAQ_PLUGIN_LINK_UNLOCK ); ?>" target="_blank"><?php esc_html_e('Upgrade to PRO', 'sp-faq'); ?></a>
						</div><!-- .inside -->
					</div><!-- #general -->
				</div><!-- .meta-box-sortables -->
			</div><!-- #post-container-1 -->

		</div><!-- #post-body -->
	</div><!-- #poststuff -->
</div><!-- .wp-faq-wrap -->