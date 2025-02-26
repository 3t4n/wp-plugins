<?php
/*
Plugin Name: Html Content Shortcode
Description: This plugin takes html input in the backend and displays the html as it is in the frontend using the shortcode [hcs_html_content]
Version: 1.0.0
License: GPLv2 or later
Author: Sourav Jha
Author URI: https://www.epiphanyinfotech.com/
Author Description: This is just a basic plugin to understand the concept of plugin development. 
*/

if (!defined("ABSPATH")) {
    die("No direct script access allowed");
}

add_action("admin_menu", "hcs46238_admin_menu");
add_action("admin_init", "hcs46238_settings_init");

function hcs46238_admin_menu()
{
    add_menu_page(
        "HCS Generate Html", // Page title
        "HCS Generate Html", // Menu title
        "manage_options", // Capability
        "hcs46238-text-settings", // Menu slug
        "hcs46238_text_settings_page", // Function to display the page content
        "dashicons-admin-generic", // Icon URL
        6 // Position
    );
}

function hcs46238_sanitize_function($input)
{
    $option = wp_kses(
        wp_unslash($input),
        hcs46238_getAllowedTags()
    );
    return $option;
}

function hcs46238_settings_init()
{
    register_setting(
        "hcs46238_settings_group",
        "hcs46238_text",
        'hcs46238_sanitize_function'
    );

    add_settings_section(
        "hcs46238_settings_section", // ID
        "Generate Html Section", // Title
        "hcs46238_settings_section_callback", // Callback
        "hcs46238-settings" // Page
    );
    add_settings_field(
        "hcs46238_text", // ID
        "Generate Html Code", // Title
        "hcs46238_text_render", // Callback
        "hcs46238-settings", // Page
        "hcs46238_settings_section" // Section
    );
}

function hcs46238_settings_section_callback()
{
    echo "Edit your Html Code:";
}

// Render the input field
function hcs46238_text_render()
{
    $options = get_option("hcs46238_text"); ?>
    <textarea type="text" name="hcs46238_text" id="hcs46238_editor">
        <?php echo isset($options) ? esc_attr($options) : ""; ?>
    </textarea>
<?php
}

// Function to display the settings page
function hcs46238_text_settings_page()
{
?>

    <div class="wrap">
        <h1>Generate Html Code</h1>
        <form action="javascript:void(0)" method="post" id="hcs46238_setting_form">
            <?php
            settings_fields("hcs46238_settings_group"); // Output security fields
            do_settings_sections("hcs46238-settings"); // Output settings sections
            submit_button(); // Output save settings button
            ?>
        </form>
    </div>
<?php
}

add_action("wp_ajax_hcs46238_option", "hcs46238_ajax_option");
function hcs46238_ajax_option()
{
    if (isset($_POST["hcs46238_text"])) {
        $option = wp_kses(
            wp_unslash($_POST["hcs46238_text"]),
            hcs46238_getAllowedTags()
        );

        if (isset($_POST["_wpnonce"])) {
            wp_verify_nonce(
                sanitize_text_field(wp_unslash($_POST["_wpnonce"]))
            );
        } else {
            wp_send_json_error(0);
        }
        $result = update_option("hcs46238_text", $option);
        if ($result > 0) {
            wp_send_json_success($result);
        } else {
            wp_send_json_error($result);
        }
    } else {
        wp_send_json_error(0);
    }
}

function hcs46238_add_custom_scripts()
{
    wp_enqueue_style(
        "hcs-ckeditor-css",
        esc_url(plugins_url("vendor/ckeditor5/ckeditor5/ckeditor5.css", __FILE__)),
        null,
        "43.2.0",
        false
    );
    wp_enqueue_script(
        "hcs46238-custom-js",
        esc_url(plugins_url("js/hcs-custom.min.js", __FILE__)),
        ["jquery"],
        1.0,
        true
    );
    wp_add_inline_script(
        "hcs46238-custom-js",
        'var hcs46238_admin_ajax_link = "' . esc_url(admin_url("admin-ajax.php")) . '";',
        "before"
    );

    add_filter('script_loader_tag', function ($tag, $handle) {
        if ('hcs46238-custom-js' === $handle) {
            return str_replace(' src', ' type="module" src', $tag);
        }
        return $tag;
    }, 10, 2);
}
add_action("admin_enqueue_scripts", "hcs46238_add_custom_scripts");

add_filter("kses_allowed_protocols", function ($protocols) {
    $protocols[] = "data";

    return $protocols;
});
add_filter("safe_style_css", function ($styles) {
    $styles[] = "background-color";
    return $styles;
});

add_shortcode("hcs_html_content", "hcs46238_html_content");
function hcs46238_html_content()
{
    $option = wp_kses(
        wp_unslash(get_option("hcs46238_text")),
        hcs46238_getAllowedTags()
    );
    return $option;
}

function hcs46238_getAllowedTags()
{
    $allowed_tags = [
        "p" => [],
        "b" => [],
        "i" => [],
        "em" => [],
        "strong" => [],
        "a" => [
            "href" => [],
            "title" => [],
        ],
        "ul" => [],
        "ol" => [],
        "li" => [],
        "img" => [
            "src" => [],
            "alt" => [],
            "title" => [],
            "width" => [],
            "height" => [],
            "style" => [],
        ],
        "figure" => [
            "class" => [],
            "style" => [],
        ],
        "table" => [
            "class" => [],
            "style" => [],
        ],
        "tr" => [],
        "td" => [
            "style" => [],
        ],
        "th" => [],
        "span" => [
            "style" => [],
            "class" => [],
        ],
    ];
    return $allowed_tags;
}
