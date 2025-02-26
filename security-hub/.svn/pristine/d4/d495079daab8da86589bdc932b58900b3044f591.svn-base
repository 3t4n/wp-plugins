<?php
if(isset($_POST['key'])){
    checkKey();
}

function checkKey(){
    $AUTH_KEY = AUTH_KEY;
    $SECURE_AUTH_KEY = SECURE_AUTH_KEY;
    $LOGGED_IN_KEY = LOGGED_IN_KEY;
    $NONCE_KEY = NONCE_KEY;
    $AUTH_SALT = AUTH_SALT;
    $SECURE_AUTH_SALT = SECURE_AUTH_SALT;
    $LOGGED_IN_SALT = LOGGED_IN_SALT;
    $NONCE_SALT = NONCE_SALT;

    $rand_token = openssl_random_pseudo_bytes(16);
    $token = bin2hex($rand_token);

    if($AUTH_KEY == 'put your unique phrase here' || 'Mettere la vostra frase unica qui'){
        define('WPSH_AUTH_KEY_', $token);
    } else {echo esc_html( __('errore'));}
    
    if($SECURE_AUTH_KEY == 'put your unique phrase here' || 'Mettere la vostra frase unica qui'){
        define('WPSH_SECURE_AUTH_KEY_', $token);
    } else {echo esc_html( __('errore'));}

    if($LOGGED_IN_KEY == 'put your unique phrase here' || 'Mettere la vostra frase unica qui'){
        define('WPSH_LOGGED_IN_KEY_', $token);
    } else {echo esc_html( __('errore'));}

    if($NONCE_KEY == 'put your unique phrase here' || 'Mettere la vostra frase unica qui'){
        define('WPSH_NONCE_KEY_', $token);
    } else {echo esc_html( __('errore'));}

    if($AUTH_SALT == 'put your unique phrase here' || 'Mettere la vostra frase unica qui'){
        define('WPSH_AUTH_SALT_', $token);
    } else {echo esc_html( __('errore'));}

    if($SECURE_AUTH_SALT == 'put your unique phrase here' || 'Mettere la vostra frase unica qui'){
        define('WPSH_SECURE_AUTH_SALT_', $token);
    } else {echo esc_html( __('errore'));}

    if($LOGGED_IN_SALT == 'put your unique phrase here' || 'Mettere la vostra frase unica qui'){
        define('WPSH_LOGGED_IN_SALT_', $token);
    } else {echo esc_html( __('errore'));}

    if($NONCE_SALT == 'put your unique phrase here' || 'Mettere la vostra frase unica qui'){
        define('WPSH_NONCE_SALT_', $token);
    } else {echo esc_html( __('errore'));}

}

use const WPSH_AUTH_KEY_ as AUTH_KEY;
use const WPSH_SECURE_AUTH_KEY_ as SECURE_AUTH_KEY;
use const WPSH_LOGGED_IN_KEY_ as LOGGED_IN_KEY;
use const WPSH_NONCE_KEY_ as NONCE_KEY;
use const WPSH_AUTH_SALT_ as AUTH_SALT;
use const WPSH_SECURE_AUTH_SALT_ as SECURE_AUTH_SALT;
use const WPSH_LOGGED_IN_SALT_ as LOGGED_IN_SALT;
use const WPSH_NONCE_SALT_ as NONCE_SALT;
        

?>