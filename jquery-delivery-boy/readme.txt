=== jQuery Delivery Boy ===
Contributors: ianhuet
Tags: jquery, cdn
Requires at least: 2.8 + PHP5
Stable tag: trunk
Tested up to: 3.1
Version 0.3

Loads a CDN hosted jQuery library or reverts to the local jQuery library. There is also a Settings screen for adjusting which script it actually calls.

It also automatically reverts to the local version of jQuery when you are logged in as the Admin since WP has a bizarre editor conflict with the CDN version?

== Description ==

Inspired by a conversation over on <a href="http://forr.st/~c6">Forrst</a> I quickly put together this little plug-in. Via CURL it checks if it can access the Google API hosted jQuery library. If it can see it then it queues it up otherwise it rolls with the version of the jQuery library that came with your current WP install.

Author Website: http://kestrelid.com
Plugin Homepage: http://kestrelid.com/downloads/jquery-delivery-boy/

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress


== Changelog ==

= 0.3 =
* Add a Settings page with an option to select your preferred CDN script

= 0.2 =
* Add work around for the unresolved issue of Google API jQuery causing admin area editor functionality to become frozen

= 0.1.1 =
* Add function_exists check for curl_init. Protects against hosts without this library pre-installed

= 0.1 =
* Posted to the WP plug-in repository.
