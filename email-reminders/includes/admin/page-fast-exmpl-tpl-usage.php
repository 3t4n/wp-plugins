<?php /**
 * @version 1.0
 * @package Email Reminders
 * @category Content of item Listing page
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2015-11-13
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly


/** Show Content
 *  Update Content
 *  Define Slug
 *  Define where to show
 */
class OPER_Page_Reminders extends OPER_Page_Structure {

    public function in_page() {
        return 'oper-reminders';
    }

    public function tabs() {

        $tabs = array();
        $tabs[ 'reminders' ] = array(
                              'title'		=> __( 'Reminders', 'email-reminders' )						// Title of TAB
                            , 'hint'		=> __( 'List of emails for sending', 'email-reminders' )						// Hint
                            , 'page_title'	=> __( 'Email reminders', 'email-reminders' )			// Title of Page
                            , 'link'		=> ''								// Can be skiped,  then generated link based on Page and Tab tags. Or can  be extenral link
                            , 'position'	=> ''                               // 'left'  ||  'right'  ||  ''
                            , 'css_classes' => ''                               // CSS class(es)
                            , 'icon'		=> ''                               // Icon - link to the real PNG img
                            , 'font_icon'	=> 'glyphicon glyphicon-envelope'			// CSS definition  of forn Icon
                            , 'default'		=> true								// Is this tab activated by default or not: true || false.
                            , 'disabled'	=> false                            // Is this tab disbaled: true || false.
                            , 'hided'		=> !true                             // Is this tab hided: true || false.
                            , 'subtabs'		=> array()

        );
        // $subtabs = array();
        // $tabs[ 'items' ][ 'subtabs' ] = $subtabs;
        return $tabs;
    }

    public function content() {

        // Checking ////////////////////////////////////////////////////////////

        do_action( 'oper_hook_settings_page_header', array( 'page' => $this->in_page() ) );								// Define Notices Section and show some static messages, if needed.

        // $this->settings_api();																						// Init Settings API & Get Data from DB

        // Submit  /////////////////////////////////////////////////////////////

        $submit_form_name = 'oper_oper_reminders_form';                             // Define form name


        if ( isset( $_POST['is_form_sbmitted_'. $submit_form_name ] ) ) {

            // Nonce checking    {Return false if invalid, 1 if generated between, 0-12 hours ago, 2 if generated between 12-24 hours ago. }
            $nonce_gen_time = check_admin_referer( 'oper_settings_page_' . $submit_form_name  );  // Its stop show anything on submiting, if its not refear to the original page

            // Save Changes
            $data_after_update = $this->update();

//debuge( '$data_after_update', $data_after_update );

        }

        // $oper_user_role_master   = get_oper_option( 'oper_user_role_master' );										// O L D   W A Y:   Get Fields Data

        ?><span class="wpdevelop"><?php

			oper_js_for_items_page();				//		JavaScript:		-	Tooltips, Popover, Datepick (js & css)

			// oper_items_toolbar();				//		T o o l b a r s	-	BS UI CSS Class

        ?></span><?php
        ?><div class="clear" style="height:0px;"></div><?php


        // Content  ////////////////////////////////////////////////////////////
        ?>
        <div class="clear" style="margin-bottom:10px;"></div>
        <span class="metabox-holder">
            <form  name="<?php echo $submit_form_name; ?>" id="<?php echo $submit_form_name; ?>" action="" method="post" >
                <?php
                   // N o n c e   field, and key for checking   S u b m i t
                   wp_nonce_field( 'oper_settings_page_' . $submit_form_name );
                ?><input type="hidden" name="is_form_sbmitted_<?php echo $submit_form_name; ?>" id="is_form_sbmitted_<?php echo $submit_form_name; ?>" value="1" />

                <div class="clear" style="margin-bottom:0px;"></div>

                    <?php oper_open_meta_box_section( 'oper_single_actions', __('Actions', 'email-reminders') );  ?>

						<span class='wpdevelop' >
							<a class="button button-primary oper_send_button"
							   href="javascript:void(0)"  title="<?php _e('Generate Secure Link for Download' , 'email-reminders') ?>"
							><span class="oper_text_hide_mobile"><?php _e('Go' , 'email-reminders') ?>&nbsp;&nbsp;</span><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
						</span>
						<input type="hidden" value='' name='oper_action'  id='oper_action' />
                    <?php oper_close_meta_box_section(); ?>

<?php // Templates Section  ?>
<div class="oper_reminders__add_new__container"></div>
<script type="text/javascript">
	jQuery( document ).ready( function (){

		oper_reminders__add_new__show( <?php

						echo wp_json_encode(
											array(
														'rules_int' => array( 'key99' => 99, 'key7' => 'Seven'),
														'rules_str' => 'Super <br>" my string'
											) );
								?>  );
	} );
</script>
<?php // End Templates Section  ?>
					<?php
						//$reminder_listing = new OPER_FlexListing();

						//$reminder_listing->listing();
					?>
                <div class="clear"></div>
				<?php  /* ?>
                <input type="button" value="<?php _e('Send', 'email-reminders'); ?>" class="button button-primary oper_send_button" />
                <input type="submit" value="<?php _e('Submit', 'email-reminders'); ?>" class="button button-primary oper_submit_button" />
                <?php /**/ ?>
            </form>
            <?php

            ?>
        </span>
        <?php

		oper_show_oper_footer();			// Rating

        $this->js();
        $this->css();

        do_action( 'oper_hook_settings_page_footer', 'oper_reminders' );
    }


