<?php
/*
Plugin Name: Around this date in the past...
Plugin URI: http://junyent.org/blog/2006/05/20/around-this-date-in-the-past-wordpress-plugin/
Description: It shows entries/posts around this date in the past (if they exist)
Version: 0.7
Author: Joan Junyent Tarrida
Contributors: jjunyent, Mike Koepke, Cinefilo
Author URI: http://www.junyent.org/

[ Notas en castellano en la web ]  [  Notes en catala a la web ]

Parameters

	$before = Code will show before links. Defaults to ‘This week last year…: ‘
	$after = Code will show after links. Defaults to ‘’
	$daysbefore = Days' posts that will show before one year ago. By default '3' (3 days before)
	$daysafter = Days' posts that will show after one year ago. By default '3' (3 days after)
	$mode = Select the mode that you want the widget to work. By default '1' (X years ago)
		Mode 1: get posts around this date from X years ago.
		Mode 2: get posts around this date for the last X years.
		Mode 3: get posts around this date since year X.
	$yearsago = It shows “X” years ago posts. By default '1' (1 year). ONLY IF MODE 1 IS SELECTED.
	$lastxyears = It shows posts por the last "X" years. By default '1' (1 year). ONLY IF MODE 2 IS SELECTED.
	$sinceyear = It shows posts since the year "X". By default '2005' (since year 2005). ONLY IF MODE 3 IS SELECTED.
	$limit = Number of posts to retrieve. By default '4'. 
	$none = Text shown when there are no posts. By default 'none'.
	$showdate = Show dates next to the links. ('0' or '1', by default '0', disabled)
	$dateformat = Format of the date displayed next to the links (if checked). See http://www.php.net/date 
	$showexcerpt = Show the excerpt next to the links. ('0' or '1', by default '0', disabled).		 

Use

	You can call to function with default parameters:

		<?php around_this_date(); ?>

	Or configure it:

		<?php around_this_date ($before = 'One year ago... ', $after = '<br />', $daysbefore = '3', $daysafter = '3', $mode='1', $yearsago = '1'′,  $limit = '5', $none= 'none', $showdate = '0', $dateformat = 'y', $showexcerpt = '0'); ?>
		or
		<?php around_this_date ($before = 'One year ago... ', $after = '<br />', $daysbefore = '3', $daysafter = '3', $mode='2', $lastxyears = '2'′,  $limit = '5', $none= 'none', $showdate = '0', $dateformat = 'y', $showexcerpt = '0'); ?>
		or
		<?php around_this_date ($before = 'One year ago... ', $after = '<br />', $daysbefore = '3', $daysafter = '3', $mode='3', $sinceyear = '2004'′,  $limit = '5', $none= 'none', $showdate = '0', $dateformat = 'y', $showexcerpt = '0'); ?>


Customize display

In adition to the options avaliable in the function you can highly customize the apearance of the output by using CSS. These are the classes avaliable:
	ul.atd-list {} // base list container.
	li.atd-year {} // Yearly headers.
		atd-yXXXX {} //yearly based class, eg. atd-y2006, atd-y2005 ...
	ul.atd-yearlylist {} // list container for each year around this date posts.
	li.atd-entry {} // list items containing each around this date posts.
		atd-yXXXX {} //yearly based class, eg. atd-y2006, atd-y2005 ...
		atd-mXX {} //montly based class, eg. atd-m01, atd-m02 ... atd-m12.
		atd-dXX {} //dayly based class, eg. adt-d01, atd-d02 ... atd-d31.
		atd-XXXXXXXX {} //date based class, eg. atd-20061205, atd-20050304 ...
	a.atd-entry-title {} // Link to the post.
	.atd-entry-date {} // span containing the date, if $showdate enabled.
	.atd-entry-excerpt {} // span containing the excerpt, if $showexcerpt enabled.


License

	This plugin is free software; you can redistribute it and/or modify (without commercial purposes) it under the terms of the Creative Commons License (don't remove credits to author, please)
	You can view the full text of the license here: http://creativecommons.org/licenses/by-nc/2.5/

Changelog
	v.0.7 = All displayed in a single list with yearly sublists.
			NEW Feature: display date and/or excerpt.
			NEW Feature: added CSS markup to allow maximum flexibility on display.	
	v.0.6.3 = Fixed a bug when calling get_old_posts().
	v.0.6.2 = Fixed a bug when having  &amp; in post's title. Isolated repetitive code in its own function. Changes contributed by Mike Koepke. 
	v.0.6.1 = Fixed bug when having quotes in post's title. Thanks to Mike Koepke for bug repporting and helping with fixing.
	v0.6 = Added 2 new modes, last X years and since year X. 
		Corrected bug in $start_ago and $end_ago.
	v0.5.2 = XHTML valid. Lu�s P�rez (aka Cin�filo)
	v0.5.1 = Now the $yearsago parameter works.
	v0.5.01 = Now the limit option works, for real ;)
	v0.5 = First release. I decided to start on version 0.5 because of preserving version relation with �One year ago� plugin.

Thanks

	Thanks to Borja Fernandez, Chris Goringe and Sven Weidauer for writing their plugins and to Luis P�rez and Mike Koepke for their contributions.
	

	
*/

