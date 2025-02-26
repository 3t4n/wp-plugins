<?php 
/* 
Plugin Name: Average Reading Time
Plugin URI: http://stijlroyal.com/
Tags: meta, average reading time, information, article
Author URI: http://stijlroyal.com/
Author: Kacper Potega, Stijlroyal
Version: 0.1
  
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

function the_average_reading_time()  {

	$word_readingtime = "Reading Time";
	$word_min = "minute";
	$word_mins = "minutes";
	$word_secs = "seconds";
	$word_under = "under";
	
	if (get_bloginfo('language') == "de-DE") {
		$word_readingtime = "Lesezeit";
		$word_min = "Minute";
		$word_mins = "Minuten";
		$word_secs = "Sekunden";
		$word_under = "unter";
	}

	$pre = "Ø $word_readingtime:";
	
		$post_content = get_the_content();
		$post_words = str_word_count($post_content);
		$reading_speed = 210;
		$average_reading_time = $post_words/$reading_speed;
		$average_reading_time = round(2*$average_reading_time);
		$average_reading_time = $average_reading_time/2;
	
		if ($average_reading_time != 1 & $average_reading_time >= 0.5) $average_reading_time = "$average_reading_time $word_mins";
		else if ($average_reading_time < 0.5) $average_reading_time = "$word_under 30 $word_secs";
		else $average_reading_time = "$average_reading_time $word_min";
	
	return "$pre $average_reading_time";
}


add_action( 'wp', 'the_average_reading_time' );

?>