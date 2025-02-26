=== All Posts Default Category ===
Contributors: jake.stookey
Tags: categories, category, posts, post, all
Requires at least: 3.0.1
Tested up to: 4.2.2
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Ensures all posts are always in the default category.

== Description ==

This plugin ensures that all posts will always be in the default category. Whenever any post is saved, all posts not currently in the default category are put in the default category. For example, by renaming the default category 'All' you always have a category containing all posts.

== Installation ==

1. Unzip all-posts-default-cat.zip to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Save any post, this will put all posts in the default category.
4. From now on, any time a post is saved, all posts will be kept in the default category.

== Frequently Asked Questions ==

= Why would you want to put all posts into the default category? =

One reason is to rename the default category to "All" and ensure that all posts will always be in that category.

= But isn't the default category named "Uncategorized"? =

Yes, but this can be renamed, for example to "All".

= How do I rename the default category? =

Go to Dashboard->Posts->Categories. Edit the first category, this is the category with id '1' and has no checkbox for bulk actions.

== Changelog ==

= 1.0 =
* First stable release

= 1.1 =
* Made a change to detect default category instead of assuming default category id of '1'
