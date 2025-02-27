<?php

    /**
     * The plugin bootstrap file
     *
     * This file is read by WordPress to generate the plugin information in the plugin
     * admin area. This file also includes all of the dependencies used by the plugin,
     * registers the activation and deactivation functions, and defines a function
     * that starts the plugin.
     *
     * @link              https://gizzmo.ai/plugin
     * @since             1.0.0
     * @package           Gizzmo_Ai
     *
     * @wordpress-plugin
     * Plugin Name:       Gizzmo AI
     * Plugin URI:        https://gizzmo.ai
     * Description:       Gizzmo AI Content plugin allows you to create content with a click of a button.
     * Version:           3.1.1
     * Author:            Gizzmo
     * Author URI:        https://gizzmo.ai/plugin
     * License:           GPL-2.0+
     * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
     * Text Domain:       gizzmo-ai
     */

    // If this file is called directly, abort.
    if ( ! defined( 'WPINC' ) ) {
        die;
    }






    /**
     * Currently plugin version.
     * Start at version 1.0.0 and use SemVer - https://semver.org
     * Rename this for your plugin and update it as you release new versions.
     */
    define( 'GIZZMO_AI_VERSION', '3.1.1' );

    /**
     * The code that runs during plugin activation.
     * This action is documented in includes/class-gizzmo-ai-activator.php
     */
    // Register activation hook
    function gizzmo_ai_activation() {
        require_once plugin_dir_path( __FILE__ ) . 'includes/class-gizzmo-ai-activator.php';
        Gizzmo_Ai_Activator::activate();
    }
    register_activation_hook(__FILE__, 'gizzmo_ai_activation');

    // Check if the plugin was just activated and redirect
    function gizzmo_ai_redirect() {
        if (get_option('gizzmo_ai_activated', false)) {
            // Delete the option to prevent multiple redirects
            delete_option('gizzmo_ai_activated');
            
            // Perform the redirect
            wp_safe_redirect(admin_url('admin.php?page=gizzmo-ai-product-review'));
            exit;
        }
    }
    add_action('admin_init', 'gizzmo_ai_redirect');



    // start of gizzmo ai plugin functions================================
    function gizzmo_ai_read_file($file_name)
    {
        $file = fopen($file_name, "r");
        $content = fread($file, filesize($file_name));
        fclose($file);
        return $content;
    }
    function gizzmo_ai_hs_jpg2webp($image, $destination_file, $compression_quality = 100)
    {
        // Check if imagewebp function is available
        if (function_exists('imagewebp')) {
            $result = imagewebp($image, $destination_file, $compression_quality);
            if (false === $result) {
                return false;
            }
            imagedestroy($image);
            return $destination_file;
        } else {
            // WebP support not available, log an error or return false
            error_log('WebP conversion failed: imagewebp() function is not available. Ensure GD library is installed with WebP support.');
            return false;
        }
    }
    function gizzmo_ai_get_tld($domain) {

        $array = parse_url($domain);
    
        return $array["host"];
    }
    function gizzmo_ai_download_image_data($imageurl) {
        $response = wp_remote_get($imageurl, array(
            'timeout' => 60,
            'stream' => false, // Ensure the request is returned as a string and not streamed to a file.
        ));

        // Check for errors
        if (is_wp_error($response)) {
            return $response->get_error_message();
        } else {
            return wp_remote_retrieve_body($response);
        }
    }
    function gizzmo_ai_attach_image_file($imageurl, $post_id)
    {
        $image_data = gizzmo_ai_download_image_data($imageurl);
        $uniq_name = date('dmY') . '' . (int) microtime(true);
        $filename_webp = $uniq_name . '.webp';
        $uploaddir = wp_upload_dir();
        $uploadfile = $uploaddir['path'] . '/' . $filename_webp;

        gizzmo_ai_hs_jpg2webp(imagecreatefromstring($image_data), $uploadfile);
        $contents = file_get_contents($imageurl);
        $savefile = fopen($uploadfile, 'w');
        fwrite($savefile, $contents);
        fclose($savefile);
        $wp_filetype = wp_check_filetype(basename($filename_webp), null);
        $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title' => $filename_webp,
            'post_content' => '',
            'post_status' => 'inherit'
        );

        $attach_id = wp_insert_attachment($attachment, $uploadfile, $post_id);
        $imagenew = get_post($attach_id);
        $fullsizepath = get_attached_file($imagenew->ID);
        $attach_data = wp_generate_attachment_metadata($attach_id, $fullsizepath);
        wp_update_attachment_metadata($attach_id, $attach_data);
        return $attach_id;
    }
    function gizzmo_ai_make_get_request($get_url) {
        $response = wp_remote_get($get_url, array(
            'timeout' => 60,
            'redirection' => 10,
            'httpversion' => '1.1',
        ));
    
        // Check for errors and return the response
        if (is_wp_error($response)) {
            return $response->get_error_message();
        } else {
            $body = wp_remote_retrieve_body($response);
            return json_decode($body, true);
        }
    }
    function gizzmo_ai_make_post_json_request($url, $data) {
        $response = wp_remote_post($url, array(
            'method' => 'POST',
            'headers' => array(
                'Content-Type' => 'application/json',
            ),
            'body' => wp_json_encode($data),
            'timeout' => 180,
            'redirection' => 10,
            'httpversion' => '1.1',
        ));
    
        // Check for errors and return the response
        if (is_wp_error($response)) {
            return $response->get_error_message();
        } else {
            return wp_remote_retrieve_body($response);
        }
    }



    

    add_action('admin_post_add_deal_page_form', 'gizzmo_add_deals_form_submission');
    add_action('admin_post_nopriv_add_deal_page_form', 'gizzmo_add_deals_form_submission');
    function gizzmo_add_deals_form_submission() {
        // Check if the form was submitted and nonce is valid
        if (isset($_POST['add_deal_page_form_submitted']) && $_POST['add_deal_page_form_submitted'] === 'yes' && check_admin_referer('gizzmo_nonce_action', 'gizzmo_nonce')) {
            // Sanitize the form data
            $deal_title = sanitize_text_field($_POST['form_deal_title']);
            $deal_description = sanitize_text_field($_POST['form_deal_description']);
            $deal_affiliate_tag = sanitize_text_field($_POST['form_deal_affiliate_tag']);
            $deal_category_tags = sanitize_text_field($_POST['form_deal_category_tags']);
            $deal_language = sanitize_text_field($_POST['form_deal_language']);
            $deal_image = sanitize_text_field($_POST['form_deal_image']);
            $account_id = sanitize_text_field($_POST['form_account_id']);
            $property_id = sanitize_text_field($_POST['form_property_id']);
            

            // Create a new post
            $new_post = array(
                'post_title' => $deal_title,
                'post_content' => $deal_description,
                'post_status' => 'draft',
                'post_type' => 'post',
            );

            // Insert the post into the database
            $new_post_id = wp_insert_post($new_post);

            //save the category tags
            wp_set_post_tags($new_post_id, $deal_category_tags);

            //save the image
            $attachment_id = gizzmo_ai_attach_image_file($deal_image, $new_post_id);
            set_post_thumbnail($new_post_id, $attachment_id);
            
        
            $url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/g_add_deals_pages';
            $data = array(
                'account_id' => $account_id,
                'property_id' => $property_id,
                'wp_post_id' => $new_post_id,
                'page_title' => $deal_title,
                'intro_text' => $deal_description,
                'sys_featured_image' => $deal_image,
                'language' => $deal_language,
                'affiliate_tags' => $deal_affiliate_tag,
                'tags' => $deal_category_tags,
            );

            $options = array(
                'body' => json_encode($data), // Encode the data to JSON
                'timeout' => 5,
                'redirection' => 5,
                'httpversion' => '1.0',
                'blocking' => true,
                'headers' => array(
                    'Content-Type' => 'application/json', // Set the content type to application/json
                ),
                'cookies' => array(),
            );

            $response = wp_remote_post($url, $options);
            $body = wp_remote_retrieve_body($response);
            $data = json_decode($body);
            if ($data->status == 'success') {
                // Output a simple "OK" message if everything is ok
                //echo 'OK';
            } else {
                // Output a simple "Not OK" message if something is wrong
                //echo 'Not OK';
            }

            //refresh the page
            wp_safe_redirect(admin_url('admin.php?page=gizzmo-ai-deals'));
            exit;
        } else {
            // Output a simple "Not OK" message if something is wrong
            //echo 'Something went wrong';
        }
    }



    add_action('admin_post_publish_live_deals_form', 'gizzmo_publish_live_deals_form_submission');
    add_action('admin_post_nopriv_publish_live_deals_form', 'gizzmo_publish_live_deals_form_submission');

    function gizzmo_publish_live_deals_form_submission() {
        // Check if the form was submitted and nonce is valid
        if (isset($_POST['publish_live_deals_form_submitted']) && $_POST['publish_live_deals_form_submitted'] === 'yes' && check_admin_referer('gizzmo_nonce_action', 'gizzmo_nonce')) {
            // Sanitize the form data
            $account_id = sanitize_text_field($_POST['publish_form_account_id']);
            $property_id = sanitize_text_field($_POST['publish_form_property_id']);
            $wp_post_id = sanitize_text_field($_POST['publish_form_wp_post_id']);
            $deals_json = stripslashes(sanitize_text_field($_POST['publish_form_deals_json']));

            // Get the post object
            $post = get_post($wp_post_id);
            if ($post) {
                // Get the existing content
                $content = $post->post_content;

                // Use DOMDocument to modify the content
                $dom = new DOMDocument();
                libxml_use_internal_errors(true);
                $dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
                libxml_clear_errors();

                $xpath = new DOMXPath($dom);

                // Find and remove any existing gizzmo_deals_placeholder div
                $existing_divs = $xpath->query('//div[@id="gizzmo_deals_placeholder"]');
                foreach ($existing_divs as $existing_div) {
                    $existing_div->parentNode->removeChild($existing_div);
                }

                //get the current date and time (EST)
                date_default_timezone_set('America/New_York');
                //make it July 30 at 8:28 PM (EST)
                $updated_at = date('F j \a\t g:i A (T)');
                //check if the date is today
                $today = date('Y-m-d');
                $updated_at = date('Y-m-d') == $today ? 'Today, ' . $updated_at : $updated_at;



                $last_deal_page_update = '<b class="date_updated" style="font-weight:bold">' . $updated_at . '</b>';

                $deals_update_div = '<p class="last_update_text">Last updated: ' . $last_deal_page_update . '. Note: We continuously update these deals throughout the day, but they can change rapidly! Visit Amazon for the most current price.</p>';


                // Start building the new HTML string
                $new_html =  '<div id="gizzmo_deals_placeholder">';
                $new_html .= $deals_update_div;

                // Parse the deals JSON and add deals to the new HTML string
                $deals = json_decode($deals_json, true);
                $deal_count = 1;
                if ($deals && is_array($deals)) {
                    foreach ($deals as $deal) {
                        //https://www.amazon.com/dp/B081415GCS/?tag=revieweekly-20
                        $deal_link = $deal['deal_source'] . '/dp/' . $deal['deal_asin'] . '/?tag=' . $deal['affiliate_tag'];
                        $deal_link = str_replace('http://', 'https://', $deal_link);
                        $store_name = "Amazon";
                        $percent_off = $deal['percent_off'] . '% off ';
                        // Replace [text] with <a href="$deal_link">text</a> in $deal['deal_paragraph']
                        $deal['deal_paragraph'] = preg_replace('/\[(.*?)\]/', '<a target="_blank" href="' . esc_url($deal_link) . '">$1</a>', $deal['deal_paragraph']);

                        $see_on_amazon = '<a target="_blank" href="' . esc_url($deal_link) . '">See On ' . esc_html($store_name) . '</a>';
                        // Sanitize the paragraph content while allowing <a> tags
                        $deal_paragraph_safe = wp_kses($deal['deal_paragraph'], array(
                            'a' => array(
                                'href' => array(),
                                'target' => array()
                            )
                        ));
                        
                        //check if the source is:
                        $currency = 'USD';
                        $currency_symbol = '$';
                        if (strpos($deal['deal_source'], 'www.amazon.co.uk') !== false) {
                            $currency = 'GBP';
                            $currency_symbol = '£';
                        } elseif (strpos($deal['deal_source'], 'www.amazon.ca') !== false) {
                            $currency = 'CAD';
                            $currency_symbol = '$';
                        } elseif (strpos($deal['deal_source'], 'www.amazon.com.au') !== false) {
                            $currency = 'AUD';
                            $currency_symbol = '$';
                        } elseif (strpos($deal['deal_source'], 'www.amazon.in') !== false) {
                            $currency = 'INR';
                            $currency_symbol = '₹';
                        } elseif (strpos($deal['deal_source'], 'www.amazon.sg') !== false) {
                            $currency = 'SGD';
                            $currency_symbol = '$';
                        }
                    


                        
                        $percent_of_promotion_text ='<span style="position: absolute;top: 48px;left: 47px;font-size: 17px;color: #fff;font-weight: bold;">'. $percent_off .'</span>';
                        $percent_of_promotion = '<div style="min-width: 172px;min-height: 172px;position: absolute; top: 0; left: 0; width: 35%; height: 35%; background-image: url(' . plugins_url('admin/pages/images/ribbons/percent_off.png', __FILE__) . '); background-size: contain; background-repeat: no-repeat;">' . $percent_of_promotion_text . '</div>';

                        $best_deal_promotion_text ='<span style="position: absolute;top: 48px;left: 47px;font-size: 17px;color: #fff;font-weight: bold;">Best Deal</span>';
                        $best_deal_promotion = '<div style="min-width: 172px;min-height: 172px;position: absolute; top: 0; left: 0; width: 35%; height: 35%; background-image: url(' . plugins_url('admin/pages/images/ribbons/percent_off.png', __FILE__) . '); background-size: contain; background-repeat: no-repeat;">' . $best_deal_promotion_text . '</div>';

                        $limited_time_promotion_text ='<span style="position: absolute;top: 48px;left: 47px;font-size: 17px;color: #fff;font-weight: bold;">Ending Soon!</span>';
                        $limited_time_promotion = '<div style="min-width: 172px;min-height: 172px;position: absolute; top: 0; left: 0; width: 35%; height: 35%; background-image: url(' . plugins_url('admin/pages/images/ribbons/percent_off.png', __FILE__) . '); background-size: contain; background-repeat: no-repeat;">' . $limited_time_promotion_text . '</div>';

                        $wow_deal_promotion_text ='<span style="position: absolute;top: 48px;left: 47px;font-size: 17px;color: #fff;font-weight: bold;">WOW Deal!</span>';
                        $wow_deal_promotion = '<div style="min-width: 172px;min-height: 172px;position: absolute; top: 0; left: 0; width: 35%; height: 35%; background-image: url(' . plugins_url('admin/pages/images/ribbons/percent_off.png', __FILE__) . '); background-size: contain; background-repeat: no-repeat;">' . $wow_deal_promotion_text . '</div>';
                        
                        $deal_promotions = $deal['deal_promotions'];
                        $deal_promotions = explode(',', $deal_promotions);

                        //loop through the promotions
                        $promotions = '';
                        $percent_of_promotion = '';
                        $best_deal_promotion = '';
                        $limited_time_promotion = '';
                        $wow_deal_promotion = '';

                        $promotios_exists = 0;
                        foreach ($deal_promotions as $promotion) {
                            //split the promotion by :
                            $promotion = explode(':', $promotion);
                            $promotion_type = $promotion[0];
                            $promotion_value = $promotion[1];
                            
                            if ($promotion_type == 'discount_badge') {
                                if ($promotion_value == "yes")
                                {
                                    $top_position = 0;
                                    $promotios_exists++;

                                    $percent_of_promotion_text ='<span style="position: absolute;top: 48px;left: 47px;font-size: 17px;color: #fff;font-weight: bold;">'. $percent_off .'</span>';
                                    $percent_of_promotion = '<div style="min-width: 172px;min-height: 172px;position: absolute; top: 0; left: 0; width: 35%; height: 35%; background-image: url(' . plugins_url('admin/pages/images/ribbons/percent_off.png', __FILE__) . '); background-size: contain; background-repeat: no-repeat;">' . $percent_of_promotion_text . '</div>';
                                }
                            } elseif ($promotion_type == 'best_deal_badge') {
                                if ($promotion_value == "yes")
                                {
                                    if ($promotios_exists == 1) {
                                        $top_position = 48 * 1;
                                    } else {
                                        $top_position = 48;
                                    }
                                    $promotios_exists++;
                                    
                                    $best_deal_promotion_text ='<span style="position: absolute;top: 48px;left: 47px;font-size: 17px;color: #fff;font-weight: bold;">Best Deal</span>';
                                    $best_deal_promotion = '<div style="min-width: 172px;min-height: 172px;position: absolute; top: ' . $top_position . 'px; left: 0; width: 35%; height: 35%; background-image: url(' . plugins_url('admin/pages/images/ribbons/percent_off.png', __FILE__) . '); background-size: contain; background-repeat: no-repeat;">' . $best_deal_promotion_text . '</div>';
                                }
                            } elseif ($promotion_type == 'limited_time_deal_badge') {
                                if ($promotion_value == "yes")
                                {
                                    if ($promotios_exists == 2) {
                                        $top_position = 48 * 2;
                                    }  elseif ($promotios_exists == 1) {
                                        $top_position = 48 * 1;
                                    } else {
                                        $top_position = 48;
                                    }
                                    $promotios_exists++;

                                    $limited_time_promotion_text ='<span style="position: absolute;top: 48px;left: 21px;font-size: 17px;color: #fff;font-weight: bold;">Ending Soon!</span>';
                                    $limited_time_promotion = '<div style="min-width: 172px;min-height: 172px;position: absolute; top: ' . $top_position . 'px; left: 0; width: 35%; height: 35%; background-image: url(' . plugins_url('admin/pages/images/ribbons/percent_off.png', __FILE__) . '); background-size: contain; background-repeat: no-repeat;">' . $limited_time_promotion_text . '</div>';
                                }
                            } elseif ($promotion_type == 'wow_deal_badge') {
                                if ($promotion_value == "yes")
                                {   
                                    if ($promotios_exists == 3) {
                                        $top_position = 48 * 3;
                                    }  elseif ($promotios_exists == 2) {
                                        $top_position = 48 * 2;
                                    }  elseif ($promotios_exists == 1) {
                                        $top_position = 48 * 1;
                                    } else {
                                        $top_position = 48;
                                    }
                                    $promotios_exists++;

                                    $wow_deal_promotion_text ='<span style="position: absolute;top: 48px;left: 32px;font-size: 17px;color: #fff;font-weight: bold;">WOW Deal!</span>';
                                    $wow_deal_promotion = '<div style="min-width: 172px;min-height: 172px;position: absolute; top: ' . $top_position . 'px; left: 0; width: 35%; height: 35%; background-image: url(' . plugins_url('admin/pages/images/ribbons/percent_off.png', __FILE__) . '); background-size: contain; background-repeat: no-repeat;">' . $wow_deal_promotion_text . '</div>';
                                }
                            }

                        }

                        $promotions = $percent_of_promotion . $best_deal_promotion . $limited_time_promotion . $wow_deal_promotion;

                        $amazon_credit ='<a target="_blank" href="' . esc_url($deal_link) . '"><span style="position: absolute;bottom: 0px;right: 0px;background-color: #646161;font-size: 12px;color: #fff;padding: 4px;border-radius: 3px;opacity: 0.8;">Credit: Amazon</span></a>';


                        $new_html .= '
                        <div class="gizzmo_deal">
                            <div class="gizzmo_deal-header" style="display: flex; align-items: center; width: 100%;">
                                <div class="gizzmo_deal-count" style="background-color: #333; color: #fff; padding: 10px; border-radius: 50%; text-align: center; width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">' . esc_html($deal_count) . '</div>
                                <div class="gizzmo_deal-divider" style="flex-grow: 1; border-bottom: 2px solid #333; margin-left: 10px;"></div>
                            </div>
                            <h2><span class="gizzmo_percent_off">'. $percent_off .'</span><a target="_blank" href="' . esc_url($deal_link) . '">' . esc_html($deal['deal_title']) . '</a></h2>
                            <div class="gizzmo_image_wrapper" style="position: relative;min-height: 240px;"><a target="_blank" href="' . esc_url($deal_link) . '"><img src="' . esc_url($deal['deal_image']) . '" alt="' . esc_attr($deal['deal_title']) . '" class="gizzmo_deal-image" style="display: block; margin: 0 auto; max-height: 430px;"></a>'. $amazon_credit . $promotions .'</div>
                            <p>' . $deal_paragraph_safe . '</p>
                            <div>List Price: ' . $currency_symbol . esc_html($deal['list_price']) . '</div>
                            <div>Average Price: ~' . $currency_symbol  . esc_html($deal['avg_price']) . '</div>
                            <div>Deal Price: ' . $see_on_amazon . ' </div>
                            <div style="margin-top: 10px;" class="wp-block-button"><a class="wp-block-button__link gizzmo_link" target="_blank" href="' . esc_url($deal_link) . '">View On ' . esc_html($store_name) . '</a></div>
                        </div>';
                        $deal_count++;
                    }
                }

                // Close the new HTML string
                $new_html .= '</div>';

                // Convert the new HTML string to a DOMDocument
                $new_dom = new DOMDocument();
                libxml_use_internal_errors(true);
                $new_dom->loadHTML(mb_convert_encoding($new_html, 'HTML-ENTITIES', 'UTF-8'));
                libxml_clear_errors();

                // Append the new gizzmo_deals_placeholder div to the end of the content
                $body = $dom->getElementsByTagName('body')->item(0);
                $body->appendChild($dom->importNode($new_dom->getElementById('gizzmo_deals_placeholder'), true));

                // Save the modified content back to the post
                $modified_content = $dom->saveHTML($dom->documentElement);

                // Update the post
                $post_update = array(
                    'ID' => $wp_post_id,
                    'post_content' => $modified_content,
                    'post_status' => $post->post_status // Preserve the current post status
                );
                $result = wp_update_post($post_update, true);

                if (is_wp_error($result)) {
                    wp_die('Post update failed: ' . $result->get_error_message());
                } else {
                    wp_safe_redirect(admin_url('admin.php?page=gizzmo-ai-deals&post_updated=true'));
                    exit;

                }

            } else {
                wp_die('Post not found.');
            }
        }
        else {
            //echo 'Something went wrong.';
        }
    }


    add_action('admin_post_save_content_as_draft_form', 'save_content_as_draft_form_submission');
    add_action('admin_post_nopriv_save_content_as_draft_form', 'save_content_as_draft_form_submission');

    function save_content_as_draft_form_submission() {
        // Check if the form was submitted and nonce is valid
        if (isset($_POST['save_content_as_draft_submitted']) && $_POST['save_content_as_draft_submitted'] === 'yes' && check_admin_referer('gizzmo_nonce_action', 'gizzmo_nonce')) {
            // Sanitize the form data
            $task_id = sanitize_text_field($_POST['form_task_id']);

            //make the request to the gizzmo content service to get the task data at g_get_task
            $url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/g_get_task';
            $data = array(
                'task_id' => $task_id,
            );
            $options = array(
                'body' => json_encode($data), // Encode the data to JSON
                'timeout' => 5,
                'redirection' => 5,
                'httpversion' => '1.0',
                'blocking' => true,
                'headers' => array(
                    'Content-Type' => 'application/json', // Set the content type to application/json
                ),
                'cookies' => array(),
            );

            $response = wp_remote_post($url, $options);
            $body = wp_remote_retrieve_body($response);
            $data = json_decode($body);
            if ($data->status == 'success') {
                //get the task data
                $task_data = $data->data;
                $task_data_json = json_decode($task_data);

                if (is_array($task_data_json) && !empty($task_data_json)) {
                    $first_element = $task_data_json[0]; // Access the first element
                    $content_type = $first_element->content_type; // Access the content_type property
                
                    #echo 'Content Type: ' . $content_type;

                    if ($content_type == 'Review') {
                        gizzmo_ai_create_review_post($first_element);
                    }
                    else if ($content_type == 'Roundup') {
                        gizzmo_ai_create_roundup_post($first_element);
                    }
                    else if ($content_type == 'Listicle') {
                        gizzmo_ai_create_listicle_post($first_element);
                    }
                    else if ($content_type == 'Comparison') {
                        gizzmo_ai_create_comparison_post($first_element);
                    }

                    //reload the page
                    wp_safe_redirect(admin_url('admin.php?page=gizzmo-ai-gizzmo-posts&show_archive=true'));
                    exit;
                    //wp_redirect(admin_url('admin.php?page=gizzmo-ai-gizzmo-posts&show_archive=true'));

                } else {
                    //echo 'Invalid data structure';
                }

                
            }
            else {
                //echo 'Something went wrong.';
            }
        }
        else {
            //echo 'Something went wrong.';
        }
    }



    function get_ready_json_file($account_id, $property_id, $content_type, $asin, $task_id)
    {
        #make a request to the gizzmo content service to get the artifacts ready json
        $url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/g_get_artifacts_ready_json';
        $data = array(
            'account_id' => $account_id,
            'property_id' => $property_id,
            'content_type' => $content_type,
            'asin' => $asin,
            'task_id' => $task_id,
        );
        $options = array(
            'body' => json_encode($data), // Encode the data to JSON
            'timeout' => 5,
            'redirection' => 5,
            'httpversion' => '1.0',
            'blocking' => true,
            'headers' => array(
                'Content-Type' => 'application/json', // Set the content type to application/json
            ),
            'cookies' => array(),
        );

        $response = wp_remote_post($url, $options);
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body);

        if ($data->status == 'success') {
            $artifacts_ready_json = $data->data;
            return $artifacts_ready_json;
        }
        else {
            //echo 'Something went wrong.';
        }

        return null;
    }

    function gizzmo_ai_create_review_post($task_data)
    {

        $account_id = $task_data->account_id;
        $property_id = $task_data->property_id;
        $content_type = $task_data->content_type;
        $asin = $task_data->review_asin;
        $task_id = $task_data->id;
        $asin_json_res = get_ready_json_file($account_id, $property_id, $content_type, $asin, $task_id);
        
        $pros_title = $asin_json_res->translations->{'Pros:'};
        $cons_title = $asin_json_res->translations->{'Cons:'};
        $qanda_title = $asin_json_res->translations->{'Questions & Answers:'};
        $cta_title = $asin_json_res->translations->{'Buy On Amazon'};
        $question_title = $asin_json_res->translations->{'Question:'};
        $answer_title = $asin_json_res->translations->{'Answer:'};
        $similar_posts_title = $asin_json_res->translations->{'Read also:'};
        $conclusion_title = $asin_json_res->translations->{'Conclusion'};
        $read_all_user_reviews_title = $asin_json_res->translations->{'Read All User Reviews'};
        $ratings_title = $asin_json_res->translations->{'Ratings'};

       
        
        $post_settings = $asin_json_res->post_settings;

        $content = gizzmo_ai_read_file(plugin_dir_path(__FILE__) . 'admin/html_parts/product_review_default.html');


        $asin_source = $asin_json_res->source;
        $asin_source_no_www = str_replace('www.', '', $asin_source);
        $asin_affiliate_tag = $post_settings->affiliate_tags;
        $focus_keyphrase = $asin_json_res->focus_keyphrase;
        $language = $asin_json_res->language;

        $asin_link = 'https://' . $asin_source . '/dp/' . $asin;
        if ($asin_affiliate_tag != '' ) {
            $asin_link = 'https://' . $asin_source . '/dp/' . $asin . '?tag=' . $asin_affiliate_tag;
        }

        #shold be in settings?
        #introduction_paragraphs ==================================================================
        $introduction_paragraphs = $asin_json_res->introduction_paragraphs;
        $introduction_paragraphs_html = '';
        foreach ($introduction_paragraphs as $paragraph) {
            $introduction_paragraphs_html .= '<p>' . $paragraph . '</p>';
        }
        $content = str_replace('{{Introduction}}', $introduction_paragraphs_html, $content);

        #shold be in settings?
        #personal_experience_paragraphs ===========================================================
        $personal_experience = $asin_json_res->personal_experience_paragraphs;
        $personal_experience_html = '';
        foreach ($personal_experience as $paragraph) {
            $personal_experience_html .= '<p>' . $paragraph . '</p>';
        }
        $content = str_replace('{{Personal_Experience}}', $personal_experience_html, $content);


        //similar_posts
        if ($post_settings->internal_linking == 'yes' )
        {
            if ($asin_json_res->similar_posts != null && $asin_json_res->similar_posts != '' && $asin_json_res->similar_posts != 'No data found') {
                $selected_similar_post_ids = explode(',', $asin_json_res->similar_posts);
                if (count($selected_similar_post_ids) > 0) {
                    $similar_posts_html = '<h2>'.$similar_posts_title.'</h2>';
                    //split the selected_similar_post_ids string into array of ids by comma
                    foreach ($selected_similar_post_ids as $similar_post_id) {
                        $similar_post = get_post($similar_post_id);
                        $similar_posts_html .= '<li><a href="' . get_permalink($similar_post_id) . '">' . $similar_post->post_title . '</a></li>';
                    }
                    $content .= $similar_posts_html;
                }
            }
        }



        #conclusion_paragraphs ==================================================================
        if ($post_settings->conclusion == 'yes') {
            $conclusion_paragraphs = $asin_json_res->conclusion_paragraphs;
            $conclusion_paragraphs_html = '';
            $conclusion_title = '';
            foreach ($conclusion_paragraphs as $paragraph) {
                $paragraph = '<p>' . $paragraph . '</p>';
                $conclusion_paragraphs_html .= $paragraph;
            }

            if ($conclusion_title != '') {
                $conclusion_title = '<h2>' . $conclusion_title . '</h2>';
            }
            else
            {
                $conclusion_title = '<h2>Conclusion</h2>';
            }

            $content = str_replace('{{Conclusion_Title}}', $conclusion_title, $content);
            $content = str_replace('{{Conclusion_Text}}', $conclusion_paragraphs_html, $content);

            $content = str_replace('Conclusion', $conclusion_title,$content);
        }
        else
        {
            $content = str_replace('{{Conclusion_Title}}', '', $content);
            $content = str_replace('{{Conclusion_Text}}', '', $content);
        }


        #pros_cons ==================================================================
        if ($post_settings->pros_cons == 'yes') {
            $pros_list = $asin_json_res->pros;
            $cons_list = $asin_json_res->cons;

            $pros_found = false;
            $cons_found = false;
            if (count($pros_list) > 0 && count($cons_list) > 0) {
                $pros_list_html = '';
                foreach ($pros_list as $pros) {
                    if ($pros != '') {
                        $pros_found = true;
                        $pros_list_html .= '<li>' . $pros . '</li>';
                    }
                }
                if ($pros_found == true) {
                    $content = str_replace('{{pros_list}}', $pros_list_html, $content);
                } else {
                    $content = str_replace('<h2>Pros:</h2>', '', $content);
                    $content = str_replace('{{pros_list}}', '', $content);
                }
                



                $cons_list_html = '';
                foreach ($cons_list as $cons) {
                    if ($cons != '') {
                        $cons_found = true;
                        $cons_list_html .= '<li>' . $cons . '</li>';
                    }
                }
                if ($cons_found == true) {
                    $content = str_replace('{{cons_list}}', $cons_list_html, $content);
                } else {
                    $content = str_replace('<h2>Cons:</h2>', '', $content);
                    $content = str_replace('{{cons_list}}', '', $content);
                }

                $content = str_replace('{{pros_title}}', $pros_title, $content);
                $content = str_replace('{{cons_title}}', $cons_title, $content);

            } else {
                $content = str_replace('{{pros_title}}', '', $content);
                $content = str_replace('{{cons_title}}', '', $content);
                $content = str_replace('{{pros_list}}', '', $content);
                $content = str_replace('{{cons_list}}', '', $content);
                $content = str_replace('<h2>Pros:</h2>', '', $content);
                $content = str_replace('<h2>Cons:</h2>', '', $content);

            }
        } else {
            $content = str_replace('{{pros_title}}', '', $content);
            $content = str_replace('{{cons_title}}', '', $content);
            $content = str_replace('{{pros_list}}', '', $content);
            $content = str_replace('{{cons_list}}', '', $content);
            $content = str_replace('<h2>Pros:</h2>', '', $content);
            $content = str_replace('<h2>Cons:</h2>', '', $content);
        }



        #questions_answers =================================================================
        if ($post_settings->faqs == 'yes') {
            $questions_list = $asin_json_res->questions;
            $answers_list = $asin_json_res->answers;


            if (count($questions_list) > 0 && count($answers_list) > 0) {
                $qanda_list_html = '';
                $x = 0;
                do {
                    $qanda_list_html .= '<p><b>Question: </b>' . $questions_list[$x] . '</p>';
                    $qanda_list_html .= '<p><b>Answer: </b>' . $answers_list[$x] . '</p>';
                    $x++;
                } while ($x <= 2);
                $content = str_replace('{{Questions_Answers}}', $qanda_list_html, $content);

                $content = str_replace('{{qanda_title}}', $qanda_title,$content);
                $content = str_replace('Question:', $question_title,$content);
                $content = str_replace('Answer:', $answer_title,$content);

            } else {
                $content = str_replace('{{qanda_title}}', '',$content);
                $content = str_replace('Question:', '',$content);
                $content = str_replace('Answer:', '',$content);

                $content = str_replace('{{Questions_Answers}}', '', $content);
                $content = str_replace('<h2>Questions & Answers:</h2>', '', $content);
            }
        } else {
            $content = str_replace('{{qanda_title}}', '',$content);
            $content = str_replace('Question:', '',$content);
            $content = str_replace('Answer:', '',$content);

            $content = str_replace('{{Questions_Answers}}', '', $content);
            $content = str_replace('<h2>Questions & Answers:</h2>', '', $content);
        }


        $content = str_replace('{{amazon_link_and_tag}}', $asin_link, $content);



        #content sections =================================================================
        $sections = $asin_json_res->sections;
        $section_html = '';
        $index = 0;
        $previous_section_hyperlinked = false;
        foreach ($sections as $section) {


            $img_src = $section->image;

            $section_html .= '<h2>' . $section->title . '</h2>';

             

            if ($post_settings->images_embed_in_content == 'yes')
            {
                if ($img_src != '') {
                    
                    $section_html .= '<figure class="wp-block-image size-large">';
                    $section_html .= '<a rel="nofollow sponsored" target="_blank" href="' . $asin_link . '">';
                    
                    if ($index < 5) {
                        if ($focus_keyphrase != '') {
                            $section_html .= '<img decoding="async" src="' . $img_src . '" alt="' . $focus_keyphrase . '" class="wp-image-840" />';
                        } else {
                            $section_html .= '<img decoding="async" src="' . $img_src . '" alt="' . $img_src . '" class="wp-image-840" />';
                        }
                    } else {
                        $section_html .= '<img decoding="async" src="' . $img_src . '" alt="' . $img_src . '" class="wp-image-840" />';
                    }
                    
                    
                    $section_html .= '<div class="post-meta-items meta-below gizzmo_img_credit" style="position: relative; top: -46px; z-index: 100000; background-color: #33333373; color: #fff; font-size: 12px; padding-left: 10px; width: 50%;">';
                    $section_html .= esc_html__( 'Credit - ' . $asin_source_no_www . '', 'gizzmo-ai' );
                    $section_html .= '</div>';
                    $section_html .= '</a>';
                    $section_html .= '</figure>';
                }
            }
            if ($post_settings->CTAs == 'yes')
            {
                if ($index < 3) {
                    $section_html .= '<div class="is-layout-flex wp-block-buttons">';
                    $section_html .= '<div class="wp-block-button">';
                    $section_html .= '<a rel="nofollow sponsored" class="wp-block-button__link" target="_blank" href="' . $asin_link . '">' . esc_html__( 'Buy On Amazon', 'gizzmo-ai' ) . '</a>';
                    $section_html .= '</div>';
                    $section_html .= '</div>';
                }
            }

            $section_text = $section->text;

            if ($post_settings->keyphrase_hyperlinks == 'yes')
            {
                #if ($previous_section_hyperlinked == false) {
                    #check if $section contains a key called 'linkable_key_benefit_text'
                $linkable_key_benefit_text = '';
                if (property_exists($section, 'linkable_key_benefit_text')) {
                    $linkable_key_benefit_text = $section->linkable_key_benefit_text;

                    $section_text = str_replace($linkable_key_benefit_text, '<a rel="nofollow sponsored" target="_blank" href="' . $asin_link . '">' . $linkable_key_benefit_text . '</a>', $section_text);
                    #$previous_section_hyperlinked = true;
                }
                else if (property_exists($section, 'linkable_key_benefit_texts')) {
                    #more then one keyphrase
                    $linkable_key_benefit_texts = $section->linkable_key_benefit_texts;
                    foreach ($linkable_key_benefit_texts as $linkable_key_benefit_text) {
                        if ($linkable_key_benefit_text != '') {
                            if (strpos($section_text, $linkable_key_benefit_text) !== false) {
                                $section_text = str_replace($linkable_key_benefit_text, '<a rel="nofollow sponsored" target="_blank" href="' . $asin_link . '">' . $linkable_key_benefit_text . '</a>', $section_text);
                                #exit for loop
                                break;
                            }
                        }
                    }
                }
                #}
                #else {
                #    $previous_section_hyperlinked = false;
                #}
            }





            $section_html .= '<p>' . $section_text . '</p>';

            $index++;
        }
        $content = str_replace('{{Dynamic_Text_Sections}}', $section_html, $content);
        
        
        $selected_similar_post_ids =null;
        #Internal linking =================================================================
        if ($post_settings->internal_linking == 'yes') {
            if ($selected_similar_post_ids != null) {
                $similar_posts_html = '';
                #splait the selected_similar_post_ids string into array of ids by comma
                $selected_similar_post_ids = explode(',', $selected_similar_post_ids);

                foreach ($selected_similar_post_ids as $similar_post_id) {
                    $similar_post = get_post($similar_post_id);
                    $similar_posts_html .= '<li><a href="' . get_permalink($similar_post_id) . '">' . $similar_post->post_title . '</a></li>';
                }
                $content = str_replace('{{Similar_Posts_Title}}', '<h2>'. similar_posts_title .'</h2>', $content);
                $content = str_replace('{{Similar_Posts}}', $similar_posts_html, $content);
                
            } else {
                $content = str_replace('{{Similar_Posts_Title}}', '', $content);
                $content = str_replace('{{Similar_Posts}}', '', $content);
            }
        }
        else {
            $content = str_replace('{{Similar_Posts_Title}}', '', $content);
            $content = str_replace('{{Similar_Posts}}', '', $content);
        }


        if ($package_type = 'Enterprise') {
            $gizzmo_enterprise = "<div id='gizzmo_enterprise'></div>";
            $content = $gizzmo_enterprise . $content;
        }
        




        #carousel =================================================================
        $carousel_top_filled = "false";
        $carousel_bottom_filled = "false";
        if ($post_settings->carousels == 'yes')
        {
            $compered_items_caruosel = "false";
            $similar_items_caruosel = "false";
            $related_items_caruosel = "false";
            
            if ($asin_json_res->related_items != null && $asin_json_res->related_items != '') {
                $compered_items_iframe = '<div class="gizzmo_section" style="padding-top: 20px;padding-bottom: 20px;"><iframe src="https://client.gizzmo.ai/carousel/index.html?wid=&asin='. $asin .'&affid='. $asin_affiliate_tag .'&type=compered_items&lang='. $language .'" style="width: 100%; height: 323px; border: none;" scrolling="no"></iframe></div>';
                $content = str_replace('{{Carousel_Top}}', $compered_items_iframe, $content);
                $carousel_top_filled = "true";
            } 
            
            if ($asin_json_res->similar_items != null && $asin_json_res->similar_items != '') {
                $similar_items_iframe = '<div class="gizzmo_section" style="padding-top: 20px;padding-bottom: 20px;"><iframe src="https://client.gizzmo.ai/carousel/index.html?wid=&asin='. $asin .'&affid='. $asin_affiliate_tag .'&type=similar_items&lang='. $language .'" style="width: 100%; height: 323px; border: none;" scrolling="no"></iframe></div>';
                if ($carousel_top_filled == "false") {
                    $content = str_replace('{{Carousel_Top}}', $similar_items_iframe, $content);
                    $carousel_top_filled = "true";
                }
                else {
                    $content = str_replace('{{Carousel_Bottom}}', $similar_items_iframe, $content);
                    $carousel_bottom_filled = "true";
                }
            } 

            if ($asin_json_res->compered_items != null && $asin_json_res->compered_items != '') {
                $related_items_iframe = '<div class="gizzmo_section" style="padding-top: 20px;padding-bottom: 20px;"><iframe src="https://client.gizzmo.ai/carousel/index.html?wid=&asin='. $asin .'&affid='. $asin_affiliate_tag .'&type=related_items&lang='. $language .'" style="width: 100%; height: 323px; border: none;" scrolling="no"></iframe></div>';
                if ($carousel_top_filled == "false") {
                    $content = str_replace('{{Carousel_Top}}', $related_items_iframe, $content);
                    $carousel_top_filled = "true";
                }
                else {
                    $content = str_replace('{{Carousel_Bottom}}', $related_items_iframe, $content);
                    $carousel_bottom_filled = "true";
                }
            } 
            if ($carousel_bottom_filled == "false") {
                $content = str_replace('{{Carousel_Bottom}}', '', $content);
            }
            if ($carousel_top_filled == "false") {
                $content = str_replace('{{Carousel_Top}}', '', $content);
            }
        }
        else {
            $content = str_replace('{{Carousel_Top}}', '', $content);
            $content = str_replace('{{Carousel_Bottom}}', '', $content);
        }





















        
        #embed content title translation ======================================================
        $content = str_replace('{{cta_title}}', $cta_title,$content);
        
        $content = str_replace('Buy On Amazon', $cta_title,$content);
        $content = str_replace('Read All User Reviews', $read_all_user_reviews_title,$content);
        $content = str_replace('Ratings', $ratings_title,$content);
    




        #meta data =================================================================
        $meta_description = $asin_json_res->meta_description;
        if (strlen($meta_description) > 130) {
            $meta_description = substr($meta_description, 0, 127) . "...";
        }


        #wp_insert_post =================================================================
        $post_title = $asin_json_res->title;
        $post_id = wp_insert_post(
            array(
                'post_title' => $post_title,
                'post_content' => $content,
                'post_status' => 'draft',
                'post_type' => 'post'
            )
        );
        
        if ($post_id) {
            // Add custom meta field with the identifier "gizzmo_post"
            add_post_meta($post_id, 'gizzmo_post', true);
        }

        
        #wp post tags =================================================================
        $all_tags = $asin_json_res->seo_tags;
        if ($post_settings->tags == 'yes') {
            $post_tags = $asin_json_res->seo_tags;
            //get only the first 4 tags
            if (count($post_tags) > 4) {
                $post_tags = array_slice($post_tags, 0, 4);
            }
            if (count($post_tags) > 0) {
                $post_tags = implode(',', $post_tags);
                wp_set_post_tags($post_id, $post_tags);
            }
        }


        #wp upadte $meta_description, seo keyphrase, $featured_image ===================
        update_post_meta($post_id,'_yoast_wpseo_metadesc',$meta_description);

    
        if ($focus_keyphrase != "") {
            update_post_meta($post_id,'_yoast_wpseo_focuskw',$focus_keyphrase);
        }

        $featured_image = $asin_json_res->featured_image;
        if ($featured_image != '')
        {
            $attachment_id = gizzmo_ai_attach_image_file($featured_image, $post_id);
            set_post_thumbnail($post_id, $attachment_id);
        }

        
        

        #skipped this for now
        #wp update post content with schema ==========================================
        #if ($post_settings->seo_schemas == "yes") {
        if ($post_settings->seo_schemas == "yes") {
            //get attached image url by id
            $featured_image_url = wp_get_attachment_url(get_post_thumbnail_id($post_id) );
            //get the post url by id
            $post_url = get_permalink($post_id);

            $author = get_bloginfo('url');
            $dmain = gizzmo_ai_get_tld($author);
            $dmain = ucfirst($dmain);
            $dmain = urlencode($dmain);
             
            $enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/g_get_schemas/' . $account_id . ',' . $property_id . ',' . $asin . ',' . $dmain;
            $schemas_list = gizzmo_ai_make_get_request($enpoint_url);

            for($i = 0; $i < count($schemas_list); $i++)
            {
                #convert the json to a string
                $schema = wp_json_encode($schemas_list[$i]);
                if ($i == 0) {
                    $schema = str_replace('{{featured_image}}', $featured_image_url, $schema);
                    $schema = str_replace('{{URL}}', $post_url, $schema);
                }

                $content .= '<script type="application/ld+json">' . $schema .'</script>';
            }

            //update the post content with the new content
            $post = array(
                'ID' => $post_id,
                'post_content' => $content
            );
            wp_update_post($post);
        }


        #$post_categories = $asin_json['wordpress_categories'];
        
        #convert the $all_tags array to string
        $all_tags = implode(',', $all_tags);
        $post_data = array(
            'task_id' => $task_id,
            'new_wp_post_id' => $post_id,
            'post_title' => $post_title,
            'post_tags' => $all_tags,
        );

        #echo "post_data: ";
        #print_r($post_data);



        $log_post_data_enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/g_move_task_to_archive';
        $res = gizzmo_ai_make_post_json_request($log_post_data_enpoint_url, $post_data);

    }

    function gizzmo_ai_create_roundup_post($task_data)
    {
        $account_id = $task_data->account_id;
        $property_id = $task_data->property_id;
        $content_type = $task_data->content_type;
        $asin = $task_data->review_asin;
        $task_id = $task_data->id;
        $asin_json_res = get_ready_json_file($account_id, $property_id, $content_type, $asin, $task_id);
        
        $pros_title = $asin_json_res->translations->{'Pros:'};
        $cons_title = $asin_json_res->translations->{'Cons:'};
        $qanda_title = $asin_json_res->translations->{'Questions & Answers:'};
        $cta_title = $asin_json_res->translations->{'Buy On Amazon'};
        $question_title = $asin_json_res->translations->{'Question:'};
        $answer_title = $asin_json_res->translations->{'Answer:'};
        $similar_posts_title = $asin_json_res->translations->{'Read also:'};
        $conclusion_title = $asin_json_res->translations->{'Conclusion'};
        $read_all_user_reviews_title = $asin_json_res->translations->{'Read All User Reviews'};
        $ratings_title = $asin_json_res->translations->{'Ratings'};

        
        $post_settings = $asin_json_res->post_settings;


        // read the html file from html_parts folder
        $one_roundup_item_html = gizzmo_ai_read_file(plugin_dir_path(__FILE__) . 'admin/html_parts/product_roundup.html');
        $roundup_style = gizzmo_ai_read_file(plugin_dir_path(__FILE__) . 'admin/html_parts/roundup_css.txt');

        //check if the user is activating the pro version of the roundup
        $is_pro_roundup = false;
        if ($post_settings->roundup_products_list == "no" && $post_settings->roundup_rating_reviews == "no" && $post_settings->roundup_pros_cons == "no") {
            $one_roundup_item_html = gizzmo_ai_read_file(plugin_dir_path(__FILE__) . 'admin/html_parts/product_roundup_pro.html');
            $roundup_style = gizzmo_ai_read_file(plugin_dir_path(__FILE__) . 'admin/html_parts/roundup_pro_css.txt');
            $is_pro_roundup = true;
        }



        $post_title = $asin_json_res->Title;
        $introduction_paragraphs = $asin_json_res->Introduction;
        $focus_keyphrase = $post_settings->seo_keyword;
        $meta_Description = $asin_json_res->Meta_Description;
        $featured_image = $post_settings->featured_image;
        

        $content = '';
        

        #Top Page products list =================================================================
        $product_in_roundup = $asin_json_res->data;


        $roundup_asin_images = $post_settings->asins_in_roundup;
        $roundup_asin_images_ar = explode(',', $roundup_asin_images);
        //no go through the each $product in $product_in_roundup and according to the $product->ASIN, get the image from $roundup_asin_images_ar
        foreach ($product_in_roundup as $product) {
            $product_asin = $product->ASIN;
            //no go through the each image in $roundup_asin_images_ar and according to the $product_asin, get the image
            foreach ($roundup_asin_images_ar as $roundup_asin_image) {
                $roundup_asin_image_ar = explode('~', $roundup_asin_image);
                if ($product_asin == $roundup_asin_image_ar[0]) {
                    $product_image = $roundup_asin_image_ar[1];
                    $product->featured_image = $product_image;
                }
            }            
        }


        $html ="";

         
        if($post_settings->roundup_products_list == "yes")
        {
            foreach ($product_in_roundup as $product) {

                $source = $product->source;
                $asin = $product->ASIN;
                $asin_affiliate_tag = $post_settings->affiliate_tags;
                $preview_image = $product->featured_image;
                
                $product_name = $product->{'Short Product Name'};
                $rating = $product->{'Product Rating'};
                $reviews_count = $product->{'Product Number of Reviews'};

                $AffiliateLink = "https://" .$source . "/dp/" . $asin . "/?tag=" . $asin_affiliate_tag;

                $html .= "<div class='one_prod_item'>";
                $html .= "<img class='prod_item_list_img' src='" . $preview_image . "' />";
                $html .= "<div class='prod_item_list_texts'>";
                $html .= "<div class='prod_item_list_title'><a rel='nofollow sponsored' href='" . $AffiliateLink . "' target='_blank'>" . $product_name . "</a></div>";
                $html .= "<div class='prod_item_list_rating'>";
                $html .= "<span style='left: -96px;position: relative;top: 1px;'>" . $rating . "</span>";
                $html .= "<span class='main_raiting_count' style='margin-left: 15px;'>" . sprintf( esc_html__( '%s Ratings', 'gizzmo-ai' ), $reviews_count ) . "</span>";
                $html .= "<div class='stars-rating-main' style='--rating: " . $rating . ";float: left;top: 4.5px;left: 35px;'>";
                $html .= "<div class='rating'></div>";
                $html .= "</div>";
                $html .= "</div>";
                $html .= "</div>";
                $html .= "<div class='prod_item_list_bt'>";
                $html .= "<a rel='nofollow sponsored' style='border: 1px solid #6c6a5c;' href='" . $AffiliateLink . "' target='_blank' class='wp-block-button__link small_bt'>" . esc_html__( 'Buy On Amazon', 'gizzmo-ai' ) . "</a>";
                $html .= "</div>";
                $html .= "</div>";
            }

            $product_list_html = "<div class='products_list'>" . $html . "</div><br><br>";
            $content .= $product_list_html;

        }


        #introduction_paragraphs ==================================================================
        $introduction_paragraphs_html = '';
        foreach ($introduction_paragraphs as $paragraph) {
            $introduction_paragraphs_html .= '<p>' . $paragraph . '</p>';
        }
        $content .= $introduction_paragraphs_html;

        


        #actual content products sections =================================================================
        $product_count = 1;
        $post_tags = array();
        $previous_section_hyperlinked = false;
        foreach ($product_in_roundup as $product) {

            $source = $product->source;
            $asin = $product->ASIN;
            $asin_affiliate_tag = $post_settings->affiliate_tags;
            $preview_image = $product->featured_image;
            
            $product_name = $product->{'Short Product Name'};
            $rating = $product->{'Product Rating'};
            $reviews_count = $product->{'Product Number of Reviews'};

            $AffiliateLink = "https://" .$source . "/dp/" . $asin . "/";
            $reviews_link = "https://" . $source . "/product-reviews/" . $asin . "/";
            if ($asin_affiliate_tag != '' && $asin_affiliate_tag != null) {
                $AffiliateLink = "https://" .$source . "/dp/" . $asin . "/?tag=" . $asin_affiliate_tag;
                $reviews_link = "https://" . $source . "/product-reviews/" . $asin . "/?tag=" . $asin_affiliate_tag;
            }
            

            

            //get the first tags from the first 4 products 
            if (property_exists($product, 'seo_tags')) {
                //check if th enumber of tags in $post_tags is samller than 4
                if (count($post_tags) >= 5) {
                    
                }
                else{
                    $product_post_tags = $product->seo_tags;
                    //add the first tag to the post tags
                    if (count($product_post_tags) > 0) {
                        array_push($post_tags, $product_post_tags[0]);
                    }
                }
            }  


            

            //check if conclusion exists in the product
            if (property_exists($product, 'conclusion')) {
                 
            } else {
                //skip this product
                continue;
            }


            $conclusion_text = $product->conclusion;


            if ($post_settings->keyphrase_hyperlinks == 'yes')
            {
                #if ($previous_section_hyperlinked == false) {
                $linkable_key_benefit_text = '';
                if (property_exists($product, 'linkable_key_benefit_text')) {
                    $linkable_key_benefit_text = $product->linkable_key_benefit_text;

                    $conclusion_text = str_replace($linkable_key_benefit_text, '<a rel="nofollow sponsored" target="_blank" href="' . $AffiliateLink . '">' . $linkable_key_benefit_text . '</a>', $conclusion_text);
                    #$previous_section_hyperlinked = true;
                }
                #}
                #else {
                #    $previous_section_hyperlinked = false;
                #}
            }






            $conclusion_paragraphs_html = '<p>' . $conclusion_text . '</p>';
             
            $pros_html = '';
            $cons_html = '';
            if($post_settings->roundup_pros_cons == "yes")
            {
                $pros = $product->pros;
                if (count($pros) > 0) {
                    $pros_html = '<ul>';
                    foreach ($pros as $pro) {
                        $pros_html .= '<li>' . $pro . '</li>';
                    }
                    $pros_html .= '</ul>';
                } else {
                    $pros_html = '';
                }
        
                $cons = $product->cons;
                if (count($cons) > 0) {
                    $cons_html = '<ul>';
                    foreach ($cons as $con) {
                        $cons_html .= '<li>' . $con . '</li>';
                    }
                    $cons_html .= '</ul>';
                } else {
                    $cons_html = '';
                }
        
        
                if ($pros_html == '') {
                    $item_html = str_replace('Pros:', '', $item_html);
                }
                if ($cons_html == '') {
                    $item_html = str_replace('Cons:', '', $item_html);
                }
            }
    
             
     
            $price = '$'. $product->{'Product Price'};
    
            #check if the product has a preview image, if so, and it is the first product, then use it as the post featured image
            $item_html = $one_roundup_item_html;
            $item_html = str_replace('{{ShortName}}', $product_name, $item_html);
            #$item_html = str_replace('{{Price}}', $price, $item_html);
            $item_html = str_replace('{{ImageSource}}', $preview_image, $item_html);

            if ($is_pro_roundup == true)
            {
                $item_html = str_replace('{{product_number}}', $product_count, $item_html);
                $product_count++;
            }


            if($post_settings->roundup_rating_reviews == "yes")
            {

                $item_rating_html = '';
                $item_rating_html .= '<div class="Product_Rating">';
                $item_rating_html .= '<div class="Product_Main_rating">';
                $item_rating_html .= '<span class="main_raiting_count">' . $reviews_count . ' ' . $ratings_title . '</span>';
                $item_rating_html .= '<div class="stars-rating-main" style="--rating: '. $rating . ';float: right;top: 4.5px;"><div class="rating"></div></div>';
                $item_rating_html .= '<span class="main_rating_num">'.$rating.'</span>';
                $item_rating_html .= '</div>';
                #<div class="Product_Feature_Rank">{{FeaturesAndRatings}}</div>
                $item_rating_html .= '</div>';

                $item_html = str_replace('{{item_rating_html}}', $item_rating_html, $item_html);

                $item_review_html = '';
                $item_review_html .= '<div class="Read_All_Reviews">';
                $item_review_html .= '<a href="' . $reviews_link .'" target="_blank" style="font-size: 11px;text-decoration: underline;" class="wp-block-button__link">'.$read_all_user_reviews_title .'</a>';
                $item_review_html .= '</div>';

                $item_html = str_replace('{{item_Read_All_Reviews_html}}', $item_review_html, $item_html);
            }
            else
            {
                $item_html = str_replace('{{item_rating_html}}', '', $item_html);
                $item_html = str_replace('{{item_Read_All_Reviews_html}}', '', $item_html);
                 
            }


            if($post_settings->CTAs == "yes")
            {
                $item_cta_html = '';
                $item_cta_html .= '<div class="CTA_Button">';
                $item_cta_html .= '<div class="wp-block-button"><a href="'.$AffiliateLink.'" target="_blank" class="wp-block-button__link gizzmo_link">'.$cta_title.'</a></div>';
                $item_cta_html .= '</div>';
                
                $item_html = str_replace('{{item_CTA_html}}', $item_cta_html, $item_html);

                $item_cta_mobile_html = '';
                $item_cta_mobile_html .= '<div class="CTA_Button_mobile">';
                $item_cta_mobile_html .= '<div class="wp-block-button"><a href="'.$AffiliateLink.'" target="_blank" class="wp-block-button__link gizzmo_link">'.$cta_title.'</a></div>';
                $item_cta_mobile_html .= '</div>';

                $item_html = str_replace('{{item_CTA_Mobile_html}}', $item_cta_mobile_html, $item_html);

            }
            else
            {
                $item_html = str_replace('{{item_CTA_html}}', '', $item_html);
                $item_html = str_replace('{{item_CTA_Mobile_html}}', '', $item_html);
            }

            $item_html = str_replace('{{ProductText}}', $conclusion_paragraphs_html, $item_html);
            $item_html = str_replace('{{AffiliateLink}}', $AffiliateLink, $item_html);
            

            if($post_settings->roundup_pros_cons == "yes")
            {
                $item_html = str_replace('{{Pros}}', $pros_html, $item_html);
                $item_html = str_replace('{{Cons}}', $cons_html, $item_html);
                $item_html = str_replace('{{pros_title}}', $pros_title, $item_html);
                $item_html = str_replace('{{cons_title}}', $cons_title, $item_html);
            }
            else
            {
                $item_html = str_replace('{{Pros}}', '', $item_html);
                $item_html = str_replace('{{Cons}}', '', $item_html);
                $item_html = str_replace('{{pros_title}}', '', $item_html);
                $item_html = str_replace('{{cons_title}}', '', $item_html);
            }

            $item_html = str_replace('{{cta_title}}', $cta_title, $item_html);
            
            $content .= $item_html;
        }


        



        $content = $roundup_style . $content;

        $post_id = wp_insert_post(
            array(
                'post_title' => $post_title,
                'post_content' => $content,
                'post_status' => 'draft',
                'post_type' => 'post'
            )
        );

        if ($post_id) {
            // Add custom meta field with the identifier "gizzmo_post"
            add_post_meta($post_id, 'gizzmo_post', true);
        }

        //insert post tags
        // check if $post_tags is not empty
        $all_tags = $post_tags;
        if($post_settings->tags == "yes")
        {
            if (count($post_tags) > 0) {
                wp_set_post_tags($post_id, $post_tags);
            }
        }
         


        if ($focus_keyphrase == "-") {
            $focus_keyphrase = "";
        }
         

        update_post_meta($post_id,'_yoast_wpseo_metadesc',$meta_Description);
        update_post_meta($post_id,'_yoast_wpseo_focuskw',$focus_keyphrase);

        if ($featured_image != '')
        {
            $attachment_id = gizzmo_ai_attach_image_file($featured_image, $post_id);
            set_post_thumbnail($post_id, $attachment_id);
        }
        

        $all_tags = implode(',', $all_tags);
        $post_data = array(
            'task_id' => $task_id,
            'new_wp_post_id' => $post_id,
            'post_title' => $post_title,
            'post_tags' => $all_tags
        );
        $log_post_data_enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/g_move_task_to_archive';
        $res = gizzmo_ai_make_post_json_request($log_post_data_enpoint_url, $post_data);


    }

    function gizzmo_ai_create_listicle_post($task_data)
    {

        $account_id = $task_data->account_id;
        $property_id = $task_data->property_id;
        $content_type = $task_data->content_type;
        $asin = $task_data->review_asin;
        $task_id = $task_data->id;
        $asin_json_res = get_ready_json_file($account_id, $property_id, $content_type, $asin, $task_id);
        
        $pros_title = $asin_json_res->translations->{'Pros:'};
        $cons_title = $asin_json_res->translations->{'Cons:'};
        $qanda_title = $asin_json_res->translations->{'Questions & Answers:'};
        $cta_title = $asin_json_res->translations->{'Buy On Amazon'};
        $question_title = $asin_json_res->translations->{'Question:'};
        $answer_title = $asin_json_res->translations->{'Answer:'};
        $similar_posts_title = $asin_json_res->translations->{'Read also:'};
        $conclusion_title = $asin_json_res->translations->{'Conclusion'};
        $read_all_user_reviews_title = $asin_json_res->translations->{'Read All User Reviews'};
        $ratings_title = $asin_json_res->translations->{'Ratings'};

        
        $post_settings = $asin_json_res->post_settings;
        $language = $post_settings->language;



        $post_title = $asin_json_res->Title;
        $post_Intro = $asin_json_res->Intro;
        $focus_keyphrase = $post_settings->seo_keyword;
        $post_featured_image = $asin_json_res->featured_image;
        $meta_description = $post_Intro; #temp, missing in json        

        #check if the Conclusion section is not empty or even exists
        $post_conclusion = "";
        if (property_exists($asin_json_res, 'Conclusion')) {
            $post_conclusion = $asin_json_res->Conclusion;
        }
        
         
        $pros_title_text = 'For';
        $cons_title_text = 'Against';
         
        

        $content = "";

        $content .= '<h2>' . $post_Intro . '</h2>';

        $gizzmo_div = "<form id='gizzmo_post_details_form' style='display:none'>";
        $gizzmo_div .=  "<input type='hidden' name='form_gizzmo_post_id' id='form_gizzmo_post_id' value=''>";
        $gizzmo_div .=  "<input type='hidden' name='form_gizzmo_website_id' id='form_gizzmo_website_id' value='". $property_id ."'>";
        $gizzmo_div .=  "</form>";

        $content = $gizzmo_div . $content;



        $content_sections = $asin_json_res->Sections;

        $section_index = 0;
        foreach ($content_sections as $section) {
            $section_title = $section->Title;

            $section_paragraphs = $section->Paragraphs;

            $image_alt = $section->Image_data->alt;
            $image_caption = $section->Image_data->caption;
            $image_src = $section->Image_data->image_url;
            
            $section_html = '';
            $section_html = '<h3>' . $section_title . '</h3>';


            if ($image_src != '')
            {
                $image_html ='';
                $image_html .= '<figure class="wp-block-image size-large">';
                $image_html .= '<a class="gizzmo_link" data-linktype="image" rel="nofollow" target="_Blank" href="#">';
                $image_html .= '<img decoding="async" src="' . $image_src . '" alt="' . $image_alt . '" class="wp-image-840" />';
                $image_html .= '</a>';
                $image_html .= '</figure>';
                $section_html .= $image_html;
            }

            foreach ($section_paragraphs as $paragraph) {
                $section_html .= '<p>' . $paragraph . '</p>';
            }

            $section_index++;
            
            $content .= $section_html;

        }


        


        //create the conclusion paragraph
        //check if the conclusion_paragraphs section is not empty or even exists
        if ($post_settings->conclusion == "yes") {
            $conclusion = '';
            if ($post_conclusion != '') {
                $conclusion = '<h2>'. $conclusion_title .'</h2>';
                $conclusion .= '<p>' . $post_conclusion . '</p>';
                $content .= $conclusion;
            }
        }
        
        if ($post_settings->faqs == "yes") {
            if (property_exists($asin_json_res, 'qanda')) {
                $faqs = $asin_json_res->qanda;
                if ($faqs != '') {
                    //make a for loop to loop through the faqs
                    $faqs_html = '<h2>'. $qanda_title .'</h2>';
                    foreach ($faqs as $faq) {
                        $faqs_html .= '<p><b>'. $question_title .' </b>' . $faq->question . '</p>';
                        $faqs_html .= '<p><b>'. $answer_title .' </b>' . $faq->answer . '</p>';
                    }

                    $content .= $faqs_html;
                }
            }
        }


        //similar_posts
        if ($post_settings->internal_linking == 'yes')
        {
            if ($asin_json_res->similar_posts != null && $asin_json_res->similar_posts != '' && $asin_json_res->similar_posts != 'No data found') {
                $selected_similar_post_ids = explode(',', $asin_json_res->similar_posts);
                if (count($selected_similar_post_ids) > 0) {
                    $similar_posts_html = '<h2>'.$similar_posts_title.'</h2>';
                    //split the selected_similar_post_ids string into array of ids by comma
                    
                    foreach ($selected_similar_post_ids as $similar_post_id) {
                        $similar_post = get_post($similar_post_id);
                        $similar_posts_html .= '<li><a href="' . get_permalink($similar_post_id) . '">' . $similar_post->post_title . '</a></li>';
                    }
                    $content .= $similar_posts_html;
                }
            }
        }



        $post_id = wp_insert_post(
            array(
                'post_title' => $post_title,
                'post_excerpt' => $meta_description,
                'post_content' => $content,
                'post_status' => 'draft',
                'post_type' => 'post'
            )
        );

        if ($post_id) {
            // Add custom meta field with the identifier "gizzmo_post"
            add_post_meta($post_id, 'gizzmo_post', true);
        }

        //insert post tags
        $all_tags = $asin_json_res->seo_tags;
       
        if ($post_settings->tags == "yes") {
            $post_tags = array();
            if (property_exists($asin_json_res, 'seo_tags')) {
                $post_tags = $asin_json_res->seo_tags;
                if (count($post_tags) > 4) {
                    $post_tags = array_slice($post_tags, 0, 4);
                }

                if (count($post_tags) > 0) {
                    $post_tags = implode(',', $post_tags);
                    wp_set_post_tags($post_id, $post_tags);
                }
            }
        }


        update_post_meta($post_id,'_yoast_wpseo_metadesc',$meta_description);

        if ($focus_keyphrase == "-") {$focus_keyphrase = "";}
        if ($focus_keyphrase != "") {
            update_post_meta($post_id,'_yoast_wpseo_focuskw',$focus_keyphrase);
        }
        
        

        if ($post_featured_image != '') {
            $attachment_id = gizzmo_ai_attach_image_file($post_featured_image, $post_id);
            set_post_thumbnail($post_id, $attachment_id);
        }

        $all_tags = implode(',', $all_tags);
        $post_data = array(
            'task_id' => $task_id,
            'new_wp_post_id' => $post_id,
            'post_title' => $post_title,
            'post_tags' => $all_tags
        );
        $log_post_data_enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/g_move_task_to_archive';
        $res = gizzmo_ai_make_post_json_request($log_post_data_enpoint_url, $post_data);
         

        

        #}



    }

    function gizzmo_ai_create_comparison_post($task_data)
    {

        $account_id = $task_data->account_id;
        $property_id = $task_data->property_id;
        $content_type = $task_data->content_type;
        $asin = $task_data->review_asin;
        $task_id = $task_data->id;
        $asin_json_res = get_ready_json_file($account_id, $property_id, $content_type, $asin, $task_id);
        
        $pros_title = $asin_json_res->translations->{'Pros:'};
        $cons_title = $asin_json_res->translations->{'Cons:'};
        $qanda_title = $asin_json_res->translations->{'Questions & Answers:'};
        $cta_title = $asin_json_res->translations->{'Buy On Amazon'};
        $question_title = $asin_json_res->translations->{'Question:'};
        $answer_title = $asin_json_res->translations->{'Answer:'};
        $similar_posts_title = $asin_json_res->translations->{'Read also:'};
        $conclusion_title = $asin_json_res->translations->{'Conclusion'};
        $read_all_user_reviews_title = $asin_json_res->translations->{'Read All User Reviews'};
        $ratings_title = $asin_json_res->translations->{'Ratings'};
         
        
        $firstProductHasCarosels = $asin_json_res->products[0]->has_carousal_items;
        $firstProductASIN = $asin_json_res->products[0]->asin;
        
        $secondProductHasCarosels = $asin_json_res->products[1]->has_carousal_items;
        $secondProductASIN = $asin_json_res->products[1]->asin;

        $post_settings = $asin_json_res->post_settings;

        $language = $post_settings->language;
        $asin_affiliate_tag = $post_settings->affiliate_tags;
        $post_title = $asin_json_res->blog_title;
        $product_keyphrase = $post_settings->seo_keyword;

        //get the post style
        $comparison_style = gizzmo_ai_read_file(plugin_dir_path(__FILE__) . 'admin/html_parts/comparison_css.txt');


        $content = "";
        
        #introduction_paragraphs ==================================================================
        $introduction_paragraph = "";
        if (property_exists($asin_json_res, 'introduction_paragraphs')) {
            $introduction_paragraphs = $asin_json_res->introduction_paragraphs;
            foreach ($introduction_paragraphs as $introduction_paragraph_item) {
                $introduction_paragraph .= '<p>' . $introduction_paragraph_item . '</p>';
            }
        }
        $content .= '<p>' . $introduction_paragraph . '</p>';



        #for_against ==================================================================
        if (property_exists($asin_json_res, 'for_against')) {
            //create the comparison for against table
            $for_against_items = $asin_json_res->for_against;
            //check if the for_against_items is not empty
            if (!empty($for_against_items)) {
                //make a for loop to loop through the for_against_items
                $for_against_html = '';
                $for_against_html .= '<div class="container_compare">';
                $for_against_html .= '<div class="panel_compare pricing-table">';
                
                foreach ($for_against_items as $prod_item) {

                    $product_asin = $prod_item->asin;
                    $product_source = "www.amazon.com";
                    #based on the asin, get the rank from the products_overll_rank array
                    #loop through the products_overll_rank array to find the asin that matches the product_asin and get the rank
                    $product_rank = 0;
                    foreach ($asin_json_res->products as $product) {
                        if ($product->asin == $product_asin) {
                            $product_rank = $product->rank;
                            $product_source = $product->source;
                        }
                    }

                    #create the product link with the affiliate tag if exists
                    $product_link = '';
                    if ($asin_affiliate_tag != '') {
                        $product_link = 'https://'. $product_source . '/dp/' . $product_asin . '?tag=' . $asin_affiliate_tag;
                    } else {
                        $product_link = 'https://'. $product_source . '/dp/' . $product_asin;
                    }

                    $one_for_against_html = '<div class="pricing-plan">';

                    $one_for_against_html .= '<h2 class="pricing-header">' . $prod_item->product . '</h2>';
                    $one_for_against_html .= '<div class="comp_rating">';
                    $one_for_against_html .= '<svg class="star_icon" xmlns="http://www.w3.org/2000/svg" width="22" height="16" id="star"><path style="marker: none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path> </svg>';
                    $one_for_against_html .= '<span>' . strval($product_rank) . '</span>';
                    $one_for_against_html .= '</div>';
                    $one_for_against_html .= '<p class="pricing-description"></p>';

                    $one_for_against_html .= '<span class="for_against_title">'. $pros_title .'</span>';
                    $one_for_against_html .= '<ul class="pricing-features">';
                    
                    foreach ($prod_item->pros as $pro_item) {
                        $one_for_against_html .= '<li class="pricing-features-item">' . $pro_item . '</li>';
                    }
                    $one_for_against_html .= '</ul>';
                    
                    $one_for_against_html .= '<span class="for_against_title">'. $cons_title .'</span>';
                    $one_for_against_html .= '<ul class="pricing-features">';
                    foreach ($prod_item->cons as $con_item) {
                        $one_for_against_html .= '<li class="minus pricing-features-item">' . $con_item . '</li>';
                    }

                    $one_for_against_html .= '</ul>';
                    if ($post_settings->CTAs == "yes") {
                        $one_for_against_html .= '<div style="text-align: center">';
                        $one_for_against_html .= '<a href="'. $product_link .'"  target="_blank" rel="nofollow">'. $cta_title .'</a>';
                        $one_for_against_html .= '</div>';
                    }

                    $one_for_against_html .= '</div>';

                    $for_against_html .= $one_for_against_html;
                }
                $for_against_html .= '</div>';
                $for_against_html .= '</div>';

                $content .= $comparison_style . $for_against_html;
            }
        }


        #comparison_paragraphs ==================================================================
        if (property_exists($asin_json_res, 'comparison_paragraphs')) {
            $comparison_paragraphs = $asin_json_res->comparison_paragraphs;
            //make a for loop to loop through the comparison_paragraphs
            $prev_item_had_image = false;
            $previous_section_hyperlinked = false;
            $paragraphs_index = 0;
            foreach ($comparison_paragraphs as $paragraph) {

                $paragraphs_index++;

                $content .= '<h2>' . $paragraph->title . '</h2>';
                
                $asin_source_credit = "Amazon.com";#temp, missing in json
                $seleted_product_image_link = '';#temp, missing in json

                
                try {
                    $seleted_product_image_link = $paragraph->imag_link;
                } catch (Exception $e) {
                    $seleted_product_image_link = '';
                }

                try {
                    $asin_source_credit = $paragraph->source;
                } catch (Exception $e) {
                    $asin_source_credit = "Amazon.com";
                }
                
                if ($post_settings->images_embed_in_content == "yes") {
                    if ($prev_item_had_image == false)
                    {
                        if ($paragraph->image != '') {

                            $image_html = '<figure class="wp-block-image size-large">';
                            $image_html .= '<a class="gizzmo_link" data-linktype="image" rel="nofollow" target="_blank" href="'. $seleted_product_image_link .'">';

                            
                            if ($product_keyphrase != '') {
                                $image_html .= '<img decoding="async" src="' . $paragraph->image . '" alt="' . $product_keyphrase . '" class="wp-image-840" />';
                            } else {
                                $image_html .= '<img decoding="async" src="' . $paragraph->image . '" alt="' . $paragraph->image . '" class="wp-image-840" />';
                            }
                            
                            
                            $image_html .= '<div class="post-meta-items meta-below gizzmo_img_credit" style="position: relative; top: -46px; z-index: 100000; background-color: #33333373; color: #fff; font-size: 12px; padding-left: 10px; width: 50%;">';
                            $image_html .= 'Credit - ' . $asin_source_credit;
                            $image_html .= '</div>';
                            $image_html .= '</a>';
                            $image_html .= '</figure>';


                            $content .= $image_html;

                            $prev_item_had_image = true;
                        }
                        else
                        {
                            $prev_item_had_image = false;
                        }
                    }
                    else
                    {
                        $prev_item_had_image = false;
                    }
                }




                $products_ranks = $paragraph->products_rank;

                $head_to_head_feature_html = '';
                $head_to_head_feature_html .= '<div class="container_compare">';
                $head_to_head_feature_html .= '<div class="panel_compare pricing-table">';

                
                $product_link = '';
                foreach ($products_ranks as $product_rank) {

                    #create the product link with the affiliate tag if exists
                    if ($asin_affiliate_tag != '') {
                        $product_link = 'https://'. $product_rank->source . '/dp/' . $product_rank->asin . '?tag=' . $asin_affiliate_tag;
                    } else {
                        $product_link = 'https://'. $product_rank->source . '/dp/' . $product_rank->asin;
                    }


                    $head_to_head_feature_html .= '<div class="pricing-plan" style="padding-top: 5px;padding-bottom: 5px;">';

                    $head_to_head_feature_html .= '<h2 class="pricing-header" style="font-size: 15px;margin-bottom: 1px;">' . $product_rank->short_product_name . '</h2>';
                    $head_to_head_feature_html .= '<div class="comp_rating" style="margin-top: 0px;">';
                    $head_to_head_feature_html .= '<svg class="star_icon" xmlns="http://www.w3.org/2000/svg" width="22" height="16" id="star"><path style="marker: none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path> </svg>';
                    $head_to_head_feature_html .= '<span>' . $product_rank->rank . '</span>';
                    $head_to_head_feature_html .= '</div>';
                    
                    if ($post_settings->CTAs == "yes") {
                        $head_to_head_feature_html .= '<div style="text-align: center;font-size: 15px;margin-top: 5px;">';
                        $head_to_head_feature_html .= '<a href="' . $product_link . '" target="_blank" rel="nofollow">'. $cta_title .'</a>';
                        $head_to_head_feature_html .= '</div>';
                    }

                    $head_to_head_feature_html .= '</div>';
                }

                $head_to_head_feature_html .= '</div>';
                $head_to_head_feature_html .= '</div>';


                $paragraph_text = $paragraph->text;

                if ($post_settings->keyphrase_hyperlinks == 'yes')
                {
                    if ($previous_section_hyperlinked == false) {
                        $linkable_key_benefit_text = '';
                        if (property_exists($paragraph, 'linkable_key_benefit_text')) {
                            $linkable_key_benefit_text = $paragraph->linkable_key_benefit_text;

                            $paragraph_text = str_replace($linkable_key_benefit_text, '<a rel="nofollow sponsored" target="_blank" href="' . $product_link . '">' . $linkable_key_benefit_text . '</a>', $paragraph_text);
                            $previous_section_hyperlinked = true;
                        }
                    }
                    else {
                        $previous_section_hyperlinked = false;
                    }
                }


                $content .= '<p>' . $paragraph_text . '</p>';
                $content .= $head_to_head_feature_html;

                
                if ($paragraphs_index == 3) {
                    if ($post_settings->carousels == 'yes')
                    {
                        if ($firstProductHasCarosels == "True")
                        {
                            $content .= '<div class="gizzmo_section" style="padding-top: 20px;padding-bottom: 20px;"><iframe src="https://client.gizzmo.ai/carousel/index.html?wid=&asin='. $firstProductASIN .'&affid='. $asin_affiliate_tag .'&lang='. $language .'" style="width: 100%; height: 323px; border: none;" scrolling="no"></iframe></div>';
                        }
                    }
                }
                 
            }
        }


        #conclusion ==================================================================
        if ($post_settings->conclusion == "yes") {
            $conclusion = '';
            if (property_exists($asin_json_res, 'conclusion')) {
                if ($asin_json_res->conclusion != '') {
                    $conclusion_title = $asin_json_res->conclusion->title;
                    $conclusion_text = $asin_json_res->conclusion->paragraph;
                    $conclusion = '<h2>' . $conclusion_title . '</h2>';
                    $conclusion .= '<p>' . $conclusion_text . '</p>';
                    $content .= $conclusion;
                }
                
            }
        }

        #faqs ==================================================================
        if ($post_settings->faqs == "yes") {
            $faqs_html = '';
            if (property_exists($asin_json_res, 'faqs')) {
                $faqs = $asin_json_res->faqs;
                if ($faqs != '') {
                    //make a for loop to loop through the faqs
                    $faqs_html .= '<h2>'.$qanda_title.'</h2>';
                    foreach ($faqs as $faq) {
                        $faqs_html .= '<p><b>'.$question_title.' </b>' . $faq->question . '</p>';
                        $faqs_html .= '<p><b>'.$answer_title.' </b>' . $faq->answer . '</p>';
                    }
                    $content .= $faqs_html;
                }
            }
        }
         


        #carousel =================================================================
        if ($post_settings->carousels == 'yes')
        {
            if ($secondProductHasCarosels == "True")
            {
                $content .= '<div class="gizzmo_section" style="padding-top: 20px;padding-bottom: 20px;"><iframe src="https://client.gizzmo.ai/carousel/index.html?wid=&asin='. $secondProductASIN .'&affid='. $asin_affiliate_tag .'&lang='. $language .'" style="width: 100%; height: 323px; border: none;" scrolling="no"></iframe></div>';
            }
        }
         






        //similar_posts
        if ($post_settings->internal_linking == 'yes')
        {
            if ($asin_json_res->similar_posts != null && $asin_json_res->similar_posts != ''  && $asin_json_res->similar_posts != 'No data found') {
                $similar_posts_html = '<h2>'.$similar_posts_title.'</h2>';
                //split the selected_similar_post_ids string into array of ids by comma
                $selected_similar_post_ids = explode(',', $asin_json_res->similar_posts);
                foreach ($selected_similar_post_ids as $similar_post_id) {
                    $similar_post = get_post($similar_post_id);
                    $similar_posts_html .= '<li><a href="' . get_permalink($similar_post_id) . '">' . $similar_post->post_title . '</a></li>';
                }
                $content .= $similar_posts_html;
            }
        }
       

        $meta_description = '';
        if (property_exists($asin_json_res, 'blog_meta_description')) {
            $meta_description = $asin_json_res->blog_meta_description;
        }


        if ($post_title != "")
        {
            $post_title = str_replace('"', '', $post_title);

            $post_id = wp_insert_post(
                array(
                    'post_title' => $post_title,
                    'post_excerpt' => $meta_description,
                    'post_content' => $content,
                    'post_status' => 'draft',
                    'post_type' => 'post'
                )
            );

            if ($post_id) {
                // Add custom meta field with the identifier "gizzmo_post"
                add_post_meta($post_id, 'gizzmo_post', true);
            }
        }
        else
        {
            //echo "Something went wrong, please try again";
            return;
        }


        //insert post tags
        $all_tags = $asin_json_res->seo_tags;
        if ($post_settings->tags == "yes") {
            $post_tags = array();
            if (property_exists($asin_json_res, 'seo_tags')) {
                $post_tags = $asin_json_res->seo_tags;
                $all_tags = $asin_json_res->seo_tags;
                if (count($post_tags) > 7) {
                    $post_tags = array_slice($post_tags, 0, 7);
                }
                if (count($post_tags) > 0) {
                    $post_tags = implode(',', $post_tags);
                    wp_set_post_tags($post_id, $post_tags);
                }
            }
        }
        


        //insert the blog_meta_description
        if (property_exists($asin_json_res, 'blog_meta_description')) {
            $meta_description = $asin_json_res->blog_meta_description;
            //remove the first " from the meta_description and the last " if exists
            $meta_description = str_replace('"', '', $meta_description);
            if ($meta_description != '') {
                update_post_meta($post_id,'_yoast_wpseo_metadesc',$meta_description);
            }
        }

        //insert the focus_keyphrase
        if ($product_keyphrase != '') {
            update_post_meta($post_id,'_yoast_wpseo_focuskw',$product_keyphrase);
        }
        

        //insert the featured image
        $post_featured_image = '';
        if (property_exists($asin_json_res, 'featured_image')) {
            $post_featured_image = $asin_json_res->featured_image;
            if ($post_featured_image != '') {
                $attachment_id = gizzmo_ai_attach_image_file($post_featured_image, $post_id);
                set_post_thumbnail($post_id, $attachment_id);
            }
        }


        $all_tags_str = implode(',', $all_tags);

        $post_data = array(
            'task_id' => strval($task_id),
            'new_wp_post_id' => strval($post_id),
            'post_title' => $post_title,
            'post_tags' => $all_tags_str
        );

        //echo json_encode($post_data);
        
        $log_post_data_enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/g_move_task_to_archive';
        $res = gizzmo_ai_make_post_json_request($log_post_data_enpoint_url, $post_data);
         



 

        #}



    }



    

    /**
     * The core plugin class that is used to define internationalization,
     * admin-specific hooks, and public-facing site hooks.
     */
    require plugin_dir_path( __FILE__ ) . 'includes/class-gizzmo-ai.php';

    /**
     * Begins execution of the plugin.
     *
     * Since everything within the plugin is registered via hooks,
     * then kicking off the plugin from this point in the file does
     * not affect the page life cycle.
     *
     * @since    1.0.0
     */
    function gizzmo_ai_init() {

        $plugin = new Gizzmo_Ai();
        $plugin->run();

    }
    gizzmo_ai_init();
