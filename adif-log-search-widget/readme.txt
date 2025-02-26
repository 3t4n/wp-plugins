=== ADIF Log Search Widget ===
Contributors: emka73
Donate link: http://dh9sb.dx-info.de/
Tags: ADIF, log search, QSO, ham radio, amateur radio
Requires at least: 3.0
Tested up to: 3.7
Stable tag: 1.0f
Version: 1.0f

This Wordpress widget allows you to upload ADIF log data to check the QSO.

== Description ==

You can upload the log data as ADIF so the QSO data is ready for search. 
Of course, you can setup the view on the QSO data according to your personal 
needs. You can also define multiple call signs and references.

Functions:

* Complete integration in Wordpress
* Import ADIF log data
* Definition of different reference numbers, like IOTA, WFF, DXCC…
* Usage of several call signs
* Setup the view according to your personal needsfferent reference numbers, like IOTA, WFF, DXCC…


== Installation ==

1. Download the ADIF Log search widget
2. Choose the "Plugins" menu in your Wordpress backend
3. Choose "Plugin upload" to upload the ADIF Log Search widget
4. Installation starts automatically
5. Go to "Plugins" menu to activate the widget.

You should now find "Logbook" in your menu of your wordpress backend

Get the widget to your frontend

1. Choose "widget" in the "Design" menu
2. Drag the "ADIF Log Search" widget into your sidebar

Have fun!

== Frequently Asked Questions ==

= When the plugin is deactivated, the data be deleted? =

No

== Screenshots ==
1. Options
2. Upload
3. Books
4. Refereces

== Changelog ==

= 1.0f =
* add QSL status
* add time_off
* bugfixing booklist $wpdb->prepare

= 1.0e =
* bugfixing jQuery

= 1.0d =
* add Prop_mode to processing QSO propagation mode
* Books upload date shows now not the initial upload date but the date of the last upload if you append data to your existing book.
* Books list shows now the reference name instead of the id
* Some changes in the code due the update to WP 3.3

= 1.0c =
* Some programs will generate an ADIF file with no spaces between the data sets. This causes problems in processing. This has been corrected.

= 1.0b =
* bugfixing jQuery noConflict wrappers 
* add jQuery, jQuery-UI to package

= 1.0a =
* bugfixing db install procedure

= 1.0 =
* initial version

== Upgrade Notice ==

= 1.0c =
* ADIF processing bug

= 1.0b =
Some bugfixes