<?php
function chat_whatsapp_form_submission() {

// Verify the nonce
if (!isset($_POST['nonce']) || !wp_verify_nonce(wp_unslash($_POST['nonce']), 'chat_whatsapp_nonce')) {
    wp_send_json_error('Invalid nonce');
    wp_die();
}

// Sanitize and retrieve POST data
$name = sanitize_text_field(wp_unslash($_POST['name']));
$message = sanitize_textarea_field(wp_unslash($_POST['message']));
$whatsapp_template = sanitize_text_field(wp_unslash($_POST['template']));
$whatsapp_number  = sanitize_text_field(wp_unslash($_POST['agent']));
$currentURL = sanitize_url(wp_unslash($_POST['current_url']));

// Prepare variables for the template
$date = gmdate('F j, Y, H:i (h:i A) (\G\M\T O)');
$siteURL = get_site_url();
$variables = array('{name}', '{message}', '{date}',  '{siteURL}', '{currentURL}');
$values = array($name, $message, $date, $siteURL, $currentURL);
$text = trim(str_replace($variables, $values, $whatsapp_template));
$whatsAppURL = 'https://wa.me/' . esc_attr($whatsapp_number) . '?text=' . urlencode($text);

// Send the WhatsApp URL back to the client
wp_send_json_success(array('whatsAppURL' => $whatsAppURL));

wp_die(); // Terminate immediately and return a proper response
}

// Add action hook for AJAX
add_action('wp_ajax_handle_form_submission', 'chat_whatsapp_form_submission');
add_action('wp_ajax_nopriv_handle_form_submission', 'chat_whatsapp_form_submission');
