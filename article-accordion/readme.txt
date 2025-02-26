=== Article Accordion ===
Contributors: Frederic Vauchelles, Cathy Vauchelles
Donate link: http://fredpointzero.com
Tags: article, accordion, categorie, widget
Requires at least: 2.8.3
Tested up to: 2.8.4
Stable tag: 0.1.2

Article Accordion display articles of seletected categories in an accordion.

== Description ==

Article Accordion is a widget which can display in an accordion short excerpts of your lastest posts of selected categories.
This widget display these excerpts in an accordion in your sidebar (as a default behavior).

There are two ways two configure the widget :

*	You can go in the admin panel and choose your options there (if you chose to put the code below in your theme)
*	You can drag and drop the widget to your side bar and configure your options there
*	You can select the categories you want to be displayed inside your widget and the maximum number of article you want to display.

Enjoy !

== Installation ==

1.	Download the plugin
1.	Copy the directory under your wp-content/plugins
1.	Enable the plugin in your admin pages
1.	Configure the plugin

That’s all !

== Frequently Asked Questions ==

= How do I render the widget ? =
You can either drag and drop the widget in your sidebar or paste this sample of code where you want to display it :
<php if ( class_exists( ‘articleAccordion’ ) ) articleAccordion::getInstance()->render();?>

= Where can I find translation files ? =
All translation files can be found in the lang subdirectory. It contains pot, po and mo files.

== Screenshots ==

1. Widget screen shot
1. Back office screen shot

== Changelog ==

= 0.1.2 =
* Included file path are independant from the path of the directory where the plugin is.

= 0.1.1 =
* Object oriented code
* Singleton pattern used for the plugin (easier to call widget functions)

= 0.1 =
* Initial widget
