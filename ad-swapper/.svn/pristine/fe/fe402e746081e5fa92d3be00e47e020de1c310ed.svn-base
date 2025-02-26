<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / AD-DISPLAYER / AD-DISPLAY-FORM-SUPPORT.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer ;

// =============================================================================
// get_ad_display_widget_admin_form()
// =============================================================================

function get_ad_display_widget_admin_form(
    $that           ,
    $instance
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_ad_display_widget_admin_form(
    //      $that           ,
    //      $instance
    //      )
    // - - - - - - - - - - - - - - - - -
    // Generates and returns the "Ad Swapper Ad Displayer" widget's admin
    // form (where the widget's options are entered/edited).
    //
    // $instance holds the previously saved values from the WordPress
    // options database.
    //
    // Returns the form HTML (which could be an error message string).
    //
    // RETURNS
    //      $form_html STRING
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

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $widget_instance_settings ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $loaded_datasets = Array(
    //
    //          [ad_swapper_ad_slots] => Array(
    //              [title]         => Ad Slots
    //              [records]       => Array(
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
    //
    //                  ...
    //
    //                  )
    //
    //              [key_field_slug] => key
    //
    //              [record_indices_by_key] => Array(
    //                  [cf94d256-ece4-4b84-af71-6d562059ee4f-1420622748-483667-1405] => 0
    //                  ...
    //                  )
    //
    //              )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $loaded_datasets ) ;

    // =========================================================================
    // Any Ad Slots ?
    // =========================================================================

    if ( count( $loaded_datasets[ $ad_slots_dataset_slug ]['records'] ) < 1 ) {

        return <<<EOT
<div style="background-color:#FFF0F0; padding:1em; margin:1em 0">

    <p style="color:#AA0000; margin-top:0">Oops; <b>no "Ad Slots"</b> yet :(</p>

    <i>

        <p>To have this widget display Ad Swapper ads, please:-</p>

        <ol style="margin-left:2em">

            <li><b>Run</b> the <b>Ad Swapper</b> plugin (from the WordPress
            Admin Menu, left).</li>

            <li><b>Create an "Ad Slot"</b> (that defines how the ads to be
            displayed by this widget should be displayed).</li>

            <li>Come back here and <b>select that Ad Slot</b>.</li>

        </ol>

    <p style="margin-bottom:0">Until you've done this, this widget won't display
    anything (on this site's front-end).</p>

    </i>

</div>
EOT;

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
    // Create an Ad Slot selector using radio buttons...
    // =========================================================================

    $out = '' ;

    // -------------------------------------------------------------------------

//  $id = $that->get_field_id( 'ad_slot_key') ;

//  $name = $that->get_field_name( 'ad_slot_key' ) ;

    $name = 'ad_slot_key' ;

    // -------------------------------------------------------------------------

    $td_style_title = <<<EOT
padding:0 1.1em 0 0.7em; color:#666666
EOT;

    // -------------------------------------------------------------------------

    $ad_slots_key_field_slug =
        $loaded_datasets[ $ad_slots_dataset_slug ]['key_field_slug']
        ;

    // -------------------------------------------------------------------------

    foreach ( $loaded_datasets[ $ad_slots_dataset_slug ]['records'] as $this_index => $this_record ) {

        // ---------------------------------------------------------------------

        if (    array_key_exists( 'question_disabled' , $this_record )
                &&
                $this_record['question_disabled'] === TRUE
            ) {
            continue ;
        }

        // ---------------------------------------------------------------------

        if ( $this_record[ $ad_slots_key_field_slug ] === $currently_selected_ad_slot_key ) {
            $checked = 'checked="checked"' ;

        } else {
            $checked = '' ;

        }

        // ---------------------------------------------------------------------

//      $width_nominal = number_format( trim( $this_record['width_nominal'] ) ) ;

        // ---------------------------------------------------------------------

//      $height_nominal = number_format( trim( $this_record['height_nominal'] ) ) ;

        // ---------------------------------------------------------------------

//      id="{$id}"

//  <td>{$width_nominal}w x {$height_nominal}h</td>

        $out .= <<<EOT
<tr>
    <td><input
        class="widefat"
        name="{$name}"
        type="radio"
        value="{$this_record[ $ad_slots_key_field_slug ]}"
        {$checked}
        /></td>
    <td style="{$td_style_title}"><b>{$this_record['title']}</b></td>
</tr>

EOT;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    if ( $currently_selected_ad_slot_key === '' ) {
        $checked = 'checked="checked"' ;

    } else {
        $checked = '' ;

    }

    // -------------------------------------------------------------------------

//              id="{$id}"

    $out = <<<EOT
<div style="margin-bottom:1em">

    <p style="font-style:italic; margin-bottom:0"><b>Please select</b> the <b>Ad
    Slot</b> (to display this widget's ads with)...</p>

    <table>

        {$out}

        <tr>
            <td><input
                class="widefat"
                name="{$name}"
                type="radio"
                value=""
                {$checked}
                /></td>
            <td style="{$td_style_title}"><b>None</b></td>
            <td>(no ads will be shown)</td>
        </tr>

    </table>

    <p style="font-style:italic; margin-bottom:0">You don't setup this ad slot
    here.&nbsp; <b>Setup this ad slot</b> from the Ad Swapper (Local) plugin's
    <b>Maintain This Site's Ad Slots</b> option, instead.</p>

</div>
EOT;

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return $out ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

