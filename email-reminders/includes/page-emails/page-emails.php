<?php
/**
 * @version 1.0
 * @package Content
 * @category Menu
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2015-04-09
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly

/** Replace:
 1.  EML_RE -> EML_RE
 2.  eml_reminders -> eml_reminders
 3.  Check in api-emails.php 'db_prefix_option' => '...' option,  have to be the same as OPER_EMAIL_EML_RE_PREFIX here
 4.  Configure Fields in init_settings_fields.
 */

if ( ! defined( 'OPER_EMAIL_EML_RE_PREFIX' ) )   define( 'OPER_EMAIL_EML_RE_PREFIX',  'oper_email_' ); 					// Its defined in api-emails.php file & its same for all emails, here its used only for easy coding...


/**
 * Define 'Custom Email' slug - usualy  selected in  $_GET[ 'email_template_name' ]
 */
//Addon Section
if ( ! empty( $_REQUEST[ 'email_template_name' ] ) ) {
	$oper_email_custom = oper_get_slug_format( $_REQUEST[ 'email_template_name' ] );													// Escape everything

	if ( $oper_email_custom == 'default' ) {
		$oper_email_custom = 'eml_reminders';
	}

	if ( ! defined( 'OPER_EMAIL_EML_RE_ID' ) )       define( 'OPER_EMAIL_EML_RE_ID',      $oper_email_custom );
} else {

	if ( ! defined( 'OPER_EMAIL_EML_RE_ID' ) )       define( 'OPER_EMAIL_EML_RE_ID',      'eml_reminders' );   	/* Define Name of Email Template.
                                                                                                                   Note. Prefix "oper_email_" defined in api-emails.php file.
                                                                                                                   Full name of option is - "oper_email_eml_reminders"
                                                                                                                   Other email templates names:
                                                                                                                                            - 'eml_reminders'   - send email with download link to user
                                                                                                                                            - 'link_admin'      - send copy of email to admin with download link
                                                                                                                                            - 'download_admin'  - send email  about downloads happend
                                                                                                                */
}



require_once( OPER_PLUGIN_DIR . '/includes/emails-api/api-emails.php' ); // API


/**
 * Email   F i e l d s
 */
class OPER_Emails_API_EML_RE extends OPER_Emails_API  {                       											// O v e r r i d i n g     "OPER_Emails_API"     ClASS

