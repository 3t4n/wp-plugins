<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / ADMIN / CUSTOM-HOME-PAGE.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_customHomePage ;

// =============================================================================
// custom_home_page()
// =============================================================================

function custom_home_page(
    $core_plugapp_dirs                                  ,
    $question_front_end                                 ,
    $app_defs_directory_tree                            ,
    $applications_dataset_and_view_definitions_etc      ,
    $dataset_manager_home_page_title                    ,
    $display_options                                    ,
    $submission_options
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_customHomePage\
    // custom_home_page(
    //      $core_plugapp_dirs                                  ,
    //      $question_front_end                                 ,
    //      $app_defs_directory_tree                            ,
    //      $applications_dataset_and_view_definitions_etc      ,
    //      $dataset_manager_home_page_title                    ,
    //      $display_options                                    ,
    //      $submission_options
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Displays the custom home page.
    //
    // RETURNS
    //      o   On SUCCESS
    //              Either:-
    //              --  $custom_home_page_html STRING
    //              Or:-
    //              --  FALSE (means display the default home page)
    //
    //      o   On FAILURE
    //              ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // =========================================================================
    // Is there a logged in user ?
    // =========================================================================

    // -------------------------------------------------------------------------
    // is_user_logged_in()
    // - - - - - - - - - -
    // This Conditional Tag checks if the current visitor is logged in. This is
    // a boolean function, meaning it returns either TRUE or FALSE.
    //
    // This function does not accept any parameters.
    //
    // RETURN VALUES
    //      (boolean)
    //      True if user is logged in, false if not logged in.
    // -------------------------------------------------------------------------

    if ( ! \is_user_logged_in() ) {

        $msg = <<<EOT
PROBLEM:&nbsp; Sorry, but you must be logged-in to use this plugin!
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        return array( $msg) ;

    }

    // =========================================================================
    // Support Routines
    // =========================================================================

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/wordpress-user-support.php' ) ;

    // =========================================================================
    // Only users with the "Adswapper" role can view the custom home page
    // proper...
    // =========================================================================

/*
    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_wpUserSupport\
    // current_user_has_role(
    //      $role_name                  ,
    //      $question_strict = TRUE
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // If $question_strict is TRUE, then there MUST be a logged-in user
    // (and an error message is returned if there ISN'T one).
    //
    // If $question_strict is FALSE, then FALSE is returned if there's NO
    // logged-in user.
    //
    // RETURNS
    //      On SUCCESS
    //          TRUE or FALSE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $role_name = 'Adswapper' ;

    $question_strict = TRUE ;

    // -------------------------------------------------------------------------

    $result =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_wpUserSupport\current_user_has_role(
            $role_name          ,
            $question_strict
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return array( $result ) ;
    }

    // -------------------------------------------------------------------------

    if ( $result !== TRUE ) {

        $msg = <<<EOT
PROBLEM:&nbsp; Sorry, but you must have the "Adswapper" role to use this plugin!
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        return array( $msg) ;

    }
*/

    // =========================================================================
    // URLs
    // =========================================================================

    require_once( $core_plugapp_dirs['dataset_manager_includes_dir'] . '/get-dataset-urls.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_manage_dataset_url(
    //      $caller_apps_includes_dir   ,
    //      $question_front_end         ,
    //      $dataset_slug = NULL        ,
    //      $page_variant = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the "manage-dataset" URL.
    //
    // If $dataset_slug is NULL, then we use:-
    //      $_GET['dataset_slug']
    //
    // If a STRING $page_variant slug is supplied, it's the CALLER's job to
    // ensure that it's defined.  In:-
    //      $selected_datasets_dmdd['dataset_records_table']['page_variants']
    //
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          STRING $url
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    $_GET['application'] = 'ad-swapper' ;

    // -------------------------------------------------------------------------
    // Maintain Plugin Settings URL...
    // -------------------------------------------------------------------------

    $dataset_slug = 'ad_swapper_plugin_settings' ;

    // -------------------------------------------------------------------------

    $maintain_plugin_settings_url =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_manage_dataset_url(
            $core_plugapp_dirs['plugins_includes_dir']      ,
            $question_front_end                             ,
            $dataset_slug
            ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $maintain_plugin_settings_url ) ) {
        return $maintain_plugin_settings_url ;
    }

    // -------------------------------------------------------------------------
    // Maintain Site Profile URL...
    // -------------------------------------------------------------------------

    $dataset_slug = 'ad_swapper_site_profile' ;

    // -------------------------------------------------------------------------

    $maintain_site_profile_url =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_manage_dataset_url(
            $core_plugapp_dirs['plugins_includes_dir']      ,
            $question_front_end                             ,
            $dataset_slug
            ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $maintain_site_profile_url ) ) {
        return $maintain_site_profile_url ;
    }

    // -------------------------------------------------------------------------
    // Maintain Ad Slots URL...
    // -------------------------------------------------------------------------

    $dataset_slug = 'ad_swapper_ad_slots' ;

    // -------------------------------------------------------------------------

    $maintain_ad_slots_url =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_manage_dataset_url(
            $core_plugapp_dirs['plugins_includes_dir']      ,
            $question_front_end                             ,
            $dataset_slug
            ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $maintain_ad_slots_url ) ) {
        return $maintain_ad_slots_url ;
    }

    // -------------------------------------------------------------------------
    // Maintain Ads URL...
    // -------------------------------------------------------------------------

    $dataset_slug = 'ad_swapper_ads_outgoing' ;

    // -------------------------------------------------------------------------

    $maintain_ads_url =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_manage_dataset_url(
            $core_plugapp_dirs['plugins_includes_dir']      ,
            $question_front_end                             ,
            $dataset_slug
            ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $maintain_ads_url ) ) {
        return $maintain_ads_url ;
    }

    // -------------------------------------------------------------------------
    // Maintain Web Site Collections URL...
    // -------------------------------------------------------------------------

    $dataset_slug = 'ad_swapper_web_site_collections' ;

    // -------------------------------------------------------------------------

    $maintain_web_site_collections_url =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_manage_dataset_url(
            $core_plugapp_dirs['plugins_includes_dir']      ,
            $question_front_end                             ,
            $dataset_slug
            ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $maintain_web_site_collections_url ) ) {
        return $maintain_web_site_collections_url ;
    }

/*
    // -------------------------------------------------------------------------
    // Maintain Web Site Collection Members URL...
    // -------------------------------------------------------------------------

    $dataset_slug = 'ad_swapper_this_sites_web_site_collection_members' ;

    // -------------------------------------------------------------------------

    $maintain_web_site_collection_members_url =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_manage_dataset_url(
            $core_plugapp_dirs['plugins_includes_dir']      ,
            $question_front_end                             ,
            $dataset_slug
            ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $maintain_web_site_collection_members_url ) ) {
        return $maintain_web_site_collection_members_url ;
    }

    // -------------------------------------------------------------------------
    // Select Web Site Collections URL...
    // -------------------------------------------------------------------------

    $dataset_slug = 'ad_swapper_available_selected_and_approved_web_site_collections' ;

    // -------------------------------------------------------------------------

    $select_web_site_collections_url =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_manage_dataset_url(
            $core_plugapp_dirs['plugins_includes_dir']      ,
            $question_front_end                             ,
            $dataset_slug
            ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $select_web_site_collections_url ) ) {
        return $select_web_site_collections_url ;
    }
*/

    // -------------------------------------------------------------------------
    // Select Available Sites URL...
    // -------------------------------------------------------------------------

//  $dataset_slug = 'ad_swapper_available_sites' ;
//
//  // -------------------------------------------------------------------------
//
//  $select_available_sites_url =
//      \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_manage_dataset_url(
//          $core_plugapp_dirs['plugins_includes_dir']      ,
//          $question_front_end                             ,
//          $dataset_slug
//          ) ;
//
//  // -------------------------------------------------------------------------
//
//  if ( is_array( $select_available_sites_url ) ) {
//      return $select_available_sites_url ;
//  }

    // -------------------------------------------------------------------------
    // Select Sites To Advertise URL...
    // -------------------------------------------------------------------------

    $dataset_slug = 'ad_swapper_available_sites' ;

    // -------------------------------------------------------------------------

    $select_sites_to_advertise_url =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_manage_dataset_url(
            $core_plugapp_dirs['plugins_includes_dir']      ,
            $question_front_end                             ,
            $dataset_slug                                   ,
            'sites-to-advertise'
            ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $select_sites_to_advertise_url ) ) {
        return $select_sites_to_advertise_url ;
    }

    // -------------------------------------------------------------------------
    // Select Sites To Advertise On URL...
    // -------------------------------------------------------------------------

