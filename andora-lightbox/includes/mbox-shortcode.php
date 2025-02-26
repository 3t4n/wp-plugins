<?php
/**
 * Meta box: Shortcode
 *
*/
add_action( 'add_meta_boxes', 'abcfal_add_mbox_scode', 10, 2 );

function abcfal_add_mbox_scode($post_type) {
    if( abcfal_optns_is_custom_post ( $post_type ) ) {
        add_meta_box(
            'abcfal-mbox-scode',
            abcfal_txtbldr(3),
            'abcfal_mbox_scode_get_data',
            $post_type,
            'normal',
            'high'
            );
    }
}

//Dispaly shortcode
function abcfal_mbox_scode_get_data( $post ) {

    $args = array(
        'id' => $post->ID,
        'template'  => abcfal_optns_post_theme($post)
     );

    $scode = abcfal_scodes_build_scode( $args );
    echo abcfal_inputbldr_input_txt_readonly('abcfalScode', '', $scode, 0,9, '100%', 'abcfalInputB');
}


