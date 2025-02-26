=== Remove Meta Generators ===
Contributors: webbernaut
Donate link: https://www.paypal.me/webbernaut
Tags: remove meta generator, meta, meta generator, remove, generator, plugin version, plugin meta generator, wordpress meta generator, bot, hide, obfuscate, protect, protection, robots, secure, security
Requires at least: 1.0
Tested up to: 6.7.1
Stable tag: 1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Remove all meta generator tags for all plugins. No settings necessary! Install and activate.

== Description ==

This plugin removes all Meta Generator html tags (even WordPress core generator). Simple and easy to use, just install, activate and you will no longer have meta generator tags in your html/source code.

No need to know or learn all the plugin meta generator hooks, this plugin covers all and any plugin that uses &lt;meta name="generator" content="Plugin Name Version 1.0.0" /&gt;

Over 2k plugins with known vulnerabilities, don't let the plugin write it's version number for easy access for exploiting a vulnerable version.

== Installation ==

1. Install and Activate the plugin on the Plugins page

== Changelog ==

= 1.1 =
* Modified regex expression for tighter control over meta generator tags as to not spill over to other tags for edge cases.
* Adjusted add_action from `get_header` to `template_redirect` for start of regex to accommodate new WordPress themes that are starting to get away from traditional WordPress theme structure and more javascript focused and not calling header templates in traditional ways via wp_head() i.e. TwentyTwentyFour Theme
* Order of Action hooks for reference https://developer.wordpress.org/apis/hooks/action-reference/