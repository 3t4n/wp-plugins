<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / EXTRAS / TOGGLE-AVAILABLE-ADS /
//      GET-TOGGLE-AVAILABLE-AD-URL.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_toggleAvailableAds ;

// =============================================================================
// get_toggle_available_ad_url()
// =============================================================================

function get_toggle_available_ad_url(
    $core_plugapp_dirs      ,
    $available_ad_record
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_toggleAvailableAds\
    // get_toggle_available_ad_url(
    //      $core_plugapp_dirs      ,
    //      $available_ad_record
    //      )
    // - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $toggle_available_ad_url STRING
    //
    //      On FAILURE
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $available_ad_record = Array(
    //          [created_server_datetime_utc]       => 1421569635
    //          [last_modified_server_datetime_utc] => 1421569635
    //          [key]                               => cfe6de47-5c12-4397-b9f6-61af9d6fd1d5-1421569635-787371-1425
    //          [global_sid]                        => ncgh-vzkm
    //          [ad_swapper_site_sid]               => 2kcv-gwhz
    //          [image_url]                         => http://localhost/plugdev/wp-content/uploads/2014/06/rookie-mag-postcards-from-wonderland.jpeg
    //          [link_url]                          => http://www.google.co.nz
    //          [alt_text]                          =>
    //          [description]                       =>
    //          [start_datetime]                    =>
    //          [end_datetime]                      =>
    //          [aspect_ratio_min]                  =>
    //          [aspect_ratio_max]                  =>
    //          [sequence_number]                   =>
    //          [question_display]                  => 1
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $available_ad_record ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_SERVER ) ;

    // =========================================================================
    // Get a "Form Secret"...
    // =========================================================================

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/form-secrets.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_formSecrets\
    // get_new_form_secret(
    //      $form_name                  ,
    //      $instance_data_or_hash
    //      )
    // - - - - - - - - - - - - - - - - -
    // A "form secret" is a 128 character random hex string.  That's unique to
    // the supplied:-
    //      o   $form_name
    //      o   $instance_data_or_hash
    // and;
    //      o   $_SERVER['REMOTE_ADDR']
    //      o   $_SERVER['HTTP_USER_AGENT']
    //
    // A copy of the form secret and the above details is kept in a record
    // in the "Form Secrets" dataset.  The form secret should be included in
    // the GET/POST data when the form is submitted.  The submission is then
    // only accepted if a "Form Secrets" record with the matching details
    // exists.
    //
    // RETURNS
    //      On SUCCESS
    //          $form_secret STRING
    //
    //      On FAILURE
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    $form_name = 'toggle-available-ad' ;

    $instance_data_or_hash = $available_ad_record['global_sid'] ;

    // -------------------------------------------------------------------------

    $form_secret =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_formSecrets\get_new_form_secret(
            $form_name                  ,
            $instance_data_or_hash
            ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $form_secret ) ) {
        return $form_secret ;
    }

    // =========================================================================
    // Get the "return to" URL
    // =========================================================================

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/url-utils.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\
    // get_current_page_url(
    //      $question_die_on_error = FALSE
    //      )
    // - - - - - - - - - - - - - - - - - -
    // Attempts to retrieve the current page URL from $_SERVER.  Returns
    // (eg):-
    //      http://www.example.com/path/to/some-file.php
    //
    // In other words, the returned URL will general include ALL the URL
    // components (SCHEME, HOST, PORT, PATH, QUERY and FRAGMENT).  However,
    // only those components present in the calling URL will be returned.
    //
    // RETURNS
    //      o   On SUCCESS!
    //          -----------
    //          $current_page_url STRING
    //
    //      o   On FAILURE!
    //          -----------
    //          If $question_die_on_error = TRUE
    //              Doesn't return
    //          If $question_die_on_error = FALSE
    //              array( $error_message STRING )
    // -------------------------------------------------------------------------

    $question_die_on_error = FALSE ;

    // -------------------------------------------------------------------------

    $return_to_url =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\get_current_page_url(
            $question_die_on_error
            ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $return_to_url ) ) {
        return $return_to_url ;
    }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $return_to_url , '$return_to_url' ) ;

    // -------------------------------------------------------------------------

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/string-utils.php' ) ;

    // -------------------------------------------------------------------------

    $return_to_url =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\hex_encode( $return_to_url )
        ;

    // =========================================================================
    // Construct the URL...
    // =========================================================================

//  require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/path-utils.php' ) ;
//
//  // -------------------------------------------------------------------------
//  // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_pathUtils\
//  // wp_path2url(
//  //      $path
//  //      )
//  // - - - - - -
//  // RETURNS:-
//  //      o   $url on SUCCESS
//  //      o   array( $error_message ) on FAILURE
//  // -------------------------------------------------------------------------
//
//  $target_filespec = dirname( __FILE__ ) . '/toggle-available-ad.php' ;
//
//  // -------------------------------------------------------------------------
//
//  $url =
//      \greatKiwi_byFernTec_adSwapper_local_v0x1x211_pathUtils\wp_path2url(
//          $target_filespec
//          ) ;
//
//  // -------------------------------------------------------------------------
//
//  if ( is_array( $url ) ) {
//      return $url ;
//  }

    // -------------------------------------------------------------------------

    $url = \admin_url( 'admin-ajax.php' ) ;

    // -------------------------------------------------------------------------

    if ( $available_ad_record['question_display'] ) {
        $to = 'false' ;
    } else {
        $to = 'true' ;
    }

    // -------------------------------------------------------------------------

    $url .= <<<EOT
?action=greatKiwi_byFerntec_toggleAvailableAds&adid={$available_ad_record['global_sid']}&to={$to}&secret={$form_secret}&return_to={$return_to_url}
EOT;

    // =========================================================================
    // SUCCESS
    // =========================================================================

    return $url ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

