<?php
/**
 * Process shortcode
*/
if ( ! defined( 'ABSPATH' ) ) {exit;}

//Add shortcode
function abcfal_scodes_add( $args ) {

    $ver = str_replace('.', '' , ABCFAL_VERSION);
    $args = shortcode_atts( array( 'id' => '0', 'template' => '', 'pversion' => $ver ), $args );
    wp_enqueue_script( 'abcfal-magnific-js' );

    return abcfal_cntbldrs_build_al($args);
}
add_shortcode( 'abcf-andora-lightbox', 'abcfal_scodes_add' );

//Sortcode builder
function abcfal_scodes_build_scode( $args ) {

    $postID = intval($args['id']);
    if($postID == 0) { return '';}

    $scode = '[abcf-andora-lightbox' . ' id="' . $postID . '" template="' . $args['template'] . '"]';
    return esc_attr( $scode );
}

