=== Advent Calendar ===
Contributors: bassgang
Tags: advent, calendar, christmas, flexible
Requires at least: 3.7.1
Tested up to: 6.1
Stable tag: 1.0.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=FCCQCWL3QNM36

A simple calendar plugin to show a list of 24 days before christmas.
Each day can be viewed automatically on the current date after it got published.

== Description ==

This plugin easily outputs an advent calendar for your chosen year (e.g. 2013).
In the current version one entry consits of a title and a featured image, that’s all!

Therefore the plugin provides the following functionality:

* A custom post type called "Advent calendar entry"
* A bulk creation utility to create 24 Advent calendar entries with one click. Each one is automatically scheduled
for 1. - 24.12.
* A shortcode which outputs an Advent calendar overview. You can use it with [advent-calendar year="xxxx"], i.e
for 2013 it would be [advent-calendar year="2013"]
* As long as an Advent calendar entry is not published the entry will not be clickable in the Advent calendar overview.
After automatically publishing (make sure your WordPress virtual cron is running probapbly) the entry will be clickable
and viewable.

Fits perfect for any website to release exclusive picture content on the 24 days before christmas.

== Installation ==

* Install the plugin.
* Activate the plugin.
* Use the bulk creation tool to create the Advent calendar entries.
* Set a featured image for each Advent calendar entry.
* Use the shortcode "[advent-calendar]" to output the Advent calendar overview.

== Frequently Asked Questions ==

= Defaults =
* Yeb, you are right, by default the Advent calender post type only provides a "title" and a "featured image". If you
want to extend it, read further ;)

= Advent Calender Post Type Customization =
* Advent calender post type customization via the provided "pvb_acal_cpt_params" hook. The following example will extend
the advent calender post type with the common post WordPress content / editor box. Youh can use the hook in your themes
"functions.php" or in a plugin like

`
function acal_change_post_type_params( $custom_post_type_params ) {
    $custom_post_type_params['supports'] = array(
        'title',
        'editor',
        'thumbnail'
    );
    return $custom_post_type_params;
}
add_filter( 'pvb_acal_cpt_params', 'acal_change_post_type_params' );
`
= Single Advent Calender Template / View Customization =
* If you want to use a custom template for a single advent calender entry (the "detail view") copy
"wp-content/plugins/advent-calendar/public/views/single-advent-calendar-entry-custom.php" to your theme folder, i.e.
"wp-content/themes/YOUR-THEME/single-advent-calendar-entry-custom.php".

== Screenshots ==

1. This shows the overview of the Advent calendar output. In this specific demo the first Advent calendar entry is
already published and therefore linked it has a preview of the featured image and a link to the single view.

== Changelog ==

= 1.0.5 =
* Provide "pvb_acal_cpt_params" hook to enable flexible "3rd party" customization of the advent calendar post type. For
example: Now it is easy to add the normal "content" section (editor) to an advent calender entry
* Provide further customization possibilities by loading a custom single advent calender entry template if present,
the plugin checks for 'single-advent-calendar-entry-custom.php' in the folder of your active theme under
wp-content/themes.

= 1.0.2 =
* Increase overall theme compatibility: Remove specific twentythirteen functions in "public/views/single-advent-calendar-entry.php".
* Improve installation instructions.

= 1.0.1 =
* Fixed misspelled "calender" to "calendar" everywhere.
* Improve text in README.

= 1.0.0 =
* Initial release.