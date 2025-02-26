<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Set a unique slug-like ID
//
$wpas_global_prefix = '_wpas_global_options';

//
// Create options
//
WPAS::createOptions(
	$wpas_global_prefix,
	array(
		'menu_title'         => __( 'Settings', 'wpas_editorial_rating' ),
		'menu_slug'          => 'wpas-global-options',
		'menu_type'          => 'submenu',
		'menu_parent'        => 'edit.php?post_type=wpas_review',
		'sticky_header'      => false,
		'show_bar_menu'      => false,
		'show_network_menu'  => false,
		'show_reset_section' => false,
		'show_reset_all'     => true,
		'theme'              => 'light',
		'footer_credit'      => __( 'Giving a <a href="https://wordpress.org/support/plugin/editorial-rating/reviews/?filter=5" target="_blank" style="color: #ffb900;text-decoration: overline;">&#9733;&#9733;&#9733;&#9733;&#9733;</a> rating to this plugin - your support helps us to continue improving.', 'wpas_editorial_rating' ),
		'class'              => ( 'PRESTIGE' === WPASER_COPY ) ? 'wpas-global-options wpas-copy-pro' : 'wpas-global-options wpas-copy-lite',
	)
);

/**
 * Section: Global Settings.
 */
WPAS::createSection(
	$wpas_global_prefix,
	array(
		'title'  => 'Global Settings',
		'icon'   => 'fas fa-cogs',
		'fields' => array(

			array(
				'id'         => 'wpas-schema-allows',
				'type'       => 'switcher',
				'title'      => __( 'Enabled Schema Globally', 'wpas_editorial_rating' ),
				'subtitle'   => __( 'Enabled Schema markup to enhance search engine visibility. If you are using another SEO plugin, it is recommended to disable this option to avoid conflicts.', 'wpas_editorial_rating' ),
				'text_on'    => 'Enabled',
				'text_off'   => 'Disabled',
				'text_width' => 100,
				'default'    => true,
			),
			array(
				'id'          => 'wpas_selected_er_post_types',
				'type'        => 'select',
				'title'       => 'Editor Rating Byproduct',
				'subtitle'    => 'Showing Editorial Rating schema or other related options in selected postTypes.',
				'placeholder' => 'Select a post/page',
				'options'     => 'post_types',
				'chosen'      => true,
				'multiple'    => true,
				'default'     => array( 'post' ),
				'class'       => 'wpas-field-chosen-40 wpas-field-select-pro',
			),
			array(
				'id'         => 'wpas-widget-allows',
				'type'       => 'switcher',
				'title'      => __( 'Enabled Widget Globally', 'wpas_editorial_rating' ),
				'subtitle'   => __( 'Enabled all widgets from Editorial Rating.', 'wpas_editorial_rating' ),
				'text_on'    => 'Enabled',
				'text_off'   => 'Disabled',
				'text_width' => 100,
				'default'    => true,
			),
			array(
				'id'         => 'wpas-metabox-reset-show',
				'type'       => 'switcher',
				'title'      => __( 'Show Reset Button in Metabox', 'wpas_editorial_rating' ),
				'subtitle'   => __( 'Show a reset button in review metabox page.', 'wpas_editorial_rating' ),
				'text_on'    => 'Enabled',
				'text_off'   => 'Disabled',
				'text_width' => 100,
				'default'    => true,
			),
			array(
				'id'         => 'wpas-metabox-woo-show',
				'type'       => 'switcher',
				'title'      => __( 'Editorial Rating in Products', 'wpas_editorial_rating' ),
				'subtitle'   => __( 'Show Editorial Rating options in WooCommerce product pages.', 'wpas_editorial_rating' ),
				'text_on'    => 'Enabled',
				'text_off'   => 'Disabled',
				'text_width' => 100,
				'default'    => true,
				'class'      => 'wpas-field-switcher-pro',
			),
			array(
				'id'       => 'wpas_code_editor_css',
				'type'     => 'code_editor',
				'before'    => __( '<strong>Custom CSS:</strong><br>Write your custom CSS here. Styles will be applied only on single post pages.', 'wpas_editorial_rating' ),
				'settings' => array(
					'theme' => 'mbo',
					'mode'  => 'css',
				),
				'default'  => '/**
 * Custom CSS gives you the flexibility to customize the look,
 * and you can write your custom css in here.
 * This is a premium feature & you need to PRO version for this feature.
 */',
				'class'    => 'wpas-field-code-editor-pro',
			),

		),
	)
);

/**
 * Section: Block settings.
 */
