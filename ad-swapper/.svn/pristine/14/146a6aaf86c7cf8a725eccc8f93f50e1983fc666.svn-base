<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / AD-DISPLAYER / RELOAD-ADS-LIST.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer ;

// =============================================================================
// reload_ads_list()
// =============================================================================

function reload_ads_list(
    $core_plugapp_dirs              ,
    $loaded_datasets                ,
    $available_sites_dataset_slug   ,
    $available_ads_dataset_slug     ,
    $widgets_ad_slot                ,
    $ad_slot_type                   ,
    $ad_slot_ad_type
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // reload_ads_list(
    //      $core_plugapp_dirs              ,
    //      $loaded_datasets                ,
    //      $available_sites_dataset_slug   ,
    //      $available_ads_dataset_slug     ,
    //      $widgets_ad_slot                ,
    //      $ad_slot_type                   ,
    //      $ad_slot_ad_type                ,
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
    // OVERVIEW!
    // ---------
    // The "ads list" is created from the:-
    //      ad_swapper_available_ads, and;
    //      ad_swapper_available_sites
    //
    // datasets.  Ie:-
    //
    //      $loaded_datasets = array(
    //
    //          ...
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
    //          ...
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
    //          ...
    //
    //          )
    //
    // =========================================================================

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

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // =========================================================================
    // Any Available Sites and Ads ?
    //
    // If NOT, then we can't display any ads...
    // =========================================================================

    if (    count( $loaded_datasets[ $available_sites_dataset_slug ]['records'] ) < 1
            ||
            count( $loaded_datasets[ $available_ads_dataset_slug ]['records'] ) < 1
        ) {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
        // get_empty_ads_list()
        // - - - - - - - - - -
        // Returns an empty ads list (no sites nor ads).
        //
        // RETURNS
        //      $ads_list ARRAY
        // -------------------------------------------------------------------------

        $ads_list = get_empty_ads_list() ;

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

        // ---------------------------------------------------------------------

        return TRUE ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Make a list of the "ad_swapper_site_sids" - of the sites that are
    // allowed to display ads (on this ad displaying site)...
    // =========================================================================

    $other_site_specific_settings_dataset_slug = 'ad_swapper_other_site_specific_settings' ;

    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $loaded_datasets[ $other_site_specific_settings_dataset_slug ]      ,
//    '$loaded_datasets[ $other_site_specific_settings_dataset_slug ]'
//    ) ;

    // -------------------------------------------------------------------------

    $enabled_ad_swapper_site_sids = array() ;

    // -------------------------------------------------------------------------

    foreach ( $loaded_datasets[ $other_site_specific_settings_dataset_slug ]['records'] as $this_index => $this_record ) {

        if ( $this_record['question_display_this_sites_ads_on_your_site'] ) {
            $enabled_ad_swapper_site_sids[] = $this_record['ad_swapper_site_sid'] ;
        }

    }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $enabled_ad_swapper_site_sids       ,
//    '$enabled_ad_swapper_site_sids'
//    ) ;

    // =========================================================================
    // If NO sites are enabled, then we DON'T display any ads...
    // =========================================================================

    if ( count( $enabled_ad_swapper_site_sids ) < 1 ) {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
        // get_empty_ads_list()
        // - - - - - - - - - -
        // Returns an empty ads list (no sites nor ads).
        //
        // RETURNS
        //      $ads_list ARRAY
        // -------------------------------------------------------------------------

        $ads_list = get_empty_ads_list() ;

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

        // ---------------------------------------------------------------------

        return TRUE ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Create the (generally non-empty) "ads list" proper...
    //
    // By looping over the available ads - looking for those ads that this
    // displaying site can display.
    // =========================================================================

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

    $ads_list = array() ;

    // -------------------------------------------------------------------------

    foreach ( $loaded_datasets[ $available_ads_dataset_slug ]['records'] as $this_index => $this_record ) {

        // ---------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $this_record = Array(
        //          [created_server_datetime_utc]       => 1430208434
        //          [last_modified_server_datetime_utc] => 1430208434
        //          [key]                               => a93f16d3-571d-42a8-b8ea-e9b47a310a72-1430208434-842855-1832
        //          [global_sid]                        => 9khc-zwmv
        //          [ad_swapper_site_sid]               => 2kmv-hzgc
        //          [image_url]                         => http://localhost/plugdev/wp-content/uploads/2015/02/ad-swapper-happy-dogs-ad-2.png
        //          [link_url]                          => http://www.nzkc.org.nz/
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
        //          [owner_site_unique_key]             => 2222-2222-2222-2222
        //          )
        //
        // ---------------------------------------------------------------------

        // ---------------------------------------------------------------------
        // Skip ads that the ad displaying site DOESN'T want to display...
        // ---------------------------------------------------------------------

        if ( ! $this_record['question_display'] ) {
            continue ;
        }

        // ---------------------------------------------------------------------
        // Skip ads that belong to sites that the displaying site DOESN'T want
        // to advertise...
        // ---------------------------------------------------------------------

        if ( ! in_array(
                    $this_record['ad_swapper_site_sid']     ,
                    $enabled_ad_swapper_site_sids
                    )
            ) {
            continue ;
        }

        // ---------------------------------------------------------------------
        // Ads MUST have a "special_type" field...
        // ---------------------------------------------------------------------

        if ( ! array_key_exists( 'special_type' , $this_record ) ) {

            $ns = __NAMESPACE__ ;
            $fn = __FUNCTION__  ;
            $ln = __LINE__ - 4  ;

            return <<<EOT
PROBLEM:&nbsp; Bad "available ads" record (no "special_type" field)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------
        // Validate the "special_type" field...
        // ---------------------------------------------------------------------

        $add_this_ad = FALSE ;

        // ---------------------------------------------------------------------

        if (    $ad_slot_ad_type === 'normal'
                &&
                $this_record['special_type'] === ''
            ) {
            $add_this_ad = TRUE ;

        } elseif ( $this_record['special_type'] === $ad_slot_ad_type ) {
            $add_this_ad = TRUE ;

        }

        // ---------------------------------------------------------------------
        // Accept only those ads that have a valid/recognised "special_type"
        // field...
        // ---------------------------------------------------------------------

        if ( $add_this_ad ) {

            // -----------------------------------------------------------------
            // Add the first site/ad ?
            // -----------------------------------------------------------------

            if ( ! array_key_exists( 'site_indices_by_sid' , $ads_list ) ) {

                $ads_list['ads_grouped_by_site']    = array() ;
                $ads_list['site_indices_by_sid']    = array() ;
                $ads_list['current_site_index']     = 0 ;
                $ads_list['question_all_ads_shown'] = FALSE ;

            }

            // -----------------------------------------------------------------

            if (    array_key_exists(
                        $this_record['ad_swapper_site_sid']     ,
                        $ads_list['site_indices_by_sid']
                        )
                ) {

                //  ------------------------------------------------------------
                //  Extra Ad To Existing Site
                //  ------------------------------------------------------------

                $site_index =
                    $ads_list['site_indices_by_sid'][ $this_record['ad_swapper_site_sid'] ]
                    ;

                //  ------------------------------------------------------------

                $ad_index =
                    count( $ads_list['ads_grouped_by_site'][ $site_index ]['ads'] )
                    ;

                //  ------------------------------------------------------------

                $ads_list['ads_grouped_by_site'][ $site_index ]['ads'][] =
                    $this_record
                    ;

                //  ------------------------------------------------------------

                $ads_list['ads_grouped_by_site'][ $site_index ]['ad_indices_by_sid'][
                    $this_record['global_sid']
                    ] = $ad_index ;

                //  ------------------------------------------------------------

            } else {

                //  ------------------------------------------------------------
                //  First Ad To New Site
                //  ------------------------------------------------------------

                $site_record = array(
                        'site_sid'                  =>  $this_record['ad_swapper_site_sid']     ,
                        'ads'                       =>  array(
                                                            $this_record
                                                            )                                   ,
                        'ad_indices_by_sid'         =>  array(
                                                            $this_record['global_sid']  =>  0
                                                            )                                   ,
                        'next_free_ad_index'        =>  0                                       ,
                        'question_all_ads_shown'    =>  FALSE
                        ) ;

                //  ------------------------------------------------------------

                $site_index =
                    count( $ads_list['ads_grouped_by_site'] )
                    ;

                //  ------------------------------------------------------------

                $ads_list['ads_grouped_by_site'][] = $site_record ;

                //  ------------------------------------------------------------

                $ads_list['site_indices_by_sid'][
                    $this_record['ad_swapper_site_sid']
                    ] = $site_index ;

                //  ------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // If there were NO "enabled" ads, the Ads List, so far, will be empty...
    // =========================================================================

    if ( count( $ads_list ) < 1 ) {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
        // get_empty_ads_list()
        // - - - - - - - - - -
        // Returns an empty ads list (no sites nor ads).
        //
        // RETURNS
        //      $ads_list ARRAY
        // -------------------------------------------------------------------------

        $ads_list = get_empty_ads_list() ;

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

        // ---------------------------------------------------------------------

        return TRUE ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Randomise the sites...
    // =========================================================================

    // -------------------------------------------------------------------------
    // bool shuffle ( array &$array )
    // - - - - - - - - - - - - - - -
    // This function shuffles (randomizes the order of the elements in) an
    // array.
    //
    //      array
    //          The array.
    //
    // Returns TRUE on success or FALSE on failure.
    //
    // (PHP 4, PHP 5)
    // -------------------------------------------------------------------------

    if (    array_key_exists( 'ads_grouped_by_site' , $ads_list )
            &&
            count( $ads_list['ads_grouped_by_site'] ) > 1
        ) {

        // ---------------------------------------------------------------------

        if ( shuffle( $ads_list['ads_grouped_by_site'] ) !== TRUE ) {

            $ns = __NAMESPACE__ ;
            $fn = __FUNCTION__  ;
            $ln = __LINE__ - 4  ;

            return <<<EOT
PROBLEM:&nbsp; Couldn't shuffle sites
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Randomise each site's ads...
    // =========================================================================

    if ( array_key_exists( 'ads_grouped_by_site' , $ads_list ) ) {

        // ---------------------------------------------------------------------

        foreach ( $ads_list['ads_grouped_by_site'] as $site_index => $site_details ) {

            // -----------------------------------------------------------------

            if ( count( $site_details['ads'] ) > 1 ) {

                // -------------------------------------------------------------

                if ( shuffle( $ads_list['ads_grouped_by_site'][ $site_index ]['ads'] ) !== TRUE ) {

                    $ns = __NAMESPACE__ ;
                    $fn = __FUNCTION__  ;
                    $ln = __LINE__ - 4  ;

                    return <<<EOT
PROBLEM:&nbsp; Couldn't shuffle ads (for site index {$site_index})
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Validate the new ads list...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // die_if_bad_ads_list(
    //      $ads_list
    //      )
    // - - - - - - - - -
    // Dies if the the specified "ads list" appears INVALID (in the sense that
    // it's NOT an ARRAY that contains the variables that it's supposed to).
    //
    // RETURNS
    //      Nothing
    //
    // die()s on error
    // -------------------------------------------------------------------------

//  die_if_bad_ads_list( $ads_list ) ;
        //  Done when saving

    // =========================================================================
    // Save the "ads list" (to the WordPress options database)...
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

    return TRUE ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

