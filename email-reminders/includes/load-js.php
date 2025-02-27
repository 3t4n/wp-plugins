<?php /**
 * @version 1.0
 * @package Email Reminders
 * @category JavaScript files and varibales
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com 
 * 
 * @modified 19.10.2015
 */

class OPER_JS extends OPER_JS_CSS {
    
    public function define() {
        
        $this->setType('js');
        
        /*
        $this->add( array(
                            'handle' => 'oper-datepick',
                            'src' => oper_plugin_url( '/js/datepick/jquery.datepick.js'),
                            'deps' => array( 'oper-global-vars' ),
                            'version' => '1.1',
                            'where_to_load' => array( 'admin', 'client' ),                //Usage: array( 'admin', 'client' )
                            'condition' => false    
                  ) );        
        */
    }

    /** Enqueue Files and Varibales. 
     *  Useful in case, if we use get_options and current user functions...
     * 
     * @param type $where_to_load
     */
    public function enqueue( $where_to_load ) {
        
        oper_js_load_vars(  $where_to_load );
        
        // Define JavaScript varibales in all other files
        do_action( 'oper_define_js_vars', $where_to_load );

        oper_js_load_libs(  $where_to_load );
        oper_js_load_files( $where_to_load );
        
        if ( oper_is_new_oper_page() )
            $where_to_load = 'both';
        
        // Load JavaScript files in all other versions
        do_action( 'oper_enqueue_js_files', $where_to_load );
    }

    /** Deregister  some conflict  scripts from  other plugins.
     * 
     * @param type $where_to_load
     */
    public function remove_conflicts( $where_to_load ) {
        
        if ( oper_is_master_page() ) {
            if (function_exists('wp_dequeue_script')) {
                
                //wp_dequeue_script( 'jquery.cookie' );
                //wp_dequeue_script( 'jquery-interdependencies' );
                wp_dequeue_script( 'chosen' );
                wp_dequeue_script( 'cs-framework' );
                wp_dequeue_script( 'cgmp-jquery-tools-tooltip' );                               // Remove this script jquery.tools.tooltip.min.js, which is load by the "Comprehensive Google Map Plugin"
            }
        }        
                        
    }
}



/** Define JavaScript Varibales */
function oper_js_load_vars( $where_to_load ) {
    
    ////////////////////////////////////////////////////////////////////////////
    // JavaScripts Variables               
    ////////////////////////////////////////////////////////////////////////////
      
    wp_enqueue_script( 'oper-global-vars', oper_plugin_url( '/_out/js/vars.js' ), array( 'jquery' ), '1.1' );           // Blank JS File

	// oper_global1.oper_message_saving
    wp_localize_script( 'oper-global-vars'
                      , 'oper_global1', array(
          'oper_ajaxurl'                        => admin_url( 'admin-ajax.php' )
        , 'oper_plugin_url'                     => plugins_url( '' , OPER_FILE )
        , 'oper_admin_url'                      => admin_url( 'admin.php' )
//		, 'oper_today'       => '['     . intval(date_i18n('Y'))
//		                                        .','. intval(date_i18n('m'))
//		                                        .','. intval(date_i18n('d'))
//		                                        .','. intval(date_i18n('H'))
//		                                        .','. intval(date_i18n('i'))
//		                                    .']'
        , 'message_verif_requred'               => esc_js(__('This field is required' , 'email-reminders'))
        , 'message_verif_requred_for_check_box' => esc_js(__('This checkbox must be checked' , 'email-reminders'))
        , 'message_verif_requred_for_radio_box' => esc_js(__('At least one option must be selected' , 'email-reminders'))
        , 'message_verif_emeil'                 => esc_js(__('Incorrect email field' , 'email-reminders'))
        , 'message_verif_same_emeil'            => esc_js(__('Your emails do not match' , 'email-reminders'))

        //, 'oper_active_locale'                  => oper_get_locale()
        , 'oper_message_processing'             => esc_js( __('Processing' , 'email-reminders') )
        , 'oper_message_deleting'               => esc_js( __('Deleting' , 'email-reminders') )
        , 'oper_message_updating'               => esc_js( __('Updating' , 'email-reminders') )
        , 'oper_message_saving'                 => esc_js( __('Saving' , 'email-reminders') )

		, 'message_save_changes'                => esc_js( __('Save Changes', 'email-reminders') )
		, 'message_cancel'                      => esc_js( __('Cancel', 'email-reminders') )
		, 'message_do_you_really'               => esc_js( __( 'Do you really want to do this ?', 'email-reminders' ) )
    ));
        
}


