=== Protect RSS ===
Contributors: silence
Donate link: http://www.silencesoft.net/
Tags: rss, password
Requires at least: 2.0.2
Tested up to: 2.8
Stable tag: 0.1

A plugin to protect rss feeds to only registered users with http authentication.

== Description ==

This is a plugin that allows http authentication to the rss feeds of blog.

The plugin is based on post "A test post for a short lived experiment" by Mark Down on:
http://blog.samdevore.com/archives/2004/12/10/another-test-post/

To work on some sites that runs php as cgi like dreamhost hosted you can add to the htaccess file:
  AddHandler application/x-httpd-php .php
Tip from: http://codestacker.com/codes/15-activing-php-auth-on-dreamhost

Tips to work on some other hosted sites are on article "HTTP Authentication with PHP running 
as CGI/SuExec" from Best Host Ratings blog:
http://www.besthostratings.com/articles/http-auth-php-cgi.html

== Installation ==

Upload `sil_protect_rss.php` to the `/wp-content/plugins/` directory and activate it.

== Changelog ==

= 0.1 =
* First release.
