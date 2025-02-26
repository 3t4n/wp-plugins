=== NOAA Weather ===
Contributors: tberneman
Donate link: http://NOAAWidget.com
Tags: forecast, local, NOAA, plugin, plug-in, United States, US, Weather, widget, wordpress
Requires at least: 3.0
Tested up to: 5.9
Stable tag: trunk

Get NOAA weather information in the sidebar for your locale. Note that NOAA reports weather for US States, Commonwealths, & Territories only.

== Description ==

The NOAA Weather widget will show the current weather and weather icons for any locale in the United States (including the commonwealths & territories) that NOAA reports on. It will automatically add the necessary information into the WordPress cron to update every 30 minutes.

Please remember to come back and Rate this plugin as well as report the compatibility of this plugin. If you have any questions, problems or suggestions please don't hesitate to email me at tberneman@gmail.com and I will respond quickly.

To find your code go to this link http://www.weather.gov/xml/current_obs/ and find your state or location in the dropdown list and click the "Find" button. On the next screen find your 'Observation Location' and the code you need is in parenthesis after the location name.

Depending on your theme you may need to tweak the CSS file. Editing is available through the WordPress Admin Menu via Plugins->Editor. Then in the upper-right corner change the 'plugin to edit' dropdown box to "NOAA Weather" and click the "Select" button to the right of that. Next click on the "noaa-weather/noaa-weather.css" file just below the dropdown box and "Select" button.

You can have multiple instances of the widget on the same page.

This widget periodically downloads an XML file from NOAA into the widget folder so it will need the appropriate permissions. Files need to be set to "0644" and folders need to be set to "0755". See http://codex.wordpress.org/Changing_File_Permissions) for more information.

== Possible New Features (in no particular order) ==

1) Weather alerts.
2) 3 or 5 day forecast.
3) Current conditions detail.
4) Shortcodes to include the weather in posts/pages.

== Known Bugs ==
The datestamp for the log function doesn't use the locale setting to calculate the time.

Please send an email to tberneman@gmail.com with your suggestions.

== Installation ==

###Upgrading From A Previous Version###

To upgrade from a previous version of this plugin, delete the entire folder and files from the previous version of the plugin and then follow the installation instructions below.

###Uploading The Plugin###

Extract all files from the ZIP file, **making sure to keep the file/folder structure intact**, and then upload it to '/wp-content/plugins/'.

