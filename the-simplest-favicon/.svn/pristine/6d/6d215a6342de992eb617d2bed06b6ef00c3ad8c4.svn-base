=== The Simplest Favicon ===
Contributors: epipe-com
Tags: favicon
Requires at least: 3.0
Tested up to: 4.5.2
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds a favicon link to the document head section.

== Description ==

This plugin adds a favicon link to the document head section.

There are no options. The link is always added when the plugin is enabled.

The `favicon.ico` file needs to be uploaded to the site's root
directory. If you do not know how to do this, you should have a look at
one of the other favicon plugins.

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the `favicon.ico` file to your site's root directory.
2. Make sure that the favicon file is accessible with web browser or
   wget/curl at http://yoursite.example.com/favicon.ico
3. Make sure that the favicon file is served with the "image/x-icon"
   content type to ensure maximum compatibility. An easy way to verify
   this is to run: `curl -I http://yoursite.example.com/favicon.ico`
4. Upload `the-simplest-favicon.php` to the `/wp-content/plugins/` directory.
5. Activate the plugin through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==

= Why do I need to place the favicon file in the site root? =

The site root directory is the best place for the favicon file.

Some older browsers and most feed readers have no way of specifying
the favicon file location in the document or feed markup. They always
attempt to retrieve it from the site's root directory.

= My browser finds the favicon automatically even without this plugin? =

Most browsers look up the favicon file in the default location
automatically, but some do not. They need to be told where it is
located and this is what this plugin does.

= Wouldn't it be easier just to edit my theme's header.php and add the favicon link there? =

Up to you. Choose whatever way is easiest for you.

If you edit the theme's `header.php` you will need to make the same
changes again if you later on update or change your theme. With this plugin
you do not need to remember to do that and upgrading becomes simple.

= My theme already specifies the location of the favicon? =

In this case you probably do not need this plugin. It might be still
best to put the `favicon.ico` file in your site's root directory.

= I am unsure how to create the favicon.ico file? =

This is well documented elsewhere. A good place to start is
to understand [Wikipedia article on favicon][wfavicon].

[wfavicon]: https://en.wikipedia.org/wiki/Favicon
        "Wikipedia article on favicon"

== Changelog ==

= 1.1 =
* Use get_site_url() instead of get_home_url() to get the real site root.

= 1.0 =
* Initial version.

== Upgrade Notice ==

= 1.1 =
Change to use get_site_url() instead of get_home_url() to get the real site
root. This makes the plugin work when WP is installed in subdirectory.
Thanks Patrick!

= 1.0 =
Initial version.

