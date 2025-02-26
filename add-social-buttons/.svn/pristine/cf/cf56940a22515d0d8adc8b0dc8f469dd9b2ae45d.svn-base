<?php

if (!defined('ABSPATH')) exit;

/**
 * Add a new column
 */
function addsocialbuttons_views_column($defaults)
{
    $defaults['shortcode'] = 'Shortcode';
    return $defaults;
}
add_filter('manage_addsocialbuttons_posts_columns', 'addsocialbuttons_views_column');


/**
 * Showing shortcode
 */
function addsocialbuttons_display_views($column_name)
{
    if ($column_name === 'shortcode') {
        $addsocialbuttons_id = get_the_ID();
        echo '[addsocialbuttons id="' . $addsocialbuttons_id . '"]';
    }
}
add_action('manage_addsocialbuttons_posts_custom_column', 'addsocialbuttons_display_views', 5, 2);




