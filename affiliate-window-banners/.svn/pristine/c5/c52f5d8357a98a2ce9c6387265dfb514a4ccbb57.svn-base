=== Affiliate Window Banners ===
Author: Kevin Heath
Plugin URI:  http://wp.ypraise.com
Donate link: http://wp.ypraise.com
Tags: affiliates, affiliate window
Requires at least: 3.0
Tested up to: 3.9
Stable tag: 2.3
Version: 2.3
License: GPLv2 or later


== Description ==

Affiliate Window Banners uses the V3 api to pull in products from the Affiliate Window marketplace. The products are then displayed in the sidebar widgets.
Obviously you need to have an affiliate account with Affiliate window for this to work. Once you have an account then you can go to the api credentials in your account settings to sign up for a V3 api password.

There are some server pre-requisites: Wordpress 3.0, php 5.3, SOAP. - Note the requirement for SOAP on your server.

Demo can be seen at my experimental development sites: http://homemediaplayers.co.uk.

This version of Affiliate Window Banners only have the sidebar option. A more powerful version which allows for shortcodes can be found at wp.ypraise.com

== Installation ==

Manual install: Unzip the file into your WordPress plugin-directory. Activate the plugin in wp-admin.

Install through WordPress admin: Go to Plugins > Add New. Search for "Affiliate Window Banners". Locate the plugin in the search results. Click "Install now". Click "Activate".

Go to the settings page and add your Affiliate windows id number and the V3 password. In your Affiliate Window api credentials page you will see a number of option - you want the V3 password only.

You can then set the default site wide keywords that will be used if you do not set one for each post or page. This plugin will only work with wordpress pages and posts. It is not yet custom post enabled.

You can also set the number of products to display in your side bar and also the nmber of characters to display as the description. Obviously the description can only display if there is enough characters available in the api feed.

When you add new posts or pages or edit existing ones you will see a new meta-box in the edit page to allow you to set keywords for individual pages and posts. This will over-write the default keyword option for that page.

== Frequently Asked Questions ==

= How do I use this plugin? =

Just go to the widget and drag the Affiliate Window Banner widget over to your side bar. If you've added added a keyword then you will see a number of products in the sidebar related to that keyword.

= It looks boring what can I do? =

There is no styling offered with this plugin to allow you to display how you want it to look on your own site. The main div is .abwidget - style it up how you like if you want something more than just an unordered list.

= The plugin breaks my widget section =

This is a theme issue. Some themes do not set a width for a sidebar, they set the width of the main content area and then let the sidebar fill in the remaining spaces. You can fix this very easily by setting the width of the sidebar in your theme style.css file. Add

.abwidget {width:XXXpx;} where XXX is the width of the sidebar. Don't forget to use F5 to refresh your browser for the change to be seen.

== Screenshots ==

1. The basic layout of the product feed to the sidebar. Styling can be done using css.

2. The Affiliate Window Banners admin page.



== Changelog ==

= 2.2 =
* Checked compatibility in Wordpress 3.9 and added another div tag for the text.

= 2.2 =
* improved the tag fitlering operators which offers better opportunities in the future for and is just a more professional coding appearance.

= 2.1 =
* for some reason the classes folder did not upload yesterday so the plugin does not work. Hopefully this time all the files will upload.

= 2.0 =
* There is now an option to set the sidebar to use the post tag as a keyword for searching Affiliate Window. This option is still in development as I am having issues with passing values from a multi-dimensional array to the api. As such at the moment the plugin will only use 1 (normally the first) tag from the post. It still allows for a better relevancy for each post though than a general default keyword in settings. If there is not post tag then it will use the default keyword.

= 1.2 =
* Finally found the issue with the plugin failing to work on wordpress. There was a badly coded path. I've done a quick fix and a more stable fix will be done later.

= 1.0 =
* Say hello to Affiliate Windows Banners.

== Upgrade Notice ==

= 1.2 =
* Finally found the issue with the plugin failing to work on wordpress. There was a badly coded path. I've done a quick fix and a more stable fix will be done later.

= 1.0 =
Initial release.
