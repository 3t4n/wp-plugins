=== Plugin Name ===
Contributors: Dejan SEO
Donate link: http://dejanseo.com.au/
Tags: content, editing, article, hypotext, hidden, reveal
Requires at least: 3.0.1
Tested up to: 5.7
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Click to expand hidden content within your article.

== Description ==

Click to expand. Click to contract. Reveal additional content on-demand with our simple shortcode.

Traditional article formats present the reader with all of the article content in a linear view.
This often results in the reader not reading the article, or not being able to find the information
they were looking for. Hypotext allows a skeleton article to be created with the supporting content
being available inline, when the user clicks the "hypotext" link in the article.

Here is an example of [hypotext implementation](http://dejanseo.com.au/web-content/?utm_source=wordpress&utm_medium=plugin&utm_term=hypotext&utm_content=plugin-description&utm_campaign=hypotext).

== Installation ==

1. Upload the entire hypotext plugin directory to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Make use of the following shortcodes within your article content:

[hypotext target="your-target-id"]your link text[/hypotext]

[hypotext id="your-target-id"]the content to show when the above link is clicked[/hypotext]

== Frequently Asked Questions ==

= How many Hypotext instances may be included in a single post? =

There is no limit to the number of times Hypotext links can be used in your post.

= Can a single Hypotext link open multiple target content instances? =

You may give a number of target content instances the same id, and they will all be opened/closed
when the referencing Hypotext link is clicked.

= Can a Hypotext links and content be nested? =

No, you can't nest Hypotext tags within Hypotext content.
