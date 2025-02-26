<?php

// *****************************************************************************
// AD-SWAPPER.APP / AD-SWAPPER-SITE-PROFILE.DD.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperSiteProfile ;
        //  NOTE!
        //  -----
        //  The dataset name/slug should be camel cased.  Eg:-
        //      projects
        //      referenceUrls
        //      globalLogMessages

// =============================================================================
// get_dataset_details()
// =============================================================================

function get_dataset_details(
    $caller_app_slash_plugins_global_namespace      ,
    $question_front_end
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_teasers\get_dataset_details(
    //      $caller_app_slash_plugins_global_namespace      ,
    //      $question_front_end
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns an array holding the specified dataset's details - as required
    // by the dataset manager.
    //
    // The returned array is like (eg):-
    //
    //      $dataset_details = array(
    //          'dataset_slug'              =>  'projects'      ,
    //          'dataset_name_singular'     =>  'project'       ,
    //          'dataset_name_plural'       =>  'projects'      ,
    //          'dataset_title_singular'    =>  'Project'       ,
    //          'dataset_title_plural'      =>  'Projects'      ,
    //          'basepress_dataset_handle'  =>  array(...)
    //          ) ;
    //
    // -------------------------------------------------------------------------

    // =========================================================================
    // Define this dataset's BASEPRESS DATASET HANDLE...
    // =========================================================================

    $basepress_dataset_uid =
        'a6fa80a6-a282-464b-9b4f-f5d9d7164395' . '-' .
        '95e869f5-9de6-4785-b237-76efd35382b4' . '-' .
        '4f117e98-5f7f-4530-a3ce-de7edf72eea6' . '-' .
        '9c244a54-d68d-480d-bbd4-c2494714435a'
        ;

    // -------------------------------------------------------------------------

    $basepress_dataset_handle = array(
        'nice_name'     =>  'adSwapper_byFernTec_siteProfile'   ,
        'unique_key'    =>  $basepress_dataset_uid              ,
        'version'       =>  '0.1'
        ) ;

    // =========================================================================
    // Support...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/site-resources.php' ) ;

    require_once( dirname( __FILE__ ) . '/site-profile-field-groups.php' ) ;

    require_once( dirname( __FILE__ ) . '/site-profile-get-new-field-value-functions.php' ) ;

    // =========================================================================
    // Record Structure...
    // =========================================================================

    $array_storage_record_structure = array(

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'created_server_datetime_utc'       ,
            'array_storage_value_from'  =>  array(
                                                'add'   =>  array(
                                                                'method'    =>  'created-server-datetime-utc'
                                                                )   ,
                                                'edit'  =>  array(
                                                                'method'    =>  'dont-change'
                                                                )
                                                )   ,
            'constraints'               =>  array(
                                                array(
                                                    'method'    =>  'unix-timestamp'
                                                    )
                                                )
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'last_modified_server_datetime_utc'     ,
            'array_storage_value_from'  =>  array(
                                                'add'   =>  array(
                                                                'method'    =>  'last-modified-server-datetime-utc'
                                                                )   ,
                                                'edit'  =>  array(
                                                                'method'    =>  'dont-change'
                                                                )
                                                )   ,
            'constraints'               =>  array(
                                                array(
                                                    'method'    =>  'unix-timestamp'
                                                    )
                                                )
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'key'       ,
            'array_storage_value_from'  =>  array(
                                                'add'   =>  array(
                                                                'method'    =>  'unique-key'
                                                                )   ,
                                                'edit'  =>  array(
                                                                'method'    =>  'dont-change'
                                                                )
                                                )   ,
            'constraints'               =>  array(
                                                array(
                                                    'method'    =>  'unique-key'
                                                    )
                                                )
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'site_title'             ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'site_title'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'home_page_url'             ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'              ,
                                                                    'instance'  =>  'home_page_url'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'general_description'                  ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                  ,
                                                                    'instance'  =>  'general_description'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'ads_wanted_description'            ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                      ,
                                                                    'instance'  =>  'ads_wanted_description'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'sites_wanted_description'            ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                      ,
                                                                    'instance'  =>  'sites_wanted_description'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'categories_available'          ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                  ,
                                                                    'instance'  =>  'categories_available'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'categories_wanted'          ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                  ,
                                                                    'instance'  =>  'categories_wanted'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'geoip_continents_incl'         ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                      ,
                                                                    'instance'  =>  'geoip_continents_incl'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'geoip_continents_excl'         ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                      ,
                                                                    'instance'  =>  'geoip_continents_excl'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'geoip_countries_incl'          ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                      ,
                                                                    'instance'  =>  'geoip_countries_incl'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'geoip_countries_excl'          ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                      ,
                                                                    'instance'  =>  'geoip_countries_excl'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'geoip_regions_incl'        ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                  ,
                                                                    'instance'  =>  'geoip_regions_incl'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'geoip_regions_excl'        ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                  ,
                                                                    'instance'  =>  'geoip_regions_excl'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'geoip_cities_incl'             ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                  ,
                                                                    'instance'  =>  'geoip_cities_incl'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'geoip_cities_excl'             ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                  ,
                                                                    'instance'  =>  'geoip_cities_excl'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'max_ads_per_site_per_page'             ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                          ,
                                                                    'instance'  =>  'max_ads_per_site_per_page'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  1+, 0 = unlimited, default = 1

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'max_repetitions_per_ad_per_page'       ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                              ,
                                                                    'instance'  =>  'max_repetitions_per_ad_per_page'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  1+, 0 = unlimited, default = 1

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'question_auto_approve_new_ads'         ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                              ,
                                                                    'instance'  =>  'question_auto_approve_new_ads'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  default = FALSE (for security reasons)

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'test_method'           ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'test_method'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  "none", "ip", "cookie"

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'test_ip'                       ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'test_ip'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'show_ads_list_reload_buttons'          ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                          ,
                                                                    'instance'  =>  'show_ads_list_reload_buttons'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'question_disable_incoming_ads'         ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                              ,
                                                                    'instance'  =>  'question_disable_incoming_ads'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  Don't show other site's ads on this site.

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'question_disable_outgoing_ads'         ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                              ,
                                                                    'instance'  =>  'question_disable_outgoing_ads'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  Don't show this site's ads on other sites.

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'license_key'           ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'license_key'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'question_manual_update_approval'         ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                              ,
                                                                    'instance'  =>  'question_manual_update_approval'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )

        // ---------------------------------------------------------------------

        ) ;

    // =========================================================================
    // Zebra-Form Form Definition...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_add_edit_form_cancel_href_and_onclick(
    //      $caller_app_slash_plugins_global_namespace      ,
    //      $question_front_end                             ,
    //      $dataset_slug
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          array(
    //              $cancel_href STRING
    //              $onclick STRING
    //              )
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          $error_message STRING
    // -------------------------------------------------------------------------

//  $result = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_add_edit_form_cancel_href_and_onclick(
//                  $caller_app_slash_plugins_global_namespace      ,
//                  $question_front_end                             ,
//                  'teasers'
//                  ) ;
//
//  // -------------------------------------------------------------------------
//
//  if ( is_string( $result ) ) {
//      return $result ;
//  }
//
//  // -------------------------------------------------------------------------
//
//  list(
//      $cancel_href    ,
//      $onclick
//      ) = $result ;

    // -------------------------------------------------------------------------

    $get_cancel_button_onclick_attribute_value_function_name =
        '\\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager' .
        '\\get_cancel_button_onclick_attribute_value'
        ;

    // -------------------------------------------------------------------------

/*
    $help_markdown = <<<EOT
<a target="_blank" href="http://michelf.ca/projects/php-markdown/reference/" style="text-decoration:none"><b>help</b></a>
EOT;

    // -------------------------------------------------------------------------

    $help_bbcode = <<<EOT
<a target="_blank" href="http://nbbc.sourceforge.net/readme.php?page=intro_over" style="text-decoration:none"><b>help</b></a>
EOT;
*/

    // -------------------------------------------------------------------------

//  $focus_field_slug = 'site_owners_ad_swapper_user_id' ;
    $focus_field_slug = 'site_title' ;

//  if (    function_exists( '\\greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginSetup\\is_export_version_short_slug' )
//          &&
//          \greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginSetup\is_export_version_short_slug( 'std' )
//      ) {
//      $focus_field_slug = 'original_url' ;
//  }

    // -------------------------------------------------------------------------

//      $help_text_site_owners_ad_swapper_user_id = <<<EOT
//  The "Ad Swapper User ID" of the Ad Swapper user to whom this Ad Swapper site
//  belongs.&nbsp; Once your registered and logged-in to <a target="_blank" href=""
//  style="text-decoration:none">Ad Swapper Central</a>, you can get your Ad Swapper
//  User ID from the "Maintain Your Ad Swapper User Profile" option.
//  EOT;

    // -------------------------------------------------------------------------

//      $help_text_site_url = <<<EOT
//  The URL of the site's HOME PAGE.
//  EOT;
//
//      $home_url = \home_url() ;
//
//      $help_text_site_url .= <<<EOT
//  &nbsp;&nbsp; Eg;&nbsp;&nbsp; <a
//      target="_blank"
//      href="{$home_url}"
//      style="text-decoration:none; color:#005C80"
//      >{$home_url}</a>
//  EOT;
//
//      $site_url = \site_url() ;
//
//      if ( $site_url !== $home_url ) {
//
//          $help_text_site_url .= <<<EOT
//  &nbsp;&nbsp; <a
//      target="_blank"
//      href="{$site_url}"
//      style="text-decoration:none; color:#005C80"
//      >{$site_url}</a>
//  EOT;
//
//      }

    // -------------------------------------------------------------------------

    $wp_site_title = \get_bloginfo( 'name' ) ;

    $help_text_site_title = <<<EOT
The <b>name/title</b> you want the site to be known by (on the Ad Swapper
network).&nbsp; You'll probably use the site's WordPress Site Title - ie;
<b>{$wp_site_title}</b> - in most cases.&nbsp; But you can call the site
something different if you want to.
EOT;

    // -------------------------------------------------------------------------

    $help_text_home_page_url = <<<EOT
The URL of the site's <b>home page</b>.&nbsp; In other words, the URL that users
should use, to visit the site.&nbsp; Other Ad Swappers might visit this URL - if
they want to check out your site before placing their ads on it, for example (or
accepting your ads on theirs).&nbsp; <i>NOTE!&nbsp; The home page URL specified
here, ISN'T used as the link URL for your ads.&nbsp; You specify that link URL,
when creating/editing your ads (and for each of your ads, separately).</i>
EOT;

    // -------------------------------------------------------------------------

    $help_text_site_description = <<<EOT
A general introduction to / overview of the site (the sort of content it
contains, and the users you're targeting, for example).&nbsp; This description
is intended for other Ad Swappers (both those looking to advertise their site on
yours - and those looking to advertise your site on theirs).
EOT;

    // -------------------------------------------------------------------------

    $help_text_ads_wanted_description = <<<EOT
A description/overview of the ads you do and/or don't want displayed on your
site.&nbsp; This description is for the benefit of Ad Swappers that are looking
to place their ads on your site.
EOT;

    // -------------------------------------------------------------------------

    $help_text_sites_wanted_description = <<<EOT
A description/overview of the sites that you are/aren't looking to display your
ads on.&nbsp; This description is for the benefit of Ad Swappers that are
looking to place your ads on their site.
EOT;

    // -------------------------------------------------------------------------

    $cct_th_style = <<<EOT
padding:4px 8px
EOT;

    // -------------------------------------------------------------------------

    $cct_td_style = <<<EOT
padding:3px 6px
EOT;

    // -------------------------------------------------------------------------

    $help_text_geoip_countries_incl = <<<EOT
<i>Enter the <b>two-letter country code(s)</b> of the <b>country</b> or
<b>countries</b> you want to target this site's ads at.<br />
<div style="padding-left:2em"><a target="_blank"
        href="http://data.okfn.org/data/core/country-list"
        style="text-decoration:none; color:#0066CC"
        >Click here for a list of two letter <b>country codes</b></a> (in
        alphabetical order - opens in new tab/window)</div>
If there's more than one country, enter the codes in a comma-separated list (eg;
<b>AU,NZ</b>).</i>
EOT;

    // -------------------------------------------------------------------------

    $continent_codes_table = <<<EOT
<div style="padding-left:2em"><table border="1" cellpadding="0" cellspacing="0" style="background-color:#F0F8FF">
    <tr>
        <th style="{$cct_th_style}">Continent Code</th>
        <th style="{$cct_th_style}">Continent Name</th>
    </tr>
    <tr>
        <td style="{$cct_td_style}; font-weight:bold">AF</td>
        <td style="{$cct_td_style}; font-style:italic">Africa</td>
    </tr>
    <tr>
        <td style="{$cct_td_style}; font-weight:bold">AN</td>
        <td style="{$cct_td_style}; font-style:italic">Antarctica</td>
    </tr>
    <tr>
        <td style="{$cct_td_style}; font-weight:bold">AS</td>
        <td style="{$cct_td_style}; font-style:italic">Asia</td>
    </tr>
    <tr>
        <td style="{$cct_td_style}; font-weight:bold">EU</td>
        <td style="{$cct_td_style}; font-style:italic">Europe</td>
    </tr>
    <tr>
        <td style="{$cct_td_style}; font-weight:bold">NA</td>
        <td style="{$cct_td_style}; font-style:italic">North America</td>
    </tr>
    <tr>
        <td style="{$cct_td_style}; font-weight:bold">OC</td>
        <td style="{$cct_td_style}; font-style:italic">Oceania</td>
    </tr>
    <tr>
        <td style="{$cct_td_style}; font-weight:bold">SA</td>
        <td style="{$cct_td_style}; font-style:italic">South America</td>
    </tr>
</table></div>
EOT;

    // -------------------------------------------------------------------------

//      $help_text_geoip_continents_incl = <<<EOT
//  <i><b>Generally, you should leave this field empty</b>.&nbsp; Only use it if you
//  want to target this site's ads at one or more <b>continents</b>.&nbsp; But
//  please, only target continents if you really need to (because it's a lot of Ad
//  Swapper advertising resources you're requesting/hogging).&nbsp; So if you can
//  <b>target your ads</b> at something more specific than continents (eg;
//  <b>countries</b>, <b>regions/states</b> or <b>cities</b>), then please do so
//  (and leave this field <b>empty</b>).<br />
//  To target continents, please enter the relevant <b>two-letter continent
//  codes</b> (from the table below), into this field.</i>
//  {$continent_codes_table}
//  <i>If there's more than one continent, enter the codes in a comma-separated list
//  (eg; <b>AF,EU,OC</b>).</i>
//  EOT;

    $help_text_geoip_continents_incl = <<<EOT
<i><b>Generally, you should leave this field empty</b>.&nbsp; Only use it if you
want to target this site's ads at one or more <b>continents</b>.&nbsp; But
please, only target continents if you really need to (because - apart from
Antarctica - it's a lot of Ad Swapper advertising resources you're
requesting/hogging).<br />
<b>Note</b> that continent names can be somewhat misleading.&nbsp;
<b>Europe</b>, for example, includes Russia and much of the former Soviet
Union.&nbsp; While <b>Asia</b>, includes the Middle East (apart from Egypt and
some other North African countries) - and the rest of the former Soviet
Union.&nbsp; So you may need to fine-tune your selection with the help of the
<b>Countries You DON'T Want To Show This Site's Ads In</b> field below.
<div style="padding-left:2em"><a target="_blank"
        href="http://www.fraudlabspro.com/developer/api/continent-country"
        style="text-decoration:none; color:#0055CC"
        >Click here for a list of <b>countries by continent</b></a> (opens in
        new tab/window)</div>
To target continents, please enter the relevant <b>two-letter continent
codes</b> (from the table below), into this field.</i>
{$continent_codes_table}
<i>If there's more than one continent, enter the codes in a comma-separated list
(eg; <b>AF,EU,OC</b>).</i>
EOT;

    // -------------------------------------------------------------------------

//      $help_text_geoip_continents_excl = <<<EOT
//  <i>If you're targeting this site's ads at something more specific than
//  continents (eg; <b>countries</b>, <b>regions/states</b> or <b>cities</b>), then
//  you can either;<ul style="margin:0">
//      <li>Leave this field <b>empty</b>, or;</li>
//      <li>Enter the <b>two-letter continent codes</b> of the continents you
//          <b>DON'T</b> want to target (just to make sure you've definitely gotten
//          rid of them).</li>
//  </ul>
//  For the (two-letter) continent codes, see the table above.<br />If there's more
//  than one continent, enter the codes in a comma-separated list (eg;
//  <b>AF,EU,OC</b>).</i>
//  EOT;

    $help_text_geoip_continents_excl = <<<EOT
EOT;

    // -------------------------------------------------------------------------

    $help_text_geoip_countries_excl = <<<EOT
<i><b>Generally, you should leave this field empty</b>.&nbsp; But if you're
targeting this site's ads at one or more <b>continents</b> (using the field
above), then you can enter the <b>two-letter country codes</b> of any
<b>COUNTRIES</b> you <b>don't</b> want to target, into this field.<br />
<div style="padding-left:2em"><a target="_blank"
        href="http://www.fraudlabspro.com/developer/api/continent-country"
        style="text-decoration:none; color:#0055CC"
        >Click here for a list of two letter <b>country codes by
        continent</b></a> (opens in new tab/window)</div>
If there's more than one country, enter the codes in a comma-separated list (eg;
<b>SW,DE,NO</b>).</i>
EOT;

    // -------------------------------------------------------------------------

