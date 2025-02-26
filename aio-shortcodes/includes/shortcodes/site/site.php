<?php

/**
* Shortcode: [aio_site_title]
* Description: Displays the site title from WordPress settings.
* Example usage: [aio_site_title]
*/
function aiosc_site_title_shortcode() {
// Get the site title from WordPress settings
$site_title = get_bloginfo('name');

// Output the site title
return $site_title;
}

// Register the shortcode
add_shortcode('aio_site_title', 'aiosc_site_title_shortcode');


/**
* Shortcode: [aio_site_tagline]
* Description: Displays the tagline from WordPress settings.
* Example usage: [aio_site_tagline]
*/
function aiosc_site_tagline_shortcode() {
// Get the site tagline from WordPress settings
$site_tagline = get_bloginfo('description');

// Output the site tagline
return $site_tagline;
}

// Register the shortcode
add_shortcode('aio_site_tagline', 'aiosc_site_tagline_shortcode');


/**
* Shortcode: [aio_site_url]
* Description: Displays the Site URL of the site as a clickable link.
* Example usage: [aio_site_url link="yes" new_window="yes"]
*/
function aiosc_site_url_shortcode($atts) {
// Set default attribute values
$atts = shortcode_atts(array(
'link' => 'yes', // Default value is 'yes'
'new_window' => 'no', // Default value is 'no'
), $atts);

// Get the homepage URL of the site
$home_url = home_url('/');

// Check if 'link' attribute is set to 'yes' and construct the link accordingly
if ($atts['link'] === 'yes') {
$link = '<a href="' . esc_url($home_url) . '"';

// Check if 'new_window' attribute is set to 'yes' and add the target="_blank" attribute
if ($atts['new_window'] === 'yes') {
$link .= ' target="_blank"';
}

$link .= '>' . esc_url($home_url) . '</a>';

return $link;
}

// If 'link' attribute is not set to 'yes', just return the URL
return esc_url($home_url);
}

// Register the shortcode
add_shortcode('aio_site_url', 'aiosc_site_url_shortcode');


/**
* Shortcode: [aio_home_url]
* Description: Displays the homepage URL of the site as a clickable link.
* Example usage: [aio_home_url link="yes" new_window="yes"]
*/
function aiosc_home_url_shortcode($atts) {
// Set default attribute values
$atts = shortcode_atts(array(
'link' => 'yes', // Default value is 'yes'
'new_window' => 'no', // Default value is 'no'
), $atts);

// Get the homepage URL of the site
$home_url = home_url('/');

// Check if 'link' attribute is set to 'yes' and construct the link accordingly
if ($atts['link'] === 'yes') {
$link = '<a href="' . esc_url($home_url) . '"';

// Check if 'new_window' attribute is set to 'yes' and add the target="_blank" attribute
if ($atts['new_window'] === 'yes') {
$link .= ' target="_blank"';
}

$link .= '>' . esc_url($home_url) . '</a>';

return $link;
}

// If 'link' attribute is not set to 'yes', just return the URL
return esc_url($home_url);
}

// Register the shortcode
add_shortcode('aio_home_url', 'aiosc_home_url_shortcode');





/**
 * Shortcode: [aio_site_icon]
 * Description: Displays the site icon (favicon) of the WordPress site with customizable alt text and size.
 * Example usage: [aio_site_icon size="32" class="site-icon" no_icon_text="Custom message when no icon is set." alt_text="Your Custom Alt Text"]
 */
function aiosc_shortcode_site_icon($atts)
{
    // Set default attributes
    $atts = shortcode_atts(array(
        'size' => '32',                // Default size of the site icon
        'class' => '',                 // CSS class for the site icon
        'no_icon_text' => 'No site icon set.', // Default message when no site icon is available
        'alt_text' => 'Site Icon',     // Default alt text for the site icon image
    ), $atts);

    // Get the site icon URL
    $site_icon_url = get_site_icon_url($atts['size']);

    // If the site icon exists, display it with the alt text
    if ($site_icon_url) {
        return '<img class="' . esc_attr($atts['class']) . '" src="' . esc_url($site_icon_url) . '" alt="' . esc_attr($atts['alt_text']) . '" width="' . esc_attr($atts['size']) . '" height="' . esc_attr($atts['size']) . '" />';
    }

    // If no site icon is set, display custom message or default message
    return '<span>' . esc_html($atts['no_icon_text']) . '</span>';
}

add_shortcode('aio_site_icon', 'aiosc_shortcode_site_icon');
