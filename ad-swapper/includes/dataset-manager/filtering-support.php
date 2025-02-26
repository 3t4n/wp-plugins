<?php

// *****************************************************************************
// DATASET-MANAGER / FILTERING-SUPPORT.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// =============================================================================
// get_filter_cookie_name_and_value()
// =============================================================================

function get_filter_cookie_name_and_value(
    $safe_dataset_title         ,
    $filter_details             ,
    $selected_pv                ,
    $question_cookie_required
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_filter_cookie_name_and_value(
    //      $safe_dataset_title         ,
    //      $filter_details             ,
    //      $selected_pv                ,
    //      $question_cookie_required
    //      )
    // - - - - - - - - - - - - - - - - -
    // $selected_pv should be the validated value obtained from $_GET['pv'] (or
    // the empty string, if NO $_GET['pv'] exists).
    //
    // If NO cookie name was specified (in the filter definition), returns
    //      array(
    //          NULL    ,
    //          NULL
    //          )
    //
    // Returns the filter specified default cookie value, if the cookie name
    // cookie wasn't set.
    //
    // RETURNS
    //      On SUCCESS
    //          array(
    //              $cookie_name    ,
    //              $cookie_value
    //              )
    //          --OR--
    //          array(
    //              NULL    ,
    //              NULL
    //              )
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $filter_details     ,
//    '$filter_details'
//    ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $selected_pv        ,
//    '$selected_pv'
//    ) ;

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // =========================================================================
    // cookie_name ?
    // =========================================================================

    if (    $selected_pv !== ''
            &&
            array_key_exists(
                'cookie_names_by_pv_slug'   ,
                $filter_details
                )
            &&
            is_array( $filter_details['cookie_names_by_pv_slug'] )
            &&
            array_key_exists(
                $selected_pv                                ,
                $filter_details['cookie_names_by_pv_slug']
                )
            &&
            is_string( $filter_details['cookie_names_by_pv_slug'][ $selected_pv ] )
            &&
            trim( $filter_details['cookie_names_by_pv_slug'][ $selected_pv ] ) !== ''
        ) {

        // ---------------------------------------------------------------------

        if ( ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_alphanumeric_underscore_dash(
                    $filter_details['cookie_names_by_pv_slug'][ $selected_pv ]
                    )
            ) {

            $ln = __LINE__ - 4 ;

            $safe_selected_pv = htmlentities( $selected_pv ) ;

            return <<<EOT
PROBLEM:&nbsp; Bad filter "cookie_name" for page variant (non-empty string expected; alphanumeric + "-" and "_" only)
For dataset:&nbsp; {$safe_dataset_title}
And page variant:&nbsp; {$safe_selected_pv}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

        $cookie_name = $filter_details['cookie_names_by_pv_slug'][ $selected_pv ] ;

        // ---------------------------------------------------------------------

    } elseif (  array_key_exists( 'cookie_name' , $filter_details )
                &&
                is_string( $filter_details['cookie_name'] )
                &&
                trim( $filter_details['cookie_name'] ) !== ''
        ) {

        // ---------------------------------------------------------------------

        if ( ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_alphanumeric_underscore_dash(
                    $filter_details['cookie_name']
                    )
            ) {

            $ln = __LINE__ - 4 ;

            return <<<EOT
PROBLEM:&nbsp; Bad filter "cookie_name" (non-empty string expected; alphanumeric + "-" and "_" only)
For dataset:&nbsp; {$safe_dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

        $cookie_name = $filter_details['cookie_name'] ;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        if ( $question_cookie_required ) {

            $ln = __LINE__ - 4 ;

            return <<<EOT
PROBLEM:&nbsp; Can't find "cookie_name"
For dataset:&nbsp; {$safe_dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

        return array(
                    NULL    ,
                    NULL
                    ) ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Get the COOKIE VALUE (from the COOKIE)...
    // =========================================================================

    $cookie_value = '' ;

    // -------------------------------------------------------------------------

    if ( array_key_exists( $cookie_name , $_COOKIE ) ) {

        // ---------------------------------------------------------------------
        // Cookie Exists
        // ---------------------------------------------------------------------

        $cookie_value = $_COOKIE[ $cookie_name ] ;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------
        // Cookie NOT Found!
        //      =>  Use default value
        // ---------------------------------------------------------------------

        if (    $selected_pv !== ''
                &&
                array_key_exists(
                    'default_cookie_values_by_pv_slug'  ,
                    $filter_details
                    )
                &&
                is_array( $filter_details['default_cookie_values_by_pv_slug'] )
                &&
                array_key_exists(
                    $selected_pv                                            ,
                    $filter_details['default_cookie_values_by_pv_slug']
                    )
            ) {

            // -----------------------------------------------------------------

            if ( ! is_string( $filter_details['default_cookie_values_by_pv_slug'][ $selected_pv ] ) ) {

                $ln = __LINE__ - 2 ;

                $safe_selected_pv = htmlentities( $selected_pv ) ;

                return <<<EOT
PROBLEM:&nbsp; Bad "default_cookie_value" for page variant (string expected)
For dataset:&nbsp; {$safe_dataset_title}
And page variant:&nbsp; {$safe_selected_pv}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

            }

            // -----------------------------------------------------------------

            $default_cookie_value = $filter_details['default_cookie_values_by_pv_slug'][ $selected_pv ] ;

            // -----------------------------------------------------------------

        } elseif ( array_key_exists( 'default_cookie_value' , $filter_details ) ) {

            // -----------------------------------------------------------------

            if ( ! is_string( $filter_details['default_cookie_value'] ) ) {

                $ln = __LINE__ - 2 ;

                return <<<EOT
PROBLEM:&nbsp; Bad "default_cookie_value" (string expected)
For dataset:&nbsp; {$safe_dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

            }

            // -----------------------------------------------------------------

            $default_cookie_value = $filter_details['default_cookie_value'] ;

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------

            $default_cookie_value = '' ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        $cookie_value = $default_cookie_value ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return array(
                $cookie_name    ,
                $cookie_value
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