/*
    $help_text_geoip_regions_incl = <<<EOT
EOT;

    // -------------------------------------------------------------------------

    $help_text_geoip_regions_excl = <<<EOT
EOT;

    // -------------------------------------------------------------------------

    $help_text_geoip_cities_incl = <<<EOT
EOT;

    // -------------------------------------------------------------------------

    $help_text_geoip_cities_excl = <<<EOT
EOT;
*/

    // -------------------------------------------------------------------------

    if (    array_key_exists( 'REMOTE_ADDR' , $_SERVER )
            &&
            trim( $_SERVER['REMOTE_ADDR'] ) !== ''
        ) {

        $your_ip = trim( $_SERVER['REMOTE_ADDR'] ) ;

        $your_ip = <<<EOT
P.S.&nbsp; Your current IP address is <b>{$your_ip}</b>
EOT;

    } else {

        $your_ip = '' ;

    }

    // -------------------------------------------------------------------------

    $help_text_test_method = <<<EOT
This field allows you to <b>test Ad Swapper ads</b> on your site such that
<b>only you</b> can see them.&nbsp; Ie:-<ul style="margin-top:0">

    <li>With test method <b>None</b>, Ad Swapper ads will appear on your site
    normally (if you have any Ad Slots set up and enabled).</li>

    <li>With test method <b>IP Address</b>, Ad Swapper ads will only appear on
    your site if you visit it from the IP address entered into the <b>Test
    IP</b> field below.<br /><i>{$your_ip}</i></li>

    <li>With test method <b>Cookie</b>, Ad Swapper ads will only appear on your
    site when you visit it with the browser in which you stored the cookie.</li>

