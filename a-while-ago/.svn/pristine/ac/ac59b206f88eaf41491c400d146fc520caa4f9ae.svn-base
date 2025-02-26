<?php
/*
Plugin Name: A While Ago
Version: 0.1
Plugin URI: http://wordpress.org/extend/plugins/a-while-ago/
Author: Gabriel White
Author URI: http://www.gabrielwhite.com/
Description: Show timestamp for a post or page using a relative description (e.g. "Moments ago", "Two days ago").

Copyright 2012 Gabriel White

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
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function wp_awhileago ($prepend = "", $append = "",
		$descriptions = array("Moments ago", "Hours ago", "Today", "Yesterday", "days", "week", "weeks", "month", "months", "year", "years", "ago", "At some point in time")) {

		// Calculate times

		$minutes = floor((strtotime(date("Y-m-d", gmmktime() + (get_option('gmt_offset') * 3600))) - strtotime(date("Y-m-d", get_the_time("U")))) / 60);

		$hours = floor($minutes / 60);
		
		$days = floor($hours / 24);

		$weeks = floor($days / 7);

		$months = floor($days / 30.5);

		$years = floor($days / 365);
		
		$monthsover = $months - ($years * 12);
		
		// "Posted "
		$output = $prepend;
		
		if ($years > 0) {
			// "4 years"
			if ($years > 1) {
				$output .= $years." ".$descriptions[10];
				}
			// "1 year"
			else {
				$output .= $years." ".$descriptions[9];
				}
			if ($years < 4) {
				// add months only if 3 years or less ago
				// add "3 months"
				if ($monthsover > 1) {
					$output .= " ".$monthsover." ".$descriptions[8];
				}
				// "add "1 month"
				elseif ($monthsover == 1) {
					$output .= " ".$monthsover." ".$descriptions[7];
				}
			}
			// add "ago" (so you end up with "2 years 4 months ago")
			$output .= " ".$descriptions[11];
		}
		// "3 months ago"
		elseif ($months > 1) {
			$output .= $months." ".$descriptions[8]." ".$descriptions[11];
		}
		// "5 weeks ago"
		elseif ($weeks > 1) {
			$output .= $weeks." ".$descriptions[6]." ".$descriptions[11];
		}
		// "1 week ago"
		elseif ($weeks == 1) {
			$output .= $weeks." ".$descriptions[5]." ".$descriptions[11];
		}
		// "4 days ago"
		elseif ($days > 1) {
			$output .= $days." ".$descriptions[4]." ".$descriptions[11];
		}
		// "Yesterday"
		elseif ($days == 1) {
			$output .= $descriptions[3];
		}
		elseif ($days == 0) {
			// "Today" (if more than 8 hours ago)
			if ($hours > 8) {
				$output .= $descriptions[2];
			}
			// "Hours ago" (if 8 hours or less)
			elseif ($hours > 0) {
				$output .= $descriptions[1];
			}
			// "Moments ago" (if 60 minutes or less)
			elseif ($minutes >= 0) {
				$output .= $descriptions[0];
			}
		}
		// "At some point in time"
		else {
			$output .= $descriptions[12];
		}

		// " according to my clock"
		$output .= $append;
		
		echo $output;
}

add_filter('Posts', 'wp_awhileago');
?>