=== Plugin Name ===
Contributors: fabio.mazzarino
Requires at least: 2.8
Tested up to: 2.8.4
Stable tag: 0.4.2
Tags: Post,Page,more,Adsense,banners

In-Post Template plugin add additional content to posts and pages, inside the_content() data result.

== Description ==
In-Post Template plugin add additional content to posts and pages, inside the_content() data result. It can be used to add sitewide content like AdSense, banners and plugins.

It accepts to insert html, java script, embedded content, php and even others plugins. Template tags are also accepted.

It replaces a special mark added inside the post which can be the <!--more--> mark or any other configured.

== Installation ==
1. Upload the In-Post Template plugin directory on the wp-content/plugins directory.
2. Activate the plugin on the plugins page in Wordpress administration interface
3. Configure the additional content and the mark on the configuration section in Wordpress administration interface
4. The template will be inserted on the page-break mark <!--more-->

== Changelog ==
= 0.1 =
* Fully functional plugin
* Static text configuration
* Insertion after <!–more–> mark on posts and pages.

= 0.2 = 
* Works only on single post/page
* Configurable behaviour when no mark found

= 0.3 =
* Accepts PHP code on insertable content as a Wordpress Template

= 0.4 =
* Added support to alternate content (when no more tag is found)

= 0.4.1 =
* Fixed a bug when no alternative template is defined

= 0.4.2 = 
* Fixed a bug on after post alternative template