    public function update() {

        $post_action_key = 'oper_action';
        if (  isset( $_POST[ $post_action_key ] )  && ( $_POST[ $post_action_key ] == 'go_send' )  ) {

            // Get Validated post
            $validated = array();

            // Email
            $validated[ 'oper_textdata' ] = OPER_Settings_API::validate_textarea_post_static( 'oper_textdata' );
debuge( $validated );

			////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( 0 ) {
			$booking = array(
							  'dates'	 => array( '2017-06-23 14:00:01', '2017-06-24 00:00:00', '2017-06-25', '2017-06-26 12:00:02' )
							, 'resource_id' => 1
			);
			$is_dates_booked = wpbc_api_is_dates_booked( $booking[ 'dates' ], $booking[ 'resource_id' ] );

	debuge($is_dates_booked);
}
if ( 0 ) {
			$booking = array(
							  'dates'	 => array( '2017-06-24', '2017-06-24', '2017-06-25', '2017-06-28' )
						    , 'data'	 => array(
												  'secondname' => array( 'value' => 'Rika', 'type' => 'text' )
												, 'name'		 => 'BoBy'
												, 'rangetime'	 => array( 'value' => '14:00 - 16:00', 'type' => 'select-one' )
												, 'email'		 => array( 'value' => 'rika@cost.com', 'type' => 'email' )
											)
							, 'resource_id' => 1
			);
			$booking_id = wpbc_api_booking_add_new( $booking[ 'dates' ], $booking[ 'data' ], $booking[ 'resource_id' ] );

	debuge($booking_id);
}

			////////////////////////////////////////////////////////////////////////////////////////////////////////////


			oper_show_fixed_message ( __('Done', 'email-reminders'), 3  );			//, 'updated warning' );                // Show Message

            return array (   'validated_data' => $validated  );					// Exit, for do  not parse
        }

		/** Buld data saving to DB from POST
        //$validated_fields = $this->settings_api()->validate_post();													// Get Validated Settings fields in $_POST request.
        //$validated_fields = apply_filters( 'oper_settings_validate_fields_before_saving', $validated_fields );		// Hook for validated fields.

        // unset($validated_fields['oper_start_day_weeek']);															// Skip saving specific option, for example in Demo mode.
        //$this->settings_api()->save_to_db( $validated_fields );														// Save fields to DB
        //oper_show_changes_saved_message();
        //oper_show_fixed_message ( __('Done', 'email-reminders'), 0 );														// Show Message
        */

        /** O L D   W A Y:   Saving Fields Data
        //      update_oper_option( 'oper_is_delete_if_deactive'
        //                       , OPER_Settings_API::validate_checkbox_post('oper_is_delete_if_deactive') );
        //      ( (isset( $_POST['oper_is_delete_if_deactive'] ))?'On':'Off') );
		*/

