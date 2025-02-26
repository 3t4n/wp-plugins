=== 1180px Shortcodes ===
Contributors: Chris Blackwell
Tags: 1180px, css, shortcodes
Requires at least: 3.0
Tested up to: 4.0.0
Stable tag: 1.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

1180px shortcodes gives you simple shortcodes to use the 1180px css grid system.

== Description ==

The 1180 grid system is a 12-column grid, so all column spans must add up to 12.

For example, you can gave [span col="8"] and [span col="4"] in the same row,
or you can have three [span col="4"] for a 3-column layout.

To keep things well spaced out, and for automatic clearing of the floated columns, wrap
your span shortcodes in a row shortcode like the example below.

Example 3 column grid
----------------------

    [row]
        [span col="4"]
            Column One
        [/span4]

        [span4 col="4"]
            Column Two
        [/span4]

        [span4 col="4"]
            Column Three
        [/span4]
    [/row]


## Adding classes to the row
You can add optional classes to the row shortcode. You can also set the class to flexbox,
for full flexbox support in browsers. If the browser does not support flexbox, it will
fallback to floats.

**Examples**

    [row class="flexbox"]

    [row class="flexbox someOtherClass anotherClass"]

== Installation ==

1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress


== Changelog ==

September 5, 2014
  - *NEW syntax (you now pass col="x") on your span
  - *NEW added buttons to WYSIWYG editor for easy row and columns additions
  - *FIXED flexbox support on mobile

April 8, 2013
  - Fixed wordpress register stylesheet problem
  - Fixed a bug about closing the shortcode, even though I was pretty sure I fixed it already...grrr...

April 5, 2013
  - Changed 1180px css file to 1.0

April 4, 2013
  - Added basic shortcode support
  - Included most recent version of compressed 1180px css
