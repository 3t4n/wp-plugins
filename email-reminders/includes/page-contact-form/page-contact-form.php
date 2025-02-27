<?php /**
 * @version 1.0
 * @package Request Form
 * @category Add mew request forms
 * Author: wpdevelop, oplugins
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2019-04-08
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly


/** Show Content
 *  Update Content
 *  Define Slug
 *  Define where to show
 */
class OPER_Page_SettingsContact_Form extends OPER_Page_Structure {

    public function in_page() {
        return 'oper-settings';
    }

    public function tabs() {

        $tabs = array();
        $tabs[ 'contact-form' ] = array(
                              'title'		=> __('Contact Form', 'email-reminders')													// Title of TAB
                            , 'hint'		=> __('Contact Form', 'email-reminders') . ' - ' . __('Settings', 'email-reminders')		// Hint
                            , 'page_title'	=> __('Contact Form', 'email-reminders') . ' ' . __('Settings', 'email-reminders')		// Title of Page
                            , 'link'		=> ''								// Can be skiped,  then generated link based on Page and Tab tags. Or can  be extenral link
                            , 'position'	=> ''                               // 'left'  ||  'right'  ||  ''
                            , 'css_classes' => ''                               // CSS class(es)
                            , 'icon'		=> ''                               // Icon - link to the real PNG img
                            , 'font_icon'	=> 'glyphicon glyphicon-edit'			// CSS definition  of forn Icon
                            , 'default'		=> ! true								// Is this tab activated by default or not: true || false.
                            , 'disabled'	=> false                            // Is this tab disbaled: true || false.
                            , 'hided'		=> false                             // Is this tab hided: true || false.
                            , 'subtabs'		=> array()

        );
        // $subtabs = array();
        // $tabs[ 'items' ][ 'subtabs' ] = $subtabs;
        return $tabs;
    }