</ul>

NOTE!&nbsp; Don't forget that with Test Method at <b>IP Address</b> or
<b>Cookie</b>, <b>Ad Swapper ads won't be displayed</b> on your site (except to
YOU).&nbsp; <b>Test Mode</b> is to help you <b>setup your Ad Slots</b> (it lets
you do this, without your readers seeing anything).&nbsp; But once you're ready
to go, don't forget to switch Test Method back to <b>None</b> (so that your ads
start to display).
EOT;

    // -------------------------------------------------------------------------

    $help_text_test_ip = <<<EOT
If you selected Test Method <b>IP Address</b>, above, then please enter the IP
address of the person you want to view your site's Ad Swapper ads (into this
field).<br /><i>{$your_ip}</i>
EOT;

    // -------------------------------------------------------------------------

    $help_text_ads_list_reload_buttons = <<<EOT
This field allows you to <b>show/hide the "Reload" buttons</b> that appear - on
LOCALHOST only - above each Ad Swapper ad widget's ads.&nbsp; So if your website
ISN'T running on LOCALHOST, then the setting in this field will have NO
effect.&nbsp; <i>And if your website IS running on localhost, then the "Reload"
buttons are a debugging tool - for the Ad Swapper plugin developers.&nbsp; So;
keep them hidden, and forget about them.</i>
EOT;

    // -------------------------------------------------------------------------

    $help_text_question_manual_update_approval = <<<EOT
