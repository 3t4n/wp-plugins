<?php

namespace SixStorageOnline\Base;
use SixStorageOnline\Base\Six_Storage_SettingsKeys;
$Obj = new Six_Storage_SettingsKeys();


class Six_Storage_MoveInControllerSixStorage extends Six_Storage_BaseController
{

     public $six_storage_storage_type = [];
     public $six_storage_location = [];
     public $six_storage_building = [];
     public $six_storage_amenity = [];
     public $six_storage_pricerange = [];
     public $six_storage_unit_type = [];
     public $six_storage_unitSize =[];
     public $six_storage_units = [];
     public $six_storage_units_info = [];
     public $six_storage_invoice_period = [];
     public $six_storage_invoice_reccuring = [];
     public $six_storage_time_zone = [];
     public $six_storage_identityDocuments = [];
     public $six_storage_leadSource = [];
     public $six_storage_cultureInfo;
     public $six_storage_groupUnitsSizes;
     public $six_storage_inclusiveofTax;
     public $six_storage_autoPaymentsEnabled;
     public $six_storage_displayBusinessUser;
     public $six_storage_discount_details = [];

     public function Six_Storage_MoveInController_register()
     {
          add_action('wp_ajax_six_storage_move_in_unit_search', [$this, 'six_storage_searchUnit']);
          add_action('wp_ajax_nopriv_six_storage_move_in_unit_search', [$this, 'six_storage_searchUnit']);

         

          add_action('wp_ajax_six_storage_unit_price_list', [$this, 'six_storage_unitPriceList']);
          add_action('wp_ajax_nopriv_six_storage_unit_price_list', [$this, 'six_storage_unitPriceList']);

          add_action('wp_ajax_six_storage_location_list_action', [$this, 'six_storage_location_list_action']);
          add_action('wp_ajax_nopriv_six_storage_location_list_action', [$this, 'six_storage_location_list_action']);

          add_action('wp_ajax_six_storage_change_storagetype', [$this, 'six_storage_getStorageType']);
          add_action('wp_ajax_nopriv_six_storage_change_storagetype', [$this, 'six_storage_getStorageType']);

          add_action('wp_ajax_six_storage_change_location', [$this, 'six_storage_changeLocation']);
          add_action('wp_ajax_nopriv_six_storage_change_location', [$this, 'six_storage_changeLocation']);

          add_action('wp_ajax_six_storage_change_building', [$this, 'six_storage_changeBuilding']);
          add_action('wp_ajax_nopriv_six_storage_change_building', [$this, 'six_storage_changeBuilding']);

          add_action('wp_ajax_six_storage_change_amenity', [$this, 'six_storage_changeAmenity']);
          add_action('wp_ajax_nopriv_six_storage_change_amenity', [$this, 'six_storage_changeAmenity']);

          add_action('wp_ajax_six_storage_update_profile', [$this, 'six_storage_updateProfile']);
          add_action('wp_ajax_nopriv_six_storage_update_profile', [$this, 'six_storage_updateProfile']);


          add_action('wp_ajax_six_storage_change_unitPrice', [$this, 'six_storage_changeUnitPrice']);
          add_action('wp_ajax_nopriv_six_storage_change_unitPrice', [$this, 'six_storage_changeUnitPrice']);
          
          add_action('wp_ajax_six_storage_change_unitSize', [$this, 'six_storage_changeUnitSize']);
          add_action('wp_ajax_nopriv_six_storage_change_unitSize', [$this, 'six_storage_changeUnitSize']);

          add_action('wp_ajax_six_storage_change_unit_type', [$this, 'six_storage_changeUnitType']);
          add_action('wp_ajax_nopriv_six_storage_change_unit_type', [$this, 'six_storage_changeUnitType']);

          add_action('wp_ajax_six_storage_units_info_by_id', [$this, 'six_storage_getUnitsInfoById']);
          add_action('wp_ajax_nopriv_six_storage_units_info_by_id', [$this, 'six_storage_getUnitsInfoById']);

          add_action('wp_ajax_six_storage_get_time_zone', [$this, 'six_storage_getTimeZone']);
          add_action('wp_ajax_nopriv_six_storage_get_time_zone', [$this, 'six_storage_getTimeZone']);

          add_action('wp_ajax_six_storage_upload_documents', [$this, 'six_storage_uploadDocuments']);
          add_action('wp_ajax_nopriv_six_storage_upload_documents', [$this, 'six_storage_uploadDocuments']);

          add_action('wp_ajax_six_storage_upload_documents_to_server', [$this, 'six_storage_uploadDocumentsToServer']);
          add_action('wp_ajax_nopriv_six_storage_upload_documents_to_server', [$this, 'six_storage_uploadDocumentsToServer']);

          add_action('wp_ajax_six_storage_upload_document_details', [$this, 'six_storage_uploadDocumentDetails']);
          add_action('wp_ajax_nopriv_six_storage_upload_document_details', [$this, 'six_storage_uploadDocumentDetails']);

          add_action('wp_ajax_six_storage_lease_profile', [$this, 'six_storage_leaseProfile']);
          add_action('wp_ajax_nopriv_six_storage_lease_profile', [$this, 'six_storage_leaseProfile']);

          add_action('wp_ajax_six_storage_lease_payment_form', [$this, 'six_storage_getPaymentForm']);
          add_action('wp_ajax_nopriv_six_storage_lease_payment_form', [$this, 'six_storage_getPaymentForm']);

          add_action('wp_ajax_six_storage_lease_calculation', [$this, 'six_storage_leaseCalculation']);
          add_action('wp_ajax_nopriv_six_storage_lease_calculation', [$this, 'six_storage_leaseCalculation']);

          add_action('wp_ajax_six_storage_lease_preview_agreement', [$this, 'six_storage_previewLicenseAgreement']);
          add_action('wp_ajax_nopriv_six_storage_lease_preview_agreement', [$this, 'six_storage_previewLicenseAgreement']);

          add_action('wp_ajax_six_storage_lease_details_save', [$this, 'six_storage_saveMoveinDetails']);
          add_action('wp_ajax_nopriv_six_storage_lease_details_save', [$this, 'six_storage_saveMoveinDetails']);

          add_action('wp_ajax_six_storage_sign_up', [$this, 'six_storage_moveinSignUp']);
          add_action('wp_ajax_nopriv_six_storage_sign_up', [$this, 'six_storage_moveinSignUp']);

          add_action('wp_ajax_six_storage_sign_in', [$this, 'six_storage_moveInSignIn']);
          add_action('wp_ajax_nopriv_six_storage_sign_in', [$this, 'six_storage_moveInSignIn']);

          add_action('wp_ajax_six_storage_submit_confirmation_code',[$this, 'six_storage_submitConfirmationCode']);
          add_action('wp_ajax_nopriv_six_storage_submit_confirmation_code',[$this, 'six_storage_submitConfirmationCode']);

          add_action('wp_ajax_six_storage_submit_password_confirmation_code',[$this, 'six_storage_submitPassowrdConfirmationCode']);
          add_action('wp_ajax_nopriv_six_storage_submit_password_confirmation_code',[$this, 'six_storage_submitPassowrdConfirmationCode']);

          add_action('wp_ajax_six_storage_resend_confirmation_code',[$this, 'six_storage_resendConfirmationCode']);
          add_action('wp_ajax_nopriv_six_storage_resend_confirmation_code',[$this, 'six_storage_resendConfirmationCode']);

          add_action('wp_ajax_six_storage_identity_types', [$this, 'six_storage_getIdentityTypes']);
          add_action('wp_ajax_nopriv_six_storage_identity_types', [$this, 'six_storage_getIdentityTypes']);

          add_action('wp_ajax_six_storage_getfilter', [$this, 'six_storage_getfilter']);
          add_action('wp_ajax_nopriv_six_storage_getfilter', [$this, 'six_storage_getfilter']);

          add_action('wp_ajax_six_storage_save_vehicle_information', [$this, 'six_storage_saveVehicleInformation']);
          add_action('wp_ajax_nopriv_six_storage_save_vehicle_information', [$this, 'six_storage_saveVehicleInformation']);

          add_action('wp_ajax_six_storage_get_buffer_time', [$this, 'six_storage_getBufferTime']);
          add_action('wp_ajax_nopriv_six_storage_get_buffer_time', [$this, 'six_storage_getBufferTime']);

          add_action('wp_ajax_six_storage_get_client_culture', [$this, 'six_storage_getCultureInfo']);
          add_action('wp_ajax_nopriv_six_storage_get_client_culture', [$this, 'six_storage_getCultureInfo']);

          add_action('wp_ajax_six_storage_get_movein_field_settings', [$this, 'six_storage_getMoveinFieldsSettings']);
          add_action('wp_ajax_nopriv_six_storage_get_movein_field_settings', [$this, 'six_storage_getMoveinFieldsSettings']);

          add_action('wp_ajax_six_storage_get_auto_selected_units', [$this, 'six_storage_getAutoSelectedUnits']);
          add_action('wp_ajax_nopriv_six_storage_get_auto_selected_units', [$this, 'six_storage_getAutoSelectedUnits']);

          add_action('wp_ajax_six_storage_forgot_user_password', [$this, 'six_storage_forgotPassword']);
          add_action('wp_ajax_nopriv_six_storage_forgot_user_password', [$this, 'six_storage_forgotPassword']);

          add_action('wp_ajax_six_storage_reset_password', [$this, 'six_storage_resetPassword']);
          add_action('wp_ajax_nopriv_six_storage_reset_password', [$this, 'six_storage_resetPassword']);

          add_action('wp_ajax_six_storage_set_your_password', [$this, 'six_storage_setresetPassword']);
          add_action('wp_ajax_nopriv_six_storage_set_your_password', [$this, 'six_storage_setresetPassword']);

          add_action('wp_ajax_six_storage_update_password', [$this, 'six_storage_updatepassword']);
          add_action('wp_ajax_nopriv_six_storage_update_password', [$this, 'six_storage_updatepassword']);

          add_action('wp_ajax_six_storage_validate_gate_access', [$this, 'six_storage_validateGateAccess']);
          add_action('wp_ajax_nopriv_six_storage_validate_gate_access', [$this, 'six_storage_validateGateAccess']);

          add_action('wp_ajax_six_storage_get_user_info', [$this, 'six_storage_getUserInfo']);
          add_action('wp_ajax_nopriv_six_storage_get_user_info', [$this, 'six_storage_getUserInfo']);

          add_action('wp_ajax_six_storage_get_terms', [$this, 'six_storage_getTerms']);
          add_action('wp_ajax_nopriv_six_storage_get_terms', [$this, 'six_storage_getTerms']);

          add_action('wp_ajax_six_storage_get_client_config', [$this, 'six_storage_getConfiguration']);
          add_action('wp_ajax_nopriv_six_storage_get_client_config', [$this, 'six_storage_getConfiguration']);

          add_action('wp_ajax_six_storage_get_lead_config', [$this, 'six_storage_getVTwoLeadSource']);
          add_action('wp_ajax_nopriv_six_storage_get_lead_config', [$this, 'six_storage_getVTwoLeadSource']);

          add_action('wp_ajax_six_storage_get_custom_fields', [$this, 'six_storage_getCustomFIelds']);
          add_action('wp_ajax_nopriv_six_storage_get_custom_fields', [$this, 'six_storage_getCustomFIelds']);

          add_action('wp_ajax_six_storage_get_Site_Details', [$this, 'six_storage_getSiteDetails']);
          add_action('wp_ajax_nopriv_six_storage_get_Site_Details', [$this, 'six_storage_getSiteDetails']);

          add_action('wp_ajax_six_storage_enquiry_now', [$this, 'six_storage_enquiryNow']);
          add_action('wp_ajax_nopriv_six_storage_enquiry_now', [$this, 'six_storage_enquiryNow']);

          add_action('wp_ajax_six_storage_construct_reservation_page', [$this, 'six_storage_constructReservationPage']);
          add_action('wp_ajax_nopriv_six_storage_construct_reservation_page', [$this, 'six_storage_constructReservationPage']);

          add_action('wp_ajax_six_storage_get_reservation_payment_form', [$this, 'six_storage_reservationPaymentForm']);
          add_action('wp_ajax_nopriv_six_storage_get_reservation_payment_form', [$this, 'six_storage_reservationPaymentForm']);

          add_action('wp_ajax_six_storage_reserve_unit_now', [$this, 'six_storage_reserveUnitNow']);
          add_action('wp_ajax_nopriv_six_storage_reserve_unit_now', [$this, 'six_storage_reserveUnitNow']);

          add_action('wp_ajax_six_storage_get_promo_discount', [$this, 'six_storage_getPromoDiscount']);
          add_action('wp_ajax_nopriv_six_storage_get_promo_discount', [$this, 'six_storage_getPromoDiscount']);

          add_action('wp_ajax_six_storage_valid_promo_discount', [$this, 'six_storage_validPromoDiscount']);
          add_action('wp_ajax_nopriv_six_storage_valid_promo_discount', [$this, 'six_storage_validPromoDiscount']);

          add_action('wp_ajax_six_storage_validate_promo_discount', [$this, 'six_storage_validatePromoDiscount']);
          add_action('wp_ajax_nopriv_six_storage_validate_promo_discount', [$this, 'six_storage_validatePromoDiscount']);

          add_action('wp_ajax_six_storage_upload_esign_files', [$this, 'six_storage_uploadEsignDocumentFiles']);
          add_action('wp_ajax_nopriv_six_storage_upload_esign_files', [$this, 'six_storage_uploadEsignDocumentFiles']);

          add_action('wp_ajax_six_storage_upload_document_files', [$this, 'six_storage_uploadDocumentFiles']);
          add_action('wp_ajax_nopriv_six_storage_upload_document_files', [$this, 'six_storage_uploadDocumentFiles']);

          add_action('wp_ajax_six_storage_get_client_auth_details', [$this, 'six_storage_getTenatAuthDetail']);
          add_action('wp_ajax_nopriv_six_storage_get_client_auth_details', [$this, 'six_storage_getTenatAuthDetail']);

          add_action('wp_ajax_six_storage_remove_authentication_detail', [$this, 'six_storage_removeAuthenticationDetail']);
          add_action('wp_ajax_nopriv_six_storage_remove_authentication_detail', [$this, 'six_storage_removeAuthenticationDetail']);

          add_action('wp_ajax_six_storage_post_save_tenant_photo_movein', [$this, 'six_storage_saveTenantPhoto_MoveIn']);
          add_action('wp_ajax_nopriv_six_storage_post_save_tenant_photo_movein', [$this, 'six_storage_saveTenantPhoto_MoveIn']);

          add_action('wp_ajax_six_storage_remove_tenant_photo_movein', [$this, 'six_storage_removeTenantPhoto_MoveIn']);
          add_action('wp_ajax_nopriv_six_storage_remove_tenant_photo_movein', [$this, 'six_storage_removeTenantPhoto_MoveIn']);

          add_shortcode('six_storage_online_storage_location_list', [$this, 'six_storage_location_list']);
          add_shortcode('six_storage_online_storage_move_in_shortcode_form', [$this, 'six_storage_moveInForm']);

          add_shortcode('six_storage_online_storage_unit_listing_shortcode_form', [$this, 'six_storage_unitSelectionForm']);

          add_shortcode('six_storage_online_storage_discount_slider', [$this, 'six_storage_discountSlider']);

          add_shortcode('six_storage_online_storage_admin_settings', [$this, 'six_storage_settings']);

          add_shortcode('six_storage_online_storage_thank_you_page', [$this, 'six_storage_thankyouPage']);

          add_shortcode('six_storage_online_storage_admin_index', [$this, 'six_storage_adminRegistration']);

          

          //P24 Response Page

          add_shortcode('six_storage_online_ptwofour_response_short_code', [$this, 'six_storage_ptwoFourResponse']);

          add_action('wp_head', [$this,'six_storage_set_google_analytics_tag']);

     }

     
     public function six_storage_set_google_analytics_tag(){
          $six_storage_google_analytics_enabled = get_option('six_storage_online_google_analytics_enable');
          $six_storage_google_analytics_key = get_option('six_storage_online_fc_google_analytics_key_word');

          if($six_storage_google_analytics_enabled === '1' && $six_storage_google_analytics_key !== null && $six_storage_google_analytics_key !== ''){
               
                  echo '<script async src="https://www.googletagmanager.com/gtag/js?id='. esc_attr($six_storage_google_analytics_key).'"></script>
                    <script>
                         window.dataLayer = window.dataLayer || [];
                         function gtag(){dataLayer.push(arguments);}
                         gtag(\'js\', new Date());

                         gtag(\'config\',"'.$six_storage_google_analytics_key.'");
                    </script>';
          }
               
     }

     public function six_storage_getMoveinFieldsSettings()
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $isAjax = true;
          $url = $this->six_storage_api_url . 'moveIn/fields';

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'visibility' => 1
               ])
          ));
          if (is_wp_error($response)) {
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => 'Something went wrong. Please contact support team.',
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Vehicle information save failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;

                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_getTenatAuthDetail(){
          global $wpdb;
          $table_prefix = $wpdb->prefix;
          session_start();
          $isAjax == true;
          $response = $_SESSION[$table_prefix . "six_storage_sessionObject"];

          wp_send_json(json_encode($response));
          wp_die();
     }

     public function six_storage_removeAuthenticationDetail(){
          global $wpdb;
          $table_prefix = $wpdb->prefix;
          session_start();
          $isAjax == true;
          unset($_SESSION[$table_prefix . 'six_storage_sessionObject']);
          wp_die();
     }

     public function six_storage_getCultureInfo()
     {
          $response = get_option("six_storage_online_api_culture");
          wp_send_json($response);
          wp_die();
     }

     public function six_storage_getBufferTime()
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $isAjax = true;
          $moveindate = sanitize_text_field($_POST['moveindate']);
          $moveindate = date('Y-m-d', strtotime($moveindate));
          $url = $this->six_storage_api_url . 'movein/bufferTime/' . $moveindate;

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'GET',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header
          ));
          if (is_wp_error($response)) {
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => 'Something went wrong. Please contact support team.',
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Vehicle information save failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;

                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_saveVehicleInformation()
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $isAjax = true;
          $vehicleInformation = sanitize_text_field($_POST['vehicleInformation']);
          $vehicleInformation = str_replace('\\', '', $vehicleInformation);
          $leaseProfileId = sanitize_text_field($_POST['leaseProfileId']);

          $url = $this->six_storage_api_url . 'movein/vehicleDetails/' . $leaseProfileId;

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => $vehicleInformation
          ));

          if (is_wp_error($response)) {
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => 'Something went wrong. Please contact support team.',
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Vehicle information save failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;

                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_getfilter(){

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $isAjax = true;
          $availability;
          if(get_option('six_storage_online_fc_availability_toggle') === '1'){
               $availability =2;

          }else {
              $availability=0;
          }
          $url = $this->six_storage_api_url2 . 'unit/filters?UnitVisibility=1&Availability='.$availability;

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'GET',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,    
          ));

          if (is_wp_error($response)) {
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => 'Something went wrong. Please contact support team.',
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Identity type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;

                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     } 

     public function six_storage_getIdentityTypes()
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $isAjax = true;
          $url = $this->six_storage_api_url . 'common/identityTypes';
          $activeStatus = sanitize_text_field($_POST['activeStatus']);
          $visibility = sanitize_text_field($_POST['visibility']);

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'activeStatus' => $activeStatus,
                    'visibility' => $visibility
               ])
          ));

          if (is_wp_error($response)) {
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => 'Something went wrong. Please contact support team.',
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Identity type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;

                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     function six_storage_wp9838c_timeout_extend($time)
     {
          // Default timeout is 5
          return 10;
     }

     public function six_storage_saveMoveinDetails()
     {
          $isAjax = true;

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $moveinModel = sanitize_text_field($_POST['moveinData']);
          $moveinModel = str_replace('\\', '', $moveinModel);

          $leaseProfileId = sanitize_text_field($_POST['leaseProfileId']);

          $url = $this->six_storage_api_url . 'moveIn/' . $leaseProfileId;  
          

          add_filter('http_request_timeout', [$this, 'six_storage_wp9838c_timeout_extend']);

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 100,
               'headers'   => $this->six_storage_http_header,
               'body'      => $moveinModel
          ));

         

          if (is_wp_error($response)) {
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => 'Something went wrong. Please contact support team.',
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {

                    if (array_key_exists('result', $response)) {
                         $this->six_storage_units_info = $response['result'];
                    } else {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                    }

                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;
                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }



     public function six_storage_updateProfile()
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $userId = sanitize_text_field($_POST['userId']);
          $firstName = sanitize_text_field($_POST['firstName']);
          $lastName = sanitize_text_field($_POST['lastName']);
          $email = sanitize_email($_POST['email']);
          $phoneNumber = sanitize_text_field($_POST['phoneNumber']);
          $phoneNumbertwo = sanitize_text_field($_POST['phoneNumber2']);
          $addressLineOne = sanitize_text_field($_POST['addressLineOne']);
          $addressLineTwo = sanitize_text_field($_POST['addressLineTwo']);
          $city = sanitize_text_field($_POST['city']);
          $state = sanitize_text_field($_POST['state']);
          $zipCode = sanitize_text_field($_POST['zipCode']);
          $country = sanitize_text_field($_POST['country']);
          $ssn = sanitize_text_field($_POST['ssn']);
          $userLocationInformation = sanitize_text_field($_POST['log']);

          if ($userLocationInformation != "" || $userLocationInformation != null || !empty( $userLocationInformation)){
               $userLocationInformation = str_replace('\\', '', $userLocationInformation);
               $getdyip=$this->six_storage_getIpAddress();  /* Code to get dynamic IP */
               $userLocationInformation = json_decode($userLocationInformation);
               $userLocationInformation->ipAddress = $getdyip;
               $userLocationInformation = json_encode($userLocationInformation);
          }
          $isAjax = true;

          $url = $this->six_storage_api_url . 'user/UpdateProfile/' . $userId;

          $response = wp_remote_request(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'email' => $email,
                    'phoneNumber' => $phoneNumber,
                    'phoneNumber2' => $phoneNumbertwo,
                    'addressLine1' => $addressLineOne,
                    'addressLine2' => $addressLineTwo,
                    'city' => $city,
                    'state' => $state,
                    'postalCode' => $zipCode,
                    'country' => $country,
                    'ssn' =>$ssn,
                    'logger' => json_decode($userLocationInformation)
               ])
          ));
          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' =>$message ,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {

                    if (array_key_exists('result', $response)) {
                         $this->six_storage_update_profile = $response['result'];
                    } else {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                    }

                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;
                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }


     public function six_storage_previewLicenseAgreement()
     {
          $isAjax = true;
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $moveinModel = sanitize_text_field($_POST['moveInParamAPIModel']);
          $moveinModel = str_replace('\\', '', $moveinModel);
          //$moveinModel = json_decode($moveinModel);
          $leaseProfileId = sanitize_text_field($_POST['leaseProfileId']);

          $url = $this->six_storage_api_url . 'moveIn/preview/' . $leaseProfileId;
          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => $moveinModel
          ));

          $message = 'Something went wrong. Please contact support team.';
          $message = esc_html__($message,'6storage-rentals');
          if (is_wp_error($response)) {
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => $message,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {

                    if (array_key_exists('result', $response)) {
                         $this->six_storage_units_info = $response;
                    } else {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                    }

                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;
                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_leaseCalculation()
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $this->six_storage_getDiscountDetails(false);

          $isAjax = true;
          $unitId = explode(',', sanitize_text_field($_POST['units']));

          $additionalServices = sanitize_text_field($_POST['additionalServices']);
          $additionalServices = str_replace('\\', '', $additionalServices);
          $additionalServicesArray = json_decode($additionalServices);

          $merchItems = sanitize_text_field($_POST['merchItems']);
          $merchItems = str_replace('\\', '', $merchItems);
          $merchItemsArray = json_decode($merchItems);

          $insuranceInfo = sanitize_text_field($_POST['insuranceInfo']);
          $insuranceInfo = str_replace('\\', '', $insuranceInfo);
          $insuranceInfoArray = json_decode($insuranceInfo);
          $isBusinessUser = sanitize_text_field($_POST['isBusinessUser']);
          $six_storage_units = array();

          foreach ($unitId as $key => $value) {

               $services = array();
               $merchanties = array();
               $insurances = array();

               foreach ($additionalServicesArray as $key2 => $value2) {
                    if (strtolower($value) == strtolower($value2->unitId)) {
                         $services = $value2->services;
                    }
               }

               foreach ($merchItemsArray as $key2 => $value2) {
                    if (strtolower($value) == strtolower($value2->unitId)) {
                         foreach ($value2->merchandise as $merchKey => $merch) {
                              array_push($merchanties, ['id' => $merch->itemId, 'quantity' => $merch->qnty]);
                         }
                    }
               }

               foreach ($insuranceInfoArray as $key3 => $value3) {
                    if (strtolower($value) == strtolower($value3->unitId)) {
                         $insurances = $value3->insurancePlans;
                    }
               }

               $six_storage_units[$key]['id'] = $value;
               $six_storage_units[$key]['commodity'] = array('services' => $services, 'insurance' => $insurances, 'merchandise' => $merchanties);
          }
          $recurringTypeId = sanitize_text_field($_POST['recurringTypeId']);
          $additionalMonths = sanitize_text_field($_POST['additionalMonths']);
          $promoCode = sanitize_text_field($_POST['promocode']);
          $moveInDate = sanitize_text_field($_POST['moveInDate']);
          $recurringPeriodId = sanitize_text_field($_POST['recurringPeriodId']);



          if ($moveInDate == 'null') {
               $moveInDate = date('Y-m-d');
          } else {
               $moveInDate = date('Y-m-d', strtotime($moveInDate));
          }

          if ($recurringPeriodId == 'null') {
               $recurringPeriodId = 0;
          }

          if ($recurringTypeId == 'null') {
               $recurringTypeId = 0;
          }

          if(get_option('six_storage_online_apply_discount_by_default') === '1') {

               for($i=0; $i < count($this->six_storage_discount_details); $i++){
                    $promoCodeDiscount = $this->six_storage_discount_details[$i]['promotionalDiscount']['promoCode'];
                    $promoCustomDiscount = $this->six_storage_discount_details[$i]['promotionalDiscount']['customDiscount'];
                    $promopayInAdvance = $this->six_storage_discount_details[$i]['promotionalDiscount']['customDiscount']['payInAdvance'];
                    if($promoCodeDiscount != '' && $promoCodeDiscount != null && $promoCodeDiscount == $promoCode ) {
                         if($promoCustomDiscount != '' && $promoCustomDiscount != null && $promopayInAdvance != '' && $promopayInAdvance != null
                         && $promopayInAdvance > 0 ) {
                              $additionalMonths = strval($promopayInAdvance - 1);
                         }
                    }
               }
          }
          
          $url = $this->six_storage_api_url . 'moveIn/lease/calculation';
          $leasecalcBody = json_encode([
               "units" => $six_storage_units,
               "moveInDate" => $moveInDate,
               "additionalMonths" => $additionalMonths,
               "recurringPeriodId" => $recurringPeriodId,
               "promocode" => $promoCode,
               "isBusinessUser" => $isBusinessUser,
               "recurringTypeId" => $recurringTypeId
          ]);

         

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => $leasecalcBody
          ));

          
          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => $message,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {

                    if (array_key_exists('result', $response)) {
                         $this->six_storage_units_info = $response;
                    } else {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                    }

                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;
                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_leaseProfile()
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $tentnantDetails = sanitize_text_field($_POST['tentnantDetails']);
          //$tentnantDetails = urldecode($tentnantDetails);
          $tentnantDetailsId = sanitize_text_field($_POST['tentnantDetailsId']);

          $tentnantDetails = str_replace('\\', '', $tentnantDetails);


          $isAjax = true;

          if (isset($tentnantDetailsId) && $tentnantDetailsId != null && $tentnantDetailsId != '' && $tentnantDetailsId != 'null') {
               $url = $this->six_storage_api_url . 'moveIn/leaseProfile/' . $tentnantDetailsId;
               $response = wp_remote_request(esc_url_raw($url), array(
                    'method'    => 'POST',
                    'timeout'   => 45,
                    'headers'   => $this->six_storage_http_header,
                    'body'      => $tentnantDetails
               ));
          } else {
               $url = $this->six_storage_api_url . 'moveIn/leaseProfile';
               $response = wp_remote_post(esc_url_raw($url), array(
                    'method'    => 'POST',
                    'timeout'   => 45,
                    'headers'   => $this->six_storage_http_header,
                    'body'      => $tentnantDetails
               ));
          }


          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => $message,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {

                    if (array_key_exists('result', $response)) {
                         // $this->six_storage_location = $response['result'];
                    } else {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                    }

                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;

                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ''
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }


     public function six_storage_uploadDocumentDetails()
     {
          $leaseProfileId = sanitize_text_field($_POST['leaseProfileId']);
          $documentTypeId = sanitize_text_field($_POST['documentTypeId']);
          $identityFields = sanitize_text_field($_POST['identityFields']);
          $identityFields = str_replace('\\', '', $identityFields);
          $isAjax = true;
          $documentId = sanitize_text_field($_POST['documentId']);

          $url = $this->six_storage_api_url . 'moveIn/identityDocumentDetails/' . $leaseProfileId;

          $response = wp_remote_request(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'leaseProfileId' => $leaseProfileId,
                    'documentTypeId' => $documentTypeId,
                    'identityFields' => json_decode($identityFields)
               ])
          ));

          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => $message ,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;

                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ''
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_uploadDocumentsToServer()
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $leaseProfileId = sanitize_text_field($_POST['leaseProfileId']);
          $fileType = sanitize_text_field($_POST['fileType']);
          $fileData = sanitize_text_field($_POST['fileData']);
          $fileName = sanitize_text_field($_POST['fileName']);
          $isAjax = true;
          $img = file_get_contents($fileData);
          $base64FileData = $fileType == "ESIGN" ? $fileData : base64_encode($img);

          $url = $this->six_storage_api_url . 'moveIn/identityDocumentFile';
          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'id' => null,
                    'leaseProfileId' => $leaseProfileId,
                    'fileType' => $fileType,
                    'fileData' => $base64FileData,
                    'fileName' => $fileName,
               ])
          ));

          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => $message,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {

                    if (array_key_exists('result', $response)) {
                         // $this->six_storage_location = $response['result'];
                    } else {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                    }

                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;

                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ''
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_uploadDocuments()
     {
          if ($_FILES['documentFile']['name'] != '') {
               $uploadedfile = $_FILES['documentFile'];
               $upload_overrides = array('test_form' => false);
               $movefile = wp_handle_upload($uploadedfile, $upload_overrides);
               $imageurl = "";

               if ($movefile && !isset($movefile['error'])) {
                    $imageurl = $movefile['url'];
                    wp_send_json(json_encode([
                         'isSuccess' => true,
                         'returnMessage' => $imageurl
                    ]));
                    wp_die();
               } else {
                    wp_send_json(json_encode([
                         'isSuccess' => false,
                         'returnMessage' => $movefile['error']
                    ]));
                    wp_die();
               }
          }
     }
     
     public function six_storage_getTimeZone()
     {

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $url = $this->six_storage_api_url . 'unit/timeZone';

          $isAjax = sanitize_text_field($_POST['isAjax']);

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'GET',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header
          ));

          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => $message,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {

                    if (array_key_exists('result', $response)) {
                         $this->six_storage_time_zone = $response['result'];
                    } else {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                    }

                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;
                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_unitPriceList() {
          $storageTypeId = sanitize_text_field($_POST['storageType']);
          $six_storage_locationId = sanitize_text_field($_POST['location']);
          $six_storage_buildingId = sanitize_text_field($_POST['building']);
          $unitTypeId = sanitize_text_field($_POST['unitType']);
          $pageNumber = sanitize_text_field($_POST['pageNumber']);
          $PageSize = sanitize_text_field($_POST['pageSize']);
          $isBusinessUser = sanitize_text_field($_POST['isBusinessUser']);

          $storageTypeIdArray = [];
          $six_storage_locationIdArray = [];
          $six_storage_buildingIdArray = [];
          $unitTypeIdArray = [];

          $storageTypeId = explode(",",$storageTypeId);
          $unitTypeId = explode(",",$unitTypeId);
          $six_storage_locationId = explode(",",$six_storage_locationId);
          $six_storage_buildingId = explode(",",$six_storage_buildingId);

          if(empty($storageTypeId[0])){
               $storageTypeId = null;
          }
          if(empty($six_storage_locationId[0])){
               $six_storage_locationId = null;
          }
           if(empty($six_storage_buildingId[0])){
               $six_storage_buildingId = null;
          }
           if(empty($unitTypeId[0])){
               $unitTypeId = null;
          }

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $url = $this->six_storage_api_url . 'unit/type/price';

          $this->six_storage_groupUnitsSizes = get_option('six_storage_online_fc_group_the_unit_based_on_size_toggle');

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'StorageTypeId' => $storageTypeId,
                    'LocationId' => $six_storage_locationId,
                    'BuildingId' => $six_storage_buildingId,
                    'UnitTypeId' => $unitTypeId,
                    'unitVisibility' => 1,
                    "availability" => 2,
                    "isBusinessUser" => $isBusinessUser,
                    'PageNumber' => $pageNumber,
                    'PageSize' => $PageSize
               ])
          ));
          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => $message ,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {

                    if (array_key_exists('result', $response)) {
                         $this->six_storage_units = $response['result'];
                         wp_send_json(json_encode($response));
                    } else {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                    }

                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;
                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }

     }
     public function six_storage_searchUnit()
     {
          $storageTypeId = sanitize_text_field($_POST['storageType']);
          $six_storage_locationId = sanitize_text_field($_POST['location']);
          $six_storage_buildingId = sanitize_text_field($_POST['building']);
          $unitTypeId = sanitize_text_field($_POST['unitType']);
          $six_storage_amenityId = sanitize_text_field($_POST['amenity']);
          $sortById = sanitize_text_field($_POST['sortBy']);
          $pageNumber = sanitize_text_field($_POST['pageNumber']);
          $PageSize = sanitize_text_field($_POST['pageSize']);
          $isBusinessUser = sanitize_text_field($_POST['isBusinessUser']);
         
          $storageTypeIdArray = [];
          $six_storage_locationIdArray = [];
          $six_storage_buildingIdArray = [];
          $unitTypeIdArray = [];

          $storageTypeId = explode(",",$storageTypeId);
          $unitTypeId = explode(",",$unitTypeId);
          $six_storage_locationId = explode(",",$six_storage_locationId);
          $six_storage_buildingId = explode(",",$six_storage_buildingId);
          $six_storage_amenityId = explode(",",$six_storage_amenityId);

          if ($storageTypeId !== "") {
          $storageTypeIdArray = $storageTypeId;
          }
          if ($six_storage_locationId !== "") {
          $six_storage_locationIdArray = $six_storage_locationId;
          }
          if ($six_storage_buildingId !== "") {
          $six_storage_buildingIdArray = $six_storage_buildingId;
          }
          if ($unitTypeId !== "") {
          $unitTypeIdArray = $unitTypeId;
          }
          if ($six_storage_amenityId !== "") {
               $six_storage_amenityIdArray = $six_storage_amenityId;
          }

          $this->six_storage_getUnits($storageTypeIdArray, $six_storage_locationIdArray, $six_storage_buildingIdArray, $unitTypeIdArray, $six_storage_amenityIdArray, $sortById, $pageNumber, $PageSize, true, $isBusinessUser);
         
     }

     public function six_storage_changeLocation()
     {
          $storageTypeId = sanitize_text_field($_POST['storageType']);

          $this->six_storage_getLocation([$storageTypeId], true);
     }

     public function six_storage_changeBuilding()
     {
          $storageTypeId = sanitize_text_field($_POST['storageType']);
          $six_storage_locationId = sanitize_text_field($_POST['location']);

          $this->six_storage_getBuilding([$storageTypeId],[$six_storage_locationId], true);
     }

     public function six_storage_changeUnitType()
     {
          $six_storage_buildingId = sanitize_text_field($_POST['building']);
          $storagetype = sanitize_text_field($_POST['storageType']);
          $six_storage_locationId = sanitize_text_field($_POST['location']);

          $this->six_storage_getUnitType([$six_storage_buildingId], [$storagetype], [$six_storage_locationId], true);
     }

     public function six_storage_changeAmenity()
     {
          $storageTypeId = sanitize_text_field($_POST['storageType']);
          $six_storage_locationId = sanitize_text_field($_POST['location']);
          $six_storage_buildingId = sanitize_text_field($_POST['building']);

          $this->six_storage_getAmenity([$storageTypeId],[$six_storage_locationId],[$six_storage_buildingId], true);
     }

     

     public function six_storage_changeUnitSize()
     {
          $storageTypeId = sanitize_text_field($_POST['storageType']);
          $six_storage_locationId = sanitize_text_field($_POST['location']);
          $six_storage_buildingId = sanitize_text_field($_POST['building']);
          $unitTypeId = sanitize_text_field($_POST['unitType']);

          $this->six_storage_getUnitSize($storageTypeId,$six_storage_locationId,$six_storage_buildingId, $unitTypeId, true);
     }



     public function six_storage_getUnitsInfoById()
     {
          $isAjax = true;
          $unitId = explode(',', sanitize_text_field($_POST['unitId']));
          $recurringTypeId = sanitize_text_field($_POST['invoice_reccuring']);
          $additionalMonths = sanitize_text_field($_POST['additional_months']);
          $moveInDate = sanitize_text_field($_POST['move_in_date']);
          $recurringPeriodId = sanitize_text_field($_POST['invoice_period']);
          $isBusinessUser = sanitize_text_field($_POST['isBusinessUser']);
          if ($moveInDate == 'null') {
               $moveInDate = date('Y-m-d');
          } else {
               $moveInDate = date('Y-m-d', strtotime($moveInDate));
          }

          if ($recurringPeriodId == 'null') {
               $recurringPeriodId = 0;
          }

          if ($recurringTypeId == 'null') {
               $recurringTypeId = 0;
          }

          $url = $this->six_storage_api_url . 'moveIn/rent/rentDetails';
          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    "unitId" => $unitId,
                    "moveInDate" => $moveInDate,
                    "additionalMonths" => $additionalMonths,
                    "recurringPeriodId" => $recurringPeriodId,
                    "isBusinessUser" => $isBusinessUser,
                    "recurringTypeId" => $recurringTypeId
               ])
          ));

         

          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => $message ,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {

                    if (array_key_exists('result', $response)) {
                         $this->six_storage_units_info = $response['result'];
                    } else {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                    }

                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;
                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_moveInForm()
     {
          ob_start();

          $currentHour = date('h:i');

          wp_enqueue_style('icon', $this->six_storage_plugin_url . 'assets/fonts/icon.css');
          wp_enqueue_style('materialize', $this->six_storage_plugin_url . 'assets/css/materialize/materialize.css' ,array(), $this->six_storage_plugin_version);
          wp_enqueue_style('cc-move-in-style', $this->six_storage_plugin_url . 'assets/css/cc-move-in-style.css' ,array(), $this->six_storage_plugin_version);
          
          $this->six_storage_unitInitialization();

          // Default set the emergency mobile enable on db.
          $six_storage_emergencycontact_toggle_options = get_option( 'six_storage_online_fs_ti_emergencycontact_toggle' );
          $six_storage_emergencycontact_mobile_options = get_option( 'six_storage_online_fs_ti_emergencycontact_mobile_toggle' );
 
          // if($six_storage_emergencycontact_toggle_options == 1 ){
          //      if($six_storage_emergencycontact_mobile_options == null || $six_storage_emergencycontact_mobile_options == 0){
          //           update_option('six_storage_online_fs_ti_emergencycontact_mobile_toggle',1);
          //           update_option('six_storage_online_fs_ti_emergencycontact_mobile_is_mandatory',1);
          //      }
          // }

          require_once $this->six_storage_plugin_path . 'template/portal/move-in-unit-selection.php';

          //enqueue all our scripts
          wp_enqueue_script('nouislider', $this->six_storage_plugin_url . 'assets/js/nouislider.min.js' ,array(), $this->six_storage_plugin_version);
          wp_enqueue_script('signature_pad', $this->six_storage_plugin_url . 'assets/js/signature_pad.umd.js' ,array(), $this->six_storage_plugin_version);
          wp_enqueue_script('wNumb', $this->six_storage_plugin_url . 'assets/js/wNumb.min.js' ,array(), $this->six_storage_plugin_version);
          wp_enqueue_script('six-storage-move-in.min',  $this->six_storage_plugin_url . 'assets/js/six-storage-move-in.min.js?' ,array(), $this->six_storage_plugin_version);

          //localize plugin vars
          wp_localize_script('six-storage-move-in.min', 'wordpress_vars', $this->six_storage_getPluginvars($this->six_storage_autoPaymentsEnabled));

          wp_enqueue_script('iframe-resizer',  $this->six_storage_plugin_url . 'assets/js/iframe-resizer.js' ,array(), $this->six_storage_plugin_version);
          wp_enqueue_script('utils', $this->six_storage_plugin_url . 'assets/js/utils.js');

          return ob_get_clean();
     }

     public function six_storage_discountSlider()
     {
          ob_start();

          $currentHour = date('h:i');

        
          require_once $this->six_storage_plugin_path . 'template/portal/discount-slidder.php';

          return ob_get_clean();
     }

     public function six_storage_settings()
     {
          ob_start();

          $currentHour = date('h:i');

          wp_enqueue_style('materialize', $this->six_storage_plugin_url . 'assets/css/materialize/materialize.css',array(), $this->six_storage_plugin_version);
          wp_enqueue_style('admin-settings-style', $this->six_storage_plugin_url . 'assets/css/admin-settings-style.css' ,array(), $this->six_storage_plugin_version);
          wp_enqueue_style('icon', $this->six_storage_plugin_url . 'assets/fonts/icon.css');

          require_once $this->six_storage_plugin_path . 'template/portal/admin-settings.php';

          //enqueue all our scripts
          wp_enqueue_script('six-storage-admin-settings',  $this->six_storage_plugin_url . 'assets/js/six-storage-admin-settings.min.js' ,array(), $this->six_storage_plugin_version);
          wp_enqueue_script('materialize-js',  $this->six_storage_plugin_url . 'assets/js/materialize.min.js' ,array(), $this->six_storage_plugin_version);

          //localize plugin vars
          wp_localize_script('six-storage-admin-settings', 'wordpress_vars', $this->six_storage_getPluginvars());

          return ob_get_clean();
     }

     public function six_storage_adminRegistration()
     {
          ob_start();

          $currentHour = date('h:i');

          wp_enqueue_style('materialize', $this->six_storage_plugin_url . 'assets/css/materialize/materialize.css' ,array(), $this->six_storage_plugin_version);
          wp_enqueue_style('admin-settings-style', $this->six_storage_plugin_url . 'assets/css/admin-settings-style.css' ,array(), $this->six_storage_plugin_version);
          wp_enqueue_style('icon', $this->six_storage_plugin_url . 'assets/fonts/icon.css');

          require_once $this->six_storage_plugin_path . 'template/portal/admin-index.php';

          //enqueue all our scripts
          wp_enqueue_script('six-storage-admin-settings',  $this->six_storage_plugin_url . 'assets/js/six-storage-admin-index.min.js' ,array(), $this->six_storage_plugin_version);

          //localize plugin vars
          wp_localize_script('six-storage-admin-settings', 'wordpress_vars', $this->six_storage_getPluginvars());

          return ob_get_clean();
     }

     public function six_storage_thankyouPage()
     {
          ob_start();

          $currentHour = date('h:i');

          wp_enqueue_style('cc-move-in-style', $this->six_storage_plugin_url . 'assets/css/cc-move-in-style.css' ,array(), $this->six_storage_plugin_version);
          wp_enqueue_style('materialize', $this->six_storage_plugin_url . 'assets/css/materialize/materialize.css' ,array(), $this->six_storage_plugin_version);
          wp_enqueue_style('icon', $this->six_storage_plugin_url . 'assets/fonts/icon.css');

          require_once $this->six_storage_plugin_path . 'template/portal/thankyou-page.php';

          //enqueue all our scripts
          // wp_enqueue_script('six-storage-thank-your',  $this->six_storage_plugin_url . 'assets/js/six-storage-thank-you.min.js?' . $currentHour);

          //localize plugin vars
          // wp_localize_script('six-storage-thank-you', 'wordpress_vars', $this->six_storage_getPluginvars());

          return ob_get_clean();
     }

     public function six_storage_unitSelectionForm()
     {
          ob_start();

          $this->six_storage_unitselectionInitialization();

          $currentHour = date('h:i');

          wp_enqueue_style('cc-move-in-style', $this->six_storage_plugin_url . 'assets/css/cc-move-in-style.css' ,array(), $this->six_storage_plugin_version);
          wp_enqueue_style('materialize', $this->six_storage_plugin_url . 'assets/css/materialize/materialize.css' ,array(), $this->six_storage_plugin_version);
          wp_enqueue_style('icon', $this->six_storage_plugin_url . 'assets/fonts/icon.css');

          require_once $this->six_storage_plugin_path . 'template/portal/unit-listing.php';

          //enqueue all our scripts
          wp_enqueue_script('six-storage-unit-selection',  $this->six_storage_plugin_url . 'assets/js/six-storage-unit-selection.min.js' ,array(), $this->six_storage_plugin_version);

          //localize plugin vars
          wp_localize_script('six-storage-unit-selection', 'wordpress_vars', $this->six_storage_getPluginvars());

          return ob_get_clean();
     }

     public function six_storage_ptwoFourResponse()
     {
          ob_start();

          $currentHour = date('h:i');

          wp_enqueue_style('materialize', $this->six_storage_plugin_url . 'assets/css/materialize/materialize.css?' . $currentHour);
          wp_enqueue_style('cc-move-in-style', $this->six_storage_plugin_url . 'assets/css/cc-move-in-style.css?' . $currentHour);
          wp_enqueue_style('icon', $this->six_storage_plugin_url . 'assets/fonts/icon.css');

          require_once $this->six_storage_plugin_path . 'template/portal/ptwofour-response.php';

          //enqueue all our scripts
          wp_enqueue_script('six-storage-ptwofour-response',  $this->six_storage_plugin_url . 'assets/js/six-storage-ptwofour-response.min.js' ,array(), $this->six_storage_plugin_version);

          //localize plugin vars
          wp_localize_script('six-storage-ptwofour-response', 'wordpress_vars', $this->six_storage_getPluginvars());

          return ob_get_clean();
     }

     public function six_storage_getDiscountDetails($isAjax)
     {

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $url = $this->six_storage_api_url . 'discounts';

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'discountType' => 'PROMO',
                    'visibility' => 1,
               ])
          ));
          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => $message,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {

                    if (array_key_exists('result', $response)) {
                         $this->six_storage_discount_details = $response['result'];
                    } else {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                    }

                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;

                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ''
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_getStorageType()
     {
          $isAjax = true;

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $availability;
          if(get_option('six_storage_online_fc_availability_toggle') === '1'){
               $availability =2;

          }else {
              $availability=0;
          }
          $url = $this->six_storage_api_url . 'unit/storagetype';

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'UnitVisibility' => 1,
                    'availability' => $availability,
               ])
          ));
          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => $message,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {

                    if (array_key_exists('result', $response)) {
                         $this->six_storage_storage_type = $response['result'];
                    } else {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                    }

                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;

                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ''
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_location_list()
     {
          ob_start();

          $currentHour = date('h:i');

          wp_enqueue_style('icon', $this->six_storage_plugin_url . 'assets/fonts/icon.css', array(), $this->six_storage_plugin_version);
          wp_enqueue_style('materialize', $this->six_storage_plugin_url . 'assets/css/materialize/materialize.css' ,array(), $this->six_storage_plugin_version);
          wp_enqueue_style('cc-move-in-style', $this->six_storage_plugin_url . 'assets/css/cc-move-in-style.css' ,array(), $this->six_storage_plugin_version);
          
          $this->six_storage_unitInitialization();
          require_once $this->six_storage_plugin_path . 'template/portal/move-in-unit-selection.php';
          require_once $this->six_storage_plugin_path . 'template/portal/location-listing.php';

          //enqueue all our scripts
          wp_enqueue_script('nouislider', $this->six_storage_plugin_url . 'assets/js/nouislider.min.js' ,array(), $this->six_storage_plugin_version);
          wp_enqueue_script('signature_pad', $this->six_storage_plugin_url . 'assets/js/signature_pad.umd.js' ,array(), $this->six_storage_plugin_version);
          wp_enqueue_script('wNumb', $this->six_storage_plugin_url . 'assets/js/wNumb.min.js' ,array(), $this->six_storage_plugin_version);
          wp_enqueue_script('six-storage-location-list',  $this->six_storage_plugin_url . 'assets/js/six-storage-location-list.min.js' ,array(), $this->six_storage_plugin_version);

          //localize plugin vars
          wp_localize_script('six-storage-location-list', 'wordpress_vars', $this->six_storage_getPluginvars($this->six_storage_autoPaymentsEnabled));
          wp_enqueue_script('iframe-resizer',  $this->six_storage_plugin_url . 'assets/js/iframe-resizer.js' ,array(), $this->six_storage_plugin_version);
          wp_enqueue_script('utils', $this->six_storage_plugin_url . 'assets/js/utils.js', array(), $this->six_storage_plugin_version);
          return ob_get_clean();
     }


     public function six_storage_location_list_action()
     {

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $isAjax = true;
          $unitVisibility = 1;
          $availability = 2; 
          $pagenumber = 1;
          $pagesize = 1000;      
          $url = $this->six_storage_api_base_url . 'v1/unit/location';
         
          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'unitVisibility' => $unitVisibility,
                    'availability' => $availability,
                    'pageNumber' => $pagenumber,
                    'pageSize' => $pagesize
               ])
          ));

          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => $message,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (array_key_exists('result', $response)) {
                         $this->six_storage_discount_details = $response['result'];
                    } else {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                    }

                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;

                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ''
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_getLocation($storageTypeId, $isAjax)
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $availability;
          if(get_option('six_storage_online_fc_availability_toggle') === '1'){
               $availability =2;

          }else {
              $availability=0;
          }

          if(empty($storageTypeId[0])){
               $storageTypeId = null;
          }
          $url = $this->six_storage_api_url . 'unit/location';

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'unitVisibility' => 1,
                    'availability' =>  $availability,
                    'StorageTypeId' => $storageTypeId
               ])
          ));  
          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => $message ,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {

                    if (array_key_exists('result', $response)) {
                         $this->six_storage_location = $response['result'];
                    } else {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                    }

                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;

                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ''
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_getBuilding($storageTypeId, $six_storage_locationId, $isAjax)
     { 
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $availability;
          if(get_option('six_storage_online_fc_availability_toggle') === '1'){
               $availability =2;

          }else {
              $availability=0;
          }
          
          if(empty($storageTypeId[0])){
               $storageTypeId = null;
          }

          if(empty($six_storage_locationId[0])){
               $six_storage_locationId = null;
          }              

          $url = $this->six_storage_api_url . 'unit/building';

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'UnitVisibility' => 1,
                    'availability' => $availability,
                    'StorageTypeId' => $storageTypeId,   
                    'LocationId' => $six_storage_locationId
               ])
          ));

          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => $message,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {

                    if (array_key_exists('result', $response)) {
                         $this->six_storage_building = $response['result'];
                    } else {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                    }

                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;

                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_changeUnitPrice()
     {
          $storageTypeId = sanitize_text_field($_POST['storageType']);
          $six_storage_locationId = sanitize_text_field($_POST['location']);
          $six_storage_buildingId = sanitize_text_field($_POST['building']);

          $this->six_storage_getUnitPrice([$storageTypeId],[$six_storage_locationId],[$six_storage_buildingId]);
     }

     public function six_storage_getUnitPrice($storageTypeId,$six_storage_locationId,$six_storage_buildingId)
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          
          $availability;
          if(get_option('six_storage_online_fc_availability_toggle') === '1'){
               $availability =2;

          }else {
              $availability=0;
          }

          if(empty($storageTypeId[0])){
               $storageTypeId = null;
          }

          if(empty($six_storage_locationId[0])){
               $six_storage_locationId = null;
          }  
          
          if(empty($six_storage_buildingId[0])){
               $six_storage_buildingId = null;
          }  
          
          $isAjax = true;

          $url = $this->six_storage_api_url . 'unit/price';

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'UnitVisibility' => 1,
                    'availability' => $availability,
                    'StorageTypeId' => $storageTypeId,   
                    'LocationId' => $six_storage_locationId,
                    'buildingId' =>  $six_storage_buildingId
       
               ])
          ));
          if (is_wp_error($response)) {
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => 'Something went wrong. Please contact support team.',
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
              
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Vehicle information save failed. Please contact support team.';
                         $response['returnMessage'] = $message;
                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }

     }

     public function six_storage_getAmenity($storageTypeId, $six_storage_locationId, $six_storage_buildingId, $isAjax)
     { 

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $availability;
          if(get_option('six_storage_online_fc_availability_toggle') === '1'){
               $availability =2;

          }else {
              $availability=0;
          }

          if(empty($storageTypeId[0])){
               $storageTypeId = null;
          }

          if(empty($six_storage_locationId[0])){
               $six_storage_locationId = null;
          }

          if(empty($six_storage_buildingId[0])){
               $six_storage_buildingId = null;
          }         
              

          $url = $this->six_storage_api_url . 'unit/amenities';

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'UnitVisibility' => 1,
                    'availability' => $availability,
                    'StorageTypeId' => $storageTypeId,   
                    'LocationId' => $six_storage_locationId,
                    'buildingId' =>  $six_storage_buildingId
       
               ])
          ));
          

          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => $message,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {

                    if (array_key_exists('result', $response)) {
                         $this->amenity = $response['result'];
                    } else {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                    }

                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;

                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }


     public function six_storage_getUnitType($six_storage_buildingId, $storageTypeId,$six_storage_locationId, $isAjax)
     {

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $availability;
          if(get_option('six_storage_online_fc_availability_toggle') === '1'){
               $availability =2;

          }else {
              $availability=0;
          }

          if(empty($storageTypeId[0])){
               $storageTypeId = null;
          }

          if(empty($six_storage_locationId[0])){
               $six_storage_locationId = null;
          }

          if(empty($six_storage_buildingId[0])){
               $six_storage_buildingId = null;
          }

          $url = $this->six_storage_api_url . 'unit/type';

               $response = wp_remote_post(esc_url_raw($url), array(
                    'method'    => 'POST',
                    'timeout'   => 45,
                    'headers'   => $this->six_storage_http_header,
                    'body'      => json_encode([
                         'buildingId' => $six_storage_buildingId,
                         'storageTypeId' => $storageTypeId,
                         'locationId'=> $six_storage_locationId,
                         'UnitVisibility' => 1,
                         'availability' =>  $availability,
                    ])
               ));
     
          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => $message,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {

                    for($i=0; $i < count($response['result']); $i++){
                         // Trim Unit Type Name
                         $addonsVal = trim($response['result'][$i]['unitTypeName']);
                         $response['result'][$i]['unitTypeName'] = $addonsVal;
                    }

                    if (array_key_exists('result', $response)) {
                         $this->unit_type = $response['result'];
                    } else {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                    }

                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;

                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_getUnits($storageTypeId, $six_storage_locationId, $six_storage_buildingId, $unitTypeId, $six_storage_amenityId,  $sortById, $pageNumber, $PageSize, $isAjax, $isBusinessUser)   
     {
          $minValue = sanitize_text_field($_POST['minValue']);
          $maxValue = sanitize_text_field($_POST['maxValue']);

          if($minValue == ""){
               $minValue = 0;
          }
          if($maxValue == ""){
               $maxValue = 0;
          }

          $url = $this->six_storage_api_url . 'unit/search';
          $this->six_storage_groupUnitsSizes = get_option('six_storage_online_fc_group_the_unit_based_on_size_toggle');
          if ($this->six_storage_groupUnitsSizes == "1"){
               $url = $this->six_storage_api_url . 'unit/type/price';
          }

          if(empty($storageTypeId[0])){
               $storageTypeId = null;
          }
          if(empty($six_storage_locationId[0])){
               $six_storage_locationId = null;
          }
          if(empty($six_storage_buildingId[0])){
               $six_storage_buildingId = null;
          }
          if(empty($unitTypeId[0])){
               $unitTypeId = null;
          }
          if(empty($six_storage_amenityId[0])){
               $six_storage_amenityId = null;
          }

          if($sortById == null || $sortById == ''){
               $sortById = 'UnitNumber';
          }

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $sortDirection = sanitize_text_field($_POST['sortDirection']);

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'StorageTypeId' => $storageTypeId,
                    'LocationId' => $six_storage_locationId,
                    'BuildingId' => $six_storage_buildingId,
                    'UnitTypeId' => $unitTypeId,              
                    'amenityId'  => $six_storage_amenityId, 
                    'unitSort' => $sortById,
                    'sortDirection'  =>  $sortDirection,    
                    'unitVisibility' => 1,
                    "availability" => 2,
                    "isBusinessUser" => $isBusinessUser,
                    'PageNumber' => $pageNumber,
                    'PageSize' => $PageSize,
                    'priceRange' => [
                         'minPrice' => $minValue,
                         'maxPrice' => $maxValue
                    ]
               ])
          ));

          
		 
          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => $message ,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {

                    if (array_key_exists('result', $response)) {
                         $this->six_storage_units = $response['result'];
                    } else {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                    }

                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;
                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_moveinSignUp()
     {
          global $wpdb;
          $table_prefix = $wpdb->prefix;

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          session_start();
          $firstName = sanitize_text_field($_POST['firstName']);
          $lastName = sanitize_text_field($_POST['lastName']);
          $email = sanitize_email($_POST['email']);
          $phone = sanitize_text_field($_POST['phone']);
          $password = sanitize_text_field($_POST['password']);
          $confirmPassword = sanitize_text_field($_POST['confirmPassword']);
          $signupUserName = sanitize_text_field($_POST['signupUserName']);
          $isAjax = true;

          $url = $this->six_storage_api_url . 'user/signup';

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'email' => $email,
                    'phoneNumber' => $phone,
                    'password' => $password,
                    'confirmPassword' => $confirmPassword,
                    'userName' => $signupUserName
               ])
          ));
          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => $message,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {

                    if (array_key_exists('result', $response)) {
                         $this->six_storage_units = $response['result'];
                         $_SESSION[$table_prefix . "six_storage_sessionObject"]['result']['firstName'] = $firstName;
                         $_SESSION[$table_prefix . "six_storage_sessionObject"]['result']['lastName'] = $lastName;
                         $_SESSION[$table_prefix . "six_storage_sessionObject"]['result']['email'] = $email;
                         $_SESSION[$table_prefix . "six_storage_sessionObject"]['result']['phoneNumber'] = $phone;
                         $_SESSION[$table_prefix . "six_storage_sessionObject"]['result']['userId'] = $response['result'];
                    } else {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                    }

                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;
                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_moveInSignIn()
     {
          global $wpdb;
          $table_prefix = $wpdb->prefix;

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          session_start();
          $username = sanitize_text_field($_POST['username']);
          $password = sanitize_text_field($_POST['password']);
          $userLocationInformation = sanitize_text_field($_POST['log']);

          if ($userLocationInformation != "" || $userLocationInformation != null || !empty( $userLocationInformation)){
               $userLocationInformation = str_replace('\\', '', $userLocationInformation);
               $getdyip=$this->six_storage_getIpAddress();  /* Code to get dynamic IP */
               $userLocationInformation = json_decode($userLocationInformation);
               $userLocationInformation->ipAddress = $getdyip;
               $userLocationInformation = json_encode($userLocationInformation);
          }
          $isAjax = true;

          $url = $this->six_storage_api_url . 'user/login';

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'userName' => $username,
                    'password' => $password,
                    'logger' => json_decode($userLocationInformation),
               ])
          ));

          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => $message,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               $beforereturnMsgNameTrans = $response['returnMessage'];
               $translatedreturnMsgName = esc_html__(trim($beforereturnMsgNameTrans),'6storage-rentals');
               $response['returnMessage'] = $translatedreturnMsgName;
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {

                    if (array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' && $response['returnMessage'] == "SUCCESS") {
                         $_SESSION[$table_prefix .'userid'] = $response['result']['userId'];
                         $_SESSION[$table_prefix . "six_storage_sessionObject"] = $response;
                    }

                    if (array_key_exists('result', $response)) {
                         $this->signIn = $response['result'];
                    } else {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                    }

                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;
                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_submitConfirmationCode()
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $isAjax = true;
          
          $url = $this->six_storage_api_url . 'user/confirm/signup/';

          $confirmationusername = sanitize_text_field($_POST['confirmation_username']);
          $confirmationcode = sanitize_text_field($_POST['confirmation_code']);
          $password = sanitize_text_field($_POST['password']);

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'userName' => $confirmationusername,
                    'confirmationCode' => $confirmationcode,
                    'password' => $password,
               ])
          ));

          if (is_wp_error($response)) {
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => 'Something went wrong. Please contact support team.',
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Vehicle information save failed. Please contact support team.';
                         $response['returnMessage'] = $message;

                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_submitPassowrdConfirmationCode()
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $isAjax = true;
          
          $url = $this->six_storage_api_url . '/user/confirm/password/';

          $newPassword = sanitize_text_field($_POST['newPassword']);
          $userName = sanitize_text_field($_POST['userName']);
          $confirmationcode = sanitize_text_field($_POST['confirmationCode']);

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'newPassword' => $newPassword,
                    'confirmationCode' => $confirmationcode,
                    'userName' => $userName,
               ])
          ));

          if (is_wp_error($response)) {
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => 'Something went wrong. Please contact support team.',
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Vehicle information save failed. Please contact support team.';
                         $response['returnMessage'] = $message;

                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_resendConfirmationCode()
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $isAjax = true;
        
          $url = $this->six_storage_api_url . 'user/resend/confirmationcode/';

          $confirmationusername = sanitize_text_field($_POST['confirmation_username']);

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'userName' => $confirmationusername,
               ])
          ));

          if (is_wp_error($response)) {
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => 'Something went wrong. Please contact support team.',
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Vehicle information save failed. Please contact support team.';
                         $response['returnMessage'] = $message;

                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_getUserInfo()
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $userId = sanitize_text_field($_POST['userId']);
          $isAjax = true;

          $url = $this->six_storage_api_url . 'user/' . $userId;

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'GET',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header
          ));

          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => $message,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {

                    if (array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' && $response['returnMessage'] == "SUCCESS") {
                         $_SESSION[$table_prefix .'userid'] = $response['result']['userId'];
                    }

                    if (array_key_exists('result', $response)) {
                         $this->signIn = $response['result'];
                    } else {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                    }

                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;
                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_getTerms()
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $isAjax = true;

          $url = $this->six_storage_api_url . 'common/terms';

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'GET',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header
          ));

          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' =>$message ,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Vehicle information save failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;

                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_getPaymentForm($isAjax)
     {
          $userId = sanitize_text_field($_POST['userId']);
          $tentnantDetailsId = sanitize_text_field($_POST['leaseProfileId']);
          $chargeableAmount = sanitize_text_field($_POST['chargeableAmount']);
          $paymentModeId = sanitize_text_field($_POST['paymentModeId']);
          $hostURL = sanitize_text_field($_POST['hostURL']);
          $callPlace = sanitize_text_field($_POST['paymentModeText']);
          $payloadObject = sanitize_text_field($_POST['payloadObject']);
          $payloadObject = str_replace('\\', '', $payloadObject);

          if($callPlace === "CreditCard"){
               $url =  $this->six_storage_api_url2 . 'user/paymentform/' .$userId;
          }else{
               $url =  $this->six_storage_api_url . 'moveIn/paymentform/' . $tentnantDetailsId;
          }

         

          $sixStorageln = '';
          $sixStoragecurrentpage = $_SERVER['REQUEST_URI'];
          $sixStorageep=explode('/',$sixStoragecurrentpage);
          if(count($sixStorageep) > 0){
               if(strlen($sixStorageep[1]) === 2){
                    $sixStorageln=$sixStorageep[1];
               }
          }

          $sixStoragelanguageCode = '';

          if ($sixStorageln == '') {
               $sixStoragelanguageCode = get_locale();
          }

          $sixStoragelanguageCode = str_replace("_","-",$sixStoragelanguageCode);

          //$p24responsePage = get_option('six_storage_ptwofour_response_page_id');

          if (function_exists('pll_get_post')) {
               $p24responsePage = get_permalink(pll_get_post(get_option('six_storage_ptwofour_response_page_id')));
          }
          else{
               $p24responsePage = get_permalink(get_option('six_storage_ptwofour_response_page_id'));
          }

          $isAjax = true;
          $response = wp_remote_get(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'chargeableAmount' => $chargeableAmount,
                    'hostURL' => $hostURL,
                    'leaseProfileId' => $tentnantDetailsId,
                    'paymentModeId' => $paymentModeId,
                    'language' => $sixStoragelanguageCode,
                    'transactionCallback' => $p24responsePage,
                    'callPlace'=> 'MOVEIN',
                    'transactionType' => 'sale',
                    'payloadObject'=> $payloadObject,
                   
               ])
          ));

       


          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' =>$message ,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {

                    if (array_key_exists('result', $response)) {
                         $this->payment = $response['result'];
                    } else {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Payment Form retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                    }

                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Payment Form retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;
                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_getVTwoLeadSource()
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $isAjax = true;

          $url = $this->six_storage_api_base_url . 'v2/common/leadSource';

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'GET',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header
          ));
          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' =>$message ,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;

                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ''
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_getCustomFIelds()
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $isAjax = true;

          $url = $this->six_storage_api_base_url . 'v2/common/custom-fields';

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'GET',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header
          ));
          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' =>$message ,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;

                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ''
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_getSiteDetails()
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $isAjax = true;

          $url = $this->six_storage_api_base_url . 'v1/common/site/details';

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'GET',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header
          ));
          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' =>$message ,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;

                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ''
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_getConfiguration()
     {
          $this->six_storage_getClientConfig(true);
     }

     public function six_storage_getClientConfig($isAjax)
     {

          global $wpdb;
          $table_prefix = $wpdb->prefix;

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $url = $this->six_storage_api_url . 'common/config';

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'GET',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header
          ));

          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' =>$message ,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               $_SESSION[$table_prefix ."SixStorageclientConfig"] = $response; 
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {  
                    $resultdata= json_encode($response['result']['culture']);
                    $databaseresult= get_option('six_storage_online_api_culture');
                    if($resultdata != $databaseresult ){
                         update_option( 'six_storage_online_api_culture', $resultdata);
                    }

                    if($response['result']['securityGateID'] !== 'undefined' && $response['result']['securityGateID'] !== '00000000-0000-0000-0000-000000000000' && $response['result']['securityGateID'] !== null  && $response['result']['securityGateName'] !== null && $response['result']['securityGateName'] !== ''){
if(!get_option('six_storage_online_fs_ti_gateaccess_name')){
                              add_option('six_storage_online_fs_ti_gateaccess_name',$response['result']['securityGateName']);
                              update_option('six_storage_online_fs_ti_timezone_toggle',1);
                              update_option('six_storage_online_fs_ti_timezone_is_mandatory',1);
                              delete_option('six_storage_online_fs_ti_is_timezone_manually_changed');
                         }
                         else{
                              if(get_option('six_storage_online_fs_ti_gateaccess_name')!=$response['result']['securityGateName']){
                                   update_option('six_storage_online_fs_ti_gateaccess_name',$response['result']['securityGateName']);
                                   delete_option('six_storage_online_fs_ti_is_timezone_manually_changed');
                                   update_option('six_storage_online_fs_ti_timezone_toggle',1);
                                   update_option('six_storage_online_fs_ti_timezone_is_mandatory',1);
                              }
                         }

                         if(count($response['result']['timezones'])==0){
                              update_option('six_storage_online_fs_ti_timezone_toggle',0);
                              update_option('six_storage_online_fs_ti_timezone_is_mandatory',0);
                         }
                         if(count($response['result']['timezones'])>=1){
                              if(!get_option('six_storage_online_fs_ti_is_timezone_synced')){
                                  add_option('six_storage_online_fs_ti_is_timezone_synced','1');
                                  update_option('six_storage_online_fs_ti_timezone_toggle',1);
                                  update_option('six_storage_online_fs_ti_timezone_is_mandatory',1);
                              }
                              if(get_option( 'six_storage_online_fs_ti_timezone_toggle')==1){
                                update_option('six_storage_online_fs_ti_timezone_is_mandatory',1);
                              }
if(!get_option( 'six_storage_online_fs_ti_is_timezone_manually_changed')){
                                   if(!get_option( 'six_storage_online_fs_ti_timezone_array')){
                                        add_option('six_storage_online_fs_ti_timezone_array',array_column($response['result']['timezones'], 'id'));
                                        update_option('six_storage_online_fs_ti_timezone_toggle',1);
                                        update_option('six_storage_online_fs_ti_timezone_is_mandatory',1);
                                   }
                                   else{
                                        $timezone_array_from_api = array_column($response['result']['timezones'], 'id');
                                        $timezone_array_from_db = get_option( 'six_storage_online_fs_ti_timezone_array');
                                        $array_diff = array_diff($timezone_array_from_api, $timezone_array_from_db);
                                        $array_diff_rev = array_diff($timezone_array_from_db, $timezone_array_from_api);
                                        $array_intersect = array_intersect($timezone_array_from_api, $timezone_array_from_db);
                                        //print_r($array_intersect);
                                        //print_r($array_diff_rev);
                                        $timezone_merged_array = array_merge($array_intersect,$array_diff);
                                        update_option('six_storage_online_fs_ti_timezone_array',$timezone_merged_array);
                                        if($array_diff || $array_diff_rev){
                                             update_option('six_storage_online_fs_ti_timezone_toggle',1);
                                             update_option('six_storage_online_fs_ti_timezone_is_mandatory',1);
                                        }
                                   }
                              }
                         }
                    }

                    for($i=0; $i < count($response['result']['paymentModes']); $i++){
                         //PaymentId Translation
                         $paymentTextVal = $response['result']['paymentModes'][$i]['text'];
                         $translatedUnitpaymentName = esc_html__(trim($paymentTextVal),'6storage-rentals');
                         $response['result']['paymentModes'][$i]['text'] = $translatedUnitpaymentName;
                    }
                //$six_storage_online_fc_group_the_unit_based_on_size_toggle = $Obj->six_storage_online_fc_group_the_unit_based_on_size_toggle;
                    if (array_key_exists('result', $response)) {
                         $responseData = $response['result'];

                         // $this->six_storage_groupUnitsSizes = $response['result']['groupUnitSizes'];
                    $this->six_storage_groupUnitsSizes = get_option('six_storage_online_fc_group_the_unit_based_on_size_toggle');
                         $this->six_storage_inclusiveofTax = $responseData["inclusiveofTax"];
                         $this->six_storage_autoPaymentsEnabled = $responseData["autoPaymentsEnabled"];
                         $this->six_storage_leadSource = $responseData["leadSources"];
                         $this->six_storage_invoice_period = $responseData["invoicePeriods"];
                         $this->six_storage_invoice_reccuring = $responseData["recurringTypes"];
                         $this->six_storage_identityDocuments = $responseData["identityFields"];
                    } else {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                    }

                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;
                         $_SESSION[$table_prefix ."SixStorageclientConfig"] = json_decode($response['body'], true);
                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         $_SESSION[$table_prefix ."SixStorageclientConfig"] = json_decode($response['body'], true);
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_getAutoSelectedUnits()
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $storageTypeId = sanitize_text_field($_POST['storageType']);
          $six_storage_locationId = sanitize_text_field($_POST['location']);
          $six_storage_buildingId = sanitize_text_field($_POST['building']);
          $selectedUnitTypes = sanitize_text_field($_POST['selectedUnitTypes']);
          $isBusinessUser = sanitize_text_field($_POST['isBusinessUser']);
          $isExcludeDiscountUnits = sanitize_text_field($_POST['isExcludeDiscountUnits']);

          $selectedUnitTypes = urldecode($selectedUnitTypes);

          $selectedUnitTypes = str_replace('\"', '"', $selectedUnitTypes);

          $body = json_encode([
               'StorageTypeId' => $storageTypeId,
               'LocationId' => $six_storage_locationId,
               'BuildingId' => $six_storage_buildingId,
               'unitType' => json_decode($selectedUnitTypes),
               "isBusinessUser" => $isBusinessUser,
               "isExcludeDiscountUnits" => $isExcludeDiscountUnits,
               'unitVisibility' => 1,
               "availability" => 2,
          ]);
          $isAjax = true;
          $url = $this->six_storage_api_url . 'unit/type/search';
          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => $body
          ));
          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' =>$message ,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;

                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ''
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }


     public function six_storage_validateGateAccess()
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $gateAccessInfo = sanitize_text_field($_POST['gateAccessInfo']);

          $gateAccessInfo = urldecode($gateAccessInfo);

          $gateAccessInfo = str_replace('\"', '"', $gateAccessInfo);

          $isAjax = true;
          $url = $this->six_storage_api_url . 'moveIn/gateaccess/validate';
          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => $gateAccessInfo
          ));

          

          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' =>$message ,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;

                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ''
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_forgotPassword($isAjax)
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $username = sanitize_text_field($_POST['userName']);

          $url = $this->six_storage_api_url . 'user/password/forgot';
          $isAjax = true;
          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'UserName' => $username
               ])
          ));

          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' =>$message ,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;
                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

