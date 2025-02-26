<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / AD-DISPLAYER / DISPLAY-AD-SLOT-ADS.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer ;

// =============================================================================
// get_ad_slot_widget_html()
// =============================================================================

function get_ad_slot_widget_html(
    $that           ,
    $args           ,
    $instance
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_ad_slot_widget_html(
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
    // $that is the "ad slot" WordPress Widget object instance.
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

    // =========================================================================
    // Debugging Support...
    // =========================================================================

    $pr = '' ;

    // =========================================================================
    // "Ad Displayer" WordPress Widget Instance Object...
    // =========================================================================

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
//$pr .= ob_get_clean() ;

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // We DON'T use any of the above:-
    //      $that
    //
    // information, except perhaps:-
    //      o   "number"
    // -------------------------------------------------------------------------

    // =========================================================================
    // NOTE!
    // -----
    // The definitions of the:-
    //      $args, and;
    //      $instance,
    //
    // input variables (from the WordPress source code), are as follows...
    //
    //      /**
    //       * Outputs the content of the widget
    //       *
    //       * @param array $args
    //       * @param array $instance
    //       */
    //      public function widget( $args, $instance ) {
    //          // outputs the content of the widget
    //      }
    //
    //      /**
    //       * Front-end display of widget.
    //       *
    //       * @see WP_Widget::widget()
    //       *
    //       * @param array $args     Widget arguments.
    //       * @param array $instance Saved values from database.
    //       */
    //      public function widget( $args, $instance )
    //
    //      widget (line 44)
    //      Echo the widget content.
    //      Subclasses should over-ride this function to generate their widget code.
    //
    //      void widget (array $args, array $instance)
    //          array $args: Display arguments including before_title, after_title, before_widget, and after_widget.
    //          array $instance: The settings for the particular instance of the widget
    //
    // =========================================================================

    // =========================================================================
    // "Widget Area" - in which the "Ad Displayer" widget lives...
    //
    // See:-
    //      http://codex.wordpress.org/Widgetizing_Themes#How_to_Register_a_Widget_Area
    //      and the "register_sidebar()" function
    // =========================================================================

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
    // NOTE!
    // =====
    // We DON'T use any of the above:-
    //      $args
    //
    // information.
    // -------------------------------------------------------------------------

    // =========================================================================
    // The saved values from the Widget's form (on the Appearance -> Widgets
    // screen)...
    // =========================================================================

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
    // NOTE!
    // =====
    // The widget settings save functionality built into WordPress doesn't
    // seem to work.  So although the user can "Save" the Widget's form, when
    // the form is re-displayed, the:-
    //      $instance
    //
    // (shown above) is supplied with all variables (eg; "title" and
    // "message", in the example above), set to the empty string.
    //
    // So we save the Ad Displayer settings in ARRAY STORAGE (and must
    // retrieve them from their, below).
    //
    // And the blank settings in $instance, above, can be ignored.
    // -------------------------------------------------------------------------

    // =========================================================================
    // Get the widget's ad slot HTML...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_ad_html_for_ad_slot(
    //      $ad_slot_name_or_widget_id  ,
    //      $question_widget_id
    //      )
    // - - - - - - - - - - - - - - - - -
    // Returns the front-end HTML that goes where the ad slot is.  In other
    // words, generates and returns the Ad Swapper ad (or ads), to go in the ad
    // slot.
    //
    // N.B. The returned HTML could be an error message.
    //
    // RETURNS
    //      $ad_slot_html STRING
    // -------------------------------------------------------------------------

    $ad_slot_name_or_widget_id = $that->id ;

    $question_widget_id = TRUE ;

    // -------------------------------------------------------------------------

    $ad_slot_html =
        get_ad_html_for_ad_slot(
            $ad_slot_name_or_widget_id      ,
            $question_widget_id
            ) ;

    // =========================================================================
    // Return the HTML wrapped in the Widget Area before/after stuff...
    // =========================================================================

    return <<<EOT
{$args['before_widget']}
{$pr}
{$ad_slot_html}
{$args['after_widget']}
EOT;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_ad_html_for_ad_slot()
// =============================================================================

function get_ad_html_for_ad_slot(
    $ad_slot_name_or_widget_id      ,
    $question_widget_id
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_ad_html_for_ad_slot(
    //      $ad_slot_name_or_widget_id  ,
    //      $question_widget_id
    //      )
    // - - - - - - - - - - - - - - - - -
    // Returns the front-end HTML that goes where the ad slot is.  In other
    // words, generates and returns the Ad Swapper ad (or ads), to go in the ad
    // slot.
    //
    // N.B. The returned HTML could be an error message.
    //
    // RETURNS
    //      $ad_slot_html STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // The values in:-
    //      $ad_slot_name_or_widget_id
    //      $question_widget_id
    //
    // depend on how the ad slot drawing routines were called.  Eg:-
    //
    //      From WordPress Widget
    //      ---------------------
    //          $ad_slot_name_or_widget_id = "ad_swapper_ad_display_widget-2"
    //          $question_widget_id        = TRUE
    //
    //      From PHP Function
    //      -----------------
    //          $ad_slot_name_or_widget_id = "header-banner"
    //          $question_widget_id        = FALSE
    //
    //      From WordPress Shortcode
    //      ------------------------
    //          $ad_slot_name_or_widget_id = "left-sidebar"
    //          $question_widget_id        = FALSE
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // =========================================================================
    // Debugging Support...
    // =========================================================================

//  error_reporting( E_ALL ) ;
//  ini_set( 'display_errors' , '1' ) ;

    // -------------------------------------------------------------------------

    $pr = '' ;

    // =========================================================================
    // Load the "Ad Displayer" support routines...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/ad-display-generic-support.php' ) ;

    // =========================================================================
    // Load the Ad Displayer's CORE PLUGAPP DIRS...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_core_plugapp_dirs_4_ad_displayer()
    // - - - - - - - - - - - - - - - - - - -
    // Returns the core plugapp dirs, for the ad displayer.
    //
    // NOTE!    The ad displayer routines are called from within WordPress
    //          (Ad Swapper "ad slot") widgets.  And thus, know nothing of
    //          any:-
    //              $core_plugapp_dirs
    //
    //          that may have been loaded by other code in the Ad Swapper
    //          plugin.
    //
    //          To prevent multiple reloads of these dirs, we cache the ad
    //          displayer's version in $GLOBALS.
    //
    // RETURNS
    //      ARRAY $core_plugapp_dirs
    // -------------------------------------------------------------------------

    $core_plugapp_dirs = get_core_plugapp_dirs_4_ad_displayer() ;

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
    // Load the Ad Displayer's DATASET RECORDS...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_loaded_datasets_4_ad_displayer()
    // - - - - - - - - - - - - - - - - - -
    // Returns the loaded datasets, for the ad displayer.
    //
    // NOTE!    The ad displayer routines are called from within WordPress
    //          (Ad Swapper "ad slot") widgets.  And thus, know nothing of
    //          the:-
    //              $loaded_datasets
    //
    //          that may have been loaded by other code in the Ad Swapper
    //          plugin.
    //
    //          To prevent multiple reloads of these datasets, we cache the ad
    //          displayer's version in $GLOBALS.
    //
    // RETURNS
    //      ARRAY $loaded_datasets
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    $loaded_datasets = get_loaded_datasets_4_ad_displayer() ;

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

//ob_start() ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $loaded_datasets['ad_swapper_ad_slots'] , '$loaded_datasets[\'ad_swapper_ad_slots\']' ) ;
//$pr .= ob_get_clean() ;

    // =========================================================================
    // Get the DISPLAYING site's "Site Registration"/"Plugin Settings"
    // record...
    // =========================================================================

    if ( count( $loaded_datasets['ad_swapper_plugin_settings']['records'] ) !== 1 ) {
        return '' ;
            //  We DON'T return an error message - in case the displaying site
            //  HASN'T saved it's Plugin Settings yet (and to avoid irritating
            //  the site user with a problem they can't do anything about).

    }

    // -------------------------------------------------------------------------

    $displaying_sites_plugin_settings = $loaded_datasets['ad_swapper_plugin_settings']['records'][0] ;

    // =========================================================================
    // Get the DISPLAYING site's "Site Profile"...
    // =========================================================================

    if ( count( $loaded_datasets['ad_swapper_site_profile']['records'] ) !== 1 ) {
        return '' ;
            //  We DON'T return an error message - in case the displaying site
            //  HASN'T saved it's Site Profile yet (and to avoid irritating the
            //  site user with a problem they can't do anything about).
    }

    // -------------------------------------------------------------------------

    $displaying_sites_site_profile = $loaded_datasets['ad_swapper_site_profile']['records'][0] ;

    // =========================================================================
    // Copy (the displaying site's) "ad_swapper_site_sid" from the:-
    //      Plugin Settings
    //
    // record to the:-
    //      "Site Profile"
    //
    // record.
    //
    // NOTE!
    // =====
    // We should perhaps add a "$displaying_site_sid" variable to the
    // parameters passed to the ad display routines.  But we do piggy-back a
    // ride on the:-
    //      $displaying_sites_site_profile
    //
    // Because it's quicker.
    // =========================================================================

    $displaying_sites_site_profile['ad_swapper_site_sid_addon'] =
        $displaying_sites_plugin_settings['ad_swapper_site_sid']
        ;
        //  The "_addon" is to indicate that this field isn't really a part
        //  of the "Site Profile" record.

    // =========================================================================
    // If the Site Profile's:-
    //      question_disable_incoming_ads === TRUE
    //
    // then we abandon the ad display immediately...
    // =========================================================================

    if ( $displaying_sites_site_profile['question_disable_incoming_ads'] === TRUE ) {
        return '' ;
    }

    // =========================================================================
    // If Test Method has been specified - in the Site Profile - then abort
    // the ad display, if required...
    // =========================================================================

    if ( $displaying_sites_site_profile['test_method'] === 'ip-address' ) {

        // ---------------------------------------------------------------------
        // If test method is "ip-address", we DON'T display any ads unless
        //      a)  An IP address is specified, and;
        //      b)  It matches the current user's IP address.
        // ---------------------------------------------------------------------

        if (    trim( $displaying_sites_site_profile['test_ip'] ) !== ''
                &&
                array_key_exists( 'REMOTE_ADDR' , $_SERVER )
                &&
                trim( $displaying_sites_site_profile['test_ip'] ) === $_SERVER['REMOTE_ADDR']
            ) {
            //  Fall through to display ads...

        } else {

            return '' ;
                //  User's IP doesn't match ?
                //      => NO ads...

        }

        // ---------------------------------------------------------------------

    } elseif ( $displaying_sites_site_profile['test_method'] === 'cookie' ) {

        // ---------------------------------------------------------------------
        // If test method is "cookie", we DON'T display any ads unless the
        // test cookie is set.
        // ---------------------------------------------------------------------

        $cookie_name =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperSiteProfile\get_test_method_cookie_name()
            ;

        // ---------------------------------------------------------------------

        if (    ! array_key_exists(
                    $cookie_name    ,
                    $_COOKIE
                    )
                ||
                $_COOKIE[ $cookie_name ] !== $cookie_name
            ) {

            return '' ;
                //  NO Cookie ?
                //      => NO ads...

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // If we get here, then test method is neither "ip-address" nor
    // cookie".  So we display ads normally.
    // -------------------------------------------------------------------------

    // =========================================================================
    // Define the DATASET SLUGS (used by the Ad Displayer)...
    // =========================================================================

    $ad_slots_dataset_slug        = 'ad_swapper_ad_slots' ;

    $widget_settings_dataset_slug = 'ad_swapper_widget_settings' ;

    $available_sites_dataset_slug = 'ad_swapper_available_sites' ;

    $available_ads_dataset_slug   = 'ad_swapper_available_ads' ;

    $site_profile_dataset_slug    = 'ad_swapper_site_profile' ;

    // =========================================================================
    // Load the requested Ad Slot Record...
    // =========================================================================

    if ( $question_widget_id ) {

        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
        // WORDPRESS WIDGET
        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

        // ---------------------------------------------------------------------
        // Load the "Widget Instance Settings"...
        // ---------------------------------------------------------------------

        $widget_instance_settings = array() ;

        // ---------------------------------------------------------------------

        foreach ( $loaded_datasets[ $widget_settings_dataset_slug ]['records'] as $this_widget_settings_record ) {

            if ( $this_widget_settings_record['widget_id'] === $ad_slot_name_or_widget_id ) {
                $widget_instance_settings = $this_widget_settings_record['widget_settings'] ;
                break ;
            }

        }

        // -------------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $widget_instance_settings = Array(
        //          [ad_slot_key] => c6886167-8b81-43c4-9bbb-b7391a007356-1423272554-653172-1523
        //          )
        //
        // -------------------------------------------------------------------------

//ob_start() ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $widget_instance_settings , '$widget_instance_settings' ) ;
//$pr .= ob_get_clean() ;

        // ---------------------------------------------------------------------
        // Get/check the widget's Ad Slot (record)...
        // ---------------------------------------------------------------------

        $widgets_ad_slot_key = '' ;

        // ---------------------------------------------------------------------

        if (    array_key_exists( 'ad_slot_key' , $widget_instance_settings )
                &&
                is_string( $widget_instance_settings['ad_slot_key'] )
                &&
                trim( $widget_instance_settings['ad_slot_key'] ) !== ''
            ) {

            // -----------------------------------------------------------------

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

                $widgets_ad_slot_key = $widget_instance_settings['ad_slot_key'] ;

            }

            // ---------------------------------------------------------------------

        }

//ob_start() ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $widgets_ad_slot_key , '$widgets_ad_slot_key' ) ;
//$pr .= ob_get_clean() ;

        // ---------------------------------------------------------------------
        // If we can't find the Ad Slot record that belongs to this widget, then
        // we DON'T display any ads...
        // ---------------------------------------------------------------------

        if ( $widgets_ad_slot_key === '' ) {
            return '' ;
        }

        // ---------------------------------------------------------------------
        // Get the widget's Ad Slot (from it's key)...
        // ---------------------------------------------------------------------

        $widgets_ad_slot =
            $loaded_datasets[ $ad_slots_dataset_slug ]['records'][
                $loaded_datasets[ $ad_slots_dataset_slug ]['record_indices_by_key'][
                    $widgets_ad_slot_key
                    ]
                ] ;

        // ---------------------------------------------------------------------

    }  else {

        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
        // PHP FUNCTION OR WORDPRESS SHORTCODE
        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

        // ---------------------------------------------------------------------
        // Search for the ad slot with the specified name...
        // ---------------------------------------------------------------------

        $widgets_ad_slot = NULL ;

        // ---------------------------------------------------------------------

        foreach ( $loaded_datasets[ $ad_slots_dataset_slug ]['records'] as $this_ad_slot_record ) {

            if ( $this_ad_slot_record['name'] === $ad_slot_name_or_widget_id ) {
                $widgets_ad_slot = $this_ad_slot_record ;
                break ;
            }

        }

        // ---------------------------------------------------------------------
        // If we can't find the named Ad Slot record, then we DON'T display any
        // ads...
        // ---------------------------------------------------------------------

        if ( ! is_array( $widgets_ad_slot ) ) {
            return '' ;
        }

        // ---------------------------------------------------------------------

    }

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
    // If the Ad Slot is disabled, then we DON'T display any ads...
    // =========================================================================

    if ( $widgets_ad_slot['question_disabled'] ) {
        return '' ;
    }

    // =========================================================================
    // Make sure the ad slot's TYPE was specified ?
    // =========================================================================

    if (    ! is_string( $widgets_ad_slot['type'] )
            ||
            trim( $widgets_ad_slot['type'] ) === ''
        ) {

        $ln = __LINE__ - 4  ;

        return <<<EOT
PROBLEM:&nbsp; Bad ad slot "type" (non-empty string expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // =========================================================================
    // Check that the AD SLOT TYPE is valid/supported (and load it's "display"
    // routines, if so)...
    // =========================================================================

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // The ad slot's "type" should be one of:-
    //      o   "fixed-height-banner"
    //      o   "flexi-height-banner"
    //      o   "sidebar"
    //      o   "fixed-row-height-grid"
    //      o   "newspaper-style-grid"
    // -------------------------------------------------------------------------

    $get_ad_slot_html_function_name =
        __NAMESPACE__ .
        '\\get_ad_slot_html_4_' .
        str_replace( '-' , '_' , trim( $widgets_ad_slot['type'] ) )
        ;

    // -------------------------------------------------------------------------

    if ( ! function_exists( $get_ad_slot_html_function_name ) ) {

        // ---------------------------------------------------------------------

        $dirspec =  dirname( __FILE__ ) .
                    '/' .
                    trim( $widgets_ad_slot['type'] )
                    ;

        // ---------------------------------------------------------------------

        if ( ! is_dir( $dirspec ) ) {

            $ln = __LINE__ - 2  ;

            $safe_ad_slot_type = htmlentities( $widgets_ad_slot['type'] ) ;

            return <<<EOT
PROBLEM:&nbsp; Unrecognised/unsupported ad slot "type" ("{$safe_ad_slot_type}") (#1)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

        $filespec = $dirspec .
                    '/get-ad-slot-html-4-' .
                    trim( $widgets_ad_slot['type'] ) .
                    '.php'
                    ;

        // ---------------------------------------------------------------------

        if ( ! is_file( $filespec ) ) {

            $ln = __LINE__ - 2  ;

            $safe_ad_slot_type = htmlentities( $widgets_ad_slot['type'] ) ;

            return <<<EOT
PROBLEM:&nbsp; Unrecognised/unsupported ad slot "type" ("{$safe_ad_slot_type}") (#2)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

        require_once( $filespec ) ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Auto-generate the "AD SLOT AD TYPE"...
    // =========================================================================

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // The ad slot's "ad type" should be one of:-
    //      o   "banner"
    //      o   "normal"
    //
    // Where "ad slot types" match to "ad slot ad types", as follows:-
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

    $ad_slot_type = trim( $widgets_ad_slot['type'] ) ;

    // -------------------------------------------------------------------------

    if (    $ad_slot_type === 'fixed-height-banner'
            ||
            $ad_slot_type === 'flexi-height-banner'
        ) {
        $ad_slot_ad_type = 'banner' ;

    } else {
        $ad_slot_ad_type = 'normal' ;

    }

    // =========================================================================
    // Get the parameters saved in the SITE PROFILE...
    // =========================================================================

    // -------------------------------------------------------------------------
    // max_ads_per_site_per_page
    // 1+ (0 = unlimited, default = 1)
    // -------------------------------------------------------------------------

    if (    trim( $displaying_sites_site_profile['max_ads_per_site_per_page'] ) !== ''
            &&
            ctype_digit( $displaying_sites_site_profile['max_ads_per_site_per_page'] )
        ) {

        $max_ads_per_site_per_page = (int) $displaying_sites_site_profile['max_ads_per_site_per_page'] ;

        if ( $max_ads_per_site_per_page < 1 ) {
            $max_ads_per_site_per_page = PHP_INT_MAX ;
                //  Unlimited
        }

    } else {

        $max_ads_per_site_per_page = 1 ;

    }

    // -------------------------------------------------------------------------
    // max_repetitions_per_ad_per_page
    // 1+ (0 = unlimited, default = 1)
    // -------------------------------------------------------------------------

    if (    trim( $displaying_sites_site_profile['max_repetitions_per_ad_per_page'] ) !== ''
            &&
            ctype_digit( $displaying_sites_site_profile['max_repetitions_per_ad_per_page'] )
        ) {

        $max_repetitions_per_ad_per_page = (int) $displaying_sites_site_profile['max_repetitions_per_ad_per_page'] ;

        if ( $max_repetitions_per_ad_per_page < 1 ) {
            $max_repetitions_per_ad_per_page = PHP_INT_MAX ;
                //  Unlimited
        }

    } else {

        $max_repetitions_per_ad_per_page = 1 ;

    }

    // =========================================================================
    // Get the IMAGESIZES data...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/imagesizes-support.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer\
    // get_imagesize_records(
    //      $core_plugapp_dirs                      ,
    //      &$question_imagesize_records_changed
    //      )
    // - - - - - - - - - - - - - - - - - - - - -
    // Loads the IMAGESIZE records from the in-memory cache:-
    //      $GLOBALS[ get_imagesize_records_variable_name() ]
    //
    // Loading that cache from array-stored:-
    //      get_imagesize_records_array_storage_slug()
    //
    // if this hasn't yet been done.
    //
    // RETURNS
    //      On SUCCESS
    //          ARRAY $imagesize_records
    //
    //          $imagesize_records is like (eg):-
    //
    //              array(
    //
    //                  <image_url_1>   =>  array(
    //                      'last_checked_datetime_utc'     =>  <unix-timestamp>    ,
    //                      'question_image_ok'             =>  TRUE                ,
    //                      'imagesize'                     =>  <imagesize>         ,
    //                      'width'                         =>  <width>             ,
    //                      'height'                        =>  <height>
    //                      )   ,
    //
    //                  <image_url_2>   =>  array(
    //                      'last_checked_datetime_utc'     =>  <unix-timestamp>    ,
    //                      'question_image_ok'             =>  FALSE               ,
    //                      'imagesize'                     =>  NULL                ,
    //                      'width'                         =>  NULL                ,
    //                      'height'                        =>  NULL
    //                      )   ,
    //
    //                  ...
    //
    //                  )
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $question_imagesize_records_changed = FALSE ;

    // -------------------------------------------------------------------------

    $imagesize_records =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer\get_imagesize_records(
            $core_plugapp_dirs                      ,
            $question_imagesize_records_changed
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $imagesize_records ) ) {
        return $imagesize_records ;
    }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $imagesize_records , '$imagesize_records' ) ;

    // =========================================================================
    // Get the AD SLOT HTML proper...
    // =========================================================================

    $ad_slot_html =
        $get_ad_slot_html_function_name(
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

    // =========================================================================
    // If the IMAGE SIZES were edited, then SAVE the new version...
    // =========================================================================

    if ( $question_imagesize_records_changed === TRUE ) {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer\
        // set_imagesize_records(
        //      $imagesize_records
        //      )
        // - - - - - - - - - - - -
        // Updates both the memory cached:-
        //      $GLOBALS[ get_imagesize_records_variable_name() ]
        //
        // and array-stored:-
        //      get_imagesize_records_array_storage_slug()
        //
        // versions of these records
        //
        // ---
        //
        // $imagesize_records should be like (eg):-
        //
        //              array(
        //
        //                  <image_url_1>   =>  array(
        //                      'last_checked_datetime_utc'     =>  <unix-timestamp>    ,
        //                      'question_image_ok'             =>  TRUE                ,
        //                      'imagesize'                     =>  <imagesize>         ,
        //                      'width'                         =>  <width>             ,
        //                      'height'                        =>  <height>
        //                      )   ,
        //
        //                  <image_url_2>   =>  array(
        //                      'last_checked_datetime_utc'     =>  <unix-timestamp>    ,
        //                      'question_image_ok'             =>  FALSE               ,
        //                      'imagesize'                     =>  NULL                ,
        //                      'width'                         =>  NULL                ,
        //                      'height'                        =>  NULL
        //                      )   ,
        //
        //                  ...
        //
        //                  )
        //
        // RETURNS
        //      On SUCCESS
        //          TRUE
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        $ok =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer\set_imagesize_records(
                $imagesize_records
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $ok ) ) {
            return $ok ;
        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Reload "Ads List" button ?
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

    if (    \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\is_localhost()
            &&
            $displaying_sites_site_profile['show_ads_list_reload_buttons'] === TRUE
        ) {

        // ---------------------------------------------------------------------

        require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/url-utils.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\
        // get_current_page_url(
        //      $question_die_on_error = FALSE
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Attempts to retrieve the current page URL from $_SERVER.
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

        $question_die_on_error = TRUE ;

        // ---------------------------------------------------------------------

        $current_page_url =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\get_current_page_url(
                $question_die_on_error
                ) ;

        // ---------------------------------------------------------------------

//      $submit_filespec = dirname( __FILE__ ) . '/handle-ads-list-reload-request.php' ;
//
//      // ---------------------------------------------------------------------
//
//      require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/path-utils.php' ) ;
//
//      // -------------------------------------------------------------------------
//      // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_pathUtils\wp_path2url_or_die(
//      //      $path
//      //      )
//      // - - - - - - - - - - - - - - - - - - - -
//      // RETURNS:-
//      //      The requested URL.
//      //
//      // Unless an error occurs, it which case it issues an error message and
//      // exit()s.
//      // -------------------------------------------------------------------------
//
//      $submit_url =
//          \greatKiwi_byFernTec_adSwapper_local_v0x1x211_pathUtils\wp_path2url_or_die(
//              $submit_filespec
//              ) ;

        // ---------------------------------------------------------------------

        $submit_url =
            \admin_url( 'admin-ajax.php' ) .
            '?action=greatKiwi_byFerntec_handleAdsListReloadRequest'
            ;

        // ---------------------------------------------------------------------

        $reload_ads_list_button = <<<EOT
<form
    method="post"
    action="{$submit_url}"
    style="background-color:#000000; padding:5px 10px; margin-bottom:3px; text-align:left"
    >
    <input  type="hidden"
            name="ad_type"
            value="{$ad_slot_ad_type}"
            />
    <input  type="hidden"
            name="goto"
            value="{$current_page_url}"
            />
    <input  type="submit"
            value="Reload '{$ad_slot_ad_type}' Ads List"
            style="bac--kground-color:#666666; co--lor:#FFFFFF; font-weight:bold; margin:0"
            />
</form>
EOT;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        $reload_ads_list_button = '' ;

        // ---------------------------------------------------------------------
    }

    // =========================================================================
    // Wrap the ads proper in the Widget Area before/after stuff...
    // =========================================================================

    return <<<EOT
{$reload_ads_list_button}
{$pr}
{$ad_slot_html}
EOT;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

