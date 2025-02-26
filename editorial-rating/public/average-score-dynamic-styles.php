<?php
/**
 * The file that defines the dynamic styles of the plugin.
 *
 * @link       https://pluginic.com
 * @since      1.0.0
 *
 * @package    WPAS_Editorial_Rating
 * @subpackage WPAS_Editorial_Rating/public
 */

// Font Family.
$wpas_heading_ff  = isset( $wpas_meta_values['wpas-heading-ff']['font-family'] ) ? $wpas_meta_values['wpas-heading-ff']['font-family'] : '';
$wpas_heading_ffr = '';
if ( ! empty( $wpas_heading_ff ) ) {

	$wpas_heading_ffr = '#wpas-er-' . $wpas_post_id . ' h4.wpas--rating-title,span.wpas--pros-title,span.wpas--cons-title,span.wpas--bl-title {font-family: "' . $wpas_heading_ff . '";}';
}
$wpas_global_body_ff  = isset( $wpas_meta_values['wpas-body-ff']['font-family'] ) ? $wpas_meta_values['wpas-body-ff']['font-family'] : '';
$wpas_global_body_ffr = '';
if ( ! empty( $wpas_global_body_ff ) ) {

	$wpas_global_body_ffr = '#wpas-er-' . $wpas_post_id . ' {font-family: "' . $wpas_global_body_ff . '";}';
}
// Get the URL.
$wpas_typo_ff_url         = '';
$wpas_typography_all_ff   = array();
$wpas_typography_all_ff[] = $wpas_heading_ff;
$wpas_typography_all_ff[] = $wpas_global_body_ff;
if ( array_filter( $wpas_typography_all_ff ) ) {

	$wpas_typo_ff_imploded = implode( '&family=', array_filter( $wpas_typography_all_ff ) );
	$wpas_typo_ff_url      = '@import url("https://fonts.googleapis.com/css2?family=' . str_replace( ' ', '+', $wpas_typo_ff_imploded ) . '&display=swap");';
}

// Product Title Typography.
$wpas_product_title_font_size      = isset( $wpas_meta_values['wpas-product-title-typo']['top'] ) ? $wpas_meta_values['wpas-product-title-typo']['top'] : '';
$wpas_product_title_line_height    = isset( $wpas_meta_values['wpas-product-title-typo']['right'] ) ? $wpas_meta_values['wpas-product-title-typo']['right'] : '';
$wpas_product_title_letter_spacing = isset( $wpas_meta_values['wpas-product-title-typo']['bottom'] ) ? $wpas_meta_values['wpas-product-title-typo']['bottom'] : '';
$wpas_product_title_font_weight    = isset( $wpas_meta_values['wpas-product-title-typo']['left'] ) ? $wpas_meta_values['wpas-product-title-typo']['left'] : '';
$wpas_product_title_unit           = isset( $wpas_meta_values['wpas-product-title-typo']['unit'] ) ? $wpas_meta_values['wpas-product-title-typo']['unit'] : '';

// Product Overview Typography.
$wpas_product_overview_font_size      = isset( $wpas_meta_values['wpas-product-overview-typo']['top'] ) ? $wpas_meta_values['wpas-product-overview-typo']['top'] : '';
$wpas_product_overview_line_height    = isset( $wpas_meta_values['wpas-product-overview-typo']['right'] ) ? $wpas_meta_values['wpas-product-overview-typo']['right'] : '';
$wpas_product_overview_letter_spacing = isset( $wpas_meta_values['wpas-product-overview-typo']['bottom'] ) ? $wpas_meta_values['wpas-product-overview-typo']['bottom'] : '';
$wpas_product_overview_font_weight    = isset( $wpas_meta_values['wpas-product-overview-typo']['left'] ) ? $wpas_meta_values['wpas-product-overview-typo']['left'] : '';
$wpas_product_overview_unit           = isset( $wpas_meta_values['wpas-product-overview-typo']['unit'] ) ? $wpas_meta_values['wpas-product-overview-typo']['unit'] : '';