WPAS::createSection(
	$wpas_global_prefix,
	array(
		'title'  => 'Blocks',
		'icon'   => 'fas fa-shapes',
		'fields' => array(

			//
			// Custom CSS for this page.
			//
			array(
				'type'    => 'content',
				'content' => '<style>
				.wpas-field.wpas-field-content.wpas-content-style-tag {
					display: none;
				}
				.wpas-title.wpas-recom-plugs {
					display: flex;
					gap: 10px;
				}
				.wpas-title.wpas-recom-plugs h4 span {
					font-weight: 400;
					color: #999;
					line-height: 20px;
				}
				a.button.wpas-recom-plugs-btn {
					box-shadow: 1px 1px 1px 1px #2271b1;
					transform: translateY(10px);
				}
				a.button.wpas-recom-plugs-btn:active {
					box-shadow: 0 0;
				}
				.wpas-social-share-list ul.wpas--inline-list {
					max-width: 700px;
				}
				/* Switcher Box */
				.wpas-field.wpas-field-switcher_box {
					position: relative;
					display: inline-block;
					max-width: calc(33.333% - 90px);
					box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
					border-radius: 5px;
					margin: 20px;
					padding: 25px 25px 10px;
					background: #fff;
				}
				.wpas--sb_title {
					position: relative;
					display: flex;
					align-items: center;
					gap: 14px;
					margin-bottom: 20px;
				}
				.wpas--sb_title span {
					font-size: 15px;
					font-weight: 500;
				}
				.wpas--sb_title:before {
					position: absolute;
					left: 7px;
					top: 5px;
					width: 26px;
					height: 26px;
					background: rgb(247 56 89 / 10%);
					content: "";
					border-radius: 6px;
					border: 1px solid rgb(247 56 89 / 10%);
				}
				.wpas--sb_s_desc {
					color: #7e7e7e;
				}
				.wpas--sb_btm {
					display: flex;
					justify-content: space-between;
					align-items: center;
				}
				.wpas--sources ul,
				.wpas--sources ul li a {
					display: flex;
					align-items: center;
					gap: 5px;
				}
				.wpas--sources ul {
					gap: 15px;
				}
				.wpas--sources ul li a svg {
					fill: #3c434a;
				}
				.wpas--sources ul li a {
					text-decoration: none;
					color: #222;
				}
				.wpas--sources ul li a:hover {
					text-decoration: underline;
				}
				.wpas--sb_inner {
					border-bottom: 1px solid #e7e7e7;
					margin-bottom: 10px;
					padding-bottom: 20px;
				}
				/* Badges */
				.wpas--sbn:after {
					position: absolute;
					right: 0;
					top: 0;
					background: rgb(96 125 139 / 25%);
					border-color: rgb(96 125 139 / 40%);
					color: #607D8B;
					border: 1px solid rgb(96 125 139 / 40%);
					content: attr(badge-title);
					text-transform: uppercase;
					border-bottom-left-radius: 3px;
					display: inline-block;
					padding: 6px 7px;
					font-size: 10px;
					line-height: 10px;
					font-weight: bold;
				}
				.wpas--sb_wrap.wpas--sbb-pro:after {
					background: rgb(233 30 99 / 25%);
					border-color: rgb(233 30 99 / 40%);
					color: #E91E63;
				}
				.wpas--sb_wrap.wpas--sbb-new:after {
					background: rgb(103 58 183 / 25%);
					border-color: rgb(103 58 183 / 40%);
					color: #673AB7;
				}
				/* Inline Fieldset Field */
				.wpas-field.wpas-field-fieldset.wpas-fieldset-inline .wpas-fieldset .wpas-fieldset-content {
					border: 0;
					display: flex;
					align-items: center;
					box-shadow: 0 0;
					gap: 15px;
				}
				.wpas-field.wpas-field-fieldset.wpas-fieldset-inline .wpas-field {
					width: fit-content;
					padding: 0;
					border: 0;
				}
				/* Responsive */
				@media (max-width: 1280px) {
					.wpas-field.wpas-field-switcher_box {
						max-width: calc(50% - 90px) !important;
					}
				}
				@media (max-width: 980px) {
					.wpas-field.wpas-field-switcher_box {
						max-width: 100% !important;
					}
				}
				/* If other blocks missing, block switcher not working */
				.wpas-field.wpas-field-switcher.wpas-missing-blocks-switcher:has(.wpas--switcher.wpas--active) ~ .wpas-field.wpas-field-switcher_box .wpas--switcher,
				.wpas--sbb-pro .wpas--switcher {
					opacity: .5;
					pointer-events: none;
				}
				.wpas--sbb-pro .wpas--switcher {background: red;}
				/* PRO Tags */
				.wpas-copy-lite .wpas-fieldset {
					position: relative;
				}
				.wpas-copy-lite .wpas-field-select-pro .wpas-fieldset:before {
					position: absolute;
					left: 2px;
					top: -22px;
					width: 32px;
					background: transparent;
					content: "PRO";
					color: #9c27b0;
					font-weight: bold;
					border: 2px solid #9c27b0;
					text-align: center;
					border-top-left-radius: 3px;
					border-top-right-radius: 3px;
				}
				.wpas-copy-lite .wpas-field-select-pro .wpas-fieldset ul.chosen-choices {
					outline: 2px solid #9c27b0;
				}
				li.search-choice {
					background: #9c27b0 !important;
					color: #fff !important;
				}
				.wpas-copy-lite .wpas-field-select-pro .chosen-container {
					pointer-events: none;
				}
				.wpas-copy-lite .wpas-field-code-editor-pro {
					position: relative;
					pointer-events: none;
					background-color: rgb(156 39 176 / 7%);
				}
				.wpas-copy-lite .wpas-field-code-editor-pro:before {
					position: absolute;
					left: 0;
					top: 0px;
					width: 32px;
					background: #9c27b0;
					content: "PRO";
					color: #fff;
					font-weight: bold;
					border: aliceblue;
					text-align: center;
				}
				/* Others */
				.wpas-field.wpas-field-switcher.wpas-missing-blocks-switcher {
					background: antiquewhite;
				}
				.wpas-copy-lite .wpas-nav-normal > ul li a[href="#tab=unlock-all-features"] {
					background: #00a32a;
					color: #fff;
					border-color: #00a32a;
				}
				</style>
				<script>
				(function ($) {
					$(document).ready(function(){
						$(\'.wpas-copy-pro a[href="#tab=license"]\').click(function(e){
							e.preventDefault();
							window.location.href = window.location.origin + "/wp-admin/edit.php?post_type=wpas_review&page=wpas_license";
						});
						$(\'a[href="#tab=recommended"]\').click(function(e){
							e.preventDefault();
							window.location.href = window.location.origin + "/wp-admin/admin.php?page=wpas_recommended";
						});
						$(\'a[href="#tab=help"]\').click(function(e){
							e.preventDefault();
							window.location.href = window.location.origin + "/wp-admin/edit.php?post_type=wpas_review&page=wpas_help";
						});
					});
				})(jQuery);
				</script>',
				'class'   => 'wpas-content-style-tag',
			),

			//
			// Fields.
			//
			array(
				'id'       => 'wpas_block_missing_other_blocks',
				'type'     => 'switcher',
				'title'    => 'Missing Other Blocks',
				'subtitle' => '<span style="display: block;color: #F44336;min-width: 600px;margin-top: 20px;">If you unregister any blocks from here, sometimes other plugins\' blocks may be missing. This occurs because wp_block_type_registry is not being used properly. Check the documentation here if you are proficient in coding: <a href="https://developer.wordpress.org/reference/classes/wp_block_type_registry/get_all_registered/" target="_blank">WP_Block_Type_Registry::get_all_registered()</a></span>',
				'text_on'  => 'Yes',
  				'text_off' => 'No',
				'default'  => true,
				'class'    => 'wpas-missing-blocks-switcher',
			  ),
			array(
				'id'         => 'wpas_block_review_summary',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 16 16"><path fill="#f73859" d="M4.68.06l1.04,1.04-3.76,3.76L-.05,2.85.99,1.8l.97.97L4.68.06ZM1.96,13.85l-.97-.97L-.05,13.92l2.01,2.01,3.76-3.76-1.04-1.04-2.71,2.72ZM7.68,14.27h8.31v-1.47H7.68v1.47ZM7.68,3.41h8.31v-1.47H7.68v1.47ZM1.96,8.34l-.97-.97L-.05,8.41l2.01,2.01,3.76-3.76-1.04-1.04-2.71,2.72ZM7.68,8.76h8.31v-1.47H7.68v1.47Z"/></svg><span>Review Summary Template</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'badge_name' => 'new',
				'default'    => true,
			),
			array(
				'id'         => 'wpas_block_cross_rating',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512"><path fill="#f73859" d="M24 56c0-13.3 10.7-24 24-24H80c13.3 0 24 10.7 24 24V176h16c13.3 0 24 10.7 24 24s-10.7 24-24 24H40c-13.3 0-24-10.7-24-24s10.7-24 24-24H56V80H48C34.7 80 24 69.3 24 56zM86.7 341.2c-6.5-7.4-18.3-6.9-24 1.2L51.5 357.9c-7.7 10.8-22.7 13.3-33.5 5.6s-13.3-22.7-5.6-33.5l11.1-15.6c23.7-33.2 72.3-35.6 99.2-4.9c21.3 24.4 20.8 60.9-1.1 84.7L86.8 432H120c13.3 0 24 10.7 24 24s-10.7 24-24 24H32c-9.5 0-18.2-5.6-22-14.4s-2.1-18.9 4.3-25.9l72-78c5.3-5.8 5.4-14.6 .3-20.5zM224 64H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H224c-17.7 0-32-14.3-32-32s14.3-32 32-32zm0 160H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H224c-17.7 0-32-14.3-32-32s14.3-32 32-32zm0 160H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H224c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/></svg><span>Cross Rating Template</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'badge_name' => 'pro',
				'default'    => true,
			),
			array(
				'id'         => 'wpas_block_info_box',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 16 16"><path fill="#f73859" d="M3.86,5.36l-1.04-1.01,1.44-.21.64-1.31.65,1.31,1.44.21-1.04,1.01.24,1.44-1.29-.68-1.28.68.24-1.44ZM2.82,13.17h4.4v-1.51H2.82v1.51ZM2.82,9.81h10.36v-1.52H2.82v1.52ZM16,1.98v12.04c0,1.1-.89,1.99-1.99,1.99H1.99C.89,16.01,0,15.12,0,14.02V1.98C0,.88.89-.01,1.99-.01h12.02c1.1,0,1.99.89,1.99,1.99ZM14.69,1.98c0-.38-.3-.68-.68-.68H1.99c-.38,0-.68.3-.68.68v12.04c0,.38.3.68.68.68h12.02c.38,0,.68-.3.68-.68V1.98ZM3.62,6.8l1.28-.68,1.29.68-.24-1.44,1.04-1.01-1.44-.21-.65-1.31-.64,1.31-1.44.21,1.04,1.01-.24,1.44ZM2.82,13.17h4.4v-1.51H2.82v1.51ZM2.82,8.29v1.52h10.36v-1.52H2.82ZM2.82,11.66v1.51h4.4v-1.51H2.82ZM2.82,8.29v1.52h10.36v-1.52H2.82ZM6.99,4.35l-1.44-.21-.65-1.31-.64,1.31-1.44.21,1.04,1.01-.24,1.44,1.28-.68,1.29.68-.24-1.44,1.04-1.01Z"/></svg><span>Review Info Box</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'default'    => true,
			),
			array(
				'id'         => 'wpas_block_pros_cons',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 16 16"><path fill="#f73859" d="M6.11,8.56H0v-1.4h6.12v1.4ZM6.11,10.97H0v1.4h6.12v-1.4ZM5.34,14.45H.76v1.4h4.58v-1.4ZM16.01,7.16h-6.12v1.4h6.12v-1.4ZM16.01,10.97h-6.12v1.4h6.12v-1.4ZM15.24,14.45h-4.58v1.4h4.58v-1.4ZM11.82,5.34l1.53-1.52,1.54,1.52,1.06-1.1-1.51-1.49,1.51-1.51-1.06-1.09-1.54,1.52-1.53-1.52-1.09,1.09,1.53,1.51-1.53,1.5,1.09,1.09ZM5.77,1.46l-1.08-1.09-2.6,2.58-.93-.93L.08,3.11l2.01,2.01,3.68-3.66Z"/></svg><span>Pros Cons</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'default'    => true,
			),
			array(
				'id'         => 'wpas_block_freemium_table',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 16 16"><path fill="#f73859" d="M1.14,15.98L0,14.84l1.63-1.6L0,11.62l1.14-1.14,1.64,1.62,1.64-1.63,1.11,1.15-1.61,1.61,1.61,1.6-1.11,1.14-1.64-1.62-1.64,1.62ZM6.08,1.18L4.92.02l-2.76,2.78-.99-.99L0,2.97l2.16,2.13,3.93-3.92ZM16,1.65h-8v1.79h8v-1.79ZM16,7.16h-8v1.79h8v-1.79ZM16,12.34h-8v1.79h8v-1.79Z"/></svg><span>Freemium Table</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'default'    => true,
			),
			array(
				'id'         => 'wpas_block_pricing_table',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 16 16"><path fill="#f73859" d="M8.39,7.37c0-.15-.05-.32-.61-.55-.69-.27-1.4-.67-1.4-1.56,0-.67.43-1.22,1.09-1.43v-.8h1.12v.73c.28.04.54.13.77.27l.25.14-.42,1.11-.34-.19c-.11-.07-.35-.2-.74-.2-.27,0-.43.1-.43.28,0,.13.05.25.69.51.62.25,1.33.67,1.33,1.63,0,.7-.45,1.27-1.14,1.49v.82h-1.13v-.76c-.37-.05-.72-.18-.97-.36l-.21-.15.41-1.13.36.24c.24.16.56.25.85.25.24,0,.52-.1.52-.37ZM10.1,11.47h-4.2v1.34h4.2v-1.34ZM12.69,1.79h3.31v12.49h-3.31v1.73H3.31v-1.73H0V1.79h3.31V-.01h9.39v1.8ZM3.31,3.13h-1.96v9.8h1.96V3.13ZM11.35,1.33h-6.7v13.34h6.7V1.33ZM12.69,3.13v9.8h1.96V3.13h-1.96Z"/></svg><span>Pricing Table</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'default'    => true,
			),
			array(
				'id'         => 'wpas_block_star_rating',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 16 16"><path fill="#f73859" d="M8,15.99c4.41,0,8-3.58,8-7.99S12.41,0,8,0,0,3.6,0,8.01s3.59,7.99,8,7.99ZM8,1.32c3.69,0,6.69,3,6.69,6.68s-3,6.69-6.69,6.69S1.32,11.69,1.32,8.01,4.31,1.32,8,1.32ZM4.66,12.6l3.34-1.76,3.34,1.76-.64-3.72,2.7-2.64-3.74-.54-1.67-3.39-1.67,3.39-3.74.54,2.71,2.64-.64,3.72ZM5.19,7.08l1.94-.28.87-1.76.87,1.76,1.95.28-1.41,1.37.33,1.94-1.74-.91-1.74.91.33-1.94-1.41-1.37Z"/></svg><span>Star Rating</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'default'    => true,
			),
			array(
				'id'         => 'wpas_block_banner_ad',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 16 16"><path fill="#f73859" d="M13.82.02H2.18C.99.02.02.99.02,2.18v11.64c0,1.19.97,2.16,2.16,2.16h11.64c1.19,0,2.16-.97,2.16-2.16V2.18C15.98.99,15.01.02,13.82.02ZM14.58,13.82c0,.42-.34.76-.76.76H2.18c-.41,0-.76-.34-.76-.76V2.18c0-.42.35-.76.76-.76h11.64c.42,0,.76.34.76.76v11.64ZM5.16,4.85l-2.41,6.3h1.28l.35-1.01h2.31l.35,1.01h1.28l-2.41-6.3h-.75ZM4.79,9l.75-2.15.75,2.15h-1.51ZM12.6,5.44c-.43-.39-1.04-.59-1.83-.59h-2.08v6.3h2.08c.55,0,1.01-.09,1.38-.28s.64-.45.83-.79.28-.73.28-1.18v-1.78c0-.72-.22-1.27-.65-1.66ZM12.01,8.93c0,.34-.11.61-.32.79s-.52.28-.9.28h-.92v-4.01h.92c.39,0,.69.09.9.28s.32.45.32.8v1.85Z"/></svg><span>Banner Ad</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'badge_name' => 'Coming Soon..',
				'default'    => true,
			),
			array(
				'id'         => 'wpas_block_notice_box',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 16 16"><path fill="#f73859" d="M6.7,11.04h4.11v1.3h-4.11v-1.3ZM6.7,8.55h6.82v-1.3h-6.82v1.3ZM16,1.97v12.06c0,1.08-.88,1.96-1.97,1.96H1.98C.89,15.99,0,15.11,0,14.03V1.97C0,.88.89,0,1.98,0h12.05c1.09,0,1.97.88,1.97,1.97ZM14.74,1.97c0-.39-.32-.71-.71-.71H1.98c-.39,0-.71.32-.71.71v12.06c0,.38.33.7.71.7h12.05c.39,0,.71-.31.71-.7V1.97ZM6.7,12.34h4.11v-1.3h-4.11v1.3ZM6.7,7.25v1.3h6.82v-1.3h-6.82ZM6.7,7.25v1.3h6.82v-1.3h-6.82ZM6.7,11.04v1.3h4.11v-1.3h-4.11ZM2.87,11.04c-.19.21-.31.46-.31.76,0,.28.1.53.31.74.21.2.46.31.74.31s.55-.11.75-.31c.21-.21.3-.46.3-.74,0-.3-.09-.55-.3-.76-.4-.39-1.07-.39-1.49,0ZM3.18,10.38h.87l.6-5.46c.03-.18.04-.35.04-.46,0-.41-.1-.73-.29-.95-.41-.48-1.14-.48-1.56,0-.19.22-.29.53-.29.89,0,.1.01.27.04.51l.59,5.47Z"/></svg><span>Notice Box</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'badge_name' => 'Coming Soon..',
				'default'    => true,
			),
			array(
				'id'         => 'wpas_block_testimonials',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 16 16"><path fill="#f73859" d="M14.03,0H1.98C.89,0,.01.89.01,1.98v12.05c0,1.08.88,1.96,1.97,1.96h12.05c1.09,0,1.97-.88,1.97-1.96V1.98C16,.89,15.12,0,14.03,0ZM14.74,14.03c0,.39-.32.7-.71.7H1.98c-.39,0-.71-.32-.71-.7V1.98c0-.39.32-.71.71-.71h12.05c.39,0,.71.32.71.71v12.05ZM2.83,11.68h4.39v1.51H2.83v-1.51ZM2.83,8.31h10.35v1.52H2.83v-1.52ZM2.88,6.79s-.05,0-.05-.05c0-.76.57-1.44,1.4-1.69.06-.02.1-.01.16.01.37.17.75.17,1.13,0,.04-.02.07-.02.11,0,.72.25,1.17.71,1.32,1.37.02.1.03.21.04.32,0,.03-.01.04-.05.04-.68,0-1.35,0-2.03,0s-1.35,0-2.02,0ZM3.73,3.96c0-.58.56-1.05,1.23-1.05.68,0,1.22.47,1.22,1.05,0,.58-.55,1.05-1.23,1.05-.67,0-1.22-.48-1.22-1.06Z"/></svg><span>Testimonials</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'badge_name' => 'Coming Soon..',
				'default'    => true,
			),
			array(
				'id'         => 'wpas_block_vip_quote',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 16 16"><path fill="#f73859" d="M12.68,13.86c.17.49.17.97-.08,1.43-.27.52-.83.78-1.39.67-.57-.11-1.01-.57-1.08-1.15-.08-.8.53-1.5,1.35-1.49h.06q.11.01.08-.1c-.06-.35-.24-.63-.53-.84-.01-.01-.03-.03-.04-.04.11.03.21.07.32.11.62.29,1.09.74,1.32,1.4ZM15.98,14.2c-.1-.6-.42-1.07-.9-1.43-.24-.18-.52-.32-.8-.42-.01.04.03.04.04.06.28.22.45.5.5.84.03.1.01.1-.07.08h-.07c-.83-.01-1.47.71-1.33,1.54.08.55.41.91.94,1.07.52.14.98.01,1.35-.41.34-.38.41-.84.34-1.33ZM15.97.88l-2.7,9.77c-.09.29-.34.48-.62.48H3.5c-.28,0-.54-.19-.62-.47L.03.89C-.06.61.06.31.31.16.57,0,.89.05,1.11.26l4.5,4.54,1.82-3.24c.1-.2.32-.32.55-.33h0c.23,0,.44.12.56.33l1.97,3.3L14.89.26c.2-.22.53-.27.79-.11.26.15.38.45.29.74ZM13.48,3.98l-2.71,2.82c-.13.14-.33.21-.52.2-.21-.02-.39-.13-.49-.31l-1.79-3.02-1.63,2.94c-.11.19-.3.31-.51.33-.2,0-.39-.05-.52-.2l-2.74-2.77,1.64,5.61h7.75s1.53-5.6,1.53-5.6Z"/></svg><span>Vip Quote</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'default'    => true,
			),
			array(
				'id'         => 'wpas_block_progress_bar',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 16 16"><path fill="#f73859" d="M14.02,0H2C.9,0,0,.89,0,1.99v12.02c0,1.1.89,1.99,1.99,1.99h12.02c1.09,0,1.98-.89,1.98-1.99V1.99c0-1.1-.89-1.99-1.98-1.99ZM14.69,14.01c0,.38-.3.68-.67.68H2c-.38,0-.68-.3-.68-.68V1.99c0-.38.3-.68.68-.68h12.02c.38,0,.67.3.67.68v12.02ZM12.7,8.77H3.31c-.74,0-1.35.61-1.35,1.36s.61,1.36,1.35,1.36h9.39c.74,0,1.35-.61,1.35-1.36s-.61-1.36-1.35-1.36ZM12.69,10.79h-5.98v-1.32h5.98c.35,0,.65.3.65.66s-.3.66-.65.66ZM12.7,4.51H3.31c-.74,0-1.35.61-1.35,1.36s.61,1.36,1.35,1.36h9.39c.74,0,1.35-.61,1.35-1.36s-.61-1.36-1.35-1.36ZM12.69,6.53h-3.14v-1.32h3.14c.35,0,.65.3.65.66s-.3.66-.65.66Z"/></svg><span>Progress Bar</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'badge_name' => 'Coming Soon..',
				'default'    => true,
			),
			array(
				'id'         => 'wpas_block_progress_circle',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 16 16"><path fill="#f73859" d="M8,16C3.59,16,0,12.41,0,8h2.03c0,3.29,2.68,5.97,5.97,5.97s5.97-2.68,5.97-5.97-2.68-5.97-5.97-5.97V0c4.41,0,8,3.59,8,8s-3.59,8-8,8ZM4.54,6.59v.94h.53v-.42h.48l-.61,2.31h.58l.63-2.47v-.35h-1.61ZM8.24,9.21c.14-.15.22-.36.22-.64v-.24c0-.27-.06-.49-.18-.64-.12-.15-.29-.23-.51-.23-.07,0-.14.01-.2.03-.07.02-.12.05-.17.09v-.5h.98v-.51h-1.52v1.62h.5c.02-.07.06-.12.11-.16.05-.04.12-.06.2-.06.08,0,.15.03.19.09.05.06.07.15.07.26v.24c0,.11-.03.2-.08.26-.05.06-.12.09-.22.09-.09,0-.15-.03-.21-.09-.05-.06-.08-.14-.09-.24h0s-.53,0-.53,0h0c.02.27.1.48.26.63.15.15.34.22.57.22.27,0,.47-.08.62-.23ZM9.93,7.67c.09-.09.13-.21.13-.37v-.24c0-.16-.04-.28-.13-.37-.09-.09-.21-.13-.38-.13s-.29.04-.38.13c-.09.09-.13.21-.13.37v.24c0,.16.04.28.13.37.09.09.21.13.38.13s.29-.04.38-.13ZM9.78,9.41l1.47-2.82h-.48l-1.47,2.82h.48ZM9.47,7.28v-.21c0-.07.03-.11.09-.11s.09.04.09.11v.21c0,.08-.03.11-.09.11s-.09-.04-.09-.11ZM11.33,9.31c.09-.09.13-.21.13-.37v-.24c0-.16-.04-.28-.13-.37-.09-.09-.21-.13-.38-.13s-.29.04-.38.13c-.09.09-.13.21-.13.37v.24c0,.16.04.28.13.37.09.09.21.13.38.13s.29-.04.38-.13ZM10.87,8.92v-.21c0-.07.03-.11.09-.11s.09.04.09.11v.21c0,.07-.03.11-.09.11s-.09-.04-.09-.11Z"/></svg><span>Progress Circle</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'badge_name' => 'Coming Soon..',
				'default'    => true,
			),
			array(
				'id'         => 'wpas_block_leader_board',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 16 16"><path fill="#f73859" d="M15.35,9.6h-4.18c-.13,0-.15-.04-.15-.15v-2.5c0-.36-.23-.59-.59-.59h-4.88c-.36,0-.57.23-.59.59,0,.47,0,.95.02,1.42,0,.13-.04.17-.19.17-1.38-.02-2.76-.02-4.14,0-.47,0-.66.19-.66.66v6.09c0,.34.09.57.42.7h15.19c.3-.13.4-.36.4-.7v-5.05c0-.45-.19-.64-.64-.64ZM4.98,14.76c0,.13-.04.15-.17.15H1.22c-.13,0-.17-.02-.17-.15v-5.01c0-.11.02-.15.17-.15h3.59c.13,0,.17.02.17.15-.02,1.66-.02,3.35,0,5.01ZM9.96,14.76c0,.13-.06.15-.17.15h-3.59c-.15,0-.15-.04-.15-.17v-7.13c-.02-.13.02-.19.17-.19,1.19.02,2.38,0,3.57,0,.13,0,.17.02.17.15-.02,2.4-.02,4.78,0,7.18ZM14.93,14.78c0,.11-.04.13-.15.13h-3.63c-.11,0-.13-.02-.13-.13v-3.97c0-.13.02-.15.13-.15h3.63c.13,0,.15.04.15.15v3.97ZM4.99,1.81c-.04.1-.03.21-.01.31.18,1.09.35,2.2.53,3.29.04.3.19.43.49.43h3.98c.34,0,.49-.13.53-.46.06-.38.12-.77.18-1.15.12-.72.24-1.45.35-2.18.03-.18-.03-.34-.19-.44s-.32-.07-.49.03c-.32.22-.63.44-.96.66-.07.06-.12.06-.19-.01-.3-.29-.59-.59-.87-.88-.22-.22-.46-.21-.66,0l-.89.88c-.06.06-.1.07-.18.01-.32-.22-.66-.46-1-.68-.24-.15-.53-.06-.62.19ZM5.95,2.86c.16.1.32.22.49.32.28.19.44.18.68-.06.27-.27.55-.53.81-.81.06-.06.09-.06.16,0,.27.28.55.56.83.84.19.19.38.22.62.06.16-.12.34-.24.53-.37-.07.46-.13.88-.21,1.33-.04.25-.09.49-.12.74-.01.07-.03.1-.1.1-1.09-.01-2.18-.01-3.28-.01-.04,0-.09.01-.09-.06-.12-.69-.22-1.37-.32-2.06h0ZM7.59.4c.01-.22.21-.4.43-.4s.4.19.4.41c0,.24-.19.41-.41.41-.24,0-.41-.19-.41-.43ZM4.68.83c0-.24.19-.41.41-.41.24,0,.41.19.41.41,0,.24-.19.43-.43.41-.22,0-.4-.19-.4-.41ZM10.49.83c0-.24.19-.41.43-.41.22,0,.4.19.4.43,0,.22-.19.4-.41.4s-.41-.19-.41-.41ZM8.38,12.41h.79v.6h-2.36v-.6h.89v-2.4l-.84.3v-.65l.84-.31h.68v3.06Z"/></svg><span>Leader Board</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'badge_name' => 'Coming Soon..',
				'default'    => true,
			),
			array(
				'id'         => 'wpas_block_star_tag',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 16 16"><path fill="#f73859" d="M15.99,14.84c0,.17-.05.34-.14.49-.25.41-.78.67-1.36.67H1.51C.69,16,.01,15.48.01,14.84v-2.16c.25.35.74.58,1.29.57h.38v1.46h12.46l-1.4-1.32h2.16l.74.7c.24.23.35.48.35.75ZM0,11.63V1.16s0-.09.02-.14C.12.44.76,0,1.51,0h0s12.96.01,12.96.01c.58,0,1.12.26,1.35.67.22.38.19.78-.08,1.11-.03.05-.07.08-.12.12l-1.44,1.31-1.42,1.28-2,1.82.16.15.5.47,1.07.99,3.16,2.97c.23.21.34.46.34.73,0,.17-.05.33-.14.49-.02.03-.05.06-.08.09-.24.35-.73.58-1.27.58H1.51C.69,12.79,0,12.27,0,11.63ZM1.68,11.51h12.47l-2.75-2.57-1.07-1.02-.95-.87c-.27-.26-.38-.56-.33-.85h0c.03-.23.14-.44.35-.62l1.18-1.08,1.4-1.28,1.61-1.46H1.68v9.75ZM6.22,5.82l-.76-1.54-.75,1.54-1.68.25,1.22,1.18-.28,1.68,1.49-.79,1.51.79-.28-1.68,1.22-1.18-1.69-.25Z"/></svg><span>Star Tag</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'badge_name' => 'Coming Soon..',
				'default'    => true,
			),
			array(
				'id'         => 'wpas_block_info_capsule',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 16 16"><path fill="#f73859" d="M4.4,13.25h3.8v1.11h-3.8v-1.11ZM4.4,11.91h7.61v-1.12h-7.61v1.12ZM.53,10.58c-.62-1.13-.65-2.21-.07-3.31.16-.28.35-.52.57-.73,1.92-1.86,3.79-3.74,5.7-5.57,1.25-1.23,3.26-1.3,4.57-.16,1.34,1.12,1.56,3.09.52,4.47-.33.42-.73.76-1.11,1.14-.59.59-1.21,1.15-1.79,1.77-.14.14-.31.2-.5.2-1.44,0-2.85,0-4.27,0-1.6,0-2.76.66-3.51,2.04-.02.05-.06.09-.1.16ZM4.89,3.9c1.21,1.17,2.41,2.33,3.6,3.54.17.15.26.12.39-.03.74-.73,1.46-1.44,2.19-2.14h0c.8-.82,1.05-2.01.56-3.01-.47-1.09-1.37-1.62-2.49-1.69-.84.03-1.49.29-2.03.82-.75.72-1.47,1.45-2.2,2.14-.13.13-.16.21,0,.37ZM.56,8.78s0,.05,0,.08c0,.11,0,.38.34.41.12,0,.2-.03.27-.1.1-.11.1-.23.1-.34v-.08c.04-.68.31-1.28.8-1.73l.95-.93.06-.07h0c.08-.07.28-.28.04-.52-.07-.07-.14-.11-.24-.11-.13,0-.24.11-.34.18l-.29.29c-.29.26-.58.55-.84.83-.5.55-.79,1.2-.85,2.06ZM15.96,12.34c0,2.02-1.64,3.66-3.66,3.66H4.11c-2.02,0-3.66-1.64-3.66-3.66s1.64-3.66,3.66-3.66h8.19c2.02,0,3.66,1.64,3.66,3.66ZM15.24,12.34c0-1.62-1.32-2.94-2.94-2.94H4.11c-1.62,0-2.94,1.32-2.94,2.94s1.32,2.94,2.94,2.94h8.19c1.62,0,2.94-1.32,2.94-2.94Z"/></svg><span>Info Capsule</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'badge_name' => 'Coming Soon..',
				'default'    => true,
			),
			array(
				'id'         => 'wpas_block_quick_summary',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 16 16"><path fill="#f73859" d="M4.56,6.65l-1.55-1.54.84-.84.71.71,1.99-2,.84.84-2.83,2.83ZM3.01,9.77h9.98v-1.46H3.01v1.46ZM3.01,13.01h4.99v-1.46H3.01v1.46ZM15.99,1.98v12.03c0,1.1-.89,1.99-1.98,1.99H1.99C.9,16,0,15.11,0,14.01V1.98C0,.89.9,0,1.99,0h12.02c1.09,0,1.98.89,1.98,1.99ZM14.68,1.98c0-.38-.29-.68-.67-.68H1.99c-.38,0-.68.3-.68.68v12.03c0,.38.3.68.68.68h12.02c.37,0,.67-.3.67-.68V1.98Z"/></svg><span>Quick Summary</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'badge_name' => 'Coming Soon..',
				'default'    => true,
			),
		),
	)
);

