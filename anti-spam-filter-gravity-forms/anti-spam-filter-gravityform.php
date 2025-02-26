<?php

/**
 * Plugin Name: Anti-Spam Filter for Gravity Forms
 * Description: Anti-Spam Filter for Gravity Forms is a lightweight yet powerful tool designed to protect your Gravity Forms from spam  submissions. It automatically detects and filters out spam based on customizable settings, ensuring only legitimate form entries are    received.
 * Version: 1.0.1
 * Author: teamtp
 * Author URI: https://techpumpkin.ca
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: anti-spam-filter-gravityform
  */


// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
define( 'ASFGF_PLUGIN_VERSION', '1.0.1' ); // Define the plugin version at the top of your plugin file

add_action('admin_init', 'asfgf_my_plugin_activation');

function asfgf_my_plugin_activation() {
    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

    if (isset($_GET['activate']) && isset($_REQUEST['_wpnonce'])) {
        $nonce = sanitize_text_field(wp_unslash($_REQUEST['_wpnonce'])); // Sanitize and unslash nonce
        if (!wp_verify_nonce($nonce, 'activate-plugin_' . plugin_basename(__FILE__))) {
            return; // Exit if nonce verification fails
        }
    }
    // Check if Gravity Forms is active
    if (!is_plugin_active('gravityforms/gravityforms.php')) {
        // Deactivate this plugin if Gravity Forms is not active
        deactivate_plugins(plugin_basename(__FILE__));
        // Optionally, display an admin notice
        add_action('admin_notices', function() {
            echo '<div class="error notice is-dismissible"><p>';
        echo 'Anti-Spam Filter for Gravity Forms Plugin requires Gravity Forms to be active. ';
        echo '</p></div>';
        });
        if (isset($_GET['activate'])) {            
            
                    unset($_GET['activate']);
        }
    }else{
        add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'asfgf_plugin_action_links');
    }

   
}
function asfgf_plugin_action_links($links) {
    // Add settings link
    $settings_link = '<a href="admin.php?page=asfgf_spam_filter">' . __('Settings', 'anti-spam-filter-gravityform') . '</a>';
    array_unshift($links, $settings_link); // Add the settings link at the beginning of the links array

    return $links;
}


add_action('admin_enqueue_scripts', 'asfgf_register_admin_assets');

function asfgf_register_admin_assets() {
    wp_enqueue_style('asfgf-admin-style', plugin_dir_url(__FILE__) . 'assets/css/asfgf-admin-style.css', array(), ASFGF_PLUGIN_VERSION);
    wp_enqueue_script('asfgf-admin-script', plugin_dir_url(__FILE__) . 'assets/js/asfgf-admin-script.js', array('jquery'), ASFGF_PLUGIN_VERSION, true);
}

add_filter( 'gform_pre_send_email' , 'asfgf_before_email' , 10, 4);

function asfgf_before_email( $email,$message_format, $notification, $entry ){
    $asfgf_subject = get_option('asfgf_subject_text'); 

      $form_ids = get_option('asfgf_form_id');

      $form_ids = array_map('intval', explode(',', $form_ids ));

      if (isset( $entry['form_id'] ) &&!in_array($entry['form_id'], $form_ids)) {
        return $email;    
        }
        if(strpos($notification['subject'], $asfgf_subject)  === false){
            return $email;
        }
    if(get_option('asfgf_kill_spam')){
        
        $email['abort_email'] = true;
    };

    

    return $email;
}

// Hook into Gravity Forms notification filter
add_filter('gform_notification', 'asfgf_modify_notification_subject', 10, 3);



