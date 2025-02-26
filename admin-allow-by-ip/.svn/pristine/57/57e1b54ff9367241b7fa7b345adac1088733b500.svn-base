=== Admin Allow by IP ===
Contributors: apsaraaruna
Donate link: https://profiles.wordpress.org/apsaraaruna/
Tags: securityadmin, spam, wp security, wp security whitelist ip, wp admin login, wp admin wordpress, wp admin page, 
Requires at least: 5.0
Requires PHP: 5.6+
Tested up to: 6.3.2
Stable tag: 1.0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Protect your admin form hackers!. You can allow your wp-admin for specific IP(s).

== Description ==

Protect your admin form hackers!. You can allow your wp-admin for specific IP(s).

You can select redirect after blocked wp-admin to others. and also you can customize as you want. we provide sample landing page [here](https://github.com/apsaraaruna/maintenance-landing "Landing page")

Also see my other plugins 
* [Easy Subscribe Button Widget](https://wordpress.org/plugins/widget-youtube-subscribtion/ "Easy Subscribe Button Widget") <br>
* [Easy Embed Page Widget](https://wordpress.org/plugins/embed-page-facebook/ "Easy Embed Page Widget")

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload `admin-allow-by-ip.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Settings -> Admin block

== Frequently Asked Questions ==
= Is this work with multisite =

Can use with multisite. but need set on single site.

= How to reset plugin from Database level =

just run following query on you database sql. make sure change table prefix
~~~~sql
UPDATE wp_options 
SET option_value = 'a:3:{s:14:\"enable_devmode\";s:1:\"0\";s:13:\"hide_wplogins\";s:10:\"127.0.0.1,\";s:16:\"direction_option\";s:16:\"home-page\";}' 
WHERE wp_options.option_name = 'abbi_options_advanced_options' 
ORDER BY option_id 
DESC LIMIT 1; 
~~~~

== Screenshots ==

1. Settings options
2. Redirection option
3. If not located in 'maintenence.html'
4. Located in 'maintenence.html'
5. Root folder

== Changelog ==

= 1.0.1 =
* Redirection option added.

= 1.0.0 =
* Fresh copy

== Upgrade Notice ==

We are improving our security with matching with wordpress updates. make you sure your plugin up to date.