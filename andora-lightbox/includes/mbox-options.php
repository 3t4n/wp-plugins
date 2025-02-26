<?php
/**
 * Meta box: Post Options
 *
 */

add_action( 'add_meta_boxes', 'abcfal_add_mbox_optns', 10, 2 );
add_action( 'save_post', 'abcfal_mbox_save_optns', 10, 2 );

//Add meta box
function abcfal_add_mbox_optns($post_type) {
    if ( abcfal_optns_is_custom_post ( $post_type ) ) {
        add_meta_box(
            'abcfal_mbox_get_optns',
            __('Options', 'abcfal-td'),
            'abcfal_mbox_get_optns',
            $post_type,
            'normal',
            'high'
            );
    }
}

//Render meta box.
function abcfal_mbox_get_optns( $post) {

    $optns = get_post_custom( $post->ID );
    //$cntrH = isset( $optns['_abcfal_cntr_h'] ) ? esc_attr( $optns['_abcfal_cntr_h'][0] ) : '';
    $cntrW = isset( $optns['_abcfal_cntr_w'] ) ? esc_attr( $optns['_abcfal_cntr_w'][0] ) : '';
    $cntrTM = isset( $optns['_abcfal_cntr_tm'] ) ? esc_attr( $optns['_abcfal_cntr_tm'][0] ) : '';
    $cntrLM = isset( $optns['_abcfal_cntr_lm'] ) ? esc_attr( $optns['_abcfal_cntr_lm'][0] ) : '';

    echo abcfal_inputbldr_hlp_wrap_mtb12(abcfal_txtbldr(35));
    echo abcfal_inputbldr_hlp_wrap(abcfal_txtbldr(37));
    echo abcfal_inputbldr_input_txt('alCntrW', '', $cntrW, 30,38);
    //echo abcfal_inputbldr_input_txt('alCntrH', '', $cntrH, 31,32);
    echo abcfal_inputbldr_input_txt('alCntrTM', '', $cntrTM, 34,39);
    echo abcfal_inputbldr_input_txt('alCntrLM', '', $cntrLM, 33,39);


    wp_nonce_field( basename( __FILE__ ), 'abcfal_nonce_cntroptns' );
}

//Save meta box data.
function abcfal_mbox_save_optns( $post_id, $post ) {
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }
    if ( !isset( $_POST['abcfal_nonce_cntroptns'] ) || !wp_verify_nonce( $_POST['abcfal_nonce_cntroptns'], basename( __FILE__ ) ) ) { return $post_id; }

    $oPpost = get_post_type_object( $post->post_type );
    if ( !current_user_can( $oPpost->cap->edit_post, $post_id ) ){return $post_id;}

    abcfal_mbsave_save_css_size( $post_id,  'alCntrH', '_abcfal_cntr_h');
    abcfal_mbsave_save_css_size( $post_id,  'alCntrW', '_abcfal_cntr_w');
    abcfal_mbsave_save_css_size( $post_id,  'alCntrLM', '_abcfal_cntr_lm');
    abcfal_mbsave_save_css_size( $post_id,  'alCntrTM', '_abcfal_cntr_tm');


}