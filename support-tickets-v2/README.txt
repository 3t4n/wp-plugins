=== Support Tickets v2 ===
Contributors: kezakez
Tags: support, support tickets, helpdesk, ajax, captcha, akismet, WPML, multilingual
Requires at least: 2.8
Tested up to: 3.4.1
Stable tag: 2.0.1

With this plugin, you can manage a simple support ticket system on your WordPress site.

== Description ==

Support Tickets is a WordPress plugin which allows you to create and manage a simple support ticket system or helpdesk system on your WordPress site. If you are offering a support service and are looking for a simple tool to help you with that, Support Tickets is an excellent choice.

This code has been forked with the permission of the original author Takayuki Miyoshi @takayukister
This fork contains bug fixes.
The original code can be found at http://wordpress.org/extend/plugins/support-tickets/

The plugin is based on [Contact Form 7](http://contactform7.com/) plugin.

**[Home page](http://www.keza.net/support-tickets-v2/)**

= Multilingual Support =

You will have the ability to make a "multilingual support ticket system" with this plugin. This plugin allows you to write messages in your language and ask a professional translator to translate your message to another user's language. This feature utilize the [WPML](http://wpml.org/) plugin, so you need to install the plugin beforehand.

= Translators =

* Italian (it_IT) - [Gianni Diurno](http://gidibao.net/)
* Japanese (ja) - [Takayuki Miyoshi](http://ideasilo.wordpress.com)

== Installation ==

1. Upload the entire `support-tickets-v2` folder to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.

You will find 'Support' menu in your WordPress admin panel.

== Frequently Asked Questions ==

If you have questions, please check the [Home page](http://www.keza.net/support-tickets-v2/).

== Screenshots ==

1. screenshot-1.png

== Changelog ==

= 2.0.1 =
* Addressed an issue that caused the ajax posting method to fail.
* Added the ability to mark a ticket as read.
* Ensured that multiline fields display multiple lines in the ticket admin page.
* Made the ticket number display tickets admin page.

= 1.0.1 =
* Bug fix: Additional fields don't show up.
* Bug fix: Backslashes disappear.
* Call $captcha->cleanup() if callable. Shorten cleanup period to 1h.
