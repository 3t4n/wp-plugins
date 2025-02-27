=== PTA Shortcodes ===
Contributors: DBAR Productions
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=R4HF689YQ9DEE
Tags: Shortcodes, Shortcode Generator, PTA, Volunteer, Sign Up, Events, Member Directory, Member Directory Contact Form
Requires at least: 3.9
Tested up to: 5.5.1
Stable tag: trunk

Easily generate shortcodes for the PTA plugins from Stephen Sherrard Plugins. Adds a PTA Shortcode generator button to the TinyMCE "classic editor" on page/post edit screens.

== Description ==

Easily generate shortcodes for the PTA plugins from Stephen Sherrard Plugins. Adds a PTA Shortcode generator button to the TinyMCE "classic editor" on page/post edit screens.

Generates shortcodes for the PTA Volunteer Sign Up Sheets plugin and the PTA Member Directory and Contact Form plugin, both of which are also free plugins on WordPress.org:
[PTA Volunteer Sign Up Sheets](https://wordpress.org/plugins/pta-volunteer-sign-up-sheets/)
[PTA Member Directory and Contact Form](https://wordpress.org/plugins/pta-member-directory/)

Also supports the Groups and Calendar Display extension for the PTA Volunteer Sign Up Sheets plugin:
[PTA Volunteer Sign Up Sheets Groups](https://stephensherrardplugins.com/plugins/pta-volunteer-sign-up-sheet-groups/)
[PTA Volunteer Sign Up Sheets Calendar Display](https://stephensherrardplugins.com/plugins/pta-volunteer-sign-up-sheets-calendar-display/)

== Installation ==

= Minimum Requirements =

* Although this works by itself, the shortcodes it generates won't do anything unless you have one of the following PTA plugins installed:
* [PTA Volunteer Sign Up Sheets](https://wordpress.org/plugins/pta-volunteer-sign-up-sheets/)
* [PTA Member Directory and Contact Form](https://wordpress.org/plugins/pta-member-directory/)

= Automatic installation =

Automatic installation is the easiest option as WordPress handles the file transfers itself and you don’t need to leave your web browser. To do an automatic install, log in to your WordPress dashboard, navigate to the Plugins menu and click Add New.

In the search field type “PTA Shortcodes” and click Search Plugins. Once you’ve found the plugin you can view details about it such as the point release, rating and description. Most importantly of course, you can install it by simply clicking “Install Now”.

= Manual installation =

Download and Extract the zip file and just drop the contents in the wp-content/plugins/ directory of your WordPress installation and then activate the Plugin from Plugins page.

== Changelog ==
**Version 1.5.0**
*   Added new shortcode parameters for Volunteer Signup Sheets to show/hide signup email (hidden by default)

**Version 1.4.0**
*   Added new shortcode parameters for Volunteer Signup Sheets to show/hide start date or end date

**Version 1.3.2**
*   Bug fix for calendar shortcode "undefined" value for calendar name/ID

**Version 1.3.1**
*   Added show_time argument to the new shortcode [pta_user_signups] to determine if start/end time columns should be shown. Will be shown by default unless this argument is set to 'no'.

**Version 1.3.0**
*   Added new shortcode [pta_user_signups] to display the current user's signups (along with clear links, if allowed) on any page. No arguments for this shortcode.

**Version 1.2.7**
*   Added Order By and Order arguments to the Sign Up Sheets shortcode generator, to allow you to specify the sheet field to order the list by (First Date, Last Date, Title, or ID), as well as the order (ASC or DESC)

**Version 1.2.6**

*   Added Show Headers argument to the Sign Up Sheets shortcode generator, to allow you to specify if header info should be shown for sheets (title, contacts, and description)
*   Added Show Phone Numbers argument to the Sign Up Sheets shortcode generator, to allow you to show a column with phone numbers for signups when you set the argument to yes.

**Version 1.2.5**

*   Added shortcode generator for the new shortcode to embed a calendar on any page with the Calendar Extension (version 1.2) for the PTA Volunteer Sign Up Sheets plugin

**Version 1.2.4**

*   Updated Group label for Sign Up Sheets shortcode to show that multiple groups can now be entered in one shortcode, by separating the group names with the pipe character: |

**Version 1.2.3**

*   Initial release on WordPress.org (formerly only hosted at https://stephensherrardplugins.com)
