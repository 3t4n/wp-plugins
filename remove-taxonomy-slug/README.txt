
=== Remove Taxonomy Slug ===
Contributors: akshayshah5189
Donate link: https://paypal.me/imobsphere?locale.x=en_GB
Tags: custom taxonomy, remove taxonomy slug, slug, taxonomy, clean url
Requires at least: 3.0.1
Tested up to: 6.6.2
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Remove taxonomy slugs from URLs for cleaner, SEO-friendly permalinks with simple settings and minimal technical setup.

== Description ==
This plugin allows you to create SEO-friendly URLs by removing taxonomy slugs, making URLs cleaner and more attractive to search engines. It’s simple to use, even for those with minimal technical knowledge.

With this plugin, you can:
- Remove slugs from custom taxonomies by adjusting plugin settings.
- Access the settings in your WordPress admin dashboard under **Remove Taxonomy Slug Settings**.
- Select the taxonomies you wish to modify and save your preferences.

### Developer Note
For advanced customization, a filter is provided:
```
add_filter('remove_taxonomy_slug_filter', function($slug_list) {
    return $slug_list;
});
```
Ensure the slug names are accurate in the array.

Compatible functions:
- `term_link`
- `get_category_link`
- `get_term_link`
- `category_link`

This plugin also works seamlessly with Custom Post Type UI.

For support, contact me at [akshay.shah5189@gmail.com](mailto:akshay.shah5189@gmail.com).

If you need to remove post type slugs, check out my other plugin: [Remove Post Type Slug](https://wordpress.org/plugins/remove-post-type-slug/)

== Installation ==

1. Upload `remove-taxonomy-slug.php` to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to the **Remove Taxonomy Slug Settings** menu, select the taxonomy slug, and save the settings.
4. Done!

== Screenshots ==

1. Admin settings for configuring taxonomy slugs.

== Changelog ==

= 1.1 =
* Version update

= 1.0 =
* Initial release
