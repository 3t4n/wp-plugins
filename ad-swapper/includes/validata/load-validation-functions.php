<?php

// *****************************************************************************
// INCLUDES / LOAD-VALIDATOR-FUNCTIONS.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_validata ;

// =============================================================================
// load_validation_functions()
// =============================================================================

function load_validation_functions() {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validata\
    // load_validation_functions()
    // - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          TRUE
    //
    //      On FALSE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $here = dirname( __FILE__ ) . '/' ;

    require_once( $here . 'validation-support.php' ) ;

    require_once( $here . 'boolean-validators.php' ) ;

    require_once( $here . 'string-validators.php' ) ;

    require_once( $here . 'url-validators.php' ) ;

    require_once( $here . 'ip-address-validators.php' ) ;

    require_once( $here . 'geoip-validators.php' ) ;

    require_once( $here . 'css-validators.php' ) ;

    require_once( $here . 'float-validators.php' ) ;

    return TRUE ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

