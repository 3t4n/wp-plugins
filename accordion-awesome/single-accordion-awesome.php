<?php

get_header();

$template = get_template();
global $wp;
if ( have_posts() ) :

	wp_enqueue_style( 'ta-accordion-awesome-fontawesome', plugin_dir_url( __FILE__ ) . 'public/css/fontawesome.min.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'ta-accordion-awesome-thaw-flexgrid', plugin_dir_url( __FILE__ ) . 'public/css/thaw-flexgrid.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'ta-accordion-awesome', plugin_dir_url( __FILE__ ) . 'public/css/accordion-awesome-public.css', array(), '1.0.0', 'all' );

	while ( have_posts() ) :
		the_post();

		$accordion_style = carbon_get_post_meta( get_the_ID(), 'accordion_style_choice' );

		if ( $accordion_style == 'accordion-style-2' ) {
			echo '<div class="accordion-container">';
				include_once dirname( __FILE__ ) . '/public/accordion-styles/accordion-style-2.php';
			echo '</div>';
		} elseif ( $accordion_style == 'accordion-style-7' ) {
			echo '<div class="accordion-container">';
				include_once dirname( __FILE__ ) . '/public/accordion-styles/accordion-style-7.php';
			echo '</div>';
		} elseif ( $accordion_style == 'accordion-style-9' ) {
			echo '<div class="accordion-container">';
				include_once dirname( __FILE__ ) . '/public/accordion-styles/accordion-style-9.php';
			echo '</div>';
		} elseif ( $accordion_style == 'accordion-style-13-checkboxes' ) {
			echo '<div class="accordion-container">';
				include_once dirname( __FILE__ ) . '/public/accordion-styles/accordion-style-13-checkboxes.php';
			echo '</div>';
		} elseif ( $accordion_style == 'accordion-style-13-radiobuttons' ) {
			echo '<div class="accordion-container">';
				include_once dirname( __FILE__ ) . '/public/accordion-styles/accordion-style-13-radiobuttons.php';
			echo '</div>';
		}

		$template = get_template();

	endwhile;
endif;
wp_reset_postdata();

get_footer();
