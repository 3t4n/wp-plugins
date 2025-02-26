<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / AD-DISPLAYER / GET-NEXT-AD-TO-DISPLAY.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer ;

    // -------------------------------------------------------------------------
    // OVERVIEW
    // ========
    // The "ads list" is stored in the WordPress options DB.
    //
    // It contains a list of the ads to be displayed (sorted in the order in
    // which they're to be displayed).
    //
    //
    // WIDGETS PER PAGE
    // ----------------
    // Ad Swapper allows zero or more "Ad Displayer" widgets per page.
    //
    // Obviously, a page with NO Ad Displayer widgets will display NO
    // Ad Swapper ads.
    //
    // A page with 1 or more Ad Swapper widgets will generally display 1
    // or more ads (though it will display NO Ad Swapper ads, if there are
    // NO enabled Ad Swapper ads - to be displayed to the current user's
    // GeoIP location).
    //
    //
    // ADS PER ("AD SLOT") WIDGET
    // --------------------------
    // Some Ad Swapper "ad slot" types hold just 1 ad.  While others
    // can hold multiple ads.  As follows:-
    //
    //          ----------------------------------
    //          Ad Slot Type            Number Ads
    //          ----------------------  ----------
    //          Fixed-Height Banner     1
    //          Flexi-Height Banner     1
    //          Sidebar                 multiple
    //          Fixed Row Height Grid   multiple
    //          Newspaper Style Grid    multiple
    //          ----------------------------------
    //
    //
    // THE PROBLEM
    // -----------
    // Is that each ad displaying Ad Swapper site will (in general), have 1
    // or more ads that it's supposed to display.  And we ideally want to
    // display those ads fairly - so that every site that's advertising on
    // the ad displaying site, gets a fair and equal share of the available
    // advertising space.
    //
    //
    // THE SOLUTION
    // ------------
    // ...to be continued...
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // OVERVIEW
    // ========
    // The ads list is stored in an array like:-
    //
    //      $ads_list = array(
    //
    //          'ads_grouped_by_site'   =>  array(
    //
    //              array(
    //
    //                  'site_sid'  =>  "xxx"
    //
    //                  'ads'   =>  array(
    //                                  <ads-record-1>
    //                                  <ads-record-2>
    //                                  ...
    //                                  <ads-record-N>
    //                                  )
    //
    //                  'ad_indices_by_sid'     =>  array(
    //                      <ad-sid-1>      =>  0   ,
    //                      <ad-sid-2>      =>  1   ,
    //                      ...
    //                      <ad-sid-N>      =>  M
    //                      )
    //
    //                  'next_free_ad_index'    =>  <0...>
    //
    //                  'question_all_ads_shown'    =>  TRUE/FALSE
    //
    //                  )
    //
    //              ...
    //
    //              )
    //
    //          'site_indices_by_sid'    =>  array(
    //              <site-sid-1>    =>  0   ,
    //              <site-sid-2>    =>  1   ,
    //              ...
    //              <site-sid-N>    =>  M
    //              )
    //
    //          'current_site_index'        =>  <0...>
    //
    //          'question_all_ads_shown'    =>  TRUE/FALSE
    //
    //          )
    //
    // -------------------------------------------------------------------------

// =============================================================================
// get_next_ad_to_display()
// =============================================================================

