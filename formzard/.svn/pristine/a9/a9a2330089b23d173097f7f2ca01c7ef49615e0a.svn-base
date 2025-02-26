<?php
add_action('wp_ajax_formzard_import_template', 'formzard_import_template');
function formzard_import_template() {
    global $for_fs;
    // Verify nonce for security
    check_ajax_referer('formzard_import_template_nonce', 'nonce');

    // Check if 'template_id' exists in the $_POST array
    if (empty($_POST['template_id'])) {
        wp_send_json_error(['message' => 'Template ID is missing']);
        return;
    }

    $template_id = sanitize_text_field(wp_unslash($_POST['template_id']));
    
    try {
        // Use formzard_load_template to retrieve the template
        $template = formzard_load_template($template_id);

        // Create a new Contact Form 7 form
        $form_data = [
            'post_title'   => $template['name'],
            'post_content' => $template['form'], // Assuming 'form' contains the form content
            'post_status'  => 'publish',
            'post_type'    => 'wpcf7_contact_form'
        ];

        $form_id = wp_insert_post($form_data);

        if (is_wp_error($form_id)) {
            wp_send_json_error(['message' => 'Failed to create form']);
            return;
        }

        // Update form meta with additional data
        update_post_meta($form_id, '_form', $template['form']);
        if (isset($template['mail'])) {
            update_post_meta($form_id, '_mail', $template['mail']);
        }

        wp_send_json_success([
            'message' => 'Template imported successfully',
            'form_id' => $form_id
        ]);
    } catch (Exception $e) {
        wp_send_json_error(['message' => $e->getMessage()]);
    }
}