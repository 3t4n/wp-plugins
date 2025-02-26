=== AddThis xmlns ===
Contributors: pantaluna
Plugin Name: AddThis xmlns
Plugin URI: http://www.feestdagen-belgie.be/
Tags: addthis, xmlns, xhtml
Author URI: http://www.feestdagen-belgie.be/
Author: Rolf
Donate link: http://american.redcross.org/site/PageServer?pagename=ntld_main
Requires at least: 2.9
Tested up to: 4.1
Stable tag: 1.0.0
Version: 1.0.0

== Description ==
This plugin adds the xmlns:addthis="http://www.addthis.com/help/api-spec" entry to the HTML <head> tag. This head entry is required to make it Valid XHTML. More info at http://www.addthis.com/help/client-api#valid-xhtml

== Installation ==
This section describes how to install the plugin and get it working.

1. Delete any existing 'mjd-addthis-xmlns' folder from the '/wp-content/plugins/' directory.
1. Upload the 'mjd-addthis-xmlns' folder to the '/wp-content/plugins/' directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.

== Upgrade Notice ==
None.

== Screenshots ==
1. Screenshot of the HTML <head> tag which now includes the xmlns:addthis entry!

== Changelog ==

= 1.0.0 =
* Initial release.

== Frequently Asked Questions ==

= Why do I need this plugin? =
If you are using the AddThis bookmarking plugin ( http://wordpress.org/extend/plugins/addthis/ ) 
then you need this plugin to make sure that the generated HTML by the AddThis plugin is Valid.
The plugin adds the xmlns:addthis="http://www.addthis.com/help/api-spec" entry to the html head tag so that the custom attributes of the AddThis plugin are recognized properly.

