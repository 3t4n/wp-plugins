=== ActionPress ===
Contributors: nickcousins
Tags: Read more, readmore, more, read more link, elipsis, excerpt
Requires at least: 3.0
Tested up to: 4.5.2
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Replace the [...] more link with custom text for each post, creating a specific call-to-action.

== Description ==
= Because "read more" isn't good enough =
Turn your "More" links into a bespoke call-to-action for each post. Rather than have "Read more" or "[...]" after your excerpt, you could have "See Bob's garden up close" in a post about a beautiful garden, or "Try our tasty sauce" in a bolognese sauce recipe.

== Installation ==
1. Upload the plugin files to the `/wp-content/plugins/actionpress` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress

= Usage =

1. Create a new post, or edit an existing post
2. You'll see a new meta-box above the *Update* or *Publish* button that says *Post Action*
3. Enter your call-to-action for this post and press the *Update* or *Publish* button to save changes.

Any posts with no call-to-action text defined will have a read more link that simply says "Read more". But you don't want that!

== Frequently Asked Questions ==

= How can I customise the style of the ActionPress more link? =
If you want to customise the style of your ActionPress more link, simply target the .actionpress_more class.

The default styling is simple:

`.actionpress_more{
    display:block;
    margin:10px auto;
}`


= I have installed and activated the plugin, but I'm still seeing the normal Wordpress 'more' link - what's wrong? =
By default, ActionPress has a priority of 20. This means that it applies its changes to the more link after all other changes (up to 19). It discards the previous more link entirely, therefore any changes up to 19th in the queue will be discarded. If your theme, or another plugin uses a higher priority than 20, then ActionPress may be over-ruled by that theme or plugin.
If you want to filter the ActionPress text, make the filter priority in your theme > 20.

Any other problems, tweet me *@nickpcousins*

== Screenshots ==

1. For example, here's a post about interior design, the more link reads "See our top tips for cosification"
2. You configure the "more" text in the post editing screen, above the "Publish" or "Update" button.

== Changelog ==
= 1.0.1 =
* Wordpress Plugin directory metadata update

= 1.0 =
* Initial release of ActionPress
