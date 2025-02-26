=== RSS Feed Block (Gutenberg) ===
Contributors: aatanasov
Tags: gutenberg, block, RSS, feed
Requires at least: 5.0.0
Tested up to: 6.0
Requires PHP: 5.6
Stable tag: 0.3
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
 
This is a WordPress plugin that registers a Gutenberg block. The block displays posts from an RSS feed.
 
== Description ==

This is a Gutenberg block that pulls posts from an RSS feed.

The plugin uses the `fetch_feed` WordPress function to display the entries from a feed on your website (https://codex.wordpress.org/Function_Reference/fetch_feed).

== Requirements ==

Gutenberg has to be installed on your WordPress instance in order to use this plugin. 

== Installation ==

Here are the steps for installing and setting up this plugin to your WordPress site:
 - download the plugin and upload it to your plugins folder;
 - activate the plugin from the WordPress dashboard;
 - go to the edit page of the article, that will display the feed, and choose the **RSS Feed** Gutenberg block from the available list.

== Configuration ==

Once the plugin is installed, you'll first need to enter the URL of your feed URL. There is a helpful button for validating the feed URL. If there is something wrong, an error will appear.

Here are the available feed options:
 1. Number of posts to be shown on the front-end. The default number is 10.
 2. Whether to show the descriptions of the posts on the front-end.
 3. Whether to show the dates of the posts on the front-end.
 4. Whether to show the content of the posts on the front-end.

== WordPress Hooks ==

There are a few WordPress hooks that allows you to modify the output. All of them are related to the front-end.

**Actions**

`grf_before_items` -- called before displaying the feed on your site.

`grf_before_item` -- called before each feed entry.

`grf_after_item` -- called after each feed entry.

`grf_after_items` -- called after all listed entries.

**Filters**

`grf_frontend_output` -- allows you to modify the HTML markup that will be displayed on the site.

== Front-end error messages ==

In case, a feed isn't configured or it isn't a valid one, the following messages might appear on the page that uses the custom block:
 - Missing feed URL: `Please set the URL of the RSS feed through the WordPress dashboard.`
 - Incorrect feed: `Please make sure the provided URL is a valid feed.`
 - No posts: `No feed items found.`

== Frequently Asked Questions ==

== Screenshots ==

1. On the left side the screenshot shows the form where you can enter your feed URL and validate it. On side panel you can see the available options of the block.
2. This screenshot shows the options of the block.

== Changelog ==

0.3 Add show content option.

0.2 Address some incompatibility issues.

0.1 first version.