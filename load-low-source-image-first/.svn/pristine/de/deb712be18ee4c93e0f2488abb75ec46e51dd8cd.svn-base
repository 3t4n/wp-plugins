=== Load low source image first ===
Contributors: stroknal, RogierLankhorst
Tags: image, low source, fast loading website, lazy loading, loading, speed, fast website
Requires at least: 4.0
License: GPL2
Tested up to: 4.2
Stable tag: 1.1.1

The load low source image first plugin makes your website load faster, by loading the images after the document has loaded completely; lazy loading.

== Description ==
The load low source image first plugin does just that: it replaces the source of every image on the page with a 1 pixel image, s.png, and creates an attribute, highsrc, with the original source url. Finally, a jquery script is loaded that shows the original image, after the page has been loaded.

Instead of using this plugin, it is of course possible to use optimized images, or progressive jpeg. But not every Wordpress user is familiar with those concepts. The end user does not always comply with best practices, and inserts a heavy weight image instead, with slow websites as a result.

= Filters =
* llsif_replace_images: to filter the buffer including the replaced images
* llsif_set_imagefile : to change the default s.png image, just replace the path to s.png with your desired path.

= Remarks =
* This plugin does not create a fallback for people who have javascript disabled
* If your site already uses lazy loading scripts, this plugin might create conflicts. If you use a theme you didn’t develop yourself and don’t know what scripts are included, test the plugin first!

For more information: go to the [website](http://www.rogierlankhorst.com/load-low-source-image-first/)

== Installation ==
To install this plugin:

1. Download the plugin
2. Upload the plugin to the wp-content/plugins directory,
3. Go to “plugins” in your wordpress admin, then click activate.

== Frequently Asked Questions ==
= My site doesn’t work correct with your plugin, what’s going on? =
Your site probably already has a lazy loading script in place. This might conflict with the jquery used in this plugin. Just deactivate, you’re already set!

== Changelog ==
* extended readme.txt
* added filter reference to readme.txt
* bugfix
* script now checks if img tag also contains “data-” properties. In that case, that tag will be left alone. Some slider scripts use their own lazy loading functions. Conflicts will be avoided this way.

== Upgrade notice ==

== Screenshots ==
