=== Append User ID ===
Contributors: mardellme
Tags: userid, currentuserid, tag, string, url, user, append, id
Requires at least: 4.0
Tested up to: 5.3
Requires PHP: 5.6
Stable tag: 1.0.0
License: GPLv3 or later License
URI: http://www.gnu.org/licenses/gpl-3.0.html

A plugin which adds some shortcode to append the current user ID to a link (href).

== Description ==

Adds the current logged in user ID to a specified string

`[user_link url="https://domain.com/link"]A link[/user_link]`

Will output the following HTML

`<a href="https://domain.com/link?user_id=1">A link<a/>`

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the plugin files to the `/wp-content/plugins/append-user-id` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress

== Screenshots ==
1. Frontend view
2. Backend view

== Frequently Asked Questions ==

= How do I change the HTML output? =

There are a few filters available to override certain parts of the output. The
main filter is `append_id_content` and can be used as follows:

`/**
 * Change HTML output
 */
 function your_theme_append_id_content ( $html, $url, $content ) {
 	$link_html = '<a id="your_id" href="' . esc_url( $url ) . '">';
 	$link_html .= esc_html( $content );
 	$link_html .= '</a>';

 	return $link_html;
 }
 add_filter( 'append_id_content', 'your_theme_append_id_content', 10, 3 );`

== Changelog ==

= 1.0.0 =
* Initial release.
