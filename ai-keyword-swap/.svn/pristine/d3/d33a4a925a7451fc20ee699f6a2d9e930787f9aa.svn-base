<?php

/**
 * Plugin Name: AI Keyword Swap
 * Description: This plugin allow to search a keywords in the classic editor and replace them with OpenAI API suggestion. 
 * Author: Galaxy Weblinks
 * Version: 1.1
 * Author URI: https://galaxyweblinks.com
 * License: GPLv2 or later
 * Text Domain: ai-keyword-swap
 */

// Don't do anything if called directly.
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Add a AI Keyword Swap Menu Page to the Admin Menu.
 *
 * @since 1.0.0
 */
if (!function_exists('aiks_keyword_swap_menu')) {
    function aiks_keyword_swap_menu()
    {
        $icon_ai_keyword_swap = plugin_dir_url(__FILE__) . 'image/aiks-icon.svg';
        add_menu_page(
            'AI Keyword Swap Settings',
            'AI Keyword Swap',
            'manage_options',
            'aiks-keyword-swap-settings',
            'aiks_keyword_swap_settings_page',
            $icon_ai_keyword_swap
        );
    }
}

/**
 * Callback Function to Display the AI Keyword Swap Menu Page Content.
 *
 * @since 1.0.0
 */
if (!function_exists('aiks_keyword_swap_settings_page')) {
    function aiks_keyword_swap_settings_page()
    {
        // Nonce check to validate and process form data        
        if (isset($_POST['_wpnonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_wpnonce'])))) {
            // Check if the form is submitted
            if (isset($_POST['aiks_keyword_swap_textarea']) && isset($_POST['aiks_keyword_swap_textfield']) && isset($_POST['aiks_keyword_swap_openai_endpoint'])) {
                // Save the textarea data
                if (!empty($_POST['aiks_keyword_swap_textarea'])) {
                    $choices = explode("\n", sanitize_textarea_field(wp_unslash($_POST['aiks_keyword_swap_textarea'])));
                } else {
                    $choices = array();
                }

                $clean_choices = array_map('sanitize_text_field', array_map('trim', $choices));
                update_option('aiks_keyword_swap_choices', $clean_choices);

                // Save the text field data
                $additional_data = sanitize_text_field(wp_unslash($_POST['aiks_keyword_swap_textfield']));
                update_option('aiks_keyword_swap_textfield_data', $additional_data);

                // Save the OpenAI API Endpoint
                $openai_endpoint = sanitize_text_field(wp_unslash($_POST['aiks_keyword_swap_openai_endpoint']));
                update_option('aiks_keyword_swap_openai_endpoint_data', $openai_endpoint);

                echo '<div class="updated"><p>';
                esc_html_e('Data saved!', 'ai-keyword-swap');
                echo '</p></div>';
            }
        }

        // Retrieve saved choices
        $saved_choices = get_option('aiks_keyword_swap_choices', array());

        // Retrieve saved text field data
        $saved_textfield_data = get_option('aiks_keyword_swap_textfield_data', '');

        // Retrieve saved OpenAI API Endpoint
        $saved_openai_endpoint = get_option('aiks_keyword_swap_openai_endpoint_data', '');


        // Display the settings form