/**
 * Section: Backup.
 */
WPAS::createSection(
	$wpas_global_prefix,
	array(
		'title'  => 'Backup',
		'icon'   => 'fa fa-rotate-left',
		'fields' => array(

			array(
				'type'     => 'callback',
				'function' => 'wpas_backup_callback',
			),
		),
	),
);

function wpas_backup_callback() {
	?>
	<style>
	.frhd-dashboard-nav nav a[href^="<?php echo admin_url(); ?>admin.php?page=fancypost_backup"] {
		background-color: #fff;
		border-color: #dfdbdb;
		box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
	}
	/* Form */
	.frhd-ie-wrapper h2 {
		font-size: 24px !important;
		font-weight: bold !important;
	}
	.frhd-ie-wrapper input[type="file"] {
		padding: 3px 0;
		cursor: pointer;
		border: 1px solid rgb(227 227 227);
		border-radius: 3px;
		color: rgb(100 116 139);
		margin-right: 7px;
	}
	span.frhd-nav-badge {
		color: #f18500;
		vertical-align: super;
		font-size: 9px;
		font-weight: 700;
		padding-left: 2px;
		margin-top: -10px;
	}
	.frhd-ie-form-wrapper {
		display: flex;
		gap: 20px;
		flex-wrap: wrap;
	}
	.frhd-import,
	.frhd-export{
		box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 0px 1px;
		padding: 20px;
	}
	.frhd-ie-form-wrapper h4 {
		margin-bottom: 10px;
	}
	</style>
	<?php
	echo '<div class="frhd-ie-wrapper wrap">';
	echo '<h2>Editorial Rating Import - Export</h2>';
	echo '<p style="max-width: 500px;">Easily import and export all your reviews with just a few clicks. Transfer reviews effortlessly to simplify your workflow. Ensure smooth integration and management of your content.</p>';
	echo '<div class="frhd-ie-form-wrapper">';
	
	// Import Form.
	echo '<div class="frhd-import">';
	echo '<form method="post" enctype="multipart/form-data">';
	echo '<h4>Import All Reviews:</h4>';
	echo '<input type="file" name="custom_import_file" />';
	echo '<input type="submit" class="button button-primary" name="custom_import_submit" value="Import" />';
	echo '</form>';

	// Handle Import Process.
	if ( isset( $_POST['custom_import_submit'] ) && ! empty( $_FILES['custom_import_file']['tmp_name'] ) ) {
		$file = $_FILES['custom_import_file']['tmp_name'];
		$import_data = file_get_contents( $file );

		// Process the import data
		echo '<div class="frhd-ie-notifications">';
		if ( ! empty( $import_data ) ) {
			$imported_posts = json_decode( $import_data, true );

			if ( $imported_posts ) {

				foreach ( $imported_posts as $imported_post ) {
					$post_args = array(
						'post_title'   => $imported_post['title'],
						'post_content' => $imported_post['content'],
						'post_type'    => 'wpas_review',
						'post_status'  => 'publish',
					);

					// Check if post already exists by title
					$existing_post_query = new WP_Query( array(
						'post_type'      => 'wpas_review',
						'post_title'     => $imported_post['title'],
						'posts_per_page' => 1,
					) );

					if ( $existing_post_query->have_posts() ) {
						$existing_post = $existing_post_query->post;
						// Update existing post
						$post_args['ID'] = $existing_post->ID;
						wp_update_post( $post_args );
					} else {
						// Create new post
						wp_insert_post( $post_args );
					}
				}
				echo '<p style="color: green;margin-top: 10px;">Import successful!</p>';
			} else {
				echo 'Error: Failed to decode import data.';
			}
		} else {
			echo 'Error: No data found in the import file.';
		}
		echo '</div>';
	}
	echo '</div>';

	// Create Export Functionality.
	echo '<div class="frhd-export" style="align-self: baseline;">
	<h4>Export All Reviews:</h4>';
	echo '<a class="button button-primary" href="' . admin_url( 'admin-ajax.php?action=shortcode_export' ) . '">Export</a>';
	echo '</div>
		</div>
	</div>';
}