**See Also:** ["Installing Plugins" article on the WP Codex](http://codex.wordpress.org/Managing_Plugins#Installing_Plugins)

###Plugin Activation###

Go to the admin area of your WordPress install and click on the "Plugins" menu. Click on "Activate" for the "NOAA-Weather" plugin.

###Plugin Usage###

Use as a widget wherever widgets are allowed in your theme.


== Upgrade Notice ==
Upgrade using the WordPress Admin or overwrite your files/folders with the new files/folders.


== Frequently Asked Questions ==

= Why am I getting "Weather Unavailable or invalid NOAA code." in my widget? =
First, make sure you are using the latest version of the widget. If you are still getting this message, most likely you've entered an invalid code or you have just installed the widget. If you've just installed the widget, make sure you have entered in a code and that it is valid.

Second, try deactivating the widget and reactivating it.

Third, check permissions on the downloaded XML file (in wp-content/plugins/noaa-weather folder). The "noaa-weather" folder should be 0755 and the files should be 0644. You can use FileZilla client for your OS to check and set these permissions.

* If you still have problems after trying these solutions, email the plugin author.

== Screenshots ==

1. Widget setup page.
2. Widget display with default theme.
3. Widget display in another theme formatted a little nicer.


== ChangeLog ==
= 1.4 =
Added plugin version constant.
Added uninstall hook.
Added code to the display weather function that checks for the existence of the weather XML file and if it doesn't exist it attempts to download it. This should fix the "Weather Unavailable or invalid NOAA code." message in most (if not all) cases.

= 1.3.14 =
Checked and verified compatibility up to WordPress 5.0
Changed mode when creating downloaded weather XML file from Write only to Read/Write in an attempt to fix permissions issues on some systems.

= 1.3.13 =
Checked and verified compatibility up to WordPress 4.9.8
Fixed bug with loading css file over SSL would throw security warnings. Shout out to Will Floyd for the fix!

= 1.3.12 =
Checked and verified compatibility up to WordPress 4.9

= 1.3.11 =
Checked and verified compatibility up to WordPress 4.8
Extended the Copyright date to 2017.

= 1.3.10 =
Checked and verified compatibility up to WordPress 4.7
Added the word "Optional:" to the City field and changed the text slightly.
Extended the Copyright date to 2016.

= 1.3.9 =
Checked and verified compatibility up to WordPress 4.6

= 1.3.8 =
Checked and verified compatibility up to WordPress 4.5

= 1.3.7 =
Checked and verified compatibility up to WordPress 4.4

= 1.3.6 =
Removed extra unescaped blackslash that was causing the xml weather file to download to the wrong folder. You may have to deactivate and then activate the plugin to get the updated weather file if it doesn't do it automatically.

= 1.3.5 =
Removed extraneous code SVN left in this file that messed up the formatting and version compatibility check.
Fixed minor sync update.

= 1.3.4 =
Added error checking when writing to weather file to fix "Cannot use object of type WP_Error as array" on line 92 errors.
Checked and verified compatibility up to WordPress 4.3.1

= 1.3.3 =
Fixed error in this document, you go to Plugins->Editor NOT Appearance->Editor to tweak the CSS. Added more direction on editing the CSS file.
Checked and verified compatibility up to WordPress 4.2.2

= 1.3.2 =
Checked and verified compatibility up to WordPress 4.2.1

= 1.3.1 =
Made minor spelling changes.
Tweaked noaa-weather.css file.
Checked and verified compatibility up to WordPress 4.2

= 1.3.0 =
Add a City override field so you can have more control over what is displayed.
Changed screenshot #1 to reflect new city override field.
Changed copyright notice of program to 2015.

= 1.2.7 =
Checked and verified compatibility up to WordPress 4.1

= 1.2.6 =
Checked and verified compatibility up to WordPress 4.0

= 1.2.5 =
Fixed bug I introduced in 1.2.4 where I had escaped the slash in "n/a".

= 1.2.4 =
Fixed problem when no humidity value in weather file it will display "n/a" instead of just a percent sign.
Checked and verified compatibility up to WordPress 3.8.2
Changed copyright notice of program to 2014.

= 1.2.3 =
Fixed (kludged) problem where cron job got deleted (for no known reason) and thus the weather file never gets updated.
Checked and verified compatibility up to WordPress 3.8

= 1.2.2 =
Updated the url where the XML file resides after NOAA changed it which caused the weather to no longer be updated.

= 1.2.1 =
Fixed a bug if the icon file didn't exist. Also removed an extraneous empty folder.

= 1.2.0 =
There were problems with the icon data in the weather file so I rewrote the way the plugin gets the icon. Now all the icons are stored with the plugin and called up locally. Also changed the "default" icon to look better on darker backgrounds.

Icons courtesy of NOAA here: http://w1.weather.gov/xml/current_obs/weather.php

= 1.1.2 =
Changed website URI's and email address.

= 1.1.1 =
Added a default icon if not supplied in weather file.

= 1.1.0 =
Rewrote widget to use WP_Http functions (wp_remote_get) to retrieve weather file instead of using Curl. This should fix the problem on some servers that didn't have curl activated in PHP and thus the weather file never downloaded.

= 1.0.8 =
Renamed some internal functions so as not to conflict with other plugins.
If there is no value for Windchill then Heat Index is displayed, if no Heat Index then Dewpoint is displayed.

= 1.0.7 =
Removed default title of "NOAA Weather" if the user left it blank in the widget setup for more flexibility with some themes.

= 1.0.6 =
Fixed a problem with a slash vs. backslash for WordPress installs on Linux servers.

= 1.0.5 =
Get current weather file for any codes "in use" when activating plugin.

= 1.0.4 =
Fixed problem when changing themes the weather file wasn't being updated.

= 1.0.3 =
Fixed the links that broke when making them pass validation.

= 1.0.2 =
The widget should pass markup validation now.
The NOAA code is trimmed of any extraneous spaces and is upper-cased.
The weather is now retrieved immediately when you add/change the NOAA code. There is no need to deactivate/activate the plugin to get the weather to update.
If there is no value for Windchill, Dewpoint is displayed instead.

= 1.0.1 =
Added code to create "twicehourly" cron schedule.

= 1.0.0 =
This is the first version released to the public.

= 0.9.1 =
Some minor tweaks to the css file.

= 0.9.0 =
First beta release to select test group.
