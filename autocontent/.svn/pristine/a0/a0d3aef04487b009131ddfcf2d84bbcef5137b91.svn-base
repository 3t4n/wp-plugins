<?php
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
 * Plugin Name:  Autocontent
 * Plugin URI:  https://autocontent.com/about/
 * Description:   The simplest solution for automating content creation on WordPress.
 * Version:  1.26
 * Requires at least:  5.2
 * Requires PHP:  7.2
 * Author:  Remwes, LLC
 * Author URI:  https://remwes.com/
 * License:  GPL v2 or later
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 */

if (!defined('AUTOCONTENT_DOMAIN')) {
    define('AUTOCONTENT_DOMAIN', 'https://autocontent.com');
}

// Enqueue jQuery
function autocontent_enqueue_jquery() {
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'autocontent_enqueue_jquery');

function autocontent_enqueue_admin_scripts($hook) {
    $plugin_url = plugin_dir_url(__FILE__);

    // Load scripts only on the "AutoContent Settings" page
    if ($hook === 'toplevel_page_autocontent-settings') {
        wp_enqueue_style('autocontent-admin-styles', $plugin_url . 'styles.css', array(), '1.2', 'all');
        wp_enqueue_script('autocontent-admin-scripts', $plugin_url . 'script.js', array('jquery'), '1.5', true);
        wp_localize_script('autocontent-admin-scripts', 'autocontent_vars', array(
            'ac_domain' => AUTOCONTENT_DOMAIN,
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('autocontent_generate_post_now_nonce'),
            'update_activation_nonce' => wp_create_nonce('update_activation_status_nonce'),
            'update_activation_key_nonce' => wp_create_nonce('update_activation_key_nonce'),
            'schedule_setup_nonce' => wp_create_nonce('schedule_setup_nonce'),
            'activation_status' => get_option('autocontent_activation_status', ''),
            'check_credits_nonce' => wp_create_nonce('check_credits_nonce'),
            'reset_activation_options_nonce' => wp_create_nonce('reset_activation_options_nonce'),
        ));
    }

    // Load setup-wizard.js only on the "Setup Wizard" page
    if ($hook === 'autocontent-settings_page_autocontent-setup') { // Adjusted $hook for submenu
        wp_enqueue_style('autocontent-setup-styles', $plugin_url . 'css/setup-style.css?id=20', array(), '1.0', 'all');
        wp_enqueue_script('autocontent-setup-scripts', $plugin_url . 'js/setup-wizard.js?id=22', array('jquery'), '1.0', true);
        wp_enqueue_script('confetti', 'https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js', [], null, true);
        wp_localize_script('autocontent-setup-scripts', 'autocontent_vars', array(
            'ac_domain' => AUTOCONTENT_DOMAIN,
            'ajax_url' => admin_url('admin-ajax.php'),
            'update_activation_nonce' => wp_create_nonce('update_activation_status_nonce'),
            'update_activation_key_nonce' => wp_create_nonce('update_activation_key_nonce'), // Added for activation key
            'save_settings_nonce' => wp_create_nonce('save_settings_nonce'),
            'settings_url' => admin_url('admin.php?page=autocontent-settings'), 
            'nonce' => wp_create_nonce('autocontent_generate_post_now_nonce'),
            'check_credits_nonce' => wp_create_nonce('check_credits_nonce'), 
            'plugin_url' => plugin_dir_url(__FILE__), 
        ));
    }
}
add_action('admin_enqueue_scripts', 'autocontent_enqueue_admin_scripts');

 // Include the Setup Wizard
include_once plugin_dir_path(__FILE__) . 'setup-wizard.php';

// Include the cron-handler.php file
include_once(plugin_dir_path(__FILE__) . 'autocontent_schedule_setup.php');

// Hook into WordPress to run our function when the plugin is activated
register_activation_hook(__FILE__, 'autocontent_activate');

function autocontent_activate() {
    // Call both functions inside this single activation function
    autocontent_get_activation_key();
    autocontent_set_defaults();
}

function autocontent_get_activation_key() {
    autocontent_remove_cron_jobs();
    
    // Get the current domain of the site
    $current_domain = get_site_url();

    // Prepare data to send to the API
    $data = array(
        'domain' => $current_domain
    );

    // Send a POST request to the API
    $response = wp_remote_post(AUTOCONTENT_DOMAIN . '/api/register.php', array(
        'body' => $data
    ));

    // Check if the request was successful
    if (!is_wp_error($response) && $response['response']['code'] == 200) {
        // Decode the response data
        $api_response = json_decode($response['body'], true);
        // Check if activation key and frequency are present in the response
        if (isset($api_response['autocontent_activation_key']) && isset($api_response['autocontent_frequency'])) {
            // Save activation key and frequency in the options
            update_option('autocontent_activation_key', $api_response['autocontent_activation_key']);
            update_option('autocontent_frequency', $api_response['autocontent_frequency']);
            update_option('autocontent_activation_status', $api_response['autocontent_activation_status']);
        }
    }
}

function autocontent_set_defaults() {

    update_option('autocontent_setup_completed', false);
    update_option('autocontent_redirect_to_setup', true); 
    update_option('autocontent_featured_image', true);

}

function autocontent_redirect_to_setup() {
    // Check if the redirect flag is set and the user has admin privileges
    if (get_option('autocontent_redirect_to_setup', false) && current_user_can('manage_options')) {
        // Remove the redirect flag to prevent infinite loops
        delete_option('autocontent_redirect_to_setup');

        // Redirect to the setup wizard page
        wp_redirect(admin_url('admin.php?page=autocontent-setup&tab=intro'));  
        exit;
    }
}
add_action('admin_init', 'autocontent_redirect_to_setup');