function asfgf_modify_notification_subject($notification, $form, $entry) {

   // Check if plugin is enabled

    if (!get_option('asfgf_enabled')) {

        return $notification;

    }



     // Get the form ID from the settings

    $form_ids = get_option('asfgf_form_id');

    $form_ids = array_map('intval', explode(',', $form_ids));


    
    // Only apply for the specified form ID

    if ($form['id'] != $form_ids[0]) {

         return $notification;

    }



    $contains_spam = false;



    // Get the keywords from the settings



    $keywords_enabled = get_option('asfgf_keywords_enabled');

    $user_keywords = get_option('asfgf_keywords', '');

    $keywords = ($keywords_enabled && !empty($user_keywords) ) ?  explode(',', strtolower($user_keywords)) : [];

    $asfgf_subject = get_option('asfgf_subject_text'); 

    // Iterate through the form fields to check for keywords and Cyrillic characters

    foreach ($form['fields'] as $field) {
        $contains_spam = false;
        
        if (isset($field->inputs) && is_array($field->inputs)) {
            foreach ($field->inputs as $input) {
                $input_id = $input['id'];
                $field_value = asfgf_get_field_value($entry, $input_id);
                $contains_spam = asfgf_check_for_spam($field_value, $keywords);
                if ($contains_spam) {
                    break;
                }
            }
        } else {
            $field_id = $field->id; 
            $field_value = asfgf_get_field_value($entry, $field_id);
            $contains_spam = asfgf_check_for_spam($field_value, $keywords);
        }
    
        // Break loop if spam is already found
        if ($contains_spam) {
            break;
        }
    }

    
    // Modify the notification subject based on the checks
    if ($contains_spam) {
        $notification['subject'] = 'SPAM Alert -' . $notification['subject'];
    }
    
    return $notification;
}
    
    function asfgf_get_field_value($entry, $id) {
        return strtolower(rgar($entry, (string) $id));
    }
    
    function asfgf_check_for_spam($field_value, $keywords) {
        return asfgf_check_cyrillic_test($field_value) || asfgf_check_keyword_test($field_value, $keywords);
    }
    
    function asfgf_check_cyrillic_test($field_value) {
        return get_option('asfgf_cyrillic') && preg_match('/[\p{Cyrillic}]/u', $field_value);
    }
    
    function asfgf_check_keyword_test($field_value, $keywords) {
        return get_option('asfgf_keywords_enabled') 
        && !empty($keywords) 
        && array_filter($keywords, function($keyword) use ($field_value) {
            return strpos($field_value, $keyword) !== false;
        });
    }



// Create a menu item in the WordPress dashboard

add_action('admin_menu', 'asfgf_menu');



function asfgf_menu() {
    if (is_plugin_active('gravityforms/gravityforms.php')) {

    add_menu_page(

        'GravityForm Anti-Spam Filter Settings',

        'ASFGF',

        'manage_options',

        'asfgf_spam_filter',

        'asfgf_settings_page',

        'dashicons-shield-alt',

        100

    );
}

}





