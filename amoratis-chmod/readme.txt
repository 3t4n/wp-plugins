=== Amoratis CHMOD ===

Requires at least: 3.7.5
Stable tag: 1.1.0
Version: 1.1.0
Tested up to: 5.6.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


/**
 * Plugin Name:       Amoratis CHMOD
 * Plugin URI:        https://wordpress.org/plugins/amoratis-chmod/
 * Description:       This plugin provides a sidebar widget which can be used to adorn and supplement the functionality of your page. By clicking checkboxes, the user can generate the appropriate octal notation for file permissions. Creating a tutorial on file permissions? Place this into your sidebar. Do you run a page covering Linux issues for noobs? Place this into your sidebar and provide some utility that gives people a reason to bookmark your page and keep coming back. . Also allow the user ab testing and conversion tracking.
 * Author:            jackamoratis
 * Author URI:        https://jackamorat.is
 * Requires PHP:      7.0.33
 * Text Domain:       amoratis-chmod
 */



== Description ==

This plugin provides a sidebar widget which can be used to adorn and supplement the functionality of your page. By clicking checkboxes, the user can generate the appropriate octal notation for file permissions. Creating a tutorial on file permissions? Place this into your sidebar. Do you run a page covering Linux issues for noobs? Place this into your sidebar and provide some utility that gives people a reason to bookmark your page and keep coming back.

In Unix-like operating systems, chmod is the command and system call which may change the access permissions to file system objects (files and directories). It may also alter special mode flags. The request is filtered by the umask. The name is an abbreviation of change mode. (Wikipedia)

== Changelog ==

1.1.0 Converted the plugin to an object so it can be more effectively unit tested. This is not something a website visitor will notice. It is back end functionality that is useful for web developers who would like to include testing of this plugin in their unit testing.

1.01 More robust implementation of enqueue script. It just means that the plugin will be more compatible with more themes, and less likely to malfunction.

1.00 This initial release of the plugin has been tested to work with WordPress 3.9. This widget does not enforce its own colors or fonts, and should appear consistent with the rest of your themed page content. Tested to work on desktop or mobile.

== Frequently Asked Questions ==
Q. Does this plugin change the permissions of my files?

A. No. This plugin places a widget in your sidebar which has checkboxes in it. As you click the checkboxes, the numbers below the checkboxes change. Those numbers are the octal notation which can be used for setting file permissions.

== Installation ==

Install the plugin as you would install any WordPress plugin. Activate it. Then from the administration interface of WordPress, you can click Appearance -> Widgets. Simply drag the Amoratis CHMOD widget into the sidebar configuration display at a position of your choosing. When you visit the front page of your website, there will be a CHMOD converter in your sidebar.

== Upgrade Notice ==
There have not yet been any upgrades.

== Screenshots ==
http://chmod.jackamoratis.com/images/amoratis-chmod-sidebar-screenshot.jpg

Copyright (C) 2014, 2021  Jack Amoratis

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License version 3 GPLv3 as published by
    the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see http://www.gnu.org/licenses/gpl.html