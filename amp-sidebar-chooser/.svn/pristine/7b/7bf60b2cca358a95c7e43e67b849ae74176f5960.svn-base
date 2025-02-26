=== AMP Sidebar Chooser ===
Contributors: amp343
Donate link: http://www.andrewmpeters.com/wordpress-plugins/amp-sidebar-chooser/
Tags: sidebar, sidebars
Requires at least: 3.0	
Tested up to: 3.1.3
Stable tag: 0.2.1

AMP Sidebar Chooser allows users to associate sidebars to posts, pages, or any custom post type through the WordPress post editor.

== Description ==

AMP Sidebar Chooser allows users to associate sidebars to posts, pages, or any custom post type through the WordPress post editor.

== Installation ==

1. Upload the 'amp_sidebar_chooser' folder to your `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Replace `<?php get_sidebar(); ?>` with `<?php amp_get_sidebar(); ?>` in your templates
1. Log into the Wordpress admin area, and select a post, page, or custom post type to edit.
1. Choose from one of the available sidebars in the AMP Sidebar Chooser meta box to assign a sidebar to this post.

== Frequently Asked Questions ==

= Why does this plugin use an arbitrary tag rather than hooking into the existing function `get_sidebar()` ? =

At this time, no filters exist that can manipulate the native function `get_sidebar()` sufficiently. Rather than offer a compromised solution with `get_sidebar()`, we've opted to create an arbitrary function (`amp_get_sidebar()`) until better manipulation of the native function is possible.

= Where does the list of available sidebars in the post editor meta box come from? =

The plugin browses your active theme file to get a list of all available sidebar files that exist. Sidebars must be named with the common convention "sidebar-(sidebarname).php". The display name that shows up in the sidebar chooser is the parsed filename -- ie, sidebar-right.php becomes "Right".

= What happens if a sidebar is not defined for a particular post? In other words, what is the default functionality? =

At this time, if not sidebar is selected for each post, the option "(None)" is selected, and no sidebar will be shown. We are working on a global setting for the next release that will allow you to choose what you want the default sidebar to be.  

== Changelog ==

= 0.1 =
* First version of AMP Sidebar Chooser released
* Custom post type support added
* Support for Default and (None) sidebars added

= 0.2 =
* Bad notation fixed in functions/functions.php