=== Da Reactions ===
Contributors: danielealessandra, freemius
Tags: reactions, social, interaction, engagement
Donate link: https://www.paypal.me/DanieleAlessandra
Requires at least: 5.9.0
Tested up to: 6.6.2
Stable tag: 5.2.1
Requires PHP: 7.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin creates some reaction buttons that could be added to content and comments.


== Description ==
This plugin creates some reaction buttons that could be added to content and comments too.

####Features
With this plugin you can:
* Add reactions to __posts__, __pages__ and __attachments__!
* Add reactions to __comments__.
* Add reactions to __single views__ and __archives__.
* Add Reactions to __topics__ and __replies__ in **BBPress**

####Customization
Highly customizable:
* You can choose between 250 **included royalty free icons**.
* You can customize **size and color** of every icon.
* You can _sort_, _add_, _remove_ and _edit_ every single reaction.
* Drag’n drop to order reactions globally.
* Icon collection to choose your favourite reaction icons.
* Color picker to customize every icon.
* Choose your favourite blur effect between Blur, Desaturate ot Opacity.
* Customize icons choosing effect amount percentage.

####Widgets
* Display most voted contents choosing one or all reactions.
* Display most voted comments choosing one or all reactions.
* Display most voted reaction near content title in widget.

####Languages
* This plugin is fully compatible with localization
* .pot file included
* WPML Ready
* Included sample .po and .mo files (italian translation)

####Premium features
* Add Reactions to __custom post types__, __WooCommerce Products__ and __BuddyPress’ Activities, Groups and Profiles__.
* Enable or disable reactions for __registered user__, __unregistered__ only, or even for specific user roles!
* Upload your own images to fully customize your visitors experience.
* Gutenberg block to add reactions everywhere into your contents.

== Installation ==
1. Upload `da-reactions` directory to the `/wp-content/plugins/` directory or use WordPress’ plugin instructions to upload .zip file.
2. Activate the plugin through the `Plugins` menu in WordPress
3. The plugin works out of the box with six predefined reactions.

####Usage
1. Enable or disable reactions for specific contents and for comments directly in the post/page editor.
2. Add widget to display most voted content somewhere.
3. Set global preferences through the plugin option page.

== Frequently Asked Questions ==
= Does this plugin requires some API Key setting or the creation of a Facebook App? =
No, this plugin is totally autonomous and does not need anything except your WordPress installation.

= How can I delete all plugin’s data after uninstall? =
On the plugin option’s page, _when enabled_, there is an option to delete all data on uninstallation.
Be careful! Deleted data cannot be restored.

= Can I add Reactions to BuddyPress’ Activities? =
Yes, the PRO version of this plugin enables reactions for BuddyPress’ Activities, Groups, Profiles, and so on.

= Can I add Reactions to BBPress messages? =
Yes, if you are using BBPress you can enable reactions in forum’s Topics, Replies or both.

== Screenshots ==

1. Zero configuration needed, just install and activate
2. Add, remove, sort, rename and colorize reactions as you wish
3. Choose between hundreds of icons, or use your own images
4. Tons of customization options to fulfill any needs
5. Real time preview while editing reactions appearance
6. Several widget for your dashboard
7. Real time data in content list
8. View, count, export and import reactions
9. Advanced customization in content edit screen to change the options for one specific content
10. Add reactions archive to your menu in just one click
11. Sidebar widget and Gutenberg block available


== Changelog ==
= 5.2.1 =
Fix: Introduced Frontend::wpKsesAllowedHtml to allow SVG in frontend and manage sanitization properly
Thanks to @betty_ for reporting the issue

= 5.2.0 =
* Fixed an XSS vulnerability thanks to Khalid Yousuf for reporting it.
* Fix: Use wp_cache instead of file cache for better performance.

= 5.1.0 =
* Add: API Endpoints to fetch Reactions

= 5.0.0 =
* Totally rewritten for performance improvement
* Fix: Dashboard Widgets Bugs
* Fix: JavaScript Errors on click with zero reactions

= 4.0.0 =
* Add: Added Analytics insight
* Add: WPFORO integration

= 3.22.0 =
* Improved descriptions and added screenshots

= 3.21.0 =
* Fix: Votes list filters

= 3.20.3 =
* Security: Removed all occurrences of file_get_contents

= 3.20.2 =
* Fix: Bug that was deleting images for existing reactions

= 3.20.1 =
* Fix: File name bug with cyrillic alphabet

= 3.20.0 =
* Add: data export for GDPR compliance
* Add: data anonymity for GDPR compliance
* Add: Privacy Policy content suggestion
* Add: Notice box to ask for reviews
* Fix: restore PHP 5.6 backward compatibility (please update your servers!)

= 3.15.0 =
* Fix: added BBPress roles to User Type Filter
* Fix: preview bug
* Add: loader spinner
* Add: delete all data functionality
* Add: percentage values to display features
* Add: import and export functionality

= 3.14.0 =
* Published on Envato only
* Different version numbers for different marketplaces

= 3.13.0 =
* Published on Freemius and WordPress.org
* Different version numbers for different marketplaces

= 3.12.0 =
* Remove menu for unauthorized users
* Fix BBPress auto-embed bug

= 3.11.0 =
* Added Freemius SDK 2.4.2

= 3.10.0 =
* Added Shortcode

= 3.9.1 =
* Fixed a bug that prevented the recognition of the logged-in user when a cookie was set

= 3.9.0 =
* Users can remove reactions by clicking again the same icon
* Fixed a bug with visible numbers on excerpt with some third party themes

= 3.8.0 =
* Fix a bug with duplicated widget using a third party frontend editor plugin

= 3.7.0 =
Added BBPress support

= 3.6.0 =
* Added archives by reaction
* Small bug fixes

= 3.5.0 =
* Added option to hide counter
* Fixed bug on iPhone 8 browser

= 3.4.0 =
* Fixed number formatter
* [PRO] Fixed BuddyPress preferences
* [CSS] Fixed bug on tooltip

= 3.3.0 =
* Released free version and paid plans.

= 3.0.0 =
* Added user list tooltip for reactions
* Added file based cache to save database time

= 2.1.0 =
* Added new animated layout.
* Fixed bug that broke settings page with some specific server configurations.

= 2.0.4 =
* Do not rely on #buddypress id in HTML to detect buttons, as it could not be present. [PRO]

= 2.0.3 =
* Better BuddyPress detection [PRO]

= 2.0.2 =
* Solves a user-reported bug that caused several annoying warning messages in PHP error log

= 2.0.1 =
* Solves an unreported bug that caused duplicated Gutenberg Blocks to have the same ID [PRO]

= 2.0.0 =
* Images are now stored on default upload folder
* This version solves all reported bugs from customers [PRO]

= 1.3.0 =
* Added BuddyPress’ Actions on Reactions [PRO]
* Added External SVG support [PRO]
* Added different color selection for Charts [PRO]

= 1.2.0 =
* Added Gutenberg Block [PRO]

= 1.1.0 =
* Added BuddyPress integration [PRO]

= 1.0.0 =
* This is the first version of this plugin
