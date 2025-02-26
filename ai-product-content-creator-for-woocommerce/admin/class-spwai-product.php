<?php

/**
 * Product related functionalities in admin end  
 *
 * @link       https://storepro.io/
 * @since      1.1.0
 * @package    ai-product-content-creator-for-woocommerce
 */
class Spwai_Product {

    /**
     * Add product metabox for extra fields 
     */
    public function add_product_meta_box() {
        add_meta_box('spwai-product-metabox', 'AI Product Content Generate', array($this, 'product_meta_box_content'), 'product', 'normal', 'high');
    }

    /**
     * Display content of the metabox
     */
    public function product_meta_box_content($post) {
        require_once(SPWAI_PATH . 'admin/partials/product-metabox.php');
    }

    /**
     * Add extra fields in Variation product
     */
    public function add_variation_meta($loop, $variation_data, $variation) {
        include(SPWAI_PATH . 'admin/partials/product-variation-meta.php');
    }

    /**
     * AJAX Handling: Generate text from OpenAI
     */
    public function generate_text() {
        if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'spwai_nonce')) {
            die('Permission check failed');
        }

        // Validate and sanitize prompt
        if (!isset($_POST['prompt'])) {
            die('Prompt not provided');
        }
        $prompt = sanitize_text_field(wp_unslash($_POST['prompt']));

        // Validate and sanitize field
        if (!isset($_POST['field'])) {
            die('Field not provided');
        }
        $field = sanitize_text_field(wp_unslash($_POST['field']));

        // Make a request to OpenAI API and get the response
        $result = Spwai_Openai::generate_text_from_openai($prompt, $field);

        // Return the generated description
        echo wp_json_encode($result);
        die();
    }

    /**
     * AJAX Handling: Save product data that was generated with OpenAI
     */
    public function save_product_data() {
        // Verify nonce
        if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'spwai_nonce')) {
            die('Permission check failed');
        }
    
        // Default response
        $result['status'] = 'failed';
        $result['message'] = 'Invalid request!';
    
        // Process update for the main product
        if (isset($_POST['product_id'])) {
            $product_id = intval($_POST['product_id']);
    
            // Validate and sanitize fields
            if (!isset($_POST['fields']) || !is_array($_POST['fields'])) {
                die('Fields not provided or invalid');
            }
            $fields = array_map(function($field) {
                return is_array($field) ? array_map('wp_kses_post', $field) : wp_kses_post($field);
            }, wp_unslash($_POST['fields']));
    
            if (!empty($product_id) && !empty($fields)) {
                // Set update data as an array
                $update_data = [];
                foreach ($fields as $field => $value) {
                    if (!empty(trim($value))) {
                        if ($field === 'title') {
                            $update_data['post_title'] = sanitize_text_field(trim($value));
                        } elseif ($field === 'description') {
                            $update_data['post_content'] = wp_kses_post(trim($value));
                        } elseif ($field === 'shortdescription') {
                            $update_data['post_excerpt'] = wp_kses_post(trim($value));
                        }
                    }
                }
                // Update WooCommerce product data
                if (!empty($update_data)) {
                    $update_data['ID'] = $product_id;
                    wp_update_post($update_data);
                    $result['status'] = 'success';
                    $result['message'] = 'Updated Successfully';
                } else {
                    $result['message'] = 'No values in generated fields!';
                }
            }
        } 
        // Process update for variation
        else if (isset($_POST['variation_id'])) {
            $variation_id = intval($_POST['variation_id']);
    
            // Validate and sanitize description
            if (!isset($_POST['description'])) {
                die('Description not provided');
            }
            $description = wp_kses_post(trim(wp_unslash($_POST['description'])));
    
            if (!empty($variation_id) && !empty($description)) {
                // Update the variation description
                update_post_meta($variation_id, '_variation_description', $description);
                $result['status'] = 'success';
                $result['message'] = 'Updated Successfully';
            }
        }
    
        // Send a response
        echo wp_json_encode($result);
        die();
    }
}

function spwai_save_new_content() {
    // Security check
    if (!check_ajax_referer('spwai_save_nonce', 'security', false)) {
        wp_send_json_error(array('message' => 'Invalid security token.'));
    }

    // Validate and sanitize inputs
    $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;
    $field = isset($_POST['field']) ? sanitize_text_field($_POST['field']) : '';
    $new_content = isset($_POST['new_content']) ? wp_kses_post($_POST['new_content']) : '';

    // Error handling for missing data
    if (!$post_id || empty($field) || empty($new_content)) {
        error_log("Invalid data in AJAX save request. Post ID: $post_id, Field: $field, New Content: $new_content");
        wp_send_json_error(array('message' => 'Invalid data.'));
    }

    // Set update data as an array
    $update_data = [];

    // Update the post based on the selected field
    if ($field === 'title') {
        $update_data['post_title'] = sanitize_text_field(trim($new_content));
    } elseif ($field === 'description') {
        $update_data['post_content'] = trim($new_content);
    } elseif ($field === 'shortdescription') {
        $update_data['post_excerpt'] = sanitize_textarea_field(trim($new_content));
    }

    // Update WooCommerce product data
    if (!empty($update_data)) {
        $update_data['ID'] = $post_id;
        wp_update_post($update_data);
        $result['status'] = 'success';
        $result['message'] = 'Updated Successfully';
    } else {
        $result['message'] = 'No values in generated fields!';
    }

    // Send success response
    wp_send_json_success(array('message' => 'Content saved successfully!'));
}

add_action('wp_ajax_spwai_save_new_content', 'spwai_save_new_content');

/**
 * Handle AJAX request for generating new content
 */
function spwai_generate_new_content() {
    // Check for nonce security
    if (!isset($_POST['security']) || !wp_verify_nonce($_POST['security'], 'spwai_nonce')) {
        wp_send_json_error(array('message' => 'Nonce verification failed.'));
    }

    // Get the field and current content
    $field = sanitize_text_field($_POST['field']);
    $current_content = sanitize_text_field($_POST['current_content']);

    if (empty($field) || empty($current_content)) {
        wp_send_json_error(array('message' => 'Field or content is empty.'));
    }

    // Generate new content using OpenAI (this is just a placeholder for the actual logic)
    $new_content = Spwai_Openai::generate_text_from_openai($current_content, $field);

    if ($new_content) {
        // Return the generated content as JSON
        wp_send_json_success(array('new_content' => $new_content));
    } else {
        wp_send_json_error(array('message' => 'Failed to generate new content.'));
    }
}

add_action('wp_ajax_spwai_generate_new_content', 'spwai_generate_new_content');

/**
 * Save content via AJAX
 */
function spwai_save_content() {
    check_ajax_referer('spwai_nonce', '_ajax_nonce');

    $field = sanitize_text_field($_POST['field']);
    $product_id = intval($_POST['product_id']);
    $new_content = $_POST['new_content'];

    if (!$field || !$product_id || !$new_content) {
        wp_send_json_error(array('message' => 'Invalid request.'));
    }

    // Update the product with the new content
    switch ($field) {
        case 'title':
            wp_update_post(array(
                'ID' => $product_id,
                'post_title' => $new_content
            ));
            break;
        case 'description':
            wp_update_post(array(
                'ID' => $product_id,
                'post_content' => $new_content
            ));
            break;
        case 'shortdescription':
            wp_update_post(array(
                'ID' => $product_id,
                'post_excerpt' => $new_content
            ));
            break;
        default:
            wp_send_json_error(array('message' => 'Invalid field.'));
    }

    wp_send_json_success();
}
add_action('wp_ajax_spwai_save_content', 'spwai_save_content');