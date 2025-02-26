<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// Updated function and namespace prefixes for uniqueness
function mymap_plugin_menu() {
    add_menu_page(
        'Pick My Location Settings',
        'MiMap',
        'manage_options',
        'mymap_plugin_settings',
        'mymap_plugin_settings_page',
        'dashicons-location-alt'
    );
}
add_action('admin_menu', 'mymap_plugin_menu');

function mymap_plugin_settings_page() {
    $nonce = wp_create_nonce( 'mymap_nonce' );
    ?>
    <div class="wrap">
        <h2><?php esc_html_e('MiMap', 'mymap-pick-my-location-for-woocommerce'); ?></h2>
        <form method="post" action="options.php">
            <?php
            settings_fields('mymap_plugin_settings');
            do_settings_sections('mymap_plugin_settings');
            ?>
            <input type="hidden" name="mymapnonce" value="<?php echo esc_attr($nonce) ?>"/>
            <?php
            submit_button(__('Save Settings', 'mymap-pick-my-location-for-woocommerce'));
            ?>
        </form>
    </div>
    <?php
}

function mymap_sanitize_checkbox($input) {
    // Ensure the checkbox value is either '1' (checked) or '' (unchecked)
    return $input === '1' ? '1' : '';
}

function mymap_sanitize_color_picker($input) {
    // Validate the color picker value to ensure it's a valid hex color code
    if (preg_match('/^#[a-f0-9]{6}$/i', $input)) {
        return $input;
    }
    return '';
}

function mymap_sanitize_api_key($input) {
    // Sanitize the API key to allow only alphanumeric characters, dashes, and underscores
    return preg_replace('/[^a-zA-Z0-9_-]/', '', $input);
}

function mymap_plugin_settings_init() {
    register_setting('mymap_plugin_settings', 'mymap_checkbox', 'mymap_sanitize_checkbox');
    register_setting('mymap_plugin_settings', 'mymap_color_picker', 'mymap_sanitize_color_picker');
    register_setting('mymap_plugin_settings', 'mymap_api_key', 'mymap_sanitize_api_key');

    add_settings_section(
        'mymap_plugin_settings_section',
        __('MiMap Settings', 'mymap-pick-my-location-for-woocommerce'),
        'mymap_plugin_settings_section_callback',
        'mymap_plugin_settings'
    );

    add_settings_field(
        'mymap_api_key',
        __('Google Map API Key', 'mymap-pick-my-location-for-woocommerce'),
        'mymap_plugin_api_key_callback',
        'mymap_plugin_settings',
        'mymap_plugin_settings_section'
    );

    add_settings_field(
        'mymap_checkbox_billing',
        __('Enable for billing address', 'mymap-pick-my-location-for-woocommerce'),
        'mymap_plugin_checkbox_callback',
        'mymap_plugin_settings',
        'mymap_plugin_settings_section'
    );

    add_settings_field(
        'mymap_checkbox_shipping',
        __('Enable for shipping address', 'mymap-pick-my-location-for-woocommerce'),
        'mymap_plugin_checkbox_callback_ship',
        'mymap_plugin_settings',
        'mymap_plugin_settings_section'
    );

    add_settings_field(
        'mymap_color_picker',
        __('Button Color', 'mymap-pick-my-location-for-woocommerce'),
        'mymap_plugin_color_picker_callback',
        'mymap_plugin_settings',
        'mymap_plugin_settings_section'
    );

    add_settings_field(
        'mymap_location_url',
        __('Enable Location URL', 'mymap-pick-my-location-for-woocommerce'),
        'mymap_plugin_location_url',
        'mymap_plugin_settings',
        'mymap_plugin_settings_section'
    );
}
add_action('admin_init', 'mymap_plugin_settings_init');

function mymap_plugin_settings_section_callback() {
    echo esc_html(__('Customize MiMap as per your requirements.', 'mymap-pick-my-location-for-woocommerce'));
}

