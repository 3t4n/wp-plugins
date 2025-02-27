<?php /**
 * @version 1.0
 * @description CRON- automate of actions.
 * @category    Settings page -- Schedule CRONs
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2020-04-06
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly


/** Show Content
 *  Update Content
 *  Define Slug
 *  Define where to show
 */
class OPER_Page_CRON extends OPER_Page_Structure {

    private $settings_api = false;

	/**
	 * Get Settings API class - define, show, update "Fields".
     *
     * @return object Settings API
     */
    public function settings_api(){

        if ( $this->settings_api === false )
             $this->settings_api = new OPER_Settings_API_CRON();

        return $this->settings_api;
    }

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function in_page() {
        return 'oper-settings';
    }

    public function tabs() {

        $tabs = array();
        $tabs[ 'oper-rules-automate' ] = array(
                              'title'		=> __( 'Automate (CRON)', 'email-reminders' )						// Title of TAB
                            , 'hint'		=> __( 'Automate (CRON)', 'email-reminders' )						// Hint
                            , 'page_title'	=> __( 'Automate (CRON)', 'email-reminders' )			// Title of Page
                            , 'link'		=> ''								// Can be skiped,  then generated link based on Page and Tab tags. Or can  be extenral link
                            , 'position'	=> ''                               // 'left'  ||  'right'  ||  ''
                            , 'css_classes' => ''                               // CSS class(es)
                            , 'icon'		=> ''                               // Icon - link to the real PNG img
                            , 'font_icon'	=> 'glyphicon glyphicon-refresh'			// CSS definition  of forn Icon
                            , 'default'		=> ! true								// Is this tab activated by default or not: true || false.
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

        $this->settings_api();																							// Init Settings API & Get Data from DB

        // Submit  /////////////////////////////////////////////////////////////

        $submit_form_name = 'oper_cron_form';                             // Define form name


        if ( isset( $_POST['is_form_sbmitted_'. $submit_form_name ] ) ) {

            // Nonce checking    {Return false if invalid, 1 if generated between, 0-12 hours ago, 2 if generated between 12-24 hours ago. }
            $nonce_gen_time = check_admin_referer( 'oper_settings_page_' . $submit_form_name  );  // Its stop show anything on submiting, if its not refear to the original page

            // Save Changes
            $data_after_update = $this->update();
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


                <div class="oper_settings_row oper_settings_row_left" >

                    <?php oper_open_meta_box_section( 'oper_general_settings_top', __('General', 'email-reminders') );  ?>

                    <?php $this->settings_api()->show( 'general' ); ?>

                    <?php oper_close_meta_box_section(); ?>
                </div>
                <div class="oper_settings_row oper_settings_row_right">

                    <?php oper_open_meta_box_section( 'oper_general_settings_information', __('Server Scheduler', 'email-reminders') );  ?>

                    <?php $this->settings_api()->show( 'server_cron' ); ?>

                    <?php oper_close_meta_box_section(); ?>
                </div>
                <div class="clear"></div>
                <input type="submit" value="<?php _e('Save Changes', 'email-reminders'); ?>" class="button button-primary oper_submit_button" />

            </form>
            <?php

            ?>
        </span>
        <?php

		oper_show_oper_footer();			// Rating

        $this->js();
        $this->css();

        do_action( 'oper_hook_settings_page_footer', 'oper_cron' );
    }

    public function update() {

        $validated_fields = $this->settings_api()->validate_post();             										// Get Validated Settings fields in $_POST request.

        // $validated_fields = apply_filters( 'oper_settings_validate_fields_before_saving', $validated_fields );   	// Hook for validated fields.
        // unset($validated_fields['oper_start_day_weeek']);															// Skip saving specific option, for example in Demo mode.

        $this->settings_api()->save_to_db( $validated_fields );                 										// Save fields to DB

	    do_action( 'opera_cron_settings_saved' );

        oper_show_changes_saved_message();
    }


    public function js() {
        ?>
        <script type="text/javascript">

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
                    jQuery('#oper_cron_form<?php //echo $submit_form_name; ?>').trigger( 'submit' );
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
                    jQuery('#oper_cron_form<?php //echo $submit_form_name; ?>').trigger( 'submit' );
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
add_action('oper_menu_created', array( new OPER_Page_CRON() , '__construct') );    // Executed after creation of Menu




// General Settings API - Saving different options
class  OPER_Settings_API_CRON extends OPER_Settings_API {


	/**
	 * 	Override Settings API Constructor
     *  During creation,  system try to load values from DB, if exist.
     *
     *  @param type $id - of Settings
     */
    public function __construct( $id = '' ){

        $options = array(
                        'db_prefix_option' => ''                                // 'oper_'
                      , 'db_saving_type'   => 'separate'
                      , 'id'               => 'set_cron'
            );

        $id = empty($id) ? $options['id'] : $id;

        parent::__construct( $id, $options );                                   // Define ID of Setting page and options
    }


	/**
	 * Init all fields rows for settings page
	 */
    public function init_settings_fields() {

        $this->fields = array();

        $default_options_values = opera_get_default_options();


        $this->fields['opera_cron_reminders_enabled'] = array(
                                  'type'        => 'checkbox'
                                , 'group'       => 'general'
                                , 'default'     => $default_options_values['opera_cron_reminders_enabled']
								, 'title'       => __('Enable / Disable', 'email-reminders')
								, 'label'       => __('Enable CRON to send reminders', 'email-reminders')
                                , 'description_tag' => 'span'
                        );



		$extra_time    = array();
		$extra_time[0] = __( 'Once', 'email-reminders' );

		$extra_num = 1;
		$extra_time[ $extra_num * 60 ] = __( 'Once every', 'email-reminders') . ' ' . $extra_num . ' ' . __( 'minute', 'email-reminders' );

		// Each 5 minutes
		foreach ( range( 5, 55, 5 ) as $extra_num ) {
			$extra_time[ $extra_num * 60 ] = __( 'Once every', 'email-reminders') . ' ' . $extra_num . ' ' . __( 'minutes', 'email-reminders' );
		}
		$extra_time[ 60 * 60 ] = __( 'Once every', 'email-reminders') . ' ' . '1 ' . __( 'hour', 'email-reminders' );
		// 1 hour + Each 5 minutes
		foreach ( range( 65, 115, 5 ) as $extra_num ) {
			$extra_time[ $extra_num * 60 ] = __( 'Once every', 'email-reminders') . ' ' . '1 ' . __( 'hour', 'email-reminders' ) . ' ' . ( $extra_num - 60 ) . ' ' . __( 'minutes', 'email-reminders' );
		}
		// Each Hour based on minutes
		foreach ( range( 120, 1380, 60 ) as $extra_num ) {
			$extra_time[ $extra_num * 60 ] = __( 'Once every', 'email-reminders') . ' ' . ( $extra_num / 60 ) . ' ' . __( 'hours', 'email-reminders' );
		}
		// Each Day
		foreach ( range( 1, 30, 1 ) as $extra_num ) {
			$extra_time[ $extra_num * 24 * 60 * 60 ] = __( 'Once every', 'email-reminders') . ' ' . $extra_num . ' ' . __( 'day(s)', 'email-reminders' );
		}

        $this->fields['opera_cron_reminders_interval'] = array(
                                  'type'        => 'select'
                                , 'group'       => 'general'
                                , 'default'     => $default_options_values['opera_cron_reminders_interval']
                                , 'options'     => $extra_time
                                , 'title'       => __('Email sending intervals', 'email-reminders')
                                , 'description' => __('Select time intervals, when CRON system will check for sending email reminders.' , 'email-reminders')
//                                                   .' '. sprintf(
//                                                                __('You can  configure %sCustom Form%s %shere%s', 'email-reminders'),
//	                                                            '<strong>', '</strong>',
//	                                                            '<a href="' . oper_get_settings_url() . '&tab=contact-form' . '">', '</a>'
//                                                            )
//													. ' <div class="oper-settings-notice notice-info" style="text-align:left;margin-top:1em;">'
//                                                            . '<strong>'. __('Note', '') . '!</strong> '
//                                                            . sprintf(
//                                                            	        __('Its does not possible to use multiple rows in fields values, if selected %s', 'email-reminders'),
//			                                                            '<strong>Textarea</strong>'
//                                                                    )
//                                                            . '  '
//                                                    . '</div>'
                                , 'description_tag' => 'span'
                        );

        $this->fields['opera_cron_reminders_check_num'] = array(
                                  'type'        => 'text'
                                , 'group'       => 'general'
                                , 'default'     => $default_options_values['opera_cron_reminders_check_num']
                                , 'title'       => __('Number of reminders to send', 'email-reminders')
                                , 'description' => __('Enter number of email reminders to check during CRON execution' , 'email-reminders')
                                , 'description_tag' => 'span'
                        );

        if ( (defined( 'DISABLE_WP_CRON' ) ) && (DISABLE_WP_CRON) ) {
        	$is_disabled = true;
        } else{
        	$is_disabled = false;
		}

        $this->fields['opera_server_cron_enabled'] = array(
                                  'type'        => 'checkbox'
                                , 'group'       => 'server_cron'
                                , 'default'     => $default_options_values['opera_server_cron_enabled']
								, 'title'       => __('Enable Server Scheduler ', 'email-reminders')
								, 'label'       => __('When enabled WordPress will not spawn Cron anymore. You have to set the Cron on your server.', 'email-reminders')
								, 'disabled' => $is_disabled
                        );

        $server_cron_enabled = get_oper_option( 'opera_server_cron_enabled' );
		if ( 'On' == $server_cron_enabled ) {

        	$this->fields['opera_server_cron_enabled_description'] = array(
                                  'type' => 'html'
                                , 'html'  =>  ' <div class="oper-settings-notice notice-info" style="text-align:left;margin-top:1em;">'
                                                            . '<strong>'. __('Note', 'email-reminders') . '!</strong> '
															. sprintf(
																		__('Check %show to setup the Cron job%s or read more about %sHooking WP-Cron Into the System Task Scheduler%s.', 'email-reminders')
																		, '<a href="https://www.google.com/search?q=how+to+setup+cron+job">', '</a>'
																		, '<a href="https://developer.wordpress.org/plugins/cron/hooking-wp-cron-into-the-system-task-scheduler/">', '</a>'
											  				)
															. ''
															. '<br/>'
                                                            . sprintf(   __('The command you want to use is: %s', 'email-reminders'),
			                                                            '<br/><code>wget -qO- '.get_option('home').'/wp-cron.php &> /dev/null</code>'
																  )
															. ''
															. '<br/>'
															. sprintf(
													 		 		__('The reasonable time interval is 5-15 minutes.%sThat is %s or %s for Cron interval setting.', 'email-reminders')
																		, '<br/>'
																		, '<strong>*/5 * * * *</strong>'
																		, '<strong>*/15 * * * *</strong>'
											  				)
                                                            . ''
											. '</div>'
                                , 'cols'  => 2
                                , 'group' => 'server_cron'
            );
		}
        //



//

//


    }



}

/**
 * Get Default Option(s)
 *
 * @param string $option_name  - name of option Optional
 *
 * @return array|bool|mixed    - specific default option if specified $option_name
 *                               or FALSE, if not found
 *                               or all  options,  if  $option_name was skipped.
 */
function opera_get_default_options( $option_name = '' ) {

	$is_demo = oper_is_this_demo();

	$default_options = array();

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// General Settings
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$default_options['opera_cron_reminders_interval']  = 5 * 60;
	$default_options['opera_cron_reminders_check_num'] = 100;
	$default_options['opera_cron_reminders_enabled']   = 'Off';
	$default_options['opera_server_cron_enabled']      = 'Off';



	if ( ! empty( $option_name ) ) {

		if ( isset( $default_options[ $option_name ] ) )
			return $default_options[ $option_name ];                        // Return 1 option
		else
			return  false;                                                  // Option does NOT exist

	} else {
		return $default_options;                                            // Return  ALL
	}
}