=== Free Responsive iframe Video Embeds ===
Contributors: vprenner
Tags: video, embed, iframe, free, responsive, iplayerhd
Requires at least: 3.0
Tested up to: 5.2.2
Stable tag: 1.0.6
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.en.html

Use the [iplayerhd] shortcode to easily add responsive iframe-based video embeds to your website (YouTube, Vimeo, iPlayerHD and more...)

== Description ==

While being tailored for [iPlayerHD Video Hosting](https://iplayerhd.com/cms/refer/10235175-966c-4d78-a75d-04c6159c0e02) users, the plugin should work
with any video which can be embedded via an iframe. Simply set the width and height attributes to fit
your video's format and you're all set!

[iPlayerHD](https://iplayerhd.com/cms/refer/10235175-966c-4d78-a75d-04c6159c0e02) users can get a shortcode link with all of the required parameters
automatically though the [iPlayerHD](https://iplayerhd.com/cms/refer/10235175-966c-4d78-a75d-04c6159c0e02) CMS.

[iPlayerHD](https://iplayerhd.com/cms/refer/10235175-966c-4d78-a75d-04c6159c0e02) users also get additional options such as playlist embeds and popup embeds.

= Shortcode examples: =

[iplayerhd src="https://www.youtube.com/watch?v=dQw4w9WgXcQ"] - by omitting width and height parameters the video is embedded in 16:9 format

[iplayerhd src="//iplayerhd.com/player/video/5ae4df93-5734-4e29-9f2e-15ff9056b7e4?cbartype=auto" width="1024" height="768"]

= Shortcode parameters: =
* **src** - source of the iframe, defaults to: http://iplayerhd.com/player/video/5ae4df93-5734-4e29-9f2e-15ff9056b7e4?cbartype=auto
* **width** - width of video in pixels, defaults to 640 - if the video is in 16:9 format you can omit this parameter
* **height** - height of video in pixels, defaults to 360 - if the video is in 16:9 format you can omit this parameter
* **popup** - **for [iPlayerHD](https://iplayerhd.com/cms/refer/10235175-966c-4d78-a75d-04c6159c0e02) users only** - embeds a thumbnail which opens the video in a lightbox-style popup, defaults to 'false'
* **player-mode** - **for [iPlayerHD](https://iplayerhd.com/cms/refer/10235175-966c-4d78-a75d-04c6159c0e02) users only** - possible values: 'video', 'playlistRight', 'playlistBottom' - user for embedding iPlayerHD playlists, defaults to 'video'

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Use the shortcode in your pages and posts


== Changelog ==

= 1.0.6 =
* Compatible up to Wordpress 5.2.2

= 1.0.5 =
* Fixed issues with iPlayerHD popup embeds

= 1.0.4 =
* Fixed script enqueuing

= 1.0.3 =
* Compatible up to Wordpress 4.6.1

= 1.0.2 =
* Added support for pre-5.4 PHP versions

= 1.0.1 =
* Fixed installation folder name issue

= 1.0.0 =
* Initial release

