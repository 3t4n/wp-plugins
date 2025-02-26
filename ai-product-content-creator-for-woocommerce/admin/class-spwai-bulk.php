<?php
class SPWAI_Bulk {
    // Define the conditional_log function
    public static function conditional_log($message) {
        $enable_error_log = get_option('spwai_enable_error_log', 'yes');
        if ($enable_error_log === 'yes') {
            error_log($message);
        }
    }

    public static function handle_bulk_generate() {
    
        SPWAI_Bulk::conditional_log('handle_bulk_generate called');
        SPWAI_Bulk::conditional_log('POST Data: ' . print_r($_POST, true));
    
        if (!check_ajax_referer('spwai_nonce', 'security', false)) {
            SPWAI_Bulk::conditional_log('Nonce verification failed');
            wp_send_json_error(['message' => 'Nonce verification failed']);
            return;
        }
    
        if (!isset($_POST['options'])) {
            SPWAI_Bulk::conditional_log('Options missing');
            wp_send_json_error(['message' => 'Invalid request: options missing']);
            return;
        }
    
        $options = json_decode(stripslashes($_POST['options']), true);
        SPWAI_Bulk::conditional_log('Options Array: ' . print_r($options, true));
    
        $productId = intval($options['productId']);
        $selectedFields = isset($options['selectedFields']) ? $options['selectedFields'] : [];
        $promptField = sanitize_text_field($options['promptField']);
    
        $product = wc_get_product($productId);
        if (!$product) {
            SPWAI_Bulk::conditional_log("Invalid product ID: {$productId}");
            wp_send_json_error(['message' => "Invalid product ID: {$productId}"]);
            return;
        }
    
        // Initialize failure counters
        $failures = [
            'no_content' => [],
            'insufficient_content' => [],
            'api_errors' => [],
        ];
    
        // Check if the selected prompt field has content
        $fieldContent = '';
        switch ($promptField) {
            case 'title':
                $fieldContent = trim($product->get_title());
                break;
            case 'description':
                $fieldContent = trim($product->get_description());
                break;
            case 'shortdescription':
                $fieldContent = trim($product->get_short_description());
                break;
            case 'upc':
                $fieldContent = trim(get_post_meta($productId, '_global_unique_id', true));
                if (!empty($fieldContent)) {
                    $fieldContent .= ' - this is upc';
                }
                SPWAI_Bulk::conditional_log("Fetched UPC: {$fieldContent}");
                break;
            default:
                SPWAI_Bulk::conditional_log("Invalid prompt field: {$promptField}");
                wp_send_json_error(['message' => "Invalid prompt field: {$promptField}"]);
                return;
        }
    
        if (empty($fieldContent)) {
            $failures['no_content'][] = $productId;
            SPWAI_Bulk::conditional_log("Product {$productId} skipped: No content in field '{$promptField}'.");
    
            // Return failure response for "no content"
            wp_send_json_success([
                'failures' => $failures,
                'success' => false,
                'product_id' => $productId,
                'reason' => 'no_content',
                'message' => "Product {$productId} skipped due to no content in field '{$promptField}'.",
            ]);
            return;
        }
    
        if (str_word_count($fieldContent) < 2) {
            $failures['insufficient_content'][] = $productId;
            SPWAI_Bulk::conditional_log("Product {$productId} skipped: Insufficient content in field '{$promptField}'.");
    
            // Return failure response for "insufficient content"
            wp_send_json_success([
                'failures' => $failures,
                'success' => false,
                'product_id' => $productId,
                'reason' => 'insufficient_content',
                'message' => "Product {$productId} skipped due to insufficient content in field '{$promptField}'.",
            ]);
            return;
        }
    
        // Enhanced Prompt
        $prompt = '';
        switch ($promptField) {
            case 'title':
                $prompt = $product->get_title();
                break;
            case 'description':
                $prompt = $product->get_description();
                break;
            case 'shortdescription':
                $prompt = $product->get_short_description();
                break;
            case 'upc':
                $prompt = get_post_meta($productId, '_global_unique_id', true);
                if (!empty($prompt)) {
                    $prompt .= ' - this is upc';
                }
                SPWAI_Bulk::conditional_log("Prompt with UPC: {$prompt}");
                break;
            default:
                SPWAI_Bulk::conditional_log("Invalid prompt field: {$promptField}");
                wp_send_json_error(['message' => "Invalid prompt field: {$promptField}"]);
                return;
        }
    
        try {
            foreach ($selectedFields as $field) {
                $new_content = self::generate_content($prompt, $field);
    
                if (empty($new_content) || strpos($new_content, "I'm sorry") !== false) {
                    throw new Exception("OpenAI returned an insufficient response for field {$field}");
                }
    
                switch ($field) {
                    case 'title':
                        $product->set_name($new_content);
                        break;
                    case 'description':
                        $product->set_description($new_content);
                        break;
                    case 'shortdescription':
                        $product->set_short_description($new_content);
                        break;
                    default:
                        SPWAI_Bulk::conditional_log("Invalid field: {$field}");
                }
            }
    
            $product->save();
            SPWAI_Bulk::conditional_log("Product {$productId} updated successfully.");
            
            wp_send_json_success([
                'message' => "Product {$productId} updated successfully.",
                'success' => true,
                'failures' => $failures,
                'product_id' => $productId,
            ]);
        } catch (Exception $e) {
            SPWAI_Bulk::conditional_log("Error processing Product ID {$productId}: " . $e->getMessage());
    
            // Handle API-specific errors gracefully
            if (strpos($e->getMessage(), 'API Error') !== false) {
                wp_send_json_error([
                    'message' => $e->getMessage(),
                    'failures' => ['api_error' => true, 'error_message' => $e->getMessage()],
                    'product_id' => $productId,
                ]);
            } else {
                wp_send_json_error([
                    'message' => "Error processing Product ID {$productId}: " . $e->getMessage(),
                ]);
            }
        }
    }