?>
        <div class="wrap aiks-keyword-swap-settings">

            <h2 class="aiks-keyword-swap-heading"><?php esc_html_e('AI Keyword Swap Settings', 'ai-keyword-swap'); ?></h2>

            <div class="notice aiks--notice">
                <div>
                    <h3><?php esc_html_e('AI Keyword Swap', 'ai-keyword-swap'); ?></h3>
                    <p>Here's a link to the documentation for the plugin. This will help you learn more about its features and how to use it.</p>
                    <div class="e-notice__actions">
                        <a href="https://wp-plugins.galaxyweblinks.com/wp-plugins/ai-keyword-swap/doc/" class="e-button--cta cta-secondary" target="_blank"><span>Documentation</span></a>
                    </div>
                    <p class="e-note">For any feedback or queries regarding this plugin, please contact our <a href="https://wp-plugins.galaxyweblinks.com/contact/" target="_blank">Support team</a>.</p>
                </div>
            </div>

            <form method="post" action="" class="aiks-keyword-swap-settings-form">
                <label
                    for="aiks_keyword_swap_textarea"><?php esc_html_e('Keywords (One per line)', 'ai-keyword-swap'); ?><span class="aiks-required"> * </span></label><br>
                <textarea id="aiks_keyword_swap_textarea" name="aiks_keyword_swap_textarea" rows="20"
                    cols="50" required><?php echo esc_textarea(implode("\n", $saved_choices)); ?></textarea><br>
                <br>
                <label for="aiks_keyword_swap_textfield"><?php esc_html_e('OpenAI API Key', 'ai-keyword-swap'); ?><span class="aiks-required"> * </span></label><br>
                <input type="text" id="aiks_keyword_swap_textfield" name="aiks_keyword_swap_textfield"
                    value="<?php echo esc_attr($saved_textfield_data); ?>" required><br>
                <br>
                <label
                    for="aiks_keyword_swap_openai_endpoint"><?php esc_html_e('OpenAI API Endpoint', 'ai-keyword-swap'); ?><span class="aiks-required"> * </span></label><br>
                <input type="text" id="aiks_keyword_swap_openai_endpoint" name="aiks_keyword_swap_openai_endpoint"
                    value="<?php echo esc_attr($saved_openai_endpoint); ?>" required><br>
                <br>
                <?php
                // wp nonce field
                wp_nonce_field();
                ?>
                <input type="submit" class="button-primary" value="<?php esc_html_e('Save', 'ai-keyword-swap'); ?>">
            </form>
            <!-- Hidden fields to store values -->
            <input type="hidden" id="aiks_keyword_swap_api_key"
                value="<?php echo esc_attr(get_option('aiks_keyword_swap_textfield_data', '')); ?>">
            <input type="hidden" id="aiks_keyword_swap_words_to_highlight"
                value="<?php echo esc_attr(implode(',', $saved_choices)); ?>">
            <input type="hidden" id="aiks_keyword_swap_api_endpoint"
                value="<?php echo esc_attr(get_option('aiks_keyword_swap_openai_endpoint_data', '')); ?>">
        </div>
    <?php
    }
}

// Hook into admin menu
add_action('admin_menu', 'aiks_keyword_swap_menu');


/**
 * Add Custom Button to TinyMCE Editor Toolbar
 *
 * This function adds a custom button to the TinyMCE editor toolbar for users who have the capability to edit posts or pages.
 *
 * @since 1.0.0
 */
if (!function_exists('aiks_keyword_swap_editor_button')) {
    function aiks_keyword_swap_editor_button()
    {
        // Check if the current user has the capability to edit posts or pages
        if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
            return; // If not, exit the function
        }

        // Add filter to include the custom plugin file for the editor
        add_filter('mce_external_plugins', 'aiks_keyword_swap_editor_add_plugin');

        // Add filter to register the custom button in the editor toolbar
        add_filter('mce_buttons', 'aiks_keyword_swap_editor_register_button');
    }
}

/**
 * Register Read & Replace Buttons in WordPress Editor Toolbar
 *
 * This function registers custom buttons in the WordPress editor toolbar.
 * It adds the specified button identifiers to the array of buttons provided as a parameter.
 *
 * @param array $buttons The array of buttons in the editor toolbar.
 * @return array The updated array of buttons with custom button identifiers added.
 * @since 1.0.0
 */
if (!function_exists('aiks_keyword_swap_editor_register_button')) {
    function aiks_keyword_swap_editor_register_button($buttons)
    {
        // Add custom button identifiers to the array of buttons
        array_push($buttons, 'aiks_keyword_swap_read_button'); // Adds a button to read keyword
        array_push($buttons, 'aiks_keyword_swap_replace_button'); // Adds a button to replace keyword
        return $buttons; // Return the updated array of buttons
    }
}
/**
 * Load Custom JavaScript Plugin for Read & Replace Editor Buttons
 *
 * This function loads the custom JavaScript plugin file for the custom buttons added to the WordPress editor toolbar.
 * It associates each button identifier with the URL of the corresponding JavaScript file.
 *
 * @param array $plugin_array An array containing the list of plugins registered for the TinyMCE editor.
 * @return array The updated array with custom plugin URLs added for the custom editor buttons.
 * @since 1.0.0
 */
if (!function_exists('aiks_keyword_swap_editor_add_plugin')) {
    function aiks_keyword_swap_editor_add_plugin($plugin_array)
    {
        // Associate each button identifier with the URL of the corresponding JavaScript file
        $plugin_array['aiks_keyword_swap_read_button'] = plugin_dir_url(__FILE__) . 'js/aiks-keyword-swap-read-button.js'; // URL for the read button plugin
        $plugin_array['aiks_keyword_swap_replace_button'] = plugin_dir_url(__FILE__) . 'js/aiks-keyword-swap-read-button.js'; // URL for the replace button plugin
        return $plugin_array; // Return the updated array with custom plugin URLs added
    }
}
// Hook functions to WordPress actions
add_action('admin_init', 'aiks_keyword_swap_editor_button');
add_action('admin_enqueue_scripts', 'aiks_keyword_swap_editor_enqueue_script');

