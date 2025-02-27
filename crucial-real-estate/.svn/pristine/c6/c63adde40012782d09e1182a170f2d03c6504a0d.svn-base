<?php
/**
 * Form Handler related functions.
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! function_exists('cre_send_contact_message') ) {
	/**
	 * Handler for Contact form on contact page template
	 */
	function cre_send_contact_message() {

		if ( isset($_POST['email']) ) :

			/*
			 * Verify Nonce
			 */
			if ( ! isset($_POST['nonce']) || ! wp_verify_nonce($_POST['nonce'], 'send_message_nonce')) {
				echo json_encode(array(
					'success' => false,
					'message' => esc_html__('Unverified Nonce!', 'crucial-real-estate')
				));
				die;
			}

			/*
			 * Sanitize and Validate Target email address that will be configured from theme options
			 */

			$to_email = is_email( sanitize_email( get_option('admin_email') ) );

			if (!$to_email) {
				echo json_encode(array(
					'success' => false,
					'message' => esc_html__('Target Email address is not properly configured!', 'crucial-real-estate')
				));
				die;
			}

			/*
			 * Sanitize and Validate contact form input data
			 */
			$from_name      = sanitize_text_field($_POST['name']);
			$message        = sanitize_textarea_field($_POST['message']);
            $from_email     = is_email( sanitize_email($_POST['email']) );
			if (!$from_email) {
				echo json_encode(array(
					'success' => false,
					'message' => esc_html__('Provided Email address is invalid!', 'crucial-real-estate')
				));
				die;
			}

			/*
			 * Email Subject
			 */
            $email_subject = sprintf(
                esc_html__('New message sent by %1$s using contact form at %2$s', 'crucial-real-estate'),
                esc_html( $from_name ),
                esc_html( get_bloginfo('name') )

            );

			/*
			 * Email Body
			 */
			$email_body = array();

			if (isset($_POST['property_title'])) {
				$property_title = sanitize_text_field($_POST['property_title']);
				if (!empty($property_title)) {
					$email_body[] = array(
						'name'  => esc_html__('Property Title', 'crucial-real-estate'),
						'value' => esc_html($property_title),
					);
				}
			}

			if (isset($_POST['property_permalink'])) {
				$property_permalink = esc_url_raw($_POST['property_permalink']);
				if (!empty($property_permalink)) {
					$email_body[] = array(
						'name'  => esc_html__('Property URL', 'crucial-real-estate'),
						'value' => esc_html($property_permalink),
					);
				}
			}

			$email_body[] = array(
				'name'  => esc_html__('Name', 'crucial-real-estate'),
				'value' => esc_html($from_name),
			);

			$email_body[] = array(
				'name'  => esc_html__('Email', 'crucial-real-estate'),
				'value' => esc_html($from_email),
			);

			$email_body[] = array(
				'name'  => esc_html__('Message', 'crucial-real-estate'),
				'value' => esc_textarea($message),
			);

			if ('1' == intval(get_option('cre_gdpr_in_email', '0'))) {
				$GDPR_agreement = intval($_POST['gdpr']);
				if (!empty($GDPR_agreement)) {
					$email_body[] = array(
						'name'  => esc_html__('GDPR Agreement', 'crucial-real-estate'),
						'value' => esc_html($GDPR_agreement),
					);
				}
			}

			$email_body = cre_email_template($email_body);

			/*
			 * Email Headers ( Reply To and Content Type )
			 */
			$headers = array();

			$headers[] = "Reply-To: $from_name <$from_email>";
			$headers[] = "Content-Type: text/html; charset=UTF-8";
			$headers = apply_filters("cre_contact_mail_header", $headers);    // just in case if you want to modify the header in child theme

			if (wp_mail($to_email, $email_subject, $email_body, $headers)) {

				echo json_encode(array(
					'success' => true,
					'message' => esc_html__('Message Sent Successfully!', 'crucial-real-estate')
				));
			} else {
				echo json_encode(array(
					'success' => false,
					'message' => esc_html__('Server Error: WordPress mail function failed!', 'crucial-real-estate')
				));
			}

		else :
			echo json_encode(array(
				'success' => false,
				'message' => esc_html__('Invalid Request !', 'crucial-real-estate')
			));
		endif;

		do_action('cre_after_contact_form_submit');

		die;
	}

	add_action('wp_ajax_nopriv_send_message', 'cre_send_contact_message');
	add_action('wp_ajax_send_message', 'cre_send_contact_message');
}

if ( ! function_exists('cre_get_email_templates') ) {
	/**
	 * Returns email templates HTML code.
	 *
	 * @return array
	 */
	function cre_get_email_templates() {

		$email_templates = array();
		ob_start();
		include_once(CRE_PLUGIN_DIR . 'includes/email-template/field-template.php');
		$email_templates['field'] = ob_get_clean();

		ob_start();
		include_once(CRE_PLUGIN_DIR . 'includes/email-template/email-template.php');
		$email_templates['email'] = ob_get_clean();

		return $email_templates;
	}
}

if (!function_exists('cre_apply_email_template')) {
	/**
	 * Applies the email template.
	 *
	 * @param array $form_fields
	 * @param string $form_id
	 * @param string $field_template
	 * @param string $email_template
	 *
	 * @return string
	 */
	function cre_apply_email_template($form_fields, $form_id, $field_template, $email_template)
	{

		$form_fields = apply_filters('cre_email_template_form_fields', $form_fields, $form_id);

		$body = esc_html__('No field provided.', 'crucial-real-estate');

		if (!empty($form_fields) && is_array($form_fields)) {
			$body  = '';
			$index = 1;
			foreach ($form_fields as $form_field) {
				$field = $field_template;
				if (1 === $index) {
					$field = str_replace('border-top:1px solid #dddddd;', '', $field);
				}

				if (!empty($form_field['value'])) {
					$field = str_replace('{{name}}', $form_field['name'], $field);
					$field = str_replace('{{value}}', $form_field['value'], $field);
					$body  .= wpautop($field);
				}

				$index++;
			}
		}

		$template = str_replace('{{body_fields}}', $body, $email_template);
		$template = make_clickable($template);

		return apply_filters('cre_email_template', $template, $form_id);
	}
}

if ( ! function_exists('cre_email_template') ) {
	/**
	 * Build the email template.
	 *
	 * @param array $form_fields
	 * @param string $form_id
	 *
	 * @return string
	 */
	function cre_email_template($form_fields, $form_id = 'contact_form') {
		$email_templates = cre_get_email_templates();
		return cre_apply_email_template($form_fields, $form_id, $email_templates['field'], $email_templates['email']);
	}
}
