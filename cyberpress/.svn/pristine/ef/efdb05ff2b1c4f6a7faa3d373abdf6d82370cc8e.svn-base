<?php
/**
 * The Template for displaying game archives.
 *
 * This template can be overridden by copying it to yourtheme/cyberpress/games/archive.php.
 *
 * @package    cyberpress/templates
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

do_action( 'cyberpress_wrapper_start' );

do_action( 'cyberpress_games_archive_title' );

if ( have_posts() ) :

    do_action( 'cyberpress_games_wrapper_start' );

    do_action( 'cyberpress_archive_game_loop_start' );

    /* Start the Loop */
    while ( have_posts() ) :
        the_post();
        /**
         * Include the game loop archive template for the content.
         */
        do_action( 'cyberpress_archive_game_loop' );
    endwhile;

    do_action( 'cyberpress_archive_game_loop_end' );

    do_action( 'cyberpress_archive_pagination' );

    do_action( 'cyberpress_games_wrapper_end' );
else :

    do_action( 'cyberpress_content_none' );

endif;

do_action( 'cyberpress_wrapper_end' );
