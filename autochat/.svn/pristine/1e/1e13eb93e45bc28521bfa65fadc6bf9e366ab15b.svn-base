<?php
/*
Plugin Name: AutoChat
Plugin URI : webtoptemplate.com
Description: A Chat plugin for WordPress is a tool that allows website owners to integrate real-time communication features directly into their WordPress websites.
Version:1.1
Author: autochat
Author URI : webtoptemplate.com
License : GPL v or later
Text Domain: auto-chat
Domain Path : /languages/
*/

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly
// Define constants
define('PCH_VERSION', '1.0');
define('PCH_NAME', plugin_basename(__FILE__));

define('PCH_FILE', __FILE__);
define('PCHBASE_PATH', plugin_dir_path(PCH_FILE));
define('PCHBASE_URL', plugins_url('/', PCH_FILE));

/**
 * Add the top level menu page.
 */



 include_once(plugin_dir_path(__FILE__) . 'submenu/menus.php');


 //require_once(plugin_dir_path(__FILE__) . 'frontend/selective.php');


/**
 * Callback function for the submenu page HTML.
 */
function woodecor_submenu_page_html()
{
    include_once(plugin_dir_path(__FILE__) . 'submenu/preset.php');
}

/**
 * Callback function for the submenu page HTML.
 */
function autochat_settings_page_html()
{
    include_once(plugin_dir_path(__FILE__) . 'submenu/settings.php');
}

/**
 * Callback function for the submenu page HTML.
 */
function autochat_integration_page_html()
{
    include_once(plugin_dir_path(__FILE__) . 'submenu/integration.php');
}

function woodecor_enqueue_scripts()
{

    wp_register_style('woodecor-stylesheet',  plugin_dir_url(__FILE__) . 'assets/css/wtt-style.css');
    wp_enqueue_script('my-simple-repeater-script', plugins_url('assets/js/repeater.js', __FILE__), array('jquery'), '1.0', true);
    
    wp_enqueue_style('woodecor-fontaesome-stylesheet',  plugin_dir_url(__FILE__) . 'assets/css/all.min.css', array(), '5.15.4', 'all');
    wp_enqueue_style('woodecor-stylesheet');
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
    wp_enqueue_script('wp-color-pic-scrip', plugins_url('assets/js/color-pic.js', __FILE__), array('wp-color-picker'), false, true);
   
		wp_enqueue_media();
        wp_enqueue_script('custom-media-uploader-script', plugin_dir_url(__FILE__) . 'assets/js/media.js', array('jquery', 'media-upload', 'thickbox'));

        // Localize the script with data that you want to pass to your JavaScript file
        wp_localize_script('custom-media-uploader-script', 'custom_media_uploader_vars', array(
            'title' => __('Choose or Upload a File', 'textdomain'),
            'button_text' => __('Use this file', 'textdomain')
        ));
	// our custom JS


}
add_action('admin_enqueue_scripts', 'woodecor_enqueue_scripts');
function woodecor_enqueue_front_scripts()
{

    // Enqueue your PHP file

    wp_register_style('woodecor-front-stylesheet',  plugin_dir_url(__FILE__) . 'assets/css/style.css');
    wp_enqueue_style('woodecor-fontaesome-stylesheet',  plugin_dir_url(__FILE__) . 'assets/css/all.min.css', array(), '5.15.4', 'all');
    wp_enqueue_style('woodecor-front-stylesheet');
      wp_enqueue_script('twk-chunk-common', plugins_url('assets/js/twk-chunk-common.js', __FILE__), array('jquery'),'1.0', true);
    wp_enqueue_script('my-simple-chat-script', plugins_url('assets/js/chat.js', __FILE__), array(), '1.0', true);
    wp_enqueue_script('my-script', plugins_url('assets/js/option.js', __FILE__), array('jquery'),'1.0', true);
  
    // Get the plugin settings
    $far_settings = get_option('far_plugin_settings');
    $far_plugin_settings = get_option('far_plugin_settings');
    $def_reply_opt = get_option('ch_def_reply_option');
    // Localize the script and pass the settings
   wp_localize_script('my-simple-chat-script', 'farSettingsnew', $far_plugin_settings);
   

    wp_localize_script('my-script', 'farSettings', $far_settings);
}

add_action('wp_enqueue_scripts', 'woodecor_enqueue_front_scripts');
function enqueue_chat_settings_script()
{
    // Check if it's the frontend
    if (!is_admin()) {
        // Enqueue the chat-settings.php file
        include_once(plugin_dir_path(__FILE__) . 'chat-settings.php');
    }
}

add_action('wp_enqueue_scripts', 'enqueue_chat_settings_script');



//* Function to convert Hex colors to RGBA
function hex2rgba( $color, $opacity = false ) {

    $defaultColor = 'rgb(255,255,255)';

    // Return default color if no color provided
    if ( empty( $color ) ) {
        return $defaultColor;
    }

    // Ignore "#" if provided
    if ( $color[0] == '#' ) {
        $color = substr( $color, 1 );
    }

    // Check if color has 6 or 3 characters, get values
    if ( strlen($color) == 6 ) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $defaultColor;
    }

    // Convert hex values to rgb values
    $rgb =  array_map( 'hexdec', $hex );

    // Check if opacity is set(rgba or rgb)
    if ( $opacity ) {
        if( abs( $opacity ) > 1 ) {
            $opacity = 1.0;
        }
        $output = 'rgba(' . implode( ",", $rgb ) . ',' . $opacity . ')';
    } else {
        $output = 'rgb(' . implode( ",", $rgb ) . ')';
    }

    // Return rgb(a) color string
    return $output;

}


