<?php /**
 * @version 1.0
 * @package Email Reminders
 * @category Content of Settings page 
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com 
 * 
 * @modified 2015-11-02
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly


/** Show Content
 *  Update Content
 *  Define Slug
 *  Define where to show
 */
class OPER_Page_SettingsGeneral extends OPER_Page_Structure {
    
    private $settings_api = false;
     
    public function in_page() {
        
        return 'oper-settings';
    }        
    
    /** Get Settings API class - define, show, update "Fields".
     * 
     * @return object Settings API
     */    
    public function settings_api(){
        
        if ( $this->settings_api === false )             
             $this->settings_api = new OPER_Settings_API_General();
        
        return $this->settings_api;
    }    
    
    public function tabs() {
       
        $tabs = array();
                
        $tabs[ 'general' ] = array(
									  'title'			 => __( 'General', 'email-reminders' )				// Title of TAB
									, 'page_title'		 => __( 'General Settings', 'email-reminders' )		// Title of Page
									, 'hint'			 => __( 'General Settings', 'email-reminders' )		// Hint
									, 'link'			 => ''											// Can be skiped,  then generated link based on Page and Tab tags. Or can  be extenral link
									, 'position'		 => ''											// 'left'  ||  'right'  ||  ''
									, 'css_classes'		 => ''											// CSS class(es)
									, 'icon'			 => ''											// Icon - link to the real PNG img
									, 'font_icon'		 => 'glyphicon glyphicon-cog'					// CSS definition  of forn Icon
									, 'default'			 => true										// Is this tab activated by default or not: true || false. 
								);

		$subtabs = array();
        

        $subtabs['oper-settings-reminders'] = array(  'type' => 'goto-link'
                                                    , 'title' => __('Reminders', 'email-reminders')
                                                    , 'show_section' => 'oper_general_settings_reminders_metabox'
                                                );
        
        $subtabs['oper-settings-listing'] = array(  'type' => 'goto-link'
                                                    , 'title' => __('Contacts', 'email-reminders')
                                                    , 'show_section' => 'oper_general_settings_contacts_metabox'
                                                );

        $subtabs['oper-settings-menu-access'] = array(  'type' => 'goto-link'
                                                    , 'title' => __('Plugin Menu', 'email-reminders')
                                                    , 'show_section' => 'oper_general_settings_permissions_metabox'
                                                );
                
        $subtabs['oper-settings-uninstall'] = array(  'type' => 'goto-link'
                                                    , 'title' => __('Uninstall', 'email-reminders')
                                                    , 'show_section' => 'oper_general_settings_uninstall_metabox'
                                                );
		
        $subtabs['oper-settings-advanced'] = array(  'type' => 'goto-link'
                                                    , 'title' => __('Advanced', 'email-reminders')
                                                    , 'show_section' => 'oper_general_settings_advanced_metabox'
                                                );
        
                
        
        $subtabs['form-save'] = array( 
                                        'type' => 'button'                                  
                                        , 'title' => __('Save Changes', 'email-reminders')
                                        , 'form' => 'oper_general_settings_form'
                                    );
                        
        
        $tabs[ 'general' ][ 'subtabs' ] = $subtabs;

        if (0)
        $tabs[ 'upgrade' ] = array(
                              'title' => __('Upgrade', 'email-reminders')                // Title of TAB
                            , 'hint' => __('Upgrade to higher version', 'email-reminders')              // Hint
                            //, 'page_title' => __('Upgrade', 'email-reminders')        // Title of Page
                            , 'link' => 'http://server.com/'                    // Can be skiped,  then generated link based on Page and Tab tags. Or can  be extenral link
                            , 'position' => 'right'                             // 'left'  ||  'right'  ||  ''
                            //, 'css_classes' => ''                             // CSS class(es)
                            //, 'icon' => ''                                    // Icon - link to the real PNG img
                            , 'font_icon' => 'glyphicon glyphicon-shopping-cart'// CSS definition  of forn Icon
                            //, 'default' => false                              // Is this tab activated by default or not: true || false. 
                            //, 'subtabs' => array()
            
        );
		
        return $tabs;
    }