// Hook into WordPress to run our function when the plugin is deactivated
register_deactivation_hook(__FILE__, 'autocontent_deactivate');
function autocontent_deactivate() {
    autocontent_log_error_message('Deactivation function is being called');
   
    // Clear settings
    delete_option('autocontent_activation_key');
    delete_option('autocontent_activation_status');
    delete_option('autocontent_frequency');
    delete_option('autocontent_renewal_limit');
    delete_option('autocontent_subject');
    delete_option('autocontent_tone');
    delete_option('autocontent_featured_image');
    delete_option('autocontent_post_image');
    delete_option('autocontent_image_style');
    delete_option('autocontent_setup_completed');
    delete_option('autocontent_backlink');

    for ($i = 1; $i <= 5; $i++) {
        delete_option("autocontent_keyword_$i");
    }
    autocontent_remove_cron_jobs();
}


// Add action hooks
// Hook to run our function at the scheduled time
add_action('autocontent_event_hook', 'autocontent_callback');
add_action('autocontent_monthly_hook', 'autocontent_callback');


function autocontent_callback() {
    autocontent('scheduled');
}

// Hook into WordPress to add the plugin settings page
add_action('admin_menu', 'autocontent_menu');
function autocontent_menu() {
    add_menu_page(
        'Autocontent Settings',
        'Autocontent Settings',
        'manage_options',
        'autocontent-settings',
        'autocontent_settings_page'
    );
}

// Define the plugin file
$plugin_file = plugin_basename(__FILE__);

// Add custom links
add_filter('plugin_action_links_' . $plugin_file, 'autocontent_plugin_custom_links');

// Add a settings link
function autocontent_plugin_custom_links($links) {

    // Dynamic Upgrade link with new tab functionality
    $home_url = AUTOCONTENT_DOMAIN . '/registration/';
    $upgrade_link = '<a href="' . $home_url . '" style="font-weight: bold;" target="_blank">Upgrade</a>';
    array_unshift($links, $upgrade_link);

    // Dashboard link with new tab functionality
    $dashboard_url = AUTOCONTENT_DOMAIN . '/dashboard/';
    $dashboard_link = '<a href="' . $dashboard_url . '" target="_blank">Dashboard</a>';
    array_unshift($links, $dashboard_link);

    // Settings link
    $settings_link = '<a href="' . admin_url('admin.php?page=autocontent-settings') . '">Settings</a>';
    array_unshift($links, $settings_link);
    
    return $links;
}

// Function to create reset activation key page
// function autocontent_add_reset_activation_key_page() {
//     $activation_status = get_option('autocontent_activation_status');
//     if ($activation_status === 'verified') {
//         add_submenu_page(
//             'autocontent-settings', // Parent menu
//             'Reset Activation Key', // Page title
//             'Reset Activation Key', // Menu title
//             'manage_options', // Capability
//             'reset-activation-key', // Menu slug
//             'autocontent_display_reset_activation_key_page' // Callback function to display the page
//         );
//     }
// }

// add_action('admin_menu', 'autocontent_add_reset_activation_key_page');



// Add the setup wizard as a submenu page under the AutoContent plugin menu
function autocontent_add_setup_page() {
    // Log the function call
    autocontent_log_error_message('autocontent_add_setup_page triggered');
    
    // Add a submenu page
    add_submenu_page(
        'autocontent-settings',  // The slug of the parent menu (AutoContent main menu)
        'Setup Wizard',          // Page title
        'Setup Wizard',          // Submenu title
        'manage_options',        // Capability required
        'autocontent-setup',     // Menu slug for the setup wizard
        'autocontent_setup_wizard_page' // Callback function to render the page
    );
}



add_action('admin_menu', 'autocontent_add_setup_page');




// Hook into WordPress AJAX for updating activation status
add_action('wp_ajax_update_activation_status', 'autocontent_update_activation_status_callback');
function autocontent_update_activation_status_callback() {
    // Verify nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'update_activation_status_nonce')) {
        wp_send_json_error('Invalid nonce');
        wp_die();
    }

    // Sanitize inputs
    $status = isset($_POST['status']) ? sanitize_text_field($_POST['status']) : '';
    $frequency = isset($_POST['frequency']) ? sanitize_text_field($_POST['frequency']) : '';

    // Validate status and frequency
    if (empty($status) || !in_array($status, ['verified', 'unverified'], true)) {
        wp_send_json_error('Invalid activation status.');
        wp_die();
    }
    if (empty($frequency) || !in_array($frequency, ['daily', 'weekly', 'monthly'], true)) {
        wp_send_json_error('Invalid frequency.');
        wp_die();
    }

    // Update database options
    update_option('autocontent_activation_status', $status);
    update_option('autocontent_frequency', $frequency);

    // Calculate credits based on frequency
    $credits = 0;
    switch ($frequency) {
        case 'daily':
            $credits = 10;
            break;
        case 'weekly':
            $credits = 3;
            break;
        case 'monthly':
            $credits = 1;
            break;
        default:
            $credits = 1;
            break;
    }
    update_option('autocontent_credits', $credits);

    // Respond with success
    wp_send_json_success('Activation status updated successfully.');
    wp_die();
}

/**
 * handler for updating the activation key option
 */
add_action('wp_ajax_update_activation_key_option', 'autocontent_update_activation_key_option_callback');
function autocontent_update_activation_key_option_callback() {
    autocontent_custom_log('AJAX handler triggered.'); // Debug log
    autocontent_custom_log('AJAX Request Data: ' . print_r($_POST, true)); // Log incoming data

    // Verify nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'update_activation_key_nonce')) {
        wp_send_json_error('Invalid nonce.');
        wp_die();
    }

    // Sanitize activation key
    $activation_key = isset($_POST['autocontent_activation_key']) ? sanitize_text_field($_POST['autocontent_activation_key']) : '';
    if (empty($activation_key)) {
        wp_send_json_error('Invalid activation key.');
        wp_die();
    }

    // Check the current value in the database
    $current_value = get_option('autocontent_activation_key');
    if ($current_value === $activation_key) {
        autocontent_custom_log('Activation key is already set.');
        wp_send_json_success('Activation key is already set.');
        wp_die();
    }

    // Attempt to save the activation key in the database
    $result = update_option('autocontent_activation_key', $activation_key);

    if ($result) {
        wp_send_json_success('Activation key updated successfully.');
        autocontent_custom_log('Activation key updated successfully.');
    } else {
        wp_send_json_error('Failed to save the activation key.');
        autocontent_custom_log('Failed to save the activation key.');
    }

    wp_die();
}