	/**
	 * Override functions - define Email Fields & Values
	 */
    public function init_settings_fields() {

        $this->fields = array();

        $this->fields['enabled'] = array(
                                      'type'        => 'checkbox'
                                    , 'default'     => 'On'
                                    , 'title'       => __('Enable / Disable', 'email-reminders')
                                    , 'label'       => __('Enable this email notification', 'email-reminders')
                                    , 'description' => ''
                                    , 'group'       => 'general'

                                );

        $this->fields['copy_to_admin'] = array(
                                      'type'        => 'checkbox'
                                    , 'default'     => 'On'
                                    , 'title'       => __('Copy to admin', 'email-reminders')
                                    , 'label'       => __('Enable / disable sending copy of this email notification to admin', 'email-reminders')
                                    , 'description' => ''
                                    , 'group'       => 'general'

                                );

        $this->fields['enabled_hr'] = array( 'type' => 'hr' );

		$user_info = array( 'name' => '' );
		if ( is_user_logged_in() ) {
			$user_data         = get_userdata( get_current_user_id() );
			$user_info['name'] = ( $user_data ) ? $user_data->display_name : '';
		}

/*
        $this->fields['to_html_prefix'] = array(
                                    'type'          => 'pure_html'
                                    , 'group'       => 'general'
                                    , 'html'        => '<tr valign="top">
                                                        <th scope="row">
                                                            <label class="oper-form-email" for="'
                                                                             . esc_attr( 'eml_reminders_to' )
                                                            . '">' . wp_kses_post(  __('To' , 'email-reminders') )
                                                            . '</label>
                                                        </th>
                                                        <td><fieldset style="float:left;width:50%;margin-right:5%;">'
                                );
        $this->fields['to'] = array(
                                      'type'        => 'text'               // We are using here 'text'  and not 'email',  for ability to  save several comma seperated emails.
                                    , 'default'     => get_option( 'admin_email' )
                                    //, 'placeholder' => ''
                                    , 'title'       => ''
                                    , 'description' => __('Email Address', 'email-reminders') . '. ' . __('Required', 'email-reminders') . '.'
                                    , 'description_tag' => ''
                                    , 'css'         => 'width:100%'
                                    , 'group'       => 'general'
                                    , 'tr_class'    => ''
                                    , 'only_field'  => true
                                    , 'validate_as' => array( 'required' )
                                );
        $this->fields['to_html_middle'] = array(
                                    'type'          => 'pure_html'
                                    , 'group'       => 'general'
                                    , 'html'        => '</fieldset><fieldset style="float:left;width:45%;">'
                                );
        $this->fields['to_name'] = array(
                                      'type'        => 'text'
                                    , 'default'     => ''  // 		$user_info['name']
                                    //, 'placeholder' => ''
                                    , 'title'       => ''
                                    , 'description' => __('Title', 'email-reminders') . '  (' . __('optional', 'email-reminders') . ').' //. ' ' . __('If empty then title defined as WordPress', 'email-reminders')
                                    , 'description_tag' => ''
                                    , 'css'         => 'width:100%'
                                    , 'group'       => 'general'
                                    , 'tr_class'    => ''
                                    , 'only_field' => true
                                );
        $this->fields['to_html_sufix'] = array(
                                'type'          => 'pure_html'
                                , 'group'       => 'general'
                                , 'html'        => '    </fieldset>
                                                        </td>
                                                    </tr>'
                        );
*/


        $this->fields['from_html_prefix'] = array(
                                    'type'          => 'pure_html'
                                    , 'group'       => 'general'
                                    , 'html'        => '<tr valign="top">
                                                        <th scope="row">
                                                            <label class="oper-form-email" for="'
                                                                             . esc_attr( 'eml_reminders_from' )
                                                            . '">' . wp_kses_post(  __('From' , 'email-reminders') )
                                                            . '</label>
                                                        </th>
                                                        <td><fieldset style="float:left;width:50%;margin-right:5%;">'
                                );
        $this->fields['from'] = array(
                                      'type'        => 'email'              // Its can  be only 1 email,  so check  it as Email  field.
                                    , 'default'     => get_option( 'admin_email' )
                                    //, 'placeholder' => ''
                                    , 'title'       => ''
                                    , 'description' => __('Email Address', 'email-reminders') . '. ' . __('Required', 'email-reminders') . '.'
                                    , 'description_tag' => ''
                                    , 'css'         => 'width:100%'
                                    , 'group'       => 'general'
                                    , 'tr_class'    => ''
                                    , 'only_field' => true
                                    , 'validate_as' => array( 'required' )
                                );
        $this->fields['from_html_middle'] = array(
                                    'type'          => 'pure_html'
                                    , 'group'       => 'general'
                                    , 'html'        => '</fieldset><fieldset style="float:left;width:45%;">'
                                );
        $this->fields['from_name'] = array(
                                      'type'        => 'text'
                                    , 'default'     => $user_info['name']
                                    //, 'placeholder' => ''
                                    , 'title'       => ''
                                    , 'description' => __('Title', 'email-reminders') . '  (' . __('optional', 'email-reminders') . ').' //. ' ' . __('If empty then title defined as WordPress', 'email-reminders')
                                    , 'description_tag' => ''
                                    , 'css'         => 'width:100%'
                                    , 'group'       => 'general'
                                    , 'tr_class'    => ''
                                    , 'only_field' => true
                                );
        $this->fields['from_html_sufix'] = array(
                                'type'          => 'pure_html'
                                , 'group'       => 'general'
                                , 'html'        => '    </fieldset>
                                                        </td>
                                                    </tr>'
                        );

        $this->fields['from_hr'] = array( 'type' => 'hr' );


        $this->fields['subject'] = array(
                                      'type'        => 'text'
//                                    , 'default'     => sprintf( __( 'Update of %s', 'email-reminders'), '[product_title]' )
									, 'default'     => sprintf( __( 'Friendly reminder', 'email-reminders'), '[product_title] [product_version]' )
                                    //, 'placeholder' => ''
                                    , 'title'       => __('Subject', 'email-reminders')
                                    , 'description' => sprintf(__('Type your email %ssubject%s.' , 'email-reminders'),'<b>','</b>') . ' ' . __('Required', 'email-reminders') . '.'
                                    , 'description_tag' => ''
                                    , 'css'         => 'width:100%'
                                    , 'group'       => 'general'
                                    , 'tr_class'    => ''
                                    , 'validate_as' => array( 'required' )
                            );

        $blg_title = get_option( 'blogname' );
        $blg_title = str_replace( array( '"', "'" ), '', $blg_title );

        $this->fields['content'] = array(
                                      'type'        => 'wp_textarea'
//                                    , 'default'     => sprintf( __( 'Hello.%sTo download %s click the link below:%s (%s) ~ Download link will expire in %sThank you, %s', 'email-reminders')
//                                                                , '<br/><br/>', '[product_title]', '<br/>[product_link]', '[product_size]', '[product_expire_after]<br/><br/>', '[site_title]<br>[siteurl]' )
                                    , 'default'     => sprintf( __( 'Dear, %s Thank you for using our service (product).%s Its friendly  reminder, that  your event will be during tomorrow. %s Thank you, %s', 'email-reminders' )
                                                                , '[name] [secondname]' . '.<br/>'
																, '<br/>'
																, '<br/>'
																, '[siteurl]' )
                                    //, 'placeholder' => ''
                                    , 'title'       => __('Content', 'email-reminders')
                                    , 'description' => __('Type your email message content.', 'email-reminders')
                                    , 'description_tag' => ''
                                    , 'css'         => ''
                                    , 'group'       => 'general'
                                    , 'tr_class'    => ''
                                    , 'rows'        => 10
                                    , 'show_in_2_cols' => true
                            );
//        $this->fields['content'] = htmlspecialchars( $this->fields['content'] );// Convert > to &gt;
//        $this->fields['content'] = html_entity_decode( $this->fields['content'] );// Convert &gt; to >


        ////////////////////////////////////////////////////////////////////
        // Style
        ////////////////////////////////////////////////////////////////////


        $this->fields['header_content'] = array(
                                    'type' => 'textarea'
                                    , 'default' => ''
                                    , 'title' => __('Email Heading', 'email-reminders')
                                    , 'description'  => __('Enter main heading contained within the email notification.', 'email-reminders')
                                    //, 'placeholder' => ''
                                    , 'rows'  => 2
                                    , 'css' => "width:100%;"
                                    , 'group' => 'parts'
                            );
        $this->fields['footer_content'] = array(
                                    'type' => 'textarea'
                                    , 'default' => ''
                                    , 'title' => __('Email Footer Text', 'email-reminders')
                                    , 'description'  => __('Enter text contained within footer of the email notification', 'email-reminders')
                                    //, 'placeholder' => ''
                                    , 'rows'  => 2
                                    , 'css' => 'width:100%;'
                                    , 'group' => 'parts'
                            );

        $this->fields['template_file'] = array(
                                    'type' => 'select'
                                    , 'default' => 'plain'
                                    , 'title' => __('Email template', 'email-reminders')
                                    , 'description' => __('Choose email template.', 'email-reminders')
                                    , 'description_tag' => 'span'
                                    , 'css' => ''
                                    , 'options' => array(
                                                            'plain'     => __('Plain (without styles)', 'email-reminders')
                                                          , 'standard'  => __('Standard 1 column', 'email-reminders')
                                                    )
                                    , 'group' => 'style'
                            );

        $this->fields['template_file_help'] = array(
                                    'type' => 'help'
                                    , 'value' => array( sprintf( __('You can override this email template in this folder %s', 'email-reminders')
                                                                , '<code>' . realpath( dirname(__FILE__) . '/../emails-api/emails_tpl/' ) . '</code>' )
                                                      )
                                    , 'cols' => 2
                                    , 'group' => 'style'
                            );

        $this->fields['base_color'] = array(
                                    'type'      => 'color'
                                    , 'default'   => '#557da1'
                                    , 'title'   => __('Base Color', 'email-reminders')
                                    , 'description'  => __('The base color for email templates.', 'email-reminders')
                                                        . ' ' . __('Default color', 'email-reminders') .': <code>#557da1</code>.'
                                    , 'group'   => 'style'
                                    , 'tr_class'    => 'template_colors'
                            );
        $this->fields['background_color'] = array(
                                    'type'      => 'color'
                                    , 'default'   => '#f5f5f5'
                                    , 'title'   => __('Background Color', 'email-reminders')
                                    , 'description' => __('The background color for email templates.', 'email-reminders')
                                                       . ' ' . __('Default color', 'email-reminders') .': <code>#f5f5f5</code>.'
                                    , 'group'   => 'style'
                                    , 'tr_class'    => 'template_colors'
                            );
        $this->fields['body_color'] = array(
                                    'type'      => 'color'
                                    , 'default'   => '#fdfdfd'
                                    , 'title'   => __('Email Body Background Color', 'email-reminders')
                                    , 'description' =>  __('The main body background color for email templates.', 'email-reminders')
                                                        . ' ' . __('Default color', 'email-reminders') .': <code>#fdfdfd</code>.'
                                    , 'group'   => 'style'
                                    , 'tr_class'    => 'template_colors'
                            );
        $this->fields['text_color'] = array(
                                    'type'      => 'color'
                                    , 'default'   => '#505050'
                                    , 'title'   => __('Email Body Text Colour', 'email-reminders')
                                    , 'description' =>  __('The main body text color for email templates.', 'email-reminders')
                                                        . ' ' . __('Default color', 'email-reminders') .': <code>#505050</code>.'
                                    , 'group'   => 'style'
                                    , 'tr_class'    => 'template_colors'
                            );


        ////////////////////////////////////////////////////////////////////
        // Email format: Plain, HTML, MultiPart
        ////////////////////////////////////////////////////////////////////


        $this->fields['email_content_type'] = array(
                                    'type' => 'select'
                                    , 'default' => 'plain'
                                    , 'title' => __('Email format', 'email-reminders')
                                    , 'description' => __('Choose which format of email to send.', 'email-reminders')
                                    , 'description_tag' => 'p'
                                    , 'css' => 'width:100%;'
                                    , 'options' => array(
                                                            'plain' => __('Plain text', 'email-reminders')
                                                    )
                                    , 'group' => 'email_content_type'
                            );
        if ( class_exists( 'DOMDocument' ) ) {
            $this->fields['email_content_type']['options']['html']        = __('HTML', 'email-reminders');
            $this->fields['email_content_type']['options']['multipart']   = __('Multipart', 'email-reminders');

            $this->fields['email_content_type']['default'] = 'html';
        }



        ////////////////////////////////////////////////////////////////////
        // Help
        ////////////////////////////////////////////////////////////////////

        $this->fields['content_help'] = array(
                                      'type' => 'help'
                                    , 'value' => array()
                                    , 'cols' => 2
                                    , 'group' => 'help'
									, 'css' => ''
                            );
		$fields = array();
		$fields[] = sprintf(
								__( 'You can use (in subject and content of email template) any shortcodes, which you used in the %scontact form%s.', 'email-reminders' )
								, '<a href="' . esc_url( oper_get_settings_url() . '&tab=contact-form' ) . '">', '</a>'
							);
		$fields[] = '<hr/>';
	    $fields[] = '<strong>' . __( 'You can use following shortcodes in content of this template', 'email-reminders' ) . '</strong>';

	    $fields[] = sprintf( __( '%s - inserting your site URL ', 'email-reminders' ), '<code>[siteurl]</code>' );
	    $fields[] = sprintf( __( '%s - inserting title of your site ', 'email-reminders' ), '<code>[blogname]</code>' );
	    $fields[] = sprintf( __( '%s - inserting IP address of the user who made this action ', 'email-reminders' ), '<code>[remote_ip]</code>' );
	    $fields[] = sprintf( __( '%s - inserting contents of the User-Agent: header from the current request, if there is one ', 'email-reminders' ), '<code>[user_agent]</code>' );
	    $fields[] = sprintf( __( '%s - inserting address of the page (if any), where visitor make this action ', 'email-reminders' ), '<code>[request_url]</code>' );
	    $fields[] = sprintf( __( '%s - inserting time of this action ', 'email-reminders' ), '<code>[current_time]</code>' );
	    $fields[] = sprintf( __( '%s - inserting date of this action ', 'email-reminders' ), '<code>[current_date]</code>' );

		// $fields[] = sprintf(__('For example: "You have a new reservation %s on the following date(s): %s Contact information: %s You can approve or cancel this item at: %s Thank you, Reservation service."' , 'email-reminders'),'','[dates]&lt;br/&gt;&lt;br/&gt;','&lt;br/&gt; [content]&lt;br/&gt;&lt;br/&gt;', htmlentities( ' <a href="[moderatelink]">'.__('here' , 'email-reminders').'</a> ') . '&lt;br/&gt;&lt;br/&gt; ');

        foreach ( $fields as $help_fields_key => $help_fields_value ) {
            $this->fields['content_help']['value'][] = $help_fields_value;
        }

    }

}



