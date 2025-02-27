<?php
/**
 * @version     1.0
 * @package     General Settings API - Saving different options
 * @category    Settings API
 * @author      wpdevelop
 *
 * @web-site    http://oplugins.com/
 * @email       info@oplugins.com 
 * @modified    2016-02-24
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly


// General Settings API - Saving different options
class  OPER_Settings_API_General extends OPER_Settings_API {
    

    /**  Override Settings API Constructor
     *   During creation,  system try to load values from DB, if exist.
     * 
     *  @param type $id - of Settings
     */
    public function __construct( $id = '' ){
          
        $options = array( 
                        'db_prefix_option' => ''                                // 'oper_'
                      , 'db_saving_type'   => 'separate' 
                      , 'id'               => 'set_gen'
            ); 
        
        $id = empty($id) ? $options['id'] : $id;
                
        parent::__construct( $id, $options );                                   // Define ID of Setting page and options
                
        add_action( 'oper_after_settings_content', array($this, 'enqueue_js'), 10, 3 );
    }

    
    /** Init all fields rows for settings page */
    public function init_settings_fields() {
        
        $this->fields = array();

        $default_options_values = oper_get_default_options();
        
        //                                                                              <editor-fold   defaultstate="collapsed"   desc=" G e n e r a l " >

        //  Extend unavailable booking dates interval - cleaning  //////////////
        $this->fields = apply_filters( 'oper_settings_after_contacts_editing_via', $this->fields, $default_options_values );

		//                                                                              </editor-fold>
		
        //                                                                              <editor-fold   defaultstate="collapsed"   desc=" R e m i n d e r s " >

	    $this->fields = apply_filters( 'oper_settings_before_reminders_section', $this->fields, $default_options_values );   //  Extend settings

        $this->fields['oper_reminders_email_field_name'] = array(
                                  'type'        => 'text'
                                , 'group'       => 'reminders'
                                , 'default'     => $default_options_values['oper_reminders_email_field_name']
                                , 'title'       => __('Email field name', 'email-reminders')
                                , 'description' => sprintf( __('Enter name of email field from  %scontact details%s.' , 'email-reminders')
	                                                            , '<strong><a href="' . oper_get_contacts_url() . '">', '</a></strong>'
                                                            )
													. ' <div class="oper-settings-notice notice-info" style="text-align:left;margin-top:1em;">'
                                                            . '<strong>'. __('Note', '') . '!</strong> '
                                                            . sprintf(
                                                            	        __('This is field will be used to get email address for sending reminder.', 'email-reminders'),
			                                                            '<strong>Textarea</strong>'
                                                                    )
                                                            . '  '
                                                    . '</div>'
                                , 'description_tag' => 'p'
                        );


        $this->fields = apply_filters( 'oper_settings_after_reminders_section', $this->fields, $default_options_values );   //  Extend settings

		//                                                                              </editor-fold>


	    // <editor-fold     defaultstate="collapsed"                        desc=" Contacts "  >


        $this->fields['oper_contacts_labels'] = array(
                          'type'        => 'textarea'
                        , 'group'       => 'contacts'
                        , 'default'     => $default_options_values['oper_contacts_labels']
                        , 'title'       => __('Labels for contacts listing', 'email-reminders')
                        , 'description' =>  sprintf(
		                                           __( 'Enter label name as %scontact field name%s. Enter one label per line.', 'email-reminders' )
		                                           , '<strong><a href="' . oper_get_settings_url() . '&tab=contact-form' . '">', '</a></strong>'
                                           )
	                                        . ' <div class="oper-settings-notice notice-info" style="text-align:left;margin-top:1em;">'
	                                            . '<strong>'. __('Trick', '') . '!</strong> '
	                                            . sprintf(
	                                                        __('Define label colors like this: %s For example: %s', 'email-reminders')
	                                                        , '<code>field_name:background_color:text_color</code><br/>'
	                                                        , '<code>field_name:#EE6F48:#FFFFF</code>'

	                                                    )
	                                        . '</div>'
                        , 'description_tag' => 'p'
	                    , 'css' => 'width:100%'
                );


        $this->fields['oper_contacts_editing_via'] = array(
                          'type'        => 'select'
                        , 'group'       => 'contacts'
                        , 'default' => $default_options_values['oper_contacts_editing_via']
                        , 'options'     => array(
												      'textarea'     => __( 'Textarea', 'email-reminders' )
											        , 'contact-form' => __( 'Custom Form', 'email-reminders' )
                                                )
                        , 'title'       => __('Edit Contacts', 'email-reminders')
                        , 'description' => __('Select way of contacts editing.' , 'email-reminders')
                                           .' '. sprintf(
                                                        __('You can  configure %sCustom Form%s %shere%s', 'email-reminders'),
                                                        '<strong>', '</strong>',
                                                        '<a href="' . oper_get_settings_url() . '&tab=contact-form' . '">', '</a>'
                                                    )
											. ' <div class="oper-settings-notice notice-info" style="text-align:left;margin-top:1em;">'
                                                    . '<strong>'. __('Note', '') . '!</strong> '
                                                    . sprintf(
                                                                __('Its does not possible to use multiple rows in fields values, if selected %s', 'email-reminders'),
	                                                            '<strong>Textarea</strong>'
                                                            )
                                                    . '  '
                                            . '</div>'
                        , 'description_tag' => 'span'
                );


	    // </editor-fold>

        // <editor-fold     defaultstate="collapsed"                        desc=" Miscellaneous "  >
        
    		
		// Dates Format ////////////////////////////////////////////////////////
        $this->fields['oper_date_format_html_prefix'] = array(
                                    'type'          => 'pure_html'
                                    , 'group'       => 'miscellaneous'
                                    , 'html'        => '<tr valign="top" class="oper_tr_set_gen_oper_date_format">
                                                            <th scope="row">'.
                                                                OPER_Settings_API::label_static( 'set_gen_oper_date_format'
                                                                    , array(   'title'=> __('Date Format' , 'email-reminders'), 'label_css' => 'margin: 0.25em 0 !important;vertical-align: middle;' ) )
                                                            .'</th>
                                                            <td><fieldset>'
                            );          
        $field_options = array();
        foreach ( array( __('F j, Y'), 'Y/m/d', 'm/d/Y', 'd/m/Y' ) as $format ) {
            $field_options[ esc_attr($format) ] = array( 'title' => date_i18n( $format ) );
        }
        $field_options['custom'] =  array( 'title' =>  __('Custom' , 'email-reminders') . ':', 'attr' =>  array( 'id' => 'date_format_selection_custom' ) );

        $this->fields['oper_date_format_selection'] = array(
                                    'type'          => 'radio'
                                    , 'default'     => get_option('date_format')
                                    , 'options'     => $field_options
                                    , 'group'       => 'miscellaneous'
                                    , 'only_field'  => true
                            );

        $oper_date_format = get_oper_option( 'oper_date_format');
        $this->fields['oper_date_format'] = array(
                                'type'          => 'text'
                                , 'default'     => $default_options_values['oper_date_format']         //get_option('date_format')
                                , 'value'       => htmlentities( $oper_date_format )      // Display value of this field in specific way
                                , 'group'       => 'miscellaneous'
                                , 'placeholder' => get_option('date_format')
                                , 'css'         => 'width:10em;'
                                , 'only_field'  => true
            );    

        $this->fields['oper_date_format_html_sufix'] = array(
                                    'type'          => 'pure_html'
                                    , 'group'       => 'miscellaneous'
                                    , 'html'        => '          <span class="description"><code>' . date_i18n( $oper_date_format ) . '</code></span>'
                                                                . '<p class="description">' 
                                                                    . sprintf(__('Type your date format for emails and the item table. %sDocumentation on date formatting%s' , 'email-reminders'),'<br/><a href="http://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">','</a>')
                                                            . '   </p>
                                                               </fieldset>
                                                            </td>
                                                        </tr>'            
                            );        
        
        // Time Format
        // $this->fields = apply_filters( 'oper_settings_oper_time_format', $this->fields, $default_options_values );
    
        // Time Format /////////////////////////////////////////////////////////////
        $this->fields['oper_time_format_html_prefix'] = array(
                                    'type'          => 'pure_html'
                                    , 'group'       => 'miscellaneous'
                                    , 'html'        => '<tr valign="top" class="wpbc_tr_set_gen_oper_time_format">
                                                            <th scope="row">'.
                                                                OPER_Settings_API::label_static( 'set_gen_oper_time_format'
                                                                    , array(   'title'=> __('Time Format' ,'email-reminders'), 'label_css' => 'margin: 0.25em 0 !important;vertical-align: middle;' ) )
                                                            .'</th>
                                                            <td><fieldset>'
                            );          
        $field_options = array();
        foreach ( array( 'g:i a', 'g:i A', 'H:i' ) as $format ) {
            $field_options[ esc_attr($format) ] = array( 'title' => date_i18n( $format ) );
        }
        $field_options['custom'] =  array( 'title' =>  __('Custom' ,'email-reminders') . ':', 'attr' =>  array( 'id' => 'time_format_selection_custom' ) );

        $this->fields['oper_time_format_selection'] = array(
                                    'type'          => 'radio'
                                    , 'default'     => 'H:i'
                                    , 'options'     => $field_options
                                    , 'group'       => 'miscellaneous'
                                    , 'only_field'  => true
                            );

        $oper_time_format = get_oper_option( 'oper_time_format');
        $this->fields['oper_time_format'] = array(
                                'type'          => 'text'
                                , 'default'     => $default_options_values['oper_time_format']   //'H:i'
                                , 'value'       => htmlentities( $oper_time_format )      // Display value of this field in specific way
                                , 'group'       => 'miscellaneous'
                                , 'placeholder' => 'H:i'
                                , 'css'         => 'width:5em;' 
                                , 'only_field'  => true
            );    

        $this->fields['oper_time_format_html_sufix'] = array(
                                    'type'          => 'pure_html'
                                    , 'group'       => 'miscellaneous'
                                    , 'html'        => '          <span class="description"><code>' . date_i18n( $oper_time_format ) . '</code></span>'
                                                                . '<p class="description">' 
                                                                    . sprintf(__('Type your time format for emails and the oper table. %sDocumentation on time formatting%s' ,'email-reminders'),'<br/><a href="http://php.net/manual/en/function.date.php" target="_blank">','</a>')
                                                            . '   </p>
                                                               </fieldset>
                                                            </td>
                                                        </tr>'            
                            );        

        // </editor-fold>
                
        
        // <editor-fold     defaultstate="collapsed"                        desc=" Advanced "  >
        
        
        //Show | Hide links for Advanced JavaScript section
	    /*
        $this->fields['oper_advanced_js_loading_settings'] = array(
                                  'type' => 'html'
                                , 'html'  =>  
                                          '<a id="oper_show_advanced_section_link_show" class="oper_expand_section_link" href="javascript:void(0)">+ ' . __('Show advanced settings of JavaScript loading' , 'email-reminders') . '</a>'
                                        . '<a id="oper_show_advanced_section_link_hide" class="oper_expand_section_link" href="javascript:void(0)" style="display:none;">- ' . __('Hide advanced settings of JavaScript loading' , 'email-reminders') . '</a>'
                                , 'cols'  => 2
                                , 'group' => 'advanced'
            );
	    */
		/*
        $this->fields['oper_is_not_load_bs_script_in_client'] = array(
                                'type'          => 'checkbox'
                                , 'default'     => $default_options_values['oper_is_not_load_bs_script_in_client']         //'Off'
                                , 'title'       => __('Disable Bootstrap loading on Front-End' , 'email-reminders')
                                , 'label'       => __(' If your theme or some other plugin is load the BootStrap JavaScripts, you can disable  loading of this script by this plugin.' , 'email-reminders')
                                , 'description' => ''
                                , 'group'       => 'advanced'
                                , 'tr_class'    => 'oper_advanced_js_loading_settings oper_sub_settings_grayed hidden_items'
            );       
		 */
	    /*
        $this->fields['oper_is_not_load_bs_script_in_admin'] = array(
                                'type'          => 'checkbox'
                                , 'default'     => $default_options_values['oper_is_not_load_bs_script_in_admin']         //'Off'
                                , 'title'       => __('Disable Bootstrap loading on Back-End' , 'email-reminders')
                                , 'label'       => __(' If your theme or some other plugin is load the BootStrap JavaScripts, you can disable  loading of this script by this plugin.' , 'email-reminders')
                                , 'description' => ''
                                , 'group'       => 'advanced'
                                , 'tr_class'    => 'oper_advanced_js_loading_settings oper_sub_settings_grayed hidden_items'
            );
	    */
		/*
        $this->fields['hr_calendar_before_is_load_js_css_on_specific_pages'] = array( 'type' => 'hr', 'group' => 'advanced', 'tr_class' => 'oper_advanced_js_loading_settings oper_sub_settings_grayed hidden_items' );
        $this->fields['oper_is_load_js_css_on_specific_pages'] = array(
                                'type'          => 'checkbox'
                                , 'default'     => $default_options_values['oper_is_load_js_css_on_specific_pages']         //'Off'
                                , 'title'       => __('Load JS and CSS files only on specific pages' , 'email-reminders')
                                , 'label'       => __('Activate loading of CSS and JavaScript files of plugin only at specific pages.' , 'email-reminders')
                                , 'description' => ''
                                , 'group'       => 'advanced'
                                , 'tr_class'    => 'oper_advanced_js_loading_settings oper_sub_settings_grayed hidden_items'
                                , 'is_demo_safe' => oper_is_this_demo()
            );       
        $this->fields['oper_pages_for_load_js_css'] = array(
                                'type'          => 'textarea'
                                , 'default'     => $default_options_values['oper_pages_for_load_js_css']         //''
                                , 'placeholder' => '/oper-form/'
                                , 'title'       => __('Relative URLs of pages, where to load plugin CSS and JS files' , 'email-reminders')
                                , 'description' => sprintf(__('Enter relative URLs of pages, where you have Email Reminders elements (item forms or availability calendars). Please enter one URL per line. Example: %s' , 'email-reminders'),'<code>/oper-form/</code>')
                                ,'description_tag' => 'p'
                                , 'css'         => 'width:100%'
                                , 'rows'        => 5
                                , 'group'       => 'advanced'
                                , 'tr_class'    => 'oper_advanced_js_loading_settings oper_is_load_js_css_on_specific_pages oper_sub_settings_grayed hidden_items'
                                , 'is_demo_safe' => oper_is_this_demo()
                        );        
		 */
        if ( oper_is_this_demo() )
            $this->fields['oper_pages_for_load_js_css_demo'] = array( 'group' => 'advanced', 'type' => 'html', 'html' => oper_get_warning_text_in_demo_mode(), 'cols' => 2 , 'tr_class' => 'oper_advanced_js_loading_settings oper_sub_settings_grayed hidden_items' );
        
		
        /*
        // Show settings of powered by notice
`        $this->fields['oper_advanced_powered_by_notice_settings'] = array(
                                  'type' => 'html'
                                , 'html'  =>
                                          '<a id="oper_powered_by_link_show" class="oper_expand_section_link" href="javascript:void(0)">+ ' . __('Show settings of powered by notice' , 'email-reminders') . '</a>'
                                        . '<a id="oper_powered_by_link_hide" class="oper_expand_section_link" href="javascript:void(0)" style="display:none;">- ' . __('Hide settings of powered by notice' , 'email-reminders') . '</a>'
                                , 'cols'  => 2
                                , 'group' => 'advanced'
            );
`
        $this->fields['oper_is_show_powered_by_notice'] = array(
                                'type'          => 'checkbox'
                                , 'default'     => $default_options_values['oper_is_show_powered_by_notice']         //'On'
                                , 'title'       => __('Powered by notice' , 'email-reminders')
                                , 'label'       => sprintf(__(' Turn On/Off powered by "Email Reminders" notice under the calendar.' , 'email-reminders'),'oplugins.com')
                                , 'description' => ''
                                , 'group'       => 'advanced'
                                , 'tr_class'    => 'oper_is_show_powered_by_notice oper_sub_settings_grayed hidden_items'
            );   
		     
		
        $this->fields['oper_oper_copyright_adminpanel'] = array(
                                'type'          => 'checkbox'
                                , 'default'     => $default_options_values['oper_oper_copyright_adminpanel']         //'On'
                                , 'title'       => __('Help and info notices' , 'email-reminders')
                                , 'label'       => sprintf(__(' Turn On/Off version notice and help link to rate plugin at admin panel.' , 'email-reminders'),'oplugins.com')
                                , 'description' => ''
                                , 'group'       => 'advanced'
                                , 'tr_class'    => 'oper_is_show_powered_by_notice oper_sub_settings_grayed hidden_items'
            );       
        */
        if ( ( ! oper_is_this_demo() ) && ( current_user_can( 'activate_plugins' ) ) ) {
        
			
			$this->fields['help_plugin_system_info'] = array(   
							   'type'              => 'help'
							 , 'value'             => '' 
							 , 'class'             => ''
							 , 'css'               => 'margin:0;padding:0;border:0;'
							 , 'description'       => ''
							 , 'cols'              => 2 
							 , 'group'             => 'advanced'
							 , 'tr_class'          => ''
							 , 'description_tag'   => 'p'
							 , 'value' => []
					 ); 
			
            $this->fields['help_plugin_system_info']['value'][] = 
                '<div class="clear"></div><center><a class="button button" href="'
                                                                        . oper_get_settings_url()
                                                                        . '&system_info=show#oper_general_settings_system_info_metabox">'
                                                                                . __('Plugin System Info' , 'email-reminders')
                                                        . '</a></center>';
        }
		
        // </editor-fold>
                                 
        
        // <editor-fold     defaultstate="collapsed"                        desc=" Information "  >
        if (  function_exists( 'oper_get_dashboard_info' ) ) {
            $this->fields['oper_information'] = array(
                               'type'              => 'html'
                             , 'html'              => oper_get_dashboard_info()
                             , 'cols'              => 2
                             , 'group'             => 'information'
                     ); 
        }
        // </editor-fold>

        
        // <editor-fold     defaultstate="collapsed"                        desc=" User permissions for plugin menu pages "  >
        
        
        $this->fields['oper_menu_position'] = array(
                                'type'          => 'select'
                                , 'default'     => 'top'
                                , 'title'       => __('Plugin menu position', 'email-reminders')
                                , 'description' => ''
                                , 'options'     => array(
                                                              'top'     => __('Top', 'email-reminders')
                                                            , 'middle'  => __('Middle', 'email-reminders')
                                                            , 'bottom'  => __('Bottom', 'email-reminders')
                                                        )
                                , 'group'       => 'permissions'
                                , 'is_demo_safe' => oper_is_this_demo()
                        );
        
        $this->fields['oper_user_role_oper_header'] = array(
                                    'type'          => 'pure_html'
                                    , 'group'       => 'permissions'
                                    , 'html'        => '<tr valign="top">
                                                            <th scope="row" colspan="2">
                                                                <hr/><p><strong>' . wp_kses_post(  __('User permissions for plugin menu pages' , 'email-reminders') )  . ':</strong></p>
                                                            </th>
                                                        </tr'
                            );        
        
        $field_options = array();
        $field_options['subscriber']    = translate_user_role('Subscriber');
        $field_options['contributor']   = translate_user_role('Contributor');
        $field_options['author']        = translate_user_role('Author');
        $field_options['editor']        = translate_user_role('Editor');
        $field_options['administrator'] = translate_user_role('Administrator');

        $this->fields['oper_user_role_reminders'] = array(
                                'type'          => 'select'
                                , 'default'     => $default_options_values['oper_user_role_reminders']         //'editor'
                                , 'title'       =>  __( 'Reminders', 'email-reminders' )
                                , 'description' => ''
                                , 'options'     => $field_options
                                , 'group'       => 'permissions'
                                , 'is_demo_safe' => oper_is_this_demo()
                        );
        $this->fields['oper_user_role_contacts'] = array(
                                'type'          => 'select'
                                , 'default'     => $default_options_values['oper_user_role_contacts']         //'editor'
                                , 'title'       =>  __( 'Contacts', 'email-reminders' )
                                , 'description' => ''
                                , 'options'     => $field_options
                                , 'group'       => 'permissions'
                                , 'is_demo_safe' => oper_is_this_demo()
                        );
        $this->fields['oper_user_role_rules'] = array(
                                'type'          => 'select'
                                , 'default'     => $default_options_values['oper_user_role_rules']         //'editor'
                                , 'title'       =>  __( 'Rules', 'email-reminders' )
                                , 'description' => ''
                                , 'options'     => $field_options
                                , 'group'       => 'permissions'
                                , 'is_demo_safe' => oper_is_this_demo()
                        );
        $this->fields['oper_user_role_settings'] = array(
                                'type'          => 'select'
                                , 'default'     => $default_options_values['oper_user_role_settings']         //'administrator'
                                , 'title'       => __('Settings', 'email-reminders')
                                , 'description' => __('Select user access level for the menu pages of plugin' , 'email-reminders')
                                , 'description_tag' => 'p'
                                , 'options'     => $field_options
                                , 'group'       => 'permissions'
                                , 'is_demo_safe' => oper_is_this_demo()
                        );
        
        if ( oper_is_this_demo() )
            $this->fields['oper_user_role_settings_demo'] = array( 'group' => 'permissions', 'type' => 'html', 'html' => oper_get_warning_text_in_demo_mode(), 'cols' => 2 );
        
        
        // </editor-fold>
        
                
        // <editor-fold     defaultstate="collapsed"                        desc=" Uninstall "  >
        $this->fields['oper_is_delete_if_deactive'] = array(
                                'type'          => 'checkbox'
                                , 'default'     => $default_options_values['oper_is_delete_if_deactive']         //'Off'
                                , 'title'       => __('Delete plugin settings, when plugin deactivated' , 'email-reminders')
                                , 'label'       => __('Check this box to delete plugin settings options, when you uninstal this plugin.' , 'email-reminders')
                                , 'description' => ''
                                , 'group'       => 'uninstall'
            );       
        // </editor-fold>
         	    
//debuge($this->fields);die;                
    }      
    

    /**     Add Custon JavaScript - for some specific settings options
     *      Need to executes after showing of entire settings page (on hook: oper_after_settings_content).
     *      After initial definition of settings,  and possible definition after POST request.
     * 
     * @param type $menu_slug
     * 
     */
    public function enqueue_js( $menu_slug, $active_page_tab, $active_page_subtab ) {

        $js_script = '';
        
        // Hide Legend items 
        $js_script .= " 
                        if ( ! jQuery('#set_gen_oper_is_show_legend').is(':checked') ) {   
                            jQuery('.oper_calendar_legend_items').addClass('hidden_items'); 
                        }
                      ";        
        // Hide or Show Legend items on click checkbox
        $js_script .= " jQuery('#set_gen_oper_is_show_legend').on( 'change', function(){    
                                if ( this.checked ) { 
                                    jQuery('.oper_calendar_legend_items').removeClass('hidden_items');
                                } else {
                                    jQuery('.oper_calendar_legend_items').addClass('hidden_items');
                                }
                            } ); ";        
        // Thank you Message or Page
        $js_script .= " 
                        if ( jQuery('#type_of_thank_you_message_message').is(':checked') ) {   
                            jQuery('.oper_calendar_thank_you_page').addClass('hidden_items'); 
                        }
                        if ( jQuery('#type_of_thank_you_message_page').is(':checked') ) {   
                            jQuery('.oper_calendar_thank_you_message').addClass('hidden_items'); 
                        }
                      ";        
        $js_script .= " jQuery('input[name=\"set_gen_oper_type_of_thank_you_message\"]').on( 'change', function(){    
                                if ( jQuery('#type_of_thank_you_message_message').is(':checked') ) {   
                                    jQuery('.oper_calendar_thank_you_message').removeClass('hidden_items');
                                    jQuery('.oper_calendar_thank_you_page').addClass('hidden_items'); 
                                } else {
                                    jQuery('.oper_calendar_thank_you_message').addClass('hidden_items');
                                    jQuery('.oper_calendar_thank_you_page').removeClass('hidden_items'); 
                                }
                            } ); ";    
        
        // Default calendar view mode (Item Listing) - set  active / inctive options depend from  resource selection.
        $js_script .= " jQuery('#set_gen_oper_view_days_num').on( 'focus', function(){    
                            if ( jQuery('#set_gen_oper_default_oper_resource').length > 0 ) {
                                jQuery('#set_gen_oper_default_oper_resource').on( 'change', function() {
                                    jQuery('#set_gen_oper_view_days_num option:eq(2)').prop('selected', true);
                                });
                                if ( jQuery('#set_gen_oper_default_oper_resource').val() == '' ) { 
                                    jQuery('#set_gen_oper_view_days_num option:eq(0)').prop('disabled', false);
                                    jQuery('#set_gen_oper_view_days_num option:eq(1)').prop('disabled', false);
                                    jQuery('#set_gen_oper_view_days_num option:eq(2)').prop('disabled', false);
                                    jQuery('#set_gen_oper_view_days_num option:eq(3)').prop('disabled', false);
                                    jQuery('#set_gen_oper_view_days_num option:eq(4)').prop('disabled', true);
                                    jQuery('#set_gen_oper_view_days_num option:eq(5)').prop('disabled', true);
                                } else {
                                    jQuery('#set_gen_oper_view_days_num option:eq(0)').prop('disabled', true);
                                    jQuery('#set_gen_oper_view_days_num option:eq(1)').prop('disabled', true);
                                    jQuery('#set_gen_oper_view_days_num option:eq(2)').prop('disabled', false);
                                    jQuery('#set_gen_oper_view_days_num option:eq(3)').prop('disabled', true);
                                    jQuery('#set_gen_oper_view_days_num option:eq(4)').prop('disabled', false);
                                    jQuery('#set_gen_oper_view_days_num option:eq(5)').prop('disabled', false);                                                                
                                }
                            }
                        } ); ";        
        
        ////////////////////////////////////////////////////////////////////////
        // Set  correct  value for dates format,  depend from selection of radio buttons
        $oper_date_format = get_oper_option( 'oper_date_format');
        // On initial Load set correct text value and correct radio button
        $js_script .= " 
                        // Select by  default Custom  value, later  check all other predefined values
                        jQuery( '#date_format_selection_custom' ).prop('checked', true);

                        jQuery('input[name=\"set_gen_oper_date_format_selection\"]').each(function() {
                           var radio_button_value = jQuery( this ).val()
                           var encodedStr = radio_button_value.replace(/[\u00A0-\u9999<>\&]/gim, function(i) {
                                                                                        return '&#'+i.charCodeAt(0)+';';
                                                                                    });
                           if ( encodedStr == '". $oper_date_format ."' ) {
                                jQuery( this ).prop('checked', true);                     
                           }
                        });
                        
                        jQuery('#set_gen_oper_date_format').val('". $oper_date_format ."');
                        ";
        // On click Radio button "Date Format", - set value in custom Text field
        $js_script .= " jQuery('input[name=\"set_gen_oper_date_format_selection\"]').on( 'change', function(){    
                                if (  ( this.checked ) && ( jQuery(this).val() != 'custom' )  ){ 

                                    jQuery('#set_gen_oper_date_format').val( jQuery(this).val().replace(/[\u00A0-\u9999<>\&]/gim, 
                                        function(i) {
                                            return '&#'+i.charCodeAt(0)+';';
                                        }) 
                                    );
                                }                            
                            } ); "; 
        // If we edit custom "Date Format" Text  field - select Custom Radio button.                                 
        $js_script .= " jQuery('#set_gen_oper_date_format').on( 'change', function(){                                              
                                jQuery( '#date_format_selection_custom' ).prop('checked', true);
                            } ); ";        
        
        
        

        ////////////////////////////////////////////////////////////////////////
        // Set  correct  value for Time Format,  depend from selection of radio buttons
        $oper_time_format = get_oper_option( 'oper_time_format');
        // Function  to  load on initial stage of page loading, set correct value of text and select correct radio button.
        $js_script .= " 
                        // Select by  default Custom  value, later  check all other predefined values
                        jQuery( '#time_format_selection_custom' ).prop('checked', true);

                        jQuery('input[name=\"set_gen_oper_time_format_selection\"]').each(function() {
                           var radio_button_value = jQuery( this ).val()
                           var encodedStr = radio_button_value.replace(/[\u00A0-\u9999<>\&]/gim, function(i) {
                                                                                        return '&#'+i.charCodeAt(0)+';';
                                                                                    });
                           if ( encodedStr == '". $oper_time_format ."' ) {
                                jQuery( this ).prop('checked', true);                     
                           }
                        });

                        jQuery('#set_gen_oper_time_format').val('". $oper_time_format ."');
                        ";
        // On click Radio button "Time Format", - set value in custom Text field
        $js_script .= " jQuery('input[name=\"set_gen_oper_time_format_selection\"]').on( 'change', function(){    
                                if (  ( this.checked ) && ( jQuery(this).val() != 'custom' )  ){ 

                                    jQuery('#set_gen_oper_time_format').val( jQuery(this).val().replace(/[\u00A0-\u9999<>\&]/gim, 
                                        function(i) {
                                            return '&#'+i.charCodeAt(0)+';';
                                        }) 
                                    );
                                }                            
                            } ); "; 
        // If we edit custom "Time Format" Text  field - select Custom Radio button.                                 
        $js_script .= " jQuery('#set_gen_oper_time_format').on( 'change', function(){                                              
                                jQuery( '#time_format_selection_custom' ).prop('checked', true);
                            } ); ";        

		
        ////////////////////////////////////////////////////////////////////////
        // Advanced section
        ////////////////////////////////////////////////////////////////////////
        
        // Click on "Allow unlimited items per same day(s)"
        $js_script .= " jQuery('#set_gen_oper_is_days_always_available').on( 'change', function(){    
                            if ( this.checked ) { 
                                var answer = confirm('"                 
                                              . esc_js( __( 'Warning', 'email-reminders') ) . '! '
                                              . esc_js( __( 'You allow unlimited number of items per same dates, its can be a reason of double items on the same date. Do you really want to do this?', 'email-reminders') )
                                      .  "' );  
                                if ( answer) { 
                                    this.checked = true;   
                                    jQuery('#set_gen_oper_check_on_server_if_dates_free').prop('checked', false );                                    
                                    jQuery('#set_gen_oper_is_show_pending_days_as_available').prop('checked', false );            
                                    jQuery('.oper_pending_days_as_available_sub_settings').addClass('hidden_items'); 
                                } else { 
                                    this.checked = false; 
                                } 
                            }                            
                        } ); ";   
        // Click on "Checking to prevent double item, during submitting item"
        $js_script .= " jQuery('#set_gen_oper_check_on_server_if_dates_free').on( 'change', function(){    
                            if ( this.checked ) { 
                                var answer = confirm('"                 
                                              . esc_js( __( 'Warning', 'email-reminders') ) . '! '
                                              . esc_js( __( 'This feature can impact to speed of submitting item. Do you really want to do this?', 'email-reminders') )
                                      .  "' );  
                                if ( answer) { 
                                    this.checked = true;   
                                    jQuery('#set_gen_oper_is_days_always_available').prop('checked', false );
                                } else { 
                                    this.checked = false; 
                                } 
                            }                            
                        } ); ";   
        
        // Click  on Show Advanced JavaScript section  link
        $js_script .= " jQuery('#oper_show_advanced_section_link_show').on( 'click', function(){                                 
                            jQuery('#oper_show_advanced_section_link_show').toggle(200);                            
                            jQuery('#oper_show_advanced_section_link_hide').animate( {opacity: 1}, 200 ).slideToggle(200);     
                            jQuery('.oper_advanced_js_loading_settings').removeClass('hidden_items'); 
                            
                            if ( ! jQuery('#set_gen_oper_is_load_js_css_on_specific_pages').is(':checked') ) {   
                                jQuery('.oper_is_load_js_css_on_specific_pages').addClass('hidden_items'); 
                            }
                        } ); ";   
        $js_script .= " jQuery('#oper_show_advanced_section_link_hide').on( 'click', function(){    
                            jQuery('#oper_show_advanced_section_link_hide').toggle(200);                            
                            jQuery('#oper_show_advanced_section_link_show').animate( {opacity: 1}, 200 ).slideToggle(200);                        
                            jQuery('.oper_advanced_js_loading_settings').addClass('hidden_items'); 
                        } ); ";   
        // Click on "is_not_load_bs_script_in_client"
        $js_script .= " jQuery('#set_gen_oper_is_not_load_bs_script_in_client, #set_gen_oper_is_not_load_bs_script_in_admin').on( 'change', function(){    
                            if ( this.checked ) { 
                                var answer = confirm('"                 
                                              . esc_js( __( 'Warning', 'email-reminders') ) . '! '
                                              . esc_js( __( 'You are need to be sure what you are doing. You are disable of loading some JavaScripts Do you really want to do this?', 'email-reminders') )
                                      .  "' );  
                                if ( answer) {
                                    this.checked = true;                                       
                                } else { 
                                    this.checked = false; 
                                } 
                            }                            
                        } ); ";       
        $js_script .= " jQuery('#set_gen_oper_is_load_js_css_on_specific_pages').on( 'change', function(){    
                            if ( this.checked ) { 
                                var answer = confirm('"                 
                                              . esc_js( __( 'Warning', 'email-reminders') ) . '! '
                                              . esc_js( __( 'You are need to be sure what you are doing. You are disable of loading some JavaScripts Do you really want to do this?', 'email-reminders') )
                                      .  "' );  
                                if ( answer) {
                                    this.checked = true;                                       
                                    jQuery('.oper_is_load_js_css_on_specific_pages').removeClass('hidden_items'); 
                                } else { 
                                    this.checked = false; 
                                } 
                            } else {
                                jQuery('.oper_is_load_js_css_on_specific_pages').addClass('hidden_items'); 
                            }
                        } );                         
                        ";         
        
        
        // Click  on Powered by  links
        $js_script .= " jQuery('#oper_powered_by_link_show').on( 'click', function(){                                 
                            jQuery('#oper_powered_by_link_show').slideToggle(200);                            
                            jQuery('#oper_powered_by_link_hide').animate( {opacity: 1}, 200 ).slideToggle(200);  
                            jQuery('.oper_is_show_powered_by_notice').removeClass('hidden_items');                             
                        } ); ";   
        $js_script .= " jQuery('#oper_powered_by_link_hide').on( 'click', function(){    
                            jQuery('#oper_powered_by_link_hide').slideToggle(200);                            
                            jQuery('#oper_powered_by_link_show').animate( {opacity: 1}, 200 ).slideToggle(200);   
                            jQuery('.oper_is_show_powered_by_notice').addClass('hidden_items'); 
                        } ); ";   

        
        // Show confirmation window,  if user activate this checkbox
        $js_script .= " jQuery('#set_gen_oper_is_delete_if_deactive').on( 'change', function(){    
                            if ( this.checked ) { 
                                var answer = confirm('"                 
                                              . esc_js( __( 'Warning', 'email-reminders') ) . '! '
                                              . esc_js( __( 'If you check this option, all data will be deleted when you uninstall this plugin. Do you really want to do this?', 'email-reminders') )
                                      .  "' );  
                                if ( answer) {
                                    this.checked = true;                                                                           
                                } else { 
                                    this.checked = false; 
                                } 
                            }
                        } );                         
                        ";         
        
        // Eneque JS to  the footer of the page
        oper_enqueue_js( $js_script );
    }    
}


