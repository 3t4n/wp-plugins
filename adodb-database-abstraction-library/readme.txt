=== ADOdb Database Abstraction Library by Occhio ===
Contributors: occhio, oebe
Tags: database, adodb
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 1.02
License: for plugin: GPLv2 or later, but ADOdb-library is BSD
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Allows you to use the ADOdb Database Abstraction Library. If the $wpdb-object does not comply with your knowledge and your coding standards.

== Description ==

Allows you to use the ADOdb Database Abstraction Library. If the $wpdb-object does not comply with your knowledge and your coding standards.

We encourage the use of the WP_Query-class since it is a WordPress standard
http://codex.wordpress.org/Class_Reference/WP_Query

If more freedom is needed, use the global variable: $wpdb-object.
http://codex.wordpress.org/Class_Reference/wpdb

Though, some people like to use the ADOdb library because they have ported code which contains ADOdb-queries or have ADOdb queries

More info about ADOdb can be found on http://adodb.sourceforge.net/


== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Download Plugin from the plugins directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Use like $oResults = Adodb::get_instance()->execute("SELECT * FROM `your_custom_table`"));

== Frequently Asked Questions ==

= Can I still use WP_Query =

Yes, sure. This ADOdb plugin does not replace anything.

= Can I still use $wpdb =

Yes, sure. This ADOdb plugin does not replace anything.



== Screenshots ==



== Changelog ==

= 1.03 =
* Minor name change

= 1.02 =
* Version numbering change. We'll stick to x.xx for stable versions

= 1.00.01 =
* Minor comments changes

= 1.00 =
* First version


== Upgrade Notice ==