Every time you run the plugin, it first checks to see if it's database needs
updating.&nbsp; If it does - and this field is <b>unchecked</b> - the database
is <b>automatically updated</b> (without any notice to you; the user).&nbsp; If
the field is <b>checked</b>, you're given the opportunity to manually <b>cancel
or perform</b> the update.&nbsp; But this <b>manual updating is intended for the
use of the plugin developers</b> (when testing and checking the plugin).&nbsp;
<u>And we <b>strongly</b> recommend that you <b>leave this field
unchecked</b>.</u>&nbsp; <i>The plugin WON'T run until the update is
performed.&nbsp; And if you do the update manually, you may stuff things up.</i>
EOT;

    // -------------------------------------------------------------------------

    $help_text_max_ads_per_site_per_page = <<<EOT
By default, Ad Swapper displays max. <b>one ad per site</b> (on each page
displayed).&nbsp; But if your site doesn't have many other sites that it's
advertising - or if you'd like to allow sites to have multiple ads per page -
then you can increase this figure.&nbsp; <i>Can be useful when evaluating Ad
Swapper.&nbsp; To see how the "sidebar" and "grid" type ad slots (that can hold
lots of ads,) will appear (when they're full), for example.</i><br />
(1+, 0 = unlimited, default = 1)
EOT;

    // -------------------------------------------------------------------------

    $help_text_max_repetitions_per_ad_per_page = <<<EOT
By default, Ad Swapper displays each ad max. <b>once per page</b>.&nbsp; But if
you'd like to allow the same ad to be displayed more than once per page, then
set this figure (to two or more).<br />
(1+, 0 = unlimited, default = 1)
EOT;

    // -------------------------------------------------------------------------

    $help_text_question_auto_approve_new_ads = <<<EOT
By default, you must manually <b>approve each new Ad Swapper ad</b> (to be
displayed on your site - before that ad will be displayed).&nbsp; You can
override this default setting here.&nbsp; But while this may make life easier -
it does open the door for <b>unsavoury/unwelcome ads</b> to appear on your site
(though you can still manually disable such ads later, if they do).
EOT;

    // -------------------------------------------------------------------------

    $help_text_question_disable_incoming_ads = <<<EOT
Set this checkbox if you'd like to (temporarily or permanently,) <b>stop showing
Ad Swapper ads</b> (including your own), on this site.
EOT;

    // -------------------------------------------------------------------------

    $help_text_question_disable_outgoing_ads = <<<EOT
Set this checkbox if you'd like to (temporarily or permanently,) <b>stop showing
this site's ads</b> (on other Ad Swapper sites, including this site).
EOT;

    // -------------------------------------------------------------------------

    $help_text_license_key = <<<EOT
Please copy this from the email you got after paying your latest Ad Swapper
subscription fee.&nbsp; If this field is empty (or if your subscription has
expired), Ad Swapper will operate in "Free Test Drive / Trial" mode (in which
the number of sites you can advertise on is limited).
EOT;

    // -------------------------------------------------------------------------

    $highlight = <<<EOT
background-color:#FFFFA0; padding:0 2px
EOT;

    // -------------------------------------------------------------------------

    $zebra_form = array(

        'form_specs'    =>  array(
                                'name'                      =>  'add_edit_ad_swapper_site_profile'  ,
                                'method'                    =>  'POST'                              ,
                                'action'                    =>  ''                                  ,
                                'attributes'                =>  array()                             ,
                                'clientside_validation'     =>  TRUE
                                )   ,

        'field_specs'   =>  array(

/*



*/

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'site_title'                ,
                'zebra_control_type'    =>  'text'                      ,
                'label'                 =>  'Site Title'                ,
                'help_text'             =>  $help_text_site_title       ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array(
                    'required'  =>  array(
                                        'error'             ,   // variable to add the error message to
                                        'Field is required'     // error message if value doesn't validate
                                        )
                    )
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'home_page_url'             ,
                'zebra_control_type'    =>  'text'                      ,
                'label'                 =>  'Home Page URL'             ,
                'help_text'             =>  $help_text_home_page_url    ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array(
                    'required'  =>  array(
                                        'error'             ,   // variable to add the error message to
                                        'Field is required'     // error message if value doesn't validate
                                        )
                    )
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'general_description'           ,
//              'zebra_control_type'    =>  'textarea'                      ,
                'zebra_control_type'    =>  'hidden'                        ,
                'label'                 =>  'General Description'           ,
                'help_text'             =>  $help_text_site_description     ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%; height:200px'
                                                )                           ,
                'rules'                 =>  array(
//                  'required'  =>  array(
//                                      'error'             ,   // variable to add the error message to
//                                      'Field is required'     // error message if value doesn't validate
//                                      )
                    )
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'ads_wanted_description'            ,
//              'zebra_control_type'    =>  'textarea'                          ,
                'zebra_control_type'    =>  'hidden'                            ,
                'label'                 =>  'Ads Wanted Description'            ,
                'help_text'             =>  $help_text_ads_wanted_description   ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%; height:200px'
                                                )                           ,
                'rules'                 =>  array(
//                  'required'  =>  array(
//                                      'error'             ,   // variable to add the error message to
//                                      'Field is required'     // error message if value doesn't validate
//                                      )
                    )
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'sites_wanted_description'              ,
//              'zebra_control_type'    =>  'textarea'                              ,
                'zebra_control_type'    =>  'hidden'                                ,
                'label'                 =>  'Sites Wanted Description'              ,
                'help_text'             =>  $help_text_sites_wanted_description     ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%; height:200px'
                                                )                           ,
                'rules'                 =>  array(
//                  'required'  =>  array(
//                                      'error'             ,   // variable to add the error message to
//                                      'Field is required'     // error message if value doesn't validate
//                                      )
                    )
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'categories_available'      ,
                'zebra_control_type'    =>  'hidden'                    ,
                'label'                 =>  ''                          ,
                'help_text'             =>  ''                          ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'categories_wanted'         ,
                'zebra_control_type'    =>  'hidden'                    ,
                'label'                 =>  ''                          ,
                'help_text'             =>  ''                          ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'geoip_countries_incl'                                                                      ,
                'zebra_control_type'    =>  'text'                                                                                      ,
                'label'                 =>  '<span style="' . $highlight . '">COUNTRIES</span> You Want To Show This Site\'s Ads In'    ,
                'help_text'             =>  $help_text_geoip_countries_incl                                                             ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'geoip_continents_incl'                                                                     ,
                'zebra_control_type'    =>  'text'                                                                                      ,
                'label'                 =>  '<span style="' . $highlight . '">CONTINENTS</span> You Want To Show This Site\'s Ads In'   ,
                'help_text'             =>  $help_text_geoip_continents_incl                                                            ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'geoip_continents_excl'                                                                             ,
