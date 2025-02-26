=== AFC Google Map ===
Contributors: farazdagi
Donate link: http://www.afcomponents.com/
Tags: google map, map, flash, gmap, geo, google, kml
Requires at least: 2.0.2
Tested up to: 2.1.3
Stable tag: trunk

The AFC Google Map plugin provides easy map navigation and displays geographical locations with your markers, polylines, polygons and layers.

== Description ==

*NOTE:*
This plugin is depreciated now, so development is discontinued. 
Instead of current plugin, users are advised to use more feature-rich and up to date [Umapper](http://wordpress.org/extend/plugins/umapper/) plugin - it has everything AFC Google Map offered, plus many new features.

The AFC Google Map plugin provides easy map navigation and displays geographical locations with your markers, polylines, polygons and layers. This component uses Google Map Data by connecting to [Google Maps API](http://www.google.com/apis/maps/).
<br><br>
One of the most important features of this plugin is the [KML](http://code.google.com/apis/kml/documentation/) support. It fully supports KML standards, plus allows you to create simple Placemarks KML files on-fly.
<br><br>
Plugin uses WordPress quicktag for map object addition, so this procedure is as simple as it could be. 
<br><br>
<br>Based on [AFC G Map](http://www.afcomponents.com/components/g_map/).
<br>Requires [AFC Plug System](http://www.afcomponents.com/ext/wp/afc-plug-system/)

== Installation ==
1. Unzip obtained plugin code into `/wp-content/plugins/` directory on your host.
2. Obtain and unzip [AFC Plug System](http://www.afcomponents.com/ext/wp/afc-plug-system/). This  is a base plugin, that allows you to have a common features, such as integrated file browser, within all AFC WP plugins.
3. Activate both the AFC Google Map and AFC Plug System through the 'Plugins' menu in WordPress
4. You should see the new AFC Tools menu in your WordPress Admin CP - navigate there and start using the plugin.

== Frequently Asked Questions ==

= Is AFC Plug System required to run the plugin? =
Yes. Since [Advanced Flash Components - AFC](http://www.afcomponents.com/) has many WordPress plugins available, we had to abstract their common functionality, thus the existence of [AFC Plug System](http://www.afcomponents.com/ext/wp/afc-plug-system/).

= Is AFC Plug System available for free? =
Yes. It is absolutely free - download it from [here](http://www.afcomponents.com/ext/wp/afc-plug-system/).

= What is the format of Google Map tag? Do I need to type it manually? =
This plugin uses quicktag functionality to insert content. WordPress version 2.0 has no support for quicktags when rich-text editor (TinyMCE) is enabled, which has been reported as the bug by plugin users. Right now, even if quicktags are not supported, plugin adds a link below editor text-area, so you can always use it to open tag insertion window.

= I need help, how can I contact developers? =
It's easy - just use our [forum](http://www.afcomponents.com/forum/) on AFC website. There's a dedicated section called "AFC WordPress Plugins", where your feedback and requests are more than welcome.