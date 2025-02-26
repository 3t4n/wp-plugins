<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN-SETTINGS-RESOURCES.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperPluginSettings ;
        //  NOTE!
        //  -----
        //  The dataset name/slug should be camel cased.  Eg:-
        //      projects
        //      referenceUrls
        //      globalLogMessages

// =============================================================================
// get_custom_add_edit_record_page_header()
// =============================================================================

function get_custom_add_edit_record_page_header(
    $core_plugapp_dirs                      ,
    $all_application_dataset_definitions    ,
    $selected_datasets_dmdd                 ,
    $dataset_slug                           ,
    $dataset_title                          ,
    $dataset_records                        ,
    $key_field_slug                         ,
    $record_indices_by_key                  ,
    $question_front_end                     ,
    $question_adding                        ,
    $form_slug_underscored                  ,
    $zebra_form_def
    ) {

    // -------------------------------------------------------------------------
    // <dataset_specific_get_custom_add_edit_record_page_header>(
    //      $core_plugapp_dirs                      ,
    //      $all_application_dataset_definitions    ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_slug                           ,
    //      $dataset_title                          ,
    //      $dataset_records                        ,
    //      $key_field_slug                         ,
    //      $record_indices_by_key                  ,
    //      $question_front_end                     ,
    //      $question_adding                        ,
    //      $form_slug_underscored                  ,
    //      $zebra_form_def
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the HTML for a custom header to go at the top of the
    // add/edit record page.
    //
    // RETURNS
    //      On SUCCESS
    //          $header_html STRING
    //
    //      On FAILURE
    //          array( $error_message STRING )
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $_GET = Array(
    //                  [page]          => pluginPlant
    //                  [action]        => edit-record
    //                  [application]   => ad-swapper-central
    //                  [dataset_slug]  => ad_swapper_central_sites
    //                  [record_key]    => 504bb6b0-71c7-4515-a8dd-3f7c824a1030-1417766397-355167-1274
    //                  )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_GET , '$_GET' ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_POST , '$_POST' ) ;

    // =========================================================================
    // Init.
    // =========================================================================

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // The following stuff should be the same as in the:-
    //      "plugin-settings-field-groups.php"
    //
    // file...
    // -------------------------------------------------------------------------

    $list_number_font_size = '200%' ;

    $header_font_size = '150%' ;

    $text_font_size = '117%' ;

    // -------------------------------------------------------------------------

    $field_group_heading_style = <<<EOT
margin-top:1em; padding:0.5em 1em; background-color:#000000; color:#FFFFFF
EOT;

    // -------------------------------------------------------------------------

    $list_number_style = <<<EOT
font-size:{$list_number_font_size}; font-weight:bold
EOT;

    // -------------------------------------------------------------------------

    $field_group_title_style = <<<EOT
font-size:{$header_font_size}; font-weight:bold
EOT;

    // -------------------------------------------------------------------------

    $field_group_text_style = <<<EOT
margin-top:0.1em; font-size:{$text_font_size}; font-style:italic
EOT;

    // -------------------------------------------------------------------------

    $border_radius = '10px' ;

    // -------------------------------------------------------------------------

    if ( $question_adding ) {
        $add_edit = 'Add' ;

    } else {
        $add_edit = 'Edit' ;

    }

    // -------------------------------------------------------------------------

    $maintain_plugin_settings_help_screen_title =
        get_help_screen_title(
            'Maintain Plugin Settings'
            ) ;

    // -------------------------------------------------------------------------

    $add_edit_site_registration_screen_title =
        get_help_screen_title(
            $add_edit . ' Site Registration'
            ) ;

    // -------------------------------------------------------------------------

    $add_edit_site_registration_screen_title_mini =
        get_help_screen_title_mini(
            $add_edit . ' Site Registration'
            ) ;

    // -------------------------------------------------------------------------

    $maintain_plugin_settings_screen_title_mini =
        get_help_screen_title_mini(
            'Maintain Plugin Settings'
            ) ;

    // =========================================================================
    // Get the various WP sourced stuff...
    // =========================================================================

    $wp_site_title = \get_bloginfo( 'site_title' ) ;

    $wp_tagline    = \get_bloginfo( 'description' ) ;

    $wp_home_url   = \home_url() ;

    $wp_site_url   = \site_url() ;

    // =========================================================================
    // Steps 1 and 2...
    // =========================================================================

    // -------------------------------------------------------------------------
    // Step 1
    // -------------------------------------------------------------------------

    $step_1 = <<<EOT
<p style="font-style:italic; margin-bottom:0.6em">Although you're only
copy/pasting a few fields from one form to another (and then saving both
forms)...</p>

    <div style="padding-left:2em"><span
        style="padding:4px 12px; background-color:#47112A; -moz-border-radius:{$border_radius}; -webkit-border-radius:{$border_radius}; -khtml-border-radius:{$border_radius}; border-radius:{$border_radius}"
        >...please do this <u>CAREFULLY</u> - by following the instructions below...</span></div>

<div style="{$field_group_heading_style}; margin-top:1.5em">

    <table  border="0"
            cellpadding="0
            cellspacing="0"
            ><tr>

        <td valign="top" style="{$list_number_style}; vertical-align:top">1.</td>

        <td style="padding-left:1em">

            <div style="{$field_group_title_style}; line-height:120%">
                Open your Ad Swapper Central Account's
                    <div style="padding-left:1.5em; font-size:66%; margin:1em 0 0.5em 0">{$add_edit_site_registration_screen_title}</div>
                 Screen - In Another Tab/Window
            </div>

            <div style="{$field_group_text_style}; padding-top:1em">

                If your Ad Swapper Central account's
                {$add_edit_site_registration_screen_title_mini} screen <span
                style="color:#FFFF80">ISN'T already open</span> (in another
                tab/window), then please:-

                <ol style="margin-left:2.8em; margin-top:0.4em; list-style-type:decimal">

                    <li><a  target="_blank"
                            href="http://www.adswapper.net/wp-admin/"
                            style="color:#FFFF80; text-decoration:none"
                            >Click here to open the Ad Swapper Central login
                                screen</a> (in a new tab/window).</li>

                </ol>

                Then, in that new tab/window:-

                <ol start="2"
                    style="margin-left:2.8em; margin-top:0.4em; list-style-type:decimal"
                    >

                    <li>If you've <span style="color:#FFFF80">HAVEN'T yet
                        registered</span> an account with Ad Swapper Central,
                        then <span style="color:#FFFF80">register</span> one
                        now.&nbsp; And wait for your <span
                        style="color:#FFFF80">confirmation email</span> (which
                        will contain the login details needed in the next
                        step).</li>

                    <li><span style="color:#FFFF80">Login</span> to your Ad Swapper
                        Central account dashboard.</li>

                    <li>Start the <span style="color:#FFFF80">"Ad Swapper
                        Central A/C Mgr"</span> plugin (by clicking <span
                        style="color:#FFFF80">"Ad Swapper Central A/C Mgr
                        v#.#.#"</span> on the dashboard left menu).</li>

                    <li>Click the <span style="color:#FFFF80">"Add/Edit/Delete
                        (This Account's) Sites"</span> option (from the Ad
                        Swapper Central plugin's Main Menu).</li>

                    <li>If you're <span style="color:#FFFF80">adding a new
                        site</span>, then click the <span
                        style="color:#FFFF80">"Add Site Registration"</span>
                        option (from the top left of the "Manage Site
                        Registrations" screen).<br />

                        <div style="height:1px; background-color:#808080; margin:0.4em 0.5em 0.2em 0.5em"></div>

                        If you're <span style="color:#FFFF80">editing an
                        existing site</span>, then click the <span
                        style="color:#FFFF80">"edit"</span> link - in the Action
                        column of the site you want to edit.</li>

                </ol>

            </div>

        </td>

    </tr></table>

</div>
EOT;

    // -------------------------------------------------------------------------
    // Step 2
    // -------------------------------------------------------------------------

    $step_2 = <<<EOT
<div style="{$field_group_heading_style}; margin-top:1.5em">

    <table  border="0"
            cellpadding="0
            cellspacing="0"
            ><tr>

        <td valign="top" style="{$list_number_style}; vertical-align:top">2.</td>

        <td style="padding-left:1em">

            <div style="{$field_group_title_style}; line-height:120%">
                Are You Ready ?
            </div>

            <div style="{$field_group_text_style}; padding-top:1em">

                You should now have:-<ul style="margin-top:0.33em;
                margin-left:2.5em; list-style-type:disc">

                    <li style="line-height:140%">the
                        {$maintain_plugin_settings_screen_title_mini} screen -
                        of the Ad Swapper plugin on the site you want to
                        register - open in <span style="color:#FFFF80">THIS
                        TAB/WINDOW</span>, and;</li>

                    <li style="line-height:140%">the Ad Swapper Central site's
                        {$add_edit_site_registration_screen_title_mini} screen -
                        open in a <span style="color:#FFFF80">SECOND
                        TAB/WINDOW</span>.</li>

                </ul>

                Once those TWO tabs/windows are open, please continue with Steps
                3 to 7 below...

            </div>

        </td>

    </tr></table>

</div>
EOT;

    // =========================================================================
    // Create and return the page header...
    // =========================================================================

    $main_text = <<<EOT
{$maintain_plugin_settings_help_screen_title}

<p style="font-style:italic">Every time you install the Ad Swapper plugin to one
of your WordPress sites, you must create a Plugin Setting record (here within
your Ad Swapper plugin) - along with a matching Site Registration record at Ad
Swapper Central.&nbsp; These are needed for the plugin and Ad Swapper Central to
talk to each other.</p>
EOT;

    // -------------------------------------------------------------------------

    return <<<EOT
<div style="background-color:#8B2252; color:#FFFFFF; padding:1.5em 1em 1em 1em; margin-bottom:1em; width:95%">
    <div style="max-width:720px">
{$main_text}
{$step_1}
{$step_2}
    </div>
</div>
EOT;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_help_screen_title()
// =============================================================================

function get_help_screen_title(
    $title
    ) {

    // -------------------------------------------------------------------------

    $border_radius = '20px' ;

    // -------------------------------------------------------------------------

    return <<<EOT
<div><span
    style="padding:0 12px 2px 12px; font-size:167%; font-weight:bold; background-color:#FFFFFF; color:#0073AA; -moz-border-radius:{$border_radius}; -webkit-border-radius:{$border_radius}; -khtml-border-radius:{$border_radius}; border-radius:{$border_radius}"
    >{$title}</span></div>
EOT;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_help_screen_title_mini()
// =============================================================================

function get_help_screen_title_mini(
    $title
    ) {

    // -------------------------------------------------------------------------

    $border_radius = '10px' ;

    // -------------------------------------------------------------------------

    return <<<EOT
<span
    style="padding:0 6px 1px 6px; font-size:90%; font-weight:bold; font-style:normal; background-color:#FFFFFF; color:#0073AA; -moz-border-radius:{$border_radius}; -webkit-border-radius:{$border_radius}; -khtml-border-radius:{$border_radius}; border-radius:{$border_radius}"
    >{$title}</span>
EOT;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_wp_home_url()
// =============================================================================

function get_wp_home_url(
    $home_page_title                        ,
    $caller_apps_includes_dir               ,
    $all_application_dataset_definitions    ,
    $dataset_slug                           ,
    $selected_datasets_dmdd                 ,
    $dataset_title                          ,
    $dataset_records                        ,
    $record_indices_by_key                  ,
    $question_adding                        ,
    $zebra_form_field_number                ,
    $zebra_form_field_details               ,
    $the_record                             ,
    $the_records_index                      ,
    $array_storage_field_slugs              ,
    $extra_args
    ) {

    // -------------------------------------------------------------------------
    // <get_field_value_function>(
    //      $home_page_title                        ,
    //      $caller_apps_includes_dir               ,
    //      $all_application_dataset_definitions    ,
    //      $dataset_slug                           ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_title                          ,
    //      $dataset_records                        ,
    //      $record_indices_by_key                  ,
    //      $question_adding                        ,
    //      $zebra_form_field_number                ,
    //      $zebra_form_field_details               ,
    //      $the_record                             ,
    //      $the_records_index                      ,
    //      $array_storage_field_slugs              ,
    //      $extra_args
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the specified field's value (for display in a Zebra Forms
    // based "add/edit record" form).
    //
    // NOTE!
    // -----
    // $the_record and $the_records_index are both NULL when
    // $question_adding is TRUE
    //
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          array(
    //              $ok = TRUE                      ,
    //              $field_value <any PHP type>
    //              )
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          array(
    //              $ok = FALSE             ,
    //              $error_message STRING
    //              )
    // -------------------------------------------------------------------------

    return array(
                TRUE            ,
                \home_url()
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_wp_site_url()
// =============================================================================

function get_wp_site_url(
    $home_page_title                        ,
    $caller_apps_includes_dir               ,
    $all_application_dataset_definitions    ,
    $dataset_slug                           ,
    $selected_datasets_dmdd                 ,
    $dataset_title                          ,
    $dataset_records                        ,
    $record_indices_by_key                  ,
    $question_adding                        ,
    $zebra_form_field_number                ,
    $zebra_form_field_details               ,
    $the_record                             ,
    $the_records_index                      ,
    $array_storage_field_slugs              ,
    $extra_args
    ) {

    // -------------------------------------------------------------------------
    // <get_field_value_function>(
    //      $home_page_title                        ,
    //      $caller_apps_includes_dir               ,
    //      $all_application_dataset_definitions    ,
    //      $dataset_slug                           ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_title                          ,
    //      $dataset_records                        ,
    //      $record_indices_by_key                  ,
    //      $question_adding                        ,
    //      $zebra_form_field_number                ,
    //      $zebra_form_field_details               ,
    //      $the_record                             ,
    //      $the_records_index                      ,
    //      $array_storage_field_slugs              ,
    //      $extra_args
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the specified field's value (for display in a Zebra Forms
    // based "add/edit record" form).
    //
    // NOTE!
    // -----
    // $the_record and $the_records_index are both NULL when
    // $question_adding is TRUE
    //
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          array(
    //              $ok = TRUE                      ,
    //              $field_value <any PHP type>
    //              )
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          array(
    //              $ok = FALSE             ,
    //              $error_message STRING
    //              )
    // -------------------------------------------------------------------------

    return array(
                TRUE            ,
                \site_url()
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

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

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginSettingsRecordSupport\
    // generate_site_registration_key(
    //      $core_plugapp_dirs
    //      )
    // - - - - - - - - - - - - - - - - -
    // Generates and returns a "Site Registration Key"...
    //
    // RETURNS
    //      $site_registration_key STRING
    // -------------------------------------------------------------------------

    $site_registration_key =
        generate_site_registration_key(
            $core_plugapp_dirs
            ) ;

    // -------------------------------------------------------------------------

    $default_record_data =
        array(
            'site_registration_key'   =>  $site_registration_key
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
// generate_site_registration_key()
// =============================================================================

function generate_site_registration_key(
    $core_plugapp_dirs
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginSettingsRecordSupport\
    // generate_site_registration_key(
    //      $core_plugapp_dirs
    //      )
    // - - - - - - - - - - - - - - - - -
    // Generates and returns a (hex-encoded) "Site Registration Key"...
    //
    // RETURNS
    //      $site_registration_key STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // Create the:-
    //      site registration key
    // =========================================================================

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // We stitch together some random numbers from a variety of sources - on
    // the assumption that another plugin generating the exact some key is
    // very unlikely.
    // -------------------------------------------------------------------------

    $site_registration_key = '' ;

    // =========================================================================
    // openssl_random_pseudo_bytes() Part...
    // =========================================================================

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/random.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_random\
    // secure_rand(
    //      $length
    //      )
    // - - - - - -
    // According to it's author, this routine generates a really strong
    // random number (in PHP).
    //
    // See:-
    //      http://www.zimuel.it/strong-cryptography-in-php/
    //
    // NOTES!
    // ======
    // 1.   $length is in bytes.
    //
    // 2.   By default, this function calls PHPs:-
    //          openssl_random_pseudo_bytes()
    //      function (which is supposedly the best way to generate random
    //      numbers in PHP).
    // -------------------------------------------------------------------------

    $length = 512 ;    //  bytes

    // -------------------------------------------------------------------------

    $site_registration_key .=
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_random\secure_rand(
            $length
            ) ;

    // =========================================================================
    // Great Kiwi Password Part...
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
    	'number_groups'		    =>	1		,
    	'chars_per_group'	    =>	64	    ,
    	'group_separator'	    =>	''		,
    	'lowercase_only'	    =>	FALSE   ,
        'question_punctuation'  =>  TRUE
        ) ;

    // -------------------------------------------------------------------------

    $site_registration_key .=
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_passwords\generate_grouped_random_password(
      		$options
      		) ;

    // =========================================================================
    // GUID Part...
    // =========================================================================

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // MSDN defines GUID as "a 128-bit integer (16 bytes) that can be used
    // across all computers and networks wherever a unique identifier is
    // required. Such an identifier has a very low probability of being
    // duplicated."
    //
    // GUID consists of alphanumeric characters only and is grouped in five
    // groups separated by hyphens as seen in this example:
    //      3f2504e0-4f89-11d3-9a0c-0305e82c3301
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // From:-
    //      http://www.php.net/manual/en/function.com-create-guid.php
    // -------------------------------------------------------------------------

    if ( function_exists( '\com_create_guid' ) === TRUE ) {
        $guid_part = strtolower( trim( com_create_guid() , '{}' ) ) ;

    } else {
        $guid_part = strtolower( sprintf(
                        '%04X%04X-%04X-%04X-%04X-%04X%04X%04X'  ,
                        mt_rand(     0 , 65535 )                ,
                        mt_rand(     0 , 65535 )                ,
                        mt_rand(     0 , 65535 )                ,
                        mt_rand( 16384 , 20479 )                ,
                        mt_rand( 32768 , 49151 )                ,
                        mt_rand(     0 , 65535 )                ,
                        mt_rand(     0 , 65535 )                ,
                        mt_rand(     0 , 65535 )
                        ) ) ;

    }

    // -------------------------------------------------------------------------

    $site_registration_key .= $guid_part ;

    // =========================================================================
    // MicroTime Part...
    // =========================================================================

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // By adding in the micro-time we guarantee a reasonable degree of
    // uniqueness.  Since microtime() is accurate to 1us (= 1 millionth of
    // a second).
    //
    // But it is (at least theoretically,) possible for this function:-
    //      get_unique_record_key()
    //
    // to be called more than once in a given 1us period (particularly on
    // very fast machines)
    //
    // ---
    //
    // Note that on a standard 2012 era desktop, the following code:-
    //
    //      while ( TRUE ) {
    //          $gtod = gettimeofday() ;
    //          echo '<br />' , $gtod['sec'] , ' &nbsp;&mdash;&nbsp; ' , $gtod['usec'];
    //      }
    //
    // generates (eg):=-
    //
    //      1400040711  --  999977
    //      1400040711  --  999981
    //      1400040711  --  999985
    //      1400040711  --  999988
    //      1400040711  --  999999
    //      1400040712  --  2
    //      1400040712  --  6
    //      1400040712  --  10
    //      1400040712  --  13
    //      1400040712  --  17
    //      1400040712  --  20
    //      ...         --
    //      1400040712  --  91
    //      1400040712  --  95
    //      1400040712  --  98
    //      1400040712  --  102
    //      1400040712  --  106
    //      ...         --
    //      1400040712  --  982
    //      1400040712  --  986
    //      1400040712  --  989
    //      1400040712  --  993
    //      1400040712  --  996
    //      1400040712  --  1000
    //      1400040712  --  1004
    //      1400040712  --  1007
    //      ...
    //
    // So in general (on standard desktops), two sequential calls to:-
    //      gettimeofday()
    //
    // will generate different micro-second time values.
    //
    // But to guarantee that two sequential calls to:-
    //      get_unique_record_key()
    //
    // generate two different micro-second precision time values. we:-
    //
    //      o   Call "gettimeofday()" once, to get an initial value.
    //
    //      o   Then call "gettimeofday()" repetitively, until we get a
    //          different value.
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // mixed gettimeofday ([ bool $return_float = false ] )
    // - - - - - - - - - - - - - - - - - - - - - - - - - -
    // This is an interface to gettimeofday(2). It returns an associative array
    // containing the data returned from the system call.
    //
    //      return_float
    //          When set to TRUE, a float instead of an array is returned.
    //
    // By default an array is returned. If return_float is set, then a float is
    // returned.
    //
    //      Array keys:
    //
    //      "sec"           - seconds since the Unix Epoch
    //      "usec"          - microseconds
    //      "minuteswest"   - minutes west of Greenwich
    //      "dsttime"       - type of dst correction
    //
    // (PHP 4, PHP 5)
    //
    // CHANGELOG
    //      Version     Description
    //      5.1.0       The return_float parameter was added.
    //
    // NOTE!
    // =====
    // The "microtime()" function has a note that says:-
    //      "This function is only available on operating systems that support
    //      the gettimeofday() system call."
    //
    // Does this note apply to the "gettimeofday()" function too ?
    // -------------------------------------------------------------------------

    if ( \function_exists( '\gettimeofday' ) ) {

        // ----------------------------------------------------------------------
        // Use the "gettimeofday()" function...
        // ----------------------------------------------------------------------

        $gtod = gettimeofday() ;
        $initial_microtime_part = $gtod['sec'] . '-' . $gtod['usec'] ;

        // ---------------------------------------------------------------------

        while ( TRUE ) {
            $gtod = gettimeofday() ;
            $microtime_part = $gtod['sec'] . '-' . $gtod['usec'] ;
            if ( $microtime_part !== $initial_microtime_part ) {
                break ;
            }
        }

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------
        // NO "gettimeofday()" function...
        // ---------------------------------------------------------------------

        $initial_time = time() ;

        // ---------------------------------------------------------------------

        while ( TRUE ) {
            $microtime_part = time() ;
            if ( $microtime_part !== $initial_time ) {
                break ;
            }
        }

        // ---------------------------------------------------------------------

        $microtime_part .= '-' . mt_rand( 0 , 999999 ) ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $site_registration_key .= $microtime_part ;

    // =========================================================================
    // Browser specific parts...
    // =========================================================================

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $_SERVER = Array(
    //          [SERVER_SOFTWARE]       => Apache/2.2.21 ...
    //          [REQUEST_URI]           => /plugdev/wp-ad...
    //          [UNIQUE_ID]             => VHwcOX8AAQEAAA...
    //          [HTTP_HOST]             => localhost
    //          [HTTP_USER_AGENT]       => Mozilla/5.0 (X...
    //          [HTTP_ACCEPT]           => text/html,appl...
    //          [HTTP_ACCEPT_LANGUAGE]  => en-US,en;q=0.5...
    //          [HTTP_ACCEPT_ENCODING]  => gzip, deflate ...
    //          [HTTP_REFERER]          => http://localho...
    //          [HTTP_COOKIE]           => xxx
    //          [HTTP_CONNECTION]       => keep-alive
    //          [HTTP_CACHE_CONTROL]    => max-age=0
    //          [PATH]                  => /usr/local/sbi...
    //          [SERVER_SIGNATURE]      => Apache/2.2.21 ...
    //          [SERVER_NAME]           => localhost
    //          [SERVER_ADDR]           => 127.0.0.1
    //          [SERVER_PORT]           => 80
    //          [REMOTE_ADDR]           => 127.0.0.1
    //          [DOCUMENT_ROOT]         => /opt/lampp/htd...
    //          [SERVER_ADMIN]          => you@example.co...
    //          [SCRIPT_FILENAME]       => /opt/lampp/htd...
    //          [REMOTE_PORT]           => 44744
    //          [GATEWAY_INTERFACE]     => CGI/1.1
    //          [SERVER_PROTOCOL]       => HTTP/1.1
    //          [REQUEST_METHOD]        => GET
    //          [QUERY_STRING]          => page=pluginPla...
    //          [SCRIPT_NAME]           => /plugdev/wp-ad...
    //          [PHP_SELF]              => /plugdev/wp-ad...
    //          [REQUEST_TIME]          => 1417419833
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_SERVER ) ;

    $data = '' ;

    foreach ( $_SERVER as $name => $value ) {
        $data .= (string) $value ;
    }

    // -------------------------------------------------------------------------

    $algo       = 'sha512' ;
    $raw_output = TRUE ;

    // -------------------------------------------------------------------------

    $site_registration_key .=
        \hash( $algo , $data , $raw_output )
        ;

    // =========================================================================
    // Base64 encode the result...
    // =========================================================================

//  $site_registration_key =
//      \base64_encode(
//          $site_registration_key
//          ) ;
            //  Base64 encoding isn't reliable - since Base64 encoded text
            //  can contain "+" characters.  These may then be treated as
            //  as space character replacements when transmitting the
            //  encoded text - thus resulting in data corruption.

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/string-utils.php' ) ;

    $site_registration_key =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\hex_encode(
            $site_registration_key
            ) ;

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return $site_registration_key ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

