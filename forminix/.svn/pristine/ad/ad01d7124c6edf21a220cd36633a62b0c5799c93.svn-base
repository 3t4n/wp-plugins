<?php

$result = array();

/* Check if user has admin capabilities */
if(current_user_can('manage_options')){

    if(isset($_REQUEST['form_id'])){


        $form_id = sanitize_text_field($_REQUEST['form_id']);

        /* Confirmation Settings */
        if(isset($_REQUEST['confirmation_type'])){
            $this->base_admin->settings->updateFormSettings($form_id, "confirmation_type", sanitize_text_field($_REQUEST['confirmation_type']));
        }
        if(isset($_REQUEST['confirmation_msg'])){
            $this->base_admin->settings->updateFormSettings($form_id, "confirmation_msg", wp_filter_post_kses($_REQUEST['confirmation_msg']));
        }
        if(isset($_REQUEST['confirmation_form_status'])){
            $this->base_admin->settings->updateFormSettings($form_id, "confirmation_form_status", sanitize_text_field($_REQUEST['confirmation_form_status']));
        }
        if(isset($_REQUEST['confirmation_custom_url'])){
            $this->base_admin->settings->updateFormSettings($form_id, "confirmation_custom_url", sanitize_text_field($_REQUEST['confirmation_custom_url']));
        }


        /* Form Layout Settings */
        if(isset($_REQUEST['help_message_position'])){
            $this->base_admin->settings->updateFormSettings($form_id, "help_message_position", sanitize_text_field($_REQUEST['help_message_position']));
        }
        if(isset($_REQUEST['asterisk_position'])){
            $this->base_admin->settings->updateFormSettings($form_id, "asterisk_position", sanitize_text_field($_REQUEST['asterisk_position']));
        }

        /* Form Scheduling & Restrictions Settings */
        if(isset($_REQUEST['enable_form_scheduling'])){
            $this->base_admin->settings->updateFormSettings($form_id, "enable_form_scheduling", sanitize_text_field($_REQUEST['enable_form_scheduling']));
        }
        if(isset($_REQUEST['form_scheduling_start_datetime'])){
            $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_start_datetime", sanitize_text_field($_REQUEST['form_scheduling_start_datetime']));
        }
        if(isset($_REQUEST['form_scheduling_end_datetime'])){
            $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_end_datetime", sanitize_text_field($_REQUEST['form_scheduling_end_datetime']));
        }
        if(isset($_REQUEST['form_scheduling_inactive_msg'])){
            $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_inactive_msg", wp_filter_post_kses($_REQUEST['form_scheduling_inactive_msg']));
        }
        if(isset($_REQUEST['form_scheduling_expired_msg'])){
            $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_expired_msg", wp_filter_post_kses($_REQUEST['form_scheduling_expired_msg']));
        }
        if(isset($_REQUEST['form_scheduling_exclude_weekday_sat'])){
            $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_exclude_weekday_sat", sanitize_text_field($_REQUEST['form_scheduling_exclude_weekday_sat']));
        }
        if(isset($_REQUEST['form_scheduling_exclude_weekday_sun'])){
            $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_exclude_weekday_sun", sanitize_text_field($_REQUEST['form_scheduling_exclude_weekday_sun']));
        }
        if(isset($_REQUEST['form_scheduling_exclude_weekday_mon'])){
            $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_exclude_weekday_mon", sanitize_text_field($_REQUEST['form_scheduling_exclude_weekday_mon']));
        }
        if(isset($_REQUEST['form_scheduling_exclude_weekday_tue'])){
            $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_exclude_weekday_tue", sanitize_text_field($_REQUEST['form_scheduling_exclude_weekday_tue']));
        }
        if(isset($_REQUEST['form_scheduling_exclude_weekday_wed'])){
            $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_exclude_weekday_wed", sanitize_text_field($_REQUEST['form_scheduling_exclude_weekday_wed']));
        }
        if(isset($_REQUEST['form_scheduling_exclude_weekday_thu'])){
            $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_exclude_weekday_thu", sanitize_text_field($_REQUEST['form_scheduling_exclude_weekday_thu']));
        }
        if(isset($_REQUEST['form_scheduling_exclude_weekday_fri'])){
            $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_exclude_weekday_fri", sanitize_text_field($_REQUEST['form_scheduling_exclude_weekday_fri']));
        }
        if(isset($_REQUEST['allow_logged_in_only'])){
            $this->base_admin->settings->updateFormSettings($form_id, "allow_logged_in_only", sanitize_text_field($_REQUEST['allow_logged_in_only']));
        }
        if(isset($_REQUEST['require_login_msg'])){
            $this->base_admin->settings->updateFormSettings($form_id, "require_login_msg", wp_filter_post_kses($_REQUEST['require_login_msg']));
        }
        if(isset($_REQUEST['enable_maximum_entry_limit'])){
            $this->base_admin->settings->updateFormSettings($form_id, "enable_maximum_entry_limit", sanitize_text_field($_REQUEST['enable_maximum_entry_limit']));
        }
        if(isset($_REQUEST['maximum_entry_amount'])){
            $this->base_admin->settings->updateFormSettings($form_id, "maximum_entry_amount", sanitize_text_field($_REQUEST['maximum_entry_amount']));
        }
        if(isset($_REQUEST['maximum_entry_limitation_type'])){
            $this->base_admin->settings->updateFormSettings($form_id, "maximum_entry_limitation_type", sanitize_text_field($_REQUEST['maximum_entry_limitation_type']));
        }
        if(isset($_REQUEST['maximum_entry_limitation_msg'])){
            $this->base_admin->settings->updateFormSettings($form_id, "maximum_entry_limitation_msg", wp_filter_post_kses($_REQUEST['maximum_entry_limitation_msg']));
        }

        /* Field Customization Settings */
        if(isset($_REQUEST['bg_color'])){
            $this->base_admin->settings->updateFormSettings($form_id, "bg_color", sanitize_text_field($_REQUEST['bg_color']));
        }
        if(isset($_REQUEST['bg_color_focus'])){
            $this->base_admin->settings->updateFormSettings($form_id, "bg_color_focus", sanitize_text_field($_REQUEST['bg_color_focus']));
        }
        if(isset($_REQUEST['border_color'])){
            $this->base_admin->settings->updateFormSettings($form_id, "border_color", sanitize_text_field($_REQUEST['border_color']));
        }
        if(isset($_REQUEST['border_color_focus'])){
            $this->base_admin->settings->updateFormSettings($form_id, "border_color_focus", sanitize_text_field($_REQUEST['border_color_focus']));
        }
        if(isset($_REQUEST['text_color'])){
            $this->base_admin->settings->updateFormSettings($form_id, "text_color", sanitize_text_field($_REQUEST['text_color']));
        }
        if(isset($_REQUEST['text_color_focus'])){
            $this->base_admin->settings->updateFormSettings($form_id, "text_color_focus", sanitize_text_field($_REQUEST['text_color_focus']));
        }
        if(isset($_REQUEST['radio_checked_bg_color'])){
            $this->base_admin->settings->updateFormSettings($form_id, "radio_checked_bg_color", sanitize_text_field($_REQUEST['radio_checked_bg_color']));
        }
        if(isset($_REQUEST['label_color'])){
            $this->base_admin->settings->updateFormSettings($form_id, "label_color", sanitize_text_field($_REQUEST['label_color']));
        }
        if(isset($_REQUEST['padding_top_bottom'])){
            $this->base_admin->settings->updateFormSettings($form_id, "padding_top_bottom", sanitize_text_field($_REQUEST['padding_top_bottom']));
        }
        if(isset($_REQUEST['padding_left_right'])){
            $this->base_admin->settings->updateFormSettings($form_id, "padding_left_right", sanitize_text_field($_REQUEST['padding_left_right']));
        }
        if(isset($_REQUEST['text_size'])){
            $this->base_admin->settings->updateFormSettings($form_id, "text_size", sanitize_text_field($_REQUEST['text_size']));
        }
        if(isset($_REQUEST['label_text_size'])){
            $this->base_admin->settings->updateFormSettings($form_id, "label_text_size", sanitize_text_field($_REQUEST['label_text_size']));
        }
        if(isset($_REQUEST['help_msg_tooltip_bg_color'])){
            $this->base_admin->settings->updateFormSettings($form_id, "help_msg_tooltip_bg_color", sanitize_text_field($_REQUEST['help_msg_tooltip_bg_color']));
        }
        if(isset($_REQUEST['help_msg_tooltip_text_color'])){
            $this->base_admin->settings->updateFormSettings($form_id, "help_msg_tooltip_text_color", sanitize_text_field($_REQUEST['help_msg_tooltip_text_color']));
        }
        if(isset($_REQUEST['help_msg_text_color'])){
            $this->base_admin->settings->updateFormSettings($form_id, "help_msg_text_color", sanitize_text_field($_REQUEST['help_msg_text_color']));
        }
        if(isset($_REQUEST['help_msg_text_size'])){
            $this->base_admin->settings->updateFormSettings($form_id, "help_msg_text_size", sanitize_text_field($_REQUEST['help_msg_text_size']));
        }
        if(isset($_REQUEST['star_rating_default_bg_color'])){
            $this->base_admin->settings->updateFormSettings($form_id, "star_rating_default_bg_color", sanitize_text_field($_REQUEST['star_rating_default_bg_color']));
        }
        if(isset($_REQUEST['star_rating_checked_bg_color'])){
            $this->base_admin->settings->updateFormSettings($form_id, "star_rating_checked_bg_color", sanitize_text_field($_REQUEST['star_rating_checked_bg_color']));
        }
        if(isset($_REQUEST['range_slider_track_color'])){
            $this->base_admin->settings->updateFormSettings($form_id, "range_slider_track_color", sanitize_text_field($_REQUEST['range_slider_track_color']));
        }
        if(isset($_REQUEST['range_slider_thumb_color'])){
            $this->base_admin->settings->updateFormSettings($form_id, "range_slider_thumb_color", sanitize_text_field($_REQUEST['range_slider_thumb_color']));
        }



        /* Conditional Logic Settings */
        if(isset($_REQUEST['conditional_logic'])){
            $this->base_admin->settings->updateFormSettings($form_id, "conditional_logic", sanitize_text_field($_REQUEST['conditional_logic']));
        }

        /* Email Notification Settings */
        if(isset($_REQUEST['email_notification'])){
            $this->base_admin->settings->updateFormSettings($form_id, "email_notification", wp_filter_post_kses($_REQUEST['email_notification']));
        }

        /* Integration Settings */
        if(isset($_REQUEST['integrations'])){
            $this->base_admin->settings->updateFormSettings($form_id, "integrations", wp_filter_post_kses($_REQUEST['integrations']));
        }

        $result = array("status" => "true");

    }else{
        $result = array("status" => 'false');
    }
}else{
    $result = array("status" => 'false');
}

echo json_encode($result,  JSON_UNESCAPED_UNICODE);