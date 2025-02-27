=== Date Calculator ===

Contributors: matthias.s
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=K73Z3MNV82UTQ
Tags: date, calculate, date up, date down, tomorrow, next week, last month, CF7, Contact Form 7, Datum, morgen, Datum rechnen, shortcodes
Requires at least: 3.6
Tested up to: 5.0
Stable tag: 1.2.0
License: GNU General Public License GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Date Calculator returns the current date via shortcode and it can calculate it into an other and returns it in posts, pages and also in CF7-forms.

== Description ==

The Date Calculator plugin has NOW three basic functions.

* 1. It returns the current date via the shortcode [date_now] in posts, pages and also in Contact Form 7-forms.

* 2. It can calculate a date up [date_add] or down [date_sub] and returns it in posts, pages and also in Contact Form 7 forms.

* 3. It can say a special date [date_say] like <code>last monday</code> or <code>second friday of next month</code> and returns it in posts, pages and also in Contact Form 7 forms.

NEW IN VERSION 1.2.0: Now it is also possible to determine the date format!!!

This plugin enable the shortcode-support within Contact Form 7-forms so that the Date Calculator-shortcodes can also be used there.

== Installation ==

1. Upload the unziped date_calculator folder to the /wp-content/plugins/ directory -or- install the plugin via WordPress build-in Plugin-Installation-Function.

2. Activate the plugin through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==

= How are the shortcodes? =

The following shortcodes are available:
<code>[date_add day="1" month="1" year="1" show="dayonly/monthonly/yearonly" format="d.m.Y"]</code>
<code>[date_sub day="1" month="1" year="1" show="dayonly/monthonly/yearonly" format="m/d/Y"]</code>

= You need more examples? =

= Calculating the date down: =
Suppose today is the 01.10.2014

<code>[date_sub day="1"]</code> returns: 30.09.2014
<code>[date_sub month="3"]</code> returns: 01.07.2014
<code>[date_sub year="4"]</code> returns: 01.10.2010
<code>[date_sub day="1" month="3" year="4"]</code> returns: 30.06.2010


= Calculating the date up: =
Suppose today is the 01.10.2014

<code>[date_add day="1"]</code> returns: 02.10.2014
<code>[date_add month="3"]</code> returns: 01.01.2015
<code>[date_add year="4"]</code> returns: 01.10.2018
<code>[date_add day="1" month="3" year="4"]</code> returns: 02.01.2018


= Displaying of certain date parts: =

It is also possible to only impersonate one part of the date, for example, only the day
This is specified with the "show-parameter".
Suppose today is the 01.10.2014

<code>[date_add day="1" show="dayonly"]</code> returns: 02
<code>[date_add month="3" show="monthonly"]</code> returns: 01
<code>[date_add year="4" show="yearonly"]</code> returns: 2018
<code>[date_sub day="1" show="dayonly"].[date_sub month="3" show="monthonly"]</code> returns: 30.07
<code>[date_add year="0" show="yearonly"]-[date_add month="1" show="monthonly"]-[date_add day="1" show="dayonly"]</code> returns: 2014-11-02


= Returning a special date in your own format: =

It is also possible to impersonate a special date, in your desired format. This is specified with the format-parameter.
Suppose today is the 01.10.2016

[date_say what="next monday" format="m/d/Y"] returns: 10/03/2016
[date_say what="next monday" format="j. F Y"] returns: 3. October 2016

For more details please look in to the documentation within the plugin.

== Screenshots ==

1. The shortcode documentation

2. Use the shortcodes on posts, pages, widgets and in CF7-Forms

3. Make your thing


== Changelog ==

= 1.2.0 =Update: February 19, 2018

* Ready for WP 5.0.

= 1.1.0 =Update: August 02, 2016

* New feature to set your own date-format.
* New feature to set a special date like 'next monday' or 'second friday of next month'.

= 1.0.2 =Update: July 30, 2016

* Ready for WP 4.6.

= 1.0.1 =Update: September 20, 2014

* Prevent Direct Access of PlugIn-File.

= 1.0.0 =
Release Date: September 9, 2014

* First Release.

== Upgrade Notice ==

= 1.2.0 =Update: February 19, 2018

* Ready for WP 5.0.

= 1.1.0 =Update: August 02, 2016

* New feature to set your own date-format.
* New feature to set a special date like 'next monday' or 'second friday of next month'. 

= 1.0.2 =Update: July 30, 2016

* Ready for WP 4.6

= 1.0.1 =Update: September 20, 2014

* Prevent Direct Access of PlugIn-File.

= 1.0.0 =
Release Date: September 9, 2014

* First Release.
