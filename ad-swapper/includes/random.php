<?php

// *****************************************************************************
// INCLUDES / RANDOM.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_random ;

// =============================================================================
// secure_rand()
// =============================================================================

function secure_rand(
    $length
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_random\
    // secure_rand(
    //      $length
    //      )
    // - - - - - -
    // According to it's author, this routine generates a really strong
    // random number in PHP.
    //
    // See:-
    //      http://www.zimuel.it/strong-cryptography-in-php/
    //
    // NOTES!
    // ======
    // 1.   $length is in bytes.
    //
    // 2.   By default, this function calls PHPs:-
    //          openssl_random_pseudo_bytes()
    //      function (which is supposedly the best way to generate random
    //      numbers in PHP).
    //
    // 3.   The returned value is a STRING.
    //
    // 4.   The returned STRING is binary (NOT hex-encoded).  Thus it's just
    //      rubbish characters (when displayed).
    // -------------------------------------------------------------------------

    if ( \function_exists( '\\openssl_random_pseudo_bytes' ) ) {
        $rnd = \openssl_random_pseudo_bytes( $length , $strong ) ;
        if ( $strong === TRUE ) {
            return $rnd ;
        }
    }

    $sha = '' ;
    $rnd = '' ;

    if ( \file_exists( '/dev/urandom' ) ) {
        $fp = \fopen( '/dev/urandom' , 'rb' ) ;
        if ( $fp ) {
            if ( \function_exists( 'stream_set_read_buffer' ) ) {
                \stream_set_read_buffer( $fp , 0 ) ;
            }
            $sha = \fread( $fp , $length ) ;
            \fclose( $fp ) ;
        }
    }

    for ( $i=0 ; $i<$length ; $i++ ) {
        $sha  = \hash( 'sha256' , $sha.mt_rand() ) ;
        $char = \mt_rand(0,62) ;
        $rnd .= \chr( \hexdec( $sha[$char] . $sha[$char+1] ) ) ;
      }

    return $rnd;

}

// =============================================================================
// That's that!
// =============================================================================