//              'zebra_control_type'    =>  'text'                                                                                              ,
                'zebra_control_type'    =>  'hidden'                                                                                            ,
                'label'                 =>  'Continents You <span style="' . $highlight . '">DON\'T</span> Want To Show This Site\'s Ads In'    ,
                'help_text'             =>  $help_text_geoip_continents_excl                                                                    ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'geoip_countries_excl'                                                                              ,
                'zebra_control_type'    =>  'text'                                                                                              ,
                'label'                 =>  'Countries You <span style="' . $highlight . '">DON\'T</span> Want To Show This Site\'s Ads In'     ,
                'help_text'             =>  $help_text_geoip_countries_excl                                                                     ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

/*
            array(
                'form_field_name'       =>  'geoip_regions_incl'                                                                    ,
                'zebra_control_type'    =>  'text'                                                                                  ,
                'label'                 =>  '<span style="' . $highlight . '">REGIONS</span> You Want To Show This Site\'s Ads In'  ,
                'help_text'             =>  $help_text_geoip_regions_incl                                                           ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'geoip_regions_excl'                                                                            ,
                'zebra_control_type'    =>  'text'                                                                                          ,
                'label'                 =>  'Regions You <span style="' . $highlight . '">DON\'T</span> Want To Show This Site\'s Ads In'   ,
                'help_text'             =>  $help_text_geoip_regions_excl                                                                   ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'geoip_cities_incl'                                                                     ,
                'zebra_control_type'    =>  'text'                                                                                  ,
                'label'                 =>  '<span style="' . $highlight . '">CITIES</span> You Want To Show This Site\'s Ads In'   ,
                'help_text'             =>  $help_text_geoip_cities_incl                                                            ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'geoip_cities_excl'                                                                                     ,
                'zebra_control_type'    =>  'text'                                                                                                  ,
                'label'                 =>  'Cities You <span style="' . $highlight . '">DON\'T</span> Want To Show This Site\'s Ads In</span>'     ,
                'help_text'             =>  $help_text_geoip_cities_excl                                                                            ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,
*/

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'geoip_regions_incl'        ,
                'zebra_control_type'    =>  'hidden'                    ,
                'label'                 =>  ''                          ,
                'help_text'             =>  ''                          ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'geoip_regions_excl'        ,
                'zebra_control_type'    =>  'hidden'                    ,
                'label'                 =>  ''                          ,
                'help_text'             =>  ''                          ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'geoip_cities_incl'         ,
                'zebra_control_type'    =>  'hidden'                    ,
                'label'                 =>  ''                          ,
                'help_text'             =>  ''                          ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'geoip_cities_excl'         ,
                'zebra_control_type'    =>  'hidden'                    ,
                'label'                 =>  ''                          ,
                'help_text'             =>  ''                          ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'license_key'                   ,
                'zebra_control_type'    =>  'text'                          ,
                'label'                 =>  'License Key'                   ,
                'help_text'             =>  $help_text_license_key          ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'question_auto_approve_new_ads'             ,
                'zebra_control_type'    =>  'checkbox'                                  ,
                'label'                 =>  'Auto-Approve New Ads&nbsp;?'               ,
                'help_text'             =>  $help_text_question_auto_approve_new_ads    ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'max_ads_per_site_per_page'             ,
                'zebra_control_type'    =>  'text'                                  ,
                'label'                 =>  'Max. Ads Per Site Per Page'            ,
                'help_text'             =>  $help_text_max_ads_per_site_per_page    ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'max_repetitions_per_ad_per_page'               ,
                'zebra_control_type'    =>  'text'                                          ,
                'label'                 =>  'Max. Repetitions Per Ad Per Page'              ,
                'help_text'             =>  $help_text_max_repetitions_per_ad_per_page      ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'question_disable_incoming_ads'             ,
                'zebra_control_type'    =>  'checkbox'                                  ,
                'label'                 =>  'Disable Incoming Ads ?'                    ,
                'help_text'             =>  $help_text_question_disable_incoming_ads    ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'question_disable_outgoing_ads'             ,
                'zebra_control_type'    =>  'checkbox'                                  ,
                'label'                 =>  'Disable Outgoing Ads ?'                    ,
                'help_text'             =>  $help_text_question_disable_outgoing_ads    ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'test_method'               ,
                'zebra_control_type'    =>  'select'                    ,
                'label'                 =>  'Test Method'               ,
                'help_text'             =>  $help_text_test_method      ,
                'form_field_value_from' =>  NULL                        ,
                'attributes'            =>  array()                     ,
                'rules'                 =>  array()                     ,
                'type_specific_args'    =>  array(
                    'options_getter_function'   =>  array(
                        'function_name' =>  '\\' . __NAMESPACE__ . '\\get_test_method_selector_options'    ,
                        'extra_args'    =>  NULL
                        )
                    )
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'test_ip'                   ,
                'zebra_control_type'    =>  'text'                      ,
                'label'                 =>  'Test IP'                   ,
                'help_text'             =>  $help_text_test_ip          ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'question_manual_update_approval'           ,
                'zebra_control_type'    =>  'checkbox'                                  ,
                'label'                 =>  'Manually Approve Database Updates&nbsp;?'  ,
                'help_text'             =>  $help_text_question_manual_update_approval  ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'show_ads_list_reload_buttons'          ,
                'zebra_control_type'    =>  'checkbox'                              ,
                'label'                 =>  'Show Ads List Reload Buttons&nbsp;?'   ,
                'help_text'             =>  $help_text_ads_list_reload_buttons      ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

              // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'save_me'       ,
                'zebra_control_type'    =>  'submit'        ,
                'label'                 =>  NULL            ,
                'attributes'            =>  array()         ,
                'rules'                 =>  array()         ,
                'type_specific_args'    =>  array(
                    'caption'   =>  'Submit'
                    )
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'cancel'                    ,
                'zebra_control_type'    =>  'button'                    ,
                'label'                 =>  NULL                        ,