function asfgf_settings_page() {
    ?>
    <div class="asfgf_wrap">
    <?php
        settings_errors('asfgf_settings'); // Display saved messages
        ?>
        <div style="margin: 20px 0px;">
            <h1>Anti-Spam Filter (Gravity Forms) Settings</h1>
        </div>

        <div style="display: flex; flex-wrap: wrap;">
            <div style="width: 75%; padding-right: 20px; box-sizing: border-box;">
                <form method="post" action="options.php">
                    <div class="container">
                    <?php settings_fields('asfgf_settings');
                    ?>

                    <div class="container-child" >
                        <h2>Enable/Disable Plugin</h2>
                        <div>
                        <?php do_settings_fields('asfgf_spam_filter', 'section_1'); ?>
                        </div>
                        <!-- <p style="color: #666; font-size: 0.9em;">Please check the box and press "Save" to enable features</p> -->
                    </div>

                    <div class="container-child">
                        <h2>Enable/Disable Cyrillic Text Filter</h2>
                        <?php do_settings_fields('asfgf_spam_filter', 'section_2'); ?>
                        <p style="color: #666; font-size: 0.9em;">Activate if you want to mark email notifications with Cyrillic text (Йуст а техт то тест плугин) in the message field as SPAM.</p>
                    </div>

                    <div class="container-child" >
                        <h2>Enable/Disable Keywords Filter</h2>
                        <?php do_settings_fields('asfgf_spam_filter', 'section_3'); ?>
                    </div>

                    <div class="container-child" >
                        <h2>Subject Text</h2>
                        <?php do_settings_fields('asfgf_spam_filter', 'section_4'); ?>
                    </div>

                    <div class="container-child" >
                        <h2>Enable/Disable Kill Spam</h2>
                        <?php do_settings_fields('asfgf_spam_filter', 'section_5'); ?>
                    </div>
                    </div>
                    <?php submit_button(); ?>
                </form>
            </div>

            <div style="width: 25%; padding-left: 20px; box-sizing: border-box;">
                <div style="border: 1px solid #d2d2d2; background-color: #fff; color: #000; padding: 10px; margin-bottom: 20px;">
                    <h2>About ASFGF</h2>
                    <p>Just another spam fighting plugin. The plugin is meant to filter out emails in Gravity Forms. You can use it to filter emails with Cyrillic characters or certain keywords. The filtered emails will have a prefix "SPAM Alert" in the subject, and you can excuse them or use rules to filter out.</p>
                </div>

                <div style="border: 1px solid #d2d2d2; background-color: #fff; color: #000; padding: 10px; margin-bottom: 20px;">
                <h2>Pro Version Features (Coming Soon):</h2>
                    <ul>
                    <li><strong>Unlimited Form IDs</strong> – Add as many forms as needed</li>
                    <li><strong>Unlimited Keywords</strong> – No limits on keyword customization</li>
                    <li><strong>Customizable Subject Text</strong> – Easily modify the subject text</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php
}




function asfgf_settings_init() {
    // Section 1
    add_settings_section('section_1', '', null, 'asfgf_spam_filter');
    add_settings_field(
        'asfgf_enabled',
        '',
        'asfgf_enabled_callback',
        'asfgf_spam_filter',
        'section_1'
    );
    register_setting('asfgf_settings', 'asfgf_enabled', 'sanitize_text_field');

    add_settings_field(
        'asfgf_form_id',
        '',
        'asfgf_form_id_callback',
        'asfgf_spam_filter',
        'section_1'
    );
    register_setting('asfgf_settings', 'asfgf_form_id', 'asfgf_form_id_validate');

    // Section 2
    add_settings_section('section_2', '', null, 'asfgf_spam_filter');
    add_settings_field(
        'asfgf_cyrillic',
        '',
        'asfgf_cyrillic_callback',
        'asfgf_spam_filter',
        'section_2'
    );
    register_setting('asfgf_settings', 'asfgf_cyrillic', 'sanitize_text_field');

    // Section 3
    add_settings_section('section_3', '', null, 'asfgf_spam_filter');
    add_settings_field(
        'asfgf_keywords_enabled',
        '',
        'asfgf_keywords_enabled_callback',
        'asfgf_spam_filter',
        'section_3'
    );
    register_setting('asfgf_settings', 'asfgf_keywords_enabled', 'sanitize_text_field');

    add_settings_field(
        'asfgf_keywords',
        '',
        'asfgf_keywords_callback',
        'asfgf_spam_filter',
        'section_3'
    );
    register_setting('asfgf_settings', 'asfgf_keywords', 'asfgf_keywords_validate');

    // Section 4
    add_settings_section('section_4', '', null, 'asfgf_spam_filter');
    add_settings_field(
        'asfgf_subject_text',
        '',
        'asfgf_subject_text_callback',
        'asfgf_spam_filter',
        'section_4'
    );
    register_setting('asfgf_settings', 'asfgf_subject_text', 'sanitize_textarea_field');

    // Section 5
    add_settings_section('section_5', '', null, 'asfgf_spam_filter');
    add_settings_field(
        'asfgf_kill_spam',
        '',
        'asfgf_kill_spam_callback',
        'asfgf_spam_filter',
        'section_5'
    );
    register_setting('asfgf_settings', 'asfgf_kill_spam', 'sanitize_text_field');
}