function my_admin_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('my_custom_script', plugins_url('assets/js/settings.js', __FILE__), array('jquery'), null, true);
    wp_localize_script('my_custom_script', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('admin_enqueue_scripts', 'my_admin_scripts');

add_action('wp_ajax_my_save_settings', 'my_save_settings');
add_action('wp_ajax_nopriv_my_save_settings', 'my_save_settings');

function my_save_settings() {
    error_log('my_save_settings called');
    error_log('POST data: ' . print_r($_POST, true));
    if ( isset($_POST['achat_greetings_option'])) {
        $achat_greetings =  $_POST['achat_greetings_option'] === 'on' ? 'on' : 'off';

        // Update option
        update_option('achat_greetings_option', $achat_greetings);
    }
    if (isset($_POST['ch_greeting_field'])) {
     
    $ch_greeting_field = sanitize_textarea_field($_POST['ch_greeting_field']);
    update_option('ch_greeting_option', $ch_greeting_field);
    }

    wp_send_json_success(array('message' => 'Settings saved successfully!'));
}
add_action('wp_ajax_autochat_def_settings', 'autochat_def_settings');
add_action('wp_ajax_nopriv_autochat_def_settings', 'autochat_def_settings');

function autochat_def_settings() {
    error_log('my_save_settings called');
    error_log('POST data: ' . print_r($_POST, true));
    if ( isset($_POST['achat_default_reply_option'])) {
        $achat_def_reply_opt =  $_POST['achat_default_reply_option'] === 'on' ? 'on' : 'off';

        // Update option
        update_option('achat_default_reply_option', $achat_def_reply_opt);
    }
    if (isset($_POST['ch_def_reply_option'])) {
     
    $ch_deft_reply = sanitize_textarea_field($_POST['ch_def_reply_option']);
    update_option('ch_def_reply_option', $ch_deft_reply);
    }

    wp_send_json_success(array('message' => 'Settings saved successfully!'));
}

add_action('wp_ajax_save_far_plugin_settings', 'save_far_plugin_settings');

function save_far_plugin_settings() {
    check_ajax_referer('far_rules_form', 'security'); // Optional: If you want to use nonce for security.

    // Parse and sanitize input data
    $_POST = stripslashes_deep($_POST);

    if (isset($_POST['achat-txt']) && is_array($_POST['achat-txt'])) {
        foreach ($_POST['achat-txt'] as $key => $find) {
            if (empty($find)) {
                unset($_POST['achat-txt'][$key]);
                unset($_POST['achat-txtarea'][$key]);
                unset($_POST['farposttype'][$key]);
                unset($_POST['fardescription'][$key]);
                unset($_POST['enable-dm'][$key]);
            }
            if (!isset($_POST['farregex'][$key])) {
                $_POST['achat-txt'][$key] = sanitize_text_field($find);
            }
        }
    }

    if (empty($_POST['achat-txt'])) {
        delete_option('far_plugin_settings');
    } else {
        update_option('far_plugin_settings', $_POST);
    }

    wp_send_json_success(array('message' => 'Options Updated'));
}
add_action('admin_enqueue_scripts', 'custom_media_upload_scripts');
function custom_media_upload_scripts() {
    wp_enqueue_media();
}

add_action('admin_footer', 'custom_media_upload_js');
function custom_media_upload_js() {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            var mediaUploader;

            $('#upload_image_button').on('click', function(e) {
                e.preventDefault();
                // If the uploader object has already been created, reopen the dialog
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }
                // Extend the wp.media object
                mediaUploader = wp.media.frames.file_frame = wp.media({
                    title: 'Choose Image',
                    button: {
                        text: 'Choose Image'
                    },
                    multiple: false
                });

                // When a file is selected, grab the URL and set it as the text field's value
                mediaUploader.on('select', function() {
                    var attachment = mediaUploader.state().get('selection').first().toJSON();
                    $('#icon-file').val(attachment.url);
                    $('#icon-file-preview').attr('src', attachment.url);
                });

                // Open the uploader dialog
                mediaUploader.open();
            });
        });
    </script>
    <?php
}
function enqueue_custom_tawk_css() {
    wp_enqueue_style('custom-tawk-css',  plugin_dir_url(__FILE__) . 'assets/css/custom-tawk.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_tawk_css', 5); // 5 gives it a high priority to load earlier


add_action('wp_footer', 'inject_tawk_to_script');
function inject_tawk_to_script() {
    $tawk_to_script = get_option('tawk_to_script', '');
    if ($tawk_to_script) {        
        echo ($tawk_to_script);
    }
}

function enqueue_admin_autochat_remove_script($hook) {
    // Only enqueue the script on the admin page where the button exists
    // if ( $hook != 'chat_integration' ) {
    //     return;
    // }
    
    wp_enqueue_script('admin-autochat-remove', plugin_dir_url(__FILE__) . 'assets/js/custom-autochat-remove.js', array('jquery'), null, true);
    
    // `ajaxurl` is automatically available in the admin area, so no need to localize it.
}
add_action('admin_enqueue_scripts', 'enqueue_admin_autochat_remove_script');


function remove_tawk_to_script() {
    // Only allow the request for users with sufficient capabilities (e.g., manage_options)
    if (!current_user_can('manage_options')) {
        wp_send_json_error('Permission denied.');
        return;
    }
    
    // Check if the option exists and delete it
    if (get_option('tawk_to_script')) {
        delete_option('tawk_to_script');
        wp_send_json_success('Tawk.to script removed.');
    } else {
        wp_send_json_error('Option not found.');
    }
}
add_action('wp_ajax_remove_tawk_to_script', 'remove_tawk_to_script');