//              'attributes'            =>  array(
//                                              'onclick'   =>  $onclick
//                                              )   ,
                'dynamic_attributes'    =>  array(
                    'onclick'       =>  array(
                        'function_name'     =>  $get_cancel_button_onclick_attribute_value_function_name    ,
                        'extra_args'        =>  NULL
                        )
                    )   ,
                'rules'                 =>  array()                     ,
                'type_specific_args'    =>  array(
                    'caption'       =>  'Cancel'        ,
                    'type'          =>  'button'
                    )
                )

            // -----------------------------------------------------------------

            )   ,

        'focus_field_slug'  =>  $focus_field_slug       ,

        'custom_add_edit_record_page_header_fn' =>  '\\' . __NAMESPACE__ . '\\get_custom_add_edit_record_page_header'   ,

        'field_groups'      =>  get_site_profile_field_groups()     ,

        'validata_record_structure_slug'    =>  'ad-swapper-local-site-profile-submissions'

        ) ;

    // =========================================================================
    // Dataset Records Table...
    // =========================================================================

    $dataset_records_table_columns = array(

//      array(
//          'base_slug'                     =>  'xxx'
//          'label'                         =>  'Xxx' OR ''/NULL (means use "to_title( <base slug> )"
//          'question_sortable'             =>  TRUE OR FALSE/NULL
//          'raw_value_from'                =>  array(
//                                                  'method'    =>  'array-storage-field-slug'      ,
//                                                  'instance'  =>  "xxx"
//                                                  )   ,
//                                              --OR--
//                                              array(
//                                                  'method'    =>  'special-type'                  ,
//                                                  'instance'  =>  "action"
//                                                  )   ,
//                                              --OR--
//                                              array(
//                                                  'method'    =>  'foreign-field'                 ,
//                                                  'instance'  =>  "<target-field-name>"
//                                                  'args'      =>  array(
//                                                                      array(
//                                                                          'pointer_field_array_storage_slug'  =>  '<pointer_field_slug>'  ,
//                                                                          'foreign_dataset'                   =>  '<dataset_slug>'
//                                                                          )   ,
//                                                                      ...
//                                                                      )
//                                                  )   ,
//
//          'width_in_percent'              =>  1 to 100 (All columns must add up 100%.  Though
//                                              some columns may be left 0/NULL or unspecified -
//                                              in which case the leftover width will be evenly
//                                              distributed amongst these columns.
//          'header_halign'                 =>  'left' | 'center' | 'right'
//          'header_valign'                 =>  'top' | 'middle' | 'bottom'
//          'data_halign'                   =>  'left' | 'center' | 'right'
//          'data_valign'                   =>  'top' | 'middle' | 'bottom'
//
//          'data_field_slug_4_display'     =>  "xxx" (generated automatically; DON'T specify)
//          'data_field_slug_4_sort'        =>  "xxx" (generated automatically; DON'T specify)
//          )   ,

//          'slug'                      =>  'owner_key'             ,
//          'slug'                      =>  'site_url'              ,
//          'slug'                      =>  'site_title'             ,
//          'slug'                      =>  'site_description'                  ,
//          'slug'                      =>  'ads_wanted_description'            ,
//          'slug'                      =>  'sites_wanted_description'            ,
//          'slug'                      =>  'categories_available'          ,
//          'slug'                      =>  'categories_wanted'          ,

//      array(
//          'base_slug'                     =>  'site_owners_ad_swapper_user_id'    ,
//          'label'                         =>  'Owner'                         ,
//          'question_sortable'             =>  TRUE                            ,
//          'raw_value_from'                =>  array(
//                                                  'method'    =>  'array-storage-field-slug'          ,
//                                                  'instance'  =>  'site_owners_ad_swapper_user_id'
//                                                  )   ,
//          'display_treatments'            =>  NULL
//          )   ,

        array(
            'base_slug'                     =>  'site_title'            ,
            'label'                         =>  'Title'                 ,
            'question_sortable'             =>  TRUE                    ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'  ,
                                                    'instance'  =>  'site_title'
                                                    )   ,
            'display_treatments'            =>  NULL
            )   ,

        array(
            'base_slug'                     =>  'home_page_url'         ,
            'label'                         =>  'URL'                   ,
            'question_sortable'             =>  TRUE                    ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'  ,
                                                    'instance'  =>  'home_page_url'
                                                    )   ,
            'display_treatments'            =>  NULL
            )   ,