/**
 * Hook into WordPress AJAX for resetting the activation key and other options 
 * handler for resetting the activation key 
 */
add_action('wp_ajax_reset_activation_key_options', 'autocontent_reset_activation_key_options_callback');
function autocontent_reset_activation_key_options_callback() {

    // Verify nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'reset_activation_options_nonce')) {
        wp_send_json_error('Invalid nonce');
        wp_die();
    }

    // Update database options
    update_option('autocontent_activation_key', '');
    update_option('autocontent_activation_status', '');
    update_option('autocontent_frequency', '');

    // Respond with success
    wp_send_json_success('Activation status reset successfully.');
    wp_die();
}


// Function to display the plugin settings page
function autocontent_settings_page() {
    
     $plugin_url = plugins_url('/', __FILE__);

    // Construct the URL to your image
    $image_url = $plugin_url . 'images/processing_3.gif';
    
    // Function to handle the "Generate Blog Post Now" button 
    if (isset($_POST['autocontent_generate_post_now'])) {
          check_admin_referer('autocontent_generate_post_now', 'autocontent_generate_post_now');
              autocontent('manual');
    }
    
?>
     

    <div class="wrap">
    
    <?php
        // Check if we are on the desired settings page before displaying notifications
        $current_page = isset($_GET['page']) ? sanitize_text_field($_GET['page']) : '';
        if ($current_page === 'autocontent-settings') {
            settings_errors();
        }
    ?>
 

    <!-- Banner Section -->
    <div class="autocontent-banner" style="position: relative; padding: 20px; background-color: #f8f8f8; border: 1px solid #ddd; overflow: hidden;">
        <?php
            $plugin_url = plugins_url('images/logo-retina.png', __FILE__);
        ?>
        <img src="<?php echo esc_url($plugin_url); ?>" alt="Logo" style="max-width: 200px; border: 1px solid #fff; border-radius: 5px; float: left; margin-right: 20px;">
        <div style="float: left;">
            <h1 style="font-weight: bold; font-size: 24px;"></h1>
        </div>
        <div style="clear: both;"></div> <!-- Clear float to ensure proper layout -->
        
    </div>
    
    
    <div class="wrap">
        <div class="tabs">
            <div class="tab" onclick="openTab('autoContentTab')">Settings</div>
            <div class="tab" onclick="openTab('supportTab')">Need Help?</div>
        </div>

        <div id="autoContentTab" class="tab-content" style="display: block;">
            <!-- Content for Autocontent tab -->
            <!-- Add your Autocontent settings form or content here -->
             <form method="post" action="options.php">
        <?php settings_fields('autocontent-settings-group'); ?>
        <?php do_settings_sections('autocontent-settings-group'); ?>

        <!-- General Tab Content -->
        <div id="general" >
            
            <!-- Your existing form elements for the General tab -->
            <div class="postbox">
                <h2 class="hndle">General Settings</h2>
                <div class="inside">
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row">Activation Key</th>
                            <td>
        						<input type="text" name="autocontent_activation_key" value="<?php echo esc_attr(get_option('autocontent_activation_key')); ?>" placeholder="Input New Key" 
                                    maxlength="18" size="18" <?php if (get_option('autocontent_activation_status') === 'verified') echo 'disabled="disabled"'; ?>/>
                                <input type="hidden" id="autocontentActivationStatusInput" name="autocontent_activation_status" value="<?php echo esc_attr(get_option('autocontent_activation_status')); ?>">
        
                                <?php
                                $activation_status = get_option('autocontent_activation_status');
                                if ($activation_status === 'verified') : ?>
                                    <!-- Hidden input to capture activation key when the main input is disabled -->
                                    <input
                                            type="hidden"
                                            name="autocontent_activation_key"
                                            value="<?php echo get_option('autocontent_activation_key'); ?>"
                                    />
                                    
                                    <button type="button" class="button button-secondary" id="resetActivationKey">Reset Activation Key</button>

                                <?php endif; ?>
                                <?php wp_nonce_field('autocontent_settings_nonce', 'autocontent_settings_nonce'); ?>
                                <button type="button" class="button button-secondary" id="verifyActivationKey">Verify Activation Key</button>
                                <span class="info-bubble" tabindex="0" aria-label="More information">
                                    <div class="info-icon">i</div>
                                    <div class="info-tooltip">
                                        <span>
                                            You need a verified Activation Key to be able to generate posts. <br />
                                            Your plugin includes an Activation Key for the <strong>Free Plan</strong>. 
                                            Once you upgrade to a <a href="https://autocontent.com/pricing/" target="_blank"><strong>Premium Plan</strong></a>, 
                                            you’ll need to reset the Activation Key to verify the new key associated with your Premium Plan.
                                        </span>
                                    </div>
                                </span>
                                      
                                <br />
                                
                                <div style="margin-top: 10px;">
                                    <span id="activationKeyStatus" style="color: green; font-weight: bold;">
                                        <?php
                                        // Display activation status
                                        if ($activation_status == 'verified') {
                                            echo esc_html('Active');
                                        } elseif ($activation_status == 0) {
                                            echo esc_html('Inactive');
                                        // } else {
                                        //     echo esc_html('Input New Key');
                                        }
                                        ?>
                                    </span>
                                </div>
                                
                                <span id="activationStatus">
                                </span>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">Current Plan</th>
                            <td style="color: blue; font-weight: bold;">
                                <?php
                                    $frequency = get_option('autocontent_frequency');
                                    
                                    if ($frequency === 'monthly') {
                                        echo esc_html('Free (Monthly Blog Posts)');
                                    } elseif ($frequency === 'weekly') {
                                        echo esc_html('Pro (Weekly Blog Posts)');
                                    } elseif ($frequency === 'daily') {
                                        echo esc_html('Ultimate (Daily Blog Posts)');
                                    } else {
                                        echo esc_html('Plan Pending');
                                    }
                                ?>
                                <input type="hidden" id="autocontentFrequencyInput" name="autocontent_frequency" value="<?php echo esc_attr(get_option('autocontent_frequency')); ?>">
                                <input type="hidden" id="writeNowCreditsInput" name="autocontent_credits" value="<?php echo esc_attr(get_option('autocontent_credits')); ?>">
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">Write-Now Credits</th>
                            <td style="color: blue; font-weight: bold;">
                                <?php 
                                    echo esc_attr(get_option('autocontent_credits')); 
                                    echo esc_html(' (On-Demand Posts)');
                                ?>
                            </td>
                        </tr>
                    </table>        
                </div>
            </div>
                
            <div class="postbox">
                <h2 class="hndle">Content Settings</h2>
                <div class="inside">
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row">Subject</th>
                            <td>
                                <input type="text" name="autocontent_subject" value="<?php echo esc_attr(get_option('autocontent_subject')); ?>"  maxlength="125" size="65"/>
                                <p class="description" style="color: green; font-weight: bold;">
                                    Enter the subject you want the post to be about.
                                </p>
                            </td>
                        </tr>
                        
                
                        <tr valign="top">
                            <th scope="row">Keywords</th>
                            <td>
                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                   <input type="text" name="autocontent_keyword_<?php echo esc_attr($i); ?>" value="<?php echo esc_attr(get_option("autocontent_keyword_$i")); ?>" placeholder="Keyword <?php echo esc_attr($i); ?>" />
        
                                <?php endfor; ?>
                                 <p class="description" style="color: green; font-weight: bold;">Enter the keywords you want highlighted in the post for Search Engine Optimization.</p>
                            </td>
                        </tr>
                        
                        <tr valign="top">
                            <th scope="row">Tone</th>
                            <td>
                                <select name="autocontent_tone">
                                    <?php
                                    $tone_options = [
                                        'Friendly or Approachable', 'Optimistic or Positive', 'Persuasive', 'Educational',
                                    'Reflective or Thoughtful', 'Narrative or Storytelling', 'Concise or Summarized',
                                    'Formal Business', 'Empathetic', 'Instructive'
                                    ];
                                    foreach ($tone_options as $tone) {
                                        echo '<option value="' . esc_attr($tone) . '" ' . selected(get_option('autocontent_tone'), $tone, false) . '>' . esc_html($tone) . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        
                        <tr valign="top">
                            <th scope="row">Post Image</th>
                            <td>
                                <input type="checkbox" id="autocontent_featured_image" name="autocontent_featured_image" value="1" <?php checked(1, get_option('autocontent_featured_image', 1)); ?>>
                                Check to add a featured image to your post
                            </td>
                        </tr>
                        
                        <tr valign="top">
                            <th scope="row">Image Style</th>
                            <td>
                                <select name="autocontent_image_style">
                                    <?php
                                    //     $style_options = [ 'Photo', 'Fantasy', 'Abstract art', 'Pixel art', 'Anime',
                                    // 'Neon punk', 'Comic book', 'Rococo', 'Pop surrealism', 'Psychedelic',
                                    // 'Glitch art', 'Watercolor', 'Cyberpunk', 'Impressionism', 'Minimalistic',
                                    // 'Renaissance art', 'Street art', 'Woodcut print', 'Stencil', 'Pointillism'];
                                    $style_options = [
                                        'Photo',
                                        'Fantasy',
                                        'Anime',
                                        'Comic book',
                                        'Cyberpunk',
                                        'Surrealism',
                                        'Pixel art',
                                        'Abstract art',
                                        'Minimalistic',
                                        'Watercolor'
                                    ];
                                    foreach ($style_options as $style) {
                                        echo '<option value="' . esc_attr($style) . '" ' . selected(get_option('autocontent_image_style'), $style, false) . '>' . esc_html($style) . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
        
                        <tr valign="top">
                            <th scope="row"></th>
                            <td>
        
                                <hr />
                                <label for="autocontent_backlink_toggle">
                                    <input type="checkbox" id="autowriter_backlink" name="autocontent_backlink" value="1" <?php checked(1, get_option('autocontent_backlink', 0)); ?>>
                                    Please consider adding a backlink at the footer of the generated post to help support Autocontent.com</label>
        
                            </td>
                        </tr>
                        
                        <tr valign="top">
                            <th scope="row"></th>
                            <td>
                                <?php submit_button(); ?>
                                <!-- Add the "Generate Blog Post Now" button -->
                                <button type="button" class="button button-primary" id="generatePostNow">Generate Blog Post Now</button>
                            </td>
                        </tr>
                    </table>   
                    
                    <!-- Processing GIF Container -->
                    <div id="processingContainer" style="display: none;">
                        <img src="<?php echo esc_url($image_url); ?>" alt="Processing...">
                    </div>
                </div>
            </div>
            </form>
                
                
           
        </div>
        <hr />
        </div>
       
           <!-- Add your Support settings or content here -->
           <div id="supportTab" class="tab-content">
            <!-- Content for Support tab -->
            
            <div class="postbox">
                <h2 class="hndle">Autocontent Support</h2>
                <div class="inside">
                    <form method="post" action="" class="table-form-table">
                         <table class="form-table">
                        <tr valign="top">
                            <th scope="row">Email Address</th>
                            <td>
                                <input type="email" name="support_email" placeholder="Enter your email address" required />
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">Subject</th>
                            <td>
                                <input type="text" name="support_subject" placeholder="Enter the subject" required />
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">Message</th>
                            <td>
                                <textarea name="support_message" placeholder="Enter your message" rows="5" required></textarea>
                            </td>
                        </tr>
                    </table>
                        <button type="submit" class="button button-primary" name="send_support_email">Send</button>
                    </form>
                </div>
            </div>
        
            <?php
            if (isset($_POST['send_support_email'])) {
                $to = 'support@autocontent.com';
                $subject = sanitize_text_field($_POST['support_subject']);
                $message = sanitize_textarea_field($_POST['support_message']);
                $headers = 'From: ' . sanitize_email($_POST['support_email']);
        
                if (wp_mail($to, $subject, $message, $headers)) {
                    echo '<p style="color: green;">Email sent successfully!</p>';
                } else {
                    echo '<p style="color: red;">Error sending email. Please try again later.</p>';
                }
            }
            ?>
        </div>
    </div>
</div>
 <?php
} 

// Callback function to display the custom admin page
function autocontent_display_reset_activation_key_page() {
    ?>
    <div class="wrap">
        <h2>Reset Activation Key</h2>
		<div>
    <h3>Reset Activation Key and Options</h3>
    <p>If you need to upgrade or reset your activation key and options, follow these steps:</p>
    <ol>
        <li>
            <strong>Activation Key Reset:</strong>
            <ul>
                <li>Click on the "Reset Activation Key" button below.</li>
                <li>After resetting the activation key, you will need to enter the new activation key provided to you.</li>
            </ul>
        </li>
        <li>
            <strong>Options Reset:</strong>
            <ul>
                <li>To reset options to their default settings, click on the "Reset Options" button.</li>
                <li>Note that this will revert all settings to their original state. Any custom configurations will be lost.</li>
            </ul>
        </li>
    </ol>
    <p><strong>Important:</strong></p>
    <ul>
        <li>Resetting the activation key and options is irreversible.</li>
        <li>Ensure you have the necessary information and backups before proceeding.</li>
    </ul>    
</div>
        <?php
        // Check if the form is submitted
        if (isset($_POST['reset_activation_key'])) {

            if ( isset( $_POST['reset_activation_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['reset_activation_nonce'] ) ), 'reset_activation_nonce' ) ) {
                // Nonce is verified, proceed with processing form data

                // API endpoint for reset
                $api_url = AUTOCONTENT_DOMAIN . '/api/reset.php/reset';

                // Retrieve the activation key from the options table, if needed for the request
                $activation_key = get_option('autocontent_activation_key');

                // Make the API request
                $urlParts = wp_parse_url(home_url());
                $domain = isset($urlParts['host']) ? $urlParts['host'] : '';

                $response = wp_remote_post( $api_url, [
                    'method'    => 'POST',
                    'headers'   => [
                        'Content-Type'    => 'application/json',
                        'Activation-Key'  => $activation_key,
                        'Origin' => $domain,
                    ],
                    //'body'      => json_encode(['reset' => true]),
                ]);

                // Handle the API response
                if ( is_wp_error( $response ) ) {
                    echo '<div class="error"><p>Failed to reset the activation key on the server: ' . $response->get_error_message() . '</p></div>';
                } else {
                    $status_code = wp_remote_retrieve_response_code( $response );
                    $body = wp_remote_retrieve_body( $response );

                    echo 'API Response Code: ' . $status_code;
                    echo '<br />';
                    echo 'API Response Body: ' . $body ;


                    if ( $status_code == 200 ) {
                        // Successful reset, update options
                        update_option('autocontent_activation_key', '');
                        update_option('autocontent_activation_status', '');
                        update_option('autocontent_frequency', '');
                        echo '<div class="updated"><p>Activation Key, Status & Frequency have been reset. You can now activate a new key.</p></div>';
                    } else {
                        echo '<div class="error"><p>Server reset failed: ' . esc_html( $body ) . '</p></div>';
                    }
                }
            } else {
                // Nonce verification failed, handle the error appropriately
                echo '<div class="error"><p>Activation Key, Status & Frequency FAILED.</p></div>';
            }
        }

        ?>

        <p>Current Activation Key: <b><?php echo esc_html(get_option('autocontent_activation_key')); ?></b></p>
         <p>Current Activation Status: <b><?php echo esc_html(get_option('autocontent_activation_status')); ?></b></p>
         <p>Current Frequency: <b><?php echo esc_html(get_option('autocontent_frequency')); ?></b></p>
         <p>Scheduling: <?php 
            // Check if either of the cron jobs exists
            $event1 = wp_get_scheduled_event('autocontent_event_hook');
            $event2 = wp_get_scheduled_event('autocontent_monthly_hook');
            
            if ($event1 || $event2) {
                // At least one of the cron jobs exists
                echo '<b>Activated.</b>';
            } else {
                // Neither of the cron jobs exists
                echo '<b>Inactive.</b>';
            }
        ?></p>
        <form method="post" action="">
			
			 <?php
    			$reset_activation_nonce = wp_create_nonce('reset_activation_nonce');
   			 ?>
            <input type="hidden" name="reset_activation_key" value="1" />
             <input type="hidden" name="reset_activation_nonce" value="<?php echo esc_attr($reset_activation_nonce); ?>" />
            <?php submit_button('Reset Activation Key', 'primary', 'reset_activation_key_button'); ?>
        </form>
    </div>
    <?php
} 

// Callback function to display the custom admin page
function autocontent_list_registered_settings() {
    echo '<div class="wrap">';
    echo '<h2>AutoContent Saved Settings</h2>';
    
    echo '<table class="form-table">';

    // List all known AutoContent settings
    $settings = [
        'autocontent_setup_completed',
        'autocontent_activation_key',
        'autocontent_keyword_1',
        'autocontent_keyword_2',
        'autocontent_keyword_3',
        'autocontent_keyword_4',
        'autocontent_keyword_5',
        'autocontent_tone',
        'autocontent_image_style',
        'autocontent_backlink',
        'autocontent_post_image',
        'autocontent_featured_image',
        // Add any other AutoContent options here
    ];

    foreach ($settings as $setting_name) {
        $setting_value = get_option($setting_name, 'Not Set'); // Default to "Not Set" if the option doesn't exist

        // Display True/False for specific settings
        if (in_array($setting_name, ['autocontent_backlink', 'autocontent_post_image', 'autocontent_featured_image'])) {
            $setting_value = ($setting_value == 1) ? 'True' : 'False';
        }

        echo '<tr valign="top">';
        echo '<th scope="row">' . esc_html($setting_name) . '</th>';
        echo '<td>' . esc_html(is_array($setting_value) ? json_encode($setting_value) : $setting_value) . '</td>';
        echo '</tr>';
    }

    echo '</table>';
    echo '</div>';
}


// Sanitization callback function
function autocontent_sanitize_input($input) {
    // Load offensive words
    $offensiveWords = autocontent_loadOffensiveWords();

    // Filter offensive words from input
    $filteredInput = autocontent_filterOffensiveWords($input, $offensiveWords);

    return $filteredInput;
}

// Hook into WordPress to register the plugin settings
add_action('admin_init', 'autocontent_settings');

// Function to setup autocontent settings
function autocontent_settings() {

    register_setting('autocontent-settings-group', 'autocontent_activation_key');
    register_setting('autocontent-settings-group', 'autocontent_activation_status');
    
    register_setting('autocontent-settings-group', 'autocontent_backlink');
    register_setting('autocontent-settings-group', 'autocontent_post_image');
    register_setting('autocontent-settings-group', 'autocontent_featured_image');
    register_setting('autocontent-settings-group', 'autocontent_credits');
    register_setting('autocontent-settings-group', 'autocontent_frequency');
    register_setting('autocontent-settings-group', 'autocontent_renewal_limit');
    register_setting('autocontent-settings-group', 'autocontent_subject', 'autocontent_sanitize_input');
    register_setting('autocontent-settings-group', 'autocontent_tone');
    register_setting('autocontent-settings-group', 'autocontent_image_style');
    for ($i = 1; $i <= 5; $i++) {
        register_setting('autocontent-settings-group', "autocontent_keyword_$i", 'autocontent_sanitize_input');
    }
    
    // Register the setup-related settings
    register_setting('autocontent-settings-group', 'autocontent_setup_completed');

}

// Function to load offensive words from CSV file
function autocontent_loadOffensiveWords() {
    $csvFile = plugin_dir_path(__FILE__) . 'offensive_words.csv'; // Adjust the file name accordingly
    // Load WordPress file system
    global $wp_filesystem;
    if ( ! $wp_filesystem ) {
        require_once ABSPATH . 'wp-admin/includes/file.php';
        WP_Filesystem();
    }
    if ( ! $wp_filesystem->exists( $csvFile ) ) {
        // Handle the case when the file doesn't exist
        autocontent_log_error_message('CSV file does not exist: ' . $csvFile);
        return array();
    }
    $offensiveWords = array();
    $file_content = $wp_filesystem->get_contents( $csvFile );
    $lines = explode( "\n", $file_content );
    foreach ( $lines as $line ) {
        // Extract the first column value from the CSV line
        $csvData = str_getcsv( $line );
        
        // Check if the first column exists and is a string
        if ( isset( $csvData[0] ) && is_string( $csvData[0] ) ) {
            $word = trim( $csvData[0], ',"' ); // Remove leading and trailing quotes and commas
            $offensiveWords[] = $word;
        }
    }
    return $offensiveWords;
}

// Function to check user input for offensive words and replace them
function autocontent_filterOffensiveWords($userInput, $offensiveWords) {
    foreach ($offensiveWords as $word) {
        $userInput = str_ireplace($word, '', $userInput);
    }

    return $userInput;
}

// Function to handle the API call with user-defined keywords and subject
function autocontent($callType) {
    
    $subject = get_option('autocontent_subject');
    $activation_key = get_option('autocontent_activation_key');
    $tone = get_option('autocontent_tone');
    $image_style = get_option('autocontent_image_style');
    $keywords = array();
    // Check and add keywords
    for ($i = 1; $i <= 5; $i++) {
        $keyword = get_option('autocontent_keyword_' . $i);
        if (!empty($keyword)) {
            $keywords[] = $keyword;
        }
    }
    // Check if activation key is provided
    if (empty($activation_key)) {
        autocontent_log_error_message('Activation key is missing. Cannot make API call.');
        return;
    }
    // Check if keywords and subject are provided
    if (empty($keywords) || empty($subject)) {
        autocontent_log_error_message('Keywords and subject are required. Cannot make API call');
        return;
    }
   // Prepare the POST data
    $postData = array(
        'subject' => $subject,
        'keywords' => implode(', ', $keywords),
        'tone' => $tone,
        'image_style' => $image_style,
    );
    
    // Prepare the HTTP headers
    $urlParts = wp_parse_url(home_url());
    $domain = isset($urlParts['host']) ? $urlParts['host'] : '';
    
    $headers = array(
        'Content-Type' => 'application/json',
        'Activation-Key' => $activation_key,
        'Origin' => $domain,
        'CallType' => $callType
    );
    
    // API endpoint
    $apiEndpoint = AUTOCONTENT_DOMAIN . '/api/index.php/generate-blog';
    
    // Make the API request
    $response = wp_remote_post($apiEndpoint, array(
        'headers' => $headers,
        'body' => wp_json_encode($postData),
        'timeout' => 120,
    ));
    
    // Check for errors
    if (is_wp_error($response)) {
       autocontent_log_error_message('API request error: ' . $response->get_error_message());
        return;
    }
    
    // Retrieve response body
    $body = wp_remote_retrieve_body($response);

    // Decode JSON response
    $data = json_decode($body, true);
    // Check if the API call was successful
    if (isset($data['success']) && $data['success'] === true && isset($data['content'])) {
        
        // $post_title = $data['title'];
        $post_title = ltrim($data['title'], " ."); // This will prevent any periods or spaces from being added to the beginning of the post title.

        $backlink = get_option('autocontent_backlink');
        if($backlink == 1){
             $post_footer = '<footer><p>Powered by <a href="https://autocontent.com/" target="_blank" rel="nofollow">Autocontent</a></p></footer>';
        } else {
            $post_footer = '';
        }
        
       
        $post_content = '<!-- wp:paragraph -->' . $data['content'] . $post_footer .'<!-- /wp:paragraph -->';
        // Set up the post data
        $new_post = array(
            'post_title'   => $post_title,
            'post_content' => $post_content,
            'post_status'  => 'publish',
            'post_author'  => get_user_by('login', 'SuperBlogger')->ID, // Get the SuperBlogger user ID
            'post_category' => array(), // Set your desired categories here
        );
        // Insert the post into the database
        $post_id = wp_insert_post($new_post);
        // Check if the post was inserted successfully before setting the featured image
        if (!is_wp_error($post_id)) {
            $post_imageurl = $data['image_url'];
            $imageURL = str_replace('\\', '', $post_imageurl);
            autocontent_add_featured_image($imageURL, $post_id);
            // Write to the log file
            autocontent_log_error_message('Post successfully created with ID ' . $post_id);
            // Deduct credit count
            $autocontentCredits = get_option('autocontent_credits');
            if ($autocontentCredits !== false && is_numeric($autocontentCredits) && $autocontentCredits > 0) {
                update_option('autocontent_credits', $autocontentCredits - 1);
            }
        } else {
            // Write to the log file
            autocontent_log_error_message('Error creatingpost: ' . $post_id->get_error_message());
            
        }
    } else {
        // Handle errors
        autocontent_log_error_message('API request error: ' . $body);
    }
    
    return $post_id;
    
    // Restore the original value of display_errors
    //ini_set('display_errors', $original_display_errors);
}


// Function to create a featured image and add image to post
function autocontent_add_featured_image($imageURL, $post_id){
    // Get image from URL
    $unique_filename_with_path = autocontent_uploadExternalImage($imageURL);
    // Check if the image upload was successful
    if ($unique_filename_with_path) {
        // Image uploaded successfully, continue processing
        // Write to the log file
        autocontent_log_error_message('Image uploaded successfully: '. $unique_filename_with_path);
       
        // Determine the protocol (http or https)
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        // Determine the domain
        $domain = $protocol . '://' . sanitize_text_field( wp_unslash( $_SERVER['HTTP_HOST'] ) );

        // Extract the path after wp-content
        $pattern = '/wp-content(.*)/';
        preg_match($pattern, $unique_filename_with_path, $matches);
        // Build the new URL
        $newFileNameWithURL = $domain . '/wp-content' . $matches[1];
        $autocontent_featured_image = get_option('autocontent_featured_image');
        if ($autocontent_featured_image) {
            // Get existing post content
            $existing_content = get_post_field('post_content', $post_id);
           
            // Get file content
            $response = wp_remote_get($newFileNameWithURL);
			if ( is_wp_error( $response ) ) {
				// Handle error.
				$error_message = $response->get_error_message();				
			} else {
				$file_content = wp_remote_retrieve_body( $response );
			}

            if ($file_content) {
                // Upload the file into the wp upload folder
                $upload_file = wp_upload_bits(basename($newFileNameWithURL), null, $file_content);
                if (! $upload_file['error']) {
                    // If successful, insert the new file into the media library (create a new attachment post type)
                    $wp_filetype = wp_check_filetype(basename($newFileNameWithURL), null);
                    $attachment = array(
                        'post_mime_type' => $wp_filetype['type'],
                        'post_parent'    => $post_id,
                        'post_title'     => preg_replace('/\.[^.]+$/', '', basename($newFileNameWithURL)),
                        'post_content'   => '',
                        'post_status'    => 'inherit'
                    );
                    $attachment_id = wp_insert_attachment($attachment, $upload_file['file'], $post_id);
                    if (! is_wp_error($attachment_id)) {
                        // If attachment post was successfully created, insert it as a thumbnail to the post $post_id
                        require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                        $attachment_data = wp_generate_attachment_metadata($attachment_id, $upload_file['file']);
                        wp_update_attachment_metadata($attachment_id,  $attachment_data);
                        set_post_thumbnail($post_id, $attachment_id);
                    }
                } else {
                     // Write to the log file
                      autocontent_log_error_message('Error uploading the image into the media library.');
                }
            } else {
                // Write to the log file
                 autocontent_log_error_message('Error getting file content from the URL.');
            }
        } else {
            // Write to the log file
             autocontent_log_error_message('Error: autocontent_featured_image option is not set.');
        }
    } else {
        
        // Write to the log file
         autocontent_log_error_message('Error uploading the image from the external URL.');
    }
}



// Function to upload an external image
function autocontent_uploadExternalImage($imageUrl) {
    // Ensure the URL is not empty
    if (empty($imageUrl)) {
        // Write to the log file
         autocontent_log_error_message('Error: Image URL is empty.');
        return false;
    }
    // Generate a unique and random filename
    $uniqueFilename = wp_unique_filename(wp_upload_dir()['path'], basename(autocontent_generateUniqueFilename()));
    // Get the upload directory path
    $uploadDir = wp_upload_dir();
    // Set the file path for the uploaded image
    $file_path = $uploadDir['path'] . '/' . $uniqueFilename;
    // Download the image from the URL and save it to the specified path
    $response = wp_safe_remote_get($imageUrl);
    if (is_wp_error($response)) {
        // Log the error if the image download fails
        // Write to the log file
         autocontent_log_error_message('Error downloading image: ' . $response->get_error_message());
        return false;
    }
    $image_body = wp_remote_retrieve_body($response);
    // Upload the image to the media library
    $upload = wp_upload_bits($uniqueFilename, null, $image_body);
    if ($upload['error']) {
        // Log an error if the upload fails
        // Write to the log file
         autocontent_log_error_message('Error uploading image: ' . $upload['error']);
        return false;
    }
    // Return the path to the uploaded image
    return $upload['file'];
}

// Function to create unique file name
function autocontent_generateUniqueFilename() {
    // Generate a unique and random filename (you can customize this function as needed)
    $random_string = wp_generate_password(12, false);
    $file_extension = 'png'; 
    return $random_string . '.' . $file_extension;
}

// Check renewal limit and show a notice if it has expired
add_action('admin_notices', 'autocontent_check_renewal_limit');

// Function to check renewal limit
function autocontent_check_renewal_limit() {
    $renewal_limit = get_option('autocontent_renewal_limit', 1);
    $activation_date = get_option('autocontent_activation_date', time());

    $expiration_date = strtotime('+' . $renewal_limit . ' years', $activation_date);
    $current_date = time();

    if ($current_date > $expiration_date) {
        ?>
        <div class="notice notice-error">
            <p>Your autocontent plugin has expired. Please renew your activation key.</p>
        </div>
        <?php
    }
}

// Hook into WordPress AJAX for generating post now
add_action('wp_ajax_autocontent_generate_post_now', 'autocontent_generate_post_now_callback');
add_action('wp_ajax_nopriv_autocontent_generate_post_now', 'autocontent_generate_post_now_callback');

// Function to hand generating post manually
function autocontent_generate_post_now_callback() {
    // Verify nonce for security
    check_ajax_referer('autocontent_generate_post_now_nonce', 'nonce');
    
    // Determine the call type based on how it is called
    $callType = isset($_POST['CallType']) ? 'manual' : 'scheduled';
    
    // Write to the log file
     autocontent_log_error_message($callType);
     // Call the autocontent function and get the new post ID
    $post_id = autocontent($callType);
    // Check if the post was created successfully and get the post URL
    if (!is_wp_error($post_id)) {
        $post_url = get_permalink($post_id);
        wp_send_json_success(array('post_url' => $post_url));
    } else {
        wp_send_json_error('Error generating post');
        
    }
}

add_action('wp_ajax_schedule_setup', 'autocontent_setup_schedule_callback');

// Function to setup scheduling
function autocontent_setup_schedule_callback(){

    autocontent_log_error_message("autocontent_setup_schedule_callback");
    if (!check_ajax_referer('schedule_setup_nonce', 'nonce', false)) {
        autocontent_log_error_message("Invalid nonce");
        wp_send_json_error('Invalid nonce');
        wp_die();
    }
    
    autocontent_remove_cron_jobs();
    autocontent_setup_cron_jobs();
}

//error log function
function autocontent_log_error_message($message) {
    global $wp_filesystem;
    if (empty($wp_filesystem)) {
        require_once ABSPATH . 'wp-admin/includes/file.php';
        WP_Filesystem();
    }
    // Determine the directory path where the plugin file resides
    $plugin_directory = plugin_dir_path(__FILE__);
    // Create the log file in the plugin directory
    $error_log_file = $plugin_directory . 'error_log.txt';

    // Prepare the error message with a timestamp
    $error_message = '[' . gmdate('Y-m-d H:i:s') . '] ' . $message . "\n";

    // Check if the file exists and get current content
    $existing_content = '';
    if ($wp_filesystem->exists($error_log_file)) {
        $existing_content = $wp_filesystem->get_contents($error_log_file);
    }
    
    // Append the new error message to the existing content
    $new_content = $existing_content . $error_message;
    
    // Write the updated content back to the file
    $wp_filesystem->put_contents($error_log_file, $new_content);
    // Change the file permissions to 644
    $wp_filesystem->chmod($error_log_file, 0644);
}


function save_setup_settings_callback() {
    // Verify nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'save_settings_nonce')) {
        wp_send_json_error('Invalid nonce.');
        wp_die();
    }

    // Get and decode settings
    $settings = isset($_POST['settings']) ? json_decode(stripslashes($_POST['settings']), true) : [];

    if (empty($settings)) {
        wp_send_json_error('Settings data is empty or invalid.');
        wp_die();
    }

    // Save each setting to the database
    update_option('autocontent_keyword_1', $settings['keyword_1']);
    update_option('autocontent_keyword_2', $settings['keyword_2']);
    update_option('autocontent_keyword_3', $settings['keyword_3']);
    update_option('autocontent_keyword_4', $settings['keyword_4']);
    update_option('autocontent_keyword_5', $settings['keyword_5']);
    update_option('autocontent_subject', $settings['subject']);
    update_option('autocontent_tone', $settings['tone']);
    update_option('autocontent_image_style', $settings['imageStyle']);

    // Respond with success
    wp_send_json_success('Settings saved successfully.');
    wp_die();
}

add_action('wp_ajax_save_setup_settings', 'save_setup_settings_callback');


/**
 * handler to check credits
 */
add_action('wp_ajax_check_autocontent_credits', 'check_autocontent_credits');
function check_autocontent_credits() {
    // Verify nonce before proceeding
    if (!check_ajax_referer('check_credits_nonce', 'nonce', false)) {
        wp_send_json_error('Invalid nonce');
        return;
    }

    // Retrieve the number of credits from the options table
    $credits = get_option('autocontent_credits', 0);

    // Return the credits count as a JSON response
    wp_send_json_success(array('credits' => $credits));
}