// Validation for Form IDs
function asfgf_form_id_validate($input) {
    if (preg_match('/^(\d+,)*\d+$/', $input)) {
        return $input;
    }
    add_settings_error(
        'asfgf_form_id',
        'invalid-form-id',
        'Form IDs must be a comma-separated list of numbers.',
        'error'
    );
    return '';
}

// Validation for Keywords
function asfgf_keywords_validate($input) {
    return sanitize_textarea_field($input);
}

// Hook the settings initialization
add_action('admin_init', 'asfgf_settings_init');


add_action('admin_notices', 'asfgf_settings_notice');
function asfgf_settings_notice() {
    if (get_current_screen()->id !== 'toplevel_page_asfgf_spam_filter') {
        return; // Exit if we're not on the correct settings page
    }
    // Check if 'settings-updated' is set and if we have a valid nonce
    if (isset($_GET['settings-updated']) && $_GET['settings-updated'] === 'true') {
        // Check for the nonce to verify the request's authenticity
        if (isset($_REQUEST['_wpnonce'])) {
            $nonce = sanitize_text_field(wp_unslash($_REQUEST['_wpnonce'])); // Sanitize and unslash the nonce
            if (!wp_verify_nonce($nonce, 'asfgf_settings')) {
                return; // Exit if nonce verification fails
            }
        }

        // Show the success message if nonce is valid and settings have been updated
        echo '<div class="notice notice-success is-dismissible asfgf-notice"><p>Settings updated!</p></div>';
    }
    
    // Show any other saved settings errors
    settings_errors('asfgf_settings');
}





function asfgf_enabled_callback() {
    // Get the current state of the anti-spam filter
    $enabled = get_option('asfgf_enabled');
    
    // Escape the dynamic content for safety
    $enabled_value = $enabled ? '1' : '0';
    $enabled_class = $enabled ? 'active' : '';
    
    // Render the toggle switch for enabling the plugin
    echo '<div class="asfgf_enabled_container toggleSwitch_container">';
    
    // Add a label for the toggle switch for accessibility
    echo '<div class="asfgf_sction_heading">';
    echo '<label for="asfgf_enabled" style="margin-right: 10px;">';
    echo esc_html__('Enable Plugin', 'anti-spam-filter-gravityform'); // Make it translatable
    echo '</label>';
    
  // Hidden input to hold the value of the enabled setting
    echo '<input type="hidden" name="asfgf_enabled" id="asfgf_enabled" value="' . esc_attr($enabled_value) . '" style="margin-left: 10px;">';

    
    // Toggle switch container
    echo '</div>';
    
    echo '<div class="asfgf_enabled_switch switch ' . esc_attr($enabled_class) . '" id="asfgf_enabled_toggleSwitch">
            <div class="asfgf_enabled_toggle toggle"></div>
        </div>';
    
    echo '</div>';
}


function asfgf_form_id_callback() {
    // Check if the anti-spam filter is enabled and get the form IDs
    $enabled = get_option('asfgf_enabled');
    $form_ids = get_option('asfgf_form_id');
    $form_ids_array = explode(',', $form_ids);

    // Escape dynamic values for safety
    $form_ids_value = esc_attr($form_ids);
    $enabled_style = $enabled ? 'block' : 'none';

    // Render the form ID input area
    echo '<div class="asfgf_form_id_box" style="display: ' . esc_attr($enabled_style) . ';">';
    echo '<div class="asfgf_sction_heading"><span>' . esc_html__('Form ID', 'anti-spam-filter-gravityform') . '</span></div>';
    echo '<div class="asfgf_form_id_box_container">';

    echo '<div class="bubble-container" id="bubble-container">';

    // Display existing form IDs
    foreach ($form_ids_array as $index => $form_id) {
        if (!empty($form_id) && $form_id < 2) {
            echo '<div class="bubble">
                    <span>' . esc_html($form_id) . '</span>
                    <button class="remove-button remove-bubble-button">×</button>
                  </div>';
        }
    }

    // Input field and buttons for adding new form IDs
    echo '</div>';
    echo '<input type="number" id="form-id-input" placeholder="' . esc_attr__('Enter Form ID', 'anti-spam-filter-gravityform') . '" min="1" />';
    echo '<button class="button-style" type="button" id="add-button">' . esc_html__('Add', 'anti-spam-filter-gravityform') . '</button>';
    echo '<input type="hidden" name="asfgf_form_id" id="asfgf_form_ids" value="' . esc_attr($form_ids_value) . '">';
    echo '<div id="error-message" style="color: red; display: none;">' . esc_html__('You can enter one form ID. For more, purchase the pro version.', 'anti-spam-filter-gravityform') . '</div>';
    echo '</div></div>';
}



