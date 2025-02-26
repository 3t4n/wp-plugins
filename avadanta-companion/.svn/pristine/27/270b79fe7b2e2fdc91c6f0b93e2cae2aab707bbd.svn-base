<?php
if ( ! function_exists( 'avata_customize_register' ) ) :
	/**
	 * avadanta Customize Register
	 */
	
	function avata_customize_register( $wp_customize ) {
		$avadanta_slider_content_control = $wp_customize->get_setting( 'avadanta_slider_content' );
				if ( ! empty( $avadanta_slider_content_control ) ) {
			$avadanta_slider_content_control->default = avata_avadanta_get_slider_default();
	}
		$avadanta_service_content_control = $wp_customize->get_setting( 'avadanta_service_content' );
				if ( ! empty( $avadanta_service_content_control ) ) {
			$avadanta_service_content_control->default = avata_avadanta_get_service_default();
	}
		$avadanta_portfolio_content_control = $wp_customize->get_setting( 'avadanta_portfolio_content' );
				if ( ! empty( $avadanta_portfolio_content_control ) ) {
			$avadanta_portfolio_content_control->default = avata_avadanta_get_portfolio_default();
	}
		$avadanta_team_content_control = $wp_customize->get_setting( 'avadanta_team_content' );
				if ( ! empty( $avadanta_team_content_control ) ) {
			$avadanta_team_content_control->default = avata_avadanta_get_team_default();
    }

    		$avadanta_testimonial_content_control = $wp_customize->get_setting( 'avadanta_testimonial_content' );
				if ( ! empty( $avadanta_testimonial_content_control ) ) {
			$avadanta_testimonial_content_control->default = avata_avadanta_get_testimonial_default();
    }

    $avadanta_client_content_control = $wp_customize->get_setting( 'avadanta_clients_content' );
				if ( ! empty( $avadanta_client_content_control ) ) {
			$avadanta_client_content_control->default = avata_avadanta_get_clients_default();
    }
}
	add_action( 'customize_register', 'avata_customize_register' );
endif;



function avadanta_inline_css1(){
$theme = wp_get_theme();

$custom_css      = '';
if ( 'Avadanta Business' == $theme->name){

$avadanta_color_scheme2 = get_theme_mod( 'avadanta_slider_opacity_section', '0.85' );
$avadanta_slider_background2 = get_theme_mod( 'avadanta_slider_background', '#141414' );
$custom_css      .= '.banner-s4 .bg-image.overlay-fall::after{
	opacity: ' . esc_attr( $avadanta_color_scheme2) . '; 
	background:' . esc_attr( $avadanta_slider_background2) . ';}';

	$avadanta_service_opacity_section1 = get_theme_mod( 'avadanta_service_opacity_section', '0.80' );
$avadanta_service_background1 = get_theme_mod( 'avadanta_service_background', '#141414' );
$custom_css      .= '.srvc .bg-image.overlay-fall::after{
	opacity: ' . esc_attr( $avadanta_service_opacity_section1) . '; 
	background:' . esc_attr( $avadanta_service_background1) . ';}';

} elseif('Avadanta Consulting' == $theme->name) {

	$avadanta_color_scheme2 = get_theme_mod( 'avadanta_slider_opacity_section', '0.72' );
$avadanta_slider_background2 = get_theme_mod( 'avadanta_slider_background', '#141414' );
$custom_css      .= '.banner-s4 .bg-image.overlay-fall::after{
	opacity: ' . esc_attr( $avadanta_color_scheme2) . '; 
	background:' . esc_attr( $avadanta_slider_background2) . ';}';

	$avadanta_service_opacity_section1 = get_theme_mod( 'avadanta_service_opacity_section', '0.50' );
$avadanta_service_background1 = get_theme_mod( 'avadanta_service_background', '#141414' );
$custom_css      .= '.srvc .bg-image.overlay-fall::after{
	opacity: ' . esc_attr( $avadanta_service_opacity_section1) . '; 
	background:' . esc_attr( $avadanta_service_background1) . ';}';
} 

