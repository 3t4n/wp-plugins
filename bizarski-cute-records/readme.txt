=== Bizarski Cute Records ===
Contributors: sparxdragon
Donate link: http://cuteplugins.com
Tags: album, record, release, tracks, lyrics, band, musician, artist, mp3, player
Requires at least: 3.3
Tested up to: 3.4
Stable tag: 1.4.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Showcase your albums and tracks. Great for artists and record labels.

== Description ==

Cute Records can manage albums, track lists, lyrics, album covers, mp3 files, and more.

You can display a list of released albums, or just one album. The lyrics and album covers are displayed inside a Fancybox window (jquery). The MP3's are streamed online using a built-in lightweight flash player. Easily set the image size of the album covers. Customize layout using CSS. The records can be displayed inside a post or a page, using shortcodes. You can also display a selected record in an area by using the built-in widget.

* [Docs](http://cuteplugins.com/wordpress-cute-records/)
* [Demo](http://cuteplugins.com/cute-records-demo/)

= Bizarski Cute Records Plugin - Features =

This is a list of the main features that this plugin has. For feature suggestions, feel free to contact Bizarski. 

*Manage Records*

* Easily upload an album cover. The image will be automatically resized and cropped. 
* Add information about a record: album name, release date, album format, and record label. 
* Add additional information: artist name, catalog number, and more. 
* Add up to three buttons with customizable text and links. 

*Display Records*

* Display a list of records inside a page or a post. 
* Limit and offset the list of records for pagination.
* Display details of specific album. 
* Display the album cover of a specific album, thumbnail or full-size.
* Display the album cover of a specific album inside a widget with customizable link. 

*Manage Tracks*

* Add information about a track: name, number, and length.
* Add additional information: link to video, and lyrics.
* Upload an mp3 of a track and let visitors listen to it online. 
* Set mp3 file to be downloadable. 

*Display Tracks*

* Display the track list of each album in the list of all records.
* Separately display the track list of a specific album.
* Lyrics will be displayed inside a Fancybox window.
* Video link will be opened in a new window. 
* MP3 will be streamed online using a built-in lightweight flash player.

== Installation ==

1. Download, install, and activate the Bizarski Cute Records plugin.
2. From your Wordpress Dashboard, go to Cute Records > Manage Records/Tracks > New Record/Track > Follow the on-screen cues.
3. Go to a post/page, and enter one of the shortcodes to display one or more records. 

For more details, you can also have a look at the [plugin homepage](http://cuteplugins.com/wordpress-cute-records/).

== Screenshots ==

1. screenshot-1.jpg - Tracklist and album cover displayed in the front end
2. screenshot-2.jpg - Adding a new record from the back end

== Shortcodes ==

The Bizarski Cute Records plugin currently has 4 shortcodes. 

= Display records =

* *Display a list of all records: [cuterecords_display]*
* *Display 5 records after skipping 10: [cuterecords_display limit=5 offset=10]*
* *Display a list of the latest 5 records with their track lists included: [cuterecords_display limit=5 show_tracklist=1]*
* *Display details of specific album: [cuterecords_display id=1 show_tracklist=1]*

= Display an album cover =

* *Display the full-size album cover of record #1: [cuterecords_show_full_cover id=1]*
* *Display a thumbnail of the album cover of record #1: [cuterecords_show_cover id=1]*

= Display track list =

* *Display the track list of record #1: [cuterecords_tracklist id=1]*

== Changelog == 

= 1.4.1 =
* Bugfix: Fixed flash player's button issue in Internet Explorer.

= 1.4.0 =
* Bugfix: Fixed incompatibility issues with Wordpress 3.5.
* Changed: Improved filtering by record in the track management. 

= 1.3.6 =
* Bugfix: fixed issues with opening lyrics and streaming mp3 files.

= 1.3.5 =
* NEW: Added a shortcode argument for displaying a specific album.
* Changed: Reordered the elements of album specification.
* Removed: Removed the fields "Album type" and "Running time" from album specification. 
* NEW: Added a "More info" field for records.

= 1.3.0 =
* Secured: Don't allow downloading of streaming mp3 files.
* Changed: Converted the mp3 player script into a jquery plugin.

= 1.2.5 =
* Bugfix: Made the flash player lightweight, no longer crashing. 
* NEW: Added filtering by album in the track management.
* NEW: Added an "Artist Name" field for records.

= 1.2.0 =
* NEW: Added a flash mp3 player for streaming mp3 files.
* NEW: Added choice between opening links in new window, or same window.
* NEW: Added a "Downloadable" option for uploaded mp3 file.
* NEW: Added a "Video" field for tracks.
* NEW: Added a "Catalog Number" field for records.

= 1.1.2 =
* Changed: Cleaned up folder structure. 

= 1.1.1 =
* Bugfix: Fixed a javascript issue. 
* Changed: Moved file storage to Wordpress's "upload" folder. 

= 1.1.0 =
* NEW: Added support for displaying a track list for each album in list: [cuterecords_display show_tracklist=1]
* Changed: When clicked, the album cover will be displayed in its full size inside a Fancybox window. 
* NEW: Added support for up to three buttons per album.
* NEW: Added support for uploading mp3 files of album tracks.
* NEW: Added support for custom URL inside the widget.
* Bugfix: Fixed a display issue with longer album titles. 

== Known issues ==

* Sometimes the Fancybox window appears behind the website menu. To fix this issue, go to your theme's CSS file and look for z-index rules that have a value higher than 1100. Change their value to 1099 and save the file.
* The plugin "Google Analytics for WordPress by Yoast" causes Fancybox to misbehave. 
* Flash player's button in all versions below 1.4.1 will not work in Internet Explorer.
* All versions below 1.4.0 will cause issues in the Dashboard of Wordpress 3.5 and above.
* Lyrics and mp3 streaming don't work in versions below 1.3.6, because of missing javascript files.
* The track player in version 1.2.0 could crash, and is very heavy on the browser. Please, upgrade to higher version for a lightweight player. 
* Upgrading from version 1.1.0 to any newer version will delete all album covers and mp3's. 
* Upgrading from version 1.0.0 to any newer version will delete all widget links.
