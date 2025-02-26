<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
define( 'MOODWE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
/*
 * Plugin Name: Moody Weather
 * Description: Displays a mood and icon based on the current weather conditions.
 * Version: 1.4.0
 * Author: devifypro
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: moody-weather
*/

// Enqueue Spectrum scripts and styles
function moody_weather_enqueue_spectrum($hook) {
    // Only load on the plugin's settings page
    if ($hook != 'settings_page_moody-weather-settings') {
        return;
    }

    wp_enqueue_style('spectrum', MOODWE_PLUGIN_URL . 'css/spectrum.css', array(), filemtime(MOODWE_PLUGIN_URL . 'css/spectrum.css'), 'all');
    wp_enqueue_script('spectrum-script', MOODWE_PLUGIN_URL . 'js/spectrum.js', array('jquery'), filemtime(MOODWE_PLUGIN_URL . 'js/spectrum.js'), true);

    // Add inline script for Spectrum initialization
    wp_add_inline_script('spectrum-script', '
        jQuery(document).ready(function($) {
            $("#background_color").spectrum({
                showAlpha: true,
                preferredFormat: "rgb",
                showInput: true,
                allowEmpty: true
            });
            $("#text_color").spectrum({
                showAlpha: true,
                preferredFormat: "rgb",
                showInput: true,
                allowEmpty: true
            });
            $("#accent_color").spectrum({
                showAlpha: true,
                preferredFormat: "rgb",
                showInput: true,
                allowEmpty: true
            });
            $("#icon_color").spectrum({
                showAlpha: true,
                preferredFormat: "rgb",
                showInput: true,
                allowEmpty: true
            });
        });
    ');
}
add_action('admin_enqueue_scripts', 'moody_weather_enqueue_spectrum');

// Enqueue front-end styles
function moody_weather_enqueue_styles() {
    wp_enqueue_style('moody-weather-style', MOODWE_PLUGIN_URL . 'style.css', array(), filemtime(MOODWE_PLUGIN_URL . 'style.css'), 'all');

    // Add inline styles for color customization
    $options = get_option('moody_weather_options');
    $background_color = !empty($options['background_color']) ? esc_attr($options['background_color']) : 'transparent';
    $text_color = !empty($options['text_color']) ? esc_attr($options['text_color']) : '#333333';
    $accent_color = !empty($options['accent_color']) ? esc_attr($options['accent_color']) : '#4a90e2';
    $icon_color = !empty($options['icon_color']) ? esc_attr($options['icon_color']) : '#4a90e2';

    $custom_css = "
        .moody-weather {
            background-color: {$background_color};
        }
        .moody-weather p strong {
            color: {$accent_color};
        }
        .weather-icon svg {
            fill: {$icon_color};
        }
    ";
    wp_add_inline_style('moody-weather-style', wp_strip_all_tags($custom_css)); // Escape CSS
}
add_action('wp_enqueue_scripts', 'moody_weather_enqueue_styles');

// Add settings page
function moody_weather_add_settings_page() {
    add_options_page(
        'Moody Weather Settings',
        'Moody Weather',
        'manage_options',
        'moody-weather-settings',
        'moody_weather_render_settings_page'
    );
}
add_action('admin_menu', 'moody_weather_add_settings_page');

// Render settings page
function moody_weather_render_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html__('Moody Weather Settings', 'moody-weather'); ?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('moody_weather_options_group');
            do_settings_sections('moody-weather-settings');
            submit_button();
            ?>
        </form>
        <p class="form-credits"><?php echo esc_html__('Designed and developed by', 'moody-weather'); ?> <a href="https://devifypro.eu" target="_blank"><?php echo esc_html__('DevifyPro.eu', 'moody-weather'); ?></a></p>
    </div>
    <?php
}

// Register settings
function moody_weather_register_settings() {
    register_setting('moody_weather_options_group', 'moody_weather_options', 'moody_weather_validate_options');
    add_settings_section('moody_weather_main_section', esc_html__('Main Settings', 'moody-weather'), null, 'moody-weather-settings');
    add_settings_field('api_key', esc_html__('OpenWeatherMap API Key', 'moody-weather'), 'moody_weather_api_key_field', 'moody-weather-settings', 'moody_weather_main_section');
    add_settings_field('default_city', esc_html__('Default City', 'moody-weather'), 'moody_weather_default_city_field', 'moody-weather-settings', 'moody_weather_main_section');
    add_settings_field('temperature_unit', esc_html__('Temperature Unit', 'moody-weather'), 'moody_weather_temperature_unit_field', 'moody-weather-settings', 'moody_weather_main_section');
    add_settings_field('background_color', esc_html__('Background Color', 'moody-weather'), 'moody_weather_background_color_field', 'moody-weather-settings', 'moody_weather_main_section');
    add_settings_field('text_color', esc_html__('Text Color', 'moody-weather'), 'moody_weather_text_color_field', 'moody-weather-settings', 'moody_weather_main_section');
    add_settings_field('accent_color', esc_html__('Accent Color', 'moody-weather'), 'moody_weather_accent_color_field', 'moody-weather-settings', 'moody_weather_main_section');
    add_settings_field('icon_color', esc_html__('Icon Color', 'moody-weather'), 'moody_weather_icon_color_field', 'moody-weather-settings', 'moody_weather_main_section');
}
add_action('admin_init', 'moody_weather_register_settings');

// API key field
function moody_weather_api_key_field() {
    $options = get_option('moody_weather_options');
    echo '<input id="api_key" name="moody_weather_options[api_key]" size="40" type="text" value="' . esc_attr($options['api_key']) . '">';
}

// Default city field
function moody_weather_default_city_field() {
    $options = get_option('moody_weather_options');
    echo '<input id="default_city" name="moody_weather_options[default_city]" size="40" type="text" value="' . esc_attr($options['default_city']) . '">';
}

// Temperature unit field
function moody_weather_temperature_unit_field() {
    $options = get_option('moody_weather_options');
    $unit = isset($options['temperature_unit']) ? $options['temperature_unit'] : 'celsius';
    echo '<select id="temperature_unit" name="moody_weather_options[temperature_unit]">
            <option value="celsius" ' . selected($unit, 'celsius', false) . '>' . esc_html__('Celsius', 'moody-weather') . '</option>
            <option value="fahrenheit" ' . selected($unit, 'fahrenheit', false) . '>' . esc_html__('Fahrenheit', 'moody-weather') . '</option>
          </select>';
}

// Background Color Field
function moody_weather_background_color_field() {
    $options = get_option('moody_weather_options');
    $background_color = !empty($options['background_color']) ? $options['background_color'] : 'transparent';
    echo '<input id="background_color" name="moody_weather_options[background_color]" type="text" value="' . esc_attr($background_color) . '">';
}

// Text Color Field
function moody_weather_text_color_field() {
    $options = get_option('moody_weather_options');
    $text_color = !empty($options['text_color']) ? $options['text_color'] : '#333333';
    echo '<input id="text_color" name="moody_weather_options[text_color]" type="text" value="' . esc_attr($text_color) . '">';
}

// Accent Color Field
function moody_weather_accent_color_field() {
    $options = get_option('moody_weather_options');
    $accent_color = !empty($options['accent_color']) ? $options['accent_color'] : '#4a90e2';
    echo '<input id="accent_color" name="moody_weather_options[accent_color]" type="text" value="' . esc_attr($accent_color) . '">';
}

// Icon Color Field
function moody_weather_icon_color_field() {
    $options = get_option('moody_weather_options');
    $icon_color = !empty($options['icon_color']) ? $options['icon_color'] : '#4a90e2';
    echo '<input id="icon_color" name="moody_weather_options[icon_color]" type="text" value="' . esc_attr($icon_color) . '">';
}

// Validate and sanitize options
function moody_weather_validate_options($input) {
    $input['background_color'] = sanitize_text_field($input['background_color']);
    $input['text_color'] = sanitize_text_field($input['text_color']);
    $input['accent_color'] = sanitize_text_field($input['accent_color']);
    $input['icon_color'] = sanitize_text_field($input['icon_color']);
    return $input;
}

// Register shortcode
function moody_weather_shortcode($atts) {
    $atts = shortcode_atts(array(
        'city' => '',
    ), $atts, 'moody_weather');

    $options = get_option('moody_weather_options');
    $api_key = $options['api_key'];
    $city = !empty($atts['city']) ? $atts['city'] : (!empty($options['default_city']) ? $options['default_city'] : 'New York');
    $unit = $options['temperature_unit'];

    $transient_key = 'moody_weather_' . sanitize_title($city);
    $weather_data = get_transient($transient_key);

    if (false === $weather_data) {
        $weather_url = "http://api.openweathermap.org/data/2.5/weather?q=$city&appid=$api_key&units=" . ($unit == 'celsius' ? 'metric' : 'imperial');
        $response = wp_remote_get($weather_url);

        if (is_wp_error($response)) {
            return '<p>' . esc_html__('Sorry, weather data is unavailable.', 'moody-weather') . '</p>';
        }

        $weather_data = json_decode(wp_remote_retrieve_body($response), true);
        set_transient($transient_key, $weather_data, HOUR_IN_SECONDS);
    }

    if ($weather_data && $weather_data['cod'] == 200) {
        $weather_condition = $weather_data['weather'][0]['main'];
        $temperature = $weather_data['main']['temp'];
        $mood = moody_weather_get_mood($weather_condition);
        $icon = moody_weather_get_icon($weather_condition);

        $output = '<div class="moody-weather">';
        $output .= '<strong><p>' . esc_html($city) . '</p></strong>';
        $output .= '<div class="weather-icon">' . wp_kses( $icon, moody_weather_kses_extended_ruleset()) . '</div>';
        $output .= '<p>' . esc_html__('Today\'s Mood:', 'moody-weather') . ' <strong>' . esc_html($mood) . '</strong></p>';
        $output .= '<p>' . esc_html__('Temperature:', 'moody-weather') . ' <strong>' . esc_html($temperature) . '°' . ($unit == 'celsius' ? 'C' : 'F') . '</strong></p>';
        $output .= '</div>';
    } else {
        $output = '<p>' . esc_html__('Sorry, weather data is unavailable for', 'moody-weather') . ' ' . esc_html($city) . '.</p>';
    }

    return $output;
}
add_shortcode('moody_weather', 'moody_weather_shortcode');

function moody_weather_kses_extended_ruleset() {
    $kses_defaults = wp_kses_allowed_html( 'post' );

    $svg_args = array(
        'svg'   => array(
            'class'           => true,
            'aria-hidden'     => true,
            'aria-labelledby' => true,
            'role'            => true,
            'xmlns'           => true,
            'width'           => true,
            'height'          => true,
            'viewbox'         => true,
        ),
        'g'     => array( 'fill' => true ),
        'title' => array( 'title' => true ),
        'path'  => array(
            'd'    => true,
            'fill' => true,
        ),
    );
    return array_merge( $kses_defaults, $svg_args );
}
// Helper function to get mood based on weather condition
function moody_weather_get_mood($weather_condition) {
    switch ($weather_condition) {
        case 'Clear':
            return esc_html__('Happy', 'moody-weather');
        case 'Clouds':
            return esc_html__('Thoughtful', 'moody-weather');
        case 'Rain':
            return esc_html__('Cozy', 'moody-weather');
        case 'Thunderstorm':
            return esc_html__('Excited', 'moody-weather');
        case 'Snow':
            return esc_html__('Playful', 'moody-weather');
        case 'Fog':
            return esc_html__('Mysterious', 'moody-weather');
        case 'Wind':
            return esc_html__('Energetic', 'moody-weather');
        default:
            return esc_html__('Relaxed', 'moody-weather');
    }
}

// Helper function to get SVG icon based on weather condition
function moody_weather_get_icon($weather_condition) {
    $options = get_option('moody_weather_options');
    $icon_color = !empty($options['icon_color']) ? esc_attr($options['icon_color']) : '#4a90e2';

    $icons = array(
        'Clear' => '<svg fill="' .$icon_color. '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48"><path d="M12 2L2 22h20L12 2z"/></svg>',
        'Clouds' => '<svg fill="' .$icon_color. '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48"><path d="M19 12h2a9 9 0 0 0-9-9v2a7 7 0 0 1 7 7zm-8-7v2a7 7 0 0 1 7 7h2a9 9 0 0 0-9-9z"/></svg>',
        'Rain' => '<svg fill="' . $icon_color . '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48"><path d="M12 2L2 22h20L12 2z"/></svg>',
        'Thunderstorm' => '<svg fill="' . $icon_color . '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48"><path d="M12 2L2 22h20L12 2z"/></svg>',
        'Snow' => '<svg fill="' . $icon_color . '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48"><path d="M12 2L2 22h20L12 2z"/></svg>',
        'Fog' => '<svg fill="' . $icon_color . '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48"><path d="M12 2L2 22h20L12 2z"/></svg>',
        'Wind' => '<svg fill="' . $icon_color . '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48"><path d="M12 2L2 22h20L12 2z"/></svg>',
    );
    return $icons[$weather_condition] ?? $icons['Clear'];
}