elseif('Avadanta Corporate' == $theme->name) {

	$avadanta_color_scheme2 = get_theme_mod( 'avadanta_slider_opacity_section', '0.70' );
$avadanta_slider_background2 = get_theme_mod( 'avadanta_slider_background', '#04046f' );
$custom_css      .= '.banner-s4 .bg-image.overlay-fall::after{
	opacity: ' . esc_attr( $avadanta_color_scheme2) . '; 
	background:' . esc_attr( $avadanta_slider_background2) . ';}';

	$avadanta_service_opacity_section1 = get_theme_mod( 'avadanta_service_opacity_section', '0.50' );
$avadanta_service_background1 = get_theme_mod( 'avadanta_service_background', '#04046f' );
$custom_css      .= '.srvc .bg-image.overlay-fall::after{
	opacity: ' . esc_attr( $avadanta_service_opacity_section1) . '; 
	background:' . esc_attr( $avadanta_service_background1) . ';}';
} elseif('Avadanta Agency' == $theme->name) {


	$avadanta_color_scheme2 = get_theme_mod( 'avadanta_slider_opacity_section', '0.70' );
$avadanta_slider_background2 = get_theme_mod( 'avadanta_slider_background', '#010101' );
$custom_css      .= '.banner-s4 .bg-image.overlay-fall::after{
	opacity: ' . esc_attr( $avadanta_color_scheme2) . '; 
	background:' . esc_attr( $avadanta_slider_background2) . ';}';

	$avadanta_service_opacity_section1 = get_theme_mod( 'avadanta_service_opacity_section', '0.50' );
$avadanta_service_background1 = get_theme_mod( 'avadanta_service_background', '#38af5f' );
$custom_css      .= '.srvc .bg-image.overlay-fall::after{
	opacity: ' . esc_attr( $avadanta_service_opacity_section1) . '; 
	background:' . esc_attr( $avadanta_service_background1) . ';}';


} elseif('Avadanta Finance' == $theme->name) {

	$avadanta_service_opacity_section2 = get_theme_mod( 'avadanta_service_opacity_section', '0.50' );

$avadanta_service_background2 = get_theme_mod( 'avadanta_service_background', '#000' );
$custom_css      .= '.srvc .bg-image.overlay-fall::after{
	opacity: ' . esc_attr( $avadanta_service_opacity_section2) . '; 
	background:' . esc_attr( $avadanta_service_background2) . ';}';
}

elseif('Avadanta Tech' == $theme->name) {

	$avadanta_service_opacity_sectiontec = get_theme_mod( 'avadanta_service_opacity_section', '0.75' );

$avadanta_service_backgroundtec = get_theme_mod( 'avadanta_service_background', '#011133' );
$custom_css      .= '.bg-image.overlay-fall::after{
	opacity: ' . esc_attr( $avadanta_service_opacity_sectiontec) . '; 
	background:' . esc_attr( $avadanta_service_backgroundtec) . ';}';
}

elseif('Avadanta Dark' == $theme->name) {

	$avadanta_color_schemedark = get_theme_mod( 'avadanta_slider_opacity_section', '0.92' );
$avadanta_slider_backgrounddark = get_theme_mod( 'avadanta_slider_background', '#000' );
$custom_css      .= '.banner-s4 .bg-image.overlay-fall::after{
	opacity: ' . esc_attr( $avadanta_color_schemedark) . '; 
	background:' . esc_attr( $avadanta_slider_backgrounddark) . ';}';

	$avadanta_service_opacity_sectiondark = get_theme_mod( 'avadanta_service_opacity_section', '0.50' );
$avadanta_service_backgrounddark = get_theme_mod( 'avadanta_service_background', '#141414' );
$custom_css      .= '.srvc .bg-image.overlay-fall::after{
	opacity: ' . esc_attr( $avadanta_service_opacity_sectiondark) . '; 
	background:' . esc_attr( $avadanta_service_backgrounddark) . ';}';
} 

