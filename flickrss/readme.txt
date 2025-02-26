=== FlickRss ===
Contributors: jpcbarros
Donate link: http://joaopedrobarros.com.br/code/wordpress/flickrss
Tags: comments, spam
Requires at least: 2.0.2
Tested up to: 2.8
Stable tag: 1.0.1

The FlickRss plugin is a widget that allow you to display yours Flickr photos.

== Description ==

FlickRss displays yours latest photos on sidebar. It's really simple to use and fast to configure, you just have to inform your RSS Flickr link.

The plugin is using WordPress core resources to get and parse the rss file, so there is no aditional library needed.

== Installation ==

Follow these steeps to install the plugin and get it working.

1. Upload `flickrss.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go into `widgets` and setup the rss link for the FlickRss widget.
4. Place `<?php if(function_exists('widget_flickrss')) widget_flickrss($args); ?>` in your templates

== Changelog ==

= 1.0.1 =
* Configuration vars resetted.

= 1.0 =
* First release.