//  $dataset_slug = 'ad_swapper_available_sites' ;

    // -------------------------------------------------------------------------

    $select_sites_to_advertise_on_url =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_manage_dataset_url(
            $core_plugapp_dirs['plugins_includes_dir']      ,
            $question_front_end                             ,
            $dataset_slug                                   ,
            'sites-to-advertise-on'
            ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $select_sites_to_advertise_on_url ) ) {
        return $select_sites_to_advertise_on_url ;
    }

    // -------------------------------------------------------------------------
    // Select Available Ads URL...
    // -------------------------------------------------------------------------

    $dataset_slug = 'ad_swapper_available_ads' ;

    // -------------------------------------------------------------------------

    $select_available_ads_url =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_manage_dataset_url(
            $core_plugapp_dirs['plugins_includes_dir']      ,
            $question_front_end                             ,
            $dataset_slug
            ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $select_available_ads_url ) ) {
        return $select_available_ads_url ;
    }

    // =========================================================================
    // Get the various CUSTOM PAGE URLs required...
    // =========================================================================

    require_once( $core_plugapp_dirs['dataset_manager_includes_dir'] . '/get-dataset-urls.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_custom_page_url(
    //      $core_plugapp_dirs          ,
    //      $page_slug        = NULL    ,
    //      $application_slug = NULL    ,
    //      $custom_page_slug = NULL    ,
    //      $question_front_end
    //      )
    // - - - - - - - - - - - - - - - - -
    // Creates and returns the URL for the specified "custom page".
    //
    // NOTE!
    // =====
    // 1.   A "custom page" is defined in the plugin/app's:-
    //          .../app-defs/<application-slug>.app/plugin.stuff/custom.pages/<custom-page-slug>.cp/
    //      directory.
    //
    // 2.   If:-
    //          $page_slug === NULL
    //      then we look for the page slug in:-
    //          $_GET['page']
    //      (and it's a FATAL error if that GET variable doesn't exist).
    //
    // 3.   If:-
    //          $application_slug === NULL
    //      then we look for the application slug in:-
    //          $_GET['application']
    //      (and it's a FATAL error if that GET variable doesn't exist).
    //
    // 4.   If:-
    //          $custom_page_slug === NULL
    //      then we look for the custom page slug in:-
    //          $_GET['custom_page']
    //      (and it's a FATAL error if that GET variable doesn't exist).
    //
    // RETURNS
    //      o   On SUCCESS
    //              $url STRING
    //
    //      o   On FAILURE
    //              ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    $page_slug        = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_page_query_variable_value() ;
    $application_slug = 'ad-swapper' ;

    // -------------------------------------------------------------------------
    // Update Central Site
    // -------------------------------------------------------------------------

    $custom_page_slug = 'update-central-site' ;

    // -------------------------------------------------------------------------

    $update_central_site_url =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_custom_page_url(
            $core_plugapp_dirs      ,
            $page_slug              ,
            $application_slug       ,
            $custom_page_slug       ,
            $question_front_end
            ) ;

    // -------------------------------------------------------------------------
    // Update Local Site
    // -------------------------------------------------------------------------

    $custom_page_slug = 'update-local-site' ;

    // -------------------------------------------------------------------------

    $update_local_site_url =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_custom_page_url(
            $core_plugapp_dirs      ,
            $page_slug              ,
            $application_slug       ,
            $custom_page_slug       ,
            $question_front_end
            ) ;

    // -------------------------------------------------------------------------
    // Reload Ads List
    // -------------------------------------------------------------------------

    $custom_page_slug = 'reload-ads-list' ;

    // -------------------------------------------------------------------------

    $reload_ads_list_url =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_custom_page_url(
            $core_plugapp_dirs      ,
            $page_slug              ,
            $application_slug       ,
            $custom_page_slug       ,
            $question_front_end
            ) ;

    // -------------------------------------------------------------------------
    // Synchronise
    // -------------------------------------------------------------------------

    $synchronise_url = <<<EOT
{$update_central_site_url}&sync_step=1
EOT;

    // -------------------------------------------------------------------------
    // View Subscription and Plugin Status
    // -------------------------------------------------------------------------

    $custom_page_slug = 'site-and-plugin-status' ;

    // -------------------------------------------------------------------------

    $view_site_and_plugin_status_url =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_custom_page_url(
            $core_plugapp_dirs      ,
            $page_slug              ,
            $application_slug       ,
            $custom_page_slug       ,
            $question_front_end
            ) ;

    // -------------------------------------------------------------------------

//  $manage_clippings_url =
//      \untrailingslashit( \admin_url() ) .
//      '/edit.php?post_type=wp_clippings_ferntec'
//      ;

    // =========================================================================
    // Create the PAGE CONTENT PROPER...
    // =========================================================================

    $images_base_url =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_plugin_url() .
        '/app-defs/ad-swapper.app/plugin.stuff/admin/images'
        ;

    // -------------------------------------------------------------------------

//  $url_wood_bg        = $images_base_url . '/tileable-wood-texture.png' ;
//  $url_bg             = $images_base_url . '/glass.jpg' ;
//  $url_bg             = $images_base_url . '/baby_blue_painted_textured_wall_tileable.jpg' ;                          //  boring
//  $url_bg             = $images_base_url . '/f7a21f87efa4facfae20fc24d6470163.jpg' ;                                  //  not seamless
//  $url_bg             = $images_base_url . '/6684841-vivid-colorful-repeating-abstract-seamless-background.jpg' ;     //  watermarked
//  $url_bg             = $images_base_url . '/gray_hexagon_tile_background_seamless.jpg' ;     //  A bit drab
    $url_bg             = $images_base_url . '/neon-spirals-background.jpg' ;                   //  OK

//  $url_backup_restore = $images_base_url . '/backup-restore.png' ;
//  $url_export_import  = $images_base_url . '/import-export.png' ;

    // -------------------------------------------------------------------------

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/style-support.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_styleSupport\
    // get_style_string__cross_browser_box_shadow(
    //      $options = '10px 10px 10px #808080'
    //      )
    // - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS (eg):-
    //      $style_string =
    //          "-moz-box-shadow:10px 10px 10px #808080; -webkit-box-shadow:10px 10px 10px #808080; box-shadow:10px 10px 10px #808080"
    // -------------------------------------------------------------------------

    $image_container_style = <<<EOT
margin:0 0 2em 2em; padding:1.5em; background-color:#F0F0F0
EOT;

    // -------------------------------------------------------------------------

    $img_shadow = '3px 3px 15px #808080' ;

    $image_container_style .=
        '; ' .
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_styleSupport\get_style_string__cross_browser_box_shadow(
            $img_shadow
            ) ;

    // -------------------------------------------------------------------------

    $outer_container_div_style = <<<EOT
margin-top:2em; background-image:url({$url_bg}); background-repeat:repeat; background-position:left top; padding:2em 2em 5em 2em
EOT;

    // -------------------------------------------------------------------------

    $outer_container_div_shadow = '5px 5px 20px #808080' ;

    $outer_container_div_style .=
        '; ' .
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_styleSupport\get_style_string__cross_browser_box_shadow(
            $outer_container_div_shadow
            ) ;

    // -------------------------------------------------------------------------

    $inner_container_div_style = <<<EOT
background-color:#FFFFFF; color:#000000; padding:2em; max-width:800px
EOT;

    // -------------------------------------------------------------------------

    $inner_container_div_shadow = '5px 5px 20px #808080' ;

    $inner_container_div_style .=
        '; ' .
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_styleSupport\get_style_string__cross_browser_box_shadow(
            $inner_container_div_shadow
            ) ;

    // -------------------------------------------------------------------------

    $h3_style = <<<EOT
margin:0 0 1.5em 0; background-color:#005C80; color:#FFFFFF; padding:6px 9px; font-size:148%; line-height:120%
EOT;

    // -------------------------------------------------------------------------

    $h4_style = <<<EOT
margin:2em 0 0.5em 0; background-color:#F0F0F0; color:#222222; padding:3px 6px; font-size:124%
EOT;

    // -------------------------------------------------------------------------

    $help_text_style = <<<EOT
font-size:100%; font-style:italic; color:#666666
EOT;

    // -------------------------------------------------------------------------

//      <h4 style="{$h4_style}">Reports</h4>
//
//      <div
//          style="padding-left:2em"
//          >
//
//          <p style="margin:0.6em 0 0 0"><a
//              href=""
//              style="text-decoration:none; font-size:116%; font-weight:bold"
//              >This Report</a></p><div
//                  style="{$help_text_style}; padding-left:3em"
//                  >
//                  Blah blah blah...
//
//          </div>
//
//      </div>

    // -------------------------------------------------------------------------

    $ul_style = <<<EOT
list-style-type:disc; margin:0 0 1em 2em
EOT;

    // -------------------------------------------------------------------------

    $ul_li_style = <<<EOT
margin:0 0; padding-left:0.5em
EOT;

    // -------------------------------------------------------------------------

    $js_dir_url = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_js_url() ;

    // -------------------------------------------------------------------------

    if (    function_exists( '\\is_adswapper_admanager_site' )
            &&
            \is_adswapper_admanager_site()
        ) {

        $sub_title = 'Ad Manager' ;

        list(
            $target_site_title      ,
            $target_site_url
            ) = get_target_site_title_and_url() ;

    } else {

        $sub_title = '&lsquo;Local Site Manager&rsquo;' ;

        $target_site_title = \get_bloginfo( 'name' ) ;

        $target_site_url = get_home_url() ;

    }

    // -------------------------------------------------------------------------

//          <p  class="ad-swapper-closer"
//              style="margin:0.6em 0 0 0"
//              ><a
//              target="_blank"
//              href="http://www.adswapper.com/contact-us/"
//              style="text-decoration:none; font-size:116%; font-weight:bold"
//              >Contact Us</a></p><div
//                  class="ad-swapper-help"
//                  style="{$help_text_style}; padding-left:2em"
//                  >
//                  For direct support (or for any other reason whatsoever),
//                  please use the <a
//                      target="_blank"
//                      href="http://www.adswapper.com/contact-us/"
//                      style="text-decoration:none"
//                      >Contact Form</a> on the main <a
//                          target="_blank"
//                          href="http://www.ferntechnology.com/"
//                          style="text-decoration:none"
//                          >Ad Swapper</a> site.&nbsp; We do our best to
//                              respond to all requests/enquiries within 24
//                              hours.
//
//          </div>

    // -------------------------------------------------------------------------

    $page_content_proper = <<<EOT
<div    style="{$outer_container_div_style}"
        >

    <div    style="{$inner_container_div_style}"
            >

        <h3 style="{$h3_style}"
            ><span style="font-size:80%; font-weight:normal; font-style:italic"
                >Welcome to Ad Swapper {$sub_title} for</span><br />{$target_site_title}<a
                    href="javascript:void()"
                    onclick="ad_swapper_toggle_help()"
                    style="float:right; text-decoration:none; color:#FFFFFF; font-size:80%; font-weight:normal; font-style:italic"
                    >show/hide help</a><div
                        style="clear:both"
                        ></div></h3>

        <div    class="ad-swapper-help"
                id="ad-swapper-help-state"
                style="{$help_text_style}"
                >
            Ad Swapper allows you to <b>exchange ads</b> with other WordPress
            sites.&nbsp; So WordPress sites can do <b>unlimited free
            advertising</b> on each other (apart from the rediculously small
            fees we charge for maintaining the Ad Swapper Central site and
            associated plugins).<br />
EOT;

    // -------------------------------------------------------------------------

//          <br />
//          From this screen, you can <b>manage all the Ad Swapper advertising
//          related to this site</b>.&nbsp; Ie;<ul style="{$ul_style}">
//
//              <li style="{$ul_li_style}"><b>Create</b> and upload to Ad
//              Swapper Central, the <b>ads</b> that you want to display on
//              other Ad Swapper sites,</li>
//
//              <li style="{$ul_li_style}"><b>Select</b> any Ad Swapper
//              <b>SITES</b> you <b>don't</b> want to display this site's ads
//              on.<br />&nbsp;&nbsp;&nbsp;&nbsp;NB:&nbsp; By default, this
//              site's ads will be displayed on <b>all</b> other Ad Swapper
//              sites,</li>
//
//              <li style="{$ul_li_style}"><b>Select</b> any Ad Swapper
//              <b>ADS</b> you <b>don't</b> want to display on this site.<br
//              />&nbsp;&nbsp;&nbsp;&nbsp;NB:&nbsp; By default, <b>all</b> other
//              Ad Swapper site ads will be displayed on this site,</li>
//
//              <li style="{$ul_li_style}">Define the &ldquo;<b>Ad
//              Slots</b>&rdquo; (on this site), to display the other Ad Swapper
//              site ads in,</li>
//
//              <li style="{$ul_li_style}">etc...</li>
//
//          </ul>
//
//          <b>Good luck</b> (and may your site's readership grow exponentially
//          &amp; explosively - or even better :)...

    // -------------------------------------------------------------------------

    $expander_title_style = <<<EOT
text-decoration:none; font-size:116%; font-style:normal; font-weight:bold
EOT;

    // -------------------------------------------------------------------------

    $expander_text_style = <<<EOT
font-style:normal; color:#000000
EOT;

    // -------------------------------------------------------------------------

    $indent_left = '1.33em' ;

    // -------------------------------------------------------------------------

    $summary_text_style = <<<EOT
padding:0 {$indent_left}; color:#000000
EOT;

    // -------------------------------------------------------------------------

    $ol_style = <<<EOT
margin:0 0 0 1em
EOT;

    // -------------------------------------------------------------------------

    $ol_li_style = <<<EOT
margin:8px 0 8px 0; padding-left:0.5em
EOT;

    // -------------------------------------------------------------------------

    $border_radius = '20px' ;

    // -------------------------------------------------------------------------

    $xxx_container_style = <<<EOT
margin:0.5em 0 0 {$indent_left}; -moz-border-radius:{$border_radius}; -webkit-border-radius:{$border_radius}; -khtml-border-radius:{$border_radius}; border-radius:{$border_radius}
EOT;

    // -------------------------------------------------------------------------

    $hr_style = <<<EOT
margin:8px 2em 0 {$indent_left}; height:1px; background-color:#666666
EOT;

    // -------------------------------------------------------------------------

    $top_note_style = <<<EOT
border-top:2px solid #CCCCCC; border-bottom:2px solid #CCCCCC; padding:10px 0
EOT;

    // -------------------------------------------------------------------------

    $bottom_note_style = <<<EOT
border-top:2px solid #CCCCCC; padding:10px 0
EOT;

    // -------------------------------------------------------------------------

    $page_content_proper .= <<<EOT

            <br />
            From this screen, you can <b>manage all the Ad Swapper
            advertising</b> related to the site that this Ad Swapper plugin is
            installed on (<a
                target="_blank"
                href="{$target_site_url}"
                style="text-decoration:none"
                >{$target_site_title}</a>).<br />

            <br />
            <div    style="background-color:#F0FFF0; border:1px solid #00EE00; padding:1em; -moz-border-radius:{$border_radius}; -webkit-border-radius:{$border_radius}; -khtml-border-radius:{$border_radius}; border-radius:{$border_radius}"
                    ><!-- START "Click the following links..." container DIV -->

                <span style="font-size:117%; font-weight:bold;
                font-style:normal; color:#007000">Click the following links, for
                HELP on the specified task</span>:-<br />

                <div style="{$hr_style}"></div>

                <div    id="initial-plugin-setup-container"
                        style="{$xxx_container_style}"
                        >

                    <a  href="javascript:void()"
                        onclick="toggle_expander(this,'initial-plugin-setup')"
                        style="{$expander_title_style}"
                        >Initial Plugin Setup</a>

                    <div    id="initial-plugin-setup-summary"
                            style="{$summary_text_style}"
                            >
                            <b>DO THIS FIRST</b> (very little else will work
                            until you've done it)!
                    </div>

                    <div    id="initial-plugin-setup"
                            style="{$expander_text_style}; display:none"
                            >

                        <div style="{$top_note_style}">
                            <b>DO THIS FIRST!</b>&nbsp; More specifically, do
                            this <b>first</b> - when you install the Ad Swapper
                            plugin for the <b>very first time</b>.&nbsp; (You
                            shouldn't need to do it for second and subsequent
                            "upgrade" installs.)&nbsp; But for the first
                            install, very little else will work, until you've
                            done the following two things:-
                        </div>

                        <ol style="{$ol_style}">

                            <li style="{$ol_li_style}">
                                Run the <a
                                    href="{$maintain_plugin_settings_url}"
                                    style="text-decoration:none; font-weight:bold"
                                    >Maintain Plugin Settings</a> option (and follow
                                    the instructions given).
                            </li>

                            <li style="{$ol_li_style}">
                                Run the <a
                                    href="{$maintain_site_profile_url}"
                                    style="text-decoration:none; font-weight:bold"
                                    >Maintain This Site's Profile / Settings</a>
                                    option.&nbsp; You can usually just <b>accept the
                                    defaults - and "Submit" the form</b>.&nbsp; But
                                    if you want to <b>display ads</b> (on either
                                    your own and/or other Ads Swapper sites), you
                                    MUST <b>specify at least one GeoIP country or
                                    continent code</b> (to display the ads in).
                            </li>

                        </ol>

                        <div style="{$bottom_note_style}">
                            <u><b>The following help notes assume that you've done
                            this initial plugin setup.</b></u>
                        </div>

                    </div>

                </div>

                <div    id="check-current-subscription-status-container"
                        style="{$xxx_container_style}"
                        >

                    <a  href="javascript:void()"
                        onclick="toggle_expander(this,'check-current-subscription-status')"
                        style="{$expander_title_style}"
                        >Check Your Current Subscription Status</a>

                    <div    id="check-current-subscription-status-summary"
                            style="{$summary_text_style}"
                            >
                            Check whether you have a "<b>trial</b>" or a
                            "<b>paid</b>" subscription.&nbsp; Also shows the
                            <b>expiry date/time</b> - and includes a link to
                            <b>take out or renew</b> your (paid) subscription...
                    </div>

                    <div    id="check-current-subscription-status"
                            style="{$expander_text_style}; display:none"
                            >

                        <ol style="{$ol_style}">

                            <li style="{$ol_li_style}">
                                Run the <a
                                    href="{$synchronise_url}"
                                    style="text-decoration:none; font-weight:bold"
                                    >Synchronise</a> option (unless you've recently
                                    run it - and the site's subscription status is
                                    unlikely to have changed in the meantime).
                            </li>

                            <li style="{$ol_li_style}">
                                Run the <a
                                    href="{$view_site_and_plugin_status_url}"
                                    style="text-decoration:none; font-weight:bold"
                                    >View Subscription and Plugin Status</a> option.
                            </li>

                        </ol>

                        <div style="{$bottom_note_style}">
                            Your Subscription Type should be either <b>Trial</b> or
                            <b>Paid</b>.&nbsp; Note that if you want to display ads
                            on other than the <b>FREE Test Drive / Trial Mode</b>
                            sites, you'll need an <b>unexpired Paid</b>
                            subscription.&nbsp; <a
                                target=_blank"
                                href="http://www.adswapper.com/downloads/plugin-only-subscription-type/"
                                style="text-decoration:none; font-weight:bold"
                                >Click here to take out or renew your Paid
                                subscription</a>.
                        </div>

                    </div>

                </div>

                <div style="{$hr_style}"></div>

                <div    id="create-some-ads-container"
                        style="{$xxx_container_style}"
                        >

                    <a  href="javascript:void()"
                        onclick="toggle_expander(this,'create-some-ads')"
                        style="{$expander_title_style}"
                        >Create Some Ads</a>

                    <div    id="create-some-ads-summary"
                            style="{$summary_text_style}"
                            >
                            You only need do this if you want to
                            <b>advertise</b> (on your own and/or other sites).
                    </div>

                    <div    id="create-some-ads"
                            style="{$expander_text_style}; display:none"
                            >
EOT;

    // -------------------------------------------------------------------------

//                      <div style="{$top_note_style}">
//                          Note!&nbsp; You only need do this if you want to
//                          <b>advertise your site/business</b> (or whatever), on
//                          your own and/or other Ad Swapper sites.&nbsp; If you
//                          just want to <b>display OTHER site's</b> Ad Swapper ads
//                          (on this site), skip to <b>Prepare This Site To Display
//                          (Ad Swapper) Ads</b> (next).
//                      </div>

    // -------------------------------------------------------------------------

    $page_content_proper .= <<<EOT

                        <ol style="{$ol_style}">

                            <li style="{$ol_li_style}">
                                Create your <b>GIF, JPEG or PNG files</b>.&nbsp;
                                This is done outside of the Ad Swapper plugin -
                                usually using <b>standard desktop image creation
                                tools</b> like MS Paint and Microsoft Word,
                                etc.&nbsp; See <a
                                    target="_blank"
                                    href="http://www.adswapper.com/docs-tutorials/ad-swapper-how-tos/how-to-create-ad-swapper-ad-images/"
                                    style="text-decoration:none; font-weight:bold"
                                    >(How To) Create Ad Swapper Ad Images</a> for
                                    more options and details.
                            </li>

                            <li style="{$ol_li_style}">
                                <b>Upload</b> the ads you've created to this site
                                (or whereever else on the Net you want to store
                                them).&nbsp; The easiest way is usually to store
                                them in your WordPress Media Library.&nbsp; See <a
                                    target="_blank"
                                    href="http://www.adswapper.com/docs-tutorials/ad-swapper-how-tos/how-to-upload-ad-swapper-ad-images-to-your-site/"
                                    style="text-decoration:none; font-weight:bold"
                                    >(How To) Upload Ad Swapper Ad Images (To Your
                                    Site)</a> for more options and details.
                            </li>

                            <li style="{$ol_li_style}">
                                <b>Tell Ad Swapper</b> about the ads you want to
                                display - by running the <a
                                    href="{$maintain_ads_url}"
                                    style="text-decoration:none; font-weight:bold"
                                    >Maintain This Site's Ads</a> option.&nbsp;
                                    This is quick and easy to do.&nbsp; Since
                                    generally, all you need do is enter the
                                    <b>"Image URL"</b>, and the <b>"Link
                                    URL"</b> (that the user is taken to when
                                    they click the image), for each ad.
                            </li>

                        </ol>

                    </div>

                </div>

                <div    id="display-this-site-ads-on-other-sites-container"
                        style="{$xxx_container_style}"
                        >

                    <a  href="javascript:void()"
                        onclick="toggle_expander(this,'display-this-site-ads-on-other-sites')"
                        style="{$expander_title_style}"
                        >Get Your Ads Displaying - On This And/Or Other Sites</a>

                    <div    id="display-this-site-ads-on-other-sites-summary"
                            style="{$summary_text_style}"
                            >
                            Once you've created the ads you want to display,
                            this is how you <b>select the sites</b> you want to
                            advertise on, and have your ads
                            <b>auto-transferred</b> there (the ads will start
                            displaying immediately the other site approves
                            them)...
                    </div>

                    <div    id="display-this-site-ads-on-other-sites"
                            style="{$expander_text_style}; display:none"
                            >

                        <ol style="{$ol_style}">

                            <li style="{$ol_li_style}">
                                Run the <a
                                    href="{$synchronise_url}"
                                    style="text-decoration:none; font-weight:bold"
                                    >Synchronise</a> option (to update this plugin's
                                    list of sites that it can advertise on).
                            </li>

                            <li style="{$ol_li_style}">
                                Run the <a
                                    href="{$select_sites_to_advertise_on_url}"
                                    style="text-decoration:none; font-weight:bold"
                                    >Select Sites to Advertise On</a> option - and
                                    <b>select some sites</b> to advertise on
                                    (including your own, if you want to advertise on
                                    that).&nbsp; Note! Set the <b>Sites To Show</b>
                                    dropdown (at the top of the page), to <b>All</b>
                                    - to see ALL the sites that you can (potentially
                                    at least,) advertise on.
                            </li>

                            <li style="{$ol_li_style}">
                                Run the <a
                                    href="{$synchronise_url}"
                                    style="text-decoration:none; font-weight:bold"
                                    >Synchronise</a> option again (to transfer
                                    details of the sites you want to advertise on -
                                    and your ads - to Ad Swapper Central.&nbsp; So
                                    that it can pass these on to the sites
                                    concerned).
                            </li>

                        </ol>

                        <div style="{$bottom_note_style}">
                            Note!&nbsp; Having done the above, your ads WON'T
                            instantly appear on the sites you've targeted.&nbsp;
                            Instead, they'll come live in random fashion.&nbsp; As
                            each targeted site:-
                            <ul style="margin:0 0 0 2em; list-style-type:disc">
                                <li style="{$ul_li_style}"><b>Synchronises</b> their
                                    site with Ad Swapper Central (to discover that
                                    you want to advertise on them).</li>
                                <li style="{$ul_li_style}"><b>Approves</b> the
                                    display of your ads on their site.</li>
                                <li style="{$ul_li_style}"><b>Synchronises</b>
                                    again (to download a list of the ads you
                                    want to display).&nbsp; And finally;</li>
                                <li style="{$ul_li_style}"><b>Approves</b> the
                                    display of each of your ads.</li>
                            </ul>
                            This will typically take a <b>few hours/days</b>
                            (depending how active each targeted site is).&nbsp; And
                            of course, there's NO guarantee that every targeted site
                            will approve your site/ads (or just how quickly they
                            will do this).&nbsp; That's their right of course (just
                            as it's your right to select the sites and ads that
                            display on your site).&nbsp; So be cool; what happens
                            happens (when and if it happens) :)
                        </div>

                    </div>

                </div>

                <div style="{$hr_style}"></div>

                <div    id="prepare-this-site-to-display-ads-container"
                        style="{$xxx_container_style}"
                        >

                    <a  href="javascript:void()"
                        onclick="toggle_expander(this,'prepare-this-site-to-display-ads')"
                        style="{$expander_title_style}"
                        >Prepare This Site To Display (Ad Swapper&trade;) Ads</a>

                    <div    id="prepare-this-site-to-display-ads-summary"
                            style="{$summary_text_style}"
                            >
                            You only need do this if you want to <b>display</b>
                            Ad Swapper ads on this site.
                    </div>

                    <div    id="prepare-this-site-to-display-ads"
                            style="{$expander_text_style}; display:none"
                            >