/*
        array(
            'base_slug'                     =>  'categories_available'      ,
            'label'                         =>  'Categories Available'      ,
            'question_sortable'             =>  FALSE                       ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'  ,
                                                    'instance'  =>  'categories_available'
                                                    )   ,
            'display_treatments'            =>  array(
//              array(
//                  'method'    =>  'wrapper'       ,
//                  'args'      =>  array(
//                                      'before'    =>  '<div style="height:80px; overflow:auto">'      ,
//                                      'after'     =>  '</div>'
//                                      )
//                  )
                )
            )   ,

        array(
            'base_slug'                     =>  'categories_wanted'         ,
            'label'                         =>  'Categories Wanted'         ,
            'question_sortable'             =>  FALSE                       ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'  ,
                                                    'instance'  =>  'categories_wanted'
                                                    )   ,
            'display_treatments'            =>  array(
//              array(
//                  'method'    =>  'wrapper'       ,
//                  'args'      =>  array(
//                                      'before'    =>  '<div style="height:80px; overflow:auto">'      ,
//                                      'after'     =>  '</div>'
//                                      )
//                  )
                )
            )   ,
*/

/*
        array(
            'base_slug'                     =>  'original_media_url'        ,
            'label'                         =>  'Media'                     ,
            'question_sortable'             =>  FALSE                       ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'  ,
                                                    'instance'  =>  'original_media_url'
                                                    )   ,
            'display_treatments'            =>  array(
                array(
                    'method'    =>  'image'         ,
                    'args'      =>  array(
                                        'style'     =>  'height:80px'       ,
                                        )
                                    )
                    )
            )   ,
*/

        array(
            'base_slug'                     =>  'action'            ,
            'label'                         =>  'Action'            ,
            'question_sortable'             =>  FALSE               ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'special-type'      ,
                                                    'instance'  =>  'record-action'
                                                    )   ,
            'display_treatments'            =>  NULL
            )

        ) ;

    // -------------------------------------------------------------------------
    // The Complete "Dataset Records Table" Definition...
    // -------------------------------------------------------------------------

//      'data_field_defs'                       =>  array(...) OR array()/NULL (means default to columns suggested by dataset records)

    $dataset_records_table = array(

//      'column_defs'                           =>  array(...) OR array()/NULL (means default to columns suggested by "data_field_defs")
//      'rows_per_page'                         =>  10                                          ,
//      'default_data_field_slug_to_orderby'    =>  'xxx' || ''/NULL (means orderby FIRST data field)
//      'default_order'                         =>  'asc' OR 'desc' OR ''/NULL (means default to "asc")
//      'actions'                               =>  array(
//                                                      'edit'      =>  'edit'      ,
//                                                      'delete'    =>  'delete'
//                                                      )   ,
//      'action_separator'                      =>  ' &nbsp;&nbsp; '

        'column_defs'                           =>  $dataset_records_table_columns              ,
        'rows_per_page'                         =>  10                                          ,
        'default_data_field_slug_to_orderby'    =>  'site_title'                                ,
        'default_order'                         =>  'asc'                                       ,
        'buttons'                               =>  array(
                                                        array(
                                                            'type'  =>  'add_record'
                                                            )
//                                                      array(
//                                                          'type'                          =>  'custom'                                                            ,
//                                                          'title'                         =>  'Clone/Copy Built-In Layout'                                        ,
//                                                          'get_button_html_function_name' =>  '\\' . __NAMESPACE__ . '\\get_clone_built_in_layout_button_html'    ,
//                                                          'extra_args'                    =>  NULL
//                                                          )   ,
//                                                      array(
//                                                          'type'  =>  'delete_all_records'
//                                                          )   ,
//                                                      array(
//                                                          'type'  =>  'show_orphaned_records'
//                                                          )
                                                        )   ,
        'record_actions'                        =>  array(
                                                        array(
                                                            'type'          =>  'standard'      ,
                                                            'slug'          =>  'edit'          ,
                                                            'link_title'    =>  'edit'
                                                            )   ,
                                                        array(
                                                            'type'          =>  'standard'      ,
                                                            'slug'          =>  'delete'        ,
                                                            'link_title'    =>  'delete'
                                                            )   ,
//                                                      array(
//                                                          'type'          =>  'custom'        ,
//                                                          'slug'          =>  'post-teaser'   ,
//                                                          'link_title'    =>  'post'
//                                                          )
                                                        )   ,
        'action_separator'                      =>  ' &nbsp;&nbsp; '

        ) ;

    // =========================================================================
    // CUSTOM ACTIONS
    // =========================================================================

