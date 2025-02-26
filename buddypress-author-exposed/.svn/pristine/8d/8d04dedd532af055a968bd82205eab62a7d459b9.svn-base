=== BuddyPress Author Exposed ===
Contributors: muraii, clsigor, jjj
Tags: author, info
Requires at least: 2.0
Tested up to: 2.8.4
Stable tag: 0.1

Display metadata about post author: name, email, website, and BuddyPress profile.

== Description ==


This plugin does the same thing as the the_author tag, displays the author name, however this one is linked to a hidden div(layer). Once you click on the author name the hidden div will show up together with the author details (taken from author profile page) plus the gravatar photo if the author has one, as well as a link to the author's BuddyPress profile. If not, the default gravatar photo would be used.

This is a refinement of Igor Penjivrag's Author Exposed plugin, released in 2008.  See http://colorlightstudio.com/2008/03/14/wordpress-plugin-author-exposed/ for that plugin.

This plugin was developed specifically for use with WordPress MU and BuddyPress.  It will work with Wordpress, but the author link (my main point of interest) won't be operable.  That may change in a future version/adaptation of the plugin.

*   Comes with separate css file for easier modification.


== Installation ==

Best used with BuddyPress (which implies WordPress MU).

1. Upload whole `bp_author_exposed` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place the following inside the loop, where you want the author link to appear.
    `<?php
      if (function_exists('bp_author_exposed')) {
        bp_author_exposed();
        } else {
        the_author_posts_link();
        }
     ?>'

== Changelog ==

= 0.1 =
* Initial release