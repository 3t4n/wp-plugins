=== Blocksolid ===
Contributors: peripatus
Tags: gutenberg overlay,visual composer migration,wpbakery migration,block editor,classic editor,divi,elementor
Stable tag: 2.1.1
Requires at least: 5.5
Tested up to: 6.7
Requires PHP: 5.6
Donate link: https://www.peripatus.uk/payments/
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

An overlay for the block editor to make it easier to use.


== Description ==

– Reduce the bloat and speed up your site

Don't slow down your website forcing visitors to download an additional website builder.

Gutenberg is built into WordPress and Blocksolid is super-lightweight too.

Blocksolid doesn't add any new blocks to Gutenberg, it enhances the built-in blocks.

– Make Gutenberg easier

Blocksolid provides an overlay for Gutenberg when editing pages which can be switched on and off.

Blocksolid adds visible edges to your blocks in the editor to let you see what you are doing.


= Blocksolid Features =

Note that all features can be switched toggled on and off.

* Control your layout

Use Gutenberg's built-in Columns block to lay out your pages.

During editing Blocksolid makes Columns and Rows stand out and adds "handles" to streamline layout control.

"Handles" are tabs visible during editing that allow you to select rows and columns without having to click with the breadcrumb trail.  Rows have a handle at the top left, and columns at the bottom left.

* Responsive spacing without inline styles

Blocksolid's enhancements to the built-in Gutenberg Columns block allow you to easily manage margins and padding in your layout, putting your page elements exactly where you want them.

You can set your own standard metrics for each spacing and the pick from these each time.  You no longer have to type in individual spacings on every column and row – control your layout with a click.  Spacings are based upon classes rather than inline styles which means leaner, cleaner code.

Unlike other website builders, Gutenberg allows you to nest rows and columns to any level, allowing you to get exactly the result you want.

* Beta Feature - Convert / Migrate pages from WPBakery Visual Composer to Gutenberg blocks

Added a limited ability to clone pages with their Visual Composer / WP Bakery shortcodes converted to Gutenberg blocks.  Pages are copied and converted, the originals are preserved.

* Control your palette

By default Gutenberg gives website editors unrestricted access to any color or gradient combination that they like.  In no time at all this level of freedom can and will make a well thought out website look like a technicolor mess.

As the administrator Blocksolid allows you to set your own restricted palette for your site editors to use and also exposes this as named CSS variables that you can use in your theme's styles.

* Stretch row backgrounds

If you need a website that has a central content area but want your row background colors to stretch to the edges of the screen Blocksolid has you covered.

* Classes Ticklist

You can create a list of style classes and then select these from a simple ticklist to style your rows and columns.

* Export your settings

You can freely install and uninstall Blocksolid and keep on using Gutenberg.  Blocksolid's enhancements are based upon CSS classes, even the spacings, so you can continue to use these classes in your theme for layout.

Blocksolid allows you to export its settings including the controlled palette and import them on another site using Blocksolid for fast setup.

* Tried and tested

The following websites were all built recently using Blocksolid:

