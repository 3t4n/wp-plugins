<?php

/*
 *
 *	Plugin Name: Moon Phases
 *	Plugin URI: http://www.joeswebtools.com/wordpress-plugins/moon-phases/
 *	Description: Adds a sidebar widget that display the current moon phase.
 *	Version: 3.1.1
 *	Author: Joe's Web Tools
 *	Author URI: http://www.joeswebtools.com/
 *
 *	Copyright (c) 2009-2014 Joe's Web Tools. All Rights Reserved.
 *
 *	This program is free software; you can redistribute it and/or modify
 *	it under the terms of the GNU General Public License as published by
 *	the Free Software Foundation; either version 2 of the License, or
 *	(at your option) any later version.
 *
 *	This program is distributed in the hope that it will be useful,
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *	GNU General Public License for more details.
 *
 *	You should have received a copy of the GNU General Public License
 *	along with this program; if not, write to the Free Software
 *	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 *
 *	If you are unable to comply with the terms of this license,
 *	contact the copyright holder for a commercial license.
 *
 *	We kindly ask that you keep links to Joe's Web Tools so
 *	other people can find out about this plugin.
 *
 */





/*
 *
 *	moon_phases_get_plugin_url
 *
 */

function moon_phases_get_plugin_url() {
	return trailingslashit(plugins_url(basename(dirname(__FILE__))));
}





/*
 *
 *	moon_phases_normalize
 *
 */

function moon_phases_normalize($v) {
	$v -= floor($v);
	if($v < 0) {
		$v += 1;
	}
	return $v;
}





/*
 *
 *	moon_phases_shortcode_handler
 *
 */