/** Settings Emails   P a g e  */
class OPER_Settings_Page_Email_EML_RE extends OPER_Page_Structure {

		//Addon Section
		/**
		 *  // For Addon Fix - Remove loading
		public function __construct() {
			$is_show = true;
			$is_show = apply_filters( 'oper_is_show_email_link_user_page', $is_show );
			if ( $is_show )
				parent::__construct();
		}
		*/

    public $email_settings_api = false;


    /** Define interface for  Email API
     *
     * @param string $selected_email_name - name of Email template
     * @param array $init_fields_values - array of init form  fields data
     * @return object Email API
     */
    public function mail_api( $selected_email_name ='',  $init_fields_values = array() ){

        if ( $this->email_settings_api === false ) {
            $this->email_settings_api = new OPER_Emails_API_EML_RE( $selected_email_name , $init_fields_values );
        }

        return $this->email_settings_api;
    }


    public function in_page() {                                                 // P a g e    t a g
        return 'oper-settings';
    }


    public function tabs() {                                                    // T a b s      A r r a y

        $tabs = array();

        $tabs[ 'email' ] = array(
                              'title'     => __( 'Emails', 'email-reminders')               // Title of TAB
                            , 'page_title'=> __( 'Emails Settings', 'email-reminders')      // Title of Page
                            , 'hint'      => __( 'Emails Settings', 'email-reminders')      // Hint
                            //, 'link'      => ''                                   // Can be skiped,  then generated link based on Page and Tab tags. Or can  be extenral link
                            //, 'position'  => ''                                   // 'left'  ||  'right'  ||  ''
                            //, 'css_classes'=> ''                                  // CSS class(es)
                            //, 'icon'      => ''                                   // Icon - link to the real PNG img
                            , 'font_icon' => 'glyphicon glyphicon-envelope'         // CSS definition  of forn Icon
                            //, 'default'   => false                                // Is this tab activated by default or not: true || false.
                            //, 'disabled'  => false                                // Is this tab disbaled: true || false.
                            //, 'hided'     => false                                // Is this tab hided: true || false.
                            , 'subtabs'   => array()
                    );

        $subtabs = array();


        $is_data_exist = get_oper_option( OPER_EMAIL_EML_RE_PREFIX . OPER_EMAIL_EML_RE_ID );           // ''oper_email_' - defined in api-emails.php  file.
        if (  ( ! empty( $is_data_exist ) ) && ( isset( $is_data_exist['enabled'] ) ) && ( $is_data_exist['enabled'] == 'On' )  )
            $icon = '<i class="menu_icon icon-1x glyphicon glyphicon-check"></i> &nbsp; ';
        else
            $icon = '<i class="menu_icon icon-1x glyphicon glyphicon-unchecked"></i> &nbsp; ';

          if (  ( ! empty( $is_data_exist ) ) && ( isset( $is_data_exist['copy_to_admin'] ) ) && ( $is_data_exist['copy_to_admin'] == 'On' )  )
            $sufix = '<sup> 2</sup>';
        else
            $sufix = '';

        $subtabs['eml-reminders'] = array(
                            'type' => 'subtab'                                  // Required| Possible values:  'subtab' | 'separator' | 'button' | 'goto-link' | 'html'
                            , 'title' =>  $icon .  ( ( OPER_EMAIL_EML_RE_ID == 'eml_reminders' ) ? __('Default' , 'email-reminders') : OPER_EMAIL_EML_RE_ID )  . $sufix     // Title of TAB
                            , 'page_title' => __('Emails Settings', 'email-reminders')  // Title of Page
                            , 'hint' => __('Email that sends to user' , 'email-reminders')   // Hint
                            , 'link' => ''                                      // link
                            , 'position' => ''                                  // 'left'  ||  'right'  ||  ''
                            , 'css_classes' => ''                               // CSS class(es)
                            //, 'icon' => 'http://.../icon.png'                 // Icon - link to the real PNG img
                            //, 'font_icon' => 'glyphicon glyphicon-envelope'   // CSS definition of Font Icon
                            , 'default' =>  true                                // Is this sub tab activated by default or not: true || false.
                            , 'disabled' => false                               // Is this sub tab deactivated: true || false.
                            , 'checkbox'  => false                              // or definition array  for specific checkbox: array( 'checked' => true, 'name' => 'feature1_active_status' )   //, 'checkbox'  => array( 'checked' => $is_checked, 'name' => 'enabled_active_status' )
                            , 'content' => 'content'                            // Function to load as conten of this TAB
                        );

        $tabs[ 'email' ]['subtabs'] = $subtabs;

        return $tabs;
    }


