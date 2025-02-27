=== Fix Email Return-Path ===
Contributors: mishalpatel
Tags: phpmailer, sender, return-path, 
Requires at least: 3.0.1
Tested up to: 5.5.1
Stable tag: 5.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Simple plugin that sets the PHPMailer->Sender variable so that the return-path is correctly set when using wp_mail.

== Description ==

This plugin sets the PHPMailer Sender (return-path) the same as the From address if it's not correctly set.

== Installation ==

1. Unzip all files to the `/wp-content/plugins/` directory
2. Log into Wordpress admin and activate the 'Fix Email Return-Path' plugin through the 'Plugins' menu

== Changelog ==

= 1.0.5 =
* Change of Author

= 1.0.4 =
* Tested on 5.5.1

= 1.0.3 =
* Tested on 5.4.2

= 1.0.2 =
* Now only sets the sender if it's not already set with a valid email address.

= 1.0.1 =
* Tested on 4.7 

= 1.0.0 =
* Inital Release

= 0.0.1 =
* Beta Release