function moon_phases_shortcode_handler($atts, $content = nul) {

	// Load language file
	$current_locale = get_locale();
	if(!empty($current_locale)) {
		$mo_file = dirname(__FILE__) . '/languages/moon-phases-' . $current_locale . ".mo";
		if(@file_exists($mo_file) && is_readable($mo_file)) {
			load_textdomain('moon-phases', $mo_file);
		}
	}

	// Get date
	$y = date('Y');
	$m = date('n');
	$d = date('j');

	// Calculate julian day
	$yy = $y - floor((12 - $m) / 10);
	$mm = $m + 9;
	if($mm >= 12) {
		$mm = $mm - 12;
	}

	$k1 = floor(365.25 * ($yy + 4712));
	$k2 = floor(30.6 * $mm + 0.5);
	$k3 = floor(floor(($yy / 100) + 49) * 0.75) - 38;

	$jd = $k1 + $k2 + $d + 59;
	if($jd > 2299160) {
		$jd = $jd - $k3;
	}
	
	// Calculate the moon phase
	$ip = moon_phases_normalize(($jd - 2451550.1) / 29.530588853);
	$ag = $ip * 29.53;

	if($ag < 1.84566) {
		$phase = __('New Moon', 'moon-phases');
		$image = moon_phases_get_plugin_url() . 'images/new_moon.png';
	}
   	else if($ag < 5.53699) {
		$phase = __('Waxing Crescent Moon', 'moon-phases');
		$image = moon_phases_get_plugin_url() . 'images/waxing_crescent_moon.png';
	}
	else if($ag < 9.22831) {
		$phase = __('First Quarter Moon', 'moon-phases');
		$image = moon_phases_get_plugin_url() . 'images/first_quarter_moon.png';
	}
	else if($ag < 12.91963) {
		$phase = __('Waxing Gibbous Moon', 'moon-phases');
		$image = moon_phases_get_plugin_url() . 'images/waxing_gibbous_moon.png';
	}
	else if($ag < 16.61096) {
		$phase = __('Full Moon', 'moon-phases');
		$image = moon_phases_get_plugin_url() . 'images/full_moon.png';
	}
	else if($ag < 20.30228) {
		$phase = __('Waning Gibbous Moon', 'moon-phases');
		$image = moon_phases_get_plugin_url() . 'images/waning_gibbous_moon.png';
	}
	else if($ag < 23.99361) {
		$phase = __('Third Quarter Moon', 'moon-phases');
		$image = moon_phases_get_plugin_url() . 'images/third_quarter_moon.png';
	}
	else if($ag < 27.68493) {
		$phase = __('Waning Crescent Moon', 'moon-phases');
		$image = moon_phases_get_plugin_url() . 'images/waning_crescent_moon.png';
	}
	else {
		$phase = __('New Moon', 'moon-phases');
		$image = moon_phases_get_plugin_url() . 'images/new_moon.png';
	}

	// Convert phase to radians
	$ip = $ip * 2 * pi();

	// Calculate moon's distance
	$dp = 2 * pi() * moon_phases_normalize(($jd - 2451562.2) / 27.55454988);
	$di = 60.4 - 3.3 * cos($dp) - 0.6 * cos(2 * $ip - $dp) - 0.5 * cos(2 * $ip);

	// Calculate moon's ecliptic latitude
	$np = 2 * pi() * moon_phases_normalize(($jd - 2451565.2) / 27.212220817);
	$la = 5.1 * sin($np);

	// Calculate moon's ecliptic longitude
	$rp = moon_phases_normalize(($jd - 2451555.8) / 27.321582241);
	$lo = 360 * $rp + 6.3 * sin($dp) + 1.3 * sin(2 * $ip - $dp) + 0.7 * sin(2 * $ip);

	// Calculate zodiac sign
	if($lo < 30) {
		$zodiac = __('Aries', 'moon-phases');
	}
	else if($lo < 60) {
		$zodiac = __('Taurus', 'moon-phases');
	}
	else if($lo < 90) {
		$zodiac = __('Gemini', 'moon-phases');
	}
	else if($lo < 120) {
		$zodiac = __('Cancer', 'moon-phases');
	}
	else if($lo < 150) {
		$zodiac = __('Leo', 'moon-phases');
	}
	else if($lo < 180) {
		$zodiac = __('Virgo', 'moon-phases');
	}
	else if($lo < 210) {
    	$zodiac = __('Libra', 'moon-phases');
	}
    else if($lo < 240) {
    	$zodiac = __('Scorpio', 'moon-phases');
	}
    else if($lo < 270) {
    	$zodiac = __('Sagittarius', 'moon-phases');
	}
    else if($lo < 300) {
    	$zodiac = __('Capricorn', 'moon-phases');
    }
	else if($lo < 330) {
		$zodiac = __('Aquarius', 'moon-phases');
	}
	else {
		$zodiac = __('Pisces', 'moon-phases');
	}

	// Age
	$age = floor($ag);

	// Distance
	$distance = round(100 * $di) / 100;

	// Ecliptic latitude
	$latitude = round(100 * $la) / 100;

	// Ecliptic longitude
	$longitude = round(100 * $lo) / 100;
	if($longitude > 360) {
		$longitude -= 360;
	}

	$content = '<table style="border-width: thin thin thin thin; border-style: solid solid solid solid;">';
	$content .= '<thead><tr><th><center><font face="arial" size="+1"><b>' . __('Current Moon Phase', 'moon-phases') . '</b></center></font></th></tr></thead>';
	$content .= '<tbody><tr><td>';

	$content .= '<br />';
	$content .= '<center><img src="' . $image . '" alt="' . $phase . '" title="' . $phase . '" width="128" height="128" /></center>';
	$content .= '<center><b>' . $phase . '</b></center>';

	$content .= '<br />';

	$content .= '<center>';
	$content .= sprintf(__('The moon is currently in %s', 'moon-phases'), $zodiac);
	$content .= '</center>';

	$content .= '<center>';
	$content .= sprintf(__ngettext('The moon is %d day old', 'The moon is %d days old', $age, 'moon-phases'), $age);
	$content .= '</center>';

	$content .= '</td></tr></tbody>';
	$content .= '<tfoot><tr><td><div style="text-align: right;"><font face="arial" size="-3"><a href="http://www.joeswebtools.com/wordpress-plugins/moon-phases/">Joe\'s</a></font></div></td></tr></tfoot>';
	$content .= '</table>';

	return $content;
}





/*
 *
 *	WP_Widget_Moon_Phases
 *
 */

class WP_Widget_Moon_Phases extends WP_Widget {

	function WP_Widget_Moon_Phases() {

		parent::WP_Widget(false, $name = 'Moon Phases');
	}

