<?php
/*
 * Plugin Name: Fast GetResponse
 * Plugin URI: https://www.fastflow.io/products/fast-getresponse
 * Description: GetResponse addon for Fast Flow
 * Version: 1.1.1
 * Author: FastFlow
 * Author URI: https://www.fastflow.io
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

  if (!class_exists('FastGetResponse')) {

      class FastGetResponse {

          protected $gr_url;
          protected $fastflow_getresponse_apikey;
          protected $user_id;
          protected $prod_id;

          public function __construct() {
              $this->gr_url = 'https://api.getresponse.com/v3';
              $this->fast_getresponse_apikey();
              register_activation_hook(__FILE__, array($this, 'fast_getresponse_activate'));
              register_deactivation_hook(__FILE__, array($this, 'fast_getresponse_deactivate'));
              add_action('admin_notices', array($this, 'fast_getresponse_admin_notice__error'));
              add_filter('ff_settings', array($this, 'fast_getresponse_settings_html'), 80, 1 );
              add_filter('ff_settings_data', array($this, 'fast_process_getresponse_data'), 80, 1);
              add_filter('FM_AR_select_options_addons', array($this, 'fast_getresponse_AR_select_options'), 80, 2 );
              add_filter('FM_AR_options_HTML_addons', array($this, 'fast_getresponse_AR_options_HTML'), 80, 2 );
              add_action('FM_add_to_AR_addons', array($this, 'fast_getresponse_add_to_AR'), 80, 2 );
              add_action('FF_add_to_AR_addons', array($this, 'fast_getresponse_add_FF_user_to_AR'), 80, 2 );
          }

          public function fast_getresponse_activate() {

          }

          public function fast_getresponse_deactivate() {
              flush_rewrite_rules();
          }

          public function fast_getresponse_apikey(){
            $gr_db = $this->fast_getresponse_settings_db('Get Response');
            $gr_options = empty( $gr_db->settings_data ) ? array() : unserialize( $gr_db->settings_data );
            $this->fastflow_getresponse_apikey = empty( $gr_options['fastflow_getresponse_apikey'] ) ? '' : $gr_options['fastflow_getresponse_apikey'];
          }

          public function fast_getresponse_admin_notice__error() {
          		if( is_plugin_active( 'fast-getresponse/fast-getresponse.php' ) ) {
          			$class = 'notice notice-error';
          			$message = 'Please input API keys for <a href="'.admin_url("admin.php?page=fast-flow-settings").'">Get Response.</a>';
          			if(!empty($this->fastflow_getresponse_apikey)){
          				return true;
          			}else{
          				printf( '<div class="%1$s is-dismissible"><p>%2$s</p></div>', esc_attr( $class ), ($message) );
          			}
          		}else{
          			return true;
          		}
          	}

            public function fast_getresponse_settings_html($html){
                $settings_html = '<h1><strong>Get Response</strong></h1>';
                $settings_html .= '<div class="item-tab-box">';
                $settings_html .= '<table cellspacing="10" width="100%">
                                  <tr><td width="30%">'.__("API Key").':</td><td width="70%"><input type="text" id="fastflow_getresponse_apikey" style="width: 390px;" name="fastflow_getresponse_apikey" value="' . $this->fastflow_getresponse_apikey . '" /></td></tr>
                                  <tr><td width="30%">'.__("Webhook URL").':</td><td width="70%"><input type="text"  style="width: 390px;" value="' .plugins_url('fast-getresponse/fast-getresponse-webhook.php'). '" disabled/></td></tr>';
                $settings_html .=' </table>';
                $settings_html .= '</div>';
                return $html.$settings_html;
            }

            public function fast_process_getresponse_data($data) {
              global $wpdb;
              $data_arr = array();
              $data_arr['fastflow_getresponse_apikey'] = empty( $data['fastflow_getresponse_apikey'] ) ? '' : sanitize_text_field( $data['fastflow_getresponse_apikey'] );
              $data_ser = serialize($data_arr);
              $count = $wpdb->get_var( "SELECT COUNT(ID) FROM {$wpdb->prefix}fastflow_settings
                                                                                  WHERE settings_for='Get Response'" );

                if( $count == 1 ) {
                    $wpdb->update(
                        $wpdb->prefix . 'fastflow_settings',
                        array( 'settings_data' => $data_ser, 'extra_data' => '' ),
                        array( 'settings_for' => 'Get Response' ),
                        array( '%s', '%s' ),
                        array( '%s' )
                      );
                } else {
                    $wpdb->insert(
                        $wpdb->prefix . 'fastflow_settings',
                        array( 'settings_for' => 'Get Response', 'settings_data' => $data_ser, 'extra_data' => '' ),
                        array( '%s', '%s', '%s' ) );
                }
                return $data;
            }

            public function fast_getresponse_settings_db($for = ''){
              if( !empty( $for ) && $for !== '' ) {
                  global $wpdb;
                  $data = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}fastflow_settings WHERE settings_for=%s", $for ) );
                  if( count($data) >= 1 ) {
                      return $data[0];
                  } else return false;
              }
              return false;
            }

            public function fast_getresponse_AR_select_options($value, $selected_opts){
              $selected_attr = ( $selected_opts == 9 ) ? "selected='selected'" : "";
              $fsn_opts = "<option value='9'{$selected_attr}>Get Response</option>";
              $return_val = $fsn_opts . $value;
              return $return_val;
            }

            public function fast_getresponse_AR_options_HTML( $value, $selected_opts ){
                $grdisp = ( $selected_opts == 9 ) ? "block" : "none";
                $getresponsewid = sanitize_text_field($_POST['getresponsewid']);
                $lists = $this->fast_getresponse_getlists();
                $return_html = $value . "<div style='display:$grdisp' id='arbox9' class='arcontentbox'><table cellspacing='10'><tr><td style='width: 140px;'>Choose List:</td><td>";
                $return_html .= "<select id='getresponsewid' style='width: 200px;' name='getresponsewid'>";
                if(!empty($lists)){
                  foreach($lists as $list){
                    $selected = ($list->campaignId == $getresponsewid)?"selected='selected'":"";
                    $return_html .= "<option value='".$list->campaignId."' ".$selected.">".$list->name."</option>";
                  }
                }
                $return_html .= "</select>";
                $return_html .= "</td></tr></table></div>";
                return $return_html;
            }

            public function fast_getresponse_add_to_AR($userid, $prodid){
              global $wpdb;
              $this->user_id = $userid;
              $this->prod_id = $prodid;
              $pdata = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$wpdb->prefix}wpbn_products WHERE id=%d",$this->prod_id));
              $arservice = $pdata->arservice;
              if( $arservice != 9 ) { return; }
              $aroptions = unserialize($pdata->aroptions);
              $getresponsewid = $aroptions['getresponsewid'];
              if(empty($getresponsewid)){
                error_log( "Empty Get Response Campaign ID" );
                return;
              }
              $gr_db = $this->fast_getresponse_settings_db('Get Response');
              $gr_options = empty( $gr_db->settings_data ) ? array() : unserialize( $gr_db->settings_data );
              $this->fastflow_getresponse_apikey = empty( $gr_options['fastflow_getresponse_apikey'] ) ? '' : $gr_options['fastflow_getresponse_apikey'];
              if($this->fastflow_getresponse_apikey == ''){
                error_log( "Empty Get Response Api key" );
                return;
              }
              $email = get_user_by('id', $this->user_id)->user_email;
              $first_name = get_user_meta($this->user_id, 'first_name', true);
              $last_name = get_user_meta($this->user_id, 'last_name', true);
              $full_name = $first_name . " " . $last_name;
              $gr_name = trim( $full_name );
              if ( empty( $gr_name ) || $gr_name == "" ){ $gr_name = $email;}
              $user_fast_tags = wp_get_object_terms( $this->user_id, 'fast_tag', array('order' => 'ASC'));
              $gr_tagIDs = $this->fast_getresponse_tags($user_fast_tags);
              $gr_contact = $this->fast_getresponse_getcontact($getresponsewid, $email);
              $contact_data = [];
              if($gr_contact){
                if(!empty($gr_tagIDs)){
                  foreach($gr_tagIDs as $gr_tag){
                    $contact_data['tags'][] = ['tagId' => $gr_tag];
                  }
                  $this->fast_getresponse_update_contact_tags($gr_contact, $contact_data);
                }
              }else{
                $contact_data = [
                  'name' => $gr_name,
                  'campaign' => array(
                    'campaignId' => $getresponsewid
                  ),
                  'email' => $email,
                  'ipAddress' => $_SERVER['REMOTE_ADDR']
                ];
                if(!empty($gr_tagIDs)){
                  foreach($gr_tagIDs as $gr_tag){
                    $contact_data['tags'][] = ['tagId' => $gr_tag];
                  }
                }
                $this->fast_getresponse_create_contact($contact_data);
              }
            }

            public function fast_getresponse_tags($fast_tags){
              $gr_tagIDArr = [];
              if(!empty($fast_tags)){
                foreach($fast_tags as $ft => $tag){
                  $tag_name = str_replace(' ', '_', $tag->name);
                  $response = wp_remote_get( $this->gr_url.'/tags?query[name]='.$tag_name.'&perPage=1', array(
                         'method' => 'GET',
                         'headers' => array(
                            'X-Auth-Token' => 'api-key '.$this->fastflow_getresponse_apikey
                         )
                  ));
                  if ( !is_wp_error($response) ) {
                    $response_body = wp_remote_retrieve_body( $response );
                    $result = json_decode($response_body);
                    if(wp_remote_retrieve_response_code($response) == '200'){
                      if(!empty($result)){
                        $gr_tagIDArr[$ft] = $result[0]->tagId;
                      }else{
                        $tag_id = $this->fast_getresponse_createtag($tag_name);
                        if($tag_id){$gr_tagIDArr[$ft] = $tag_id;}
                      }
                    }
                  }
                }
              }

              return $gr_tagIDArr;
            }

            public function fast_getresponse_createtag($tag_name){
              $response = wp_remote_post( $this->gr_url.'/tags', array(
                     'method' => 'POST',
                     'headers' => array(
                        'Content-type' => 'application/json',
                   		  'X-Auth-Token' => 'api-key '.$this->fastflow_getresponse_apikey
                   	 ),
                     'body' => json_encode(array(
                         'name' => $tag_name
                     ))
                ));
                if ( !is_wp_error($response) ) {
                  $response_body = wp_remote_retrieve_body( $response );
                  $result = json_decode($response_body);
                  if(wp_remote_retrieve_response_code($response) == '201'){
                    return $result->tagId;
                  }else{
                    return '';
                  }
                }
            }

            public function fast_getresponse_getcontact($campaignId, $email){
              $response = wp_remote_get( $this->gr_url.'/campaigns/'.$campaignId.'/contacts?query[email]='.$email.'&perPage=1', array(
                     'method' => 'GET',
                     'headers' => array(
                        'Content-type' => 'application/json',
                   		  'X-Auth-Token' => 'api-key '.$this->fastflow_getresponse_apikey
                   	 )
               ));
               if ( !is_wp_error($response) ) {
                 $response_body = wp_remote_retrieve_body( $response );
                 $result = json_decode($response_body);
                 if(wp_remote_retrieve_response_code($response) == '200'){
                   if(!empty($result)){
                     return $result[0]->contactId;
                   }else{
                     return '';
                   }
                 }
               }
            }

            public function fast_getresponse_update_contact_tags($gr_contact, $contact_data){
              global $wpdb;
              $response = wp_remote_post( $this->gr_url.'/contacts/'.$gr_contact.'/tags', array(
                     'method' => 'POST',
                     'headers' => array(
                        'Content-type' => 'application/json',
                        'X-Auth-Token' => 'api-key '.$this->fastflow_getresponse_apikey
                     ),
                     'body' => json_encode($contact_data)
               ));
               if ( !is_wp_error($response) ) {
                   $response_body = wp_remote_retrieve_body( $response );
                   $result = json_decode($response_body);
                   if(wp_remote_retrieve_response_code($response) == '200'){
                     if($this->user_id){
                       $wpdb->query("UPDATE {$wpdb->prefix}wpbn_users SET arlisted=1 WHERE (userid='$this->user_id') AND (prodid=$this->prod_id)");
                       error_log( "Userid: {$this->user_id} added to Get Response AR" );
                     }

                   }else{
                     error_log( "Get Response Error: $result->message" );
                   }
               } else {
                   error_log( "Get Response Error: ".$response->get_error_message());
               }
            }

            public function fast_getresponse_create_contact($contact_data){
              global $wpdb;
              $response = wp_remote_post( $this->gr_url.'/contacts', array(
                     'method' => 'POST',
                     'headers' => array(
                        'Content-type' => 'application/json',
                        'X-Auth-Token' => 'api-key '.$this->fastflow_getresponse_apikey
                     ),
                     'body' => json_encode($contact_data)
               ));
               if ( !is_wp_error($response) ) {
                   $response_body = wp_remote_retrieve_body( $response );
                   $result = json_decode($response_body);
                   if(wp_remote_retrieve_response_code($response) == '202'){
                     if($this->user_id){
                       $wpdb->query("UPDATE {$wpdb->prefix}wpbn_users SET arlisted=1 WHERE (userid='$this->user_id') AND (prodid=$this->prod_id)");
                       error_log( "Userid: {$this->user_id} added to Get Response AR" );
                     }
                   }else{
                     error_log( "Get Response Error: $result->message" );
                   }
               } else {
                   error_log( "Get Response Error: ".$response->get_error_message());
               }
            }

            public function fast_getresponse_getlists(){
              $response = wp_remote_get( $this->gr_url.'/campaigns', array(
                     'method' => 'GET',
                     'headers' => array(
                        'Content-type' => 'application/json',
                        'X-Auth-Token' => 'api-key '.$this->fastflow_getresponse_apikey
                     )
               ));
               if ( !is_wp_error($response) ) {
                 $response_body = wp_remote_retrieve_body( $response );
                 $result = json_decode($response_body);
                 if(wp_remote_retrieve_response_code($response) == '200'){
                   return $result;
                 }else{
                   return [];
                 }
               }
            }

            public function fast_getresponse_add_FF_user_to_AR($data, $form_id){
              global $wpdb;
              $fast_form = get_post($form_id);
              if($fast_form->post_type == 'fast-forms'){
                $arservice = get_post_meta( $fast_form->ID, 'ff_auto_reponder', true );
                if( $arservice != 9 ) { return; }
                $getresponsewid = get_post_meta( $fast_form->ID, 'getresponsewid', true );
                if(empty($getresponsewid)){
                  error_log( "Empty Get Response Campaign ID" );
                  return;
                }
                $gr_db = $this->fast_getresponse_settings_db('Get Response');
                $gr_options = empty( $gr_db->settings_data ) ? array() : unserialize( $gr_db->settings_data );
                $this->fastflow_getresponse_apikey = empty( $gr_options['fastflow_getresponse_apikey'] ) ? '' : $gr_options['fastflow_getresponse_apikey'];
                if($this->fastflow_getresponse_apikey == ''){
                  error_log( "Empty Get Response Api key" );
                  return;
                }

                $email = trim($data['email']);
                $gr_name = trim( $data['name'] );
                unset($data['name']);
                unset($data['email']);
                $fieldsArr = [];
                foreach($data as $k => $d){
                  $fieldsArr[$k]['customFieldId'] = $k;
                  $fieldsArr[$k]['value'] = $d;
                }
                if ( empty( $gr_name ) || $gr_name == "" ){ $gr_name = $email;}
                $gr_contact = $this->fast_getresponse_getcontact($getresponsewid, $email);
                $contact_data = [];
                if($gr_contact){
                  if($fieldsArr){
                    $contact_data['customFieldValues'] = $fieldsArr;
                  }
                  $this->fast_getresponse_update_contact_tags($gr_contact, $contact_data);
                }else{
                  $contact_data = [
                    'name' => $gr_name,
                    'campaign' => array(
                      'campaignId' => $getresponsewid
                    ),
                    'email' => $email,
                    'ipAddress' => $_SERVER['REMOTE_ADDR']
                  ];
                  if($fieldsArr){
                    $contact_data['customFieldValues'] = $fieldsArr;
                  }

                  $this->fast_getresponse_create_contact($contact_data);
                }
              }

            }

      }

  }

  new FastGetResponse();
