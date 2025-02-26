=== Advanced Ajax Search For Easy Digital Downloads (EDD) ===
Contributors: kopila47
Tags: Easy Digital Downloads, advanced search, auto-suggest, ajax search, EDD, search
Requires at least: 5.1
Tested up to: 6.5.5
Requires PHP: 5.6.20
Stable tag: 1.0.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Ajax Search for Easy Digital Downloads

== Description == 

Advanced Ajax Search For Easy Digital Downloads plugin allows users to search for downloads easily and quickly. It will auto-suggest the matched results instantly while typing in the input box for search. As it works with shortcode, you can add this plugin on your page, header, sidebar or anywhere you wish.

To set up Advanced Ajax Search For Easy Digital Downloads you can use the shortcode: **`[edd_search]`**

If you want to replace the placeholder text (Search...), you can pass attribute to the shortcode like: **`[edd_search placeholder="Type Here to Search..."]`**

If you want search the data by categories or tags, you can pass attribute to the shortcode like: **`[edd_search category="true" tag="true"]`**

If you want change the data length of search, you can pass attribute to the shortcode like: **`[edd_search length="2"]`**

== Installation ==

1. Upload the plugin files to the **`/wp-content/plugins/`** directory, or into admin area of WordPress visit **`Plugins -> Add New`** and search **`Advanced Ajax Search For Easy Digital Downloads (EDD)`**.
2. Install & Activate the plugin through the **`Plugins' page`** in WordPress.
3. After the plugin is activated you can use the shortcodes **`[edd_search]`** in page.

== Frequently Asked Questions ==

= Do I need anything else to use this plugin? =

Yes, you need to install and activate Easy Digital Downloads to use this plugin.

= What can I do with this plugin? =

You can create a dynamic ajax search (i.e. auto-suggest the matched result) of your downloads/items/products which you have created using Easy Digital Downloads.

= How do I set up this plugin? =

Just put **`[edd_search]`** where you want to display the search form.

= Can I change the placeholder text of this plugin? =

Yes, you can do it by passing attributes on the shortcode. For example, if you like to replace it with 'Type Here to Search...', your shortcode will be **`[edd_search placeholder="Type Here to Search..."]`**

= Can I search the data by categories and tags of this plugin? =

Yes, you can do it. For example, if you like to search by categories or tags, your shortcode will be **`[edd_search category="true"]`** for categories or **`[edd_search tag="true"]`** for tags.  If you want to search by both of them your shortcode wil be **`[edd_search category="true" tag="true"]`**

= Can I change the length of search value of this plugin? =

Yes, you can do it. For example, if you like to change length 2 for data list your shortcode will be **`[edd_search length="2"]`**

= Can I change the Data not Found text of this plugin? =

Yes, you can do it by passing attributes on the shortcode. For example, if you like to replace it with 'Data not Found', your shortcode will be **`[edd_search not-found="Data not Found"]`**

== Changelog ==


= 1.0.4, July 08, 2024 =
* Tested upto 6.5.5

= 1.0.3, June 22, 2023 =
* Tested upto 6.2.2

= 1.0.2, April 30, 2021 =
* Add Number of length for search
* Add search feature by category and tags
* Add Data not found text if incase data is not found in database

= 1.0.1, January 8, 2020 =
* Add Placeholder attribute

= 1.0.0, January 6, 2020 =
* Initial Release
