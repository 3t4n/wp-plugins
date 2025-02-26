<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / AD-DISPLAYER /
//      GET-AD-SLOT-HTML-4-FIXED-HEIGHT-BANNER.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer ;

// =============================================================================
// get_ad_slot_html_4_fixed_height_banner()
// =============================================================================

function get_ad_slot_html_4_fixed_height_banner(
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
    // get_ad_slot_html_4_fixed_height_banner(
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
        get_ad_slot_html_4_fixed_height_banner_inner(
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
// get_ad_slot_html_4_fixed_height_banner_inner()
// =============================================================================

function get_ad_slot_html_4_fixed_height_banner_inner(
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
    // get_ad_slot_html_4_fixed_height_banner_inner(
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
    // - - - - - - - - - - - - - - - - -
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
    //                      [border_top_px]                             =>
    //                      [border_bottom_px]                          =>
    //                      [border_left_px]                            =>
    //                      [border_right_px]                           =>
    //                      [border_colour_top]                         =>
    //                      [border_colour_bottom]                      =>
    //                      [border_colour_left]                        =>
    //                      [border_colour_right]                       =>
    //                      [fixed_height_banner_outer_width_px]        => 800
    //                      [fixed_height_banner_outer_height_px]       => 100
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
    //          [created_server_datetime_utc]                       => 1441072773
    //          [last_modified_server_datetime_utc]                 => 1441072773
    //          [key]                                               => 68269847-ef98-4a79-b820-1767f4da0375-1441072773-509128-4787
    //          [local_key]                                         => 8764154d5752463839c8060e84774dd91e5c607191a010eb8d6d3cffd728cc50
    //          [name]                                              => fixed-height-banner
    //          [title]                                             => Fixed-Height Banner
    //          [description]                                       =>
    //          [type]                                              => fixed-height-banner
    //          [border_top_px]                                     =>
    //          [border_bottom_px]                                  =>
    //          [border_left_px]                                    =>
    //          [border_right_px]                                   =>
    //          [border_colour_top]                                 =>
    //          [border_colour_bottom]                              =>
    //          [border_colour_left]                                =>
    //          [border_colour_right]                               =>
    //          [fixed_height_banner_outer_width_px]                => 800
    //          [fixed_height_banner_outer_height_px]               => 100
    //          [fixed_height_banner_fit_or_shrink]                 =>
    //          [fixed_height_banner_halign]                        =>
    //          [fixed_height_banner_valign]                        =>
    //          [fixed_height_banner_undercolour]                   =>
    //          [fixed_height_banner_min_ad_aspect_ratio]           =>
    //          [fixed_height_banner_min_resized_ad_width_percent]  =>
    //          [fixed_height_banner_extra_style]                   =>
    //          [sequence_number]                                   =>
    //          [question_disabled]                                 =>
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
    //      "sidebar"                   "normal"
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

    if ( $ad_slot_type !== 'fixed-height-banner' ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        return <<<EOT
PROBLEM:&nbsp; Bad "ad slot type" ("fixed-height-banner" expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------
    // $ad_slot_ad_type
    // -------------------------------------------------------------------------

    if ( $ad_slot_ad_type !== 'banner' ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        return <<<EOT
PROBLEM:&nbsp; Bad "ad slot ad type" ("banner" expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------
    // fixed_height_banner_outer_width_px
    // -------------------------------------------------------------------------

    $ad_slot_outer_width_px = trim( $widgets_ad_slot['fixed_height_banner_outer_width_px'] ) ;

    // -------------------------------------------------------------------------

    if ( $ad_slot_outer_width_px === '' ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        return <<<EOT
PROBLEM:&nbsp; No "fixed_height_banner_outer_width_px"
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
PROBLEM:&nbsp; Bad "fixed_height_banner_outer_width_px" (1, 2, 3... expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------
    // fixed_height_banner_outer_height_px
    // -------------------------------------------------------------------------

    $ad_slot_outer_height_px = trim( $widgets_ad_slot['fixed_height_banner_outer_height_px'] ) ;

    // -------------------------------------------------------------------------

    if ( $ad_slot_outer_height_px === '' ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        return <<<EOT
PROBLEM:&nbsp; No "fixed_height_banner_outer_height_px"
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------

    if (    ! ctype_digit( $ad_slot_outer_height_px )
            ||
            $ad_slot_outer_height_px < 1
        ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 6  ;

        return <<<EOT
PROBLEM:&nbsp; Bad "fixed_height_banner_outer_height_px" (1, 2, 3... expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------
    // Set the Ad Slot defaults...
    // -------------------------------------------------------------------------

    $defaults = array(
        'border_top_px'                                     =>  0               ,
        'border_bottom_px'                                  =>  0               ,
        'border_left_px'                                    =>  0               ,
        'border_right_px'                                   =>  0               ,
        'border_colour_top'                                 =>  'transparent'   ,
        'border_colour_bottom'                              =>  'transparent'   ,
        'border_colour_left'                                =>  'transparent'   ,
        'border_colour_right'                               =>  'transparent'   ,
        'fixed_height_banner_fit_or_shrink'                 =>  'shrink'        ,
        'fixed_height_banner_halign'                        =>  'left'          ,
        'fixed_height_banner_valign'                        =>  'middle'        ,
        'fixed_height_banner_undercolour'                   =>  'transparent'   ,
        'fixed_height_banner_min_ad_aspect_ratio'           =>  4               ,
        'fixed_height_banner_min_resized_ad_width_percent'  =>  50              ,
        'fixed_height_banner_extra_style'                   =>  ''
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

    // =========================================================================
    // Init. the various loop and ad selection parameters...
    // =========================================================================

    $allowed_special_types = array(
        'banner'
        ) ;

    // -------------------------------------------------------------------------

    $inner_box_width_px =
        $ad_slot_outer_width_px -
        $widgets_ad_slot['border_left_px'] -
        $widgets_ad_slot['border_right_px']
        ;

    // -------------------------------------------------------------------------

    $inner_box_height_px =
        $ad_slot_outer_height_px -
        $widgets_ad_slot['border_top_px'] -
        $widgets_ad_slot['border_bottom_px']
        ;

    // -------------------------------------------------------------------------

    $ad_slot_specific_ad_approval_routine_name =
        '\\' . __NAMESPACE__ .
        '\\ad_slot_specific_ad_approval_routine_4_fixed_height_banner'
        ;

    // =========================================================================
    // Get the next "banner" type ad to display (if there is one)...
    // =========================================================================

    while ( TRUE ) {

        // ---------------------------------------------------------------------
        // Get the next ads list record...
        // ---------------------------------------------------------------------

        $ad_slot_specific_ad_approval_parameters = array(
            'allowed_special_types' =>  $allowed_special_types
            ) ;

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
            return $ads_list_record ;
        }

        // ---------------------------------------------------------------------
        // No more banner ads ?
        // ---------------------------------------------------------------------

        if ( $ads_list_record === FALSE ) {
            return '' ;
                //  Can't find any more "banner" ads to display...
        }

        // ---------------------------------------------------------------------
        // Get the raw image size and aspect ratio...
        // ---------------------------------------------------------------------

        $raw_image_width_px  = $ads_list_record['width']  ;
        $raw_image_height_px = $ads_list_record['height'] ;

        // ---------------------------------------------------------------------

        $raw_image_aspect_ratio = $raw_image_width_px / $raw_image_height_px ;

        // ---------------------------------------------------------------------

        break ;
            //  Display this ad (because it looks like a "banner" ad that's
            //  OK to display...

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // YES - We've found the next "banner" ad to display...
    // =========================================================================

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

    // =========================================================================
    // Display the ad...
    // =========================================================================

    // -------------------------------------------------------------------------
    // Any debugging stuff ?
    // -------------------------------------------------------------------------

    if ( isset( $pr ) ) {
        $html = $pr ;

    } else {
        $html = '' ;

    }

    // -------------------------------------------------------------------------
    // Fit or Shrink the image...
    // -------------------------------------------------------------------------

    if ( $widgets_ad_slot['fixed_height_banner_fit_or_shrink'] === 'fit' ) {

        // ---------------------------------------------------------------------
        // FIT
        // ---------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
        // get_fitted_ad_styles(
        //      $widgets_ad_slot            ,
        //      $ads_list_record            ,
        //      $inner_box_width_px         ,
        //      $inner_box_height_px        ,
        //      )
        // - - - - - - - - - - - - - - - - -
        // RETURNS
        //      array(
        //          $div_style      ,
        //          $img_style
        //          )
        // -------------------------------------------------------------------------

        list(   $div_style      ,
                $img_style
                ) = get_fitted_ad_styles(
                        $widgets_ad_slot        ,
                        $ads_list_record        ,
                        $inner_box_width_px     ,
                        $inner_box_height_px
                        ) ;

        // ---------------------------------------------------------------------

    } elseif ( $widgets_ad_slot['fixed_height_banner_fit_or_shrink'] === 'shrink' ) {

        // ---------------------------------------------------------------------
        // SHRINK
        // ---------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
        // get_the_shrunk_ad_styles(
        //      $widgets_ad_slot            ,
        //      $ads_list_record            ,
        //      $inner_box_width_px         ,
        //      $inner_box_height_px        ,
        //      $raw_image_width_px         ,
        //      $raw_image_height_px        ,
        //      $raw_image_aspect_ratio
        //      )
        // - - - - - - - - - - - - - - - - -
        // RETURNS
        //      array(
        //          $div_style      ,
        //          $img_style
        //          )
        // -------------------------------------------------------------------------

        list(   $div_style      ,
                $img_style
                ) = get_shrunk_ad_styles(
                        $widgets_ad_slot            ,
                        $ads_list_record            ,
                        $inner_box_width_px         ,
                        $inner_box_height_px        ,
                        $raw_image_width_px         ,
                        $raw_image_height_px        ,
                        $raw_image_aspect_ratio
                        ) ;

        // ---------------------------------------------------------------------

    }

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
    // Final HTML...
    // -------------------------------------------------------------------------

    $html .= <<<EOT
<div style="{$div_style}">{$a_tag_start}<img
    border="0"
    src="{$ads_list_record['image_url']}"
    style="{$img_style}"
    />{$a_tag_end}</div>
EOT;

    // =========================================================================
    // SUCCESS
    // =========================================================================

    return $html ;

    // =========================================================================
    // That's that!
    // =========================================================================

}


// =============================================================================
// ad_slot_specific_ad_approval_routine_4_fixed_height_banner()
// =============================================================================

function ad_slot_specific_ad_approval_routine_4_fixed_height_banner(
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

//  $aap = $ad_slot_specific_ad_approval_parameters ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $aap = array(
    //                  [allowed_special_types] => Array(
    //                                                  [0] => ''
    //                                                  )
    //                  )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $aap , '$aap' ) ;

    // =========================================================================
    // Skip images that don't meet the displaying site's min. ad aspect ratio
    // requirements...
    // =========================================================================

    $raw_image_aspect_ratio = $imagesize_data['width'] / $imagesize_data['height'] ;

    // -------------------------------------------------------------------------

    if ( $raw_image_aspect_ratio < $widgets_ad_slot['fixed_height_banner_min_ad_aspect_ratio'] ) {
        return FALSE ;
    }

    // =========================================================================
    // Is resized image big enough to see ?
    // =========================================================================

    //  TODO !!!

    // =========================================================================
    // SUCCESS
    // =========================================================================

    return TRUE ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_fitted_ad_styles()
// =============================================================================

function get_fitted_ad_styles(
    $widgets_ad_slot        ,
    $ads_list_record        ,
    $inner_box_width_px     ,
    $inner_box_height_px
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_fitted_ad_styles(
    //      $widgets_ad_slot        ,
    //      $ads_list_record        ,
    //      $inner_box_width_px     ,
    //      $inner_box_height_px
    //      )
    // - - - - - - - - - - - - - - -
    // RETURNS
    //      array(
    //          $div_style      ,
    //          $img_style
    //          )
    // -------------------------------------------------------------------------

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

    if ( trim( $widgets_ad_slot['fixed_height_banner_extra_style'] ) !== '' ) {
        $div_style .= ';' . trim( $widgets_ad_slot['fixed_height_banner_extra_style'] , ';' ) ;
    }

    // -------------------------------------------------------------------------
    // IMG STYLE
    // -------------------------------------------------------------------------

    $img_style = <<<EOT
margin:0; padding:0; border-width:0;
width:{$inner_box_width_px}px; height:{$inner_box_height_px}px
EOT;

    // -------------------------------------------------------------------------
    // SUCCESS!
    // -------------------------------------------------------------------------

    return array(
                $div_style      ,
                $img_style
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_shrunk_ad_styles()
// =============================================================================

function get_shrunk_ad_styles(
    $widgets_ad_slot            ,
    $ads_list_record            ,
    $inner_box_width_px         ,
    $inner_box_height_px        ,
    $raw_image_width_px         ,
    $raw_image_height_px        ,
    $raw_image_aspect_ratio
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_shrunk_ad_styles(
    //      $widgets_ad_slot            ,
    //      $ads_list_record            ,
    //      $inner_box_width_px         ,
    //      $inner_box_height_px        ,
    //      $raw_image_width_px         ,
    //      $raw_image_height_px        ,
    //      $raw_image_aspect_ratio
    //      )
    // - - - - - - - - - - - - - - - - -
    // RETURNS
    //      array(
    //          $div_style      ,
    //          $img_style
    //          )
    // -------------------------------------------------------------------------

//echo '<br />inner_box_width_px    :' , $inner_box_width_px     ;
//echo '<br />inner_box_height_px   :' , $inner_box_height_px    ;
//echo '<br />raw_image_width_px    :' , $raw_image_width_px     ;
//echo '<br />raw_image_height_px   :' , $raw_image_height_px    ;
//echo '<br />raw_image_aspect_ratio:' , $raw_image_aspect_ratio ;

    if ( $raw_image_width_px > $inner_box_width_px ) {
        $img_width_px = $inner_box_width_px ;

    } else {
        $img_width_px = $raw_image_width_px ;

    }

    // -------------------------------------------------------------------------

    $img_height_px = round( $img_width_px / $raw_image_aspect_ratio ) ;

    // -------------------------------------------------------------------------

    if ( $img_height_px > $inner_box_height_px ) {

        // ---------------------------------------------------------------------

        $img_height_px = $inner_box_height_px ;

        // ---------------------------------------------------------------------

        $img_width_px = round( $img_height_px * $raw_image_aspect_ratio ) ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $horizontal_padding = $inner_box_width_px - $img_width_px ;

    $div_padding_left = round( $horizontal_padding / 2 ) ;

    $div_padding_right = $horizontal_padding - $div_padding_left ;

    // -------------------------------------------------------------------------

    $vertical_padding = $inner_box_height_px - $img_height_px ;

    $div_padding_top = round( $vertical_padding / 2 ) ;

    $div_padding_bottom = $vertical_padding - $div_padding_top ;

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
        'padding:'          . $div_padding_top . 'px ' . $div_padding_right . 'px ' . $div_padding_bottom . 'px ' . $div_padding_left . 'px;'                               ,
        'background-color:' . $widgets_ad_slot['fixed_height_banner_undercolour'] . ';'
        ) ;

    // -------------------------------------------------------------------------

    $div_style = implode( chr(32) , $div_style ) ;

    // -------------------------------------------------------------------------

    if ( trim( $widgets_ad_slot['fixed_height_banner_extra_style'] ) !== '' ) {
        $div_style .= ';' . trim( $widgets_ad_slot['fixed_height_banner_extra_style'] , ';' ) ;
    }

    // -------------------------------------------------------------------------
    // IMG STYLE
    // -------------------------------------------------------------------------

    $img_style = <<<EOT
margin:0; padding:0; border-width:0;
width:{$img_width_px}px; height:{$img_height_px}px
EOT;

    // -------------------------------------------------------------------------
    // SUCCESS!
    // -------------------------------------------------------------------------

    return array(
                $div_style      ,
                $img_style
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

