=== MyTweetMag ===
Contributors: MyTweetMag, Bueltge
Donate link: http://www.mytweetmag.com/
Tags: News, RSS, Twitter, Feed
Requires at least: 2.8
Tested up to: 2.9

MyTweetMag - Create Collaborative Newsstreams with Twitter and Integrate them into Wordpress.

== Description ==

This plugin works in combination with the plattform www.mytweetmag.com and allows you to integrate rss-feeds from mytweetmag into your wordpress-blog.

There are two ways to integrate the feeds:
1.  with a widget on the sidebar
1.  with a shortcode in a static -page
1.   with php 
 
PHP-USAGE:

Use following code in Templates of the Theme

_Example_: `<?php MyTweetMag(10, "mytweetmag"); ?>`

All params with default-values:

1. `$display = 5`
1. `$username = ''`
1. `$before_desc = '<br/>', $displaydescriptions = 0, $after_desc = ''`
1. `$html = 1`
1. `$truncatedescchar = 200`
1. `$truncatedescstring = ' ... '` 
1. `$truncatetitlechar = ''` 
1. `$truncatetitlestring = ' ... '`
1. `$before_date = '<br/><small>'` 
1. `$date = 0`
1. `$after_date = '</small>'`
1. `$date_format = ''`
1. `$before_creator = '<br/><small>'` 
1. `$creator = 0`
1. `$after_creator = '</small>'`
1. `$start_items = '<ul class='mtm'>'` 
1. `$end_items = '</ul>'`
1. `$start_item = '<li>'` 
1. `$end_item = '</li>'`
1. `$target = 'self'`
1. `$rel = 'follow'`
1. `$charsetscan = 0`
1. `$debug = 0`
1. `$before_noitems = '<p>'` 
1. `$noitems = 'No items, feed is empty.'` 
1. `$after_noitems = '</p>'`
1. `$before_error = '<p>'` 
1. `$error = 'Error: Feed has a error or is not valid'` 
1. `$after_error = '</p>'`
1. `$paging = 0` 
1. `$prev_paging_link = '&laquo; Previous'` 
1. `$next_paging_link = 'Next &raquo;'` 
1. `$prev_paging_title = 'more items'` 
1. `$next_paging_title = 'more items'`
1. `$use_simplepie = 1`
1. `$view = 1`

SHORTCODE-USAGE: 

use the following code in post or pages

_Example_: [MyTweetMag display='5' username='' target='self']

All params with default-values:

1. `'display' => 5`
1. `'username' => ''`
1. `'before_desc' => '<br/>'`
1. `'displaydescriptions' => 1`
1. `'after_desc' => ''`
1.  `'html' => 1`
1. `'truncatedescchar' => ''`
1. `'truncatedescstring' => ' ... '`
1. `'truncatetitlechar' => ''`
1. `'truncatetitlestring' => ' ... '`
1. `'before_meta' => '<br/><small>'`
1. `'meta' => 0`
1. `'after_meta' => '</small>'`
1. `'start_items' => '<ul class='mtm'>'`
1. `'end_items' => '</ul>'`
1. `'start_item' => '<li>'`
1. `'end_item' => '</li>'`
1. `'target' => 'self'`
1. `'rel' => 'follow'`
1. `'charsetscan' => 0`
1. `'debug' => 0`
1. `'before_noitems' => '<p>'`
1. `'noitems' => __('No items, feed is empty.', FB_MTM_TEXTDOMAIN)`
1. `'after_noitems' => '</p>'`
1. `'before_error' => '<p>'`
1. `'error' => __('Error: Feed has a error or is not valid', FB_MTM_TEXTDOMAIN)`
1. `'after_error' => '</p>'`
1. `'paging' => 0`
1. `'prev_paging_link' => __('&laquo; Previous', FB_MTM_TEXTDOMAIN)`
1. `'next_paging_link' => __('Next &raquo;', FB_MTM_TEXTDOMAIN)`
1. `'prev_paging_title' => __('more items', FB_MTM_TEXTDOMAIN)`
1. `'next_paging_title' => __('more items', FB_MTM_TEXTDOMAIN)`
1. `'use_simplepie' => 1`
1. `'view' => 0`
 
== Installation ==

1. Upload the folder "mytweetmag" to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Go to the widget-section of Wordpress and integrate the MyTweetMag-Widget in your sidebar or
1. Create a page and integrate the shortcode using the "MyTweetMag"-button in the edit-bar.  

== Frequently Asked Questions ==

= How can I integrate a rss-feed of the MyTweetMag-plattform? =

To integrate a rss-stream of MyTweetMag please add the TWITTER-NAME of the magazine-editor as username. If you don't know the twitter-name of the editor, take the last part of the MyTweetMag-URL, e.g. "mytweetmag" of the URL http://www.mytweetmag.com/mytweetmag . 

= Can I integrate a rss-feed which is not from mytweetmag? =

No. The MyTweetMag-Plugin is especially designed for the MyTweetMag-plattform. If you want to integrate other rss-feeds, please use the plugin RSS-Import by Frank Bueltge.

= Where can I find a more detailed user-guide of this plugin? = 

Please go to http://blog.mytweetmag.com and click on plugin. You will find a demo and a How-to-Use for this plugin.

= How can I style the output of the plugin? =

You can style the plugin with your CSS-stylesheet. You will find detailed descpriptions in the MyTweetMag-Blog mentioned above.

== Screenshots ==

1. The MyTweetMag-widget for your sidebar screenshot-1.jpg
2. The MyTweetMag-button in the edit-bar screenshot-2.jpg
3. A Demo of the plugin in action (sidebar and static page) screenshot-3.jpg