    public function content() {

        do_action( 'oper_hook_settings_page_header', array( 'page' => $this->in_page() ) );								// Define Notices Section and show some static messages, if needed.

		////////////////////////////////////////////////////////////////////////
        // Submit  /////////////////////////////////////////////////////////////

        $submit_form_name = 'oper_form__contact_form';                             // Define form name

        if ( isset( $_POST['is_form_sbmitted_'. $submit_form_name ] ) ) {

            // Nonce checking    {Return false if invalid, 1 if generated between, 0-12 hours ago, 2 if generated between 12-24 hours ago. }
            $nonce_gen_time = check_admin_referer( 'oper_settings_page_' . $submit_form_name  );  // Its stop show anything on submiting, if its not refear to the original page

            // Save Changes
            $this->update();
        }

		$this->show_toolbar();

		if ( 0 ) {
			// Scroll links ////////////////////////////////////////////////////////
			?>
			<div class="wpdvlp-sub-tabs" style="background:none;border:none;box-shadow: none;padding:0;"><span class="nav-tabs" style="text-align:right;">
				<a href="javascript:void(0);" onclick="javascript:oper_scroll_to('#oper_settings_htmlform_metabox' );" original-title="" class="nav-tab go-to-link"><span><?php echo ucwords( __('Contact_Form', 'email-reminders') ); ?></span></a>
			</span></div>
			<?php
		}

        ////////////////////////////////////////////////////////////////////////
        // Content  ////////////////////////////////////////////////////////////
        ?>
        <div class="clear" style="margin-bottom:0px;"></div>
        <span class="metabox-holder">
            <form  name="<?php echo $submit_form_name; ?>" id="<?php echo $submit_form_name; ?>" action="" method="post">
                <?php
                   // N o n c e   field, and key for checking   S u b m i t
                   wp_nonce_field( 'oper_settings_page_' . $submit_form_name );
                ?><input type="hidden" name="is_form_sbmitted_<?php echo $submit_form_name; ?>" id="is_form_sbmitted_<?php echo $submit_form_name; ?>" value="1" /><?php

                ?><input type="hidden" value='' name='oper_action'  id='oper_action' /><?php
	            ?><input type="hidden" value='' name='oper_contact_form__new_name'  id='oper_contact_form__new_name' /><?php

				oper_open_meta_box_section( 'oper_settings_form_help', __('Help', 'email-reminders') );

				?><div class="oper-settings-notice0 notice-info0">
					 <ul>
						 <li><?php printf( __('You can  use any HTML tags for configuration of Contact Form', 'email-reminders'), '<strong></strong>' ); ?></li>
						 <li><?php printf( __('Please use in Name and ID attributes of form field shortcodes like %s', 'email-reminders'), '<strong>[field_name]</strong>' ); ?></li>
					 </ul>
				</div><?php

				oper_close_meta_box_section();
                ?>
				<div class="clear"></div>
				<?php

				?><div class="oper_settings_row oper_settings_row_left0"><?php
                    oper_open_meta_box_section( 'oper_settings_html_mirror_form', __('Form Editing', 'email-reminders') );


						$custom_form_name = '';																			// Standard			//get_oper_option( 'oper_contacts_default_edit_form' );
						if ( function_exists( 'oper_cf__get_form_name__if_selected' ) ) {
							$custom_form_name = oper_cf__get_form_name__if_selected();							// Custom  Form  Name,  if selected $_GET['contact_form_name'] and it exist.
						}

						// Get content of Contact-Form
						$oper_contact_form_textarea = oper_contact_form_get_content( $custom_form_name );


						?><textarea id="oper_contact_form_textarea" name="oper_contact_form_textarea" style="width:100%;height:auto;"><?php

							echo( ! empty( $oper_contact_form_textarea ) ? esc_textarea( $oper_contact_form_textarea ) : '' );

						?></textarea><?php
						oper_codemirror()->set_codemirror( array(
															  'textarea_id' => '#oper_contact_form_textarea'
															, 'preview_id'  => '#oper_contact_form_textarea_preview'
						) );

		            	/**
		             	* Example of Reseting CM form:
						?>
						<script type="text/javascript">
							jQuery(document).ready(function(){
								OPER_CM.set_codemirror_value( '#oper_contact_form_textarea', 'This Form Was reseted !!!')
							});
						</script>
						<?php
						*/

		            	/**
		             	* Simple:
					 	*
						?><textarea id="oper_add_someother_form_html" name="oper_add_someother_form_html" style="width:100%;height:200px;"><?php
							echo( ! empty( $data_list_tmpl ) ? esc_textarea( $data_list_tmpl ) : 'TaDa Da Da <div>some div</div>' );
						?></textarea><?php
						oper_codemirror()->set_codemirror( array( 'textarea_id' => '#oper_add_someother_form_html' , 'preview_id' => '#other_preview') );
						?> <div id="other_preview"></div> <?php
						*/

                    oper_close_meta_box_section();
                ?>
                </div>
                <div class="oper_settings_row oper_settings_row_right0"><?php

                    oper_open_meta_box_section( 'oper_settings_form_Preview', __('Preview', 'email-reminders') );

						?><div id="oper_contact_form_textarea_preview"></div><?php

                    oper_close_meta_box_section();

                ?>
                </div>
                <div class="clear"></div>
                <input type="submit" value="<?php _e('Save Changes','email-reminders'); ?>" class="button button-primary oper_submit_button" />
            </form>

        </span>
        <?php

		$this->css();

		$this->js();

        do_action( 'oper_hook_settings_page_footer', 'oper_settings_contact_form' );
	}

