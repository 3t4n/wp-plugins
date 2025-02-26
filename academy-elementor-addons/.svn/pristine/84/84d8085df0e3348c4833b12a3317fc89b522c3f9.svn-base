<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

\Elementor\Plugin::$instance->frontend->add_body_class( 'elementor-template-full-width' );

get_header( 'course' );

do_action( 'elementor/page_templates/header-footer/before_content' );

while ( have_posts() ) :
	the_post();
	\AcademyEA\Helper::get_template_part( 'single', 'course' );
	endwhile;

do_action( 'elementor/page_templates/header-footer/after_content' );

get_footer( 'course' );
