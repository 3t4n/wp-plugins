<?php

/**
 * Openai api handling
 *
 * @link       https://storepro.io/
 * @since      1.0.0
 * @package    ai-product-content-creator-for-woocommerce
 */
class Spwai_Openai
{
    const SPWAI_EP_CHAT = 'https://api.openai.com/v1/chat/completions'; // chat endpoint

    /**
     * Generate text from openai
     */

    public static function generate_text_from_openai($prompt, $field)
    {

        $is_upc_check= 'No';
        $is_desc_check= 'No';

        $is_upc = false;
        
        if (strpos($prompt, '- this is upc') !== false) {
            $is_upc = true;
            $is_upc_check= 'Yes';
            $prompt = str_replace('- this is upc', '', $prompt);
        }

        $is_desc = false;

        $max_length = 70;
        if ($field == 'description') {
            $is_desc = true;
            $max_length = 800;
        } elseif ($field == 'shortdescription') {
            $max_length = 400;
        } elseif ($field == 'var-description') {
            $max_length = 400;
        }

        $generate='';
        if ($field == 'title') {
            $generate='title';
        } elseif ($field == 'description') {
            $generate='description';
        } elseif ($field == 'shortdescription') {
            $generate='short description';
        } elseif ($field == 'var-description') {
            $generate='variable description';
        }

        // Fetch customization options
        $target_audience = get_option('spwai_target_audience', 'general audience');
        $tone = get_option('spwai_tone', 'neutral');
        $style = get_option('spwai_style', 'informative');

        $description_format = 'No requirement';

        if($field == 'description'){
            $is_desc = true;
            $is_desc_check= 'Yes';
            $description_format = get_option('spwai_description_format', 'paragraph');
        }

        if ($is_upc) {
            $SYSTEM = "You will receive a product UPC number, word count, audience, tone, style, description style, and additional attributes. Your task is to generate an engaging and informative product {$generate} based on the provided UPC number but do not include the UPC itself in the content. If the UPC is invalid, return API: Failed with error-code-999. Always use sensible words in the output.";
        } else {
            switch ($field) {
            case 'title':
                $SYSTEM = "You will receive a product data, word count, audience, tone, style, and additional attributes. Your task is to generate an engaging and informative product title. Always use sensible words in the output.";
                break;
            case 'description':
                $SYSTEM = "You will receive product data, word count, audience, tone, style, description style, and additional attributes. Your task is to generate an engaging and informative product description. Always use sensible words in the output.";

                break;
            case 'shortdescription':
                $SYSTEM = "You will receive a product data, word count, audience, tone, style, and additional attributes. Your task is to generate an engaging and informative product short description. Always use sensible words in the output.";
                break;
            case 'var-description':
                $SYSTEM = "You will receive a product data, word count, audience, tone, style, and additional attributes. Your task is to generate an engaging and informative product variable description. Always use sensible words in the output.";
                break;
            default:
                $SYSTEM = "You are an AI assistant. The provided input is invalid. Respond as 'INVALID INPUT'.";
                break;
            }
        }

        $USER = "Product Data: {$prompt} \n
        Word Count: Maximum {$max_length} characters (including spaces) \n
        Audience: {$target_audience} \n
        Tone: {$tone} \n
        Style: {$style} \n
        Description Style: {$description_format} \n
        Is Description: {$is_desc_check} \n
        Is UPC: {$is_upc_check} \n

        If 'Is UPC' is Yes, the product data is a UPC number. \n
        If 'Is Description' is No, ignore the description style. \n
        If 'is description' is Yes, Follow these guidelines: \n
                1. If 'Description Style' is 'Bullet Points': Format the description as Bullet Points. Always use dots (•) for bullet points. Ensure each point is concise and aligned with the product data. \n
                2. If 'Description Style' is 'Paragraph': Write a cohesive and engaging two or more paragraphs that fully describes the product within the word count. \n 
                3. 'If Description Style' is 'Bullet Points with Paragraph': 
                    - Start with a detailed paragraph (4-6 lines) that provides an overview of the product.
                    - Follow with a heading like 'Key Features:' or 'Highlights:'.
                    - Use dots (•) for bullet points under the heading, listing key features or benefits. \n
                4. Avoid using terms like 'paragraph,' 'bullet points,' or 'descriptions' in the output. \n
                5. Do not use any formatting symbols like `**` for bold. Instead, use clear and descriptive language to emphasize key points. \n
                6. Ensure the tone, style, and audience alignment are maintained throughout the description";


        $result = ['status' => 'failed'];

        // Data to be sent to the API
        $data = array(
            'model' => sanitize_text_field(trim(get_option('spwai_model'))), // Specify the GPT-3.5-turbo model
            'messages' => array(
                array('role' => 'system', 'content' => sanitize_text_field($SYSTEM)),
                array('role' => 'user', 'content' => sanitize_text_field($USER))
            )
        );

        // Setup headers
        $headers = array(
            'Authorization' => 'Bearer ' . sanitize_text_field(trim(get_option('spwai_api_key'))),
            'Content-Type' => 'application/json'
        );

        // Log the prompt and system message
        error_log("OpenAI API Request: User: {$USER}, \n System Message: {$SYSTEM}");

        // Make the API request
        $response = wp_remote_post(self::SPWAI_EP_CHAT, array(
            'method' => 'POST',
            'headers' => $headers,
            'body' => wp_json_encode($data),
            'data_format' => 'body',
            'timeout' => 60
        ));



        // Check if the API request was successful
        if (is_wp_error($response)) {
            $result['message'] = 'Failed to connect OpenAI API: ' . $response->get_error_message() . ' Please try again.';
            return $result;
        }

        // Access response code
        $response_code = wp_remote_retrieve_response_code($response);
        // Decode the response body
        $response_body = json_decode(wp_remote_retrieve_body($response), true);

        // Check if the response contains the expected data
        if (!isset($response_body['choices'][0]['message']['content'])) {

            $settings_page = admin_url('admin.php?page=' . SPWAI_NAME);
            // check errors in response
            switch ($response_code) {
                case '401':
                    $result['message'] = 'API Error: Invalid Authentication. Possible due to Incorrect API key provided. Please verify your API key <a href="' . esc_url($settings_page) . '" target="_blank">here</a>.';
                    break;
                case '429':
                    $result['message'] = 'API Error: Possible due to exceeded your current quota, please check your plan and billing details. You can check your usage <a href="https://platform.openai.com/account/usage" target="_blank">here</a>.';
                    break;
                case '500':
                    $result['message'] = 'API Error: The OpenAI server had an error while processing your request. please try again later'; //Check the <a href="https://status.openai.com/" target="_blank">status page</a>.
                    break;
                case '503':
                    $result['message'] = 'API Error: The OpenAI engine is currently overloaded, please try again later';
                    break;

                default:
                    $result['message'] = 'Error: No Response from OpenAI. (It may be server or internet connection issues, or an incorrect API key provided. Please check your <a href="' . esc_url($settings_page) . '" target="_blank">Settings</a>.)';
                    break;
            }
            return $result;
        }

        // Log the presponse
        $API_response = $response_body['choices'][0]['message']['content'];
        error_log("API Generated Text: {$API_response}");

        // Extract the generated text
        if ($field !== 'description') {
            $generated_text = sanitize_text_field(trim($response_body['choices'][0]['message']['content']));
        } else {
            $generated_text = trim($response_body['choices'][0]['message']['content']);
        }

        $generated_text = trim($generated_text, '"'); // remove double quotes from start and end

        // Log the presponse
        error_log("Generated Text After Sanitize: {$generated_text}");

        // Check for the specific error code 999 in the message
        if (preg_match('/error-code-999/', $generated_text)) {
            $result['message'] = 'Invalid UPC number.';
            return $result;
        }

        $result['status'] = 'success';
        $result['message'] = $generated_text;
        return $result;
    }
}