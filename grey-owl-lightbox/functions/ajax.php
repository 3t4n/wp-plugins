<?php

add_action( 'wp_ajax_nopriv_grey_owl_lightbox_callback', 'grey_owl_lightbox_callback' );
add_action( 'wp_ajax_grey_owl_lightbox_callback', 'grey_owl_lightbox_callback' );
function grey_owl_lightbox_callback(){
    $result = array(
        'html'       => '',
        'parameters' => array(),
        'error'      => true,
        'message'    => '',
    );
    $nonce_enable = GreyOwllightboxOBJ::get_field_value('gol_nonce_token_enable');
    $nonce = ( isset( $_POST['nonce'] ) && is_string( $_POST['nonce'] ) ) ? $_POST['nonce'] : '';
    if( ( $nonce_enable && wp_verify_nonce( $nonce, 'go_lightbox_nonce') ) || !$nonce_enable ){
        if( isset( $_POST['data'] ) && $_POST['data'] ){
            $params = ( isset( $_POST['params'] ) && $_POST['params'] ) ? $_POST['params'] : array();
            if( isset( $_POST['params'] ) && $_POST['params'] ){
                if( is_array( $_POST['params'] ) ){
                    $params = gol_array_value_esc_html( $_POST['params'] );
                } elseif ( is_string( $_POST['params'] ) ) {
                    $params = esc_attr( $_POST['params'] );
                } else {
                    $params = array();
                }
            } else {
                $params = array();
            }
            $function_name = sanitize_html_class( $_POST['data'] );
            if( GreyOwllightboxOBJ::gol_callback_exists( $function_name ) ){
                gol_callback_parameters( array() );
                ob_start();
                echo GreyOwllightboxOBJ::get_ajax_callback( $function_name, $params );
                $function_result = ob_get_contents();
                ob_end_clean();
                $result['html']  = $function_result;
                $result['error'] = false;
                $result['parameters'] = GreyOwllightboxOBJ::get_ajax_callback_parameters();
            } else {
                $result['message'] = esc_html__('not exist', 'greyowl');
            }
        }
    } else {
        $result['message'] = 'nonce';
    }
    wp_send_json( $result );
}
