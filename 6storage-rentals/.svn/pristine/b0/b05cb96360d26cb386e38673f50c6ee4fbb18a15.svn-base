<?php

namespace SixStorageOnline\Base;
use SixStorageOnline\Base\Six_Storage_SettingsKeys;
$Obj = new Six_Storage_SettingsKeys();

class Six_Storage_BaseController
{
     public $six_storage_plugin_path;
     public $six_storage_plugin_url;
     public $six_storage_plugin;
     public $six_storage_client_ip;
     public $six_storage_api_base_url;
     public $six_storage_api_url;
     public $six_storage_access_token;
     public $six_storage_http_header;

     public function __construct()
     {

          $six_storage_file_url = dirname(__FILE__, 2);

          $this->six_storage_plugin_path = plugin_dir_path($six_storage_file_url);
          $this->six_storage_plugin_url = plugin_dir_url($six_storage_file_url);
          $this->six_storage_plugin = plugin_basename(dirname(__FILE__, 3)) . '/wrapper.php';
          $this->six_storage_plugin_version = '2.18.0';
          $this->six_storage_api_version = '1.0.0';
          $this->six_storage_client_ip = $this->six_storage_getIpAddress();
          $this->six_storage_server_upload_max_file_size = ini_get('upload_max_filesize');
          $this->six_storage_api_base_url = get_option('six_storage_online_api_url');
          $this->six_storage_api_url = $this->six_storage_api_base_url . 'v1/';
          $this->six_storage_api_url2 = $this->six_storage_api_base_url . 'v2/';
          $this->six_storage_access_token = get_option('six_storage_online_api_auth_access_token');
          $this->six_storage_http_header = [
               'Authorization' => 'Bearer ' . $this->six_storage_access_token,
               'Content-Type' => 'application/json',
               'accept' => 'application/json',
          ];

          

     }