elseif('Avadanta Trade' == $theme->name) {

	$avadanta_color_schemedark = get_theme_mod( 'avadanta_slider_opacity_section', '0.92' );
$avadanta_slider_backgrounddark = get_theme_mod( 'avadanta_slider_background', '#141414' );
$custom_css      .= '.banner-s4 .bg-image.overlay-fall::after{
	opacity: ' . esc_attr( $avadanta_color_schemedark) . '; 
	background:' . esc_attr( $avadanta_slider_backgrounddark) . ';}';

	$avadanta_service_opacity_sectiondark = get_theme_mod( 'avadanta_service_opacity_section', '0.80' );
$avadanta_service_backgrounddark = get_theme_mod( 'avadanta_service_background', '#000' );
$custom_css      .= '.srvc .bg-image.overlay-fall::after{
	opacity: ' . esc_attr( $avadanta_service_opacity_sectiondark) . '; 
	background:' . esc_attr( $avadanta_service_backgrounddark) . ';}';
}

elseif('Avadanta Organization' == $theme->name) {

	$avadanta_color_schemeorg = get_theme_mod( 'avadanta_slider_opacity_section', '0.82' );
$avadanta_slider_backgroundorg = get_theme_mod( 'avadanta_slider_background', '#0e2530' );
$custom_css      .= '.banner-s4 .bg-image.overlay-fall::after{
	opacity: ' . esc_attr( $avadanta_color_schemeorg) . '; 
	background:' . esc_attr( $avadanta_slider_backgroundorg) . ';}';

	$avadanta_service_opacity_sectionorg = get_theme_mod( 'avadanta_service_opacity_section', '0.80' );
$avadanta_service_backgroundorg = get_theme_mod( 'avadanta_service_background', '#0e2530' );
$custom_css      .= '.srvc .bg-image.overlay-fall::after{
	opacity: ' . esc_attr( $avadanta_service_opacity_sectionorg) . '; 
	background:' . esc_attr( $avadanta_service_backgroundorg) . ';}';
}

elseif('Avadanta Firm' == $theme->name) {

	$avadanta_color_schemefirm = get_theme_mod( 'avadanta_slider_opacity_section', '0.82' );
$avadanta_slider_backgroundfirm = get_theme_mod( 'avadanta_slider_background', '#fff' );
$custom_css      .= '.banner-s4 .bg-image.overlay-fall::after{
	opacity: ' . esc_attr( $avadanta_color_schemefirm) . '; 
	background:' . esc_attr( $avadanta_slider_backgroundfirm) . ';}';

	$avadanta_service_opacity_sectionfirm = get_theme_mod( 'avadanta_service_opacity_section', '0.80' );
$avadanta_service_backgroundfirm = get_theme_mod( 'avadanta_service_background', '#fff' );
$custom_css      .= '.srvc .bg-image.overlay-fall::after{
	opacity: ' . esc_attr( $avadanta_service_opacity_sectionfirm) . '; 
	background:' . esc_attr( $avadanta_service_backgroundfirm) . ';}';

	$avadanta_slider_titlebgfirm = get_theme_mod( 'avadanta_slider_titlebg', '#000' );

$custom_css      .= '.main-top-slide .banner-heading,.main-top-slide p{
	color: ' . esc_attr( $avadanta_slider_titlebgfirm) . ' !important; }';

}   

elseif('Avadanta Industry' == $theme->name) {

	$avadanta_color_schemeindustry = get_theme_mod( 'avadanta_slider_opacity_section', '0.40' );
$avadanta_slider_backgroundindustry = get_theme_mod( 'avadanta_slider_background', '#24243e' );
$custom_css      .= '.banner-s4 .bg-image.overlay-fall::after{
	opacity: ' . esc_attr( $avadanta_color_schemeindustry) . '; 
	background:' . esc_attr( $avadanta_slider_backgroundindustry) . ';}';

	$avadanta_service_opacity_sectionindustry = get_theme_mod( 'avadanta_service_opacity_section', '0.40' );
