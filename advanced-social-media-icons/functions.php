<?php
/*
Plugin Name: Advanced Social Media Icons
Plugin URI: https://riotweb.nl
Description: Plugin for Wordpress that shows social media icons.
Version: 1.2
Author: RiotWeb
Author URI: https://riotweb.nl/plugins/
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Advanced Social Media Icons is free software: you can modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation.
Advanced Social Media Icons is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
It's not allowed to sell this product to others!
*/


/* Do not access this file directly */
if (!defined('WPINC')) {
    die;
}

/* === Shortcodes === */
function social_shortcode($atts)
{
    extract(shortcode_atts(array(
        'url' => '#',
        'src' => 'wordpress',
        'id' => '',
        'height' => '55px',
        'width' => '55px',
        'align' => 'left',
        'alt' => 'Advanced Social Media Icons'
    ), $atts));
    return '<a href=' . $url . '><img src="https://riotweb.nl/images/'. $src . '' . $id . '.png" width="' . $width . '" height="' . $height . '" align="' . $align . '" alt="' . $alt . '" > ';
}
add_shortcode('social', 'social_shortcode');
//[social url=twitter.com src=twitter]

/* Allow you to embed shortcodes within other shortcodes. */
add_filter('the_content', 'do_shortcode');
/* Allow you to add shortcodes to widgets. */
add_filter('widget_text', 'do_shortcode');