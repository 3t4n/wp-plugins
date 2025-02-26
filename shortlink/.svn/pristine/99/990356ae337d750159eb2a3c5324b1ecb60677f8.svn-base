=== Plugin Name ===
Contributors: akrabat, samj
Tags: shortlink links url
Requires at least: 2.5
Tested up to: 2.7.9
Stable tag: 1.2

This plugin is no longer maintained. Please use another one, such as Shorter Links
(https://wordpress.org/plugins/shorter-links/).

== Description ==

The Short Link WordPress plugin automatically creates a link element in the
<head> section of the post's page with rel="shortlink" attributes. The URL in 
the href attribute defaults to the id number of the post in question but can
be overridden with a human-friendly slug after the post has been saved.
 
It also creates an HTTP `Link` header that conveys the same information as a
performance optimisation (clients need only do a HTTP HEAD to resolve the URL)

The link element looks like this:
    
    <link rel="shortlink" href="{url}" />

The HTTP header is:  

    Link: <{url}>; rel=shortlink

Related Links:

* Google Code Site: http://code.google.com/p/shortlink/

== Installation ==

1. Upload `shortlink.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. To set a custom short link, update a post so that the custom field is
   created and then fill in a unique value in the field.

== Todo ==

* Allow some more flexibility with the creation of shortlinks:
   - numeric unique identifier (e.g. http://example.com/123)
   - compressed numeric unique identifier (e.g. http://example.com/3r)
   - human friendly slug (e.g. http://example.com/promo)

== Licence ==

This plugin is licensed under the Apache 2.0 license: 
http://www.apache.org/licenses/LICENSE-2.0

== History == 

* 1.0 - 2009-04-13
Initial release.
