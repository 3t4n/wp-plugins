<?php

$result = array();

/* Check if user has admin capabilities */
if(current_user_can('manage_options')){

    if(isset($_REQUEST['entry_id'])){

        $entry_id = sanitize_text_field($_REQUEST['entry_id']);
        $form_id = $this->base_admin->settings->getFormIDfromEntryID($entry_id);

        if($form_id != Null){

            /* Change Status to Read */
            $this->base_admin->settings->updateEntrySettings($entry_id, "read_status", "read");

            /* Get Submission Info */
            $gmt_time = $this->base_admin->settings->updateEntrySettings($entry_id, "gmt_time");
            $user_id = $this->base_admin->settings->updateEntrySettings($entry_id, "user_id");
            $user_ip = $this->base_admin->settings->updateEntrySettings($entry_id, "user_ip");
            $user_page_url = $this->base_admin->settings->updateEntrySettings($entry_id, "user_page_url");
            $user_agent = $this->base_admin->settings->updateEntrySettings($entry_id, "user_agent");
            $user_browser = $this->base_admin->utils->getBrowserInformation($user_agent);

            $user_info = get_userdata($user_id);
            $user_name = ($user_info) ? '<a target="_blank" href="'.admin_url( 'user-edit.php?user_id=').$user_id.'">'.$user_info->display_name.'</a>'  : "Anonymous";




            /* Get Form Fields from DB to Extract Label or Placeholder */
            $form_fields = $this->base_admin->settings->updateFormSettings($form_id, "form_fields");
            $form_fields_obj = json_decode($form_fields, false);
            $form_fields_array = $this->base_admin->utils->extractFormFieldsJSONtoArray($form_fields_obj);


            $field_data = array();
            $entries = $this->base_admin->settings->updateEntrySettings($entry_id, "entries");
            $entries_obj = json_decode($entries, false);
            foreach ($entries_obj as $single_field){
                $field_in_db = array();
                $field_label = "";
                $field_value = $single_field->field_value;

                /* Get Field in DB */
                foreach ($form_fields_array as $field){
                    if($single_field->field_id == $field->field_id){
                        $field_in_db = $field;
                        break;
                    }
                }

                /* Get Field Label */
                $field_label = isset($field_in_db->label) ? $field_in_db->label : "";
                if(strlen(trim($field_label)) == 0){
                    $field_label = isset($field_in_db->placeholder) ? $field_in_db->placeholder : "";
                }
                if(strlen(trim($field_label)) == 0){
                    $field_label = isset($field_in_db->placeholder_dropdown) ? $field_in_db->placeholder_dropdown : "";
                }
                if(strlen(trim($field_label)) == 0){
                    $field_label = isset($field_in_db->file_placeholder) ? $field_in_db->file_placeholder : "";
                }
                if(strlen(trim($field_label)) == 0){
                    $field_label = "Unknown Field";
                }

                /* If checkbox field, remove ::forminix_separator:: */
                if($field_in_db->slug == "checkbox"){
                    $field_value = str_replace("::forminix_separator::", "<br>", $field_value);
                }

                /* If textarea field, replace newline with br */
                if($field_in_db->slug == "text_area"){
                    $field_value = nl2br($field_value);
                }

                if($field_in_db->slug == "rich_text"){
                    $field_value = $this->base_admin->utils->forminix_unesc_and_codify_string($field_value);
                }

                $field_data[] = array(
                    "field_slug" => $field_in_db->slug,
                    "field_label" => $field_label,
                    "field_value" => $field_value
                );
            }



            $payment_data = array();
            $has_payment = $this->base_admin->settings->updateEntrySettings($entry_id, "has_payment");
            $payment_status = $this->base_admin->settings->updateEntrySettings($entry_id, "payment_status");
            $payment_method = $this->base_admin->settings->updateEntrySettings($entry_id, "payment_method");
            $payment_amount = $this->base_admin->settings->updateEntrySettings($entry_id, "payment_amount");

            /* For PayPal */
            $payment_paypal_txn_id = $this->base_admin->settings->updateEntrySettings($entry_id, "payment_paypal_txn_id");
            $payment_paypal_payer_email = $this->base_admin->settings->updateEntrySettings($entry_id, "payment_paypal_payer_email");

            if($has_payment != Null){
                $payment_data["has_payment"] = $has_payment;
                $payment_data["payment_status"] = $payment_status;
                $payment_data["payment_method"] = $payment_method;
                $payment_data["payment_amount"] = $payment_amount;

                /* For PayPal */
                if($payment_method == "paypal"){
                    $payment_data["payment_paypal_txn_id"] = $payment_paypal_txn_id != Null ? $payment_paypal_txn_id : "";
                    $payment_data["payment_paypal_payer_email"] = $payment_paypal_payer_email != Null ? $payment_paypal_payer_email : "";
                }
            }

            $result = array("status" => 'true',
                "submission_time" => get_date_from_gmt($gmt_time, 'd/m/Y, h:i A' ),
                "user_name" => $user_name,
                "user_ip" => $user_ip,
                "user_page_url" => '<a target="_blank" href="'.$user_page_url.'">'.$user_page_url.'</a>',
                "user_browser" => $user_browser["name"],
                "user_platform" => $user_browser["platform"],
                "field_data" => $field_data,
                "payment_data" => $payment_data,
            );


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