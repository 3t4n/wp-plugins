<?php


if(isset($_REQUEST['security']) && isset($_REQUEST['form_id'])) {

    if(check_ajax_referer( 'forminix_client_hashkey', 'security' ) == 1){

        $form_id = sanitize_text_field($_REQUEST['form_id']);

        /*Check if Form Exists*/
        if($this->base_client->settings->updateFormSettings($form_id, "form_name") != Null){

            /* Is Submission Allowed by Form Scheduling & Restriction */
            $is_form_allowed_to_show_by_schedule_and_restriction = $this->base_client->utils->is_form_allowed_to_show_by_schedule_and_restriction($form_id);
            if(strlen(trim($is_form_allowed_to_show_by_schedule_and_restriction)) > 0){
                $settings = array();
                $settings['confirmation_type'] = "same_page";
                $settings['confirmation_msg'] = str_replace("::avoid_empty_check::", "", $is_form_allowed_to_show_by_schedule_and_restriction);
                $settings['confirmation_form_status'] = "hide_form";
                $result = array("status" => 'true', "settings" => $settings);
            }else{

                /* Get Form Fields from DB to check in future */
                $form_fields = $this->base_client->settings->updateFormSettings($form_id, "form_fields");
                $form_fields_obj = json_decode($form_fields, false);
                $form_fields_array = $this->base_client->utils->extractFormFieldsJSONtoArray($form_fields_obj);


                /* Get Conditional Logics to Escape Required Field */
                $form_logics_target_fields = array();
                $form_logics = $this->base_client->settings->updateFormSettings($form_id, "conditional_logic");
                $form_logics = ($form_logics == Null) ? "[]" : $form_logics;
                $form_logics_arr = json_decode($form_logics, false);
                foreach ($form_logics_arr as $logic_item){
                    $form_logics_target_fields[] = $logic_item->target_field;
                }


                /* Get Current User's Info */
                $submitting_user = wp_get_current_user();
                $submitting_user_id = ( isset( $submitting_user->ID ) ? (int) $submitting_user->ID : 0 );
                $submitting_user_ip = $this->base_client->utils->getIPAddress();
                $submitting_user_page_url = sanitize_url($_SERVER['HTTP_REFERER']);
                $submitting_user_agent = sanitize_text_field($_SERVER['HTTP_USER_AGENT']);
                $gmt_time = gmdate("Y/m/d H:i:s", time()+date("Z"));

                /* Get Form Field Values */
                $cleaned_field_submissions = array();
                $submissions_obj = array();



                $global_requests = isset( $_REQUEST ) ? (array) $_REQUEST : array();
                $global_requests = $this->base_client->utils->sanitize_global_requests('esc_attr', $global_requests);

                $global_files = isset( $_FILES ) ? (array) $_FILES : array();
                $global_files = $this->base_client->utils->sanitize_global_files('esc_attr', $global_files);

                foreach($global_requests as $field_id => $field_value) {
                    if (strpos($field_id, 'field_id_') === 0) {
                        $field_id = str_replace("field_id_", "", $field_id);
                        $submissions_obj[] = array("field_id"=>$field_id, "field_value"=>$field_value);
                    }
                }
                foreach($global_files as $field_id => $field_value) {
                    if (strpos($field_id, 'field_id_') === 0) {
                        $field_id = str_replace("field_id_", "", $field_id);
                        $submissions_obj[] = array("field_id"=>$field_id, "field_value"=>$field_value);
                    }
                }



                /* Verify Form Field Values */
                $is_everything_ok = true;
                if(is_array($submissions_obj)) {
                    if (sizeof($submissions_obj) > 0) {
                        foreach ($submissions_obj as $field) {
                            $field = (object) $field;
                            /* Check Weather the field_id is valid */
                            $is_field_id_valid = false;
                            foreach ($form_fields_array as $field_in_db){
                                if($field->field_id == $field_in_db->field_id){

                                    /* Check Validation */
                                    /* Required Field Check */
                                    $is_required = isset($field_in_db->required) ? $field_in_db->required : "0";
                                    if(is_array($field->field_value)){ // For File Input
                                        if($is_required == "1" && sizeof($field->field_value) == 0 && !in_array($field->field_id, $form_logics_target_fields)){
                                            $is_everything_ok = false;
                                        }
                                    }else{
                                        if($is_required == "1" && strlen($field->field_value) == 0 && !in_array($field->field_id, $form_logics_target_fields)){
                                            $is_everything_ok = false;
                                        }
                                    }
                                    /* URL Field Check */
                                    if($field_in_db->slug == "website_url" && strlen($field->field_value) > 0){
                                        if(!$this->base_client->utils->is_url_valid($field->field_value)){
                                            $is_everything_ok = false;
                                        }
                                    }
                                    /* Email Field Check */
                                    if($field_in_db->slug == "email_address" && strlen($field->field_value) > 0){
                                        if(!$this->base_client->utils->is_email_valid($field->field_value)){
                                            $is_everything_ok = false;
                                        }
                                    }
                                    /* Min Number Value Check */
                                    if(isset($field_in_db->min_value)){
                                        if(is_numeric($field_in_db->min_value) && strlen($field->field_value) > 0){
                                            if($field->field_value < $field_in_db->min_value){
                                                $is_everything_ok = false;
                                            }
                                        }
                                    }
                                    /* Max Number Value Check */
                                    if(isset($field_in_db->max_value)){
                                        if(is_numeric($field_in_db->max_value) && strlen($field->field_value) > 0){
                                            if($field->field_value > $field_in_db->max_value){
                                                $is_everything_ok = false;
                                            }
                                        }
                                    }
                                    /* Min Length Check */
                                    if(isset($field_in_db->min_length)){
                                        if(is_numeric($field_in_db->min_length) && strlen($field->field_value) > 0){
                                            if(strlen($this->base_client->utils->forminix_unesc_and_codify_string($field->field_value)) < $field_in_db->min_length){
                                                $is_everything_ok = false;
                                            }
                                        }
                                    }
                                    /* Max Length Check */
                                    if(isset($field_in_db->max_length)){
                                        if(is_numeric($field_in_db->max_length) && strlen($field->field_value) > 0){
                                            if(strlen($this->base_client->utils->forminix_unesc_and_codify_string($field->field_value)) > $field_in_db->max_length){
                                                $is_everything_ok = false;
                                            }
                                        }
                                    }
                                    /* Allowed Chars Check */
                                    if(isset($field_in_db->allowed_chars)){
                                        if(strlen($field_in_db->allowed_chars) > 0 && strlen($field->field_value) > 0){
                                            $pattern_modified = $this->base_client->utils->generateAllowedCharToPattern($field_in_db->allowed_chars);
                                            $pattern_modified = str_replace("\u007F", "\u{007F}", $pattern_modified);
                                            $pattern_modified = str_replace("\uFFFF", "\u{FFFF}", $pattern_modified);
                                            if(!preg_match("/^[".$pattern_modified."]{0,}$/", $field->field_value)){
                                                $is_everything_ok = false;
                                            }
                                        }
                                    }
                                    /* Decimal Point Number Check */
                                    if(isset($field_in_db->allow_decimal)){
                                        if($field_in_db->allow_decimal == "0" && strlen($field->field_value) > 0){
                                            if(!preg_match("/^[0-9]{0,}$/", $field->field_value)){
                                                $is_everything_ok = false;
                                            }
                                        }
                                    }


                                    /* Maximum Filesize Check */
                                    if($field_in_db->slug == "file" && is_array($_FILES)){
                                        if(isset($field_in_db->max_filesize) && isset($field->field_value['tmp_name'])){
                                            if(strlen(trim($field_in_db->max_filesize)) > 0){
                                                foreach ($field->field_value["size"] as $single_file_size){
                                                    $filesize = $single_file_size / 1024;
                                                    if ($filesize > $field_in_db->max_filesize) {
                                                        $is_everything_ok = false;
                                                    }
                                                }
                                            }
                                        }
                                    }

                                    /* Allowed File Type Check */
                                    if($field_in_db->slug == "file" && is_array($_FILES)){
                                        if(isset($field_in_db->allowed_file_ext) && isset($field->field_value['tmp_name'])){
                                            if(strlen(trim($field_in_db->allowed_file_ext)) > 0){
                                                foreach ($field->field_value["name"] as $single_file_name){
                                                    $is_extension_matched = false;
                                                    $tmp = explode('.', $single_file_name);
                                                    $file_ext = strtolower(end($tmp));
                                                    $allowed_ext_arr = explode(",", $field_in_db->allowed_file_ext);
                                                    foreach ($allowed_ext_arr as $single_ext){
                                                        $single_ext = trim(strtolower($single_ext));
                                                        if($single_ext == ".".$file_ext){
                                                            $is_extension_matched = true;
                                                        }
                                                    }
                                                    if (!$is_extension_matched) {
                                                        $is_everything_ok = false;
                                                    }
                                                }
                                            }
                                        }
                                    }

                                    /* File uploaded success Check */
                                    if($field_in_db->slug == "file" && is_array($_FILES)){
                                        if(isset($field->field_value['tmp_name'])){
                                            if ( ! function_exists( 'wp_handle_upload' ) ) {
                                                require_once( ABSPATH . 'wp-admin/includes/file.php' );
                                            }
                                            $file_urls = array();
                                            $upload_overrides = array('test_form' => false);
                                            foreach ( $field->field_value['name'] as $key => $value ) {
                                                if ( $field->field_value['name'][ $key ] ) {
                                                    $file = array(
                                                        'name' => $field->field_value['name'][ $key ],
                                                        'type' => $field->field_value['type'][ $key ],
                                                        'tmp_name' => $field->field_value['tmp_name'][ $key ],
                                                        'error' => $field->field_value['error'][ $key ],
                                                        'size' => $field->field_value['size'][ $key ]
                                                    );
                                                    $upload_status = wp_handle_upload( $file, $upload_overrides );
                                                    if ( $upload_status && ! isset( $upload_status['error'] ) ) {
                                                        $file_urls[] = $upload_status["url"];
                                                        /* Add file into WordPress Media Library */
                                                        if(isset($field_in_db->file_to_media_library)){
                                                            if($field_in_db->file_to_media_library == "1"){
                                                                $upload_id = wp_insert_attachment(array('guid' => $upload_status['url'],
                                                                    'post_mime_type' => $upload_status['type'],
                                                                    'post_title' => '',
                                                                    'post_content' => '',
                                                                    'post_status' => 'inherit'),
                                                                    $upload_status['file']);
                                                                if ( ! function_exists( 'wp_generate_attachment_metadata' ) ) {
                                                                    require_once( ABSPATH . 'wp-admin/includes/image.php' );
                                                                }
                                                                wp_update_attachment_metadata( $upload_id, wp_generate_attachment_metadata( $upload_id, $upload_status['url'] ) );
                                                            }
                                                        }
                                                    } else {
                                                        $is_everything_ok = false;
                                                    }
                                                }

                                                /* Check if Multiple Upload Allowed */
                                                if(isset($field_in_db->allow_multiple_file)) {
                                                    if ($field_in_db->allow_multiple_file == "0") {
                                                        break;
                                                    }
                                                }
                                            }
                                            $field->field_value = implode(', ', $file_urls);
                                        }
                                    }


                                    /* Google reCAPTCHA Check */
                                    if($field_in_db->slug == "grecaptcha"){
                                        $grecaptcha_verify_url = sprintf("https://www.google.com/recaptcha/api/siteverify?secret=%s&response=%s", $field_in_db->grecaptcha_secret_key, $field->field_value);
                                        $response = wp_remote_get($grecaptcha_verify_url);
                                        if ( is_array( $response ) && ! is_wp_error( $response ) ) {
                                            $jsonResponse = json_decode($response['body']);
                                            if(isset($jsonResponse->success)){
                                                if(!$jsonResponse->success){
                                                    $is_everything_ok = false;
                                                }
                                            }else{
                                                $is_everything_ok = false;
                                            }
                                        }else{
                                            $is_everything_ok = false;
                                        }
                                        /* Don't enter the record in entry */
                                        $is_field_id_valid = true;
                                        break;
                                    }


                                    /* Enter into Clean Submission Array */
                                    $cleaned_field_submissions[] = array(
                                        "field_id" => $field->field_id,
                                        "field_value" => $field->field_value,
                                    );

                                    $is_field_id_valid = true;
                                    break;
                                }
                            }
                            if(!$is_field_id_valid){
                                $is_everything_ok = false;
                            }
                        }
                    }else{
                        $is_everything_ok = false;
                    }
                }else{
                    $is_everything_ok = false;
                }



                /* Record Entries in DB */
                if($is_everything_ok){

                    $settings = array();
                    $is_allowed_to_submit_form = True;

                    /* Email Notification */
                    $email_extras = array(
                        "user_page_url" => $submitting_user_page_url,
                        "user_agent" => $submitting_user_agent,
                        "user_ip" => $submitting_user_ip,
                    );
                    $this->base_client->emails->processEmailNotification($form_id, $cleaned_field_submissions, $email_extras);


                    /* Integrations */
                    $integration_extras = array(
                        "user_page_url" => $submitting_user_page_url,
                        "user_agent" => $submitting_user_agent,
                        "user_ip" => $submitting_user_ip,
                    );
                    $response_from_integration = $this->base_client->integrations->processIntegrations($form_id, $cleaned_field_submissions, $integration_extras);


                    /* Submit Form */
                    if($is_allowed_to_submit_form){
                        $entry_id = $this->base_client->settings->createNewEntry($form_id);
                        $this->base_client->settings->updateEntrySettings($entry_id, "read_status", "unread");
                        $this->base_client->settings->updateEntrySettings($entry_id, "gmt_time", $gmt_time);
                        $this->base_client->settings->updateEntrySettings($entry_id, "user_id", $submitting_user_id);
                        $this->base_client->settings->updateEntrySettings($entry_id, "user_ip", $submitting_user_ip);
                        $this->base_client->settings->updateEntrySettings($entry_id, "user_page_url", $submitting_user_page_url);
                        $this->base_client->settings->updateEntrySettings($entry_id, "user_agent", $submitting_user_agent);
                        $this->base_client->settings->updateEntrySettings($entry_id, "entries", addslashes(json_encode($cleaned_field_submissions,  JSON_UNESCAPED_UNICODE)));


                        /* Pass Required Settings */
                        $settings['confirmation_type'] = $this->base_client->settings->updateFormSettings($form_id, "confirmation_type");
                        $settings['confirmation_type'] = ($settings['confirmation_type'] == Null) ? "same_page" : $settings['confirmation_type'];

                        $settings['confirmation_msg'] = $this->base_client->settings->updateFormSettings($form_id, "confirmation_msg");
                        $settings['confirmation_msg'] = ($settings['confirmation_msg'] == Null) ? "Thank you for your message. We will get in touch with you shortly." : $this->base_client->utils->forminix_unesc_and_codify_string($this->base_client->utils->shortCodeParser($settings['confirmation_msg'], $cleaned_field_submissions, $email_extras));

                        $settings['confirmation_form_status'] = $this->base_client->settings->updateFormSettings($form_id, "confirmation_form_status");
                        $settings['confirmation_form_status'] = ($settings['confirmation_form_status'] == Null) ? "hide_form" : $settings['confirmation_form_status'];

                        $settings['confirmation_custom_url'] = $this->base_client->settings->updateFormSettings($form_id, "confirmation_custom_url");
                        $settings['confirmation_custom_url'] = ($settings['confirmation_custom_url'] == Null) ? "" : $this->base_client->utils->forminix_unesc_and_codify_string($this->base_client->utils->shortCodeParser($settings['confirmation_custom_url'], $cleaned_field_submissions, $email_extras));

                    }

                    $result = array("status" => 'true', "settings" => $settings);
                }else{
                    $result = array("status" => 'false');
                }

            }

        }else{
            $result = array("status" => 'false');
        }
    }else{
        $result = array("status" => 'false');
    }
}else{
    $result = array("status" => 'false');
}


echo json_encode($result,  JSON_UNESCAPED_UNICODE);