=== Persistent Styles ===
Contributors: cpoteet
Tags: styles, css, themes
Requires at least: 2.8
Tested up to: 3.0
Stable tag: 1.3

This plugin allows you to have persistent styles regardless of the theme, because this stylesheet is stored outside of the theme.

== Description ==

Changing styles is often a laborious process, and those styles can be lost when you change a theme but you maintain some functionality.  This plugin will allow you to have a style sheet that you can add styles regardless of your theme.

== Installation ==

1. Extract the ZIP file, and upload to /wp-content/plugins/
3. Ensure that persistent.css is set to CHMOD 777 for editing via admin interface
2. Activate the plugin

If you have use the plugin before please backup your persistent.css to prevent changes being overwritten during an upgrade.

Now in 2.8 you can use a new editor to edit all plugin files. Now when you go to Appearance > Persistent Styles you can edit them directly inside the admin interface! If you want to use the plugin with a previous version download the 1.2 tag.

== Note On CSS Inheritance ==

If, in your theme, you have the function wp_head() in the header.php file before your other style sheets it could conflict in your CSS inheritance, because they will be at a higher priority then the style sheets after the function call.  

I suggest having the wp_head() function place right before the end of the <head> section to remove any possible CSS conflicts.  You can add the !important attribute into your peristent style sheet that you want to have priority.

== Changelog ==

= 1.3 =

* Added editing of CSS via admin interface.

= 1.2 =

* Fixed file path and removed editing from admin section for 2.5.

= 1.1 =

* Added readme.txt

= 1.0 =

* Initial release.