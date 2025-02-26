<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Set a unique slug-like ID
//
$prefix = '_wpas_pseo';

//
// Create options
//
WPAS::createOptions(
	$prefix,
	array(
		'menu_title'         => 'Recommended',
		'menu_slug'          => 'wpas_recommended',
		'menu_type'          => 'submenu',
		'menu_parent'        => 'fancypost-init',
		'sticky_header'      => false,
		'show_bar_menu'      => false,
		'show_search'        => false,
		'show_network_menu'  => false,
		'show_reset_section' => false,
		'show_reset_all'     => false,
		'save_defaults'      => false,
		'menu_position'      => 5,
		'theme'              => 'light',
		'footer_credit'      => '',
		'show_footer'        => false,
	)
);

//
// Global Settings.
//
WPAS::createSection(
	$prefix,
	array(
		'fields' => array(
			
			array(
				'type'     => 'callback',
				'function' => 'wpas_pseo_callback',
			),
		),
	),
);

function wpas_pseo_callback() {
	?>
	<style>
	/* Hide all notices & other sections except the framework body && Display none */
	div#wpbody-content > *:not(.wpas.wpas-options),
	[id*="notice"], [class*="notice"], [class*="error"] {
		display: none !important;
	}
	/* Recommended Plugins */
	.wpas-wrapper {
		max-width: 100%;
		border-radius: 0;
		box-shadow: 0 0;
	}
	.wpas-content {
		background-color: transparent;
	}
	.frhd-plugs-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
		justify-content: center;
    }
    .frhd-plugs-card {
		position: relative;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 3px;
        display: flex;
        flex-basis: calc( 33.333% - 56px) !important;
        flex-direction: column;
    }
    .frhd-plug-details {
        display: flex;
        gap: 20px;
        padding: 20px;
    }
    .frhd-plug-body h4 {
        margin: 0;
        font-size: 16px;
    }
    .frhd-plug-status {
        padding: 20px;
        background: #f7f7f7;
        border-top: 1px solid #ddd;
        display: flex;
        justify-content: space-between;
        align-items: center;
		margin-bottom: 0;
    	margin-top: auto;
    }
    .frhd-plug-status strong span {
        color: #adadad;
    }
    .frhd-content {
        position: relative;
        background-color: #fff;
        border-bottom: 1px solid #ddd;
        padding: 40px 10px 30px;
    }
    .frhd-content-inner {
        max-width: 1080px;
        margin: 0 auto;
    }
    .frhd-content-inner img {
        float: left;
        margin-right: 20px;
        max-width: 100px;
        margin-top: -20px;
    }
    .frhd-content h4 {
        margin: 0;
    }
    .frhd-plug-img img {
        min-width: 70px;
    }
	@media (max-width: 1400px) {
		.frhd-plugs-card {
			flex-basis: calc( 50% - 56px) !important;
		}
	}
	@media (max-width: 920px) {
		.frhd-plugs-card {
			flex-basis: calc( 100% - 56px) !important;
		}
	}
    </style>
	<h2 style="text-align: center;font-size: 28px;text-shadow: 2px 1px 3px #dac5ff;">🎈 Recommended Plugins</h2>
	<div class="frhd-recommend-plugs">
		<div class="frhd-plugs-container">
			<div class="frhd-plugs-card">
				<div class="frhd-plug-details">
					<div class="frhd-plug-img">
						<img src="<?php echo esc_url( WPASER_DIR_URL_FILE . 'admin/img/hfc-logo.png' ); ?>">
					</div>
					<div class="frhd-plug-body">
						<h4>HFC - Header Footer Customizer</h4>
						<p class="frhd-plug-deta-text">The most beginner-friendly drag-and-drop WordPress Header & Footer builder. Make attractive mega menu and  Customize your header and footer with Gutenberg, add custom CSS, and scripts effortlessly.</p>
					</div>
				</div>
				<div class="frhd-plug-status">
					<?php
					if ( in_array( 'header-footer-customizer/header-footer-customizer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
						
						echo '<strong>Status: <span style="color: green;">Active</span></strong>
						<a href="#" class="button button-primary button-disabled">Install Plugin</a>';
					} else {

						echo '<strong>Status: <span>Not Installed</span></strong>
						<a href="#" class="button button-primary">Install Plugin</a>';
					}
					?>
				</div>
			</div>
			<div class="frhd-plugs-card">
				<div class="frhd-plug-details">
					<div class="frhd-plug-img">
						<img src="<?php echo esc_url( WPASER_DIR_URL_FILE . 'admin/img/post-block-icon-128x128.gif' ); ?>">
					</div>
					<div class="frhd-plug-body">
						<h4>FancyPost - Post Block</h4>
						<p class="frhd-plug-deta-text">Upgrade your WordPress site with customizable post blocks.  Easily customize layouts and styles to create visually stunning content. No coding skills needed—just install and start customizing.</p>
					</div>
				</div>
				<div class="frhd-plug-status">
					<?php
					if ( in_array( 'post-block/post-block.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
						
						echo '<strong>Status: <span style="color: green;">Active</span></strong>
						<a href="#" class="button button-primary button-disabled">Install Plugin</a>';
					} else {

						echo '<strong>Status: <span>Not Installed</span></strong>
						<a href="' . get_admin_url() . 'plugin-install.php?s=fancypost&tab=search&type=term" target="_blank" class="button button-primary">Install Plugin</a>';
					}
					?>
				</div>
			</div>
			<div class="frhd-plugs-card">
				<div class="frhd-plug-details">
					<div class="frhd-plug-img">
						<img src="<?php echo esc_url( WPASER_DIR_URL_FILE . 'admin/img/editorial-rating-icon-128x128.gif' ); ?>">
					</div>
					<div class="frhd-plug-body">
						<h4>Editorial Rating</h4>
						<p class="frhd-plug-deta-text">Add ratings and reviews to your posts easily. Boost user engagement with clear, customizable rating systems. Perfect for improving the credibility of your content and boost your new sales.</p>
					</div>
				</div>
				<div class="frhd-plug-status">
					<?php
					if ( in_array( 'editorial-rating/editorial-rating.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
						
						echo '<strong>Status: <span style="color: green;">Active</span></strong>
						<a href="#" class="button button-primary button-disabled">Install Plugin</a>';
					} else {

						echo '<strong>Status: <span>Not Installed</span></strong>
						<a href="' . get_admin_url() . 'plugin-install.php?s=editorial%2520rating%2520by%2520pluginic&tab=search&type=term" target="_blank" class="button button-primary">Install Plugin</a>';
					}
					?>
				</div>
			</div>
			<div class="frhd-plugs-card">
				<div class="frhd-plug-details">
					<div class="frhd-plug-img">
						<img src="<?php echo esc_url( WPASER_DIR_URL_FILE . 'admin/img/faqs-icon-128x128.gif' ); ?>">
					</div>
					<div class="frhd-plug-body">
						<h4>FAQ Schema Ultimate</h4>
						<p class="frhd-plug-deta-text">Improve SEO and user experience with structured FAQ schema. Easily create and manage FAQs with responsive accordion, tab, and slider layouts. Make your FAQs more visible and engaging for users​.</p>
					</div>
				</div>
				<div class="frhd-plug-status">
					<?php
					if ( in_array( 'faq-schema-ultimate/faq-schema-ultimate.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
						
						echo '<strong>Status: <span style="color: green;">Active</span></strong>
						<a href="#" class="button button-primary button-disabled">Install Plugin</a>';
					} else {

						echo '<strong>Status: <span>Not Installed</span></strong>
						<a href="' . get_admin_url() . 'plugin-install.php?s=faq%2520schema%2520by%2520pluginic&tab=search&type=term" target="_blank" class="button button-primary">Install Plugin</a>';
					}
					?>
				</div>
			</div>
			<div class="frhd-plugs-card">
				<div class="frhd-plug-details">
					<div class="frhd-plug-img">
						<img src="<?php echo esc_url( WPASER_DIR_URL_FILE . 'admin/img/ytvgp-icon-128x128.gif' ); ?>">
					</div>
					<div class="frhd-plug-body">
						<h4>FancyTube – Video Gallery</h4>
						<p class="frhd-plug-deta-text">Showcase your videos with beautiful galleries and playlists. Import videos seamlessly using the YouTube data API. Create fully responsive and lightweight video galleries, sliders, and popups to engage your audience effectively​.</p>
					</div>
				</div>
				<div class="frhd-plug-status">
					<?php
					if ( in_array( 'video-gallery-playlist/video-gallery-playlist.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
						
						echo '<strong>Status: <span style="color: green;">Active</span></strong>
						<a href="#" class="button button-primary button-disabled">Install Plugin</a>';
					} else {

						echo '<strong>Status: <span>Not Installed</span></strong>
						<a href="' . get_admin_url() . 'plugin-install.php?s=FancyTube&tab=search&type=term" target="_blank" class="button button-primary">Install Plugin</a>';
					}
					?>
				</div>
			</div>
			<div class="frhd-plugs-card">
				<div class="frhd-plug-details">
					<div class="frhd-plug-img">
						<img src="<?php echo esc_url( WPASER_DIR_URL_FILE . 'admin/img/fancy-product-icon-128x128.gif' ); ?>">
					</div>
					<div class="frhd-plug-body">
						<h4>FancyProduct – Product View</h4>
						<p class="frhd-plug-deta-text">Display your products in stunning sliders and carousels. Increase sales by showcasing your products in an interactive and engaging format. Boost conversions with visually appealing product displays that attract and captivate your audience.</p>
					</div>
				</div>
				<div class="frhd-plug-status">
					<?php
					if ( in_array( 'video-gallery-playlist/video-gallery-playlist.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
						
						echo '<strong>Status: <span style="color: green;">Active</span></strong>
						<a href="#" class="button button-primary button-disabled">Install Plugin</a>';
					} else {

						echo '<strong>Status: <span>Not Installed</span></strong>
						<a href="' . get_admin_url() . 'plugin-install.php?s=fancyproduct&tab=search&type=term" target="_blank" class="button button-primary">Install Plugin</a>';
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<?php
}
