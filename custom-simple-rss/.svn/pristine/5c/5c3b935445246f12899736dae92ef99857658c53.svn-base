=== Custom Simple Rss ===
Contributors: danikoo
Donate link: 
Tags: rss, custom rss, feed ,custom feed
Requires at least: 4.0.1
Tested up to: 5.7
Stable tag: 2.1.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A plugin to create your own Custom Simple RSS Feed according to parameters you choose

== Description ==

**NEW:** 
1. added - option to choose **multiple post types**, example: ?call_custom_simple_rss=1&csrp_post_type=page,post
2. added - option to choose **multiple post status**, example: ?call_custom_simple_rss=1&csrp_post_status=publish,draft
3. added - better documentation (tutorial).


A plugin to create a your own Custom Simple RSS Feed 
according to parameters you choose!

*** the best solution for using MailChimp RSS campaigns  ***

**in simple words:** 
Ever wanted an rss feed for just a specific Author and specific Category?

Or Even an rss feed for a specific Custom Field ???

Well... now you got it !

The plugin does not alter your default wordpress feeds - it enables you to display feeds **on the fly** via specific url with pre defined url query parameters.

**for example:**

display only 5 items from specific category order by name descending:

www.yordomain.com/?call_custom_simple_rss=1&csrp_posts_per_page=5
&csrp_orderby=name&csrp_order=DESC&csrp_cat=4


**Filter items by:**

* category id
* post type
* post status
* tag
* range of dates
* and even meta keys and values!
* NEW! filter by custom taxonomy

**Order by:**

* name
* date
* author
* ID
* etc

**More Features:**

* number of items to return
* pagination 
* show post thumbnail or not?
* set post thumbnails size to display?
* show post custom fields (espically usefull if your using your rss as an affliate feed)
* filter by date published or modified


== Installation ==

1. Upload the "Custom Simple Rss" plugin to your website 
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go To "settings" and there you will find all you need under "Custom Simple Rss Plugin Options"
4. Good Luck

== Frequently Asked Questions ==
No Questions

== Screenshots ==

1. set defaults screen

== Changelog ==
**2.1.4**

2021-03-27 version 2.1.4

1. added - control description tag
	show description: if excerpt is empty - show short contnet in description field (using get_the_excerpt function) 
	show excerpt: will show the post excerpt(if any). if excerpt is empty - will remain empty 
	hide always: always empty.
2. added - option to show all posts with exsiting meta_key rgardles of values:
	&csrp_orderby=meta_value_num&csrp_order=DESC&csrp_meta_value=&csrp_meta_key=post_views
	csrp_meta_value={leave empty}
3. fix - Vulnerability fix - do not allow displaying private post status if csrp_key is empty


**2.1.3**

2021-02-19 version 2.1.3

1. minor fix


**2.1.2**

2021-02-19 version 2.1.2

1. added - option to choose **multiple post types**, example: ?call_custom_simple_rss=1&csrp_post_type=page,post
2. added - option to choose **multiple post status**, example: ?call_custom_simple_rss=1&csrp_post_status=publish,draft
3. added - better documentation (tutorial).

**2.1.1**

2021-02-07 version 2.1.1

1. added - option to choose in plugin defaults screen - Post RFC Universal Date & Time


**2.1.0**

2021-02-04 version 2.1.0

1. added - show short contnet in description field (using get_the_excerpt function) where excerpt is missing


**2.0.9**

2019-12-23 version 2.0.9

1. fix - fix a small issue when some get access denied on plugin settings page


**2.0.8**

2019-10-03 version 2.0.8

1. added - wp namespaces for future use
2. added - type attribute in media:content


**2.0.7**

2019-06-29 version 2.0.7

1. fix - escape url for enclousre and image url
2. fix - fixed some security issues


**2.0.6**

2019-04-29 version 2.0.6

1. new feature - choose pubDate date format: standart rss(RFC) / blog date / blogg date time


**2.0.5**

2019-04-25 version 2.0.5

1. minor fix for csrp_show_terms


**2.0.4**

2019-04-11 version 2.0.4

1. new feature - set the feature image size - full / large / medium OR by width x height. for example &csrp_thumbnail_size=400x300. 
2. fix pub date format ( to pass validation )

**2.0.3**

2019-02-09  version 2.0.3

1.new feature - media:content tag for featured image to support MailChimp RSS campaign

**2.0.2**

2018-12-13  version 2.0.2

1.added a new feature - build xml with DOMDocument for better validation
you can choose the option from inside plugin settings.
2.added show post_parent in dataset
3.added show post menu_order in dataset

**1.8.1**

2018-01-20 16:07 version 1.8.1

1.minor fix. removing "admin_print_styles" deprecated hook.



**1.8**

2017-11-21 16:07 version 1.8

1. NEW !!! added - version 1.8 - support for showing custom tax related to post such as post_tag:
csrp_show_post_terms = {trem_name,trem_name}

will show in dc:isPartOf - the custom tax assciated to this specific post


**1.7.1**

2017-11-16 16:07 version 1.7.1

1. added - version 1.7.1 - support for post_parent

csrp_post_parent = 0 - fetch only parent posts/pages

csrp_post_parent = {post_id} - fetch only child posts/pages of that post_id

2. tested - for wp 4.9

**1.7**

2017-08-16 17:07 version 1.7

1. added - version 1.7 - support for custom taxonomy - enables the option to show posts for a specific taxonomy. see tutorial for help

2. minor fixes


**1.6.5**

2017-07-02 17:07 version 1.6.5
1. added - version 1.6.5 - allowed clean html tags from options file

**1.6.4**

2017-07-02 17:07 version 1.6.4
1. added - iframe allowed in clean html
2. tested - for wp 4.8


**1.6.3**

2015-10-25 11:40 version 1.6.3 - added - exclude post formats

2015-10-15 15:40 version 1.6.3 - improvments to meta_query. added meta_type 


**1.6.2**

2015-10-08 19:40 version 1.6.2 - a small bug fix regarding author name and pubDate format

**1.6.1**

2015-10-08 19:40 version 1.6.1 - small bugfixes

**1.6**

2015-10-08 18:33 version 1.6 - major new features:

1. pagination  - added paged parameter

2. date query - return post by date range - see documentation for more help

3. security - protect feeds by key - see defaults tab



**1.5.1**

2015-09-17 18:33 version 1.5.1 - improved html cleaning


**1.5**

2015-09-11 06:33 version 1.5 - new!! added feature to hide content from feed or show 2 types of content(html,full)

**1.4**

2015-07-08 12:45 first launch

2015-07-16 09:45 adding author support

2015-08-14 16:23 minor bug fix - set defaults on first activate

2015-09-10 11:23 apllied the 'the_content' filter on content encoded to extract shortcodes

2015-09-10 18:33 removing trash from content encoded and returning clean html
