=== Kw DataBase ===

Contributors: KwarK
Donate link: http://kwark.allwebtuts.net/
Tags: data, bdd, save, save table by table, save dump, save data, wordpress, plugin
Tested up to: 3.2.1
Stable tag: 1.0.1

Save data to multiple folder on server side, create, download and manage a full dump or dump table by table

== Description ==

Options

* Save data table by table in a folder on server side and manage folders
* download directly a table or multiple table after this operation
* Save download or manage full dump
* download an old dump file from an old backup
* download directly after the dump operation
* clean the old options plugins on your database
* clean Wordpress revision
* clean comment marqued "spam"
* optimise table option for better queries

Use this plugin with caution, ask your provider about the possible duration of a php script. Check the SQL file is complete if you have a shared hoster and a database of more than 50 mo. If you have a server, adjust the execution time of a php script.

If you have some difficulty to put this plugin in your language, just go to wp-config.php and change the line 

`define ('WPLANG', ' ');` 

by 

`define ('WPLANG', 'en_US');` 

or by 

`define ('WPLANG', 'en_GB');`


contact : http://kwark.allwebtuts.net


== Installation ==

1. Upload 'kw-database' to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Define the time script in seconde and your prefix on DATA save Tab

== Screenshots ==

1. Screenshot kw-database administration

== Frequently Asked Questions ==

View forum support on Wordpress for more information


== Upgrade Notice ==

1. Use the Wordpress automatic upgrade notice or upgrade this plugin manually


== Changelog ==

= 1.0.1 =

* Adding unset value for renforced security and new option "optimise" for better queries

= 1.0 =

* Original review

