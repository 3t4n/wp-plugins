<?php

namespace SixStorageOnline\Pages\Admin;

use SixStorageOnline\Api\Six_Storage_SettingsApi;
use SixStorageOnline\Api\Callbacks\Six_Storage_AdminCallbacks;
use SixStorageOnline\Base\Six_Storage_BaseController;
use SixStorageOnline\Base\Six_Storage_SettingsKeys;
use SixStorageOnline\Base\Six_Storage_ManagePages;

class Six_Storage_WpAdmin extends Six_Storage_BaseController {
	public $six_storage_settings;
	public $six_storage_pages = array();
	public $six_storage_callbacks;
	public $six_storage_settingsKey;

	public function Six_Storage_WpAdmin_register() {
		$this->six_storage_settings  = new Six_Storage_SettingsApi();
		$this->six_storage_callbacks = new Six_Storage_AdminCallbacks();

		$this->six_storage_setPages();
		$this->six_storage_setSettings();
		$this->six_storage_setSections();

		$this->six_storage_settings->six_storage_addPages( $this->six_storage_pages )->six_storage_settingsAPI_register();

		add_action( 'wp_ajax_six_storage_save_tenant_info', [ $this, 'six_storage_save_tenant_info' ] );

		add_action( 'wp_ajax_six_storage_save_addons', [ $this, 'six_storage_save_addons' ] );

		add_action( 'wp_ajax_six_storage_save_feature_customization', [ $this, 'six_storage_save_feature_customization' ] );

		add_action( 'wp_ajax_six_storage_save_color_customization', [ $this, 'six_storage_save_color_customization' ] );

		add_action( 'wp_ajax_six_storage_save_text_customization', [ $this, 'six_storage_save_text_customization' ] );

		add_action( 'wp_ajax_six_storage_save_terms_and_condition', [ $this, 'six_storage_save_terms_and_condition' ] );

		add_action( 'wp_ajax_six_storage_portal_plugin_registration', [ $this, 'six_storage_portal_registration' ] );
		
	}

	function six_storage_save_tenant_info() {
		$reponse     = array();
		$six_storage_settingsKey = new Six_Storage_SettingsKeys();
		$six_storage_action = sanitize_text_field($_POST['action']); 
		if ( empty( $six_storage_action ) ) {
			$message = [
				'isSuccess'     => false,
				'returnMessage' => 'Empty Param',
				'returnCode'    => "200"
			];
		} else {
			
			$six_storage_first_name_toggle =  sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_first_name_toggle ]);
			$six_storage_first_name_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_first_name_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_first_name_toggle, $six_storage_first_name_toggle,'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_first_name_is_mandatory,$six_storage_first_name_is_mandatory,'yes' );
            
