<?php

// *****************************************************************************
// AD-SWAPPER.APP / WEB-SITE-COLLECTION-RESOURCES.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperWebSiteCollections ;
        //  NOTE!
        //  -----
        //  The dataset name/slug should be camel cased.  Eg:-
        //      projects
        //      referenceUrls
        //      globalLogMessages

// =============================================================================
// get_default_record_data()
// =============================================================================

function get_default_record_data(
    $core_plugapp_dirs                      ,
    $all_application_dataset_definitions    ,
    $selected_datasets_dmdd                 ,
    $dataset_records                        ,
    $record_indices_by_key                  ,
    $dataset_title                          ,
    $question_base64_encode
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_<datasetCamelName>\
    // get_default_record_data(
    //      $core_plugapp_dirs                      ,
    //      $all_application_dataset_definitions    ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_records                        ,
    //      $record_indices_by_key                  ,
    //      $dataset_title                          ,
    //      $question_base64_encode
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the default new record.  Ie; Return the record data we should use
    // when adding a new record to the database.
    //
    // However, it's NOT necessary that ALL the fields be defined.  For
    // example, fields like:-
    //      o   created_datatime_utc
    //      o   last_modified_datatime_utc
    //      o   key
    //      o   ...or any other field for that matter...
    //
    // can be omitted.  And if they are omitted, they'll be created with the
    // default values specified in the dataset's Zebra Form Field and Array
    // Storage Field definitions (as per normal, when adding a new dataset
    // record).
    //
    // NOTE!
    // =====
    // $question_base64_encode tells this routine whether any base64
    // encoded fields in the returned record should be returned base64
    // encoded or not.
    //
    // RETURNS
    //      o   On SUCCESS
    //              ARRAY(
    //                  'data'              =>  $new_record_data ARRAY
    //                  )
    //              --OR--
    //              ARRAY(
    //                  'data'              =>  $new_record_data ARRAY
    //                  'key_field_slug'    =>  "xxx"
    //                  )
    //
    //      o   On FAILURE
    //              $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__     ;
    $fn = __FUNCTION__      ;
    $ln = (string) __LINE__ ;

    // =========================================================================
    // Create the LOCAL UNIQUE KEY...
    // =========================================================================

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/great-kiwi-passwords.php' ) ;

    // -----------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_passwords\
    // generate_grouped_random_password(
    //		$options = array()
    //		)
    // - - - - - - - - - - - - - - - - -
    // Generates a `grouped` random password like:-
    //		k53t-xc92-v7k3
    //		etc
    //
    // ---
    //
    // Currently, all the ASCII alphanumeric characters are allowed, except:-
    //		0    1    5    6    8
    //		A    B    D    E    I    O    Q    S    U
    //		a    b    e    f    i    j    l    o    q    r    s    t    u
    //
    // These are omitted because they're combinations like:-
    //		0/8/B/D/Q
    //		1/I/l
    //		5/S
    //		etc
    //
    // that can easily be confused with each other.
    //
    // ---
    //
    // The only allowed punctuation characters are:-
    //     	@ # $ % & * + = < > ?
    //
    // These are all string-safe (but NOT regexp safe).
    //
    // ---
    //
    // $options is like (eg):-
    //
    //		$options = array(
    //			'number_groups'		    =>	4		,
    //			'chars_per_group'	    =>	4		,
    //			'group_separator'	    =>	'-'		,
    //			'lowercase_only'	    =>	TRUE    ,
    //          'question_punctuation'  =>  FALSE
    //			)
    //
    // ---
    //
    // NOTE!
    // -----
    // With some combinations, it depends very much on the FONT used (as to
    // how similar two different characters look).  Thus the above rules are
    // a worst-case set.  Stuff is in there if in any common (web) font,
    // the chance of confusion exists.
    //
    // RETURNS the generated password.
    // -----------------------------------------------------------------------

    $options = array(
    	'number_groups'		    =>	4       ,
    	'chars_per_group'	    =>	4       ,
    	'group_separator'	    =>	'-'     ,
    	'lowercase_only'	    =>	TRUE    ,
        'question_punctuation'  =>  FALSE
        ) ;

    // -------------------------------------------------------------------------

    $local_unique_key =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_passwords\generate_grouped_random_password(
      		$options
      		) ;

    // =========================================================================
    // Get the (hopefully already CACHED,) Ad Swapper dataset records...
    // =========================================================================

    require_once( $core_plugapp_dirs['apps_plugin_stuff_dir'] . '/includes/datasets-support.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetSupport\
    // get_ad_swapper_dataset_records(
    //      $core_plugapp_dirs      ,
    //      $question_front_end
    //      )
    // - - - - - - - - - - - - - - -
    // Returns the CACHED Ad Swapper dataset records.
    //
    // RETURNS:-
    //
    //      On FAILURE
    //          $error_message STRING
    //
    //      On SUCCESS
    //          array(
    //              $app_defs_directory_tree                        ,
    //              $applications_dataset_and_view_definitions_etc  ,
    //              $all_application_dataset_definitions            ,
    //              $loaded_datasets
    //              )
    //
    // Where:-
    //
    //      $loaded_datasets = Array(
    //
    //          [ad_swapper_impressions] => Array(
    //              [title]                 => Impressions
    //              [records]               => Array()
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array()
    //              )
    //
    //          [ad_swapper_settings] => Array(
    //              [title]                 => Settings
    //              [records]               => Array(
    //                  [0] => Array(
    //                              [created_server_datetime_utc]       => 1416388978
    //                              [last_modified_server_datetime_utc] => 1416388978
    //                              [key]                               => c885e81e-4af9-40bd-a485-34c9d835d9e5-1416388978-679287-1131
    //                              [api_url_override]                  => http://localhost/plugdev/wp-content/plugins/plugin-plant/app-defs/ad-swapper-central.app/plugin.stuff/api/api-call-handler.php
    //                              )
    //                  )
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array(
    //                  [c885e81e-4af9-40bd-a485-34c9d835d9e5-1416388978-679287-1131] => 0
    //                  )
    //              )
    //
    //          [ad_swapper_site_profile] => Array(
    //              [title]                 => Site Profile
    //              [records]               => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_utc]       => 1416718948
    //                      [last_modified_server_datetime_utc] => 1416718948
    //                      [key]                               => 9475e467-59b6-4f6d-9f32-5413e2b07c4e-1416718948-108185-1163
    //                      [site_owners_ad_swapper_user_id]    => z4v2-mkcx-wh79-yg3n
    //                      [site_url]                          => http://www.example.com
    //                      [site_title]                        => The Site
    //                      [site_description]                  =>
    //                      [ads_wanted_description]            =>
    //                      [sites_wanted_description]          =>
    //                      [categories_available]              =>
    //                      [categories_wanted]                 =>
    //                      )
    //                  )
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array(
    //                  [9475e467-59b6-4f6d-9f32-5413e2b07c4e-1416718948-108185-1163] => 0
    //                  )
    //              )
    //
    //          )
    //
    // -------------------------------------------------------------------------

    $question_front_end = FALSE ;

    // -------------------------------------------------------------------------

    $result =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetSupport\get_ad_swapper_dataset_records(
            $core_plugapp_dirs      ,
            $question_front_end
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return $result ;
    }

    // -------------------------------------------------------------------------

    list(
        $app_defs_directory_tree                        ,
        $applications_dataset_and_view_definitions_etc  ,
        $all_application_dataset_definitions            ,
        $loaded_datasets
        ) = $result ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $loaded_datasets = Array(
    //
    //          ...
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
    //                      [site_registration_key]             => 675ed35f6c1086b007e860c7de3648dbf7eb21034203123366b7867258633ba4fa901b275acc6dfccfae6d9adffcfc1d9da3251353ea2525090873a9c7e1771b188e7dd3b646d769b221ab977a5ee70fb61edb287ee0cdb698830188c2c7c1d9800524315d783b3fb4e2178128cedf5c0ab0cffb8f3377bd9d788f39be64f8db6d86bb74eaddda15492f1717035fd30e863502512b1131e515be22082a6a8a3b9467e35b73ff2c1211c52a5e599c7447dd6f76a0dd119609acace18967feac7569e00d52259fbfaff42f51696d27e8d41a151df18d1c30e0714ca926ac964ec4d608ad52e15f2d6fc9de458af0accef62ea07e6c541222921a6e78303b9b3f7c4bff324f20a683b8ee606869c0a4f4904c26a696a6a81a27600b9969147b5ec5687a4649e5c13a0f0791aac324b625d8420b6b74e990274d18e43b6809efc957a26516b25bda5795f64bcceaa3e42a81f89ed36293a1a112bb546e3f4c3a9fa1518c22026b2654bfc7bf609e666084d85581a077cc50949aa3f8bd28039b15e3517eb0e585a0807d71ccc759cfae062143a18e10b79ee7d42a9750987187641aec51a107c8a9caf33bd1f5a671c3dc69657d79e7a8f2cb14490df964be6dd97ebf188e5cd3b211a19c835361ec7ac7464c997da492beff727dc384aa771775adb043859053570afacc01c33d8ca7add24770d626f82571da40abe0b381a7e74a563d2632244c4657766e594d34344b6d2377264d3e4843247947565643466b3e583d2a4c3d786b323f40263c3e323e5924433248577a3e40773f2b596368563766366637313831322d353538312d346161382d386636652d313466313635636163303938313432313838373832362d333834323937a1c865a883d5b60159b656c6af361aedd92c4cf158a8df26715216119c0da63960fac881c5903f16b7784d06ceeedc23e8a238f77929668ee345997a78fe029d
    //                      [api_public_encryption_key]         =>
    //                      [api_mcryption_key]                 => bc502c56b402afa44aa6d967f5da1b22414157e7862ce9527d09fabb9749691a
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
    //          [ad_swapper_web_site_collections] => Array(
    //              [title]                 => Web Site Collections
    //              [records]               => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_utc]       => 1423902726
    //                      [last_modified_server_datetime_utc] => 1423902726
    //                      [key]                               => eedce7d6-7633-4e66-9bf2-70ad720250e2-1423902726-255309-1571
    //                      [name_slash_title]                  => Dog Lovers
    //                      [description]                       => Targeted at users who are dog lovers.  So the SITES wanted in this collection are those who have news or posts intended for dog lovers.  Intended of course, for the the benefit of ADVERTISERS who want to sell products/services to dog lovers/owners.
    //                      [collection_home_page_url]          =>
    //                      [question_moderated]                =>
    //                      [question_disabled]                 =>
    //                      )
    //                  )
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array(
    //                  [eedce7d6-7633-4e66-9bf2-70ad720250e2-1423902726-255309-1571] => 0
    //                  )
    //              )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $loaded_datasets , '$loaded_datasets' ) ;

    // =========================================================================
    // Get the SITE UNIQUE KEY...
    // =========================================================================

    $site_unique_key = '' ;

    // -------------------------------------------------------------------------

    if (    array_key_exists( 'ad_swapper_plugin_settings' , $loaded_datasets )
            &&
            is_array( $loaded_datasets['ad_swapper_plugin_settings'] )
            &&
            array_key_exists( 'records' , $loaded_datasets['ad_swapper_plugin_settings'] )
            &&
            is_array( $loaded_datasets['ad_swapper_plugin_settings']['records'] )
            &&
            array_key_exists( 0 , $loaded_datasets['ad_swapper_plugin_settings']['records'] )
            &&
            is_array( $loaded_datasets['ad_swapper_plugin_settings']['records'][0] )
            &&
            array_key_exists( 'site_unique_key' , $loaded_datasets['ad_swapper_plugin_settings']['records'][0] )
            &&
            is_string( $loaded_datasets['ad_swapper_plugin_settings']['records'][0]['site_unique_key'] )
            &&
            trim( $loaded_datasets['ad_swapper_plugin_settings']['records'][0]['site_unique_key'] ) !== ''
        ) {

        $site_unique_key =
            $loaded_datasets['ad_swapper_plugin_settings']['records'][0]['site_unique_key']
            ;

    } elseif (  array_key_exists( 'ad_swapper_site_profile' , $loaded_datasets )
                &&
                is_array( $loaded_datasets['ad_swapper_site_profile'] )
                &&
                array_key_exists( 'records' , $loaded_datasets['ad_swapper_site_profile'] )
                &&
                is_array( $loaded_datasets['ad_swapper_site_profile']['records'] )
                &&
                array_key_exists( 0 , $loaded_datasets['ad_swapper_site_profile']['records'] )
                &&
                is_array( $loaded_datasets['ad_swapper_site_profile']['records'][0] )
                &&
                array_key_exists( 'site_unique_key' , $loaded_datasets['ad_swapper_site_profile']['records'][0] )
                &&
                is_string( $loaded_datasets['ad_swapper_site_profile']['records'][0]['site_unique_key'] )
                &&
                trim( $loaded_datasets['ad_swapper_site_profile']['records'][0]['site_unique_key'] ) !== ''
        ) {

        $site_unique_key =
            $loaded_datasets['ad_swapper_site_profile']['records'][0]['site_unique_key']
            ;

    } else {

        return <<<EOT
PROBLEM:&nbsp; Can't find "site_unique_key"
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // =========================================================================
    // Create the GLOBAL UNIQUE KEY...
    // =========================================================================

    $global_unique_key = $site_unique_key . '-' . $local_unique_key ;

    // =========================================================================
    // Create/return the default record data...
    // =========================================================================

    $default_record_data =
        array(
            'local_unique_key'  =>  $local_unique_key       ,
            'global_unique_key' =>  $global_unique_key
            ) ;

    // -------------------------------------------------------------------------

    return array(
                'data'  =>  $default_record_data
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

