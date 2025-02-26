=== Google DocView Link WordPress plugin ===
Author: David R. Woolley
Contributors: David R. Woolley
Tags: links, google document viewer
Requires at least: 3.0
Tested up to: 4.6
Stable tag: trunk

This plugin provides two shortcodes that make it easier to create links 
to view documents with the Google Document Viewer.


== Description ==

The Google Document Viewer requires passing the URL of a document to be shown,
and said URL must be URL-encoded. Since it is a pain to URL-encode URLs by hand,
and since encoded URLs are hard to read, this plugin provides an easy way to 
generate url-encoded URLS.


Two shortcodes are provided: [gdocview_url] and [gdocview_link].

[gdocview_url] is passed a URL and returns it URL-encoded. 

This shortcode requires you to create your own HTML "a"; tag but allows the complete flexibility 
to do so however you want. The URL argument may be a full URL (starting with http) or a local URL
starting with a slash. If a local URL is passed, your WordPress site URL is automatically prepended.

Examples:

	`<a href='[gdocview_url url="http://example.com/my-document.pdf"]'>Click here to view</a>;`
	`<a href='[gdocview_url url="/wp-content/uploads/2016/04/my-document.pdf"]'>See the document</a>;`

	Note that you need to enclose the bracketed shortcode call in single quotes, not double, because if both the
	shortcode call and the URL within it are enclosed in the same type of quotes your browser will be confused.


[gdocview_link] is passed a URL and an optional text label, and returns a full clickable link.
As with [gdocview_url] the URL may be a full URL or a local URL starting with a slash. If no label
is passed, the default label "View Online" is used.

Example:

	`[gdocview_link url="http://example.com/my-document.pdf" label="View with the Google Viewer"]`



== Installation ==

1. Download and unzip the latest release zip file
2. Upload the entire directory to your `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress

== Requirements ==

* PHP 4+
* WordPress 3.0+

== Changelog ==

* 1.0.0 - 2012-05-22 - Initial release version
* 1.0.1 - 2012-06-15 - Tweaked documentation
* 1.0.2 - 2016-04-05 - Tweaked documentation again