// Product Rating Category Typography.
$wpas_rating_category_font_size      = isset( $wpas_meta_values['wpas-rating-category-typo']['top'] ) ? $wpas_meta_values['wpas-rating-category-typo']['top'] : '';
$wpas_rating_category_line_height    = isset( $wpas_meta_values['wpas-rating-category-typo']['right'] ) ? $wpas_meta_values['wpas-rating-category-typo']['right'] : '';
$wpas_rating_category_letter_spacing = isset( $wpas_meta_values['wpas-rating-category-typo']['bottom'] ) ? $wpas_meta_values['wpas-rating-category-typo']['bottom'] : '';
$wpas_rating_category_font_weight    = isset( $wpas_meta_values['wpas-rating-category-typo']['left'] ) ? $wpas_meta_values['wpas-rating-category-typo']['left'] : '';
$wpas_rating_category_unit           = isset( $wpas_meta_values['wpas-rating-category-typo']['unit'] ) ? $wpas_meta_values['wpas-rating-category-typo']['unit'] : '';

// Product Rating Rate Typography.
$wpas_rating_rate_font_size      = isset( $wpas_meta_values['wpas-rating-rate-typo']['top'] ) ? $wpas_meta_values['wpas-rating-rate-typo']['top'] : '';
$wpas_rating_rate_line_height    = isset( $wpas_meta_values['wpas-rating-rate-typo']['right'] ) ? $wpas_meta_values['wpas-rating-rate-typo']['right'] : '';
$wpas_rating_rate_letter_spacing = isset( $wpas_meta_values['wpas-rating-rate-typo']['bottom'] ) ? $wpas_meta_values['wpas-rating-rate-typo']['bottom'] : '';
$wpas_rating_rate_font_weight    = isset( $wpas_meta_values['wpas-rating-rate-typo']['left'] ) ? $wpas_meta_values['wpas-rating-rate-typo']['left'] : '';
$wpas_rating_rate_unit           = isset( $wpas_meta_values['wpas-rating-rate-typo']['unit'] ) ? $wpas_meta_values['wpas-rating-rate-typo']['unit'] : '';

// Product Pros-Cons & Bottomline Typography.
$wpas_product_pcb_title_font_size      = isset( $wpas_meta_values['wpas-product-pcb-title-typo']['top'] ) ? $wpas_meta_values['wpas-product-pcb-title-typo']['top'] : '';
$wpas_product_pcb_title_line_height    = isset( $wpas_meta_values['wpas-product-pcb-title-typo']['right'] ) ? $wpas_meta_values['wpas-product-pcb-title-typo']['right'] : '';
$wpas_product_pcb_title_letter_spacing = isset( $wpas_meta_values['wpas-product-pcb-title-typo']['bottom'] ) ? $wpas_meta_values['wpas-product-pcb-title-typo']['bottom'] : '';
$wpas_product_pcb_title_font_weight    = isset( $wpas_meta_values['wpas-product-pcb-title-typo']['left'] ) ? $wpas_meta_values['wpas-product-pcb-title-typo']['left'] : '';
$wpas_product_pcb_title_unit           = isset( $wpas_meta_values['wpas-product-pcb-title-typo']['unit'] ) ? $wpas_meta_values['wpas-product-pcb-title-typo']['unit'] : '';

// Product Product Pros-Cons & Bottmline Typography.
$wpas_product_pcb_font_size      = isset( $wpas_meta_values['wpas-product-pcb-typo']['top'] ) ? $wpas_meta_values['wpas-product-pcb-typo']['top'] : '';
$wpas_product_pcb_line_height    = isset( $wpas_meta_values['wpas-product-pcb-typo']['right'] ) ? $wpas_meta_values['wpas-product-pcb-typo']['right'] : '';
$wpas_product_pcb_letter_spacing = isset( $wpas_meta_values['wpas-product-pcb-typo']['bottom'] ) ? $wpas_meta_values['wpas-product-pcb-typo']['bottom'] : '';
$wpas_product_pcb_font_weight    = isset( $wpas_meta_values['wpas-product-pcb-typo']['left'] ) ? $wpas_meta_values['wpas-product-pcb-typo']['left'] : '';
$wpas_product_pcb_unit           = isset( $wpas_meta_values['wpas-product-pcb-typo']['unit'] ) ? $wpas_meta_values['wpas-product-pcb-typo']['unit'] : '';

