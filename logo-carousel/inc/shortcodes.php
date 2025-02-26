<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

// Logo Carousel ShortCode
function sp_logo_carousel_shortcode( $atts ) {
	extract( shortcode_atts( array(
		'id'                  => '01',
		'color'               => '#11B8EA',
	), $atts, 'logo-carousel' ) );


	$args = array(
		'post_type'      => 'logo-carousel',
		'orderby'        => 'date',
		'order'          => 'DESC',
		'posts_per_page' => '-1',
	);


	$que = new WP_Query( $args );


	$outline = '';

	$outline .= '<style>
	div#sp-logo-carousel' . $id . '.sp-logo-carousel-area .owl-controls .owl-dots .owl-dot span,
	div#sp-logo-carousel' . $id . '.sp-logo-carousel-area .sp-lc-item .logo-title,
	div#sp-logo-carousel' . $id . '.sp-logo-carousel-area .owl-controls .owl-nav div:hover {background-color: ' . $color . '; border-color: ' . $color . '; color: #fff; }

	div.sp-logo-carousel-section.nav_position_vertical_center #sp-logo-carousel' . $id . '.sp-logo-carousel-area .owl-controls .owl-nav div,
	div.sp-logo-carousel-section.nav_position_vertical_center_hover #sp-logo-carousel' . $id . '
	.sp-logo-carousel-area .owl-controls .owl-nav div{margin-top: -15px;}
	</style>';

	$outline .= '
    <script type="text/javascript">
    jQuery(document).ready(function() {
		jQuery("#sp-logo-carousel' . $id . '").owlCarousel({
	        margin: 8,
			items: 5,
		    responsive:{
		        0:{
		            items: 1,
		        },
		        410:{
		            items: 2,
		        },
		        600:{
		            items: 3,
		        },
		        900:{
		            items: 4,
		        },
		        1000:{
		            items: 5,
		        }
		    },
			nav: true,
			navText: ["<",">"],
			autoplay: true,
			smartSpeed: 900,
			dots: true,
			autoplayHoverPause: true,

		});

    });
    </script>';

	$outline .= '<div class="sp-logo-carousel-section">';
	$outline .= '<div id="sp-logo-carousel' . $id . '" class="sp-logo-carousel-area">';

	if ( $que->have_posts() ) {
		while ( $que->have_posts() ) : $que->the_post();

			$logo_image = get_the_post_thumbnail_url( get_the_ID(), 'sp-logo-size', false );

			$outline .= '<div class="sp-lc-item">';

			if ( has_post_thumbnail() ) {
				$outline .= '<img src="' . $logo_image . '" alt="' . get_the_title() . '">';
			}

			$outline .= '</div>';

		endwhile;
	} else {
		$outline .= '<h2 class="sp-not-found-any-logo">' . __( 'No logo found', 'logo_carousel' ) . '</h2>';
	}

	$outline .= '</div>';
	$outline .= '</div>';

	wp_reset_query();

	return $outline;
}

add_shortcode( 'logo-carousel', 'sp_logo_carousel_shortcode' );
