=== Random Online Twitch Stream from selection ===
Tags: twitch, twitch.tv, twitchtv, twitch api, twitch widget
Requires at least: 4.9
Tested up to: 5.8.1
Requires PHP: 7.4
Stable tag: 1.1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Plugin for show random live stream from Twitch by your selected game, streamers, and language. Show your random favorite streamer after every refresh.
This plugin uses for work 3rd party service [Twitch.tv](https://www.twitch.tv/). Using this plugin you accept [Terms of Service](https://www.twitch.tv/p/terms-of-service) and [Privacy Notice](https://www.twitch.tv/p/legal/privacy-notice/) of this service.

== Usage ==

Simply use the following shortcode anywhere in a post or page within Wordpress:

`[getTwitchStream]`

If you want to change some CSS class, you can create your custom CSS class and use it this:

`[getTwitchStream customcssclass="yourCustomClass"]`

== Installation ==

The installation and configuration of the plugin is as simple as it can be.

1. Navigate to the 'Add New' in the plugins dashboard
2. Search for 'Random Online Twitch Stream from selection'
3. Click 'Install Now'
4. Activate the plugin on the Plugin dashboard

== Changelog ==

= 1.1.0 - 2021-11-14 =
* Added - you can add custom CSS class for every called instance
* Changed - define streamers is not now required
* Added - you can change text when no streamers are online, you can use HTML tags also
* Fixed - get right CSS file

= 1.0.0 - 2021-11-10 =
* Initial release

== Upgrade Notice ==

= 1.1.0 - 2021-11-14 =
* You can add custom CSS class for every called instance when you called plugin in public page, e.g.: `[getTwitchStream customcssclass="yourCustomClass"]`
* Define streamers is not now required in administration
* You can change text when no streamers are online in administration
* Fixed get right CSS file
