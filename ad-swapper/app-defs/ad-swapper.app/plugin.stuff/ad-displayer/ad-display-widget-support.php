<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / AD-DISPLAYER / AD-DISPLAY-WIDGET-SUPPORT.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer ;

// =============================================================================
// get_ads_to_display()
// =============================================================================

function get_ads_to_display(
    $that           ,
    $args           ,
    $instance
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_ads_to_display(
    //      $that           ,
    //      $args           ,
    //      $instance
    //      )
    // - - - - - - - - - - - - - - - - -
    // Generates and returns the front-end HTML that goes where the widget
    // is.  In other words, generates and returns the Ad Swapper ad (or ads),
    // to go in the widget's ad slot.
    //
    // ---
    //
    // $args is the widget settings - including "before_title", "after_title",
    // "before_widget", and "after_widget".
    //
    // $instance holds the previously saved values from the WordPress
    // options database.
    //
    // Returns the widget HTML (which could be an error message).
    //
    // RETURNS
    //      $widget_html STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $that = greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\ad_swapper_ad_display_widget Object(
    //                  [id_base]           => ad_swapper_ad_display_widget
    //                  [name]              => Ad Swapper Ad Displayer
    //                  [widget_options]    => Array(
    //                                              [classname]   => widget_ad_swapper_ad_display_widget
    //                                              [description] => Drag me to the widget area(s) you want to display Ad Swapper Ads in...
    //                      )
    //                  [control_options]   => Array(
    //                                              [id_base] => ad_swapper_ad_display_widget
    //                      )
    //                  [number]            => 2
    //                  [id]                => ad_swapper_ad_display_widget-2
    //                  [updated]           =>
    //                  [option_name]       => widget_ad_swapper_ad_display_widget
    //                  )
    //
    // -------------------------------------------------------------------------

//ob_start() ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $that , '$that' ) ;
//$pr = ob_get_clean() ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $args = Array(
    //                  [name]          => Main Sidebar
    //                  [id]            => themonic-sidebar
    //                  [description]   => This is a Sitewide sidebar which appears on posts and pages
    //                  [class]         =>
    //                  [before_widget] =>
    //                  [after_widget]  =>
    //                  [before_title]  =>
    //                  [after_title]   =>
    //                  [widget_id]     => ad_swapper_ad_display_widget-2
    //                  [widget_name]   => Ad Swapper Ad Displayer
    //                  )
    //
    // -------------------------------------------------------------------------

//ob_start() ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $args , '$args' ) ;
//$pr .= ob_get_clean() ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $instance = Array(
    //                      [title]   =>
    //                      [message] =>
    //                      )
    //
    // -------------------------------------------------------------------------

//ob_start() ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $instance , '$instance' ) ;
//$pr .= ob_get_clean() ;

    // -------------------------------------------------------------------------
    // OVERVIEW
    // ========
    // Sadly, the widget settings save functionality built into WordPress
    // doesn't seem to work.  So although the user can "Save" the form we
    // create here, when the form is re-displayed, the:-
    //      $instance
    //
    // (shown above) is supplied with all variables (eg; "title" and
    // "message", the example above), set to the empty string.
    //
    // So we save the settings in ARRAY STORAGE.
    // -------------------------------------------------------------------------

//  /**
//   * Outputs the content of the widget
//   *
//   * @param array $args
//   * @param array $instance
//   */
//  public function widget( $args, $instance ) {
//      // outputs the content of the widget
//  }

//  /**
//   * Front-end display of widget.
//   *
//   * @see WP_Widget::widget()
//   *
//   * @param array $args     Widget arguments.
//   * @param array $instance Saved values from database.
//   */
//  public function widget( $args, $instance )

//  widget (line 44)
//  Echo the widget content.
//  Subclasses should over-ride this function to generate their widget code.
//
//  void widget (array $args, array $instance)
//      array $args: Display arguments including before_title, after_title, before_widget, and after_widget.
//      array $instance: The settings for the particular instance of the widget

    // =========================================================================
    // If there's NO:-
    //      $_SERVER['REMOTE_ADDR']
    //
    // then display NO ads...
    // =========================================================================

    if (    ! array_key_exists( 'REMOTE_ADDR' , $_SERVER )
            ||
            trim( $_SERVER['REMOTE_ADDR'] ) === ''
        ) {
        return '' ;
    }

$_SERVER['REMOTE_ADDR'] = '101.98.158.73' ;

    // =========================================================================
    // Init.
    // =========================================================================

//error_reporting( E_ALL ) ;
//ini_set( 'display_errors' , '1' ) ;

    // -------------------------------------------------------------------------

//  $ns = __NAMESPACE__ ;
//  $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    $ad_slots_dataset_slug = 'ad_swapper_ad_slots' ;

    $widget_settings_dataset_slug = 'ad_swapper_widget_settings' ;

    $available_sites_dataset_slug = 'ad_swapper_available_sites' ;

    $available_ads_dataset_slug = 'ad_swapper_available_ads' ;

    // =========================================================================
    // Get this widget instance's settings...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/widget-settings-support.php' ) ;

    // -------------------------------------------------------------------------
    // greatKiwi_byFernTec_adSwapper_local_v0x1x211_widgetSettingsSupport\
    // load_widget_instance_settings(
    //      $widget_instance_obj                            ,
    //      $widget_settings_dataset_slug                   ,
    //      &$all_application_dataset_definitions = NULL    ,
    //      &$loaded_datasets                     = NULL    ,
    //      &$core_plugapp_dirs                   = NULL    ,
    //      &$app_handle                          = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns this widget instance's currently saved settings (in a PHP
    // associative array).  If the widget instances has NO settings (yet),
    // returns an empty array.
    //
    // Set $loaded_datasets to NULL if the (ARRAY STORAGE) datasets haven't
    // been loaded yet...
    //
    // $app_handle should be (eg):-
    //      "teaser-maker"
    //      "ad-swapper"
    //      ...
    //
    // (and is only required if $loaded_datasets = NULL).
    //
    // RETURNS
    //      On SUCCESS
    //          ARRAY $widget_instance_settings
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $all_application_dataset_definitions = NULL         ;
    $loaded_datasets                     = NULL         ;
    $core_plugapp_dirs                   = NULL         ;
    $app_handle                          = 'ad-swapper' ;

    // -------------------------------------------------------------------------

    $widget_instance_settings =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_widgetSettingsSupport\load_widget_instance_settings(
            $that                                   ,
            $widget_settings_dataset_slug           ,
            $all_application_dataset_definitions    ,
            $loaded_datasets                        ,
            $core_plugapp_dirs                      ,
            $app_handle
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $widget_instance_settings ) ) {
        return nl2br( $widget_instance_settings ) ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $widget_instance_settings = Array(
    //          [ad_slot_key] => 8d00c863-ccf8-467b-bcf0-27f1f176b645-1420699900-596488-1406
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $widget_instance_settings       ,
//    '$widget_instance_settings'
//    ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $loaded_datasets = Array(
    //
    //          [ad_swapper_ad_slots] => Array(
    //              [title]         => Ad Slots
    //              [records]       => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_utc]       => 1420622748
    //                      [last_modified_server_datetime_utc] => 1420622748
    //                      [key]                               => cf94d256-ece4-4b84-af71-6d562059ee4f-1420622748-483667-1405
    //                      [local_key]                         => 971c0f797cbb593f6a441dabad4494b76b4424a472e8afc99aaad1f82d1a7142
    //                      [name]                              => right-sidebar
    //                      [title]                             => Right Sidebar
    //                      [description]                       =>
    //                      [width_nominal]                     => 300
    //                      [width_min]                         =>
    //                      [width_max]                         =>
    //                      [height_nominal]                    => 400
    //                      [height_min]                        => 32
    //                      [height_max]                        => 1000
    //                      [question_disabled]                 =>
    //                      [sequence_number]                   => 10
    //                      [global_sid]                        => n2gk-mvwx
    //                      )
    //                  ...
    //                  )
    //              [key_field_slug] => key
    //              [record_indices_by_key] => Array(
    //                  [cf94d256-ece4-4b84-af71-6d562059ee4f-1420622748-483667-1405] => 0
    //                  ...
    //                  )
    //              )
    //
    //          [ad_swapper_available_sites] => Array(
    //              [title]                 => Available Sites
    //              [records]               => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_utc]                   => 1421545408
    //                      [last_modified_server_datetime_utc]             => 1421545408
    //                      [key]                                           => 10906d4d-6d60-4e39-b201-9bf2b52f4347-1421545408-370125-1421
    //                      [ad_swapper_site_sid]                           => 2kcv-gwhz
    //                      [site_title]                                    => Plugdev
    //                      [home_page_url]                                 => http://localhost/plugdev
    //                      [general_description]                           =>
    //                      [ads_wanted_description]                        =>
    //                      [sites_wanted_description]                      =>
    //                      [categories_available]                          =>
    //                      [categories_wanted]                             =>
    //                      [question_display_this_sites_ads_on_your_site]  =>
    //                      [question_display_your_ads_on_this_site]        =>
    //                      )
    //                  ...
    //                  )
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array(
    //                  [10906d4d-6d60-4e39-b201-9bf2b52f4347-1421545408-370125-1421] => 0
    //                  ...
    //                  )
    //              )
    //
    //          [ad_swapper_available_ads] => Array(
    //              [title]                 => Available Ads
    //              [records]               => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_utc]       => 1424903274
    //                      [last_modified_server_datetime_utc] => 1424903274
    //                      [key]                               => 18312494-4835-41a0-8115-304bc016d96c-1424903274-20305-1632
    //                      [global_sid]                        => nwkg-zmhc
    //                      [ad_swapper_site_sid]               => 2kmv-hzgc
    //                      [image_url]                         => http://localhost/plugdev/wp-content/uploads/2014/06/rookie-mag-postcards-from-wonderland.jpeg
    //                      [link_url]                          => http://localhost/plugdev/?page_id=202
    //                      [alt_text]                          =>
    //                      [description]                       =>
    //                      [start_datetime]                    =>
    //                      [end_datetime]                      =>
    //                      [aspect_ratio_min]                  =>
    //                      [aspect_ratio_max]                  =>
    //                      [sequence_number]                   =>
    //                      [geoip_continents_incl]             =>
    //                      [geoip_continents_excl]             =>
    //                      [geoip_countries_incl]              => NZ
    //                      [geoip_countries_excl]              =>
    //                      [geoip_regions_incl]                =>
    //                      [geoip_regions_excl]                =>
    //                      [geoip_cities_incl]                 =>
    //                      [geoip_cities_excl]                 =>
    //                      [question_display]                  => 1
    //                      )
    //                  ...
    //                  )
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array(
    //                  [18312494-4835-41a0-8115-304bc016d96c-1424903274-20305-1632] => 0
    //                  ...
    //                  )
    //              )
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $loaded_datasets , '$loaded_datasets' ) ;

    // =========================================================================
    // Any Ad Slots and Available Sites and Ads ?
    //
    // If NOT, then we can't display any ads...
    // =========================================================================

    if (    count( $loaded_datasets[ $ad_slots_dataset_slug ]['records'] ) < 1
            ||
            count( $loaded_datasets[ $available_sites_dataset_slug ]['records'] ) < 1
            ||
            count( $loaded_datasets[ $available_ads_dataset_slug ]['records'] ) < 1
        ) {
        return '' ;
    }

    // =========================================================================
    // Get the currently selected Ad Slot's key...
    // =========================================================================

    $currently_selected_ad_slot_key = '' ;

    // ---------------------------------------------------------------------------

    if (    array_key_exists( 'ad_slot_key' , $widget_instance_settings )
            &&
            is_string( $widget_instance_settings['ad_slot_key'] )
            &&
            trim( $widget_instance_settings['ad_slot_key'] ) !== ''
        ) {

        // ---------------------------------------------------------------------

        require_once( $core_plugapp_dirs['dataset_manager_includes_dir'] . '/record-key-support.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // is_record_key(
        //      $candidate_record_key
        //      )
        // - - - - - - - - - - - - - - - - -
        // Is the input string a record key like (eg):-
        //
        //      3f2504e0-4f89-11d3-9a0c-0305e82c3301-1400040711-0-1
        //      3f2504e0-4f89-11d3-9a0c-0305e82c3301-1400040711-999977-2147483647
        //      etc
        //
        // RETURNS
        //      o   On SUCCESS
        //              TRUE
        //
        //      o   On FAILURE
        //              FALSE
        // ---------------------------------------------------------------------------

        if (    \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\is_record_key(
                    $widget_instance_settings['ad_slot_key']
                    )
                &&
                array_key_exists(
                    $widget_instance_settings['ad_slot_key']                                ,
                    $loaded_datasets[ $ad_slots_dataset_slug ]['record_indices_by_key']
                    )
            ) {

            $currently_selected_ad_slot_key = $widget_instance_settings['ad_slot_key'] ;

        }

        // ---------------------------------------------------------------------

    }

//ob_start() ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $currently_selected_ad_slot_key , '$currently_selected_ad_slot_key' ) ;
//$pr .= ob_get_clean() ;

    // =========================================================================
    // If we can't find the Ad Slot record that belongs to this widget, then
    // we DON'T display any ads...
    // =========================================================================

    if ( $currently_selected_ad_slot_key === '' ) {
        return '' ;
    }

    // =========================================================================
    // Get the widget's Ad Slot...
    // =========================================================================

    $the_ad_slot =
        $loaded_datasets[ $ad_slots_dataset_slug ]['records'][
            $loaded_datasets[ $ad_slots_dataset_slug ]['record_indices_by_key'][
                $currently_selected_ad_slot_key
                ]
            ] ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $the_ad_slot = Array(
    //          [created_server_datetime_utc]       => 1423272554
    //          [last_modified_server_datetime_utc] => 1423272554
    //          [key]                               => c6886167-8b81-43c4-9bbb-b7391a007356-1423272554-653172-1523
    //          [local_key]                         => 28aba5f6449b8e71f0b96c80a9156f20c0ca451a36e5483c7653579d6f554485
    //          [name]                              => right-sidebar
    //          [title]                             => Right Sidebar
    //          [description]                       =>
    //          [width_nominal]                     => 300
    //          [width_min]                         =>
    //          [width_max]                         =>
    //          [height_nominal]                    => 480
    //          [height_min]                        =>
    //          [height_max]                        =>
    //          [sequence_number]                   =>
    //          [question_disabled]                 =>
    //          [global_sid]                        => 23mk-hzcw
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $the_ad_slot , '$the_ad_slot' ) ;

    // =========================================================================
    // If the Ad Slot is disabled, then we DON'T display any ads...
    // =========================================================================

    if ( $the_ad_slot['question_disabled'] ) {
        return '' ;
    }

    // =========================================================================
    // Make a list of the "ad_swapper_site_sids" of the ENABLED sites...
    // =========================================================================

    $enabled_ad_swapper_site_sids = array() ;

    // -------------------------------------------------------------------------

    foreach ( $loaded_datasets[ $available_sites_dataset_slug ]['records'] as $this_index => $this_record ) {

        if ( $this_record['question_display_this_sites_ads_on_your_site'] ) {
            $enabled_ad_swapper_site_sids[] = $this_record['ad_swapper_site_sid'] ;
        }

    }

    // =========================================================================
    // If NO sites are enabled, then we DON'T display any ads...
    // =========================================================================

    if ( count( $enabled_ad_swapper_site_sids ) < 1 ) {
        return '' ;
    }

    // =========================================================================
    // Get the GeoIP data for the user to whom the current page (and ads)
    // are to be displayed...
    // =========================================================================

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/geoip/alpha/main.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_geoipAlpha\
    // ip_address_to_city_data(
    //      $target_ip
    //      )
    // - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $geoip_info ARRAY
    //
    //          Where (eg):-
    //
    //              $geoip_info = Array(
    //                  [ip]            => 127.0.0.1
    //                  [country_code]  =>
    //                  [country_name]  =>
    //                  [region_code]   =>
    //                  [region_name]   =>
    //                  [city]          =>
    //                  [zip_code]      =>
    //                  [time_zone]     =>
    //                  [latitude]      => 0
    //                  [longitude]     => 0
    //                  [metro_code]    => 0
    //                  )
    //
    //              $geoip_info = Array(
    //                  [ip]            => 118.127.46.63
    //                  [country_code]  => AU
    //                  [country_name]  => Australia
    //                  [region_code]   => QLD
    //                  [region_name]   => Queensland
    //                  [city]          => Brisbane
    //                  [zip_code]      => 4000
    //                  [time_zone]     => Australia/Brisbane
    //                  [latitude]      => -27.485
    //                  [longitude]     => 153.02
    //                  [metro_code]    => 0
    //                  )
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $geoip_info =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_geoipAlpha\
        ip_address_to_city_data(
            $_SERVER['REMOTE_ADDR']
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $geoip_info ) ) {

        return '' ;
            //  Display NO ads

    }

    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $geoip_info , '$geoip_info' ) ;

    if ( trim( $geoip_info['country_code'] ) === '' ) {

        return '' ;
            //  Display NO ads (because we don't know the user's country).

    }

    // =========================================================================
    // Get the required GeoIP info...
    // =========================================================================

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/geoip/alpha/continent-support.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_geoipAlpha\
    // get_country_to_continent_codes_array()
    // - - - - - - - - - - - - - - - - - - -
    // Returns an array like:-
    //
    //      $country_to_continent_codes_array = array(
    //          'AD' => 'EU'
    //          'AE' => 'AS'
    //          'AF' => 'AS'
    //          'AG' => 'NA'
    //          ...
    //          'ZW' => 'AF'
    //          )
    //
    // Where the data was retieved from:-
    //      http://dev.maxmind.com/geoip/legacy/codes/country_continent/
    //
    // on 25 February 2015.
    //
    // RETURNS
    //      $country_to_continent_codes_array ARRAY
    // -------------------------------------------------------------------------

    $country_to_continent_codes_array =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_geoipAlpha\get_country_to_continent_codes_array()
        ;

    // -------------------------------------------------------------------------

    $allowed_two_letter_country_codes =
        array_keys( $country_to_continent_codes_array )
        ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_geoipAlpha\
    // get_continent_codes_to_names_array()
    // - - - - - - - - - - - - - - - - - -
    // Returns an array like (eg):-
    //
    //      $continent_codes_to_names_array = array(
    //          [AS] => Asia                ,
    //          [AF] => Africa              ,
    //          [EU] => Europe              ,
    //          [AN] => Antarctica          ,
    //          [OC] => Oceania             ,
    //          [NA] => North America       ,
    //          [SA] => South America
    //          )
    //
    // -------------------------------------------------------------------------

    $continent_codes_to_names_array =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_geoipAlpha\get_continent_codes_to_names_array()
        ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_geoipAlpha\
    // get_countries_by_continent_codes_array()
    // - - - - - - - - - - - - - - - - - - - -
    // Returns an array like (eg):-
    //
    //      $countries_by_continent_codes_array = array(
    //          'AS' => array(
    //                      'AE'    ,
    //                      'AF'    ,
    //                      'AM'    ,
    //                      ...
    //                      )   ,
    //          'AF' => array(
    //                      'BI'    ,
    //                      'BJ'    ,
    //                      'BW'    ,
    //                      ...
    //                      )   ,
    //          'EU' => array(
    //                      'AD'    ,
    //                      'AL'    ,
    //                      'AT'    ,
    //                      ...
    //                      )   ,
    //          'AN' => array(
    //                      'AQ'    ,
    //                      'BV'    ,
    //                      'GS'    ,
    //                      ...
    //                      )   ,
    //          'OC' => array(
    //                      'AS'    ,
    //                      'AU'    ,
    //                      'CK'    ,
    //                      ...
    //                      )   ,
    //          'NA' => array(
    //                      'AG'    ,
    //                      'AI'    ,
    //                      'AN'    ,
    //                      ...
    //                      )   ,
    //          'SA' => array(
    //                      'AR'    ,
    //                      'BO'    ,
    //                      'BR'    ,
    //                      ...
    //                      )
    //          )
    //
    // -------------------------------------------------------------------------

    $countries_by_continent_codes_array =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_geoipAlpha\get_countries_by_continent_codes_array()
        ;

    // =========================================================================
    // Get the enabled "Available Ads" that:-
    //
    //      a)  Fit in the Ad Slot, and;
    //
    //      b)  May be shown to the current caller (as determined from the
    //          GeoIP info. for the caller's IP address)...
    // =========================================================================

    $candidate_available_ads = array() ;

    // -------------------------------------------------------------------------

    foreach ( $loaded_datasets[ $available_ads_dataset_slug ]['records'] as $this_index => $this_record ) {

        // ---------------------------------------------------------------------

        if ( ! $this_record['question_display'] ) {
            continue ;
        }

        // ---------------------------------------------------------------------

        if ( ! in_array(
                    $this_record['ad_swapper_site_sid']     ,
                    $enabled_ad_swapper_site_sids
                    )
            ) {
            continue ;
        }

        // ---------------------------------------------------------------------

        if ( $_SERVER['REMOTE_ADDR'] !== '127.0.0.1' ) {

            // -------------------------------------------------------------------------
            // should_user_see_this_ad(
            //      $core_plugapp_dirs      ,
            //      $users_geoip_info       ,
            //      $ad_details
            //      )
            // - - - - - - - - - - - - - - -
            // RETURNS
            //      On SUCCESS
            //          TRUE or FALSE
            //
            //      On FAILURE
            //          $error_message STRING
            // -------------------------------------------------------------------------

            $result = should_user_see_this_ad(
                            $core_plugapp_dirs                      ,
                            $country_to_continent_codes_array       ,
                            $allowed_two_letter_country_codes       ,
                            $continent_codes_to_names_array         ,
                            $countries_by_continent_codes_array     ,
                            $geoip_info                             ,
                            $this_record
                            ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return nl2br( $result ) ;
            }

            // -----------------------------------------------------------------

            if ( $result !== TRUE ) {
                continue ;
            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        $candidate_available_ads[] = $this_record ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    if ( count( $candidate_available_ads ) < 1 ) {
        return '' ;
            //  No ads to display...
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $candidate_available_ads = Array(
    //
    //          [0] => Array(
    //              [created_server_datetime_utc]       => 1421569635
    //              [last_modified_server_datetime_utc] => 1421569635
    //              [key]                               => cfe6de47-5c12-4397-b9f6-61af9d6fd1d5-1421569635-787371-1425
    //              [global_sid]                        => ncgh-vzkm
    //              [ad_swapper_site_sid]               => 2kcv-gwhz
    //              [image_url]                         => http://localhost/plugdev/wp-content/uploads/2014/06/rookie-mag-postcards-from-wonderland.jpeg
    //              [link_url]                          => http://www.google.co.nz
    //              [alt_text]                          =>
    //              [description]                       =>
    //              [start_datetime]                    =>
    //              [end_datetime]                      =>
    //              [aspect_ratio_min]                  =>
    //              [aspect_ratio_max]                  =>
    //              [sequence_number]                   =>
    //              [question_display]                  => 1
    //              )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $candidate_available_ads , '$candidate_available_ads' ) ;

    // =========================================================================
    // Pick an ad at random...
    // =========================================================================

    $candidate_ad_index_to_display =
        \mt_rand(
            0                                       ,
            count( $candidate_available_ads ) - 1
            ) ;

    // -------------------------------------------------------------------------

    $ad_to_display = $candidate_available_ads[ $candidate_ad_index_to_display ] ;

    // =========================================================================
    // Add the "asadid" query variable (to the link url - if necessary)...
    // =========================================================================

    if (    array_key_exists( 'link_url' , $ad_to_display )
            &&
            is_string( $ad_to_display['link_url'] )
            &&
            trim( $ad_to_display['link_url'] ) !== ''
        ) {

        // ---------------------------------------------------------------------

        require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/url-utils.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\
        // adjust_query(
        //      $input_url                  ,
        //      $query_changes = array()    ,
        //      $question_amp = FALSE
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Takes an input URL and adjusts it's query params as specified.
        //
        // ---
        //
        // $query_changes is like:-
        //
        //      $query_changes = array(
        //                          'name1'     =>  NULL
        //                          'name2'     =>  'xxx'
        //                          )
        //
        // If the value is NULL, then the query parameter is removed (if it
        // exists).  Otherwise, the query parameter is set (silently overwriting
        // any existing value).
        //
        // ---
        //
        // RETURNS:-
        //      o   STRING $adjusted_url on SUCCESS
        //      o   ARRAY( $error_message ) on FAILURE
        // -------------------------------------------------------------------------

        $query_changes = array(
            'asadid'    =>  $ad_to_display['global_sid']
            ) ;

        // ---------------------------------------------------------------------

        $link_url =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\adjust_query(
                $ad_to_display['link_url']  ,
                $query_changes
                ) ;

        // ---------------------------------------------------------------------

        if ( is_array( $link_url ) ) {
            return nl2br( $link_url ) ;
        }

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        $link_url = NULL ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Create the widget HTML...
    // =========================================================================

    $image_width = $the_ad_slot['width_nominal'] ;

    // -------------------------------------------------------------------------

    $image_height = $the_ad_slot['height_nominal'] ;

    // -------------------------------------------------------------------------

    if ( is_string( $link_url ) ) {

        $html = <<<EOT
<a  target="_blank"
    href="{$link_url}"
    ><img
        border="0"
        width="{$image_width}"
        src="{$ad_to_display['image_url']}"
        /></a>
EOT;

    } else {

        $html = <<<EOT
<a  target="_blank"
    href="{$image_url}"
    ><img
        border="0"
        width="{$image_width}"
        src="{$ad_to_display['image_url']}"
        /></a>
EOT;

    }

    // =========================================================================
    // Record this Ad Impression...
    // =========================================================================

    $result = record_ad_impression(
                    $core_plugapp_dirs                  ,
                    $loaded_datasets                    ,
                    $ad_to_display['global_sid']        ,
                    $the_ad_slot['global_sid']
                    ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return nl2br( $result ) ;
    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return <<<EOT
{$args['before_widget']}
{$html}
{$args['after_widget']}
EOT;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// should_user_see_this_ad()
// =============================================================================

function should_user_see_this_ad(
    $core_plugapp_dirs                      ,
    $country_to_continent_codes_array       ,
    $allowed_two_letter_country_codes       ,
    $continent_codes_to_names_array         ,
    $countries_by_continent_codes_array     ,
    $users_geoip_info                       ,
    $ad_details
    ) {

    // -------------------------------------------------------------------------
    // should_user_see_this_ad(
    //      $core_plugapp_dirs                      ,
    //      $country_to_continent_codes_array       ,
    //      $allowed_two_letter_country_codes       ,
    //      $continent_codes_to_names_array         ,
    //      $countries_by_continent_codes_array     ,
    //      $users_geoip_info                       ,
    //      $ad_details
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          TRUE or FALSE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $users_geoip_info = Array(
    //          [ip]            => 118.127.46.63
    //          [country_code]  => AU
    //          [country_name]  => Australia
    //          [region_code]   => QLD
    //          [region_name]   => Queensland
    //          [city]          => Brisbane
    //          [zip_code]      => 4000
    //          [time_zone]     => Australia/Brisbane
    //          [latitude]      => -27.485
    //          [longitude]     => 153.02
    //          [metro_code]    => 0
    //          )
    //
    //      $ad_details = Array(
    //          [created_server_datetime_utc]       => 1424903274
    //          [last_modified_server_datetime_utc] => 1424903274
    //          [key]                               => 18312494-4835-41a0-8115-304bc016d96c-1424903274-20305-1632
    //          [global_sid]                        => nwkg-zmhc
    //          [ad_swapper_site_sid]               => 2kmv-hzgc
    //          [image_url]                         => http://localhost/plugdev/wp-content/uploads/2014/06/rookie-mag-postcards-from-wonderland.jpeg
    //          [link_url]                          => http://localhost/plugdev/?page_id=202
    //          [alt_text]                          =>
    //          [description]                       =>
    //          [start_datetime]                    =>
    //          [end_datetime]                      =>
    //          [aspect_ratio_min]                  =>
    //          [aspect_ratio_max]                  =>
    //          [sequence_number]                   =>
    //          [geoip_continents_incl]             =>
    //          [geoip_continents_excl]             =>
    //          [geoip_countries_incl]              => NZ
    //          [geoip_countries_excl]              =>
    //          [geoip_regions_incl]                =>
    //          [geoip_regions_excl]                =>
    //          [geoip_cities_incl]                 =>
    //          [geoip_cities_excl]                 =>
    //          [question_display]                  => 1
    //          )
    //
    // -------------------------------------------------------------------------

    // =========================================================================
    // Cleanup...
    // =========================================================================

    $ad_details['geoip_countries_incl']  = trim( $ad_details['geoip_countries_incl']  ) ;
    $ad_details['geoip_continents_incl'] = trim( $ad_details['geoip_continents_incl'] ) ;
    $ad_details['geoip_countries_excl']  = trim( $ad_details['geoip_countries_excl']  ) ;

    // =========================================================================
    // If NO continents or countries are specified, then NO...
    //
    // Because it's the advertising site's responsibility to be more specific
    // than requesting ads displayed worldwide.  In other words, specifying
    // NO continents or countries means NOTHING (it DOESN'T mean ALL).
    // =========================================================================

    if (    $ad_details['geoip_continents_incl'] === ''
            &&
            $ad_details['geoip_countries_incl']  === ''
        ) {
        return FALSE ;
    }

    // =========================================================================
    // Init.
    // =========================================================================

    $allowed_countries = array() ;

    // =========================================================================
    // Add in the countries to include...
    // =========================================================================

    if ( $ad_details['geoip_countries_incl'] !== '' ) {

        // ---------------------------------------------------------------------

        $temp = explode(
                    ','                                                 ,
                    strtoupper( $ad_details['geoip_countries_incl'] )
                    ) ;
                    //  Returns an array of strings created by splitting the
                    //  string parameter on boundaries formed by the delimiter.
                    //
                    //  If delimiter is an empty string (""), explode() will
                    //  return FALSE. If delimiter contains a value that is not
                    //  contained in string and a negative limit is used, then
                    //  an empty array will be returned, otherwise an array
                    //  containing string will be returned.

        // ---------------------------------------------------------------------

        foreach ( $temp as $candidate ) {

            if (    in_array( $candidate , $allowed_two_letter_country_codes , TRUE )
                    &&
                    ! in_array( $candidate , $allowed_countries , TRUE )
                ) {
                $allowed_countries[] = $candidate ;
            }

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Add in the countries in any continents to include...
    // =========================================================================

    $continents_to_include = array() ;

    // -------------------------------------------------------------------------

    if ( $ad_details['geoip_continents_incl'] !== '' ) {

        // ---------------------------------------------------------------------

        $temp = explode(
                    ','                                                 ,
                    strtoupper( $ad_details['geoip_continents_incl'] )
                    ) ;
                    //  Returns an array of strings created by splitting the
                    //  string parameter on boundaries formed by the delimiter.
                    //
                    //  If delimiter is an empty string (""), explode() will
                    //  return FALSE. If delimiter contains a value that is not
                    //  contained in string and a negative limit is used, then
                    //  an empty array will be returned, otherwise an array
                    //  containing string will be returned.

        // ---------------------------------------------------------------------

        foreach ( $temp as $candidate ) {

            if (    array_key_exists( $candidate , $continent_codes_to_names_array , TRUE )
                    &&
                    ! in_array( $candidate , $continents_to_include , TRUE )
                ) {
                $continents_to_include[] = $candidate ;
            }

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    foreach( $continents_to_include as $continent_code ) {

        // ---------------------------------------------------------------------

        foreach ( $countries_by_continent_codes_array[ $continent_code ] as $candidate ) {

            // -----------------------------------------------------------------

            if ( ! in_array( $candidate , $allowed_countries , TRUE ) ) {
                $allowed_countries[] = $candidate ;
            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Remove in the countries to exclude...
    // =========================================================================

    if ( $ad_details['geoip_countries_excl'] !== '' ) {

        // ---------------------------------------------------------------------

        $temp = explode(
                    ','                                                 ,
                    strtoupper( $ad_details['geoip_countries_excl'] )
                    ) ;
                    //  Returns an array of strings created by splitting the
                    //  string parameter on boundaries formed by the delimiter.
                    //
                    //  If delimiter is an empty string (""), explode() will
                    //  return FALSE. If delimiter contains a value that is not
                    //  contained in string and a negative limit is used, then
                    //  an empty array will be returned, otherwise an array
                    //  containing string will be returned.

        // ---------------------------------------------------------------------

        foreach ( $allowed_countries as $index => $candidate ) {

            if ( in_array( $candidate , $temp , TRUE ) ) {
                unset( $allowed_countries[ $index ] ) ;
            }

        }

        // ---------------------------------------------------------------------

    }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $allowed_countries , '$allowed_countries' ) ;

    // =========================================================================
    // Finally, we can decide whether the user should see this ad or not...
    // =========================================================================

    return in_array(
                $users_geoip_info['country_code']   ,
                $allowed_countries                  ,
                TRUE
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// record_ad_impression()
// =============================================================================

function record_ad_impression(
    $core_plugapp_dirs      ,
    $loaded_datasets        ,
    $ad_sid                 ,
    $ad_slot_sid
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer\
    // record_ad_impression(
    //      $core_plugapp_dirs      ,
    //      $loaded_datasets        ,
    //      $ad_sid                 ,
    //      $ad_slot_sid
    //      )
    // - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__     ;
    $fn = __FUNCTION__      ;
    $ln = (string) __LINE__ ;

    // -------------------------------------------------------------------------

    $question_die_on_error = FALSE ;

    // =========================================================================
    // Must have the PAGE REQUEST ID...
    // =========================================================================

    $page_request_id_varname =
        'greatKiwi_byFernTec_adSwapper_local_v0x1x211_pageRequestId'
        ;

    // -------------------------------------------------------------------------

    if (    ! array_key_exists( $page_request_id_varname , $GLOBALS )
            ||
            \trim( $GLOBALS[ $page_request_id_varname ] ) === ''
            ||
            ! \ctype_digit( (string) $GLOBALS[ $page_request_id_varname ] )
            ||
            $GLOBALS[ $page_request_id_varname ] < 1
        ) {

        return <<<EOT
PROBLEM:&nbsp; No or bad "page request id"
Detected in: \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // =========================================================================
    // Get the Ad Impressions dataset's "array storage" details...
    // =========================================================================

    require_once( $core_plugapp_dirs['apps_dot_app_dir'] . '/ad-swapper-ad-impressions.dd.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAdImpressions\
    // get_datasets_array_storage_details()
    // - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      ARRAY $datasets_array_storage_details = array(
    //                  'dataset_slug'              =>  "xxx"                       ,
    //                  'basepress_dataset_handle'  =>  $basepress_dataset_handle   ,
    //                  'array_storage_data'        =>  $array_storage_data
    //                  )
    //
    //      Where: $basepress_dataset_handle = array(
    //          'nice_name'     =>  "xxx"   ,
    //          'unique_key'    =>  "yyy"   ,
    //          'version'       =>  "zzz"
    //          )
    //
    //      And: $array_storage_data = array(
    //          'default_storage_method'    =>  "json" | "basepress-dataset"    ,
    //          'json_data_files_dir'       =>  NULL | "xxx"                    ,
    //          'supported_datasets'        =>  $supported_datasets
    //          ) ;
    //
    //      And: $supported_datasets = array
    //          "<dataset_slug>"    =>  array(
    //              'storage_method'            =>  "json" | "basepress-dataset"    ,
    //              'json_filespec'             =>  NULL | "xxx"                    ,
    //              'basepress_dataset_handle'  =>  $basepress_dataset_handle
    //              )
    //          ...
    //          )
    // -------------------------------------------------------------------------

    $ad_swapper_ad_impressions_array_storage_details =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAdImpressions\get_datasets_array_storage_details()
        ;

    // -------------------------------------------------------------------------

    $ad_impressions_dataset_slug =
        $ad_swapper_ad_impressions_array_storage_details['dataset_slug']
        ;

    // =========================================================================
    // Get the existing Ad Impressions (records)...
    // =========================================================================

    if ( array_key_exists( $ad_impressions_dataset_slug , $loaded_datasets ) ) {

        // ---------------------------------------------------------------------

        $existing_ad_impressions_records =
            $loaded_datasets[ $ad_impressions_dataset_slug ]['records']
            ;

        // ---------------------------------------------------------------------

        $existing_ad_impressions_record_indices_by_key =
            $loaded_datasets[ $ad_impressions_dataset_slug ]['record_indices_by_key']
            ;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/array-storage.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\
        // load_numerically_indexed(
        //      $dataset_name                       ,
        //      $question_die_on_error = FALSE      ,
        //      $array_storage_data = NULL
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Loads and returns the specified PHP numerically indexed array.
        //
        // $array_storage_data can be either:-
        //
        //      o   NULL (in which case:-
        //              $GLOBALS['GREAT_KIWI']['ARRAY_STORAGE']
        //          is used), or;
        //
        //      o   array(
        //              'default_storage_method'    =>  "json" | "basepress-dataset"
        //              'json_data_files_dir'       =>  NULL | "xxx"
        //              'supported_datasets'        =>  $supported_datasets
        //              )
        //          Where $supported_datasets is:-
        //              array(
        //                  '<some_dataset_slug>'   =>  array(
        //                      'storage_method'            =>  NULL | "json" | "basepress-dataset"     ,
        //                      'json_filespec'             =>  NULL | "xxx"                            ,
        //                      'basepress_dataset_handle'  =>  $some_basepress_dataset_handle
        //                      )
        //                  ...
        //                  )
        //          Where $some_basepress_dataset_handle is (eg):-
        //              array(
        //                  'nice_name'     =>  'adSwapper_byFerntec_someDatasetName'   ,
        //                  'unique_key'    =>  $some_basepress_dataset_uid             ,
        //                  'version'       =>  '0.1'
        //                  )
        //          Where $some_basepress_dataset_uid is (eg):-
        //              '2f35c079-ef2e-4dea-a0e2-f1f861375aef' . '-' .
        //              'afe2576d-76b2-4a5c-83a3-60b652467438' . '-' .
        //              '995a2d40-63d3-11e3-949a-0800200c9a66' . '-' .
        //              'a6acf950-63d3-11e3-949a-0800200c9a66'
        //              ;
        //
        // RETURNS
        //      o   On SUCCESS
        //          - - - - -
        //          ARRAY $array
        //          A possibly empty PHP numerically indexed ARRAY.
        //
        //      o   On FAILURE
        //          - - - - -
        //          $error_message STRING
        // -------------------------------------------------------------------------

        $existing_ad_impressions_records =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\load_numerically_indexed(
                $ad_impressions_dataset_slug                                                ,
                $question_die_on_error                                                      ,
                $ad_swapper_ad_impressions_array_storage_details['array_storage_data']
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $existing_ad_impressions_records ) ) {
            return $existing_ad_impressions_records ;
        }

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // get_dataset_record_indices_by_key(
        //      $dataset_title      ,
        //      $dataset_records    ,
        //      $key_field_slug
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS:-
        //      o   (array) $record_indices_by_id on SUCCESS
        //      o   (string) $error_message on FAILURE
        // -------------------------------------------------------------------------

        $dataset_title  = 'Ad Impressions' ;
        $key_field_slug = 'key'            ;

        // ---------------------------------------------------------------------

        $existing_ad_impressions_record_indices_by_key =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_dataset_record_indices_by_key(
                $dataset_title                      ,
                $existing_ad_impressions_records    ,
                $key_field_slug
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $existing_ad_impressions_record_indices_by_key ) ) {
            return $existing_ad_impressions_record_indices_by_key ;
        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Create the new Ad Impressions record...
    // =========================================================================

//          'slug'                      =>  'created_server_datetime_utc'       ,
//          'slug'                      =>  'last_modified_server_datetime_utc'     ,
//          'slug'                      =>  'key'       ,
//          'slug'                      =>  'datetime_utc'          ,
//          'slug'                      =>  'ad_sid'                ,
//          'slug'                      =>  'ad_slot_sid'                ,
//          'slug'                      =>  'page_request_id'           ,

    // -------------------------------------------------------------------------
    // $now
    // -------------------------------------------------------------------------

    $now = \time() ;

    // -------------------------------------------------------------------------
    // $key
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_unique_record_key_for_dataset(
    //      $record_indices_by_key
    //      )
    // - - - - - - - - - - - - - - - - -
    // RETURNS
    //      o   On SUCCESS
    //              $record_key STRING
    //
    //      o   On FAILURE
    //              ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    $key =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_unique_record_key_for_dataset(
            $existing_ad_impressions_record_indices_by_key
            ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $key ) ) {
        return $key[0] ;
    }

    // -------------------------------------------------------------------------
    // Create the record...
    // -------------------------------------------------------------------------

    $new_ad_impressions_record = array(
        'created_server_datetime_utc'       =>  $now                                    ,
        'last_modified_server_datetime_utc' =>  0                                       ,
        'key'                               =>  $key                                    ,
        'datetime_utc'                      =>  $now                                    ,
        'ad_sid'                            =>  $ad_sid                                 ,
        'ad_slot_sid'                       =>  $ad_slot_sid                            ,
        'page_request_id'                   =>  $GLOBALS[ $page_request_id_varname ]
        ) ;

    // =========================================================================
    // Add the record to the dataset...
    // =========================================================================

    $existing_ad_impressions_records[] = $new_ad_impressions_record ;

    // =========================================================================
    // Save the updated Ad Impressions dataset...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\
    // save_numerically_indexed(
    //      $dataset_name                       ,
    //      $array_to_save                      ,
    //      $question_die_on_error = FALSE      ,
    //      $array_storage_data = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - -
    // Saves the specified numerically-indexed PHP array.
    //
    // NOTE!
    // -----
    // Does:-
    //      $array_to_save = array_values( $array_to_save ) ;
    //
    // to ensures it's indices are 0, 1, 2... (before saving it).
    //
    // ---
    //
    // $array_storage_data can be either:-
    //
    //      o   NULL (in which case:-
    //              $GLOBALS['GREAT_KIWI']['ARRAY_STORAGE']
    //          is used), or;
    //
    //      o   array(
    //              'default_storage_method'    =>  "json" | "basepress-dataset"
    //              'json_data_files_dir'       =>  NULL | "xxx"
    //              'supported_datasets'        =>  $supported_datasets
    //              )
    //          Where $supported_datasets is:-
    //              array(
    //                  '<some_dataset_slug>'   =>  array(
    //                      'storage_method'            =>  NULL | "json" | "basepress-dataset"     ,
    //                      'json_filespec'             =>  NULL | "xxx"                            ,
    //                      'basepress_dataset_handle'  =>  $some_basepress_dataset_handle
    //                      )
    //                  ...
    //                  )
    //          Where $some_basepress_dataset_handle is (eg):-
    //              array(
    //                  'nice_name'     =>  'adSwapper_byFerntec_someDatasetName'   ,
    //                  'unique_key'    =>  $some_basepress_dataset_uid             ,
    //                  'version'       =>  '0.1'
    //                  )
    //          Where $some_basepress_dataset_uid is (eg):-
    //              '2f35c079-ef2e-4dea-a0e2-f1f861375aef' . '-' .
    //              'afe2576d-76b2-4a5c-83a3-60b652467438' . '-' .
    //              '995a2d40-63d3-11e3-949a-0800200c9a66' . '-' .
    //              'a6acf950-63d3-11e3-949a-0800200c9a66'
    //              ;
    //
    // RETURNS
    //      o   On SUCCESS
    //          - - - - -
    //          TRUE
    //
    //      o   On FAILURE
    //          - - - - -
    //          $error message STRING
    // -------------------------------------------------------------------------

    return \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\save_numerically_indexed(
                $ad_impressions_dataset_slug                                                ,
                $existing_ad_impressions_records                                            ,
                $question_die_on_error                                                      ,
                $ad_swapper_ad_impressions_array_storage_details['array_storage_data']
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

