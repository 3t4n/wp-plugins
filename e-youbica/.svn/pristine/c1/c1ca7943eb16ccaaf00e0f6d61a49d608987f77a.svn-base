<?php 
add_action( 'rest_api_init', 'youbica_router' );

function youbica_router() {  
    register_rest_route( 'youbica', 'login', array(
        'methods' => 'POST',
        'callback' => 'login_youbica'
    ));
    register_rest_route( 'youbica', 'amigos', array(
        'methods' => 'POST',
        'callback' => 'amigos_youbica'
    ));
    /*register_rest_route( 'youbica', 'clear-aux-address', array(
        'methods' => 'POST',
        'callback' => 'youbica_clearAuxAddress'
    ));*/
}

function login_youbica($request) {
    $response = wp_remote_request( YOUBICA_API_URL . '/auth/login',
        array(
            'method'     => 'POST',
            'headers' => array('S-Authorization' => 'Bearer ' . base64_encode(get_option( 'ybp_public_key' )), 'Yb-Plugin' => 'WC'),
            'body'      => array(
                'correo' => $request['email'],
                'password' => $request['password']
            )
        )
    );
    if(is_object($response) && (get_class($response) == WP_Error::class)) return rest_ensure_response($response);
    $body = json_decode(wp_remote_retrieve_body($response));
   /*  if($body->success && $request['user'] != 0){
        update_user_meta(  $request['user'], 'token_user_youbica', $body->hash );  
        update_user_meta(  $request['user'], 'name_user_youbica', $body->nombreCuenta );
        update_user_meta(  $request['user'], 'id_user_youbica', $body->userSession->id );  
    }  */
    return rest_ensure_response($body); 
}
 
function amigos_youbica($request){
    $array = $request->get_params();  
    $response = wp_remote_request( YOUBICA_API_URL . '/amigos',
        array(
            'method'     => 'GET',
            'headers' => array(
                'S-Authorization' => 'Bearer ' . base64_encode(get_option( 'ybp_public_key' )),
                'Authorization' => 'Bearer ' . $array['token'],
                'Yb-Plugin' => 'WC'
            ),
            'body'      => array(
                'nombre' => $array['nombre']
            )
        )
    );
    if(is_object($response) && (get_class($response) == WP_Error::class)) return rest_ensure_response($response);
    $body = json_decode(wp_remote_retrieve_body($response));
    
    return rest_ensure_response($body);
}

/*function youbica_clearAuxAddress($request){
    do_action('youbica_delete_aux_shipping_address');
}*/
?>
