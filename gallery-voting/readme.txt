=== Tribulant Gallery Voting ===
Contributors: contrid
Donate link: https://tribulant.com
Tags: gallery, voting, contest, likes
Requires at least: 3.8
Tested up to: 6.7.2
Stable tag: 1.3
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Let users cast votes/likes on your WordPress gallery images/photos.


== Description ==

Simply let users vote/like photos/images on your WordPress galleries.

Installing and activating this plugin will place a vote/like link and a vote count below each photo of all WordPress image/photo galleries using the `[gallery]` shortcode.


= Online Demo =

You can try out the <a href="https://tribulant.net/galleryvoting/" target="_blank">online demonstration</a> to see how the plugin works.

To log in, go to the <a href="https://tribulant.net/galleryvoting/wp-admin/" target="_blank">demo dashboard</a> and log in with <strong>demo</strong> / <strong>demo</strong>.


= Support & Help =

For support, you can access our <a href="https://tribulant.com/forums/categories/gallery-voting-plugin">support forums</a> to see if your issue was previously resolved there. Otherwise, you can contact us on our <a href="https://tribulant.com/support/">support website</a> or on the WordPress.org support forum.

View the <a href="https://tribulant.com/docs/wordpress-gallery-voting-plugin/9015/">online documentation</a> for tips, tricks, guides, and more.


== Installation ==

Installing the Gallery Voting plugin is simple. Follow these steps:

= Automatic Installation =

If you don't have the file on your computer:
1. Go to **Plugins > Add New Plugin** in your WordPress dashboard.
2. Search for `gallery voting` to find this plugin, by Tribulant Software.
3. Click **Install Now** to install it and then activate it after the installation.
4. Go to an existing `[gallery]` WordPress image/photo gallery to see the vote/like links below each photo.

If you downloaded it from the WordPress.org website:
1. Go to **Plugins > Add New Plugin** in your WordPress dashboard and click on Upload Plugin.
2. Click on **Browse** to search for this `zip` on your computer and add it.
3. Click **Install Now** to install it, and then activate it after the installation.
4. Go to an existing `[gallery]` WordPress image/photo gallery to see the vote/like links below each photo.

= Manual Installation =

1. Extract the `zip` file to obtain the plugin folder.
2. Upload the plugin folder to the `/wp-content/plugins/` directory.
3. Activate the plugin through the **Plugins** menu in WordPress.
4. Go to an existing `[gallery]` WordPress image/photo gallery to see the vote/like links below each photo.


== Screenshots ==

1. Sample of a WordPress image/photo gallery with the vote/like link and vote count below each photo.


== Changelog ==

= 1.3 =
* ADD: nonce and check for capability before saving the options in admin.
* IMPROVE: Widen the text boxes in admin area (vote numbers).
* IMPROVE: Remove jQuery dependency.
* FIX: Vulnerability on admin area.
* FIX: PHP 7.4 to 8.3 checkup and fixes.
* FIX: Admin notice over saving in admin page was showing twice.
* FIX: Vulnerability issue and it is now validating responses to avoid XSS in frontend.

= 1.2.1 =
* ADD: WordPress 5+ Compatibility.
* ADD: Alternative [galleryvoting] shortcode feature.
* FIX: Some themes filtering [gallery] shortcode breaking voting.

= 1.2 =
* ADD: WordPress 4.0 compatibility.
* ADD: "Settings" link on Plugins page in WordPress.
* ADD: Enable voting for logged in users only.
* IMPROVE: Record IP even when cookies are enabled for votes.

= 1.1.1 =
* ADD: Maximum votes per photo/image/attachment setting.

= 1.1 =
* ADD: Setting to choose between cookie and IP address tracking.
* ADD: Maximum overall votes setting.

= 1.0 =
* Initial release.