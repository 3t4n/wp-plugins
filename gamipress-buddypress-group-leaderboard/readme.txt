=== GamiPress - BuddyPress Group Leaderboard ===
Contributors: gamipress, tsunoa, rubengc, eneribs
Tags: gamipress, gamification, gamify, point, achievement, badge, award, reward, credit, engagement, ajax, buddypress, leaderboard, group, bp, social networking, profile, friend, group, forum, social, community, network, networking
Requires at least: 4.4
Tested up to: 6.4
Stable tag: 1.1.4
License: GNU AGPLv3
License URI:  http://www.gnu.org/licenses/agpl-3.0.html

Add a completely configurable tab on BuddyPress groups with a GamiPress leaderboard of group members

== Description ==

GamiPress - BuddyPress Group Leaderboard let's you add new tab on [BuddyPress](http://wordpress.org/plugins/buddypress/ "BuddyPress") groups with a [GamiPress](https://wordpress.org/plugins/gamipress/ "GamiPress") leaderboard of group members!

Through the GamiPress settings you will be able to configure the metrics by which group members should be ranked and the columns to show.

Important: This plugin requires [GamiPress - Leaderboards](https://gamipress.com/add-ons/gamipress-leaderboards/ "GamiPress - Leaderboards") add-on.

== Installation ==

= From WordPress backend =

1. Navigate to Plugins -> Add new.
2. Click the button "Upload Plugin" next to "Add plugins" title.
3. Upload the downloaded zip file and activate it.

= Direct upload =

1. Upload the downloaded zip file into your `wp-content/plugins/` folder.
2. Unzip the uploaded zip file.
3. Navigate to Plugins menu on your WordPress admin area.
4. Activate this plugin.

== Frequently Asked Questions ==

= How can I configure the Leaderboard display? =

After installing GamiPress - BuddyPress Group Leaderboard, you will find the plugin settings on your WordPress admin area navigating to the GamiPress menu -> Settings -> Add-ons tab at box named "BuddyPress Group Leaderboard".

Just choose the settings you want and click the "Save Settings" button.

= Can I regenerate all group's leaderboards? =

Of course, on your WordPress admin area, navigate to the GamiPress menu -> Settings -> Add-ons tab at box named "BuddyPress Group Leaderboard" where you will find at bottom of this box a button named "Regenerate Group's Leaderboards".

Simply, click this button to run a safe process that will regenerate the leaderboards to groups that hasn't one.

Note: This is a safe process, so clicking multiples times won't make any data lost. Process will run just on groups that haven't assigned a leaderboard yet.

== Screenshots ==

== Changelog ==

= 1.1.4 =

* **Improvements**
* Updated to match with Leaderboards 1.3.8 update.

= 1.1.3 =

* **Bug Fixes**
* Fixed incorrect application for the number of users and users per page settings.

= 1.1.2 =

* **Bug Fixes**
* Fixed incorrect application for the number of users setting (requires Leaderboards 1.3.0).

= 1.1.1 =

* **Improvements**
* Added extra checks to only run plugin code if Leaderboards add-on is installed.

= 1.1.0 =

* **New Features**
* Added support to Leaderboards add-on pagination.

= 1.0.9 =

* **Improvements**
* Updated deprecated jQuery functions.

= 1.0.8 =

* **Bug Fixes**
* Fixed a typo on the group members search query when leaderboard is setup to display all group members.

= 1.0.7 =

* **Bug Fixes**
* Correctly apply the number of users desired to get displayed on the group leaderboard.

= 1.0.6 =

* **New Features**
* Added a new option to limit the number of group members to display.
* **Improvements**
* Make period fields as text to allow more flexible period options.

= 1.0.5 =

* **Improvements**
* Added sync hooks to delete a group's leaderboard when the group gets deleted.
* Added some extra checks to prevent incorrect group members conditionals on leaderboards query.

= 1.0.4 =

* **Developer Notes**
* Added hooks to extend the group leaderboard tab content.

= 1.0.3 =

* **New Features**
* Added support to Leaderboards time period features (released on 1.1.5).
* **Developer Notes**
* Better organization of plugin functions reducing plugin code.

= 1.0.2 =

* **New Features**
* Added the "Regenerate Group's Leaderboards" process on add-on settings box (located at GamiPress -> Settings -> Add-ons).

= 1.0.1 =

* **New Features**
* Added an informative meta box on leaderboard to indicate the assigned group.

= 1.0.0 =

* Initial release.
