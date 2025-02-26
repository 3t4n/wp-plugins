<?php
/*
Plugin Name: AI Question-Answer Chatbot from Camhdk
Plugin URI: https://camhdk.com
Description: This plugin adds an AI chatbot widget to the lower right corner of the website.
Version: 1.0
Author: camhdk.com
License: GPLv2 or later
Text Domain: ai-chatbot-camhdk
*/

// Step 1: Create a Settings Page for the Plugin
// =============================================
function camhdk_chatbot_menu() {
    add_options_page(
        'AI Chatbot Settings', // Page title
        'AI Chatbot',          // Menu title
        'manage_options',      // Capability
        'camhdk-chatbot',      // Menu slug
        'camhdk_chatbot_settings_page' // Callback function
    );
}
add_action('admin_menu', 'camhdk_chatbot_menu');

// Register settings
function camhdk_chatbot_register_settings() {
    register_setting('camhdk-chatbot-settings-group', 'camhdk_chatbot_pages');
}
add_action('admin_init', 'camhdk_chatbot_register_settings');

// Settings page HTML
function camhdk_chatbot_settings_page() {
    ?>
    <div class="wrap">
        <h1>AI Chatbot Settings</h1>
        <form method="post" action="options.php">
            <?php settings_fields('camhdk-chatbot-settings-group'); ?>
            <?php do_settings_sections('camhdk-chatbot-settings-group'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Pages to display the chatbot (Enter page name comma separated):</th>
                    <td><input type="text" name="camhdk_chatbot_pages" value="<?php echo esc_attr(get_option('camhdk_chatbot_pages')); ?>" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Step 2: Conditionally enqueue styles and scripts on specified pages
function camhdk_chatbot_enqueue_scripts() {
    // Get the user-defined page slugs/IDs from the options table
    $selected_pages = get_option('camhdk_chatbot_pages');

    // If no pages are defined, don't enqueue the chatbot styles and scripts
    if (empty($selected_pages)) {
        return;
    }

    // Convert the entered pages into an array
    $pages = explode(',', $selected_pages);

    // Trim whitespace from the page slugs/IDs
    $pages = array_map('trim', $pages);

    // Check if the current page matches any of the selected pages
    foreach ($pages as $page) {
        // Check if the page exists (valid slug or ID)
        if (is_page($page)) {
            // Enqueue styles
            $version = '1.0';
            wp_register_style('camhdk-chatbot-styles', plugin_dir_url(__FILE__) . 'styles.css', array(), $version);
            wp_enqueue_style('camhdk-chatbot-styles');
            
            // Enqueue scripts with defer strategy
            wp_register_script('camhdk-chatbot-script', 
                plugin_dir_url(__FILE__) . 'script.js', 
                array(), 
                $version, 
                array('strategy' => 'defer')
            );
            wp_enqueue_script('camhdk-chatbot-script');
            break; // No need to check further, stop if the page matches
        }
    }
}
add_action('wp_enqueue_scripts', 'camhdk_chatbot_enqueue_scripts');

// Step 3: Add chatbot HTML to the footer on specified pages
function camhdk_chatbot_html() {
    // Get the user-defined page slugs/IDs from the options table
    $selected_pages = get_option('camhdk_chatbot_pages');

    // If no pages are defined, don't add the chatbot
    if (empty($selected_pages)) {
        return;
    }

    // Convert the entered pages into an array
    $pages = explode(',', $selected_pages);

    // Trim whitespace from the page slugs/IDs
    $pages = array_map('trim', $pages);

    // Check if the current page matches any of the selected pages
    foreach ($pages as $page) {
        // Check if the page exists (valid slug or ID)
        if (is_page($page)) {
            ?>
            <div class="chatbot-container" id="draggable">
                <button type="button" class="chatbot-button" id="toggleBtn">Chat</button>
                <button type="button" class="close-btn" id="closeBtn" style="display: none;">Close</button>
                <div class="loading-gif" id="loadingGif">
                    <p>Loading....</p>
                </div>
                <iframe class="chatbot-iframe" id="chatbot-iframe"></iframe>
            </div>
            <?php
            break; // No need to check further, stop if the page matches
        }
    }
}
add_action('wp_footer', 'camhdk_chatbot_html');
