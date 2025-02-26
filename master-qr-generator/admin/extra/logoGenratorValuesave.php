<?php

    $sanitary_values = array();

    if (isset($input['qr_code_custom_text']))
    {
        $sanitary_values['qr_code_custom_text'] = sanitize_text_field($input['qr_code_custom_text']);
    }
    if (isset($input['qr_code_mail_text']))
    {
        $sanitary_values['qr_code_mail_text'] = sanitize_text_field($input['qr_code_mail_text']);
    }

    if (isset($input['qr_code_wifi_name']))
    {
        $sanitary_values['qr_code_wifi_name'] = $input['qr_code_wifi_name'];
    }
    if (isset($input['qr_code_wifi_password']))
    {
        $sanitary_values['qr_code_wifi_password'] = $input['qr_code_wifi_password'];
    }
    if (isset($input['qr_code_wifi_type']))
    {
        $sanitary_values['qr_code_wifi_type'] = $input['qr_code_wifi_type'];
    }

    if (isset($input['qr_code_lati_type']))
    {
        $sanitary_values['qr_code_lati_type'] = $input['qr_code_lati_type'];
    }
    if (isset($input['qr_code_longitude']))
    {
        $sanitary_values['qr_code_longitude'] = $input['qr_code_longitude'];
    }
    if (isset($input['qr_code_maps_text']))
    {
        $sanitary_values['qr_code_maps_text'] = $input['qr_code_maps_text'];
    }


    if (isset($input['mastervcard_name']))
    {
        $sanitary_values['mastervcard_name'] = sanitize_text_field($input['mastervcard_name']);
    }
    if (isset($input['mastervcard_company']))
    {
        $sanitary_values['mastervcard_company'] = sanitize_text_field($input['mastervcard_company']);
    }
    if (isset($input['mastervcard_subtitle']))
    {
        $sanitary_values['mastervcard_subtitle'] = sanitize_text_field($input['mastervcard_subtitle']);
    }
    if (isset($input['mastervcard_mbunber']))
    {
        $sanitary_values['mastervcard_mbunber'] = sanitize_text_field($input['mastervcard_mbunber']);
    }
    if (isset($input['mastervcard_pbunber']))
    {
        $sanitary_values['mastervcard_pbunber'] = sanitize_text_field($input['mastervcard_pbunber']);
    }
    if (isset($input['mastervcard_email']))
    {
        $sanitary_values['mastervcard_email'] = sanitize_text_field($input['mastervcard_email']);
    }
    if (isset($input['mastervcard_address']))
    {
        $sanitary_values['mastervcard_address'] = sanitize_text_field($input['mastervcard_address']);
    }

    if (isset($input['mastervcard_website']))
    {
        $sanitary_values['mastervcard_website'] = sanitize_text_field($input['mastervcard_website']);
    }

    if (isset($input['mastervcard_note']))
    {
        $sanitary_values['mastervcard_note'] = sanitize_text_field($input['mastervcard_note']);
    }

