=== Add Locale Class ===
Contributors: maxfoundry, AlanP57
Tags: language class, CSS language class, render CSS acording to language setting
Requires at least: 2.8
Tested up to: 6.4
Stable tag: 1.0.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Render CSS According to a Site's Current Language

== Description ==
On multi language sites there may be occasions when you want to render CSS according to the current language in use. The Add Local Class plugin solves this problem by adding the current language code as a class in the body tag on both front end and admin pages.

For example, if you set the language of the site to French, then the language code used is fr_FR. Add Local Class will retrieve the language code format it as 'locale-fr-fr' and add it to the body tags on the front end of the site. It will also retrieve the language code of the backend user and set it as a body tag class on the back end of the site. Should the site's language be changed to U.S. English, then the class would be changed to 'locale-en-us'.

In your CSS file you can have one rule for French and another for English:

. locale-fr-fr .button {
background-color: blue;
}

. locale-en-us .button {
background-color: red;
}


With the Add Local Class plugin it possible to make use of language specific CSS on your site.

This plugin does not have a settings page. You simple install and activate it.

The Add Local Class plugin is brought to you by Max Foundry. We make a [WordPress Gallery plugin](https://maxgalleria.com/), a plugin for [WordPress media library folders](https://maxgalleria.com/downloads/media-library-plus-pro/) and [MaxButtons](https://maxbuttons.com/).


== Installation ==

Upload and unzip the plugin in your Plugins folder. Go to your Plugins page and activate Add Local Class.

== Changelog ==
= 1.0.5 =
* Tested with Wordpress 6.4

= 1.0.4 =
* Tested with Wordpress 6.1

= 1.0.3 =
* Tested with Wordpress 5.9.3

= 1.0.2 =
* Tested with Wordpress 5.5

= 1.0.1 =
* Added test for classes as an array

= 1.0.0 =
* Initial Release
