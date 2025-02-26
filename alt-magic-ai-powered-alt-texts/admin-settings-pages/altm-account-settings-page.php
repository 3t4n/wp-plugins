<?php

// Ensure this file is not accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Render plugin settings page
function alt_magic_render_settings_page() {

    // Enqueue the CSS file with a version number
    //altm_log('Enqueueing AI settings page CSS');
    wp_enqueue_style(
        'alt-magic-media-popup-button-css',
        esc_url(plugin_dir_url(__FILE__) . '../css/altm-ai-settings-page.css'),
        array(), // Dependencies
        '1.0.0'  // Version number
    );

    // Register and enqueue the JavaScript file
    wp_register_script(
        'alt-magic-settings-js',
        esc_url(plugin_dir_url(__FILE__) . '../scripts/altm-account-settings-page-script.js'),
        array('jquery'), // Dependencies
        '1.0.0', // Version number
        true // Load in footer
    );
    wp_enqueue_script('alt-magic-settings-js');

    // Pass data to the JavaScript file
    wp_localize_script('alt-magic-settings-js', 'altMagicSettings', array(
        'pluginUrl' => esc_url(plugin_dir_url(__FILE__)),
        'nonceSave' => wp_create_nonce('alt_magic_save_api_key_nonce'),
        'nonceRemove' => wp_create_nonce('alt_magic_remove_api_key_nonce'),
    ));

    $api_key = get_option('alt_magic_api_key');
    $is_verified = !empty($api_key);

    ?>
    <div class="wrap">
        <h1>Alt Magic Settings</h1>
        <div class="account-settings-container">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><h2>API Key</h2></th>
                    <td>
                        <input style="border-radius: 4px; padding-block: 4px; width: 320px;" type="password" id="alt_magic_api_key" name="alt_magic_api_key" value="<?php echo esc_attr($api_key); ?>" />
                        <button type="button" id="verify-api-key" 
                            style="background-color: <?php echo $is_verified ? 'white' : '#f66e3c'; ?>;
                            border: 1px solid #f66e3c; 
                            padding-block: 11px; 
                            padding-inline: 32px; 
                            border-radius: 4px; 
                            color: <?php echo $is_verified ? '#f66e3c' : 'white'; ?>; 
                            cursor: pointer;">
                        Verify
                        </button>
                        <p class="alt-magic-setting-sub-notice">Note: Please enter your API key to continue. You can generate your API key from your <a href="https://app.altmagic.pro/wordpress-plugin" target="_blank">Alt Magic WordPress Page</a></p>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="display: flex; gap: 4px; margin-top: -10px; align-items: center;" id="api-key-status">
                        <?php if ($is_verified) : ?>
                            <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../assets/altm-green-tick.svg'); ?>" alt="Green Tick" style="width: 20px; height: 20px;">
                            <p style="color: #00B612; font-weight: bold; ">API key is verified.</p>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
        
                            
            <span id="spinner" class="loading-text" style="display: none;">Please wait while we verify your API key...</span>

            
            <div id="user-details" style="display: none;">
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><h2>Account</h2></th>
                        <td>
                            <div style="display: flex; align-items: center;">
                                <p class="profile-picture" id="profile-picture" style="margin: 0px 10px 0px 0px; display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 50%;"></p>
                                <div>
                                    <h3 id="user-name" style="margin: 0;"></h3>
                                    <p id="user-email" style="margin: 0;"></p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><h2>Credits Available</h2></th>
                        <td>
                            <h3 class="credits-available-text" id="credits-available"></h3>
                        </td>
                    </tr>
                </table>
            </div>
            
            
            <div id="remove-api-key-container" class="remove-api-key-container" style="display: none;">
                <p><button class="remove-api-key-button" type="button" id="remove-api-key">Remove API Key</button> Removing your API key will disable all AI features in your WordPress site.</p>
            </div>
            
            
            
            
            <div id="help-video-container" style="display: none; margin-bottom: 20px;">
                <h2>How to get your API Key?</h2>
                <p>Watch our video tutorial to learn how to get your API key.</p>
                <iframe style="padding: 16px; background-color: #d5d5ff; margin-left: 210px; border-radius: 10px; margin-top: 20px;" width="560" height="315" src="https://www.youtube.com/embed/Fm0grW8zpKc?si=E53K8C2yBnRib1k0" title="Generate API Key with Alt Magic Tutorial" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
           
        </div>
    </div>
    
    <?php
}

// Save API key and user_id via AJAX
function alt_magic_save_api_key() {

    // Check nonce for security
    $nonce = isset($_POST['nonce']) ? sanitize_text_field(wp_unslash($_POST['nonce'])) : '';
    if (!wp_verify_nonce($nonce, 'alt_magic_save_api_key_nonce')) {
        wp_send_json_error(array('message' => 'Invalid nonce.'));
        return;
    }   

    if ( isset( $_POST['api_key'] ) && isset( $_POST['user_id'] ) ) {
        $api_key = sanitize_text_field( wp_unslash($_POST['api_key']) );
        $user_id = sanitize_text_field( wp_unslash($_POST['user_id']) );
        
        update_option( 'alt_magic_api_key', $api_key );
        update_option( 'alt_magic_user_id', $user_id );
        update_option( 'alt_magic_account_active', 1 );
    }
    wp_die();
}
add_action('wp_ajax_alt_magic_save_api_key', 'alt_magic_save_api_key');

// Remove API key via AJAX
function alt_magic_remove_api_key() {

    // Check nonce for security
    $nonce = isset($_POST['nonce']) ? sanitize_text_field(wp_unslash($_POST['nonce'])) : '';
    if (!wp_verify_nonce($nonce, 'alt_magic_remove_api_key_nonce')) {
        wp_send_json_error(array('message' => 'Invalid nonce.'));
        return;
    }

    delete_option('alt_magic_api_key');
    delete_option('alt_magic_user_id');
    update_option( 'alt_magic_account_active', 0 );
    wp_die();
}
add_action('wp_ajax_alt_magic_remove_api_key', 'alt_magic_remove_api_key');