	private function show_toolbar(){

		oper_flex_toolbar_sub_html_container_start( 'settings-email-template' );                                      	// Load functionality in Addons via Hooks

			oper_flex_toolbar_group_start( array( 'class' => 'group_nowrap' ) );


			oper_flex_toolbar_group_end();

		oper_flex_toolbar_sub_html_container_end( 'settings-email-template' );                                        	// Load functionality in Addons via Hooks
	}


    /** Show Content of Settings page */
    public function content() {
//debuge( 'OPER_EMAIL_EML_RE_PREFIX . OPER_EMAIL_EML_RE_ID, get_oper_option( OPER_EMAIL_EML_RE_PREFIX . OPER_EMAIL_EML_RE_ID )', OPER_EMAIL_EML_RE_PREFIX . OPER_EMAIL_EML_RE_ID, get_oper_option( OPER_EMAIL_EML_RE_PREFIX . OPER_EMAIL_EML_RE_ID ) );

        $this->css();
		$this->js();

        ////////////////////////////////////////////////////////////////////////
        // Checking
        ////////////////////////////////////////////////////////////////////////

        do_action( 'oper_hook_settings_page_header', array( 'page' => $this->in_page(), 'subpage' => 'emails_settings' ) );	// Define Notices Section and show some static messages, if needed.

	    /**
	     * Default Email template is get_oper_option( 'oper_email_' . 'eml_reminders' );

		    Array (
					[enabled] => On
					[copy_to_admin] => On
					[from] => info@clientsmanager.com
					[from_name] => John Smith Support
					[subject] => Delivery of [product_title] [product_version]
					[content] => 		Hello.
										Thank you for requesting [product_title] [product_version]

										To download [product_description] click the link below:
										---
										[product_summary] - [product_expire_date]
										---

										Thank you, [siteurl]
										[current_date] [current_time]
					[header_content] =>
					[footer_content] =>
					[template_file] => plain
					[base_color] => #557da1
					[background_color] => #f5f5f5
					[body_color] => #fdfdfd
					[text_color] => #505050
					[email_content_type] => html
				)
	     */

	    /**
		//debuge( get_oper_option( 'oper_email_' . 'eml_reminders' ) );

// debuge( maybe_unserialize( get_oper_option( 'oper_email_template__custom_emails' ) ) );
// debuge( maybe_unserialize( 		get_oper_option( 'oper_contact_form__custom_forms' )  ));
//
// $all__custom_forms = maybe_unserialize( get_oper_option( 'oper_contact_form__custom_forms' ) );
// $custom_form_name_slug = 'new_test_form_gere';
// debuge( $custom_form_name_slug, (int)  ( isset( $all__custom_forms[ $custom_form_name_slug ] ) )     );
*/

        ////////////////////////////////////////////////////////////////////////
        // Load Data
        ////////////////////////////////////////////////////////////////////////

        /**             Its will  load DATA from DB,  during creattion mail_api CLASS
         *              during initial activation  of the API  its try  to get option  from DB
         *              We need to define this API before checking POST, to know all available fields
         *              Define Email Name & define field values from DB, if not exist, then default values.
            Array (
                    [oper_email_eml_reminders] => Array
                                                (
                                                    [enabled] => On
                                                    [to] => beta@oplugins.com
                                                    [to_name] => 'Some name'
                                                    [from] => admin@oplugins.com
                                                    [from_name] =>
                                                    [subject] => New item
                                                    [content] => You need to approve [shortcodetype] for: [dates]...
                                                    [header_content] =>
                                                    [footer_content] =>
                                                    [template_file] => plain
                                                    [base_color] => #557da1
                                                    [background_color] => #f5f5f5
                                                    [body_color] => #fdfdfd
                                                    [text_color] => #505050
                                                    [email_content_type] => html
                                                )
        )

        // $mail_api->save_to_db( $fields_values );
        */
        $init_fields_values = array();

        $this->mail_api( OPER_EMAIL_EML_RE_ID, $init_fields_values );


        ////////////////////////////////////////////////////////////////////////
        //  S u b m i t   Actions  -  S e n d
        ////////////////////////////////////////////////////////////////////////

        $submit_form_name_action = 'oper_form_action';                                      // Define form name
        if ( isset( $_POST['is_form_sbmitted_'. $submit_form_name_action ] ) ) {

            // Nonce checking    {Return false if invalid, 1 if generated between, 0-12 hours ago, 2 if generated between 12-24 hours ago. }
            $nonce_gen_time = check_admin_referer( 'oper_settings_page_' . $submit_form_name_action );  // Its stop show anything on submiting, if its not refear to the original page

            // Save Changes
            $this->update_actions();
        }
        ?>
        <form  name="<?php echo $submit_form_name_action; ?>" id="<?php echo $submit_form_name_action; ?>" action="" method="post" autocomplete="off">
           <?php
              // N o n c e   field, and key for checking   S u b m i t
              wp_nonce_field( 'oper_settings_page_' . $submit_form_name_action );
           ?><input type="hidden" name="is_form_sbmitted_<?php echo $submit_form_name_action; ?>" id="is_form_sbmitted_<?php echo $submit_form_name_action; ?>" value="1" />
			 <!-- Field for sending test email -->
             <input type="hidden" name="form_action" id="form_action" value="" />
			 <!-- Fields for Creation New Email Template -->
             <input type="hidden" name="oper_action" id="oper_action" value="" />
             <input type="hidden" name="oper_email_template__new_name" id="oper_email_template__new_name" value="" />
        </form>
        <?php


        ////////////////////////////////////////////////////////////////////////
        //  S u b m i t   Main Form
        ////////////////////////////////////////////////////////////////////////

        $submit_form_name = 'oper_emails_template';                             // Define form name

        $this->mail_api()->validated_form_id = $submit_form_name;               // Define ID of Form for ability to  validate fields before submit.

        if ( isset( $_POST['is_form_sbmitted_'. $submit_form_name ] ) ) {

            // Nonce checking    {Return false if invalid, 1 if generated between, 0-12 hours ago, 2 if generated between 12-24 hours ago. }
            $nonce_gen_time = check_admin_referer( 'oper_settings_page_' . $submit_form_name );  // Its stop show anything on submiting, if its not refear to the original page

            // Save Changes
            $this->update();
        }


        ////////////////////////////////////////////////////////////////////////
        // JavaScript: Tooltips, Popover, Datepick (js & css)
        ////////////////////////////////////////////////////////////////////////

        echo '<span class="wpdevelop">';

        oper_js_for_items_page();

        echo '</span>';

		////////////////////////////////////////////////////////////////////////
		// Toolbar /////////////////////////////////////////////////////////////
		$this->show_toolbar();		//Addon Section

        ////////////////////////////////////////////////////////////////////////
        // Content
        ////////////////////////////////////////////////////////////////////////
        ?>
        <div class="clear" style="margin-bottom:10px;"></div>

        <span class="metabox-holder">

            <form  name="<?php echo $submit_form_name; ?>" id="<?php echo $submit_form_name; ?>" action="" method="post" autocomplete="off">
                <?php
                   // N o n c e   field, and key for checking   S u b m i t
                   wp_nonce_field( 'oper_settings_page_' . $submit_form_name );
                ?><input type="hidden" name="is_form_sbmitted_<?php echo $submit_form_name; ?>" id="is_form_sbmitted_<?php echo $submit_form_name; ?>" value="1" />


                <div class="clear"></div>
                <div class="metabox-holder">

                    <div class="oper_settings_row oper_settings_row_left" >
                    <?php

                        oper_open_meta_box_section( $submit_form_name . 'general', __('Email that sends to user', 'email-reminders')   );

                            $this->mail_api()->show( 'general' );

                        oper_close_meta_box_section();


                        oper_open_meta_box_section( $submit_form_name . 'parts' , __('Header / Footer', 'email-reminders') );

                            $this->mail_api()->show( 'parts' );

                        oper_close_meta_box_section();


                        oper_open_meta_box_section( $submit_form_name . 'style' , __('Email Styles', 'email-reminders') );

                            $this->mail_api()->show( 'style' );

                        oper_close_meta_box_section();

                    ?>
                    </div>

                    <div class="oper_settings_row oper_settings_row_right">
                    <?php

                        oper_open_meta_box_section( $submit_form_name . 'actions', __('Actions', 'email-reminders') );

                            ?><a class="button button-secondary" style="margin:0 0 5px;" href="javascript:void(0)"
                                 onclick="javascript: jQuery('#form_action').val('test_send'); jQuery('form#<?php echo $submit_form_name_action; ?>').trigger( 'submit' );"
                                ><?php _e('Send Test Email', 'email-reminders'); ?></a><?php

                            ?><input type="submit" value="<?php _e('Save Changes', 'email-reminders'); ?>" class="button button-primary right" style="margin:0 0 5px 5px;" /><?php

                            /* ?>
                            <a class="button button-secondary" href="javascript:void(0)" ><?php _e('Preview Email', 'email-reminders'); ?></a>
                            <hr />
                            <a  class="button button-secondary right"
                                href="javascript:void(0)"
                                onclick="javascript: if ( oper_are_you_sure('<?php echo esc_js(__('Do you really want to delete this item?', 'email-reminders')); ?>') ){
                                                         jQuery('#form_action').val('delete');
                                                         jQuery('form#<?php echo $submit_form_name_action; ?>').trigger( 'submit' );
                                                     }"
                                ><?php _e('Delete Email', 'email-reminders'); ?></a>
                             <?php */

                            ?><div class="clear"></div><?php

                        oper_close_meta_box_section();

                        oper_open_meta_box_section( $submit_form_name . 'email_content_type', __('Type', 'email-reminders') );

                            $this->mail_api()->show( 'email_content_type' );

                        oper_close_meta_box_section();


                        oper_open_meta_box_section( $submit_form_name . 'help', __('Help', 'email-reminders') );

                            $this->mail_api()->show( 'help' );

                        oper_close_meta_box_section();

                    ?>
                    </div>
                    <div class="clear"></div>
                </div>

                <input type="submit" value="<?php _e('Save Changes', 'email-reminders'); ?>" class="button button-primary" />
            </form>
        </span>
        <?php

        $this->enqueue_js();

        do_action( 'oper_hook_settings_page_footer', 'oper_settings_email_template' );
    }


