<?php

namespace SixStorageOnline\Base;

class Six_Storage_DashboardController extends Six_Storage_BaseController
{

     public function Six_Storage_Dashboard_register()
     {
          add_action('wp_ajax_six_storage_get_user_info', [$this, 'six_storage_getUserInfo']);
          add_action('wp_ajax_nopriv_six_storage_get_user_info', [$this, 'six_storage_getUserInfo']);

          add_action('wp_ajax_six_storage_get_tenant_transaction_list', [$this, 'six_storage_getTenantTransactions']);
          add_action('wp_ajax_nopriv_six_storage_get_tenant_transaction_list', [$this, 'six_storage_getTenantTransactions']);

          add_action('wp_ajax_six_storage_get_tenant_transaction_statement', [$this, 'six_storage_sendStatement']);
          add_action('wp_ajax_nopriv_six_storage_get_tenant_transaction_statement', [$this, 'six_storage_sendStatement']);

          add_action('wp_ajax_six_storage_log_out', [$this, 'six_storage_logOut']);
          add_action('wp_ajax_nopriv_six_storage_log_out', [$this, 'six_storage_logOut']);

          add_action('wp_ajax_six_storage_update_profile', [$this, 'six_storage_updateProfile']);
          add_action('wp_ajax_nopriv_six_storage_update_profile', [$this, 'six_storage_updateProfile']);

          add_action('wp_ajax_six_storage_update_profile_password', [$this, 'six_storage_updatePassword']);
          add_action('wp_ajax_nopriv_six_storage_update_profile_password', [$this, 'six_storage_updatePassword']);

          add_action('wp_ajax_six_storage_get_rented_unts', [$this, 'six_storage_getRentedUnits']);
          add_action('wp_ajax_nopriv_six_storage_get_rented_unts', [$this, 'six_storage_getRentedUnits']);

          add_action('wp_ajax_six_storage_get_rented_agreement', [$this, 'six_storage_getRentedAgreement']);
          add_action('wp_ajax_nopriv_six_storage_get_rented_agreement', [$this, 'six_storage_getRentedAgreement']);

          add_action('wp_ajax_six_storage_get_buy_insurance', [$this, 'six_storage_buyInsurance']);
          add_action('wp_ajax_nopriv_six_storage_get_buy_insurance', [$this, 'six_storage_buyInsurance']);

          add_action('wp_ajax_six_storage_get_recall_details', [$this, 'six_storage_getRecallDetails']);
          add_action('wp_ajax_nopriv_six_storage_get_recall_details', [$this, 'six_storage_getRecallDetails']);

          add_action('wp_ajax_six_storage_save_recall_details', [$this, 'six_storage_saveRecallDetails']);
          add_action('wp_ajax_nopriv_six_storage_save_recall_details', [$this, 'six_storage_saveRecallDetails']);

          add_action('wp_ajax_six_storage_cancel_recall_details', [$this, 'six_storage_cancelRecallDetails']);
          add_action('wp_ajax_nopriv_six_storage_cancel_recall_details', [$this, 'six_storage_cancelRecallDetails']);

          add_action('wp_ajax_six_storage_save_scheduled_moveout_details', [$this, 'six_storage_saveScheduledMoveoutDetails']);
          add_action('wp_ajax_nopriv_six_storage_save_scheduled_moveout_details', [$this, 'six_storage_saveScheduledMoveoutDetails']);

          add_action('wp_ajax_six_storage_cancel_scheduled_moveout_details', [$this, 'six_storage_cancelScheduledMoveoutDetails']);
          add_action('wp_ajax_nopriv_six_storage_cancel_scheduled_moveout_details', [$this, 'six_storage_cancelScheduledMoveoutDetails']);

          add_action('wp_ajax_six_storage_user_payment_form', [$this, 'six_storage_getPaymentForm']);
          add_action('wp_ajax_nopriv_six_storage_user_payment_form', [$this, 'six_storage_getPaymentForm']);

          add_action('wp_ajax_six_storage_recall_apply_promocode', [$this, 'six_storage_applyRecallPromocode']);
          add_action('wp_ajax_nopriv_six_storage_recall_apply_promocode', [$this, 'six_storage_applyRecallPromocode']);

          add_action('wp_ajax_six_storage_get_tenant_invoice_list', [$this, 'six_storage_getTenantInvoices']);
          add_action('wp_ajax_nopriv_six_storage_get_tenant_invoice_list', [$this, 'six_storage_getTenantInvoices']);

          add_action('wp_ajax_six_storage_save_paymment_information', [$this, 'six_storage_savePaymentInformation']);
          add_action('wp_ajax_nopriv_six_storage_save_paymment_information', [$this, 'six_storage_savePaymentInformation']);

          add_action('wp_ajax_six_storage_get_client_culture', [$this, 'six_storage_getCultureInfo']);
          add_action('wp_ajax_nopriv_six_storage_get_client_culture', [$this, 'six_storage_getCultureInfo']);

          add_action('wp_ajax_six_storage_get_movein_field_settings', [$this, 'six_storage_getMoveinFieldsSettings']);
          add_action('wp_ajax_nopriv_six_storage_get_movein_field_settings', [$this, 'six_storage_getMoveinFieldsSettings']);

          add_action('wp_ajax_six_storage_add_credit_card_form', [$this, 'six_storage_loadAddCreditCardForm']);
          add_action('wp_ajax_nopriv_six_storage_add_credit_card_form', [$this, 'six_storage_loadAddCreditCardForm']);

          add_action('wp_ajax_six_storage_get_credit_card_list', [$this, 'six_storage_gateCreditCardsList']);
          add_action('wp_ajax_nopriv_six_storage_get_credit_card_list', [$this, 'six_storage_gateCreditCardsList']);

          add_action('wp_ajax_six_storage_get_iban_detail_list', [$this, 'six_storage_getIbanDetailList']);
          add_action('wp_ajax_nopriv_six_storage_get_iban_detail_list', [$this, 'six_storage_getIbanDetailList']);

          add_action('wp_ajax_six_storage_delete_credit_card', [$this, 'six_storage_deleteCreditCard']);
          add_action('wp_ajax_nopriv_six_storage_delete_credit_card', [$this, 'six_storage_deleteCreditCard']);

          add_action('wp_ajax_six_storage_default_credit_card', [$this, 'six_storage_defaultCreditCard']);
          add_action('wp_ajax_nopriv_six_storage_default_credit_card', [$this, 'six_storage_defaultCreditCard']);

          add_action('wp_ajax_six_storage_change_autopay_status', [$this, 'six_storage_changeAutopayStatus']);
          add_action('wp_ajax_nopriv_six_storage_change_autopay_status', [$this, 'six_storage_changeAutopayStatus']);

          add_action('wp_ajax_six_storage_get_user_documents', [$this, 'six_storage_getUserDocuments']);
          add_action('wp_ajax_nopriv_six_storage_get_user_documents', [$this, 'six_storage_getUserDocuments']);

          add_action('wp_ajax_six_storage_get_Insurance_Unit_TenantDetails', [$this, 'six_storage_getInsuranceUnitTenantDetails']);
          add_action('wp_ajax_nopriv_six_storage_get_Insurance_Unit_TenantDetails', [$this, 'six_storage_getInsuranceUnitTenantDetails']);

          add_action('wp_ajax_six_storage_post_user_documents', [$this, 'six_storage_postUserDocument']);
          add_action('wp_ajax_nopriv_six_storage_post_user_documents', [$this, 'six_storage_postUserDocument']);

          add_action('wp_ajax_six_storage_add_user_card', [$this, 'six_storage_addUserCard']);
          add_action('wp_ajax_nopriv_six_storage_add_user_card', [$this, 'six_storage_addUserCard']);

          add_action('wp_ajax_six_storage_post_save_tenant_photo', [$this, 'six_storage_saveTenantPhoto']);
          add_action('wp_ajax_nopriv_six_storage_post_save_tenant_photo', [$this, 'six_storage_saveTenantPhoto']);
          
          add_action('wp_ajax_six_storage_remove_tenant_photo', [$this, 'six_storage_removeTenantPhoto']);
          add_action('wp_ajax_nopriv_six_storage_remove_tenant_photo', [$this, 'six_storage_removeTenantPhoto']);

          // add_action('wp_ajax_six_storage_get_client_config', [$this, 'six_storage_getConfiguration']);
          // add_action('wp_ajax_nopriv_six_storage_get_client_config', [$this, 'six_storage_getConfiguration']);

          add_action('wp_ajax_six_storage_get_client_auth_details', [$this, 'six_storage_getTenatAuthDetail']);
          add_action('wp_ajax_nopriv_six_storage_get_client_auth_details', [$this, 'six_storage_getTenatAuthDetail']);

          add_action('wp_ajax_six_storage_update_buy_insurance', [$this, 'six_storage_updateBuyInsurance']);
          add_action('wp_ajax_nopriv_six_storage_update_buy_insurance', [$this, 'six_storage_updateBuyInsurance']);

          add_action('wp_ajax_six_storage_change_plan_buying_insurance', [$this, 'six_storage_changeplanbuyinginsurance']);
          add_action('wp_ajax_nopriv_six_storage_change_plan_buying_insurance', [$this, 'six_storage_changeplanbuyinginsurance']);

          add_action('wp_ajax_six_storage_get_buyed_insurance', [$this, 'six_storage_getBuyedInsurance']);
          add_action('wp_ajax_nopriv_six_storage_get_buyed_insurance', [$this, 'six_storage_getBuyedInsurance']);

          add_action('wp_ajax_six_storage_get_total_lease_balance', [$this, 'six_storage_get_total_leasebalance']);
          add_action('wp_ajax_nopriv_six_storage_get_total_lease_balance', [$this, 'six_storage_get_total_leasebalance']);

          add_shortcode('six_storage_online_dashboard', [$this, 'six_storage_dashboardForm']);

          // add_filter('walker_nav_menu_start_el',  [$this, 'six_storage_nav_replace_login_to_dashboard'], 1000, 2);
     }