/** Default JavaScripts Libraries */
function oper_js_load_libs( $where_to_load ) {
    
    // jQuery  
    wp_enqueue_script( 'jquery' );


    // Default Admin Libs 
    if (     ( $where_to_load == 'admin' ) 
         // || (  is_admin() && ( defined( 'DOING_AJAX' ) ) && ( DOING_AJAX )  )
        ) {

		/**
		 * Internal WordPress depends
			'wp-util'	  							-> array( 'underscore', 'jquery' )
			'wp-backbone' 							-> array( 'backbone', 'wp-util' )
			 wp_enqueue_script( 'media-editor' )  	-> 'wp-backbone'
		 */
		wp_enqueue_media();
//	    wp_enqueue_script( 'underscore');
//	    wp_enqueue_script( 'backbone' );

		wp_enqueue_script('thickbox');
        // Load thickbox CSS
        wp_enqueue_style('thickbox');
		
        wp_enqueue_style(  'wp-color-picker' );                                 // Color Picker
        wp_enqueue_script( 'wp-color-picker' ); 
        wp_enqueue_script( 'jquery-ui-sortable' );                              // UI Sortable
//        if ( oper_is_master_page()  )
//            wp_enqueue_script( 'jquery-ui-dialog' );                            // UI Dialog -  for payment request dialog                                     
    }   
    
}


/** Load JavaScript Files */
function oper_js_load_files( $where_to_load ) {
    
//    // Bootstrap
//    if (     (  (   is_admin() ) && ( get_oper_option( 'oper_is_not_load_bs_script_in_admin' )  !== 'On')  )
//         // ||  (  ( ! is_admin() ) && ( get_oper_option( 'oper_is_not_load_bs_script_in_client' ) !== 'On' )  )
//       ) {
//    	wp_enqueue_script( 'wpdevelop-bootstrap', oper_plugin_url( '/assets/vendors/bootstrap/js/bootstrap.js' ), array( 'oper-global-vars' ), '3.3.5.1');
//    }
     
    // Datepicker    
    // wp_enqueue_script( 'oper-datepick', oper_plugin_url( '/js/datepick/jquery.datepick.js'), array( 'oper-global-vars' ), '1.1');

    // Localization
    // $calendar_localization_url = oper_get_calendar_localization_url();
    // if ( ! empty( $calendar_localization_url ) )
    //    wp_enqueue_script( 'oper-datepick-localize', $calendar_localization_url, array( 'oper-datepick' ), '1.1');
    //oper_load_calendar_localization_file();
                
    if (  ( $where_to_load == 'client' ) || ( oper_is_new_oper_page()  )   ) {
        
        // Client
        // wp_enqueue_script( 'oper-main-client', oper_plugin_url( '/js/client.js'), array( 'oper-datepick' ), '1.1');
    }
    
    if ( $where_to_load == 'admin' ) {
        
        // Admin
        // wp_enqueue_script( 'oper-admin-main',    oper_plugin_url( '/js/admin.js'), array( 'oper-global-vars' ), '1.1');
        wp_enqueue_script( 'oper-admin-support', oper_plugin_url( '/_out/js/admin-support.js'), array( 'oper-global-vars' ), '1.1');
    
        // Chosen Library    
        // wp_enqueue_script( 'oper-chosen', oper_plugin_url( '/assets/vendors/chosen/chosen.jquery.min.js'), array( 'oper-global-vars' ), '1.1' );
    }    
        
}



////////////////////////////////////////////////////////////////////////////////
//  Support JavaScript functions
////////////////////////////////////////////////////////////////////////////////