function asfgf_cyrillic_callback() {
    // Get the current state of the anti-spam filter and Cyrillic filter
    $enabled = get_option('asfgf_enabled');
    $cyrillic = get_option('asfgf_cyrillic');

    // Escape dynamic values for safety
    $cyrillic_value = $cyrillic ? '1' : '0';
    $enabled_class = $enabled ? '' : 'disabled';
    $cyrillic_class = $cyrillic ? 'active' : '';

    // Render the toggle switch for filtering Cyrillic text
    echo '<div class="asfgf_cyrillic_enabled_container toggleSwitch_container">';
    echo '<label for="asfgf_cyrillic" style="margin-right: 10px;">';
    echo esc_html__('Filter Cyrillic Text', 'anti-spam-filter-gravityform');
    echo '</label>';

    // Hidden input for the state of Cyrillic filter (for form submission)
    echo '<input type="hidden" name="asfgf_cyrillic" id="asfgf_cyrillic" value="' . esc_attr($cyrillic_value) . '" >';


    // Toggle switch for enabling the filter
    echo '<div class="asfgf_cyrillic_enabled_switch switch ' . esc_attr($enabled_class) . ' ' . esc_attr($cyrillic_class) . '" id="asfgf_cyrillic_enabled_toggleSwitch">
            <div class="asfgf_cyrillic_enabled_toggle toggle"></div>
        </div>';
    echo '</div>';
}


function asfgf_keywords_enabled_callback() {
    // Get the current state of the anti-spam filter and keywords filter
    $enabled = get_option('asfgf_enabled');
    $keywords_enabled = get_option('asfgf_keywords_enabled');

    // Escape dynamic values for safety
    $keywords_enabled_value = esc_attr($keywords_enabled ? '1' : '0');
    $enabled_class = $enabled ? '' : 'disabled';
    $keywords_enabled_class = $keywords_enabled ? 'active' : '';

    // Render the toggle switch for filtering keywords
    echo '<div class="asfgf_keywords_enabled_container toggleSwitch_container">';
    echo '<label for="asfgf_keywords_enabled" style="margin-right: 10px;">';
    echo esc_html__('Filter Keywords', 'anti-spam-filter-gravityform');
    echo '</label>';

    // The hidden input for the state of the filter (for form submission)
    echo '<input type="hidden" name="asfgf_keywords_enabled" id="asfgf_keywords_enabled" value="' . esc_attr($keywords_enabled_value) . '" >';


    // Toggle switch for enabling the filter
    echo '<div class="asfgf_keywords_enabled_switch switch ' . esc_attr($enabled_class) . ' ' . esc_attr($keywords_enabled_class) . '" id="asfgf_keywords_enabled_toggleSwitch">
            <div class="asfgf_keywords_enabled_toggle toggle"></div>
        </div>';
    echo '</div>';

    // Description text, escaping static strings for safety
    echo '<p style="color: #666; font-size: 0.9em;">' . esc_html__('Filter email notifications by entering specific keywords.', 'anti-spam-filter-gravityform') . '</p>';
}


