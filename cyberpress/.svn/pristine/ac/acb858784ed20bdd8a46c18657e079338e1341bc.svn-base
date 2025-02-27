<?php
/**
 * Output archive page pagination.
 *
 * @package    cyberpress/templates
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

the_posts_pagination(
    array(
        'prev_text'          => '<span class="screen-reader-text">' . esc_html__( 'Previous page', 'cyberpress' ) . '</span>',
        'next_text'          => '<span class="screen-reader-text">' . esc_html__( 'Next page', 'cyberpress' ) . '</span>',
        'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'cyberpress' ) . ' </span>',
        'total'              => $query->max_num_pages,
    )
);