$avadanta_service_backgroundindustry = get_theme_mod( 'avadanta_service_background', '#24243e' );
$custom_css      .= '.srvc .bg-image.overlay-fall::after{
	opacity: ' . esc_attr( $avadanta_service_opacity_sectionindustry) . '; 
	background:' . esc_attr( $avadanta_service_backgroundindustry) . ';}';

}

elseif('Avadanta Invest' == $theme->name) {

	$avadanta_color_schemeinvest = get_theme_mod( 'avadanta_slider_opacity_section', '0.70' );
$avadanta_slider_backgroundinvest = get_theme_mod( 'avadanta_slider_background', '#000' );
$custom_css      .= '.banner-s4 .bg-image.overlay-fall::after{
	opacity: ' . esc_attr( $avadanta_color_schemeinvest) . '; 
	background:' . esc_attr( $avadanta_slider_backgroundinvest) . ';}';

	$avadanta_service_opacity_sectioninvest = get_theme_mod( 'avadanta_service_opacity_section', '0.70' );
$avadanta_service_backgroundinvest = get_theme_mod( 'avadanta_service_background', '#000' );
$custom_css      .= '.srvc .bg-image.overlay-fall::after{
	opacity: ' . esc_attr( $avadanta_service_opacity_sectioninvest) . '; 
	background:' . esc_attr( $avadanta_service_backgroundinvest) . ';}';

}

elseif('Avadanta Deal' == $theme->name) {

	$avadanta_color_schemedeal = get_theme_mod( 'avadanta_slider_opacity_section', '0.80' );
$avadanta_slider_backgrounddeal = get_theme_mod( 'avadanta_slider_background', '#0b2c64' );
$custom_css      .= '.banner-s4 .bg-image.overlay-fall::after{
	opacity: ' . esc_attr( $avadanta_color_schemedeal) . '; 
	background:' . esc_attr( $avadanta_slider_backgrounddeal) . ';}';

	$avadanta_service_opacity_sectiondeal = get_theme_mod( 'avadanta_service_opacity_section', '0.80' );
$avadanta_service_backgrounddeal = get_theme_mod( 'avadanta_service_background', '#0b2c64' );
$custom_css      .= '.srvc .bg-image.overlay-fall::after{
	opacity: ' . esc_attr( $avadanta_service_opacity_sectiondeal) . '; 
	background:' . esc_attr( $avadanta_service_backgrounddeal) . ';}';

}

	else {

$avadanta_color_scheme1 = get_theme_mod( 'avadanta_slider_opacity_section', '0.92' );
$avadanta_slider_background = get_theme_mod( 'avadanta_slider_background', '#24243e' );
$custom_css      .= '.banner-s4 .bg-image.overlay-fall::after{
	opacity: ' . esc_attr( $avadanta_color_scheme1) . '; 
	background:' . esc_attr( $avadanta_slider_background) . ';}';

$avadanta_service_opacity_section = get_theme_mod( 'avadanta_service_opacity_section', '0.80' );
$avadanta_service_background = get_theme_mod( 'avadanta_service_background', '#24243e' );
$custom_css      .= '.srvc .bg-image.overlay-fall::after{
	opacity: ' . esc_attr( $avadanta_service_opacity_section) . '; 
	background:' . esc_attr( $avadanta_service_background) . ';}';
}



$avadanta_slider_titlebg = get_theme_mod( 'avadanta_slider_titlebg', '#fff' );

$custom_css      .= '.main-top-slide .banner-heading,.main-top-slide p{
	color: ' . esc_attr( $avadanta_slider_titlebg) . '; }';
    wp_add_inline_style( 'avadanta-style', $custom_css );

}
add_action( 'wp_enqueue_scripts', 'avadanta_inline_css1' );