    /**
     * Update form  from Toolbar - create / delete/ load email templates
     *
     * @return boolean
     */
    public function update_actions(  ) {


        if ( $_POST['form_action'] == 'test_send' ) {                           // Sending test  email

            /*
            $this->email_settings_api = false;
            $selected_email_name = 'standard';
            $email_fields = get_oper_option( 'oper_email_' . $selected_email_name );
            $this->mail_api( $selected_email_name, $email_fields );
            */


            //$to = sanitize_email( $this->mail_api()->fields_values['to'] );

            $replace = array();
			$replace[ 'product_id' ] = '<strong>99</strong>';
			$replace[ 'product_title' ] = '<strong>Product ZZZ</strong>';
			$replace[ 'product_version' ] = '<strong>1.0</strong>';
			$replace[ 'product_description' ] = 'Product ZZZ Info';
			$replace[ 'product_filename' ] = 'zzz_product.zip';
			$replace[ 'product_link' ] = home_url();
			$replace[ 'product_size' ] = '3 Mb';
			$replace[ 'product_expire_after' ] = '1 day';
			$replace[ 'product_expire_date' ] = date_i18n( get_oper_option( 'oper_date_format' ) . ' ' . get_oper_option( 'oper_time_format' ), strtotime( '+1 day' ) );
			$replace[ 'product_summary' ] = '<a href="">' . $replace[ 'product_filename' ] . '</a> (' . $replace[ 'product_size' ] . ')  ~ expire in ' . $replace[ 'product_expire_after' ];

			$replace[ 'link_sent_to' ] = $this->mail_api()->get_from__email_address();

			$replace[ 'siteurl' ] = htmlspecialchars_decode( '<a href="' . home_url() . '">' . home_url() . '</a>' );
			$replace[ 'remote_ip' ] = oper_get_user_ip();												// The IP address from which the user is viewing the current page.
			$replace[ 'user_agent' ] = $_SERVER[ 'HTTP_USER_AGENT' ];									// Contents of the User-Agent: header from the current request, if there is one.
			$replace[ 'request_url' ] = $_SERVER[ 'HTTP_REFERER' ];										// The address of the page (if any) where action was occured. Because we are sending it in Ajax request, we need to use the REFERER HTTP
			$replace[ 'current_date' ] = date_i18n( get_oper_option( 'oper_date_format' ) );
			$replace[ 'current_time' ] = date_i18n( get_oper_option( 'oper_time_format' ) );



			$to = $this->mail_api()->get_from__email_address();
            $to_name = $this->mail_api()->get_from__name();
            $to = trim(  $to_name ) . ' <' .  $to . '> ';

            $email_result = $this->mail_api()->send( $to , $replace );

            if ( $email_result )
                oper_show_message ( __('Email sent to ', 'email-reminders') . ' ' . $this->mail_api()->get_from__email_address() , 5 );
            else
                oper_show_message ( __('Email had not sent. Some error occurred.', 'email-reminders'), 5 ,'error' );
        }

        do_action( 'oper_settings_page_update', 'oper_settings_email_template' );										// Useful for Addon	-	Create new custom email template


        /*
        if ( $_POST['form_action'] == 'create' ) {                              // Create

            $email_title = sanitize_text_field( $_POST['create_email_template'] );
            $email_name = oper_get_slug_format_4_option_name( $email_title );

            $oper_email_tpl_names = get_oper_option( 'oper_email_tpl_names' );
            if ( empty( $oper_email_tpl_names ) )  $oper_email_tpl_names = array();


            if ( empty($email_name) || isset( $oper_email_tpl_names[ $email_name ] ) ) {      // Error
                oper_show_message ( __('Email template has not added.', 'email-reminders'), 5 , 'error' );
                return false;
            }

            $oper_email_tpl_names[ $email_name ]= stripslashes( $email_title );

            update_oper_option( 'oper_email_tpl_names', $oper_email_tpl_names );

            oper_show_message ( __('Email template added successfully', 'email-reminders'), 5 );                                               // Show Save message

            $redir = esc_url( add_query_arg( array('email_template' => $email_name ), html_entity_decode( $this->getUrl() ) ) );

            oper_reload_page_by_js( $redir );

            return true;
        }

        if ( $_POST['form_action'] == 'delete' ) {                              // Delete
            $email_name = sanitize_text_field( $_POST['select_email_template'] );

            $oper_email_tpl_names = get_oper_option( 'oper_email_tpl_names' );
            if ( empty( $oper_email_tpl_names ) )  $oper_email_tpl_names = array();

            if ( ! isset( $oper_email_tpl_names[ $email_name ] ) ) {            // Error
                oper_show_message ( __('Email template does not exist.', 'email-reminders'), 5 , 'error' );
                return false;
            }

            unset($oper_email_tpl_names[ $email_name ]);                        // Remove Email  name from list of email names
            update_oper_option( 'oper_email_tpl_names', $oper_email_tpl_names );

            delete_oper_option( 'oper_email_' . $email_name );                  // Delete Email Template

            oper_show_message ( __('Email template deleted successfully', 'email-reminders'), 5 );                                     // Show Save message


            $redir = esc_url( remove_query_arg( array( 'email_template' ), html_entity_decode( $this->getUrl() ) ) );       // Load standard email template

            oper_reload_page_by_js( $redir );

            return true;

        }

        if ( $_POST['form_action'] == 'load' ) {                                // Load

            $oper_email_tpl_names = get_oper_option( 'oper_email_tpl_names' );
            if ( empty( $oper_email_tpl_names ) )  $oper_email_tpl_names = array();

            if ( ! isset( $oper_email_tpl_names[ $_POST['select_email_template'] ] ) ) {             // Error
                oper_show_message ( __('Email template does not exist.', 'email-reminders'), 5 , 'error' );
                return false;
            }

        }
        */
    }