/**
 * Section: License.
 */
WPAS::createSection(
	$wpas_global_prefix,
	array(
		'title'  => 'License',
		'icon'   => 'fas fa-fingerprint',
		'fields' => array(
			array(
				'type'    => 'content',
				'content' => '<div class="el-license-container">
					<h3 class="el-license-title"><i class="dashicons-before dashicons-star-filled"></i> Editorial Rating PRO Licensing</h3>
					<hr>
					<p>In the world of WordPress plugins, licensing can sometimes be a complicated matter, especially when dealing with free versions. At Pluginic, we\'ve chosen a different approach to streamline the user experience and ensure that our free version remains accessible and easy to use. Here\'s why we don\'t require a license key for the free version of our plugin:</p>
					<ol>
						<li>Ease of Use</li>
						<li>Focus on Accessibility</li>
						<li>Streamlined Installation and Activation</li>
						<li>Encouraging Exploration and Feedback</li>
						<li>Building Trust and Transparency</li>
						<li>Encouraging Upgrades to Pro Versions</li>
					</ol>
					<div style="pointer-events: none;opacity: .5;">
						<div class="el-license-field">
							<label for="el_license_key">License code</label>
							<input type="text" class="regular-text code" name="el_license_key" size="50" placeholder="xxxxxxxx-xxxxxxxx-xxxxxxxx-xxxxxxxx" required="required">
						</div>
						<br>
						<div class="el-license-field">
							<label for="el_license_key">Email Address</label>
							<input type="text" class="regular-text code" name="el_license_email" size="50" value="' . get_bloginfo( 'admin_email' ) . '" placeholder="" required="required">
							<div><small style="color: #4CAF50;">We will send update news of this product by this email address, don\'t worry, we hate spam</small></div>
						</div>
						<div class="el-license-active-btn">
							<input type="hidden" id="_wpnonce" name="_wpnonce" value="8735062a14"><input type="hidden" name="_wp_http_referer" value="/wp-admin/edit.php?post_type=wpas_review&amp;page=wpas_license"><p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Activate"></p>
						</div>
					</div>
				</div>',
			),
		)
	),
);