/**
 * Enqueue Scripts for the Admin Area
 *
 * This function enqueues scripts for the WordPress admin area, specifically for the post edit screens.
 * It checks the current admin page hook to determine if the scripts should be enqueued.
 * It also localizes script data to pass PHP variables to JavaScript.
 *
 * @param string $hook The current admin page hook.
 * @since 1.0.0
 */
if (!function_exists('aiks_keyword_swap_editor_enqueue_script')) {
    function aiks_keyword_swap_editor_enqueue_script($hook)
    {
        // Enqueue the style
        wp_enqueue_style('aiks-keyword-swap-admin-style', plugin_dir_url(__FILE__) . 'css/aiks-keyword-swap-admin-styles.css', array(), '1.0', 'all');

        // Check if the current admin page hook corresponds to a post edit screen
        if ('post.php' !== $hook && 'post-new.php' !== $hook) {
            return; // If not, exit the function
        }

        // Enqueue script for the custom button
        wp_enqueue_script('aiks-keyword-swap-read-button', plugin_dir_url(__FILE__) . 'js/aiks-keyword-swap-read-button.js', array('jquery'), '1.0', true);

        // Pass PHP variables to JavaScript
        wp_localize_script(
            'aiks-keyword-swap-read-button',
            // Handle of the enqueued script
            'aiks_keyword_swap_plugin_vars',
            // Name of the JavaScript object to which variables will be attached
            array(
                'apiKeyVal' => get_option('aiks_keyword_swap_textfield_data', ''),
                // Value of the 'aiks_keyword_swap_textfield_data' option
                'apiKeyEndPointVal' => get_option('aiks_keyword_swap_openai_endpoint_data', ''),
                // Value of the 'aiks_keyword_swap_openai_endpoint_data' option
                'wordsToHighlightVal' => get_option('aiks_keyword_swap_choices', array()),
                // Value of the 'aiks_keyword_swap_choices' option
            )
        );
    }
}

/**
 * Add Custom CSS to TinyMCE Editor
 *
 * This function adds custom CSS to the TinyMCE editor. It appends the URL of the custom CSS file
 * to the list of CSS files that TinyMCE should load for styling the editor content.
 *
 * @param string $wp A string containing the list of CSS files that TinyMCE should load.
 * @return string The updated string with the URL of the custom CSS file added.
 * @since 1.0.0
 */
if (!function_exists('aiks_keyword_swap_tinymce_custom_css_add')) {
    function aiks_keyword_swap_tinymce_custom_css_add($wp)
    {
        // Append the URL of the custom CSS file to the list of CSS files
        $wp .= ',' . plugin_dir_url(__FILE__) . 'css/aiks-keyword-swap-editor-styles.css';
        return $wp; // Return the updated string with the URL of the custom CSS file added
    }
}

// Hook the function to the 'mce_css' filter
add_filter('mce_css', 'aiks_keyword_swap_tinymce_custom_css_add', 100);

if (!function_exists('aiks_keyword_swap_custom_wp_admin_style')) {
    function aiks_keyword_swap_custom_wp_admin_style()
    {
        wp_enqueue_style('custom_wp_admin_css', plugin_dir_url(__FILE__) . 'css/aiks-keyword-swap-editor-styles.css', array(), '1.0');
    }
    add_action('admin_enqueue_scripts', 'aiks_keyword_swap_custom_wp_admin_style');
}
/**
 * Enqueue Editor Styles for Gutenberg Blocks
 *
 * This function enqueues editor styles specifically for Gutenberg blocks.
 * It registers and enqueues a CSS file containing styles for the editor.
 *
 * @since 1.0.0
 */

if (!function_exists('aiks_keyword_swap_enqueue_editor_styles')) {
    function aiks_keyword_swap_enqueue_editor_styles()
    {
        // Register editor styles with WordPress
        wp_register_style('aiks-keyword-swap-editor-styles', plugin_dir_url(__FILE__) . 'css/aiks-keyword-swap-editor-styles.css', array(), '1.0');

        // Enqueue editor styles
        wp_enqueue_style('aiks-keyword-swap-editor-styles');
    }
}
// Hook the function to the 'enqueue_block_assets' action with a priority of 20
add_action('enqueue_block_assets', 'aiks_keyword_swap_enqueue_editor_styles', 20);

/**
 * Add Dynamic Styles to TinyMCE Editor
 *
 * This function adds dynamic styles to the TinyMCE editor. It modifies the 'content_style'
 * property of the TinyMCE initialization settings to include custom CSS styles.
 *
 * @param array $mceInit An array containing the TinyMCE initialization settings.
 * @return array The updated array with dynamic styles added to the 'content_style' property.
 * @since 1.0.0
 */
