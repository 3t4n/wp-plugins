=== Accept HTTPS with Jetpack Photon and Tiled Galleries ===
Contributors: trevellyan
Tags: jetpack, photon, tiled galleries, https
Requires at least: 4.2
Tested up to: 4.4.1
Stable tag: 1.0.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Enable use of the wordpress.com content delivery network by the Jetpack Photon and Tiled Galleries modules on a site that uses HTTPS.

== Description ==

**Please note**: this plugin is no longer required with Jetpack version 3.9 and later.

By default, with **Jetpack** version 3.8.2 and earlier, the **Jetpack Photon** and **Jetpack Tiled Galleries** modules do not use the wordpress.com CDN on a site that uses HTTPS. The **Accept HTTPS with Jetpack Photon and Tiled Galleries** plugin allows those modules to use the wordpress.com CDN by means of a single line of PHP:
`add_filter( 'jetpack_photon_reject_https', '__return_false' );`

== Installation ==

Install **Accept HTTPS with Jetpack Photon and Tiled Galleries** via the plugin directory. Activate the plugin to enable use of the wordpress.com CDN by the **Jetpack Photon** and **Jetpack Tiled Galleries** modules on a site that uses HTTPS. Deactivate the plugin to revert to the default behavior.

== Frequently Asked Questions ==

= What’s this all about? =

The **Jetpack Photon** module uses the wordpress.com CDN (content delivery network) to accelerate image loading. It does this by resizing and optimizing the images, and by delivering them from multiple server locations. The **Jetpack Tiled Galleries** module also uses the wordpress.com CDN, even on a site that doesn’t have **Jetpack Photon** enabled, which can significantly improve page load time when tiled galleries are present.

= Why would I bother using this plugin? =

By default, **Jetpack** version 3.8.2 and earlier **does not** use the wordpress.com CDN on a site that uses HTTPS. The **Accept HTTPS with Jetpack Photon and Tiled Galleries** plugin is offered as a convenient way to enable and disable use of the wordpress.com CDN on a site that uses HTTPS. If you’re comfortable editing PHP, you might prefer a DIY approach using the line of code shown in the description. For example, you could add it to functions.php in a child theme.

= I have Jetpack 3.9 or later. Do I need this plugin? =

By default, **Jetpack** version 3.9 and later **does** use the wordpress.com CDN on a site that uses HTTPS, so this plugin is not required.

= My site doesn’t use HTTPS. Do I need this plugin? =

There is no reason to install this plugin on a site that doesn’t use HTTPS, regardless of which version of **Jetpack** is installed.

= I installed and activated this plugin, but nothing changed. Why? =

If your site doesn’t use **Jetpack Photon** or **Jetpack Tiled Galleries**, this plugin has no effect.

= Where are the settings? =

There are no settings.

== Changelog ==

= 1.0.4 =
* corrected version number to match stable tag

= 1.0.3 =
* updated readme.txt - this plugin is obsolete with Jetpack 3.9 or later

= 1.0.2 =
* tagging confusion

= 1.0.1 =
* corrected readme.txt

= 1.0 =
* initial release
