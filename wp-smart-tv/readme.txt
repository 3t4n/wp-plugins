=== WP Smart TV ===
Contributors: robdavenport
Tags: FireTV, Roku, IPTV, HTML5 Video Player, Video CMS
Requires at least: 5.0
Tested up to: 6.0.1
Requires PHP: 7.2
Stable tag: 2.1.9
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt

The ultimate toolkit for video streaming services using WordPress. Turn your site into an video service similar to YouTube or Vimeo.

Includes support for HTML5 video and Roku Direct Publisher, Fire TV and Chromecast.

== Description ==
NOTE:  This plugin is no longer being developed as most services like Direct Publisher are no longer available.  We will continue to post bug fixes.

The ultimate toolkit for video streaming services using WordPress. Turn your site into an video service similar to YouTube or Vimeo. Provides support for HTML5 video and Roku Direct Publisher plus add-on plugins for Fire TV and Chromecast.

[youtube https://www.youtube.com/watch?v=Zfph3hQZzm4]

Includes:
<ul>
<li>Roku Direct Publisher Feed support (JSON)</li>
<li>HTML5 video player with HLS & MP4</li>
<li>Shortcodes to integrate with existing sites</li>
</ul>

Add-ons:
<ul>
<li>Vimeo Pro Extender - Easily import and manage your Vimeo content with WP Smart TV</li>
<li>Fire TV Creator - Add support for Amazon's Fire TV Creator</li>
<li>Playlists - Add playlist support to WP Smart TV</li>
<li>Secure Feeds - Secures your IPTV data feeds against unauthorized access</li>
</ul>

<strong><em>Do more with WP Smart TV with our line of Extenders! <a href="https://rovidx.com/wp-smart-tv-extenders/?ref=1&campaign=rm" target="_blank">Click here to learn more</a>.</em></strong>

This plugin utilizes custom post types to manage your video content.  We include Movie, Shortform Video & Episodic post types to help you easily add new content to your IPTV system.

Each video contains metadata for trick play files and Closed Captions with multiple translations.

Shortcodes are also provided to embed content in regular posts & pages.

Roku Direct Publish Feeds allow you to send data to Roku without the expense of building your own app.   For more information please see this article - <a href="https://blog.roku.com/developer/2016/10/19/publishing-platform/">Roku Direct Publisher Feeds</a>.

<strong><em>Need help? <a href="https://rovidx.com/documents/" target="_blank">Read the documentation here!</a></em></strong>

== Frequently Asked Questions ==
<strong><em>Does this work with YouTube?</em></strong>

No! YouTube does not allow you access to the data URLs required (HLS or MP4). 

<strong><em>Does this work with Vimeo?</em></strong>

YES! If you have a Vimeo Pro or Business account, you can use your HLS and MP4 links.   (Vimeo > Video > Settings > Video File).

<strong><em>Does it support WebVTT & SRT for Closed Caption support?</em></strong>

YES! However SRT support only works on Roku.   We suggest using WebVTT as it works on both Roku and HTML5.  You can convert SRT to VTT files quite easily online.

== Changelog ==
= 2.1.9 = 
* FIXED: XSS vulnerability when using [tv-video-player /] shortcode
= 2.1.8 = 
* FIXED: Issue with Live add-on filter not working
= 2.1.7 =
* FIXED: Issue with series not processing on Direct Publisher
= 2.1.6 = 
* FIXED: Issue with the date on Roku Direct Publisher.  Now shows in ISO 8601 format.
= 2.1.5 = 
* FIXED: Menus still showing some submenus
= 2.1.3 = 
* FIXED: Issue with option pages not working
* FIXED: Issue with some hosts and autoloading
= 2.1.0 =
* UPDATE: Base libraries
* UPDATE: Cleaned up menus
* NEW: Started base code changes for a major upgrade (3.0.0)
= 2.0.15 =
* FIXED: Issue with internal tools library.
= 2.0.14 = 
* FIXED = Error with advertising controls not showing metabox
= 2.0.12 = 
* FIXED: Error with Live Streams add-on not showing validity start and end times
= 2.0.11 = 
* FIXED: Error on activiting on first install.  
= 2.0.10 = 
* ADDED: Support for upcoming Elementor add-on
* UPDATED: Support for Importing JSON from TV Boss and Vimeo OTT feeds
* FIXED: Issue with truncation issuing double ellipsis
= 2.0.8 = 
* FIXED: Error with is_plugin_active() not found
* UPDATE: Added more support for OTT Pro plugin (coming soon)
= 2.0.6 =
* ADDED: Support for <a href="https://rovidx.com/downloads/mediablaster-roku-svod/?ref=1&campaign=rm" target="_blank">MediaBlaster SVOD for Roku</a> app template
= 2.0.5 = 
* ADDED: Support for <a href="https://rovidx.com/downloads/livestreams-for-wp-smart-tv/?ref=1&campaign=rm" target="_blank">LiveStreams Extender</a>
= 2.0.4 = 
* FIXED: Seasons not displaying properly on Roku
= 2.0.2 =
* UPDATE: Fixed issue with seasons not appearing correctly in Roku
= 2.0.1 =
* UPDATE: Fix issue Series thumbnails
= 2.0.0 = 
* NEW: Import feature for Roku Direct Publisher
* NEW: Updated interface
* NEW: New code base
= 1.8 =
* Added support for new Fire TV Creator plugin.
* Removed Fire TV Builder support (coming to a new add-on shortly!)
* Small bug fixes in the UI/UX department
= 1.7.1 =
* New add-on licensing and upgrade system
= 1.7 =
* New interface
* PHP 7.2 compatibility update
= 1.6.3 =
* IMPORTANT: You will need to build new Roku Receipes with this release.  Sorry for any confusion!
* Fixed errors with PHP 7.2
* Verified system 
* Updated CMB2 libraries
* Setting up backend systems for version 2.0
* Disabled tutorials and extender dashboard pages.  Returning in 2.0.
= 1.6.2 =
* Fix for BIF & Closed Captions in Series
* Add \"Required\" to series meta panel
* Updates for Authorize extender
= 1.6.1 =
- Graphical update
* Misc bug fixes and optimizations
= 1.6 =
* Added: Plugin automatic update system for Add-Ons
* Added: Ability to add multiple Closed Caption and Trick Play files to each video
* Fix: BIF files now display properly on Roku
* Updated:  Help Document system overhaul
= 1.5 =
* Added: Custom Post Type theme templates for Movies, Episodes and Short-Form Videos
* Added: Add the ability to do iFrame embeds on other sites
* Added: Tutorials section to the dashboard
* Updated: New \"Extender\" section for add-ons
* Updated: New styling and small changes to Roku Recipes
* Fixed: Strip HTML and links from Description for JSON outputs
= 1.4.5 =
* Fixed: Season tags
= 1.4.2 =
* Fix to FireTV Categories
= 1.4.1 =
* Removed function that was causing errors on some installations
* Added check for error when no tag was present on content
= 1.4 =
* Added: Ability to download JSON file for Roku & FireTV
* Added: Support for SRT subtitles and captions
* Fixed: Support for local BIF/SRT/VTT files
* Fixed: Recipes error on posts with more than 1 tag
* Update: Removed unused functions from library
= 1.3.5 =
* Fix for Pre-rolls in Direct Publisher
= 1.3.3 =
* Added support for WP Smart TV Playlists
* Rewrite of Roku functions
* Fixed issues with certain configurations and Roku DP
= 1.3.1 =
* Fix for BIF URLs
* Fix for Closed Caption (Roku DP)
= 1.3 =
* Added support for Amazon Fire Builder (FireTV template)
* Added BIF support for Roku Direct Publisher
* Added WPSTV Advertising System v1.0
* Fixed issue with TV Specials not displaying properly
* Fixed HTML entities showing in feed
= 1.2.1 =
* Minor bug fix
= 1.2.0 =
* Added TinyMCE button for inserting Video Player shortcodes
* Made changes to series support - Series are now controlled by a custom post type.
* Added Roku Category Builder (Roku Recipes) 
* Minor bug fixes
= 1.1.0 =
* Added Series Support
* Minor bug fixes
= 1.0.0 =
* HTML5 video player - based on VideoJS HLS Player
* Roku Direct Publisher Feeds - JSON
* Metabox editor v1.0.0

== Upgrade Notice ==
= 2.0.0 =
This includes a major code overhaul.  Please backup your site prior to installing this update.   Also make sure to update any WP Smart TV extenders that you have purchased.

= 1.7.1 =
You must upgrade to this version if you have purhased any of our Extender add-ons.   You will also need to manually download and install the first update to the Extenders from our website.