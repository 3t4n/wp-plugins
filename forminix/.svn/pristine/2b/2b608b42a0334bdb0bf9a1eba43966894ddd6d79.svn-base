<?php

$result = array();

/* Check if user has admin capabilities */
if(current_user_can('manage_options')){

    if(isset($_REQUEST['form_id'])){

        $settings = array();
        $form_id = sanitize_text_field($_REQUEST['form_id']);

        $settings['form_name'] = $this->base_admin->settings->updateFormSettings($form_id, "form_name");




        /* Form Fields for Conditional Logic */
        $form_field_data = array();
        $form_fields = $this->base_admin->settings->updateFormSettings($form_id, "form_fields");
        $form_fields_obj = json_decode($form_fields, false);
        $form_fields_array = $this->base_admin->utils->extractFormFieldsJSONtoArray($form_fields_obj);
        foreach ($form_fields_array as $field){

            if($field->slug == "submit_btn") {continue;}
            if($field->slug == "custom_html") {continue;}
            if($field->slug == "grecaptcha") {continue;}
            if($field->slug == "shortcode") {continue;}

            $field_label = isset($field->label) ? $field->label : "";
            if(strlen(trim($field_label)) == 0){
                $field_label = isset($field->placeholder) ? $field->placeholder : "";
            }
            if(strlen(trim($field_label)) == 0){
                $field_label = isset($field->placeholder_dropdown) ? $field->placeholder_dropdown : "";
            }
            if(strlen(trim($field_label)) == 0){
                $field_label = isset($field->file_placeholder) ? $field->file_placeholder : "";
            }
            if(strlen(trim($field_label)) == 0){
                $field_label = "Unknown Field";
            }
            $form_field_data[] = array(
                "field_slug" => $field->slug,
                "field_id" => $field->field_id,
                "field_label" => $field_label
            );
        }
        $settings['field_data'] = json_encode($form_field_data,  JSON_UNESCAPED_UNICODE);



        /* Confirmation Settings */
        $settings['confirmation_type'] = $this->base_admin->settings->updateFormSettings($form_id, "confirmation_type");
        $settings['confirmation_type'] = ($settings['confirmation_type'] == Null) ? "same_page" : $settings['confirmation_type'];

        $settings['confirmation_msg'] = $this->base_admin->settings->updateFormSettings($form_id, "confirmation_msg");
        $settings['confirmation_msg'] = ($settings['confirmation_msg'] == Null) ? "Thank you for your message. We will get in touch with you shortly." : $settings['confirmation_msg'];

        $settings['confirmation_form_status'] = $this->base_admin->settings->updateFormSettings($form_id, "confirmation_form_status");
        $settings['confirmation_form_status'] = ($settings['confirmation_form_status'] == Null) ? "hide_form" : $settings['confirmation_form_status'];

        $settings['confirmation_custom_url'] = $this->base_admin->settings->updateFormSettings($form_id, "confirmation_custom_url");
        $settings['confirmation_custom_url'] = ($settings['confirmation_custom_url'] == Null) ? "" : $settings['confirmation_custom_url'];

        /* Form Layout Settings */
        $settings['help_message_position'] = $this->base_admin->settings->updateFormSettings($form_id, "help_message_position");
        $settings['help_message_position'] = ($settings['help_message_position'] == Null) ? "beside_label" : $settings['help_message_position'];

        $settings['asterisk_position'] = $this->base_admin->settings->updateFormSettings($form_id, "asterisk_position");
        $settings['asterisk_position'] = ($settings['asterisk_position'] == Null) ? "none" : $settings['asterisk_position'];

        /* Form Scheduling & Restrictions Settings */
        $settings['enable_form_scheduling'] = $this->base_admin->settings->updateFormSettings($form_id, "enable_form_scheduling");
        $settings['enable_form_scheduling'] = ($settings['enable_form_scheduling'] == Null) ? "0" : $settings['enable_form_scheduling'];

        $settings['form_scheduling_start_datetime'] = $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_start_datetime");
        $settings['form_scheduling_start_datetime'] = ($settings['form_scheduling_start_datetime'] == Null) ? "" : $settings['form_scheduling_start_datetime'];

        $settings['form_scheduling_end_datetime'] = $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_end_datetime");
        $settings['form_scheduling_end_datetime'] = ($settings['form_scheduling_end_datetime'] == Null) ? "" : $settings['form_scheduling_end_datetime'];

        $settings['form_scheduling_inactive_msg'] = $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_inactive_msg");
        $settings['form_scheduling_inactive_msg'] = ($settings['form_scheduling_inactive_msg'] == Null) ? "Submission to this form has not started yet." : $settings['form_scheduling_inactive_msg'];

        $settings['form_scheduling_expired_msg'] = $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_expired_msg");
        $settings['form_scheduling_expired_msg'] = ($settings['form_scheduling_expired_msg'] == Null) ? "Submission to this form has expired." : $settings['form_scheduling_expired_msg'];

        $settings['form_scheduling_exclude_weekday_sat'] = $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_exclude_weekday_sat");
        $settings['form_scheduling_exclude_weekday_sat'] = ($settings['form_scheduling_exclude_weekday_sat'] == Null) ? "0" : $settings['form_scheduling_exclude_weekday_sat'];

        $settings['form_scheduling_exclude_weekday_sun'] = $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_exclude_weekday_sun");
        $settings['form_scheduling_exclude_weekday_sun'] = ($settings['form_scheduling_exclude_weekday_sun'] == Null) ? "0" : $settings['form_scheduling_exclude_weekday_sun'];

        $settings['form_scheduling_exclude_weekday_mon'] = $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_exclude_weekday_mon");
        $settings['form_scheduling_exclude_weekday_mon'] = ($settings['form_scheduling_exclude_weekday_mon'] == Null) ? "0" : $settings['form_scheduling_exclude_weekday_mon'];

        $settings['form_scheduling_exclude_weekday_tue'] = $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_exclude_weekday_tue");
        $settings['form_scheduling_exclude_weekday_tue'] = ($settings['form_scheduling_exclude_weekday_tue'] == Null) ? "0" : $settings['form_scheduling_exclude_weekday_tue'];

        $settings['form_scheduling_exclude_weekday_wed'] = $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_exclude_weekday_wed");
        $settings['form_scheduling_exclude_weekday_wed'] = ($settings['form_scheduling_exclude_weekday_wed'] == Null) ? "0" : $settings['form_scheduling_exclude_weekday_wed'];

        $settings['form_scheduling_exclude_weekday_thu'] = $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_exclude_weekday_thu");
        $settings['form_scheduling_exclude_weekday_thu'] = ($settings['form_scheduling_exclude_weekday_thu'] == Null) ? "0" : $settings['form_scheduling_exclude_weekday_thu'];

        $settings['form_scheduling_exclude_weekday_fri'] = $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_exclude_weekday_fri");
        $settings['form_scheduling_exclude_weekday_fri'] = ($settings['form_scheduling_exclude_weekday_fri'] == Null) ? "0" : $settings['form_scheduling_exclude_weekday_fri'];

        $settings['allow_logged_in_only'] = $this->base_admin->settings->updateFormSettings($form_id, "allow_logged_in_only");
        $settings['allow_logged_in_only'] = ($settings['allow_logged_in_only'] == Null) ? "0" : $settings['allow_logged_in_only'];

        $settings['require_login_msg'] = $this->base_admin->settings->updateFormSettings($form_id, "require_login_msg");
        $settings['require_login_msg'] = ($settings['require_login_msg'] == Null) ? "You must be logged in to submit the form." : $settings['require_login_msg'];

        $settings['enable_maximum_entry_limit'] = $this->base_admin->settings->updateFormSettings($form_id, "enable_maximum_entry_limit");
        $settings['enable_maximum_entry_limit'] = ($settings['enable_maximum_entry_limit'] == Null) ? "0" : $settings['enable_maximum_entry_limit'];

        $settings['maximum_entry_amount'] = $this->base_admin->settings->updateFormSettings($form_id, "maximum_entry_amount");
        $settings['maximum_entry_amount'] = ($settings['maximum_entry_amount'] == Null) ? "0" : $settings['maximum_entry_amount'];

        $settings['maximum_entry_limitation_type'] = $this->base_admin->settings->updateFormSettings($form_id, "maximum_entry_limitation_type");
        $settings['maximum_entry_limitation_type'] = ($settings['maximum_entry_limitation_type'] == Null) ? "total_entries" : $settings['maximum_entry_limitation_type'];

        $settings['maximum_entry_limitation_msg'] = $this->base_admin->settings->updateFormSettings($form_id, "maximum_entry_limitation_msg");
        $settings['maximum_entry_limitation_msg'] = ($settings['maximum_entry_limitation_msg'] == Null) ? "Maximum number of entries exceeded." : $settings['maximum_entry_limitation_msg'];


        /* Field Customization Settings */
        $settings['bg_color'] = $this->base_admin->settings->updateFormSettings($form_id, "bg_color");
        $settings['bg_color'] = ($settings['bg_color'] == Null) ? "#F6F8FA" : $settings['bg_color'];

        $settings['bg_color_focus'] = $this->base_admin->settings->updateFormSettings($form_id, "bg_color_focus");
        $settings['bg_color_focus'] = ($settings['bg_color_focus'] == Null) ? "#FFFFFF" : $settings['bg_color_focus'];

        $settings['border_color'] = $this->base_admin->settings->updateFormSettings($form_id, "border_color");
        $settings['border_color'] = ($settings['border_color'] == Null) ? "#E4E4E6" : $settings['border_color'];

        $settings['border_color_focus'] = $this->base_admin->settings->updateFormSettings($form_id, "border_color_focus");
        $settings['border_color_focus'] = ($settings['border_color_focus'] == Null) ? "#d9d9db" : $settings['border_color_focus'];

        $settings['text_color'] = $this->base_admin->settings->updateFormSettings($form_id, "text_color");
        $settings['text_color'] = ($settings['text_color'] == Null) ? "#43454b" : $settings['text_color'];

        $settings['text_color_focus'] = $this->base_admin->settings->updateFormSettings($form_id, "text_color_focus");
        $settings['text_color_focus'] = ($settings['text_color_focus'] == Null) ? "#43454b" : $settings['text_color_focus'];

        $settings['radio_checked_bg_color'] = $this->base_admin->settings->updateFormSettings($form_id, "radio_checked_bg_color");
        $settings['radio_checked_bg_color'] = ($settings['radio_checked_bg_color'] == Null) ? "#787B83" : $settings['radio_checked_bg_color'];

        $settings['label_color'] = $this->base_admin->settings->updateFormSettings($form_id, "label_color");
        $settings['label_color'] = ($settings['label_color'] == Null) ? "#2B2A2D" : $settings['label_color'];

        $settings['padding_top_bottom'] = $this->base_admin->settings->updateFormSettings($form_id, "padding_top_bottom");
        $settings['padding_top_bottom'] = ($settings['padding_top_bottom'] == Null) ? "6" : $settings['padding_top_bottom'];

        $settings['padding_left_right'] = $this->base_admin->settings->updateFormSettings($form_id, "padding_left_right");
        $settings['padding_left_right'] = ($settings['padding_left_right'] == Null) ? "12" : $settings['padding_left_right'];

        $settings['text_size'] = $this->base_admin->settings->updateFormSettings($form_id, "text_size");
        $settings['text_size'] = ($settings['text_size'] == Null) ? "14" : $settings['text_size'];

        $settings['label_text_size'] = $this->base_admin->settings->updateFormSettings($form_id, "label_text_size");
        $settings['label_text_size'] = ($settings['label_text_size'] == Null) ? "16" : $settings['label_text_size'];

        $settings['help_msg_tooltip_bg_color'] = $this->base_admin->settings->updateFormSettings($form_id, "help_msg_tooltip_bg_color");
        $settings['help_msg_tooltip_bg_color'] = ($settings['help_msg_tooltip_bg_color'] == Null) ? "#2B2A2D" : $settings['help_msg_tooltip_bg_color'];

        $settings['help_msg_tooltip_text_color'] = $this->base_admin->settings->updateFormSettings($form_id, "help_msg_tooltip_text_color");
        $settings['help_msg_tooltip_text_color'] = ($settings['help_msg_tooltip_text_color'] == Null) ? "#ffffff" : $settings['help_msg_tooltip_text_color'];

        $settings['help_msg_text_color'] = $this->base_admin->settings->updateFormSettings($form_id, "help_msg_text_color");
        $settings['help_msg_text_color'] = ($settings['help_msg_text_color'] == Null) ? "#8a8a8a" : $settings['help_msg_text_color'];

        $settings['help_msg_text_size'] = $this->base_admin->settings->updateFormSettings($form_id, "help_msg_text_size");
        $settings['help_msg_text_size'] = ($settings['help_msg_text_size'] == Null) ? "13" : $settings['help_msg_text_size'];

        $settings['star_rating_default_bg_color'] = $this->base_admin->settings->updateFormSettings($form_id, "star_rating_default_bg_color");
        $settings['star_rating_default_bg_color'] = ($settings['star_rating_default_bg_color'] == Null) ? "#c8c8c8" : $settings['star_rating_default_bg_color'];

        $settings['star_rating_checked_bg_color'] = $this->base_admin->settings->updateFormSettings($form_id, "star_rating_checked_bg_color");
        $settings['star_rating_checked_bg_color'] = ($settings['star_rating_checked_bg_color'] == Null) ? "#ffc107" : $settings['star_rating_checked_bg_color'];

        $settings['range_slider_track_color'] = $this->base_admin->settings->updateFormSettings($form_id, "range_slider_track_color");
        $settings['range_slider_track_color'] = ($settings['range_slider_track_color'] == Null) ? "#dadae5" : $settings['range_slider_track_color'];

        $settings['range_slider_thumb_color'] = $this->base_admin->settings->updateFormSettings($form_id, "range_slider_thumb_color");
        $settings['range_slider_thumb_color'] = ($settings['range_slider_thumb_color'] == Null) ? "#3264fe" : $settings['range_slider_thumb_color'];


        /* Conditional Logic Settings */
        $settings['conditional_logic'] = $this->base_admin->settings->updateFormSettings($form_id, "conditional_logic");
        $settings['conditional_logic'] = ($settings['conditional_logic'] == Null) ? "[]" : $settings['conditional_logic'];

        /* Email Notification Settings */
        $settings['email_notification'] = $this->base_admin->settings->updateFormSettings($form_id, "email_notification");
        $settings['email_notification'] = ($settings['email_notification'] == Null) ? "[]" : $settings['email_notification'];

        /* Integration Settings */
        $settings['integrations'] = $this->base_admin->settings->updateFormSettings($form_id, "integrations");
        $settings['integrations'] = ($settings['integrations'] == Null) ? "[]" : $settings['integrations'];

        /* WordPress User Roles */
        $settings['wp_user_roles'] = json_encode($this->base_admin->utils->get_wp_user_roles(),  JSON_UNESCAPED_UNICODE);


        $result = array("status" => 'true', "settings" => $settings);

    }else{
        $result = array("status" => 'false');
    }

}else{
    $result = array("status" => 'false');
}

echo json_encode($result,  JSON_UNESCAPED_UNICODE);