    /** Update Email template to DB */
    public function update() {

        // Get Validated Email fields
        $validated_fields = $this->mail_api()->validate_post();

		// Remove <p> at begining and </p> at END of email template.
		if (
				( substr( $validated_fields['content'], 0, 3) === '<p>' )
			&&  ( substr( $validated_fields['content'], -4 ) === '</p>' )
			) {
			$validated_fields['content'] = substr ( $validated_fields['content'], 3, ( strlen ( $validated_fields['content'] ) - 7 ) );
		}

		$validated_fields['name'] = OPER_EMAIL_EML_RE_ID;

        $this->mail_api()->save_to_db( $validated_fields );

        oper_show_message ( __('Settings saved.', 'email-reminders'), 5 );              // Show Save message
    }

    // <editor-fold     defaultstate="collapsed"                        desc=" CSS & JS  "  >

    /** CSS for this page */
    private function css() {
        ?>
        <style type="text/css">
            .oper-help-message {
                border:none;
                margin:0 !important;
                padding:0 !important;
            }
			.oper-help-message p{
				font-size: 14px;
				line-height: 2em;
			}
            @media (max-width: 399px) {
            }
        </style>
        <?php
    }



	private function js() {
    	//Addon Section
		?>
		<script type="text/javascript">
			function oper_ce_change_ce_name( selectObj ){

				var idx = selectObj.selectedIndex;
				var my_form = selectObj.options[ idx ].value;

				var loc = location.href;
				if ( loc.substr( (loc.length - 1), 1 ) == '#' ){
					loc = loc.substr( 0, (loc.length - 1) );
				}

				if ( loc.indexOf( 'email_template_name=' ) == -1 ){
					loc = loc + '&email_template_name=' + my_form;
				} else { // Alredy have this paremeter at URL
					var start = loc.indexOf( '&email_template_name=' );
					var fin = loc.indexOf( '&', (start + 28) );
					if ( fin == -1 ){
						loc = loc.substr( 0, start ) + '&email_template_name=' + my_form;
					} // at the end of row
					else { // at the middle of the row
						var loc1 = loc.substr( 0, start ) + '&email_template_name=' + my_form;//alert(loc)
						loc = loc1 + loc.substr( fin );
					}
				}
				location.href = loc;
			}
		</script>
		<?php
	}



