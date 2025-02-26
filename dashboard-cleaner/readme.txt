=== Dashboard Cleaner ===
Contributors: bruandet
Tags: banner, ads, dashboard, DOM inspector, backend, notice, nuisance
Requires at least: 3.3.0
Tested up to: 6.7
Stable tag: 1.1.6
License: GPLv3 or later
Requires PHP: 5.3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

== Description ==

= Reclaim your admin dashboard: Get rid of annoying banners, unwanted ads and other nuisances. =

Dashboard Cleaner allows you to hide any HTML elements from your admin dashboard such as annoying banners, unwanted ads and other nuisances, and basically anything else you want. It works like a DOM inspector: simply point and click on the HTML element you want to hide, select a few options and it's gone!


[youtube https://youtu.be/kSjAl4S4GYE]


= Requirements =

* WordPress 3.3+
* PHP 5.3+

== Installation ==

1. Upload the `dashboard-cleaner` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' page in WordPress.
3. Plugin settings are located in the 'Tools > Dashboard Cleaner' sub-menu.

== Screenshots ==

1. Start Dashboard Cleaner from its Toolbar menu.
2. Point and click on the HTML element you want to hide.
3. Select the attribute name/value to filter and click "Create a Filter".
4. It's gone!

== Frequently Asked Questions ==

= Where does Dashboard Cleaner store its data? =

Its settings are saved to the database, but the filters are saved to a file named `dhcl_xxxxx.filter` and located inside the `/wp-content/uploads/dashboard-cleaner/` folder (single installation) or the `/wp-content/uploads/sites/X/dashboard-cleaner/` folders (multisite installation). Removing or renaming that file will simply delete your filters without affecting Dashboad Cleaner settings.

= What is the difference between hiding an element and making it invisible? =

Hiding will remove the element and the space it occupies; making it invisible will mask the element but will keep the space it occupies. Hiding the element is the preferrered method but in a few cases, it can wrongly alter the whole page layout.

= Shall the filter be based on the exact attribute value, or can it be shortened (i.e., partial match)? =

Partial match is accepted but whatever value you enter, it must start and end on a word boundary (as opposed to a substring). For more details about this, see the contextual *Help* tab in Dashboard Cleaner Settings page.

= Are field values case sensitive? =

The attribute value is case-sensitive, the HTML element and attribute names aren't.

= Will it slow down my site? =

Dashboard Cleaner runs only in the back-end section (admin dashboard) not the front-end, hence it won't affect your visitors.

== Changelog ==

= 1.1.6 =

* Fixed a deprecated notice on servers running PHP 8+.

= 1.1.5 =

* Added WordPress 5.9 compatibility.

= 1.1.4 =

* Fixed an issue on blogs that are using right to left languages: the settings page was all messed up.

= 1.1.3 =

* WordPress 4.9 compatibility.