//  $custom_action_teaser_to_post_filespec =
//      dirname( __FILE__ ) . '/plugin.stuff/scripts/teaser-to-post.php'
//      ;

    // -------------------------------------------------------------------------

    $custom_actions = array(

//      array(
//          'slug'      =>  'post-teaser'                   ,
//          'args'      =>  array(
//                              'include_filespec'              =>  $custom_action_teaser_to_post_filespec                                                  ,
//                              'namespace_and_function_name'   =>  '\\greatKiwi_byFernTec_adSwapper_local_v0x1x211_teaserMaker\\teaser_to_post'
//                              )
//          )

        ) ;

    // =========================================================================
    // Define this dataset's details - as required by the dataset manager...
    // =========================================================================

    $dataset_details = array(
        'dataset_slug'                      =>  'ad_swapper_site_profile'           ,
        'dataset_name_singular'             =>  'ad_swapper_site_profile'           ,
        'dataset_name_plural'               =>  'ad_swapper_site_profile'           ,
        'dataset_title_singular'            =>  'Site Profile'                      ,
        'dataset_title_plural'              =>  'Site Profile'                      ,
        'basepress_dataset_handle'          =>  $basepress_dataset_handle           ,
        'dataset_records_table'             =>  $dataset_records_table              ,
        'zebra_forms'                       =>  array(
                                                    'default'   =>  $zebra_form
                                                    )                               ,
        'array_storage_record_structure'    =>  $array_storage_record_structure     ,
        'array_storage_key_field_slug'      =>  'key'                               ,
        'custom_actions'                    =>  $custom_actions                     ,

//      'parent_details'                    =>  array(
//          'type'                  =>  'single-parent-key-field'   ,
//          'type_specific_args'    =>  array(
//              'parent_dataset_slug'                       =>  'teaser_categories'     ,
//              'parent_dataset_key_field_slug'             =>  'parent_key'
//              )
//          )
//          //  This dataset's records ***may*** optionally have a PARENT.
//          //  o   "parent_dataset_slug" must be a non-empty string.
//          //  o   The array storage record's:-
//          //          ""
//          //      field may contain either:-
//          //          --  The empty string (in which case, this child
//          //              record has NO parent), or;
//          //          --  A "record key" from the parent dataset.
//          //
//          //  The dataset records may have CHILDREN too (see
//          //  "child_dataset_slugs", below).

//      'pre_add_routine'       =>  array(
//                                      'fn'            =>  '\\' . __NAMESPACE__ . '\\check_before_adding_ad_slot_record'   ,
//                                      'extra_args'    =>  array()
//                                      )   ,
//
//      'pre_edit_routine'      =>  array(
//                                      'fn'            =>  '\\' . __NAMESPACE__ . '\\check_before_editing_ad_slot_record'  ,
//                                      'extra_args'    =>  array()
//                                      )   ,
//
//      'pre_delete_routine'    =>  array(
//                                      'fn'            =>  'xxx'               ,
//                                      'extra_args'    =>  array()
//                                      )   ,

        'post_add_routine'      =>  array(
                                        'fn'            =>  '\\' . __NAMESPACE__ . '\\question_post_set_cookie_on_add'     ,
                                        'extra_args'    =>  array()
                                        )   ,

        'post_edit_routine'     =>  array(
                                        'fn'            =>  '\\' . __NAMESPACE__ . '\\question_post_set_cookie_on_edit'     ,
                                        'extra_args'    =>  array()
                                        )   ,

//      'post_delete_routine'   =>  array(
//                                      'fn'            =>  'xxx'               ,
//                                      'extra_args'    =>  array()
//                                      )

        'max_records'                       =>  1               ,
        'question_single_record_mode'       =>  TRUE            ,

        'default_record_functions_namespace_name'   =>  __NAMESPACE__       ,

        'get_new_field_value_functions'     =>  array(

            'question_auto_approve_new_ads'  =>  array(
                'name'  =>  '\\' . __NAMESPACE__ . '\\get_new_field_value_4_question_auto_approve_new_ads'   ,
                'args'  =>  array()
                )   ,

            'show_ads_list_reload_buttons'  =>  array(
                'name'  =>  '\\' . __NAMESPACE__ . '\\get_new_field_value_4_show_ads_list_reload_buttons'   ,
                'args'  =>  array()
                )   ,

            'question_disable_incoming_ads'  =>  array(
                'name'  =>  '\\' . __NAMESPACE__ . '\\get_new_field_value_4_question_disable_incoming_ads'   ,
                'args'  =>  array()
                )   ,

            'question_disable_outgoing_ads'  =>  array(
                'name'  =>  '\\' . __NAMESPACE__ . '\\get_new_field_value_4_question_disable_outgoing_ads'   ,
                'args'  =>  array()
                )   ,

            'license_key'  =>  array(
                'name'  =>  '\\' . __NAMESPACE__ . '\\get_new_field_value_4_license_key'   ,
                'args'  =>  array()
                )   ,

            'question_manual_update_approval'  =>  array(
                'name'  =>  '\\' . __NAMESPACE__ . '\\get_new_field_value_4_question_manual_update_approval'   ,
                'args'  =>  array()
                )   ,

            'max_ads_per_site_per_page'         =>  array(
                'name'  =>  '\\' . __NAMESPACE__ . '\\new_field_value_is_empty_string'   ,
                'args'  =>  array()
                )   ,

            'max_repetitions_per_ad_per_page'   =>  array(
                'name'  =>  '\\' . __NAMESPACE__ . '\\new_field_value_is_empty_string'   ,
                'args'  =>  array()
                )   ,

            'test_method'                       =>  array(
                'name'  =>  '\\' . __NAMESPACE__ . '\\new_field_value_is_empty_string'   ,
                'args'  =>  array()
                )   ,

            'test_ip'                           =>  array(
                'name'  =>  '\\' . __NAMESPACE__ . '\\new_field_value_is_empty_string'   ,
                'args'  =>  array()
                )

            )

        ) ;

    // =========================================================================
    // Return this dataset's details...
    // =========================================================================

    return $dataset_details ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