     /**
      * Returns IP address or false or empty string.
      *
      * @return string
     */
	public static function six_storage_getIpAddress() {
		if ( isset( $_SERVER['HTTP_X_REAL_IP'] ) ) {
			return sanitize_text_field( wp_unslash( $_SERVER['HTTP_X_REAL_IP'] ) );
		} elseif ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
			// Get fist in list as IP
			return (string) rest_is_ip_address( trim( current( preg_split( '/,/', sanitize_text_field( wp_unslash( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) ) ) ) );
		} elseif ( isset( $_SERVER['REMOTE_ADDR'] ) ) {
			return sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) );
		} elseif( isset( $_SERVER['HTTP_CLIENT_IP'] )){
               return sanitize_text_field( wp_unslash( $_SERVER['HTTP_CLIENT_IP'] ) );
          }
		return '';
	}

      /**
      * Clears cache of most popular cache plugins.
      *
      * @return string
     */
    public static function six_storage_clear_cache_fun() {
          global $wp_fastest_cache, $kinsta_cache, $admin, $ccfm_source;
          // if fastest cache is beign used, clear the cache
          if ( method_exists( 'WpFastestCache', 'deleteCache' ) && !empty( $wp_fastest_cache ) ) {
               $wp_fastest_cache->deleteCache( true );
          }
          // if W3 Total Cache is being used, clear the cache
          else if ( function_exists( 'w3tc_pgcache_flush' ) ) { 
               w3tc_pgcache_flush(); 
          }
          // if WP Super Cache is being used, clear the cache
          else if ( function_exists( 'wp_cache_clean_cache' ) ) {
               global $file_prefix, $supercachedir;
               if ( empty( $supercachedir ) && function_exists( 'get_supercache_dir' ) ) {
                    $supercachedir = get_supercache_dir();
               }
               wp_cache_clean_cache( $file_prefix );
          }
          else if ( class_exists( 'Breeze_Admin' )) {
               do_action('breeze_clear_all_cache');
          }
          else if ( defined( 'LSCWP_V' ) ) {
               do_action( 'litespeed_purge_all' );
          }
               return '';
     }

     public function six_storage_getPluginvars($autoPay = "")
     {

          return array(
               'six_storage_plugin_url'    => SIX_STORAGE_PLUGIN_FILE,
               'api_url'   => $this->six_storage_api_url,
               'six_storage_reg_api_url' => get_option('six_storage_online_api_url'),
               'six_storage_google_analytics_integrated' => get_option('six_storage_online_google_analytics_enable'),
               'six_storage_grouping_enable' => get_option('six_storage_online_fc_group_the_unit_based_on_size_toggle'),
               'six_storage_grouping_single_units' => get_option('six_storage_online_rent_single_unit'),
               'six_storage_google_analytics_input_key' => get_option('six_storage_online_fc_google_analytics_key_word'),
               'six_storage_online_tenant_location_enable' => get_option("six_storage_online_tenant_location_enable"),
               'six_storage_online_tenant_location_api_key' => get_option("six_storage_online_tenant_location_api_key"),
               'six_storage_online_fs_ti_emergencycontact_toggle' => get_option('six_storage_online_fs_ti_emergencycontact_toggle'),
               'six_storage_online_fs_ti_emergencycontact_first_name_toggle' => get_option('six_storage_online_fs_ti_emergencycontact_first_name_toggle'),
               'six_storage_online_fs_ti_emergencycontact_first_name_is_mandatory' => get_option('six_storage_online_fs_ti_emergencycontact_first_name_is_mandatory'),
               'six_storage_online_fs_ti_emergencycontact_last_name_toggle' => get_option('six_storage_online_fs_ti_emergencycontact_last_name_toggle'),
               'six_storage_online_fs_ti_emergencycontact_last_name_is_mandatory' => get_option('six_storage_online_fs_ti_emergencycontact_last_name_is_mandatory'),
                 'six_storage_online_fs_ti_emergencycontact_mobile_toggle' => get_option('six_storage_online_fs_ti_emergencycontact_mobile_toggle'),
               'six_storage_online_fs_ti_emergencycontact_mobile_is_mandatory' => get_option('six_storage_online_fs_ti_emergencycontact_mobile_is_mandatory'),
                 'six_storage_online_fs_ti_emergencycontact_email_toggle' => get_option('six_storage_online_fs_ti_emergencycontact_email_toggle'),
               'six_storage_online_fs_ti_emergencycontact_email_is_mandatory' => get_option('six_storage_online_fs_ti_emergencycontact_email_is_mandatory'),
               'six_storage_online_movein_profile_picture_toggle' => get_option('six_storage_online_movein_profile_picture_toggle'),
               'inclusive_tax' => get_option('six_storage_online_fc_show_the_rental_with_tax_toggle') , 
               'six_storage_override_culture_currency' => get_option('six_storage_online_currency_override') , 
               'sso_enabled' => get_option("six_storage_online_fc_enable_SSO_toggle") == "1" ? true : false,
               'paylater_enabled' => get_option("six_storage_online_fc_pay_later_toggle") == "1" ? true : false,
               'autoPayEnabled' => $autoPay,
                'six_storage_online_setup_preloader' => get_option("six_storage_online_setup_preloader"),
               'six_storage_server_upload_limit' => $this->six_storage_server_upload_max_file_size,
               'six_storage_online_contact_us_type' => get_option('six_storage_online_contact_us_type'),
               'six_storage_online_fs_ad_no_insurance_toggle' => get_option('six_storage_online_fs_ad_no_insurance_toggle'),
               'six_storage_online_fs_ad_third_party_insurance_toggle' => get_option('six_storage_online_fs_ad_third_party_insurance_toggle'),
               'merchandiseMandatory' => get_option('six_storage_online_fs_ad_merchandise_is_mandatory'),
               'six_storage_online_fs_ad_vehicle_info_is_mandatory' => get_option('six_storage_online_fs_ad_vehicle_info_is_mandatory'),
               'scheduledMoveOutEnabled' => get_option('six_storage_online_fc_schedule_moveout_toggle'),
               'six_storage_online_fs_of_additional_months_toggle' => get_option('six_storage_online_fs_of_additional_months_toggle'),
               'insuranceMandatory' => get_option('six_storage_online_fs_ad_insurance_is_mandatory'),
               'sixStorageEmergencyContact' => get_option('six_storage_online_fs_ti_emergencycontact_is_mandatory'),
               'six_storage_online_movein_profile_picture_is_mandatory' => get_option('six_storage_online_movein_profile_picture_is_mandatory'),
               'preloaderEnabled' => get_option("six_storage_online_setup_preloader") == "1" ? true : false,
               'termsAndCondition' => get_option("six_storage_online_terms_and_condition"),
               'sixStorageUploadDocumentMandatory' => get_option("six_storage_online_fs_ti_upload_document_is_mandatory"),
               'rentSingleUnit' => get_option("six_storage_online_rent_single_unit")== "1" ? true : false,
               'waitlistEnabled' => get_option("six_storage_online_fc_waitlist_toggle")== "1" ? true : false,               
               'enquiryEnabled' => get_option("six_storage_online_fc_enquiry_toggle") == "1" ? true : false,
               'reservationEnabled' => get_option("six_storage_online_fc_reservation_toggle") == "1" ? true : false,
               'rentNowEnabled' => get_option("six_storage_online_fc_rent_now_toggle") == "1" ? true : false,
               'unitDescriptionEnabled' => get_option("six_storage_online_fc_unit_description_toggle") == "1" ? true : false,
               'vacancyCountEnabled' => get_option("six_storage_online_fc_vacancy_count_toggle") == "1" ? true : false,
               'unitTypeNameEnabled' => get_option("six_storage_online_fc_unit_type_name_toggle") == "1" ? true : false,
               'unitSizeEnabled' => get_option("six_storage_online_fc_unit_size_toggle") == "1" ? true : false,
               'businessUserEnabled' => get_option("six_storage_online_fc_business_user_toggle") == "1" ? true : false,
               'eSignatureEnabled' => get_option("six_storage_online_fs_ti_tenantsignature_toggle"),
               'eSignatureRequired' => get_option("six_storage_online_fs_ti_tenantsignature_is_mandatory") == "1" ? true : false,
               'timeZoneEnabled' => get_option("six_storage_online_fs_ti_timezone_toggle"),
               'is_timezone_synced' => get_option("six_storage_online_fs_ti_is_timezone_synced") == "1" ? true : false,
'timezone_array' => get_option("six_storage_online_fs_ti_timezone_array"),
               'is_timezone_manually_changed' => get_option("six_storage_online_fs_ti_is_timezone_manually_changed") == "1" ? true : false,
               'gateaccess_name' => get_option("six_storage_online_fs_ti_gateaccess_name"),
               'six_storage_online_fc_unit_image_toggle' => get_option("six_storage_online_fc_unit_image_toggle"),
               'gtag_config' => get_option("six_storage_online_gtag_config"), 
               'gtag_move_in_page' => get_option("six_storage_online_gtag_move_in_page"),
               'six_storage_online_fc_additional_month_custom_word' => get_option("six_storage_online_fc_additional_month_custom_word"),
               'six_storage_gateaccesscodemindigits'=> get_option("six_storage_gateaccesscodemindigits"),
               'six_storage_online_tenant_activity_enable' => get_option("six_storage_online_tenant_activity_enable"),

               'six_storage_online_select_your_storage_custom_word' => esc_html__(get_option('six_storage_online_select_your_storage_custom_word'),'6storage-rentals'),
               'six_storage_online_addons_custom_word' => esc_html__(get_option('six_storage_online_addons_custom_word'),'6storage-rentals'),
               'six_storage_online_please_choose_your_addons_custom_word' => esc_html__(get_option('six_storage_online_please_choose_your_addons_custom_word'),'6storage-rentals'),

               // From Dashboard

               'six_storage_online_changing_location_alert_message' => esc_html__("Changing the storage type will deselect the previously selected storages",'6storage-rentals'),
               'six_storage_online_Delete' => esc_html__('Delete','6storage-rentals'),
               'six_storage_online_card_deleted' => esc_html__('Card deleted successfully','6storage-rentals'),
               'six_storage_online_dp_Poor_Standing' => esc_html__('Poor standing','6storage-rentals'),
               'six_storage_online_fs_of_schedule_move_out_date_toggle' => get_option('six_storage_online_fs_of_schedule_move_out_date_toggle'),
               'six_storage_online_fs_of_Desired_move_out_date' => esc_html__('Desired Move Out Date','6storage-rentals'),
               'six_storage_online_fs_of_schedule_move_out_date_is_mandatory' => get_option('six_storage_online_fs_of_schedule_move_out_date_is_mandatory'),
               'six_storage_online_fs_of_schedule_move_out_date_validation' => esc_html__('Please Select Desired Moveout Date','6storage-rentals'),
               'six_storage_online_fc_schedule_minimum_days_custom_word' => get_option('six_storage_online_fc_schedule_minimum_days_custom_word'),
               'six_storage_online_fc_schedule_maximum_days_custom_word' => get_option('six_storage_online_fc_schedule_maximum_days_custom_word'),
               'six_storage_online_fc_move_in_after' => get_option('six_storage_online_fc_move_in_after'),
               'six_storage_online_fc_hide_storage_category_toggle' => get_option('six_storage_online_fc_hide_storage_category_toggle'),
               'six_storage_online_fc_move_in_upto' => get_option('six_storage_online_fc_move_in_upto'),
               'six_storage_online_fc_Total_Amount' => esc_html__('Total Amount','6storage-rentals'),
               'six_storage_online_fc_No_Units_Rented' => esc_html__('No Units Rented','6storage-rentals'),
               'six_storage_online_fc_License_Agreement' => esc_html__('License Agreement','6storage-rentals'),
               'six_storage_online_fc_Move_out_scheduled_on' => esc_html__('Move-Out Scheduled:','6storage-rentals'),
               'six_storage_online_fc_Recalled_on ' => esc_html__('Recalled on ','6storage-rentals'),
               'six_storage_online_fc_Cancel_Recall' => esc_html__('Cancel Recall','6storage-rentals'),
               'six_storage_online_fc_Recall' => esc_html__('Recall','6storage-rentals'),
               'six_storage_online_fc_Schedule_Moveout' => esc_html__('Schedule Moveout','6storage-rentals'),
               'six_storage_online_fc_Cancel_Schedule_Moveout' => esc_html__('Cancel Schedule Moveout','6storage-rentals'),
               'six_storage_online_fc_Insurance' => esc_html__('Insurance','6storage-rentals'),
               'six_storage_online_fc_Rent' => esc_html__('Rent','6storage-rentals'),
               'six_storage_online_fc_Move_In_Date' => esc_html__('Move-In Date','6storage-rentals'),
               'six_storage_online_fc_Next_Billing_Date' => esc_html__('Next Billing Date','6storage-rentals'),
               'six_storage_online_fc_Paid_Through' => esc_html__('Paid Through','6storage-rentals'),
               'six_storage_online_fc_over_due_days' => esc_html__('Over Due Days','6storage-rentals'),
               'six_storage_online_fc_Balance' => esc_html__('Balance','6storage-rentals'),
               'six_storage_online_fc_Save' => esc_html__('Save','6storage-rentals'),
               'six_storage_online_fc_add_more' => esc_html__('Add More','6storage-rentals'),
               'six_storage_online_fs_Terms_and_Conditions' => esc_html__('Terms and Conditions','6storage-rentals'),
               'six_storage_online_fc_emergency_contact' => esc_html__('Emergency Contact','6storage-rentals'),
               'six_storage_online_fc_please_select_one_unit_to_reserve' => esc_html__('Please Select One Unit To Reserve','6storage-rentals'),
               'six_storage_online_fc_please_select_one_unit_to_rent' => esc_html__('Please Select One Unit To Rent','6storage-rentals'),
               'six_storage_online_fc_please_select_units_from_same_storage_category' => esc_html__('Please Select Units From Same Storage Category','6storage-rentals'),
               'six_storage_online_please_enter_emergency_contact_details' => esc_html__('Please Enter Emergency Contact Details','6storage-rentals'),
               'six_storage_online_fc_Recalled_Date' => esc_html__('Recalled Date','6storage-rentals'),
               'six_storage_online_fc_Cancel_Reason' => esc_html__('Cancel Reason','6storage-rentals'),
               'six_storage_online_fc_Please_Enter_Reason' => esc_html__('Please Enter Reason','6storage-rentals'),
               'six_storage_online_fc_Unable_to_cancel_recall' => esc_html__('Unable to cancel recall for','6storage-rentals'),
               'six_storage_online_fc_Reason' =>  esc_html__('Reason','6storage-rentals'),
               'six_storage_online_fc_Please_Enter_Reason' => esc_html__('Please Enter Reason','6storage-rentals'),
               'six_storage_online_fc_Unable_to_load_payment_form' => esc_html__('Unable to load payment form','6storage-rentals'),
               'six_storage_online_fc_Pay_Now' => esc_html__('Pay Now','6storage-rentals'),
               'six_storage_online_fc_Transportation_Type' =>  esc_html__('Transportation Type','6storage-rentals'),
               'six_storage_online_fc_Please_Select_Transportation' => esc_html__('Please Select Transportation','6storage-rentals'),
               'six_storage_online_fc_Pickup_Date' => esc_html__('Pickup Date','6storage-rentals'),
               'six_storage_online_fc_Pickup_date_shouldnt_be_empty' => esc_html__('Pickup date shouldnt be empty','6storage-rentals'), 
               'six_storage_online_fc_Tranportation_Fee' => esc_html__('Tranportation Fee','6storage-rentals'),
               'six_storage_online_fc_Invalid_coupon_code' => esc_html__('Invalid coupon code','6storage-rentals'),
               'six_storage_online_fc_Discount_Applied' => esc_html__('Discount Applied','6storage-rentals'),
               'six_storage_online_fc_has_been_sheduled_to_moveout_on' => esc_html__('has been scheduled to Move-Out on','6storage-rentals'),
               'six_storage_online_fc_has_been_cancel_sheduled_to_moveout_on' => esc_html__('Schedule Move-Out has been cancelled for','6storage-rentals'),
               'six_storage_online_fc_cancel_Unable_to_schedules' => esc_html__('Unable to cancel scheduled Move-Out  for','6storage-rentals'),
               'six_storage_online_fc_Unable_to_schedule' => esc_html__('Unable to schedule Move-Out  for','6storage-rentals'),
               'six_storage_online_fc_Unable_to_cancel_scheduled' => esc_html__('Unable to cancel scheduled Move-Out for','6storage-rentals'),
               'six_storage_online_fc_Unable_to_create_recall' => esc_html__('Unable to create recall request for','6storage-rentals'),
               'six_storage_online_fc_No_Invoices_To_Show' => esc_html__('No Invoices To Show','6storage-rentals'),
               'six_storage_online_fc_No_Transactions_To_Show' => esc_html__('No Transactions To Show','6storage-rentals'),
               'six_storage_online_fc_Storage_Number' => esc_html__('Storage Number','6storage-rentals'),
               'six_storage_online_fc_Discount' => esc_html__('Discount','6storage-rentals'),
               'six_storage_online_fc_Offer' => esc_html__('Offer','6storage-rentals'),
               'six_storage_online_fc_please_enter_valid_URL' => esc_html__('Please Enter Valid URL','6storage-rentals'),
               'six_storage_online_fc_Available' => esc_html__('Available','6storage-rentals'),
               'six_storage_online_fc_Security_Deposit' => esc_html__('Security Deposit','6storage-rentals'),
               'six_storage_online_fc_Invoice_Date' => esc_html__('Invoice Date','6storage-rentals'),
               'six_storage_online_fc_Due_Date' => esc_html__('Due Date','6storage-rentals'),
               'six_storage_online_fc_Statement_has_been_sent' => esc_html__('Statement has been sent to your registered email','6storage-rentals'), 
               'six_storage_online_fc_Statement_failed_to_send' => esc_html__('Statement failed to send, please contact support','6storage-rentals'),
               'six_storage_online_fc_There_are_no_pending' => esc_html__('There are no pending invoices to pay','6storage-rentals'),
               'six_storage_online_fc_Please_select_invoices ' => esc_html__('Please select invoices to make payment','6storage-rentals'),
               'six_storage_online_fc_Unable_to_process_the_payment' => esc_html__('Unable to process the payment, please contact storage owner','6storage-rentals'),
               'six_storage_online_fc_Business_User' => esc_html__('Business User','6storage-rentals'),
               'six_storage_online_fc_No_credit_cards_saved' => esc_html__('No Credit Card Saved','6storage-rentals'),
               'six_storage_online_fc_Autopay' => esc_html__('Autopay','6storage-rentals'),
               'six_storage_online_fc_Off' => esc_html__('Off','6storage-rentals'),
               'six_storage_online_fc_On' => esc_html__('On','6storage-rentals'),
               'six_storage_online_fc_Delete' => esc_html__('Delete','6storage-rentals'),
               'six_storage_online_fc_Default' => esc_html__('Default','6storage-rentals'),
               'six_storage_online_fc_Failed_to_upload_file' => esc_html__('Failed to upload file','6storage-rentals'),
               'six_storage_online_fc_View' => esc_html__('View','6storage-rentals'),
               'six_storage_online_fc_Unable_to_load_credit' => esc_html__('Unable to load credit card form, please contact storage facility','6storage-rentals'),
               'six_storage_online_fc_Unable_to_make_this_card_as_default' => esc_html__('Unable to make this card as default, please contact storage facility','6storage-rentals'),
               'six_storage_online_fc_Recurring_payments_has_been'  => esc_html__('Recurring payments has been turned on for your account','6storage-rentals'),
               'six_storage_online_fc_Recurring_payments_has_been_turned_off'  => esc_html__('Recurring payments has been turned off for your account','6storage-rentals'),
               'six_storage_online_fc_Unable_to_turn_on_recurring_payments' => esc_html__('Unable to turn on recurring payments, please contact storage facility','6storage-rentals'),
               'six_storage_rental_Price' => esc_html__('Rental Price','6storage-rentals'),
               'six_storage_please_select_merchandise' => esc_html__('Please select Merchandise','6storage-rentals'),
               'six_storage_please_select_insurance' => esc_html__('Please Select Insurance','6storage-rentals'),
               'six_storage_please_select_service' => esc_html__('Please select service','6storage-rentals'),
               'six_storage_please_add_vehicle_details' => esc_html__('Please Add Vehicle Details','6storage-rentals'),
               'six_storage_no_units_availble_label_text' => esc_html__('No units available','6storage-rentals'),

               // From MoveIn
               'six_storage_online_fs_ad_vehicle_info_toggle' => get_option('six_storage_online_fs_ad_vehicle_info_toggle'),
               'six_storage_online_fs_ti_SSN_toggle' => get_option('six_storage_online_fs_ti_SSN_toggle' ),
               'six_storage_online_fs_ad_vehicle_details' => esc_html__('Vehicle Details','6storage-rentals'),

               'six_storage_online_fs_ad_vehicle_type_custom_word' => esc_html__('Vehicle Type','6storage-rentals'),
               'six_storage_online_fs_ad_vehicle_type_validation' => esc_html__('Please Enter Vehicle Type','6storage-rentals'),
               'six_storage_online_fs_ad_vehicle_manufactured_year_custom_word' => esc_html__('Vehicle Year','6storage-rentals'),
               'six_storage_online_fs_ad_vehicle_manufactured_year_validation' => esc_html__('Please Select Year','6storage-rentals'),
               'six_storage_online_fs_ad_vehicle_brand_custom_word' =>  esc_html__('Brand','6storage-rentals'),
               'six_storage_online_fs_ad_vehicle_brand_validation' => esc_html__('Please Enter Brand','6storage-rentals'),
               'six_storage_online_fs_ad_vehicle_model_custom_word' => esc_html__('Model','6storage-rentals'),
               'six_storage_online_fs_ad_vehicle_model_validation' => esc_html__('Please Enter Vehicle Model','6storage-rentals'),
               'six_storage_online_fs_ad_vehicle_make_color_custom_word' => esc_html__('Color','6storage-rentals'),
               'six_storage_online_fs_ad_vehicle_make_color_validation' =>  esc_html__('Please Enter Color','6storage-rentals'),
               'six_storage_online_over_due' =>  esc_html__('Over due','6storage-rentals'),
               'six_storage_online_fs_ad_vehicle_licence_state_custom_word' =>  esc_html__('License State','6storage-rentals'),
               'six_storage_online_fs_ad_vehicle_licence_state_validation' => esc_html__('Please Enter License State','6storage-rentals'),
               'six_storage_online_fs_ad_vehicle_registration_number_custom_word' => esc_html__('Reg #','6storage-rentals'),
               'six_storage_online_fs_ad_vehicle_registration_number_validation' => esc_html__('Please Enter Registration No','6storage-rentals'),
               'six_storage_online_fs_ad_vehicle_license_number_custom_word' => esc_html__('License #','6storage-rentals'),
               'six_storage_online_fs_ad_vehicle_license_year_custom_word' => esc_html__('Year','6storage-rentals'),
               'six_storage_online_fs_ad_vehicle_license_Color_custom_word' => esc_html__('Color','6storage-rentals'),
               'six_storage_online_fs_ad_vehicle_license_State_custom_word' => esc_html__('State','6storage-rentals'),
               'six_storage_online_fs_ad_vehicle_Action_custom_word' => esc_html__('Action','6storage-rentals'),
               'six_storage_online_fs_ad_vehicle_license_number_validation' => esc_html__('Please Enter License No','6storage-rentals'),
               'six_storage_online_fs_Please_signup_to_create' => esc_html__('Please signup to create a new account or log in','6storage-rentals'),
               'six_storage_online_fs_Login' => esc_html__('Login','6storage-rentals'),
               'six_storage_online_fs_Signup' => esc_html__('Signup','6storage-rentals'),
               'six_storage_online_fs_Tax' => esc_html__('Tax','6storage-rentals'),
                'six_storage_online_fs_VAT' => esc_html__('VAT','6storage-rentals'),
                'six_storage_online_fs_Total_Due' => esc_html__('Total Due','6storage-rentals'),
                'six_storage_online_fs_Time_Zone' => esc_html__('Access Hours','6storage-rentals'),
                'six_storage_online_fs_Please_Select_Timezone' => esc_html__('Please Select Access Hours','6storage-rentals'),
               'six_storage_online_fs_User_Name' => esc_html__('Username/Email','6storage-rentals'),
               'six_storage_online_fs_Please_Enter_User_Name' => esc_html__('Please Enter Username/Email','6storage-rentals'),
               'six_storage_online_fs_Password' => esc_html__('Password','6storage-rentals'),
               'six_storage_online_fs_Please_Enter_Password' => esc_html__('Please Enter Password','6storage-rentals'),
               'six_storage_online_fs_You_have_been_registered' => esc_html__('You have been registered as Business User with the above email','6storage-rentals'),
               'six_storage_online_fs_You_have_been_registered_the_above_email' => esc_html__('You have been registered as Personal user with the above email','6storage-rentals'),
               'six_storage_online_fs_Dont_have_account_click' => esc_html__('Don’t have an account, click here to Signup','6storage-rentals'),
               'six_storage_online_fs_Forgot_Your_Password' => esc_html__('Forgot Your Password','6storage-rentals'),
               'six_storage_online_fs_of_having_trouble_login' => esc_html__('Having trouble logging in?','6storage-rentals'),
               'six_storage_online_fs_First_Name' => esc_html__('First Name','6storage-rentals'),
               'six_storage_online_fs_no_vacantunits' => esc_html__('Sorry! There are no locations with vacant units. Please try again later.','6storage-rentals'),
               'six_storage_online_fs_View_Units' => esc_html__('View Units','6storage-rentals'),
               'six_storage_online_fs_locations_search_pleaceholder' => esc_html__('Zip, City or Address','6storage-rentals'),
               'six_storage_online_fs_no_locations_available' => esc_html__('Sorry, no locations were found matching your search criteria. Please try again with a different location or refine your search.','6storage-rentals'),
               'six_storage_online_fs_Please_Enter_First_Name' => esc_html__('Please Enter First Name','6storage-rentals'),
               'six_storage_online_fs_Last_Name' => esc_html__('Last Name','6storage-rentals'),
               'six_storage_online_fs_Please_Enter_Last_Name' => esc_html__('Please Enter Last Name','6storage-rentals'),
               'six_storage_online_fs_Email' => esc_html__('Email','6storage-rentals'),
               'six_storage_online_fs_Please_Enter_Email' => esc_html__('Please Enter Email Address','6storage-rentals'),
               'six_storage_online_fs_Phone' => esc_html__('Phone','6storage-rentals'),
               'six_storage_online_fs_Mobile' => esc_html__('Mobile','6storage-rentals'),
               'six_storage_online_fs_Please_Enter_Phone_Number' => esc_html__('Please Enter Phone Number','6storage-rentals'),
               'six_storage_online_fs_Lead_Source' => esc_html__('Lead Source','6storage-rentals'),
               'six_storage_online_fs_Please_Select_Lead_Source' => esc_html__('Please Select Lead Source','6storage-rentals'),
               'six_storage_online_fs_Source' => esc_html__('Source','6storage-rentals'),
               'six_storage_online_fs_Please_Enter_Source' => esc_html__('Please Enter Source','6storage-rentals'),
               'six_storage_online_fs_Contact_Preference' => esc_html__('Contact Preference','6storage-rentals'),
               'six_storage_online_fs_Contact_Through' => esc_html__('Contact Through','6storage-rentals'),
               'six_storage_online_fs_SMS' => esc_html__('SMS','6storage-rentals'),
               'six_storage_online_fs_Please_Select_Contact_Me' => esc_html__('Please Select Contact Me On Date','6storage-rentals'),
               'six_storage_online_fs_Comment' => esc_html__('Comment','6storage-rentals'),
               'six_storage_online_fs_Please_Enter_Comment' => esc_html__('Please Enter Comment','6storage-rentals'),
               'six_storage_online_fs_Select' => esc_html__('Select','6storage-rentals'),
               'six_storage_online_fs_Reservation_Charges' => esc_html__('Reservation Charges','6storage-rentals'),
               'six_storage_online_fs_Total_Payable' => esc_html__('Total Payable','6storage-rentals'),
               'six_storage_online_fs_card_is_removed_from_auto_pay_by' => esc_html__('This facility has made autopay mandatory. Please add a new card before deleting current card. To opt for autopay, contact facility.','6storage-rentals'),
               'six_storage_online_fs_Prefered_Unit' => esc_html__('Preferred Unit','6storage-rentals'),
               'six_storage_online_fs_Prefered_Movein_Date' => esc_html__('Preferred Movein Date','6storage-rentals'), 
               'six_storage_online_fs_Please_Select_Prefered' =>  esc_html__('Please Select Prefered Movein Date','6storage-rentals'),
               'six_storage_online_fs_Address' => esc_html__('Address','6storage-rentals'),
               'six_storage_online_fs_Please_Enter_Address' => esc_html__('Please Enter Address','6storage-rentals'),
               'six_storage_online_fs_City' => esc_html__('City','6storage-rentals'),
               'six_storage_online_fs_Please_Enter_City' => esc_html__('Please Enter City','6storage-rentals'),
               'six_storage_online_fs_Country' => esc_html__('Country','6storage-rentals'),
               'six_storage_online_fs_Please_Enter_Country' => esc_html__('Please Enter Country','6storage-rentals'),
               'six_storage_online_fs_Zipcode' => esc_html__('Zip Code','6storage-rentals'),
               'six_storage_online_fs_Please_Enter_Zipcode' => esc_html__('Please Enter Zip Code','6storage-rentals'),
               'six_storage_online_fs_Contact_Me_On' => esc_html__('Contact Me On','6storage-rentals'),
               'six_storage_online_fs_Please_Select_Contact_Me' => esc_html__('Please Select Contact Me On Date','6storage-rentals'),
               'six_storage_online_fs_Reserve_Units' => esc_html__('Reserve Unit','6storage-rentals'),
               'six_storage_online_fs_Password_Mismatched' => esc_html__('Password Mismatched','6storage-rentals'),
               'six_storage_online_fs_Confirm_Password' => esc_html__('Confirm Password','6storage-rentals'),
               'six_storage_online_fs_Sign_up' => esc_html__('Sign Up','6storage-rentals'), 
               'six_storage_online_fs_Read_how_we_handle_you' => esc_html__('Read how we handle your personal information','6storage-rentals'),
               'six_storage_online_fs_Enter_Registered_Username' => esc_html__('Enter Username/Email','6storage-rentals'),
               'six_storage_online_fs_Please_Enter_Username' => esc_html__('Please Enter Username/Email','6storage-rentals'),
               'six_storage_online_fs_Please_text_fill' => esc_html__('Please fill mandatory field','6storage-rentals'),
               'six_storage_online_fs_Please_select_field' => esc_html__('Please select this field','6storage-rentals'),
               'six_storage_online_fs_Hurry_just' => esc_html__('Hurry just','6storage-rentals'),
               'six_storage_online_fs_call_for_availability' => esc_html__('Call for Availability','6storage-rentals'),
               'six_storage_online_fs_Inquiry' => esc_html__('Inquire','6storage-rentals'),
               'six_storage_online_fs_Rent_Now'=> esc_html__('Rent Now','6storage-rentals'),
               'six_storage_online_fs_Reserve'=> esc_html__('Reserve','6storage-rentals'),
               'six_storage_online_fs_remove'=> esc_html__('remove','6storage-rentals'),
               'six_storage_online_fs_Please_Enter_Registered' => esc_html__('Please Enter Registered Username','6storage-rentals'),
               'six_storage_online_fs_Enter_New_Passrword' =>  esc_html__('Enter New Passrword','6storage-rentals'),
               'six_storage_online_fs_Please_Enter_New_Password' => esc_html__('Please Enter New Password','6storage-rentals'),
               'six_storage_online_fs_Enter_Confirmation_Code' => esc_html__('Enter Confirmation Code','6storage-rentals'),
               'six_storage_online_fs_Please_Enter_Confirmation_Code' => esc_html__('Please Enter Confirmation Code','6storage-rentals'),
               'six_storage_online_fs_Please_Select_Units_To_Rent' =>  esc_html__('Please Select Units To Rent','6storage-rentals'),
               'six_storage_online_fs_You_must_pay_invoices_in_chronological_order_based_on_the_due_date' =>  esc_html__('You must pay invoices in chronological order based on the due date.','6storage-rentals'),
               'six_storage_online_fs_No_Insurance' => esc_html__('No Insurance','6storage-rentals'),
               'six_storage_online_fs_No_insurance_plans_available' => esc_html__('No insurance plans available','6storage-rentals'),
               'six_storage_online_fs_Select_Service' => esc_html__('Select','6storage-rentals'),
               'six_storage_online_fs_Service_Name' => esc_html__('Service Name','6storage-rentals'),
                'six_storage_online_fs_Price' => esc_html__('Price','6storage-rentals'),
                'six_storage_online_fs_Net_Cost' => esc_html__('Net Cost','6storage-rentals'),
                'six_storage_online_fs_No_extra_services_available' => esc_html__('No extra services available','6storage-rentals'),
                'six_storage_online_fs_Merchandise' => esc_html__('Merchandise','6storage-rentals'),
                'six_storage_online_fs_Select_Products' => esc_html__('Select Products','6storage-rentals'),
                'six_storage_online_fs_Storage_Details' => esc_html__('Storage Details','6storage-rentals'),
                'six_storage_online_fs_Please_Read' => esc_html__('Please Read','6storage-rentals'),

               'six_storage_online_fs_Resend_confirmation_code' => esc_html__('Resend confirmation code','6storage-rentals'),
               'six_storage_online_fs_Submit'  => esc_html__('Submit','6storage-rentals'),
               'six_storage_online_fs_Didnt_receive_confirmation' => esc_html__('Didnt receive confirmation code','6storage-rentals'),
               'six_storage_online_fs_Reserved_Units_Sucessfully' => esc_html__('Reserved Unit Successfully Updated','6storage-rentals'),
               'six_storage_online_fs_Your_enquiry_Sucessfully_Updated' => esc_html__('Your Inquire Successfully Updated','6storage-rentals'),
               'six_storage_online_fs_Something_went_wrong_please' => esc_html__('Something went wrong please contact support team','6storage-rentals'),
               'six_storage_online_fs_No' => esc_html__('No','6storage-rentals'), 
               'six_storage_online_fs_Location' => esc_html__('Location','6storage-rentals'),
               'six_storage_online_fs_Building' => esc_html__('Building','6storage-rentals'),
               'six_storage_online_fs_Total_rent_for_the_payment_period' => esc_html__('Total rent for the payment period','6storage-rentals'),
               'six_storage_online_fs_Rent_for_the_payment_period' => esc_html__('Rent for the payment period','6storage-rentals'),
               'six_storage_online_fs_Size' => esc_html__('Size','6storage-rentals'),
               'six_storage_online_fs_Invoice_Period' => esc_html__('Invoice Period','6storage-rentals'),
               'six_storage_online_fs_Initial_Rent' => esc_html__('Initial Rent','6storage-rentals'),
               'six_storage_online_fs_Deposit' => esc_html__('Deposit','6storage-rentals'),
               'six_storage_online_fs_No_services_selected' => esc_html__('No services selected','6storage-rentals'),
               'six_storage_online_fs_No_insurance_plans_selected' => esc_html__('No insurance plans selected','6storage-rentals'),        
               'six_storage_online_fs_No_merchandise_selected' => esc_html__('No merchandise selected','6storage-rentals'),
               'six_storage_online_fs_Please_contact_storage_admin' => esc_html__('Please contact storage admin to get your lease agreement','6storage-rentals'),
               'six_storage_online_fs_Technical_error' => esc_html__('Technical error','6storage-rentals'), 
               'six_storage_online_fs_Please_contact_storage' => esc_html__('Please contact storage facility for further information','6storage-rentals'), 
               'six_storage_online_fs_Try_Again' => esc_html__('Try Again','6storage-rentals'), 
               'six_storage_online_fs_filter_ascending' => esc_html__('Ascending','6storage-rentals'),
               'six_storage_online_fs_filter_descending' => esc_html__('Descending','6storage-rentals'), 
               'six_storage_online_fs_Please_Enter' => esc_html__('Please Enter','6storage-rentals'),
               'six_storage_online_fs_click_here_to_view_document' => esc_html__('Click here to view document','6storage-rentals'),    
               'six_storage_online_fs_ad_vehicle_type_toggle' => get_option('six_storage_online_fs_ad_vehicle_type_toggle'),
               'six_storage_online_fs_ad_vehicle_type_is_mandatory' => get_option('six_storage_online_fs_ad_vehicle_type_is_mandatory'),
               'six_storage_online_fs_ad_vehicle_manufactured_year_toggle' => get_option('six_storage_online_fs_ad_vehicle_manufactured_year_toggle'),
               'six_storage_online_fs_ad_vehicle_manufactured_year_is_mandatory' => get_option('six_storage_online_fs_ad_vehicle_manufactured_year_is_mandatory'),
               'six_storage_online_fs_ad_vehicle_brand_toggle' => get_option('six_storage_online_fs_ad_vehicle_brand_toggle'),
               'six_storage_online_fs_ad_vehicle_brand_is_mandatory' => get_option('six_storage_online_fs_ad_vehicle_brand_is_mandatory'),
               'six_storage_online_fs_ad_vehicle_model_toggle' => get_option('six_storage_online_fs_ad_vehicle_model_toggle'),
               'six_storage_online_fs_ad_vehicle_model_is_mandatory' => get_option('six_storage_online_fs_ad_vehicle_model_is_mandatory'),
               'six_storage_online_fs_ad_vehicle_make_color_toggle' => get_option('six_storage_online_fs_ad_vehicle_make_color_toggle'),
               'six_storage_online_fs_ad_vehicle_make_color_is_mandatory' => get_option('six_storage_online_fs_ad_vehicle_make_color_is_mandatory'),
               'six_storage_online_fs_ad_vehicle_licence_state_toggle' => get_option('six_storage_online_fs_ad_vehicle_licence_state_toggle'),
               'six_storage_online_fs_ad_vehicle_licence_state_is_mandatory' => get_option('six_storage_online_fs_ad_vehicle_licence_state_is_mandatory'),
               'six_storage_online_fs_ad_vehicle_registration_number_toggle' => get_option('six_storage_online_fs_ad_vehicle_registration_number_toggle'),
               'six_storage_online_fs_ad_vehicle_registration_number_is_mandatory' => get_option('six_storage_online_fs_ad_vehicle_registration_number_is_mandatory'),
               'six_storage_online_fs_ad_vehicle_licence_number_toggle' => get_option('six_storage_online_fs_ad_vehicle_licence_number_toggle'),
               'six_storage_online_fs_ad_vehicle_licence_number_is_mandatory' => get_option('six_storage_online_fs_ad_vehicle_licence_number_is_mandatory'),
               
               'six_storage_online_fc_storage_category_toggle' => get_option('six_storage_online_fc_storage_category_toggle'),
               'six_storage_online_fc_location_toggle' => get_option('six_storage_online_fc_location_toggle'),
               'six_storage_online_fc_building_toggle' => get_option('six_storage_online_fc_building_toggle'),
               'six_storage_online_fc_unit_type_toggle' => get_option('six_storage_online_fc_unit_type_toggle'),
               'six_storage_online_fc_unit_size_filter_toggle' => get_option('six_storage_online_fc_unit_size_filter_toggle'),
               'six_storage_online_fc_price_range_toggle' => get_option('six_storage_online_fc_price_range_toggle'),
               'six_storage_online_fc_super_search_toggle' => get_option('six_storage_online_fc_super_search_toggle'),
               'six_storage_online_fc_sort_by_toggle' => get_option('six_storage_online_fc_sort_by_toggle'),
               'six_storage_online_fc_unit_ash_toggle' => get_option('six_storage_online_fc_unit_ash_toggle'),
               'six_storage_online_fc_amenity_toggle' => get_option('six_storage_online_fc_amenity_toggle'),
               'six_storage_online_fs_ti_identitydocument_toggle' => get_option('six_storage_online_fs_ti_identitydocument_toggle'),
                
               // Sign up Modal Popup

               'six_storage_online_fs_sf_first_name_custom_word' => esc_html__('First Name','6storage-rentals'),
               'six_storage_online_fs_sf_first_name_validation' => esc_html__('Please Enter First Name','6storage-rentals'),
               'six_storage_online_fs_sf_last_name_custom_word' => get_option('six_storage_online_fs_sf_last_name_custom_word'),
               'six_storage_online_fs_sf_last_name_validation' => esc_html__('Please Enter Last Name','6storage-rentals'),
               'six_storage_online_fs_sf_email_custom_word' => get_option('six_storage_online_fs_sf_email_custom_word'),
               'six_storage_online_fs_sf_email_validation' => get_option('six_storage_online_fs_sf_email_validation'),
               'six_storage_online_fs_sf_confirm_email_custom_word' => get_option('six_storage_online_fs_sf_confirm_email_custom_word'),
               'six_storage_online_fs_sf_confirm_email_validation' => esc_html__('Please Enter Confirm Email','6storage-rentals'),
               'six_storage_online_fs_sf_user_name_custom_word' => get_option('six_storage_online_fs_sf_user_name_custom_word'),
               'six_storage_online_fs_sf_user_name_validation' => esc_html__('Please Enter Username','6storage-rentals'),
               'six_storage_online_fs_sf_phone_number_custom_word' => esc_html__('Phone','6storage-rentals'),
               'six_storage_online_fs_sf_phone_number_validation' => esc_html__('Please Enter Phone Number','6storage-rentals'),
               'six_storage_online_fs_sf_signupUsername_validation' => esc_html__('Username should be minimum 3 characters in length','6storage-rentals'),
               'six_storage_online_fs_ad_insurance_premium' => esc_html__('Premium','6storage-rentals'),
               'six_storage_online_fs_ad_insurance_premium_with_tax' => esc_html__('Premium(With Tax)','6storage-rentals'),
               //Insurance
               'six_storage_online_fs_ad_select_insurance' => esc_html__('Select','6storage-rentals'),
               'six_storage_online_fs_ad_insurance_toggle' => get_option('six_storage_online_fs_ad_insurance_toggle'),
               'six_storage_online_fs_ad_post_booking_insurance_popup_toggle' => get_option('six_storage_online_fs_ad_post_booking_insurance_popup_toggle'),
               'six_storage_online_fs_ad_insurance_name' => esc_html__('Insurance Name','6storage-rentals'),
               'six_storage_online_fs_ad_Period' => esc_html__('Period','6storage-rentals'),
               'six_storage_online_fs_ad_insurance_premium' => esc_html__('Premium (With Tax)','6storage-rentals'),
               'six_storage_online_fs_ad_ipt' => esc_html__('IPT','6storage-rentals'),
               'six_storage_online_fs_ad_total_insurance_payable_custom_word' => get_option('six_storage_online_fs_ad_total_insurance_payable_custom_word'),
               'six_storage_online_fs_ad_Coverage' => esc_html__('Coverage','6storage-rentals'),

               'six_storage_online_fs_ad_merchandise_toggle' => get_option('six_storage_online_fs_ad_merchandise_toggle'),
               'six_storage_online_fs_ad_merchandise_custom_word' => get_option('six_storage_online_fs_ad_merchandise_custom_word'),
               
               'six_storage_online_fs_ti_timezone_toggle' => get_option('six_storage_online_fs_ti_timezone_toggle'),
               'six_storage_online_fs_ti_timezone_custom_word' => get_option('six_storage_online_fs_ti_timezone_custom_word'),
               'six_storage_online_fs_ti_timezone_validation' => get_option('six_storage_online_fs_ti_timezone_validation'),
               'six_storage_online_fs_ti_timezone_is_mandatory' => get_option('six_storage_online_fs_ti_timezone_is_mandatory'),
               'six_storage_online_fs_of_additional_months_toggle' => get_option('six_storage_online_fs_of_additional_months_toggle'),

               'six_storage_online_fs_ti_gateaccesscode_toggle' => get_option('six_storage_online_fs_ti_gateaccesscode_toggle'),
               'six_storage_online_fs_ti_gate_access_code' => esc_html__('Gate Access Code','6storage-rentals'),
               'six_storage_online_fs_ti_please_enter_gate_access_code' => esc_html__('Please Enter Gate Access Code','6storage-rentals'),
               'six_storage_online_fs_ti_gateaccesscode_is_mandatory' => get_option('six_storage_online_fs_ti_gateaccesscode_is_mandatory'),
               'six_storage_online_Over_due' => esc_html__('Over due','6storage-rentals'),

               //Move Out Date

               'six_storage_online_fs_of_schedule_move_out_date_custom_word' => get_option('six_storage_online_fs_of_schedule_move_out_date_custom_word'),

               'six_storage_online_fc_schedule_minimum_days_custom_word' => get_option('six_storage_online_fc_schedule_minimum_days_custom_word'),
               'six_storage_online_fc_schedule_maximum_days_custom_word' => get_option('six_storage_online_fc_schedule_maximum_days_custom_word'),

               'six_storage_online_fc_moveindate_custom_word' => get_option('six_storage_online_fc_moveindate_custom_word'),
               'six_storage_online_Services' => esc_html__('Services','6storage-rentals'),
               'six_storage_move_in_approval_success_message' => esc_html__('You have successfully booked the unit(s)','6storage-rentals'),
               'six_storage_move_in_approval_success_message_two' => esc_html__('You will be notified when the storage admin confirms the lease(s)','6storage-rentals'),
              
               //Buying insurance
               'six_storage_online_protect_your_belonging' => esc_html__('PROTECT YOUR BELONGINGS!','6storage-rentals'),
               'six_storage_online_add_protection_plan' => esc_html__('Add a protection plan to your unit. Its quick, easy and affordable','6storage-rentals'),
               'six_storage_online_choose_unit_to_add_insurance' => esc_html__('CHOOSE UNIT TO ADD INSURANCE PLAN','6storage-rentals'),
               'six_storage_online_remaind_me_later' => esc_html__('Remind me later','6storage-rentals'),
               'six_storage_online_Buy_now' => esc_html__('Buy Now!','6storage-rentals'),
               'six_storage_online_Covers_for'=> esc_html__('Cover for ','6storage-rentals'),
                'six_storage_per_month'=> esc_html__('per month','6storage-rentals'),
                'six_storage_online_Insurance_Cover_Period'=> esc_html__('Insurance Cover Period:','6storage-rentals'),
                'six_storage_online_Premium_on_due_now'=> esc_html__('Premium on due now:','6storage-rentals'),
                'six_storage_online_insurance_tax'=> esc_html__('Tax','6storage-rentals'),
                'six_storage_online_insurance_total'=> esc_html__('Total:','6storage-rentals'),
                'six_storage_online_I_have_my_own_insurance'=> esc_html__('I have my own insurance','6storage-rentals'),
                'six_storage_online_dont_show'=> esc_html__("Don't Show",'6storage-rentals'),
               // Sign In

               'six_storage_online_fs_of_Please_Enter_Username' => esc_html__('Please Enter Username/Email','6storage-rentals'),
               'six_storage_online_fs_of_Enter_Registered_Username' => esc_html__('Enter Username/Email','6storage-rentals'),
               'six_storage_online_fs_of_Submit' => esc_html__('Submit','6storage-rentals'),
'six_storage_online_rs_of_Submit' => esc_html__('Reset your password','6storage-rentals'),
               'six_storage_online_fs_of_Already_having_an_account_click_here_to_login' =>  esc_html__('Already having an account? Click here to Login','6storage-rentals'),
               'six_storage_online_fs_of_Please_Enter_Registered_Username' => esc_html__('Please Enter Registered Username','6storage-rentals'),
               'six_storage_online_fs_of_Enter_Confirmation_Code' => esc_html__('Enter Confirmation Code','6storage-rentals'),
               'six_storage_online_fs_of_Please_Enter_Confirmation_Code' => esc_html__('Please Enter Confirmation Code','6storage-rentals'),
               'six_storage_online_fs_of_Enter_New_Passrword' =>  esc_html__('Enter New Passrword','6storage-rentals'),
               'six_storage_online_fs_of_Please_Enter_New_Password' => esc_html__('Please Enter New Password','6storage-rentals'),
               'six_storage_online_fs_of_Submit'=> esc_html__('Submit','6storage-rentals'),
               'six_storage_online_fs_of_Password_has_been_successfully_reset_to_new_password' => esc_html__('Password has been successfully reset to new password','6storage-rentals'),
               'six_storage_online_fs_Login' => esc_html__('Login','6storage-rentals'),  
               'six_storage_online_fs_Password_has_been_successfully' =>  esc_html__('Password has been successfully sent to your registered email','6storage-rentals'), 
'six_storage_online_fs_Reset_email_has_been_successfully' =>  esc_html__('Reset Password link has been successfully sent to your registered email','6storage-rentals'), 
               'six_storage_online_fs_Invalid_token' =>  esc_html__('Invalid User','6storage-rentals'), 
               'six_storage_online_fs_Confirmation_code_has_been_sent' => esc_html__('Confirmation code has been sent to your registered email, please check your inbox','6storage-rentals'),
            
              //unitselection
              'six_storage_online_fs_Book_Now' => esc_html__('Book Now','6storage-rentals'), 
              'six_storage_online_please_enter_atleast_six_characters' => esc_html__('Please enter at least 6 characters','6storage-rentals'), 



               // Sign Up

               'six_storage_online_su_Enter_Registered_Username' => esc_html__('Enter Registered Username','6storage-rentals'), 
               'six_storage_online_please_enter_ssn_validation' => esc_html__('Please Enter SSN','6storage-rentals'),
               'six_storage_online_su_Please_Enter_Registered_Username' =>  esc_html__('Please Enter Registered Username','6storage-rentals'),
               'six_storage_online_su_Enter_Confirmation_Code' => esc_html__('Enter Confirmation Code','6storage-rentals'), 
               'six_storage_online_su_Please_Enter_Confirmation_Code' => esc_html__('Please Enter Confirmation Code','6storage-rentals'),
               'six_storage_online_su_Submit' => esc_html__('Submit','6storage-rentals'),
               'six_storage_online_su_Cancel' => esc_html__('Cancel','6storage-rentals'),
               'six_storage_online_su_Resend_confirmation_code' => esc_html__('Resend confirmation code','6storage-rentals'),
               'six_storage_online_su_Please_check_your_inbox_and_submit' =>  esc_html__('Please check your inbox and submit the confirmation code','6storage-rentals'),
               'six_storage_online_su_Unable_to_submit_confirmation' => esc_html__('Unable to submit confirmation code, please contact storage owner','6storage-rentals'),
               'six_storage_online_su_You_have_signed_up' => esc_html__('You have signed up successfully, happy renting','6storage-rentals'),
               'six_storage_online_su_You_have_successfully_signed_up' => esc_html__('You have signed up successfully, happy renting','6storage-rentals'),
               'six_storage_online_su_Confirmation_code_has_been_sent' => esc_html__('Confirmation code has been sent to your registered email, please check your inbox','6storage-rentals'),
               'six_storage_online_su_Please_Enter_Valid_Email' => esc_html__('Please Enter Valid Email','6storage-rentals'),
               'six_storage_online_su_Something_went_wrong' => esc_html__('Something went wrong, please contact administrator','6storage-rentals'),
               'six_storage_online_su_Internet_lost' => esc_html__('Sorry, it appears your internet connection was lost or disrupted.','6storage-rentals'),
               'six_storage_online_su_Check_internet_connection' => esc_html__('Please check your internet connection and','6storage-rentals'),
               'six_storage_online_su_try_again' => esc_html__('try again','6storage-rentals'),
              // 'six_storage_online_su_gate_access_tooltip_msg' => esc_html__('Enter a personal PIN code that you will use to enter the property and/or to access your unit/space. You will need to remember this code.'),

               // Calender page helperjs here

               'six_storage_online_hj_clear' => esc_html__('Clear','6storage-rentals'),
               'six_storage_online_hj_done' => esc_html__('Done','6storage-rentals'),
               'six_storage_online_hj_January' => esc_html__('January','6storage-rentals'),
               'six_storage_online_hj_February' => esc_html__('February','6storage-rentals'),
               'six_storage_online_hj_March' => esc_html__('March','6storage-rentals'),
               'six_storage_online_hj_April' => esc_html__('April','6storage-rentals'),
               'six_storage_online_hj_May' => esc_html__('May','6storage-rentals'),
               'six_storage_online_hj_June' => esc_html__('June','6storage-rentals'),
               'six_storage_online_hj_July' => esc_html__('July','6storage-rentals'),
               'six_storage_online_hj_August' => esc_html__('August','6storage-rentals'),
               'six_storage_online_hj_September' => esc_html__('September','6storage-rentals'),
               'six_storage_online_hj_October' => esc_html__('October','6storage-rentals'),
               'six_storage_online_hj_November' => esc_html__('November','6storage-rentals'),
               'six_storage_online_hj_December' => esc_html__('December','6storage-rentals'),

               'six_storage_online_hj_Jan' => esc_html__('Jan','6storage-rentals'),
               'six_storage_online_hj_Feb' => esc_html__('Feb','6storage-rentals'),
               'six_storage_online_hj_Mar' => esc_html__('Mar','6storage-rentals'),
               'six_storage_online_hj_Apr' => esc_html__('Apr','6storage-rentals'),
               'six_storage_online_hj_Jun' => esc_html__('Jun','6storage-rentals'),
               'six_storage_online_hj_Jul' => esc_html__('Jul','6storage-rentals'),
               'six_storage_online_hj_Aug' => esc_html__('Aug','6storage-rentals'),
               'six_storage_online_hj_Sep' => esc_html__('Sep','6storage-rentals'), 
               'six_storage_online_hj_Oct' => esc_html__('Oct','6storage-rentals'), 
               'six_storage_online_hj_Nov' => esc_html__('Nov','6storage-rentals'), 
               'six_storage_online_hj_Dec' => esc_html__('Dec','6storage-rentals'),

               'six_storage_online_hj_Sunday' => esc_html__('Sunday','6storage-rentals'), 
               'six_storage_online_hj_Monday' => esc_html__('Monday','6storage-rentals'), 
               'six_storage_online_hj_Tuesday' => esc_html__('Tuesday','6storage-rentals'), 
               'six_storage_online_hj_Wednesday' => esc_html__('Wednesday','6storage-rentals'), 
               'six_storage_online_hj_Thursday' => esc_html__('Thursday','6storage-rentals'), 
               'six_storage_online_hj_Friday' => esc_html__('Friday','6storage-rentals'), 
               'six_storage_online_hj_Saturday' => esc_html__('Saturday','6storage-rentals'), 
               'six_storage_online_hj_Sun' => esc_html__('Sun','6storage-rentals'), 
               'six_storage_online_hj_Mon' => esc_html__('Mon','6storage-rentals'), 
               'six_storage_online_hj_Tue' => esc_html__('Tue','6storage-rentals'), 
               'six_storage_online_hj_Wed' => esc_html__('Wed','6storage-rentals'), 
               'six_storage_online_hj_Thu' => esc_html__('Thu','6storage-rentals'), 
               'six_storage_online_hj_Fri' => esc_html__('Fri','6storage-rentals'), 
               'six_storage_online_hj_Sat' => esc_html__('Sat','6storage-rentals'), 
               'six_storage_online_hj_S' =>  esc_html_x('S','Saturday','6storage-rentals'), 
               'six_storage_online_hj_Sunday_short' => esc_html_x('S','Sunday','6storage-rentals'),
               'six_storage_online_hj_M' => esc_html__('M','6storage-rentals'), 
               'six_storage_online_hj_T' => esc_html_x('T','Tuesday','6storage-rentals'), 
               'six_storage_online_hj_Thursday_short_form' => esc_html_x('T','Thursday','6storage-rentals'), 
               'six_storage_online_hj_W' => esc_html__('W','6storage-rentals'), 
               'six_storage_online_hj_F' => esc_html__('F','6storage-rentals'), 
               'six_storage_online_dashboard_link_text' => esc_html_x('Dashboard',"SigninLinkText",'6storage-rentals'),




//Move-in Missing string is here...
               'six_storage_online_mi_Select_your_size' => esc_html__('Select your size','6storage-rentals'),
               'six_storage_online_mi_Payment_Period' => esc_html__('Payment Period','6storage-rentals'),
               'six_storage_online_mi_unit_left' => esc_html__('unit(s) left','6storage-rentals'),
               'six_storage_online_mi_Forgot_Password' => esc_html__('Forgot Password','6storage-rentals'),
               'six_storage_online_mi_Reset_Password' => esc_html__('Reset Password','6storage-rentals'),
               'six_storage_online_mi_reset_Password' => esc_html__('Reset Password','6storage-rentals'),
'six_storage_online_mi_Form_Reset_Password' => esc_html__('Reset Password','6storage-rentals'),               
               'six_storage_online_mi_Reset_Password' => esc_html__('Reset Your Password','6storage-rentals'),               
               'six_storage_online_fs_of_Please_enter_the_email_address_like_your_password_reset_information_sent_to' => esc_html__('Please enter the email address you would like your password reset information sent to.','6storage-rentals'),
               'six_storage_online_mi_Search' => esc_html__('Search','6storage-rentals'),
               'six_storage_online_mi_Email' => esc_html__('Email','6storage-rentals'),
               'six_storage_online_mi_Confirm_Email' => esc_html__('Confirm Email','6storage-rentals'),
               'six_storage_online_mi_Please_Confirm_Email' => esc_html__('Please Enter Confirm Email','6storage-rentals'),
               'six_storage_online_mi_Username' => esc_html__('Username','6storage-rentals'),
               'six_storage_online_mi_Email_Not_Matched' => esc_html__('Email Not Matched','6storage-rentals'),
               'six_storage_online_mi_Excl_of' => esc_html__('Excl. of','6storage-rentals'),
               'six_storage_online_mi_Incl_of' => esc_html__('Price includes tax','6storage-rentals'),
               'six_storage_online_mi_Inquiry_Now' => esc_html__('Inquire Now','6storage-rentals'),
               'six_storage_online_mi_Contact_Us' => esc_html__('Contact Us','6storage-rentals'),
               'six_storage_online_mi_Please_Select_Units_Reserve' => esc_html__('Please Select Unit To Reserve','6storage-rentals'),
               'six_storage_online_mi_Gate_Access_Code_must_digits' => esc_html__('Gate Access Code must be at least 4 digits','6storage-rentals'),
               'six_storage_online_Gateaccess_code_must' => esc_html__('Gate Access Code must be', '6storage-rentals'),
               'six_storage_online_Gateaccess_code_digits' => esc_html__('digits', '6storage-rentals'),
               'six_storage_online_mi_Gate_Access_Code_Is_Invalid' => esc_html__('Gate Access Code Is Invalid','6storage-rentals'),
               'six_storage_online_mi_Please_Select_Contact_Prefernce' => esc_html__('Please Select Contact Preference','6storage-rentals'),
               'six_storage_online_mi_How_do_you_know_about_us' => esc_html__('How do you know about us ?','6storage-rentals'),
               'six_storage_online_mi_Select_Storage_Category' => esc_html__('Select Storage Category','6storage-rentals'),
               'six_storage_online_mi_Select_Location' => esc_html__('Select Location','6storage-rentals'),
               'six_storage_online_mi_Select_Unit_Type' => esc_html__('Select Unit Type','6storage-rentals'),
               'six_storage_online_mi_Select_your_unit_dimension' => esc_html__('Select Your Size','6storage-rentals'),
               'six_storage_online_mi_Select_Building' => esc_html__('Select Building','6storage-rentals'),
               'six_storage_online_mi_Select_Amenity'  =>esc_html__('Select Amenity','6storage-rentals'),
               'six_storage_online_mi_Select_Identity' => esc_html__('Select Identity','6storage-rentals'),
               'six_storage_online_mi_Show' => esc_html__('Show','6storage-rentals'),
'six_storage_online_mi_previous' => esc_html__('Previous Units','6storage-rentals'),
               'six_storage_online_fs_Please_Accept_the_Terms_and_Conditions' => esc_html__('Please Accept the Terms and Conditions','6storage-rentals'),
               'six_storage_online_mi_more_units' => esc_html__('more units','6storage-rentals'),
               'six_storage_online_mi_Select_your_storage' => esc_html__('Select your storage(s)','6storage-rentals'),
               'six_storage_online_fs_six_storage_online_fs_Building' => esc_html__('Building','6storage-rentals'),
               'six_storage_online_mi_Please_choose_your_addons_like_Insurance' => esc_html__('Please choose your addons like Insurance, Additional Services or Merchandise','6storage-rentals'),
               'six_storage_online_mi_Addons' => esc_html__('Addons','6storage-rentals'),
               'six_storage_online_mi_Add_More' => esc_html__('Add More','6storage-rentals'),
               'six_storage_online_Please_Enter_Valid_Number' => esc_html__('Please Enter Valid Number','6storage-rentals'),
               'six_storage_online_Please_Enter_Valid_Zipcode' => esc_html__('Please Enter Valid Zipcode','6storage-rentals'),

               'six_storage_online_Offers' => esc_html__('Offer(s)','6storage-rentals'),
          
               'six_storage_online_profile_choose_file' => esc_html__('Choose a file','6storage-rentals'),
               'six_storage_online_profile_upload_photo' => esc_html__('Upload Photo','6storage-rentals'),
               'six_storage_online_profile_photo_two_mb' => esc_html__('Please Upload below 2MB image','6storage-rentals'),
               'six_storage_online_profile_photo_small_size' => esc_html__('Please Upload Small Size Image','6storage-rentals'),
               'six_storage_online_profile_photo_view_photo' => esc_html__('View Photo','6storage-rentals'),
               'six_storage_online_profile_photo_take_photo' => esc_html__('Take Photo','6storage-rentals'),
               'six_storage_online_profile_photo_removed_photo_successfully' => esc_html__('Photo removed successfully','6storage-rentals'),
               'six_storage_online_reservation_fee_modal' => esc_html__('Reservation Fee','6storage-rentals'),
               'six_storage_online_insurance_word' => esc_html__('Insurance','6storage-rentals'),

               'six_storage_online_mi_Note' => esc_html__('Note','6storage-rentals'),
               'six_storage_online_mi_Selected_product_will_be_delivered_to_delivery_address' => esc_html__('Selected product(s) will be delivered to delivery address entered in next step','6storage-rentals'),
               'six_storage_online_mi_With_Tax' => esc_html__('With Tax','6storage-rentals'),
               'six_storage_online_mi_Cart' => esc_html__('Cart','6storage-rentals'),
               'six_storage_online_mi_Grid' => esc_html__('Grid','6storage-rentals'),
               'six_storage_online_mi_List' => esc_html__('List','6storage-rentals'),
               'six_storage_online_mi_Added_Vehicles' => esc_html__('Added Vehicles','6storage-rentals'),
               'six_storage_online_mi_Add' => esc_html__('Add','6storage-rentals'),
               'six_storage_online_mi_to' => esc_html__('to','6storage-rentals'),
               'six_storage_online_mi_Refundable' => esc_html__('Refundable','6storage-rentals'),
               


               

//Sign-in page missing string is here...
               'six_storage_online_si_Confirm_Signup' => esc_html__('Confirm Signup','6storage-rentals'),


//Sign-up page missing string is here...
               'six_storage_online_su_Error_Password_must_contain_six_characters' => esc_html__('Error: Password must contain at least eight characters!','6storage-rentals'),
               'six_storage_online_su_Error_Password_must_contain_remove_special_characters' => esc_html__('Error: Please remove these symbols in password Ex: ','6storage-rentals'),
               'six_storage_online_su_Error_Password_must_be_different_Username' => esc_html__('Error: Password must be different from Username!','6storage-rentals'),
               'six_storage_online_su_Error_Password_must_contain_one_number' => esc_html__('Error: Password must contain at least one number (0-9)!','6storage-rentals'),
               'six_storage_online_su_Error_Password_must_contain_one_lowercase_letter' => esc_html__('Error: Password must contain at least one lowercase letter (a-z)!','6storage-rentals'),
               'six_storage_online_su_Error_Password_must_contain_one_uppercase_letter' => esc_html__('Error: Password must contain at least one uppercase letter (A-Z)!','6storage-rentals'),
               'six_storage_online_su_Error_Password_must_contain_one_special_character' => esc_html__('Error: The password must contain at least one special character','6storage-rentals'),

               'six_storage_online_su_Error_Password_must_contain_One_Special_characters' => esc_html__('Error: The password must contain at least one special character Example(!@#$^*)','6storage-rentals'),
               'six_storage_online_su_Error_Password_must_One_Special_characters' => esc_html__('Error: Please remove the special characters symbols in password','6storage-rentals'),
               'six_storage_online_su_Error_Please_check_entered_confirmed_Password' => esc_html__('Error: Please check that you have entered and confirmed your Password!','6storage-rentals'),
               'six_storage_online_su_Error_Username_must_contain_only_letters_numbers_underscores' => esc_html__('Error: Username must contain only letters, numbers and underscores!','6storage-rentals'),
               
//Dashboard page missing string is here...
               'six_storage_online_dp_Failed_update_password' => esc_html__('Failed to update password','6storage-rentals'),      
               'six_storage_online_dp_No_documents_uploaded' => esc_html__('No File Uploads','6storage-rentals'),
               'six_storage_online_dp_New_Password_must_contain_least_six_characters' => esc_html__('New Password must contain at least eight characters!','6storage-rentals'),
               'six_storage_online_dp_New_Password_must_contain_least_one_number' => esc_html__('New Password must contain at least one number (0-9)!','6storage-rentals'),
               'six_storage_online_dp_New_Password_must_contain_least_one_lowercase_letter' => esc_html__('New Password must contain at least one lowercase letter (a-z)!','6storage-rentals'),
               'six_storage_online_dp_New_Password_must_contain_least_one_uppercase_letter' => esc_html__('New Password must contain at least one uppercase letter (A-Z)!','6storage-rentals'),
               //'six_storage_online_dp_New_Password_without_special_tags'=> esc_html__('Please remove these symbols (%,<,>,/,\,&,")','6storage-rentals'),
               //'six_storage_online_dp_New_Password_special_tags_special'=> esc_html__('Please remove these symbols in password Ex:(%,<,>,/,\,&,")','6storage-rentals'),
               'six_storage_online_dp_New_Password_special_tags_special_characters'=> esc_html__('Please remove these symbols in password (%,<,>,/,\,&)!','6storage-rentals'),
               'six_storage_online_dp_Please_check_that_you_have_entered_confirmed_your_Password' => esc_html__('Please check that you have entered and confirmed your Password!','6storage-rentals'),
               'six_storage_online_dp_Good_Standing' => esc_html__('Good Standing','6storage-rentals'),
               'six_storage_online_dp_Paid' => esc_html__('Paid','6storage-rentals'),
               'six_storage_online_dp_Unpaid' => esc_html__('Unpaid','6storage-rentals'),
               'six_storage_online_dp_Partially_paid' => esc_html__('Partially paid','6storage-rentals'),
               'six_storage_online_dp_Password_Updated_Successfully' => esc_html__('Password Updated Successfully','6storage-rentals'),
               'six_storage_online_dp_Password_must_have_six_characters_containing_at_least_one_lowercase_letter' => esc_html__('Password must have eight characters containing at least one lowercase letter (a-z)','6storage-rentals'),
               'six_storage_online_dp_one_number_one_uppercase_letter' => esc_html__('one number (0-9) & one uppercase letter (A-Z)','6storage-rentals'),
               'six_storage_online_dp_Please_Select_Date' => esc_html__('Please Select Date','6storage-rentals'),
               'six_storage_online_dp_Schedule_Moveout_Date' => esc_html__('Schedule Moveout Date','6storage-rentals'),
               'six_storage_online_dp_Profile_Updated_Successfully' => esc_html__('Photo Updated Successfully','6storage-rentals'),
               'six_storage_online_dp_Current_password_and_new_password_are_same' => esc_html__('Current Password And New Password Are Same','6storage-rentals'),
               'six_storage_online_dp_Please_Enter_Your_New_Password' => esc_html__('Please Enter your New Password','6storage-rentals'),
               'six_storage_online_dp_Profile_Edited_Successfully' => esc_html__('Profile Updated Successfully','6storage-rentals'),
               'six_storage_online_mi_Gate_Access_Already_Exist' => esc_html__('Gate access code already exist','6storage-rentals'),
               'six_storage_online_mi_click_here_to_pay' => esc_html__('Click here to pay','6storage-rentals'),
               'six_storage_online_mi_file_label_text' => esc_html__('File','6storage-rentals'),
               'six_storage_online_uploaded_successfully_text' => esc_html__('uploaded successfully','6storage-rentals'),

//Dashboard page missing string is here...
               'six_storage_online_dp_Select_Year' => esc_html__('Select Year','6storage-rentals'),          
               'six_storage_online_text_download' => esc_html__('Download','6storage-rentals'), 
               
               
               'six_storage_online_text_capture' => esc_html__('Capture','6storage-rentals'),          
               'six_storage_online_text_Saved' => esc_html__('Saved','6storage-rentals'),          
               'six_storage_online_text_iban_details' => esc_html__('IBAN Details','6storage-rentals'),          
               'six_storage_online_text_no_iban_details_saved' => esc_html__('No IBAN Details Saved','6storage-rentals'),
               'six_storage_online_select_payment_option' => esc_html__('Select Payment Option','6storage-rentals'),
               'six_storage_online_choose_payment_type' => esc_html__('Choose Payment Type','6storage-rentals'),  
               
               'six_storage_online_password_mismatched' => esc_html__('Password Mismatched','6storage-rentals'),          
               'six_storage_online_please_enter_confirm_password' => esc_html__('Please Enter Confirm Password','6storage-rentals'),          
               'six_storage_online_email_mismatched' => esc_html__('Email Mismatched','6storage-rentals'),          
               'six_storage_online_please_enter_email' => esc_html__('Please Enter Email Address','6storage-rentals'),
               'six_storage_online_please_enter_mobile' => esc_html__('Please Enter Mobile','6storage-rentals'),
               'six_storage_online_please_select_the_unit' => esc_html__('Please select the unit','6storage-rentals'),
               'six_storage_online_covers_for' => esc_html__('Cover for','6storage-rentals'),
               'six_storage_online_Expires_on' => esc_html__('Expires on','6storage-rentals'),
               'six_storage_online_Change_Plan' => esc_html__('Change Plan','6storage-rentals'),
               'six_storage_online_Unit' => esc_html__('Unit#','6storage-rentals'),
               'six_storage_Per_Month' => esc_html__('per month','6storage-rentals'),
               'six_storage_Third_Party' => esc_html__('Third Party','6storage-rentals'),
               'six_storage_online_Yet_to_insure' => esc_html__('Yet to insure','6storage-rentals'),
               'six_storage_online_Buy_Now' => esc_html__('Buy Now','6storage-rentals'),
               'six_storage_next_invoice' => esc_html__('Next invoice','6storage-rentals'),
               'six_storage_current_invoice' => esc_html__('Current Invoice','6storage-rentals'),
               'six_storage_online_mi_Please_select_the_Insurance_Plan' => esc_html__('Please select the Insurance Plan','6storage-rentals'),
               'six_storage_Paymen_option' => esc_html__('Payment Option','6storage-rentals'),
               'six_storage_online_mi_Please_Enter_the_Required_fields' => esc_html__('Please Enter the required fields','6storage-rentals'),
               'six_storage_online_fc_Insurance_third_party' => esc_html__('Third Party Insurance','6storage-rentals'),
               'six_storage_online_There_is_no_document' => esc_html__('There is no document for this particular insurance','6storage-rentals'),

               'six_storage_insurance_current_plan' => esc_html__('Current plan','6storage-rentals'),
               'six_storage_Policy_Provider_Name'=> esc_html__('Policy Provider Name','6storage-rentals'),
               'six_storage_Please_Enter_Policy_Provider_Name'=> esc_html__('Please Enter Policy Provider Name','6storage-rentals'),
               'six_storage_Policy_Number'=> esc_html__('Policy Number','6storage-rentals'),
               'six_storage_Please_Enter_Policy_Number'=> esc_html__('Please Enter Policy Number','6storage-rentals'),
               'six_storage_Policy_Phone_Number'=> esc_html__('Policy Phone Number','6storage-rentals'),
               'six_storage_Please_Enter_Policy_Phone_Number'=> esc_html__('Please Enter Policy Phone Number','6storage-rentals'),
               'six_storage_Effective_From_Date'=> esc_html__('Effective From Date','6storage-rentals'),
               'six_storage_Please_Select_Effective_From_Date'=> esc_html__('Please Select Effective From Date','6storage-rentals'),
               'six_storage_Effective_to_Date'=> esc_html__('Effective To Date','6storage-rentals'),
               'six_storage_Please_Select_Effective_to_Date'=> esc_html__('Please Select Effective To Date','6storage-rentals'),


               'six_storage_online_hide_menu_items' => get_option("six_storage_online_hide_menu_items"),
               'six_storage_online_menu_items_signin_id' => get_option("six_storage_online_menu_items_signin_id"),
               'six_storage_online_menu_items_signup_id' => get_option("six_storage_online_menu_items_signup_id"),
               'six_storage_online_menu_items_dashboard_id' => get_option("six_storage_online_menu_items_dashboard_id"),

               'additional_month_validation_text' => esc_html__('Maximum addition months should be selected is 12','6storage-rentals'),
               'six_storage_online_not_generated' => esc_html__('Not Generated','6storage-rentals'),
               'six_storage_online_card_made_default_successfully' => esc_html__('Card made default successfully','6storage-rentals'),

               'six_storage_online_fs_ad_services_toggle' => get_option("six_storage_online_fs_ad_services_toggle"),
               'six_storage_online_fs_ad_services_is_mandatory' => get_option("six_storage_online_fs_ad_services_is_mandatory"),

               'six_storage_online_hubspot_pickup_integration_toggle' => get_option("six_storage_online_hubspot_pickup_integration_toggle"),
               'six_storage_online_hubspot_url' => get_option("six_storage_online_hubspot_url"),

               'six_storage_online_move_in_flow_note_toggle' => get_option("six_storage_online_move_in_flow_note_toggle"),
               'six_storage_online_move_in_note' => get_option("six-storage-moveinnote"),
               'six_storage_online_storage_details' => get_option("six_storage_online_storage_details"),
               'six_storage_online_addons_details' => get_option("six_storage_online_addons_details"),
               'six_storage_online_tenant_details' => get_option("six_storage_online_tenant_details"),
               'six_storage_online_fs_of_upload_insurance_proof_toggle' => get_option("six_storage_online_fs_of_upload_insurance_proof_toggle"),
               'six_storage_online_fs_of_upload_insurance_proof_toggle_mandatory' => get_option("six_storage_online_fs_of_upload_insurance_proof_toggle_mandatory"),

               'six_storage_online_file_upload_note_toggle' => get_option("six_storage_online_file_upload_note_toggle"),
               'six_storage_online_file_upload_note' => get_option("six_storage_online_file_upload_note"),

               'six_storage_online_fs_invalid_user_name_password' => esc_html__('Invalid Username Password','6storage-rentals'),
               'six_storage_online_fs_password_mismatch' => esc_html__('Password Mismatch','6storage-rentals'),
               'six_storage_online_fs_payment_successfully_processed' => esc_html__('Payment has been successfully processed','6storage-rentals'),
               'six_storage_online_fs_payment_failed_message' => esc_html__('Payment has been failed','6storage-rentals'),
               'six_storage_online_insurance_policy_providername_toggle' => get_option("six_storage_online_insurance_policy_providername_toggle"), 
               'six_storage_online_insurance_policy_providername_is_mandatory' => get_option("six_storage_online_insurance_policy_providername_is_mandatory"), 

               'six_storage_online_fs_ad_third_party_insurance_start_date_toggle' => get_option("six_storage_online_fs_ad_third_party_insurance_start_date_toggle"), 
               'six_storage_online_fs_ad_third_party_insurance_start_date_is_mandatory' => get_option("six_storage_online_fs_ad_third_party_insurance_start_date_is_mandatory"), 

               'six_storage_online_fs_ad_third_party_insurance_end_date_toggle' => get_option("six_storage_online_fs_ad_third_party_insurance_end_date_toggle"), 
               'six_storage_online_fs_ad_third_party_insurance_end_date_is_mandatory' => get_option("six_storage_online_fs_ad_third_party_insurance_end_date_is_mandatory"), 

               'six_storage_online_fs_ad_third_party_insurance_policy_number_toggle' => get_option("six_storage_online_fs_ad_third_party_insurance_policy_number_toggle"), 
               'six_storage_online_fs_ad_third_party_insurance_policy_number_is_mandatory' => get_option("six_storage_online_fs_ad_third_party_insurance_policy_number_is_mandatory"), 

               'six_storage_online_insurance_policy_phonenumber_toggle' => get_option("six_storage_online_insurance_policy_phonenumber_toggle"), 
               'six_storage_online_insurance_policy_phonenumber_is_mandatory' => get_option("six_storage_online_insurance_policy_phonenumber_is_mandatory"), 

               'six_storage_online_mi_contact_admin_buying' => esc_html__('Contact admin for buying insurance','6storage-rentals'),

               'six_storage_online_mi_activate_plan' => esc_html__('Activate Plan','6storage-rentals'),

               'six_storage_online_mi_deactivated_plan' => esc_html__('Deactivated','6storage-rentals'),

               'six_storage_online_mi_insurance_effective_from' => esc_html__('Effective From:','6storage-rentals'),

               'six_storage_online_out_of_stock' => esc_html__('This product is currently out of stock','6storage-rentals'),
               'six_storage_online_payment_setting_not_enabled' => esc_html__('Payment Settings Not Enabled','6storage-rentals'),
               'six_storage_email_messege_admin' => esc_html__('We are currently full. Please call us to be placed on a waitlist or send a message via email to','6storage-rentals'),
               'six_storage_card_added_successfully' => esc_html__('Card Added successfully.','6storage-rentals'),
               'six_storage_card_failed_to_add' => esc_html__('Card Failed to add.','6storage-rentals'),
               
               'six_storage_online_mi_late_fee' => esc_html__('Late Fee','6storage-rentals'),
               'six_storage_online_gate_access_msg_note' => esc_html__('Note:','6storage-rentals'),
               'six_storage_online_please_contact_storage_operator_to_remove' => esc_html__('This facility has made autopay mandatory. Please add a new card before deleting current card. To opt out of autopay, contact facility.','6storage-rentals'),
               'six_storage_online_please_contact_storage_operator_to_perform_this_action' => esc_html__('Please contact storage operator to perform this action.','6storage-rentals'),
               'six_storage_online_since_the_card_is_added_to_autopayments_you' => esc_html__("This facility has made autopay mandatory. Please add a new card before deleting current card. To opt out of autopay, contact facility.",'6storage-rentals'),
               'six_storage_online_autopay_mandatory_unchecked' =>  esc_html__("Please add a new card before deleting current card.",'6storage-rentals'),
               'six_storage_online_gate_access_denied_move_out_expired' => esc_html__('Gate Access Denied due to Scheduled Move-Out date expired','6storage-rentals'),
               'six_storage_online_gate_access_will_be_denied_after_move_out_expired' => esc_html__('Your Gate Access will be denied after your scheduled Move-out date expired','6storage-rentals'),
               'six_storage_online_to_get_ip_val' => $this->six_storage_client_ip,
               'six_storage_online_confirm_booking_text' => esc_html__('Confirm Booking','6storage-rentals'),
               'six_storage_online_Proceed_and_MoveIn_text' => esc_html__('Proceed & Move-In','6storage-rentals'),
               'six_storage_online_Pay_Later_text' => esc_html__('Pay Later','6storage-rentals'),
               'six_storage_online_su_gate_access_tooltip_msg' => esc_html__('Enter a personal PIN code that you will use to enter the property and/or to access your unit/space. You will need to remember this code'),
               'six_storage_online_Click_here_to_refresh' => esc_html__('Click here to refresh','6storage-rentals'),
               'six_storage_online_Uploaded_file_size_is_empty' => esc_html__('Uploaded File Size is Empty','6storage-rentals'),
               
          );
     }
}
