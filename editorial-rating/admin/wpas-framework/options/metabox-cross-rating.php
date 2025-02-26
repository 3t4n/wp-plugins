<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Metabox of the POST
// Set a unique slug-like ID
//
$wpas_prefix_cross_opts = '_wpas_cross_rating_opt';

//
// Create a metabox
//
WPAS::createMetabox(
	$wpas_prefix_cross_opts,
	array(
		'title'        => __( 'Editorial Cross Rating Options', 'wpas_editorial_rating' ),
		'post_type'    => 'wpas_cross_rating',
		'show_restore' => false,
		'class'        => 'wpgper--metabox-wrap',
	)
);

$wpas_shortcode_field = isset( $_GET['post'] ) ? '<input id="wpasCTCinput" type="text" value=\'[cross-rating id="' . $_GET['post'] . '"]\' readonly>' : 'Shortcode will appear here after publishing.';

//
// Section : Appearance.
//
WPAS::createSection(
	$wpas_prefix_cross_opts,
	array(
		'fields' => array(

			/**
			 * Styling this page.
			 */
			array(
				'type'    => 'content',
				'content' => '<style>
				#_wpas_cross_rating_opt h2.hndle.ui-sortable-handle {pointer-events: none;}
				#_wpas_cross_rating_opt .handle-actions,
				#_wpas_cross_rating_opt .wpas-cross-rating-css,
				div#_wpas_cross_rating_opt .postbox-header {
					display: none !important;
				}
				input#wpasCTCinput {
					font-size: 19px;
					user-select: all;
				}
				.wpas-shortcode-input-wrap {
					display: flex;
					align-items: center;
					gap: 20px;
					justify-content: center;
					border-bottom: 2px dashed rgb(34 34 34 / 50%);
					padding-bottom: 30px;
				}
				.wpas-shortcode-input-wrap #clipboard {
					width: 20px;
					height: 20px;
				}
				.wpas-shortcode-btn {
					display: flex;
					justify-content: center;
					align-items: center;
					gap: 5px;
					font-size: 12px;
					font-weight: bold;
					padding: 6px 14px;
				}
				.wpas-shortcode-btn:hover {
					cursor: pointer;
					background: #fff;
					border-radius: 3px;
				}
				.wpas-field.wpas-cr-theme-set {
					padding-bottom: 0 !important;
				}
				</style>',
				'class' => 'wpas-cross-rating-css',
			),

			/**
			 * Fields.
			 */
			array(
				'id'         => 'wpas-cr-theme-set',
				'type'       => 'button_set',
				'title'      => 'Theme Set',
				'subtitle'   => 'Set a theme for Cross Rating<br><a href="https://demo.pluginic.com/editorial-rating/?ref=100#frhd_cr_demo" target="blank">See Demos →</a>',
				'options'    => array(
				  'set-1'  => '1',
				  'set-2'  => '2',
				  'set-3'  => '3',
				  'set-4'  => '4',
				  'set-5'  => '5',
				  'set-6'  => '6',
				  'set-7'  => '7',
				),
				'default'    => 'set-1',
				'class'      => 'wpas-cr-theme-set',
			),
			array(
				'type'       => 'content',
				'content'    => '<img src="' . WPASER_DIR_URL_FILE . 'admin/img/cr-template/cr-1.png">',
				'class'      => 'wpas-theme-prev-list',
				'dependency' => array( 'wpas-cr-theme-set', '==', 'set-1' ),
			),
			array(
				'type'       => 'content',
				'content'    => '<img src="' . WPASER_DIR_URL_FILE . 'admin/img/cr-template/cr-2.png">',
				'class'      => 'wpas-theme-prev-list',
				'dependency' => array( 'wpas-cr-theme-set', '==', 'set-2' ),
			),
			array(
				'type'       => 'content',
				'content'    => '<img src="' . WPASER_DIR_URL_FILE . 'admin/img/cr-template/cr-3.png">',
				'class'      => 'wpas-theme-prev-list',
				'dependency' => array( 'wpas-cr-theme-set', '==', 'set-3' ),
			),
			array(
				'type'       => 'content',
				'content'    => '<img src="' . WPASER_DIR_URL_FILE . 'admin/img/cr-template/cr-4.png">',
				'class'      => 'wpas-theme-prev-list',
				'dependency' => array( 'wpas-cr-theme-set', '==', 'set-4' ),
			),
			array(
				'type'       => 'content',
				'content'    => '<img src="' . WPASER_DIR_URL_FILE . 'admin/img/cr-template/cr-5.png">',
				'class'      => 'wpas-theme-prev-list',
				'dependency' => array( 'wpas-cr-theme-set', '==', 'set-5' ),
			),
			array(
				'type'       => 'content',
				'content'    => '<img src="' . WPASER_DIR_URL_FILE . 'admin/img/cr-template/cr-6.png">',
				'class'      => 'wpas-theme-prev-list',
				'dependency' => array( 'wpas-cr-theme-set', '==', 'set-6' ),
			),
			array(
				'type'       => 'content',
				'content'    => '<img src="' . WPASER_DIR_URL_FILE . 'admin/img/cr-template/cr-7.png">',
				'class'      => 'wpas-theme-prev-list',
				'dependency' => array( 'wpas-cr-theme-set', '==', 'set-7' ),
			),
			array(
				'id'       => 'wpas_cr_total_number_of_item',
				'type'     => 'spinner',
				'title'    => 'Show Total Rating',
				'subtitle' => 'Select the number of total rating items.',
				'default'  => 10,
			),		
			array(
				'id'          => 'wpas_cros_rating_cat',
				'type'        => 'select',
				'title'       => 'Select Rating Category',
				'subtitle'    => 'Select your editorial rating category.',
				'placeholder' => 'Select a category',
				'options'     => 'categories',
				'query_args'  => array(
				  'taxonomy'  => 'er_cat',
				),
				'empty_message' => 'No category found.<br><a href="' . get_site_url() . '/wp-admin/edit-tags.php?taxonomy=er_cat&post_type=wpas_review" target="_blank">+ Add new category.</a>',
			),
			array(
				'id'         => 'wpas_cr_section_title_show',
				'type'       => 'switcher',
				'title'      => __( 'Show/Hide Section Title', 'wpas_editorial_rating' ),
				'subtitle'   => __( 'SHow or hide section title.', 'wpas_editorial_rating' ),
				'text_on'    => 'Show',
				'text_off'   => 'Hide',
				'text_width' => 80,
				'default'    => true,
			),
			array(
				'id'         => 'wpas_product_img_show',
				'type'       => 'switcher',
				'title'      => __( 'Show/Hide Product Image', 'wpas_editorial_rating' ),
				'subtitle'   => __( 'SHow or hide product image.', 'wpas_editorial_rating' ),
				'text_on'    => 'Show',
				'text_off'   => 'Hide',
				'text_width' => 80,
				'default'    => true,
			),
			array(
				'id'         => 'wpas_cr_category_list_show',
				'type'       => 'switcher',
				'title'      => __( 'Show/Hide Category List', 'wpas_editorial_rating' ),
				'subtitle'   => __( 'SHow or hide category list.', 'wpas_editorial_rating' ),
				'text_on'    => 'Show',
				'text_off'   => 'Hide',
				'text_width' => 80,
				'default'    => false,
			),
			array(
				'id'         => 'wpas_cr_user_rating_star_show',
				'type'       => 'switcher',
				'title'      => __( 'Show/Hide User Rating Stars', 'wpas_editorial_rating' ),
				'subtitle'   => __( 'SHow or hide user rating stars.', 'wpas_editorial_rating' ),
				'text_on'    => 'Show',
				'text_off'   => 'Hide',
				'text_width' => 80,
				'default'    => true,
			),
			array(
				'id'         => 'wpas_cr_pros_cons_show',
				'type'       => 'switcher',
				'title'      => __( 'Show/Hide PROS CONS', 'wpas_editorial_rating' ),
				'subtitle'   => __( 'SHow or hide PROS CONS.', 'wpas_editorial_rating' ),
				'text_on'    => 'Show',
				'text_off'   => 'Hide',
				'text_width' => 80,
				'default'    => false,
			),
			array(
				'id'         => 'wpas_cr_desc_show',
				'type'       => 'switcher',
				'title'      => __( 'Show/Hide Description', 'wpas_editorial_rating' ),
				'subtitle'   => __( 'SHow or hide description.', 'wpas_editorial_rating' ),
				'text_on'    => 'Show',
				'text_off'   => 'Hide',
				'text_width' => 80,
				'default'    => true,
			),
			array(
				'id'         => 'wpas_cros_rating_brand_color',
				'type'       => 'color',
				'title'      => 'Brand Color',
				'subtitle'   => 'Set a brand color for whole layout.',
				'default'    => '#E43917',
			),
		),
	)
);
