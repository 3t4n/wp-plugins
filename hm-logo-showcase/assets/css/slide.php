<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//$hmlsImgRotate = ( $hmls_slide_height - (($hmls_slide_height * 80)/100) ) / 2;
?>
<style type="text/css">
.hmls-slide-wrapper {
    background-color: <?php esc_html_e( $hmls_slide_container_bg_color ); ?>;
    border-radius: <?php esc_html_e( $hmls_slide_container_radius ); ?>px;
    padding: <?php esc_html_e( $hmls_slide_container_padding_top ); ?>px <?php esc_html_e( $hmls_slide_container_padding_right ); ?>px <?php esc_html_e( $hmls_slide_container_padding_bottom ); ?>px <?php esc_html_e( $hmls_slide_container_padding_left ); ?>px;
    border: <?php esc_html_e( $hmls_slide_container_border_width ); ?>px solid <?php esc_html_e( $hmls_slide_container_border_color ); ?>;
}
.hmls-slide-wrapper .hmls-view-slide .slick-prev,
.hmls-slide-wrapper .hmls-view-slide .slick-next {
	top: <?php esc_html_e( $hmls_slide_height/2 ); ?>px;
	background: <?php esc_html_e( $hmls_slider_arrow_color ); ?>;
}
.hmls-slide-wrapper .hmls-view-slide .slick-prev:hover,
.hmls-slide-wrapper .hmls-view-slide .slick-next:hover {
	background: <?php esc_html_e( $hmls_slider_arrow_color_hvr ); ?>;
}
.hmls-slide-wrapper .slick-dots li button {
	background: <?php esc_html_e( $hmls_slider_dots_color ); ?>;
}
.hmls-slide-wrapper .slick-dots li.slick-active button {
	background: <?php esc_html_e( $hmls_slider_dots_active_color ); ?>;
}
.hmls-slide-wrapper .hmls-view-slide .splide__slide {
	height: <?php esc_html_e( $hmls_slide_height ); ?>px;
    border: <?php esc_html_e( $hmls_slide_border_width ); ?>px solid <?php esc_html_e( $hmls_slide_border_color ); ?>;
    background-color: <?php esc_html_e( $hmls_slide_bg_color ); ?>;
    border-radius: <?php esc_html_e( $hmls_slide_radius ); ?>px;
    width: 150px;
}

.hmls-slide-wrapper .hmls-view-slide .slick-slide {
	margin: 0 <?php esc_html_e($hmls_slide_gap/2); ?>px;
}
.splide__slide.is-active {
    background: <?php esc_html_e( $hmls_slide_focus_bg_color ); ?>;
    border-color: <?php esc_html_e( $hmls_slide_focus_bg_color ); ?>;
}

.splide__progress__bar {
    height: <?php esc_html_e( $hmls_slide_progress_bar_height ); ?>px;
    background-color: <?php esc_html_e( $hmls_slide_progress_bar_color ); ?>;
}

.splide__slide a img { 
	height: <?php esc_attr_e( $hmls_slide_logo_height ); ?>px;
}
<?php
if ( 'default' === $hmls_template ) {
	?>
	.splide__slide a img {
		right: -50%;
		transform: translate(-50%, -50%);
	}
	<?php
}

if ( 'grayscale' === $hmls_template ) {
	?>
	.splide__slide a img {
		-webkit-filter: grayscale(100%);
		filter: grayscale(100%);
	}
	.splide__slide:hover a img {
		-webkit-filter: grayscale(0%);
		filter: grayscale(0%);
	}
	<?php
}

if ( 'rtl' === $hmls_template ) {
	?>
	[dir="rtl"] .slick-prev {
		right: auto;
	}
	<?php
}

if ( $hmls_slide_hide_arrow ) {
	?>
	.hmls-slide-wrapper .hmls-view-slide {
		padding: 0;
	}
	<?php
}
if ( $hmls_hide_slider_dots ) {
	?>
	.hmls-slide-wrapper ul.slick-dots {
		display: none!important;
	}
	<?php
}
?>
</style>