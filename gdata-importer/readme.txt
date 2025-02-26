=== GData Importer ===
Contributors: ankit_sam
Donate link: http://www.ankitsharma.info/buy-ankit-a-beer
Tags: Google, Docs, Spreadsheet, Data, Import
Requires at least: 2.2
Tested up to: 3.9
Stable tag: 1.0.2

A plugin imports Google Spreadsheet Data into the Wordpress Page/Post using shortcode.

== Description ==

A wordpress plugin which imports Google Spreadsheet Data into the Wordpress Page/Post using shortcode.
You have to provide Sheet Key, Worksheet Name, Username and Password in shortcode.

Usage:
[gdata_import key="spreadsheet_key" worksheet="worksheet_name" user="your_username" pass="your_password"] 

Example:
[gdata_import key="0AqJJ6fnIoHPYdE1qTFF0OWtFX2xfRHU1OC1oY0JIeVV"
worksheet="Sheet1" user="your_username" pass="your_password"]

== Installation ==

1. Upload `gdata-importer` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place shortcode [gdata_import key="spreadsheet_key"
worksheet="worksheet_name" user="yourusername" pass="yourpassword"] in your post

== Frequently Asked Questions ==

= Where to get spreadsheet key? =

You can get the spreadsheet key from the Spreadsheet URL.

Example Spreadsheet URL: https://docs.google.com/spreadsheet/ccc?key=0AqJJ6fnIoHPYdE1qTFF0OWtFX2xfRHU1OC1oY0JIeVV#gid=0

Then your Spreadsheet key is: 0AqJJ6fnIoHPYdE1qTFF0OWtFX2xfRHU1OC1oY0JIeVV

= Where to get worksheet parameter? =

The worksheet parameter refers to the worksheet name.

Example: Sheet1


= I am getting error "ERROR: Unable to Connect to ssl://docs.google.com:443. Error #110: Connection timed out" =

Some hosting providers do not allow https connections to be made from their servers, Contact your Hosting to assist & solve the problem.

Refer: https://developers.google.com/gdata/articles/php_client_lib#appendix_issues_proxy


== Screenshots ==

1. Spreadsheet Key
2. Worksheet Name
3. Data in Spreadsheet
4. Imported Data in wordpress

== Changelog ==


= 1.0.2 =
Bug Fixes.
Added Title for Sheets.

= 1.0.1 =
Bug Fixes.

= 1.0.0 =
Initial Release.

== Upgrade Notice ==
= 1.0.1 =
Latest Version