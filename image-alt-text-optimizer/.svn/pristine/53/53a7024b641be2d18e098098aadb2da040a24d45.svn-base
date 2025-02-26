<?php
/*
 * Plugin Name: Image Alt Text Optimizer
 * Description: Automatically optimizes image alt texts for better SEO.
 * Version: 1.3
 * Author: Big Techies
 * Author URI: https://www.bigtechies.com/
 * Text Domain: image-alt-text-optimizer
 * License: GPLv2
 * Released under the GNU General Public License (GPL)
 * https://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

// Enqueue Tailwind CSS, custom styles, and admin scripts
function iato_enqueue_admin_assets($hook) {
    if ('toplevel_page_iato-settings' != $hook) {
        return;
    }
    // Enqueue local Tailwind CSS
    wp_enqueue_style('tailwind-css', plugins_url('assets/css/tailwind.min.css', __FILE__));
    // Enqueue custom styles if any
    wp_enqueue_style('iato-custom-css', plugins_url('assets/css/custom-style.css', __FILE__));
    // Enqueue custom admin JavaScript
    wp_enqueue_script('iato-admin-js', plugins_url('assets/js/admin.js', __FILE__), array('jquery'), '1.0', true);
}
add_action('admin_enqueue_scripts', 'iato_enqueue_admin_assets');

// Add settings page
function iato_add_settings_page() {
    add_menu_page(
        __('Image Alt Text Optimizer', 'image-alt-text-optimizer'),
        __('Image Alt Text Optimizer', 'image-alt-text-optimizer'),
        'manage_options',
        'iato-settings',
        'iato_render_settings_page',
        'dashicons-format-image',
        80
    );
}
add_action('admin_menu', 'iato_add_settings_page');

// Render settings page
function iato_render_settings_page() {
    ?>
    <div class="wrap">
        <div class="section-container max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-6"><?php esc_html_e('Image Alt Text Optimizer Settings', 'image-alt-text-optimizer'); ?></h1>

            <!-- Display settings saved notice -->
            <?php if (filter_input(INPUT_GET, 'settings-updated', FILTER_VALIDATE_BOOLEAN)) : ?>
                <div class="bg-green-50 border-l-4 border-green-400 p-4 text-green-700 mb-6">
                    <p class="text-sm"><?php esc_html_e('Settings saved.', 'image-alt-text-optimizer'); ?></p>
                </div>
            <?php endif; ?>

            <!-- Step 1: Pages, Posts Alt Texts -->
            <div class="section-container bg-white shadow overflow-hidden sm:rounded-lg p-6 mt-6">
                <h2 class="upload-heading"><?php esc_html_e('Step 1: Pages, Posts Alt Texts', 'image-alt-text-optimizer'); ?></h2>

                <form method="post" action="options.php">
                    <?php
                    settings_fields('iato_settings_group');
                    do_settings_sections('iato-settings');
                    ?>
                    <!-- Save Button -->
                    <div class="text-right mt-6">
                        <button type="submit" class="submit-button"><?php esc_html_e('Save Settings', 'image-alt-text-optimizer'); ?></button>
                    </div>
                </form>
            </div>

            <!-- Step 2: Product Alt Texts (for WooCommerce) -->
            <?php if (class_exists('WooCommerce')) : ?>
            <div class="section-container bg-white shadow overflow-hidden sm:rounded-lg p-6 mt-6">
                <h2 class="upload-heading"><?php esc_html_e('Step 2: Product Alt Texts (for WooCommerce)', 'image-alt-text-optimizer'); ?></h2>

                <form method="post" action="options.php">
                    <?php
                    settings_fields('iato_settings_group');
                    do_settings_sections('iato-woo-settings');
                    ?>
                    <!-- Save Button -->
                    <div class="text-right mt-6">
                        <button type="submit" class="submit-button"><?php esc_html_e('Save WooCommerce Settings', 'image-alt-text-optimizer'); ?></button>
                    </div>
                </form>
            </div>
            <?php endif; ?>

            <!-- Step 3: Optional Settings -->
            <div class="section-container bg-white shadow overflow-hidden sm:rounded-lg p-6 mt-6">
                <h2 class="upload-heading"><?php esc_html_e('Step 3: Optional Settings', 'image-alt-text-optimizer'); ?></h2>

                <form method="post" action="options.php">
                    <?php
                    settings_fields('iato_settings_group');
                    do_settings_sections('iato-optional-settings');
                    ?>
                    <!-- Save Button -->
                    <div class="text-right mt-6">
                        <button type="submit" class="submit-button"><?php esc_html_e('Save Optional Settings', 'image-alt-text-optimizer'); ?></button>
                    </div>
                </form>
            </div>

            <!-- Recommendations -->
            <div class="mt-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4"><?php esc_html_e('Boost your SEO with these plugins', 'image-alt-text-optimizer'); ?></h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Plugin Card -->
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
                        <h3 class="text-lg font-bold text-gray-800"><?php esc_html_e('Bulk Image Title Attribute', 'image-alt-text-optimizer'); ?></h3>
                        <p class="mt-2 text-sm text-gray-600">
                            <?php esc_html_e('Automatically adds title attributes to your images using page/article titles or image names and/or site name.', 'image-alt-text-optimizer'); ?>
                        </p>
                        <a href="<?php echo esc_url(admin_url('plugin-install.php?s=bulk+image+title+attribute&tab=search&type=term')); ?>" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                            <?php esc_html_e('Install BIGTA', 'image-alt-text-optimizer'); ?>
                        </a>
                    </div>

                    <!-- Plugin Card -->
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
                        <h3 class="text-lg font-bold text-gray-800"><?php esc_html_e('Better Robots.txt', 'image-alt-text-optimizer'); ?></h3>
                        <p class="mt-2 text-sm text-gray-600">
                            <?php esc_html_e('Enhances site indexing and Google ranking by generating a dynamic robots.txt file.', 'image-alt-text-optimizer'); ?>
                        </p>
                        <a href="<?php echo esc_url(admin_url('plugin-install.php?s=better+robots.txt&tab=search&type=term')); ?>" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                            <?php esc_html_e('Install Better Robots.txt', 'image-alt-text-optimizer'); ?>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php
}

// Register settings
function iato_register_settings() {
    register_setting('iato_settings_group', 'iato_settings', 'iato_sanitize_settings');

    add_settings_section('iato_main_section', '', null, 'iato-settings');

    // Post Types
    add_settings_field('iato_post_types', __('Select Post Types', 'image-alt-text-optimizer'), 'iato_post_types_callback', 'iato-settings', 'iato_main_section');

    // Handling Missing Alt Tags
    add_settings_field('iato_missing_alt', __('Handling Missing Alt Tags', 'image-alt-text-optimizer'), 'iato_missing_alt_callback', 'iato-settings', 'iato_main_section');

    // Handling Existing Alt Tags
    add_settings_field('iato_existing_alt', __('Handling Existing Alt Tags', 'image-alt-text-optimizer'), 'iato_existing_alt_callback', 'iato-settings', 'iato_main_section');

    // Optional Settings
    add_settings_section('iato_optional_section', '', null, 'iato-optional-settings');
    add_settings_field('iato_blacklist_pages', __('Blacklist Pages (Comma-separated IDs):', 'image-alt-text-optimizer'), 'iato_blacklist_pages_callback', 'iato-optional-settings', 'iato_optional_section');
    add_settings_field('iato_optional_checkboxes', __('Options', 'image-alt-text-optimizer'), 'iato_optional_checkboxes_callback', 'iato-optional-settings', 'iato_optional_section');

    // New optional settings fields
    add_settings_field('iato_remove_symbols', __('Remove Symbols', 'image-alt-text-optimizer'), 'iato_remove_symbols_callback', 'iato-optional-settings', 'iato_optional_section');
    add_settings_field('iato_alt_case', __('Alt Text Case', 'image-alt-text-optimizer'), 'iato_alt_case_callback', 'iato-optional-settings', 'iato_optional_section');

    // WooCommerce Settings
    if (class_exists('WooCommerce')) {
        add_settings_section('iato_woo_section', '', null, 'iato-woo-settings');
        add_settings_field('iato_woo_missing_alt', __('Handling Missing Product Alt Tags:', 'image-alt-text-optimizer'), 'iato_woo_missing_alt_callback', 'iato-woo-settings', 'iato_woo_section');
        add_settings_field('iato_woo_existing_alt', __('Handling Existing Product Alt Tags:', 'image-alt-text-optimizer'), 'iato_woo_existing_alt_callback', 'iato-woo-settings', 'iato_woo_section');
        add_settings_field('iato_disable_gallery', __('Disable for Product Gallery', 'image-alt-text-optimizer'), 'iato_disable_gallery_callback', 'iato-woo-settings', 'iato_woo_section');
    }
}
add_action('admin_init', 'iato_register_settings');

// Sanitize and merge settings
function iato_sanitize_settings($input) {
    // Verify nonce using filter_input to retrieve and sanitize the nonce
    $nonce_raw = filter_input(INPUT_POST, '_wpnonce', FILTER_SANITIZE_STRING);

    if (!$nonce_raw) {
        // Nonce is missing; return previous options to prevent data loss
        add_settings_error('iato_settings_group', 'nonce_error', __('Nonce verification failed. Settings not saved.', 'image-alt-text-optimizer'), 'error');
        return get_option('iato_settings', array());
    }

    $nonce = sanitize_text_field(wp_unslash($nonce_raw));

    if (!wp_verify_nonce($nonce, 'iato_settings_group-options')) {
        // Nonce is invalid; return previous options to prevent data loss
        add_settings_error('iato_settings_group', 'nonce_error', __('Nonce verification failed. Settings not saved.', 'image-alt-text-optimizer'), 'error');
        return get_option('iato_settings', array());
    }

    $options = get_option('iato_settings', array());

    // Initialize a new array to hold sanitized values
    $sanitized_input = array();

    // Sanitize post_types (array of strings)
    if (isset($input['post_types']) && is_array($input['post_types'])) {
        $sanitized_input['post_types'] = array_map('sanitize_key', $input['post_types']);
    }

    // Sanitize missing_alt and existing_alt (single string)
    if (isset($input['missing_alt'])) {
        $sanitized_input['missing_alt'] = sanitize_text_field($input['missing_alt']);
    }

    if (isset($input['existing_alt'])) {
        $sanitized_input['existing_alt'] = sanitize_text_field($input['existing_alt']);
    }

    // Sanitize optional settings
    if (isset($input['blacklist_pages'])) {
        // Remove any non-digit characters and commas
        $sanitized_input['blacklist_pages'] = preg_replace('/[^0-9,]/', '', $input['blacklist_pages']);
    }

    // Optional checkboxes
    $checkboxes = array('add_site_title', 'disable_homepage', 'debug_mode', 'delete_settings');
    foreach ($checkboxes as $checkbox) {
        $sanitized_input[$checkbox] = isset($input[$checkbox]) && $input[$checkbox] == 1 ? 1 : 0;
    }

    // Sanitize Remove Symbols
    if (isset($input['remove_symbols']) && is_array($input['remove_symbols'])) {
        $allowed_symbols = array('-', '*', '_', '/');
        $sanitized_input['remove_symbols'] = array_intersect($input['remove_symbols'], $allowed_symbols);
    } else {
        $sanitized_input['remove_symbols'] = array();
    }

    // Sanitize Alt Text Case
    $allowed_cases = array('normal', 'upper', 'lower');
    if (isset($input['alt_case']) && in_array($input['alt_case'], $allowed_cases)) {
        $sanitized_input['alt_case'] = $input['alt_case'];
    } else {
        $sanitized_input['alt_case'] = 'normal';
    }

    // Sanitize WooCommerce settings
    if (isset($input['woo_missing_alt'])) {
        $sanitized_input['woo_missing_alt'] = sanitize_text_field($input['woo_missing_alt']);
    }

    if (isset($input['woo_existing_alt'])) {
        $sanitized_input['woo_existing_alt'] = sanitize_text_field($input['woo_existing_alt']);
    }

    $sanitized_input['disable_gallery'] = isset($input['disable_gallery']) && $input['disable_gallery'] == 1 ? 1 : 0;

    // Merge with existing options
    $options = array_merge($options, $sanitized_input);

    return $options;
}

// Callbacks for settings fields
function iato_post_types_callback() {
    $options = get_option('iato_settings');
    $post_types = get_post_types(array('public' => true), 'objects');
    ?>
    <div class="radio-container">
        <?php foreach ($post_types as $post_type): ?>
            <input type="checkbox" id="post_type_<?php echo esc_attr($post_type->name); ?>" 
                   name="iato_settings[post_types][]" 
                   value="<?php echo esc_attr($post_type->name); ?>" 
                   class="radio-input" 
                   <?php if (isset($options['post_types']) && in_array($post_type->name, $options['post_types'])) echo 'checked'; ?>>
            <label for="post_type_<?php echo esc_attr($post_type->name); ?>" class="sky-blue-label">
                <?php echo esc_html($post_type->labels->name); ?>
            </label>
        <?php endforeach; ?>
    </div>
    <?php
}

function iato_missing_alt_callback() {
    $options = get_option('iato_settings');
    $choices = array(
        'disabled' => __('Disabled', 'image-alt-text-optimizer'),
        'focus_keyword' => __('Yoast / Rank Math Focus Keyword', 'image-alt-text-optimizer'),
        'post_title' => __('Post Title', 'image-alt-text-optimizer'),
        'image_name' => __('Image Name', 'image-alt-text-optimizer'),
        'focus_keyword_post_title' => __('Focus Keyword & Post Title', 'image-alt-text-optimizer'),
    );
    ?>
    <select name="iato_settings[missing_alt]" class="regular-text">
        <?php foreach ($choices as $value => $label): ?>
            <option value="<?php echo esc_attr($value); ?>" <?php selected(isset($options['missing_alt']) ? $options['missing_alt'] : '', $value); ?>><?php echo esc_html($label); ?></option>
        <?php endforeach; ?>
    </select>
    <?php
}

function iato_existing_alt_callback() {
    $options = get_option('iato_settings');
    $choices = array(
        'disabled' => __('Disabled', 'image-alt-text-optimizer'),
        'focus_keyword' => __('Yoast / Rank Math Focus Keyword', 'image-alt-text-optimizer'),
        'post_title' => __('Post Title', 'image-alt-text-optimizer'),
        'image_name' => __('Image Name', 'image-alt-text-optimizer'),
        'focus_keyword_post_title' => __('Focus Keyword & Post Title', 'image-alt-text-optimizer'),
    );
    ?>
    <select name="iato_settings[existing_alt]" class="regular-text">
        <?php foreach ($choices as $value => $label): ?>
            <option value="<?php echo esc_attr($value); ?>" <?php selected(isset($options['existing_alt']) ? $options['existing_alt'] : '', $value); ?>><?php echo esc_html($label); ?></option>
        <?php endforeach; ?>
    </select>
    <?php
}

function iato_blacklist_pages_callback() {
    $options = get_option('iato_settings');
    ?>
    <input type="text" name="iato_settings[blacklist_pages]" id="iato_blacklist_pages" value="<?php echo isset($options['blacklist_pages']) ? esc_attr($options['blacklist_pages']) : ''; ?>" placeholder="<?php esc_attr_e('e.g., 12,34,56', 'image-alt-text-optimizer'); ?>" class="regular-text">
    <p class="description"><?php esc_html_e('Enter the IDs of pages/posts you want to exclude.', 'image-alt-text-optimizer'); ?></p>
    <?php
}

function iato_optional_checkboxes_callback() {
    $options = get_option('iato_settings');
    $checkboxes = array(
        'add_site_title' => __('Add Site Title to Alt Text', 'image-alt-text-optimizer'),
        'disable_homepage' => __('Disable for Homepage', 'image-alt-text-optimizer'),
        'debug_mode' => __('Enable Debug Mode', 'image-alt-text-optimizer'),
        'delete_settings' => __('Delete Settings on Deactivation', 'image-alt-text-optimizer'),
    );
    foreach ($checkboxes as $key => $label) {
        $is_checked = isset($options[$key]) && $options[$key] == 1;
        ?>
        <label>
            <input type="checkbox" id="<?php echo esc_attr($key); ?>" name="iato_settings[<?php echo esc_attr($key); ?>]" value="1" <?php checked($is_checked); ?>>
            <?php echo esc_html($label); ?>
        </label><br>
        <?php
    }
}

// New callback for Remove Symbols option
function iato_remove_symbols_callback() {
    $options = get_option('iato_settings');
    $symbols = array('-', '*', '_', '/');
    ?>
    <div class="radio-container">
        <?php foreach ($symbols as $symbol): ?>
            <input type="checkbox" id="remove_symbol_<?php echo esc_attr(trim($symbol)); ?>" 
                   name="iato_settings[remove_symbols][]" 
                   value="<?php echo esc_attr($symbol); ?>" 
                   class="radio-input" 
                   <?php if (isset($options['remove_symbols']) && in_array($symbol, $options['remove_symbols'])) echo 'checked'; ?>>
            <label for="remove_symbol_<?php echo esc_attr(trim($symbol)); ?>" class="sky-blue-label">
                <?php echo esc_html($symbol); ?>
            </label>
        <?php endforeach; ?>
    </div>
    <p class="description"><?php esc_html_e('Select symbols you want to remove from generated alt text. Removed symbols will be replaced with a space.', 'image-alt-text-optimizer'); ?></p>
    <?php
}

// New callback for Alt Text Case option
function iato_alt_case_callback() {
    $options = get_option('iato_settings');
    $choices = array(
        'normal' => __('Normal Case (Title Case)', 'image-alt-text-optimizer'),
        'upper' => __('Upper Case', 'image-alt-text-optimizer'),
        'lower' => __('Lower Case', 'image-alt-text-optimizer'),
    );
    ?>
    <select name="iato_settings[alt_case]" class="regular-text">
        <?php foreach ($choices as $value => $label): ?>
            <option value="<?php echo esc_attr($value); ?>" <?php selected(isset($options['alt_case']) ? $options['alt_case'] : '', $value); ?>><?php echo esc_html($label); ?></option>
        <?php endforeach; ?>
    </select>
    <p class="description"><?php esc_html_e('Select the case format for generated alt text.', 'image-alt-text-optimizer'); ?></p>
    <?php
}

function iato_woo_missing_alt_callback() {
    $options = get_option('iato_settings');
    $choices = array(
        'disabled' => __('Disabled', 'image-alt-text-optimizer'),
        'product_title' => __('Product Title', 'image-alt-text-optimizer'),
        'image_name' => __('Image Name', 'image-alt-text-optimizer'),
        'product_title_image_name' => __('Product Title & Image Name', 'image-alt-text-optimizer'),
    );
    ?>
    <select name="iato_settings[woo_missing_alt]" class="regular-text">
        <?php foreach ($choices as $value => $label): ?>
            <option value="<?php echo esc_attr($value); ?>" <?php selected(isset($options['woo_missing_alt']) ? $options['woo_missing_alt'] : '', $value); ?>><?php echo esc_html($label); ?></option>
        <?php endforeach; ?>
    </select>
    <?php
}

function iato_woo_existing_alt_callback() {
    $options = get_option('iato_settings');
    $choices = array(
        'disabled' => __('Disabled', 'image-alt-text-optimizer'),
        'product_title' => __('Product Title', 'image-alt-text-optimizer'),
        'image_name' => __('Image Name', 'image-alt-text-optimizer'),
        'product_title_image_name' => __('Product Title & Image Name', 'image-alt-text-optimizer'),
    );
    ?>
    <select name="iato_settings[woo_existing_alt]" class="regular-text">
        <?php foreach ($choices as $value => $label): ?>
            <option value="<?php echo esc_attr($value); ?>" <?php selected(isset($options['woo_existing_alt']) ? $options['woo_existing_alt'] : '', $value); ?>><?php echo esc_html($label); ?></option>
        <?php endforeach; ?>
    </select>
    <?php
}

function iato_disable_gallery_callback() {
    $options = get_option('iato_settings');
    ?>
    <label>
        <input id="disable_gallery" name="iato_settings[disable_gallery]" type="checkbox" value="1" <?php checked(isset($options['disable_gallery']), 1); ?>>
        <?php esc_html_e('Disable for Product Gallery', 'image-alt-text-optimizer'); ?>
    </label>
    <?php
}

// Main function to optimize alt texts in the_content
function iato_optimize_alt_text($content) {
    $options = get_option('iato_settings');

    global $post;
    if (!$post) {
        return $content;
    }
    $post_id = $post->ID;

    // Check for blacklist pages
    if (!empty($options['blacklist_pages'])) {
        $blacklist = array_map('trim', explode(',', $options['blacklist_pages']));
        if (in_array($post_id, $blacklist)) {
            return $content;
        }
    }

    // Disable on homepage
    if (is_front_page() && isset($options['disable_homepage']) && $options['disable_homepage']) {
        return $content;
    }

    // Get site title
    $site_title = get_bloginfo('name');

    $dom = new DOMDocument();
    libxml_use_internal_errors(true);
    // Load the content as UTF-8 to prevent encoding issues
    $dom->loadHTML('<?xml encoding="utf-8" ?>' . $content);
    libxml_clear_errors();
    $images = $dom->getElementsByTagName('img');

    // Determine if it's a WooCommerce product
    if (class_exists('WooCommerce') && is_product()) {
        // WooCommerce product page
        $product = wc_get_product($post_id);
        if (!$product) {
            return $content;
        }

        // Get product title
        $product_title = $product->get_name();

        // Get settings
        $missing_alt_choice = isset($options['woo_missing_alt']) ? $options['woo_missing_alt'] : 'disabled';
        $existing_alt_choice = isset($options['woo_existing_alt']) ? $options['woo_existing_alt'] : 'disabled';

        foreach ($images as $img) {
            $alt = $img->getAttribute('alt');
            $src = $img->getAttribute('src');
            $image_path = wp_parse_url($src, PHP_URL_PATH);
            $image_name = pathinfo($image_path, PATHINFO_FILENAME);

            // Skip if disable for product gallery is enabled and image is in gallery
            if (isset($options['disable_gallery']) && $options['disable_gallery'] && strpos($img->getAttribute('class'), 'woocommerce-product-gallery__image') !== false) {
                continue;
            }

            // Determine replacement text
            $replacement_text = '';

            if (empty($alt) && $missing_alt_choice !== 'disabled') {
                $replacement_text = iato_get_woocommerce_replacement_text($missing_alt_choice, $product_title, $image_name);
            } elseif (!empty($alt) && $existing_alt_choice !== 'disabled') {
                $replacement_text = iato_get_woocommerce_replacement_text($existing_alt_choice, $product_title, $image_name);
            }

            if (!empty($replacement_text)) {
                // Apply symbol removal by replacing with space
                if (!empty($options['remove_symbols']) && is_array($options['remove_symbols'])) {
                    $replacement_text = str_replace($options['remove_symbols'], ' ', $replacement_text);
                }

                // Apply case transformation
                if (isset($options['alt_case'])) {
                    switch ($options['alt_case']) {
                        case 'upper':
                            $replacement_text = mb_strtoupper($replacement_text, 'UTF-8');
                            break;
                        case 'lower':
                            $replacement_text = mb_strtolower($replacement_text, 'UTF-8');
                            break;
                        case 'normal':
                        default:
                            // Apply Title Case
                            $replacement_text = mb_convert_case($replacement_text, MB_CASE_TITLE, "UTF-8");
                            break;
                    }
                }

                if (isset($options['add_site_title']) && $options['add_site_title']) {
                    $replacement_text .= ' - ' . $site_title;
                }
                // Sanitize the replacement text
                $replacement_text = sanitize_text_field($replacement_text);
                $img->setAttribute('alt', $replacement_text);
            }
        }
    } else {
        // Regular post/page
        if (!isset($options['post_types']) || !is_singular($options['post_types'])) {
            return $content;
        }

        // Get focus keyword from SEO plugins
        $focus_keyword = '';
        if (class_exists('WPSEO_Meta')) {
            $focus_keyword = WPSEO_Meta::get_value('focuskw', $post_id);
        } elseif (defined('RANK_MATH_VERSION')) {
            $focus_keyword = get_post_meta($post_id, 'rank_math_focus_keyword', true);
        } elseif (function_exists('afk_get_focus_keyword')) {
            $focus_keyword = afk_get_focus_keyword($post_id);
        }

        // Get post title
        $post_title = get_the_title($post_id);

        // Prepare the replacement text based on settings
        $missing_alt_choice = isset($options['missing_alt']) ? $options['missing_alt'] : 'disabled';
        $existing_alt_choice = isset($options['existing_alt']) ? $options['existing_alt'] : 'disabled';

        foreach ($images as $img) {
            $alt = $img->getAttribute('alt');
            $src = $img->getAttribute('src');
            $image_path = wp_parse_url($src, PHP_URL_PATH);
            $image_name = pathinfo($image_path, PATHINFO_FILENAME);

            // Determine replacement text
            $replacement_text = '';

            if (empty($alt) && $missing_alt_choice !== 'disabled') {
                $replacement_text = iato_get_replacement_text($missing_alt_choice, $focus_keyword, $post_title, $image_name);
            } elseif (!empty($alt) && $existing_alt_choice !== 'disabled') {
                $replacement_text = iato_get_replacement_text($existing_alt_choice, $focus_keyword, $post_title, $image_name);
            }

            if (!empty($replacement_text)) {
                // Apply symbol removal by replacing with space
                if (!empty($options['remove_symbols']) && is_array($options['remove_symbols'])) {
                    $replacement_text = str_replace($options['remove_symbols'], ' ', $replacement_text);
                }

                // Apply case transformation
                if (isset($options['alt_case'])) {
                    switch ($options['alt_case']) {
                        case 'upper':
                            $replacement_text = mb_strtoupper($replacement_text, 'UTF-8');
                            break;
                        case 'lower':
                            $replacement_text = mb_strtolower($replacement_text, 'UTF-8');
                            break;
                        case 'normal':
                        default:
                            // Apply Title Case
                            $replacement_text = mb_convert_case($replacement_text, MB_CASE_TITLE, "UTF-8");
                            break;
                    }
                }

                if (isset($options['add_site_title']) && $options['add_site_title']) {
                    $replacement_text .= ' - ' . $site_title;
                }
                // Sanitize the replacement text
                $replacement_text = sanitize_text_field($replacement_text);
                $img->setAttribute('alt', $replacement_text);
            }
        }
    }

    // Extract the inner HTML of the <body> tag
    $body = $dom->getElementsByTagName('body')->item(0);
    $new_content = '';
    foreach ($body->childNodes as $child) {
        $new_content .= $dom->saveHTML($child);
    }

    return $new_content;
}
add_filter('the_content', 'iato_optimize_alt_text', 99);

// Helper function to get replacement text
function iato_get_replacement_text($choice, $focus_keyword, $post_title, $image_name) {
    switch ($choice) {
        case 'focus_keyword':
            return $focus_keyword;
        case 'post_title':
            return $post_title;
        case 'image_name':
            return $image_name;
        case 'focus_keyword_post_title':
            return trim($focus_keyword . ' ' . $post_title);
        default:
            return '';
    }
}

function iato_modify_image_attributes($attr, $attachment, $size) {
    // Get the options from the plugin settings
    $options = get_option('iato_settings');

    // Get the global post
    global $post;
    if (!$post) {
        return $attr;
    }
    $post_id = $post->ID;

    // Check for blacklist pages
    if (!empty($options['blacklist_pages'])) {
        $blacklist = array_map('trim', explode(',', $options['blacklist_pages']));
        if (in_array($post_id, $blacklist)) {
            return $attr;
        }
    }

    // Disable on homepage
    if (is_front_page() && isset($options['disable_homepage']) && $options['disable_homepage']) {
        return $attr;
    }

    // Get site title
    $site_title = get_bloginfo('name');

    // Determine if it's a WooCommerce product page
    if (class_exists('WooCommerce') && is_product()) {
        // WooCommerce product page
        $product = wc_get_product($post_id);
        if (!$product) {
            return $attr;
        }

        // Get product title
        $product_title = $product->get_name();

        // Get settings
        $missing_alt_choice  = isset($options['woo_missing_alt']) ? $options['woo_missing_alt'] : 'disabled';
        $existing_alt_choice = isset($options['woo_existing_alt']) ? $options['woo_existing_alt'] : 'disabled';

        $alt        = isset($attr['alt']) ? $attr['alt'] : '';
        $image_name = get_the_title($attachment->ID);

        // Skip if disable for product gallery is enabled and image is in gallery
        if (isset($options['disable_gallery']) && $options['disable_gallery'] && has_term('', 'product_cat', $attachment->ID)) {
            return $attr;
        }

        // Determine replacement text
        $replacement_text = '';

        if (empty($alt) && $missing_alt_choice !== 'disabled') {
            $replacement_text = iato_get_woocommerce_replacement_text($missing_alt_choice, $product_title, $image_name);
        } elseif (!empty($alt) && $existing_alt_choice !== 'disabled') {
            $replacement_text = iato_get_woocommerce_replacement_text($existing_alt_choice, $product_title, $image_name);
        }

        if (!empty($replacement_text)) {
            // Apply symbol removal by replacing with space
            if (!empty($options['remove_symbols']) && is_array($options['remove_symbols'])) {
                $replacement_text = str_replace($options['remove_symbols'], ' ', $replacement_text);
            }

            // Apply case transformation
            if (isset($options['alt_case'])) {
                switch ($options['alt_case']) {
                    case 'upper':
                        $replacement_text = mb_strtoupper($replacement_text, 'UTF-8');
                        break;
                    case 'lower':
                        $replacement_text = mb_strtolower($replacement_text, 'UTF-8');
                        break;
                    case 'normal':
                    default:
                        // Apply Title Case
                        $replacement_text = mb_convert_case($replacement_text, MB_CASE_TITLE, "UTF-8");
                        break;
                }
            }

            if (isset($options['add_site_title']) && $options['add_site_title']) {
                $replacement_text .= ' - ' . $site_title;
            }
            // Sanitize the replacement text
            $replacement_text = sanitize_text_field($replacement_text);
            $attr['alt'] = $replacement_text;
        }
    } else {
        // Regular post/page
        if (!isset($options['post_types']) || !is_singular($options['post_types'])) {
            return $attr;
        }

        // Get focus keyword from SEO plugins
        $focus_keyword = '';
        if (class_exists('WPSEO_Meta')) {
            $focus_keyword = WPSEO_Meta::get_value('focuskw', $post_id);
        } elseif (defined('RANK_MATH_VERSION')) {
            $focus_keyword = get_post_meta($post_id, 'rank_math_focus_keyword', true);
        } elseif (function_exists('afk_get_focus_keyword')) {
            $focus_keyword = afk_get_focus_keyword($post_id);
        }

        // Get post title
        $post_title = get_the_title($post_id);

        // Prepare the replacement text based on settings
        $missing_alt_choice  = isset($options['missing_alt']) ? $options['missing_alt'] : 'disabled';
        $existing_alt_choice = isset($options['existing_alt']) ? $options['existing_alt'] : 'disabled';

        $alt        = isset($attr['alt']) ? $attr['alt'] : '';
        $image_name = get_the_title($attachment->ID);

        // Determine replacement text
        $replacement_text = '';

        if (empty($alt) && $missing_alt_choice !== 'disabled') {
            $replacement_text = iato_get_replacement_text($missing_alt_choice, $focus_keyword, $post_title, $image_name);
        } elseif (!empty($alt) && $existing_alt_choice !== 'disabled') {
            $replacement_text = iato_get_replacement_text($existing_alt_choice, $focus_keyword, $post_title, $image_name);
        }

        if (!empty($replacement_text)) {
            // Apply symbol removal by replacing with space
            if (!empty($options['remove_symbols']) && is_array($options['remove_symbols'])) {
                $replacement_text = str_replace($options['remove_symbols'], ' ', $replacement_text);
            }

            // Apply case transformation
            if (isset($options['alt_case'])) {
                switch ($options['alt_case']) {
                    case 'upper':
                        $replacement_text = mb_strtoupper($replacement_text, 'UTF-8');
                        break;
                    case 'lower':
                        $replacement_text = mb_strtolower($replacement_text, 'UTF-8');
                        break;
                    case 'normal':
                    default:
                        // Apply Title Case
                        $replacement_text = mb_convert_case($replacement_text, MB_CASE_TITLE, "UTF-8");
                        break;
                }
            }

            if (isset($options['add_site_title']) && $options['add_site_title']) {
                $replacement_text .= ' - ' . $site_title;
            }
            // Sanitize the replacement text
            $replacement_text = sanitize_text_field($replacement_text);
            $attr['alt'] = $replacement_text;
        }
    }

    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'iato_modify_image_attributes', 10, 3);

// Helper function for WooCommerce replacement text
function iato_get_woocommerce_replacement_text($choice, $product_title, $image_name) {
    switch ($choice) {
        case 'product_title':
            return $product_title;
        case 'image_name':
            return $image_name;
        case 'product_title_image_name':
            return trim($product_title . ' ' . $image_name);
        default:
            return '';
    }
}

// Delete plugin settings upon deactivation if selected
function iato_delete_plugin_settings() {
    $options = get_option('iato_settings');
    if (isset($options['delete_settings']) && $options['delete_settings']) {
        delete_option('iato_settings');
    }
}
register_deactivation_hook(__FILE__, 'iato_delete_plugin_settings');
?>