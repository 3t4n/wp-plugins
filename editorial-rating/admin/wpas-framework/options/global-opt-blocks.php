<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Set a unique slug-like ID
//
$wpas_global_prefix = '_wpas_global_opt_blocks';

//
// Create options
//
WPAS::createOptions(
	$wpas_global_prefix,
	array(
		'menu_title'         => __( 'Blocks', 'wpas_editorial_rating' ),
		'menu_slug'          => 'wpas-global-opt-blocks',
		'menu_type'          => 'submenu',
		'menu_parent'        => 'edit.php?post_type=wpas_review',
		'sticky_header'      => false,
		'show_bar_menu'      => false,
		'show_search'        => false,
		'show_network_menu'  => false,
		'show_reset_section' => false,
		'show_reset_all'     => true,
		'theme'              => 'light',
		'footer_credit'      => __( 'Giving a <a href="https://wordpress.org/support/plugin/editorial-rating/reviews/?filter=5" target="_blank" style="color: #ffb900;text-decoration: overline;">&#9733;&#9733;&#9733;&#9733;&#9733;</a> rating to this plugin - your support helps us to continue improving.', 'wpas_editorial_rating' ),
		'class'              => 'wpas_license',
	)
);

/**
 * Section: Overview.
 */
WPAS::createSection(
	$wpas_global_prefix,
	array(
		'title'  => 'Overview',
		'fields' => array(

			//
			// Custom CSS for this page.
			//
			array(
				'type'    => 'content',
				'content' => '<style>
				.wpas-options .wpas-footer {
					background-color: #f0f0f1;
					padding: 25px 5px 0;
				}
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
					display: inline-block;
					max-width: 25%;
					box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
					border-radius: 5px;
					margin: 0 0px 30px 30px;
					padding: 30px 30px 20px;
				}
				.wpas--sb_title {
					display: flex;
					align-items: center;
					gap: 10px;
					margin-bottom: 20px;
				}
				.wpas--sb_title span {
					font-size: 15px;
					font-weight: 500;
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
				.wpas--sources ul li a {
					text-decoration: none;
					color: #222;
				}
				
				.wpas--sb_inner {
					border-bottom: 1px solid #e7e7e7;
					margin-bottom: 10px;
					padding-bottom: 20px;
				}

				/* Badges */
				.wpas--sb_wrap.wpas--tn-pro,
				.wpas--sb_wrap.wpas--tn-new {
					position: relative;
				}
				.wpas--sb_wrap.wpas--tn-pro:after,
				.wpas--sb_wrap.wpas--tn-new:after {
					position: absolute;
					right: 0;
					top: 0;
					background: #E91E63;
					content: "PRO";
					border-radius: 3px;
					display: inline-block;
					padding: 3px 7px;
					color: #fff;
				}
				.wpas--sb_wrap.wpas--tn-new:after {
					background: #673AB7;
					content: "New";
				}

				/* Responsive */
				@media (max-width: 1140px) {
					.wpas-field.wpas-field-switcher_box {max-width: 40% !important;}
				}
				@media (max-width: 599px) {
					.wpas-field.wpas-field-switcher_box {max-width: 100% !important;}
					.frhd-admin-toolbar {
						flex-wrap: wrap;
						width: auto;
						gap: 10px;
					}
				}
				</style>',
				'class'   => 'wpas-content-style-tag',
			),

			//
			// Fields.
			//
			array(
				'id'         => 'wpas_block_cross_rating',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 512 512" fill="#5e30cc" style="margin-bottom: -10px;padding-right: 8px;"><path d="M96 96c0-35.3 28.7-64 64-64H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H80c-44.2 0-80-35.8-80-80V128c0-17.7 14.3-32 32-32s32 14.3 32 32V400c0 8.8 7.2 16 16 16s16-7.2 16-16V96zm64 24v80c0 13.3 10.7 24 24 24H296c13.3 0 24-10.7 24-24V120c0-13.3-10.7-24-24-24H184c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z"/></svg><span>Cross Rating Template</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'badge_name' => 'pro',
				'default'    => true,
			),
			array(
				'id'         => 'wpas_block_info_box',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 512 512" fill="#5e30cc" style="margin-bottom: -10px;padding-right: 8px;"><path d="M96 96c0-35.3 28.7-64 64-64H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H80c-44.2 0-80-35.8-80-80V128c0-17.7 14.3-32 32-32s32 14.3 32 32V400c0 8.8 7.2 16 16 16s16-7.2 16-16V96zm64 24v80c0 13.3 10.7 24 24 24H296c13.3 0 24-10.7 24-24V120c0-13.3-10.7-24-24-24H184c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z"/></svg><span>Review Info Box</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'badge_name' => 'new',
				'default'    => true,
			),
			array(
				'id'         => 'wpas_block_pros_cons',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 512 512" fill="#5e30cc" style="margin-bottom: -10px;padding-right: 8px;"><path d="M96 96c0-35.3 28.7-64 64-64H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H80c-44.2 0-80-35.8-80-80V128c0-17.7 14.3-32 32-32s32 14.3 32 32V400c0 8.8 7.2 16 16 16s16-7.2 16-16V96zm64 24v80c0 13.3 10.7 24 24 24H296c13.3 0 24-10.7 24-24V120c0-13.3-10.7-24-24-24H184c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z"/></svg><span>Pros Cons</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'default'    => true,
			),
			array(
				'id'         => 'wpas_block_freemium_table',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 512 512" fill="#5e30cc" style="margin-bottom: -10px;padding-right: 8px;"><path d="M96 96c0-35.3 28.7-64 64-64H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H80c-44.2 0-80-35.8-80-80V128c0-17.7 14.3-32 32-32s32 14.3 32 32V400c0 8.8 7.2 16 16 16s16-7.2 16-16V96zm64 24v80c0 13.3 10.7 24 24 24H296c13.3 0 24-10.7 24-24V120c0-13.3-10.7-24-24-24H184c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z"/></svg><span>Freemium Table</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'default'    => true,
			),
			array(
				'id'         => 'wpas_block_pricing_table',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 512 512" fill="#5e30cc" style="margin-bottom: -10px;padding-right: 8px;"><path d="M96 96c0-35.3 28.7-64 64-64H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H80c-44.2 0-80-35.8-80-80V128c0-17.7 14.3-32 32-32s32 14.3 32 32V400c0 8.8 7.2 16 16 16s16-7.2 16-16V96zm64 24v80c0 13.3 10.7 24 24 24H296c13.3 0 24-10.7 24-24V120c0-13.3-10.7-24-24-24H184c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z"/></svg><span>Pricing Table</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'default'    => true,
			),
			array(
				'id'         => 'wpas_block_star_rating',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 512 512" fill="#5e30cc" style="margin-bottom: -10px;padding-right: 8px;"><path d="M96 96c0-35.3 28.7-64 64-64H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H80c-44.2 0-80-35.8-80-80V128c0-17.7 14.3-32 32-32s32 14.3 32 32V400c0 8.8 7.2 16 16 16s16-7.2 16-16V96zm64 24v80c0 13.3 10.7 24 24 24H296c13.3 0 24-10.7 24-24V120c0-13.3-10.7-24-24-24H184c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z"/></svg><span>Star Rating</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'default'    => true,
			),

		),
	)
);
