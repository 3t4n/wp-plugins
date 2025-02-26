=== CGC Maintenance Mode ===
Author: Pippin Williamson
Author URI: http://pippinsplugins.com
Plugin URI: http://pippinsplugins.com/cgc-maintenance-mode-plugin-for-wordpress/
Tags: ip, restrict, maintenance, maintenance mode
Requires at least: 2.9
Tested up to: 4.9
Stable tag: 1.2.1

This plugin allows you to put your site into maintenance mode, by allowing only users with specified IP addresses to view the site.

== Description ==

Easily put your site into maintenance mode with this plugin so that you can perform updates. The plugin works by taking a selection of IP addresses and comparing them to the visitor's IP address.

Users whose IP addresses match those specified in the settings page can view the site normally. Users who do not have IP access are directed either you a Wordpress page (which you pick), or to any external url.

It's extremely simple to use:

* activate the plugin
* go to the "Maintenance Mode" settings
* check the "Enable Box"
* enter the IP addresses that should have access
* choose whether to redirect non-authorized users to a page or url
* choose the page or enter the url

Once your site is ready to be made available again, simple uncheck the "Enable" box.

== Installation ==

1. Upload the 'cgc-maintenance-mode' folder to the /wp-content/plugins/ directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to Settings > Maintenance Mode

== Screenshots ==

1. Overview of the plugin settings

== Changelog ==

= 1.2.1 =

* Tested with latest version of WordPress

= 1.2 =

* New: Added support for permitting site admins to view the site without an IP address
* New: Added support for including comments on IP addresses

= 1.1 =
* Fixed undefined notice errors on first install
* Fixed an issue where the IP of the visitor wasn't always properly detected
* Added a simple check for local IP addresses

= 1.0 =
* Initial release
