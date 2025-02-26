=== Anti Feed-Scraper Message ===
Contributors: Joen
Tags: rss, xml, feed, atom, rss2, scrape, anti, prevention, spam
Requires at least: 2.6
Tested up to: 3.4.1
Stable tag: trunk

Discourage robots from scraping your RSS feed.

== Description ==

This plugin appends a customizable message with a link to every post in your RSS feed. This can help discourage robots from scraping your content (automatically copying and posting it elsewhere). This is the default message:

`[postname] originally appeared on [sitename] on [postdate].`

== Installation ==

1. Unpack the plugin, put it in your "plugins" folder (`/wp-content/plugins/`).
2. Activate the plugin from the Plugins section.

== Screenshots ==

1. This shows the default message at the bottom of the post.
2. This shows the options page where you can customize the message.

== Changelog ==

* 0.9.3: Moved from using a function that was deprecated in 2.9. 
* 0.9.2: Added `[tweetthis]` as an optional thing to add to your feed.
* 0.9.1: Fixed a problem with the date formatting. Now it shows the format picked in your Wordpress backend under "General Settings". 
* 0.9: First release.