     function six_storage_nav_replace_login_to_dashboard($item_output, $item)
     {
          if ($item->title == 'Login' ||  strpos($item->url, 'sign-in') != false) {

               if (is_page('Dashboard')) {
                    $plugin_output_html = '<a href="javascript:void(0)"  class="six-storage-text-center user-action-dd six-storage-rounded-circle 
                    six-storage-grid-d-inline-block six-storage-grid-ml-auto six-storage-grid-d-flex six-storage-align-items-center six-storage-justify-content-center six-storage-dropdown-trigger" data-target="six-storage-profile-dropdown" >
             <i class="six-storage-material-icons six-storage-color-inherit six-storage-small">account_circle</i>
             <i class="six-storage-material-icons six-storage-color-inherit">keyboard_arrow_down</i>
         </a>
         <ul id="six-storage-profile-dropdown" class="six-storage-white six-storage-dropdown-content cc">
         <li class="six-storage-grid-p0 cc" id="six-storage-select-options-user">
               <a href="javascript:void(0)" class="six-storage-grey-text six-storage-text-darken-2 six-storage-border-none six-storage-text-decoration-none six-storage-text-capitalize six-storage-grid-p15 six-storage-font-weight-400">
                    <i class="six-storage-material-icons six-storage-grey-text six-storage-text-darken-1 six-storage-text-decoration-none">person_outline</i>
                    <span id="six-storage-user-name"></span>
               </a>
         </li>
         <li class="six-storage-divider six-storage-grid-p0 cc"></li>
         <li  class="six-storage-grid-p0 cc" id="six-storage-select-options-dashboard">
             <a href="javascript:void(0)" class="six-storage-grey-text six-storage-text-darken-2 six-storage-border-none six-storage-text-decoration-none six-storage-text-capitalize six-storage-grid-p15 six-storage-font-weight-400" onclick="return sixStorageToggleNavigation(\'dashboard\');">
                 <i class="six-storage-material-icons six-storage-grey-text six-storage-text-darken-1 six-storage-text-decoration-none">dashboard</i>
                 Dashboard
             </a>
         </li>
         <li  class="six-storage-grid-p0 cc" id="six-storage-select-options-profile">
             <a href="javascript:void(0)" class="six-storage-grey-text six-storage-text-darken-2 six-storage-border-none six-storage-text-decoration-none six-storage-text-capitalize six-storage-grid-p15 six-storage-font-weight-400" onclick="return sixStorageToggleNavigation(\'profile\');">
                 <i class="six-storage-material-icons six-storage-grey-text six-storage-text-darken-1 six-storage-text-decoration-none">perm_identity</i>
                 Profile
             </a>
         </li>
         <li  class="six-storage-grid-p0 cc" id="six-storage-select-options-password">
             <a class="six-storage-modal-trigger six-storage-grey-text six-storage-text-darken-2 six-storage-border-none six-storage-text-decoration-none six-storage-text-capitalize six-storage-grid-p15 six-storage-font-weight-400" href="javascript:void(0)" onclick="return sixStorageOpenPasswordModel();">
                 <i class="six-storage-material-icons six-storage-grey-text six-storage-text-darken-1 six-storage-text-decoration-none ">visibility</i>
                 Password
             </a>
         </li>
         <li class="six-storage-divider cc six-storage-grid-p0"></li>
         <li  class="six-storage-grid-p0 cc" id="six-storage-select-options-logout">
             <a href="javascript:void(0)" class="six-storage-grey-text six-storage-text-darken-2 six-storage-border-none six-storage-text-decoration-none six-storage-text-capitalize six-storage-grid-p15 six-storage-font-weight-400" id="six-storage-log-out-btn">
                 <i class="six-storage-material-icons six-storage-grey-text six-storage-text-darken-1 six-storage-text-decoration-none">power_settings_new</i>Log Out
             </a>
         </li>
     </ul>';
                    return $plugin_output_html;
               }
          }
          return $item_output;
     }