/**
 * Section: Version Control.
 */
WPAS::createSection(
	$wpas_global_prefix,
	array(
		'title'  => 'Version Control',
		'icon'   => 'fas fa-project-diagram',
		'fields' => array(
			array(
				'id'     => 'opt-fieldset-1',
				'type'   => 'fieldset',
				'title'  => 'Rollback to Previous Version',
				'fields' => array(
					array(
						'id'          => 'wpas-version-rollback',
						'type'        => 'select',
						'placeholder' => 'Select a version',
						'options'     => array(
						'2-0-0'  => '2.0.0',
						'1-4-0'  => '1.4.0',
						'1-3-0'  => '1.3.0',
						'1-1-0'  => '1.1.0',
						'1-0-0'  => '1.0.0',
						),
					),
					array(
						'type'    => 'content',
						'content' => '<a href="#" class="button">Rollback</a>',
						'class'   => 'wpas-content-separator',
					),
				),
				'class' => 'wpas-fieldset-inline',
			),
			array(
				'id'       => 'wpas-beta-active',
				'type'     => 'switcher',
				'title'    => 'Enable Beta',
				'desc'     => 'Enable this option to turn on beta updates and be notified when a new beta version of Spectra is available. The beta version will not install automatically, you will have to install it when you get a notification. It is recommended to try beta on a test environment only.',
				'default'  => false
			),
			array(
				'id'       => 'wpas-legacy-active',
				'type'     => 'switcher',
				'title'    => 'Enable Legacy Blocks',
				'desc'     => 'Enable this option to enable the support of our Legacy Blocks on the site.',
				'default'  => false
			),
		),
	),
);

