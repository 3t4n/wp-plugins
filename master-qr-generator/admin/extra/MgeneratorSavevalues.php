<?php


	$sanitary_values = array();
	if (isset($input['qr_code_picture_size_width']))
	{
	    $sanitary_values['qr_code_picture_size_width'] = sanitize_text_field($input['qr_code_picture_size_width']);
	}

	if (isset($input['qr_download_text']))
	{
	    $sanitary_values['qr_download_text'] = sanitize_text_field($input['qr_download_text']);
	}

	if (isset($input['background']))
	{
	    $sanitary_values['background'] = sanitize_text_field($input['background']);
	}
	if (isset($input['qr_color']))
	{
	    $sanitary_values['qr_color'] = sanitize_text_field($input['qr_color']);
	}

	if (isset($input['dot_scale']))
	{
	    $sanitary_values['dot_scale'] = sanitize_text_field($input['dot_scale']);
	}

	if (isset($input['dt_clor']))
	{
	    $sanitary_values['dt_clor'] = $input['dt_clor'];
	}

	if (isset($input['dt_background']))
	{
	    $sanitary_values['dt_background'] = $input['dt_background'];
	}

	if (isset($input['qr_download_hide']))
	{
	    $sanitary_values['qr_download_hide'] = $input['qr_download_hide'];
	}
	if (isset($input['qr_print_text']))
	{
	    $sanitary_values['qr_print_text'] = $input['qr_print_text'];
	}
	if (isset($input['qr_print_hide']))
	{
	    $sanitary_values['qr_print_hide'] = $input['qr_print_hide'];
	}
	if (isset($input['print_clor']))
	{
	    $sanitary_values['print_clor'] = $input['print_clor'];
	}
	if (isset($input['print_background']))
	{
	    $sanitary_values['print_background'] = $input['print_background'];
	}


