=== MultiManager WP - Manage All Your WordPress Sites Easily ===
Contributors: icdsoft, madjarov
Tags: rest-api, custom api, manage sites, multiple site manager
Requires at least: 6.0
Tested up to: 6.7
Stable tag: 1.1.3
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Helps to automatically connect a WordPress site to the ICDSoft WordPress MultiManager tool which allows users to manage multiple WordPress sites from a single interface.

== Description ==

This plugin helps you to automatically connect your WordPress site to the ICDSoft WordPress MultiManager toolkit available in the ICDSoft Account Panel. The WordPress MultiManager toolkit allows you to add and manage multiple WordPress sites from a single interface.

The WP MultiManager plugin opens the following custom REST-API methods:

* users/
* users/impersonate
* users/impersonate/nonce
* users/impersonate/token

* plugins/
* plugins/upload
* plugins/update
* plugins/updates

* themes/
* themes/installed
* themes/install
* themes/update
* themes/updates

* core/
* core/update.

== Installation ==

This section describes how to install the plugin and get it working.

= Support =

If you need help using the plugin, please send us an email to support@icdsoft.com, or submit a support ticket via the ICDSoft Account Panel > 24/7 Support, and we will do our best to assist you. We respond to enquiries within 15 minutes.

= Minimum Requirements =

* WordPress 6.0 or greater
* PHP version 7.4 or greater
* MySQL version 5.0 or greater

= We recommend your host supports =

* PHP version 8 or greater
* MySQL version 5.6 or greater
* WordPress Memory limit of 64 MB or greater (128 MB or higher is preferred)

= Installation =

1. Install using the WordPress built-in Plugin installer, or Extract the zip file and drop its contents in the `wp-content/plugins/` directory of your WordPress installation.
2. Activate the plugin through the `Plugins` menu in WordPress.
3. Log in to the ICDSoft Account Panel and go to the WordPress MultiManager section > Connect Site.
4. Enter the address of your WordPress site and press the `Connect` button.
5. Log in to your WordPress Dashboard and give the application access to your account by approving the connection.

== Changelog ==
= 1.1.3
* Fix = plugins cached response

= 1.1.2
* Fix = allow impersonate method

= 1.1.1
* Fix = allow nonce method

= 1.1.0
* Fix = disable impersonate method

= 1.0.5 =
* Fix = ssl info utc timezone

= 1.0.4 =
* New = new site information

= 1.0.3 =
* Fix = skip wp_login action hook on impersonate

= 1.0.2 =
* New - New API endpoint - info - return some site information

= 1.0.1 =
* Fix - Fix Impersonate Login

= 1.0.0 =
* Initial release.
