=== GP Live Export ===
Contributors: mayukojpn, pedromendonca
Tags: GlotPress
Requires at least: 4.8
Tested up to: 4.8
Stable tag: trunk
Requires PHP: 5.6
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Convert your WordPress site into all-in-one translation toolkit with editor and preview sandbox. GlotPress plugin required.

== Description ==

Convert your WordPress site into all-in-one translation toolkit with editor and preview sandbox. GlotPress plugin required.

This plugin allows you to export and save translations from GlotPress directly to the site language directory (wp-content/languages) by one click from WordPress dashboard, so that you can review translations on actual applied place while editing translation.

== Installation ==

1. Install and activate [GlotPress](https://wordpress.org/plugins/glotpress/) plugin through the 'Plugins' screen in WordPress.
1. Install and activate [GP Live Export](https://wordpress.org/plugins/gp-live-export/) plugin through the 'Plugins' screen in WordPress.
1. Install and activate any WordPress theme/plugin you desire to translate.
1. Access `[home_url]/glotpress/` and setup some project / translation set.

== Frequently Asked Questions ==

= How can I translate WordPress themes & plugins? =

Set up project as below:

1. Add a new parent project. For plugins, add a name as `Plugins` and a slug as `wp-plugins`. For themes, add a name as `Themes` and a slug as `wp-themes`. That setting will work to find right directory when exporting `.po` and `.mo` files.
1. Add a new project, input theme/plugin name and slug as same as actual plugin and assign parent project.
1. Import original strings by any way. Upload `.pot` file or use any import plugin.
1. Set translation set. Select locale which you'd like to translate. Click `use as name` and leave a slug field as `default`.
1. Translate any string.
1. Now you can use live export from GP live export option page.

= How can I translate WordPress core? =

Please wait for future updates!

= How can I contribute to the plugin? =

Drop by the [GitHub repository](https://github.com/mayukojpn/gp-live-export)!


== Screenshots ==

1. Demo - applying translations for strings "New Paragraph" and "Paragraph" on Gutenberg. Add translation on GlotPress then export translation file from GP live export screen.

== Changelog ==

= 0.1 =
* initial release.

= 0.2 =
* Fix `is_plugin_active` error.

= 0.3 =
* Add instruction for seting up first project.
* Add translation set support.

= 0.3.1 =
* Export files with WordPress locale (wp_locale) props @pedromendonca