/** Load Datepicker Localization JS File */
/*
function oper_load_calendar_localization_file() {
    
    // Datepicker Localization - translation for calendar.                      Example:    $locale = 'fr_FR';   
    $locale = oper_get_locale();
    if ( ! empty( $locale ) ) {

        $locale_lang    = substr( $locale, 0, 2 ); 
        $locale_country = substr( $locale, 3 );

        if (   ( $locale_lang !== 'en') && ( oper_is_file_exist( '/js/datepick/jquery.datepick-' . $locale_lang . '.js' ) )   ) {
            
                wp_enqueue_script( 'oper-datepick-localize', oper_plugin_url( '/js/datepick/jquery.datepick-'. $locale_lang . '.js' ), array( 'oper-datepick' ), '1.1');

        } else if (   ( ! in_array( $locale, array( 'en_US', 'en_CA', 'en_GB', 'en_AU' ) )   )                                      // English Exceptions 
                   && ( oper_is_file_exist( '/js/datepick/jquery.datepick-'. $locale_country . '.js' ) )
        ) { 

                wp_enqueue_script( 'oper-datepick-localize', oper_plugin_url( '/js/datepick/jquery.datepick-'. $locale_country . '.js' ), array( 'oper-datepick' ), '1.1');
        }          
    }
}*/


/** Get URL Datepicker Localization JS File 
 * 
 * @return string - URL to  calendar skin
 */
/*
function oper_get_calendar_localization_url() {
    // Datepicker Localization - translation for calendar.                      Example:    $locale = 'fr_FR';   
    $locale = oper_get_locale();
    
    $calendar_localization_url = false;
    
    if ( ! empty( $locale ) ) {

        $locale_lang    = substr( $locale, 0, 2 ); 
        $locale_country = substr( $locale, 3 );

        if (   ( $locale_lang !== 'en') && ( oper_is_file_exist( '/js/datepick/jquery.datepick-' . $locale_lang . '.js' ) )   ) {
            
                $calendar_localization_url = oper_plugin_url( '/js/datepick/jquery.datepick-'. $locale_lang . '.js' );

        } else if (   ( ! in_array( $locale, array( 'en_US', 'en_CA', 'en_GB', 'en_AU' ) )   )                                      // English Exceptions 
                   && ( oper_is_file_exist( '/js/datepick/jquery.datepick-'. $locale_country . '.js' ) )
        ) { 

                $calendar_localization_url = oper_plugin_url( '/js/datepick/jquery.datepick-'. $locale_country . '.js' );
        }          
    } 
    
    return $calendar_localization_url;
}
*/

/** Get Registred jQuery version
 * 
 * @global type $wp_scripts
 * @return string - jQuery version
 */
function oper_get_registered_jquery_version() {
    global $wp_scripts;
    
    $version = false;
    
    if (  is_a( $wp_scripts, 'WP_Scripts' ) ) 
        if (isset( $wp_scripts->registered['jquery'] )) 
            $version = $wp_scripts->registered['jquery']->ver;
    return $version;
}


/** Check if we activated loading of JS/CSS only on specific pages and then load or no it
 * 
 * @param boolean $is_load_scripts  - Default: true
 * @return boolean                  - true | false
 */
function oper_is_load_css_js_on_client_page( $is_load_scripts ) {

return true;

    if ( ! is_admin() ) {           // Check  on Client side only
        
        $oper_is_load_js_css_on_specific_pages = get_oper_option( 'oper_is_load_js_css_on_specific_pages'  );
        if ( $oper_is_load_js_css_on_specific_pages == 'On' ) {
            
            $oper_pages_for_load_js_css = get_oper_option( 'oper_pages_for_load_js_css' );

            $oper_pages_for_load_js_css = preg_split('/[\r\n]+/', $oper_pages_for_load_js_css, -1, PREG_SPLIT_NO_EMPTY);

            $request_uri = $_SERVER['REQUEST_URI'];                                 // FixIn:5.4.1
            if ( strpos( $request_uri, 'oper_hash=') !== false ) {
                $request_uri = parse_url($request_uri);
                if (  ( ! empty($request_uri ) ) && ( isset($request_uri['path'] ) )  ){
                    $request_uri = $request_uri['path'];
                } else {
                    $request_uri = $_SERVER['REQUEST_URI'];
                }
            }

            if (  ( ! empty($oper_pages_for_load_js_css ) ) && ( ! in_array( $request_uri, $oper_pages_for_load_js_css ) )  )
                    return false;
        }
    }
    return true;
}
add_filter( 'oper_is_load_script_on_this_page', 'oper_is_load_css_js_on_client_page' );
