=== Plugin Name ===
Contributors: levertechadmin
Tags: get, params, shortcode, vars
Requires at least: 4.0
Tested up to: 5.2.2
Stable tag: 1.1
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Shortcodes allowing you to display GET parameters from the current URL in pages and posts, or show/hide content depending
on GET param values

== Description ==

GET params is a plugin providing your pages and posts with shortcodes allowing you to display GET parameters from 
the current URL in pages and posts, or show/hide content depending on GET param values.

As an example, I use this plugin so that I can show personalized installation instructions to users of another piece of 
software I wrote, simply by directing them to a URL on my WordPress site, along with GET variables chosen to 
ensure that custom fields and sections display exactly as required for them to install my software.

**See FAQ if you are having problems under WordPress 4.2.3**

Examples follow, assuming the user goes to your post page http://example.com/post/3/?paramname=showme

= Displaying GET parameters directly =

 `[display-get-param name="paramname"]`
 
 Shows the value of GET named paramname ('showme' in the example URL), or "blank value" if none given.
 
 `[display-get-param name="paramname" default="Paramname was blank"]`
 
 Shows the value of GET named paramname, or "Paramname was blank" if none
 
= Controlling display of enclosed content depending on GET parameter values =

 `[display-if-get name="myparam"]`
 
	This enclosed content only shows if myparam is passed as a GET param (with any value)
	
 `[/display-if-get]`

Another example specifying a value to match:

 `[display-if-get name="myparam" value="true"]`
 
	This content only shows if myparam is passed as a GET param and equals "true"

 `[/display-if-get]`

= Inverting the criteria =

The plugin also contains an opposite to display-if-get, called display-if-not-get.

display-if-not-get content will display only in all cases where display-if-get with the same parameters would NOT show.

This means that display-if-not-get content will also show if the named parameter does not exist at all in the URL query string.

= If/else blocks =

This is essentially possible by using a combination of display-if-get and display-if-not-get with the same parameters.

 `[display-if-get name="opt" value="1"]`

	You chose option 1 - URL contains /?opt=1.

 `[/display-if-get]`

 `[display-if-not-get name="opt" value="1"]`

	You chose an option that is not option 1.

 `[/display-if-not-get]`

== Frequently Asked Questions ==

= Is there a problem with the plugin under WordPress 4.2.3? =

There is a known problem where the plugin shortcodes are used within URLs or other HTML attributes which are themselves inside quotes.

For example:

&lt;a href=&quot;/anotherpage?id=[display-get-param name=&quot;id&quot;]&quot;&gt;Click Here&lt;/a&gt;

apparently no longer works on WP 4.2.3 even though it did in 4.2.2.

It's not clear whether this type of shortcode usage is permitted by WordPress at all, but in any case some users have found that mixing the quotation style helps:

&lt;a href=&quot;/anotherpage?id=[display-get-param name='id']&quot;&gt;Click Here&lt;/a&gt;

= How can I obtain support for this plugin? =

Please help each other on the public support forums.

== Installation ==

Easiest way:

1. Go to your WordPress admin control panel's plugin page
1. Search for 'GET params'
1. Click Install
1. Click Activate on the plugin
1. Start using shortcodes as described in our examples

If you cannot install from the WordPress plugins directory for any reason, and need to install from ZIP file:

1. Upload directory and contents to the `/wp-content/plugins/` directory, or upload the ZIP file directly in
the Plugins section of your Wordpress admin
1. Follow the instructions from step 4 above

== Changelog ==

= 1.1 =

Added display-if-not-get.

= 1.0 =
First version

