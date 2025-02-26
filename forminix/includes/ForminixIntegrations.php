<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('ForminixIntegrations')) {
    class ForminixIntegrations
    {

        public $base_admin;

        function __construct($base_admin)
        {
            $this->base_admin = $base_admin;
        }

        public function isIntegrationAllowedByCondition($integration_data, $cleaned_field_submissions)
        {
            $is_allowed_to_send_by_condition = True;
            if(isset($integration_data->enable_conditional_logic)){
                if($integration_data->enable_conditional_logic == "1"){
                    if(!$this->isIntegrationConditionPassed($integration_data->conditional_logic_data, $cleaned_field_submissions)){
                        $is_allowed_to_send_by_condition = False;
                    }
                }
            }
            return $is_allowed_to_send_by_condition;
        }


        public function isIntegrationConditionPassed($condition_data, $cleaned_field_submissions)
        {
            $condition_checkmark = array();
            $matching_type = "or";
            foreach ($condition_data as $single_condition){
                $condition_result = 0;
                $matching_type = $single_condition->matching_type;
                $target_field_id = $single_condition->if;
                $condition = $single_condition->condition;
                $value = $this->base_admin->utils->forminix_unesc_and_codify_string($single_condition->value);

                foreach ($cleaned_field_submissions as $field) {
                    $field = (object) $field;
                    $field->field_value = $this->base_admin->utils->forminix_unesc_and_codify_string($field->field_value);
                    if($field->field_id == $target_field_id){
                        if($condition == "equal"){
                            if($field->field_value == $value) { $condition_result = 1; }else{ $condition_result = 0; }
                        }else if($condition == "not_equal"){
                            if($field->field_value != $value) { $condition_result = 1; }else{ $condition_result = 0; }
                        }else if($condition == "greater_than"){
                            if(is_numeric($field->field_value) && is_numeric($value)){
                                if($field->field_value > $value) { $condition_result = 1; }else{ $condition_result = 0; }
                            }else{
                                $condition_result = 0;
                            }
                        }else if($condition == "less_than"){
                            if(is_numeric($field->field_value) && is_numeric($value)){
                                if($field->field_value < $value) { $condition_result = 1; }else{ $condition_result = 0; }
                            }else{
                                $condition_result = 0;
                            }
                        }else if($condition == "starts_with"){
                            if(substr($field->field_value, 0, strlen($value)) === $value) { $condition_result = 1; }else{ $condition_result = 0; }
                        }else if($condition == "ends_with"){
                            $length = strlen($value);
                            if($length > 0){
                                if(substr( $field->field_value, -$length ) === $value) { $condition_result = 1; }else{ $condition_result = 0; }
                            }else{
                                $condition_result = 0;
                            }
                        }else if($condition == "contains"){
                            if(strpos($field->field_value, $value) !== false) { $condition_result = 1; }else{ $condition_result = 0; }
                        }else if($condition == "not_contains"){
                            if(strpos($field->field_value, $value) == false) { $condition_result = 1; }else{ $condition_result = 0; }
                        }else if($condition == "length_greater_than"){
                            if(strlen($field->field_value) > $value) { $condition_result = 1; }else{ $condition_result = 0; }
                        }else if($condition == "length_less_than"){
                            if(strlen($field->field_value) < $value) { $condition_result = 1; }else{ $condition_result = 0; }
                        }else if($condition == "filesize_greater_than"){
                            $file_info = get_headers($field->field_value, 1);
                            $file_size_in_bytes = isset($file_info["Content-Length"]) ? $file_info["Content-Length"] : 0;
                            $file_size_in_kb = $file_size_in_bytes / 1000;
                            if($file_size_in_kb > $value) { $condition_result = 1; }else{ $condition_result = 0; }
                        }else if($condition == "filesize_less_than"){
                            $file_info = get_headers($field->field_value, 1);
                            $file_size_in_bytes = isset($file_info["Content-Length"]) ? $file_info["Content-Length"] : 0;
                            $file_size_in_kb = $file_size_in_bytes / 1000;
                            if($file_size_in_kb < $value) { $condition_result = 1; }else{ $condition_result = 0; }
                        }
                        break;
                    }
                }

                $condition_checkmark[] = $condition_result;
            }


            if($matching_type == "or"){
                if (in_array(1, $condition_checkmark)){
                    return True;
                }
            }else if($matching_type == "and"){
                if(in_array(0, $condition_checkmark, true) === false){
                    return True;
                }
            }

            return False;
        }


        public function processIntegrations($form_id, $cleaned_field_submissions, $integration_extras)
        {
            $response_from_integration = array();
            $activated_modules = $this->base_admin->settings->listAllModules();
            $integrations_str = $this->base_admin->settings->updateFormSettings($form_id, "integrations");
            $integrations_str = ($integrations_str == Null) ? "[]" : $integrations_str;

            $integrations_arr = json_decode($integrations_str, false);
            foreach ($integrations_arr as $single_integration) {
                if($single_integration->integration_type == "mailchimp"){
                    if (in_array("mailchimp", $activated_modules)){
                        if($this->isIntegrationAllowedByCondition($single_integration->integration_data, $cleaned_field_submissions)){
                            $response_from_integration = array_merge($response_from_integration, $this->processMailchimpIntegrations($single_integration->integration_data, $cleaned_field_submissions));
                        }
                    }
                }else if($single_integration->integration_type == "slack"){
                    if (in_array("slack", $activated_modules)){
                        if($this->isIntegrationAllowedByCondition($single_integration->integration_data, $cleaned_field_submissions)){
                            $response_from_integration = array_merge($response_from_integration, $this->processSlackIntegrations($single_integration->integration_data, $cleaned_field_submissions, $integration_extras));
                        }
                    }
                }
            }
            return $response_from_integration;
        }




        /* ****************** Mailchimp Operations ****************** */

        public function processMailchimpIntegrations($integration_data, $cleaned_field_submissions)
        {
            $response_from_integration = array();
            $subscriber_email = Null;
            $merge_fields = array();
            $server_prefix = "forminix-dummy";
            $api_key = $integration_data->api_key;

            /* Extract server prefix */
            if (($pos = strpos($api_key, "-")) !== FALSE) {
                $server_prefix = substr($api_key, $pos+1);
            }

            foreach ($integration_data->map_data as $single_map) {
                foreach ($cleaned_field_submissions as $field) {
                    $field = (object) $field;
                    if($field->field_id == $single_map->form_field_id){
                        if($single_map->field_tag == "EMAIL"){
                            if($this->base_admin->utils->is_email_valid($field->field_value)){
                                $subscriber_email = $field->field_value;
                            }
                        }else{
                            $merge_fields[$single_map->field_tag] = $this->base_admin->utils->forminix_unesc_and_codify_string($field->field_value);
                        }
                    }
                }
            }


            $formatted_tags = array();
            $tags = explode(',', $integration_data->tags);
            foreach ($tags as $single_tag) {
                if(strlen(trim($single_tag)) > 0){
                    $formatted_tags[] = $single_tag;
                }
            }

            if($subscriber_email != Null){
                $data = json_encode(['email_address'  => $subscriber_email,
                    'status' => "subscribed",
                    'status_if_new' => ($integration_data->double_opt_in == "1") ? "pending" : "subscribed",
                    'tags' => $formatted_tags,
                    'merge_fields'  => (object) $merge_fields]);
                $options = [
                    'body' => $data,
                    'method' => 'PUT',
                    'headers' => array(
                        'Authorization' => 'Basic ' . base64_encode( 'user:'.$api_key ),
                        'Content-Type' => 'application/json',
                    ),
                ];
                $contactHash = md5(strtolower($subscriber_email));
                wp_remote_post( "https://".$server_prefix.".api.mailchimp.com/3.0/lists/".$integration_data->list_id."/members/".$contactHash, $options );
            }
            return $response_from_integration;
        }





        /* ****************** Slack Operations ****************** */

        public function processSlackIntegrations($integration_data, $cleaned_field_submissions, $integration_extras)
        {
            $response_from_integration = array();
            $webhook_url = $integration_data->webhook_url;
            $msg_body = $integration_data->msg_body;

            $webhook_data = array("text" => $this->base_admin->utils->forminix_unesc_and_codify_string($this->base_admin->utils->shortCodeParser($msg_body, $cleaned_field_submissions, $integration_extras)),
                "username" => "Forminix",
                "icon_url" => "https://forminix.com/styles/images/module_icons/slack_bot_icon.png");

            if($this->base_admin->utils->is_url_valid($webhook_url)){
                $options = [
                    'body' => json_encode($webhook_data),
                    'headers' => array(
                        'Content-Type' => 'application/json; charset=utf-8',
                    ),
                ];
                wp_remote_post( $webhook_url, $options );
            }
            return $response_from_integration;
        }


    }
}