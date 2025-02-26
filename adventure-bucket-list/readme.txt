=== Adventure Bucket List ===
Contributors: kevinabl, borknagar
Tags: travel, booking, calendar
Requires at least: 4.0
Tested up to: 4.7
Stable tag: 1.1.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin allows Activity Providers to easily integrate Adventure Bucket List Booking Tools into your WordPress site.

== Description ==
This tool provides easy tools for adding Adventure Bucket List code to your WordPress site.  You can follow the instructions to create shortcodes that you can add to any page or post on your site.  To learn more about Adventure Bucket List, visit [Adventure Bucket List](https://adventurebucketlist.com).

== Installation ==

= Automatic Installation =
1. Log into your WordPress admin
1. Click Plugins
1. Click Add New
1. Search for Adventure Bucket List
1. Click Install Now under "Adventure Bucket List"
1. Activate the plugin

= Manual installation =
1. Download the plugin
1. Extract the contents of the zip file
1. Upload the contents of the zip file to the wp-content/plugins/ folder of your WordPress installation
1. Activate the Adventure Bucket List plugin from 'Plugins' page.

== Frequently Asked Questions ==
= How do I learn more about Adventure Bucket List? =
Visit [Adventure Bucket List](https://adventurebucketlist.com) to learn more and speak with a member of our team to learn more about how we can help you build a great online sales experience for your users.

== Changelog ==

= 1.1.2 =
* Update WP plugin for support new widget and GC widget

= 1.0.9 =
* Fix abl-redirect short code to accept activity and event params

= 1.0.5 =
* Added calendar short code to plugin

= 1.0.2 =
* Added borknager to devs list

= 1.0.1 =
* Improved readme.txt

= 1.0 =
* Initial release.

== Usage ==

= Features: =

1. Booking Buttons for your Adventure Activities
1. Embeddable Widgets for inline user experience
1. Links to more comprehensive booking experiences hosted by ABL

= Setup =

* Add your Merchant Id to the input box
This way every shortcode added will get that Id from this preference
* Add Custom CSS (for buttons and other elements): you can setup your custom CSS for buttons

= Adding shortcodes =

There are 3 types of shortcodes you can add

Book Now Button:

`[abl-button label="Book Now" activity="57336b293e6f0f447119987d" event="asdafasd_20170131012313" style="prettyButton"]`

Redirect Links:

`[abl-redirect label="See this activity..." activity="57336b293e6f0f447119987d" event="asdafasd_20170131012313"]`

Embedded Widget:

`[abl-widget merchant="tLVVsHUlBAweKP2ZOofhRBCFFP54hX9CfmQ9EsDlyLfN6DYHY5k8VzpuiUxjNO5L"]`

Embedded Calendar:

`[abl-calendar merchant="tLVVsHUlBAweKP2ZOofhRBCFFP54hX9CfmQ9EsDlyLfN6DYHY5k8VzpuiUxjNO5L" type=“embedded” height=“1200px” width=“100%” id=“abl-calendar-id-instance”]`


