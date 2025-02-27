=== Enable Visual Mode in CloudFront ===
Contributors: kawax
Tags: post,editor,cloudfront
Requires at least: 4.7.2
Requires PHP: 5.6
Tested up to: 4.9.0
Stable tag: 1.0.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Enable Visual Mode in CloudFront

== Description ==
When using WordPress in CloudFront, Visual mode can not be used.
Because User-Agent is rewritten.

This plugin checks the CloudFront-Is-Desktop-Viewer header to use Visual mode.

== Installation ==

1. Install the plugin
2. Activate the plugin

= CloudFront Behavior settings =

Add `CloudFront-Is-Desktop-Viewer` to Whitelist Headers.

== Frequently Asked Questions ==

== Screenshots ==

== Changelog ==

= 1.0.0 =
* first release

== Upgrade Notice ==