	private function show_toolbar(){

		oper_flex_toolbar_sub_html_container_start( 'settings-contact-form' );                                      	// Load functionality in Addons via Hooks

			oper_flex_toolbar_group_start( array( 'class' => 'group_nowrap' ) );


			$field_id = 'oper_contact_form_reset_select';
			$field_options = array(
									'standard'     => __( 'Standard Form', 'email-reminders' ),
									'inline'       => __( 'Inline Form', 'email-reminders' ),
									'placeholders' => __( 'Placeholders Form', 'email-reminders' ),

									'product'      => __( 'Product Form', 'email-reminders' ),
									'booking'      => __( 'Booking Form', 'email-reminders' )
			);
			?>
			<select id="<?php echo $field_id; ?>" name="<?php echo $field_id; ?>" class="<?php echo $field_id; ?>" autocomplete="off">
				<option value="" selected="selected" style="color:#aaa"><?php _e( 'Select Form Template', 'email-reminders' ); ?></option>
				<?php
				foreach ( $field_options as $field_val => $field_title ) {
					?><option value="<?php echo $field_val; ?>"><?php echo $field_title; ?></option><?php
				}
				?>
			</select>
			<a href="javascript:void(0)" class="button button-secondary oper_contact_form_reset_button disabled"
			   title="<?php _e( 'Reset Form', 'email-reminders' ); ?>" >
				<span class="in-button-text"><?php _e( 'Reset Form', 'email-reminders' ); ?>&nbsp;</span>
				<span class="wpdevelop"><i class="glyphicon glyphicon glyphicon-repeat"></i></span>
			</a>
			<?php

			oper_flex_toolbar_group_end();

		oper_flex_toolbar_sub_html_container_end( 'settings-contact-form' );                                        	// Load functionality in Addons via Hooks
	}

    /** Save Chanages */
    public function update() {

	    if ( 	( isset( $_POST['oper_action'] ) )
			 && (  '' == $_POST['oper_action'] )
		) {

		    /**
			* We can  not use here  OPER_Settings_API::validate_textarea_post_static( 'oper_settings_contact_form' );
			* because its will  remove also JavaScript,  which  possible to  use for wizard form  or in some other cases.
			*/
		    $oper_contact_form_textarea = trim( stripslashes(  $_POST['oper_contact_form_textarea'] ) );

			$is_update_custom_form = apply_oper_filter( 'oper_contact_form__is_selected_form_update', false );			// Useful for Addon	-	Save changes in custom form

		    if ( false === $is_update_custom_form ) {
			    update_oper_option( 'oper_contact_form', $oper_contact_form_textarea );
		    }

		    oper_show_changes_saved_message();
	    }

	    do_action( 'oper_settings_page_update', 'oper_settings_contact_form' );											// Useful for Addon	-	Create new custom form
    }


    // <editor-fold     defaultstate="collapsed"                        desc=" CSS  "  >

    /** CSS for this page */
    private function css() {
        ?>
        <style type="text/css">
			#oper_settings_html_mirror_form_metabox .inside {
				padding:0;
				margin:0;
			}
			#oper_settings_html_mirror_form_metabox .CodeMirror {
				border:none;
			}
			.oper_contact_form_reset_button .in-button-text{
				display: none;
			}
            @media (max-width: 399px) {
            }
			@media (max-width: 782px) {
			}
        </style>
        <?php
    }

    // </editor-fold>

    // <editor-fold     defaultstate="collapsed"                        desc=" JS  "  >

    /** JS for this page */
    private function js() {
	    ?>
		<script type="text/javascript">
		</script>
	    <?php
    }

    // </editor-fold>

}
add_action('oper_menu_created', array( new OPER_Page_SettingsContact_Form() , '__construct') );    						// Executed after creation of Menu


	// <editor-fold     defaultstate="collapsed"                        desc=" =  JSS   &   CSS  = "  >

	/**
	 * JSS
	 *
	 * @param $where_to_load
	 */
	function oper_contactform_js_load_files( $where_to_load ) {

		$in_footer = true;

		if (
			   ( ( is_admin() ) && ( in_array( $where_to_load, array( 'admin', 'both' ) ) ) )  // || ( 'client' == $where_to_load )
		){
			// wp_enqueue_script ( 'oper-script-name-id', oper_plugin_url( '/_out/js/live_search.js' ), array( 'oper-global-vars' ), '1.1', $in_footer );
			// wp_localize_script( 'oper-script-name-id', 'oper_global_obj' , array( 'contacts'  => '', 'reminders' => '' ) );			// Usage: 		oper_global_obj.contacts

			wp_enqueue_script( 'oper-contact_form_page' , trailingslashit( plugins_url( '', __FILE__ ) ) . 'contact-form.js'
								, array( 'oper-global-vars' ), '1.1', $in_footer );

			// Localized Variables: 	oper_contact_form_global.message_do_you_really
			//wp_localize_script( 'oper-contact_form_page'
			//				  , 'oper_contact_form_global'
			//				  , array(
			//							'message_do_you_really' => esc_js( __( 'Do you really want to do this ?', 'email-reminders' ) )
			//));

		}
	}
	add_action( 'oper_enqueue_js_files', 'oper_contactform_js_load_files', 50 );

	/**
	 * CSS
	 *
	 * @param $where_to_load
	 */
	function oper_contactform_enqueue_css_files( $where_to_load ) {

		if (
			   ( ( is_admin() ) && ( in_array( $where_to_load, array( 'admin', 'both' ) ) ) )  //|| ( 'client' == $where_to_load )
		){

			// wp_enqueue_style( 'oper-contact_form_page', oper_plugin_url( '/includes/listing_contacts/listing_contacts.css' ), array(), OPER_VERSION_NUM );
			wp_enqueue_style( 'oper-contact_form_page', trailingslashit( plugins_url( '', __FILE__ ) ) . 'contact-form.css'
								, array(), OPER_VERSION_NUM );
		}
	}
	add_action( 'oper_enqueue_css_files', 'oper_contactform_enqueue_css_files', 50 );

	// </editor-fold>


