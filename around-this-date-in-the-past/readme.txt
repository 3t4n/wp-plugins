=== Around this date in the past... ===
Plugin Name: Around this date in the past...
Author: Joan Junyent Tarrida
Author URI: http://junyent.org/
Contributors: jjunyent, Mike Koepke, Cinefilo
Donate link: http://junyent.org/blog/my-code 
Plugin URI: http://junyent.org/blog/2006/05/20/around-this-date-in-the-past-wordpress-plugin/
Version: 0.7
Tags: archives
Requires at least: 2.0
Tested up to: 2.1
Stable tag: 0.7

It shows entries/posts around today's date in the past (if they exist). It is highly customizable.

== Description ==

[ Notas en castellano en la web ]  [  Notes en catala a la web ]

It shows around this date entries/posts in the past (if they exist). It is highly customizable. By default it retreives a week around the current day 1 year ago.

**IMPORTANT**: If your sidebar supports the new Wordpress Widgets, you might better use the "Around this date in the past... - Widget Edition" plugin.
Check-it here:
[ http://wordpress.org/extend/plugins/plugin/around-this-date-in-the-past-widget-edition/ ]  

	
== Installation ==

1. Once downloaded the file, uncopress it and upload it through FTP to the server where your Wordpress blog is hosted.
2. Copy it to the folder /wp-content/plugins/ .
3. Activate it through the plugin management screen.
4. Introduce the funtion <?php around_this_date(); ?> (with or without parameters) wherever you want to show the X years ago entries.


== Frequently Asked Questions ==

None yet

== Screenshots ==

1. This screenshot shows the output of <?php around_this_date(); ?> on my blog.

== Usage ==

Place the function <?php around_this_date(); ?> wherever you want to show the links. 

You can call to function with default parameters:

		<?php around_this_date(); ?>

Or configure it:

		<?php around_this_date ($before = 'One year ago... ', $after = '<br />', $daysbefore = '3', $daysafter = '3', $mode='1', $yearsago = '1'′,  $limit = '5', $none= 'none', $showdate = '0', $dateformat = 'y', $showexcerpt = '0'); ?>
		or
		<?php around_this_date ($before = 'One year ago... ', $after = '<br />', $daysbefore = '3', $daysafter = '3', $mode='2', $lastxyears = '2'′,  $limit = '5', $none= 'none', $showdate = '0', $dateformat = 'y', $showexcerpt = '0'); ?>
		or
		<?php around_this_date ($before = 'One year ago... ', $after = '<br />', $daysbefore = '3', $daysafter = '3', $mode='3', $sinceyear = '2004'′,  $limit = '5', $none= 'none', $showdate = '0', $dateformat = 'y', $showexcerpt = '0'); ?>


== Configuration parameters ==

	$before = Code will show before links. Defaults to ‘This week last year…: ‘
	$after = Code will show after links. Defaults to ‘’
	$daysbefore = Days’ posts that will show before one year ago. By default ‘3' (3 days before)
	$daysafter = Days’ posts that will show after one year ago. By default ‘3' (3 days after)
	$mode = Select the mode that you want the widget to work. By default ‘1' (X years ago)
		Mode 1: get posts around this date from X years ago.
		Mode 2: get posts around this date for the last X years.
		Mode 3: get posts around this date since year X.
	$yearsago = It shows “X” years ago posts. By default ‘1' (1 year). ONLY IF MODE 1 IS SELECTED.
	$lastxyears = It shows posts por the last "X" years. By default ‘1' (1 year). ONLY IF MODE 2 IS SELECTED.
	$sinceyear = It shows posts since the year "X". By default ‘2005' (since year 2005). ONLY IF MODE 3 IS SELECTED.
	$limit = Number of posts to retrieve. By default ‘4'. 
	$none = Text shown when there are no posts. By default 'none'. 
	$showdate = Show dates next to the links. ('0' or '1', by default '0', disabled)
	$dateformat = Format of the date displayed next to the links (if checked). See http://www.php.net/date 
	$showexcerpt = Show the excerpt next to the links. ('0' or '1', by default '0', disabled).		 


== Customize display ==

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


== License ==
	
This plugin is released under the GPL license. See license.txt for details.


== Changelog ==

v.0.7 = All displayed in a single list with yearly sublists.
		NEW Feature: display date and/or excerpt.
		NEW Feature: added CSS markup to allow maximum flexibility on display.	
v.0.6.3 = Fixed a bug when calling get_old_posts().
v.0.6.2 = Fixed a bug when having  &amp; in post's title. Isolated repetitive code in its own function. Changes contributed by Mike Koepke. 
v.0.6.1 = Fixed bug when having quotes in post's title. Thanks to Mike Koepke for bug repporting and helping with fixing.
v0.6 = NEW Feature: added 2 new modes, last X years and since year X. 
		Corrected bug in $start_ago and $end_ago.
v0.5.2 = XHTML valid. Thanks to to Luis Pérez
v0.5.1 = Added the $daysbefore and $daysafter parameters.
v0.5.01 = Now the limit option works, for real ;)
v0.5 = First release. I decided to start on version 06 because of preserving version relation with “One year ago” plugin.

== Credits and Acknowledgments ==

This plugin is based on:
- "One year ago" plugin released by Borja Fernandez
[ http://www.lamateporunyogur.net/wp-plugins/one-year-ago/ ]
- "Wayback" plugin realeaased by Chris Goringe
[ http://code.goringe.net/WordPress/ ]
 
Thanks to  Borja Fernandez[  http://www.lamateporunyogur.net  ]  and  Chris Goringe  [  http://tis.goringe.net  ]  for writing those plugins and to Luis Pérez and Mike Koepke for their contributions.

== ToDo ==

Nothing else planed by now.
