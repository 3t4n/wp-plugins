<?php

if ( !defined('ABSPATH') ) die( BS3D_ALERT_MSG );
/**
 * Prints pagination for custom post
 * @param $loop
 * @param int $paged
 *
 * @return string
 */
function bs3d_pagination( $loop, $paged = 1){
    $html = '<div class="bs3d-pagination">';
    $largeNumber = 999999999; // we need a large number here
    $html .= paginate_links( array(
        'base' => str_replace( $largeNumber, '%#%', esc_url( get_pagenum_link( $largeNumber ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, $paged ),
        'total' => $loop->max_num_pages,
        'prev_text' => __('&laquo; Prev', BS3D_TEXTDOMAIN),
        'next_text' => __('Next &raquo;', BS3D_TEXTDOMAIN),
    ) );

    $html .= '</div >';
    return $html;
}


/**
 *  Shorten Text at a specific length but does not cut off the words in the middle.
 * @param string $text string to cut off
 * @param int $length lengths of the character to cut off
 *
 * @return string
 */
function bs3d_shorten_text($text, $length){
    if(strlen($text) > $length) {
        $text = substr($text, 0, strpos($text, ' ', $length));
    }
    return $text;
}