/**
 * Get Content of Contect-Form
 *
 * @param string $custom_form_name		 if "" - getting Default contact form
 *
 * @return bool|mixed|void
 */
function oper_contact_form_get_content( $custom_form_name = '' ){

	$contactform = get_oper_option( 'oper_contact_form' );

	// Get content of Custom contact form - $custom_form_name, if this form exist, otherwise return original content
	$contactform = apply_filters( 'oper_cf__form_content_get', $contactform, $custom_form_name  );

	return $contactform;
}

/**
 * Get Content of Contect-Form
 *
 * @param string $custom_form_name		 if "" - getting Default contact form
 *
 * @return bool|mixed|void
 */
function oper_contact_form_get_shortcodes( $custom_form_name = '' ){

	$form_content = oper_contact_form_get_content( $custom_form_name );

	$pattern = "/\[([^\]]+)\]/i";		//The "i" after the pattern delimiter indicates a case-insensitive search

	preg_match_all ( $pattern , $form_content, $shortcodes );

	return array_unique( $shortcodes[1] );
}


/**
 * Get all  fields from all Contact  forms and some system fields.
 *
 * @return array    = Array(
				            [__system__] => Array (
							                    [__system__|contact_id] => ID
							                    [__system__|source] => Source
							                    [__system__|note] => Note
				                )
				            [__default__] => Array (
							                    [__default__|_purchase_product] => _purchase_product
							                    [__default__|_product_name] => _product_name
							                    ...
				                )
				            [store] => Array (
							                    [store|_purchase_product] => _purchase_product
							                     ...
 */
function oper_contact_form_get_shortcodes_as_arr(){

	// SYSTEM ///////////////////////////////////////////////////
	$shortcodes = array();
	$shortcodes['__system__'] = array();
	$shortcodes['__system__']['__system__|contact_id'] = 'ID';
	$shortcodes['__system__']['__system__|source'] = __( 'Source', 'email-reminders' );
	$shortcodes['__system__']['__system__|note'] = __( 'Note', 'email-reminders' );

	// Forms Names //////////////////////////////////////////////
	$shortcodes['__default__'] = array();
	if ( function_exists( 'oper_cf__get_all_custom_forms_as_arr' ) ) {
		$all_forms = oper_cf__get_all_custom_forms_as_arr();
	} else {
		$all_forms = array( '' => __( 'Default', 'email-reminders' ) );
	}

	// Shortcodes ////////////////////////////////////////////////
	foreach ( $all_forms as $form_name => $form_title ) {

		$array_values = oper_contact_form_get_shortcodes( $form_name );
		$array_values = array_values( $array_values );

		$form_name = ( '' == $form_name ) ? '__default__' : $form_name;

		$array_keys  = $array_values;
		foreach ( $array_keys as $ai => $av ) {
			$array_keys[ $ai ] = $form_name. '|' . $av;
		}

		$shortcodes[ $form_name ] = array_combine( $array_keys, $array_values );
	}
	return $shortcodes;
}