EOT;

    // -------------------------------------------------------------------------

//                      <div style="{$top_note_style}">
//                          Note!&nbsp; You only need do this if you want to
//                          <b>display Ad Swapper ads</b> (on this site).&nbsp;
//                          Which generally of course, you do (especially if other
//                          Ad Swapper sites are displaying <b>YOUR</b> ads).&nbsp;
//                          But if you're still evaluating Ad Swapper - and want to
//                          skip this step for now - that's quite OK.
//                      </div>

    // -------------------------------------------------------------------------

    $page_content_proper .= <<<EOT

                        <ol style="{$ol_style}">

                            <li style="{$ol_li_style}">
                                If you need an <b>overview</b> of what Ad Slots
                                are (and the various <b>Ad Slot types</b>
                                available, etc), then <a
                                    target="_blank"
                                    href="http://www.adswapper.com/docs-tutorials/ad-swapper-user-manual/the-big-picture/ad-slots/"
                                    style="text-decoration:none; font-weight:bold"
                                    >check out the Ad Slots page</a>, first.
                            </li>

                            <li style="{$ol_li_style}">
                                If you want to switch this site into <b>Test
                                Mode</b> (so that <b>only YOU can see Ad Swapper
                                ads - while you're setting up your Ad Slots</b>)
                                - then run the <a
                                    href="{$maintain_site_profile_url}"
                                    style="text-decoration:none; font-weight:bold"
                                    >Maintain This Site's Profile / Settings</a>
                                    option.&nbsp; And set the <b>Test Mode</b>
                                    field as required.&nbsp; (Don't forget to
                                    <b>switch Test Mode OFF, when you're ready
                                    to go live</b>.)
                            </li>

                            <li style="{$ol_li_style}">
                                Run the <a
                                    href="{$maintain_ad_slots_url}"
                                    style="text-decoration:none; font-weight:bold"
                                    >Maintain This Site's Ad Slots</a> option.&nbsp;
                                    And create <b>at least one</b> Ad Slot (to
                                    display Ad Swapper ads in).
                            </li>

                            <li style="{$ol_li_style}">
                                Then <b>add the Ad Slots you've created to your
                                site's pages</b>.&nbsp; You can do this by either
                                <b>WordPress Widget</b>, <b>PHP Function</b> or
                                <b>WordPress Shortcode</b>.&nbsp; As <a
                                    target="_blank"
                                    href="http://www.adswapper.com/docs-tutorials/ad-swapper-how-tos/how-to-add-ad-slots-to-your-sites-pages/"
                                    style="text-decoration:none; font-weight:bold"
                                    >described in more detail here</a>.
                            </li>

                        </ol>

                    </div>

                </div>

                <div    id="display-other-site-ads-on-this-site-container"
                        style="{$xxx_container_style}"
                        >

                    <a  href="javascript:void()"
                        onclick="toggle_expander(this,'display-other-site-ads-on-this-site')"
                        style="{$expander_title_style}"
                        >Select/Obtain the Ads To Display (On This Site)</a>

                    <div    id="display-other-site-ads-on-this-site-summary"
                            style="{$summary_text_style}"
                            >
                            Once you've prepared your site to display (Ad
                            Swapper&trade;) ads, this is how you <b>select the
                            sites</b> you want to advertise, <b>download</b>
                            their ad URLs, and <b>pick</b> those you want to
                            display (the ads will start displaying immediately
                            you approve them)...
                    </div>

                    <div    id="display-other-site-ads-on-this-site"
                            style="{$expander_text_style}; display:none"
                            >

                        <ol style="{$ol_style}">

                            <li style="{$ol_li_style}">
                                Run the <a
                                    href="{$synchronise_url}"
                                    style="text-decoration:none; font-weight:bold"
                                    >Synchronise</a> option (to update this plugin's
                                    list of sites that it can advertise).
                            </li>

                            <li style="{$ol_li_style}">
                                Run the <a
                                    href="{$select_sites_to_advertise_url}"
                                    style="text-decoration:none; font-weight:bold"
                                    >Select Sites to Advertise</a> option - and
                                    <b>select some sites</b> to advertise (including
                                    your own, if you want to advertise that).&nbsp;
                                    Note! Set the <b>Sites To Show</b> dropdown (at
                                    the top of the page), to <b>All</b> - to see ALL
                                    the sites that you can (potentially at least,)
                                    advertise.
                            </li>

                            <li style="{$ol_li_style}">
                                Run the <a
                                    href="{$synchronise_url}"
                                    style="text-decoration:none; font-weight:bold"
                                    >Synchronise</a> option again (to transfer
                                    details of the sites you want to advertise to Ad
                                    Swapper Central - and download their "available"
                                    ads).
                            </li>

                            <li style="{$ol_li_style}">
                                Run the <a
                                    href="{$select_available_ads_url}"
                                    style="text-decoration:none; font-weight:bold"
                                    >Select the Ads to Display on This Site</a>
                                    option - and <b>approve/dis-approve any newly
                                    downloaded ads</b> (that you do/don't want to
                                    display).
                            </li>

                            <li style="{$ol_li_style}">
                                Run the <a
                                    href="{$reload_ads_list_url}"
                                    style="text-decoration:none; font-weight:bold"
                                    >Reload Ads List</a> option.
                            </li>

                            <li style="{$ol_li_style}">
                                    The next time any <b>front-end page</b>
                                    (that contains Ad Swapper ads), is
                                    displayed, the viewer should see the newly
                                    downloaded and approved ads (along with any
                                    other ads that were previously downloaded
                                    and approved).&nbsp; <a
                                        target="_blank"
                                        href="{$target_site_url}"
                                        style="text-decoration:none; font-weight:bold"
                                        >View a front-end page</a> (to check
                                        this)...
                            </li>

                        </ol>

                    </div>

                </div>
