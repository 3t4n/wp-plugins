=== Plugin Name ===
Contributors: fransallen
Donate Link: https://www.fransallen.com/contact
Tags: avatar, proxy, security, gravatar
Requires at least: 4.5
Tested up to: 4.7
Stable tag: 4.5
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Replaces Gravatar with local proxy and serve photo safely.

== Description ==

This plugin will serve requests to get photo from Gravatar server using a proxy.
So, this plugin makes Your WordPress like have a system for user's photo handling.

Who is the proxy?
Your domain, this plugin will uses your domain as a proxy.

=== Example: ===

http://gravatar.com/avatar/[encoded-data-automatically-created]%3Fs=200&d=mm&r=g

=== Will be: ===

http://www.example.com/avatar?apid=[encoded-data-automatically-created]%3Fs=200&d=mm&r=g

== What is `apid`? ==

I use `apid` as query variable to get photo from Gravatar, I called `apid` or Avatar Proxy ID to match the name of the plugin and easy to remember. So you can use and call from anywhere.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Done.

== Screenshots ==

1. assets/screenshot-1.png
2. assets/screenshot-2.png

== Frequently Asked Questions ==

No Questions.

== Changelog ==

= 0.4 =
* Use wp_remote_get

= 0.3 =
* Update to 0.3

= 0.2 =
* Adding Avatar Local Server Setting

= 0.1 =
* First Released Version

== Upgrade Notice ==

= 0.2 =
* Adding Avatar Local Server Setting
