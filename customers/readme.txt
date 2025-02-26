=== Plugin Name ===
Contributors: fmarie
Donate link: http://www.fmarie.net/
Tags: directory, customers, suppliers, friends, groups
Requires at least: 3.4
Tested up to: 3.4.1
Stable tag: 1.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Directory for customers, suppliers, friends or others groups

== Description ==

This plugin display a directory of customers, suppliers, friends or others groups with a shortcode [CUSTOMERS].

With a template's system, it's easy to change presentation of list.



== Installation ==


1. Upload customers directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to Settings > Customers to manage your directory
4. Add [CUSTOMERS] to article/page and your directory is displayed

== Frequently Asked Questions ==

= I want to change presentation, what can I do ? =

You have a directory templates where you can create your own template.
I have placed 2 simples templates for example. You can add another and change in customers.php the variable CTS_TPF (line 39) by the name of your template.

= Where is my data stored ? =

2 tables where created at activation.
wp_pays and wp_customers. If your WP table's prefix is different to wp, it change automatically.
wp_pays have datas with all of countries (238 countries). You can add/modifiy/delete.

= What is the field and her type in table ? =

pays :
`rowid` int(11)
`code` varchar(2)
`en` varchar(255)

customers :
cuid INT( 11 )
cupays INT( 11 )
cuname VARCHAR( 50 )
cuadr1 VARCHAR( 150 )
cuadr2 VARCHAR( 150 )
cucp VARCHAR( 50 )
cutown VARCHAR( 100 )
cutel VARCHAR( 50 )
cufax VARCHAR( 50 )
cumail VARCHAR( 50 )
cuweb VARCHAR( 150 )
culogo VARCHAR( 250 )

This is important to know that for create your own template.


= Do you have another question ? =

Go to support !

== Screenshots ==

1. The result for display all countries with template bycountries
2. The result after select a country

== Changelog ==

= 1.1.0 =
First public release