// Product Product Button Typography.
$wpas_product_btn_font_size      = isset( $wpas_meta_values['wpas-product-btn-typo']['top'] ) ? $wpas_meta_values['wpas-product-btn-typo']['top'] : '';
$wpas_product_btn_line_height    = isset( $wpas_meta_values['wpas-product-btn-typo']['right'] ) ? $wpas_meta_values['wpas-product-btn-typo']['right'] : '';
$wpas_product_btn_letter_spacing = isset( $wpas_meta_values['wpas-product-btn-typo']['bottom'] ) ? $wpas_meta_values['wpas-product-btn-typo']['bottom'] : '';
$wpas_product_btn_font_weight    = isset( $wpas_meta_values['wpas-product-btn-typo']['left'] ) ? $wpas_meta_values['wpas-product-btn-typo']['left'] : '';
$wpas_product_btn_unit           = isset( $wpas_meta_values['wpas-product-btn-typo']['unit'] ) ? $wpas_meta_values['wpas-product-btn-typo']['unit'] : '';

// Color Options.
$wpas_heder_bg_color               = isset( $wpas_meta_values['wpas-header-bg-color'] ) ? $wpas_meta_values['wpas-header-bg-color'] : '';
$wpas_product_title_color          = isset( $wpas_meta_values['wpas-product-title-color'] ) ? $wpas_meta_values['wpas-product-title-color'] : '';
$wpas_product_overview_color       = isset( $wpas_meta_values['wpas-product-overview-color'] ) ? $wpas_meta_values['wpas-product-overview-color'] : '';
$wpas_product_rating_cat_color     = isset( $wpas_meta_values['wpas-rating-category-colors']['rating-category'] ) ? $wpas_meta_values['wpas-rating-category-colors']['rating-category'] : '';
$wpas_product_rating_rate_color    = isset( $wpas_meta_values['wpas-rating-category-colors']['rating-rate'] ) ? $wpas_meta_values['wpas-rating-category-colors']['rating-rate'] : '';
$wpas_product_rating_bar_color     = isset( $wpas_meta_values['wpas-rating-category-colors']['rating-bar'] ) ? $wpas_meta_values['wpas-rating-category-colors']['rating-bar'] : '';
$wpas_product_title_pros_color     = isset( $wpas_meta_values['wpas-pcb-title-colors']['pros'] ) ? $wpas_meta_values['wpas-pcb-title-colors']['pros'] : '';
$wpas_product_title_cons_color     = isset( $wpas_meta_values['wpas-pcb-title-colors']['cons'] ) ? $wpas_meta_values['wpas-pcb-title-colors']['cons'] : '';
$wpas_product_title_bline_color    = isset( $wpas_meta_values['wpas-pcb-title-colors']['bline'] ) ? $wpas_meta_values['wpas-pcb-title-colors']['bline'] : '';
$wpas_product_pros_txt_color       = isset( $wpas_meta_values['wpas-pcb-content-colors']['pros'] ) ? $wpas_meta_values['wpas-pcb-content-colors']['pros'] : '';
$wpas_product_cons_txt_color       = isset( $wpas_meta_values['wpas-pcb-content-colors']['cons'] ) ? $wpas_meta_values['wpas-pcb-content-colors']['cons'] : '';
$wpas_product_blin_txte_color      = isset( $wpas_meta_values['wpas-pcb-content-colors']['bline'] ) ? $wpas_meta_values['wpas-pcb-content-colors']['bline'] : '';
$wpas_product_btn_text_color       = isset( $wpas_meta_values['wpas-btn-colors']['text'] ) ? $wpas_meta_values['wpas-btn-colors']['text'] : '';
$wpas_product_btn_background_color = isset( $wpas_meta_values['wpas-btn-colors']['background'] ) ? $wpas_meta_values['wpas-btn-colors']['background'] : '';
$wpas_product_btn_text_hover_color = isset( $wpas_meta_values['wpas-btn-colors']['text_hover'] ) ? $wpas_meta_values['wpas-btn-colors']['text_hover'] : '';
$wpas_product_btn_bg_hover_color   = isset( $wpas_meta_values['wpas-btn-colors']['bg_hover'] ) ? $wpas_meta_values['wpas-btn-colors']['bg_hover'] : '';
$wpas_user_rating_text_color       = isset( $wpas_meta_values['wpas-user-rating-colors']['text'] ) ? $wpas_meta_values['wpas-user-rating-colors']['text'] : '';
$wpas_user_rating_stars_color      = isset( $wpas_meta_values['wpas-user-rating-colors']['stars'] ) ? $wpas_meta_values['wpas-user-rating-colors']['stars'] : '';

