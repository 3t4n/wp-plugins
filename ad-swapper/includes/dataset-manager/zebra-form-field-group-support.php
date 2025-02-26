<?php

// *****************************************************************************
// INCLUDES / DATASET-MANAGER / ZEBRA-FORM-FIELD-GROUP-SUPPORT.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// =============================================================================
// get_zebra_form_field_group_support()
// =============================================================================

function get_zebra_form_field_group_support( $field_groups ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_zebra_form_field_group_support( $field_groups )
    // - - - - - - - - - - - - - - - - - - - - - - - - - -
    // $field_groups is like (eg):-
    //
    //      $field_groups = array(
    //          array(
    //              'form_field_name'   =>  'xxx'
    //              'html_before'       =>  'yyy'
    //              'html_after'        =>  'zzz'
    //              )
    //          ...
    //          )
    //
    // RETURNS
    //      On SUCCESS
    //          $form_field_support_html STRING
    //
    //      On FAILURE
    //          array( $error_message STRING )
    // -------------------------------------------------------------------------

    // =========================================================================
    // Convert the input array to JSON/Javascript...
    // =========================================================================

    $field_groups_obj = json_encode( $field_groups ) ;

    // =========================================================================
    // Create the output HTML/Javascript...
    // =========================================================================

    // -------------------------------------------------------------------------
    // The Zebra Form HTML is like (eg):-
    //
    //      ...
    //      <div class="row">
    //          <label  for="fixed_height_banner_outer_height_px"
    //                  id="label_for_fixed_height_banner_outer_height_px"
    //                  >Outer Height (px)<span class="required">*</span></label>
    //          <input  type="text"
    //                  name="fixed_height_banner_outer_height_px"
    //                  id="fixed_height_banner_outer_height_px"
    //                  value=""
    //                  class="control text"
    //                  onfocus="greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager_addEditRecord_zebraForm_onfocus(this)"
    //                  onblur="greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager_addEditRecord_zebraForm_onblur(this)"
    //                  >
    //      </div>
    //      ...
    //      <div class="row even">
    //          <label  for="fixed_height_banner_border_top_px"
    //                  id="label_for_fixed_height_banner_border_top_px"
    //                  >Top Border Width (px)</label>
    //          <div    class="note"
    //                  id="note_for_fixed_height_banner_border_top_px"
    //                  ><div   style="margin-bottom:0.35em; font-size:120%; color:#333333; line-height:120%"
    //                          >(optional - default = 0)</div></div>
    //          <input  type="text"
    //                  name="fixed_height_banner_border_top_px"
    //                  id="fixed_height_banner_border_top_px"
    //                  value=""
    //                  class="control text"
    //                  onfocus="greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager_addEditRecord_zebraForm_onfocus(this)"
    //                  onblur="greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager_addEditRecord_zebraForm_onblur(this)"
    //                  >
    //      </div>
    //      ...
    //      <div class="row even">
    //          <label  id="label_for_hide_ads_list_reload_buttons">Hide Ads
    //                  List Reload Buttons</label>
    //          <div    class="note"
    //                  id="note_for_hide_ads_list_reload_buttons"
    //                  ><div style="margin-bottom:0.35em; font-size:120%;
    //                      color:#333333; line-height:120%">This field allows
    //                      you to <b>show/hide the "Reload" buttons</b> that
    //                      appear - on LOCALHOST only - above each Ad Swapper
    //                      ad widget's ads.&nbsp; So if your website ISN'T
    //                      running on LOCALHOST, then the setting in this field
    //                      will have NO effect.&nbsp; <i>And if your website IS
    //                      running on localhost, then the "Reload" buttons are
    //                      a debugging tool - for the Ad Swapper plugin
    //                      developers.&nbsp; So; hide them, and forget about
    //                      them.</div></div>
    //          <input  type="checkbox"
    //                  name="hide_ads_list_reload_buttons"
    //                  id="hide_ads_list_reload_buttons_1"
    //                  value="1"
    //                  class="control checkbox"
    //                  onfocus="greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager_addEditRecord_zebraForm_onfocus(this)"
    //                  onblur="greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager_addEditRecord_zebraForm_onblur(this)"
    //                  >
    //      </div>
    //      ...
    //
    // NOTE how the "id" on the checkbox has had a "_1" appended to the
    // original Zebra field name.
    // -------------------------------------------------------------------------

    $out = <<<EOT
<script type="text/javascript">
    window.zebra_form_field_groups = {$field_groups_obj} ;
    function ferntec_sdm_add_field_groups_to_form() {
        var i , j = window.zebra_form_field_groups.length ;
        var this_field_group , jQuery_field_obj ;
        for ( i=0 ; i<j ; i++ ) {
            // -----------------------------------------------------------------
            this_field_group = window.zebra_form_field_groups[i] ;
            jQuery_field_obj = jQuery( '#' + this_field_group['form_field_name'] ).parent() ;
            if ( jQuery_field_obj.length === 0 ) {
                jQuery_field_obj = jQuery( 'input[id^="' + this_field_group['form_field_name'] + '"]' ).parent() ;
            }
            if ( jQuery_field_obj ) {
                if ( typeof this_field_group['html_before'] === 'string' && this_field_group['html_before'].length > 0 ) {
                    jQuery_field_obj.before( this_field_group['html_before'] ) ;
                }
                if ( typeof this_field_group['html_after'] === 'string' && this_field_group['html_after'].length > 0 ) {
                    jQuery_field_obj.after( this_field_group['html_after'] ) ;
                }
            }
            // -----------------------------------------------------------------
        }
    }
    ferntec_sdm_add_field_groups_to_form() ;
</script>
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