/**
 * Section: Recommended.
 */
WPAS::createSection(
	$wpas_global_prefix,
	array(
		'title'  => 'Recommended',
		'icon'   => 'fas fa-tint',
	),
);

/**
 * Section: Help.
 */
WPAS::createSection(
	$wpas_global_prefix,
	array(
		'title'  => 'Help',
		'icon'   => 'fas fa-life-ring',
	),
);

/**
 * Section: Unlock All Features.
 */
if ( 'PRESTIGE' !== WPASER_COPY ) {

	WPAS::createSection(
		$wpas_global_prefix,
		array(
			'title'  => 'Unlock All Features',
			'icon'   => 'fas fa-unlock-alt',
			'fields' => array(

				array(
					'type'    => 'content',
					'content' => '<style>
					.frhdgs-hero-upgrade {
						position: relative;
						background: rgb(245 255 246 / 50%);
						padding: 30px;
					}
					.frhdgs-hero-upgrade h2 {
						font-size: 36px;
						font-weight: 100;
						margin: 0;
						padding-bottom: 40px;
						color: #002000;
						text-shadow: 1px 1px 10px #d3ffa0;
					}
					.frhdgs-hero-upgrade h2 span {
						padding-right: 44px;
					}
					.frhdgs-hero-upgrade h2 span:before {
						color: #FF007A;
						font-size: 58px;
						line-height: 20px;
					}
					.frhdgs-upgrade-feature-list {
						display: flex;
						gap: 30px;
					}
					.frhdgs-upgrade-feature-list ul {
						flex-basis: 100%;
						padding-left: 10px;
					}
					.frhdgs-hero-upgrade li {
						color: #000;
						background: rgb(231 231 231 / 50%);
						padding: 6px 28px 10px;
						font-size: 19px;
						line-height: 26px;
						position: relative;
						margin-bottom: 13px;
						text-shadow: 0 1px 0 rgb(1 108 82 / 50%);
					}
					.frhdgs-hero-upgrade li:before {
						position: absolute;
						left: -7px;
						top: 8px;
						background-color: #006400;
						color: #fff;
						width: 24px;
						height: 24px;
						font-size: 26px;
						font-weight: bold;
						border-radius: 50%;
						display: flex;
						text-align: center;
						justify-content: center;
						align-items: center;
						content: "\f147";
						font-family: "dashicons";
					}
					a.frhdgs-hero-btn-pro {
						display: inline-block;
						margin-top: 5px;
						text-decoration: none;
						background: #e91e63;
						padding: 16px 24px 18px;
						border-radius: 4px;
						color: #fff;
						font-size: 19px;
						font-weight: bold;
						box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
						text-shadow: 1px 1px 8px rgb(0 0 0 / 50%);
						border: 1px solid transparent;
						transition: .3s;
					}
					/* Testimonials */
					.frhdgs-testimonial {
						padding: 30px;
					}
					.frhdgs-testimonial-columns {
						display: flex;
						flex-wrap: wrap;
						gap: 20px;
					}
					.frhdgs-testimonial-column {
						position: relative;
						flex-basis: calc(50% - 62px);
						border: 1px solid rgb(103 58 183 / 15%);
						background: rgb(103 58 183 / 5%);
						padding: 25px;
						padding-top: 50px;
					}
					.frhdgs-testimonial-stars:before {
						position: absolute;
						left: 22px;
						top: 22px;
						width: 91px;
						height: 17px;
						content: "";
						background-image: url("data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'18\' height=\'16\' viewBox=\'0 0 18 16\' fill=\'none\'%3E%3Cscript xmlns=\'\'/%3E%3Cpath d=\'M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z\' fill=\'%23FBB040\'/%3E%3C/svg%3E");
					}
					.frhdgs-testimonial-client {
						display: flex;
						justify-content: left;
						align-items: center;
						gap: 15px;
					}
					.frhdgs-testimonial-client img {
						border-radius: 10px;
						border: 1px solid rgb(158 158 158 / 50%);
						box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
					}
					.frhdgs-testimonial-client-ghost h4 {
						font-size: 17px;
						font-weight: bold;
						line-height: 20px;
						margin: 0;
					}
					.frhdgs-testimonial-client-ghost p {
						margin-top: 4px;
					}
					.fpblock-field p:last-child {
						margin-bottom: 0;
					}
					</style><div class="frhdgs-option-body">
						<div class="frhdgs-container-wrap">
							<div class="frhdgs-hero-upgrade">
								<h2><span class="dashicons dashicons-superhero-alt"></span>Pro Feature List :</h2>
								<div class="frhdgs-upgrade-feature-list">
									<ul>
										<li>Fully responsive, SEO-friendly & optimized.</li>
										<li>Advanced Shortcode Generator.</li>
										<li>Advanced Shortcode Generator.</li>
										<li>Slide Anything (e.g. Image, Post, Product, Content, Video, Text, HTML, Shortcodes, etc.)</li>
										<li>Display posts from multiple Categories, Tags, Formats, or Types. (e.g. Latest, Taxonomies, Specific, etc.).</li>
										<li>Multiple Functions on the same page.</li>
										<li>Multiple Functions on the same page.</li>
										<li>100+ Visual Customization options.</li>
										<li>Drag & Drop Function builder (image, content, video, etc.).</li>
										<li>Drag & Drop Function builder (image, content, video, etc.).</li>
										<li>Image Function with internal and external links.</li>
										<li>Image Function with caption and description.</li>
									</ul>
									<ul>
										<li>Image Content Position (Bottom, Top, Right, and Overlay).</li>
										<li>Show/hide image caption and description.</li>
										<li>Post Function with Title, image, excerpt, read more, category, date, author, tags, comments, etc.).</li>
										<li>Post excerpt, full content, and content with the limit.</li>
										<li>WooCommerce Product Function.</li>
										<li>Show/hide the standard product contents (product name, image, price, excerpt, read more, rating, add to cart, etc.).</li>
										<li>Supported YouTube, Vimeo, Dailymotion, mp4, WebM, and even self-hosted video.</li>
										<li>Add Custom Video Thumbnails (for self-hosted) and video icon.</li>
										<li>Function Mode (standard, center, ticker).</li>
										<li>8+ Different navigation positions.</li>
										<li>Typography & Styling options (840+ Google fonts).</li>
									</ul>
								</div>
								<a class="frhdgs-hero-btn-pro" href="https://pluginic.com/plugins/gutenberg-post-blocks/?ref=100" target="_blank">Upgrade to Pro <span>→</span></a>
							</div>
							<div class="frhdgs-spacer" style="height: 20px;"></div>
							<div class="frhdgs-testimonial">
								<div class="frhdgs-testimonial-columns">
									<div class="frhdgs-testimonial-column">
										<span class="frhdgs-testimonial-stars"></span>
										<p style="font-size:18px;line-height:1.3;margin-bottom:15px;margin-top: 0;">“I have tried many plugins and this is the best. It is easy to use, has so many themes, and is free!</p>
										<div class="frhdgs-testimonial-client">
											<img width="50" height="50" src="' . esc_url( WPASER_DIR_URL_FILE . 'admin/img/client-1.jpg' ) . '" alt="" class="wp-image-3273">
											<div class="frhdgs-testimonial-client-ghost">
												<h4>Roman Rybakov</h4>
												<p>Frontend Engineer</p>
											</div>
										</div>
									</div>
									<div class="frhdgs-testimonial-column">
										<span class="frhdgs-testimonial-stars"></span>
										<p style="font-size:18px;line-height:1.3;margin-bottom:15px;margin-top: 0;">“I have tried many plugins and this is the best. It is easy to use, has so many themes, and is free!</p>
										<div class="frhdgs-testimonial-client">
											<img width="50" height="50" src="' . esc_url( WPASER_DIR_URL_FILE . 'admin/img/client-2.jpg' ) . '" alt="" class="wp-image-3273">
											<div class="frhdgs-testimonial-client-ghost">
												<h4>Roman Rybakov</h4>
												<p>Frontend Engineer</p>
											</div>
										</div>
									</div>
									<div class="frhdgs-testimonial-column">
										<span class="frhdgs-testimonial-stars"></span>
										<p style="font-size:18px;line-height:1.3;margin-bottom:15px;margin-top: 0;">“I have tried many plugins and this is the best. It is easy to use, has so many themes, and is free!</p>
										<div class="frhdgs-testimonial-client">
											<img width="50" height="50" src="' . esc_url( WPASER_DIR_URL_FILE . 'admin/img/client-3.jpg' ) . '" alt="" class="wp-image-3273">
											<div class="frhdgs-testimonial-client-ghost">
												<h4>Roman Rybakov</h4>
												<p>Frontend Engineer</p>
											</div>
										</div>
									</div>
									<div class="frhdgs-testimonial-column">
										<span class="frhdgs-testimonial-stars"></span>
										<p style="font-size:18px;line-height:1.3;margin-bottom:15px;margin-top: 0;">“I have tried many plugins and this is the best. It is easy to use, has so many themes, and is free!</p>
										<div class="frhdgs-testimonial-client">
											<img width="50" height="50" src="' . esc_url( WPASER_DIR_URL_FILE . 'admin/img/client-4.jpg' ) . '" alt="" class="wp-image-3273">
											<div class="frhdgs-testimonial-client-ghost">
												<h4>Roman Rybakov</h4>
												<p>Frontend Engineer</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>',
				),
			),
		),
	);
}