    public function content() {
                
        // Checking ////////////////////////////////////////////////////////////
        
        do_action( 'oper_hook_settings_page_header', array( 'page' => $this->in_page() ) );					// Define Notices Section and show some static messages, if needed.
                    
        $is_can = apply_oper_filter('recheck_version', true); if ( ! $is_can ) { ?><script type="text/javascript"> jQuery(document).ready(function(){ jQuery( '.wpdvlp-sub-tabs').remove(); }); </script><?php return; }
        
        
        // Init Settings API & Get Data from DB ////////////////////////////////
        $this->settings_api();                                                  // Define all fields and get values from DB
        
        // Submit  /////////////////////////////////////////////////////////////
        
        $submit_form_name = 'oper_general_settings_form';                       // Define form name
                
        if ( isset( $_POST['is_form_sbmitted_'. $submit_form_name ] ) ) {

            // Nonce checking    {Return false if invalid, 1 if generated between, 0-12 hours ago, 2 if generated between 12-24 hours ago. }
            $nonce_gen_time = check_admin_referer( 'oper_settings_page_' . $submit_form_name  );  // Its stop show anything on submiting, if its not refear to the original page

            // Save Changes 
            $this->update();
        }                
        //$oper_user_role_master   = get_oper_option( 'oper_user_role_master' );    // O L D   W A Y:   Get Fields Data
        
        
        // JavaScript: Tooltips, Popover, Datepick (js & css) //////////////////
        echo '<span class="wpdevelop">';
        oper_js_for_items_page();
        echo '</span>';

              
        
        // Content  ////////////////////////////////////////////////////////////
        ?>
        <div class="clear" style="margin-bottom:10px;"></div>
        <span class="metabox-holder">
            <form  name="<?php echo $submit_form_name; ?>" id="<?php echo $submit_form_name; ?>" action="" method="post">
                <?php 
                   // N o n c e   field, and key for checking   S u b m i t 
                   wp_nonce_field( 'oper_settings_page_' . $submit_form_name );
                ?><input type="hidden" name="is_form_sbmitted_<?php echo $submit_form_name; ?>" id="is_form_sbmitted_<?php echo $submit_form_name; ?>" value="1" />

                <div class="oper_settings_row oper_settings_row_left" >

                    <?php //oper_open_meta_box_section( 'oper_general_settings_top', __('General', 'email-reminders') );  ?>

                    <?php //$this->settings_api()->show( 'general' ); ?>
                    
                    <?php //oper_close_meta_box_section(); ?>
					

                    <?php oper_open_meta_box_section( 'oper_general_settings_reminders', __('Reminders', 'email-reminders') );  ?>

                    <?php $this->settings_api()->show( 'reminders' ); ?>

                    <?php oper_close_meta_box_section(); ?>


                    <?php oper_open_meta_box_section( 'oper_general_settings_contacts', __('Contacts', 'email-reminders') );  ?>

                    <?php $this->settings_api()->show( 'contacts' ); ?>

                    <?php oper_close_meta_box_section(); ?>


                    <?php //oper_open_meta_box_section( 'oper_general_settings_reminders', __('Rules', 'email-reminders') );  ?>

                    <?php //$this->settings_api()->show( 'rules' ); ?>

                    <?php //oper_close_meta_box_section(); ?>


                    <?php //oper_open_meta_box_section( 'oper_general_settings_oper_misc', __('Miscellaneous', 'email-reminders') );  ?>

                    <?php //$this->settings_api()->show( 'miscellaneous' ); ?>
                    
                    <?php //oper_close_meta_box_section(); ?>

                </div>
                <div class="oper_settings_row oper_settings_row_right">

                    <?php oper_open_meta_box_section( 'oper_general_settings_information', __('Information', 'email-reminders') );  ?>

                    <?php $this->settings_api()->show( 'information' ); ?>                                      
                    
                    <?php oper_close_meta_box_section(); ?>


                    <?php oper_open_meta_box_section( 'oper_general_settings_permissions', __('Plugin Menu', 'email-reminders') );  ?>

                    <?php $this->settings_api()->show( 'permissions' ); ?>

                    <?php oper_close_meta_box_section(); ?>

                    
                    <?php oper_open_meta_box_section( 'oper_general_settings_uninstall', __('Uninstall / deactivation', 'email-reminders') );  ?>

                    <?php $this->settings_api()->show( 'uninstall' ); ?>                                      
                    
                    <?php oper_close_meta_box_section(); ?>


                    <?php oper_open_meta_box_section( 'oper_general_settings_advanced', __('Advanced', 'email-reminders') );  ?>

                    <?php $this->settings_api()->show( 'advanced' ); ?>

                    <?php oper_close_meta_box_section(); ?>

                </div>
                <div class="clear"></div>
                <input type="submit" value="<?php _e('Save Changes', 'email-reminders'); ?>" class="button button-primary oper_submit_button" />
				<?php
					echo  '<a style="margin:0 1em;" class="button button" href="' . oper_get_settings_url()
																 . '&restore_dismissed=On#oper_general_settings_restore_dismissed_metabox">'
																 . __('Restore all dismissed windows' ,'email-reminders')
						. '</a>';
				?>
            </form>
            <?php if ( ( isset( $_GET['system_info'] ) ) && ( $_GET['system_info'] == 'show' ) ) { ?>
                
                <div class="clear" style="height:30px;"></div>
                
                <?php oper_open_meta_box_section( 'oper_general_settings_system_info', __('System Info','email-reminders') );  ?>

                <?php oper_system_info(); ?>

                <?php oper_close_meta_box_section(); ?>

            <?php } ?>

            <?php if ( ( isset( $_GET['restore_dismissed'] ) ) && ( $_GET['restore_dismissed'] == 'On' ) ) {

				//update_oper_option( 'oper_is_show_powered_by_notice' , 'On' );

            	global $wpdb;
				// Delete all users oper windows states
				if ( false === $wpdb->query( "DELETE FROM {$wpdb->usermeta} WHERE meta_key LIKE '%oper_win_%'" ) ){    	// All users data
					debuge_error('Error during deleting user meta at DB',__FILE__,__LINE__);
					die();
				} else {
					?><div class="clear" style="height:30px;"></div><?php
					oper_open_meta_box_section( 'oper_general_settings_restore_dismissed', __('Info','email-reminders') );

						?><strong><?php _e( 'All dismissed windows have been resored.', 'email-reminders' ); ?></strong><div class="clear"></div><br/><?php
						echo '<a class="button button" href="' . oper_get_settings_url() . '">' . __( 'Reload Page', 'email-reminders' ) . '</a>';

					oper_close_meta_box_section();
				}
            }
			?>

        </span>
    <?php 

    
    
        do_action( 'oper_hook_settings_page_footer', 'general_settings' );
    
//debuge( 'Content <strong>' . basename(__FILE__ ) . '</strong> <span style="font-size:9px;">' . __FILE__  . '</span>');                  
    }


