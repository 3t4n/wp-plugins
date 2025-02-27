=== ELI's Related Posts Footer Links and Widget ===
Plugin Name: ELI's Related Posts Footer Links and Widget
Plugin URI: http://wordpress.ieonly.com/category/my-plugins/related-posts-widget/
Author: Eli Scheetz
Author URI: http://wordpress.ieonly.com/category/my-plugins/
Contributors: scheeeli
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=DA2ZHJKU5EB68
Tags: plugin, sidebar, widget, post, date, excerpts, links, list, related posts, footer, tag, tags, category, categories
Stable tag: 1.2.04.20
Version: 1.2.04.20
Requires at least: 2.6
Tested up to: 3.3.2

Display a linked list of related Posts by Tags or Categories at the bottom of every post or on the sidebar. Options to show Post Date and Excerpts.

== Description ==

This Related Posts Plugin for WordPress displays links to a given number of Posts that are related to the current post(s) by Tags or Categories. It can Automatically add links to Related Posts at the bottom of every Post or you can drop the Widget on your sidebar.

Settings: Excluding posts, categories, and tags; section heading; number of links; display post date; and excerpts.

Updated Apr-27th

== Installation ==

1. Download and unzip the plugin into your WordPress plugins directory (usually `/wp-content/plugins/`).
1. Activate the plugin through the 'Plugins' menu in your WordPress Admin.

== Frequently Asked Questions ==

= What do I do after I activate the Plugin? =

Turn on Automatic Related Links in the footer of your posts from the RelatedPosts -> Setting menu.
or ...
Go to the Widgets menu in the WordPress Admin and add the "Related Posts" Widget to your Sidebar or Footer Area.

= Why am I not seeing the Widget on my site after I add it to the sidebar? =

The Widgets only shows up on pages that contain a single Post unless you are using "Tree View" and uncheck "Only show on pages with a single post".

= What if my WordPress Themes does not even show the Sidebar on Single Posts? =

You can still use the Widget by adding it to the Footer Area. Or, on pages that have more than one post, You can use the "Tree View" and uncheck "Only show on pages with a single post". Or you can set "Automatically add links to Related Posts at the bottom of every Post" to "yes" on the Related Posts Settings page.

= How and where do I add a custom colors or style to change the look of the post links? =