[MBS Daylight](https://www.mbs-software.co.uk/)

[Sports Pros Connect](https://sportsprosconnect.com/)

[Sussex Yacht Club](https://www.sussexyachtclub.org.uk/)

[Wealdens](https://www.wealdens.co.uk/)

[Al Duomo](https://www.alduomo.co.uk/)

[Camping Chair Bag](https://www.campingchairbag.com/) - We originally built this simple site using WP Bakery Page Builder but replacing this with Blocksolid saw a 40% speed improvement.


== Installation ==

From your WordPress dashboard

1. **Visit** Plugins > Add New
2. **Search** for "Blocksolid"
3. **Activate** Blocksolid from your Plugins page
4. **Setup** Visit Settings > Blocksolid, switch on the features that you want to use and save.

== Frequently Asked Questions ==

= What kind of support do you provide? =

**Email.** Please send any queries to wordpress@peripatus.net and we will be happy to help.

= It doesn't look much different, what am I doing wrong?

The main focus is on the "Columns" design block and the rows and columns within it which can be used for controlling your page layout.  If you are not using these you will still see some cosmetic differences.

= When I edit a post I get an error (simple fix!)

If you see "Updating failed: The response is not a valid JSON response" don't worry.

Gutenberg and the Classic Editor work differently and changing from one to the other may cause this error.  Flushing the permalink cache will fix this issue permanently and you can find out how to do this simple task easily via a web search.


== Screenshots ==

1. /assets/screenshots/screenshot-1.png

Visual overlay showing row and column handles

2. /assets/screenshots/screenshot-2.png

Row responsive margins and padding settings

3. /assets/screenshots/screenshot-3.png

Column responsive margins and padding settings, and controlling default margins

4. /assets/screenshots/screenshot-4.png

Column responsive horizontal padding settings

5. /assets/screenshots/screenshot-5.png

Controlled palette and stretched backgrounds


== Changelog ==

= 2.1.1 =

*Change to admin CSS to avoid too small links dialog - 28 January 2025*

= 2.1.0 =

*Fixed issue with settings ajax - 26 November 2024*

= 2.0.9 =

*Tweak to admin stypes to repeal change to .block-editor-url-input that gives it a minimum width of 300px. - 25 September 2024*
*Using wp.editor instead of wp.editPost for const PluginDocumentSettingPanel - 25 September 2024*
*Added overlay and tweaked style for Group block - 26 September 2024*
*Set the __nextHasNoMarginBottom prop to true for back-end controls - 14 October 2024*

= 2.0.8 =

*Small tweak to resurrect settings screen styling - 20 August 2024*

= 2.0.7 =

*WP 6.5 puts the editor in iframes in certain circumstances - these are now targeted by overlay class and also we are now using 'enqueue_block_assets' instead of 'admin_enqueue_scripts' - 01 August 2024*

= 2.0.6 =

*New Feature! Added ability to assign colors to user-defined CSS classes for columns blocks, column blocks or to the classic block text or link color within them with opacity. These can be applied in the backend overlay and optionally in the front-end website. Small CSS change for WP 6.5. - 18 March 2024*

= 2.0.5 =

*Moved row and column background images from Pro to Core - 02 October 2023*

= 2.0.4 =

*Simple Tabs Block support, deprecated JQuery removed, popover styling fixed, button fixed in Pro back ground image selection - 26 September 2023*

= 2.0.3 =

*Added styling support for the excellent Accordion Blocks plugin by philbuchanan - 17 May 2023*

= 2.0.2 =

*Added limited ability to clone pages with their Visual Composer / WP Bakery shortcodes converted to Gutenberg blocks - 24 April 2023*

= 2.0.1 =

*Columns tab inverted and shape changed to remove clashes in tight layouts, Disabled Rows, Linked Rows and Mobile Hide moved from Pro to Core, compatibility with WordPress 6.2 - 16 April 2023*

= 1.3.4 =

*Usability tweak to make columns easier to select - 14 November 2022*

= 1.3.3 =

*Usability tweak to make column easier to select - 10 November 2022*

= 1.3.2 =

*Moved overlay setting preference from localstorage to user meta after WP changed localstorage preferences once again - 28 October 2022*

= 1.3.1 =

*Animations CSS tightened up (Pro). Bug in WP 6 image alignment fixed by limiting experimentalLayout fix to WP 5.8 only. Images in inner blocks given a way to have full width of container - 23 June 2022

= 1.3.0 =

*If spacing controls are chosen hide the new Layout panel.  Added WP6 Styles.  Overcame yet another localstorage interface features move in WP6 - 23 May 2022*

= 1.2.3 =

*Fixed empty user preferences rare issue.  Example theme.json updated for WordPress 5.9 - 24 February 2022*

= 1.2.2 =

*Changes for WordPress 5.9 compatibility - 25 January 2022*

= 1.2.1 =

*Page level settings allow the overlay to be freely switched on and off during editing.  Default content rows can be added with one click - 13 January 2022*

= 1.1.8 =

*New feature! User selectable classes added for rows and columns - 22 November 2021*

= 1.1.7 =

*Pro only - removed title from gallery - 12 October 2021*

= 1.1.6 =

*Wide width setting respects vw units - 20 September 2021*

= 1.1.5 =

*WordPress 5.8 changes to wide width setting - 26 July 2021*

= 1.1.4 =

*WordPress 5.8 changes - 20 July 2021*

= 1.1.3 =

*Tested up to WordPress 5.8. Readme updated - 14 July 2021*

= 1.1.2 =

*Systems check highlights any missing settings or misconfiguration. Import and export settings - 21 June 2021*

= 1.1.1 =

*New features! Added full width colored backgrounds and controlled pallette to core - 16 June 2021*

= 1.0.12 =

*Core updates to color palette control - 09 June 2021*

= 1.0.11 =

*Block edges reduced in size in editor - 02 June 2021*

= 1.0.10 =

*Theme support editor-font-sizes switched off in response to Gutenberg bug - if this option used Gutenberg throws a warning - 21 May 2021*

= 1.0.9 =

*Editor style tweaks - 5 May 2021*

= 1.0.8 =

*Editor style tweaks - Font families as per rest of WordPress editor - 23 April 2021*

= 1.0.7 =

*Editor style tweaks - Block overlay CSS changed to improve block hover visibility within complex layouts  - 19 April 2021*
*Editor style tweaks - 30 March 2021*
*Horizontal and vertical spaces now use button groups rather than selections - 30 March 2021*
*Editor style tweaks - 29 March 2021*

= 1.0.0 =

*Release Date - 26 March 2021*

First release