function get_next_ad_to_display(
    $core_plugapp_dirs                          ,
    $loaded_datasets                            ,
    $available_sites_dataset_slug               ,
    $available_ads_dataset_slug                 ,
    $widgets_ad_slot                            ,
    $ad_slot_type                               ,
    $ad_slot_ad_type                            ,
    &$imagesize_records                         ,
    &$question_imagesize_records_changed        ,
    $max_ads_per_site_per_page                  ,
    $max_repetitions_per_ad_per_page            ,
    $displaying_sites_site_profile              ,
    $ad_slot_specific_ad_approval_routine_name  ,
    &$ad_slot_specific_ad_approval_parameters
    ) {

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $max_ads_per_site_per_page          ,
//    '$max_ads_per_site_per_page'
//    ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_next_ad_to_display(
    //      $core_plugapp_dirs                          ,
    //      $loaded_datasets                            ,
    //      $available_sites_dataset_slug               ,
    //      $available_ads_dataset_slug                 ,
    //      $widgets_ad_slot                            ,
    //      $ad_slot_type                               ,
    //      $ad_slot_ad_type                            ,
    //      &$imagesize_records                         ,
    //      &$question_imagesize_records_changed        ,
    //      $max_ads_per_site_per_page                  ,
    //      $max_repetitions_per_ad_per_page            ,
    //      $displaying_sites_site_profile              ,
    //      $ad_slot_specific_ad_approval_routine_name  ,
    //      &$ad_slot_specific_ad_approval_parameters
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - -
    // Gets the next ad to display (if there is one).
    //
    // Takes care of:-
    //      o   Loading/reloading the ads list,
    //      o   Listing one ad per site (so that all sites get the same
    //          number of ads),
    //      o   Validating the ad's image and link URLs, and;
    //      o   Selecting ads to match the ad slot's ad selection criteria -
    //          and the user's GeoIP info. - etc
    //
    // RETURNS
    //      On SUCCESS
    //          FALSE (= there are NO MORE ADS to display)
    //          --OR--
    //          (ARRAY) $ads_list_record
    //              NOTE!
    //              =====
    //              The returned ads list record will have THREE extra fields
    //              - obtained from it's imagesize data:-
    //                  o   'width'     =>  <width in px>
    //                  o   'height'    =>  <height in px>
    //                  o   'imagesize' =>  the return value of the PHP
    //                                      "getimagesize()" function
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // CORE PLUGAPP DIRS...
    // =========================================================================

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $core_plugapp_dirs = Array(
    //          [plugin_root_dir]               => /opt/.../wp-content/plugins/plugin-plant
    //          [plugins_includes_dir]          => /opt/.../wp-content/plugins/plugin-plant/includes
    //          [plugins_app_defs_dir]          => /opt/.../wp-content/plugins/plugin-plant/app-defs
    //          [dataset_manager_includes_dir]  => /opt/.../wp-content/plugins/plugin-plant/includes/dataset-manager
    //          [apps_dot_app_dir]              => /opt/.../wp-content/plugins/plugin-plant/app-defs/ad-swapper.app
    //          [apps_plugin_stuff_dir]         => /opt/.../wp-content/plugins/plugin-plant/app-defs/ad-swapper.app/plugin.stuff
    //          [custom_pages_dir]              => /opt/.../wp-content/plugins/plugin-plant/app-defs/ad-swapper.app/plugin.stuff/custom.pages
    //          )
    //
    // -------------------------------------------------------------------------

//ob_start() ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $core_plugapp_dirs , '$core_plugapp_dirs' ) ;
//$pr .= ob_get_clean() ;

    // =========================================================================
    // DATASET RECORDS...
    // =========================================================================

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $loaded_datasets = Array(
    //
    //          [ad_swapper_ad_impressions] => Array(
    //              [title]                 => Ad Impressions
    //              [records]               => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_utc]       => 1423288862
    //                      [last_modified_server_datetime_utc] => 0
    //                      [key]                               => ee28f48d-f08f-4fe2-8703-10ee9891898a-1423288862-305011-1527
    //                      [datetime_utc]                      => 1423288862
    //                      [ad_sid]                            => ncgh-vzkm
    //                      [ad_slot_sid]                       => 23mk-hzcw
    //                      [page_request_id]                   => 14
    //                      )
    //                  ...
    //                  )
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array(
    //                  [ee28f48d-f08f-4fe2-8703-10ee9891898a-1423288862-305011-1527] => 0
    //                  ...
    //                  )
    //              )
    //
    //          [ad_swapper_ad_slots] = Array(
    //              [title]                 => Ad Slots
    //              [records]               => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_utc]               => 1441072773
    //                      [last_modified_server_datetime_utc]         => 1441072773
    //                      [key]                                       => 68269847-ef98-4a79-b820-1767f4da0375-1441072773-509128-4787
    //                      [local_key]                                 => 8764154d5752463839c8060e84774dd91e5c607191a010eb8d6d3cffd728cc50
    //                      [name]                                      => fixed-height-banner
    //                      [title]                                     => Fixed-Height Banner
    //                      [description]                               =>
    //                      [type]                                      => fixed-height-banner
    //                      [fixed_height_banner_outer_width_px]        => 800
    //                      [fixed_height_banner_outer_height_px]       => 100
    //                      [fixed_height_banner_border_top_px]         =>
    //                      [fixed_height_banner_border_bottom_px]      =>
    //                      [fixed_height_banner_border_left_px]        =>
    //                      [fixed_height_banner_border_right_px]       =>
    //                      [fixed_height_banner_border_colour_top]     =>
    //                      [fixed_height_banner_border_colour_bottom]  =>
    //                      [fixed_height_banner_border_colour_left]    =>
    //                      [fixed_height_banner_border_colour_right]   =>
    //                      [fixed_height_banner_fit_or_shrink]         =>
    //                      [fixed_height_banner_halign]                =>
    //                      [fixed_height_banner_valign]                =>
    //                      [fixed_height_banner_undercolour]           =>
    //                      [fixed_height_banner_extra_style]           =>
    //                      [sequence_number]                           =>
    //                      [question_disabled]                         =>
    //                      )
    //                  )
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array(
    //                  [68269847-ef98-4a79-b820-1767f4da0375-1441072773-509128-4787] => 0
    //                  )
    //              )
    //
    //          [ad_swapper_ads_outgoing] => Array(
    //              [title]             => Outgoing Ads
    //              [records]           => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_utc]       => 1424071788
    //                      [last_modified_server_datetime_utc] => 1424071788
    //                      [key]                               => 1cc42128-9185-4829-a181-286aa29b7267-1424071788-313891-1576
    //                      [local_key]                         => ef783f93de63f77faeb4b41f5e66d696c2e2fda43c4cd88ec28512a16de2fcf1
    //                      [image_url]                         => http://localhost/plugdev/wp-content/uploads/2015/02/ad-swapper-happy-dogs-ad-2.png
    //                      [link_url]                          => http://www.nzkc.org.nz/
    //                      [alt_text]                          =>
    //                      [description]                       =>
    //                      [start_datetime]                    =>
    //                      [end_datetime]                      =>
    //                      [aspect_ratio_min]                  =>
    //                      [aspect_ratio_max]                  =>
    //                      [sequence_number]                   =>
    //                      [question_disabled]                 =>
    //                      [global_sid]                        => 9khc-zwmv
    //                      )
    //                  ...
    //                  )
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array(
    //                  [1cc42128-9185-4829-a181-286aa29b7267-1424071788-313891-1576] => 0
    //                  ...
    //                  )
    //              )
    //
    //          [ad_swapper_available_ads] => Array(
    //              [title]             => Available Ads
    //              [records]           => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_utc]       => 1430208434
    //                      [last_modified_server_datetime_utc] => 1430208434
    //                      [key]                               => a93f16d3-571d-42a8-b8ea-e9b47a310a72-1430208434-842855-1832
    //                      [global_sid]                        => 9khc-zwmv
    //                      [ad_swapper_site_sid]               => 2kmv-hzgc
    //                      [image_url]                         => http://localhost/plugdev/wp-content/uploads/2015/02/ad-swapper-happy-dogs-ad-2.png
    //                      [link_url]                          => http://www.nzkc.org.nz/
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
    //                      [owner_site_unique_key]             => 2222-2222-2222-2222
    //                      )
    //                  )
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array(
    //                  [a93f16d3-571d-42a8-b8ea-e9b47a310a72-1430208434-842855-1832] => 0
    //                  ...
    //                  )
    //              )
    //
    //          [ad_swapper_available_selected_and_approved_web_site_collections] => Array(
    //              [title]                 => Available and Possibly Selected/Approved Web Site Collections
    //              [records]               => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_utc]       => 1434427324
    //                      [last_modified_server_datetime_utc] => 1434427324
    //                      [key]                               => efbc9cd8-444d-48db-bc8b-26a729c0d513-1434427324-659291-1941
    //                      [site_unique_key]                   => 2222-2222-2222-2222
    //                      [local_unique_key]                  => dvk3-kmp2-czdx-mgvd
    //                      [global_unique_key]                 => 2222-2222-2222-2222-dvk3-kmp2-czdx-mgvd
    //                      [name_slash_title]                  => Dog Lovers
    //                      [description]                       => Targeted at users who are dog lovers.  So the SITES wanted in this collection are those who have news or posts intended for dog lovers.  Intended of course, for the the benefit of ADVERTISERS who want to sell products/services to dog lovers/owners.
    //                      [collection_home_page_url]          =>
    //                      [question_moderated]                =>
    //                      [question_selected]                 =>
    //                      [question_approved]                 =>
    //                      [question_member]                   =>
    //                      )
    //                  )
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array(
    //                  [efbc9cd8-444d-48db-bc8b-26a729c0d513-1434427324-659291-1941] => 0
    //                  )
    //              )
    //
    //          [ad_swapper_available_sites] => Array(
    //              [title]                 => Available Sites
    //              [records]               => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_utc]                   => 1425890078
    //                      [last_modified_server_datetime_utc]             => 1425890078
    //                      [key]                                           => a86f51fa-1da6-4280-91b8-8b74d36233e1-1425890078-981365-1720
    //                      [ad_swapper_site_sid]                           => 2kmv-hzgc
    //                      [site_unique_key]                               => 2222-2222-2222-2222
    //                      [site_title]                                    => Plugdev
    //                      [home_page_url]                                 => http://localhost/plugdev
    //                      [general_description]                           =>
    //                      [ads_wanted_description]                        =>
    //                      [sites_wanted_description]                      =>
    //                      [categories_available]                          =>
    //                      [categories_wanted]                             =>
    //                      [question_display_this_sites_ads_on_your_site]  => 1
    //                      [question_display_your_ads_on_this_site]        => 1
    //                      )
    //                  )
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array(
    //                  [a86f51fa-1da6-4280-91b8-8b74d36233e1-1425890078-981365-1720] => 0
    //                  )
    //              )
    //
    //          [ad_swapper_page_requests] => Array(
    //              [title]                 => Page Requests
    //              [records]               => Array()
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array()
    //              )
    //
    //          [ad_swapper_plugin_settings] => Array(
    //              [title]                 => Plugin Settings
    //              [records]               => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_utc]       => 1421887967
    //                      [last_modified_server_datetime_utc] => 1421887967
    //                      [key]                               => 7dd6c89c-6ac1-4b07-9851-be51d6219420-1421887967-696176-1480
    //                      [ad_swapper_user_sid]               => 2gkw-vmcz
    //                      [ad_swapper_site_sid]               => 2kmv-hzgc
    //                      [site_unique_key]                   => 2222-2222-2222-2222
    //                      [site_registration_key]             => 675ed35f6...7a78fe029d
    //                      [api_public_encryption_key]         =>
    //                      [api_mcryption_key]                 => bc502c56b...9749691a
    //                      [api_url_override]                  => http://localhost/plugdev/wp-content/plugins/plugin-plant/app-defs/ad-swapper-central.app/plugin.stuff/api/api-call-handler.php
    //                      )
    //                  )
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array(
    //                  [7dd6c89c-6ac1-4b07-9851-be51d6219420-1421887967-696176-1480] => 0
    //                  )
    //              )
    //
    //          [ad_swapper_site_profile] => Array(
    //              [title]                 => Site Profile
    //              [records]               => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_utc]       => 1418445063
    //                      [last_modified_server_datetime_utc] => 1418445063
    //                      [key]                               => add9f270-9f5b-429a-a264-f0f5c7cc59db-1418445063-977293-1355
    //                      [site_title]                        => Plugdev
    //                      [home_page_url]                     => http://localhost/plugdev
    //                      [general_description]               =>
    //                      [ads_wanted_description]            =>
    //                      [sites_wanted_description]          =>
    //                      [categories_available]              =>
    //                      [categories_wanted]                 =>
    //                      [geoip_continents_incl]             =>
    //                      [geoip_continents_excl]             =>
    //                      [geoip_countries_incl]              => NZ
    //                      [geoip_countries_excl]              =>
    //                      [geoip_regions_incl]                =>
    //                      [geoip_regions_excl]                =>
    //                      [geoip_cities_incl]                 =>
    //                      [geoip_cities_excl]                 =>
    //                      )
    //                  )
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array(
    //                  [add9f270-9f5b-429a-a264-f0f5c7cc59db-1418445063-977293-1355] => 0
    //                  )
    //              )
    //
    //          [ad_swapper_this_sites_web_site_collection_members] => Array(
    //              [title]                 => This Site's Web Site Collection Members
    //              [records]               => Array()
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array()
    //              )
    //
    //          [ad_swapper_web_site_collections] => Array(
    //              [title]                 => Web Site Collections
    //              [records]               => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_utc]       => 1434377789
    //                      [last_modified_server_datetime_utc] => 1434377789
    //                      [key]                               => 8c03b02a-8f09-4f06-9c2e-3b7c8d4d4938-1434377789-361212-1929
    //                      [local_unique_key]                  => dvk3-kmp2-czdx-mgvd
    //                      [global_unique_key]                 => 2222-2222-2222-2222-dvk3-kmp2-czdx-mgvd
    //                      [name_slash_title]                  => Dog Lovers
    //                      [description]                       => Targeted at users who are dog lovers.  So the SITES wanted in this collection are those who have news or posts intended for dog lovers.  Intended of course, for the the benefit of ADVERTISERS who want to sell products/services to dog lovers/owners.
    //                      [collection_home_page_url]          =>
    //                      [question_moderated]                =>
    //                      [question_disabled]                 =>
    //                      )
    //                  )
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array(
    //                  [8c03b02a-8f09-4f06-9c2e-3b7c8d4d4938-1434377789-361212-1929] => 0
    //                  )
    //              )
    //
    //          [ad_swapper_widget_settings] => Array(
    //              [title]                 => Widget Settings
    //              [records]               => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_utc]       => 1420948902
    //                      [last_modified_server_datetime_utc] => 1420948902
    //                      [key]                               => bf49b75f-305b-4830-a0d0-dc8a6efbd6c7-1420948902-442181-1407
    //                      [widget_id]                         => ad_swapper_ad_display_widget-2
    //                      [widget_settings]                   => Array(
    //                          [ad_slot_key] => c6886167-8b81-43c4-9bbb-b7391a007356-1423272554-653172-1523
    //                          )
    //                      )
    //                  )
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array(
    //                  [bf49b75f-305b-4830-a0d0-dc8a6efbd6c7-1420948902-442181-1407] => 0
    //                  )
    //              )
    //
    //          )
    //
    // -------------------------------------------------------------------------

//ob_start() ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $loaded_datasets , '$loaded_datasets' ) ;
//$pr .= ob_get_clean() ;

    // =========================================================================
    // Widget's Ad Slot record...
    // =========================================================================

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $widgets_ad_slot = Array(
    //          [created_server_datetime_utc]               => 1441072773
    //          [last_modified_server_datetime_utc]         => 1441072773
    //          [key]                                       => 68269847-ef98-4a79-b820-1767f4da0375-1441072773-509128-4787
    //          [local_key]                                 => 8764154d5752463839c8060e84774dd91e5c607191a010eb8d6d3cffd728cc50
    //          [name]                                      => fixed-height-banner
    //          [title]                                     => Fixed-Height Banner
    //          [description]                               =>
    //          [type]                                      => fixed-height-banner
    //          [fixed_height_banner_outer_width_px]        => 800
    //          [fixed_height_banner_outer_height_px]       => 100
    //          [fixed_height_banner_border_top_px]         =>
    //          [fixed_height_banner_border_bottom_px]      =>
    //          [fixed_height_banner_border_left_px]        =>
    //          [fixed_height_banner_border_right_px]       =>
    //          [fixed_height_banner_border_colour_top]     =>
    //          [fixed_height_banner_border_colour_bottom]  =>
    //          [fixed_height_banner_border_colour_left]    =>
    //          [fixed_height_banner_border_colour_right]   =>
    //          [fixed_height_banner_fit_or_shrink]         =>
    //          [fixed_height_banner_halign]                =>
    //          [fixed_height_banner_valign]                =>
    //          [fixed_height_banner_undercolour]           =>
    //          [fixed_height_banner_extra_style]           =>
    //          [sequence_number]                           =>
    //          [question_disabled]                         =>
    //          )
    //
    // -------------------------------------------------------------------------

//ob_start() ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $widgets_ad_slot , '$widgets_ad_slot' ) ;
//$pr .= ob_get_clean() ;

    // =========================================================================
    // AD SLOT TYPE / AD SLOT Ad TYPE
    // =========================================================================

    // -------------------------------------------------------------------------
    //
    //      -------------------------------------------
    //      AD SLOT TYPE                AD SLOT AD TYPE
    //      ==========================  ===============
    //      "fixed-height-banner"       "banner"
    //      "flexi-height-banner"       "banner"
    //      "sidebar"                   "normal"
    //      "fixed-row-height-grid"     "normal"
    //      "newspaper-style-grid"      "normal"
    //      -------------------------------------------
    //
    // -------------------------------------------------------------------------

    // =========================================================================
    // TOP OF THE PAGE "ADS LIST" RELOAD ?
    // =========================================================================

    // -------------------------------------------------------------------------
    // When starting a new page, we reload the "ads list" if:-
    //
    //      1.  The number of "available sites" records has changed (in which
    //          case, the local site has perhaps manually edited them).
    //
    //          >>  NOT ACTUALLY NEEDED, since:-
    //          >>  o   Normal (non-LOCALHOST) user can't/shouldn't be editing
    //          >>      the "available sites" dataset.  And;
    //          >>  o   This dataset should only ever be edited (by the plugin
    //          >>      developer,) on LOCALHOST.
    //          >>  And running on LOCALHOST triggers a reload anyway (see
    //          >>  below).
    //
    //      2.  The number of "available ads" records has changed (in which
    //          case, the local site has perhaps manually edited them).
    //
    //          >>  NOT ACTUALLY NEEDED, since:-
    //          >>  o   Normal (non-LOCALHOST) user can't/shouldn't be editing
    //          >>      the "available ads" dataset.  And;
    //          >>  o   This dataset should only ever be edited (by the plugin
    //          >>      developer,) on LOCALHOST.
    //          >>  And running on LOCALHOST triggers a reload anyway (see
    //          >>  below).
    //
    //      3.  "Update Local Site" has been run since the "ads list" was last
    //          loaded.
    //
    //          (In which case, the "available sites" and/or "available ads"
    //          dataset records have almost certainly been updated.  And even
    //          if both their record counts are unchanged, it's still possible
    //          that one or more individual records have changed).
    //
    //      4.  It's the LOCALHOST test site.
    //
    //          In which case, we assume that a programmer is editing/testing
    //          the code.  And may have edited the "ad display" code - and
    //          changed the "ad display" and "ads list" loading logic (etc).
    //
    //          Since the "ads list" survives between pages, unless we force
    //          a reload, we may end up stuck with a previously loaded "ads
    //          list", that won't update.
    //
    //          NOT ACTUALLY DONE!
    //
    //          Because forcing a reload at the top of every page on localhost
    //          like this, prevents us testing how the routines handle an "ads
    //          list" that takes more than one page to display.
    //
    //          So we've replaced this with a "Reload Ads List" button - at
    //          the top of every ad slot on localhost - which forces a
    //          manual reload.
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // is_start_of_page_for(
    //      $id_string
    //      )
    // - - - - - - - - - - -
    // This function returns TRUE the first time it's called (with a given
    // $id_string).  The second and subsequent calls (with the same
    // $id_string), return FALSE.
    //
    // The $id_string:-
    //
    //      o   Must be a valid PHP variable name, and;
    //
    //      o   When appended to:-
    //              "greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer_"
    //
    //          must generate a UNIQUE variable name that WON'T conflict with
    //          any other GLOBAL variable name that might be generated (by
    //          this version of the plugin "is_start_page_for()" is called
    //          from).
    //
    // RETURNS
    //      TRUE or FALSE
    //
    // dies() on error.
    // -------------------------------------------------------------------------

    if ( $ad_slot_ad_type === 'banner' ) {
        $id_string = 'banner_ads_list_reload' ;

    } elseif ( $ad_slot_ad_type === 'normal' ) {
        $id_string = 'normal_ads_list_reload' ;

    } else {
        $id_string = '' ;

    }

    // -------------------------------------------------------------------------

    if (    $id_string !== ''
            &&
            is_start_of_page_for( $id_string )
        ) {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
        // get_update_LOCAL_site_run_since_ads_list_last_reloaded()
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      TRUE or FALSE
        //      NULL if option doesn't exist
        //
        // die()s on other error
        // -------------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
        // get_ads_list_reload_requested(
        //      $ad_type
        //      )
        // - - - - - - - - - - - - - - - -
        // Returns a boolean value that indicates whether or not a reload of the
        // specified "ads list" has been requested.
        //
        // $ad_type should be one of:   "banner", "normal"
        //
        // RETURNS
        //      TRUE or FALSE
        //
        //      The value returned has been checked - and is OK to use.
        //
        // "dies()" on error
        // -------------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
        // set_or_clear_ads_list_reload_request(
        //      $ad_type            ,
        //      $set_or_clear
        //      )
        // - - - - - - - - - - - - - - - - - - -
        // Sets or clears the flag that indicates whether or not a reload of the
        // specified "ads list" has been requested.
        //
        // $ad_type should be one of:   "banner", "normal"
        //
        // $set_or_clear should be one of:  "set", "clear"
        //
        // RETURNS
        //      TRUE
        //
        // "dies()" on error
        // -------------------------------------------------------------------------

        $question_ads_list_reload_requested =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\get_ads_list_reload_requested(
                $ad_slot_ad_type
                ) ;

        // ---------------------------------------------------------------------

        if (    get_update_LOCAL_site_run_since_ads_list_last_reloaded() === TRUE
                ||
                $question_ads_list_reload_requested
            ) {

            // -----------------------------------------------------------------

            require_once( dirname( __FILE__ ) . '/reload-ads-list.php' ) ;

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
            // reload_ads_list(
            //      $core_plugapp_dirs              ,
            //      $loaded_datasets                ,
            //      $available_sites_dataset_slug   ,
            //      $available_ads_dataset_slug     ,
            //      $widgets_ad_slot                ,
            //      $ad_slot_type                   ,
            //      $ad_slot_ad_type
            //      )
            // - - - - - - - - - - - - - - - - - - -
            // Reloads the "ads list" (saving it to the WordPress options database,
            // on success).
            //
            // RETURNS
            //      On SUCCESS
            //          TRUE
            //
            //      On FAILURE
            //          $error_message STRING
            // -------------------------------------------------------------------------

//echo '<br />Reload required because either: <b>Reload</b> or <b>Update Local Site</b> button pressed' ;

            $result =
                reload_ads_list(
                    $core_plugapp_dirs              ,
                    $loaded_datasets                ,
                    $available_sites_dataset_slug   ,
                    $available_ads_dataset_slug     ,
                    $widgets_ad_slot                ,
                    $ad_slot_type                   ,
                    $ad_slot_ad_type
                    ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return $result ;
            }

            // -----------------------------------------------------------------
            // Increment the number of ads list reloads this page...
            // -----------------------------------------------------------------

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
            // inc_number_ads_list_reloads_this_page(
            //      $ad_slot_ad_type
            //      )
            // - - - - - - - - - - - - - - - - - - - -
            // Increments "number ads list reloads per page" (by 1)
            //
            // Should be called every time the ads list is loaded/re-loaded. EXCEPT for
            // trial reloads - whoose purpose is to check if the ads list has changed -
            // and for which it's found that the ads list HASN'T changed.
            //
            // RETURNS
            //      TRUE
            //
            // "dies()" on error
            // -------------------------------------------------------------------------

            inc_number_ads_list_reloads_this_page( $ad_slot_ad_type ) ;

            // -----------------------------------------------------------------
            // Reset the "Reload" button...
            // -----------------------------------------------------------------

            if ( $question_ads_list_reload_requested ) {

                $set_or_clear = 'clear' ;

                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\set_or_clear_ads_list_reload_request(
                    $ad_slot_ad_type    ,
                    $set_or_clear
                    ) ;

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Get the "ads list"...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_ads_list( $ad_type )
    // - - - - - - - - - - - -
    // Returns the currently stored (and possibly empty) "ads list" (or FALSE,
    // if there is NO currently stored ads list).
    //
    // $ad_type is assumed to be one of:   "banner", "normal"
    //
    // RETURNS
    //      ARRAY $ads_list
    //      --OR--
    //      FALSE (= there is NO "ads list" stored in the WordPress options
    //      database yet).
    //
    //      The value returned has been checked - and is OK to use.
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    $ads_list = get_ads_list( $ad_slot_ad_type ) ;

    // -------------------------------------------------------------------------

    if ( $ads_list === FALSE ) {

        // ---------------------------------------------------------------------
        // There is NO "ads list" (stored in the WP options database yet).
        //
        // So let's create the first one...
        // ---------------------------------------------------------------------

        require_once( dirname( __FILE__ ) . '/reload-ads-list.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
        // reload_ads_list(
        //      $core_plugapp_dirs              ,
        //      $loaded_datasets                ,
        //      $available_sites_dataset_slug   ,
        //      $available_ads_dataset_slug     ,
        //      $widgets_ad_slot                ,
        //      $ad_slot_type                   ,
        //      $ad_slot_ad_type
        //      )
        // - - - - - - - - - - - - - - - - - - -
        // Reloads the "ads list" (saving it to the WordPress options database,
        // on success).
        //
        // RETURNS
        //      On SUCCESS
        //          TRUE
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

//echo '<br />Reload required because: <b>No Stored Ads List Yet</b>' ;

        $result =
            reload_ads_list(
                $core_plugapp_dirs              ,
                $loaded_datasets                ,
                $available_sites_dataset_slug   ,
                $available_ads_dataset_slug     ,
                $widgets_ad_slot                ,
                $ad_slot_type                   ,
                $ad_slot_ad_type
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------
        // Increment the number of ads list reloads this page...
        // ---------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
        // inc_number_ads_list_reloads_this_page(
        //      $ad_slot_ad_type
        //      )
        // - - - - - - - - - - - - - - - - - - - -
        // Increments "number ads list reloads per page" (by 1)
        //
        // Should be called every time the ads list is loaded/re-loaded. EXCEPT for
        // trial reloads - whoose purpose is to check if the ads list has changed -
        // and for which it's found that the ads list HASN'T changed.
        //
        // RETURNS
        //      TRUE
        //
        // "dies()" on error
        // -------------------------------------------------------------------------

        inc_number_ads_list_reloads_this_page( $ad_slot_ad_type ) ;

        // ---------------------------------------------------------------------
        // Load the newly loaded "ads list"...
        // ---------------------------------------------------------------------

        $ads_list = get_ads_list( $ad_slot_ad_type ) ;

        // ---------------------------------------------------------------------

        if ( $ads_list === FALSE ) {

            $ns = __NAMESPACE__ ;
            $fn = __FUNCTION__  ;
            $ln = __LINE__ - 4  ;

            return <<<EOT
PROBLEM:&nbsp; "ads_list" initial load error
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

    }

//ob_start() ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $ads_list , '$ads_list' ) ;
//$pr = ob_get_clean() ;
//echo $pr ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $ads_list = array(
    //
    //          'ads_grouped_by_site'   =>  array(
    //
    //              array(
    //
    //                  'site_sid'  =>  "xxx"
    //
    //                  'ads'   =>  array(
    //                                  <ads-record-1>
    //                                  <ads-record-2>
    //                                  ...
    //                                  <ads-record-N>
    //                                  )
    //
    //                  'ad_indices_by_sid'     =>  array(
    //                      <ad-sid-1>      =>  0   ,
    //                      <ad-sid-2>      =>  1   ,
    //                      ...
    //                      <ad-sid-N>      =>  M
    //                      )
    //
    //                  'next_free_ad_index'    =>  <0...>
    //
    //                  'question_all_ads_shown'    =>  TRUE/FALSE
    //
    //                  )
    //
    //              ...
    //
    //              )
    //
    //          'site_indices_by_sid'    =>  array(
    //              <site-sid-1>    =>  0   ,
    //              <site-sid-2>    =>  1   ,
    //              ...
    //              <site-sid-N>    =>  M
    //              )
    //
    //          'current_site_index'        =>  <0...>
    //
    //          'question_all_ads_shown'    =>  TRUE/FALSE
    //
    //          )
    //
    // -------------------------------------------------------------------------

    // =========================================================================
    // "All Ads Shown" Ads List Reload ?
    // =========================================================================

    if ( $ads_list['question_all_ads_shown'] === TRUE ) {

        // ---------------------------------------------------------------------
        // However, we're only allowed to reload the "ads list":-
        //      $max_ads_per_site_per_page
        //
        // times (so as to prevent getting into endless loops)...
        // ---------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
        // get_number_ads_list_reloads_this_page(
        //      $ad_slot_ad_type
        //      )
        // - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      INT $number_times_ads_list_reloaded_this_page (0 to PHP_INT_MAX)
        //
        //      The value returned has been checked - and is OK to use.
        //
        // "dies()" on error
        // -------------------------------------------------------------------------

        if ( get_number_ads_list_reloads_this_page( $ad_slot_ad_type ) > $max_ads_per_site_per_page ) {
            return FALSE ;
        }

        // ---------------------------------------------------------------------

        require_once( dirname( __FILE__ ) . '/reload-ads-list.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
        // reload_ads_list(
        //      $core_plugapp_dirs              ,
        //      $loaded_datasets                ,
        //      $available_sites_dataset_slug   ,
        //      $available_ads_dataset_slug     ,
        //      $widgets_ad_slot                ,
        //      $ad_slot_type                   ,
        //      $ad_slot_ad_type
        //      )
        // - - - - - - - - - - - - - - - - - - -
        // Reloads the "ads list" (saving it to the WordPress options database,
        // on success).
        //
        // RETURNS
        //      On SUCCESS
        //          TRUE
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

//echo '<br />Reload required because: <b>All Ads Shown</b>' ;

        $result =
            reload_ads_list(
                $core_plugapp_dirs              ,
                $loaded_datasets                ,
                $available_sites_dataset_slug   ,
                $available_ads_dataset_slug     ,
                $widgets_ad_slot                ,
                $ad_slot_type                   ,
                $ad_slot_ad_type
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------
        // Increment the number of ads list reloads this page...
        // ---------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
        // inc_number_ads_list_reloads_this_page(
        //      $ad_slot_ad_type
        //      )
        // - - - - - - - - - - - - - - - - - - - -
        // Increments "number ads list reloads per page" (by 1)
        //
        // Should be called every time the ads list is loaded/re-loaded. EXCEPT for
        // trial reloads - whoose purpose is to check if the ads list has changed -
        // and for which it's found that the ads list HASN'T changed.
        //
        // RETURNS
        //      TRUE
        //
        // "dies()" on error
        // -------------------------------------------------------------------------

        inc_number_ads_list_reloads_this_page( $ad_slot_ad_type ) ;

        // ---------------------------------------------------------------------
        // Load the newly loaded "ads list"...
        // ---------------------------------------------------------------------

        $ads_list = get_ads_list( $ad_slot_ad_type ) ;

        // ---------------------------------------------------------------------

        if ( $ads_list === FALSE ) {

            $ns = __NAMESPACE__ ;
            $fn = __FUNCTION__  ;
            $ln = __LINE__ - 4  ;

            return <<<EOT
PROBLEM:&nbsp; "ads_list" reload error
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // --------------------------------------------------------------------------

    }

    // =========================================================================
    // If the "ads list" is empty, then there are NO (MORE) ADS to display...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // question_ads_list_is_empty(
    //      $ads_list
    //      )
    // - - - - - - - - - - - - - -
    // Returns a flag that indicates whether or not the specified "ads list"
    // is empty (in the sense that has has NO ads).
    //
    // RETURNS
    //      TRUE or FALSE
    //
    // die()s on error
    // -------------------------------------------------------------------------

    if ( question_ads_list_is_empty( $ads_list ) ) {
        return FALSE ;
    }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $ads_list , '$ads_list' ) ;

    // =========================================================================
    // Support Routines...
    // =========================================================================

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/url-utils.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\
    // is_localhost()
    // - - - - - - -
    // Returns a flag indicating whether or not the current script is
    // running on localhost or not.
    //
    // RETURNS
    //      TRUE or FALSE
    // -------------------------------------------------------------------------

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

    // =========================================================================
    //  FreeGeoIP.Net Problems
    //  As Of Early 2016
    //  ----------------------
    //  FreeGeoIP.Net is where we get:-
    //      $users_geoip_info
    //
    //  from.  But this service seems to be down a lot.
    //
    //  TODO !!!    We need to organise a replacement !!!
    //
    //  In the interim, if:-
    //      $users_geoip_info
    //
    //  ISN'T an array - then we assume it's a:-
    //      "Connection timed out after 5000 milliseconds"
    //
    //  (or other) error message string.  And display the ad anyway (regardless
    //  of whether the user should see it or not).
    //
    //  Because if we DON'T do this, then when "freegeoip.net" is down, NO ads
    //  will be displayed at all.
    //
    //  This means that we must (temporarily) skip the following error
    //  checking.
    //
    //  We also record he time the last FreeGeoIP check failed.  And skip the
    //  GeoIP checking completely if it was in the last hour.
    // =========================================================================

//  $users_geoip_info =
//      \greatKiwi_byFernTec_adSwapper_local_v0x1x211_geoipAlpha\
//      ip_address_to_city_data(
//          $_SERVER['REMOTE_ADDR']
//          ) ;
//
//  if ( is_string( $users_geoip_info ) ) {
//      return FALSE ;
//          //  Display NO ads
//  }
//
//  // -------------------------------------------------------------------------
//
//  if (    trim( $users_geoip_info['country_code'] ) === ''
//          &&
//          ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\is_localhost()
//      ) {
//      return FALSE ;
//          //  Display NO ads (because we don't know the user's country).
//  }

    // -------------------------------------------------------------------------

    if (    array_key_exists(
                'last_time_freegeoip_dot_net_failed'    ,
                $GLOBALS
                )
            &&
            ( time() - $GLOBALS['last_time_freegeoip_dot_net_failed'] ) < 3600
        ) {

        $users_geoip_info = 'skipping GeoIP checking - because freegeoip.net seems to be down' ;

    } else {

        $users_geoip_info =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_geoipAlpha\
            ip_address_to_city_data(
                $_SERVER['REMOTE_ADDR']
                ) ;

        if ( is_string( $users_geoip_info ) ) {
            $GLOBALS['last_time_freegeoip_dot_net_failed'] = time() ;
        }

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

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $ads_list = array(
    //
    //          'ads_grouped_by_site'   =>  array(
    //
    //              array(
    //
    //                  'site_sid'  =>  "xxx"
    //
    //                  'ads'   =>  array(
    //                                  <ads-record-1>
    //                                  <ads-record-2>
    //                                  ...
    //                                  <ads-record-N>
    //                                  )
    //
    //                  'ad_indices_by_sid'     =>  array(
    //                      <ad-sid-1>      =>  0   ,
    //                      <ad-sid-2>      =>  1   ,
    //                      ...
    //                      <ad-sid-N>      =>  M
    //                      )
    //
    //                  'next_free_ad_index'    =>  <0...>
    //
    //                  'question_all_ads_shown'    =>  TRUE/FALSE
    //
    //                  )
    //
    //              ...
    //
    //              )
    //
    //          'site_indices_by_sid'    =>  array(
    //              <site-sid-1>    =>  0   ,
    //              <site-sid-2>    =>  1   ,
    //              ...
    //              <site-sid-N>    =>  M
    //              )
    //
    //          'current_site_index'        =>  <0...>
    //
    //          'question_all_ads_shown'    =>  TRUE/FALSE
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $ads_list       ,
//    '$ads_list'
//    ) ;

//foreach ( $ads_list['ads_grouped_by_site'] as $this_site ) {
//    echo '<br />' , $this_site['site_sid'] ;
//    foreach ( $this_site['ads'] as $this_ad ) {
//        echo '<br /> &nbsp; &nbsp; &nbsp; ' , $this_ad['global_sid'] , ' --- ' , basename( $this_ad['image_url'] ) ;
//    }
//}

    // =========================================================================
    // Support Routines...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/generic-support/number-times-ad-displayed-this-page.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_number_times_ad_displayed_this_page(
    //      $ad_sid
    //      )
    // - - - - - - - - - - - - - - - - - - - -
    // Returns the time of times the specified ad has been displayed (on the
    // current page being displayed).
    //
    // RETURNS
    //      INT $number_times_ad_displayed_this_page
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // inc_number_times_ad_displayed_this_page(
    //      $ad_sid
    //      )
    // - - - - - - - - - - - - - - - - - - - -
    // Increments the time of times the specified ad has been displayed (on the
    // current page being displayed).
    //
    // RETURNS
    //      Nothing
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    require_once( dirname( __FILE__ ) . '/generic-support/ads-per-site-this-page.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_ads_this_site_this_page(
    //      $site_sid
    //      )
    // - - - - - - - - - - - - - -
    // Returns the number of ads displayed so far, for this site, on the
    // current page.
    //
    // RETURNS
    //      INT $ads_this_site_this_page
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // inc_ads_this_site_this_page(
    //      $site_sid
    //      )
    // - - - - - - - - - - - - - -
    // Increments the number of ads displayed so far, for this site, on the
    // current page.
    //
    // RETURNS
    //      TRUE
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

//  require_once( dirname( __FILE__ ) . '/generic-support/sites-this-journey.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // is_site_in_current_journey(
    //      $site_sid
    //      )
    // - - - - - - - - - - - - - - - -
    // RETURNS
    //      TRUE or FALSE
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // add_site_to_current_journey(
    //      $site_sid
    //      )
    // - - - - - - - - - - - - - -
    // Adds the specified site, to the list of sites already in the current
    // journey.
    //
    // RETURNS
    //      TRUE
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // clear_current_journey()
    // - - - - - - - - - - - -
    // Empties the list of sites in the current journey.
    //
    // RETURNS
    //      TRUE
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // is_journey_ended(
    //      $site_sids_in_current_ads_list
    //      )
    // - - - - - - - - - - - - - - - - - -
    // Checks to see if there's at least one site in the current ads list,
    // that's NOT yet in the current journey.
    //
    // RETURNS
    //      TRUE / FALSE
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    // =========================================================================
    // Get the next free SITE to display...
    // =========================================================================

    $start_current_site_index = $ads_list['current_site_index'] ;
        //  Used to prevent lock-up

    // -------------------------------------------------------------------------

    $wrapped_back = FALSE ;
        //  Used to prevent lock-up

    // -------------------------------------------------------------------------

    $site_sids_in_current_ads_list =
        array_keys( $ads_list['site_indices_by_sid'] )
        ;

    // -------------------------------------------------------------------------

    while ( TRUE ) {

        // ---------------------------------------------------------------------
        // Wrapped-back ?
        // ---------------------------------------------------------------------

        if (    $wrapped_back
                &&
                $ads_list['current_site_index'] === $start_current_site_index
            ) {

            // -----------------------------------------------------------------
            // The current iteration is complete!
            // -----------------------------------------------------------------

            if ( get_iteration_number_this_page( $ad_slot_ad_type ) > $max_ads_per_site_per_page ) {

                // -------------------------------------------------------------
                // The max. ads per site per page value has been reached.
                //  =>  Stop displaying ads!
                // -------------------------------------------------------------

                return FALSE ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------
            // Start next iteration...
            // -----------------------------------------------------------------

            inc_iteration_number_this_page( $ad_slot_ad_type ) ;

            $wrapped_back = FALSE ;

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
            // clear_sites_displayed_this_page()
            // - - - - - - - - - - - - - - - - - - -
            // Empties the list of sites already displayed on the current page.
            //
            // RETURNS
            //      TRUE
            //
            // "dies()" on error
            // -------------------------------------------------------------------------

//          clear_sites_displayed_this_page() ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // If we've reached the end of the "sites list", then WRAP-AROUND (to
        // the start of the ads list), and start showing the ads again...
        // ---------------------------------------------------------------------

        if (    $ads_list['current_site_index']
                >=
                count( $ads_list['ads_grouped_by_site'] )
            ) {

            // -----------------------------------------------------------------

            $ads_list['current_site_index'] = 0 ;

            $wrapped_back = TRUE ;

            continue ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // Get the selected site's:-
        //      o   Index (in $ads_list['ads_grouped_by_site']), and:-
        //      o   SID...
        // ---------------------------------------------------------------------

        $selected_site_index = $ads_list['current_site_index'] ;

        // ---------------------------------------------------------------------

        $selected_site_sid =
            $ads_list['ads_grouped_by_site'][ $selected_site_index ]['site_sid']
            ;

        // ---------------------------------------------------------------------
        // If the selected site is the displaying site - and the displaying
        // has disabled outgoing ads, then SKIP this site...
        // ---------------------------------------------------------------------

        if (    $displaying_sites_site_profile['question_disable_outgoing_ads'] === TRUE
                &&
                (   $selected_site_sid
                    ===
                    $displaying_sites_site_profile['ad_swapper_site_sid_addon']
                    )
            ) {

            $ads_list['current_site_index']++ ;

            continue ;
                //  Look for another site

        }

        // ---------------------------------------------------------------------
        // Has this SITE already been displayed on this iteration ?
        // ---------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
        // get_sites_displayed_this_page()
        // - - - - - - - - - - - - - - - -
        // Returns a list of the IDS of the sites that have had an ad already
        // displayed on the current page.
        //
        // The list should be an array like:-
        //      $sites_displayed_this_page = array(
        //          "<site-id-1>"       ,
        //          "<site-id-2>"       ,
        //          ...
        //          )
        //
        // RETURNS
        //      ARRAY $sites_displayed_this_page
        //
        // "dies()" on error
        // -------------------------------------------------------------------------

//      if (    in_array(
//                  $selected_site_sid                  ,
//                  get_sites_displayed_this_page()                                         ,
//                  TRUE
//                  )
//          ) {
//
//          $ads_list['current_site_index']++ ;
//
//          continue ;
//              //  Look for another site
//
//      }

        // ---------------------------------------------------------------------
        // Has this site exhausted the number of ads a single site is
        // allowed per page...
        // ---------------------------------------------------------------------

        if (    get_ads_this_site_this_page( $selected_site_sid )
                >=
                $max_ads_per_site_per_page
            ) {

            $ads_list['current_site_index']++ ;

            continue ;
                //  Look for another site

        }

        // ---------------------------------------------------------------------
        // Journey support...
        // ---------------------------------------------------------------------

//      if ( is_site_in_current_journey( $selected_site_sid ) ) {
//
//          // -----------------------------------------------------------------
//
//          if ( is_journey_ended( $site_sids_in_current_ads_list ) ) {
//
//              clear_current_journey() ;
//                  //  Start a new journey...
//
//          } else {
//
//              $ads_list['current_site_index']++ ;
//
//              continue ;
//                  //  Skip this site (already displayed this journey)
//
//          }
//
//          // -----------------------------------------------------------------
//
//      }

        // ---------------------------------------------------------------------
        // Get the current site's next free ad...
        // ---------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
        // get_next_ad_to_show_for_selected_site(
        //      $core_plugapp_dirs                          ,
        //      $loaded_datasets                            ,
        //      &$imagesize_records                         ,
        //      &$question_imagesize_records_changed        ,
        //      $widgets_ad_slot                            ,
        //      $ad_slot_type                               ,
        //      $ad_slot_ad_type                            ,
        //      $ad_slot_specific_ad_approval_routine_name  ,
        //      &$ad_slot_specific_ad_approval_parameters   ,
        //      $country_to_continent_codes_array           ,
        //      $allowed_two_letter_country_codes           ,
        //      $continent_codes_to_names_array             ,
        //      $countries_by_continent_codes_array         ,
        //      $users_geoip_info                           ,
        //      &$ads_list                                  ,
        //      $selected_site_index                        ,
        //      $max_ads_per_site_per_page                  ,
        //      $max_repetitions_per_ad_per_page
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      On SUCCESS
        //          o   $ads_list_record ARRAY
        //                  If a displayable ad could be found for this site
        //
        //              NOTE!
        //              =====
        //              The returned ads list record will have THREE extra fields
        //              - obtained from it's imagesize data:-
        //                  o   'width'     =>  <width in px>
        //                  o   'height'    =>  <height in px>
        //                  o   'imagesize' =>  the return value of the PHP
        //                                      "getimagesize()" function
        //
        //          o   FALSE
        //                  If NO displayable ad could be found for this site
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        $ads_list_record =
            get_next_ad_to_show_for_selected_site(
                $core_plugapp_dirs                          ,
                $loaded_datasets                            ,
                $imagesize_records                          ,
                $question_imagesize_records_changed         ,
                $widgets_ad_slot                            ,
                $ad_slot_type                               ,
                $ad_slot_ad_type                            ,
                $ad_slot_specific_ad_approval_routine_name  ,
                $ad_slot_specific_ad_approval_parameters    ,
                $country_to_continent_codes_array           ,
                $allowed_two_letter_country_codes           ,
                $continent_codes_to_names_array             ,
                $countries_by_continent_codes_array         ,
                $users_geoip_info                           ,
                $ads_list                                   ,
                $selected_site_index                        ,
                $max_ads_per_site_per_page                  ,
                $max_repetitions_per_ad_per_page
                ) ;

        // -------------------------------------------------------------------------

        if ( is_string( $ads_list_record ) ) {
            return $ads_list_record ;
        }

        // -------------------------------------------------------------------------

        if ( $ads_list_record === FALSE ) {

            $ads_list['current_site_index']++ ;

            continue ;
                //  Search for an ad from another site...

        }

        // ---------------------------------------------------------------------
        // This ad/site is OK to display...
        // ---------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
        // add_site_2_sites_displayed_this_page(
        //      $site_id
        //      )
        // - - - - - - - - - - - - - - - - - - -
        // Adds the specified site, to the list of sites already displayed on the
        // current page.
        //
        // RETURNS
        //      TRUE
        //
        // "dies()" on error
        // -------------------------------------------------------------------------

//      add_site_2_sites_displayed_this_page(
//          $ads_list_record['ad_swapper_site_sid']
//          ) ;

        // ---------------------------------------------------------------------
        // Increment the site pointer...
        //
        // NOTE!
        // =====
        // We do this to ensure that we work through the ads - displaying
        // one ad from each site in turn.
        // ---------------------------------------------------------------------

        $ads_list['current_site_index']++ ;

        // ---------------------------------------------------------------------
        // Increment the various ad/site counts...
        // ---------------------------------------------------------------------

        inc_number_times_ad_displayed_this_page( $ads_list_record['global_sid'] ) ;

        // ---------------------------------------------------------------------

        inc_ads_this_site_this_page( $selected_site_sid ) ;

        // ---------------------------------------------------------------------

//      add_site_to_current_journey( $selected_site_sid ) ;

        // ---------------------------------------------------------------------
        // Done!
        // ---------------------------------------------------------------------

        break ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Save the updated "ads list" details...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // set_ads_list(
    //      $ad_type    ,
    //      $ads_list
    //      )
    // - - - - - - - - -
    // Saves the specified "ads list" (in the WordPress options database).
    //
    // $ad_type must be one of:   "banner", "normal"
    //
    // RETURNS
    //      TRUE
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    set_ads_list(
        $ad_slot_ad_type    ,
        $ads_list
        ) ;

    // =========================================================================
    // SUCCESS!
    // =========================================================================

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $ads_list_record        ,
//    '$ads_list_record'
//    ) ;

    return $ads_list_record ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_next_ad_to_show_for_selected_site()
// =============================================================================

function get_next_ad_to_show_for_selected_site(
    $core_plugapp_dirs                          ,
    $loaded_datasets                            ,
    &$imagesize_records                         ,
    &$question_imagesize_records_changed        ,
    $widgets_ad_slot                            ,
    $ad_slot_type                               ,
    $ad_slot_ad_type                            ,
    $ad_slot_specific_ad_approval_routine_name  ,
    &$ad_slot_specific_ad_approval_parameters   ,
    $country_to_continent_codes_array           ,
    $allowed_two_letter_country_codes           ,
    $continent_codes_to_names_array             ,
    $countries_by_continent_codes_array         ,
    $users_geoip_info                           ,
    &$ads_list                                  ,
    $selected_site_index                        ,
    $max_ads_per_site_per_page                  ,
    $max_repetitions_per_ad_per_page
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_next_ad_to_show_for_selected_site(
    //      $core_plugapp_dirs                          ,
    //      $loaded_datasets                            ,
    //      &$imagesize_records                         ,
    //      &$question_imagesize_records_changed        ,
    //      $widgets_ad_slot                            ,
    //      $ad_slot_type                               ,
    //      $ad_slot_ad_type                            ,
    //      $ad_slot_specific_ad_approval_routine_name  ,
    //      &$ad_slot_specific_ad_approval_parameters   ,
    //      $country_to_continent_codes_array           ,
    //      $allowed_two_letter_country_codes           ,
    //      $continent_codes_to_names_array             ,
    //      $countries_by_continent_codes_array         ,
    //      $users_geoip_info                           ,
    //      &$ads_list                                  ,
    //      $selected_site_index                        ,
    //      $max_ads_per_site_per_page                  ,
    //      $max_repetitions_per_ad_per_page
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          o   $ads_list_record ARRAY
    //                  If a displayable ad could be found for this site
    //
    //              NOTE!
    //              =====
    //              The returned ads list record will have THREE extra fields
    //              - obtained from it's imagesize data:-
    //                  o   'width'     =>  <width in px>
    //                  o   'height'    =>  <height in px>
    //                  o   'imagesize' =>  the return value of the PHP
    //                                      "getimagesize()" function
    //
    //          o   FALSE
    //                  If NO displayable ad could be found for this site
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $ads_list = array(
    //
    //          'ads_grouped_by_site'   =>  array(
    //
    //              array(
    //
    //                  'site_sid'  =>  "xxx"
    //
    //                  'ads'   =>  array(
    //                                  <ads-record-1>
    //                                  <ads-record-2>
    //                                  ...
    //                                  <ads-record-N>
    //                                  )
    //
    //                  'ad_indices_by_sid'     =>  array(
    //                      <ad-sid-1>      =>  0   ,
    //                      <ad-sid-2>      =>  1   ,
    //                      ...
    //                      <ad-sid-N>      =>  M
    //                      )
    //
    //                  'next_free_ad_index'    =>  <0...>
    //
    //                  'question_all_ads_shown'    =>  TRUE/FALSE
    //
    //                  )
    //
    //              ...
    //
    //              )
    //
    //          'site_indices_by_sid'    =>  array(
    //              <site-sid-1>    =>  0   ,
    //              <site-sid-2>    =>  1   ,
    //              ...
    //              <site-sid-N>    =>  M
    //              )
    //
    //          'current_site_index'        =>  <0...>
    //
    //          'question_all_ads_shown'    =>  TRUE/FALSE
    //
    //          )
    //
    // -------------------------------------------------------------------------

    if (    ! array_key_exists(
                'allowed_special_types'                     ,
                $ad_slot_specific_ad_approval_parameters
                )
        ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        return <<<EOT
PROBLEM:&nbsp; Bad "ad_slot_specific_ad_approval_parameters" record (no "allowed_special_types" field)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/url-utils.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\
    // is_localhost()
    // - - - - - - -
    // Returns a flag indicating whether or not the current script is
    // running on localhost or not.
    //
    // RETURNS
    //      TRUE or FALSE
    // -------------------------------------------------------------------------

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/validata/url-validators.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // absolute_url_string__minLen_maxLen_questionEmptyOK(
    //      $value                              ,
    //      $minlen            = 'default'      ,
    //      $maxlen            = 'default'      ,
    //      $question_empty_ok = TRUE
    //      )
    // - - - - - - - - - - - - - - - - - - - - -
    // NOTES!
    // ------
    // 1.   $question_empty_ok gives you the flexibility to specify (eg):-
    //          o   $minlen = 32
    //          o   $maxlen = 64
    //          o   $question_empty_ok = TRUE
    //
    //      So as to permit either:-
    //          o   The empty string, or;
    //          o   A 32 to 64 character URL string.
    //
    // 2.   Default $minlen = 10 = strlen( "http://x.y" )
    //      (= shortest possible absolute URL).
    //
    // 3.   Default $maxlen = 2000
    //      See (eg):
    //          http://stackoverflow.com/questions/417142/what-is-the-maximum-length-of-a-url-in-different-browsers
    //
    // RETURNS
    //      On SUCCESS!
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $image_url_minlen            = 'default' ;
    $image_url_maxlen            = 'default' ;
    $image_url_question_empty_ok = FALSE     ;

    // -------------------------------------------------------------------------

    $link_url_minlen            = 'default' ;
    $link_url_maxlen            = 'default' ;
    $link_url_question_empty_ok = TRUE      ;

    // -------------------------------------------------------------------------

    $the_sites_ad_count =
        count( $ads_list['ads_grouped_by_site'][ $selected_site_index ]['ads'] )
        ;

    // -------------------------------------------------------------------------

    $start_next_free_ad_index =
        $ads_list['ads_grouped_by_site'][ $selected_site_index ]['next_free_ad_index']
        ;
        //  Used to prevent lock-up

    // -------------------------------------------------------------------------

    $wrapped_back = FALSE ;
        //  Also used to prevent lock-up

    // -------------------------------------------------------------------------

    while ( TRUE ) {

        // ---------------------------------------------------------------------
        // Check for wrap-back...
        // ---------------------------------------------------------------------

        if (    $wrapped_back
                &&
                $ads_list['ads_grouped_by_site'][ $selected_site_index ]['next_free_ad_index'] === $start_next_free_ad_index
            ) {

            // -----------------------------------------------------------------
            // Couldn't find a showable ad for this site.  Will have to try
            // another site...
            // -----------------------------------------------------------------

            return FALSE ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // Check for wrap-around...
        // ---------------------------------------------------------------------

        if ( $ads_list['ads_grouped_by_site'][ $selected_site_index ]['next_free_ad_index'] >= $the_sites_ad_count ) {

            // -----------------------------------------------------------------
            // Wrap-around, to try from the beginning of the site's ads list
            // again...
            // -----------------------------------------------------------------

            set_all_site_ads_shown_true(
                $ads_list               ,
                $selected_site_index
                ) ;

            $ads_list['ads_grouped_by_site'][ $selected_site_index ]['next_free_ad_index'] = 0 ;

            $wrapped_back = TRUE ;

            continue ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // Get the ad record to (possibly) show...
        // ---------------------------------------------------------------------

        $ads_list_record =
            $ads_list['ads_grouped_by_site'][ $selected_site_index ]['ads'][
                $ads_list['ads_grouped_by_site'][ $selected_site_index ]['next_free_ad_index']
            ]
            ;

        // ---------------------------------------------------------------------
        // Displayed too much ?
        // ---------------------------------------------------------------------

        if (    get_number_times_ad_displayed_this_page( $ads_list_record['global_sid'] )
                >=
                $max_repetitions_per_ad_per_page
            ) {

            $ads_list['ads_grouped_by_site'][ $selected_site_index ]['next_free_ad_index']++ ;
            continue ;
                //  Skip this ad (shown max. #times already)...

        }

        // ---------------------------------------------------------------------
        // special_type ?
        // ---------------------------------------------------------------------

        if ( ! array_key_exists( 'special_type' , $ads_list_record ) ) {

            $ns = __NAMESPACE__ ;
            $fn = __FUNCTION__  ;
            $ln = __LINE__ - 4  ;

            return <<<EOT
PROBLEM:&nbsp; Bad "ads_list" record (no "special_type" field)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

        if (    ! in_array(
                    $ads_list_record['special_type']                                    ,
                    $ad_slot_specific_ad_approval_parameters['allowed_special_types']
                    )
            ) {
            $ads_list['ads_grouped_by_site'][ $selected_site_index ]['next_free_ad_index']++ ;
            continue ;
                //  Skip this ad (not one of the ad slot's supported special
                //  types)...
        }

        // ---------------------------------------------------------------------
        // image_url ?
        // ---------------------------------------------------------------------

        if (    \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\absolute_url_string__minLen_maxLen_questionEmptyOK(
                    $ads_list_record['image_url']   ,
                    $image_url_minlen               ,
                    $image_url_maxlen               ,
                    $image_url_question_empty_ok
                    ) !== TRUE
            ) {
            $ads_list['ads_grouped_by_site'][ $selected_site_index ]['next_free_ad_index']++ ;
            continue ;
                //  Skip this ad (the image url is either unspecified or
                //  invalid).
        }

        // ---------------------------------------------------------------------
        // link_url ?
        // ---------------------------------------------------------------------

        if (    \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\absolute_url_string__minLen_maxLen_questionEmptyOK(
                    $ads_list_record['link_url']    ,
                    $link_url_minlen                ,
                    $link_url_maxlen                ,
                    $link_url_question_empty_ok
                    ) !== TRUE
            ) {
            $ads_list['ads_grouped_by_site'][ $selected_site_index ]['next_free_ad_index']++ ;
            continue ;
                //  Skip this ad (the link url is invalid).
        }

        // ---------------------------------------------------------------------
        // Get the image's IMAGESIZE data (and check that the image exists - and
        // is web-compatable - at the same time)...
        // ---------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer\
        // get_imagesize_data_4_image_at_url(
        //      $core_plugapp_dirs                      ,
        //      &$imagesize_records                     ,
        //      &$question_imagesize_records_changed    ,
        //      $image_url
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS:-
        //      On SUCCESS
        //
        //          o   FALSE
        //                  (= not a valid Ad Swapper supported - ie;
        //                  web-compatable - image)
        //
        //          --OR--
        //
        //          o   ARRAY $imagesize_details
        //
        //              Where $imagesize_details is one of:-
        //
        //              --  array(
        //                      'last_checked_datetime_utc'     =>  <unix-timestamp>    ,
        //                      'question_image_ok'             =>  TRUE                ,
        //                      'imagesize'                     =>  <imagesize>         ,
        //                      'width'                         =>  <width>             ,
        //                      'height'                        =>  <height>
        //                      )
        //
        //              --  array(
        //                      'last_checked_datetime_utc'     =>  <unix-timestamp>    ,
        //                      'question_image_ok'             =>  FALSE               ,
        //                      'imagesize'                     =>  NULL                ,
        //                      'width'                         =>  NULL                ,
        //                      'height'                        =>  NULL
        //                      )
        //
        //              NOTE!
        //              =====
        //              If the specified image is OK - but ISN'T in:-
        //                  $imagesize_records
        //
        //              then adds it and updates:-
        //                  $imagesize_records
        //                  $question_imagesize_records_changed (sets it to TRUE)
        //
        //              accordingly.
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        $imagesize_data =
            get_imagesize_data_4_image_at_url(
                $core_plugapp_dirs                      ,
                $imagesize_records                      ,
                $question_imagesize_records_changed     ,
                $ads_list_record['image_url']
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $imagesize_data ) ) {
            return $imagesize_data ;
        }

        // ---------------------------------------------------------------------

        if (    $imagesize_data === FALSE
                ||
                $imagesize_data['question_image_ok'] !== TRUE
            ) {
            $ads_list['ads_grouped_by_site'][ $selected_site_index ]['next_free_ad_index']++ ;
            continue ;
                //  Skip this ad (the image ain't right)
        }

        // ---------------------------------------------------------------------
        // Do the ad slot specific image approval...
        // ---------------------------------------------------------------------

        if (    is_string( $ad_slot_specific_ad_approval_routine_name )
                &&
                trim( $ad_slot_specific_ad_approval_routine_name ) !== ''
            ) {

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer\
            // <ad_slot_specific_ad_approval_routine>(
            //      $core_plugapp_dirs                          ,
            //      $loaded_datasets                            ,
            //      $widgets_ad_slot                            ,
            //      $ad_slot_type                               ,
            //      $ad_slot_ad_type                            ,
            //      &$ad_slot_specific_ad_approval_parameters   ,
            //      $ads_list_record                            ,
            //      $imagesize_data
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - - - -
            // NOTE!
            // =====
            // This routine is only called if $imagesize_data is like (eg):-
            //
            //      $imagesize_data = Array(
            //          [last_checked_datetime_utc] => 1443678946
            //          [question_image_ok]         => 1
            //          [imagesize]                 => Array(
            //                                              [0]     => 600
            //                                              [1]     => 1200
            //                                              [2]     => 3
            //                                              [3]     => width="600" height="1200"
            //                                              [bits]  => 8
            //                                              [mime]  => image/png
            //                                              )
            //          [width]                     => 600
            //          [height]                    => 1200
            //          )
            //
            // In other words, the routine is only called if:-
            //      $imagesize_data['question_image_ok'] === TRUE
            //
            // RETURNS
            //      On SUCCESS
            //          $ok = TRUE/FALSE.  Ie:-
            //                  o   TRUE  = Yes, this ad can be displayed.
            //                  o   FALSE = No, SKIP this ad.
            //
            //      On FAILURE
            //          $error_message STRING
            // -------------------------------------------------------------------------

            $ok =
                $ad_slot_specific_ad_approval_routine_name(
                    $core_plugapp_dirs                          ,
                    $loaded_datasets                            ,
                    $widgets_ad_slot                            ,
                    $ad_slot_type                               ,
                    $ad_slot_ad_type                            ,
                    $ad_slot_specific_ad_approval_parameters    ,
                    $ads_list_record                            ,
                    $imagesize_data
                    ) ;

            // ----------------------------------------------------------------

            if ( is_string( $ok ) ) {
                return $ok ;
            }

            // ----------------------------------------------------------------

            if ( $ok !== TRUE ) {
                $ads_list['ads_grouped_by_site'][ $selected_site_index ]['next_free_ad_index']++ ;
                continue ;
                    //  Skip this ad (ad slot doesn't like it)
            }

            // ----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // Show this ad to the user ?
        // ---------------------------------------------------------------------

        if ( ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\is_localhost() ) {

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
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

            $result = should_user_see_this_ad(
                            $core_plugapp_dirs                      ,
                            $country_to_continent_codes_array       ,
                            $allowed_two_letter_country_codes       ,
                            $continent_codes_to_names_array         ,
                            $countries_by_continent_codes_array     ,
                            $users_geoip_info                       ,
                            $ads_list_record
                            ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return $result ;
            }

            // -----------------------------------------------------------------

            if ( $result !== TRUE ) {

                // -------------------------------------------------------------
                // Ad is NOT for user.  Look for another ad...
                // -------------------------------------------------------------

                $ads_list['ads_grouped_by_site'][ $selected_site_index ]['next_free_ad_index']++ ;

                continue ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // We CAN show this ad (to the user)...
        // ---------------------------------------------------------------------

        break ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // Increment the selected site's ad pointer
    // -------------------------------------------------------------------------

    $ads_list['ads_grouped_by_site'][ $selected_site_index ]['next_free_ad_index']++ ;

    // -------------------------------------------------------------------------
    // Update "all ads shown" (if necessary)...
    // -------------------------------------------------------------------------

    if ( $ads_list['ads_grouped_by_site'][ $selected_site_index ]['next_free_ad_index'] >= $the_sites_ad_count ) {

        // ---------------------------------------------------------------------

        set_all_site_ads_shown_true(
            $ads_list               ,
            $selected_site_index
            ) ;

        // ---------------------------------------------------------------------

        $ads_list['ads_grouped_by_site'][ $selected_site_index ]['next_free_ad_index'] = 0 ;
            //  Wrap-around - to start showing the site's ads again...

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // Burn the imagesize data into the ads list record...
    // -------------------------------------------------------------------------

    $ads_list_record['width']     = $imagesize_data['width']     ;
    $ads_list_record['height']    = $imagesize_data['height']    ;
    $ads_list_record['imagesize'] = $imagesize_data['imagesize'] ;

    // -------------------------------------------------------------------------
    // Return the ad to the caller...
    // -------------------------------------------------------------------------

    return $ads_list_record ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// set_all_site_ads_shown_true()
// =============================================================================

function set_all_site_ads_shown_true(
    &$ads_list              ,
    $selected_site_index
    ) {

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // We run this routine once we've completed the first pass through a site's
    // as list.
    //
    // Those ads are then counted as all having been displayed (even though
    // some of them may NOT have been displayed - as for GeoIP reasons, for
    // example).
    //
    // But the assumption is that every ad has at least had a chance to be
    // displayed.  And even though some advertisers turned it down, once all
    // ads in the ads list have had the 1 chance, then we should reload and
    // re-shuffle the ads list (before continuing).
    // -------------------------------------------------------------------------

    $ads_list['ads_grouped_by_site'][ $selected_site_index ]['question_all_ads_shown'] =
        TRUE
        ;
        //  Update the SITE's "all ads shown"...

    // -------------------------------------------------------------------------

    $global_all_ads_shown = TRUE ;

    // -------------------------------------------------------------------------

    foreach ( $ads_list['ads_grouped_by_site'] as $this_site ) {

        if ( $this_site['question_all_ads_shown'] !== TRUE ) {
            $global_all_ads_shown = FALSE ;
        }

    }

    // -------------------------------------------------------------------------

    $ads_list['question_all_ads_shown'] = $global_all_ads_shown ;
        //  Update the global "all ads shown"...

    // -------------------------------------------------------------------------

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
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
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
    //  FreeGeoIP.Net Problems
    //  As Of Early 2016
    //  ----------------------
    //  FreeGeoIP.Net is where we get:-
    //      $users_geoip_info
    //
    //  from.  But this service seems to be down a lot.
    //
    //  TODO !!!    We need to organise a replacement !!!
    //
    //  In the interim, if:-
    //      $users_geoip_info
    //
    //  ISN'T an array - then we assume it's a:-
    //      "Connection timed out after 5000 milliseconds"
    //
    //  (or other) error message string.  And display the ad anyway (regardless
    //  of whether the user should see it or not).
    //
    //  Because if we DON'T do this, then when "freegeoip.net" is down, NO ads
    //  will be displayed at all.
    // =========================================================================

    if ( is_string( $users_geoip_info ) ) {
        return TRUE ;
    }

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

        $continent_codes_incl = explode(
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

        foreach ( $continent_codes_incl as $this_continent_code ) {

            if (    array_key_exists( $this_continent_code , $continent_codes_to_names_array )
                    &&
                    ! in_array( $this_continent_code , $continents_to_include , TRUE )
                ) {
                $continents_to_include[] = $this_continent_code ;
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
// That's that!
// =============================================================================

