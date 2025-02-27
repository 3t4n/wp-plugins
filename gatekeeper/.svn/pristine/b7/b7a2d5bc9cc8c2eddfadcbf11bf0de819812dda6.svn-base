=== Plugin Name ===
Contributors: jamiewilson
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=J3ETMQWMPY586
Tags: gatekeeper, offline, maintenance, whitelist, blacklist, access, ip, coming soon
Requires at least: 3.0
Tested up to: 4.8.2
Stable tag: trunk

Gatekeeper allows administrators to take a WordPress site offline while leaving it accessible to authorized users for maintenance, testing, etc.

== Description ==

Gatekeeper allows administrators to take a WordPress site offline quickly and easily while leaving it fully accessible to administrators and other authorized users. Site visitors will be shown or redirected to a specified offline page. An optional blacklist can be used for permanent bans.

** Features **

* Visitors can either be redirected to an existing non-WordPress offline page (using http 302 temporary redirect) or WordPress pages can be temporarily replaced with the offline page.
* Logged in admins can be whitelisted
* The current admin's IP address can be automatically whitelisted
* An IP-based whitelist that can accept specific IP addresses, wildcards, and ranges
* A basic IP-based blacklist that redirects blacklisted IPs to a specified page (not to be used for security)
* A notifier that appears on administrator pages when the site is offline

== Installation ==

1. Upload `gatekeeper` to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Go to <em>Tools > Gatekeeper</em> to manage Gatekeeper.


== Frequently Asked Questions ==

= Why was this plugin developed? =

I needed a "coming soon" page for a site I was working on but also needed to be able to use WordPress myself in order to test themes, designs, etc.
The existing landing page themes are nice, unless you also need to be able to test a theme without letting the world see. At first, I added some PHP
code into the WordPress index.php file to redirect all but my IP address to the coming soon page, but WP upgrades opened my site to the world. Editing
the htaccess file is an option, but it's extra work and only works until my IP address changes. So...I created Gatekeeper.

= Can I redirect visitors to an existing WordPress page? =

No. Gatekeeper protects all WordPress pages (except admin and login pages) from everyone but those whitelisted, so redirecting to a WordPress page
would create an undesirable redirect loop.

= How do I use an offline page? =

The offline page can be any web-friendly page: HTML, PHP, text, etc. It's not required, but recommended, to keep this file in a separate directory to keep it from being confused with WordPress files.

= Can Gatekeeper protect non-WordPress pages? =

No.

= Should I rely on the Blacklist for security? =
No. The primary purpose of the plugin is to take sites offline for maintenance. The Blacklist was designed as an extra feature to help thwart connections from undesirable IP addresses, but is not designed as a security feature. Wordpress administrators would be advised to use Wordfence, iThemes Security, Bulletproof Security, Sucuri Security, or another widely used and trusted WordPress security plugin for security.

= Help! It doesn’t work!! =

If the plugin doesn’t appear to be working, first check your whitelist. Make sure you’re not testing from a whitelisted IP address. If _Auto-Protect Admin IP_ is checked, the plugin will attempt to automatically whitelist your IP address and let you see the site normally. If you have _Whitelist Logged-in Admins_ checked, the plugin will let you view the site normally as long as you are logged into WordPress. The plugin is designed to do its best to not lock you out of your own site.

== Screenshots ==

1. The Gatekeeper administration page

== Changelog ==

= 1.1 =
* UI improvements.
* Explicit warnings that the Blacklist is not designed for security. See FAQ.
* Acknowledging support for latest version of WordPress.

= 1.0.1 =
* Minor bug fix to eliminate an “undefined index” error.

= 1.0 =
* Updated code to avoid conflicts with other plugins and themes that were resulting in "Fatal error: Cannot redeclare admin_register_head()" errors.
* Consolidated plugin styles (CSS) into one stylesheet, instead of having some inline styles scattered throughout the code.
* Whitelist/Blacklist options are now collapsible (and collapsed by default).
* Minor miscellaneous visual improvements.

= 0.8 =
* Initial release (beta version).

== Upgrade Notice ==

* No upgrades available.
