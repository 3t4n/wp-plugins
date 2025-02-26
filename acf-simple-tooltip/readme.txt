=== ACF Simple Tooltip ===
Contributors: palmerijosh
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=2Q5RTA7K2P6AJ&source=url
Tags: acf, acfpro, advanced custom fields, instructions, tooltip, simple tooltip
Requires at least: 4.7
Tested up to: 5.9.3
Requires PHP: 5.6
Stable tag: 1.1.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Displays ACF field instructions as tooltips using only CSS.

== Overview ==

The [Advanced Custom Fields plugin](https://www.advancedcustomfields.com) by [Elliot Condon](https://www.elliotcondon.com/) is a fantastic resource for developers, allowing us to structure custom data and create a great user experience for data entry personnel.

The instruction text for ACF fields is useful, but creates visual clutter in the WordPress interface when there is a lot of instructional text. Thomas Meyer has created a great plugin to address this issue with his [ACF Tooltip Plugin](https://wordpress.org/plugins/acf-tooltip/). However, when using this plugin on implementations that have a large number of ACF fields, I have seen that performance drops and load-time of the WP Dashboard increases.

This plugin, ACF Simple Tooltip, is a lightweight solution that uses only two lines of JavaScript to add classes to ACF field labels which have instruction text. CSS takes care of the rest (creating the "info" ⓘ icon, styling the instruction text as a tooltip, and creating the hover functionality for showing the tooltip). Simply install the plugin, and the JS and CSS will enqueue on any post.php page in the WP Dashboard.

== Contact ==

This is an initial version, so please contact me if you find any issues while using the plugin. Happy developing!

== Frequently Asked Questions ==

= Has this plugin been tested with the Advanced Custom Fields plugin? =

Yes. ACF Simple Tooltip should work with the latest version of Advanced Custom Fields on current versions of all major browsers.

= What do I need to do to get this to work on my WordPress installation? =

Simply install the plugin and activate it. No additional settings required.

= Has this plugin been tested with the Advanced Custom Fields plugin? =

Yes. ACF Simple Tooltip should work with the latest version of Advanced Custom Fields.

= What about support? =

Please submit a support ticket at WordPress forum.

== Screenshots ==
1. Simple tooltip on an ACF Checkbox (True/False) field.
2. Simple tooltip on an ACF Button Group field.
3. Simple tooltip on an ACF Checkbox (True/False) field group.
4. Simple tooltip on an ACF Repeater field group.

== Changelog ==

= 1.0.0 =
* Initial release. Creates tooltip for instruction text on all post.php and post-new.php pages, except for the ACF Field Groups pages (New or Edit).

= 1.1.0 =
* Updated CSS to fix a bug where br tags were showing when the tooltip was hidden.
* Updated CSS to allow for custom CSS within tooltip description.

= 1.1.0 =
* Tested up to WordPress 5.9.3.

== Upgrade Notice ==

See Changelog.