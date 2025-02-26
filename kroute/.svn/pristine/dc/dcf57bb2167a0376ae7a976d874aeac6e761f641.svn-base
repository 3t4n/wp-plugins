<?php

/*
  Plugin Name: KRoute
  Plugin URI: https://www.kimerikal.com
  Description: A plugin that supply shortcodes to get current dynamic URLs on wordpress editor.
  Author: Kimerikal -Custom software development-
  Author URI: https://www.kimerikal.com
  Version: 1.0
  License: GPLv2
 
  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; version 2 of the License.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.
 */

if (!defined('ABSPATH'))
	exit;

add_shortcode('k_route', 'kimerikalGenerateUrl');

function kimerikalGenerateUrl($atts = array()) {
    shortcode_atts(array('pageid' => 0, 'pageslug' => ''), $atts);

    if (!empty($atts['pageid'])) {
        return get_permalink($atts['pageid']);
    } else if (!empty($atts['pageslug'])) {
        return get_permalink(get_page_by_path($atts['pageslug']));
    }

    return get_site_url();
}
