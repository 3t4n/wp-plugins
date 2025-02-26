=== Alternative Theme Switcher ===
Contributors: Frederic Vauchelles, Cathy Vauchelles
Donate link: http://fredpointzero.com
Tags: alternative, theme, switcher, plugin
Requires at least: 2.8.3
Tested up to: 2.8.3
Stable tag: 0.1.1

Enable user to select their favorite theme or alternative theme while visiting your blog.

== Description ==

Althernative Theme Switcher make user able to switch the theme of your blog.

Admins can select which theme can be selected, and users can choose betwteen those themes and display it !

== Installation ==

1.	Download the plugin
1.	Copy the directory under your wp-content/plugins
1.	Enable the plugin in your admin pages
1.	Configure the plugin

That's all !

== Frequently Asked Questions ==

= How do I render the widget ? =
To render the switcher, just paste the following code where you want to display it :
<php if ( class_exists( 'altThemeSwitcher' ) ) altThemeSwitcher::getInstance()->render();?>

= Where can I find translation files ? =
All translation files can be found in the lang subdirectory. It contains pot, po and mo files.

== About switchable themes ==

There are two kinds of switchable theme. First, you have two themes under your wp-content/themes directory with the same layout !
Then, you can choose in your admin these themes.

Second, you have one theme and you want to switch only few elements in your current theme.
To do this, you can make an alternative theme.
Create a directory altThemes in your theme directory and a subdirectory for each alternative theme.
Keep in mind that the name of the directory will be the name of the subtheme.
Finally, create a style.css under your alternative theme and place your css rules insides.

Do not forget that if the rules you want to switch are also defined in mainTheme/style.css,
you may need to add the !important rule at the end of your alternative css rules.

Enjoy !

== Screenshots ==

1. Widget screen shot #1
1. Widget screen shot #2
1. Back office screen shot

== Changelog ==

= 0.1.1 =
* Object oriented code
* Singleton pattern used for the plugin (easier to call widget functions)

= 0.1 =
* Initial widget

