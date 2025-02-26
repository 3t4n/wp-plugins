<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / AD-DISPLAYER /
//      GET-AD-SLOT-HTML-4-FIXED-ROW-HEIGHT-GRID.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer ;

// =============================================================================
// get_ad_slot_html_4_fixed_row_height_grid()
// =============================================================================

function get_ad_slot_html_4_fixed_row_height_grid(
    $core_plugapp_dirs                      ,
    $loaded_datasets                        ,
    $available_sites_dataset_slug           ,
    $available_ads_dataset_slug             ,
    $widgets_ad_slot                        ,
    $ad_slot_type                           ,
    $ad_slot_ad_type                        ,
    &$imagesize_records                     ,
    &$question_imagesize_records_changed    ,
    $max_ads_per_site_per_page              ,
    $max_repetitions_per_ad_per_page        ,
    $displaying_sites_site_profile
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_ad_slot_html_4_fixed_row_height_grid(
    //      $core_plugapp_dirs                      ,
    //      $loaded_datasets                        ,
    //      $available_sites_dataset_slug           ,
    //      $available_ads_dataset_slug             ,
    //      $widgets_ad_slot                        ,
    //      $ad_slot_type                           ,
    //      $ad_slot_ad_type                        ,
    //      &$imagesize_records                     ,
    //      &$question_imagesize_records_changed    ,
    //      $max_ads_per_site_per_page              ,
    //      $max_repetitions_per_ad_per_page        ,
    //      $displaying_sites_site_profile
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // Creates and returns the front-end HTML that goes where the widget
    // is.  In other words, generates and returns the Ad Swapper ad (or ads),
    // to go in the widget's ad slot.
    //
    // Returns the widget HTML (which could be an error message).
    //
    // RETURNS
    //      $widget_html STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // The purpose of this wrapper routine is to ensure that any "echo" or
    // "print_r()" (etc) output, is displayed BEFORE the ad slot widget's ads
    // (NOT after them).
    //
    // This makes it more obvious which ad the debugging output was generated
    // by/for.
    // -------------------------------------------------------------------------

    ob_start() ;

    $widget_html =
        get_ad_slot_html_4_fixed_row_height_grid_inner(
            $core_plugapp_dirs                      ,
            $loaded_datasets                        ,
            $available_sites_dataset_slug           ,
            $available_ads_dataset_slug             ,
            $widgets_ad_slot                        ,
            $ad_slot_type                           ,
            $ad_slot_ad_type                        ,
            $imagesize_records                      ,
            $question_imagesize_records_changed     ,
            $max_ads_per_site_per_page              ,
            $max_repetitions_per_ad_per_page        ,
            $displaying_sites_site_profile
            ) ;

    return ob_get_clean() . $widget_html ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_ad_slot_html_4_fixed_row_height_grid_inner()
// =============================================================================

function get_ad_slot_html_4_fixed_row_height_grid_inner(
    $core_plugapp_dirs                      ,
    $loaded_datasets                        ,
    $available_sites_dataset_slug           ,
    $available_ads_dataset_slug             ,
    $widgets_ad_slot                        ,
    $ad_slot_type                           ,
    $ad_slot_ad_type                        ,
    &$imagesize_records                     ,
    &$question_imagesize_records_changed    ,
    $max_ads_per_site_per_page              ,
    $max_repetitions_per_ad_per_page        ,
    $displaying_sites_site_profile
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_ad_slot_html_4_fixed_row_height_grid_inner(
    //      $core_plugapp_dirs                      ,
    //      $loaded_datasets                        ,
    //      $available_sites_dataset_slug           ,
    //      $available_ads_dataset_slug             ,
    //      $widgets_ad_slot                        ,
    //      $ad_slot_type                           ,
    //      $ad_slot_ad_type                        ,
    //      &$imagesize_records                     ,
    //      &$question_imagesize_records_changed    ,
    //      $max_ads_per_site_per_page              ,
    //      $max_repetitions_per_ad_per_page        ,
    //      $displaying_sites_site_profile
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // Creates and returns the front-end HTML that goes where the widget
    // is.  In other words, generates and returns the Ad Swapper ad (or ads),
    // to go in the widget's ad slot.
    //
    // Returns the widget HTML (which could be an error message).
    //
    // RETURNS
    //      $widget_html STRING
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
    //          [ad_swapper_ad_slots] => Array(
    //              [title]                 => Ad Slots
    //              [records]               => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_utc]                       => 1441072773
    //                      [last_modified_server_datetime_utc]                 => 1441072773
    //                      [key]                                               => 68269847-ef98-4a79-b820-1767f4da0375-1441072773-509128-4787
    //                      [local_key]                                         => 8764154d5752463839c8060e84774dd91e5c607191a010eb8d6d3cffd728cc50
    //                      [name]                                              => header-banner
    //                      [title]                                             => Header Banner
    //                      [description]                                       =>
    //                      [type]                                              => fixed-height-banner
    //                      [border_top_px]                                     =>
    //                      [border_bottom_px]                                  =>
    //                      [border_left_px]                                    =>
    //                      [border_right_px]                                   =>
    //                      [border_colour_top]                                 =>
    //                      [border_colour_bottom]                              =>
    //                      [border_colour_left]                                =>
    //                      [border_colour_right]                               =>
    //                      [fixed_height_banner_outer_width_px]                => 1040
    //                      [fixed_height_banner_outer_height_px]               => 140
    //                      [fixed_height_banner_fit_or_shrink]                 => shrink
    //                      [fixed_height_banner_halign]                        =>
    //                      [fixed_height_banner_valign]                        =>
    //                      [fixed_height_banner_undercolour]                   => transparent
    //                      [fixed_height_banner_min_ad_aspect_ratio]           =>
    //                      [fixed_height_banner_min_resized_ad_width_percent]  =>
    //                      [fixed_height_banner_extra_style]                   =>
    //                      [fixed_row_height_grid_outer_width_px]                            => 999
    //                      [fixed_row_height_grid_outer_max_height_px]                       =>
    //                      [fixed_row_height_grid_max_ads]                                   =>
    //                      [fixed_row_height_grid_gap_height_px]                             =>
    //                      [fixed_row_height_grid_gap_colour]                                =>
    //                      [fixed_row_height_grid_fit_start_height_div_width]                =>
    //                      [fixed_row_height_grid_fit_end_discard_start_height_div_width]    =>
    //                      [fixed_row_height_grid_extra_style]                               =>
    //                      [sequence_number]                                   =>
    //                      [question_disabled]                                 =>
    //                      [global_sid]                                        => ndzc-mhkw
    //                      )
    //                  ...
    //                  )
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array(
    //                  [68269847-ef98-4a79-b820-1767f4da0375-1441072773-509128-4787] => 0
    //                  ...
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
//$pr = ob_get_clean() ;

//ob_start() ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $loaded_datasets['ad_swapper_ad_slots'] , '$loaded_datasets[\'ad_swapper_ad_slots\']' ) ;
//$pr = ob_get_clean() ;

    // =========================================================================
    // Widget's Ad Slot record...
    // =========================================================================

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $widgets_ad_slot = Array(
    //          [created_server_datetime_utc]                             => 1443851305
    //          [last_modified_server_datetime_utc]                       => 1443851305
    //          [key]                                                     => 8b00d3d7-b8f0-4284-874f-ccdb8fd88e8f-1443851305-620859-5036
    //          [local_key]                                               => 5ea3db180228140495c564abad63fdc48c4311955bc075077eb6acf54e99abd2
    //          [name]                                                    => footer-grid
    //          [title]                                                   => Footer Grid
    //          [description]                                             =>
    //          [type]                                                    => fixed-row-height-grid
    //          [border_top_px]                                           =>
    //          [border_bottom_px]                                        =>
    //          [border_left_px]                                          => 20
    //          [border_right_px]                                         => 20
    //          [border_colour_top]                                       =>
    //          [border_colour_bottom]                                    =>
    //          [border_colour_left]                                      =>
    //          [border_colour_right]                                     =>
    //          [fixed_height_banner_outer_width_px]                      => 999
    //          [fixed_height_banner_outer_height_px]                     => 999
    //          [fixed_height_banner_min_ad_aspect_ratio]                 =>
    //          [fixed_height_banner_min_resized_ad_width_percent]        =>
    //          [fixed_height_banner_fit_or_shrink]                       =>
    //          [fixed_height_banner_halign]                              =>
    //          [fixed_height_banner_valign]                              =>
    //          [fixed_height_banner_undercolour]                         =>
    //          [fixed_height_banner_extra_style]                         =>
    //          [sidebar_outer_width_px]                                  => 999
    //          [sidebar_outer_max_height_px]                             =>
    //          [sidebar_max_ads]                                         =>
    //          [sidebar_gap_height_px]                                   =>
    //          [sidebar_gap_colour]                                      =>
    //          [sidebar_fit_start_height_div_width]                      =>
    //          [sidebar_fit_end_discard_start_height_div_width]          =>
    //          [sidebar_extra_style]                                     =>
    //          [fixed_row_height_grid_outer_width_px]                    => 1040
    //          [fixed_row_height_grid_number_rows]                       =>
    //          [fixed_row_height_grid_number_cols]                       =>
    //          [fixed_row_height_grid_hgap_px]                           =>
    //          [fixed_row_height_grid_hgap_colour]                       =>
    //          [fixed_row_height_grid_vgap_px]                           =>
    //          [fixed_row_height_grid_vgap_colour]                       =>
    //          [fixed_row_height_grid_row_fill_method]                   =>
    //          [fixed_row_height_grid_max_row_height_div_width]          =>
    //          [fixed_row_height_grid_discard_ad_image_height_div_width] =>
    //          [fixed_row_height_grid_valign]                            =>
    //          [fixed_row_height_grid_question_sort_on_height]           =>
    //          [fixed_row_height_grid_extra_style]                       =>
    //          [sequence_number]                                         =>
    //          [question_disabled]                                       =>
    //          )
    //
    // -------------------------------------------------------------------------

//ob_start() ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $widgets_ad_slot , '$widgets_ad_slot' ) ;
//$pr .= ob_get_clean() ;

    // =========================================================================
    // AD SLOT TYPE / AD SLOT AD TYPE
    // =========================================================================

    // -------------------------------------------------------------------------
    //
    //      -------------------------------------------
    //      AD SLOT TYPE                AD SLOT AD TYPE
    //      ==========================  ===============
    //      "fixed-height-banner"       "banner"
    //      "flexi-height-banner"       "banner"
    //      "fixed_row_height_grid"                   "normal"
    //      "fixed-row-height-grid"     "normal"
    //      "newspaper-style-grid"      "normal"
    //      -------------------------------------------
    //
    // -------------------------------------------------------------------------

    // =========================================================================
    // ERROR CHECKING!
    // =========================================================================

    // -------------------------------------------------------------------------
    // $ad_slot_type
    // -------------------------------------------------------------------------

    if ( $ad_slot_type !== 'fixed-row-height-grid' ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        return <<<EOT
PROBLEM:&nbsp; Bad "ad slot type" ("fixed-row-height-grid" expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------
    // $ad_slot_ad_type
    // -------------------------------------------------------------------------

    if ( $ad_slot_ad_type !== 'normal' ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        return <<<EOT
PROBLEM:&nbsp; Bad "ad slot ad type" ("normal" expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------
    // fixed_row_height_grid_outer_width_px
    // -------------------------------------------------------------------------

    $ad_slot_outer_width_px = trim( $widgets_ad_slot['fixed_row_height_grid_outer_width_px'] ) ;

    // -------------------------------------------------------------------------

    if ( $ad_slot_outer_width_px === '' ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        return <<<EOT
PROBLEM:&nbsp; No "fixed_row_height_grid_outer_width_px"
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------

    if (    ! ctype_digit( $ad_slot_outer_width_px )
            ||
            $ad_slot_outer_width_px < 1
        ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 6  ;

        return <<<EOT
PROBLEM:&nbsp; Bad "fixed_row_height_grid_outer_width_px" (1, 2, 3... expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // =========================================================================
    // Set the AD SLOT defaults...
    // =========================================================================

    $defaults = array(
        'border_top_px'                                           => 0               ,
        'border_bottom_px'                                        => 0               ,
        'border_left_px'                                          => 0               ,
        'border_right_px'                                         => 0               ,
        'border_colour_top'                                       => 'transparent'   ,
        'border_colour_bottom'                                    => 'transparent'   ,
        'border_colour_left'                                      => 'transparent'   ,
        'border_colour_right'                                     => 'transparent'   ,
        'fixed_row_height_grid_number_rows'                       => 3               ,
        'fixed_row_height_grid_number_cols'                       => 3               ,
        'fixed_row_height_grid_hgap_px'                           => 8               ,
        'fixed_row_height_grid_hgap_colour'                       => 'transparent'   ,
        'fixed_row_height_grid_vgap_px'                           => 8               ,
        'fixed_row_height_grid_vgap_colour'                       => 'transparent'   ,
        'fixed_row_height_grid_row_fill_method'                   => 'none'          ,
        'fixed_row_height_grid_max_row_height_div_width'          => 1               ,
        'fixed_row_height_grid_discard_ad_image_height_div_width' => 1.5             ,
        'fixed_row_height_grid_valign'                            => 'middle'        ,
        'fixed_row_height_grid_question_sort_on_height'           => 'yes'           ,
        'fixed_row_height_grid_question_delete_duplicates'        => 'yes'           ,
        'fixed_row_height_grid_extra_style'                       => ''
        ) ;

    // -------------------------------------------------------------------------

    foreach ( $widgets_ad_slot as $name => $value ) {

        // ---------------------------------------------------------------------

        if (    array_key_exists( $name , $defaults )
                &&
                trim( $value ) === ''
            ) {
            $widgets_ad_slot[ $name ] = $defaults[ $name ] ;
        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Support routines...
    // =========================================================================

    require_once( dirname( dirname( __FILE__ ) ) . '/get-next-ad-to-display.php' ) ;

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

    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // LOOP 1: Get the Ads (for the Grid)...
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

    // =========================================================================
    // Init. the various loop and ad selection parameters...
    // =========================================================================

    $allowed_special_types = array(
        ''
        ) ;

    // -------------------------------------------------------------------------

    $inner_box_width_px =
        $ad_slot_outer_width_px -
        $widgets_ad_slot['border_left_px'] -
        $widgets_ad_slot['border_right_px']
        ;

    // -------------------------------------------------------------------------

    if ( $widgets_ad_slot['fixed_row_height_grid_number_cols'] > 0 ) {

        $hgap_total =
            ( $widgets_ad_slot['fixed_row_height_grid_number_cols'] - 1 )
            *
            $widgets_ad_slot['fixed_row_height_grid_hgap_px']
            ;

    } else {

        $hgap_total = 0 ;

    }

    // -------------------------------------------------------------------------

    $total_available_cell_width_px = $inner_box_width_px - $hgap_total ;

    // -------------------------------------------------------------------------

    if ( $total_available_cell_width_px < $widgets_ad_slot['fixed_row_height_grid_number_cols'] ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        return <<<EOT
PROBLEM:&nbsp; Bad grid (the grid outer width, horizontal gaps, horizontal borders and/or number of columns specified, result in columns that are too thin)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------

    $cell_width_px =
        floor(
            $total_available_cell_width_px
            /
            $widgets_ad_slot['fixed_row_height_grid_number_cols']
            ) ;
            //  All but one column will be this wide

    // -------------------------------------------------------------------------

    $cell_width_incl_leftovers_px =
        $total_available_cell_width_px -
        ( ( $widgets_ad_slot['fixed_row_height_grid_number_cols'] - 1 ) * $cell_width_px )
        ;
        //  One column will be this wide

    // -------------------------------------------------------------------------

    $max_cell_height_px =
        round(
            $cell_width_px
            *
            $widgets_ad_slot['fixed_row_height_grid_max_row_height_div_width']
            ) ;

    // -------------------------------------------------------------------------

    $discard_height_px =
        round(
            $cell_width_px
            *
            $widgets_ad_slot['fixed_row_height_grid_discard_ad_image_height_div_width']
            ) ;

    // -------------------------------------------------------------------------

    $ad_slot_specific_ad_approval_routine_name =
        '\\' . __NAMESPACE__ .
        '\\ad_slot_specific_ad_approval_routine_4_fixed_row_height_grid'
        ;

    // =========================================================================
    // Get ads until the grid is full...
    // =========================================================================

    $cells_left =
        $widgets_ad_slot['fixed_row_height_grid_number_rows']
        *
        $widgets_ad_slot['fixed_row_height_grid_number_cols']
        ;

    // -------------------------------------------------------------------------

    $cols_this_row = 0 ;

    $cols_per_row = $widgets_ad_slot['fixed_row_height_grid_number_cols'] ;

    // -------------------------------------------------------------------------

    $ads_for_grid = array() ;

    // -------------------------------------------------------------------------

    while ( TRUE ) {

        // ---------------------------------------------------------------------
        // Room for any more ads ?
        // ---------------------------------------------------------------------

        if ( $cells_left <= 0 ) {
            break ;
        }

        // ---------------------------------------------------------------------
        // Get the next ads list record...
        // ---------------------------------------------------------------------

        $ad_slot_specific_ad_approval_parameters = array(
            'allowed_special_types'         =>  $allowed_special_types          ,
            'cols_this_row'                 =>  $cols_this_row                  ,
            'cols_per_row'                  =>  $cols_per_row                   ,
            'cell_width_px'                 =>  $cell_width_px                  ,
            'cell_width_incl_leftovers_px'  =>  $cell_width_incl_leftovers_px   ,
            'max_cell_height_px'            =>  $max_cell_height_px             ,
            'discard_height_px'             =>  $discard_height_px              ,
            'resized_image_width_px'        =>  NULL                            ,
            'resized_image_height_px'       =>  NULL
            ) ;
            //  NOTE!
            //  =====
            //  The following variables:-
            //      'resized_image_width_px'
            //      'resized_image_height_px'
            //
            // will be set by the called:-
            //      $ad_slot_specific_ad_approval_routine_name()
            //
            // routine.
            //
            // ---
            //
            // So for this reason:-
            //      $ad_slot_specific_ad_approval_parameters
            //
            // is passed by reference.

        // ---------------------------------------------------------------------

        $ads_list_record =
            get_next_ad_to_display(
                $core_plugapp_dirs                          ,
                $loaded_datasets                            ,
                $available_sites_dataset_slug               ,
                $available_ads_dataset_slug                 ,
                $widgets_ad_slot                            ,
                $ad_slot_type                               ,
                $ad_slot_ad_type                            ,
                $imagesize_records                          ,
                $question_imagesize_records_changed         ,
                $max_ads_per_site_per_page                  ,
                $max_repetitions_per_ad_per_page            ,
                $displaying_sites_site_profile              ,
                $ad_slot_specific_ad_approval_routine_name  ,
                $ad_slot_specific_ad_approval_parameters
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $ads_list_record ) ) {
            $ad_and_gap_html .= $ads_list_record ;
            break ;
        }

        // ---------------------------------------------------------------------
        // No more ads ?
        // ---------------------------------------------------------------------

        if ( $ads_list_record === FALSE ) {
            break ;
                //  Can't find any more ads to display...
        }

        // ---------------------------------------------------------------------
        // Save the ad data...
        // ---------------------------------------------------------------------

        $ads_for_grid[] = array(
            'ads_list_record'           =>  $ads_list_record                                                        ,
            'resized_image_width_px'    =>  $ad_slot_specific_ad_approval_parameters['resized_image_width_px']      ,
            'resized_image_height_px'   =>  $ad_slot_specific_ad_approval_parameters['resized_image_height_px']
            ) ;

        // ---------------------------------------------------------------------
        // Adjust the ad counter...
        // ---------------------------------------------------------------------

        $cells_left-- ;

        // ---------------------------------------------------------------------
        // Repeat with the next ad (if there's room for one)...
        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $ads_for_grid = Array(
    //
    //          [0] => Array(
    //
    //              [ads_list_record] => Array(
    //                  [created_server_datetime_utc]       => 1430208435
    //                  [last_modified_server_datetime_utc] => 1430208435
    //                  [key]                               => 1194a6f2-d8ce-4ee4-83ee-b5dde5831e9f-1430208435-9646-1834
    //                  [global_sid]                        => nnhw-zmcg
    //                  [ad_swapper_site_sid]               => 2kmv-hzgc
    //                  [image_url]                         => http://localhost/plugdev/wp-content/uploads/2015/02/ad-swapper-happy-dogs-ad-3.png
    //                  [link_url]                          => http://www.google.co.nz
    //                  [special_type]                      =>
    //                  [alt_text]                          =>
    //                  [description]                       =>
    //                  [start_datetime]                    =>
    //                  [end_datetime]                      =>
    //                  [aspect_ratio_min]                  =>
    //                  [aspect_ratio_max]                  =>
    //                  [sequence_number]                   =>
    //                  [geoip_continents_incl]             =>
    //                  [geoip_continents_excl]             =>
    //                  [geoip_countries_incl]              => NZ
    //                  [geoip_countries_excl]              =>
    //                  [geoip_regions_incl]                =>
    //                  [geoip_regions_excl]                =>
    //                  [geoip_cities_incl]                 =>
    //                  [geoip_cities_excl]                 =>
    //                  [question_display]                  => 1
    //                  [owner_site_unique_key]             => 2222-2222-2222-2222
    //                  [width]                             => 877
    //                  [height]                            => 481
    //                  [imagesize]                         => Array(
    //                                                              [0]    => 877
    //                                                              [1]    => 481
    //                                                              [2]    => 3
    //                                                              [3]    => width="877" height="481"
    //                                                              [bits] => 8
    //                                                              [mime] => image/png
    //                                                              )
    //                  )
    //
    //              [resized_image_width_px]  => 328
    //
    //              [resized_image_height_px] => 180
    //
    //              )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $ads_for_grid , '$ads_for_grid' ) ;

    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // Sort the ads (if needed)...
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

    if ( $widgets_ad_slot['fixed_row_height_grid_question_sort_on_height'] === 'yes' ) {

        // ---------------------------------------------------------------------
        // Delete duplicates (if requested)...
        // ---------------------------------------------------------------------

        if ( $widgets_ad_slot['fixed_row_height_grid_question_delete_duplicates'] === 'yes' ) {

            // -----------------------------------------------------------------

            $ad_keys_so_far = array() ;

            $temp = array() ;

            // -----------------------------------------------------------------

            foreach ( $ads_for_grid as $this_index => $this_ad_for_grid_record ) {

                // -------------------------------------------------------------

                if (    ! in_array(
                            $this_ad_for_grid_record['ads_list_record']['key']      ,
                            $ad_keys_so_far                                         ,
                            TRUE
                            )
                    ) {
                    $temp[] = $this_ad_for_grid_record ;
                    $ad_keys_so_far[] = $this_ad_for_grid_record['ads_list_record']['key'] ;
                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            $ads_for_grid = $temp ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // Sort what's left...
        // ---------------------------------------------------------------------

        usort(
            $ads_for_grid       ,
            '\\' . __NAMESPACE__ . '\\compare_ad_image_height'
            ) ;

        // ---------------------------------------------------------------------

    }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $ads_for_grid , '$ads_for_grid' ) ;

    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // LOOP 2: Display the Ads...
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

    $rows_displayed = 0 ;

    // -------------------------------------------------------------------------

    $all_rows_html = '' ;

    $this_rows_ads = array() ;

    // -------------------------------------------------------------------------

    foreach ( $ads_for_grid as $this_ads_for_grid_record ) {

        // ---------------------------------------------------------------------
        // Add this "ads for grid" record to the current row...
        // ---------------------------------------------------------------------

        $this_rows_ads[] = $this_ads_for_grid_record ;

        // ---------------------------------------------------------------------
        // If the row is full, add it to the output HTML...
        // ---------------------------------------------------------------------

        if ( count( $this_rows_ads ) >= $cols_per_row ) {

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer\
            // get_fixed_row_height_grid_row_html(
            //      $core_plugapp_dirs          ,
            //      $widgets_ad_slot            ,
            //      $this_rows_ads              ,
            //      $number_rows_displayed
            //      )
            // - - - - - - - - - - - - - - - - -
            // RETURNS
            //      $this_row_html STRING
            // -------------------------------------------------------------------------

            $all_rows_html .=
                get_fixed_row_height_grid_row_html(
                    $core_plugapp_dirs      ,
                    $widgets_ad_slot        ,
                    $this_rows_ads          ,
                    $rows_displayed         ,
                    $max_cell_height_px
                    ) ;

            // -----------------------------------------------------------------

            $rows_displayed++ ;

            // -----------------------------------------------------------------

            $this_rows_ads = array() ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // Repeat with the next ad (if there is one)...
        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // Add in any left-over part-filled row (due to duplicate ads having been
    // deleted)...
    // -------------------------------------------------------------------------

    if ( count( $this_rows_ads ) > 0 ) {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer\
        // get_fixed_row_height_grid_row_html(
        //      $core_plugapp_dirs          ,
        //      $widgets_ad_slot            ,
        //      $this_rows_ads              ,
        //      $number_rows_displayed
        //      )
        // - - - - - - - - - - - - - - - - -
        // RETURNS
        //      $this_row_html STRING
        // -------------------------------------------------------------------------

        $all_rows_html .=
            get_fixed_row_height_grid_row_html(
                $core_plugapp_dirs      ,
                $widgets_ad_slot        ,
                $this_rows_ads          ,
                $rows_displayed         ,
                $max_cell_height_px
                ) ;

        // ---------------------------------------------------------------------

//      $rows_displayed++ ;

        // ---------------------------------------------------------------------

//      $this_rows_ads = array() ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Put the "all rows" HTML into the container DIV...
    // =========================================================================

    // -------------------------------------------------------------------------
    // CSS Box Model
    // =============
    //
    //      Total element width =   width + left padding + right padding + left
    //                              border + right border + left margin + right
    //                              margin
    //
    //      Total element height =  height + top padding + bottom padding + top
    //                              border + bottom border + top margin + bottom
    //                              margin
    //
    //
    //
    //      +- Outer Box -----------------------------------------------+
    //      |                       TOP BORDER                          |
    //      |        +- Inner Box -----------------------------+        |
    //      |        |              TOP PADDING                |        |
    //      |        |         +- Ad Image ----------+         |        |
    //      | LEFT   | LEFT    |    WIDTH x HEIGHT   | RIGHT   | RIGHT  |
    //      | BORDER | PADDING |                     | PADDING | BORDER |
    //      |        |         +---------------------+         |        |
    //      |        |              BOTTOM PADDING             |        |
    //      |        +-----------------------------------------+        |
    //      |                       BOTTOM BORDER                       |
    //      +-----------------------------------------------------------+
    //
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // DIV STYLE
    // -------------------------------------------------------------------------

    $div_style = array(
        'margin:auto;'                                                                                                                                                      ,
        'border-top:'       . $widgets_ad_slot['border_top_px']    . 'px solid ' . $widgets_ad_slot['border_colour_top']    . ';'   ,
        'border-right:'     . $widgets_ad_slot['border_right_px']  . 'px solid ' . $widgets_ad_slot['border_colour_right']  . ';'   ,
        'border-bottom:'    . $widgets_ad_slot['border_bottom_px'] . 'px solid ' . $widgets_ad_slot['border_colour_bottom'] . ';'   ,
        'border-left:'      . $widgets_ad_slot['border_left_px']   . 'px solid ' . $widgets_ad_slot['border_colour_left']   . ';'   ,
        'padding:0'
        ) ;

    // -------------------------------------------------------------------------

    $div_style = implode( chr(32) , $div_style ) ;

    // -------------------------------------------------------------------------

    if ( trim( $widgets_ad_slot['fixed_row_height_grid_extra_style'] ) !== '' ) {
        $div_style .= ';' . trim( $widgets_ad_slot['fixed_row_height_grid_extra_style'] , ';' ) ;
    }

    // -------------------------------------------------------------------------
    // Final HTML...
    // -------------------------------------------------------------------------

    $out = <<<EOT
<div style="{$div_style}">{$all_rows_html}</div>
EOT;

    // =========================================================================
    // SUCCESS
    // =========================================================================

    return $out ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// compare_ad_image_height()
// =============================================================================

function compare_ad_image_height(
    $ads_for_grid_record_1      ,
    $ads_for_grid_record_2
    ) {

    if (    $ads_for_grid_record_1['resized_image_height_px']
            >
            $ads_for_grid_record_2['resized_image_height_px']
        ) {
        return 1 ;

    } elseif (  $ads_for_grid_record_1['resized_image_height_px']
                <
                $ads_for_grid_record_2['resized_image_height_px']
        ) {
        return -1 ;

    } else {
        return 0 ;

    }

}

// =============================================================================
// ad_slot_specific_ad_approval_routine_4_fixed_row_height_grid()
// =============================================================================

function ad_slot_specific_ad_approval_routine_4_fixed_row_height_grid(
    $core_plugapp_dirs                          ,
    $loaded_datasets                            ,
    $widgets_ad_slot                            ,
    $ad_slot_type                               ,
    $ad_slot_ad_type                            ,
    &$ad_slot_specific_ad_approval_parameters   ,
    $ads_list_record                            ,
    $imagesize_data
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

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
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
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $imagesize_data , '$imagesize_data' ) ;

    // -------------------------------------------------------------------------

    $aap = $ad_slot_specific_ad_approval_parameters ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $aap = Array(
    //                  [allowed_special_types]         => Array(
    //                                                          [0] =>
    //                                                          )
    //                  [cols_this_row]                 => 0
    //                  [cols_per_row]                  => 3
    //                  [cell_width_px]                 => 261
    //                  [cell_width_incl_leftovers_px]  => 262
    //                  [max_cell_height_px]            => 261
    //                  [discard_height_px]             => 392
    //                  [resized_image_width_px]        =>
    //                  [resized_image_height_px]       =>
    //                  )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $aap , '$aap' ) ;

    // =========================================================================
    // Get the resized ad image width...
    //
    // Where by resized, we mean resized so that it's width is the same as the
    // cell width (in which the ad is to be displayed).
    // =========================================================================

    if ( $aap['cols_this_row'] === 0 ) {
        $resized_ad_image_width_px = $aap['cell_width_incl_leftovers_px'] ;
            //  First col has the leftover pixels...

    } else {
        $resized_ad_image_width_px = $aap['cell_width_px'] ;

    }

    // =========================================================================
    // Get the resized ad image height...
    // =========================================================================

    $raw_image_aspect_ratio = $imagesize_data['width'] / $imagesize_data['height'] ;

    // -------------------------------------------------------------------------

    $resized_ad_image_height_px =
        round( $resized_ad_image_width_px / $raw_image_aspect_ratio )
        ;

    // =========================================================================
    // Image too small ?
    // =========================================================================

    if ( $resized_ad_image_height_px < 16 ) {
        return FALSE ;
    }

    // =========================================================================
    // Image too tall ?
    // =========================================================================

    if ( $resized_ad_image_height_px > $aap['discard_height_px'] ) {
        return FALSE ;
    }

    // =========================================================================
    // Update the ad slot specific ad approval parameters...
    // =========================================================================

    $ad_slot_specific_ad_approval_parameters['resized_image_width_px'] =
        $resized_ad_image_width_px
        ;

    // -------------------------------------------------------------------------

    $ad_slot_specific_ad_approval_parameters['resized_image_height_px'] =
        $resized_ad_image_height_px
        ;

    // =========================================================================
    // SUCCESS
    // =========================================================================

    return TRUE ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_fixed_row_height_grid_row_html()
// =============================================================================

function get_fixed_row_height_grid_row_html(
    $core_plugapp_dirs      ,
    $widgets_ad_slot        ,
    $this_rows_ads          ,
    $number_rows_displayed  ,
    $max_cell_height_px
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer\
    // get_fixed_row_height_grid_row_html(
    //      $core_plugapp_dirs      ,
    //      $widgets_ad_slot        ,
    //      $this_rows_ads          ,
    //      $number_rows_displayed  ,
    //      $max_cell_height_px
    //      )
    // - - - - - - - - - - - - - - -
    // RETURNS
    //      $this_row_html STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $this_rows_ads = Array(
    //
    //          [0] => Array(
    //
    //                      [ads_list_record] => Array(
    //                          [created_server_datetime_utc]       => 1443405845
    //                          [last_modified_server_datetime_utc] => 1443405845
    //                          [key]                               => 92724300-0b16-4370-9c93-a6eb05b2ce9b-1443405845-514623-5018
    //                          [global_sid]                        => 73hz-cwvm
    //                          [ad_swapper_site_sid]               => 4mhz-kcgw
    //                          [image_url]                         => http://localhost/ad-swapper-test-site-2/wp-content/uploads/2015/09/std-ad-7.png
    //                          [link_url]                          => http://localhost/ad-swapper-test-site-2/
    //                          [special_type]                      =>
    //                          [alt_text]                          =>
    //                          [description]                       =>
    //                          [start_datetime]                    =>
    //                          [end_datetime]                      =>
    //                          [aspect_ratio_min]                  =>
    //                          [aspect_ratio_max]                  =>
    //                          [sequence_number]                   =>
    //                          [geoip_continents_incl]             =>
    //                          [geoip_continents_excl]             =>
    //                          [geoip_countries_incl]              => NZ
    //                          [geoip_countries_excl]              =>
    //                          [geoip_regions_incl]                =>
    //                          [geoip_regions_excl]                =>
    //                          [geoip_cities_incl]                 =>
    //                          [geoip_cities_excl]                 =>
    //                          [question_display]                  => 1
    //                          [owner_site_unique_key]             => 9wwp-dhmn-2vk9-hh3z
    //                          [width]                             => 640
    //                          [height]                            => 320
    //                          [imagesize]                         => Array(
    //                                                                      [0]    => 640
    //                                                                      [1]    => 320
    //                                                                      [2]    => 3
    //                                                                      [3]    => width="640" height="320"
    //                                                                      [bits] => 8
    //                                                                      [mime] => image/png
    //                                                                      )
    //                          )
    //
    //                      [resized_image_width_px]  => 328
    //
    //                      [resized_image_height_px] => 164
    //
    //                      )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $this_rows_ads , '$this_rows_ads' ) ;

    // =========================================================================
    // Get the row's height - and the displayed height for each image in it...
    // =========================================================================

    if ( $widgets_ad_slot['fixed_row_height_grid_row_fill_method'] === 'none' ) {

        // ---------------------------------------------------------------------
        // Row height = height of TALLEST image - though NO image (or the row)
        //              may be taller than the max cell height.
        // ---------------------------------------------------------------------

        $row_height_px = 0 ;

        // ---------------------------------------------------------------------

        foreach ( $this_rows_ads as $this_index => $this_rows_ads_record ) {

            $displayed_image_height_px =
                min(
                    $this_rows_ads_record['resized_image_height_px']    ,
                    $max_cell_height_px
                    ) ;

            $this_rows_ads[ $this_index ]['displayed_image_height_px'] =
                $displayed_image_height_px
                ;

            if ( $displayed_image_height_px > $row_height_px ) {
                $row_height_px = $displayed_image_height_px ;
            }

        }

        // ---------------------------------------------------------------------

    } elseif ( $widgets_ad_slot['fixed_row_height_grid_row_fill_method'] === 'average' ) {

        // ---------------------------------------------------------------------
        // Row height = AVERAGE image height - though NO image (or the row)
        //              may be taller than the max cell height.
        // ---------------------------------------------------------------------

        $total_image_height_px = 0 ;

        foreach ( $this_rows_ads as $this_rows_ads_record ) {
            $total_image_height_px += $this_rows_ads_record['resized_image_height_px'] ;
        }

        $average_height_px = round( $total_image_height_px / count( $this_rows_ads ) ) ;

        // ---------------------------------------------------------------------

        $row_height_px = min(
                            $average_height_px      ,
                            $max_cell_height_px
                            ) ;

        // ---------------------------------------------------------------------

        foreach ( $this_rows_ads as $this_index => $this_rows_ads_record ) {

            $this_rows_ads[ $this_index ]['displayed_image_height_px'] =
                $row_height_px
                ;

        }

        // ---------------------------------------------------------------------

    } elseif ( $widgets_ad_slot['fixed_row_height_grid_row_fill_method'] === 'mid' ) {

        // ---------------------------------------------------------------------
        // Row height = Height of the image that's closest in height to the
        //              average image height (though it must be no more than
        //              the max. cell height).
        // ---------------------------------------------------------------------

        $total_image_height_px = 0 ;

        foreach ( $this_rows_ads as $this_rows_ads_record ) {
            $total_image_height_px += $this_rows_ads_record['resized_image_height_px'] ;
        }

        // ---------------------------------------------------------------------

        $average_height_px = round( $total_image_height_px / count( $this_rows_ads ) ) ;

        // ---------------------------------------------------------------------

        $closest_difference_px = PHP_INT_MAX ;

        $row_height_px = $max_cell_height_px ;
            //  Just in case NO image is shorter than (or equal to) the max.
            //  cell height.

        foreach ( $this_rows_ads as $this_rows_ads_record ) {

            $this_closest_difference_px =
                abs( $this_rows_ads_record['resized_image_height_px'] - $average_height_px )
                ;

            if (    $this_closest_difference_px < $closest_difference_px
                    &&
                    $this_rows_ads_record['resized_image_height_px'] < $max_cell_height_px
                ) {
                $row_height_px = $this_rows_ads_record['resized_image_height_px'] ;
            }

        }

        // ---------------------------------------------------------------------

        foreach ( $this_rows_ads as $this_index => $this_rows_ads_record ) {

            $this_rows_ads[ $this_index ]['displayed_image_height_px'] =
                $row_height_px
                ;

        }

        // ---------------------------------------------------------------------

    } elseif ( $widgets_ad_slot['fixed_row_height_grid_row_fill_method'] === 'shortest' ) {

        // ---------------------------------------------------------------------
        // Row height = height of SHORTEST image
        // ---------------------------------------------------------------------

        $row_height_px = PHP_INT_MAX ;

        foreach ( $this_rows_ads as $this_rows_ads_record ) {

            if ( $this_rows_ads_record['resized_image_height_px'] < $row_height_px ) {
                $row_height_px = $this_rows_ads_record['resized_image_height_px'] ;
            }

        }

        // ---------------------------------------------------------------------

        $row_height_px = min(
                            $row_height_px          ,
                            $max_cell_height_px
                            ) ;

        // ---------------------------------------------------------------------

        foreach ( $this_rows_ads as $this_index => $this_rows_ads_record ) {

            $this_rows_ads[ $this_index ]['displayed_image_height_px'] =
                $row_height_px
                ;

        }

        // ---------------------------------------------------------------------

    } elseif ( $widgets_ad_slot['fixed_row_height_grid_row_fill_method'] === 'tallest' ) {

        // ---------------------------------------------------------------------
        // Row height = height of TALLEST image
        // ---------------------------------------------------------------------

        $row_height_px = 0 ;

        foreach ( $this_rows_ads as $this_rows_ads_record ) {

            if ( $this_rows_ads_record['resized_image_height_px'] > $row_height_px ) {
                $row_height_px = $this_rows_ads_record['resized_image_height_px'] ;
            }

        }

        // ---------------------------------------------------------------------

        $row_height_px = min(
                            $row_height_px          ,
                            $max_cell_height_px
                            ) ;

        // ---------------------------------------------------------------------

        foreach ( $this_rows_ads as $this_index => $this_rows_ads_record ) {

            $this_rows_ads[ $this_index ]['displayed_image_height_px'] =
                $row_height_px
                ;

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Collect the ad HTML for the row...
    // =========================================================================

    $this_row_html = '' ;

    // -------------------------------------------------------------------------

    foreach ( $this_rows_ads as $this_index => $this_rows_ads_record ) {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer\
        // get_fixed_row_height_grid_ad_html(
        //      $core_plugapp_dirs          ,
        //      $widgets_ad_slot            ,
        //      $ads_list_record            ,
        //      $row_height_px              ,
        //      $displayed_image_width_px   ,
        //      $displayed_image_height_px  ,
        //      $cols_displayed_this_row
        //      )
        // - - - - - - - - - - - - - - - - -
        // RETURNS
        //      $this_ad_html STRING
        // -------------------------------------------------------------------------

        $cols_displayed_this_row = $this_index ;

        // ---------------------------------------------------------------------

        $this_row_html .=
            get_fixed_row_height_grid_ad_html(
                $core_plugapp_dirs                                  ,
                $widgets_ad_slot                                    ,
                $this_rows_ads_record['ads_list_record']            ,
                $row_height_px                                      ,
                $this_rows_ads_record['resized_image_width_px']     ,
                $this_rows_ads_record['displayed_image_height_px']  ,
                $cols_displayed_this_row
                ) ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Slot the ads into the row container DIV...
    // =========================================================================

    $row_container_div_style = <<<EOT
white-space:nowrap; overflow:hidden
EOT;
        //  NOTE!
        //  =====
        //  Neither the "white-space" nor the "overflow" (above), should be
        //  needed.
        //  Firefox 41 on Ubuntu works fine without them.
        //  But NOT Chromium 37 (it wraps the last image onto the next line).

    // -------------------------------------------------------------------------

    if (    $number_rows_displayed > 0
            &&
            $widgets_ad_slot['fixed_row_height_grid_hgap_px'] > 0
        ) {

        $row_container_div_style .= <<<EOT
; border-top:{$widgets_ad_slot['fixed_row_height_grid_hgap_px']}px solid {$widgets_ad_slot['fixed_row_height_grid_hgap_colour']}
EOT;

    }

    // -----------------------------------------------------------------

    $this_row_html = <<<EOT
<div style="{$row_container_div_style}">{$this_row_html}</div>
EOT;

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return $this_row_html ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_fixed_row_height_grid_ad_html()
// =============================================================================

function get_fixed_row_height_grid_ad_html(
    $core_plugapp_dirs          ,
    $widgets_ad_slot            ,
    $ads_list_record            ,
    $row_height_px              ,
    $displayed_image_width_px   ,
    $displayed_image_height_px  ,
    $cols_displayed_this_row
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer\
    // get_fixed_row_height_grid_ad_html(
    //      $core_plugapp_dirs          ,
    //      $widgets_ad_slot            ,
    //      $ads_list_record            ,
    //      $row_height_px              ,
    //      $displayed_image_width_px   ,
    //      $displayed_image_height_px  ,
    //      $cols_displayed_this_row
    //      )
    // - - - - - - - - - - - - - - - - -
    // RETURNS
    //      $this_ad_html STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $widgets_ad_slot = Array(
    //          [created_server_datetime_utc]                             => 1443851305
    //          [last_modified_server_datetime_utc]                       => 1443851305
    //          [key]                                                     => 8b00d3d7-b8f0-4284-874f-ccdb8fd88e8f-1443851305-620859-5036
    //          [local_key]                                               => 5ea3db180228140495c564abad63fdc48c4311955bc075077eb6acf54e99abd2
    //          [name]                                                    => footer-grid
    //          [title]                                                   => Footer Grid
    //          [description]                                             =>
    //          [type]                                                    => fixed-row-height-grid
    //          [border_top_px]                                           =>
    //          [border_bottom_px]                                        =>
    //          [border_left_px]                                          => 20
    //          [border_right_px]                                         => 20
    //          [border_colour_top]                                       =>
    //          [border_colour_bottom]                                    =>
    //          [border_colour_left]                                      =>
    //          [border_colour_right]                                     =>
    //          [fixed_height_banner_outer_width_px]                      => 999
    //          [fixed_height_banner_outer_height_px]                     => 999
    //          [fixed_height_banner_min_ad_aspect_ratio]                 =>
    //          [fixed_height_banner_min_resized_ad_width_percent]        =>
    //          [fixed_height_banner_fit_or_shrink]                       =>
    //          [fixed_height_banner_halign]                              =>
    //          [fixed_height_banner_valign]                              =>
    //          [fixed_height_banner_undercolour]                         =>
    //          [fixed_height_banner_extra_style]                         =>
    //          [sidebar_outer_width_px]                                  => 999
    //          [sidebar_outer_max_height_px]                             =>
    //          [sidebar_max_ads]                                         =>
    //          [sidebar_gap_height_px]                                   =>
    //          [sidebar_gap_colour]                                      =>
    //          [sidebar_fit_start_height_div_width]                      =>
    //          [sidebar_fit_end_discard_start_height_div_width]          =>
    //          [sidebar_extra_style]                                     =>
    //          [fixed_row_height_grid_outer_width_px]                    => 1040
    //          [fixed_row_height_grid_number_rows]                       =>
    //          [fixed_row_height_grid_number_cols]                       =>
    //          [fixed_row_height_grid_hgap_px]                           =>
    //          [fixed_row_height_grid_hgap_colour]                       =>
    //          [fixed_row_height_grid_vgap_px]                           =>
    //          [fixed_row_height_grid_vgap_colour]                       =>
    //          [fixed_row_height_grid_row_fill_method]                   =>
    //          [fixed_row_height_grid_max_row_height_div_width]          =>
    //          [fixed_row_height_grid_discard_ad_image_height_div_width] =>
    //          [fixed_row_height_grid_valign]                            =>
    //          [fixed_row_height_grid_question_sort_on_height]           =>
    //          [fixed_row_height_grid_question_delete_duplicates]        =>
    //          [fixed_row_height_grid_extra_style]                       =>
    //          [sequence_number]                                         =>
    //          [question_disabled]                                       =>
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $widgets_ad_slot , '$widgets_ad_slot' ) ;

    // -------------------------------------------------------------------------
    // Here we should have (for example):-
    //
    //      $ads_list_record = Array(
    //          [created_server_datetime_utc]       => 1441445323
    //          [last_modified_server_datetime_utc] => 1441445323
    //          [key]                               => dc038c67-e484-47a8-a462-e6f5145a40f9-1441445323-94095-4811
    //          [global_sid]                        => 47zk-hgcv
    //          [ad_swapper_site_sid]               => 2kmv-hzgc
    //          [image_url]                         => http://.../wp-content/uploads/2015/09/standard-web-banner-ad.png
    //          [link_url]                          => http://www.adswapper.com/
    //          [special_type]                      => banner
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

//ob_start() ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $ads_list_record , '$ads_list_record' ) ;
//$pr = ob_get_clean() ;

    // -------------------------------------------------------------------------
    // CSS Box Model
    // =============
    //
    //      Total element width =   width + left padding + right padding + left
    //                              border + right border + left margin + right
    //                              margin
    //
    //      Total element height =  height + top padding + bottom padding + top
    //                              border + bottom border + top margin + bottom
    //                              margin
    //
    //
    //
    //      +- Outer Box -----------------------------------------------+
    //      |                       TOP BORDER                          |
    //      |        +- Inner Box -----------------------------+        |
    //      |        |              TOP PADDING                |        |
    //      |        |         +- Ad Image ----------+         |        |
    //      | LEFT   | LEFT    |    WIDTH x HEIGHT   | RIGHT   | RIGHT  |
    //      | BORDER | PADDING |                     | PADDING | BORDER |
    //      |        |         +---------------------+         |        |
    //      |        |              BOTTOM PADDING             |        |
    //      |        +-----------------------------------------+        |
    //      |                       BOTTOM BORDER                       |
    //      +-----------------------------------------------------------+
    //
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // IMG STYLE
    // -------------------------------------------------------------------------

    $img_style = <<<EOT
margin:0; padding:0; border-width:0; vertical-align:bottom;
width:{$displayed_image_width_px}px; height:{$displayed_image_height_px}px
EOT;

    // -------------------------------------------------------------------------
    // IMG Alignment
    // -------------------------------------------------------------------------

    if ( $widgets_ad_slot['fixed_row_height_grid_row_fill_method'] === 'none' ) {

        // ---------------------------------------------------------------------
        // NOTE!
        // =====
        // The images are displayed inline - in a DIV.  Like (eg)
        //
        //      +---------------------------------------------------------------+
        //      |                      +------------------+                     |
        //      |                      |                  |                     |
        //      |                      |                  | +-----------------+ |
        //      |                      |                  | |                 | |
        //      | +------------------+ |                  | |                 | |
        //      | |                  | |                  | |                 | |
        //      | |                  | |                  | |                 | |
        //      | |                  | |                  | |                 | |
        //      | +------------------+ +------------------+ +-----------------+ |
        //      +---------------------------------------------------------------+
        //
        // So to vertically align them, we use the IMG margin bottom.
        // ---------------------------------------------------------------------

        if ( $displayed_image_height_px < $row_height_px ) {

            // -----------------------------------------------------------------

            if ( $widgets_ad_slot['fixed_row_height_grid_valign'] === 'top' ) {

                // -------------------------------------------------------------

                $margin_bottom_px = (int) ( $row_height_px - $displayed_image_height_px ) ;

                // -------------------------------------------------------------

                $img_style .= <<<EOT
; margin-bottom:{$margin_bottom_px}px
EOT;

                // -------------------------------------------------------------

            } elseif ( $widgets_ad_slot['fixed_row_height_grid_valign'] === 'middle' ) {

                // -------------------------------------------------------------

                $margin_bottom_px = (int) ceil(
                                        ( $row_height_px - $displayed_image_height_px )
                                        /
                                        2
                                        ) ;

                // -------------------------------------------------------------

                $img_style .= <<<EOT
; margin-bottom:{$margin_bottom_px}px
EOT;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $img_style =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_one_line( $img_style )
        ;

    // -------------------------------------------------------------------------
    // A STYLE
    // -------------------------------------------------------------------------

    $style_a = <<<EOT
margin:0; padding:0; border-width:0; display:inline; text-decoration:none
EOT;

    // -------------------------------------------------------------------------
    // A tag ?
    // -------------------------------------------------------------------------

    if ( trim( $ads_list_record['link_url'] ) !== '' ) {

        $a_tag_start = <<<EOT
<a  href="{$ads_list_record['link_url']}"
    style="{$style_a}"
    >
EOT;

        $a_tag_end = '</a>' ;


    } else {

        $a_tag_start = '' ;
        $a_tag_end   = '' ;

    }

    // -------------------------------------------------------------------------
    // Ad HTML...
    // -------------------------------------------------------------------------

    $this_ad_html = <<<EOT
{$a_tag_start}<img
    border="0"
    src="{$ads_list_record['image_url']}"
    style="{$img_style}"
    />{$a_tag_end}
EOT;

    // -------------------------------------------------------------------------
    // Add VERTICAL GAP HTML, if necessary...
    // -------------------------------------------------------------------------

    if (    $cols_displayed_this_row > 0
            &&
            $widgets_ad_slot['fixed_row_height_grid_vgap_px'] > 0
        ) {

//  <div style="border-left:{$widgets_ad_slot['fixed_row_height_grid_vgap_px']}px solid {$widgets_ad_slot['fixed_row_height_grid_vgap_colour']}; display:inline; vertical-align:bottom"></div>{$this_ad_html}

        $this_ad_html = <<<EOT
<div style="width:{$widgets_ad_slot['fixed_row_height_grid_vgap_px']}px; height:{$row_height_px}px; background-color:{$widgets_ad_slot['fixed_row_height_grid_vgap_colour']}; display:inline-block; vertical-align:bottom"></div>{$this_ad_html}
EOT;

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return $this_ad_html ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

