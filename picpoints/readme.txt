=== PicPoints ===
Contributors: avirtum
Tags: image map, interactive images, hotspots
Requires at least: 4.6
Tested up to: 6.5
Stable tag: 1.0.0
Requires PHP: 7.0
License: GPLv3

Create interactive images with clickable hotspots for WordPress.

== Description ==

PicPoints is a plugin that allows you to add interactive maps and clickable infographics to your WordPress site.


== How To Use ===
To insert an interactive image into a web page, you should use the shortcode "picpoints", for example

[picpoints img="mysite.com/image.png"]
   [hotspot x="10" y="10" Link="google.com"]
   [hotspot x="50" y="50" link="bing.com"]
   [hotspot x="90" y="90" link="stackoverflow.com"]
[/picpoints]

Shortcode parameters:
img - image url
class - additional css classes applied to the interactive image container
x - left coordinate of the hotspot in %
y - top coordinate of the hotspot in %
link - url to an external resource


== Installation ==

* go to the Wordpress admin console
* go to "Plugins" -> "Add New"
* search for "PicPoints"
* Click "Install Now"
* Click "Activate"

== Changelog ===

= 1.0.0 =
* Initial release