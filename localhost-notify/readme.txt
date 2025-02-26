=== Localhost Notify ===
Contributors: netweblogic
Tags: Tags: localhost, developers, local, debugging
Requires at least: 2.7
Tested up to: 4.6
Stable tag: 2.1

Developer plugin for those working on live site copies. Adds "local |" to your title if WordPress is running off a local server.

== Description ==

This plugin is made for developers who work on local server copies of live WordPress installations, and want to know for sure if they're working on their local copy, not the live one!

The idea behind it is to help prevent accidental changes on live sites if you have multiple browser windows open including both the local and live site.

It's recommended you keep this plugin active on both your live and local installation. Otherwise, if you make a copy of your live server and overwrite your local one it may deactivate the plugin locally. The performance impact should be near 0 for keeping this active.

If you have any issues or suggestions, please visit our [support forums](https://wordpress.org/support/plugin/localhost-notify).

If you find this plugin useful and would like to say thanks, please leave us a [5 star review](https://wordpress.org/support/view/plugin-reviews/localhost-notify?filter=5)!

== Notes ==

Some themes/plugins may prevent us from changing the title. If that's the case, try disabling other plugins or reverting to a default WP theme and let us know the conflicting theme/plugin on our [support forums](https://wordpress.org/support/plugin/localhost-notify).

The plugin assumes your local server IP address is 127.0.0.1. If different you can change the value in the plugin file, [let us know your](https://wordpress.org/support/plugin/localhost-notify), maybe it's a consideration for improvement!

== Installation ==

1. [Install your plugin as you would any WordPress plugin](https://codex.wordpress.org/Managing_Plugins#Installing_Plugins).

2. Activate the plugin through the 'Plugins' menu in WordPress.

Alternatively, download the plugin and copy localhost-notify.php to your [Must Use Plugins folder](https://codex.wordpress.org/Must_Use_Plugins), it'll activate automatically.

== Frequently Asked Questions ==

None yet! Ask away on our [support forums](https://wordpress.org/support/plugin/localhost-notify).

== ChangeLog ==
= 2.1 =
* fixed php warning with WP SEO activated

= 2.0 =
* wrapped all functions in conditional check for localhost, preventing any extra filters/functions being created on live sites
* added compatability witih WP admin title rewriting introduced in WP 4.4
* fixed incompatabilities with BuddyPress and WordPress SEO