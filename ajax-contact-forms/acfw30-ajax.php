<?php
function acfw30_send(){
		
	if(isset($_POST['id'])){
		$acfw30_id = sanitize_text_field($_POST['id']);
	} else {
		$acfw30_id = '';
	}

	if(isset($_POST['inputs'])){
		$acfw30_inputs = sanitize_text_field($_POST['inputs']);
	} else {
		$acfw30_inputs = '';
	}

	if(isset($_POST['textareas'])){
		$acfw30_textareas = sanitize_text_field($_POST['textareas']);
	} else {
		$acfw30_textareas = '';
	}

	$acfw30_inputs_array = explode('~', $acfw30_inputs);
	$acfw30_textareas_array = explode('~', $acfw30_textareas);

	$acfw30_email_send = get_post_meta($acfw30_id, 'acfw30_form_notice_email', true);
	$acfw30_title = get_post_meta($acfw30_id, 'acfw30_form_notice_title', true);
	$acfw30_message = get_post_meta($acfw30_id, 'acfw30_form_notice_text', true);

	if(empty($acfw30_email_send)) $acfw30_email_send = get_option('admin_email');
	if(empty($acfw30_title)) $acfw30_title = 'Contact form';
	if(empty($acfw30_message)) $acfw30_message = '';

	foreach ($acfw30_inputs_array as $acfw30_inputs) {
		$acfw30_input = explode('%%', $acfw30_inputs);
		
		$acfw30_find = "%$acfw30_input[0]%";
		$acfw30_find = str_ireplace(" ", "", $acfw30_find);

		$acfw30_replace = $acfw30_input[1];
		$acfw30_message = str_ireplace($acfw30_find, $acfw30_replace, $acfw30_message);
	}

	foreach ($acfw30_textareas_array as $acfw30_textareas) {
		$acfw30_textarea = explode('%%', $acfw30_textareas);
		
		$acfw30_find = "%$acfw30_textarea[0]%";
		$acfw30_find = str_ireplace(" ", "", $acfw30_find);

		$acfw30_replace = $acfw30_textarea[1];
		$acfw30_message = str_ireplace($acfw30_find, $acfw30_replace, $acfw30_message);
	}

	$acfw30_message = acfw30_validate_data("3000", "n", $acfw30_message);

	add_filter('wp_mail_charset', create_function('', 'return "utf-8";'));
	add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));

	wp_mail($acfw30_email_send, $acfw30_title, $acfw30_message, $headers, $attachments);
	
	remove_filter('wp_mail_charset', create_function('', 'return "utf-8";'));
	remove_filter('wp_mail_content_type', create_function('', 'return "text/html";'));

	wp_die();

}

add_action('wp_ajax_acfw30_send', 'acfw30_send');
add_action('wp_ajax_nopriv_acfw30_send', 'acfw30_send');
?>