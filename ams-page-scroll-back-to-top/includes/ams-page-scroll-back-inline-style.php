<?php

wp_enqueue_style( 'msv-amspsbtt-page-scroll-inline-css', plugins_url( '/assets/css/style.css', MSV_AMSPSBTT_PAGE_SCROLL_BACK_TO_TOP ) );
$icontype = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_icon', 'icon_type', 'preset' );

$iconbgheight = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_icon', 'icon_bg_height', '40' ) . 'px';
$iconbgwidth = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_icon', 'icon_bg_width', '40' ) . 'px';

$iconbgcolor = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'icon_bg_color', 'red' );
$iconfgcolor = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'icon_fg_color', '#fff' );
$iconmargintop = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_icon', 'icon_margin_top', '0' ) - 3 . 'px';

$presetimagewidth = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_icon', 'preset_image_width', '0' ) . 'px';
$presetimageheight = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_icon', 'preset_image_height', '0' ) . 'px';
$imagebgwidth = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'image_bg_width', '50' ) . 'px';
$imagebgheight = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'image_bg_height', '50' ) . 'px';
$imagebgcolor = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'image_bg_color', '' );

$uploadimagewidth = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_icon', 'upload_image_width', '0' ) . 'px';
$uploadimageheight = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_icon', 'upload_image_height', '0' ) . 'px';

$textbgheight = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_icon', 'text_bg_height', '40' ) . 'px';
$textbgwidth = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_icon', 'text_bg_width', '100' ) . 'px';
$textbgcolor = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'text_bg_color', 'red' );
$textfgcolor = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'text_fg_color', '#fff' );
$textfontsize = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_icon', 'text_font_size', '12' ) . 'px';
$textmargintop = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_icon', 'text_margin_top', '0' ) . 'px';


$bottom = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'bottom', '40' ) . 'px';
$padding = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'padding_side', '40' ) . 'px';
$position = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'position', 'right' );
$borderradius = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'border_radius', '0' ) . 'px';
$borderbox = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'border_box', '0' ) . 'px';
$bordercolor = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'border_color', '#dd9933' );
$sh_hlength = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'h_length', '' ) . 'px ';
$sh_vlength = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'v_length', '' ) . 'px ';
$sh_blurradius = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'blur_radius', '' ) . 'px ';
$sh_spreadradius = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'spread_radius', '' ) . 'px ';
$sh_color = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'sh_color', '#000' );

$drop_sh_hlength = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'drop_h_length', '' ) . 'px ';
$drop_sh_vlength = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'drop_v_length', '' ) . 'px ';
$drop_sh_blurradius = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'drop_blur_radius', '' ) . 'px ';
$drop_sh_color = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'drop_sh_color', '#000' );

$image_opacity = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'image_opacity', '' );
$box_shadow = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'box_shadow', '' );
$image_margin_top = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'image_margin_top', '0' ) . 'px';


$additionalcss = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_advanced', 'additional_css', '' );

if ( $icontype == 'icon' ) :
	$custom_css = "
		.ams-page-scroll-back-to-top-wrapper {
			bottom: {$bottom};
			{$position}: {$padding};
			height: {$iconbgheight};
			width: {$iconbgwidth};
			background: {$iconbgcolor};
			color: {$iconfgcolor};
			text-align: center;
			border-radius: {$borderradius};
			border: {$borderbox} solid {$bordercolor};
			box-shadow: {$sh_hlength} {$sh_vlength} {$sh_blurradius} {$sh_spreadradius} {$sh_color};
			-webkit-box-shadow: {$sh_hlength} {$sh_vlength} {$sh_blurradius} {$sh_spreadradius} {$sh_color};
			-moz-box-shadow: {$sh_hlength} {$sh_vlength} {$sh_blurradius} {$sh_spreadradius} {$sh_color};
		}
		.ams-page-scroll-back-to-top-wrapper i {
			margin-top: {$iconmargintop};
		}
		{$additionalcss}";
