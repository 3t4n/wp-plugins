=== Plugin Name ===
Contributors: TSCADFX
Donate link: https://wireflare.com/
Tags: fail2ban, f2b
Requires at least: 3.0.1
Tested up to: 4.2.2
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Plugin creates a syslog facility to log invalid login attempts in a custom file for use with Fail2Ban

== Description ==

[WireFlare](https://wireflare.com/wordpress-login-security-fail2ban/ "WordPress Login Security with Fail2Ban") WordPress Fail2Ban Plugin creates a syslog facility to log invalid login attempts in a custom file for use with Fail2Ban.

**PLEASE READ**
This plugin has no options and will not work without having server side root access.

You must follow our guide for setting up the server to make this plugin do it's job.  The guide can be found here: [WordPress Login Security with Fail2Ban](https://wireflare.com/wordpress-login-security-fail2ban/ "WordPress Login Security with Fail2Ban by WireFlare")

What this plugin does:
This plugin constructs a syslog facility called local1. It then hooks into the WP login failed action. Any invalid login attempts are logged with the ip address, username used and website that it’s coming from.  These invalid attempts are parsed by Fail2Ban to provide a proactive method to block intrusion attempts.

This plugin is different from other plugins in that we don't save to the syslog.  A custom log is created.  This reduces the CPU load on the server and keeps a log dedicated to invalid WordPress login attempts.  These log entries can be used to block repeat offenders as well as place temporary blocks on anyone attempting to break your website.  The log file can also be used across many different websites and transferred between servers.

Visit us at [WireFlare](https://wireflare.com)

== Installation ==

1. Unzip the download package
1. Upload `wp-fail2ban-logging` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

To getting started with the plugin API, please read [this blog post](https://wireflare.com/wordpress-login-security-fail2ban/).

== Frequently Asked Questions ==

= How do I configure this plugin? =

You don't!  Once the plugin is active it does the logging so long as you followed the steps outlined in the blog post.

= What OS is this plugin compatible with? =

This plugin has been tested with Redhat and Debian variants.

= Why doesn't it work? =

You must have server side access to configure the per-requisites for this plugin to work.  It will not work on shared hosting unless your hosting provider has made provisions for the plugin to work.  If you have a VPS or Dedicated server you should have root access.

== Screenshots ==

== Changelog ==

= 1.0.1 =
* Initial Release

== Upgrade Notice ==