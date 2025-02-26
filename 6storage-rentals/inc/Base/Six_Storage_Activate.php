<?php

namespace SixStorageOnline\Base;
use SixStorageOnline\Base\Six_Storage_SettingsKeys;

class Six_Storage_Activate
{
    public static function six_storage_activation()
    {
        $ojbManagePages = new Six_Storage_ManagePages();
        $ojbManagePages->Six_Storage_Manage_Pages_register();
        self::six_storage_online_add_option();
        $six_storage_file_url = dirname(__FILE__, 2);
        $six_storage_plugin_url = plugin_dir_url($six_storage_file_url);

        flush_rewrite_rules();
        
    }

    public static function six_storage_online_add_option()
    {

        //First Name 
        $obj = new Six_Storage_SettingsKeys();
        if(get_option($obj->six_storage_online_fs_ti_first_name_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ti_first_name_toggle,'1');
        }
        if(get_option($obj->six_storage_online_fs_ti_first_name_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ti_first_name_is_mandatory,'1');
        }

        // Last name

        if(get_option($obj->six_storage_online_fs_ti_last_name_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ti_last_name_toggle,'1');
        }
        if(get_option($obj->six_storage_online_fs_ti_last_name_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ti_last_name_is_mandatory,'1');
        }

        //Phone 1

        if(get_option($obj->six_storage_online_fs_ti_phone1_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ti_phone1_toggle,'1');
        }
        if(get_option($obj->six_storage_online_fs_ti_phone1_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ti_phone1_is_mandatory,'1');
        }

        //Phone 2

        if(get_option($obj->six_storage_online_fs_ti_phone2_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ti_phone2_toggle,'0');
        }
        if(get_option($obj->six_storage_online_fs_ti_phone2_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ti_phone2_is_mandatory,'0');
        }

        //Address 1

        if(get_option($obj->six_storage_online_fs_ti_address1_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ti_address1_toggle,'1');
        }
        if(get_option($obj->six_storage_online_fs_ti_address1_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ti_address1_is_mandatory,'1');
        }

        //Address 2

        if(get_option($obj->six_storage_online_fs_ti_address2_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ti_address2_toggle,'0');
        }
        if(get_option($obj->six_storage_online_fs_ti_address2_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ti_address2_is_mandatory,'0');
        }

        //City

        if(get_option($obj->six_storage_online_fs_ti_city_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ti_city_toggle,'1');
        }
        if(get_option($obj->six_storage_online_fs_ti_city_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ti_city_is_mandatory,'1');
        }

        //State

        if(get_option($obj->six_storage_online_fs_ti_state_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ti_state_toggle,'1');
        }
        if(get_option($obj->six_storage_online_fs_ti_state_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ti_state_is_mandatory,'1');
        }

        //Company Name

        if(get_option($obj->six_storage_online_fs_ti_companyname_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ti_companyname_toggle,'0');
        }
        if(get_option($obj->six_storage_online_fs_ti_companyname_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ti_companyname_is_mandatory,'0');
        }

        //Country

        if(get_option($obj->six_storage_online_fs_ti_country_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ti_country_toggle,'0');
        }
        if(get_option($obj->six_storage_online_fs_ti_country_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ti_country_is_mandatory,'0');
        }

        //Date Of Birth

        if(get_option($obj->six_storage_online_fs_ti_dob_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ti_dob_toggle,'0');
        }
        if(get_option($obj->six_storage_online_fs_ti_dob_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ti_dob_is_mandatory,'0');
        }

        //Email

        if(get_option($obj->six_storage_online_fs_ti_email_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ti_email_toggle,'1');
        }
        if(get_option($obj->six_storage_online_fs_ti_email_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ti_email_is_mandatory,'1');
        }

        //SSN 
        if(get_option($obj->six_storage_online_fs_ti_SSN_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ti_SSN_toggle,'0');
        }
        if(get_option($obj->six_storage_online_fs_ti_SSN_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ti_SSN_is_mandatory,'0');
        }

        //For tenant Location 

        if(get_option($obj->six_storage_online_tenant_location_enable) === false)
        {
            add_option($obj->six_storage_online_tenant_location_enable,'0');
        }

        if(get_option($obj->six_storage_online_tenant_location_api_key) === false)
        {
            add_option($obj->six_storage_online_tenant_location_api_key,'0');
        }


        //Gate Access Code

        if(get_option($obj->six_storage_online_fs_ti_gateaccesscode_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ti_gateaccesscode_toggle,'0');
        }
        if(get_option($obj->six_storage_online_fs_ti_gateaccesscode_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ti_gateaccesscode_is_mandatory,'0');
        }

        //Identity Field

        if(get_option($obj->six_storage_online_fs_ti_identitydocument_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ti_identitydocument_toggle,'0');
        }
        if(get_option($obj->six_storage_online_fs_ti_identitydocument_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ti_identitydocument_is_mandatory,'0');
        }

        //Timezone

        if(get_option($obj->six_storage_online_fs_ti_timezone_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ti_timezone_toggle,'0');
        }
        if(get_option($obj->six_storage_online_fs_ti_timezone_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ti_timezone_is_mandatory,'0');
        }

        //Upload Document

        if(get_option($obj->six_storage_online_fs_ti_upload_document_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ti_upload_document_toggle,'0');
        }
        if(get_option($obj->six_storage_online_fs_ti_upload_document_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ti_upload_document_is_mandatory,'0');
        }

        //Security Deposit

        if(get_option($obj->six_storage_online_fs_ti_securitydeposit_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ti_securitydeposit_toggle,'0');
        }
        if(get_option($obj->six_storage_online_fs_ti_securitydeposit_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ti_securitydeposit_is_mandatory,'0');
        }

        //State Province

        if(get_option($obj->six_storage_online_fs_ti_state_province_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ti_state_province_toggle,'1');
        }
        if(get_option($obj->six_storage_online_fs_ti_state_province_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ti_state_province_is_mandatory,'1');
        }

        //Tax ID

        if(get_option($obj->six_storage_online_fs_ti_taxid_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ti_taxid_toggle,'0');
        }
        if(get_option($obj->six_storage_online_fs_ti_taxid_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ti_taxid_is_mandatory,'0');
        }

        //Tenant Signature

        if(get_option($obj->six_storage_online_fs_ti_tenantsignature_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ti_tenantsignature_toggle,'0');
        }
        if(get_option($obj->six_storage_online_fs_ti_tenantsignature_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ti_tenantsignature_is_mandatory,'0');
        }

        //Tenant Photo

        if(get_option($obj->six_storage_online_fs_ti_tenantphoto_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ti_tenantphoto_toggle,'1');
        }
        if(get_option($obj->six_storage_online_fs_ti_tenantphoto_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ti_tenantphoto_is_mandatory,'0');
        }

        //Website Link

        if(get_option($obj->six_storage_online_fs_ti_website_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ti_website_toggle,'0');
        }
        if(get_option($obj->six_storage_online_fs_ti_website_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ti_website_is_mandatory,'0');
        }

        //Zip Postalcode

        if(get_option($obj->six_storage_online_fs_ti_zip_postalcode_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ti_zip_postalcode_toggle,'1');
        }
        if(get_option($obj->six_storage_online_fs_ti_zip_postalcode_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ti_zip_postalcode_is_mandatory,'1');
        }

        //Emergency Contact

        if(get_option($obj->six_storage_online_fs_ti_emergencycontact_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ti_emergencycontact_toggle,'0');
        }
        if(get_option($obj->six_storage_online_fs_ti_emergencycontact_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ti_emergencycontact_is_mandatory,'0');
        }

        //Movein time profile picture

        if(get_option($obj->six_storage_online_movein_profile_picture_toggle) === false)
        {
            add_option($obj->six_storage_online_movein_profile_picture_toggle,'0');
        }
        if(get_option($obj->six_storage_online_movein_profile_picture_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_movein_profile_picture_is_mandatory,'0');
        }


        //Addons Fields --> Insurance

        if(get_option($obj->six_storage_online_fs_ad_insurance_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ad_insurance_toggle,'0');
        }
        if(get_option($obj->six_storage_online_fs_ad_insurance_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ad_insurance_is_mandatory,'0');
        }

        if(get_option($obj->six_storage_online_fs_ad_post_booking_insurance_popup_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ad_post_booking_insurance_popup_toggle,'0');
        }

        //Addons Fields --> Merchandise

        if(get_option($obj->six_storage_online_fs_ad_merchandise_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ad_merchandise_toggle,'0');
        }
        if(get_option($obj->six_storage_online_fs_ad_merchandise_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ad_merchandise_is_mandatory,'0');
        }
        
        //Other Fields --> Additional Months

        if(get_option($obj->six_storage_online_fs_of_additional_months_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_of_additional_months_toggle,'1');
        }
        if(get_option($obj->six_storage_online_fs_of_additional_months_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_of_additional_months_is_mandatory,'0');
        }

        //Addons Fields --> Delivery Address

        if(get_option($obj->six_storage_online_fs_ad_delivery_address_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ad_delivery_address_toggle,'0');
        }
        if(get_option($obj->six_storage_online_fs_ad_delivery_address_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ad_delivery_address_is_mandatory,'0');
        }

        // Upload Insurance Document
        if(get_option($obj->six_storage_online_upload_insurance_toggle) === false){
            add_option($obj ->  six_storage_online_upload_insurance_toggle, '0');
        }

        if(get_option($obj->six_storage_online_fs_of_upload_insurance_proof_toggle_mandatory) === false){
            add_option($obj ->  six_storage_online_fs_of_upload_insurance_proof_toggle_mandatory, '0');
        }


        //Other Fields --> Key In Safe Box

        if(get_option($obj->six_storage_online_fs_of_key_in_safe_box_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_of_key_in_safe_box_toggle,'0');
        }
        if(get_option($obj->six_storage_online_fs_of_key_in_safe_box_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_of_key_in_safe_box_is_mandatory,'0');
        }

        //Other Fields --> hubspot-integration

        if(get_option($obj->six_storage_online_hubspot_pickup_integration_toggle) === false)
        {
            add_option($obj->six_storage_online_hubspot_pickup_integration_toggle,'0');
        }
        if(get_option($obj->six_storage_online_hubspot_url) === false)
        {
            add_option($obj->six_storage_online_hubspot_url,'0');
        }

        // Note 

        if(get_option($obj->six_storage_online_move_in_flow_note_toggle) === false)
        {
            add_option($obj->six_storage_online_move_in_flow_note_toggle,'0');
        }
        if(get_option($obj->six_storage_online_move_in_note) === false)
        {
            add_option($obj->six_storage_online_move_in_note,'');
        }

        if(get_option($obj->six_storage_online_storage_details) === false)
        {
            add_option($obj->six_storage_online_storage_details,'');
        }

        if(get_option($obj -> six_storage_online_addons_details) === false){
            add_option($obj -> six_storage_online_addons_details, '');
        }

        if(get_option($obj -> six_storage_online_Tenant_details) === false){
            add_option($obj -> six_storage_online_Tenant_details, '');
        }

        if(get_option($obj -> six_storage_online_payment_details) === false){
            add_option($obj -> six_storage_online_payment_details, '');
        }
        // upload file Note  

        if(get_option($obj->six_storage_online_file_upload_note_toggle) === false)
        {
            add_option($obj->six_storage_online_file_upload_note_toggle,'0');
        }
        if(get_option($obj->six_storage_online_file_upload_note) === false)
        {
            add_option($obj->six_storage_online_file_upload_note,'');
        }

        //Other Fields --> Lead Source

        if(get_option($obj->six_storage_online_fs_of_lead_source_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_of_lead_source_toggle,'0');
        }
        if(get_option($obj->six_storage_online_fs_of_lead_source_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_of_lead_source_is_mandatory,'0');
        }

        //Other Fields --> Schedule Move Out Date

        if(get_option($obj->six_storage_online_fs_of_schedule_move_out_date_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_of_schedule_move_out_date_toggle,'1');
        }
        if(get_option($obj->six_storage_online_fs_of_schedule_move_out_date_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_of_schedule_move_out_date_is_mandatory,'0');
        }

        //Other Fields --> Vehicle Info

        if(get_option($obj->six_storage_online_fs_ad_vehicle_info_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ad_vehicle_info_toggle,'0');
        }
        if(get_option($obj->six_storage_online_fs_ad_vehicle_info_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ad_vehicle_info_is_mandatory,'0');
        }

        //Other Fields --> Vehicle Type

        if(get_option($obj->six_storage_online_fs_ad_vehicle_type_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ad_vehicle_type_toggle,'0');
        }
        if(get_option($obj->six_storage_online_fs_ad_vehicle_type_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ad_vehicle_type_is_mandatory,'0');
        }

        //Other Fields --> Vehicle Year

        if(get_option($obj->six_storage_online_fs_ad_vehicle_manufactured_year_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ad_vehicle_manufactured_year_toggle,'0');
        }
        if(get_option($obj->six_storage_online_fs_ad_vehicle_manufactured_year_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ad_vehicle_manufactured_year_is_mandatory,'0');
        }

        //Other Fields --> Vehicle Brand

        if(get_option($obj->six_storage_online_fs_ad_vehicle_brand_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ad_vehicle_brand_toggle,'0');
        }
        if(get_option($obj->six_storage_online_fs_ad_vehicle_brand_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ad_vehicle_brand_is_mandatory,'0');
        }

        //Other Fields --> Vehicle Model

        if(get_option($obj->six_storage_online_fs_ad_vehicle_model_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ad_vehicle_model_toggle,'0');
        }
        if(get_option($obj->six_storage_online_fs_ad_vehicle_model_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ad_vehicle_model_is_mandatory,'0');
        }

         //Other Fields --> Vehicle Color

         if(get_option($obj->six_storage_online_fs_ad_vehicle_make_color_toggle) === false)
         {
             add_option($obj->six_storage_online_fs_ad_vehicle_make_color_toggle,'0');
         }
         if(get_option($obj->six_storage_online_fs_ad_vehicle_make_color_is_mandatory) === false)
         {
             add_option($obj->six_storage_online_fs_ad_vehicle_make_color_is_mandatory,'0');
         }

         //Other Fields --> Vehicle Licence State

         if(get_option($obj->six_storage_online_fs_ad_vehicle_licence_state_toggle) === false)
         {
             add_option($obj->six_storage_online_fs_ad_vehicle_licence_state_toggle,'0');
         }
         if(get_option($obj->six_storage_online_fs_ad_vehicle_licence_state_is_mandatory) === false)
         {
             add_option($obj->six_storage_online_fs_ad_vehicle_licence_state_is_mandatory,'0');
         }

        //Other Fields --> Vehicle Registration Number

        if(get_option($obj->six_storage_online_fs_ad_vehicle_registration_number_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ad_vehicle_registration_number_toggle,'0');
        }
        if(get_option($obj->six_storage_online_fs_ad_vehicle_registration_number_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ad_vehicle_registration_number_is_mandatory,'0');
        }

        //Other Fields --> Vehicle Licence Number

        if(get_option($obj->six_storage_online_fs_ad_vehicle_licence_number_toggle) === false)
        {
            add_option($obj->six_storage_online_fs_ad_vehicle_licence_number_toggle,'0');
        }
        if(get_option($obj->six_storage_online_fs_ad_vehicle_licence_number_is_mandatory) === false)
        {
            add_option($obj->six_storage_online_fs_ad_vehicle_licence_number_is_mandatory,'0');
        }

        //Feature Customization

        if(get_option($obj->six_storage_online_fc_group_the_unit_based_on_size_toggle) === false)
        {
            add_option($obj->six_storage_online_fc_group_the_unit_based_on_size_toggle,'0');
        }
        if(get_option($obj->six_storage_online_rent_single_unit) === false)
        {
            add_option($obj->six_storage_online_rent_single_unit,'0');
        }

        if(get_option($obj->six_storage_online_fc_unit_description_toggle) === false)
        {
            add_option($obj->six_storage_online_fc_unit_description_toggle,'1');
        }

        if(get_option($obj->six_storage_online_fc_vacancy_count_toggle) === false)
        {
            add_option($obj->six_storage_online_fc_vacancy_count_toggle,'1');
        }

        if(get_option($obj->six_storage_online_fc_unit_type_name_toggle) === false)
        {
            add_option($obj->six_storage_online_fc_unit_type_name_toggle,'1');
        }

        if(get_option($obj->six_storage_online_fc_reservation_toggle) === false)
        {
            add_option($obj->six_storage_online_fc_reservation_toggle,'0');
        }

        if(get_option($obj->six_storage_online_fc_enquiry_toggle) === false)
        {
            add_option($obj->six_storage_online_fc_enquiry_toggle,'0');
        }
        
        if(get_option($obj->six_storage_online_fc_waitlist_toggle) === false)
        {
            add_option($obj->six_storage_online_fc_waitlist_toggle,'0');
        }

        if(get_option($obj->six_storage_online_fc_rent_now_toggle) === false)
        {
            add_option($obj->six_storage_online_fc_rent_now_toggle,'1');
        }

        if(get_option($obj->six_storage_online_fc_unit_size_toggle) === false)
        {
            add_option($obj->six_storage_online_fc_unit_size_toggle,'1');
        }

        if(get_option($obj->six_storage_online_fc_pay_later_toggle) === false)
        {
            add_option($obj->six_storage_online_fc_pay_later_toggle,'0');
        }

        if(get_option($obj->six_storage_online_fc_unit_image_toggle) === false)
        {
            add_option($obj->six_storage_online_fc_unit_image_toggle,'1');
        }
        
        if(get_option($obj->six_storage_online_fc_availability_toggle) === false)
        {
            add_option($obj->six_storage_online_fc_availability_toggle,'1');
        }
        if(get_option($obj->six_storage_online_fc_hide_storage_category_toggle) === false)
        {
            add_option($obj->six_storage_online_fc_hide_storage_category_toggle,'0');
        }


        if(get_option($obj->six_storage_online_fc_business_user_toggle) === false)
        {
            add_option($obj->six_storage_online_fc_business_user_toggle,'0');
        }

        if(get_option($obj->six_storage_online_fc_onlinemoveout_toggle) === false)
        {
            add_option($obj->six_storage_online_fc_onlinemoveout_toggle,'0');
        }

        if(get_option($obj->six_storage_online_fc_show_the_rental_with_tax_toggle) === false)
        {
            add_option($obj->six_storage_online_fc_show_the_rental_with_tax_toggle,'0');
        }

        if(get_option($obj->six_storage_online_setup_preloader) === false)
        {
            add_option($obj->six_storage_online_setup_preloader,'1');
        }

        if(get_option($obj->six_storage_online_fc_proratemoveout_toggle) === false)
        {
            add_option($obj->six_storage_online_fc_proratemoveout_toggle,'0');
        }

        if(get_option($obj->six_storage_online_fc_tenant_multiple_movein_toggle) === false)
        {
            add_option($obj->six_storage_online_fc_tenant_multiple_movein_toggle,'0');
        }

        if(get_option($obj->six_storage_online_fc_charge_tenant_on_moveoutdate_toggle) === false)
        {
            add_option($obj->six_storage_online_fc_charge_tenant_on_moveoutdate_toggle,'0');
        }

        if(get_option($obj->six_storage_online_fc_enable_SSO_toggle) === false)
        {
            add_option($obj->six_storage_online_fc_enable_SSO_toggle,'0');
        }

        if(get_option($obj->six_storage_online_fc_enable_site_map_in_booking_page_toggle) === false)
        {
            add_option($obj->six_storage_online_fc_enable_site_map_in_booking_page_toggle,'0');
        }

        if(get_option($obj->six_storage_online_display_next_invoice) === false)
        {
            add_option($obj->six_storage_online_display_next_invoice,'1');
        }

        if(get_option($obj->six_storage_online_fc_schedule_moveout_toggle) === false)
        {
            add_option($obj->six_storage_online_fc_schedule_moveout_toggle,'0');
        }

        if(get_option($obj->six_storage_online_fc_schedule_minimum_days_custom_word) === false)
        {
            add_option($obj->six_storage_online_fc_schedule_minimum_days_custom_word,'5');
        }

        if(get_option($obj->six_storage_online_fc_schedule_maximum_days_custom_word) === false)
        {
            add_option($obj->six_storage_online_fc_schedule_maximum_days_custom_word,'25');
        }

        if(get_option($obj->six_storage_online_fc_moveindate_toggle) === false)
        {
            add_option($obj->six_storage_online_fc_moveindate_toggle,'1');
        }

        if(get_option($obj->six_storage_online_fc_moveindate_custom_word) === false)
        {
            add_option($obj->six_storage_online_fc_moveindate_custom_word,'30');
        }

        if(get_option($obj->six_storage_online_terms_and_condition) === false)
        {
            add_option($obj->six_storage_online_terms_and_condition,'1');
        }

        if(get_option($obj->six_storage_online_fc_additional_month_custom_word) === false)
        {
            add_option($obj->six_storage_online_fc_additional_month_custom_word,'0');
        }

        //Color Customization

        if(get_option($obj->six_storage_online_primary_color) === false)
        {
            add_option($obj->six_storage_online_primary_color,'#f47920');
        }

        if(get_option($obj->six_storage_online_secondary_color) === false)
        {
            add_option($obj->six_storage_online_secondary_color,'#002664');
        }

        if(get_option($obj->six_storage_online_text_color) === false)
        {
            add_option($obj->six_storage_online_text_color,'#000000');
        }

        //Text Customization

        if(get_option($obj->six_storage_online_fs_rent_now_custom_word) === false)
        {
            add_option($obj->six_storage_online_fs_rent_now_custom_word,'Rent Now');
        }

        if(get_option($obj->six_storage_online_select_your_storage_custom_word) === false)
        {
            add_option($obj->six_storage_online_select_your_storage_custom_word,'Select your storage(s)');
        }

        if(get_option($obj->six_storage_online_fs_selected_storage_custom_word) === false)
        {
            add_option($obj->six_storage_online_fs_selected_storage_custom_word,'Selected Storage');
        }

        if(get_option($obj->six_storage_online_review_your_storage_custom_word) === false)
        {
            add_option($obj->six_storage_online_review_your_storage_custom_word,'Please review your storage(s) and payment cycle');
        }

        if(get_option($obj->six_storage_online_please_choose_your_addons_custom_word) === false)
        {
            add_option($obj->six_storage_online_please_choose_your_addons_custom_word,'Please choose your addons like insurance, Additional Services');
        }

        if(get_option($obj->six_storage_online_addons_custom_word) === false)
        {
            add_option($obj->six_storage_online_addons_custom_word,'Addons');
        }
        
    }
}
?>