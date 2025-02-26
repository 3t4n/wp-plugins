=== Anytheme Lock Theme ===
Contributors: olarmarius
Donate link: http://www.olarmarius.tk/
Tags: olar, lock, theme, locked-theme, freeze-design, design, any, change, plugin, anytheme, twentyten, design, twenty-eleven, stylesheet, template, lock-the-design
Requires at least: 3.5
Tested up to: 3.5.1
Stable tag: 1.1
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

This plugin is made to help developers to lock the design of the WP site, and the end user cannot change this design very easy.

== Description ==

This plugin lock the site at specific theme. You can activate any theme you want, the site will look like the locked theme.

Into the code of plugin there are 3 php variables. 
`<?php
$anytheme_lock_theme = 'Twenty Ten';
$anytheme_lock_stylesheet = 'twentyten';
$anytheme_lock_template = 'twentyten';
?>`

*	Those vars set the lock theme.
*	Once installed as a WordPress plugin, the lock theme is the only active theme that your site see.

== Installation ==

To install, simple extract the 'anytheme-lock-theme.php' file into your 'wp-content/plugins/' directory and activate the plugin.

You should make sure your lock theme exist.

== Frequently Asked Questions ==

= Why do you force me to change the php code? =

Just for one and the only reason:

Because this plugin is made to help developers to lock the design of the WP site, and the end user cannot change this design very easy.

= Where I find the correct template, stylesheet and theme vars? =

In plugin code, by default the locked  theme is Twenty Ten<br /><br />

`<?php
$anytheme_lock_theme = 'Twenty Ten'; 
$anytheme_lock_stylesheet = 'twentyten'; 
$anytheme_lock_template = 'twentyten'; 
?>`

If you want to set another lock theme you just have to modify these vars.

`<?php
$anytheme_lock_theme = 'The name of new lock theme';
$anytheme_lock_stylesheet = 'folder-name-of-theme-from-wp-content/themes';
$anytheme_lock_template = 'folder-name-of-theme-from-wp-content/themes';
?>`

*** usually the template and stylesheet have the same name


== Changelog ==
No changelog information


== Upgrade Notice ==

No update information

== Screenshots ==

1. The theme before I activate some theme.
2. The theme after I activate another theme. Obvious the look is not change.

== Further Information ==

More information can be found at
<a href="http://olarmarius.wordpress.com/2011/04/06/anytheme-lock-theme-wordpress-plugin/">anytheme-lock-theme-wordpress-plugin</a>
