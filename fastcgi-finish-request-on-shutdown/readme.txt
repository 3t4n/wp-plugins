=== Plugin Name ===
Contributors: AJenbo
Tags: performance
Requires at least: 4.3.1
Tested up to: 4.5
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Simply call fastcgi_finish_request on WordPress shutdown to speed up browsing.

== Description ==

Call fastcgi_finish_request() on shutdown. This is able to speed up WordPress on servers where PHP is not tied to the webserver, like Nginx and certain configurations of Apache. If this is not the case this plugin will not do anything.

You can read more about fastcgi_finish_request() on the php documentation page:
http://php.net/manual/en/function.fastcgi-finish-request.php

== Installation ==

1. Upload the plugin file to the `/wp-content/plugins/` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress

== Frequently Asked Questions ==

= Will this cause issues if my server does not support fastcgi_finish_request =

No. The plugin first checks if the function exists before calling it.

== Changelog ==

= 1.0 =
Conform to WP style guide

= 0.9 =
Initial release