elseif ( $icontype == 'text' ) :

	$fontname = font_family_name();
	$font_style = font_style();
	
	
	$custom_css = "
		.ams-page-scroll-back-to-top-wrapper {
			bottom: {$bottom};
			{$position}: {$padding};
			height: {$textbgheight};
			width: {$textbgwidth};
			background: {$textbgcolor};
			color: {$textfgcolor};
			text-align: center;
			border-radius: {$borderradius};
			border: {$borderbox} solid {$bordercolor};
			font-size: {$textfontsize};
			font-family: {$fontname};
			box-shadow: {$sh_hlength} {$sh_vlength} {$sh_blurradius} {$sh_spreadradius} {$sh_color};
			-webkit-box-shadow: {$sh_hlength} {$sh_vlength} {$sh_blurradius} {$sh_spreadradius} {$sh_color};
			-moz-box-shadow: {$sh_hlength} {$sh_vlength} {$sh_blurradius} {$sh_spreadradius} {$sh_color};
		}
		.ams-page-scroll-back-to-top-wrapper p {
			margin-top: {$textmargintop};
			line-height: 1.5em;
			{$font_style};
			
		}
		{$additionalcss}";
elseif ( $icontype == 'preset' ) :
	$custom_css = "
		.ams-page-scroll-back-to-top-wrapper {
			bottom: {$bottom};
			{$position}: {$padding};
			box-shadow: {$sh_hlength} {$sh_vlength} {$sh_blurradius} {$sh_spreadradius} {$sh_color};
			-webkit-box-shadow: {$sh_hlength} {$sh_vlength} {$sh_blurradius} {$sh_spreadradius} {$sh_color};
			-moz-box-shadow: {$sh_hlength} {$sh_vlength} {$sh_blurradius} {$sh_spreadradius} {$sh_color};
			border-radius: {$borderradius};
			border: {$borderbox} solid {$bordercolor};
			width: {$imagebgwidth};
			height: {$imagebgheight};
			text-align: center;
			background: {$imagebgcolor};
		}
		.ams-page-scroll-back-to-top-wrapper img {
			width: {$presetimagewidth};
			height: {$presetimageheight};
			opacity: {$image_opacity};
			filter: drop-shadow({$drop_sh_hlength} {$drop_sh_vlength} {$drop_sh_blurradius} {$drop_sh_color});
			margin-top: {$image_margin_top};
		}
		{$additionalcss}";
elseif ( $icontype == 'upload' ) :
	$custom_css = "
		.ams-page-scroll-back-to-top-wrapper {
			bottom: {$bottom};
			{$position}: {$padding};
			box-shadow: {$sh_hlength} {$sh_vlength} {$sh_blurradius} {$sh_spreadradius} {$sh_color};
			-webkit-box-shadow: {$sh_hlength} {$sh_vlength} {$sh_blurradius} {$sh_spreadradius} {$sh_color};
			-moz-box-shadow: {$sh_hlength} {$sh_vlength} {$sh_blurradius} {$sh_spreadradius} {$sh_color};
			border-radius: {$borderradius};
			border: {$borderbox} solid {$bordercolor};
			width: {$imagebgwidth};
			height: {$imagebgheight};
			text-align: center;
			background: {$imagebgcolor};
		}
		.ams-page-scroll-back-to-top-wrapper img {
			width: {$uploadimagewidth};
			height: {$uploadimageheight};
			opacity: {$image_opacity};
			filter: drop-shadow({$drop_sh_hlength} {$drop_sh_vlength} {$drop_sh_blurradius} {$drop_sh_color});
			margin-top: {$image_margin_top};
		}
		{$additionalcss}";
endif;

wp_add_inline_style( 'msv-amspsbtt-page-scroll-inline-css', $custom_css );

wp_register_script( 'msv-amspsbtt-page-scroll-inline-script', plugins_url( '/assets/js/script.js', MSV_AMSPSBTT_PAGE_SCROLL_BACK_TO_TOP ), array(), '1.0', true );