    private static function generate_content($prompt, $type) {
        SPWAI_Bulk::conditional_log("Generating content with Prompt: {$prompt}, Type: {$type}");
        $openai = new SPWAI_OpenAI();

        try {
            $response = $openai->generate_text_from_openai($prompt, $type);

            if (isset($response['status']) && $response['status'] === 'success' && isset($response['message'])) {
                $generated_content = $response['message'];
                SPWAI_Bulk::conditional_log("Generated Content: {$generated_content}");
                return $generated_content;
            }

            // Handle API error cases
            if (isset($response['status']) && $response['status'] === 'failed') {
                $api_error_message = $response['message'] ?? 'An unknown API error occurred.';
                SPWAI_Bulk::conditional_log("Invalid OpenAI Response: " . print_r($response, true));

                // Return API-specific error
                throw new Exception("API Error: {$api_error_message}");
            }

            throw new Exception('Failed to generate content: Invalid API response.');
        } catch (Exception $e) {
            SPWAI_Bulk::conditional_log("Error generating content: " . $e->getMessage());
            throw $e;
        }
    }
}

if (class_exists('SPWAI_Bulk')) {
    add_action('wp_ajax_handle_bulk_generate', [SPWAI_Bulk::class, 'handle_bulk_generate']);
}

add_action('wp_ajax_get_product_field', 'spwai_get_product_field');

function spwai_get_product_field() {
    if (!check_ajax_referer('spwai_nonce', 'security', false)) {
        wp_send_json_error(['message' => 'Nonce verification failed']);
        return;
    }

    $productId = isset($_POST['productId']) ? intval($_POST['productId']) : 0;
    $field = isset($_POST['field']) ? sanitize_text_field($_POST['field']) : '';

    if (!$productId || !$field) {
        wp_send_json_error(['message' => 'Invalid product ID or field']);
        return;
    }

    $product = wc_get_product($productId);
    if (!$product) {
        wp_send_json_error(['message' => 'Invalid product ID']);
        return;
    }

    $content = '';
    switch ($field) {
        case 'title':
            $content = $product->get_title();
            break;
        case 'description':
            $content = $product->get_description();
            break;
        case 'shortdescription':
            $content = $product->get_short_description();
            break;
        case 'upc':
            $content = get_post_meta($productId, '_global_unique_id', true);
            SPWAI_Bulk::conditional_log("UPC 3: {$content}");
            break;
        default:
            wp_send_json_error(['message' => 'Invalid field']);
            return;
    }

    // Ensure we send the correct response
    if (!empty(trim($content))) {
        wp_send_json_success(['content' => trim($content)]);
    } else {
        wp_send_json_error(['message' => "No content found for field '{$field}'"]);
    }
}