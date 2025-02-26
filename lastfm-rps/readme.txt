=== Last.fm RPS ===
Contributors: Taha Paksu
Donate link: http://www.tahapaksu.com
Tags: lastfm, Last.fm, recent, played songs, audioscrobbler
Requires at least: 2.0.0
Tested up to: 4.9.1
Stable tag: 2.0.0

Widget Plugin that lists your recently listened songs on your sidebar with album or artist images and text.

== Description ==

This plugin gets your last.fm feed and parses your recently played song information and then combines it with the album tag
also taken from the last.fm feeds. If it doesn't find an album image, It shows the artist image instead of it.


== Installation ==

1. Upload 'lastfm-RPS' directory to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to Design->Widgets and Add "Last.fm RPS" widget on your desired sidebar.
4. Click to "edit" and insert your last.fm username and widget title you want to display in your sidebar
5. Thats all. Go to your main page and check if there's any errors. If you wrote your username right, then there shouldn't be any.

== Whats New in Version 0.2? ==

* Added option to define how many songs are displayed on the page
* Seperated css file from code and added new "lastfm.css" file
* Added different stylesheets to recently played songs
* Changed the datetime display configuration like "x days y seconds and z minutes ago"
* Changed the div's into tables which are more reliable for different themes.
* If the user hasn't any wp_head() included in his/her theme's header.php, this script checks and adds its css itself.

== Whats the fixes in Version 0.3? ==

* Added a neccessary fix for the time difference between server time and local time.
* If there is a track played in the player which length is less than 4 minutes ,the script showed two recently listened songs, so this is fixed now.It only displays one.

== Whats New in Version 0.4? ==

* Added support for not widget-enabled themes.
* Added Screenshot
* Updated Readme.txt

== Whats the fixes in Version 0.5? ==

* When no songs played for a long time or only played only one song, this script raised errors. This is fixed now.
* Optimized the SimpleXML Extension for speed issues.

== What's added in v0.6 ==

* Improved checking of album images.
* If the feed item contains no album name, then directly shows default image.

== What's New in Version 0.7? ==
* Added image positioning
* Added optional Bottom Text
* Removed the slashes before ' and "
* Converted tables to css so you have all the control in lastfm.css
* Added artist images support. Now it shows artist images when it can't find the album image.

== The changes in 0.8 ==
* Added Various Artists album image support
* Added last.fm badge option
* Improved options page
* Added last.fm logos (you should use one)

== The changes in 1.0.0 ==
* Added cURL and fopen support

== The minor changes in 1.0.2 ==
* Added security to file reading function inside class.

== The changes in 1.0.3 ==
* Empty images show up as last.fm image placeholders now.
* Fixed the compatibility issue with wordpress 2.7 (Their compat.php broke one of my function and i renamed it.)
* Thanks to Tom for informing me that last.fm started to use 64x64 images instead of 50x50. Thats also changed.

== The changes in 1.1 ==
* Added caching support
* Changed Last.fm API v1.0 code to v2.0 code
* Fixed "Now Playing" code

== The changes in 1.1.1 ==
* Fixed annoying file_get_contents error.

== The changes in 2.0.0 ==
* Complete rewrite
* Updated Last.fm logos to match the ones used in the site
* Fixed complicated CSS rules (Note: You need to edit the CSS files again :( )
* Autoprefixed CSS rules for browser compatibility
* Removed Shortcode support
* Removed FileSystem Cache, using WP_Options method instead
* Added German, French, Spanish, Italian and Turkish translation (You can translate more with Loco Translate plugin, used google translate on most parts, sorry for that.)

== TODO: ==
* Track and artist corrections

== Frequently Asked Questions ==
*None.


== Screenshots ==

1. This is taken from http://www.tahapaksu.com