=== 410 Delete Pages SEO ===
Contributors: steepdigital
Tags: error, gone, robots
Requires at least: 3.7
Tested up to: 5.4
Stable tag: trunk
License: GPL v3 - http://www.gnu.org/licenses/gpl-3.0.html

Force 410 HTTP Status on listed pages, or just articles/pages that no longer exist. 

== Description ==

Force 410 HTTP Status on listed pages, or just articles/pages that no longer exist.

The [HTTP Specification](http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html#sec10.4.11) defines the `410` response header for use when a resource has been permanently removed. It informs robots visiting your site that the requested content has gone, and that they should stop trying to access it.

If you come across any bugs or have suggestions, please use the plugin support forum.

== Frequently Asked Questions ==

= Can I customise the 410 response message? =

The default message is a simple plain text message that reads "Sorry, the page you requested has been permanently removed." This is because many people want to minimise the bandwidth that is used by error responses.

If you want to customise the message, just place a template file called `410.php` in your theme folder, and the plugin will automatically use that instead. Take a look at your theme's `404.php` file to see how the template needs to be structured. You can also hook into the `wp_410_response` action to trigger any specific events for queries resulting in a 410 response.

= Will this plugin work if a caching/performance plugin is active ? =

The plugin has been tested with the following caching plugins, and should work even if they are active:

- W3 Total Cache
- WP Super Cache

I have not tested it with other caching plugins, and there is a high chance that it **will not work** with many of them. Most of them will cache the response as if it is a 404 (page not found) response, and issue a 404 response header instead of a 410 response header.

== Changelog ==


== Installation ==

1. Upload the plugin folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. The plugin settings can be accessed via the 'Plugins' menu in the administration area
