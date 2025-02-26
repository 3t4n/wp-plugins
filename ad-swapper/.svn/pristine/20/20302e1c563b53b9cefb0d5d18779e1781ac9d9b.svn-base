<?php

// *****************************************************************************
// INCLUDES / MCRYPT-SUPPORT.PHP
// (C) Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_mcryptSupport ;

// -----------------------------------------------------------------------------
// Routines from:-
//      http://www.warpconduit.net/2013/04/14/highly-secure-data-encryption-decryption-made-easy-with-php-mcrypt-rijndael-256-and-cbc/
//
// NOTE!
// =====
// The key must be 32 bytes long (= 64 bytes once hex-encoded).  Ie:-
//
//      "Define a 32-byte (64 character) hexadecimal encryption key
//      Note: The same encryption key used to encrypt the data must be used to decrypt the data
//      define('ENCRYPTION_KEY', 'd0a7e7997b6d5fcd55f4b5c32611b87cd923e88837b63bf2941ef819dc8ca282');"
//
// NOTE!
// =====
// To get the required key:-
//      require_once( '.../includes/random.php' ) ;
//      $key = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_random\secure_rand( 32 ) ;
//      require_once( '.../includes/string-utils' ) ;
//      $key = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\hex_encode( $key ) ;
// -----------------------------------------------------------------------------

// =============================================================================
// mc_encrypt()
// =============================================================================

function mc_encrypt( $data_to_encrypt , $key ) {
    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mcryptSupport\
    // mc_encrypt( $data_to_encrypt , $key )
    // - - - - - - - - - - - - - - - - - - -
    // $data_to_encrypt is assumed to be a serialised or json-encoded string.
    // $key must be a 32-byte random binary string that's been hex-encoded
    // (and so is now 64 bytes).
    // (See the Warning in "unserialize()" - which says JSON safer.)
    // Returns the encypted data as a base64 encoded string.
    // -------------------------------------------------------------------------
//  $data_to_encrypt = serialize($data_to_encrypt);
    $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC), MCRYPT_DEV_URANDOM);
    $key = pack('H*', $key);
    $mac = hash_hmac('sha256', $data_to_encrypt, substr(bin2hex($key), -32));
    $passcrypt = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $data_to_encrypt.$mac, MCRYPT_MODE_CBC, $iv);
    $encoded = base64_encode($passcrypt).'|'.base64_encode($iv);
    return $encoded;
    // -------------------------------------------------------------------------
}

// =============================================================================
// mc_decrypt()
// =============================================================================

function mc_decrypt( $data_to_decrypt, $key ) {
    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mcryptSupport\
    // mc_decrypt( $data_to_encrypt , $key )
    // - - - - - - - - - - - - - - - - - - -
    // $data_to_encrypt is assumed to be a base64 encoded string (as created
    // by "mc_encrypt()").
    // $key must be a 32-byte random binary string that's been hex-encoded
    // (and so is now 64 bytes).  Must also be the same as the $key supplied
    // to "mc_encrypt()".
    // Returns the encypted data as an (assumed) serialised or json-encoded
    // string.
    // -------------------------------------------------------------------------
    $data_to_decrypt = explode('|', $data_to_decrypt.'|');
    $decoded = base64_decode($data_to_decrypt[0]);
    $iv = base64_decode($data_to_decrypt[1]);
    if(strlen($iv)!==mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)){ return false; }
    $key = pack('H*', $key);
    $decrypted = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $decoded, MCRYPT_MODE_CBC, $iv));
    $mac = substr($decrypted, -64);
    $decrypted = substr($decrypted, 0, -64);
    $calcmac = hash_hmac('sha256', $decrypted, substr(bin2hex($key), -32));
    if($calcmac!==$mac){ return false; }
//  $decrypted = unserialize($decrypted);
    return $decrypted;
    // -------------------------------------------------------------------------
}

// =============================================================================
// That's that!
// =============================================================================