			$six_storage_last_name_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_last_name_toggle ]);
			$six_storage_last_name_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_last_name_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_last_name_toggle, $six_storage_last_name_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_last_name_is_mandatory, $six_storage_last_name_is_mandatory , 'yes' );

			$six_storage__phone1_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_phone1_toggle ]);
			$six_storage_phone1_is_mandatory = sanitize_text_field(  $_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_phone1_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_phone1_toggle, $six_storage__phone1_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_phone1_is_mandatory, $six_storage_phone1_is_mandatory, 'yes' );

			$six_storage__phone2_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_phone2_toggle ]);
			$six_storage_phone2_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_phone2_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_phone2_toggle,$six_storage__phone2_toggle , 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_phone2_is_mandatory,$six_storage_phone2_is_mandatory, 'yes' );

			$six_storage_address1_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_address1_toggle ]);
			$six_storage_address1_is_mandatory = sanitize_text_field( $_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_address1_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_address1_toggle,$six_storage_address1_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_address1_is_mandatory,$six_storage_address1_is_mandatory, 'yes' );

			$six_storage_address2_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_address2_toggle ]);
			$six_storage_address2_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_address2_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_address2_toggle,$six_storage_address2_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_address2_is_mandatory,$six_storage_address2_is_mandatory, 'yes' );

			$six_storage_city_toggle = sanitize_text_field( $_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_city_toggle ]);
			$six_storage_city_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_city_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_city_toggle,$six_storage_city_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_city_is_mandatory, $six_storage_city_is_mandatory	, 'yes' );

			$six_storage_state_toggle =  sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_state_toggle ]);
			$six_storage_state_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_state_is_mandatory ]);	
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_state_toggle, $six_storage_state_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_state_is_mandatory,$six_storage_state_is_mandatory , 'yes' );

			$six_storage_companyname_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_companyname_toggle ]);
			$six_storage_companyname_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_companyname_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_companyname_toggle,$six_storage_companyname_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_companyname_is_mandatory,$six_storage_companyname_is_mandatory , 'yes' );

            $six_storage_country_toggle =  sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_country_toggle ]);
			$six_storage_country_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_country_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_country_toggle, $six_storage_country_toggle , 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_country_is_mandatory,$six_storage_country_is_mandatory , 'yes' );
			
		    $six_storage_dob_toggle =  sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_dob_toggle ]);
			$six_storage_dob_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_dob_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_dob_toggle, $six_storage_dob_toggle , 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_dob_is_mandatory,$six_storage_dob_is_mandatory, 'yes' );

			$six_storage_email_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_email_toggle ]);
			$six_storage_email_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_email_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_email_toggle,$six_storage_email_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_email_is_mandatory, $six_storage_email_is_mandatory, 'yes' );
			
			$six_storage_gateaccesscode_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_gateaccesscode_toggle ]);
			$six_storage_gateaccesscode_is_mandatory =  sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_gateaccesscode_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_gateaccesscode_toggle, $six_storage_gateaccesscode_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_gateaccesscode_is_mandatory,$six_storage_gateaccesscode_is_mandatory , 'yes' );

			$six_storage_timezone_toggle = sanitize_text_field( $_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_timezone_toggle ]);
			$six_storage_timezone_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_timezone_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_timezone_toggle,$six_storage_timezone_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_timezone_is_mandatory,$six_storage_timezone_is_mandatory, 'yes' );

			if($six_storage_timezone_toggle==0){
				add_option( 'six_storage_online_fs_ti_is_timezone_manually_changed', '1' );
			}else{
				delete_option('six_storage_online_fs_ti_is_timezone_manually_changed');
			}


			$six_storage_gateaccesscodemindigits =  sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_gateaccesscodemindigits ]);
			update_option( $six_storage_settingsKey->six_storage_gateaccesscodemindigits, $six_storage_gateaccesscodemindigits, 'yes' );

			$six_storage_upload_document_toggle =  sanitize_text_field( $_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_upload_document_toggle ]);
			$six_storage_upload_document_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_upload_document_is_mandatory ]); 
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_upload_document_toggle, $six_storage_upload_document_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_upload_document_is_mandatory,$six_storage_upload_document_is_mandatory , 'yes' );

			$six_storage_securitydeposit_toggle =  sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_securitydeposit_toggle ]);
			$six_storage_securitydeposit_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_securitydeposit_is_mandatory ]); 
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_securitydeposit_toggle, $six_storage_securitydeposit_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_securitydeposit_is_mandatory,$six_storage_securitydeposit_is_mandatory , 'yes' );

			$six_storage_state_province_toggle =  sanitize_text_field( $_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_state_province_toggle ]);
			$six_storage_state_province_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_state_province_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_state_province_toggle,$six_storage_state_province_toggle,'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_state_province_is_mandatory,$six_storage_state_province_is_mandatory , 'yes' );

			$six_storage_taxid_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_taxid_toggle ]);
			$six_storage_taxid_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_taxid_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_taxid_toggle,$six_storage_taxid_toggle , 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_taxid_is_mandatory,$six_storage_taxid_is_mandatory,'yes' );

			$six_storage_tenantsignature_toggle = sanitize_text_field( $_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_tenantsignature_toggle ]);
			$six_storage_tenantsignature_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_tenantsignature_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_tenantsignature_toggle, $six_storage_tenantsignature_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_tenantsignature_is_mandatory,$six_storage_tenantsignature_is_mandatory , 'yes' );

			$six_storage_tenantphoto_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_tenantphoto_toggle ]); 
			$six_storage_tenantphoto_is_mandatory = sanitize_text_field( $_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_tenantphoto_is_mandatory ]);	
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_tenantphoto_toggle,$six_storage_tenantphoto_toggle , 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_tenantphoto_is_mandatory,$six_storage_tenantphoto_is_mandatory, 'yes' );

			$six_storage_website_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_website_toggle ]);
			$six_storage_website_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_website_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_website_toggle, $six_storage_website_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_website_is_mandatory,$six_storage_website_is_mandatory, 'yes' );

			$six_storage_zip_postalcode_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_zip_postalcode_toggle ]);
			$six_storage_zip_postalcode_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_zip_postalcode_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_zip_postalcode_toggle,$six_storage_zip_postalcode_toggle , 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_zip_postalcode_is_mandatory,$six_storage_zip_postalcode_is_mandatory, 'yes' );

			$six_storage_emergencycontact_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_toggle ]);
			$six_storage_emergencycontact_is_mandatory =  sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_toggle,$six_storage_emergencycontact_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_is_mandatory,$six_storage_emergencycontact_is_mandatory , 'yes' );

			$six_storage_emergencycontact_first_name_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_first_name_toggle ]);
			$six_storage_emergencycontact_first_name_is_mandatory =  sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_first_name_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_first_name_toggle,$six_storage_emergencycontact_first_name_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_first_name_is_mandatory,$six_storage_emergencycontact_first_name_is_mandatory , 'yes' );

			$six_storage_emergencycontact_last_name_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_last_name_toggle ]);
			$six_storage_emergencycontact_last_name_is_mandatory =  sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_last_name_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_last_name_toggle,$six_storage_emergencycontact_last_name_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_last_name_is_mandatory,$six_storage_emergencycontact_last_name_is_mandatory , 'yes' );

			$six_storage_emergencycontact_email_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_email_toggle ]);
			$six_storage_emergencycontact_email_is_mandatory =  sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_email_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_email_toggle,$six_storage_emergencycontact_email_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_email_is_mandatory,$six_storage_emergencycontact_email_is_mandatory , 'yes' );

			$six_storage_emergencycontact_mobile_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_mobile_toggle ]);
			$six_storage_emergencycontact_mobile_is_mandatory =  sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_mobile_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_mobile_toggle,$six_storage_emergencycontact_mobile_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_mobile_is_mandatory,$six_storage_emergencycontact_mobile_is_mandatory , 'yes' );

			$six_storage_movein_profile_picture_update_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_movein_profile_picture_toggle ]);
			$six_storage_movein_profile_picture_update_is_mandatory =  sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_movein_profile_picture_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_movein_profile_picture_toggle,$six_storage_movein_profile_picture_update_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_movein_profile_picture_is_mandatory,$six_storage_movein_profile_picture_update_is_mandatory , 'yes' );

			$six_storage_SSN_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_SSN_toggle ]);
			$six_storage_SSN_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_SSN_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_SSN_toggle, $six_storage_SSN_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_SSN_is_mandatory,$six_storage_SSN_is_mandatory , 'yes' );

			$six_storage_identitydocument_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_identitydocument_toggle ]);
			$six_storage_identitydocument_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_identitydocument_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_identitydocument_toggle,$six_storage_identitydocument_toggle , 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_identitydocument_is_mandatory,$six_storage_identitydocument_is_mandatory, 'yes' );

			$message = [
				'isSuccess'     => true,
				'returnMessage' => 'Success',
				'returnCode'    => "200"
			];
		}

		$this->six_storage_clear_cache();

		wp_send_json( json_encode( $message ) );
		wp_die();

	}

	function six_storage_save_addons() {
		$reponse     = array();
		$six_storage_settingsKey = new Six_Storage_SettingsKeys();
		$six_storage_action = sanitize_text_field($_POST['action']); 
		if ( empty( $six_storage_action ) ) {
			$message = [
				'isSuccess'     => false,
				'returnMessage' => 'Empty Param',
				'returnCode'    => "200"
			];
		} else {
			
			$six_storage_insurance_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_insurance_toggle ]);
			$six_storage_insurance_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_insurance_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_insurance_toggle,$six_storage_insurance_toggle,'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_insurance_is_mandatory,$six_storage_insurance_is_mandatory, 'yes' );

			$six_storage_no_insurance_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_no_insurance_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_no_insurance_toggle,$six_storage_no_insurance_toggle , 'yes' );

			$six_storage_online_fs_ad_post_booking_insurance_popup_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_post_booking_insurance_popup_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_post_booking_insurance_popup_toggle,$six_storage_online_fs_ad_post_booking_insurance_popup_toggle , 'yes' );

			$six_storage_merchandise_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_merchandise_toggle ]);
			$six_storage_merchandise_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_merchandise_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_merchandise_toggle,$six_storage_merchandise_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_merchandise_is_mandatory,$six_storage_merchandise_is_mandatory, 'yes' );

			$six_storage_services_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_services_toggle ]);
			$six_storage_services_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_services_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_services_toggle,$six_storage_services_toggle  , 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_services_is_mandatory, $six_storage_services_is_mandatory, 'yes' );

			$six_storage_hubspot_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_hubspot_pickup_integration_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_hubspot_pickup_integration_toggle,$six_storage_hubspot_toggle, 'yes' );

			$six_storage_hubspot_url = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_hubspot_url ]);
			update_option( $six_storage_settingsKey->six_storage_online_hubspot_url, $six_storage_hubspot_url, 'yes' );

			$six_storage_movein_note_toggle = sanitize_text_field($_POST[$six_storage_settingsKey->six_storage_online_move_in_flow_note_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_move_in_flow_note_toggle,$six_storage_movein_note_toggle, 'yes' );

			$six_storage_movein_note_val = sanitize_text_field($_POST[$six_storage_settingsKey->six_storage_online_move_in_note ]);
			update_option( $six_storage_settingsKey->six_storage_online_move_in_note, $six_storage_movein_note_val, 'yes' );

			$six_storage_storagedetail_note_val = sanitize_text_field($_POST[$six_storage_settingsKey->six_storage_online_storage_details]);
			update_option( $six_storage_settingsKey->six_storage_online_storage_details, $six_storage_storagedetail_note_val, 'yes' );

			$six_storage_Tenant_details_note = sanitize_text_field($_POST[$six_storage_settingsKey->six_storage_online_tenant_details]);
			update_option( $six_storage_settingsKey->six_storage_online_tenant_details, $six_storage_Tenant_details_note , 'yes' );

			$six_storage_online_payment_details = sanitize_text_field($_POST[$six_storage_settingsKey->six_storage_online_payment_details]);
			update_option( $six_storage_settingsKey->six_storage_online_payment_details, $six_storage_online_payment_details , 'yes' );


			$six_storage_addon_note_val = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_addons_details]);
			update_option( $six_storage_settingsKey->six_storage_online_addons_details, $six_storage_addon_note_val, 'yes' );


			$six_storage_file_upload_note_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_file_upload_note_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_file_upload_note_toggle, $six_storage_file_upload_note_toggle, 'yes' );

			$six_storage_file_upload_note_val = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_file_upload_note ]);
			update_option( $six_storage_settingsKey->six_storage_online_file_upload_note, $six_storage_file_upload_note_val, 'yes' );

			$six_storage_delivery_address_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_delivery_address_toggle ]);
			$six_storage_delivery_address_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_delivery_address_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_delivery_address_toggle,$six_storage_delivery_address_toggle , 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_delivery_address_is_mandatory, $six_storage_delivery_address_is_mandatory, 'yes' );

			$six_storage_vehicle_info_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_info_toggle ]);
			$six_storage_vehicle_info_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_info_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_info_toggle,$six_storage_vehicle_info_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_info_is_mandatory,$six_storage_vehicle_info_is_mandatory , 'yes' );

			$six_storage_vehicle_type_toggle = sanitize_text_field( $_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_type_toggle ]);
			$six_storage_vehicle_type_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_type_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_type_toggle,$six_storage_vehicle_type_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_type_is_mandatory, $six_storage_vehicle_type_is_mandatory, 'yes' );

			$six_storage_ad_vehicle_manufactured_year_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_manufactured_year_toggle ]);
			$six_storage_ad_vehicle_manufactured_year_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_manufactured_year_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_manufactured_year_toggle, $six_storage_ad_vehicle_manufactured_year_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_manufactured_year_is_mandatory, $six_storage_ad_vehicle_manufactured_year_is_mandatory, 'yes' );

			$six_storage_vehicle_brand_toggle =  sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_brand_toggle ]);
			$six_storage_vehicle_brand_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_brand_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_brand_toggle, $six_storage_vehicle_brand_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_brand_is_mandatory, $six_storage_vehicle_brand_is_mandatory, 'yes' );

			$six_storage_vehicle_model_toggle =  sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_model_toggle ]);
			$six_storage_vehicle_model_is_mandatory =  sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_model_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_model_toggle,$six_storage_vehicle_model_toggle , 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_model_is_mandatory, $six_storage_vehicle_model_is_mandatory, 'yes' );

			$six_storage_vehicle_make_color_toggle =  sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_make_color_toggle ]);
			$six_storage_vehicle_make_color_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_make_color_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_make_color_toggle,$six_storage_vehicle_make_color_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_make_color_is_mandatory,$six_storage_vehicle_make_color_is_mandatory , 'yes' );

			$six_storage_vehicle_licence_state_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_licence_state_toggle ]);
			$six_storage_vehicle_licence_state_is_mandatory = sanitize_text_field( $_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_licence_state_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_licence_state_toggle,$six_storage_vehicle_licence_state_toggle , 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_licence_state_is_mandatory,$six_storage_vehicle_licence_state_is_mandatory, 'yes' );

			$six_storage_vehicle_registration_number_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_registration_number_toggle ]);
			$six_storage_vehicle_registration_number_is_mandatory =  sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_registration_number_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_registration_number_toggle,$six_storage_vehicle_registration_number_toggle , 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_registration_number_is_mandatory,$six_storage_vehicle_registration_number_is_mandatory, 'yes' );

			$six_storage_vehicle_licence_number_toggle =  sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_licence_number_toggle]);
			$six_storage_vehicle_licence_number_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_licence_number_is_mandatory ] );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_licence_number_toggle,$six_storage_vehicle_licence_number_toggle , 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_vehicle_licence_number_is_mandatory, $six_storage_vehicle_licence_number_is_mandatory, 'yes' );
			
			$six_storage_additional_months_toggle = sanitize_text_field( $_POST[ $six_storage_settingsKey->six_storage_online_fs_of_additional_months_toggle ]);
			$six_storage_additional_months_is_mandatory = sanitize_text_field( $_POST[ $six_storage_settingsKey->six_storage_online_fs_of_additional_months_is_mandatory ]);	
			update_option( $six_storage_settingsKey->six_storage_online_fs_of_additional_months_toggle, $six_storage_additional_months_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_of_additional_months_is_mandatory,$six_storage_additional_months_is_mandatory, 'yes' );

			$six_storage_upload_document_proof_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_upload_insurance_toggle ]);
			update_option($six_storage_settingsKey->six_storage_online_upload_insurance_toggle, $six_storage_upload_document_proof_toggle, 'yes' );
			$six_storage_online_fs_of_upload_insurance_proof_toggle_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_of_upload_insurance_proof_toggle_mandatory ]);
			update_option($six_storage_settingsKey->six_storage_online_fs_of_upload_insurance_proof_toggle_mandatory, $six_storage_online_fs_of_upload_insurance_proof_toggle_mandatory, 'yes' );


			$six_storage_safe_box_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_of_key_in_safe_box_toggle ]);
			$six_storage_safe_box_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_of_key_in_safe_box_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_of_key_in_safe_box_toggle, $six_storage_safe_box_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_of_key_in_safe_box_is_mandatory,$six_storage_safe_box_is_mandatory , 'yes' );

			$six_storage_lead_source_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_of_lead_source_toggle ]);
			$six_storage_lead_source_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_of_lead_source_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_of_lead_source_toggle,$six_storage_lead_source_toggle , 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_of_lead_source_is_mandatory,$six_storage_lead_source_is_mandatory, 'yes' );

			$six_storage_schedule_move_out_date_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_of_schedule_move_out_date_toggle ]);
			$six_storage_schedule_move_out_date_is_mandatory =  sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_of_schedule_move_out_date_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_of_schedule_move_out_date_toggle,$six_storage_schedule_move_out_date_toggle , 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_of_schedule_move_out_date_is_mandatory,$six_storage_schedule_move_out_date_is_mandatory , 'yes' );

			$six_storage_third_party_insurance_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_third_party_insurance_toggle ]);
			$six_storage_third_party_insurance_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_third_party_insurance_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_third_party_insurance_toggle,$six_storage_third_party_insurance_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_third_party_insurance_is_mandatory,$six_storage_third_party_insurance_is_mandatory , 'yes' );

			$six_storage_third_party_insurance_policy_number_toggle =  sanitize_text_field( $_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_third_party_insurance_policy_number_toggle ]);
			$six_storage_third_party_insurance_policy_number_is_mandatory = sanitize_text_field( $_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_third_party_insurance_policy_number_is_mandatory ]); 
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_third_party_insurance_policy_number_toggle,$six_storage_third_party_insurance_policy_number_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_third_party_insurance_policy_number_is_mandatory,$six_storage_third_party_insurance_policy_number_is_mandatory, 'yes' );

			$six_storage_insurance_policy_phonenumber_toggle = sanitize_text_field( $_POST[ $six_storage_settingsKey->six_storage_online_insurance_policy_phonenumber_toggle ]);
			$six_storage_insurance_policy_phonenumber_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_insurance_policy_phonenumber_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_insurance_policy_phonenumber_toggle,$six_storage_insurance_policy_phonenumber_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_insurance_policy_phonenumber_is_mandatory,$six_storage_insurance_policy_phonenumber_is_mandatory , 'yes' );

			$six_storage_third_party_insurance_end_date_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_third_party_insurance_end_date_toggle ]);
			$six_storage_third_party_insurance_end_date_is_mandatory = sanitize_text_field( $_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_third_party_insurance_end_date_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_third_party_insurance_end_date_toggle, $six_storage_third_party_insurance_end_date_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_third_party_insurance_end_date_is_mandatory, $six_storage_third_party_insurance_end_date_is_mandatory, 'yes' );

			$six_storage_third_party_insurance_start_date_toggle = sanitize_text_field( $_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_third_party_insurance_start_date_toggle ]);
			$six_storage_third_party_insurance_start_date_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ad_third_party_insurance_start_date_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_third_party_insurance_start_date_toggle,$six_storage_third_party_insurance_start_date_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_fs_ad_third_party_insurance_start_date_is_mandatory,$six_storage_third_party_insurance_start_date_is_mandatory , 'yes' );

			$six_storage_insurance_policy_providername_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_insurance_policy_providername_toggle ]);
			$six_storage_insurance_policy_providername_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_insurance_policy_providername_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_insurance_policy_providername_toggle, $six_storage_insurance_policy_providername_toggle, 'yes' );
			update_option( $six_storage_settingsKey->six_storage_online_insurance_policy_providername_is_mandatory,$six_storage_insurance_policy_providername_is_mandatory , 'yes' );

			$message = [
				'isSuccess'     => true,
				'returnMessage' => 'Successs',
				'returnCode'    => "200"
			];
		}

		$this->six_storage_clear_cache();

		wp_send_json( json_encode( $message ) );
		wp_die();
	}

	function six_storage_save_feature_customization() {
		$response    = array();
		$six_storage_settingsKey = new Six_Storage_SettingsKeys();
		$six_storage_action = sanitize_text_field($_POST['action']); 
		if ( empty( $six_storage_action ) ) {
			$message = [
				'isSuccess'     => false,
				'returnMessage' => 'Empty Param',
				'returnCode'    => "200"
			];
		} else {
			$six_storage_online_google_analytics_enable = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_google_analytics_enable ]);
			update_option( $six_storage_settingsKey->six_storage_online_google_analytics_enable, $six_storage_online_google_analytics_enable, 'yes' );

			$six_storage_online_tenant_location_enable = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_tenant_location_enable ]);
			update_option( $six_storage_settingsKey->six_storage_online_tenant_location_enable, $six_storage_online_tenant_location_enable, 'yes' );

			$six_storage_online_tenant_location_api_key = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_tenant_location_api_key ]);
			update_option( $six_storage_settingsKey->six_storage_online_tenant_location_api_key, $six_storage_online_tenant_location_api_key, 'yes' );

			$six_storage_online_fc_google_analytics_key_word = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_google_analytics_key_word ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_google_analytics_key_word, $six_storage_online_fc_google_analytics_key_word, 'yes' );
			
			$six_storage_online_fc_group_the_unit_based_on_size_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_group_the_unit_based_on_size_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_group_the_unit_based_on_size_toggle, $six_storage_online_fc_group_the_unit_based_on_size_toggle, 'yes' );
			
			$six_storage_online_fc_enable_site_map_in_booking_page_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_enable_site_map_in_booking_page_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_enable_site_map_in_booking_page_toggle, $six_storage_online_fc_enable_site_map_in_booking_page_toggle, 'yes' );

			$six_storage_online_fc_reservation_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_reservation_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_reservation_toggle, $six_storage_online_fc_reservation_toggle, 'yes' );

			$six_storage_online_rent_single_unit = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_rent_single_unit ]);
			update_option( $six_storage_settingsKey->six_storage_online_rent_single_unit, $six_storage_online_rent_single_unit, 'yes' );

			$six_storage_online_fc_enquiry_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_enquiry_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_enquiry_toggle, $six_storage_online_fc_enquiry_toggle, 'yes' );

			$six_storage_online_fc_waitlist_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_waitlist_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_waitlist_toggle,$six_storage_online_fc_waitlist_toggle, 'yes');

			$six_storage_online_fc_rent_now_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_rent_now_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_rent_now_toggle, $six_storage_online_fc_rent_now_toggle, 'yes' );

			$six_storage_online_fc_pay_later_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_pay_later_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_pay_later_toggle, $six_storage_online_fc_pay_later_toggle, 'yes' );

			$six_storage_online_fc_business_user_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_business_user_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_business_user_toggle, $six_storage_online_fc_business_user_toggle, 'yes' );

			$six_storage_online_fc_moveindate_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_moveindate_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_moveindate_toggle, $six_storage_online_fc_moveindate_toggle, 'yes' );

			$six_storage_online_fc_moveindate_custom_word = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_moveindate_custom_word ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_moveindate_custom_word, $six_storage_online_fc_moveindate_custom_word, 'yes' );

			$six_storage_online_fc_move_in_after = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_move_in_after ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_move_in_after, $six_storage_online_fc_move_in_after, 'yes' );

			$six_storage_online_fc_move_in_upto = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_move_in_upto ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_move_in_upto, $six_storage_online_fc_move_in_upto, 'yes' );

			$six_storage_online_fc_show_the_rental_with_tax_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_show_the_rental_with_tax_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_show_the_rental_with_tax_toggle, $six_storage_online_fc_show_the_rental_with_tax_toggle, 'yes' );

			$six_storage_online_fc_tenant_multiple_movein_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_tenant_multiple_movein_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_tenant_multiple_movein_toggle, $six_storage_online_fc_tenant_multiple_movein_toggle, 'yes' );

			$six_storage_online_fc_onlinemoveout_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_onlinemoveout_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_onlinemoveout_toggle, $six_storage_online_fc_onlinemoveout_toggle, 'yes' );

			$six_storage_online_fc_proratemoveout_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_proratemoveout_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_proratemoveout_toggle, $six_storage_online_fc_proratemoveout_toggle, 'yes' );

			$six_storage_online_fc_charge_tenant_on_moveoutdate_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_charge_tenant_on_moveoutdate_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_charge_tenant_on_moveoutdate_toggle, $six_storage_online_fc_charge_tenant_on_moveoutdate_toggle, 'yes' );

			$six_storage_online_fc_enable_SSO_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_enable_SSO_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_enable_SSO_toggle, $six_storage_online_fc_enable_SSO_toggle, 'yes' );

			$six_storage_online_fc_schedule_moveout_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_schedule_moveout_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_schedule_moveout_toggle, $six_storage_online_fc_schedule_moveout_toggle, 'yes' );

			$six_storage_online_fc_schedule_minimum_days_custom_word = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_schedule_minimum_days_custom_word ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_schedule_minimum_days_custom_word, $six_storage_online_fc_schedule_minimum_days_custom_word, 'yes' );

			$six_storage_online_fc_schedule_maximum_days_custom_word = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_schedule_maximum_days_custom_word ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_schedule_maximum_days_custom_word, $six_storage_online_fc_schedule_maximum_days_custom_word, 'yes' );

			$six_storage_online_display_next_invoice = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_display_next_invoice ]);
			update_option( $six_storage_settingsKey->six_storage_online_display_next_invoice, $six_storage_online_display_next_invoice, 'yes' );

			$six_storage_online_fc_vacancy_count_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_vacancy_count_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_vacancy_count_toggle, $six_storage_online_fc_vacancy_count_toggle, 'yes' );

			$six_storage_online_fc_unit_type_name_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_unit_type_name_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_unit_type_name_toggle, $six_storage_online_fc_unit_type_name_toggle, 'yes' );

			$six_storage_online_fc_unit_description_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_unit_description_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_unit_description_toggle, $six_storage_online_fc_unit_description_toggle, 'yes' );

			$six_storage_online_fc_unit_size_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_unit_size_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_unit_size_toggle, $six_storage_online_fc_unit_size_toggle, 'yes' );

			$six_storage_online_fs_ti_companyname_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_companyname_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_companyname_toggle, $six_storage_online_fs_ti_companyname_toggle, 'yes' );

			$six_storage_online_fs_ti_companyname_is_mandatory = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_ti_companyname_is_mandatory ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_ti_companyname_is_mandatory, $six_storage_online_fs_ti_companyname_is_mandatory, 'yes' );

			$six_storage_online_setup_preloader = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_setup_preloader ]);
			update_option( $six_storage_settingsKey->six_storage_online_setup_preloader, $six_storage_online_setup_preloader, 'yes' );

			$six_storage_online_tenant_activity_enable = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_tenant_activity_enable ]);
			update_option( $six_storage_settingsKey->six_storage_online_tenant_activity_enable, $six_storage_online_tenant_activity_enable, 'yes' );

			$six_storage_online_fc_additional_month_custom_word = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_additional_month_custom_word ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_additional_month_custom_word, $six_storage_online_fc_additional_month_custom_word, 'yes' );

			$six_storage_online_fc_unit_image_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_unit_image_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_unit_image_toggle, $six_storage_online_fc_unit_image_toggle, 'yes' );

			$six_storage_online_fc_availability_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_availability_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_availability_toggle, $six_storage_online_fc_availability_toggle, 'yes' );

			$six_storage_online_fc_hide_storage_category_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_hide_storage_category_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_hide_storage_category_toggle, $six_storage_online_fc_hide_storage_category_toggle, 'yes' );

			$six_storage_online_fc_track_location_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_track_location_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_track_location_toggle, $six_storage_online_fc_track_location_toggle, 'yes' );

			//Filtering options

			$six_storage_online_fc_storage_category_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_storage_category_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_storage_category_toggle, $six_storage_online_fc_storage_category_toggle, 'yes' );

			$six_storage_online_fc_location_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_location_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_location_toggle, $six_storage_online_fc_location_toggle, 'yes' );

			$six_storage_online_fc_building_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_building_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_building_toggle, $six_storage_online_fc_building_toggle, 'yes' );

			$six_storage_online_fc_unit_type_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_unit_type_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_unit_type_toggle, $six_storage_online_fc_unit_type_toggle, 'yes' );

			$six_storage_online_fc_unit_size_filter_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_unit_size_filter_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_unit_size_filter_toggle, $six_storage_online_fc_unit_size_filter_toggle, 'yes' );

			$six_storage_online_fc_price_range_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_price_range_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_price_range_toggle, $six_storage_online_fc_price_range_toggle, 'yes' );

			$six_storage_online_fc_super_search_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_super_search_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_super_search_toggle, $six_storage_online_fc_super_search_toggle, 'yes' );

			$six_storage_online_fc_sort_by_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_sort_by_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_sort_by_toggle, $six_storage_online_fc_sort_by_toggle, 'yes' );

			$six_storage_online_fc_unit_ash_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_unit_ash_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_unit_ash_toggle, $six_storage_online_fc_unit_ash_toggle, 'yes' );

			$six_storage_online_fc_amenity_toggle = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fc_amenity_toggle ]);
			update_option( $six_storage_settingsKey->six_storage_online_fc_amenity_toggle, $six_storage_online_fc_amenity_toggle, 'yes' );


			$message = [
				'isSuccess'     => true,
				'returnMessage' => 'Success',
				'returnCode'    => "200"
			];

		}

		$this->six_storage_clear_cache();

		wp_send_json( json_encode( $message ) );
		wp_die();
	}

	function six_storage_save_color_customization() {
		$response    = array();
		$six_storage_settingsKey = new Six_Storage_SettingsKeys();
		$six_storage_action = sanitize_text_field($_POST['action']); 
		if ( empty( $six_storage_action ) ) {
			$message = [
				'isSuccess'     => false,
				'returnMessage' => 'Empty Param',
				'returnCode'    => "200"
			];
		} else {

			$six_storage_online_primary_color = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_primary_color ]);
			update_option( $six_storage_settingsKey->six_storage_online_primary_color, $six_storage_online_primary_color, 'yes' );

			$six_storage_online_secondary_color = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_secondary_color ]);
			update_option( $six_storage_settingsKey->six_storage_online_secondary_color, $six_storage_online_secondary_color, 'yes' );

			$six_storage_online_text_color = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_text_color ]);
			update_option( $six_storage_settingsKey->six_storage_online_text_color, $six_storage_online_text_color, 'yes' );

			$message = [
				'isSuccess'     => true,
				'returnMessage' => 'Success',
				'returnCode'    => "200"
			];

		}

		$this->six_storage_clear_cache();

		wp_send_json( json_encode( $message ) );
		wp_die();
	}

	function six_storage_save_text_customization() {
		$response    = array();
		$six_storage_settingsKey = new Six_Storage_SettingsKeys();
		$six_storage_action = sanitize_text_field($_POST['action']); 
		if ( empty( $six_storage_action ) ) {
			$message = [
				'isSuccess'     => false,
				'returnMessage' => 'Empty Param',
				'returnCode'    => "200"
			];
		} else {

			$six_storage_online_fs_rent_now_custom_word = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_rent_now_custom_word ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_rent_now_custom_word, $six_storage_online_fs_rent_now_custom_word, 'yes' );

			$six_storage_online_select_your_storage_custom_word = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_select_your_storage_custom_word ]);
			update_option( $six_storage_settingsKey->six_storage_online_select_your_storage_custom_word, $six_storage_online_select_your_storage_custom_word, 'yes' );

			$six_storage_online_fs_selected_storage_custom_word = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_fs_selected_storage_custom_word ]);
			update_option( $six_storage_settingsKey->six_storage_online_fs_selected_storage_custom_word, $six_storage_online_fs_selected_storage_custom_word, 'yes' );

			$six_storage_online_review_your_storage_custom_word = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_review_your_storage_custom_word ]);
			update_option( $six_storage_settingsKey->six_storage_online_review_your_storage_custom_word, $six_storage_online_review_your_storage_custom_word, 'yes' );

			$six_storage_online_please_choose_your_addons_custom_word = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_please_choose_your_addons_custom_word ]);
			update_option( $six_storage_settingsKey->six_storage_online_please_choose_your_addons_custom_word, $six_storage_online_please_choose_your_addons_custom_word, 'yes' );

			$six_storage_online_addons_custom_word = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_addons_custom_word ]);
			update_option( $six_storage_settingsKey->six_storage_online_addons_custom_word, $six_storage_online_addons_custom_word, 'yes' );

			$message = [
				'isSuccess'     => true,
				'returnMessage' => 'Success',
				'returnCode'    => "200"
			];

		}

		$this->six_storage_clear_cache();

		wp_send_json( json_encode( $message ) );
		wp_die();
	}

	function six_storage_save_terms_and_condition() {
		$response    = array();
		$six_storage_settingsKey = new Six_Storage_SettingsKeys();
		$six_storage_action = sanitize_text_field($_POST['action']); 
		if ( empty( $six_storage_action ) ) {
			$message = [
				'isSuccess'     => false,
				'returnMessage' => 'Empty Param',
				'returnCode'    => "200"
			];
		} else {

			$six_storage_online_terms_and_condition = sanitize_text_field($_POST[ $six_storage_settingsKey->six_storage_online_terms_and_condition ]);
			update_option( $six_storage_settingsKey->six_storage_online_terms_and_condition, $six_storage_online_terms_and_condition, 'yes' );

			$message = [
				'isSuccess'     => true,
				'returnMessage' => 'Success',
				'returnCode'    => "200"
			];

		}

		$this->six_storage_clear_cache();

		wp_send_json( json_encode( $message ) );
		wp_die();
	}
	function six_storage_clear_cache() {
		$this->six_storage_clear_cache_fun();
	}

	public function six_storage_portal_registration() {
		$isAjax = true;

		$emailID = sanitize_text_field( $_POST['six_storage_online_email_id'] );
		$apiUrl  = sanitize_text_field( $_POST['six_storage_online_api_url'] );

		update_option( 'six_storage_online_api_url', $apiUrl, true );
		update_option( 'six_storage_online_email_id', $emailID, true );

		$url = $apiUrl . 'plugin/register';

		$response = wp_remote_post( esc_url_raw($url), array(
			'method'  => 'POST',
			'timeout' => 45,
			'headers' => $this->six_storage_http_header,
			'body'    => json_encode( [
				'userName'           => esc_attr( $emailID ),
				'plugInVersion'      => $this->six_storage_api_version,
				'requesterIPAddress' => $this->six_storage_client_ip
			] )
		));

		update_option( 'six_storage_online_api_error', $response, true );

		if ( is_wp_error( $response ) ) {

		} else {
			$response = json_decode( $response['body'], true );
			if ( isset( $response ) && array_key_exists( 'isSuccess', $response ) && $response['isSuccess'] ) {
				if ( array_key_exists( 'result', $response ) && array_key_exists( 'tokenId', $response['result'] )
				     && array_key_exists( 'accessToken', $response['result'] )
				     && $response['result']['tokenId'] != '' && $response['result']['accessToken'] != null ) {
					update_option( 'six_storage_online_api_auth_sid', $response['result']['tokenId'], true );
					update_option( 'six_storage_online_api_auth_access_token', $response['result']['accessToken'], true );
					update_option( 'six_storage_online_api_culture', json_encode( $response['result']['cultureInfo'] ), true );

					$managePages = new Six_Storage_ManagePages();

					$managePages->Six_Storage_Manage_Pages_register();

					wp_send_json( json_encode( $response ) );
					wp_die();
				} else {
					$message = array_key_exists( 'returnMessage', $response ) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Auth token generation failed. Please contact support team.';
				}
			} else {
				$message = array_key_exists( 'returnMessage', $response ) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #3 - Something went wrong. Please contact support team.';
			}
		}
		update_option( 'six_storage_online_api_key', $response->result, true );
		update_option( 'six_storage_online_api_key', $response->result, true );

		return false;
	}

	private function six_storage_setPages() {
		$this->six_storage_pages = [
			[
				'page_title'   => '6Storage Tenant Portal Configuration',
				'menu_title'   => '6Storage',
				'capability'   => 'manage_options',
				'menu_slug'    => 'six_storage_online_configuration_menu',
				'callback'     => [ $this->six_storage_callbacks, 'tenantPortalConfiguration' ],
				'icon_url'     => $this->six_storage_plugin_url . 'assets/images/logo-small.png',
				'position'     => 2,
				'post_content' => '[six_storage_online_storage_admin_index]'
			],
			[
				'parent_slug'  => 'six_storage_online_configuration_menu',
				'page_title'   => '6Storage Tenant Portal Settings',
				'menu_title'   => 'Settings',
				'capability'   => 'manage_options',
				'menu_slug'    => 'six_storage_online_settings_menu',
				'callback'     => [ $this->six_storage_callbacks, 'tenantPortalSettings' ],
				'icon_url'     => $this->six_storage_plugin_url . 'assets/images/logo-small.png',
				'position'     => 3,
				'post_content' => '[six_storage_online_storage_admin_settings]'
			],
			[
				'parent_slug' => 'six_storage_online_configuration_menu',
				'page_title'  => '6Storage Tenant Portal Settings',
				'menu_title'  => 'Leads',
				'capability'  => 'manage_options',
				'menu_slug'   => 'six_storage_online_storage_option',
				'callback'    => [ $this->six_storage_callbacks, 'six_storage_storage_pages' ],
				'icon_url'    => $this->six_storage_plugin_url . 'assets/images/logo-small.png',
				'position'    => 4,
			]
		];
	}

	public function six_storage_setSettings() {
		$args = [
			[
				'option_group' => 'six_storage_online_option_group',
				'option_name'  => 'six_storage_online_email_id',
				'callback'     => [ $this->six_storage_callbacks, 'optionGroup' ]
			],
			[
				'option_group' => 'six_storage_online_option_group',
				'option_name'  => 'six_storage_online_api_url',
				'callback'     => [ $this->six_storage_callbacks, 'optionGroup' ]
			]
		];

		$this->six_storage_settings->six_storage_setSettings( $args );
	}

	public function six_storage_setSections() {
		$args = [
			[
				'id'       => 'six_storage_online_admin_index',
				'title'    => 'Plugin Registration',
				'callback' => [ $this->six_storage_callbacks, 'adminSection' ],
				'page'     => 'six_storage_online_configuration_menu'
			]
		];

		$this->six_storage_settings->six_storage_setSections( $args );
	}
}

?>