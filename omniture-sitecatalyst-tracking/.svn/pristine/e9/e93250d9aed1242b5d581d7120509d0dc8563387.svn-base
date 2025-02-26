=== Omniture SiteCatalyst Tracking ===
Contributors: stephp
Requires at least: 2.6
Tags: analytics, omniture
Tested up to: 2.8.6
Stable tag: trunk

This plugin provides functionality to add basic Omniture SiteCatalyst tracking.

== Description ==

This Omniture SiteCatalyst Tracking plugin provides tracking for basic WordPress navigation, including the following pages:

* homepage
* article
* category page
* tag page
* archive
* static page

It sets the following SiteCatalyst variables:

* s.pageName
* s.channel
* s.pageType
* s.prop1
* s.prop2
* s.prop3

It uses the wp_footer hook to be displayed in the footer of the HTML throughout your templates.

Omniture SiteCatalyst is a paid analytics service.

More information on the development of this plugin can be found at http://blog.endpoint.com/2009/11/wordpress-plugin-for-omniture.html.

Development of this plugin is sponsored by http://www.endpoint.com/.

Future work of this plugin will involve using the wp_options table to store your Omniture account_id and the path to the required javascript files.

== Installation ==

1. Uploaded `omniture.php` to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Update line #10 in the plugin to use your Omniture SiteCatalyst account id.

  &lt;!-- var s_account = 'omniture_account_id'; --&gt;
4. Update line #12 in the plugin to link to the Omniture SiteCatalyst `s_code.js` file. A recommended location for this file would be in the parent directory that is separated from the WordPress code base.

  &lt;script type="text/javascrript" src="/path/to/s_code.js"&gt;&lt;/script&gt;

== Frequently Asked Questions ==

= What is Omniture SiteCatalyst? =

Omniture SiteCatalyst is a paid analytics service offered as part of the Omniture suite. More information can be found at http://www.omniture.com/.

= Are there any dependencies for this plugin? =

Yes, you must have an Omniture SiteCatalyst account. You must know your Omniture account_id and have access to upload your Omniture `s_code.js` SiteCatalyst file. Both of these are required in order for the plugin to work.

= What SiteCatalyst variables are tracked in this plugin? =

The SiteCatalyst plugins s.pageName, s.channel, s.pageType, s.prop1, s.prop2, s.prop3 are tracked in this plugin.

== Changelog ==

= 1.0 =
Introduction of plugin.

== Upgrade Notice ==

= 1.0 =
Introduction of plugin.