function around_this_date ( $daysbefore = '3', $daysafter = '3', $mode = '1', $yearsago = '1', $lastxyears= '1', $sinceyear='2006', $limit = '4', $none = 'none', $showdate = '0', $dateformat = 'y', $showexcerpt = '0') 
{
	$outputlist = ''; // empty the 'outputlist' string
	$outputlist .= '<ul class="atd-list">';
		
	if ($mode == '1') {  // "classic" mode
	
		$start_ago = (365*$yearsago)+$daysbefore;
		$end_ago = (365*$yearsago)-$daysafter;
		$year = date("Y")-$yearsago;
		$outputlist .= '<li class="atd-year">'.$year."\n";
		$outputlist .= get_old_posts( $start_ago, $end_ago, $limit, $none, $showdate, $dateformat, $showexcerpt);
		$outputlist .= '</li>'."\n";
	
	}
	elseif ($mode == '2') { // last x years mode
	
		for($year = 1; $year <= $lastxyears; $year++) {
		
			$start_ago = (365*$year)+$daysbefore;
			$end_ago = (365*$year)-$daysafter;
			
			$outputlist .= '<li class="atd-year atd-'.(date("Y")-$year).'">'.(date("Y")-$year)."\n";
			$outputlist .= get_old_posts( $start_ago, $end_ago, $limit, $none, $showdate, $dateformat, $showexcerpt);
			$outputlist .= '</li>'."\n";
		}
	}
	elseif ($mode == '3') { // since year x mode
	
		for($year = 1; $year <= (date("Y")-$sinceyear); $year++) {

			$start_ago = (365*$year)+$daysbefore;
			$end_ago = (365*$year)-$daysafter;
			
			$outputlist .= '<li class="atd-year atd-'.(date("Y")-$year).'">'.(date("Y")-$year)."\n";
			$outputlist .= get_old_posts( $start_ago, $end_ago, $limit, $none, $showdate, $dateformat, $showexcerpt);
			$outputlist .= '</li>'."\n";
		}
	}
	
	$outputlist .= '</ul>'."\n";
	echo "$outputlist";
}

function get_old_posts( $start_ago, $end_ago, $limit, $none, $showdate, $dateformat, $showexcerpt )
{
	global $wpdb;

	$entries = $wpdb->get_results ("SELECT " .
				  "ID, post_title, post_date, post_excerpt, post_content " .
				  "FROM $wpdb->posts " .
				  " WHERE post_status = 'publish' AND (( TO_DAYS( NOW() ) - TO_DAYS( post_date ) ) BETWEEN " . $end_ago . " AND " . $start_ago . ")".
				  " ORDER by 'asc'" .
				  " LIMIT $limit"
					);
	
	$output = ''; // empty the 'output' string
							
	$output .= '<ul class="atd-yearlylist">'."\n";
	if ($entries) {
		foreach ($entries as $entry) {
			$title = str_replace('"', '',$entry->post_title);
			$title = htmlspecialchars($title);
			if($showdate = 1 ) { $showdate = '<span class="atd-entry-date">' .mysql2date($dateformat,$entry->post_date). '</span>'; } 
				else { $showdate = ''; 	}
			if($showexcerpt = 1 ) { 
				if (empty($entry->post_excerpt)) {
						$entry->post_excerpt = explode(" ",strrev(substr(strip_tags($entry->post_content), 0, 100)),2);
						$entry->post_excerpt = strrev($entry->post_excerpt[1]);
						$entry->post_excerpt.= " [...]";
								 }
				$showexcerpt = htmlspecialchars($entry->post_excerpt);
				$showexcerpt = '<span class="atd-entry-excerpt">' .$showexcerpt. '</span>'; } 
				else { $showexcerpt = ''; 	}
			$classes = ' atd-y'.mysql2date('Y',$entry->post_date).' atd-m'.mysql2date('m',$entry->post_date).' atd-d'.mysql2date('d',$entry->post_date).' atd-'.mysql2date('Ymd',$entry->post_date).'';	
			$output .= '<li class="atd-entry'.$classes.'"><a class="atd-entry-title" href="'.get_permalink($entry->ID).'" rel="bookmark" title="Permanent link to '.$title.'">'. htmlspecialchars($entry->post_title) .'</a> '.$showdate.' '.$showexcerpt.'</li>'."\n";
		}
	}
	else {
		$output .= '<li>' .$none. '</li>'."\n";	
	}
	$output .=  '</ul>'."\n";
	return "$output";


}


?>