Each related post is wrapped in a LI tag with the class of "SPOSTARBUST-Related-Post", so you can just create a style sheet or add styles to an existing style sheet.
For Example: .SPOSTARBUST-Related-Post {list-style-image: url(images/bullet.png);} .SPOSTARBUST-Related-Post a:hover {color: #F00;}

== Screenshots ==

1. This is the Widget Setting with all it's options showing.

2. This is Settings page from the Admin Menu with Related Posts options.

3. The Related Post Links displayed at the bottom of a post and in the sidebar widget.

== Changelog ==

= 1.2.04.20 =
* Enhanced exclusion features on the settings page.
* Fixed "Notice: Undefined variable: tags in spostarbust/index.php on line 344" Thanks again Terry Brock.
* Moved menu item placement options to the right sidebar.

= 1.2.04.19 =
* Fixed "Notice: Undefined variable: the_title in spostarbust/index.php on line 323" Thanks to Terry Brock.

= 1.2.04.18 =
* Added back blocking Related Posts from showing on Single Pages with a new option to also allow them to show.

= 1.2.04.17 =
* Fixed second widget not showing when init is called after the first widget.

= 1.2.04.07 =
* Fixed widget not showing when new query method in init is called after the main loop by adding rewind_posts.
* Removed debug output from HTML source unless debug is passed in the query_string.

= 1.2.04.05 =
* Fixed query method in two places to support better compatibility with more themes and other plugins.

= 1.2.03.25 =
* Added descriptions for standard excerpt support and custom excerpts support.

= 1.2.03.24 =
* Added back standard excerpt support in the widget and use of custom excerpts if entered.

= 1.2.03.14 =
* Fixed bug that broke shortcodes in post when showing Excerpts for Related Posts.
* Added a global setting for sorting the list of related post, including random sort order.

= 1.2.03.04 =
* Fixed Warning about in-array and Wrong datatype on line 484 and 489 caused be not setting default values.

= 1.2.03.03 =
* Fixed bug causing the init to not run thereby preventing the list of Related Posts to be built.
* Added back the ability to show Excerpts for each Related Post in the Post Footer section.

= 1.2.02.26 =
* Fixed bug alowing current Post to show in the list of Related Posts.
* Fixed Warning about function in-array and Wrong datatype for second argument on line 483.

= 1.2.02.25 =
* Fixed bug of not showing Related Posts Link in the Post Footer section.
* Fixed endless loop of queying Related Posts if showing Excerpts in Widget.
* Disabled showing Excerpts in the Post Footer section.

= 1.2.02.24 =
* Fixed Widget not showing on Home page bug.
* Added option to show Excerpts under each Related Posts Link on the Widget and in the Post Footer section.

= 1.2.02.17 =
* Fixed Warning: "Invalid argument supplied for foreach" on line 457.

= 1.2.02.16 =
* Fixed Related Post Link to NOT repeat or duplicate or link to a post that is displayed on the current page.
* Added option to the Settings Page and made default to NOT show Related Post Links in the Footer of every Post on the Home page.
* Added option to the Settings Page to show the Post Date next to the Related Posts Links and format it the way you want.
* Reformetted the right sidebar links and added more styles to the the Settings Page.

= 1.2.01.29 =
* Added Title Size to the Settings Page to control the size of the Heading of the Post's Footer Links.
* Added Global Exclude lists to the Settings Page to exclude Related Posts by Post ID, Category/Tag ID, or Category/Tag Name.

= 1.2.01.20 =
* Fixed the Category headings link in the Tree View Widget to links to that Category's page instead of the current Post.

= 1.2.01.18 =
* Added a few different options for where to place the Menu Item to the Settings Page.

= 1.2.01.17 =
* Added more Reset Query code for better compatability with other plugins that do not reset the WP_Query when they are done.
* Made the Tag/Category headings in the Tree View Widget links to that Tag/Category page.

= 1.2.01.09 =
* Fixed the endless loop in the new "Tree View" options on the Widget when displayed on pages with only a single Posts.

= 1.2.01.04 =
* Added "Tree View" to the Widget options with the ability to show the Widget on pages with multiple Posts.

= 1.1.12.11 =
* Updated the settings page in the admin and fixed the default settings.

= 1.1.12.10 =
* Added "Category" as an optional means of relating your posts that are listed at the bottom of every Post.

= 1.1.12.09 =
* Added the ability to automaticaly put the Related Post Links at the bottom of every post.
* Added Settings to the Admin Menu for the automaticaly Related Post Links in the post footer.

= 1.1.11.09 =
* Updated Admin Menu Icon and removed get_headers call that was sometimes slowing page loads.
* Added Plugin Updates section to the right side in the Admin pages.

= 1.1.11.05 =
* Updated Menu, Logo, and Links on Admin Pages.

= 1.1.10.28 =
* Styled the Admin pages and added helpful links to the right side.
* Added a screenshot of the admin menu to the readme file.

= 1.1.10.27 =
* Added an Admin Menu for users to view the Readme and License files.

= 1.1.10.26 =
* Fixed Relateby option of the widget to not get stuck on Categories and still show Post related by Tags.

= 1.1.10.25 =
* Added a screenshot of the widget to the readme file.

= 1.1.10.24 =
* Added "Category" to the widget's configuration options as a means of relating your posts.

= 1.1.10.22 =
* Updated code to cleanup any queries that other plugins left open to fix the problem of getting the wrong Post ID.
* Added code to cleanup my own query and restore the original Post ID.
* Added Contributors to the readme file for helping me to discover this issue.

= 1.1.10.21 =
* Updated URIs for plugin's website.
* Added "Donate link" to the readme file.

= 1.1.10.20 =
* Made the widget into a Class to better conform to WordPress coding standards.
* Added "Alternative Title" to the widget's configuration options.
* Added "Number of Posts to List" to configuration options to set a max count to the list.

= 1.1.10.19 =
* Small change to the plugin name for better search relevance.
* Fixed the "unexpected output" warning during activation.
* Updated this readme file with more info about the plugin.

= 1.1.10.17 =
* First versions uploaded to WordPress.

== Upgrade Notice ==

= 1.2.04.20 =
Enhanced exclusion features on the settings page, fixed another Undefined variable Notice for tags on line 344, and Moved menu item placement options.

= 1.2.04.19 =
Fixed "Notice: Undefined variable: the_title in spostarbust/index.php on line 323" Thanks to Terry Brock.

= 1.2.04.18 =
Added back blocking Related Posts from showing on Single Pages with a new option to also allow them to show.

= 1.2.04.17 =
Fixed second widget not showing when init is called after the first widget.

= 1.2.04.07 =
Fixed widget not showing when new query method in init is called after the main loop by adding rewind_posts and removed debug output.

= 1.2.04.05 =
Fixed query method in two places to support better compatibility with more themes and other plugins.

= 1.2.03.25 =
Added descriptions for standard excerpt support and custom excerpts support.

= 1.2.03.24 =
Added back standard excerpt support in the widget and use of custom excerpts if entered.

= 1.2.03.14 =
Fixed bug that broke shortcodes in post when showing Excerpts and added a global setting for sorting the list of related post.

= 1.2.03.04 =
Fixed Warning about in-array and Wrong datatype on line 484 and 489 caused be not setting default values.

= 1.2.03.03 =
Fixed bug that prevents the Related Posts list from being built after the session starts and added back the ability to show Excerpts in the Post Footer.

= 1.2.02.26 =
Fixed Warning about in-array and Wrong datatype on line 483 and a bug alowing current Post to show in Related Posts Links.

= 1.2.02.25 =
Fixed bug of not showing Related Posts Link in the Post Footer and endless loop if showing Excerpts.

= 1.2.02.24 =
Fixed Widget not showing on Home page bug and added option to show Excerpts under each Related Posts Link.

= 1.2.02.17 =
Fixed Warning: "Invalid argument supplied for foreach" on line 457.

= 1.2.02.16 =
Fixed Post Link duplication and added options to NOT show Related Post Links on the Home page and to show the formatted Post Date for each Related Post.

= 1.2.01.29 =
Added Title Size and Global Exclude lists to the Settings Page, now you can exclude Related Posts by Post ID, Category/Tag ID, or Category/Tag Name.

= 1.2.01.20 =
Fixed the Category headings link in the Tree View Widget to links to that Category page instead of the current Post.

= 1.2.01.18 =
Added a few different options for where to place the Menu Item to the Settings Page.

= 1.2.01.17 =
Added better compatability with broken plugins and made the Tag/Category headings in the Tree View Widget link to that Tag/Category page.

= 1.2.01.09 =
Fixed the endless loop in the new "Tree View" options on the Widget when displayed on pages with only a single Posts.

= 1.2.01.04 =
Added "Tree View" to the Widget options with the ability to show the Widget on pages with multiple Posts.

= 1.1.12.11 =
Updated the settings page in the admin and fixed the default settings.

= 1.1.12.10 =
Added "Category" as an optional means of relating your posts that are listed at the bottom of every Post.

= 1.1.12.09 =
Added a Settings page to the Admin Menu with setting for automaticaly listing Related Post Links at the bottom of each Post.

= 1.1.11.09 =
Updated Admin Menu icon, sped up Admin page loads, and added Update checker.

= 1.1.11.05 =
Updated Menu, Logo, and Links on Admin Pages.

= 1.1.10.28 =
Styled the Admin pages and added helpful links to the right side.

= 1.1.10.27 =
Added an Admin Menu for users to view the Readme and License files.

= 1.1.10.26 =
Fixed Relateby option of the widget to not get stuck on Categories and still show Post related by Tags.

= 1.1.10.25 =
Added a screenshot of the widget to the readme file.

= 1.1.10.24 =
Added "Category" to the widget's configuration options as a means of relating your posts.

= 1.1.10.22 =
Updated code to fix the problem of getting the wrong Post ID for the current post.

= 1.1.10.21 =
Updated URIs for plugin's websiteand added "Donate link" to the readme file.

= 1.1.10.20 =
Added "Alternative Title" and "Number of Posts to List" to the widget's configuration options.

= 1.1.10.19 =
Fixed the "unexpected output" warning during activation.

= 1.1.10.17 =
First versions available through WordPress.

