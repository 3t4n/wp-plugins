=== Custom Google Talk Chatback ===
Contributors: MrVictor
Donate link: http://intervaro.se
Tags: google, google talk, google talk chatback, gtalk, jabber, chat, instant message, support, online support, live support, live help, online chat, web chat, live chat, contact, contact form, widget, shortcode, template tag, plugin, links, sidebar
Requires at least: 2.5
Tested up to: 3.1
Stable tag: 1.2.1

Easily embed Goole Talk Chatback on your site for online chat support. Widget, Shortcode and Template Tag support!

== Description ==

Embed links to your Google Talk Chatback. Display different things when online or offline. The plugin is made to be highly customizable.

###Features

* Custom "start chat link" and "offline text". Use text or image.
* Display things depending on if the user is online or offline
* Widget, Shortcode and Template Tag support
* Translatable (send them to us if you make any)


###Contact

Go to the [Plugin Home Page over at Intervaro Web Agency](http://intervaro.se/custom-google-talk-chatback-wordpress-plugin) to give feedback or propose a feature!

Special thanks to [Israelwebdev](http://israelwebdev.wordpress.com/2009/02/05/google-talk-status-api-in-php) who made the script that makes it possible to check if a user is online or offline.

== Installation ==

1. Upload `custom-google-talk-chatback` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Find your personal Google Talk Hash Key (ID), see below
1. Add the widget, insert shortcode into the WYSIWYG or use template tag in your theme template.

###The Google Talk Hash Key (ID)

To use this plugin you first need to know what you hash key is for your Google Talk account. The hash key is the string containing characters and numbers, found between the *tk=* and *&* at http://www.google.com/talk/service/badge/New or for domain users, at: http://www.google.com/talk/service/a/**YOUR-DOMAIN-HERE**/badge/New


###Widget instructions

Just drag the widget to the prefered sidebar and set it up as wanted.

###Shortcode instructions

There are 3 shortcodes available.

[gtalk hash="" link="" offline=""]
*Prints a link to start chat or a text message if offline*

* Hash: your hash key (ID) for Google Talk Chatback
* Link: link text
* Offline (optional): text if offline

[gtalk_online hash=""] [/gtalk_online]
*Content inside shortcode will only be displayed if user is online*

[gtalk_offline hash=""] [/gtalk_offline]
*Content inside shortcode will only be displayed if user is offline*

###Template Tag instructions

`<?php gtalk_status( $hash ) ?>`

*Returns 1 (true) if online and 0 (false) if offline*

`<?php gtalk_link( $hash, $link ) ?>`

*Returns a link to start chat*

* Hash: your hash key (ID) for Google Talk Chatback
* Link: link text or image (HTML)

== Frequently Asked Questions ==

None yet.. Have one? Visit the [Custom Google Talk Plugin Homepage](http://intervaro.se/custom-google-talk-chatback-wordpress-plugin) 

== Screenshots ==

1. Widget settings
2. Widget example

== Changelog ==

= 1.2 =

* Fixed Bugs:
	* Loading translation files

== Upgrade Notice ==