if (!function_exists('aiks_keyword_swap_editor_dynamic_styles')) {
    function aiks_keyword_swap_editor_dynamic_styles($mceInit)
    {
        // Define custom CSS styles
        $styles = 'body.mce-content-body .aksHighlighted { background-color: #FFFF00 !important}';

        // Check if the 'content_style' property exists in the TinyMCE initialization settings
        if (isset($mceInit['content_style'])) {
            // If it exists, append custom styles to the existing 'content_style'
            $mceInit['content_style'] .= ' ' . $styles . ' ';
        } else {
            // If it doesn't exist, set 'content_style' to the custom styles
            $mceInit['content_style'] = $styles . ' ';
        }

        return $mceInit; // Return the updated array with dynamic styles added
    }
}

// Hook the function to the 'tiny_mce_before_init' filter
add_filter('tiny_mce_before_init', 'aiks_keyword_swap_editor_dynamic_styles');


/**
 * Remove <span> tags from post content before saving
 *
 * This function removes <span> tags with a specific class ('aksHighlighted') from post content before it is saved.
 * It uses a regular expression to identify and remove the <span> tags.
 *
 * @param string $content The content of the post being saved.
 * @return string The updated content with <span> tags removed.
 * @since 1.0.0
 */
if (!function_exists('aiks_keyword_swap_remove_span_tags')) {
    function aiks_keyword_swap_remove_span_tags($content)
    {
        // Define the regular expression pattern to match <span> tags with class 'aksHighlighted'
        $pattern = '/<span class=\\\\"aksHighlighted\\\\">(.*?)<\/span>/i';

        // Replace all occurrences of the pattern with the inner text
        $content = preg_replace($pattern, '$1', $content);

        return $content; // Return the updated content with <span> tags removed
    }
}

// Add the filter to 'content_save_pre' hook, applying the function before the post is saved
add_filter('content_save_pre', 'aiks_keyword_swap_remove_span_tags');

/**
 * Output HTML for modal dialog
 *
 * This function outputs HTML for a modal dialog box, typically used in the WordPress admin area.
 * It defines the structure and content of the modal dialog box.
 *
 * @since 1.0.0
 */
if (!function_exists('aiks_keyword_swap_code_model_box')) {
    function aiks_keyword_swap_code_model_box()
    {
    ?>
        <!-- HTML for modal dialog -->
        <div id="aiks_keyword_swap_modal" class="aiks_keyword_swap_modal">
            <div class="aiks-keyword-swap-modal-content">
                <span class="aiks-keyword-swap-close">&times;</span>
                <p id="aiks-keyword-swap-modal-text"></p>
                <button id="aiks-keyword-swap-replace-btn"><?php esc_html_e('Replace', 'ai-keyword-swap'); ?></button>
            </div>
        </div>
<?php
    }
}

// Add action to output the modal box HTML in the admin head section
add_action('admin_head', 'aiks_keyword_swap_code_model_box');

/**
 * Settings page link on plugins list page
 *
 * This function add the AI keyword swap plugin settings page link on the plugins list.
 *
 * @since 1.0.0
 */
if (!function_exists('aiks_keyword_swap_add_settings_link')) {
    function aiks_keyword_swap_add_settings_link($links)
    {
        $settings_link = '<a href="admin.php?page=aiks-keyword-swap-settings">' . __('Settings', 'ai-keyword-swap') . '</a>';
        array_push($links, $settings_link);
        return $links;
    }
}
$plugin = plugin_basename(__FILE__);
add_filter("plugin_action_links_$plugin", 'aiks_keyword_swap_add_settings_link');



/**
 * You can use these filters to add custom links to your plugin row in the plugin list.
 * @param $links, $file
 * @return $links [array]
 * @since 1.0.0
 */
if (! function_exists('aiks_keyword_add_custom_plugin_links')) {
    function aiks_keyword_add_custom_plugin_links($links, $file)
    {

        if ($file === 'ai-keyword-swap/ai-keyword-swap.php') {
            $links[] = '<a href="https://wp-plugins.galaxyweblinks.com/wp-plugins/ai-keyword-swap/doc/" target="_blank">Documentation</a>';
            $links[] = '<a href="https://wp-plugins.galaxyweblinks.com/contact/" target="_blank">Contact Support</a>';
        }
        return $links;
    }
}
add_filter('plugin_row_meta', 'aiks_keyword_add_custom_plugin_links', 10, 2);
