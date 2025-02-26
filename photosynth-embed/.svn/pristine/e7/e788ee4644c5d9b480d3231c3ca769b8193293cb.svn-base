<?php
/*
Plugin Name: Photosynth Embed Shortcode
Version: 0.1.1
Plugin URI: http://wordpress.org/extend/plugins/photosynth-embed/
Description: Provides easy shortcode access to inserting Photosynth panormamas and synths
Author: Fabrizio Lungo
Author URI: http://fabrizio.me.uk/

Copyright 2010 Fabrizio Lungo (email: photosynth-embed@fabrizio.me.uk)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

function photosynth_embed($atts, $content) {
	if (empty($atts['delayLoad'])) {
		$delayLoad = "true";
	} else {
		$delayLoad = $atts['delayLoad'];
	}
	if (empty($atts['play'])) {
		$play = "false";
	} else {
		$play = $atts['play'];
	}
		if (empty($atts['width'])) {
		$width = "500";
	} else {
		$width = $atts['width'];
	}
	if (empty($atts['height'])) {
		$height = "300";
	} else {
		$height = $atts['height'];
	}
	if ($content != '') {
		echo "<iframe frameborder=\"0\" src=\"http://photosynth.net/embed.aspx?cid=" . $content . "&delayLoad=" . $delayLoad . "&slideShowPlaying=" . $play . "\" width=\"" . $width . "\" height=\"" . $height . "\"></iframe>";
	}
	else
		return "<b>No Synth Chosen</b>";
}

add_shortcode('synth', 'photosynth_embed');
?>