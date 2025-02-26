<?php

//Checking login with ajax //

function mith_arcl_ajaxlogin(){ 
    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );

    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;

    $user_signon = wp_signon( $info, false );
    if ( is_wp_error($user_signon) ){
        echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.')));
    } else {
        echo json_encode(array('loggedin'=>true, 'message'=>__('Login successful, redirecting...')));
    }

    die();
}

add_action( 'wp_ajax_mith_arcl_ajaxlogin', 'mith_arcl_ajaxlogin' );
add_action( 'wp_ajax_nopriv_mith_arcl_ajaxlogin', 'mith_arcl_ajaxlogin' );
?>