     public function six_storage_getConfiguration()
     {
          $isAjax = true;
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
               $_SESSION[$table_prefix ."clientConfig"] = json_decode($response['body'], true);
               $response = json_decode($response['body'], true);
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                $six_storage_online_fc_group_the_unit_based_on_size_toggle = $Obj->six_storage_online_fc_group_the_unit_based_on_size_toggle;
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
                         $_SESSION[$table_prefix ."clientConfig"] = json_decode($response['body'], true);
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
                         $_SESSION[$table_prefix ."clientConfig"] = json_decode($response['body'], true);
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_getBuyedInsurance(){
          $userId = sanitize_text_field($_POST['userId']);

          $isAjax = true;

          $url = $this->six_storage_api_url2 . 'Insurance/GetTenantInsuranceDetails';

          $response = wp_remote_request(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      =>  json_encode([
                    'tenantId' => $userId,
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

     public function six_storage_get_total_leasebalance(){
          global $wpdb;
          $table_prefix = $wpdb->prefix;  
          session_start();
          $six_storage_sessionObject = $_SESSION[$table_prefix ."six_storage_sessionObject"];
          $userId = $six_storage_sessionObject['result']["userId"];

          $isAjax = true;

          $url = $this->six_storage_api_url2 . 'lease/leasebalance/' . $userId;

          $response = wp_remote_request(esc_url_raw($url), array(
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
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_changeplanbuyinginsurance(){
          $insurancePremiumId = sanitize_text_field($_POST['insurancePremiumId']);
          $contractId = sanitize_text_field($_POST['contractId']);
          $unitId = sanitize_text_field($_POST['unitId']);
          $userId = sanitize_text_field($_POST['tenantId']);

          $isAjax = true;

          $url = $this->six_storage_api_url2 . 'Insurance/ChangePlanBuyingInsurance';

          $response = wp_remote_request(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      =>  json_encode([
                    'insurancePremiumId' =>$insurancePremiumId,
                    'contractId' => $contractId,
                    'unitId' => $unitId,
                    'tenantId' =>$userId,
                    
                    
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

     public function six_storage_updateBuyInsurance(){

          $invoiceIds = sanitize_text_field($_POST['insuranceDetails']);

          // $invoiceIds = urldecode($invoiceIds);
          $invoiceIds = str_replace('\"', '"', $invoiceIds);

          $isAjax = true;

          $url = $this->six_storage_api_url2 . 'Insurance/UpdateBuyingInsuranceDetails';

          $response = wp_remote_request(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      =>  $invoiceIds
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
          $response = $_SESSION[$table_prefix ."six_storage_sessionObject"];

          wp_send_json(json_encode($response));
          wp_die();
     }

     public function six_storage_getCultureInfo()
     {
          $response = get_option("six_storage_online_api_culture");
          wp_send_json($response);
     }

     public function six_storage_savePaymentInformation()
     {

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $invoiceIds = sanitize_text_field($_POST['invoiceIds']);
          $invoiceIds = str_replace('\\', '', $invoiceIds);
          $userId = sanitize_text_field($_POST['userId']);
          $paidAmount = sanitize_text_field($_POST['paidAmount']);
          $paymentRefNumber = sanitize_text_field($_POST['paymentRefNumber']);
          $userLocationInformation = sanitize_text_field($_POST['log']);
          $paymentTransactionResponse = sanitize_text_field($_POST['paymentTransactionResponse']);
          $paymentType = sanitize_text_field($_POST['paymentType']);
          if($paymentType == 'null' || $paymentType == ''){
               $paymentType = 'CreditCard';
          }

          if ($userLocationInformation != "" || $userLocationInformation != null || !empty( $userLocationInformation)){
               $userLocationInformation = str_replace('\\', '', $userLocationInformation);
               $getdyip=$this->six_storage_getIpAddress();  /* Code to get dynamic IP */
               $userLocationInformation = json_decode($userLocationInformation);
               $userLocationInformation->ipAddress = $getdyip;
               $userLocationInformation = json_encode($userLocationInformation);
          }    
          $paymentTransactionResponse = str_replace('\\', '', $paymentTransactionResponse);
          $isAjax = true;

          $url = $this->six_storage_api_url . 'unit/payment/' . $userId;

     

          $response = wp_remote_request(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'leaseInvoices' => json_decode($invoiceIds),
                    'totalPayment' => $paidAmount,
                    'paymentRefNumber' => $paymentRefNumber,
                    'paymentType' => $paymentType,
                    'logger' => json_decode($userLocationInformation),
                    'paymentTransactionResponse' => json_decode($paymentTransactionResponse)
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

     public function six_storage_getInsuranceUnitTenantDetails(){

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $planId = sanitize_text_field($_POST['planId']);
          $unitId = sanitize_text_field($_POST['unitId']);
          $userId = sanitize_text_field($_POST['tenantId']);
          $contractId = sanitize_text_field($_POST['contractId']);
          $isAjax = true;   
          $url = $this->six_storage_api_url2 . 'Insurance/GetInsuranceUnitTenantDetails';
     
          $response = wp_remote_request(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    "planId"=> $planId,
                    "unitId"=> $unitId,
                    "tenantId"=> $userId,
                    "contractId"=> $contractId,
     
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
        
     public function six_storage_buyInsurance(){

     $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
     $userId = sanitize_text_field($_POST['userId']);
     $six_storage_locationId = sanitize_text_field($_POST['locationId']);
     $isAjax = true;   
     $url = $this->six_storage_api_url2 . 'Insurance/GetInsurancePlans';

          $response = wp_remote_request(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    "companyId" => null,
                    "locationId"=>$six_storage_locationId,
                    "storageTypeId"=> null
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
     public function six_storage_getTenantInvoices()
     {

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $userId = sanitize_text_field($_POST['userId']);
          // $pageNumber = sanitize_text_field($_POST['pageNumber']);
          // $PageSize = sanitize_text_field($_POST['pageSize']);

          $isAjax = true;

         // $url = $this->six_storage_api_url . 'unit/invoice/' . $userId.'?PageNumber='.$pageNumber.'&PageSize='.$PageSize  ;
         $url = $this->six_storage_api_url . 'unit/invoice/' . $userId;
          $response = wp_remote_request(esc_url_raw($url), array(
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
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_sendStatement()
     {

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $userId = sanitize_text_field($_POST['userId']);
          $userLocationInformation = sanitize_text_field($_POST['log']);

          if ($userLocationInformation != "" || $userLocationInformation != null || !empty( $userLocationInformation)){
               $userLocationInformation = str_replace('\\', '', $userLocationInformation);
               $getdyip=$this->six_storage_getIpAddress();  /* Code to get dynamic IP */
               $userLocationInformation = json_decode($userLocationInformation);
               $userLocationInformation->ipAddress = $getdyip;
               $userLocationInformation = json_encode($userLocationInformation);
          }
          $isAjax = true;

          $url = $this->six_storage_api_url . 'user/statement/' . $userId;

          $response = wp_remote_request(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
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

     public function six_storage_getUserInfo()
     {
          global $wpdb;
          $table_prefix = $wpdb->prefix;
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

                    if (array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' && $response['returnMessage'] == "SUCCESS") {
                         $_SESSION[$table_prefix . 'userid'] = $response['result']['userId'];
                    }

                    if (array_key_exists('result', $response)) {
                         $this->signIn = $response['result'];
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

     public function six_storage_getTenantTransactions()
     {

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $userId = sanitize_text_field($_POST['userId']);
          // $pageNumber = sanitize_text_field($_POST['pageNumber']);
          // $PageSize = sanitize_text_field($_POST['pageSize']);

          $isAjax = true;

          //$url = $this->six_storage_api_url . 'user/transaction/' . $userId.'?PageNumber='.$pageNumber.'&PageSize='.$PageSize;
          $url = $this->six_storage_api_url . 'user/transaction/' . $userId;
          $response = wp_remote_request(esc_url_raw($url), array(
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

               if(is_array($response['result']) == false){
                    $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? 				$response['returnMessage'] : 'Something went wrong. Please contact support team.';
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
               }else{
                    for($i=0; $i < count($response['result']); $i++){
                         $transactionDescription = $response['result'][$i]['description'];
                         $rest = explode("^",$transactionDescription);
                         $translated_arr = array();
                         foreach($rest as $val){
                              $translated_arr[] = __(trim($val),'6storage-online');
                         }
                         $translatedText = join(" ",$translated_arr);
                         $response['result'][$i]['description'] = $translatedText;
               
                         //Category Translation
               
                         $transactionCategory = $response['result'][$i]['category'];
                         $restCateg = explode("^",$transactionCategory);
                         $translated_array = array();
                         foreach($restCateg as $value){
                              $translated_array[] = __(trim($value),'6storage-online');
                         }
                         $translatedCatText = join(" ",$translated_array);
                         $response['result'][$i]['category'] = $translatedCatText;
                    }
               }
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
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_applyRecallPromocode()
     {

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $couponCode = sanitize_text_field($_POST['couponCode']);
          $userId = sanitize_text_field($_POST['userId']);
          $leaseId = sanitize_text_field($_POST['leaseId']);
          $transportationId = sanitize_text_field($_POST['transportationId']);

          if ($leaseId == 'null' || $leaseId == '') {
               $leaseId = 0;
          }

          $isAjax = true;

          $url = $this->six_storage_api_url . 'recall/promoCode/' . $leaseId . '/' . $transportationId . '/' . $couponCode;

          $response = wp_remote_request(esc_url_raw($url), array(
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

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());
          $tenantId = sanitize_text_field($_POST['tenantId']);
          $invoiceIds = sanitize_text_field($_POST['invoiceIds']);
          $invoiceIds = str_replace('\\', '', $invoiceIds);
          $chargeableAmount = sanitize_text_field($_POST['chargeableAmount']);
          $hostURL = sanitize_text_field($_POST['hostURL']);
          $PaymentModeId = sanitize_text_field( $_POST['paymentModeId']);
          $paymentgateway = sanitize_text_field($_POST['paymentgateway']);
         

          if($paymentgateway === "PAYA"){
               $url = $this->six_storage_api_url2 . 'user/paymentform/' . $tenantId;
          }else{
               $url = $this->six_storage_api_url . 'user/paymentform/' . $tenantId;
          }
          
          $PayloadObject = sanitize_text_field($_POST['PayloadObject']);
          $PayloadObject = str_replace('\\', '', $PayloadObject);
     
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

          $bodyRequest = '';
 
          if($PaymentModeId !== '' && $PaymentModeId !== null){
          $bodyRequest = json_encode([
                         'chargeableAmount' => $chargeableAmount,
                         'leaseInvoices' => json_decode($invoiceIds),
                         'hostURL' => $hostURL,
                         'language' => $sixStoragelanguageCode,
                         'transactionCallback' => $p24responsePage,
                         'paymentModeId' => $PaymentModeId
                    ]);
          } else {
          $bodyRequest = json_encode([
                         'chargeableAmount' => $chargeableAmount,
                         'hostURL' => $hostURL,
                         'language' => $sixStoragelanguageCode,
                         'transactionCallback' => $p24responsePage,
                         'callPlace' => "PAYNOW",
                         'PayloadObject'=> $PayloadObject
                    ]);
          }

          $isAjax = true;
          $response = wp_remote_get($url, array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => $bodyRequest
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

     public function six_storage_cancelRecallDetails()
     {

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $leaseId = sanitize_text_field($_POST['leaseId']);
          $userId = sanitize_text_field($_POST['userId']);

          if ($leaseId == 'null' || $leaseId == '') {
               $leaseId = 0;
          }

          $isAjax = true;

          $url = $this->six_storage_api_url . 'recall/cancel/' . $leaseId . '/' . $userId;

          $response = wp_remote_request(esc_url_raw($url), array(
               'method'    => 'POST',
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
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_cancelScheduledMoveoutDetails()
     {

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $leaseId = sanitize_text_field($_POST['leaseId']);
          $userId = sanitize_text_field($_POST['userId']);
          $userLocationInformation = sanitize_text_field($_POST['log']);
          $unitNumber = sanitize_text_field($_POST['unitNumber']);

          if ($userLocationInformation != "" || $userLocationInformation != null || !empty( $userLocationInformation)){
               $userLocationInformation = str_replace('\\', '', $userLocationInformation);
               $getdyip=$this->six_storage_getIpAddress();  /* Code to get dynamic IP */
               $userLocationInformation = json_decode($userLocationInformation);
               $userLocationInformation->ipAddress = $getdyip;
               $userLocationInformation = json_encode($userLocationInformation);
          }

          if ($leaseId == 'null' || $leaseId == '') {
               $leaseId = 0;
          }

          $isAjax = true;

          $url = $this->six_storage_api_url . 'moveOut/cancel/' . $leaseId . '/' . $userId;

          $response = wp_remote_request(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'logger' => json_decode($userLocationInformation),
                    'unitNumber' => $unitNumber
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

     public function six_storage_saveScheduledMoveoutDetails()
     {

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $leaseId = sanitize_text_field($_POST['leaseId']);
          $userId = sanitize_text_field($_POST['userId']);
          $scheduleDate = sanitize_text_field($_POST['scheduleDate']);
          $reason = sanitize_text_field($_POST['reason']);
          $unitNumber = sanitize_text_field($_POST['unitNumber']);
          $userLocationInformation = sanitize_text_field($_POST['log']);

          if ($userLocationInformation != "" || $userLocationInformation != null || !empty( $userLocationInformation)){
               $userLocationInformation = str_replace('\\', '', $userLocationInformation);
               $getdyip=$this->six_storage_getIpAddress();  /* Code to get dynamic IP */
               $userLocationInformation = json_decode($userLocationInformation);
               $userLocationInformation->ipAddress = $getdyip;
               $userLocationInformation = json_encode($userLocationInformation);
          }


          if ($leaseId == 'null' || $leaseId == '') {
               $leaseId = 0;
          }

          if ($scheduleDate == 'null') {
               $scheduleDate = date('Y-m-d');
          } else {
               $scheduleDate = date('Y-m-d', strtotime($scheduleDate));
          }

          $isAjax = true;

          $url = $this->six_storage_api_url . 'moveOut/scheduleMoveOut/' . $leaseId;

          $response = wp_remote_request(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'tenantId' => $userId,
                    'scheduleDate' => $scheduleDate,
                    'reason' => $reason,
                    'logger' => json_decode($userLocationInformation),
                    'unitNumber' => $unitNumber
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

     public function six_storage_saveRecallDetails()
     {

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $leaseId = sanitize_text_field($_POST['leaseId']);
          $userId = sanitize_text_field($_POST['userId']);
          $palletAccessInfoId = sanitize_text_field($_POST['palletAccessInfoId']);
          $recallDate = sanitize_text_field($_POST['recallDate']);
          $promoCodeId = sanitize_text_field($_POST['promoCodeId']);
          $price = sanitize_text_field($_POST['price']);
          $price = str_replace('\\', '', $price);
          $scheduleDate = sanitize_text_field($_POST['scheduleDate']);
          $isScheduledMoveout = sanitize_text_field($_POST['isScheduledMoveout']);

          if ($leaseId == 'null' || $leaseId == '') {
               $leaseId = 0;
          }

          if ($recallDate == 'null') {
               $recallDate = date('Y-m-d');
          } else {
               $recallDate = date('Y-m-d', strtotime($recallDate));
          }

          if ($promoCodeId == 'null') {
               $promoCodeId = null;
          }

          $isAjax = true;

          $url = $this->six_storage_api_url . 'recall/' . $leaseId;
          if ($scheduleDate !== 'undefined' && $scheduleDate != 'null' && $scheduleDate != "" && ($isScheduledMoveout === true || $isScheduledMoveout === 'true')) {
               $url = $this->six_storage_api_url . 'recall/scheduleMoveOut/' . $leaseId;
               $scheduleDate = date('Y-m-d', strtotime($scheduleDate));
          }
          $response = wp_remote_request(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'tenantId' => $userId,
                    'palletAccessInfoId' => $palletAccessInfoId,
                    'recallDate' => $recallDate,
                    'price' => json_decode($price),
                    'scheduleDate' => $scheduleDate,
                    'promoCodeText' => $promoCodeId
               ])
          ));
          if (is_wp_error($response)) {
               update_option('six_storage_online_api_error', $url . ' : Request => ' . json_encode([
                    'tenantId' => $userId,
                    'palletAccessInfoId' => $palletAccessInfoId,
                    'recallDate' => $recallDate,
                    'price' => json_decode($price),
                    'scheduleDate' => $scheduleDate,
                    'promoCodeText' => $promoCodeId
               ]) . 'Response => ' . json_encode($response), true);
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
               if (isset($isAjax) && $isAjax == true) {
                    if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                         $message = esc_html__($message,'6storage-rentals');
                         $response['returnMessage'] = $message;
                         wp_send_json(json_encode($response));
                         wp_die();
                    } else {
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

     public function six_storage_getRecallDetails()
     {

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $leaseId = sanitize_text_field($_POST['leaseId']);
          if ($leaseId == 'null' || $leaseId == '') {
               $leaseId = 0;
          }

          $isAjax = true;

          $url = $this->six_storage_api_url . 'recall/' . $leaseId;


          $response = wp_remote_request(esc_url_raw($url), array(
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
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_getRentedUnits()
     {
          global $wpdb;
          $table_prefix = $wpdb->prefix;     

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          session_start();

          $six_storage_sessionObject = $_SESSION[$table_prefix ."six_storage_sessionObject"];
          $pageNumber = sanitize_text_field($_POST['pageNumber']);
          $PageSize = sanitize_text_field($_POST['pageSize']);

          $userId = $six_storage_sessionObject['result']["userId"];
          if($userId == null || $userId == ''){

             
                
               $message = 'Something went wrong. Please contact support team.';
               $message = __($message,'6storage-rentals');
               $error = [
                    'isSuccess' => false,
                    'returnMessage' =>$message ,
                    'returnCode' => 'invalid username'
               ];

              
                   
                    wp_send_json(json_encode($error));
                    wp_die();
               

              
          }

          $rentalsearch = sanitize_text_field($_POST['rentalsearch']);
          if ($rentalsearch == 'null' || $rentalsearch == '') {
               $rentalsearch = null;
          }

          $isAjax = true;

          $url = $this->six_storage_api_url . 'movein/lease/' . $userId;

          $response = wp_remote_request($url, array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'searchText' => $rentalsearch,
                    'pageNumber' => $pageNumber,
                    'pageSize' => $PageSize,

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
     public function six_storage_getRentedAgreement()
     {
          global $wpdb;
          $table_prefix = $wpdb->prefix;     

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          session_start();

          $six_storage_sessionObject = $_SESSION[$table_prefix ."six_storage_sessionObject"];

          $userId = $six_storage_sessionObject['result']["userId"];

          $contractId = sanitize_text_field($_POST['contractId']);
          if ($contractId == 'null' || $contractId == '') {
               $contractId = null;
          }

          $isAjax = true;

          $url = $this->six_storage_api_url . 'movein/lease/documents/' . $userId;

          $response = wp_remote_request(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'contractId' => $contractId
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
     public function six_storage_logOut()
     {
          global $wpdb;
          $table_prefix = $wpdb->prefix;
          session_start();
          $userId = sanitize_text_field($_POST['userId']);
          $userLocationInformation = sanitize_text_field($_POST['log']);

          if ($userLocationInformation != "" || $userLocationInformation != null || !empty( $userLocationInformation)){
               $userLocationInformation = str_replace('\\', '', $userLocationInformation);
               $getdyip=$this->six_storage_getIpAddress();  /* Code to get dynamic IP */
               $userLocationInformation = json_decode($userLocationInformation);
               $userLocationInformation->ipAddress = $getdyip;
               $userLocationInformation = json_encode($userLocationInformation);
          }
          $isAjax = true;

          $url = $this->six_storage_api_url . 'user/logout';

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'userId' => $userId,
                    'logger' => json_decode($userLocationInformation)
               ])
          ));
          unset($_SESSION[$table_prefix . 'six_storage_sessionObject']);
          if (is_wp_error($response)) {
               $response = [
                    'isSuccess' => false,
                    'returnMessage' => 'Something went wrong. Please contact support team.',
                    'returnCode' => ""
               ];
               wp_send_json(json_encode($response));
               wp_die();
          }
          else{
               $_SESSION[$table_prefix . 'userid'] = '';
               $response = [
                    'isSuccess' => true,
                    'returnMessage' => "",
                    'returnCode' => ""
               ];
               wp_send_json(json_encode($response));
               wp_die();
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


     public function six_storage_updatePassword()
     {

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $currentPassword = sanitize_text_field($_POST['currentPassword']);
          $newPassword = sanitize_text_field($_POST['newPassword']);
          $confirmNewPassword = sanitize_text_field($_POST['confirmNewPassword']);
          $token = sanitize_text_field($_POST['token']);
          $userId = sanitize_text_field($_POST['userId']);
          $userLocationInformation = sanitize_text_field($_POST['log']);

          if ($userLocationInformation != "" || $userLocationInformation != null || !empty( $userLocationInformation)){
               $userLocationInformation = str_replace('\\', '', $userLocationInformation);
               $getdyip=$this->six_storage_getIpAddress();  /* Code to get dynamic IP */
               $userLocationInformation = json_decode($userLocationInformation);
               $userLocationInformation->ipAddress = $getdyip;
               $userLocationInformation = json_encode($userLocationInformation);
          }
          $isAjax = true;

          $url = $this->six_storage_api_url . 'user/password/' . $userId . '/update';

          $response = wp_remote_request(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'currentPassword' => $currentPassword,
                    'newPassword' => $newPassword,
                    'conformNewPassword' => $confirmNewPassword,
                    'token' => $token,
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
               $beforetransReturnMsg = $response['returnMessage'];
               
               if($beforetransReturnMsg === "New Password must contain atleast a special character, lowercase, uppercase and a number and length must be 8 to 12 characters."){
                    $beforetransReturnMsg = "New Password must contain atleast a lowercase, uppercase and a number and length must be 8 to 12 characters.";
               }

               $aftertransReturnMsg = esc_html__(trim($beforetransReturnMsg),'6storage-rentals');
               $response['returnMessage'] = $aftertransReturnMsg;
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
                         'returnCode' => ""
                    ];

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
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

     public function six_storage_loadAddCreditCardForm()
     {

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $userId = sanitize_text_field($_POST['userId']);
          $platform = "WEB";
          $hostURL = sanitize_text_field($_POST['hostURL']);
          $userLocationInformation = sanitize_text_field($_POST['log']);
          $paymentModeId = sanitize_text_field($_POST['paymentModeId']);

          if ($userLocationInformation != "" || $userLocationInformation != null || !empty( $userLocationInformation)){
               $userLocationInformation = str_replace('\\', '', $userLocationInformation);
               $getdyip=$this->six_storage_getIpAddress();  /* Code to get dynamic IP */
               $userLocationInformation = json_decode($userLocationInformation);
               $userLocationInformation->ipAddress = $getdyip;
               $userLocationInformation = json_encode($userLocationInformation);
          }
          $isAjax = true;

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

          $url = $this->six_storage_api_url . 'cards/add/form/' . $userId;

          $response = wp_remote_get($url, array(
               'method' => 'POST',
               'timeout' => 45,
               'headers' => $this->six_storage_http_header,
               'body'      => json_encode([
                    'hostURL' => $hostURL,
                    'platform' => $platform,
                    'logger' => json_decode($userLocationInformation),
                    'paymentModeId' => $paymentModeId,
                    'language' => $sixStoragelanguageCode,
                    'transactionCallback' => $p24responsePage
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

     public function six_storage_getUserDocuments()
     {

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $userId = sanitize_text_field($_POST['userId']);
          $isAjax = true;

          $url = $this->six_storage_api_url . 'user/documents/' . $userId;

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

     public function six_storage_postUserDocument()
     {
          $userId = sanitize_text_field($_POST['userId']);
          
          $uploadedName =  sanitize_text_field($_POST['documentName']);

          $uploadedFileName =  sanitize_text_field($_POST['documentFileName']);

          $filePath = $_FILES["documentFile"]["tmp_name"];
          $fp = fopen($filePath, 'r');
          $file_data = fread($fp, filesize($filePath));
          fclose($fp);

          $mime_boundary=md5(time());
          $eol = "\r\n";
          $post_fields = '';
          $post_fields .= '------' . $mime_boundary . $eol;
          $post_fields .= 'Content-Disposition: form-data; name="FileData"; filename= "' . $uploadedFileName . '"' . $eol;
          $post_fields .= 'Content-Type: multipart/form-data' . $eol . $eol;
          $post_fields .= $file_data . $eol;
          $post_fields .= "------" . $mime_boundary . $eol; 

          $post_fields .= 'Content-Disposition: form-data; name="logger"' . $eol.  $eol;
          $post_fields .= $userLocationInformation . $eol;
          $post_fields .= "------" . $mime_boundary . $eol; 

          $post_fields .= 'Content-Disposition: form-data; name="FileName"' . $eol.  $eol;
          $post_fields .= $uploadedName . $eol;
          $post_fields .= "------" . $mime_boundary . "--"; 

          $isAjax = true;

          $url = $this->six_storage_api_url . 'user/documents/' . $userId;

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
     
     public function six_storage_gateCreditCardsList()
     {

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $userId = sanitize_text_field($_POST['userId']);
          $isAjax = true;

          $url = $this->six_storage_api_url . 'cards/details/' . $userId;

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

     public function six_storage_getIbanDetailList()
     {

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $userId = sanitize_text_field($_POST['userId']);
          $isAjax = true;

          $url = $this->six_storage_api_url . 'cards/ach-details/' . $userId;

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

     public function six_storage_deleteCreditCard()
     {

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $userId = sanitize_text_field($_POST['userId']);
          $cardId = sanitize_text_field($_POST['cardId']);
          $cardNumber = sanitize_text_field($_POST['cardNumber']);
          $paymentModeId = sanitize_text_field($_POST['paymentModeId']);
          $userLocationInformation = sanitize_text_field($_POST['log']);

          if ($userLocationInformation != "" || $userLocationInformation != null || !empty( $userLocationInformation)){
               $userLocationInformation = str_replace('\\', '', $userLocationInformation);
               $getdyip=$this->six_storage_getIpAddress();  /* Code to get dynamic IP */
               $userLocationInformation = json_decode($userLocationInformation);
               $userLocationInformation->ipAddress = $getdyip;
               $userLocationInformation = json_encode($userLocationInformation);
          }
          $isAjax = true;

          $url = $this->six_storage_api_url . 'cards/delete/' . $userId . '/' . $cardId;

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'cardLastFour' =>$cardNumber,
                    'paymentModeId' => $paymentModeId,
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

     public function six_storage_defaultCreditCard()
     {

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $userId = sanitize_text_field($_POST['userId']);
          $cardId = sanitize_text_field($_POST['cardId']);
          $cardLastFour = sanitize_text_field($_POST['cardLastFour']);
          $paymentModeId = sanitize_text_field($_POST['paymentModeId']);
          $userLocationInformation = sanitize_text_field($_POST['log']);

          if ($userLocationInformation != "" || $userLocationInformation != null || !empty( $userLocationInformation)){
               $userLocationInformation = str_replace('\\', '', $userLocationInformation);
               $getdyip=$this->six_storage_getIpAddress();  /* Code to get dynamic IP */
               $userLocationInformation = json_decode($userLocationInformation);
               $userLocationInformation->ipAddress = $getdyip;
               $userLocationInformation = json_encode($userLocationInformation);
          }
          $isAjax = true;

          $url = $this->six_storage_api_url . 'cards/makedefault/' . $userId . '/' . $cardId;

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'cardLastFour' => $cardLastFour,
                    'paymentModeId' => $paymentModeId,
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

     public function six_storage_changeAutopayStatus()
     {

          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $userId = sanitize_text_field($_POST['userId']);
          $status = sanitize_text_field($_POST['status']);
          $userLocationInformation = sanitize_text_field($_POST['log']);
          //$paymentModeId = sanitize_text_field($_POST['paymentModeId']);

          if ($userLocationInformation != "" || $userLocationInformation != null || !empty( $userLocationInformation)){
               $userLocationInformation = str_replace('\\', '', $userLocationInformation);
               $getdyip=$this->six_storage_getIpAddress();  /* Code to get dynamic IP */
               $userLocationInformation = json_decode($userLocationInformation);
               $userLocationInformation->ipAddress = $getdyip;
               $userLocationInformation = json_encode($userLocationInformation);
          }

          $isAjax = true;

          $url = $this->six_storage_api_url . 'cards/autopay/activate/' . $userId;

          if ($status == false || $status == "false" || $status == 'false') {
               $url = $this->six_storage_api_url . 'cards/autopay/deactivate/' . $userId;
          }

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'logger' => json_decode($userLocationInformation)
                    //'paymentModeId' => json_decode($paymentModeId),
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

     public function six_storage_addUserCard()
     {
          $this->six_storage_http_header['Content-Language'] = str_replace("_","-",get_locale());

          $userId = sanitize_text_field($_POST['userId']);
          $cardLastFourNum = sanitize_text_field($_POST['cardLastFour']);
          $userLocationInformation = sanitize_text_field($_POST['logger']);

          if ($userLocationInformation != "" || $userLocationInformation != null || !empty( $userLocationInformation)){
               $userLocationInformation = str_replace('\\', '', $userLocationInformation);
               $getdyip=$this->six_storage_getIpAddress();  /* Code to get dynamic IP */
               $userLocationInformation = json_decode($userLocationInformation);
               $userLocationInformation->ipAddress = $getdyip;
               $userLocationInformation = json_encode($userLocationInformation);
          }
          $isAjax = true;

          $url = $this->six_storage_api_url . 'cards/add/' . $userId;
          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'cardLastFour' =>$cardLastFourNum,
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

     public function six_storage_saveTenantPhoto()
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

     public function six_storage_removeTenantPhoto()
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



     public function six_storage_dashboardForm()
     {
          ob_start();

          $currentHour = date('h:i');

          echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';

          // enqueue all our style
          wp_enqueue_style('cc-move-in-style', $this->six_storage_plugin_url . 'assets/css/cc-move-in-style.css' ,array(), $this->six_storage_plugin_version);
          wp_enqueue_style('materialize', $this->six_storage_plugin_url . 'assets/css/materialize/materialize.css' ,array(), $this->six_storage_plugin_version);
          wp_enqueue_style('icon', $this->six_storage_plugin_url . 'assets/fonts/icon.css');

          require_once $this->six_storage_plugin_path . 'template/portal/dashboard.php';

          // enqueue all our scripts
          wp_enqueue_script('six-storage-dashboard.min',  $this->six_storage_plugin_url . 'assets/js/six-storage-dashboard.min.js' ,array(), $this->six_storage_plugin_version);
          wp_localize_script('six-storage-dashboard.min', 'wordpress_vars', array('six_storage_plugin_path' => SIX_STORAGE_PLUGIN_FILE));

          //localize plugin vars
          wp_localize_script('six-storage-dashboard.min', 'wordpress_vars', $this->six_storage_getPluginvars());

          wp_enqueue_script('iframe-resizer',  $this->six_storage_plugin_url . 'assets/js/iframe-resizer.js');

          return ob_get_clean();
     }
}