/** Override VALIDATED fields BEFORE saving to DB 
 * Description:
 * Check "Thank you page" URL
 * 
 * @param array $validated_fields
 */
function oper_settings_validate_fields_before_saving__all( $validated_fields ) {


    // $validated_fields['oper_url_wrong_hash'] = oper_make_link_relative( $validated_fields['oper_url_wrong_hash'] );
    // $validated_fields['oper_url_download_expired'] = oper_make_link_relative( $validated_fields['oper_url_download_expired'] );
    // $validated_fields['oper_url_ip_not_valied'] = oper_make_link_relative( $validated_fields['oper_url_ip_not_valied'] );
    // $validated_fields['oper_url_file_not_exist'] = oper_make_link_relative( $validated_fields['oper_url_file_not_exist'] );
    // $validated_fields['oper_url_error_opening_file'] = oper_make_link_relative( $validated_fields['oper_url_error_opening_file'] );
    
    unset( $validated_fields[ 'oper_date_format_selection' ] );                      // We do not need to this field,  because saving to DB only: "date_format" field
	unset( $validated_fields[ 'oper_time_format_selection' ] );                      // We do not need to this field,  because saving to DB only: "time_format" field
    
    return $validated_fields;
}
add_filter( 'oper_settings_validate_fields_before_saving', 'oper_settings_validate_fields_before_saving__all', 10, 1 );   // Hook for validated fields.