function mymap_plugin_api_key_callback() {
    $api_key = get_option('mymap_api_key');
    echo '<input type="text" name="mymap_api_key" value="' . esc_attr($api_key) . '" /><br><a href="https://console.cloud.google.com/project/_/google/maps-apis/credentials?utm_source=Docs_CreateAPIKey&utm_content=Docs_maps-embed-backend&_gl=1*mbmwl2*_ga*OTA3OTE0MDg4LjE3MDAyOTIzMDM.*_ga_NRWSTWS78N*MTcyMTkxNDIxMy4yLjAuMTcyMTkxNDIxMy4wLjAuMA.." target="_blank">How to generate google map API key?</a>';
}

function mymap_plugin_color_picker_callback() {
    $color = get_option('mymap_color_picker');
    echo '<input type="text" name="mymap_color_picker" class="mymap-color-field" value="' . esc_attr($color) . '" />';
}

function mymap_plugin_checkbox_callback() {
    $options = array(
        '1' => __('Enable', 'mymap-pick-my-location-for-woocommerce'),
        '0' => __('Disable', 'mymap-pick-my-location-for-woocommerce')
    );

    $selected_option = get_option('mymap_checkbox_billing', '1'); // Default to 'option1' if not set

    echo '<select name="mymap_checkbox_billing">';
    foreach ($options as $key => $label) {
        echo '<option value="' . esc_attr($key) . '"' . selected($selected_option, $key, false) . '>' . esc_html($label) . '</option>';
    }
    echo '</select>';
}

function mymap_plugin_checkbox_callback_ship() {
    $options = array(
        '1' => __('Enable', 'mymap-pick-my-location-for-woocommerce'),
        '0' => __('Disable', 'mymap-pick-my-location-for-woocommerce')
    );

    $selected_option = get_option('mymap_checkbox_shipping', '1'); // Default to 'option1' if not set

    echo '<select name="mymap_checkbox_shipping">';
    foreach ($options as $key => $label) {
        echo '<option value="' . esc_attr($key) . '"' . selected($selected_option, $key, false) . '>' . esc_html($label) . '</option>';
    }
    echo '</select>';
}

function mymap_plugin_location_url() {
    $options = array(
        '1' => __('Enable', 'mymap-pick-my-location-for-woocommerce'),
        '0' => __('Disable', 'mymap-pick-my-location-for-woocommerce')
    );

    $selected_option = get_option('mymap_location_url', '1'); // Default to 'option1' if not set

    echo '<select name="mymap_location_url">';
    foreach ($options as $key => $label) {
        echo '<option value="' . esc_attr($key) . '"' . selected($selected_option, $key, false) . '>' . esc_html($label) . '</option>';
    }
    echo '</select>';
}

function mymap_plugin_save_api_key() {
    if (isset($_POST['mymapnonce'])) {
        // Unsplash and sanitize nonce value
        $nonce = sanitize_text_field(wp_unslash($_POST['mymapnonce']));
        if (!wp_verify_nonce($nonce, 'mymap_nonce')) {
            die('Something went wrong!');
        } else {
            // Unsplash and sanitize other fields
            if (isset($_POST['mymap_api_key'])) {
                update_option('mymap_api_key', sanitize_text_field(wp_unslash($_POST['mymap_api_key'])));
            }
            if (isset($_POST['mymap_color_picker'])) {
                update_option('mymap_color_picker', sanitize_hex_color(wp_unslash($_POST['mymap_color_picker'])));
            }
            if (isset($_POST['mymap_checkbox_billing'])) {
                update_option('mymap_checkbox_billing', sanitize_text_field(wp_unslash($_POST['mymap_checkbox_billing'])));
            }
            if (isset($_POST['mymap_checkbox_shipping'])) {
                update_option('mymap_checkbox_shipping', sanitize_text_field(wp_unslash($_POST['mymap_checkbox_shipping'])));
            }
            if (isset($_POST['mymap_location_url'])) {
                update_option('mymap_location_url', sanitize_text_field(wp_unslash($_POST['mymap_location_url'])));
            }
        }
    }
}
add_action('admin_init', 'mymap_plugin_save_api_key');
?>