    public function update() {
//debuge($_POST);
        $validated_fields = $this->settings_api()->validate_post();             // Get Validated Settings fields in $_POST request.
        
        $validated_fields = apply_filters( 'oper_settings_validate_fields_before_saving', $validated_fields );   //Hook for validated fields.
//debuge($validated_fields);
        // Skip saving specific option, for example in Demo mode.
        // unset($validated_fields['oper_start_day_weeek']);

        $this->settings_api()->save_to_db( $validated_fields );                 // Save fields to DB
        oper_show_changes_saved_message();
        
//debuge( basename(__FILE__), 'UPDATE',  $_POST, $validated_fields);          
                
        // O L D   W A Y:   Saving Fields Data
        //      update_oper_option( 'oper_is_delete_if_deactive'
        //                       , OPER_Settings_API::validate_checkbox_post('oper_is_delete_if_deactive') );
        //      ( (isset( $_POST['oper_is_delete_if_deactive'] ))?'On':'Off') );

    }
}



//if ( $is_other_tab ) {  
//    
//    if (  ( ! isset( $_GET['tab'] ) ) || ( $_GET['tab'] == 'general' )  ) {     // If tab  was not selected or selected default,  then  redirect  it to the "form" tab.            
//        $_GET['tab'] = 'form';
//    }
//} else {
//    add_action('oper_menu_created', array( new OPER_Page_SettingsGeneral() , '__construct') );    // Executed after creation of Menu
//}

add_action('oper_menu_created', array( new OPER_Page_SettingsGeneral() , '__construct') );    // Executed after creation of Menu
 