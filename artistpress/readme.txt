=== ArtistPress ===
Contributors: tim-scheman
Tags: bands, playlists, shows, venues, gallery
Requires at least: 5.8
Tested up to: 6.5.3
Requires PHP: 8.0
Stable tag: 1.5.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

ArtistPress provides a easy to use solution for bands, solo musicians and professional artists to convert WordPress into a robust tool to manage a professional online presence.

== Description ==
ArtistPress is a easy to use, flexible and free WordPress plugin for artists. You can use the built-in shortcodes to create a professional artist bio page, show listing, and photo galleries without any code.

You can easily create an artist profile page including photo, bio and contact information. You can create a list of upcoming events or shows that includes Google Maps integration to provide event locations and driving directions. You can also create photo galleries to show off your work or highlights photographs from your shows. 

= Features =
* Shortcodes functionality for creating all of the ArtistPress pages.
* Built-in WordPress theme templates for advanced users.
* Single artist profile including photo, bio and contact information
* Photos galleries and albums
* Unlimited Venues
* Unlimited Events on event listing
* Google Maps API integration with Google [API key]
* Driving directions to events when using Google Maps feature
* Use the plugin settings to show as little or as much information as you want to your fans

ArtistPress Pro and ArtistPress Community are premium upgrades that, when completed, will add the ability to add playlists, 

= Shortcodes =
* Use [artistpress-artist id="X"] to display the the Artist Profile. The "id" is the post ID for the Artist post.
* Use [artistpress-show-list] to display the list of shows you have created.
* Use [artistpress-show id="X"] to display an individual show. The "id" is the post ID for the Show post.
* Use [artistpress-gallery id="X"] to display an individual gallery. The "id" is the post ID for the Gallery post.
* Use [artistpress-gallery-album term="X"] to display an album of galleries. The "term" is the Album slug.


= ArtistPress Pro =
When development is complete, ArtistPress Pro will add playlist functionality allowing you to publish up to 5 playlists on your site using a simple shortcode. It will also add a social sharing tool for the some of the leading social media services, including Facebook, Twitter, and Behance.

= ArtistPress Community =
When development is complete, ArtistPress Community will allow you add unlimited artists and unlimited playlists, making it the perfect tool for a club, band manager, or art gallery.

= Links =

* [Website](http://www.artistpress-plugin.com/)
* [Documentation](http://www.artistpress-plugin.com/documentation/)
* [ArtistPress PRO and Community](http://www.artistpress-plugin.com/download/)
* [Google Maps API Key](https://developers.google.com/maps/documentation/directions/get-api-key)


== Installation ==

1. Upload 'artist-press' to the '/wp-content/plugins/' directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Click on the new menu item "ArtistPress" to get started.
4. Click on the "Settings" sub menu under "ArtistPress" to adjust settings.
5. Start adding artist details, venues, and shows.
6. To use the Google Maps functionality, you will need to get a [Google Maps API Key](https://developers.google.com/maps/documentation/directions/get-api-key)
7. Documentation to use ArtisPress is in the works at https://www.artistpress-plugin.com/documentation/.


== Frequently Asked Questions ==

= Q. I have a question about ArtistPress =
A. As this is a new and growing project I ask that you are patient with me.  Answers to your questions can be found at https://www.artistpress-plugin.com/documentation/ . If you have any concerns with ArtistPress or feel you need to leave a bad review, please contact me first at contact@artistpress-plugin.com.  I will make every effort possible to get your question answered.


== Screenshots ==

1. Artist View

2. Show View

3. Show List  View

4. Gallery View

5. Gallery Lightbox View

6. Settings Screens

7. Adding a Artist

8. Adding a Venue

9. Adding a Show

10. Adding a Gallery


== Changelog ==

= 1.5.2 =
* Fix: Changed file name to prevent bug on case sensistive systems.

= 1.5.1 =
* Fix: Conflict with namespacing and previous version directory structure.

= 1.5.0 =
* Major release with possible breaking changes, please be sure to back-up your site before upgrading.
* Complete refactor of settings, meta boxes and other administration pages of WordPress.
* Established code infrastructure for future interations.
* Verified that ArtistPress is functional with WordPress 6.5.3.
* Fix: Changed the name of two artist settings and one gallery setting. If you see a PHP warning about missing keys, save the Artist and Galleries settings will resolve this issue.
* Fix: An upgrade script is in place and will run in the background during the upgrade.

= 1.4.1 =
* Verified that ArtistPress is functional with WordPress 6.4.1
* Verified that ArtistPress is ready for PHP 8.2 
* Fix: Required paremeter be first parameter called in method determining a meta field is a repeatable fields type.
* Fix: Ensure repeatable fields functioning properly after parameter order fix.

= 1.4 =
* Ensured that ArtistPress is functional with WordPress 6.2

= 1.3 =
* Ensured that ArtistPress is functional with WordPress 5.9  
* Fixing bug causing "ArtistPress ShowList shortcode" markup to break.
* Refactor CSS on show list to FlexBox display. Effects both shortcode and template view output.
* Set new max-width property on CSS for gallery title.
* Adding additional screenshots.

= 1.2.5 =
* Ensured that ArtistPress is functional with WordPress 5.8  
* Continued preparation for upcoming release of Version 2.0 in the next couple of months.

= 1.2.4 =
* Ensured that ArtistPress is functional with WordPress 5.5.3  
* Fixed bug causing "ArtistPress Show" data to not save properly.
* Updated gallery administration interface to account for deprecated jQuery "live" method.
* Continued preparation for upcoming release of Version 2.0 in the next couple of months.
* Reordered change log to be in descending order.

= 1.2.3 =
* Ensured that ArtistPress is functional with WordPress 5.5.1  
* All shortcodes work using the Classic and Shortcode editor blocks.
* All shortcodes will also work with the Classic Editor plugin installed.
* Preparing for upcoming release of Version 2.0 in the next couple of months.

= 1.2.2 =
* Changed ArtistPress Show meta data to save the venue name in addition to venue ID.
* Added setting to order show archive in Descending or Ascending order. This setting still defaults to ascending order.
* Added Upgrader class to update meta on all shows. Upgrader runs once in the background when the plugin is updated.

= 1.2.1 =
* Conditionally enqueued jQuery for gallery lightboxes as it was not available in new "Twenty Nineteen" theme.

= 1.2 =
* Ensured that ArtistPress is functional with WordPress 5.0  
* All shortcodes work using the Classic and Shortcode editor blocks.  
* Currently gallery lightboxes DO NOT function when using "Twenty Nineteen" theme. This will be reconciled in the next maintenance release.

= 1.1.2 =
* Corrected link to ArtistPress website. Now points to http://www.artistpress-plugin.com/.
* Corrected link to documentation. Now points to http://www.artistpress-plugin.com/documentation/.
* Corrected link to download page for Pro and Community versions of ArtistPress. Now points to http://www.artistpress-plugin.com/download/.

= 1.1.0 =
* Verified ArtistPress works with WordPress 4.9.
* Fixed bug in the ArtisPress Galleries that allowed a administrator to delete all of the image fields in a gallery. When the fields where deleted, it required the admin to delete the existing gallery and start a new one. 

= 1.1.1 =
* Made adjustments to the field descriptions on the settings page, specifically on the Show List Settings tab and the Individual Show Settings tab.

= 1.0.0 =
* ArtistPress Launched.
