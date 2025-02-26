<?php

/*
Plugin Name: EZ Horoscope
Plugin URI: https://ezhoroscope.com/
Description: EZ Horoscope allows you to create beautiful, engaging horoscopes with daily updates, including advice, guidance, and accurate cosmic influences, all crafted to keep your readers coming back for more.
Version: 1.9
Author: EZHoroscope
Author URI: https://www.enneagramzoom.com/wordpress-plugins/wordpress-horoscope-plugin-instructions/
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/
/*
EZ Horoscope is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

EZ Horoscope is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this plugin. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
Text Domain: ez-horoscope
*/
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}
if ( function_exists( 'ezhp_fs' ) ) {
    ezhp_fs()->set_basename( false, __FILE__ );
} else {
    function ezhp_horoscope_get_license_key() {
        if ( function_exists( 'ezhp_fs' ) && ezhp_fs()->is_premium() ) {
            // Access the license object directly.
            $license = ezhp_fs()->_get_license();
            if ( $license && isset( $license->id ) ) {
                // Extract the license ID.
                $license_id = $license->id;
                // If you need other details like status or expiration, you can extract them here.
                $license_status = $license->status;
                // For example, 'active'
                $license_expiration = ( isset( $license->expiration ) ? $license->expiration : null );
                // Expiration date
                // Return the license ID or other relevant info.
                return $license_id;
            }
        }
        return null;
    }

    if ( !function_exists( 'ezhp_fs' ) ) {
        // Create a helper function for easy SDK access.
        function ezhp_fs() {
            global $ezhp_fs;
            if ( !isset( $ezhp_fs ) ) {
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/vendor/freemius/start.php';
                $ezhp_fs = fs_dynamic_init( array(
                    'id'             => '16865',
                    'slug'           => 'ez-horoscope',
                    'type'           => 'plugin',
                    'public_key'     => 'pk_ebe38fc821365ad3ae083dd5a6efc',
                    'is_premium'     => false,
                    'has_addons'     => false,
                    'has_paid_plans' => true,
                    'trial'          => array(
                        'days'               => 14,
                        'is_require_payment' => true,
                    ),
                    'menu'           => array(
                        'slug'    => 'ez-horoscope-settings',
                        'support' => false,
                        'parent'  => array(
                            'slug' => 'options-general.php',
                        ),
                    ),
                    'is_live'        => true,
                ) );
            }
            return $ezhp_fs;
        }

        // Init Freemius.
        ezhp_fs();
        // Signal that SDK was initiated.
        do_action( 'ezhp_fs_loaded' );
    }
    function ezhp_check_for_shortcode(  $posts  ) {
        if ( empty( $posts ) ) {
            return $posts;
        }
        $shortcode_found = false;
        foreach ( $posts as $post ) {
            if ( stripos( $post->post_content, '[ezhp_ezhoroscope' ) !== false || stripos( $post->post_content, '[ezhp_ezweeklyhoroscope' ) !== false || stripos( $post->post_content, '[ezhp_eznumerology' ) !== false || stripos( $post->post_content, '[ezhp_ezsunsigncompatibility' ) !== false || stripos( $post->post_content, '[ezhp_eztarot_3cardspread' ) !== false ) {
                $shortcode_found = true;
                break;
            }
        }
        if ( $shortcode_found ) {
            ezhp_enqueue_scripts_and_styles();
            // Ensure JS and CSS are enqueued
        }
        return $posts;
    }

    add_filter( 'the_posts', 'ezhp_check_for_shortcode' );
    function ezhp_enqueue_scripts_and_styles() {
        wp_enqueue_style(
            'ez-horoscope-style',
            plugins_url( '/css/horoscope.css', __FILE__ ),
            array(),
            '1.9'
        );
        wp_enqueue_script(
            'ez-horoscope-script',
            plugins_url( '/js/horoscope.js', __FILE__ ),
            array('jquery'),
            '1.9',
            true
        );
    }

    function ezhp_admin_enqueue_styles(  $hook_suffix  ) {
        if ( 'settings_page_ez-horoscope-settings' === $hook_suffix ) {
            ezhp_enqueue_scripts_and_styles();
        }
    }

    add_action( 'admin_enqueue_scripts', 'ezhp_admin_enqueue_styles' );
    // Add a "Settings" link in the plugins page next to the plugin name
    add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'ezhp_horoscope_add_action_links' );
    function ezhp_horoscope_add_action_links(  $links  ) {
        $settings_link = '<a href="options-general.php?page=ez-horoscope-settings">Settings</a>';
        array_push( $links, $settings_link );
        return $links;
    }

    // Hook to add the plugin settings page to the WordPress admin menu
    add_action( 'admin_menu', 'ezhp_horoscope_add_settings_page' );
    // Function to add the settings page under the "Settings" menu
    function ezhp_horoscope_add_settings_page() {
        add_options_page(
            'EZ Horoscope Settings',
            // Page title
            'Horoscope Settings',
            // Menu title
            'manage_options',
            // Capability
            'ez-horoscope-settings',
            // Menu slug
            'ezhp_horoscope_render_settings_page'
        );
    }

    // Function to render the settings page content
    function ezhp_horoscope_render_settings_page() {
        ?>
        <div class="wrap">
            <h1>EZ Horoscope Settings</h1>
            <p>
                <strong>Instructions:</strong> Modify your settings then place the shortcode 
                <code>[ezhp_ezhoroscope sign="zodiacsign" language="languageCode"]</code> wherever you want the horoscope to appear. 
                <br><strong>Example:</strong> <code>[ezhp_ezhoroscope sign="leo" language="en"]</code> 
                <br>For additional instructions, visit: 
                <a href="https://ezhoroscope.com/documentation/" target="_blank">
                https://ezhoroscope.com/documentation/
                </a>
            </p>
            <form method="post" action="options.php" class="settings-form">
                <?php 
        // Output security fields for the registered setting
        settings_fields( 'ezhp_horoscope_settings_group' );
        // Output the settings sections and fields
        do_settings_sections( 'ez-horoscope-settings' );
        // Output save settings button
        submit_button();
        ?>
            </form>
        </div>
        <?php 
    }

    // Hook to initialize the plugin settings
    add_action( 'admin_init', 'ezhp_horoscope_register_settings' );
    function ezhp_horoscope_register_settings() {
        // Register settings
        register_setting( 'ezhp_horoscope_settings_group', 'ezhp_horoscope_background_color', 'ezhp_horoscope_sanitize_hex_color' );
        register_setting( 'ezhp_horoscope_settings_group', 'ezhp_horoscope_font', 'sanitize_text_field' );
        register_setting( 'ezhp_horoscope_settings_group', 'ezhp_horoscope_font_size', 'ezhp_horoscope_sanitize_font_size' );
        register_setting( 'ezhp_horoscope_settings_group', 'ezhp_horoscope_font_color', 'ezhp_horoscope_sanitize_hex_color' );
        register_setting( 'ezhp_horoscope_settings_group', 'ezhp_horoscope_include_backlink', 'ezhp_horoscope_sanitize_checkbox' );
        // Add the settings section
        add_settings_section(
            'ezhp_horoscope_settings_section',
            'Customization Settings',
            null,
            'ez-horoscope-settings'
        );
        // Add settings fields
        add_settings_field(
            'ezhp_horoscope_background_color_field',
            'Background Color',
            'ezhp_horoscope_background_color_field_render',
            'ez-horoscope-settings',
            'ezhp_horoscope_settings_section'
        );
        add_settings_field(
            'ezhp_horoscope_font_field',
            'Font',
            'ezhp_horoscope_font_field_render',
            'ez-horoscope-settings',
            'ezhp_horoscope_settings_section'
        );
        add_settings_field(
            'ezhp_horoscope_font_size_field',
            'Font Size',
            'ezhp_horoscope_font_size_field_render',
            'ez-horoscope-settings',
            'ezhp_horoscope_settings_section'
        );
        // Add settings field for font color
        add_settings_field(
            'ezhp_horoscope_font_color_field',
            'Font Color',
            'ezhp_horoscope_font_color_field_render',
            'ez-horoscope-settings',
            'ezhp_horoscope_settings_section'
        );
        // Sanitization callback for hex color
        function ezhp_horoscope_sanitize_hex_color(  $color  ) {
            // Check if the color is a valid hex code
            if ( preg_match( '/^#[a-fA-F0-9]{6}$/', $color ) ) {
                return $color;
            } else {
                // Return a default color if the input is invalid
                return '#ffffff';
            }
        }

        // Sanitization callback for font size
        function ezhp_horoscope_sanitize_font_size(  $font_size  ) {
            // Allow only numbers and specific units (px, em, %)
            if ( preg_match( '/^\\d+(px|em|%)$/', $font_size ) ) {
                return $font_size;
            } else {
                // Return a default size if the input is invalid
                return '14px';
            }
        }

        // Sanitization callback for checkbox
        function ezhp_horoscope_sanitize_checkbox(  $input  ) {
            // Return true if checkbox is checked, false otherwise
            return ( $input ? true : false );
        }

        add_settings_field(
            'ezhp_horoscope_include_backlink_field',
            'Include Backlink',
            'ezhp_horoscope_include_backlink_field_render',
            'ez-horoscope-settings',
            'ezhp_horoscope_settings_section'
        );
    }

    // Render the "Include Backlink" field in settings
    function ezhp_horoscope_include_backlink_field_render() {
        $include_backlink = get_option( 'ezhp_horoscope_include_backlink', false );
        ?>
        <input type="checkbox" id="ezhp_horoscope_include_backlink" name="ezhp_horoscope_include_backlink" value="1" <?php 
        checked( 1, $include_backlink );
        ?>>
        <label for="ezhp_horoscope_include_backlink">Include a backlink to enneagramzoom.com</label>
        <?php 
    }

    // Render the font field in settings
    function ezhp_horoscope_font_field_render() {
        $font = get_option( 'ezhp_horoscope_font', 'Arial' );
        ?>
        <input type="text" id="ezhp_horoscope_font" name="ezhp_horoscope_font" value="<?php 
        echo esc_attr( $font );
        ?>" class="regular-text">
        <p>Enter the font name for the horoscope text (e.g., Arial, Georgia, Times New Roman).</p>
        <?php 
    }

    // Render the font size field in settings
    function ezhp_horoscope_font_size_field_render() {
        $font_size = get_option( 'ezhp_horoscope_font_size', '14px' );
        ?>
        <input type="text" id="ezhp_horoscope_font_size" name="ezhp_horoscope_font_size" value="<?php 
        echo esc_attr( $font_size );
        ?>" class="regular-text">
        <p>Enter the font size for the horoscope text (e.g., 14px, 16px, 1.2em).</p>
        <?php 
    }

    function ezhp_horoscope_font_color_field_render() {
        $color = get_option( 'ezhp_horoscope_font_color', '#000000' );
        // Default to black if not set
        ?>
        <input type="text" id="ezhp_horoscope_font_color" name="ezhp_horoscope_font_color" value="<?php 
        echo esc_attr( $color );
        ?>" class="color-field">
        <p>Pick a font color using the color picker or enter a hex code (e.g., #000000). <strong>Font colors are only applied to areas with background color other than white.</strong></p>
        <?php 
    }

    // Enqueue the WordPress color picker
    add_action( 'admin_enqueue_scripts', 'ezhp_horoscope_enqueue_color_picker' );
    function ezhp_horoscope_enqueue_color_picker(  $hook_suffix  ) {
        if ( $hook_suffix !== 'settings_page_ez-horoscope-settings' ) {
            return;
        }
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script(
            'ez-horoscope-color-picker',
            plugins_url( 'color-picker.js', __FILE__ ),
            array('wp-color-picker'),
            '1.9',
            true
        );
    }

    // Function to render the background color input field with a color picker
    function ezhp_horoscope_background_color_field_render() {
        $color = get_option( 'ezhp_horoscope_background_color', '#f5eae4' );
        ?>
        <input type="text" id="ezhp_horoscope_background_color" name="ezhp_horoscope_background_color" value="<?php 
        echo esc_attr( $color );
        ?>" class="regular-text color-field">
        <p>Pick a background color using the color picker or enter a hex code (e.g., #f5eae4).</p>
        <?php 
    }

    /// Function to send activation data to the Web API
    function ezhp_track_plugin_activation() {
        // Get the plugin name
        $plugin_name = 'EZ Horoscope Plugin';
        // The name of your plugin
        // Get the full site URL (this will be sent as "DomainName" in the payload)
        $site_url = get_site_url();
        // Prepare the data to send to the Web API
        $activation_data = array(
            'PluginName'        => $plugin_name,
            'DomainName'        => $site_url,
            'DateTimeActivated' => current_time( 'Y-m-d\\TH:i:s' ),
        );
        // Send the data to your .NET Web API endpoint
        $response = wp_remote_post( 'https://www.enneagramzoom.com/api/PluginActivation', array(
            'method'  => 'POST',
            'body'    => wp_json_encode( $activation_data ),
            'headers' => array(
                'Content-Type' => 'application/json',
            ),
            'timeout' => 20,
        ) );
        // Check if the API request was successful
        if ( is_wp_error( $response ) ) {
            // Log the error or handle it accordingly
            //error_log('Plugin activation tracking failed: ' . $response->get_error_message());
        } else {
            // Handle the API response
            $api_response_body = wp_remote_retrieve_body( $response );
            $api_response = json_decode( $api_response_body, true );
            // Check if the response contains the ActivationGuid
            if ( isset( $api_response['activationGuid'] ) ) {
                // Sanitize the ActivationGuid before saving it to the options table
                $sanitized_activation_guid = sanitize_text_field( $api_response['activationGuid'] );
                // Save the sanitized ActivationGuid to the WordPress options table
                update_option( 'ezhp_horoscope_activation_guid', $sanitized_activation_guid );
                // Optionally, you can log or use the ActivationGuid for debugging
                //error_log('Activation GUID saved: ' . $api_response['activationGuid']);
            } else {
                //error_log('Activation GUID not found in the API response.');
            }
        }
    }

    // Register the plugin activation hook
    register_activation_hook( __FILE__, 'ezhp_track_plugin_activation' );
    // Function to display the daily horoscope content via iframe with a dynamic background color, font, font size, and promotional content visibility
    function ezhp_display_horoscope_section(  $atts  ) {
        $atts = shortcode_atts( array(
            'sign'               => 'aquarius',
            'language'           => 'en',
            'top_headline_level' => 'h1',
        ), $atts );
        $zodiac_sign = sanitize_text_field( strtolower( trim( $atts['sign'] ) ) );
        $language = sanitize_text_field( strtolower( trim( $atts['language'] ) ) );
        $top_headline_level = sanitize_text_field( strtolower( trim( $atts['top_headline_level'] ) ) );
        $background_color = get_option( 'ezhp_horoscope_background_color', '' );
        $include_backlink = get_option( 'ezhp_horoscope_include_backlink', false );
        $font = get_option( 'ezhp_horoscope_font', 'Arial' );
        $font_size = get_option( 'ezhp_horoscope_font_size', '14px' );
        $font_color = get_option( 'ezhp_horoscope_font_color', '#000000' );
        // Assuming this is defined elsewhere
        // Freemius license and other checks
        $license_key = ezhp_horoscope_get_license_key();
        $iframe_url = 'https://www.enneagramzoom.com/syndicated/' . $zodiac_sign . '-daily-horoscope';
        // Retrieve the activation GUID from the WordPress options table
        $activation_guid = get_option( 'ezhp_horoscope_activation_guid', '' );
        // Build query parameters
        $query_params = array(
            'language'       => $language,
            'color'          => $background_color,
            'font'           => $font,
            'fontSize'       => $font_size,
            'fontColor'      => $font_color,
            'activationGuid' => $activation_guid,
            'licenseKey'     => $license_key,
        );
        // Append all query parameters to the URL
        foreach ( $query_params as $key => $value ) {
            if ( !empty( $value ) ) {
                $iframe_url = add_query_arg( $key, urlencode( $value ), $iframe_url );
            }
        }
        // Prepare the backlink HTML
        $link_url = 'https://www.enneagramzoom.com/horoscope/' . $zodiac_sign . '-horoscope-today/';
        $link_text = ucfirst( $zodiac_sign ) . ' daily horoscope';
        $backlink_html = '';
        if ( $include_backlink ) {
            $backlink_html = '<div class="backlink-container">
                <a href="' . esc_url( $link_url ) . '" target="_blank">' . esc_html( $link_text ) . '</a> by enneagramzoom.com
            </div>';
        }
        // Return the iframe and any additional HTML
        return '
            <iframe id="syndicated-horoscope-iframe" src="' . esc_url( $iframe_url ) . '" width="100%" frameborder="0"></iframe>
            ' . $backlink_html;
    }

    // Register the shortcode [ezhp_ezhoroscope sign="zodiac_sign"]
    add_shortcode( 'ezhp_ezhoroscope', 'ezhp_display_horoscope_section' );
    // Function to display the weekly horoscope content via iframe with a dynamic background color, font, font size, and promotional content visibility
    function ezhp_display_weekly_horoscope_section(  $atts  ) {
        $atts = shortcode_atts( array(
            'sign'     => 'aquarius',
            'language' => 'en',
        ), $atts );
        $zodiac_sign = sanitize_text_field( strtolower( trim( $atts['sign'] ) ) );
        $language = sanitize_text_field( strtolower( trim( $atts['language'] ) ) );
        $background_color = get_option( 'ezhp_horoscope_background_color', '' );
        $include_backlink = get_option( 'ezhp_horoscope_include_backlink', false );
        $font = get_option( 'ezhp_horoscope_font', 'Arial' );
        $font_size = get_option( 'ezhp_horoscope_font_size', '14px' );
        // Retrieve the Freemius license key using the helper function
        $license_key = ezhp_horoscope_get_license_key();
        $iframe_url = 'https://www.enneagramzoom.com/syndicated/' . $zodiac_sign . '-weekly-horoscope-syndicated';
        // Retrieve the activation GUID from the WordPress options table
        $activation_guid = get_option( 'ezhp_horoscope_activation_guid', '' );
        // Add the license key as a query parameter if it exists
        if ( $license_key ) {
            $iframe_url = add_query_arg( 'licenseKey', urlencode( $license_key ), $iframe_url );
        }
        // Add the activation GUID as a query parameter if it exists
        if ( $activation_guid ) {
            $iframe_url = add_query_arg( 'activationGuid', urlencode( $activation_guid ), $iframe_url );
        }
        // Add the language as a query parameter if specified
        if ( !empty( $language ) ) {
            $iframe_url = add_query_arg( 'language', urlencode( $language ), $iframe_url );
        }
        if ( !empty( $background_color ) ) {
            $iframe_url = add_query_arg( 'color', urlencode( $background_color ), $iframe_url );
        }
        if ( !empty( $font ) ) {
            $iframe_url = add_query_arg( 'font', urlencode( $font ), $iframe_url );
        }
        if ( !empty( $font_size ) ) {
            $iframe_url = add_query_arg( 'fontSize', urlencode( $font_size ), $iframe_url );
        }
        $link_url = 'https://www.enneagramzoom.com/horoscope/' . $zodiac_sign . '-horoscope-today/';
        $link_text = ucfirst( $zodiac_sign ) . ' weekly horoscope';
        $backlink_html = '';
        if ( $include_backlink ) {
            $backlink_html = '<div class="backlink-container">
                <a href="' . esc_url( $link_url ) . '" target="_blank">' . esc_html( $link_text ) . '</a> by enneagramzoom.com
            </div>';
        }
        return '
        <iframe id="syndicated-horoscope-iframe" src="' . esc_url( $iframe_url ) . '" width="100%" frameborder="0"></iframe>
        ' . $backlink_html;
    }

    //end weekly horoscope function
    add_shortcode( 'ezhp_ezweeklyhoroscope', 'ezhp_display_weekly_horoscope_section' );
    //End SunSignCompatibility Block
}