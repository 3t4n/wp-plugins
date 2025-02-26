=== Static Maps Editor ===
Contributors: printmaps
Author URI: https://www.printmaps.net/
Tags: maps, map, static map, static maps, map image
Requires at least: 5.4
Tested up to: 6.5
Requires PHP: 5.6
Stable tag: 1.0.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Make maps as PNG images fast & easy. Include the map image in your Media Library. For when interactive maps aren't needed!

== Description ==

There are dozens of interactive maps plugins for Wordpress - **Static Maps Editor** is the first plugin for creating non-interactive map images. It helps you make any map that you want, fast and easy. No iFrames, no JavaScript! Because sometimes that interactive map from Google Maps is not what you want.

= How the plugin integrates into WordPress =
* Map images are hosted by your WordPress installation, within your **Media Library**
* Static Maps Editor is compatible with all other plugins that handle images
* All images are stored locally in your upload folder, alongside pictures you upload

= The map editor - features =
1. Map anywhere on the globe, from whole continents to a map of your street
1. Style your map
1. Draw routes
1. Put a list of addresses on the map (even copy & paste from Excel)
1. Highlight cities/countries/regions/etc
1. Upload your geo data (GPX, KML, GeoJSON..)
1. Show mountains and hills
1. Customize the map design
1. Tilt or rotate the map
1. 100% GDPR compliant

= Roadmap =

These are the things planned for future releases:

1. A Gutenberg block
1. A Divi module
1. An Elementor widget
1. Remember map editor settings

Please let us know in the forum what you think!

== Installation ==
= Automatic installation =
1. Search for the plugin "Static Maps Editor" in your wp-admin
1. Install and activate the plugin
1. You will be asked to generate your API key
1. Create your first Static Map

= Manual installation =
1. Download the Static Maps Editor plugin zip file. Upload the file to your WordPress under "Plugins".
1. Install and activate the plugin
1. You will be asked to generate your API key
1. Create your first Static Map

Note: Make sure all filesize limits (upload, post size, memory, etc) are set to at least 10MB on your PHP and WordPress. Also check potential size limits on your web application firewall (e.g. mod_security).

== Frequently Asked Questions ==
= Do I need an account on Printmaps.net for this to work? =

No. All you need is an API key for Printmaps.net, which you generate with a single click the first time you use the plugin. (It is shown on the settings page however, in case we ever need it for debugging.)

= Are all features free or is there a Pro version? =

All features are free, there is no "Pro". We earn our money with printable cartography on Printmaps.net, not with online static maps. They are free and will stay free.

= What's the difference to all the other maps plugins? =

All maps plugins that we know of serve interactive maps. (Maps where you can zoom, pan and click.) This plugin serves static, non-interactive maps, pure PNG pictures. That's good for the speed of your site, for your site layouts and also for SEO, as these maps will show up in Google Images as search results.

= Where is the map data from? =

The map data is from OpenStreetMap.org, processed by us into a cartographic scheme. OSM licences map data under an open licence, therefor you are free to use our maps in any way you wish, given that you don't remove the copyright credits.

= Is it legal to use your maps commercially? =

Yes, you may use these maps also for commercial purposes, as long as you don't remove the copyright credits.

= What about privacy or GDPR? =

All maps you create and include in your pages will be hosted by your Wordpress installation, not by us. Your users will not be served any files from our servers. Therefor this pligin has no privacy implications whatsoever. The plugin is fully compliant with European GDPR and other local privacy laws.

= What's the catch? =

We made this plugin to make our commercial service Printmaps.net more visible. The plugin is and will stay free.

= Are there any memory or resources limits I have to increase in order for the plugin to function correctly? =

The generated images could range in size from a couple of kilobytes up to 10MB. Please make sure that your PHP and WordPress limit settings and configuration variables are set high enough to accommodate for such requests. In particular the setting for POST requests size and file upload size. (You can find your current limits unter Tools> Site Health.)

* PHP post max size
* Upload max filesize
* WP_MEMORY_LIMIT
* WP_MAX_MEMORY_LIMIT

Also if you use an additional web application firewall (e.g mod_security) make sure that the custom settings for the firewall are set high enough as well for requests of up to 10MB.

== Screenshots ==

1. Create maps fast and easy
1. Choose from default styles + customize them
1. Add POIs, routes, files (GPX, etc) and much more
1. Add the PNG to your WordPress media library

== Changelog ==
= 1.0.0 =
* Initial release. Hope you like it!
= 1.0.1 =
* Enable normal users to add maps
* Add more translations
* Improved README.txt
