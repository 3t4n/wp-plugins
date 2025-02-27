<?php
/**
 * Content wrapper end.
 *
 * @package    cyberpress/templates
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

do_action( 'cyberpress_before_end_wrapper' );

echo wp_kses_post( apply_filters( 'cyberpress_wrapper_end_filter', '</main></div>' ) );

do_action( 'cyberpress_sidebar' );

do_action( 'cyberpress_after_end_wrapper' );

do_action( 'cyberpress_before_footer' );

get_footer();

do_action( 'cyberpress_after_footer' );