// Executing styles.
echo '<style>' . $wpas_typo_ff_url . $wpas_global_body_ffr . $wpas_heading_ffr . '#wpas-er-' . $wpas_post_id . '{max-width: ' . $wpas_max_width['width'] . $wpas_max_width['unit'] . ';}#wpas-er-' . $wpas_post_id . ' .frhd--rate-visual:after{width:' . esc_attr( $frhd_rate_math_percent ) . '%!important;}#wpas-er-' . $wpas_post_id . ' .wpas--rating-title{font-size: ' . esc_attr( $wpas_product_title_font_size . $wpas_product_title_unit ) . ';line-height: ' . esc_attr( $wpas_product_title_line_height . $wpas_product_title_unit ) . ';letter-spacing: ' . esc_attr( $wpas_product_title_letter_spacing . $wpas_product_title_unit ) . ';font-weight: ' . esc_attr( $wpas_product_title_font_weight ) . ';}#wpas-er-' . $wpas_post_id . ' .wpas--bl-wrap{font-size: ' . esc_attr( $wpas_product_overview_font_size . $wpas_product_overview_unit ) . ';line-height: ' . esc_attr( $wpas_product_overview_line_height . $wpas_product_overview_unit ) . ';letter-spacing: ' . esc_attr( $wpas_product_overview_letter_spacing . $wpas_product_overview_unit ) . ';font-weight: ' . esc_attr( $wpas_product_overview_font_weight ) . ';}#wpas-er-' . $wpas_post_id . ' .wpas--rating-name{font-size: ' . esc_attr( $wpas_rating_category_font_size . $wpas_rating_category_unit ) . ';line-height: ' . esc_attr( $wpas_rating_category_line_height . $wpas_rating_category_unit ) . ';letter-spacing: ' . esc_attr( $wpas_rating_category_letter_spacing . $wpas_rating_category_unit ) . ';font-weight: ' . esc_attr( $wpas_rating_category_font_weight ) . ';}#wpas-er-' . $wpas_post_id . ' .wpas--rating-rate{font-size: ' . esc_attr( $wpas_rating_rate_font_size . $wpas_rating_rate_unit ) . ';line-height: ' . esc_attr( $wpas_rating_rate_line_height . $wpas_rating_rate_unit ) . ';letter-spacing: ' . esc_attr( $wpas_rating_rate_letter_spacing . $wpas_rating_rate_unit ) . ';font-weight: ' . esc_attr( $wpas_rating_rate_font_weight ) . ';}#wpas-er-' . $wpas_post_id . ' .wpas--pros-title,#wpas-er-' . $wpas_post_id . ' .wpas--cons-title,#wpas-er-' . $wpas_post_id . ' .wpas--bl-title{font-size: ' . esc_attr( $wpas_product_pcb_title_font_size . $wpas_product_pcb_title_unit ) . ';line-height: ' . esc_attr( $wpas_product_pcb_title_line_height . $wpas_product_pcb_title_unit ) . ';letter-spacing: ' . esc_attr( $wpas_product_pcb_title_letter_spacing . $wpas_product_pcb_title_unit ) . ';font-weight: ' . esc_attr( $wpas_product_pcb_title_font_weight ) . ';}#wpas-er-' . $wpas_post_id . ' .wpas--pros-list li,#wpas-er-' . $wpas_post_id . ' .wpas--cons-list li,#wpas-er-' . $wpas_post_id . ' .wpas--bl-wrap{font-size: ' . esc_attr( $wpas_product_pcb_font_size . $wpas_product_pcb_unit ) . ';line-height: ' . esc_attr( $wpas_product_pcb_line_height . $wpas_product_pcb_unit ) . ';letter-spacing: ' . esc_attr( $wpas_product_pcb_letter_spacing . $wpas_product_pcb_unit ) . ';font-weight: ' . esc_attr( $wpas_product_pcb_font_weight ) . ';}#wpas-er-' . $wpas_post_id . ' .wpas--product-link{font-size: ' . esc_attr( $wpas_product_btn_font_size . $wpas_product_btn_unit ) . ';line-height: ' . esc_attr( $wpas_product_btn_line_height . $wpas_product_btn_unit ) . ';letter-spacing: ' . esc_attr( $wpas_product_btn_letter_spacing . $wpas_product_btn_unit ) . ';font-weight: ' . esc_attr( $wpas_product_btn_font_weight ) . ';color: ' . esc_attr( $wpas_product_btn_text_color ) . ';background-color: ' . esc_attr( $wpas_product_btn_background_color ) . ';}#wpas-er-' . $wpas_post_id . ' .wpas--product-link:hover{color: ' . esc_attr( $wpas_product_btn_text_hover_color ) . ';background-color: ' . esc_attr( $wpas_product_btn_bg_hover_color ) . ';}#wpas-er-' . $wpas_post_id . ' .wpas--rating-header,#wpas-er-' . $wpas_post_id . ' .frhd--rate-cover{background-color: ' . esc_attr( $wpas_heder_bg_color ) . ';}#wpas-er-' . $wpas_post_id . ' .wpas--rating-title,.wpas--rating-title a{color: ' . esc_attr( $wpas_product_title_color ) . ';text-decoration: none !important;}#wpas-er-' . $wpas_post_id . ' .wpas--bl-txt p{color: ' . esc_attr( $wpas_product_blin_txte_color ) . ';}#wpas-er-' . $wpas_post_id . ' .wpas--rating-name{color: ' . esc_attr( $wpas_product_rating_cat_color ) . ';}#wpas-er-' . $wpas_post_id . ' .wpas--rating-rate{color:' . esc_attr( $wpas_product_rating_rate_color ) . '!important;}#wpas-er-' . $wpas_post_id . ' .wpas--rating-bar{background: ' . esc_attr( $wpas_product_rating_bar_color ) . ';}#wpas-er-' . $wpas_post_id . ' .wpas--pros-title{color:' . esc_attr( $wpas_product_title_pros_color ) . ';}#wpas-er-' . $wpas_post_id . ' .wpas--cons-title{color:' . esc_attr( $wpas_product_title_cons_color ) . ';}#wpas-er-' . $wpas_post_id . ' .wpas--bl-title{color:' . esc_attr( $wpas_product_title_bline_color ) . ';}#wpas-er-' . $wpas_post_id . ' .wpas--pros-list li{color: ' . esc_attr( $wpas_product_pros_txt_color ) . ';}#wpas-er-' . $wpas_post_id . ' .wpas--cons-list li{color: ' . esc_attr( $wpas_product_cons_txt_color ) . ';}#wpas-er-' . $wpas_post_id . ' .frhd--rate-visual:after {background: ' . esc_attr( $wpas_user_rating_stars_color ) . ';-webkit-mask-image: url("data:image/svg+xml,%3Csvg viewBox=\'0 0 304 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'m181.9 23.2c0.4 1.2 0 2.6-0.9 3.4l-13.2 11.5 3.8 17c0.3 1.2-0.2 2.5-1.2 3.3-1.1 0.8-2.5 0.9-3.6 0.2l-15-8.9-15 8.9c-0.5 0.3-1.1 0.5-1.6 0.5s-1.2-0.2-1.8-0.6c-1.1-0.7-1.5-2-1.2-3.3l3.8-17-13.2-11.5c-1-0.8-1.3-2.1-1-3.4 0.5-1.2 1.5-2.1 2.8-2.2l17.4-1.6 7-16.2c0.6-1.2 1.7-1.9 3-1.9s2.5 0.8 3 1.9l6.8 16.1 17.4 1.5c1.3 0.1 2.4 0.9 2.7 2.3z\' fill=\'%23FFC107\'/%3E%3Cpath d=\'m121 23.1c0.4 1.2 0 2.6-0.9 3.4l-13.1 11.5 3.8 17c0.3 1.2-0.2 2.5-1.2 3.3-1.1 0.8-2.5 0.9-3.6 0.2l-15-8.9-15 8.9c-0.5 0.3-1.1 0.5-1.6 0.5s-1.2-0.2-1.8-0.6c-1.1-0.7-1.5-2-1.2-3.3l3.8-17-13.2-11.6c-1-0.8-1.3-2.1-1-3.4 0.5-1.2 1.5-2.1 2.8-2.2l17.4-1.6 6.8-16c0.6-1.2 1.7-1.9 3-1.9s2.5 0.8 3 1.9l6.8 16.1 17.4 1.5c1.4 0 2.4 0.9 2.8 2.2z\' fill=\'%23FFC107\'/%3E%3Cpath d=\'m303 26.4-13.2 11.6 3.8 17c0.3 1.2-0.2 2.5-1.2 3.3-1.1 0.8-2.5 0.9-3.6 0.2l-15-8.9-15 8.9c-0.5 0.3-1.1 0.5-1.6 0.5s-1.2-0.2-1.8-0.6c-1.1-0.7-1.5-2-1.2-3.3l3.8-17-13.2-11.5c-1-0.8-1.3-2.1-1-3.4 0.5-1.2 1.5-2.1 2.8-2.2l17.4-1.6 6.8-16.1c0.6-1.2 1.7-1.9 3-1.9s2.5 0.8 3 1.9l6.8 16.1 17.4 1.5c1.3 0.1 2.4 1 2.8 2.2s0.1 2.6-0.8 3.3z\' fill=\'%23FFC107\'/%3E%3Cpath d=\'m242.9 23.2c0.4 1.2 0 2.6-0.9 3.4l-13.2 11.5 3.8 17c0.3 1.2-0.2 2.5-1.2 3.3-1.1 0.8-2.5 0.9-3.6 0.2l-15-8.9-15 8.9c-0.5 0.3-1.1 0.5-1.6 0.5s-1.2-0.2-1.8-0.6c-1.1-0.7-1.5-2-1.2-3.3l3.8-17-13.2-11.5c-1-0.8-1.3-2.1-1-3.4 0.5-1.2 1.5-2.1 2.8-2.2l17.4-1.6 6.8-16.2c0.6-1.2 1.7-1.9 3-1.9s2.5 0.8 3 1.9l6.8 16.1 17.4 1.5c1.5 0.1 2.5 0.9 2.9 2.3z\' fill=\'%23FFC107\'/%3E%3Cpath d=\'m60.1 23.1c0.4 1.2 0 2.6-0.9 3.4l-13.1 11.5 3.8 17c0.3 1.2-0.2 2.5-1.2 3.3s-2.5 0.9-3.6 0.2l-15-8.9-15 8.9c-0.5 0.3-1.1 0.5-1.6 0.5s-1.2-0.2-1.8-0.6c-1.1-0.7-1.5-2-1.2-3.3l3.8-17-13.2-11.6c-1-0.8-1.3-2.1-1-3.4 0.5-1.2 1.5-2.1 2.8-2.2l17.4-1.6 6.8-16.1c0.6-1.2 1.7-1.9 3-1.9s2.5 0.8 3 1.9l6.8 16.1 17.4 1.5c1.4 0.1 2.5 1 2.8 2.3z\' fill=\'%23FFC107\'/%3E%3C/svg%3E");-webkit-mask-repeat: no-repeat;-webkit-mask-position: 0;-webkit-mask-size: cover;}#wpas-er-' . $wpas_post_id . ' .wpas-star-rating label:hover svg path,#wpas-er-' . $wpas_post_id . ' .wpas-star-rating label:hover ~ label svg path, .wpas-star-rating input[type=radio]:checked ~ label  svg path {stroke:' . esc_attr( $wpas_user_rating_stars_color ) . ';fill:' . esc_attr( $wpas_user_rating_stars_color ) . ';}#wpas-er-' . $wpas_post_id . ' .frhd--user-rating,#wpas-er-' . $wpas_post_id . ' .frhd--user-rating span,#wpas-er-' . $wpas_post_id . ' .frhd--user-rating p,#wpas-er-' . $wpas_post_id . ' .wpas-star-rating-wrap{color: ' . esc_attr( $wpas_user_rating_text_color ) . ';}#wpas-er-' . $wpas_post_id . ' .wpas--total-category {border-color:' . esc_attr( $wpas_user_rating_stars_color ) . ';}#wpas-er-' . $wpas_post_id . ' </style>';
