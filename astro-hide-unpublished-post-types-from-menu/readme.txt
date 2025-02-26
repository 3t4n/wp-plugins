=== Astro Hide Unpublished Post Types From Menu ===
Contributors: alian
Tags: post types, unpublished, hide, menu, menus
Requires at least: 5.2
Tested up to: 6.5.5
Stable tag:	1.0.0
Requires PHP: 7.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Hides from menus all post_types that have a status other than published.

== Description ==
The "Astro Hide Unpublished Post Types From Menu" plugin automatically hides from WordPress menus all post types and pages, including custom post types such as WooCommerce products, that have a status other than "published". This feature is useful as it prevents page not found errors (404 errors) for unpublished posts and saves the site administrator time in updating menu items if the post type is updated with a draft, pending, future, private or trash status.

== Installation ==
1. Upload the `astro-hide-unpublished-post-types` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. The plugin will automatically hide unpublished post types in menus.

== Frequently Asked Questions ==
= Can I customize which post statuses are hidden? =
Currently, the plugin is designed to hide all post types except those with the "published" status. Customization would require modifying the plugin code.

== Changelog ==
= 1.0.0 =
* Initial version

== License ==
This plugin is licensed under the GPLv2 or later. For more information, see the [GPLv2 license](https://www.gnu.org/licenses/gpl-2.0.html).