function asfgf_keywords_callback() {
    // Get the current state and keywords
    $enabled = get_option('asfgf_enabled');
    $keywords_enabled = get_option('asfgf_keywords_enabled');
    $keywords = get_option('asfgf_keywords'); 
    $keywords_array = explode(',', $keywords);

    // Render the keywords input area
    echo "<div id='asfgf_keywords_container' style='display: " . ($keywords_enabled ? 'block' : 'none') . ";'>";
    echo '<div class="bubble-container" id="bubble-container-remove-button-filter_keywords">';

    // Display existing keywords
    foreach ($keywords_array as $index => $keyword) {
        if (!empty($keyword) && $index < 4) {
            echo '<div class="bubble">
                    <span>' . esc_html($keyword) . '</span>
                    <button class="remove-button-filter_keywords remove-bubble-button" ' . ($enabled ? '' : 'disabled') . '>×</button>
                  </div>';
        }
    }

    // Input field and buttons for adding new keywords
    echo '  </div>
            <input type="text" id="keyword-text-id" placeholder="' . esc_attr__('Enter Keyword', 'anti-spam-filter-gravityform') . '" ' . ($enabled ? '' : 'disabled') . ' />
            <button class="button-style" type="button" id="add-button-keywords" ' . ($enabled ? '' : 'disabled') . '>' . esc_html__('Add', 'anti-spam-filter-gravityform') . '</button>
            <input type="hidden" name="asfgf_keywords" id="asfgf_keywords" value="' . esc_attr($keywords) . '">
            <div id="error-message" style="color: red; display: none;">' . esc_html__('You can enter 3 Keywords. For more, purchase the pro version.', 'anti-spam-filter-gravityform') . '</div>';
    echo '</div>';
}



function asfgf_subject_text_callback() {
    // Get the current subject text option, escape it to prevent XSS issues
    $asfgf_subject = "SPAM Alert -";

    // Escape the retrieved value to be safe
    $asfgf_subject = esc_attr($asfgf_subject);

    // Output the HTML content with escaped values for safety
    echo '<input type="text" name="asfgf_subject_text" id="asfgf_subject_text" value="' . esc_attr($asfgf_subject) . '" readonly>';

    
    // Using esc_html() to ensure safe output for static text
    echo '<ul>';
        echo '<li style="color: #666; font-size: 0.9em;">' . esc_html__('Before the text (Subject: - Abc subject)', 'anti-spam-filter-gravityform') . '</li>';
        echo '<li style="color: #666; font-size: 0.9em;">' . esc_html__('After the text (Subject: - SPAM Alert - Abc subject)', 'anti-spam-filter-gravityform') . '</li>';
        echo '<li style="color: #666; font-size: 0.9em;">' . esc_html__('Maximum character requirement: 20 characters.', 'anti-spam-filter-gravityform') . '</li>';
    echo '</ul>';
}


function asfgf_kill_spam_callback() {
    // Retrieve the options, ensuring the values are sanitized/escaped
    $enabled = get_option('asfgf_enabled');
    $asfgf_kill_spam = get_option('asfgf_kill_spam');

    // Escape values before using them in the HTML
    $enabled = esc_attr($enabled);
    $asfgf_kill_spam = esc_attr($asfgf_kill_spam);

    // Output the HTML content
    echo '<div class="asfgf_kill_spam_enabled_container toggleSwitch_container">';
    echo '<input type="hidden" name="asfgf_kill_spam" id="asfgf_kill_spam" value="' . ($asfgf_kill_spam ? '1' : '0') . '" style="margin-left: 10px;">';
    echo ' Kill Spam';
    echo '<div class="asfgf_kill_spam_enabled_switch switch ' . ($enabled ? '' : 'disabled') . ' ' . ($asfgf_kill_spam ? 'active' : '') . '" id="asfgf_kill_spam_enabled_toggleSwitch">
            <div class="asfgf_kill_spam_enabled_toggle toggle"></div>
        </div></div>';

    // Ensure that the description text is also safe to output and uses the 'asfgf' domain for translation
    echo '<p style="color: #666; font-size: 0.9em;">' . esc_html__('The Kill Spam feature keeps your inbox free from unwanted email notifications. It detects and eliminates unwanted email notifications based on specified keywords and any Cyrillic characters.', 'anti-spam-filter-gravityform') . '</p>';
}