	function widget($args, $instance) {

		// Load language file
		$current_locale = get_locale();
		if(!empty($current_locale)) {
			$mo_file = dirname(__FILE__) . '/languages/moon-phases-' . $current_locale . ".mo";
			if(@file_exists($mo_file) && is_readable($mo_file)) {
				load_textdomain('moon-phases', $mo_file);
			}
		}

		// Get options
		extract($args);
		$option_title = apply_filters('widget_title', empty($instance['title']) ? __('Current Moon Phase', 'moon-phases') : $instance['title']);
		$option_zodiac = $instance['zodiac'] ? '1' : '0';
		$option_age = $instance['age'] ? '1' : '0';
		$option_details = $instance['details'] ? '1' : '0';

		// Help widget to conform to the active theme: before_widget, before_title and after_title
		echo $before_widget;
		echo $before_title . $option_title . $after_title;

		// Get date
		$y = date('Y');
		$m = date('n');
		$d = date('j');

		// Calculate julian day
		$yy = $y - floor((12 - $m) / 10);
		$mm = $m + 9;
		if($mm >= 12) {
			$mm = $mm - 12;
		}

		$k1 = floor(365.25 * ($yy + 4712));
		$k2 = floor(30.6 * $mm + 0.5);
		$k3 = floor(floor(($yy / 100) + 49) * 0.75) - 38;

		$jd = $k1 + $k2 + $d + 59;
		if($jd > 2299160) {
			$jd = $jd - $k3;
		}
	
		// Calculate the moon phase
		$ip = moon_phases_normalize(($jd - 2451550.1) / 29.530588853);
		$ag = $ip * 29.53;

		if($ag < 1.84566) {
			$phase = __('New Moon', 'moon-phases');
			$image = moon_phases_get_plugin_url() . 'images/new_moon.png';
		}
    	else if($ag < 5.53699) {
	    	$phase = __('Waxing Crescent Moon', 'moon-phases');
			$image = moon_phases_get_plugin_url() . 'images/waxing_crescent_moon.png';
	    }
    	else if($ag < 9.22831) {
			$phase = __('First Quarter Moon', 'moon-phases');
			$image = moon_phases_get_plugin_url() . 'images/first_quarter_moon.png';
		}
		else if($ag < 12.91963) {
			$phase = __('Waxing Gibbous Moon', 'moon-phases');
			$image = moon_phases_get_plugin_url() . 'images/waxing_gibbous_moon.png';
		}
		else if($ag < 16.61096) {
			$phase = __('Full Moon', 'moon-phases');
			$image = moon_phases_get_plugin_url() . 'images/full_moon.png';
		}
		else if($ag < 20.30228) {
			$phase = __('Waning Gibbous Moon', 'moon-phases');
			$image = moon_phases_get_plugin_url() . 'images/waning_gibbous_moon.png';
		}
		else if($ag < 23.99361) {
			$phase = __('Third Quarter Moon', 'moon-phases');
			$image = moon_phases_get_plugin_url() . 'images/third_quarter_moon.png';
		}
		else if($ag < 27.68493) {
			$phase = __('Waning Crescent Moon', 'moon-phases');
			$image = moon_phases_get_plugin_url() . 'images/waning_crescent_moon.png';
		}
		else {
			$phase = __('New Moon', 'moon-phases');
			$image = moon_phases_get_plugin_url() . 'images/new_moon.png';
		}

		// Convert phase to radians
		$ip = $ip * 2 * pi();

		// Calculate moon's distance
		$dp = 2 * pi() * moon_phases_normalize(($jd - 2451562.2) / 27.55454988);
		$di = 60.4 - 3.3 * cos($dp) - 0.6 * cos(2 * $ip - $dp) - 0.5 * cos(2 * $ip);

		// Calculate moon's ecliptic latitude
		$np = 2 * pi() * moon_phases_normalize(($jd - 2451565.2) / 27.212220817);
		$la = 5.1 * sin($np);

		// Calculate moon's ecliptic longitude
		$rp = moon_phases_normalize(($jd - 2451555.8) / 27.321582241);
		$lo = 360 * $rp + 6.3 * sin($dp) + 1.3 * sin(2 * $ip - $dp) + 0.7 * sin(2 * $ip);

		// Calculate zodiac sign
		if($lo < 30) {
			$zodiac = __('Aries', 'moon-phases');
		}
		else if($lo < 60) {
			$zodiac = __('Taurus', 'moon-phases');
		}
		else if($lo < 90) {
			$zodiac = __('Gemini', 'moon-phases');
		}
		else if($lo < 120) {
			$zodiac = __('Cancer', 'moon-phases');
		}
		else if($lo < 150) {
			$zodiac = __('Leo', 'moon-phases');
		}
		else if($lo < 180) {
			$zodiac = __('Virgo', 'moon-phases');
		}
		else if($lo < 210) {
    		$zodiac = __('Libra', 'moon-phases');
		}
    	else if($lo < 240) {
    		$zodiac = __('Scorpio', 'moon-phases');
	    }
    	else if($lo < 270) {
    		$zodiac = __('Sagittarius', 'moon-phases');
	    }
    	else if($lo < 300) {
    		$zodiac = __('Capricorn', 'moon-phases');
    	}
	    else if($lo < 330) {
			$zodiac = __('Aquarius', 'moon-phases');
	    }
		else {
			$zodiac = __('Pisces', 'moon-phases');
		}

		// Age
		$age = floor($ag);

		// Distance
		$distance = round(100 * $di) / 100;

		// Ecliptic latitude
		$latitude = round(100 * $la) / 100;

		// Ecliptic longitude
		$longitude = round(100 * $lo) / 100;
		if($longitude > 360) {
			$longitude -= 360;
		}

		// Display
		echo '<br />';
		echo '<center><img src="' . $image . '" alt="' . $phase . '" title="' . $phase . '" width="128" height="128" /></center>';
		echo '<center><b>' . $phase . '</b></center>';

		if(($option_zodiac) || ($option_age)) {
			echo '<br />';
		}

		if($option_zodiac) {
			echo '<center>';
			printf(__('The moon is currently in %s', 'moon-phases'), $zodiac);
			echo '</center>';
		}

		if($option_age) {
			echo '<center>';
			printf(__ngettext('The moon is %d day old', 'The moon is %d days old', $age, 'moon-phases'), $age);
			echo '</center>';
		}

		if($option_details) {
			echo '<br />';
			printf(__('Distance: %d earth radii', 'moon-phases'), $distance);
			echo '<br />';
			printf(__('Ecliptic latitude: %d degrees', 'moon-phases'), $latitude);
			echo '<br />';
			printf(__('Ecliptic longitude: %d degrees', 'moon-phases'), $longitude);
			echo '<br />';
		}

		echo '<div style="text-align: right;"><font face="arial" size="-3"><a href="http://www.joeswebtools.com/wordpress-plugins/moon-phases/">Joe\'s</a></font></div>';

		echo $after_widget;
	}

