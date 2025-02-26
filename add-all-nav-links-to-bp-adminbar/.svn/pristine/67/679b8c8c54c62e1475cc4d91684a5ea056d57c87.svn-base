=== Add All Nav Links to BP Adminbar ===
Author: pcwriter (Patrick Cohen)
Credits: hnla (for tireless tutoring), r-a-y, DJPaul, LPH2005 (for essential code adjustments), takeo, animeonsen, JediSthlm (for the ideas and original code snippets that inspired this plugin)
Author URI: http://nowrecovery.com/justfunstuff/2010/08/15/add-all-nav-links-to-bp-adminbar/
Donate link: https://www.paypal.com/ca/cgi-bin/webscr?cmd=_flow&SESSION=BSqQPsnJDbuc66awFymAI2Atq5YdHUfW142TexRsiqz4WTm1pdhnNInxWyO&dispatch=5885d80a13c0db1f8e263663d3faee8d4b3d02051cb40a5393d96fec50118c72
Tags: BuddyPress, navbar, adminbar, menu
Requires at least: WordPress 2.9.2 / BuddyPress 1.2.3
Tested up to: WordPress 3.0.1 / BuddyPress 1.2.6
Stable tag: 2.1.2
Automatically include dropdowns of all Buddypress component and Wordpress menus in the BP Adminbar.


== Description ==
Do you, or your users, find having 2 navigation elements a bit confusing? This plugin can aggregate all Buddypress components and Wordpress pages/menus into the BP Adminbar.

It provides several user configuration options so you can customize your new admin/navbar to your heart's content. As of this version, you can also use this plugin just to theme your existing bp-adminbar without adding anything to it. See the FAQ for more.

When the "Add Wordpress pages" or "Add Buddypress components" features are enabled, all BP component directory pages (Members, Groups, Forums, etc.) are collected in a Community dropdown, including any from added plugins like BP-Links or BP-Gallery. All WP pages appear in dropdowns that respect whatever page order you have set in your WP backend. Under WP3, they will reflect the page order you set when creating your custom menus. Child and grandchild pages appear in flyout subnavs.

The plugin code uses standard BP slugs, so if you've changed those (through bp-custom or wp-config or whatever other method), they should show as you've labeled them.

All CSS (position, colors, sizes, etc.) can be controlled through your Wordpress dashboard under "Settings" > "BP-WP-Navbar" once installed. Make your life easier (and mine too) by using Firefox with the Firebug addon for this!

If you find this plugin useful or just fun to play with, please show your appreciation by making a small donation to help support addiction recovery at http://nowrecovery.com (donate button in the sidebar). You can view a live demo there too.


== Installation ==

1. Upload the add-all-nav-links-to-bp-adminbar folder to the /wp-content/plugins/ directory
2. Activate the "Add All Nav Links to BP Adminbar" plugin through the "Plugins" menu in WordPress
3. Configure options in your Wordpress Dashboard under "Settings" > "BP-WP-Navbar".


 == Screenshots ==
 
1. Logged out views
2. Logged in views
3. Much easier to find the setting you want with the new paginated admin panel (under "Settings" > "BP-WP-Navbar")

== Frequently Asked Questions ==
<strong>What options can I configure under "Settings" > "BP-WP-Navbar"?</strong><br />
<em>Under "Feature Options", you can...</em><br />
- Hide or display the main theme navigation<br />
- Hide or display the site name in your new adminbar<br />
- Hide or display the Login and Signup links when logged out<br />
- Hide or display the "Visit Random" menu<br />
- Enable or disable the addition of Wordpress pages/menus<br />
- Enable or disable the addition of Buddypress components<br />
- Enable or disable "Scroll with pages" (this <em>unsticks</em> the adminbar from the top of your screen and inserts it relative to your theme)<br />
<em>Under "Labels &amp; Fonts", you can...</em><br />
- Select whether to display top-level Wordpress 2.x pages horizontally or in a dropdown menu<br />
- Define the label for the Wordpress 2.x page dropdown (if enabled)<br />
- For WP3.x installs, 5 menu locations are available under "Appearance" > "Menus" (see the "Help" under the "Labels &amp; Fonts" tab for more)<br />
- Define the label for the Buddypress directory dropdown (default = "Community")<br />
- Define the font, along with the size, weight and style for all menu items<br />
<em>Under "Color Scheme", you can...</em><br />
- Define ALL colors: navbar background, main and sub menu item backgrounds, border, text and hover colors too<br />
<em>Under "Sizes &amp; Position", you can...</em><br />
- Set the overall width of the navbar and of sub-menus<br />
- Set the height of all menu items<br />
- Adjust margins and padding where required<br />
- Offset your fancy new custom navbar vertically and/or horizontally to reposition it anywhere you like