public function six_storage_resetPassword($isAjax)
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $username = sanitize_text_field($_POST['userName']);
          $url = $this->six_storage_api_url2 . 'user/reset-password';
          $isAjax = true;
          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'UserName' => $username
               ])
          ));

          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' =>$message ,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                    
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;
                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_setresetPassword($isAjax)
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $token = sanitize_text_field($_POST['token']);
          $url = $this->six_storage_api_url2 . 'user/validate-email-token';
          $isAjax = true;
          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'Token' => $token
               ])
          ));

          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' =>$message ,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;
                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_updatepassword($isAjax)
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $token = sanitize_text_field($_POST['token']);
          $password = sanitize_text_field($_POST['password']);
          $url = $this->six_storage_api_url2 . 'user/update-password';
          $isAjax = true;
          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'token' => $token,
                    'password' => $password
               ])
          ));

          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' =>$message ,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;
                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_unitInitialization()
     {
          $this->six_storage_getClientConfig(false);

          $this->six_storage_displayBusinessUser = get_option("six_storage_online_fc_business_user_toggle");
          // $response = get_option("six_storage_online_api_culture");
          // $this->six_storage_cultureInfo = json_decode($response);

          //$this->six_storage_getStorageType(false);
     }

     public function six_storage_unitSelectionInitialization()
     {
          //$this->six_storage_getClientConfig(false);

          $this->six_storage_displayBusinessUser = get_option("six_storage_online_fc_business_user_toggle");
          // $response = get_option("six_storage_online_api_culture");
          // $this->six_storage_cultureInfo = json_decode($response);

          //$this->six_storage_getUnits(array(''), array(''), array(''), array(''), 1, 100, true, false);
     }

     public function six_storage_enquiryNow()
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $enqinformation = sanitize_text_field($_POST['enqinformation']);

          //$enqinformation = urldecode($enqinformation);
          $enqinformation = str_replace('\"', '"', $enqinformation);

          $url = $this->six_storage_api_url . 'lead/';
          $isAjax = true;
          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => $enqinformation,
          ));

          if (is_wp_error($response)) {
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => 'Something went wrong. Please contact support team.',
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                         $response['returnMessage'] = $message;
                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_constructReservationPage()
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $unitId = sanitize_text_field($_POST['unitId']);

          $url = $this->six_storage_api_url . 'reservation/units/';
          $isAjax = true;
          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'unitId' => [$unitId], 
               ])
          ));

          if (is_wp_error($response)) {
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => 'Something went wrong. Please contact support team.',
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                         $response['returnMessage'] = $message;
                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     

     public function six_storage_reservationPaymentForm()
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $paymentFormInfo = sanitize_text_field($_POST['paymentFormInfo']);
          $userInformation = sanitize_text_field($_POST['userInformation']);
          $unitId = explode(',', sanitize_text_field($_POST['unitId']));
          $paymentgateway = sanitize_text_field($_POST['paymentgateway']);
         
          if($paymentgateway === "PAYA"){
               $url = $this->six_storage_api_url2 . 'reservation/payment/';
          }else{
               $url = $this->six_storage_api_url . 'reservation/payment/';
          }
     
          // $unitId = urldecode($unitId);
          // $unitId = str_replace('\"', '"', $unitId);

          $paymentFormInfo = urldecode($paymentFormInfo);
          $paymentFormInfo = str_replace('\"', '"', $paymentFormInfo);

          $PayloadObject = sanitize_text_field($_POST['PayloadObject']);
          $PayloadObject = str_replace('\"', '"', $PayloadObject);


          $userInformation = urldecode($userInformation);
          $userInformation = str_replace('\"', '"', $userInformation);

          $sixStoragereserlanguageCode = '';

          if ($sixStorageln == '') {
               $sixStoragereserlanguageCode = get_locale();
          }

          $sixStoragereserlanguageCode = str_replace("_","-",$sixStoragereserlanguageCode);

          if (function_exists('pll_get_post')) {
               $p24reserveresponsePage = get_permalink(pll_get_post(get_option('six_storage_ptwofour_response_page_id')));
          }
          else{
               $p24reserveresponsePage = get_permalink(get_option('six_storage_ptwofour_response_page_id'));
          }
          $paymentFormInfo = json_decode($paymentFormInfo,true);
          $userInformation = json_decode($userInformation,true);
          $paymentFormInfo['transactionCallback'] = $p24reserveresponsePage;
          $paymentFormInfo['language'] =$sixStoragereserlanguageCode;

          $isAjax = true;
          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'unitId' => $unitId,
                    'callPlace'      => "RESERVATION",
                    'paymentFormInfo' =>$paymentFormInfo,
                    'userInformation' =>$userInformation,
                    'PayloadObject' => $PayloadObject
               ])
          ));

          if (is_wp_error($response)) {
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => 'Something went wrong. Please contact support team.',
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                         $response['returnMessage'] = $message;
                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_reserveUnitNow()
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $six_storage_unitsInfo = sanitize_text_field($_POST['unitsInfo']);

          //$six_storage_unitsInfo = urldecode($six_storage_unitsInfo);
          $six_storage_unitsInfo = str_replace('\"', '"', $six_storage_unitsInfo);

          $url = $this->six_storage_api_url . 'reservation/';
         
          $isAjax = true;
          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      =>  $six_storage_unitsInfo,
          ));

          if (is_wp_error($response)) {
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => 'Something went wrong. Please contact support team.',
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                         $response['returnMessage'] = $message;
                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_getPromoDiscount()
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $discounttype = sanitize_text_field($_POST['discounttype']);
          $visibility = sanitize_text_field($_POST['visibility']);
          $storagetypeId = sanitize_text_field($_POST['storagetypeId']);
          $tenanttypeId = sanitize_text_field($_POST['tenanttypeId']);
          $period = sanitize_text_field($_POST['period']);
          $six_storage_location = sanitize_text_field($_POST['location']);

          $url = $this->six_storage_api_url . 'unit/discount/';
          $isAjax = true;
          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'discountType'=> $discounttype,
                    'visibility'=> $visibility,
                    'storageTypeId' => $storagetypeId,
                    'tenantTypeId' => $tenanttypeId,
                    'period' => $period,
                    'locationId'=> $six_storage_location,
               ])
          ));
		 
          if (is_wp_error($response)) {
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => 'Something went wrong. Please contact support team.',
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                         $response['returnMessage'] = $message;
                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_validatePromoDiscount()
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $this->six_storage_getDiscountDetails(false);

          $storageTypeId = sanitize_text_field($_POST['storageTypeId']);
          $six_storage_locationId = sanitize_text_field($_POST['locationId']);
          $tenanttypeId = sanitize_text_field($_POST['tenantTypeId']);
          $promocode = sanitize_text_field($_POST['promocode']);
          $period = sanitize_text_field($_POST['period']);
          $visibility = sanitize_text_field($_POST['visibility']);
          $additionalmonth = sanitize_text_field($_POST['additionalmonth']);

          for($i=0; $i < count($this->six_storage_discount_details); $i++){
               $promoCodeDiscount = $this->six_storage_discount_details[$i]['promotionalDiscount']['promoCode'];
               $promoCustomDiscount = $this->six_storage_discount_details[$i]['promotionalDiscount']['customDiscount'];
               $promopayInAdvance = $this->six_storage_discount_details[$i]['promotionalDiscount']['customDiscount']['payInAdvance'];
               if($promoCodeDiscount != '' && $promoCodeDiscount != null && $promoCodeDiscount == $promocode ) {
                    if($promoCustomDiscount != '' && $promoCustomDiscount != null && $promopayInAdvance != '' && $promopayInAdvance != null
                    && $promopayInAdvance > 0 ) {
                         $additionalmonth = strval($promopayInAdvance - 1);
                         $promoCodeDiscountNoteResponse = "NOTE: You'll get the first month free since you've opted for a " . $promopayInAdvance . "-month prepaid contract";
                    }
               }
          }


          $url = $this->six_storage_api_url . 'unit/discount/promocode/';
          $isAjax = true;
          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'storageTypeId' => $storageTypeId,
                    'locationId' => $six_storage_locationId,
                    'tenantTypeId' => $tenanttypeId,
                    'promocode' => $promocode,
                    'period' => $period,
                    'visibility' => $visibility,
                    'additionalMonths' => $additionalmonth
               ])
          ));

          if (is_wp_error($response)) {
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => 'Something went wrong. Please contact support team.',
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               $response['notePromoResponse'] = $promoCodeDiscountNoteResponse;
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                         $response['returnMessage'] = $message;
                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_validPromoDiscount()
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $validpromocode = sanitize_text_field($_POST['validpromocode']);

          $validpromocode = urldecode($validpromocode);
          $validpromocode = str_replace('\"', '"', $validpromocode);

          $url = $this->six_storage_api_url . 'unit/discount/promocode/';
          $isAjax = true;
          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => $validpromocode
          ));

          if (is_wp_error($response)) {
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => 'Something went wrong. Please contact support team.',
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                         $response['returnMessage'] = $message;
                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_uploadEsignDocumentFiles()
     {

          $userId = sanitize_text_field($_POST['leaseProfileId']);
          
          $uploadedName =  sanitize_text_field($_POST['fileType']);

          //$uploadedFileName =  sanitize_text_field($_POST['fileName']);

          $filePath = $_FILES["files"]["tmp_name"];
          $fp = fopen($filePath, 'r');
          $file_data = fread($fp, filesize($filePath));
          fclose($fp);

          // $leaseProfileId = sanitize_text_field($_POST['leaseProfileId']);
          // $fileType = sanitize_text_field($_POST['fileType']);
          // $fileName = sanitize_text_field($_POST['fileName']);

          $mime_boundary=md5(time());
          $eol = "\r\n";
          $post_fields = '';
          $post_fields .= '------' . $mime_boundary . $eol;
          $post_fields .= 'Content-Disposition: form-data; name="Id"' . $eol.  $eol;
          $post_fields .= $userId . $eol;
          $post_fields .= "------" . $mime_boundary . $eol;

          $post_fields .= 'Content-Disposition: form-data; name="LeaseProfileId"' . $eol.  $eol;
          $post_fields .= $userId . $eol;
          $post_fields .= "------" . $mime_boundary . $eol;

          $post_fields .= 'Content-Disposition: form-data; name="FileType"' . $eol.  $eol;
          $post_fields .= $uploadedName . $eol;
          $post_fields .= "------" . $mime_boundary . $eol;

          $post_fields .= 'Content-Disposition: form-data; name="Files"; filename= "' . $_FILES['files']['name'] . '"' . $eol;
          $post_fields .= 'Content-Type: multipart/form-data' . $eol . $eol;
          $post_fields .= $file_data . $eol;
          $post_fields .= "------" . $mime_boundary . $eol; 

           

          $post_fields .= 'Content-Disposition: form-data; name="FileName"' . $eol.  $eol;
          $post_fields .= $_FILES['files']['name'] . $eol;
          $post_fields .= "------" . $mime_boundary . "--"; 

          $url = $this->six_storage_api_url . 'moveIn/identityDocumentFile/';

          $custom_headers=[
               'Authorization' => 'Bearer ' . $this->six_storage_access_token,
               'Content-Type' => 'multipart/form-data; boundary=----' . $mime_boundary,
               'accept' => 'application/json',
               'Content-Length' => strlen($post_fields),
               'Pragma' => 'no-cache',
               'Connection' => 'keep-alive',
               'Cache-Control' => 'no-cache',
               'Accept-Language' => 'en-US,en;q=0.9',
               'Accept-Encoding' => 'gzip, deflate, br'
          ];

          $isAjax = true;
          $response = wp_remote_post(esc_url_raw($url), array(  
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $custom_headers,
               'body'      => $post_fields
          ));

          if (is_wp_error($response)) {

               $error = [
                    'isSuccess' => false,
                    'returnMessage' => 'Something went wrong. Please contact support team. Hello1',
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.Hello2';
                         $response['returnMessage'] = $message;
                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.Hello3';
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }
     public function six_storage_saveTenantPhoto_MoveIn()
     { 
          $filePath = $_FILES["six_storage_profile_image"]["tmp_name"];
          $fp = fopen($filePath, 'r');
          $file_data = fread($fp, filesize($filePath));
          fclose($fp);

          $userId = sanitize_text_field($_POST['userId']);
          $fileName = sanitize_text_field($_POST['fileName']);
          $userLocationInformation = sanitize_text_field($_POST['log']);

          if ($userLocationInformation != "" || $userLocationInformation != null || !empty( $userLocationInformation)){
               $userLocationInformation = str_replace('\\', '', $userLocationInformation);
               $getdyip=$this->six_storage_getIpAddress();  /* Code to get dynamic IP */
               $userLocationInformation = json_decode($userLocationInformation);
               $userLocationInformation->ipAddress = $getdyip;
               $userLocationInformation = json_encode($userLocationInformation);
          }
          $isAjax = true;

          $url = $this->six_storage_api_url . 'user/profile/picture/' . $userId;

          $mime_boundary=md5(time());
          $eol = "\r\n";
          $post_fields = '';

           $post_fields .= '------' . $mime_boundary . $eol;
           $post_fields .= 'Content-Disposition: form-data; name="FileData"; filename= "' . $fileName . '"' . $eol;
           $post_fields .= 'Content-Type: image/png' . $eol . $eol;
           $post_fields .= $file_data . $eol;
           $post_fields .= "------" . $mime_boundary . $eol; 

           $post_fields .= 'Content-Disposition: form-data; name="logger"' . $eol.  $eol;
           $post_fields .= $userLocationInformation . $eol;
           $post_fields .= "------" . $mime_boundary . $eol; 

           $post_fields .= 'Content-Disposition: form-data; name="FileName"' . $eol.  $eol;
           $post_fields .= 'Test' . $eol;
           $post_fields .= "------" . $mime_boundary . "--"; 

          $custom_headers=[
               'Authorization' => 'Bearer ' . $this->six_storage_access_token,
               'Content-Type' => 'multipart/form-data; boundary=----' . $mime_boundary,
               'accept' => 'application/json',
               'Content-Length' => strlen($post_fields),
                 'Pragma' => 'no-cache',
                 'Connection' => 'keep-alive',
                 'Cache-Control' => 'no-cache',
                 'Accept-Language' => 'en-US,en;q=0.9',
                 'Accept-Encoding' => 'gzip, deflate, br'
          ];
          $isAjax = true;
          $response = wp_remote_post(esc_url_raw($url), array(  
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $custom_headers,
               'body'      => $post_fields
          ));
          
          if (is_wp_error($response)) {
              
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => 'Something went wrong. Please contact support team.',
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team';
                         $response['returnMessage'] = $message;
                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team';
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_removeTenantPhoto_MoveIn()
     {

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $userId = sanitize_text_field($_POST['userId']);

          $isAjax = true;

          $url = $this->six_storage_api_url . 'user/profile/picture/remove/' . $userId;

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'GET',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
          ));


          if (is_wp_error($response)) {
               $message = 'Something went wrong. Please contact support team.';
               $message = esc_html__($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' =>$message ,
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Vehicle information save failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;

                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }





     public function six_storage_uploadDocumentFiles()
     {

          $userId = sanitize_text_field($_POST['leaseProfileId']);
          
          $uploadedName =  sanitize_text_field($_POST['fileType']);

          $sixstorageuploadedFileName =  sanitize_text_field($_POST['fileName']);

          $filePath = $_FILES["files"]["tmp_name"];
          $fp = fopen($filePath, 'r');
          $file_data = fread($fp, filesize($filePath));
          fclose($fp);

          $mime_boundary=md5(time());
          $eol = "\r\n";
          $post_fields = '';
          $post_fields .= '------' . $mime_boundary . $eol;
          $post_fields .= 'Content-Disposition: form-data; name="Id"' . $eol.  $eol;
          $post_fields .= $userId . $eol;
          $post_fields .= "------" . $mime_boundary . $eol;

          $post_fields .= 'Content-Disposition: form-data; name="LeaseProfileId"' . $eol.  $eol;
          $post_fields .= $userId . $eol;
          $post_fields .= "------" . $mime_boundary . $eol;

          $post_fields .= 'Content-Disposition: form-data; name="FileType"' . $eol.  $eol;
          $post_fields .= $uploadedName . $eol;
          $post_fields .= "------" . $mime_boundary . $eol;

          $post_fields .= 'Content-Disposition: form-data; name="Files"; filename= "' . $sixstorageuploadedFileName . '"' . $eol;
          $post_fields .= 'Content-Type: multipart/form-data' . $eol . $eol;
          $post_fields .= $file_data . $eol;
          $post_fields .= "------" . $mime_boundary . $eol; 

           

          $post_fields .= 'Content-Disposition: form-data; name="FileName"' . $eol.  $eol;
          $post_fields .= $sixstorageuploadedFileName . $eol;
          $post_fields .= "------" . $mime_boundary . "--"; 


          $isAjax = true;

          $url = $this->six_storage_api_url . 'moveIn/identityDocumentFile/';

          $custom_headers=[
               'Authorization' => 'Bearer ' . $this->six_storage_access_token,
               'Content-Type' => 'multipart/form-data; boundary=----' . $mime_boundary,
               'accept' => 'application/json',
               'Content-Length' => strlen($post_fields),
               'Pragma' => 'no-cache',
               'Connection' => 'keep-alive',
               'Cache-Control' => 'no-cache',
               'Accept-Language' => 'en-US,en;q=0.9',
               'Accept-Encoding' => 'gzip, deflate, br'
          ];

          $request = array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $custom_headers,
               'body'      => $post_fields
          );

          $response = wp_remote_post(esc_url_raw($url), $request);

          if (is_wp_error($response)) {
               $error = [
                    'isSuccess' => false,
                    'returnMessage' => 'Something went wrong. Please contact support team.',
                    'returnCode' => ''
               ];

               if (isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
               }
          } else {
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                    if (isset($isAjax) && $isAjax == true) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Vehicle information save failed. Please contact support team.';
                         $response['returnMessage'] = $message;

                         wp_send_json(json_encode($response));
                         wp_die();
                    }
               } else {
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                    $error = [
                         'isSuccess' => false,
                         'returnMessage' => $message,
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

}
