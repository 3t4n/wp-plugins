<?php
// Prevent direct access to the file
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Hook to add admin menu
add_action('admin_menu', 'dashboard_reader_add_admin_menu');

// Hook to register plugin settings
add_action('admin_init', 'dashboard_reader_settings_init');

function dashboard_reader_add_admin_menu() {
    // Add a submenu item under Settings
    add_options_page(
        __('Dashboard Reader Settings', 'dashboard-reader'),
        __('Dashboard Reader', 'dashboard-reader'),
        'manage_options',
        'dashboard_reader',
        'dashboard_reader_options_page'
    );
}

function dashboard_reader_settings_init() {
    // Register a new setting for Dashboard Reader, include a sanitization callback
    register_setting('dashboard_reader', 'dashboard_reader_settings', 'dashboard_reader_sanitize_settings');

    // Add a new section to our admin page
    add_settings_section(
        'dashboard_reader_section',
        __('Dashboard Reader RSS Settings', 'dashboard-reader'),
        'dashboard_reader_settings_section_callback',
        'dashboard_reader'
    );

    // Add a new field for the RSS feed URLs
    add_settings_field(
        'dashboard_reader_textarea_field',
        __('RSS feed URLs', 'dashboard-reader'),
        'dashboard_reader_textarea_field_render',
        'dashboard_reader',
        'dashboard_reader_section'
    );

    // Add a new field for the refresh interval
    add_settings_field(
    'dashboard_reader_refresh_interval',
    __('Refresh Interval (hours)', 'dashboard-reader'),
    'dashboard_reader_refresh_interval_render',
    'dashboard_reader',
    'dashboard_reader_section'
    );

    // Add a new field for the item count
    add_settings_field(
        'dashboard_reader_item_count',
        __('Items per Feed', 'dashboard-reader'),
        'dashboard_reader_item_count_render',
        'dashboard_reader',
        'dashboard_reader_section'
    );
}
// Flush transient cache when saving
add_action('update_option_dashboard_reader_settings', 'dashboard_reader_flush_cache', 10, 2);

function dashboard_reader_flush_cache($old_value, $new_value) {
    // Assuming feed URLs might change, flush their specific caches
    $old_feeds = preg_split('/\r\n|[\r\n]/', $old_value['dashboard_reader_textarea_field']);
    $new_feeds = preg_split('/\r\n|[\r\n]/', $new_value['dashboard_reader_textarea_field']);
    
    // Combine old and new feeds to cover all potential changes
    $all_feeds = array_unique(array_merge($old_feeds, $new_feeds));

    foreach ($all_feeds as $feed_url) {
        if (filter_var($feed_url, FILTER_VALIDATE_URL)) {
            // Construct the transient name used to store feed items
            $transient_name = 'dashboard_feed_' . md5($feed_url);
            delete_transient($transient_name);
        }
    }
    
    // Also flush the feed titles cache if it's stored separately
    delete_transient('dashboard_reader_feed_titles');
}


function dashboard_reader_settings_section_callback() {
    echo esc_html__('Enter the RSS feed URLs, separated by line breaks.', 'dashboard-reader');  
}

// Render the textarea for the feed URLs
function dashboard_reader_textarea_field_render() {
    $options = get_option('dashboard_reader_settings');
    ?>
    <textarea cols='40' rows='5' name='dashboard_reader_settings[dashboard_reader_textarea_field]'><?php echo isset($options['dashboard_reader_textarea_field']) ? esc_textarea($options['dashboard_reader_textarea_field']) : ''; ?></textarea>
    <?php
}

// Render the refresh interval field
function dashboard_reader_refresh_interval_render() {
    $options = get_option('dashboard_reader_settings');
    ?>
    <input type='number' name='dashboard_reader_settings[dashboard_reader_refresh_interval]' value='<?php echo isset($options['dashboard_reader_refresh_interval']) ? esc_attr($options['dashboard_reader_refresh_interval']) : '12'; ?>' min='1'>
    <?php
}

// Render the item count field
function dashboard_reader_item_count_render() {
    $options = get_option('dashboard_reader_settings');
    ?>
    <input type='number' name='dashboard_reader_settings[dashboard_reader_item_count]' value='<?php echo isset($options['dashboard_reader_item_count']) ? esc_attr($options['dashboard_reader_item_count']) : '5'; ?>' min='1' max='20'>
    <?php
}

function dashboard_reader_sanitize_settings($input) {
    $sanitized_input = [];
    if (isset($input['dashboard_reader_textarea_field'])) {
        $text_lines = explode("\n", $input['dashboard_reader_textarea_field']);
        foreach ($text_lines as $line) {
            $sanitized_line = sanitize_text_field($line);
            if (!filter_var($sanitized_line, FILTER_VALIDATE_URL) === false) { // Validate URL
                $sanitized_input['dashboard_reader_textarea_field'][] = $sanitized_line;
            }
        }
        $sanitized_input['dashboard_reader_textarea_field'] = implode("\n", $sanitized_input['dashboard_reader_textarea_field']);
    }

    if (isset($input['dashboard_reader_refresh_interval'])) {
        $sanitized_input['dashboard_reader_refresh_interval'] = absint($input['dashboard_reader_refresh_interval']);
    }

    if (isset($input['dashboard_reader_item_count'])) {
        $sanitized_input['dashboard_reader_item_count'] = absint($input['dashboard_reader_item_count']);
    }
    return $sanitized_input;
    
}

function dashboard_reader_options_page() {
    if (!current_user_can('manage_options')) {
        return;
    }
    ?>
    <form action='options.php' method='post'>
        <h2><?php echo esc_html__('Dashboard Reader', 'dashboard-reader'); ?></h2> 
        <?php
        settings_fields('dashboard_reader');
        do_settings_sections('dashboard_reader');
        submit_button();
        ?>
    </form>
    <?php
}
