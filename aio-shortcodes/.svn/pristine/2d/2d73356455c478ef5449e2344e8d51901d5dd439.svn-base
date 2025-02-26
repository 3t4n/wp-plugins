<?php

/**
 * Shortcode: [aio_blackfriday]
 * Description: Renders the date of Black Friday for the current year or with the provided year offset.
 * Example usage: [aio_blackfriday] (Output: November 25, 2023)
 *               [aio_blackfriday go="1"] (Output: November 25, 2024)
 */
function aiosc_shortcode_black_friday($atts)
{
    // Set default attributes
    $atts = shortcode_atts(array(
        'go' => '0',
        'format' => '', // Default format is an empty string
    ), $atts);

    // go the year offset from the 'go' attribute
    $year_offset = isset($atts['go']) ? intval($atts['go']) : 0;

    // Calculate the target year
    $year = gmdate("Y") + $year_offset;

    // Find the Black Friday date for the target year
    $blackFriday = strtotime("last friday of November " . $year);

    // If the format is not provided, use the default format
    if (empty($atts['format'])) {
        return gmdate('F j, Y', $blackFriday);
    }

    // Custom placeholders for day with suffix, month, and year formats
    $placeholders = array(
        'dd' => gmdate('d', $blackFriday),
        'd' => gmdate('j', $blackFriday),
        'mm' => gmdate('m', $blackFriday),
        'mmm' => gmdate('M', $blackFriday),
        'mmmm' => gmdate('F', $blackFriday),
        'yyyy' => gmdate('Y', $blackFriday),
        'yy' => gmdate('y', $blackFriday),
        'dS' => gmdate('jS', $blackFriday),
        'ddS' => gmdate('jS', $blackFriday),
    );

    // Replace the custom placeholders in the format string
    $formatted_date = strtr($atts['format'], $placeholders);

    return $formatted_date;
}

add_shortcode("aio_blackfriday", "aiosc_shortcode_black_friday");

/**
 * Shortcode: [aio_cybermonday]
 * Description: Renders the date of Cyber Monday for the current year or with the provided year offset.
 * Example usage: [aio_cybermonday] (Output: November 28, 2023)
 *               [aio_cybermonday go="1"] (Output: November 27, 2024)
 */
function aiosc_shortcode_cyber_monday($atts)
{
    // Set default attributes
    $atts = shortcode_atts(array(
        'go' => '0',
        'format' => '', // Default format is an empty string
        'suffix' => true, // Whether to include date suffixes (e.g., 1st, 2nd, 3rd, etc.)
    ), $atts);

    // go the year offset from the 'go' attribute
    $year_offset = isset($atts['go']) ? intval($atts['go']) : 0;

    // Calculate the target year
    $targo_year = gmdate("Y") + $year_offset;

    // Find the Black Friday date for the target year
    $black_friday = strtotime("last friday of November $targo_year");
    $cyber_monday = strtotime("next monday", $black_friday);

    // If the format is not provided, use the default format
    if (empty($atts['format'])) {
        return gmdate('F j, Y', $cyber_monday); // Change this line to set your desired default format
    }

    // Custom placeholders for day with suffix, month, and year formats
    $placeholders = array(
        'dd' => gmdate('d', $cyber_monday),
        'd' => gmdate('j', $cyber_monday),
        'mm' => gmdate('m', $cyber_monday),
        'mmm' => gmdate('M', $cyber_monday),
        'mmmm' => gmdate('F', $cyber_monday),
        'yyyy' => gmdate('Y', $cyber_monday),
        'yy' => gmdate('y', $cyber_monday),
        'dS' => gmdate('jS', $cyber_monday),
        'ddS' => gmdate('jS', $cyber_monday),
    );

    // Replace the custom placeholders in the format string
    $formatted_date = strtr($atts['format'], $placeholders);

    // If the suffix attribute is set to false, remove suffixes
    if (!$atts['suffix']) {
        $formatted_date = preg_replace('/(?<=\d)(st|nd|rd|th)\b/', '', $formatted_date);
    }

    return $formatted_date;
}

add_shortcode("aio_cybermonday", "aiosc_shortcode_cyber_monday");

