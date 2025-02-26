=== Embed Extended – Embed Maps, Videos, Websites, Source Codes, and more ===
Contributors: rsusanto
Tags: embed maps, embed video, oembed, open graph, source code, street view, embed, github, gitlab, google maps, twitch, wistia
Requires at least: 4.6
Tested up to: 6.3
Requires PHP: 5.6
Stable tag: 1.4.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Embed any external content into WordPress posts and pages. It works seamlessly on Gutenberg, Elementor, classic editor, the embed shortcode, as well as programmatically.

== Description ==

This plugin allows you to embed external sites that are not supported by the [built-in WordPress embed feature](https://wordpress.org/support/article/embeds/). It fetches information from the site's embed API, oEmbed endpoint and Open Graph tags. It will also parse the content manually if such information cannot be found.

= Usage =

Just **copy-and-paste the URL into your favorite WordPress post editor** to trigger the embed fetching function.

It integrates seamlessly with the Gutenberg editor, Elementor, classic editor, the embed shortcode, and also programmatically, so you don't have to set up anything to get it working.

= Features =

* **No setup needed.** Activate and it should work right away.
* **Non-intrusive.** This plugin will not replace embed for sites already supported by the built-in WordPress embed feature or other plugins (e.g., Jetpack).
* **Responsive.** Embed cards will adjust to the available space.
* **Extendable template.** The default embed card template can be extended to get a different look.

= Supported content types =

Content types below are supported by the plugin:

* Any web pages.
* Any source code and configuration file links (js, css, php, py, rb, ini, conf, etc).
* Any video links (mp4, m4v, webm, ogv, flv).
* Any audio links (mp3, ogg, flac, m4a, wav).
* Any PDF document links.

This plugin also improves support for the following content providers:

* [GitHub](https://github.com/) source codes and snippets/gists.
* [GitLab](https://gitlab.com/) source codes.
* [Google Maps](https://www.google.com/maps) places, directions, street views, search results, and area maps.
* [Twitch](https://www.twitch.tv) videos, channel, and collections.
* [Waze](https://www.waze.com/livemap) livemap.
* [Wistia](https://wistia.com/) videos and playlists.

== Screenshots ==

1. Embed Google Maps links.
2. Embed Twitch and Wistia links.
3. Embed source code and configuration file links from GitHub, GitLab, as well as a direct file link.
4. Embed web pages with Open Graph data.
5. Embed web pages without any embed data.
6. Default embed behavior remains unchanged for contents already supported by the built-in WordPress embed feature.

== Changelog ==

= 1.4.0 =
* Improves support for WordPress Multisite.
* Improves support for embed contents with non-UTF encoding.


= 1.3.0 =
* Uses iframe to wrap the embed card.
* Adds custom CSS setting.
* Adds support for embedding source code and configuration file links.
* Improves support for embedding GitHub source code links.
* Improves support for embedding GitLab source code links.
* Fix embedding Twitch videos due to change in their API parameter.

= 1.2.3 =
* Fix missing settings page.

= 1.2.2 =
* Adds new feature to exclude or include only certain URL patterns.
* Improves settings page.

= 1.2.1 =
* Improves plugin deactivation behavior.

= 1.2.0 =
* Adds admin notice.
* Improves support for embedding PDF document links.
* Improves support for embedding Google Maps directions and street views.

= 1.1.1 =
* Adds debug feature.
* Improves support for embedding Wistia videos and playlists.
* Improves support for embedding video and audio links.

= 1.1.0 =
* Adds settings page.
* Improves support for embedding Google Maps places, directions, search results, and area maps.
* Improves support for embedding Waze livemap.

= 1.0.2 =
* Improves support for embedding GitHub snippets/gists.
* Improves support for embedding Twitch videos, channel, and collections.

= 1.0.1 =
* Improves data caching.
* Adds data sanitation and filter hooks.

= 1.0.0 =
* Initial release.