        return false;
    }


    public function js() {
        ?>
        <script type="text/javascript">

<?php // Templates Section  ?>

/**
 * Show Add New Rule section
 *
 * @param json_param_obj		- JSON object
 */
function oper_reminders__add_new__show( json_param_obj ){

//console.log( 'json_param_obj' , json_param_obj );

	var oper_reminders__add_new__template = wp.template( 'oper_reminders__add_new__template' );

	jQuery( '.oper_reminders__add_new__container' ).html( oper_reminders__add_new__template( json_param_obj ) );

}

<?php // End Templates Section  ?>

            // Catch data for summary
            jQuery('#oper_textdata').on( "keypress", function( event ) {
                if( event.which != 13) {
                    // oper_generate_send_info();
                    //return false;
                }
            });
            jQuery('#oper_textdata').on( 'change', function(){
                // oper_generate_send_info();
            } );
            jQuery(document).ready( function(){
                // oper_generate_send_info();
            });
            // On click submit form
            jQuery( '.oper_send_button' ).on( 'click', function() {
				if ( jQuery( '.oper_send_button' ).hasClass( 'disabled' ) ) {
					return false;	// Prevent submit form, if button disabled.
				}
                    jQuery('#oper_action').val('go_send');
                    jQuery('#oper_oper_reminders_form<?php //echo $submit_form_name; ?>').trigger( 'submit' );
					return false;
            });
            //Allow enter key on textareas and submit buttons only
            jQuery(document).on( "keypress", ":input:not(textarea):not([type=submit])", function( event ) {
                if( event.which == 13) {
					if ( jQuery( '.oper_send_button' ).hasClass( 'disabled' ) ) {
						return false; // Prevent submit form, if button disabled.
					}
                    //alert('You pressed enter!');
                    jQuery('#oper_action').val('go_send');
                    jQuery('#oper_oper_reminders_form<?php //echo $submit_form_name; ?>').trigger( 'submit' );
                    return false;
                }
            });
        </script>
        <?php
    }


    public function css() {
        ?>
        <style type="text/css">
 			#oper_textdata {
				width: 100%;
				font-size: 1.4em;
				font-weight: 600;
			}
 			/* iPad mini and all iPhones  and other Mobile Devices */
			@media (max-width: 782px) {
				.oper_page .oper_send_button {
					padding: 2px;
					margin-top: 1px;
				}
			}
        </style>
        <?php
    }

}
add_action('oper_menu_created', array( new OPER_Page_Reminders() , '__construct') );    // Executed after creation of Menu



	// <editor-fold     defaultstate="collapsed"                        desc=" T E M P L A T E S "  >

	/**
	 * Fast Replace:	oper_reminders__add_new__
	 *
	 * Replace 		'oper_reminders__add_new__' 	to  new term at new pages
	 *  	in		- here in TPL	-> oper_reminders__add_new__in_page_templates( ...
	 *              - in class 		-> function content( ... container with jQuery ready function
	 *				- js 			-> oper_reminders__add_new__show()	can  be in external  js file, see function oper_rules_js_load_files(
	 *
	 */


/**
 * Template 					--  Add New Rule section  --
 * inserted at footer of page
 *
 * @param $page string
 */
function oper_reminders__add_new__in_page_templates( $page ) {

	if ( 'oper_reminders' === $page ) {

		?><script type="text/html" id="tmpl-oper_reminders__add_new__template">

				<h3>Its Fast Example of usage templates:</h3>
				<pre><code>In ../email-reminders/includes/admin/page-reminders.php	--  Fast Replace:	oper_reminders__add_new__  --</code></pre><br><br>

				<# _.each( data.rules_int, function ( p_val, p_key, p_data ) { #>

					Rules {{p_key}}: <span class="oper_label">{{p_val}}</span><br/>

				<# }); #>

				<br/><br/>Rules String HTML escaped: <span class="oper_label">{{data.rules_str}}</span>

				<br/><br/>Rules String: <span class="oper_label">{{{data.rules_str}}}</span>

		</script><?php
	}
}
add_action( 'oper_hook_settings_page_footer', 'oper_reminders__add_new__in_page_templates' );

	// </editor-fold>