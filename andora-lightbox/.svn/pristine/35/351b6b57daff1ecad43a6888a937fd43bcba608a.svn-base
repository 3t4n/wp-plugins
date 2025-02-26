<?php
/**
 * abcfMBColl
 */
add_action( 'add_meta_boxes', 'abcfal_add_mbox_coll', 10,2 );
add_action( 'save_post', 'abcfal_mbox_coll_save_data', 10, 2 );

function abcfal_add_mbox_coll($post_type) {
    if ( abcfal_optns_is_custom_post ( $post_type ) ) {
        add_meta_box(
            'abcfal-mbox-coll',
            abcfal_txtbldr(2),
            'abcfal_mbox_coll_get_data',
            $post_type,
            'normal',
            'high'
        );
    }
}

function abcfal_mbox_coll_get_data( $post ) {

    $optns = get_post_custom( $post->ID );

    $collID = isset( $optns['_abcfal_coll_id'] ) ? esc_attr( $optns['_abcfal_coll_id'][0] ) : '0';

    $cboColls = array();
    if(function_exists('abcfic_dbu_cbo_collections')) {
        $cboColls = abcfic_dbu_cbo_collections();
    }
    else {
        abcfal_msgs_error(17);
        return;
    }
    echo abcfal_inputbldr_input_cbo('abcfalCollID', '',$cboColls, $collID, 0, 0,'40%');

    wp_nonce_field( basename( __FILE__ ), 'abcfal_mbox_coll_nc' );
}

function abcfal_mbox_coll_save_data( $post_id, $post ) {

    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }
    if ( !isset( $_POST['abcfal_mbox_coll_nc'] ) || !wp_verify_nonce( $_POST['abcfal_mbox_coll_nc'], basename( __FILE__ ) ) ) { return $post_id; }
    $oPpost = get_post_type_object( $post->post_type );
    if ( !current_user_can( $oPpost->cap->edit_post, $post_id ) ){return $post_id;}

    abcfal_mbsave_save_cbo( $post_id, 'abcfalCollID', '_abcfal_coll_id', '0');
}