    /**     Add Custon JavaScript - for some specific settings options
     *      Executed After post content, after initial definition of settings,  and possible definition after POST request.
     *
     * @param type $menu_slug
     *
     */
    private function enqueue_js(){                                               // $page_tag, $active_page_tab, $active_page_subtab ) {



        // Check if this correct  page /////////////////////////////////////////////

//        if ( !(
//                   ( $page_tag == 'oper-settings')                              // Load only at 'oper-settings' menu
//                && ( $_GET['tab'] == 'email' )                                  // At ''general' tab
//                && (  ( ! isset( $_GET['subtab'] ) ) || ( $_GET['subtab'] == 'new-admin' )  )
//              )
//          ) return;

        // JavaScript //////////////////////////////////////////////////////////////

        $js_script = '';
        //Show or hide colors section  in settings page depend form  selected email  template.
        $js_script .= " jQuery('select[name=\"eml_reminders_template_file\"]').on( 'change', function(){    
                                if ( jQuery('select[name=\"eml_reminders_template_file\"] option:selected').val() == 'plain' ) {   
                                    jQuery('.template_colors').hide();                                    
                                } else {
                                    jQuery('.template_colors').show();                                    
                                }
                            } ); ";
        $js_script .= "\n";                                                     //New Line
        $js_script .= " if ( jQuery('select[name=\"eml_reminders_template_file\"] option:selected').val() == 'plain' ) {   
                            jQuery('.template_colors').hide();                                    
                        } ";

        // Show Warning messages if Title (optional) is empty - title of email  will be "WordPress
        $js_script .= " jQuery(document).ready(function(){ ";
        $js_script .= "     if (  jQuery('#eml_reminders_to_name').val() == ''  ) {";
        $js_script .= "         jQuery('#eml_reminders_to_name').parent().append('<div class=\'updated\' style=\'border-left-color:#ffb900;padding:5px 10px;\'>". esc_js(__('If empty then title defined as WordPress', 'email-reminders'))."</div>')";
        $js_script .= "     }";
        $js_script .= "     if (  jQuery('#". OPER_EMAIL_EML_RE_ID ."_name').val() == ''  ) {";
        $js_script .= "         jQuery('#". OPER_EMAIL_EML_RE_ID ."_name').parent().append('<div class=\'updated\' style=\'border-left-color:#ffb900;padding:5px 10px;\'>". esc_js(__('If empty then title defined as WordPress', 'email-reminders'))."</div>')";
        $js_script .= "     }";
        $js_script .= "  }); ";
          // Show Warning messages if "From" Email DNS different from current website DNS
        $js_script .= " jQuery(document).ready(function(){ ";

        $js_script .= "     var oper_email_from = jQuery('#". OPER_EMAIL_EML_RE_ID ."_from').val();";    // from@oplugins.com
        $js_script .= "     oper_email_from = oper_email_from.split('@');";             // ['from', 'oplugins.com']
        $js_script .= "     oper_email_from.shift();";                                  // ['oplugins.com']
        $js_script .= "     oper_email_from = oper_email_from.join('');";              // 'oplugins.com'

        $js_script .= "     var oper_website_dns = jQuery(location).attr('hostname');"; // server.com
        $js_script .= "     if ( oper_email_from != oper_website_dns ) {";
        $js_script .= "         jQuery('#". OPER_EMAIL_EML_RE_ID ."_from').parent().append('<div class=\'updated\' style=\'border-left-color:#ffb900;padding:5px 10px;\'>". esc_js(__('Email different from website DNS, its can be a reason of not delivery emails. Please use the email withing the same domain as your website!', 'email-reminders'))."</div>')";
        $js_script .= "     }";

        $js_script .= "  }); ";



        // Eneque JS to  the footer of the page
        oper_enqueue_js( $js_script );
    }


    // </editor-fold>
}
add_action('oper_menu_created',  array( new OPER_Settings_Page_Email_EML_RE() , '__construct') );    // Executed after creation of Menu



	// <editor-fold     defaultstate="collapsed"                        desc=" =  JSS   &   CSS  = "  >

	/**
	 * JSS
	 *
	 * @param $where_to_load
	 */
	function oper_eml_reminders_js_load_files( $where_to_load ) {

		$in_footer = true;

		if (
			   ( ( is_admin() ) && ( in_array( $where_to_load, array( 'admin', 'both' ) ) ) )  // || ( 'client' == $where_to_load )
		){
			// wp_enqueue_script ( 'oper-script-name-id', oper_plugin_url( '/_out/js/live_search.js' ), array( 'oper-global-vars' ), '1.1', $in_footer );
			// wp_localize_script( 'oper-script-name-id', 'oper_global_obj' , array( 'contacts'  => '', 'reminders' => '' ) );			// Usage: 		oper_global_obj.contacts

			wp_enqueue_script( 'oper-eml_reminders_page' , trailingslashit( plugins_url( '', __FILE__ ) ) . 'custom-emails.js'
								, array( 'oper-global-vars' ), '1.1', $in_footer );
		}
	}
	add_action( 'oper_enqueue_js_files', 'oper_eml_reminders_js_load_files', 50 );

	/**
	 * CSS
	 *
	 * @param $where_to_load
	 */
	function oper_eml_reminders_enqueue_css_files( $where_to_load ) {

		if (
			   ( ( is_admin() ) && ( in_array( $where_to_load, array( 'admin', 'both' ) ) ) )  //|| ( 'client' == $where_to_load )
		){

			// wp_enqueue_style( 'oper-contact_form_page', oper_plugin_url( '/includes/listing_contacts/listing_contacts.css' ), array(), OPER_VERSION_NUM );
			wp_enqueue_style( 'oper-eml_reminders_page', trailingslashit( plugins_url( '', __FILE__ ) ) . 'custom-emails.css'
								, array(), OPER_VERSION_NUM );
		}
	}
	add_action( 'oper_enqueue_css_files', 'oper_eml_reminders_enqueue_css_files', 50 );

	// </editor-fold>


