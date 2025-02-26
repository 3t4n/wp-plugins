=== Admin Classic Borders ===
Contributors: kelderic
Donate link: http://www.andymercer.net
Tags: admin,backend,mp6,style,borders
Requires at least: 3.8.0
Tested up to: 4.6
Stable tag: 1.7.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Starting with the MP6 plugin, and by default in WordPress 3.8, the admin backend has been flattened. This plugin restores classic (3D) borders.

== Description ==

Over the past few years, User-Interface design has moved towards flatness. One only needs look at Windows 8 to see the direction we are headed in. Starting with version 3.8, WordPress joined in that movement, with admin back-end getting a design overhaul. Borders have been removed from the menus, text is enlarged, image icons are replaced with text icons. Much of this is good and a long time coming. Some of it, however, decreases readability and usability.

This plugin gives you several options to tweak the knew look. The main feature (and namesake) is the ability to tweak the borders on the main menu. Additionally, you can set a hover effect for rows (and choose the color). Finally, there are a few misc improvements. The plugin list has blue bars on the left side of all active plugins. These get a 1px break between to visually indicate that are per-plugin, not per-list. Borders on all lists besides the plugin list get consistent bottom-borders (between items). All these options are on the new Admin page under Appearance.

== Installation ==

There are two ways to install this plugin.

Manual:

1. Upload the `admin-classic-borders` folder to the `/wp-content/plugins/` directory
2. Go to the 'Plugins' menu in WordPress, find 'Admin Classic Borders' in the list, and select 'Activate'.

Through the WP Repository:

1. Go to the 'Plugins' menu in WordPress, click on the 'Add New' button.
2. Search for 'Admin Classic Borders'. Click 'Install Now'.
3. Return to the 'Plugins' menu in WordPress, find 'Admin Classic Borders' in the list, and select 'Activate'.

== Frequently Asked Questions ==

= What is the point of this? =

I like borders, and I think that it's easier to read a menu if the options are divided visually. Also, I wanted some experience submitting a plugin to the WP Repository, and this provided it.

= Will it be improved? =

With v1.5, I think it's just about as good as it's going to get. That said, I've thought that before. If you find a bug, or think of an enhancement that you'd like, please let me know.

== Screenshots ==

1. The backend without this plugin activated. (Or if activated and borders set to none).
2. The backend with the plugin activated and the borders set to default (3D).
3. The hover effect on rows.
4. The options page for this plugin, under Appearance -> Admin

== Changelog ==

= 1.7.1 =
* WordPress 4.6 compatibility bump

= 1.7 =
* WordPress 4.4 compatibility bump
* BUGFIX: When Admin page was moved in 1.6, the link on Plugins list wasn't changed, and was broken. Now fixed.

= 1.6 =
* WordPress 4.1 compatibility bump.
* Moved settings page. Previously it was "Admin Classic Borders" under "Settings". Should now appear as "Admin" under "Appearance".

= 1.5 =
* Added persistent changes to Admin Toolbar for front end users who aren't logged in. Props to `snih` for suggesting.
* BUGFIX: Slideout search form not changing heights to match when old toolbar height is restored. Props to `snih` for catching.
* Removed compatibility for WordPress 3.5-3.7 With MP6 Plugin.

= 1.4 =
* Added live preview of Admin Bar height change.
* Small compatibility tweaks for WP 3.9.
* Fixed enqueuing order bug that was report in support forum.

= 1.3 =
* Added an option to reset the Admin Bar to 28px in height, as it was before 3.8 (Default is now 32px). This fixes issues in themes that use absolute positioning and assume the height of the Admin Bar to be 28px.
* Found that bottom borders between table row items on admin options pages had been removed in 3.8 (though they were included in the final versions of MP6). Restored them.

= 1.2.1 =
* Caught a bug in the instant preview. No borders that weren't visible on page-load would be loaded as an instant preview. IE, as long as 3D was the saved value, previewing a change in border type worked correctly, because all borders were shown on page-load. All other saved values had issues though.


= 1.2 =
* Added tabs to the options page to separate out primary Border options from extra misc. options.
* Added a custom CSS text input to the extra misc. settings options tab.
* Added a warning to be shown in the plugins list if this plugin is installed in a version of WordPress below 3.8 that doesn't have the MP6 plugin also installed.

= 1.1 =
* Changed the jQuery UI CSS file into a .css.php file with the prefix applied as a variable, to make changing it in the future easier.

= 1.0 =
* Added live preview of changes to opacity and border type.
* Refactored CSS to decrease complexity and help with live preview.
* Darkened the default color of the row hover effect from rgb(230,240,250) to rgb(220,230,250).

= 0.6 =
* Added a change in the cursor when sliding the opacity sliders.
* Darked the opacity sliders' borders slightly to increase visibilty.

= 0.5 =
* Options page added to let  users pick and choose what tweaks they want to enable.

= 0.1 =
* First version of this plugin. It adds borders to the admin menu.

== Upgrade Notice ==

= 0.5 =
This is the first real version. 0.1 was rejected from the reposity due to bug. So really this upgrade notice is a formality.