	function update($new_instance, $old_instance) {

		return $new_instance;
	}

	function form($instance) {

		// Load language file
		$current_locale = get_locale();
		if(!empty($current_locale)) {
			$mo_file = dirname(__FILE__) . '/languages/moon-phases-' . $current_locale . ".mo";
			if(@file_exists($mo_file) && is_readable($mo_file)) {
				load_textdomain('moon-phases', $mo_file);
			}
		}

		// Get options
		$instance = wp_parse_args((array)$instance, array('title' => __('Current Moon Phase', 'moon-phases'), 'zodiac' => 1, 'age' => 1, 'details' => 0));
		$option_title = strip_tags($instance['title']);
		$option_zodiac = $instance['zodiac'] ? 'checked="checked"' : '';
		$option_age = $instance['age'] ? 'checked="checked"' : '';
		$option_details = $instance['details'] ? 'checked="checked"' : '';

		// Display form
		echo '<p>';
		echo 	'<label for="' . $this->get_field_id('title') . '">' . __('Title: ', 'moon-phases') . '</label>';
		echo 	'<input class="widefat" type="text" value="' . $option_title . '" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" />';
		echo	'<br />';
		echo	'<br />';
		echo 	'<input class="checkbox" type="checkbox" ' . $option_zodiac . ' id="' . $this->get_field_id('zodiac') . '" name="' . $this->get_field_name('zodiac') . '" />';
		echo 	'&nbsp;&nbsp;<label for="' . $this->get_field_id('zodiac') . '">' . __('Show zodiac', 'moon-phases') . '</label>';
		echo	'<br />';
		echo	'<br />';
		echo 	'<input class="checkbox" type="checkbox" ' . $option_age . ' id="' . $this->get_field_id('age') . '" name="' . $this->get_field_name('age') . '" />';
		echo 	'&nbsp;&nbsp;<label for="' . $this->get_field_id('age') . '">' . __('Show age', 'moon-phases') . '</label>';
		echo	'<br />';
		echo	'<br />';
		echo 	'<input class="checkbox" type="checkbox" ' . $option_details . ' id="' . $this->get_field_id('details') . '" name="' . $this->get_field_name('details') . '"  />';
		echo 	'&nbsp;&nbsp;<label for="' . $this->get_field_id('details') . '">' . __('Show details', 'moon-phases') . '</label>';
		echo '</p>';
	}
}





/*
 *
 *	Installation code
 *
 */

add_shortcode('moon-phases', 'moon_phases_shortcode_handler');
add_action('widgets_init', create_function('', 'return register_widget("WP_Widget_Moon_Phases");'));

?>