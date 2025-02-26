<?php
/**
 * @package AB_Human_Time
 * @version 0.1
 */
/**
 * Plugin Name: AB Human Time
 * Plugin URI: http://abidubi.altervista.org/ab-human-time/
 * Description: This plugin shows the time elapsed since a post was published in a human readable format.
 * Author: Andrea Bianchini
 * Version: 0.1
 * Author URI: http://abidubi.altervista.org
 * Text Domain: ab-human-time
 */
/* 
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

/* Loads localizations */
function ab_human_time_init() {
  load_plugin_textdomain( 'ab-human-time', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

add_action( 'plugins_loaded', 'ab_human_time_init' );

/* Generate the human time divs */
add_filter( 'the_content', 'ab_timediff' );

function ab_timediff( $content ) {
	if ( is_single() ) {
		$content .= "<div class='abhumantime'><span class='genericon genericon-time'></span>
		<span>" . __( 'Published ', 'ab-human-time') .
			human_time_diff( get_the_time('U'), current_time('timestamp') ) .
			__( ' ago', 'ab-human-time' ) . "</span></div>"; 
	}
	return $content;
} 

/* Stylize the div*/
function abhumantime_css() {
	// Positioning for right-to-left languages
	$pos = is_rtl() ? 'left' : 'right';
	
	echo "
	<style type='text/css'>
	.abhumantime {
		float: $pos;
		padding: 0.2em 1em;
		margin: 0;
		font-size: 0.8em;
		line-height: 1.5;
		vertical-align: middle;
	}
	
	.genericon {
		vertical-align: middle;
		width: 1.2em;
		height: 1.2em;
		font-size: 1.2em;
	}
	</style>
	";
}

add_action( 'wp_head', 'abhumantime_css' );