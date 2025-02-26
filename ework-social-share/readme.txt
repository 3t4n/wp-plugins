=== Plugin Name ===
Contributors: Ework Group
Donate link: http://eorkgroup.com/
Tags: comments, spam
Requires at least: 2.0.2
Tested up to: 3.4
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Ework Social share plugin is about share posts on the top social site facebook, twitter, linkedin and google plus.

== Description ==

There are 4 buttons Twitter, facebook, Linkedin and google plus. what ever you need you can select from the options page. if you want to call the plugin at anywhere in content jsut call <?php ehco ewsp_add_content();?> function and you need to manage css own.

A few notes about the sections above:

*   Enable checkbox is for enable the ework social share plugin check if you want to show it on front.
*   Position is about where you want to keep it, there are two position top and bottom of content. If you check both then it will be placed in both top and bottom.
*   Selection Area is about in which page do you want to see it. there are two options on the single page and on both post and pages. where you want to place it you can select as your requirement.
*   Last is about share button options which button you need you can check that one.

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Unzip `ework-social-share` zip file and upload to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress. you need to go the settings and Ework social share check as described on description tab.
1. If you need it on another field you just call `<?php ehco ewsp_add_content();?>` in your templates

== Frequently Asked Questions ==

= How to show the share buttons in post and single page? =

Go to options page and you need to check both On single page/posts only and Both on all page and posts check box.

= What is position? =

After content and before content are two options if you need after content then you can only check the after content check box and if you need on both top and bottom then you can check on both. if you need at the top of content then you can select the top of content only checkbox and save it you can see the effect at frontend.

== Screenshots ==

1. Enable the buttons.
2. See the front result of above screenshot.
3. Selection of position.
4. See the result of above screenshot.
5. Selection of share button and they are only display in single page and posts.
6. See the front result of above screenshot.

== Changelog ==

= 1.0 =

== Upgrade Notice ==



== Arbitrary section ==


== A brief Of Ework social share Plugin ==

Features that we include in 1st version:

1. You can select which button you need
1. You can choose which area you need eg, after title after content, on both and on single page and post.
1. We will post the enhancement version soon.


`<?php ehco ewsp_add_content(); // if you copy this function anywhere you need it will do the same functionality. ?>`
