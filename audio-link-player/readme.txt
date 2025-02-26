=== Audio Link Player ===
Contributors: dhoppe
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=1220480
Tags: post, page, media, mp3, jquery, jw_player, music, musik, player, audio, link
Requires at least: 3.0
Tested up to: 3.3
Stable tag: trunk

The Audio Link Player adds flash mp3 players to all your mp3 links.

== Description ==

This plug-in converts all your mp3 links in flash players. The usage is as easy as add a link to a post or page.

The plug-in differentiates between mp3 links in floating texts, mp3 links as images and mp3 links in lists or on single lines. For every situation the plug-in decides which is the best player solution and include it in your blog.

= Requirements =
* **Audio Link Player requires PHP5.2!**
* WordPress 3.0 or higher

= Settings =
You can change the association settings in WP Admin Panel &raquo; Settings &raquo; Audio Link Player.

= Handling =
The handling is very easy. Just add a link to a mp3 file in your post or page. The rest will be done by the plug-in. Of course you can also *link images* with mp3 files. These links will be converted to players which show the image and a play-icon in the middle of the image like you maybe know from video players. Give it a try! ;)

= Single Line Player =
You can overwrite the text inside the player by set a title for the mp3 link.

= Info for Designers =
The <object> tags of the players get the following classes: "inline-player", "single-line-player" and "image-link-player". And every player has the class "audio-link-player".

= In the press =
* Audio Link Player is one of the best WordPress plugins in May 2010 on [Ajaxline.com](http://www.ajaxline.com/). [To the post &raquo;](http://www.ajaxline.com/best-wordpress-plugins-may-2010)
* "Wordpress Audio Link Player eklentisi yazı içlerine tek mp3 çalan basit bi ortam oynatıcı eklemenize yardımcı oluyor." [To the post &raquo;](http://www.eklenti.net/wordpress-audio-link-player-mp3-calar-eklentisi)
* Wordpress, podcast, player - Jouer des fichiers audio dans Wordpress. [To the post &raquo;](http://social.hecube.net/blog/2010/05/19/wordpress-podcast-player-jouer-des-fichiers-audio-dans-wordpress/)


= Used Players =
The Plugin uses the following players:

* [XSPF Player](http://musicplayer.sourceforge.net/)
* [Audio Player](http://www.1pixelout.net/code/audio-player-wordpress-plugin/) from [1pixelout](http://www.1pixelout.net/) by Martin Laine
* [JW Player](http://www.longtailvideo.com/players/jw-flv-player/)

Thanks to the authors!

= Questions =
If you have any questions feel free to leave a comment in my blog. But please think about this: I will not add features, write customizations or write tutorials for free. Please think about a donation. I'm a human and to write code is hard work.

= Language =
* This Plug-in is available in English.
* Dieses Plugin ist in Deutsch verfügbar. ([Dennis Hoppe](http://dennishoppe.de/))
* Deze plugin is beschikbaar in het Nederlands. ([WordPress Webshop](http://wpwebshop.com/))

If you have translated this plug-in in your language feel free to send me the language file (.po file) via E-Mail with your name and this sentence translated in your language: "This plug-in is available in %YOUR_LANGUAGE_NAME%." So i can add it to the plug-in and link to your website from the plugin page if you want. You can also translate the single line player anatomy diagram. The file is attached as psd (Photoshop CS3).

You can find the *Translation.pot* file in the *language/* folder in the plug-in directory.

* Copy it.
* Rename it (to your language code).
* Translate everything.
* Send it via E-Mail to mail@DennisHoppe.de.
* Thats it. Thank you! =)

== Screenshots ==

1. A post with mp3 links and added flash players added by the plug-in.

== Installation ==

Installation as usual.

1. Unzip and Upload all files to a sub directory in "/wp-content/plugins/".
1. Activate the plug-in through the 'Plugins' menu in WordPress.
1. View a post or page which contains a link to a mp3 file.
1. (Adjust your personal settings in Admin Panel &raquo; Settings &raquo; Audio Link Player)
1. You like what you see?
1. Please think about a donation. :)

== Changelog ==

= 1.3.12 =
* Added new option to change the default volume
* Added new option to disable the clickable links in floating texts

= 1.3.11 =
* Added option to disable the referer check

= 1.3.10 =
* Security Patch against script/traffic hijacking! Update is recommended!
* Referer check in player-js.php

= 1.3.9 =
* Updated to JW Player 5.7

= 1.3.8 =
* Fixed the IE8 / Safari bug
* Added the classes "inline-player", "single-line-player" and "image-link-player" to the players

= 1.3.7 =
* Added "audio-link-player" class to flash <object> elements.

= 1.3.6 =
* Added Flash Window Mode option

= 1.3.5 =
* Added Javascript position option
* Cleaned Player Javascript
* Updated translation files

= 1.3.4 =
* Removed get_current_screen() call

= 1.3.3 =
* Changed JW Player Playing Bar height
* Changed Player wmode to "opaque"

= 1.3.2 =
* Added lighter JW Player skin
* Contribution Widget update

= 1.3.1 =
* compatibility tweaks for older jquery versions

= 1.3 =
* Code clean ups.
* updated to JW Player 5.6

= 1.2.5 =
* Added Dutch Translation by [WordPress Webshop](http://wpwebshop.com/)

= 1.2.4 =
* updated JW Player to 5.2
* Added AutoPlay functions for all players

= 1.2.3 =
* avoid directory listing

= 1.2.2 =
* You can easily revert back to the class single line player
* default height of the single line player is 24px now

= 1.2.1 =
* You can overwrite the text inside single line players by setting a title of the mp3 link

= 1.2 =
* Updated to the new Audio Player by 1pixelout
* updated screenshot-1.png
* Added option: width of the single line player (audio player by 1pixelout)
* updated donation plugin
* fixed "comma"-bug for mp3 links and titles (single line player)
* single line player shows now the link text as caption
* replaced the example images

= 1.1 =
* Complete rewrite of the JavaScript Code
* Updated all flash components
* Updated donation plugin
* Inserted options page

= 1.0.1 =
* Added screenshot to the readme
* Added donation message - please support open source! :)

= 1.0 =
* Everything works fine.