EOT;

    // -------------------------------------------------------------------------

//  $page_content_proper .= <<<EOT
//              <div    id="display-this-site-ads-on-this-site-container"
//                      style="{$xxx_container_style}"
//                      >
//
//                  <a  href="javascript:void()"
//                      onclick="toggle_expander(this,'display-this-site-ads-on-this-site')"
//                      style="{$expander_title_style}"
//                      >Display THIS Site's Ads - On THIS Site</a>
//
//                  <div    id="display-this-site-ads-on-this-site-summary"
//                          style="{$summary_text_style}"
//                          >
//                          Just some clarification about displaying THIS site's
//                          ads on THIS site.
//                  </div>
//
//                  <div    id="display-this-site-ads-on-this-site"
//                          style="{$expander_text_style}; display:none"
//                          >
//
//                      <div style="{$bottom_note_style}">
//                          Do <b>BOTH</b>:-
//                          <ul style="margin:0 0 0 2em; list-style-type:disc">
//                              <li style="{$ul_li_style}"><b>Display THIS Site's Ads - On OTHER Sites</b>, and;</li>
//                              <li style="{$ul_li_style}"><b>Display OTHER Site's Ads - On THIS Site</b></li>
//                          </ul>
//                          (see above).&nbsp; And make sure that you both <b>select
//                          your site</b> (to advertise on).&nbsp; And <b>approve
//                          your site</b> (to advertise on itself).
//                      </div>
//
//                  </div>
//
//              </div>
//  EOT;

    // -------------------------------------------------------------------------

    $page_content_proper .= <<<EOT

                <div style="{$hr_style}"></div>

            </div><!-- END "Click the following links..." container DIV -->
