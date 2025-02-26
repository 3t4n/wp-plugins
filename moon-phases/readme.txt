=== Plugin Name ===
Contributors: ppaquet
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=5162912
Tags: astrology, astronomy, moon, phase, phases, shortcode, sidebar, sidebars, widget, widgets, zodiac
Requires at least: 2.8
Tested up to: 3.8.1
Stable tag: 3.1.1

Adds a sidebar widget that display the current moon phase.



== Description ==

Adds a sidebar widget that display the current moon phase. The plugin can also display in which zodiac sign the moon is, how old the moon is and details like distance, ecliptic latitude and ecliptic longitude.

In addition of English, the plugin comes with various translations:

* Bulgarian
* Dutch
* French
* German
* Hebrew
* Hungarian
* Lithuanian
* Polish
* Russian
* Spanish

Translations credits go to Alex Kortan for Polish, Asen Kovachev for Bulgarian, [Fat Cower](http://www.fatcow.com/ "Fat Cower") for Russian, Kristina R for Lithuanian, Milly Rondèl for Dutch, Patsy for German, Rami Yushuvaev for Hebrew, Tamas Koos for Hungarian and Zhares for Spanish.

Please refer to the [WordPress Codex](http://codex.wordpress.org/Installing_WordPress_in_Your_Language "Installing WordPress in Your Language") for more information about activating the translation.

If you want to help translating the plugin to your language, please contact me. If you already know how to translate wordpress plugins, have a look at the moon-phases.pot file which contains all the definitions. You may use a [gettext](http://www.gnu.org/software/gettext/) editor like [Poedit](http://www.poedit.net/) for that purpose.



== Screenshots ==

1. Widget
2. Widget control panel



== Installation ==

1. Unpack the *.zip file and extract the /moon-phases/ folder and the files.
2. Using an FTP program, upload the full /moon-phases/ folder to your WordPress plugins directory (Example: /wp-content/plugins).
3. Go to Plugins > Installed, activate the plugin.
4. Go to Appearance > Widgets, add the widget to a sidebar and save.



== Changelog ==

= 3.1.1 =
* Compatibility check with WordPress 3.8.1

= 3.1 =
* Compatibility check with WordPress 2.8.2
* Update of the Lithuanian translation
* Integration of the Russian translation

= 3.0 =
* Compatibility check with WordPress 2.8.1
* New WordPress 2.8 widget structure
* New [moon-phases] shortcode

= 2.2.1 =
* Compatibility check with WordPress 2.8

= 2.2 =
* Integration of the Bulgarian translation
* Integration of the Hebrew translation
* Integration of the Polish translation
* Internal changes to improve compatibility
* Fixed the distance to the earth that was displaying the moon age

= 2.1 =
* Integration of the German translation
* Integration of the Lithuanian translation
* Integration of the Spanish translation
* The moon sign is now based on the vernal equinox

= 2.0 =
* Integration of the Dutch translation
* Integration of the French translation
* Integration of the Hungarian translation

= 1.0 =
* Initial release



== Frequently Asked Questions ==

= Why is the widget displaying the wrong moon sign? =
First of all, the plugin display the moon sign, not the sun sign which is the one that astrology web site usually talk about. Calculations for the moon sign are done for the northern hemisphere in local time, so you may see differences with other websites as some of them display the moon sign calculated in universal time (GMT). For example, Joe’s Web Tools server is in Los Angeles and display the correct calculations for pacific standard time (GMT-8).

= Is the plugin compatible with versions of WordPress ealier to 2.8? =
No. Because of the new widget implementation, you need to use WordPress 2.8 or later. If you are using an earlier version of WordPress, you can try using Moon Phases version 2.2.1 but, really, you should upgrade.

= How can I support this plugin? =
If you enjoy this plugin and would like to help with the development, please consider [donating](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=5162912). Otherwise, spread the word, report bugs and give this plugin a good rating.

= How do I report a bug? =
If you find any bugs with the plugin or if you have any suggestions, please go to [the Moon Phases plugin homepage](http://www.joeswebtools.com/wordpress-plugins/moon-phases/) and leave a comment to let me know.
