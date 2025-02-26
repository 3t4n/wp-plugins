=== Automatic Copyrights Shortcode ===
Contributors: linkpakdigital
Donate link: https://linkpak.com/donate
Tags: copyright shortcode, dynamic copyright year, year shortcode, updated copyright year, automatic copyright year, current year, copyright symbol
Requires at least: 3.0.1
Tested up to: 5.0.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Best copyright shortcode plugin to keep the copyright year of the website always updated.

== Description ==

Are you tired of updating the copyright year of your websites every year?

Don't worry! This plugin allows you to write once and forget about the updating it every year. Just write the schortcode [acs] in the post or widget or anywhere, and it will show the complete copyright year with 'copyright symbol', 'copyright text', 'current year', 'site name' and 'site url'.

**Tested with WordPress 5.0.3!**

[acs] shortcode also support various attributes and that can be hide or modified easily.

== Installation ==

Installing directly from wordpress backend

1. Goto Plugins -> Add New
2. Search for Automatic Copyrights Shortcode
3. Install and Activate the plugin
4. Use the shortcode [acs] wherever you want.


== Frequently Asked Questions ==

= How do I get my copyright show on my site? =

Try adding the shortcode [acs] to wherever you’d like to display the copyright on.

= What attributes does the [acs] shortcode accept? =

Automatic Copyrights Shortcode accepts the six attributes: "symbol", "copyright", "cyear", "byear", "title" and "url".


== Screenshots ==

1. Usage of shortcode in Post/Page Editor
2. Output of shortcode on front-end

== Changelog ==

= 1.0 =
* Initial version

== Plugin Usage ==

1. By default, writing [acs] shortcode will produce like <code>© copyright 2019 WordPress</code>
1. You can skip anything in default copyright text, just write 'hide' for that attribute
1. For example, to hide the copyright symbol from copyright, just write [asc symbol='hide'] and it will hide the symbol <code>copyright 2019 WordPress</code>
1. You can also change anything in default copyright text, just write the value of that attribute
1. For example, to change the default title of the site, just write [asc title='WordPress.org'] and it will override the default value <code>© copyright 2019 WordPress.org</code>
1. You can add the founded year in copyright text, just write the year to attribute *byear*
1. For example, to write 2012 as founded year, just write [asc byear='2012'] and it will show like <code>© copyright 2012-2019 WordPress</code>

Is it not simple? Yes! definitely it is.

Below is the list of all attributes you can modify or hide.

= Available Attributes =

1. *symbol* - It shows the copyright symbol. Default value is '©'
1. *copyright* - It shows the copyright text. Default value is 'copyright'
1. *cyear* - It shows the current year. Default value is 'true'
1. *byear* - It shows the founded year. Default value is 'false'
1. *title* - It shows the site name. Default value is your site name
1. *url* - It links the url to the title. Default value is your site url