EOT;

    // -------------------------------------------------------------------------

    $page_content_proper .= <<<EOT
        </div>

        <h4 style="{$h4_style}">Initial Plugin Setup...</h4>

        <div
            style="padding-left:2em"
            >

            <p style="margin:0.6em 0 0 0"><a
                href="{$maintain_plugin_settings_url}"
                style="text-decoration:none; font-size:116%; font-weight:bold"
                >Maintain Plugin Settings</a></p><div
                    class="ad-swapper-help"
                    style="{$help_text_style}; padding-left:2em"
                    >
                    You should only need do this once (when you first install
                    the plugin).

            </div>

        </div>

        <h4 style="{$h4_style}">Site and Ad Maintenance...</h4>

        <div
            style="padding-left:2em"
            >

            <p style="margin:0.6em 0 0 0"><a
                href="{$view_site_and_plugin_status_url}"
                style="text-decoration:none; font-size:116%; font-weight:bold"
                >View Subscription and Plugin Status</a></p><div
                    class="ad-swapper-help"
                    style="{$help_text_style}; padding-left:2em"
                    >
                    You can check your Ad Swapper <b>subscription type</b> - and
                    whether or not this plugin needs to be <b>updated</b> - from
                    here.

            </div>

            <p  class="ad-swapper-closer"
                style="margin:0.6em 0 0 0"
                ><a
                href="{$maintain_site_profile_url}"
                style="text-decoration:none; font-size:116%; font-weight:bold"
                >Maintain This Site's Profile / Settings</a></p><div
                    class="ad-swapper-help"
                    style="{$help_text_style}; padding-left:2em"
                    >
                    Lets you <b>configure</b> how <b>Ad Swapper</b> works on
                    this site.&nbsp; In particular:-
                    <ul style="list-style-type:disc; margin-left:2em">
                        <li style="margin-bottom:0">The <b>Test Mode</b> field
                            lets you configure Ad Swapper so that <b>only
                            you</b> can see the Ad Swapper ads displayed on your
                            site (which is very useful when evaluating Ad
                            Swapper - and setting up it's Ad Slots).&nbsp;
                            And;</li>
                        <li style="margin-top:0">The <b>GeoIP</b> field allows
                            you to select the <b>countries/continents your ads
                            are displayed in</b> (where your ads <b>WON'T</b> be
                            displayed at all - unless <b>at least one</b> such
                            country is selected).</li>
                    </ul>
            </div>

            <p  class="ad-swapper-closer"
                style="margin:0.6em 0 0 0"
                ><a
                href="{$maintain_ad_slots_url}"
                style="text-decoration:none; font-size:116%; font-weight:bold"
                >Maintain This Site's Ad Slots</a></p><div
                    class="ad-swapper-help"
                    style="{$help_text_style}; padding-left:2em"
                    >
                    &ldquo;Ad Slots&rdquo; are the areas on your site's pages
                    where ads from other Ad Swapper sites are placed.  You'll
                    need at least one Ad Slot (though you can create/use as many
                    as you like).

            </div>

            <p  class="ad-swapper-closer"
                style="margin:0.6em 0 0 0"
                ><a
                href="{$maintain_ads_url}"
                style="text-decoration:none; font-size:116%; font-weight:bold"
                >Maintain This Site's Ads</a></p><div
                    class="ad-swapper-help"
                    style="{$help_text_style}; padding-left:2em"
                    >
                    Add, edit and delete the ads that you want to display on
                    other sites (in the Ad Swapper network).  This is where
                    you'll probably spend the bulk of your time with Ad Swapper
                    (once you've done the initial setup above).

            </div>

        </div>

        <h4 style="{$h4_style}">Manual Site and Ad Selection...</h4>

        <div
            style="padding-left:2em"
            >

            <p style="margin:0.6em 0 0 0"><a
                href="{$select_sites_to_advertise_url}"
                style="text-decoration:none; font-size:116%; font-weight:bold"
                >Select Sites to Advertise</a></p><div
                    class="ad-swapper-help"
                    style="{$help_text_style}; padding-left:2em"
                    >
                    Here you can select the Ad Swapper sites (including your
                    own), whoose ads you want to display on your site.

            </div>

            <p  class="ad-swapper-closer"
                style="margin:0.6em 0 0 0"
                ><a
                href="{$select_sites_to_advertise_on_url}"
                style="text-decoration:none; font-size:116%; font-weight:bold"
                >Select Sites to Advertise On</a></p><div
                    class="ad-swapper-help"
                    style="{$help_text_style}; padding-left:2em"
                    >
                    Here you can select the Ad Swapper sites (including your
                    own), that you want to display your site's ads on.

            </div>

            <p  class="ad-swapper-closer"
                style="margin:0.6em 0 0 0"
                ><a
                href="{$select_available_ads_url}"
                style="text-decoration:none; font-size:116%; font-weight:bold"
                >Select the Ads to Display on This Site</a></p><div
                    class="ad-swapper-help"
                    style="{$help_text_style}; padding-left:2em"
                    >
                    By default, <b>ALL the individual Ad Swapper ADS to be
                    displayed on this site are DISABLED</b> (even if you've
                    approved the SITEs that own the ads concerned).&nbsp; So
                    once you've approved one or more sites (to display ads on
                    this site) - and Synchronised with Ad Swapper Central (to
                    download the URLs of the approved site ads), you must then
                    <b>individually approve any newly downloaded ads</b>.
            </div>

        </div>
EOT;

    // -------------------------------------------------------------------------

//      <h4 style="{$h4_style}">Web Site Collections (Targeted Marketing)...</h4>
//
//      <div
//          class="ad-swapper-help"
//          style="{$help_text_style}; padding-left:2em"
//          >
//          <b>Targeted Marketing</b> is the Holy Grail of the advertising
//          industry (you want to show your ads seen by everyone likely to be
//          interested in your product).&nbsp; And Ad Swapper &ldquo;Web Site
//          Collections&rdquo; are by far the most effective way to <b>gather
//          all your potential customers together</b>.&nbsp; Nothing else - not
//          even major television events like the Superbowl, the Olympics or
//          sporting World Cups, etc - can beat it.&nbsp; Better still, at just
//          $20 per year (for your Ad Swapper subscription), you DON'T have to
//          be Megabucks International to afford it.&nbsp; Anybody - including
//          private individuals and non-profits - can have <b>the most effective
//          advertising ever</b> (virtually for free).&nbsp; <a target="_blank"
//          href="" style="text-decoration:none">Click here for more...</a>
//
//      </div>
//
//      <div
//          style="padding-left:2em"
//          >
//
//              <p style="margin:0.6em 0 0 0"><a
//              href="{$maintain_web_site_collections_url}"
//              style="text-decoration:none; font-size:116%; font-weight:bold"
//              >Maintain Your Own Web Site Collections</a></p><div
//                  class="ad-swapper-help"
//                  style="{$help_text_style}; padding-left:2em"
//                  >
//                  Create, edit and delete your own Web Site Collections (the
//                  magnets that will draw your potential customers to where
//                  they can see your ads).&nbsp; In general, you should only
//                  create a new collection if there's no existing collection
//                  that includes much the same web sites as you want your
//                  collection to contain.
//
//          </div>
//
//          <p  class="ad-swapper-closer"
//              style="margin:0.6em 0 0 0"
//              ><a
//              href="{$maintain_web_site_collection_members_url}"
//              style="text-decoration:none; font-size:116%; font-weight:bold"
//              >Enable/Disable The Sites In Your Web Site Collections</a></p><div
//                  class="ad-swapper-help"
//                  style="{$help_text_style}; padding-left:2em"
//                  >
//                  Select the <b>sites</b> in each of your (Web Site)
//                  Collections.&nbsp; You can set the collections you create to
//                  be either moderated or un-moderated.&nbsp; If you set a
//                  collection to be <b>moderated</b>, then you decide whether
//                  the other Ad Swapper sites that apply to join the collection
//                  may do so (though sites you've accepted can leave whenever
//                  they want).&nbsp; If you set a collection to be
//                  <b>un-moderated</b>, then other Ad Swapper sites can join
//                  (and leave) the collection whenever they want.
//
//          </div>
//
//          <p  class="ad-swapper-closer"
//              style="margin:0.6em 0 0 0"><a
//                  href="{$select_web_site_collections_url}"
//                  style="text-decoration:none; font-size:116%; font-weight:bold"
//                  >Select the Web Site Collections You Want This Site to Belong To</a></p><div
//                      class="ad-swapper-help"
//                      style="{$help_text_style}; padding-left:2em"
//                      >
//                      This is another way of selecting the sites you want to
//                      advertise, and advertise on.&nbsp; Once you've joined a
//                      collection, you'll automatically advertise - and
//                      advertise on - all the sites in that collection.&nbsp;
//                      (Which is quicker than manually selecting those sites
//                      yourself.)
//
//          </div>
//
//      </div>

    // -------------------------------------------------------------------------

    $dont_use = <<<EOT
&nbsp; <b>DON'T USE THIS OPTION</b> unless you know what you're doing.&nbsp; Use
<b>Synchronise</b> instead.
EOT;

    // -------------------------------------------------------------------------

    $page_content_proper .= <<<EOT

        <h4 style="{$h4_style}">Synchronisation (with Ad Swapper Central)...</h4>

        <div
            style="padding-left:2em"
            >

            <p style="margin:0.6em 0 0 0"><a
                href="{$synchronise_url}"
                style="text-decoration:none; font-size:116%; font-weight:bold"
                >Synchronise</a></p><div
                    class="ad-swapper-help"
                    style="{$help_text_style}; padding-left:2em"
                    >
                    Use this:-

                    <ul style="list-style-type:disc; margin:0 0 0 1.5em">

                        <li style="margin-top:3px; margin-bottom:3px">Whenever
                        you've made <b>changes to your local site</b> - ie;
                        created/deleted ads, or selected new sites to advertise
                        and/or advertise on, etc - and want to <b>push those
                        changes to Ad Swapper Central</b> and the other Ad
                        Swapper sites.&nbsp; Or;</li>

                        <li style="margin-top:3px; margin-bottom:3px">Whenever
                        you want to <b>update your local Ad Swapper
                        plugin</b>.&nbsp; And in particular, it's lists of sites
                        to advertise - and advertise on.&nbsp; And/or the ads
                        available for your site to display.&nbsp; Although you
                        should Synchronise for this reason <b>as much as
                        possible</b>, there's probably not much point in doing
                        it more than <b>once a day</b>.

                        </li>

                    </ul>

                    <u>NOTE!</u>&nbsp; <b>Synchronise</b> does <b>Update Central
                    site</b>, <b>Update Local Site</b> and <b>Reload Ads
                    List</b> - all in one hit.&nbsp; <b>We recommend that you
                    use Synchronise instead of it's individual
                    components</b>.&nbsp; Because it gets your site sorted,
                    <b>without</b> you having to figure out exactly what
                    updating is required, when.

            </div>

            <p style="margin:0.6em 0 0 0"><a
                href="{$update_central_site_url}"
                style="text-decoration:none; font-size:116%; font-weight:bold"
                >Update Central Site</a></p><div
                    class="ad-swapper-help"
                    style="{$help_text_style}; padding-left:2em"
                    >
                    Click this option to copy your site's details and ads to the
                    Ad Swapper Central site (so that other Ad Swapper sites can
                    see/display them).  You should run this menu option every
                    time you change your site settings, ads or ad slots above
                    (as otherwise, other Ad Swapper sites will have no or
                    outdated information about these things).{$dont_use}

            </div>

            <p  class="ad-swapper-closer"
                style="margin:0.6em 0 0 0"
                ><a
                href="{$update_local_site_url}"
                style="text-decoration:none; font-size:116%; font-weight:bold"
                >Update Local Site</a></p><div
                    class="ad-swapper-help"
                    style="{$help_text_style}; padding-left:2em"
                    >
                    Click this option to copy the currently enabled Ad Swapper
                    sites and ads, from Ad Swapper Central, down to this site.
                    This is how your site finds out about the other Ad Swapper
                    sites and ads to display.{$dont_use}

            </div>

            <p  class="ad-swapper-closer"
                style="margin:0.6em 0 0 0"
                ><a
                href="{$reload_ads_list_url}"
                style="text-decoration:none; font-size:116%; font-weight:bold"
                >Reload Ads List</a></p><div
                    class="ad-swapper-help"
                    style="{$help_text_style}; padding-left:2em"
                    >
                    You should never need to run this option.&nbsp; But if Ad
                    Swapper ads aren't displaying correctly (or at all) - on the
                    site's front-end - then running this option may fix
                    things.{$dont_use}

            </div>

        </div>

        <h4 style="{$h4_style}">Help and Support...</h4>

        <div
            style="padding-left:2em"
            >

            <p  style="margin:0.6em 0 0 0"
                ><a
                target="_blank"
                href="http://www.adswapper.com/docs-tutorials/"
                style="text-decoration:none; font-size:116%; font-weight:bold"
                >Docs / Tutorials</a></p><div
                    class="ad-swapper-help"
                    style="{$help_text_style}; padding-left:2em"
                    >
                    Overviews and in-depth documentation as to how Ad Swapper
                    works.

            </div>

            <p  class="ad-swapper-closer"
                style="margin:0.6em 0 0 0"
                ><a
                target="_blank"
                href="http://www.adswapper.com/help-support/"
                style="text-decoration:none; font-size:116%; font-weight:bold"
                >Help / Support</a></p><div
                    class="ad-swapper-help"
                    style="{$help_text_style}; padding-left:2em"
                    >
                    FAQs, Support Tickets and Contact Form, etc.

            </div>

        </div>

        <br />
        <br />

        <div style="clear:both"></div>

    </div>

</div>

<script type="text/javascript"
        src="{$js_dir_url}/scottHamperCookies.js"
        ></script>

<script type="text/javascript">
    // -------------------------------------------------------------------------
    function ad_swapper_toggle_help() {
        if ( document.getElementById( 'ad-swapper-help-state' ).style.display === 'none' ) {
            jQuery( '.ad-swapper-help' ).show() ;
            jQuery( '.ad-swapper-closer' ).css( 'margin-top' , '0.6em' ) ;
            scottHamperCookies.set( 'ad_swapper_local_hide_help' , '0' ) ;
        } else {
            jQuery( '.ad-swapper-help' ).hide() ;
            jQuery( '.ad-swapper-closer' ).css( 'margin-top' , '0' ) ;
            scottHamperCookies.set( 'ad_swapper_local_hide_help' , '1' ) ;
        }
    }
    // -------------------------------------------------------------------------
    if ( scottHamperCookies.get( 'ad_swapper_local_hide_help' ) === '1' ) {
        ad_swapper_toggle_help() ;
    }
    // -------------------------------------------------------------------------
    function toggle_expander( myself , id ) {
        var container_el = document.getElementById( id + '-container' ) ;
        var expander_el = document.getElementById( id ) ;
        if (    window.last_expanded_container_el
                &&
                window.last_expanded_container_el !== container_el
            ) {
            window.last_expanded_container_el.style.padding = '' ;
            window.last_expanded_container_el.style.backgroundColor = '' ;
            window.last_expanded_container_el.style.border = '' ;
            window.last_expanded_expander_el.style.display = 'none' ;
            jQuery( 'div[id$="-summary"]' ).show() ;
        }
        if ( expander_el.style.display === 'none' ) {
            container_el.style.padding = '1em 1.5em 0 1.5em' ;
            container_el.style.backgroundColor = '#F7FFF7' ;
            container_el.style.border = '2px solid #00EE00' ;
            expander_el.style.display = '' ;
            jQuery( 'div[id$="-summary"]' ).hide() ;
            window.last_expanded_container_el = container_el ;
            window.last_expanded_expander_el  = expander_el  ;
        } else {
            container_el.style.padding = '' ;
            container_el.style.backgroundColor = '' ;
            container_el.style.border = '' ;
            expander_el.style.display = 'none' ;
            jQuery( 'div[id$="-summary"]' ).show() ;
            window.last_expanded_container_el = null ;
            window.last_expanded_expander_el  = null ;
        }
    }
    // -------------------------------------------------------------------------
</script>
EOT;

    // =========================================================================
    // Create and return the full page...
    // =========================================================================

    $page_header =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_page_header(
            'Main Menu'                                     ,
            $core_plugapp_dirs['plugins_includes_dir']      ,
            $question_front_end
            ) ;

    // -------------------------------------------------------------------------
    // Here we should have:-
    //      Ad Swapper Local 0.1.104 >> Main Menu
    // -------------------------------------------------------------------------

//echo '<pre>' , htmlentities( $page_header ) , '</pre>' ;

    if (    function_exists( '\\is_adswapper_admanager_site' )
            &&
            \is_adswapper_admanager_site()
        ) {

        $page_header = str_replace(
                            'Ad Swapper Local '             ,
                            'Ad Swapper Ad Manager v'       ,
                            $page_header
                            ) ;

        $page_header = str_replace(
                            'Ad Swapper  Local '            ,
                            'Ad Swapper Ad Manager v'       ,
                            $page_header
                            ) ;

    }

    // -------------------------------------------------------------------------

    return <<<EOT
<span style="font-size:133%">{$page_header}</span>
<div style="width:98%">{$page_content_proper}</div>
EOT;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_target_site_title_and_url()
// =============================================================================

function get_target_site_title_and_url() {

    // -------------------------------------------------------------------------
    // get_current_blog_id()
    // - - - - - - - - - - -
    // Retrieve the current blog id.
    //
    // PARAMETERS
    //      None.
    //
    // RETURN VALUES
    //      (integer) Blog id
    //
    // NOTES
    //      Uses global: (integer) $blog_id The Blog ID.
    //
    // CHANGE LOG
    //      Since: 3.1.0
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // get_blog_details( $fields, $get_all )
    // - - - - - - - - - - - - - - - - - - -
    // Retrieve the details for a blog from the blogs table and blog options.
    //
    //      $fields
    //          (int|string|array) (optional) A blog ID, a blog slug, or an
    //          array of fields to query against. If not specified the current
    //          blog ID is used.
    //          Default: null
    //
    //      $get_all
    //          (boolean) (optional) Whether to retrieve all details or only the
    //          details in the blogs table.
    //          Default: true
    //
    // RETURN VALUE
    //      (WP_Object_Cache object) Blog details
    //
    //      Eg; get_blog_details(1) would return:
    //
    //              [blog_id]      => 1
    //              [site_id]      => 1
    //              [domain]       => foo-multi-site.com
    //              [path]         => /site-path/
    //              [registered]   => 2014-07-31 14:51:09
    //              [last_updated] => 2014-07-31 15:51:56
    //              [public]       => 1
    //              [archived]     => 0
    //              [mature]       => 0
    //              [spam]         => 0
    //              [deleted]      => 0
    //              [lang_id]      => 0
    //              [blogname]     => Site Name
    //              [siteurl]      => http://foo-multi-site.com/this-site
    //              [post_count]   =>
    //
    // NOTES
    //      Uses global $wpdb
    //
    // CHANGELOG
    //      Since: 3.0.0
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // get_blog_option( $blog_id , $setting , $default )
    // - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns data relating to a specific blog.
    //
    //      $blog_id
    //          (integer) (required) ID of blog queried.
    //          Default: None
    //
    //      $setting
    //          (string) (required) Name of setting to fetch.
    //          Default: None
    //
    //      $default
    //          (integer) (optional) Deprecated.
    //          Default: false
    //
    // Any settings in the wp_(blog_id)_options table can be fetched using this
    // function including:
    //
    //      siteurl
    //          Full URL of the blog queried (eg. http://www.example.com/blog).
    //
    //      blogname
    //          Name of the blog queried.
    //
    //      blogdescription
    //          Description of the blog queried.
    //
    //      wp_#_user_roles
    //          Roles available in this blog (where # is the ID of the blog
    //          being queried).
    //
    //      users_can_register
    //          Flag indicating if users can register on the queried blog.
    //
    //      admin_email
    //          Email address of the admin user of the blog queried.
    //
    //      start_of_week
    //          Day of the week set as the week start for the blog queried.
    //
    //      use_balanceTags
    //          Flag indicating if the queried blog uses balanced tags.
    //
    //      use_smilies
    //          Flag indicating if the queried blog converts text smilies to
    //          images.
    //
    //      require_name_email
    //          Flag indicating if the queried blog requires names and emails in
    //          posted comments.
    //
    //      comments_notify
    //          Flag indicating if the queried blog notifies the admin user when
    //          a new comment is posted.
    //
    //      posts_per_rss
    //          Number of posts carried in the queried blog's RSS feed.
    //
    //      rss_excerpt_length
    //          Length of excerpt carried in the queried blog's RSS feed.
    //
    //      rss_use_excerpt
    //          Flag indicating if the queried blog's RSS feed carries a post's
    //          excerpt.
    //
    //      mailserver_url
    //          URL of mail server used when sending email from the queried
    //          blog.
    //
    //      mailserver_login
    //          Username used with the above mail server.
    //
    //      mailserver_pass
    //          Password used with the above username and mail server.
    //
    //      mailserver_port
    //          Port used with the above mail server.
    //
    //      default_category
    //          ID of category in which blog posts are published by default.
    //
    //      default_comment_status
    //          Status comments are set to when posted by default.
    //
    //      default_ping_status
    //          Ping status set by default when new blog posts are published.
    //
    //      default_pingback_flag
    //          Flag indicating the default status of pingbacks when new blog
    //          posts are published.
    //
    //      default_post_edit_rows
    //          Default size of the post edit box.
    //
    //      posts_per_page
    //          Number of posts displayed per page on the bog queried.
    //
    //      what_to_show
    //          [unknown]
    //
    //      date_format
    //          Format in which dates are disaplyed on the blog queried.
    //
    //      time_format
    //          Format in which times are displayed on the blog queried.
    //
    //      links_updated_date_format
    //          [unknown]
    //
    //      links_recently_updated_append
    //          [unknown]
    //
    // RETURN VALUES
    //      (mixed)
    //      The value of the setting requested.
    //
    // NOTES
    //      Pulls the provided information from the wp_#_options table.
    // -------------------------------------------------------------------------

    $blog_id = get_current_blog_id() ;

    // -------------------------------------------------------------------------

    if (    ! is_int( $blog_id )
            ||
            trim( (string) $blog_id ) === ''
            ||
            ! ctype_digit( (string) $blog_id )
            ||
            $blog_id < 1
        ) {

        return array(
                    '???'       ,       //  title
                    ''                  //  url
                    ) ;

    }

    // -------------------------------------------------------------------------

    $setting = 'target_site_title' ;

    $title = get_blog_option(
                    $blog_id    ,
                    $setting
                    ) ;

    if ( ! is_string( $title ) ) {
        $title = '' ;

    } else {
        $title = trim( $title ) ;

    }

    if ( $title === '' ) {
        $title = '???' ;
    }

    // -------------------------------------------------------------------------

    $setting = 'target_site_url' ;

    $url = get_blog_option(
                $blog_id    ,
                $setting
                ) ;

    if ( ! is_string( $url ) ) {
        $url = '' ;

    } else {
        $url = trim( $url ) ;

    }

    // -------------------------------------------------------------------------

    return array(
                $title      ,
                $url
                ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// That's that!
// =============================================================================