<strong>I'm running WPMU (or WP-Multisite). Does this plugin affect the adminbar on member sub-blogs too?</strong><br />
No. This plugin combines all nav elements on the main site only. The adminbar on sub-blogs remains unchanged.

<strong>I'm running WP2.x. How can I prevent specific WP pages from appearing in the menus?</strong><br />
In Wordpress 2.x installs, this plugin will show ALL your pages in dropdowns by default. If you want to exclude certain WP2.x pages from your menu, install Simon Wheatley's excellent "Exclude Pages from Navigation" plugin. You can install it through your Wordpress dashboard or download it from the repository here: http://wordpress.org/extend/plugins/exclude-pages/ But even with the "Exclude Pages" plugin installed, invisible gremlins may cause some WP pages to appear in the backend in some installs (it happened to me). If this happens, go to line 159 of bp-wp-navbar.php and add a comma seperated list of the page IDs of those you want to make go away. Example: wp_list_pages( 'title_li=&depth=20&exclude=100,222,345,1499' );

<strong>Does this plugin work with any theme?</strong><br />
It modifies the behavior of the bp-adminbar, so if Buddypress is installed and your theme is a child theme of bp-default, it will work. Some custom themes may require code adjustments in bp-wp-navbar.php. For example, the user configuration option to hide/show the main nav targets "ul#nav". If your theme uses a different container ID for its main navigation, and you want the plugin to hide it, you will need to change that ID in the hide_main_nav function in bp-wp-navbar.php.

<strong>Can I change my Buddypress component slugs with this plugin?</strong><br />
No. It is not advisable for a plugin to change labels or slugs. See the Buddypress codex <a href="http://codex.buddypress.org/how-to-guides/customizing-labels-messages-and-urls/">here</a> to learn how to do it the right way.

<strong>I love this thing! Where can I donate?</strong><br />
You can show your love by making a donation to help support addiction recovery here: http://nowrecovery.com (donate button in the sidebar).<br />
<strong>Thanks!</strong>


== Changelog ==

= 2.1.2 =
Bug fix! Some users were finding that WP/BP menus were not displaying at all. Yikes! It turns out this was mainly (if not exclusively) on WP3single installs.
After some hunting, a small modification to a conditional squashed this bug (using BP_ROOT_BLOG instead of blog_id). Thanks to LPH2005 for helping out on this one!

= 2.1.1 =
Added the ability to enable or disable the addition of Wordpress pages and/or Buddypress components (it&#39;s up to you to decide, not the plugin!)<br />
Added the ability to simply resize and/or reposition the adminbar without having it scroll with your pages (this should be up to you too)<br />
Cleaned up the admin section by moving all the help &amp; additional info to a side panel revealed on mouseover for each feature

= 2.1 =
Dashboard admin panel paginated and enhanced to include all the fun user configuration options listed in the FAQ!<br />
WP3 custom menu titles are now fetched and displayed automatically... you still need to create your own menus though ;-)

= 2.0 =
Added dashboard admin panel. Options can now be configured without editing files!

= 0.1.2 =
Added user configuration option to show or hide the WP navbar.<br />
Added user configuration option to show or hide the site name/logo.<br />
Added user configuration option to show or hide Login/Signup links.<br />
Added user configuration option to show or hide the Visit Random Member etc menu.<br />
Added user configuration options for horizontal or vertical display of WP pages in adminbar.<br />
Added user configuration options to change labels of vertical WP pages and BP directory dropdowns.<br />
Added a fully commented css file to help get you started with a brand new look for your adminbar.

= 0.1.1 =
Added checks to use new WP3.0 menu functions if that version is detected.<br />
Added dropdown options for Wordpress pages. (Thanks to hnla for both of these additions!)

= 0.1 =
Initial release (hurray!)


== Upgrade Notice ==

...None yet...