// <editor-fold     defaultstate="collapsed"                        desc=" Standard :: Emails Sending After New item "  >

function oper_send_email_to_user_standard( $replace = array(), $email_to = '', $send_copy_to_admin = 'Off' ) {

    ////////////////////////////////////////////////////////////////////////
    // Load Data
    ////////////////////////////////////////////////////////////////////////

    /* Check if New Email Template   Exist or NOT
     * Exist     -  return  empty array in format: array( OPTION_NAME => array() )
     *              Its will  load DATA from DB,  during creattion mail_api CLASS
     *              during initial activation  of the API  its try  to get option  from DB
     *              We need to define this API before checking POST, to know all available fields
     *              Define Email Name & define field values from DB, if not exist, then default values.
     * Not Exist -  import Old Data from DB
     *              or get "default" data from settings and return array with  this data
     *              This data its initial  parameters for definition fields in mail_api CLASS
     *
     */

    $init_fields_values = array();//oper_import6_email__eml_reminders__get_fields_array_for_activation();

    // Get Value of first element - array of default or imported OLD data,  because need only  array  of values without key - name of options for wp_options table
    //$init_fields_values = array_shift( array_values( $init_fields_values ) );

    $mail_api = new OPER_Emails_API_EML_RE( OPER_EMAIL_EML_RE_ID, $init_fields_values );

    ////////////////////////////////////////////////////////////////////////////

	if ( $mail_api->fields_values['enabled'] == 'Off' ) {
		// return false;	// Email  template deactivated - exit.
		return new WP_Error( 'email_not_send', __( "Email template have note been enabled", "email-reminders" ) );
	}

	add_filter( 'oper_email_api_is_allow_send_copy' , 'oper_email_api_is_allow_send_copy_block' , 10, 3);

	if ( ! empty( $replace['to'] ) ) {
		$valid_email = sanitize_email( $replace['to'] );
	}
	if ( ! empty( $email_to ) ) {
		$valid_email = sanitize_email( $email_to );
	}
	if ( empty( $valid_email ) ) {
		//   return false;    //return $mail_api;
		return new WP_Error( 'email_not_send', sprintf( __( "Email %s is not valid", "email-reminders" ), $valid_email ) );
	}

	if ( ! empty( $replace['to_name'] ) ) {
		$email_to_name = trim( wp_specialchars_decode( esc_html( stripslashes( $replace['to_name'] ) ), ENT_QUOTES ) );
	} else {
		$email_to_name = '';
	}

    $to = $email_to_name . ' <' .  $valid_email . '> ';

    $email_result = $mail_api->send( $to , $replace );

    // Send copy  of email  to  admin  also to  "From" email address
    if ( $send_copy_to_admin == 'On') {
        $subject = $mail_api->get_field_value('subject');
        $mail_api->set_field_value('subject', __('Email copy to', 'email-reminders') . ': ' . $valid_email . ' ' . $subject );
        $email_result = $mail_api->send( $mail_api->get_from__email_address() , $replace );
        $mail_api->set_field_value('subject', $subject );
    }

//debuge( (int) $email_result, $to , $replace);
    return $mail_api;
}


/** Block  Sending copy of email to  Admin,  based on OPER_Emails_API interface,  instead of that  we will sent it manually  from oper_send_email_to_user_notification function
 *
 * @param boolean $is_send_email
 * @param type $id
 * @param type $fields_values
 * @return boolean
 */
function oper_email_api_is_allow_send_copy_block( $is_send_email, $id, $fields_values ) {
	$is_send_email = false;
	return $is_send_email;
}
// </editor-fold>