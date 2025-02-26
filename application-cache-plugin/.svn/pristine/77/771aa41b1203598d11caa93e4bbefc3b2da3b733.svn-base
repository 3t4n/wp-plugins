=== application-cache-plugin ===
Contributors: moolen
Tags: HTML5, application cache, plugin, wordpress
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin creates a dynamic appcache manifest.

== Description ==

This plugin creates a dynamic HTML5 application cache manifest for each site and blogpost of your wordpress blog.

Features so far: 
- Sidebar-Widgets, Sites and Posts are cached.
- The Index Site of your Blog gets fully cached.
- Support for the Advanced Customfields Plugin (only tested w/ standard version + repeater plugin)
- On "Save post" event a new Appcache manifest will be generated (so the clients will update the content)

What this plugin can not do:
- Cache youtube videos.
- fix dead links 

== Installation ==

1. Upload the appcache/ folder to your /wp-content/plugins/ directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place `manifest="<?php echo site_url(); ?>/wp-content/plugins/appcache/manifest.appcache.php?appcache_id=<?php echo the_ID()."&referrer=".urlencode($_SERVER['SCRIPT_URL']); ?>"` in your header.php INSIDE the html tag. It should look like this: `<html manifest="...php stuff...">`
4. test it (look below in the FAQ)
5. Thats it, but feel free to look at settings -> appcache in your admin interface. There are a few settings you can do

== Frequently Asked Questions ==

= How to Debug / look at the appcache / Is it working? =

Its easy in Google Chrome: 
- Debug by CMD+ALT+J for Javascript console. 
- You can see the events fired up by the appcache manifest. Read them carefully!
- **If you get a HTTP 404 on any link to a img: the site wont get cached.**
- type `chrome://appcache-internals/` in your addressbar to look at all HTML5-Cached Sites.
- If nothing is there be sure to look at the manifest. If any error is thrown there please send me an email with a link to the manifest.

== Screenshots ==

1. Settings for the application-cache-plugin. The current theme folder gets cached by default. You can alse exclude filetypes (default is .less .sass)
2. Appcache-plugin in action (See the events "Application Cache Caced event")

== Changelog ==

= 1.0 =
* initial commit