// Localize the script with new data
$ams_psbtt_translation_array = array(
	'time_to_scroll' => ams_get_option( 'msv_amspstt_page_scroll_back_to_top_advanced', 'time_to_scroll', '1000' ),
	'show_after_px' => ams_get_option( 'msv_amspstt_page_scroll_back_to_top_advanced', 'show_after_px', '100' ),
	'icon_type' => ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_icon', 'icon_type', 'preset' ),
	'icon_bg_hover_color' => ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'icon_bg_hover_color', '' ),
	'icon_fg_hover_color' => ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'icon_fg_hover_color', '' ),
	'text_bg_hover_color' => ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'text_bg_hover_color', '' ),
	'text_fg_hover_color' => ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'text_fg_hover_color', '' ),
	'icon_bg_color' => ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'icon_bg_color', '' ),
	'icon_fg_color' => ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'icon_fg_color', '' ),
	'text_bg_color' => ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'text_bg_color', '' ),
	'text_fg_color' => ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'text_fg_color', '' ),
	'image_hover_opacity' => ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'image_hover_opacity', '' ),
	'image_opacity' => ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_style', 'image_opacity', '' ),
);
wp_localize_script( 'msv-amspsbtt-page-scroll-inline-script', 'ams_psbtt', $ams_psbtt_translation_array );


// Enqueued script with localized data.
wp_enqueue_script( 'msv-amspsbtt-page-scroll-inline-script' );


wp_register_style(
	'msv-amspsbtt-page-scroll-font-awesome', plugins_url( '/assets/css/font-awesome.min.css', MSV_AMSPSBTT_PAGE_SCROLL_BACK_TO_TOP ), array(), '4.6.3');
		wp_enqueue_style( 'msv-amspsbtt-page-scroll-font-awesome' );
		
function font_style() {
	$textfontstyle = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_icon', 'text_font_style', 'normal' );
	if ( 'normal' == $textfontstyle ) {
		return "font-weight: normal;
				font-style: normal;";
	} elseif ( 'bold' == $textfontstyle ) {
		return "font-weight: bold;
				font-style: normal;";
	} elseif ( 'italic' == $textfontstyle ) {
		return 'font-weight: normal;;
				font-style: italic;';
	} elseif ( 'bolditalic' == $textfontstyle ) {
		return 'font-weight: bold;
				font-style: italic;';
	}
}
		
function font_family_name() {
	$textfontfamily = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_icon', 'text_font_family', '' );

	if ( 'anton' == $textfontfamily ) {
		$query_args = array(
			'family' => 'Anton',
			'subset' => 'latin,latin-ext',
		);
		$fontname = 'Anton';
	} elseif ( 'courgette' == $textfontfamily ) {
		$query_args = array(
			'family' => 'Courgette',
			'subset' => 'latin,latin-ext',
		);
		$fontname = 'Courgette';
	} elseif ( 'cabin' == $textfontfamily ) {
		$query_args = array(
			'family' => 'Cabin:400,700',
			'subset' => 'latin,latin-ext',
		);
		$fontname = 'Cabin';
	} elseif ( 'opensans' == $textfontfamily ) {
		$query_args = array(
			'family' => 'Open+Sans:400,700',
			'subset' => 'latin,latin-ext',
		);
		$fontname = 'Open Sans';
	} elseif ( 'oswald' == $textfontfamily ) {
		$query_args = array(
			'family' => 'Oswald:400,700',
			'subset' => 'latin,latin-ext',
		);
		$fontname = 'Oswald';
	} elseif ( 'poiretone' == $textfontfamily ) {
		$query_args = array(
			'family' => 'Poiret+One',
			'subset' => 'latin,latin-ext',
		);
		$fontname = 'Poiret One';
	} elseif ( 'permanentmarker' == $textfontfamily ) {
		$query_args = array(
			'family' => 'Permanent+Marker',
			'subset' => 'latin,latin-ext',
		);
		$fontname = 'Permanent Marker';
	} elseif ( 'roboto' == $textfontfamily ) {
		$query_args = array(
			'family' => 'Roboto:400,700',
			'subset' => 'latin,latin-ext',
		);
		$fontname = 'Roboto';
	} elseif ( 'shrikhand' == $textfontfamily ) {
		$query_args = array(
			'family' => 'Shrikhand',
			'subset' => 'latin,latin-ext',
		);
		$fontname = 'Shrikhand';
	} elseif ( 'teko' == $textfontfamily ) {
		$query_args = array(
			'family' => 'Teko:400,700',
			'subset' => 'latin,latin-ext',
		);
		$fontname = 'Teko';
	}

	wp_register_style( 'ams_psbtt_google_fonts', add_query_arg( $query_args, "http://fonts.googleapis.com/css" ), array(), null );
	wp_enqueue_style( 'ams_psbtt_google_fonts' );
	
	return $fontname;
}