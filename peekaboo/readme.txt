=== Peekaboo ===
Contributors: farinspace
Tags: posts, post, pages, page, links, plugin, show, hide, visible, hidden, reveal, display
Requires at least: 2.9.2
Tested up to: 3.0.1
Stable tag: 1.1

This plugin allows you to show and hide specific portions of content within a post or page. Visitors can then use custom show/hide links to show or hide the portions you've defined.

== Description ==

This plugin allows you to show and hide specific portions of content within a post or page. Visitors can then use custom show/hide links to show or hide the portions you've defined. The plugin enables a few WordPress shortcodes: `[peekaboo]`, `[peekaboo_link]` and `[peekaboo_content]`. 

**To learn more** read the [extended documentation](http://farinspace.com/wordpress-peekaboo-plugin/ "Peekaboo extended documentation").

== Installation ==

**The easiest way to install the plugin is to:**

1. Login to your wordpress installation
1. Go to the plugins section and select "Add New"
1. Perform a search for "Peekaboo"
1. Locate the Peekaboo plugin by "Dimas Begunoff"
1. Click the "Install" link in the actions column
1. Activate the plugin through the "Plugins" menu in WordPress

**If you've downloaded the latest plugin ZIP file:**

1. Login to your wordpress installation
1. Go to the plugins section and select "Add New"
1. Click the "Upload" link
1. Browse for the "Peekaboo.zip" file you downloaded
1. Click the "Install Now" button
1. Activate the plugin through the "Plugins" menu in WordPress

**If you've downloaded and extracted the latest plugin files:**

1. Upload the `Peekaboo` plugin folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Screenshots ==

1. Peekaboo will automatically generate your show/hide links, you can customize them however you want. Advanced users can use CSS to fine tune the look and feel.
2. Peekaboo shortcodes in action.
3. You can customize your Peekaboo links per post or globally.

== Changelog ==

= 1.1 =
* added support for collapsing all other content when showing a selected portion of content

= 1.0.10 =
* fixed plugin_dir variable for wordpress sites installed in a subdirectory

= 1.0.9 =
* adjusted correct js file version

= 1.0.8 =
* fixed issue with raw HTML content in peekaboo_link shortcodes

= 1.0.7 =
* plugin now calls do_shortcode() to process shortcodes within its content

= 1.0.6 =
* plugin permalink change

= 1.0.5 =
* fixed javascript link mislabel issue

= 1.0.4 =
* removed js console command

= 1.0.2 =
* fixed rate plugin link

= 1.0.1 =
* removed specific jquery 1.4 statements (:children) to make plugin be more backward compatible

= 1.0 =
* Initial release